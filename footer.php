	<footer>
		<div class="container">
			<div class="row">
				<div class="logo">
					M4
				</div>
			</div>
			<div class="row">
				<div class="navi">
					<?php wp_nav_menu( array( 'theme_location' => 'bottom-nav')); ?>   <!-- menu start --> 
				</div>
			</div>
			<div class="row">
				<div class="social">
					<ul>
            <?php 

              $twitter = get_field('twitter', 'option'); 

              if (!(empty($twitter)) ) : ?>

              <li>  

                <div class="circle">
                  <a href="<?php echo $twitter; ?>">
                    <i class="fa fa-twitter"></i>
                  </a>
                </div>

              </li>
            
            <?php endif; ?>
            <?php 

              $facebook = get_field('facebook', 'option'); 

              if (!(empty($facebook)) ) : ?>

              <li>  

                <div class="circle">
                  <a href="<?php echo $facebook; ?>">
                    <i class="fa fa-facebook"></i>
                  </a>
                </div>

              </li>
            
            <?php endif; ?>
            <?php 

              $youtube = get_field('youtube', 'option'); 

              if (!(empty($twitter)) ) : ?>

              <li>  

                <div class="circle">
                  <a href="<?php echo $youtube; ?>">
                    <i class="fa fa-youtube"></i>
                  </a>
                </div>

              </li>
            
            <?php endif; ?>
            <?php 

              $instagram = get_field('instagram', 'option'); 

              if (!(empty($instagram)) ) : ?>

              <li>  

                <div class="circle">
                  <a href="<?php echo $instagram; ?>">
                    <i class="fa fa-instagram"></i>
                  </a>
                </div>

              </li>
            
            <?php endif; ?>

          </ul>
				</div>
			</div>
      <div class="row">
        <div class="lvlymb">
          Site Powered by <a href="http://www.beefymarketing.com">Beefy Marketing</a>
        </div>
      </div>
		</div>
	</footer>
  <script type="text/javascript">
    var userFeed = new Instafeed({
        get: 'user',
        userId: 1176729626,
        accessToken: '1176729626.467ede5.2d1dc737d9e8450da665e9db63c078ba',
        limit: 12,
        resolution: 'low_resolution',
        template: '<div class="col-xs-4 col-sm-6 col-md-3 col-lg-3"><div class="photo_box"><div class="image_box"><a href="{{link}}"><img src="{{image}}"></a></div></div></div>'
    });
    userFeed.run();
    </script>
  <script>
  (function() {
 
  // store the slider in a local variable
  var $window = $(window),
      flexslider;
 
  // tiny helper function to add breakpoints
  function getGridSize() {
    return (window.innerWidth < 600) ? 1 :
           (window.innerWidth < 900) ? 1 : 1;
  }
 
  $(function() {
    SyntaxHighlighter.all();
  });
 
  $window.load(function() {
    $('.flexslider').flexslider({
      animation: "slide",
      animationLoop: false,
      slideshow: false,
      controlNav: false,
      itemWidth: 210,
      minItems: getGridSize(), // use function to pull in initial value
      maxItems: getGridSize() // use function to pull in initial value
    });
  });
 
  // check grid size on resize event
  $window.resize(function() {
    var gridSize = getGridSize();
 
    flexslider.vars.minItems = gridSize;
    flexslider.vars.maxItems = gridSize;
  });
}());
  </script>

	</body>
</html>