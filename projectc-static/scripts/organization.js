$(function(){ //shorthand document ready


    //at 500px scrolling, change leftColumn to fixed
    var $leftColumn = $('div.leftColumn');
    $(document).scroll(function() {

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
    });

});