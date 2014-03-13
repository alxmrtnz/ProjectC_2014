$( document ).ready(function() {

    //at 500px scrolling, change leftColumn to fixed
    var $leftColumn = $('div.leftColumn');

    var fromTop = function () {
        var mastHeight = $('.mast').height();

        if ($(window).width() > 880) {
            if($('body').scrollTop() >= mastHeight + 70){
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

    };

    var playVideo = function(){
        var iframe = $(".vimeo-iframe")[0];
        console.log("iframe: " + iframe);
        var player = $f(iframe);
        player.api("play");
    };
    var pauseVideo = function(){
        var iframe = $(".vimeo-iframe")[0];
        console.log("iframe: " + iframe);
        var player = $f(iframe);
        player.api("pause");
    };


    fromTop(); //initial setting for leftColumn (used if page loads more than 500px from top already)

    $(document).scroll(function() {
        //constantly checks for distance from top in order to set leftColumn
        fromTop();
    });


    //resize function to change CSS of left column. Did this because if done in just CSS, I think the JS will override the styles on any sort of scroll, thereby negating the new media queried styles
    $(window).resize(function() {
      if($(this).width() < 880){
        $leftColumn.css({
            position: 'relative',
            top: '0px'
        });
      } else{
        fromTop();
      }
    });
    //////////////////////////////////////////////////////////

    $(".playBtn").click(function() {
        $('.default').fadeOut('400');
        var windowWidth = $(window).width();
        if(windowWidth > 1200){
            newHeight = 675.6;
        }
        else{
            var newHeight= 0.563 * windowWidth;
        }

        $('.mast').animate({
            height: newHeight},
            400, function() {
            $('.videoMast').fadeIn(400, function() {
               setTimeout(function() {
                     playVideo();
                     $('.mast').css({
                         height: 'auto',
                         overflow: 'visible'
                     });;

               }, 1000);
            });
        });


    });

    $(".close").click(function() {
        pauseVideo();
        $('.videoMast').fadeOut('400');
        var windowWidth = $(window).width();


        $('.mast').animate({ height: '430px'}, 400, function() {
                $('.mast').css({
                    height: '430px',
                    overflow: 'hidden'
                });
                setTimeout(function(){
                    $('.default').fadeIn(400);
                });

        });
    });

    $(".iframeContainer").fitVids();




});
