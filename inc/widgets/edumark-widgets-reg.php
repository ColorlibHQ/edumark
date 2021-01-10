<?php
// Block direct access
if( !defined( 'ABSPATH' ) ){
    exit( 'Direct script access denied.' );
}

/**
 * @Packge     : Edumark
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
 
function edumark_widgets_init() {
    // sidebar widgets 
    
    register_sidebar(array(
        'name'          => esc_html__('Sidebar widgets', 'edumark'),
        'description'   => esc_html__('Place widgets in sidebar widgets area.', 'edumark'),
        'id'            => 'sidebar_widgets',
        'before_widget' => '<div id="%1$s" class="widget single_sidebar_widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget_title">',
        'after_title'   => '</h4>'
    ));

	// footer widgets register
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer One', 'edumark' ),
			'id'            => 'footer-1',
			'before_widget' => '<div id="%1$s" class="single-footer-widget footer_widget footer_1 %2$s">',
			'after_widget'  => '</div>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Two', 'edumark' ),
			'id'            => 'footer-2',
			'before_widget' => '<div class="col-xl-2 offset-xl-1 col-md-6 col-lg-3"><div id="%1$s" class="single-footer-widget footer_widget footer_2 %2$s">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h3 class="footer_title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Three', 'edumark' ),
			'id'            => 'footer-3',
			'before_widget' => '<div class="col-xl-2 col-md-6 col-lg-2"><div id="%1$s" class="single-footer-widget footer_widget footer_3 %2$s">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h3 class="footer_title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Four', 'edumark' ),
			'id'            => 'footer-4',
			'before_widget' => '<div class="col-xl-3 col-md-6 col-lg-3"><div id="%1$s" class="single-footer-widget footer_widget footer_4 %2$s">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h3 class="footer_title">',
			'after_title'   => '</h3>',
		)
	);
	

}
add_action( 'widgets_init', 'edumark_widgets_init' );
