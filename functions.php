<?php


// Theme Options

if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_page(array(
      'page_title'  => 'Theme Options',
      'menu_title'  => 'Theme Options',
      'menu_slug'   => 'theme-general-settings',
      'capability'  => 'edit_posts',
      'redirect'    => false
    ));
    
  }
  
// Button shortcode

  //= Button
  function button( $atts, $content = null ) {
    extract(shortcode_atts(array(
      "url" => '',
      "align" => '',
      "size" => '',
    ), $atts));
      
    $output = '<div class="button-link '. $align .' '. $size . '"><a href="'.$url.'">' . do_shortcode($content) .'</a></div>';
    
    return $output;
    
    //remove_filter( 'the_content', 'wpautop' );
  }

  add_shortcode( 'button', 'button' );

// Register CSS 

  function theme_name_scripts() {
  	wp_enqueue_style( 'style-name', get_stylesheet_uri() );
    wp_enqueue_script( 'jquery' ); 
  }

  add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );


// Register Custom Navigation Walker 

  require_once ('wp_bootstrap_navwalker.php');

// Remove that awkward admin bar 

  function my_filter_head() { remove_action('wp_head', '_admin_bar_bump_cb'); }
  add_action('get_header', 'my_filter_head');

  function my_function_admin_bar(){ return false; }
  add_filter( 'show_admin_bar' , 'my_function_admin_bar');

// This theme uses wp_nav_menu() in one location

	register_nav_menus( array(
		'main-nav'    => __( 'main Nav', 'main-nav' ),
    'bottom-nav'  => __( 'bottom Nav', 'bottom-nav'),
	) );

// Add active functionality to menu

  add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
  function special_nav_class($classes, $item){
     if( in_array('current-menu-item', $classes) ){
             $classes[] = 'active';
     }
     return $classes;
  }
  
//Page Slug Body Class

  function add_slug_body_class( $classes ) {
    global $post;
      if ( isset( $post ) ) {
      $classes[] = $post->post_type . '-' . $post->post_name;
    }
      return $classes;
    }

    add_filter( 'body_class', 'add_slug_body_class' );

// More Excerpt Control

  function new_excerpt_more( $more ) {
  	return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('Read more.', 'your-text-domain') . '</a>';
  }

  add_filter( 'excerpt_more', 'new_excerpt_more' );


// Excerpt Limit

  function excerpt($limit) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt)>=$limit) {
      array_pop($excerpt);
      //$excerpt = implode(" ",$excerpt).' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '"><span class="keep-reading">Keep Reading</span></a>';
     $excerpt = implode(" ",$excerpt).'...';    
    } else {
      $excerpt = implode(" ",$excerpt);
    }	
    $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
    return $excerpt;
  }

// Add Thumbnails to Posts

  add_theme_support('post-thumbnails', array( 'post', 'page', 'gallery' ) );
  
// Content Limit

  function content($limit) {
    $content = explode(' ', get_the_content(), $limit);
    if (count($content)>=$limit) {
      array_pop($content);
      $content = implode(" ",$content).'...';
    } else {
      $content = implode(" ",$content);
    }	
    $content = preg_replace('/\[.+\]/','', $content);
    $content = apply_filters('the_content', $content); 
    $content = str_replace(']]>', ']]&gt;', $content);
    return $content;
  }	

// Add page slug as nav IDs

  function nav_id_filter( $id, $item ) {
    return 'menu-item-'.sanitize_title_with_dashes($item->title);
  }

  add_filter( 'nav_menu_item_id', 'nav_id_filter', 10, 2 );


// Add Search Filter

  function SearchFilter($query) {
       if ($query->is_search) {
          $query->set('post_type', array('post', 'page'));
          $query->set( 'posts_per_page', '8' );
       }
       return $query;
  }
  add_filter('pre_get_posts','SearchFilter');


// ******************** CUSTOM POST TYPES ************************


  // Register Custom Post Type

    function event_post_type() {

      $labels = array(
        'name'                => _x( 'Events Manager', 'Post Type General Name', 'm4' ),
        'singular_name'       => _x( 'Event', 'Post Type Singular Name', 'm4' ),
        'menu_name'           => __( 'Events', 'm4' ),
        'parent_item_colon'   => __( 'Parent Events:', 'm4' ),
        'all_items'           => __( 'All Events', 'm4' ),
        'view_item'           => __( 'View Events', 'm4' ),
        'add_new_item'        => __( 'Add New Events', 'm4' ),
        'add_new'             => __( 'Add Events', 'm4' ),
        'edit_item'           => __( 'Edit Events', 'm4' ),
        'update_item'         => __( 'Update Events', 'm4' ),
        'search_items'        => __( 'Search Events', 'm4' ),
        'not_found'           => __( 'Not found', 'm4' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'm4' ),
      );
      $args = array(
        'label'               => __( 'events', 'm4' ),
        'description'         => __( 'Post Type Description', 'm4' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'thumbnail' ),
        'taxonomies'          => array( 'category', 'post_tag' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 10,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
        'rewrite'             => array('slug' => 'm4-events'),
        'menu_icon'           => 'dashicons-tickets-alt',
      );
      register_post_type( 'm4-events', $args );

    }

  // Hook into the 'init' action
  
    add_action( 'init', 'event_post_type', 0 );

  // Register Custom Post Type

    function band_post_type() {

      $labels = array(
        'name'                => _x( 'Band Members', 'Post Type General Name', 'm4' ),
        'singular_name'       => _x( 'Member', 'Post Type Singular Name', 'm4' ),
        'menu_name'           => __( 'Members', 'm4' ),
        'parent_item_colon'   => __( 'Parent Members:', 'm4' ),
        'all_items'           => __( 'All Members', 'm4' ),
        'view_item'           => __( 'View Members', 'm4' ),
        'add_new_item'        => __( 'Add New Members', 'm4' ),
        'add_new'             => __( 'Add Members', 'm4' ),
        'edit_item'           => __( 'Edit Members', 'm4' ),
        'update_item'         => __( 'Update Members', 'm4' ),
        'search_items'        => __( 'Search Members', 'm4' ),
        'not_found'           => __( 'Not found', 'm4' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'm4' ),
      );
      $args = array(
        'label'               => __( 'Members', 'm4' ),
        'description'         => __( 'Post Type Description', 'm4' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'thumbnail' ),
        'taxonomies'          => array( 'category', 'post_tag' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 10,
        'can_export'          => true,
        'has_archive'         => true, 
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'rewrite'             => array('slug' => 'm4-members'),
        'menu_icon'           => 'dashicons-admin-users',
      );
      register_post_type( 'm4-members', $args );

    }

  // Hook into the 'init' action
  
    add_action( 'init', 'band_post_type', 0 ); 

// Add Sidebars

    function my_sidebar() {

    register_sidebar( array(
      'name' => __( 'Sidebar', 'tnq' ),
      'id' => 'top',
      'description' => __( '' ),
      'before_widget' => '<aside id="%1$s" class="widget %2$s">',
      'after_widget' => '</aside>',
      'before_title' => '<h3 class="widget-title">',
      'after_title' => '</h3>',
    ) );
  }

  add_action('widgets_init', 'my_sidebar' );

  // paginataion

  

  
?>