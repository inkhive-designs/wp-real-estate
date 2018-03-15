<?php
function wpre_customize_register_skin($wp_customize) {
    //Replace Header Text Color with, separate colors for Title and Description
    $wp_customize->get_setting('header_textcolor')->default = '#000';
    $wp_customize->get_control('header_textcolor')->label =  __('Site Title Color','wp-real-estate');
    $wp_customize->get_section('colors')->title =  __('Theme Skins & Colors','wp-real-estate');
    $wp_customize->get_section('colors')->panel =  'wpre_design_panel';

    $wp_customize->add_setting('wpre_header_desccolor', array(
        'default'     => '#777777',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'wpre_header_desccolor', array(
            'label' => __('Site Tagline Color','wp-real-estate'),
            'section' => 'colors',
            'settings' => 'wpre_header_desccolor',
            'type' => 'color'
        ) )
    );

    //Select the Default Theme Skin
    $wp_customize->add_setting(
        'wpre_skin',
        array(
            'default'=> 'default',
            'sanitize_callback' => 'wpre_sanitize_skin'
        )
    );

    $skins = array( 'default' => __('Default(Red)','wp-real-estate'),
        'orange' =>  __('Orange','wp-real-estate'),
        'green' => __('Green','wp-real-estate'),
    );

    $wp_customize->add_control(
        'wpre_skin',array(
            'settings' => 'wpre_skin',
            'section'  => 'colors',
            'type' => 'select',
            'choices' => $skins,
        )
    );

    function wpre_sanitize_skin( $input ) {
        if ( in_array($input, array('default','orange','brown','green','grayscale') ) )
            return $input;
        else
            return '';
    }
}
add_action('customize_register', 'wpre_customize_register_skin');