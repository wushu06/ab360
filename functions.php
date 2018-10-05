<?php
/**
 * Tbb
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * Documentation standards:
 * https://make.wordpress.org/core/handbook/best-practices/inline-documentation-standards/php/
 *
 * @package        WordPress
 * @subpackage    tbb
 * @since        1.0.2
 *
 * @author        The Bigger Boat
 */
/**
 * Increase memory and processing time.
 *
 * @since  1.0.1
 */
ini_set('upload_max_size', '64M');
ini_set('post_max_size', '64M');
ini_set('max_execution_time', '300');

function wpcodex_add_excerpt_support_for_post() {
	add_post_type_support( 'latest_projects', 'excerpt' );
}
add_action( 'init', 'wpcodex_add_excerpt_support_for_post' );
/**
 * Define theme path for quicker referencing.
 *
 * @since  1.0.1
 */
define('THEME_DIR', get_template_directory_uri());
/**
 * Load our ACF configuration information.
 *
 * This is required to set up ACF Local JSON.
 *
 * @since 1.0.1
 */
require_once get_template_directory() . '/inc/acf/config.php';


/**
 * Load our helpers file.
 *
 * This contains a number of useful functions used throughout the theme.
 *
 * @since 1.0.2
 */
require_once get_template_directory() . '/inc/helpers/tbb.php';
require_once get_template_directory() . '/inc/helpers/theme.php';
/**
 * Core theme class.
 *
 * Sets up WordPress hooks for actions and filters that are used in the theme.
 *
 * @since 1.0.1
 */
class tbb

{

	/**
	 * Set up our action and filter hooks.
	 */
	public function __construct()
	{

		/**
		 * Remove Generator Meta Tag.
		 *
		 * @since 1.0.1
		 */
		remove_action('wp_head', 'wp_generator');
		/**
		 * Set up stylesheets and scripts.
		 *
		 * @since 1.0.1
		 */
		add_action('wp_enqueue_scripts', array($this, 'enqueue_styles'));
		/**
		 * Set up image sizes and menu assignment.
		 *
		 * @since 1.0.1
		 */
		add_action('init', array($this, 'tbb_init'));
		/**
		 * Additional active menu classes.
		 *
		 * @since 1.0.1
		 */
		//  add_filter('nav_menu_css_class', array($this, 'add_active_class'), 10, 2);
		/*
		 * Google Api
		 */
		//add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');
		/*
	 * Excerpt
	 */
	}
	/* public function my_acf_google_map_api($api)
	 {
		 $api['key'] = 'AIzaSyCwXwrp-FcHELStKoqx8ZyzQkEW5zVSPEc';
		 return $api;
	 }*/
	/**
	 * Enqueue scripts and styles for the front end.
	 *
	 * @since 1.0.1
	 * @access public
	 */
	public function enqueue_styles()
	{
		wp_enqueue_style('fontawesome-style', 'https://use.fontawesome.com/releases/v5.0.6/css/all.css', array(), '1.0.1');
		wp_enqueue_style('jquery.fancybox-style', THEME_DIR . '/assets/stylesheets/jquery.fancybox.css', array(), '1.0.1');
		wp_enqueue_style('app-style', THEME_DIR . '/assets/dist/css/app.min.css', array(), '1.0.1');


		// Add latest jQuery.
		wp_deregister_script('jquery');
		wp_enqueue_script('jquery', '//code.jquery.com/jquery-3.1.1.min.js', array(), '3.1.1', true);
		wp_enqueue_script('map-google',  'https://maps.googleapis.com/maps/api/js?key=AIzaSyAOXBpYFdY1IjRCoKUfDYJ_mLec2X6-SFs', array('jquery'), '1.0.1', false);
		wp_enqueue_script('app-script', THEME_DIR . '/assets/dist/js/app.js', array('jquery'), '1.0.1', false);


        // send template url to js file
        $translation_array = array( 'templateUrl' => get_stylesheet_directory_uri() );
        //after wp_enqueue_script
        wp_localize_script( 'app-script', 'path', $translation_array );



    }
	/**
	 * Set up the theme information.
	 *
	 * This assigns image sizes, registers nav menus and enables HTML5 components.
	 *
	 * @since 1.0.1
	 * @access public
	 */
	// Register Custom Navigation Walker
	public function tbb_init()
	{
		// This theme uses wp_nav_menu().
		register_nav_menus( array(
			// Main navigation
			'primary' => __('Primary Menu', 'Tbb'),


		) );

		add_theme_support('automatic-feed-links');
		add_theme_support( 'customize-selective-refresh-widgets' );
	}


}

new tbb;
require_once 'yamm-nav-walker.php';
require_once 'wp-bootstrap-navwalker.php';

/*
 * change excerpt length
 */
function excerpt($limit) {
	$excerpt = explode(' ', get_the_excerpt(), $limit);
	if (count($excerpt)>=$limit) {
		array_pop($excerpt);
		$excerpt = implode(" ",$excerpt).'...';
	} else {
		$excerpt = implode(" ",$excerpt);
	}
	$excerpt = preg_replace('`[[^]]*]`','',$excerpt);
	return $excerpt;
}



// svg function


function add_svg_to_upload_mimes( $upload_mimes ) {
	$upload_mimes['svg'] = 'image/svg+xml';
	$upload_mimes['svgz'] = 'image/svg+xml';
	return $upload_mimes;
}
add_filter( 'upload_mimes', 'add_svg_to_upload_mimes', 10, 1 );


function my_login_logo() { ?>
    <style type="text/css">
        .login {
            background-color: #e6e7e8;
        }
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/logo-blue.svg);
            height:65px;
            width:320px;
            background-size: 320px 65px;
            background-repeat: no-repeat;
            padding-bottom: 30px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );



