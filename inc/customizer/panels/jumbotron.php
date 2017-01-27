<?php
// Set prefix
$prefix = 'illdy';


/***********************************************/
/******************* General *******************/
/***********************************************/
$wp_customize->add_section( $prefix . '_jumbotron_general', array(
	'title'       => __( 'Jumbotron Section', 'illdy' ),
	'description' => __( 'Control various jumbotron related settings. Will only be displayed if a <strong>custom front-page is set in Settings -> Reading.</strong>', 'illdy' ),
	'priority'    => 10,
	'panel'       => 'illdy_frontpage_panel'
) );



// Featured image in header
$wp_customize->add_setting( $prefix . '_jumbotron_enable_featured_image', array(
	'sanitize_callback' => $prefix . '_sanitize_checkbox',
	'default'           => 0,
	'transport'         => 'postMessage',
) );

$wp_customize->add_control(  new Epsilon_Control_Toggle( $wp_customize, $prefix . '_jumbotron_enable_featured_image', array(
	'type'        => 'mte-toggle',
	'label'       => __( 'Featured image as jumbotron ?', 'illdy' ),
	'description' => __( 'This will remove the featured image from inside the post content and use it in the jumbotron as a background image. Works for single posts & pages.', 'illdy' ),
	'section'     => $prefix . '_jumbotron_general',
) ) );

// Featured image in header
$wp_customize->add_setting( $prefix . '_jumbotron_enable_parallax_effect', array(
	'sanitize_callback' => $prefix . '_sanitize_checkbox',
	'default'           => 1,
	'transport'         => 'postMessage',
) );

$wp_customize->add_control(  new Epsilon_Control_Toggle( $wp_customize, $prefix . '_jumbotron_enable_parallax_effect', array(
	'type'        => 'mte-toggle',
	'label'       => __( 'Parallax effect on header image ?', 'illdy' ),
	'description' => __( 'Enabling this will add a parallax scrolling effect for the header image.', 'illdy' ),
	'section'     => $prefix . '_jumbotron_general',
) ) );

// First word from title
$wp_customize->add_setting( $prefix . '_jumbotron_general_first_row_from_title', array(
	'sanitize_callback' => 'illdy_sanitize_html',
	'default'           => __( 'Clean', 'illdy' ),
	'transport'         => 'postMessage',
) );
$wp_customize->add_control( $prefix . '_jumbotron_general_first_row_from_title', array(
	'label'    => __( 'First word from title', 'illdy' ),
	'section'  => $prefix . '_jumbotron_general',
) );

$wp_customize->selective_refresh->add_partial( $prefix .'_jumbotron_general_first_row_from_title', array(
    'selector' => '#header .bottom-header h1 span:nth-child(1)',
    'render_callback' => $prefix .'_jumbotron_general_first_row_from_title',
) );

// Second word from title
$wp_customize->add_setting( $prefix . '_jumbotron_general_second_row_from_title', array(
	'sanitize_callback' => 'illdy_sanitize_html',
	'default'           => __( 'Slick', 'illdy' ),
	'transport'         => 'postMessage',
) );
$wp_customize->add_control( $prefix . '_jumbotron_general_second_row_from_title', array(
	'label'    => __( 'Second word from title', 'illdy' ),
	'section'  => $prefix . '_jumbotron_general',
) );

$wp_customize->selective_refresh->add_partial( $prefix .'_jumbotron_general_second_row_from_title', array(
    'selector' => '#header .bottom-header h1 span:nth-child(3)',
    'render_callback' => $prefix .'_jumbotron_general_second_row_from_title',
) );

// Third word from title
$wp_customize->add_setting( $prefix . '_jumbotron_general_third_row_from_title', array(
	'sanitize_callback' => 'illdy_sanitize_html',
	'default'           => __( 'Pixel Perfect', 'illdy' ),
	'transport'         => 'postMessage',
) );
$wp_customize->add_control( $prefix . '_jumbotron_general_third_row_from_title', array(
	'label'    => __( 'Third word from title', 'illdy' ),
	'section'  => $prefix . '_jumbotron_general',
) );

