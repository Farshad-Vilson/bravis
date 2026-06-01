<?php
/**
 * Filters hook for the theme
 *
 * @package Bravis-Themes
 */


function saliver_html_classes( $output ) {
	$output = '';
	$smooth_scroll = saliver()->get_theme_opt( 'smooth_scroll', 'off' );
	if($smooth_scroll == 'on') {
		$output .= ' class="html-smooth-scroll"';
	}
    return $output;
}
add_filter( 'language_attributes', 'saliver_html_classes' );

/* Custom Classs - Body */
function saliver_body_classes( $classes ) {   

	$classes[] = '';
    if (class_exists('ReduxFramework')) {
        $classes[] = ' pxl-redux-page';

	    $footer_fixed = saliver()->get_theme_opt('footer_fixed');
	    $p_footer_fixed = saliver()->get_page_opt('p_footer_fixed');

	    if($p_footer_fixed != false && $p_footer_fixed != 'inherit') {
	    	$footer_fixed = $p_footer_fixed;
	    }

	    if(isset($footer_fixed) && $footer_fixed == 'on') {
	        $classes[] = ' pxl-footer-fixed';
	    }

	    $header_layout = saliver()->get_opt('header_layout');
	    if(isset($header_layout) && $header_layout) {
		    $post_header = get_post($header_layout);
		    $header_type = get_post_meta( $post_header->ID, 'header_type', true );
		    if(isset($header_type)) {
		    	$classes[] = ' bd-'.$header_type.'';
		    }
		}

	    $get_gradient_color = saliver()->get_opt('gradient_color');
		if($get_gradient_color['from'] == $get_gradient_color['to'] ) {
		    $classes[] = ' site-color-normal ';
		} else {
			$classes[] = ' site-color-gradient ';
		}

		$shop_layout = saliver()->get_theme_opt('shop_layout', 'grid');
		if(isset($_GET['shop-layout'])) {
	        $shop_layout = $_GET['shop-layout'];
	    }
		$classes[] = ' woocommerce-layout-'.$shop_layout;

		$body_custom_class = saliver()->get_page_opt('body_custom_class');
		if(!empty($body_custom_class)) {
			$classes[] = $body_custom_class;
		}
    }
    return $classes;
}
add_filter( 'body_class', 'saliver_body_classes' );

/* Post Type Support */
function saliver_add_cpt_support() {
    $cpt_support = get_option( 'elementor_cpt_support' );
    
    if( ! $cpt_support ) {
        $cpt_support = [ 'page', 'post', 'portfolio', 'service', 'career','footer', 'pxl-template' ];
        update_option( 'elementor_cpt_support', $cpt_support );
    }
    
    else if( ! in_array( 'portfolio', $cpt_support ) ) {
        $cpt_support[] = 'portfolio';
        update_option( 'elementor_cpt_support', $cpt_support );
    }

    else if( ! in_array( 'service', $cpt_support ) ) {
        $cpt_support[] = 'service';
        update_option( 'elementor_cpt_support', $cpt_support );
    }

	else if( ! in_array( 'career', $cpt_support ) ) {
        $cpt_support[] = 'career';
        update_option( 'elementor_cpt_support', $cpt_support );
    }

    else if( ! in_array( 'footer', $cpt_support ) ) {
        $cpt_support[] = 'footer';
        update_option( 'elementor_cpt_support', $cpt_support );
    }

    else if( ! in_array( 'pxl-template', $cpt_support ) ) {
        $cpt_support[] = 'pxl-template';
        update_option( 'elementor_cpt_support', $cpt_support );
    }

}
add_action( 'after_switch_theme', 'saliver_add_cpt_support');

add_filter( 'pxl_support_default_cpt', 'saliver_support_default_cpt' );
function saliver_support_default_cpt($postypes){
	return $postypes; // pxl-template
}

