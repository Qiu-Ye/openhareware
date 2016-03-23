$(function(){
    $('.selectpicker').selectpicker();
    //selectpicker doesn't seem to be flexible enough (can't change template), so need to replace span.caret externally
    $('.selectpicker + .bootstrap-select span.caret').replaceWith("<i class='fa fa-caret-down'></i>");
    $('.selectpicker + .bootstrap-select span.pull-left').removeClass("pull-left");

    $("#wizard").bootstrapWizard({onTabShow: function(tab, navigation, index) {
        var $total = navigation.find('li').length;
        var $current = index+1;
        var $percent = ($current/$total) * 100;
        var $wizard = $("#wizard");
        $wizard.find('.progress-bar').css({width:$percent+'%'});

        if($current >= $total) {
            $wizard.find('.pager .next').hide();
            $wizard.find('.pager .finish').show();
            $wizard.find('.pager .finish').removeClass('disabled');
        } else {
            $wizard.find('.pager .next').show();
            $wizard.find('.pager .finish').hide();
        }
    }});
});