$wp_customize->selective_refresh->add_partial( $prefix .'_jumbotron_general_third_row_from_title', array(
    'selector' => '#header .bottom-header h1 span:nth-child(5)',
    // 'render_callback' => $prefix .'_jumbotron_general_second_row_from_title',
) );

// Entry
if ( get_theme_mod( $prefix . '_jumbotron_general_entry' ) ) {

	$wp_customize->add_setting( $prefix . '_jumbotron_general_entry', array(
		'sanitize_callback' => 'wp_kses_post',
		'default'           => __( 'lldy is a great one-page theme, perfect for developers and designers but also for someone who just wants a new website for his business. Try it now!', 'illdy' ),
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control(  new Epsilon_Editor_Custom_Control(
        $wp_customize, $prefix . '_jumbotron_general_entry', array(
		'label'       => __( 'Entry', 'illdy' ),
		'description' => __( 'The content added in this field will show below the title.', 'illdy' ),
		'section'     => $prefix . '_jumbotron_general',
	) ) );

}

$wp_customize->selective_refresh->add_partial( $prefix .'_jumbotron_general_entry', array(
    'selector' => '#header .bottom-header .col-sm-8 p',
) );


// First button text
$wp_customize->add_setting( $prefix . '_jumbotron_general_first_button_title', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'           => __( 'Learn more', 'illdy' ),
	'transport'         => 'postMessage',
) );
$wp_customize->add_control( $prefix . '_jumbotron_general_first_button_title', array(
	'label'    => __( 'First button title', 'illdy' ),
	'section'  => $prefix . '_jumbotron_general',
) );
$wp_customize->selective_refresh->add_partial( $prefix .'_jumbotron_general_first_button_title', array(
    'selector' => '#header .bottom-header .col-sm-8 .header-button-one',
) );

// First button URL
$wp_customize->add_setting( 'illdy_jumbotron_general_first_button_url', array(
	'sanitize_callback' => 'esc_url_raw',
	'default'           => esc_url( '#' ),
	'transport'         => 'postMessage',
) );
$wp_customize->add_control( 'illdy_jumbotron_general_first_button_url', array(
	'label'    => __( 'First button URL', 'illdy' ),
	'section'  => $prefix . '_jumbotron_general',
	'settings' => 'illdy_jumbotron_general_first_button_url',
) );


// Second button text
$wp_customize->add_setting( $prefix . '_jumbotron_general_second_button_title', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'           => __( 'Download', 'illdy' ),
	'transport'         => 'postMessage',
) );
$wp_customize->add_control( $prefix . '_jumbotron_general_second_button_title', array(
	'label'    => __( 'Second button title', 'illdy' ),
	'section'  => $prefix . '_jumbotron_general',
) );
$wp_customize->selective_refresh->add_partial( $prefix .'_jumbotron_general_second_button_title', array(
    'selector' => '#header .bottom-header .col-sm-8 .header-button-two',
) );

// Second button URL
$wp_customize->add_setting( 'illdy_jumbotron_general_second_button_url', array(
	'sanitize_callback' => 'esc_url_raw',
	'default'           => esc_url( '#' ),
	'transport'         => 'postMessage',
) );
$wp_customize->add_control( 'illdy_jumbotron_general_second_button_url', array(
	'label'    => __( 'Second button URL', 'illdy' ),
	'section'  => $prefix . '_jumbotron_general',
	'settings' => 'illdy_jumbotron_general_second_button_url',
) );

