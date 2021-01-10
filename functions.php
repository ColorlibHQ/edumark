<?php 
/**
 * @Packge 	   : Colorlib
 * @Version    : 1.0
 * @Author 	   : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
	// Block direct access
	if( !defined( 'ABSPATH' ) ){
		exit( 'Direct script access denied.' );
	}

	/**
	 *
	 * Define constant
	 *
	 */
	
	 
	// Base URI
	if( !defined( 'EDUMARK_DIR_URI' ) )
		define( 'EDUMARK_DIR_URI', get_template_directory_uri().'/' );
	
	// assets URI
	if( !defined( 'EDUMARK_DIR_ASSETS_URI' ) )
		define( 'EDUMARK_DIR_ASSETS_URI', EDUMARK_DIR_URI.'assets/' );
	
	// Css File URI
	if( !defined( 'EDUMARK_DIR_CSS_URI' ) )
		define( 'EDUMARK_DIR_CSS_URI', EDUMARK_DIR_ASSETS_URI .'css/' );
	
	// Js File URI
	if( !defined( 'EDUMARK_DIR_JS_URI' ) )
		define( 'EDUMARK_DIR_JS_URI', EDUMARK_DIR_ASSETS_URI .'js/' );
	
	// Icon Images
	if( !defined('EDUMARK_DIR_ICON_IMG_URI') )
		define( 'EDUMARK_DIR_ICON_IMG_URI', EDUMARK_DIR_ASSETS_URI.'img/icon/' );
	
	//DIR inc
	if( !defined( 'EDUMARK_DIR_INC' ) )
		define( 'EDUMARK_DIR_INC', EDUMARK_DIR_URI.'inc/' );

	//Elementor Widgets Folder Directory
	// if( !defined( 'EDUMARK_DIR_ELEMENTOR' ) )
	// 	define( 'EDUMARK_DIR_ELEMENTOR', EDUMARK_DIR_INC.'elementor-widgets/' );

	// Base Directory
	if( !defined( 'EDUMARK_DIR_PATH' ) )
		define( 'EDUMARK_DIR_PATH', get_parent_theme_file_path().'/' );
	
	//Inc Folder Directory
	if( !defined( 'EDUMARK_DIR_PATH_INC' ) )
		define( 'EDUMARK_DIR_PATH_INC', EDUMARK_DIR_PATH.'inc/' );
	
	//Colorlib framework Folder Directory
	if( !defined( 'EDUMARK_DIR_PATH_LIB' ) )
		define( 'EDUMARK_DIR_PATH_LIB', EDUMARK_DIR_PATH_INC.'libraries/' );
	
	//Classes Folder Directory
	if( !defined( 'EDUMARK_DIR_PATH_CLASSES' ) )
		define( 'EDUMARK_DIR_PATH_CLASSES', EDUMARK_DIR_PATH_INC.'classes/' );

	
	//Widgets Folder Directory
	// if( !defined( 'EDUMARK_DIR_PATH_WIDGET' ) )
	// 	define( 'EDUMARK_DIR_PATH_WIDGET', EDUMARK_DIR_PATH_INC.'widgets/' );
		
	//Elementor Widgets Folder Directory
	// if( !defined( 'EDUMARK_DIR_PATH_ELEMENTOR_WIDGETS' ) )
	// 	define( 'EDUMARK_DIR_PATH_ELEMENTOR_WIDGETS', EDUMARK_DIR_PATH_INC.'elementor-widgets/' );
	

		
	/**
	 * Include File
	 *
	 */
	
	// Breadcrumbs file include
	require_once( EDUMARK_DIR_PATH_INC . 'edumark-breadcrumbs.php' );
	// Sidebar register file include
	require_once( EDUMARK_DIR_PATH_INC . 'widgets/edumark-widgets-reg.php' );
	// Post widget file include
	// require_once( EDUMARK_DIR_PATH_INC . 'widgets/edumark-recent-post-thumb.php' );
	// News letter widget file include
	// require_once( EDUMARK_DIR_PATH_INC . 'widgets/edumark-newsletter-widget.php' );
	//Social Links
	// require_once( EDUMARK_DIR_PATH_INC . 'widgets/edumark-social-links.php' );
	// Instagram Widget
	// require_once( EDUMARK_DIR_PATH_INC . 'widgets/edumark-instagram.php' );
	// Nav walker file include
	require_once( EDUMARK_DIR_PATH_INC . 'wp_bootstrap_navwalker.php' );
	// Theme function file include
	require_once( EDUMARK_DIR_PATH_INC . 'edumark-functions.php' );

	// Theme Demo file include
	// require_once( EDUMARK_DIR_PATH_INC . 'demo/demo-import.php' );

	// Post Like
	require_once( EDUMARK_DIR_PATH_INC . 'post-like.php' );
	// Theme support function file include
	require_once( EDUMARK_DIR_PATH_INC . 'support-functions.php' );
	// Html helper file include
	require_once( EDUMARK_DIR_PATH_INC . 'wp-html-helper.php' );
	// Pagination file include
	require_once( EDUMARK_DIR_PATH_INC . 'wp_bootstrap_pagination.php' );
	// Elementor Widgets
	// require_once( EDUMARK_DIR_PATH_ELEMENTOR_WIDGETS . 'elementor-widget.php' );
	//
	require_once( EDUMARK_DIR_PATH_CLASSES . 'Class-Enqueue.php' );
	
	require_once( EDUMARK_DIR_PATH_CLASSES . 'Class-Config.php' );
	// Customizer
	require_once( EDUMARK_DIR_PATH_INC . 'customizer/customizer.php' );
	// Class autoloader
	require_once( EDUMARK_DIR_PATH_INC . 'class-epsilon-dashboard-autoloader.php' );
	// Class edumark dashboard
	require_once( EDUMARK_DIR_PATH_INC . 'class-epsilon-init-dashboard.php' );
	// Load CMB2 meta
	require_once( EDUMARK_DIR_PATH_INC . 'CMB2/cmb2-functions.php' );
	// Common css
	require_once( EDUMARK_DIR_PATH_INC . 'edumark-commoncss.php' );

	// Admin Enqueue Script
	function edumark_admin_script(){
		wp_enqueue_style( 'edumark-admin', get_template_directory_uri().'/assets/css/edumark_admin.css', false, '1.0.0' );
		wp_enqueue_script( 'edumark_admin', get_template_directory_uri().'/assets/js/edumark_admin.js', false, '1.0.0' );
	}
	add_action( 'admin_enqueue_scripts', 'edumark_admin_script' );

	 
	// WooCommerce style desable
	add_filter( 'woocommerce_enqueue_styles', '__return_false' );


	/**
	 * Instantiate Edumark object
	 *
	 * Inside this object:
	 * Enqueue scripts, Google font, Theme support features, Edumark Dashboard .
	 *
	 */
	
	$Edumark = new Edumark();