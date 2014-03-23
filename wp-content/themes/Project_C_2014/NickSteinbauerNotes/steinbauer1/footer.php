	<footer id="footer_main">
		<div class="inside">
		
	
		</div><!-- end of div.inside -->
	</footer><!-- end of footer#footer_main -->

</section><!-- end of section#main -->

<!-- jQuery -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

  <!-- FlexSlider -->
  <script defer src="<?php echo get_template_directory_uri(); ?>/flexslider/jquery.flexslider.js"></script>

  <script type="text/javascript">
    // Can also be used with $(document).ready()
		$(window).load(function() {
		  $('.flexslider').flexslider({
		    animation: "slide"
		  });
		});  
  </script>



<?php wp_footer(); ?>
</body>
</html>
