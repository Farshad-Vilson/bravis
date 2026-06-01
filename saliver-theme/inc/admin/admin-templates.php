<?php

if( !defined( 'ABSPATH' ) )
	exit; 

class Saliver_Admin_Templates extends Saliver_Base{

	public function __construct() {
		$this->add_action( 'admin_menu', 'register_page', 20 );
	}
 
	public function register_page() {
		add_submenu_page(
			'pxlart',
		    esc_html__( 'Templates', 'saliver' ),
		    esc_html__( 'Templates', 'saliver' ),
		    'manage_options',
		    'edit.php?post_type=pxl-template',
		    false
		);
	}
}
new Saliver_Admin_Templates;
