<?php
/**
 * This file is part of workerman.
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the MIT-LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @author walkor<walkor@workerman.net>
 * @copyright walkor<walkor@workerman.net>
 * @link http://www.workerman.net/
 * @license http://www.opensource.org/licenses/mit-license.php MIT License
 */

/**
 * 用于检测业务代码死循环或者长时间阻塞等问题
 * 如果发现业务卡死，可以将下面declare打开（去掉//注释），并执行php start.php reload
 * 然后观察一段时间workerman.log看是否有process_timeout异常
 */
//declare(ticks=1);

use \GatewayWorker\Lib\Gateway;

use \GatewayWorker\Lib\Db;

/**
 * 主逻辑
 * 主要是处理 onConnect onMessage onClose 三个方法
 * onConnect 和 onClose 如果不需要可以不用实现并删除
 * @author xieqiu
 */
class Events
{

    //TODO 后续使用redis改进,不然分布式过程中会出问题
    public static $CLIENT_MAP = array();

    //device => user
    public static $DEVICE_USER = array();

    /**
     * 当客户端连接时触发
     * 如果业务不需此回调可以删除onConnect
     * 
     * @param int $client_id 连接id
     */
    public static function onConnect($client_id) {
        echo "connect one\n";
        //@TODO
        //后续日志记录的切入点
        // 向当前client_id发送数据 
        //Gateway::sendToClient($client_id, "Hello $client_id");
        // 向所有人发送
        //Gateway::sendToAll("$client_id login");
    }
    
