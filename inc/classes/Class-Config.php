<?php 
/**
 * @Packge 	   : Edumark
 * @Version    : 1.0
 * @Author 	   : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
	// Block direct access
	if( !defined( 'ABSPATH' ) ){
		exit( 'Direct script access denied.' );
	}

	// Final Class
	final class Edumark{

		
		// Theme Version
		private $edumark_version = '1.0';

		// Minimum WordPress Version required
		private $min_wp = '4.0';

		// Minimum PHP version required 
		private $min_php = '5.6.25';

		function __construct(){
			// Theme Support
			add_action( 'after_setup_theme', array( $this, 'support' ) );
			// 
			$this->init();
		}

		// Theme init
		public function init(){
			//
			$this->setup();

			// customizer init Instantiate
			$this->customizer_init();
			
		}

		// Theme setup
		private function setup(){
			
			// Create enqueue class instance
			$enqueu = new edumark_Enqueue();
			$enqueu->scripts = $this->enqueue() ;
			$enqueu->edumark_scripts_enqueue_init() ;

		}
		// Theme Support
		public function support(){
			// content width
	        $GLOBALS['content_width'] = apply_filters( 'edumark_content_width', 751 );

	        
	        // text domain for translation.
	        load_theme_textdomain( 'edumark', EDUMARK_DIR_PATH . '/languages' );
	        
	        // support title tage
	        add_theme_support( 'title-tag' );
	        
	        // support logo
			add_theme_support( 'custom-logo', array(
				'height'      => 36,
				'width'       => 154,
				'flex-height' => true,
				'flex-width'  => true,
				'header-text' => array( 'site-title', 'site-description' ),
			) );

			//Custom Hreader
			add_theme_support( 'custom-header', array(
				'flex-width'    => true,
				'width'         => 1920,
				'flex-height'   => true,
				'height'        => 500,
				'default-image' => get_template_directory_uri() . '/assets/img/breadcrumb.png'
			) );

			//Custom background
			add_theme_support( 'custom-background', array(
				'default-color' => 'ffffff'
			) );

	        //  support post format
	        add_theme_support( 'post-formats', array( 'video','audio' ) );
	        
	        // support post-thumbnails
	        add_theme_support( 'post-thumbnails', array( 'post', 'course' ) );
			
			// Site logo size
			add_image_size( 'edumark_logo_154x36', 154, 36, true );
										
			// Hero left thumb size
			add_image_size( 'edumark_hero_left_thumb_638x550', 638, 550, true );
										
			// Course thumb image size
			add_image_size( 'edumark_course_thumb_362x250', 362, 250, true );
			add_image_size( 'edumark_course_single_thumb_460x460', 460, 460, true );
			add_image_size( 'edumark_course_author_img_50x50', 50, 50, true );
										
			// Home blog thumb image size
			add_image_size( 'edumark_home_blog_thumb_362x240', 362, 240, true );
			
			// Team member thumb image size
			add_image_size( 'edumark_team_member_thumb_264x300', 264, 300, true );

			// Latest post Widget & testimonial thumbnail size
			add_image_size( 'edumark_widget_post_thumb', 80, 80, true );

			// Single blog post image size
			add_image_size( 'edumark_single_blog_750x375', 750, 375, true );
			
			// Single blog post & course author image size
			add_image_size( 'edumark_np_thumb', 60, 60, true );
	        	        
	        // support automatic feed links
	        add_theme_support( 'automatic-feed-links' );
	        
	        // support html5
	        add_theme_support( 'html5' );
			
			// Add theme support for selective refresh for widgets.
			add_theme_support( 'customize-selective-refresh-widgets' );
						    
	        // register nav menu
	        register_nav_menus( array(
	            'primary-menu'   => esc_html__( 'Primary Menu', 'edumark' ),
				'courses-menu'   => esc_html__( 'Courses', 'edumark' ),
				'resources-menu' => esc_html__( 'Resources', 'edumark' ),
	        ) );

	        // editor style
	        add_editor_style('assets/css/editor-style.css');

		} // end support method

		// enqueue theme style and script
		private function enqueue(){

			$cssPath = EDUMARK_DIR_CSS_URI;
			$jsPath  = EDUMARK_DIR_JS_URI;

			$scripts = array(
				'style' => array(
					array(
						'handler'		=> 'edumark-google-font',
						'file' 			=> $this->google_font(),
					),
					array(
						'handler'		=> 'edumark-bootstrap',
						'file' 			=> $cssPath.'bootstrap.min.css',
						'dependency' 	=> array(),
						'version' 		=> '5.3.8-5',
					),
					array(
						'handler'		=> 'edumark-animate',
						'file' 			=> $cssPath.'animate.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'edumark-owl-carousel',
						'file' 			=> $cssPath.'owl.carousel.min.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'edumark-font-awesome',
						'file' 			=> $cssPath.'font-awesome.min.css',
						'dependency' 	=> array(),
						'version' 		=> '7.3.1-1',
					),
					array(
						'handler'		=> 'edumark-themify',
						'file' 			=> $cssPath.'themify-icons.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'edumark-nice-select',
						'file' 			=> $cssPath.'nice-select.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'edumark-flaticon',
						'file' 			=> $cssPath.'flaticon.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'edumark-slicknav-css',
						'file' 			=> $cssPath.'slicknav.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'edumark-magnific-popup-css',
						'file' 			=> $cssPath.'magnific-popup.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'edumark-default-css',
						'file' 			=> $cssPath.'default.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'edumark-style-css',
						'file' 			=> $cssPath.'style.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0-s3',
					),
					
					array(
						'handler'		=> 'edumark-style',
						'file' 			=> get_stylesheet_uri(),
					),
				),
				
				'scripts' => array(
					array(
						'handler'		=> 'edumark-bootstrap',
						'file' 			=> $jsPath.'bootstrap.min.js',
						'dependency' 	=> array(),
						'version' 		=> '5.3.8-4',
						'in_footer' 	=> true
					),
					
					array(
						'handler'		=> 'edumark-ui-js',
						'file' 			=> $jsPath . ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? 'colorlib-ui.js' : 'colorlib-ui.min.js' ),
						'dependency' 	=> array(),
						'version' 		=> '3.0.0',
						'in_footer' 	=> true
					),
					array(
						'handler'		=> 'edumark-custom',
						'file' 			=> $jsPath.'main.js',
						'dependency' 	=> array( 'masonry', 'edumark-ui-js' ),
						'version' 		=> $this->edumark_version . '-s3',
						'in_footer' 	=> true
					),

				)
			);

			return $scripts;

		} // end enqueu method 

		// Google Font  
		private function google_font(){
			$font_url = '';

			/*
			 * The families this theme uses are bundled under
			 * assets/fonts/google, so nothing is fetched from Google and
			 * no request leaves the visitor's browser for a third party.
			 *
			 * Translators can still turn the fonts off for scripts these
			 * families do not cover.
			 */
			if ( 'off' !== _x( 'on', 'Google font: on or off', 'edumark' ) ) {
				$font_url = get_template_directory_uri() . '/assets/css/google-fonts.css';
			}

			return esc_url_raw( $font_url );
		} //End google_font method

		private function customizer_init(){

		
			

			
			// Instantiate edumark theme customizer
			$edumark_theme_customizer = new edumark_theme_customizer();
		}
	} // End Edumark Class

?>