add_filter( 'pxl_extra_post_types', 'saliver_add_post_type' );
function saliver_add_post_type( $postypes ) {
	$portfolio_display = saliver()->get_theme_opt('portfolio_display', 'on');
	$portfolio_slug = saliver()->get_theme_opt('portfolio_slug', 'portfolio');
	$portfolio_name = saliver()->get_theme_opt('portfolio_name', 'Portfolio');

	$service_display = saliver()->get_theme_opt('service_display', 'on');
	$service_slug = saliver()->get_theme_opt('service_slug', 'service');
	$service_name = saliver()->get_theme_opt('service_name', 'Services');

	$career_display = saliver()->get_theme_opt('career_display', 'on');
	$career_slug = saliver()->get_theme_opt('career_slug', 'career');
	$career_name = saliver()->get_theme_opt('career_name', 'Career');

	if($portfolio_display == 'on') {
		$portfolio_status = true;
	} else {
		$portfolio_status = false;
	}

	if($service_display == 'on') {
		$service_status = true;
	} else {
		$service_status = false;
	}

	if($career_display	== 'on') {
		$career_status = true;
	} else {
		$career_status = false;
	}

	$postypes['portfolio'] = array(
		'status' => $portfolio_status,
		'item_name'  => $portfolio_name,
		'items_name' => $portfolio_name,
		'args'       => array(
			'rewrite'             => array(
                'slug'       => $portfolio_slug,
 		 	),
		),
	);

	$postypes['service'] = array(
		'status' => $service_status,
		'item_name'  => $service_name,
		'items_name' => $service_name,
		'args'       => array(
			'rewrite'             => array(
                'slug'       => $service_slug,
 		 	),
		),
	);
	
	$postypes['career'] = array(
		'status' => $career_status,
		'item_name'  => $career_name,
		'items_name' => $career_name,
		'args'       => array(
			'rewrite'             => array(
                'slug'       => $career_slug,
 		 	),
		),
	);
  
	return $postypes;
}

add_filter( 'pxl_extra_taxonomies', 'saliver_add_tax' );
function saliver_add_tax( $taxonomies ) {

	$taxonomies['portfolio-category'] = array(
		'status'     => true,
		'post_type'  => array( 'portfolio' ),
		'taxonomy'   => 'Portfolio Categories',
		'taxonomies' => 'Portfolio Categories',
		'args'       => array(
			'rewrite'             => array(
                'slug'       => 'portfolio-category'
 		 	),
		),
		'labels'     => array()
	);

	$taxonomies['service-category'] = array(
		'status'     => true,
		'post_type'  => array( 'service' ),
		'taxonomy'   => 'Service Categories',
		'taxonomies' => 'Service Categories',
		'args'       => array(
			'rewrite'             => array(
                'slug'       => 'service-category'
 		 	),
		),
		'labels'     => array()
	);
	
	$taxonomies['career-category'] = array(
		'status'     => true,
		'post_type'  => array( 'career' ),
		'taxonomy'   => 'Career Categories',
		'taxonomies' => 'Career Categories',
		'args'       => array(
			'rewrite'             => array(
                'slug'       => 'career-category'
 		 	),
		),
		'labels'     => array()
	);

	return $taxonomies;
}

/* Custom Archive Post Type Link */
add_filter( 'post_type_archive_link', 'saliver_get_post_type_archive_link', 10, 2 );
function saliver_get_post_type_archive_link($link, $post_type){

	if( $post_type == 'portfolio'){
		$port_archive_link = saliver()->get_theme_opt('archive_portfolio_link', '');
		    if( !empty($port_archive_link) ){ 
		  	$link = get_permalink($port_archive_link);
		}
	}

	if( $post_type == 'service'){
		$port_archive_link = saliver()->get_theme_opt('archive_service_link', '');
		    if( !empty($port_archive_link) ){ 
		  	$link = get_permalink($port_archive_link);
		}
	}

	if( $post_type == 'career'){
		$port_archive_link = saliver()->get_theme_opt('archive_career_link', '');
		    if( !empty($port_archive_link) ){ 
		  	$link = get_permalink($port_archive_link);
		}
	}

  return $link;
}

add_filter( 'pxl_theme_builder_post_types', 'saliver_theme_builder_post_type' );
function saliver_theme_builder_post_type($postypes){
	//default are header, footer, mega-menu
	return $postypes;
}

add_filter( 'pxl_theme_builder_layout_ids', 'saliver_theme_builder_layout_id' );
function saliver_theme_builder_layout_id($layout_ids){
	//default [], 
	$header_layout        = (int)saliver()->get_opt('header_layout');
	$header_sticky_layout = (int)saliver()->get_opt('header_sticky_layout');
	$footer_layout        = (int)saliver()->get_opt('footer_layout');
	$ptitle_layout        = (int)saliver()->get_opt('ptitle_layout');
	$product_bottom_content        = (int)saliver()->get_opt('product_bottom_content');
	if( $header_layout > 0) 
		$layout_ids[] = $header_layout;
	if( $header_sticky_layout > 0) 
		$layout_ids[] = $header_sticky_layout;
	if( $footer_layout > 0) 
		$layout_ids[] = $footer_layout;
	if( $ptitle_layout > 0) 
		$layout_ids[] = $ptitle_layout;
	if( $product_bottom_content > 0) 
		$layout_ids[] = $product_bottom_content;

	$slider_template = saliver_get_templates_option('slider');
	if( count($slider_template) > 0){
		foreach ($slider_template as $key => $value) {
			$layout_ids[] = $key;
		}
	}

	$tab_template = saliver_get_templates_option('tab');
	if( count($tab_template) > 0){
		foreach ($tab_template as $key => $value) {
			$layout_ids[] = $key;
		}
	}
	
	$mega_menu_id = saliver_get_mega_menu_builder_id();
	if(!empty($mega_menu_id))
		$layout_ids = array_merge($layout_ids, $mega_menu_id);

	$page_popup_id = saliver_get_page_popup_builder_id();
	if(!empty($page_popup_id))
		$layout_ids = array_merge($layout_ids, $page_popup_id);

	return $layout_ids;
}

