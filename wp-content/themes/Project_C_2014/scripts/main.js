$(function(){ //shorthand document ready
/*
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

*/

		
		//Begin function for changing blogPreviewTitle h1 to blogItemsTitle h2
		var blogItemsTitles = $('.blogItemsTitle');

		 blogItemsTitles.mouseover(function() {
         	$(this).siblings().css('opacity', $easingIn);
        });
		blogItemsTitles.mouseleave(function() {
			$(this).siblings().css('opacity', $easingOut);
		});

		blogItemsTitles.on('click', function() {
			$('#blogPreviewTitle').html('Can this be anything other than a string?') ;
		});
		
		
		
		//Function to show or hide mobile menu////////////////////////////////////////////////////////
		var mobileNav = $('nav.mobile');
		var mainHeight = $('nav.mainNav').outerHeight();
		var mobileHeight = $('div.mobileHeight').outerHeight();
		var openFlag = 0;
		
		$('.menuLink').click( function(){
		
			if(openFlag == 0){
				$(this).text('Close Menu');
				mobileNav.animate({
			    	height: mobileHeight
				}, 300, function() {
			    	// Animation complete.
				});		
				openFlag = 1;
			} else if (openFlag == 1){
				$(this).text('Menu');
				mobileNav.animate({
			    	height: 0
				}, 300, function() {
			    	// Animation complete.
				});	
				openFlag = 0;
			}
			
			
		});

});