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

/***********************************
 * General Section Fields
 ***********************************/

 // Theme color field
Epsilon_Customizer::add_field(
    'edumark_theme_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Theme Color', 'edumark' ),
        'description' => esc_html__( 'Select the theme color.', 'edumark' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'edumark_general_section',
        'default'     => '#ff663b',
    )
);

 // Theme color field
Epsilon_Customizer::add_field(
    'edumark_theme_box_shadow_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Box Shadow Color', 'edumark' ),
        'description' => esc_html__( 'Applies where it\'s needed.', 'edumark' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'edumark_general_section',
        'default'     => 'rgba(255, 126, 95, 0.15)',
    )
);

 
// Header background color field
Epsilon_Customizer::add_field(
    'edumark_header_bg_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Sticky Header BG Color', 'edumark' ),
        'description' => esc_html__( 'Select the header background color.', 'edumark' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'edumark_header_section',
        'default'     => '#fff',
    )
);


// Header right button toggle section
Epsilon_Customizer::add_field(
    'edumark_header_button_section_separator',
    array(
        'type'        => 'epsilon-separator',
        'label'       => esc_html__( 'Header right content Section', 'edumark' ),
        'section'     => 'edumark_header_section',

    )
);


// Header login button toggle
Epsilon_Customizer::add_field(
	'edumark_login_toggle',
	array(
		'type'        => 'epsilon-toggle',
		'label'       => esc_html__( 'Header Login show/hide', 'edumark' ),
		'section'     => 'edumark_header_section',
		'default'     => true
	)
);

// Header phone number toggle
Epsilon_Customizer::add_field(
	'edumark_phone_number_toggle',
	array(
		'type'        => 'epsilon-toggle',
		'label'       => esc_html__( 'Header Phone Number show/hide', 'edumark' ),
		'section'     => 'edumark_header_section',
		'default'     => true
	)
);

// Header phone number
Epsilon_Customizer::add_field(
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
Epsilon_Customizer::add_field(
    'edumark_header_right_btn_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header right button bg color', 'edumark' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'edumark_header_section',
        'default'     => '#ff663b'
    )
);

// Header right button hover bg color field
Epsilon_Customizer::add_field(
    'edumark_header_right_btn_hover_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header right button hover bg color', 'edumark' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'edumark_header_section',
        'default'     => '#ff663b'
    )
);



/***********************************
 * Blog Section Fields
 ***********************************/
 
// Post excerpt length field
Epsilon_Customizer::add_field(
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
Epsilon_Customizer::add_field(
    'edumark_blog_meta',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Blog page post meta show/hide', 'edumark' ),
        'section'     => 'edumark_blog_section',
        'default'     => true
    )
);
Epsilon_Customizer::add_field(
    'edumark_like_btn',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Blog Single Page Like Button show/hide', 'edumark' ),
        'section'     => 'edumark_blog_section',
        'default'     => true
    )
);
Epsilon_Customizer::add_field(
    'edumark_blog_share',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Blog Single Page Share show/hide', 'edumark' ),
        'section'     => 'edumark_blog_section',
        'default'     => true
    )
);


/***********************************
 * 404 Page Section Fields
 ***********************************/

// 404 text #1 field
Epsilon_Customizer::add_field(
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
Epsilon_Customizer::add_field(
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
Epsilon_Customizer::add_field(
    'edumark_fof_textone_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( '404 Text #1 Color', 'edumark' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'edumark_fof_section',
        'default'     => '#000000',
    )
);
// 404 text #2 color field
Epsilon_Customizer::add_field(
    'edumark_fof_texttwo_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( '404 Text #2 Color', 'edumark' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'edumark_fof_section',
        'default'     => '#656565',
    )
);
// 404 background color field
Epsilon_Customizer::add_field(
    'edumark_fof_bg_color',
    array(
        'type'        => 'epsilon-color-picker',
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
Epsilon_Customizer::add_field(
    'footer_widget_separator',
    array(
        'type'        => 'epsilon-separator',
        'label'       => esc_html__( 'Footer Widget Section', 'edumark' ),
        'section'     => 'edumark_footer_section',

    )
);

// Footer widget toggle field
Epsilon_Customizer::add_field(
    'edumark_footer_widget_toggle',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Footer widget show/hide', 'edumark' ),
        'description' => esc_html__( 'Toggle to display footer widgets.', 'edumark' ),
        'section'     => 'edumark_footer_section',
        'default'     => true,
    )
);


// Footer widget background color field
Epsilon_Customizer::add_field(
    'edumark_footer_bg_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Background Color', 'edumark' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'edumark_footer_section',
        'default'     => '#f7f7f7',
    )
);

// Footer widget text color field
Epsilon_Customizer::add_field(
    'edumark_footer_widget_text_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Text Color', 'edumark' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'edumark_footer_section',
        'default'     => '#888',
    )
);

// Footer widget title color field
Epsilon_Customizer::add_field(
    'edumark_footer_widget_title_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Widget Title Color', 'edumark' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'edumark_footer_section',
        'default'     => '#0c2e60',
    )
);

// Footer widget anchor color field
Epsilon_Customizer::add_field(
    'edumark_footer_widget_anchor_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Anchor Color', 'edumark' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'edumark_footer_section',
        'default'     => '#ff663b',
    )
);

// Footer widget anchor hover color field
Epsilon_Customizer::add_field(
    'edumark_footer_widget_anchor_hover_color',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Anchor Hover Color', 'edumark' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'edumark_footer_section',
        'default'     => '#ff663b',
    )
);


// Footer Copyright section
Epsilon_Customizer::add_field(
    'edumark_footer_copyright_separator',
    array(
        'type'        => 'epsilon-separator',
        'label'       => esc_html__( 'Footer Copyright Section', 'edumark' ),
        'section'     => 'edumark_footer_section',
        'default'     => true,

    )
);

// Footer copyright text field
// Copy right text
$url = 'https://colorlib.com/';
$copyText = sprintf( __( 'Theme by %s colorlib %s Copyright &copy; %s  |  All rights reserved.', 'edumark' ), '<a target="_blank" href="' . esc_url( $url ) . '">', '</a>', date( 'Y' ) );
Epsilon_Customizer::add_field(
    'edumark_footer_copyright_text',
    array(
        'type'        => 'epsilon-text-editor',
        'label'       => esc_html__( 'Footer copyright text', 'edumark' ),
        'section'     => 'edumark_footer_section',
        'default'     => wp_kses_post( $copyText ),
    )
);