add_filter( 'pxl_wg_get_source_id_builder', 'saliver_wg_get_source_builder' );
function saliver_wg_get_source_builder($wg_datas){
  $wg_datas['tabs'] = ['control_name' => 'tabs', 'source_name' => 'content_template'];
  $wg_datas['slides'] = ['control_name' => 'slides', 'source_name' => 'slide_template'];
  return $wg_datas;
}

/* Update primary color in Editor Builder */
add_action( 'elementor/preview/enqueue_styles', 'saliver_add_editor_preview_style' );
function saliver_add_editor_preview_style(){
    wp_add_inline_style( 'editor-preview', saliver_editor_preview_inline_styles() );
}
function saliver_editor_preview_inline_styles(){
    $theme_colors = saliver_configs('theme_colors');
    ob_start();
        echo '.elementor-edit-area-active {';
            foreach ($theme_colors as $color => $value) {
                printf('--%1$s-color: %2$s;', str_replace('#', '',$color),  $value['value']);
            }
        echo '}';
    return ob_get_clean();
}
 
add_filter( 'get_the_archive_title', 'saliver_archive_title_remove_label' );
function saliver_archive_title_remove_label( $title ) {
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
	} elseif ( is_author() ) {
		$title = get_the_author();
	} elseif ( is_post_type_archive() ) {
		$title = post_type_archive_title( '', false );
	} elseif ( is_tax() ) {
		$title = single_term_title( '', false );
	} elseif ( is_home() ) {
		$title = single_post_title( '', false );
	}

	return $title;
}

add_filter( 'comment_reply_link', 'saliver_comment_reply_text' );
function saliver_comment_reply_text( $link ) {
	$link = str_replace( 'Reply', ''.esc_attr__('Reply', 'saliver').'', $link );
	return $link;
}
add_filter( 'pxl_enable_pagepopup', 'saliver_enable_pagepopup' );
function saliver_enable_pagepopup() {
	return false;
}
add_filter( 'pxl_enable_megamenu', 'saliver_enable_megamenu' );
function saliver_enable_megamenu() {
	return true;
}
add_filter( 'pxl_enable_onepage', 'saliver_enable_onepage' );
function saliver_enable_onepage() {
	return true;
}

add_filter( 'pxl_support_awesome_pro', 'saliver_support_awesome_pro' );
function saliver_support_awesome_pro() {
	return true;
}
 
add_filter( 'redux_pxl_iconpicker_field/get_icons', 'saliver_add_icons_to_pxl_iconpicker_field' );
function saliver_add_icons_to_pxl_iconpicker_field($icons){
	$custom_icons = []; //'Flaticon' => array(array('flaticon-marker' => 'flaticon-marker')),
	$icons = array_merge($custom_icons, $icons);
	return $icons;
}


add_filter("pxl_mega_menu/get_icons", "saliver_add_icons_to_megamenu");
function saliver_add_icons_to_megamenu($icons){
	$custom_icons = []; //'Flaticon' => array(array('flaticon-marker' => 'flaticon-marker')),
	$icons = array_merge($custom_icons, $icons);
	return $icons;
}
 

/**
 * Move comment field to bottom
 */
add_filter( 'comment_form_fields', 'saliver_comment_field_to_bottom' );
function saliver_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}


/* ------Disable Lazy loading---- */
add_filter( 'wp_lazy_loading_enabled', '__return_false' );

/* ------ Export Settings ---- */
add_filter( 'pxl_export_wp_settings', 'saliver_export_wp_settings' );
function saliver_export_wp_settings($wp_options){
  $wp_options[] = 'mc4wp_default_form_id';
  return $wp_options;
}