// Colors & Backgrounds
$wp_customize->add_setting( $prefix . '_jumbotron_tab', array(
        'transport'         => 'postMessage'
    )
);
$wp_customize->add_control(  new Epsilon_Control_Tab( $wp_customize,
    $prefix . '_jumbotron_tab',
    array(
        'type'      => 'epsilon-tab',
        'section'   => $prefix . '_jumbotron_general',
        'buttons'   => array(
            array(
                'name' => __( 'Colors', 'illdy' ),
                'fields'    => array(
                	$prefix . '_jumbotron_title_color',
                    $prefix . '_jumbotron_points_color',
                    $prefix . '_jumbotron_descriptions_color',
                    $prefix . '_jumbotron_first_button_color',
                    $prefix . '_jumbotron_right_button_color',
                    $prefix . '_jumbotron_general_color',
                    $prefix . '_jumbotron_first_button_background',
                    $prefix . '_jumbotron_second_button_background',
                    $prefix . '_jumbotron_second_button_background_hover',
                	),
                'active' => true
                ),
            array(
                'name' => __( 'Backgrounds', 'illdy' ),
                'fields'    => array(
                    $prefix . '_jumbotron_general_image',
                    $prefix . '_jumbotron_background_size',
                    $prefix . '_jumbotron_background_repeat',
                    $prefix . '_jumbotron_background_attachment',
                    ),
                ),
            ),
    ) )
);

// Background Image
$wp_customize->add_setting( $prefix . '_jumbotron_general_image', array(
	'sanitize_callback' => 'esc_url',
	'default'           => esc_url( get_template_directory_uri() . '/layout/images/front-page/front-page-header.jpg' ),
	'transport'         => 'postMessage',
) );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $prefix . '_jumbotron_general_image', array(
	'label'    => __( 'Background Image', 'illdy' ),
	'section'  => $prefix . '_jumbotron_general',
	'settings' => $prefix . '_jumbotron_general_image',
) ) );
$wp_customize->add_setting( $prefix . '_jumbotron_background_size', array(
	'default' => 'cover',
	'sanitize_callback' => 'illdy_sanitize_background_size',
	'transport'         => 'postMessage',
) );
$wp_customize->add_control( $prefix . '_jumbotron_background_size', array(
	'label'      => __( 'Image Size' ),
	'section'    => $prefix . '_jumbotron_general',
	'type'       => 'select',
	'choices'    => array(
		'auto'    => __( 'Original' ),
		'contain' => __( 'Fit to Screen' ),
		'cover'   => __( 'Fill Screen' ),
	),
) );

$wp_customize->add_setting( $prefix . '_jumbotron_background_repeat', array(
	'sanitize_callback' => $prefix . '_sanitize_checkbox',
	'default'           => 0,
	'transport'         => 'postMessage',
) );

$wp_customize->add_control(  new Epsilon_Control_Toggle( $wp_customize, $prefix . '_jumbotron_background_repeat', array(
	'type'        => 'mte-toggle',
	'label'       => __( 'Repeat Background Image', 'illdy' ),
	'section'     => $prefix . '_jumbotron_general',
) ) );

$wp_customize->add_setting( $prefix . '_jumbotron_background_attachment', array(
	'sanitize_callback' => $prefix . '_sanitize_checkbox',
	'default'           => 0,
	'transport'         => 'postMessage',
) );

$wp_customize->add_control(  new Epsilon_Control_Toggle( $wp_customize, $prefix . '_jumbotron_background_attachment', array(
	'type'        => 'mte-toggle',
	'label'       => __( 'Scroll with Page', 'illdy' ),
	'section'     => $prefix . '_jumbotron_general',
) ) );


// Background Color
$wp_customize->add_setting( $prefix . '_jumbotron_general_color', array(
	'sanitize_callback' => 'sanitize_hex_color',
	'default'           => '#000000',
	'transport'         => 'postMessage',

) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $prefix . '_jumbotron_general_color', array(
	'label'    => __( 'Background Color', 'illdy' ),
	'section'  => $prefix . '_jumbotron_general',
	'settings' => $prefix . '_jumbotron_general_color',
) ) );

