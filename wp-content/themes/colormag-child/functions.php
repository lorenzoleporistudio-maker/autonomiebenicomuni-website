<?php

add_action( 'wp_enqueue_scripts', 'enqueue_parent_theme_style' );
function enqueue_parent_theme_style() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
    wp_enqueue_style(
        'google-fonts-merriweather',
        'https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&display=swap',
        array(),
        null
    );
}