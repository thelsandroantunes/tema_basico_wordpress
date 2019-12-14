<?php 

function wpcurso_customizer( $wp_customize ){

	// Copyright

	$wp_customize->add_section( 
		'sec_copyright', array(
			'title' => 'Copyright',
			'description' => 'Copyright Section'
		)
	);

	$wp_customize->add_setting(
		'set_copyright', array(
			'type' => 'theme_mod',
			'default' => 'Copyright X - All rights reserved',
			'sanitize_callback' => 'wp_filter_nohtml_kses'
		)
	);

	$wp_customize->add_control(
		'set_copyright', array(
			'label' => 'Copyright',
			'description' => 'Please, type your copyright information here',
			'section' => 'sec_copyright',
			'type' => 'text'
		)
	);	

	//Map
	$wp_customize->add_section(
		'sec_map', array(
			'title' => 'Map',
			'description' => 'Map Section'			
		)
	);

	// API Key
	$wp_customize->add_setting(
		'set_map_apikey', array(
			'type'=>'theme_mod',
			'default'=>'',
			'sanitize_callback' => 'wp_filter_nohtml_kses'
		)
	);

	$wp_customize->add_control(
		'set_map_apikey', array(
			'label' => 'API Key',
			'description' => 'Get your key <a target="_blank" href="https://console.developers.google.com/flows/enableapi?apiid=maps_backend">here</a>',
			'section' => 'sec_map',
			'type' => 'text'
		)
	);

	//Address

	$wp_customize->add_setting(
		'set_map_address', array(
			'type'=>'theme_mod',
			'default'=>'',
			'sanitize_callback' => 'esc_textarea'
		)
	);

	$wp_customize->add_control(
		'set_map_address', array(
			'label' => 'Type your address here',
			'description' => 'No special characters allowed',
			'section' => 'sec_map',
			'type' => 'textarea'
		)
	);

	//Slider 
	$wp_customize->add_section(
		'sec_slider', array(
			'title' => 'Slider',
			'description' => 'Slider Section'			
		)
	);

	//Design
	$wp_customize->add_setting(
		'set_slider_option', array(
			'type'=>'theme_mod',
			'default'=>'1',
			'sanitize_callback' => 'wpcurso_sanitize_select'
		)
	);

	$wp_customize->add_control(
		'set_slider_option', array(
			'label' => 'Choose your design type here',
			'description' => 'Choose your design type',
			'section' => 'sec_slider',
			'type' => 'select',
			'choices' => array(
				'1' => 'Design Type 1',
				'2' => 'Design Type 2',
				'3' => 'Design Type 3',
				'4' => 'Design Type 4',
			)
		)
	);

	//Limit 
	$wp_customize->add_setting(
		'set_slider_limit', array(
			'type'=>'theme_mod',
			'default'=>'5',
			'sanitize_callback' => 'absint'
		)
	);

	$wp_customize->add_control(
		'set_slider_limit', array(
			'label' => 'Number of posts to display',
			'description' => 'Choose the number of posts to be displayed',
			'section' => 'sec_slider',
			'type' => 'number'			
		)
	);
}
add_action( 'customize_register', 'wpcurso_customizer' );


function wpcurso_sanitize_select($input, $setting){
	$input = sanitize_key($input);

	$choices = $setting->manager->get_control($setting->id)->choices;

	return (array_key_exists($input, $choices ) ? $input : $setting->default);
}