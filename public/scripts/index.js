var lineResize,
    lineChart;
function lineChartOperaHack(){
    //lineChart is somehow not rendered correctly after updates. Need to reupdate
    if (navigator.userAgent.indexOf("Opera")){
        clearTimeout(lineResize);
        lineResize = setTimeout(lineChart.update, 300);
    }
}

$(function(){
    /* Sparklines can also take their values from the first argument
     passed to the sparkline() function */
    function randomValue(){
        return Math.floor( Math.random() * 40 );
    }
    var values = [[],[],[],[],[]],
        options = {
            width: '150px',
            height: '30px',
            lineColor: $white,
            lineWidth: '2',
            spotRadius: '2',
            highlightLineColor: $gray,
            highlightSpotColor: $gray,
            spotColor: false,
            minSpotColor: false,
            maxSpotColor: false
        };
    for (var i = 0; i < values.length; i++){
        values[i] = [10 + randomValue(), 15 + randomValue(), 20 + randomValue(), 15 + randomValue(), 25 + randomValue(),
            25 + randomValue(), 30 + randomValue(), 30 + randomValue(), 40 + randomValue()]
    }



    // Notification link click handler.
    // JUST FOR DEMO.
    // Can be removed.

    function close(e){
        var $settings = $("#settings"),
            $popover = $settings.siblings(".popover");
        if(!$.contains($popover[0], e.target)){
            $settings.popover('hide');
            $(document).off("click", close);
        }
    }
    $("#notification-link").click(function(){
        if ( $(window).width() > 767){
            $("#settings").popover('show');
            $(document).on("click", close);
            return false;
        }
    });

});

