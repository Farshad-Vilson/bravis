<?php
/**
 * Saliver Child Theme — functions.php
 *
 * @package Saliver Child
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// -------------------------------------------------------
// Enqueue parent and child styles
// -------------------------------------------------------
add_action( 'wp_enqueue_scripts', 'saliver_child_enqueue_styles', 20 );
function saliver_child_enqueue_styles() {

    $parent_version = wp_get_theme( get_template() )->get( 'Version' );
    $child_version  = wp_get_theme()->get( 'Version' );

    // Parent stylesheet (already enqueued by parent theme but we ensure dependency)
    wp_enqueue_style(
        'saliver-parent-style',
        get_template_directory_uri() . '/assets/css/style.css',
        array(),
        $parent_version
    );

    // Child stylesheet
    wp_enqueue_style(
        'saliver-child-style',
        get_stylesheet_directory_uri() . '/assets/css/child.css',
        array( 'saliver-parent-style' ),
        $child_version
    );

    // RTL extra overrides (parent provides base RTL via body.rtl; child can add more)
    if ( is_rtl() ) {
        wp_enqueue_style(
            'saliver-child-rtl',
            get_stylesheet_directory_uri() . '/assets/css/rtl.css',
            array( 'saliver-child-style' ),
            $child_version
        );
    }
}

// -------------------------------------------------------
// Load child theme translations
// -------------------------------------------------------
add_action( 'after_setup_theme', 'saliver_child_setup', 11 );
function saliver_child_setup() {
    load_child_theme_textdomain( 'saliver-child', get_stylesheet_directory() . '/languages' );
}

// -------------------------------------------------------
// Add your custom code below this line
// -------------------------------------------------------
