$(function(){ //shorthand document ready

        // BEGIN FUNCTION FOR DIMMING SIBLING MENU LIs
        var $class = 'ul.mainNavItems li'; // Choose a class of siblings to apply the code
        var $easingIn = '.44'; // Set the 'dim' opacity
        var $easingOut = '1.0'; // Set the normal opacity

        $($class).mouseover(function(){
            $(this).siblings().css('opacity', $easingIn);
        });
        $($class).mouseleave(function(){
            $(this).siblings().css('opacity', $easingOut);
        });
        // END FUNCTION FOR DIMMING SIBLING MENU LIs
});