   /**
    * 当客户端发来消息时触发
    * @param int $client_id 连接id
    * @param mixed $message 具体消息
    */
   public static function onMessage($client_id, $message) {
        // 向所有人发送 
        //Gateway::sendToAll("$client_id said $message");
       echo $message."\n";
        $message_data = json_decode($message, true);
        if(!$message_data)
        {
            echo "no json\n";
            //return ;
            return GateWay::closeCurrentClient();
        }

        switch($message_data['type']){
        // 客户端回应服务端的心跳
        case 'pong':
            return;
            break;

        // 设备登录
        case 'login':
            if(!isset($message_data['data']['name']) || !isset($message_data['data']['token'])){
                return GateWay::closeCurrentClient();
            }
            $name = $message_data['data']['name'];
            $token = $message_data['data']['token'];
            $return = Db::instance('db1')->select('id,user_id')->from('devices')->where('name = :name')->where('token = :token')->bindValues(array('name' => $name, 'token' =>$token))->row();
            //echo $return;
            if($return['id']){
                $new_message = array(
                    'type' => 'response',
                    'data' => array(
                        'return' => 'login',
                        'status' => 0
                    ),
                );
                $_SESSION[$client_id] = array('id' => $return['id'], 'client' => 'device', 'owner' => $return['user_id']);
                self::$CLIENT_MAP['device_'.$return['id']] = $client_id;
                //if(!isset(self::$CLIENT_MAP['device_'.$return['id']])){
                //    self::$CLIENT_MAP['device_'.$return['id']] = array();
                //}
                //array_push(self::$CLIENT_MAP['device_'.$return['id']], $client_id);
                //print_r(self::$CLIENT_MAP);
                self::$DEVICE_USER[$return['id']] = $return['user_id'];
                //print_r(self::$DEVICE_USER);
                return Gateway::sendToCurrentClient(json_encode($new_message));
            }else{
                $new_message = array(
                    'type' => 'response',
                    'data' => array(
                        'return' => 'login',
                        'status' => 1,
                        'msg' => 'token验证失败，登录失败',
                    ),
                );
                Gateway::sendToCurrentClient(json_encode($new_message));
                return GateWay::closeCurrentClient();
            }
            break;

        //web登录
        case 'userlogin':
            if(!isset($message_data['name']) || !isset($message_data['token']) || !isset($message_data['device_id'])){
                return GateWay::closeCurrentClient();
            }
            $name = $message_data['name'];
            $token = $message_data['token'];
            $return = Db::instance('db1')->select('id')->from('users')->where('name = :name')->where('remember_token = :token')->bindValues(array('name' => $name, 'token' =>$token))->row();
            //print_r($return);
            //return Gateway::sendToCurrentClient(json_encode($return));

            if($return['id']){
                $new_message = array(
                    'type' => 'response',
                    'msg' => 'login success',
                );
                $_SESSION[$client_id] = array('id' => $return['id'], 'client' => 'user', 'operate_device' => $message_data['device_id']);
                if(!isset(self::$CLIENT_MAP['user_'.$return['id']][$message_data['device_id']])){
                    self::$CLIENT_MAP['user_'.$return['id']][$message_data['device_id']] = array();
                }
                array_push(self::$CLIENT_MAP['user_'.$return['id']][$message_data['device_id']], $client_id);
                //print_r(self::$CLIENT_MAP);
                //print_r(self::$CLIENT_MAP);
                //print_r(self::$DEVICE_USER);
                return Gateway::sendToCurrentClient(json_encode($new_message));
            }else{
                $new_message = array(
                    'type' => 'response',
                    'msg' => 'login fail',
                );
                Gateway::sendToCurrentClient(json_encode($new_message));
                return GateWay::closeCurrentClient();
            }
            break;

        case 'send':
            //print_r(self::$CLIENT_MAP);
            //print_r(self::$DEVICE_USER);

            if(!isset($message_data['data']) || !is_array($message_data['data']) || !isset($_SESSION[$client_id]) || ($_SESSION[$client_id]['client'] != 'device')){
                return GateWay::closeCurrentClient();
            }
            $paramArr = $message_data['data'];
            //print_r(self::$CLIENT_MAP);
            if(isset(self::$CLIENT_MAP['user_'.$_SESSION[$client_id]['owner']])){
                $ownerClientIdArr = self::$CLIENT_MAP['user_'.$_SESSION[$client_id]['owner']][$_SESSION[$client_id]['id']];
                foreach($ownerClientIdArr as $ownerClientId){
                    $data = array('type' => 'send', 'data' => $paramArr);
                    Gateway::sendToClient($ownerClientId, json_encode($data));
                }
            }
            break;

        case 'response':
            //print_r();
            if(!isset($message_data['data']['function']) || !isset($message_data['data']['status'])  || !isset($_SESSION[$client_id]) || ($_SESSION[$client_id]['client'] != 'device')){
                return GateWay::closeCurrentClient();
            }

            //if(isset(self::$CLIENT_MAP['user_'.$_SESSION[$client_id]['owner']])){
            //    $ownerClientId = self::$CLIENT_MAP['user_'.$_SESSION[$client_id]['owner']];
            //    $data = array('type' => 'function_response', 'data' => $message_data['data']);
            //    return Gateway::sendToClient($ownerClientId, json_encode($data));
            //}
            if(isset(self::$CLIENT_MAP['user_'.$_SESSION[$client_id]['owner']])){
                $ownerClientIdArr = self::$CLIENT_MAP['user_'.$_SESSION[$client_id]['owner']][$_SESSION[$client_id]['id']];
                foreach($ownerClientIdArr as $ownerClientId){
                    $data = array('type' => 'function_response', 'data' => $message_data['data']);
                    Gateway::sendToClient($ownerClientId, json_encode($data));
                }
            }
            break;

        case 'control':
            if(!isset($message_data['data']['function_name']) || !isset($message_data['data']['device_id']) || !isset($message_data['data']['params'])  || !is_array($message_data['data']['params']) || !isset($_SESSION[$client_id]) || ($_SESSION[$client_id]['client'] != 'user')){
                return GateWay::closeCurrentClient();
            }
            //print_r(self::$CLIENT_MAP);
            //print_r(self::$DEVICE_USER);
            //print_r($_SESSION);

            if(isset(self::$CLIENT_MAP['device_'.$message_data['data']['device_id']]) && isset(self::$DEVICE_USER[$message_data['data']['device_id']]) && (self::$DEVICE_USER[$message_data['data']['device_id']] == $_SESSION[$client_id]['id'])){
                $deviceClientId = self::$CLIENT_MAP['device_'.$message_data['data']['device_id']];
                $data = array(
                    'type' => 'function', 
                    'data' => array(
                        'function_name' => $message_data['data']['function_name'],
                        'params' => $message_data['data']['params'],
                    ),
               );
                echo json_encode($data)."\n";
                return Gateway::sendToClient($deviceClientId, json_encode($data));
            }else{
                echo "no device\n";
                $data = array('type' => 'function_response', 'data' => array('function' => $message_data['data']['function_name'], 'status' => 1, 'msg' => '设备尚未连接到平台上'));
                return Gateway::sendToCurrentClient(json_encode($data));
            }
            break;
        }
   }
   
   /**
    * 当用户断开连接时触发
    * @param int $client_id 连接id
    */
   public static function onClose($client_id) {
       //TODO
       echo "left one\n";
       if(isset($_SESSION[$client_id]) && ($_SESSION[$client_id]['client'] == 'user')){
            $key = array_search($client_id, self::$CLIENT_MAP['user_'.$_SESSION[$client_id]['id']][$_SESSION[$client_id]['operate_device']]);
            if ($key !== false){
                array_splice(self::$CLIENT_MAP['user_'.$_SESSION[$client_id]['id']][$_SESSION[$client_id]['operate_device']], $key, 1);
                //echo "close one\n";
            }
       }

       // 向所有人发送 
       //GateWay::sendToAll("$client_id logout");
   }
}