/* ------ Theme Info ---- */
add_filter( 'pxl_server_info', 'saliver_add_server_info');
function saliver_add_server_info($infos){
  $infos = [
    'api_url' => 'https://api.bravisthemes.com/',
    'docs_url' => 'https://doc.bravisthemes.com/saliver/',
    'plugin_url' => 'https://api.bravisthemes.com/plugins/',
    'demo_url' => 'https://saliver.bravisthemes.com/',
    'support_url' => 'https://bravisthemes.ticksy.com/',
    'help_url' => 'https://doc.bravisthemes.com/saliver',
    'email_support' => 'bravisthemesagency@gmail.com',
    'video_url' => '#'
  ];
  
  return $infos;
}

/* ------ Template Filter ---- */
add_filter( 'pxl_template_type_support', 'saliver_template_type_support' );
function saliver_template_type_support($type) {
	$extra_type = [
		'header'       => esc_html__('Header Desktop', 'saliver'),
		'header-mobile'          => esc_html__('Header Mobile', 'saliver'),
        'footer'       => esc_html__('Footer', 'saliver'), 
        'mega-menu'    => esc_html__('Mega Menu', 'saliver') ,
		'page-title'          => esc_html__('Page Title', 'saliver'), 
		'hidden-panel'          => esc_html__('Hidden Panel', 'saliver'), 
		'tab'          => esc_html__('Tab', 'saliver'), 
		'popup'          => esc_html__('Popup', 'saliver'),
		'page'          => esc_html__('Page', 'saliver'),
		'slider'          => esc_html__('Slider', 'saliver'),
	];
	return $extra_type;
}

/* Taxonomy Meta Register */ 
add_action( 'pxl_taxonomy_meta_register', 'saliver_tax_options_register' );
function saliver_tax_options_register( $metabox ) {
   
	$panels = [
		'category' => [
			'opt_name'            => 'tax_post_option',
			'display_name'        => esc_html__( 'Saliver Settings', 'saliver' ),
			'show_options_object' => false,
			'sections'  => [
				'tax_post_settings' => [
					'title'  => esc_html__( 'Saliver Settings', 'saliver' ),
					'icon'   => 'el el-refresh',
					'fields' => array(

						array(
				            'id'       => 'bg_category',
				            'type'     => 'media',
				            'title'    => esc_html__('Select Banner', 'saliver'),
				            'default'  => '',
				            'url'      => false,
				        ),

					)
				]
			]
		],
		    
	];
 
	$metabox->add_meta_data( $panels );
}

/* Switch Swiper Version  */
add_filter( 'pxl-swiper-version-active', 'saliver_set_swiper_version_active' );
function saliver_set_swiper_version_active($version){
  $version = '8.4.5'; //5.3.6, 8.4.5, 10.1.0
  return $version;
}

/* Search Result  */
function saliver_custom_post_types_in_search_results( $query ) {
    if ( $query->is_main_query() && $query->is_search() && ! is_admin() ) {
        $query->set( 'post_type', array( 'post', 'portfolio', 'service', 'product' ) );
    }
}
add_action( 'pre_get_posts', 'saliver_custom_post_types_in_search_results' );

/* Add Custom Font Face */
add_filter( 'elementor/fonts/groups', 'saliver_update_elementor_font_groups_control' );
function saliver_update_elementor_font_groups_control($font_groups){
  $pxlfonts_group = array( 'pxlfonts' => esc_html__( 'Saliver Fonts', 'saliver' ) );
  return array_merge( $pxlfonts_group, $font_groups );
}

add_filter( 'elementor/fonts/additional_fonts', 'saliver_update_elementor_font_control' );
function saliver_update_elementor_font_control($additional_fonts){
  $additional_fonts['Julietta-Messie'] = 'pxlfonts';
  return $additional_fonts;
}

// add custom font to redux
add_filter( 'redux/'.saliver()->get_option_name().'/field/typography/custom_fonts', 'saliver_add_redux_option_typo_customfont', 10, 1 ); 
function saliver_add_redux_option_typo_customfont($fonts){
	$fonts = [
		'Theme Custom Fonts' => [
		]
	];
	return $fonts;
}

/* Edit Popup Elementor Pro */
function saliver_fix_elementor_popup_location( $that ){
    $loc = $that->get_location('popup');
    
    if( ! $loc['edit_in_content'] ){
        $args = [
            'label'           => $loc['label'],
            'multiple'        => $loc['multiple'],
            'public'          => $loc['public'],
            'edit_in_content' => true,
            'hook'            => $loc['hook'],
        ];
        
        $that->register_location('popup', $args);
    }
}
add_action('elementor/theme/register_locations', 'saliver_fix_elementor_popup_location', 9999999 );