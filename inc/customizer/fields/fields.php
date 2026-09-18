<?php 
/**
 * @Packge     : Edumark
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 * Customizer section fields
 *
 */
 
// Header background color field
Colorlib_Customizer::add_field(
    'edumark_header_bg_color',
    array(
        'type'        => 'colorlib-color-picker',
        'label'       => esc_html__( 'Sticky Header BG Color', 'edumark' ),
        'description' => esc_html__( 'Select the header background color.', 'edumark' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'edumark_header_section',
        'default'     => '#fff',
    )
);


// Header right button toggle section
Colorlib_Customizer::add_field(
    'edumark_header_button_section_separator',
    array(
        'type'        => 'colorlib-separator',
        'label'       => esc_html__( 'Header right content Section', 'edumark' ),
        'section'     => 'edumark_header_section',

    )
);


// Header login button toggle
Colorlib_Customizer::add_field(
	'edumark_login_toggle',
	array(
		'type'        => 'colorlib-toggle',
		'label'       => esc_html__( 'Header Login show/hide', 'edumark' ),
		'section'     => 'edumark_header_section',
		'default'     => true
	)
);

// Header phone number toggle
Colorlib_Customizer::add_field(
	'edumark_phone_number_toggle',
	array(
		'type'        => 'colorlib-toggle',
		'label'       => esc_html__( 'Header Phone Number show/hide', 'edumark' ),
		'section'     => 'edumark_header_section',
		'default'     => true
	)
);

// Header phone number
Colorlib_Customizer::add_field(
	'edumark_phone_number',
	array(
		'type'              => 'text',
		'label'             => esc_html__( 'Header phone number', 'edumark' ),
		'section'           => 'edumark_header_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => esc_html__( '+10 378 467 3672', 'edumark' ),
	)
);

// Header right button bg color field
Colorlib_Customizer::add_field(
    'edumark_header_right_btn_color',
    array(
        'type'        => 'colorlib-color-picker',
        'label'       => esc_html__( 'Header right button color', 'edumark' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'edumark_header_section',
        'default'     => '#FDAE5C'
    )
);

/***********************************
 * Blog Section Fields
 ***********************************/
 
// Post excerpt length field
Colorlib_Customizer::add_field(
    'edumark_excerpt_length',
    array(
        'type'        => 'text',
        'label'       => esc_html__( 'Set post excerpt length', 'edumark' ),
        'description' => esc_html__( 'Set post excerpt length.', 'edumark' ),
        'section'     => 'edumark_blog_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'     => '30',
    )
);

// Blog single page social share icon
Colorlib_Customizer::add_field(
    'edumark_blog_meta',
    array(
        'type'        => 'colorlib-toggle',
        'label'       => esc_html__( 'Blog page post meta show/hide', 'edumark' ),
        'section'     => 'edumark_blog_section',
        'default'     => true
    )
);
Colorlib_Customizer::add_field(
    'edumark_like_btn',
    array(
        'type'        => 'colorlib-toggle',
        'label'       => esc_html__( 'Blog Single Page Like Button show/hide', 'edumark' ),
        'section'     => 'edumark_blog_section',
        'default'     => true
    )
);
Colorlib_Customizer::add_field(
    'edumark_blog_share',
    array(
        'type'        => 'colorlib-toggle',
        'label'       => esc_html__( 'Blog Single Page Share show/hide', 'edumark' ),
        'section'     => 'edumark_blog_section',
        'default'     => true
    )
);


/***********************************
 * 404 Page Section Fields
 ***********************************/

// 404 text #1 field
Colorlib_Customizer::add_field(
    'edumark_fof_titleone',
    array(
        'type'              => 'text',
        'label'             => esc_html__( '404 Text #1', 'edumark' ),
        'section'           => 'edumark_fof_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 'Say Hello.'
    )
);
// 404 text #2 field
Colorlib_Customizer::add_field(
    'edumark_fof_titletwo',
    array(
        'type'              => 'text',
        'label'             => esc_html__( '404 Text #2', 'edumark' ),
        'section'           => 'edumark_fof_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 'Say Hello.'
    )
);
// 404 text #1 color field
Colorlib_Customizer::add_field(
    'edumark_fof_textone_color',
    array(
        'type'        => 'colorlib-color-picker',
        'label'       => esc_html__( '404 Text #1 Color', 'edumark' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'edumark_fof_section',
        'default'     => '#000000',
    )
);
// 404 text #2 color field
Colorlib_Customizer::add_field(
    'edumark_fof_texttwo_color',
    array(
        'type'        => 'colorlib-color-picker',
        'label'       => esc_html__( '404 Text #2 Color', 'edumark' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'edumark_fof_section',
        'default'     => '#656565',
    )
);
// 404 background color field
Colorlib_Customizer::add_field(
    'edumark_fof_bg_color',
    array(
        'type'        => 'colorlib-color-picker',
        'label'       => esc_html__( '404 Page Background Color', 'edumark' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'edumark_fof_section',
        'default'     => '#fff',
    )
);

/***********************************
 * Footer Section Fields
 ***********************************/

// Footer Widget section
Colorlib_Customizer::add_field(
    'footer_widget_separator',
    array(
        'type'        => 'colorlib-separator',
        'label'       => esc_html__( 'Footer Widget Section', 'edumark' ),
        'section'     => 'edumark_footer_section',

    )
);

// Footer widget toggle field
Colorlib_Customizer::add_field(
    'edumark_footer_widget_toggle',
    array(
        'type'        => 'colorlib-toggle',
        'label'       => esc_html__( 'Footer widget show/hide', 'edumark' ),
        'description' => esc_html__( 'Toggle to display footer widgets.', 'edumark' ),
        'section'     => 'edumark_footer_section',
        'default'     => true,
    )
);


// Footer widget background color field
Colorlib_Customizer::add_field(
    'edumark_footer_bg_color',
    array(
        'type'        => 'colorlib-color-picker',
        'label'       => esc_html__( 'Footer Background Color', 'edumark' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'edumark_footer_section',
        'default'     => '#f7f7f7',
    )
);

// Footer widget text color field
Colorlib_Customizer::add_field(
    'edumark_footer_widget_text_color',
    array(
        'type'        => 'colorlib-color-picker',
        'label'       => esc_html__( 'Footer Text Color', 'edumark' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'edumark_footer_section',
        'default'     => '#C7C7C7',
    )
);

// Footer widget title color field
Colorlib_Customizer::add_field(
    'edumark_footer_widget_title_color',
    array(
        'type'        => 'colorlib-color-picker',
        'label'       => esc_html__( 'Footer Widget Title Color', 'edumark' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'edumark_footer_section',
        'default'     => '#fff',
    )
);

// Footer widget anchor color field
Colorlib_Customizer::add_field(
    'edumark_footer_widget_anchor_color',
    array(
        'type'        => 'colorlib-color-picker',
        'label'       => esc_html__( 'Footer Anchor Color', 'edumark' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'edumark_footer_section',
        'default'     => '#BABABA',
    )
);

// Footer widget anchor hover color field
Colorlib_Customizer::add_field(
    'edumark_footer_widget_anchor_hover_color',
    array(
        'type'        => 'colorlib-color-picker',
        'label'       => esc_html__( 'Footer Anchor Hover Color', 'edumark' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'edumark_footer_section',
        'default'     => '#FDAE5C',
    )
);


// Footer Copyright section
Colorlib_Customizer::add_field(
    'edumark_footer_copyright_separator',
    array(
        'type'        => 'colorlib-separator',
        'label'       => esc_html__( 'Footer Copyright Section', 'edumark' ),
        'section'     => 'edumark_footer_section',
        'default'     => true,

    )
);

// Footer copyright text field
// Copy right text
$url = 'https://colorlib.com/';
$copyText = sprintf( __( 'Theme by %s colorlib %s Copyright &copy; %s  |  All rights reserved.', 'edumark' ), '<a target="_blank" href="' . esc_url( $url ) . '">', '</a>', date( 'Y' ) );
Colorlib_Customizer::add_field(
    'edumark_footer_copyright_text',
    array(
        'type'        => 'colorlib-text-editor',
        'label'       => esc_html__( 'Footer copyright text', 'edumark' ),
        'section'     => 'edumark_footer_section',
        'default'     => wp_kses_post( $copyText ),
    )
);