// First Button Background Color
$wp_customize->add_setting( $prefix . '_jumbotron_first_button_background', array(
	'sanitize_callback' => 'sanitize_hex_color',
	'default'           => '#fff',
	'transport'         => 'postMessage',
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $prefix . '_jumbotron_first_button_background', array(
	'label'    => __( 'First Button Background Color', 'illdy' ),
	'section'  => $prefix . '_jumbotron_general',
	'settings' => $prefix . '_jumbotron_first_button_background',
) ) );

// Second Button Background color
$wp_customize->add_setting( $prefix . '_jumbotron_second_button_background', array(
	'sanitize_callback' => 'sanitize_hex_color',
	'default'           => '#f1d204',
	'transport'         => 'postMessage',
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $prefix . '_jumbotron_second_button_background', array(
	'label'    => __( 'Second Button Background Color', 'illdy' ),
	'section'  => $prefix . '_jumbotron_general',
	'settings' => $prefix . '_jumbotron_second_button_background',
) ) );

// Second Button Hover Background color
$wp_customize->add_setting( $prefix . '_jumbotron_second_button_background_hover', array(
	'sanitize_callback' => 'sanitize_hex_color',
	'default'           => '#6a4d8a',
	'transport'         => 'postMessage',
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $prefix . '_jumbotron_second_button_background_hover', array(
	'label'    => __( 'Second Button Hover Background Color', 'illdy' ),
	'section'  => $prefix . '_jumbotron_general',
	'settings' => $prefix . '_jumbotron_second_button_background_hover',
) ) );

// Colors
$wp_customize->add_setting( $prefix . '_jumbotron_title_color', array(
	'sanitize_callback' => 'sanitize_hex_color',
	'default'           => '#fff',
	'transport'         => 'postMessage',
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $prefix . '_jumbotron_title_color', array(
	'label'    => __( 'Title Color', 'illdy' ),
	'section'  => $prefix . '_jumbotron_general',
	'settings' => $prefix . '_jumbotron_title_color',
) ) );

$wp_customize->add_setting( $prefix . '_jumbotron_points_color', array(
	'sanitize_callback' => 'sanitize_hex_color',
	'default'           => '#f1d204',
	'transport'         => 'postMessage',
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $prefix . '_jumbotron_points_color', array(
	'label'    => __( 'Title Points Color', 'illdy' ),
	'section'  => $prefix . '_jumbotron_general',
	'settings' => $prefix . '_jumbotron_points_color',
) ) );

$wp_customize->add_setting( $prefix . '_jumbotron_descriptions_color', array(
	'sanitize_callback' => 'sanitize_hex_color',
	'default'           => '#fff',
	'transport'         => 'postMessage',
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $prefix . '_jumbotron_descriptions_color', array(
	'label'    => __( 'Description Color', 'illdy' ),
	'section'  => $prefix . '_jumbotron_general',
	'settings' => $prefix . '_jumbotron_descriptions_color',
) ) );

$wp_customize->add_setting( $prefix . '_jumbotron_first_button_color', array(
	'sanitize_callback' => 'sanitize_hex_color',
	'default'           => '#fff',
	'transport'         => 'postMessage',
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $prefix . '_jumbotron_first_button_color', array(
	'label'    => __( 'Left Button Text Color', 'illdy' ),
	'section'  => $prefix . '_jumbotron_general',
	'settings' => $prefix . '_jumbotron_first_button_color',
) ) );

$wp_customize->add_setting( $prefix . '_jumbotron_right_button_color', array(
	'sanitize_callback' => 'sanitize_hex_color',
	'default'           => '#fff',
	'transport'         => 'postMessage',
) );
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $prefix . '_jumbotron_right_button_color', array(
	'label'    => __( 'Right Button Text Color', 'illdy' ),
	'section'  => $prefix . '_jumbotron_general',
	'settings' => $prefix . '_jumbotron_right_button_color',
) ) );