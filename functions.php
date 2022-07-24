<?php

function newdev_register_styles() {
    $theme_version  = wp_get_theme()->get( 'Version' );
    $version_string = is_string( $theme_version ) ? $theme_version : false;

    // Register main stylesheet.
    wp_register_style(
        'newdev-style',
        get_template_directory_uri() . '/style.css',
        array(),
        $version_string
    );

    // Enqueue main stylesheet.
    wp_enqueue_style( 'newdev-style' );

}
add_action( 'wp_enqueue_scripts', 'newdev_register_styles' );

function newdev_register_block_styles() {
	$styled_blocks = ['image'];
	foreach ( $styled_blocks as $block_name ) {
		$args = array(
			'handle' => "newdev-$block_name",
			'src'    => get_theme_file_uri( "assets/css/blocks/$block_name.css" ),
			$args['path'] = get_theme_file_path( "assets/css/blocks/$block_name.css" ),
		);
		wp_enqueue_block_style( "core/$block_name", $args );
	}
}
add_action( 'after_setup_theme', 'newdev_register_block_styles' );