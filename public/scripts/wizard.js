var paramNum = new Array();
paramNum[1] = 1;
var functionNum = 1;

function paramInit(){
    $('.selectpicker').selectpicker();
    //selectpicker doesn't seem to be flexible enough (can't change template), so need to replace span.caret externally
    $('.selectpicker + .bootstrap-select span.caret').replaceWith("<i class='fa fa-caret-down'></i>");
    $('.selectpicker + .bootstrap-select span.pull-left').removeClass("pull-left");
}

function addParamInit() {
    $('.add-function-param').unbind("click");
    $('.add-function-param').click(function() {
        var num = $(this).attr('data-funNo');
        paramNum[num] += 1;
        var pnum = paramNum[num];
        var funParam = '<div class="input-group" style="margin-bottom:10px"><input type="text" id="function['+num+'][param]['+pnum+'][param_id]" name="function['+num+'][param]['+pnum+'][param_id]" placeholder="参数id" class="form-control"><div class="input-group-btn"><select id="function['+num+'][param]['+pnum+'][param_type]" class="selectpicker" data-style="btn-success" name="function['+num+'][param]['+pnum+'][param_type]"><option value="bool">布尔型</option><option value="int">数值型</option><option value="string">字符串</option></select></div></div>';
        $(this).parents('div.input-group').after(funParam);
        paramInit();
    });
}

function addReceiveParam(){
    $('.add-receive-param').click(function() {
        //var num = $(this).attr('data-revno');
        var recParam = '<input type="text" id="device_receive[]" name="device_receive[]" placeholder="接收参数" class="form-control" style="margin-bottom:10px">';
        $(this).parents('div.input-group').after(recParam);
    });
}

//TODO:加号放在最后
//TODO:删除符号
/*
function addParam() {
    console.log(1);
    var funParam = '<div class="input-group" style="margin-bottom:10px"><input type="text" id="function_id" name="function_id" placeholder="参数id" class="form-control"><div class="input-group-btn"><select id="function_id-param" class="selectpicker" data-style="btn-success"><option value="bool">布尔型</option><option value="int">数值型</option><option value="string">字符串</option></select><button onclick="addParam" type="button" class="btn btn-warning add-function-param"><i class="fa fa-plus"></i></button></div></div>';
    $(this).parents('div.input-group').after(funParam);
    console.log(2);
    $(this).remove();
    paramInit();
    console.log(2);
}
*/

$(function(){
    //var function_fieldset = $('#device_function_fieldset');

    paramInit();

    addReceiveParam();

    addParamInit();

    $("#wizard").bootstrapWizard({onTabShow: function(tab, navigation, index) {
        var $total = navigation.find('li').length;
        var $current = index+1;
        var $percent = ($current/$total) * 100;
        var $wizard = $("#wizard");
        $wizard.find('.progress-bar').css({width:$percent+'%'});

        if($current == $total-1){
            var device_name = $('#device_name').val();
            var device_id = $('#device_id').val();
            $.post("/api/calToken",{
                device_name:device_name,
                device_id:device_id,
            },function(json,status) {
                if(status == 'success'){
                    if(json.status == 0){
                        $('#devicetoken').val(json.data);
                        return;
                    }
                }
                alert('遇到未知错误,请联系管理员');
            });
        }

        if($current >= $total) {
            $wizard.find('.pager .next').hide();
            $wizard.find('.pager .finish').show();
            $wizard.find('.pager .finish').removeClass('disabled');
        } else {
            $wizard.find('.pager .next').show();
            $wizard.find('.pager .finish').hide();
        }
    }});

    //新增参数

    //新增参数
    $('#addFuncition').click(function() {
        functionNum += 1;
        paramNum[functionNum] = 1;
        var funParam = '<fieldset><legend>函数信息</legend><div class="control-group"><label for="function['+functionNum+'][function_name]" class="control-label">函数名</label><div class="controls form-group"><div class="col-md-10"><input type="text" id="function['+functionNum+'][function_name]" name="function['+functionNum+'][function_name]" placeholder="函数名" class="form-control"><span class="help-block">函数名用于识别设备函数,可包含数字、字母、中文</span></div></div><div class="control-group"><label class="control-label"  for="function['+functionNum+'][function_id]">函数ID</label><div class="controls form-group"><div class="col-md-10"><input type="text" id="function['+functionNum+'][function_id]" name="function['+functionNum+'][function_id]" placeholder="函数id" class="form-control"><span class="help-block">请输入设备中函数识别的id,仅能使用数字和字母</span></div></div></div<div class="control-group"><label class="control-label"  for="function['+functionNum+'][param][1][param_id]">参数ID</label><div class="controls form-group"><div class="col-md-10"><div class="input-group" style="margin-bottom:10px"><input type="text" id="function['+functionNum+'][param][1][param_id]" name="function['+functionNum+'][param][1][param_id]" placeholder="参数id" class="form-control"><div class="input-group-btn"><select id="function['+functionNum+'][param][1][param_type]" class="selectpicker" data-style="btn-success" name="function['+functionNum+'][param][1][param_type]"><option value="bool">布尔型</option><option value="int">数值型</option><option value="string">字符串</option></select><button type="button" class="btn btn-warning add-function-param"  data-funNo="'+functionNum+'"><i class="fa fa-plus"></i></button></div></div><span class="help-block">请输入函数中参数的id和参数类型,仅能使用数字和字母</span></div></div></div></fieldset>';
        $(this).parents('div.add_fun').before(funParam);
        paramInit();
        addParamInit();
        });

});
