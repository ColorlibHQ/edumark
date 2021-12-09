<?php 
/**
 * @Packge     : Edumark
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 * Customizer panels and sections
 *
 */

/***********************************
 * Register customizer panels
 ***********************************/

$panels = array(
    /**
     * Theme Options Panel
     */
    array(
        'id'   => 'edumark_theme_options_panel',
        'args' => array(
            'priority'       => 0,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => esc_html__( 'Theme Options', 'edumark' ),
        ),
    )
);


/***********************************
 * Register customizer sections
 ***********************************/


$sections = array(
    
    /**
     * Header Section
     */
    array(
        'id'   => 'edumark_header_section',
        'args' => array(
            'title'    => esc_html__( 'Header', 'edumark' ),
            'panel'    => 'edumark_theme_options_panel',
            'priority' => 2,
        ),
    ),

    /**
     * Blog Section
     */
    array(
        'id'   => 'edumark_blog_section',
        'args' => array(
            'title'    => esc_html__( 'Blog', 'edumark' ),
            'panel'    => 'edumark_theme_options_panel',
            'priority' => 3,
        ),
    ),



    /**
     * 404 Page Section
     */
    array(
        'id'   => 'edumark_fof_section',
        'args' => array(
            'title'    => esc_html__( '404 Page', 'edumark' ),
            'panel'    => 'edumark_theme_options_panel',
            'priority' => 6,
        ),
    ),

    /**
     * Footer Section
     */
    array(
        'id'   => 'edumark_footer_section',
        'args' => array(
            'title'    => esc_html__( 'Footer Page', 'edumark' ),
            'panel'    => 'edumark_theme_options_panel',
            'priority' => 7,
        ),
    ),



);


/***********************************
 * Add customizer elements
 ***********************************/
$collection = array(
    'panel'   => $panels,
    'section' => $sections,
);

Epsilon_Customizer::add_multiple( $collection );

?>