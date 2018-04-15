<?php
/*
Plugin Name: Custom Theme Teachyourself.vn
Plugin URI: http://teachyourself.vn/
Description: Custom theme website by teachyourself.vn
Author: HOPLB
Text Domain: teachyourself-PLUGIN
Version: 1.0
*/

require_once('install_plugins.php');
require_once('login_admin/index.php');
function faci_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/faci
	 * If you're building a theme based on FACI 2017, use a find and replace
	 * to change 'faci' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'faci' );

	//update default options
	update_option("date_format", "d/m/Y" );
	update_option("time_format", "H:i" );
	update_option("gmt_offset", 7 );
	update_option("permalink_structure", "/%postname%.html" );
	

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'faci-featured-posst', 360, 212, true );

	add_image_size( 'faci-thumbnail-avatar', 100, 100, true );


	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary'    => __( 'Primary Menu', 'faci' ),
		'footer' => __( 'Footer Menu', 'faci' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'image',
		'video',
	) );

	// // Add theme support for Custom Logo.
	// add_theme_support( 'custom-logo', array(
	// 	'width'       => 300,
	// 	'height'      => 300,
	// 	'flex-width'  => true,
	// ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Filters FACI 2017 array of starter content.
	 *
	 * @since FACI 2017 1.1
	 *
	 * @param array $starter_content Array of starter content.
	 */
	$starter_content = apply_filters( 'faci_starter_content', $starter_content );

	add_theme_support( 'starter-content', $starter_content );
}
add_action( 'after_setup_theme', 'faci_setup' );

//change footer backend wordpress
add_filter('admin_footer_text', 'remove_footer_admin');
function remove_footer_admin () {
	echo 'Hệ thống <a target="_blank" href="http://teachyourself.vn">teachyourself.vn</a> theme || Liên hệ hỗ trợ: <a target="_blank" href="https://www.facebook.com/steve.luong.5"> Luong Ba Hop</a></span><br/></p>';
}
function faci_admin_style() { ?>
    <style type="text/css">
        #wpfooter{
        	background-color: #E14D40;
        	color: #fff;
            margin-bottom: 0px;
            padding-bottom: 7px !important;
        }
        #wpfooter a,#wpfooter p{
       	 color: #fff;
         line-height: 140% !important;
    	}
    	#wpfooter a{
    	text-decoration: underline !important; 
    }
    </style>
<?php }
add_action( 'admin_enqueue_scripts', 'faci_admin_style' );

//unregister some widgets
function remove_default_widgets() {
     //unregister_widget('WP_Widget_Pages');
     unregister_widget('WP_Widget_Calendar');
     //unregister_widget('WP_Widget_Archives');
     //unregister_widget('WP_Widget_Links');
     unregister_widget('WP_Widget_Meta');
     //unregister_widget('WP_Widget_Search');
     unregister_widget('WP_Widget_Text');
     //unregister_widget('WP_Widget_Recent_Posts');
     //unregister_widget('WP_Widget_Recent_Comments');
     unregister_widget('WP_Widget_RSS');
}

// disable logo wordpress in backend
add_action( 'admin_bar_menu', 'remove_wp_logo', 999 );
function remove_wp_logo( $wp_admin_bar ) {
	$wp_admin_bar->remove_node( 'wp-logo' );
}

// add target blank to visit site
add_action( 'admin_bar_menu', 'customize_my_wp_admin_bar', 80 );
function customize_my_wp_admin_bar( $wp_admin_bar ) {
    //Get a reference to the view-site node to modify.
    $node = $wp_admin_bar->get_node('view-site');
    //Change target
    $node->meta['target'] = '_blank';
    //Update Node.
    $wp_admin_bar->add_node($node);
}

// Customize mce editor font sizes
if ( ! function_exists( 'wpex_mce_text_sizes' ) ) {
	function wpex_mce_text_sizes( $initArray ){
		$initArray['fontsize_formats'] = "9px 10px 11px 12px 13px 14px 15pz 16px 17px 18px 19px 20px 21px 22px 23px 24px 28px 32px 36px";
		return $initArray;
	}
}
add_filter( 'tiny_mce_before_init', 'wpex_mce_text_sizes' );

/* Customize the_title(); */
function get_faci_title($num=80){
	$excerpt = get_the_title();
	$excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
	$excerpt = strip_shortcodes($excerpt);
	$excerpt = strip_tags($excerpt);
	$excerpt = substr($excerpt, 0, $num);
	$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
	$excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
	return $excerpt;
}
/* Customize the_excert(); */
function get_faci_excerpt($num=100){
	$excerpt = get_the_excerpt();
	$excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
	$excerpt = strip_shortcodes($excerpt);
	$excerpt = strip_tags($excerpt);
	$excerpt = substr($excerpt, 0, $num);
	$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
	$excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
	return $excerpt.'...';
}
function the_faci_excerpt($num=100){
	$excerpt = get_the_excerpt();
	$excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
	$excerpt = strip_shortcodes($excerpt);
	$excerpt = strip_tags($excerpt);
	$excerpt = substr($excerpt, 0, $num);
	$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
	$excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
	echo $excerpt.'...';
}

//remove admin bar 
add_action('after_setup_theme', 'remove_admin_bar');

	function remove_admin_bar() {
	if (!current_user_can('administrator') && !is_admin()) {
	show_admin_bar(false);
	}
}
//change user profile url
add_action('init', 'wp_snippet_author_base');
function wp_snippet_author_base() {
    global $wp_rewrite;
    $author_slug = 'profiles'; // the new slug name
    $wp_rewrite->author_base = $author_slug;
}

//* Clean WordPress header
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);