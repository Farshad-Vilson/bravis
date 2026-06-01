<?php
/**
 * Theme functions: init, enqueue scripts and styles, include required files and widgets.
 *
 * @package Bravis-Themes
 * @since Saliver 1.0
 */

if(!defined('DEV_MODE')){ define('DEV_MODE', true); }

if(!defined('THEME_DEV_MODE_ELEMENTS') && is_user_logged_in()){
    define('THEME_DEV_MODE_ELEMENTS', true);
}
 
require_once get_template_directory() . '/inc/classes/class-main.php';

if ( is_admin() ){ 
	require_once get_template_directory() . '/inc/admin/admin-init.php'; }
 
/**
 * Theme Require
*/
saliver()->require_folder('inc');
saliver()->require_folder('inc/classes');
saliver()->require_folder('inc/theme-options');
saliver()->require_folder('template-parts/widgets');
if(class_exists('Woocommerce')){
    saliver()->require_folder('woocommerce');
}