<?php

function enable_theme_support() {
  // Add title to pages dynamically
  add_theme_support('title-tag');
  add_theme_support('custom-logo');
  add_theme_support('post-thumbnails');
  // MENU
  // add_theme_support('menus');
  // POST FORMATS
  add_theme_support('post-formats', array( 'aside', 'gallery' ));
}

add_action('after_setup_theme', 'enable_theme_support');


// MENUS
function greentree_menus(){

  $locations = array(
    'primary' => 'Desktop Primary Right Sidebar',
    'footer' => 'Footer Menu Items'
  );

  register_nav_menus($locations);

}

add_action('init','greentree_menus');

// CSS STYLES

// FORCE CSS & SCRIPTS RELOADING

function greentree_style() {

  $version = wp_get_theme()->get('Version');

  // force CSS reloading
  function version_id() {
    if ( WP_DEBUG )
      return time();
    return $version;
  }

  wp_enqueue_style('greenTree_personal_style', get_template_directory_uri() . './style.css', array('greenTree_bootstrap_style'), version_id(), 'all');
  wp_enqueue_style('greenTree_bootstrap_style', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css', array(), '4.4.1', 'all');
  wp_enqueue_style('greenTree_fontawesome_style', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css', array(), '5.13.0', 'all');
  wp_enqueue_style('greenTree_googlefonts_davidlibre_style', 'https://fonts.googleapis.com/css2?family=David+Libre:wght@400;500');  
  wp_enqueue_style('greenTree_googlefonts_roboto_style', 'https://fonts.googleapis.com/css2?family=Roboto:wght@300');

}

add_action('wp_enqueue_scripts', 'greentree_style');

// JS SCRIPTS

function greentree_scripts() {

  wp_enqueue_script('greentree_jquery_script', 'https://code.jquery.com/jquery-3.4.1.slim.min.js', array(), '3.4.1',true);
  wp_enqueue_script('greentree_popper_script', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', array(), '1.16', true);
  wp_enqueue_script('greentree_bootstrap_script', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', array(), '4.4.1', true);
  wp_enqueue_script('greentree_personal_script', get_template_directory_uri() . '/assets/js/main.js', array(), '', true);

}

add_action('wp_enqueue_scripts', 'greentree_scripts');


/**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );


// EXCERPT LENGTH

function control_excerpt_length() {
  return 20;
}

add_filter('excerpt_length', 'control_excerpt_length');

 
// WIDGET AREAS

function greentreen_widget_areas(){
  register_sidebar(
    [
      'before_title' => '',
      'after_title' => '',
      'before_widget' => '<ul class="social-list list-inline mx-auto mt-5">',
      'after_widget' => '</ul>',
      'name' => 'Sidebar Area',
      'id' => 'sidebar-1',
      'description' => 'Sidebar Widget'
    ],
  );

  register_sidebar(
    [
      'before_title' => '',
      'after_title' => '',
      'before_widget' => '<ul class="social-list list-inline mx-auto mt-5">',
      'after_widget' => '</ul>',
      'name' => 'Footer Area',
      'id' => 'footer-1',
      'description' => 'Footer Widget'
    ],
  );

  register_sidebar(
    [
      'before_title' => '<div class="text-center">',
      'after_title' => '</div>',
      'before_widget' => '<div class="my-theme pb-5 pt-6">',
      'after_widget' => '</div>',
      'name' => 'Page Top Area',
      'id' => 'page-1',
      'description' => 'Page Top Widget'
    ],
  );

  register_sidebar(
    [
      'before_title' => '<h3 class="text-light d-block pb-3 text-center">',
      'after_title' => '</h3>',
      'before_widget' => '<div class="my-theme py-5">',
      'after_widget' => '</div>',
      'name' => 'Page Botttom Area',
      'id' => 'page-2',
      'description' => 'Page Bottom Widget'
    ],
  );

  register_sidebar(
    [
      'before_title' => '',
      'after_title' => '',
      'before_widget' => '<section class="py-3 mt-4 text-center">
      <div class="row row-cols-1 mt-4 row-cols-md-2">',
      'after_widget' => '',
      'name' => 'Front Page Left Card',
      'id' => 'front-page-left',
      'description' => 'Front Page Left Card Widget'
    ],
  );

  register_sidebar(
    [
      'before_title' => '',
      'after_title' => '',
      'before_widget' => '',
      'after_widget' => '</div>
			</section>',
      'name' => 'Front Page Right Card',
      'id' => 'front-page-right',
      'description' => 'Front Page Right Card Widget'
    ],
  );

  register_sidebar(
    [
      'before_title' => '<section class="my-theme py-5 mt-3 text-center">
			<h3 class="text-light d-block pb-3">',
      'after_title' => '</h3>',
      'before_widget' => '',
      'after_widget' => '</section>',
      'name' => 'Front Page Bottom Area',
      'id' => 'front-page-bottom',
      'description' => 'Front Page Bottom Widget'
    ],
  );

  register_sidebar(
    [
      'before_title' => '<section class="py-5 mt-3 text-center">
			<h3 class="text-light d-block pb-3">',
      'after_title' => '</h3>',
      'before_widget' => '<div class="pt-5">',
      'after_widget' => '</div></section>',
      'name' => 'Last Post Page Area',
      'id' => 'last-post-page',
      'description' => 'Last Post Page Widget'
    ],
  );
};

add_action('widgets_init','greentreen_widget_areas');


function get_custom_nav_description( $menu_name, $page_id ) { 
  $items = wp_get_nav_menu_items( $menu_name );
  foreach ( $items as $item ) {
      if ( $item->object_id == $page_id ) {
          return $item->description;
      }
  }   
}

// SET IMAGES SIZES

add_image_size('smallest', 160, 160, true);
add_image_size('largest', 800, 450, true);


// add_filter(
//   'the_content',
//   function ($content) {
//     return substr($content,0,strpos($content,'.')+1);
//   }
// );

?>
