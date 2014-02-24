$(function(){ //shorthand document ready

    //at 500px scrolling, change leftColumn to fixed
    var $leftColumn = $('div.leftColumn');

    var fromTop = function () {
        if($('html').scrollTop() >= 500){
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



    fromTop(); //initial setting for leftColumn (used if page loads more than 500px from top already)

    $(document).scroll(function() {
        //constantly checks for distance from top in order to set leftColumn
        fromTop();
    });

});