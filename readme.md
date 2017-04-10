# Openhareware -- 开源硬件Web监控平台 

**Openhareware**是以Microduino为示例，开放的对所有开源硬件设计的一套Web远程控制的解决方案。
                                                                                                                                                     
- **laravel** :Web平台的展示是使用[laravel](https://laravel.com)框架，本项目采用5.1版本。
- **Workerman**:使用[Wokerman](http://www.workerman.net)框架搭建Websocket的服务。
                                                                                                                                                    
-------------------                                                                                                                                  
                                                                                                                                                     
## 项目要求
                                                                                
**Openhareware**需要你预先安装了以下服务：
- web server: Nginx或Apache
- PHP 5.5.9+
- MySQL
- Composer

 ## 项目部署

1. 获取项目源码: `git clone` 该项目到你的服务器
```
git clone https://github.com/Qiu-Ye/openhareware.git 
cd openhareware
chmod -R 777 storage    //修改storage的目录权限
```
2. 使用Composer安装后端依赖组件：
```
composer config -g repo.packagist composer https://packagist.phpcomposer.com    // 使用composer中国镜像，可忽略
composer install
```
3. 连接数据库，初始化表结构：
```
cp .env.example .env                // 创建.env文件
vim .env                            // 修改为自己的数据库信息
php artisan migrate                 // 生成表结构
```
4. 开启webserver的重写模块，美化URL：
- Apache：

框架中自带的public/.htaccess文件支持URL中隐藏index.php，需要先确保Apache启用了mod_rewrite模块以支持.htaccess解析.

- Nginx:

在Nginx中，使用如下站点配置指令就可以支持URL美化：
```
location / {
   try_files $uri $uri/ /index.php?$query_string;
}
```
5. 把你的域名绑定到 `pms/public` 下， 启动webserver服务器。
6. 配置Websocket服务器相关配置：
```
vim socket_master/Applications/YourApp/Config/Db.php                 //修改为你的数据库信息
vim socket_master/Applications/YourApp/start_businessworker.php      //修改为你的Websocket地址和端口
```
7. 开启Websocket服务器：
```
php socket_master/start.php start -d                 //以daemon方式启动
```

## 更多信息
**Openhareware**提供丰富的Websocket交互接口，请前往[wiki](https://github.com/Qiu-Ye/openhareware/wiki/%E5%85%B3%E4%BA%8EWebsocket%E9%80%9A%E4%BF%A1%E4%B8%AD%EF%BC%8C%E8%AE%BE%E5%A4%87%E7%AB%AF%E4%B8%8E%E6%9C%8D%E5%8A%A1%E5%99%A8%E7%9A%84%E4%BA%A4%E4%BA%92%E6%8E%A5%E5%8F%A3%E7%BA%A6%E5%AE%9A)详细查看


