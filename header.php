<!-- <!doctype html> -->
<html lang="en">
  <head>
    <meta charset="utf-8">

    <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
         Remove this if you use the .htaccess -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
    <meta name="description" content="<?php bloginfo('name'); ?><?php wp_title(); ?>" />
    <meta name="author" content="<?php bloginfo('description'); ?>" />
    <meta name="keywords" content="M4 Band" />
    <meta name="copyright" content="2014 (c) M4 Band" />
    
    <meta property="og:title" content="<?php bloginfo('name'); ?><?php wp_title(); ?>" />
    <meta property="og:description" content="<?php bloginfo('description'); ?>" />
    <meta property="og:image" content="" />
    
    <!-- Place favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
    <link rel="shortcut icon" href="/favicon.ico">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">
    
    <!-- Mobile Jazz -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS: implied media="all" -->
    <link rel="stylesheet" href="<?php bloginfo('template_directory' ); ?>/style.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php bloginfo('template_directory' ); ?>/css/bootstrap.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory' ); ?>/css/flexslider.css" type="text/css">

    <!-- js -->
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="<?php bloginfo('template_directory' ); ?>/js/bootstrap.js" type='text/javascript'></script>
    <script src="<?php bloginfo('template_directory' ); ?>/js/jquery.flexslider.js"></script>


    <!-- rss -->
    <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
    <link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
    <link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />

    <!-- pingback -->
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

    <!-- font awesome -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <!-- instafeed -->
    <script type="text/javascript" src="<?php bloginfo('template_directory' ); ?>/js/instafeed.min.js"></script>

    <?php wp_get_archives('type=monthly&format=link'); ?>
    <?php //comments_popup_script(); // off by default ?>
    <?php wp_head(); ?>

    <!-- toggle script -->
    <script type="text/javascript">
      $(function() {
          $('#desktop_toggle').click(function() {
            $('.desktop_toggle').toggle();
            return false;
          });
      });
    </script>
    
      
  </head>
  <body <?php body_class(); ?>>
    <header>
      <?php if(is_front_page()) : ?>

        <div class="front bg">

      <?php elseif (is_page('media' )) : ?>

        <div class="media bg">

      <?php elseif (is_page('bios' )) : ?>

        <div class="bios bg">

      <?php elseif (is_page('events' )) : ?>

        <div class="events bg">

      <?php elseif (is_page('contact' )) : ?>

        <div class="contact bg">

      <?php endif; ?>
        
      <!-- what nav do I use -->

      <?php if(is_mobile()) : ?>

        <div id="header_nav" class="navbar navbar-default navbar-fixed-top" role="navigation">

      <?php else : ?>

        <div id="header_nav" class="navbar navbar-default navbar-static-top" role="navigation">

      <?php endif; ?>
      
          <div class="container">
            <div class="navbar-header">
              <div class="navbar-brand">
                <div class="logo">
                  <img src="<?php bloginfo( 'template_directory' ); ?>/img/M4_logo.png" alt="">
                </div>
                <ul>
                  <?php 

                    $twitter = get_field('twitter', 'option'); 

                    if (!(empty($twitter)) ) : ?>

                    <li>  

                      <div class="circle">
                        <a href="<?php echo $twitter; ?>">
                          <i class="fa fa-twitter cirlce "></i>
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
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>
            <?php
              wp_nav_menu( array(
                  'menu'              => 'header-menu',
                  'theme_location'    => 'main-nav',
                  'depth'             => 2,
                  'container'         => 'div',
                  'container_class'   => 'navbar-collapse collapse',
                  'container_id'      => 'navbar',
                  'menu_class'        => 'nav navbar-nav desktop_toggle',
                  'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                  'walker'            => new wp_bootstrap_navwalker())
              );
            ?>
            <div class="img desktop">
              <a href="#" id="desktop_toggle">
                <img src="<?php bloginfo('template_directory' ); ?>/img/menu_img.png" alt="">
              </a>
            </div>
          </div>   
        </div>

        <div id="jumbo">
          <div class="container">
            <div class="row">

              <?php if (is_front_page()) : ?>

                <div class="col-md-4">

                  <?php if(get_field('fp_header_cta_icon')) : ?>

                    <div class="icon">

                  <?php the_field('fp_header_cta_icon') ?>

                    </div>

                  <?php endif; 

                   if(get_field('fp_header_heading')) : ?>

                <div class="copy">

                  <?php the_field('fp_header_heading') ?>

                </div>

                  <?php endif;

                  if(get_field('fp_header_btn_text')) : ?>

                <a href="<?php the_field('fp_header_btn_link') ?>">

                  <div class="btn itunes">

                  <?php the_field('fp_header_btn_text') ?>

                  </div>

                </a>
                </div>
                
                <?php endif; ?>
                
              <?php else : ?>  <!-- header cta for non-front page -->

                <div class="col-md-12">

                  <div class="header_box">

                 <?php if(get_field('header_cta_header_text','option')) : ?>

                <div class="title">

                  <?php the_field('header_cta_header_text', 'option') ?>

                </div>

                  <?php endif;

                  if(get_field('header_cta_button_text', 'option')) : ?>

                  <a href="<?php the_field('header_cta_button_link', 'option') ?>">

                    <div class="btn itunes">

                    <i class="fa fa-plus-square-o"></i> <?php the_field('header_cta_button_text', 'option') ?>

                    </div>

                  </a>

                  <?php endif; ?>

                  <?php if(get_field('header_cta_subtext', 'option')) : ?>

                <div class="subtext">

                  <a href="<?php the_field('header_cta_button_link', 'option') ?>"><?php the_field('header_cta_subtext', 'option') ?></a>
                  
                </div>

                  <?php endif; ?>

              <?php endif; ?> <!-- end of header conditional -->

<!--             </div>
 -->
              <div class="col-md-offset-9 col-md-3">

              <?php if(is_front_page()) : ?>
                
                <div class="logo">

              <?php else : ?>

                <div class="logo_page">

              <?php endif; ?>

                  <img src="<?php bloginfo( 'template_directory' ); ?>/img/M4_logo.png" alt="">
                <!-- </div> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
