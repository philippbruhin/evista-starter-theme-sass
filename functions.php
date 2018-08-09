<?php
// Hide admin bar
show_admin_bar(false);

// Clean up the <head>
function removeHeadLinks() {
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
}
add_action('init', 'removeHeadLinks');
remove_action('wp_head', 'wp_generator');

if (function_exists('register_sidebar')) {
	register_sidebar(array(
		'name' => 'Sidebar Widgets',
		'id'   => 'sidebar-widgets',
		'description'   => 'These are widgets for the sidebar.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>'
		));
}

// Activate post thumbnails
if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
}

// Set up basic menu locations
register_nav_menus (
	array (
		'header-menu' => __( 'Header menu' ),
		'footer-menu' => __( 'Footer menu' ),
		'left-menu' => __( 'Left menu' ),
		'right-menu' => __( 'Right menu' ),
		)
	);



	function cc_mime_types($mimes)
	{
		$mimes['svg'] = 'image/svg+xml';
		return $mimes;
	}
	add_filter('upload_mimes', 'cc_mime_types');
	
	add_filter('jpeg_quality', function($arg){return 100;});
	
	// Set default values for the upload media box
	function mytheme_setup()
	{ 
		update_option('image_default_align', 'center');
		update_option('image_default_link_type', 'none');
		update_option('image_default_size', 'large');
	
		add_theme_support( 'title-tag' );
	
	}
	
	add_action('after_setup_theme', 'mytheme_setup');
	 
	// Add new image sizes
	function evista_insert_custom_image_sizes($image_sizes)
	{
		global $_wp_additional_image_sizes;
		if (empty($_wp_additional_image_sizes)) {
			return $image_sizes;
		}
		foreach ($_wp_additional_image_sizes as $id => $data) {
			if (!isset($image_sizes[$id])) {
				$image_sizes[$id] = ucfirst(str_replace('-', ' ', $id));
			}
		}
		return $image_sizes;
	}
	
	function evista_custom_image_setup()
	{
		add_theme_support('post-thumbnails');
		
		
		add_image_size('team-image-retina', 560, 672, false);	
		add_image_size('team-image-retina', 280, 336, false);	


		add_image_size('feature-image-retina', 2600, 600, false);		
		add_image_size('feature-image-mobile', 1300, 300, false);				
		add_image_size('gallery-retina', 1200, 960, array('center', 'center'));			
		add_image_size('gallery-mobile', 680, 480, array('center', 'center'));
		add_image_size('square-retina', 1400, 1400, array('center', 'center'));	
		add_image_size('square-mobile', 700, 700, array('center', 'center'));	
			
		add_filter('image_size_names_choose', 'evista_insert_custom_image_sizes');
	}
	
	add_action('after_setup_theme', 'evista_custom_image_setup');
	

	add_filter('acf/settings/google_api_key', function () {
		return 'AIzaSyCsTiFHuxPqTKu6fB02iXvsGhqclDE5lQ0';
	});

	function encode_email($e) {
		$output = '';
		for ($i = 0; $i < strlen($e); $i++) { $output .= '&#'.ord($e[$i]).';'; }
		return $output;
	}
	
	add_filter('wpcf7_form_elements', function($content) {
		$content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);
		$content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);
		$content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-list-item(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);
	
		return $content;
	});
	add_filter('wpcf7_autop_or_not', '__return_false');
	
include 'func/scripts_and_stylesheets.php';
include 'inc/lib-google-maps.php';
