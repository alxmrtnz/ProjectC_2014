$( document ).ready(function() {

    //at 500px scrolling, change leftColumn to fixed
    var $leftColumn = $('div.leftColumn');

    var fromTop = function () {
        if($('body').scrollTop() >= 500){
            $leftColumn.css({
                position: 'fixed',
                top: '30px'
            });
        } else{
            $leftColumn.css({
                position: 'absolute',
                top: '0px'
            });
        }
    };

    var playVideo = function(){
        var iframe = $(".vimeo-iframe")[0];
        console.log("iframe: " + iframe);
        var player = $f(iframe);

        player.api("play");
    };


    fromTop(); //initial setting for leftColumn (used if page loads more than 500px from top already)

    $(document).scroll(function() {
        //constantly checks for distance from top in order to set leftColumn
        console.log($('body').scrollTop());
        fromTop();
    });


    $(".playBtn").click(function() {
        $('.default').fadeOut('400', function() {
            setTimeout(function() {
                  playVideo();
            }, 5000);
        });


    });






});
