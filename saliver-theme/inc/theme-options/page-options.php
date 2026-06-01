<?php
 
add_action( 'pxl_post_metabox_register', 'saliver_page_options_register' );
function saliver_page_options_register( $metabox ) {
 
	$panels = [
		'post' => [
			'opt_name'            => 'post_option',
			'display_name'        => esc_html__( 'Post Options', 'saliver' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'post_settings' => [
					'title'  => esc_html__( 'Post Options', 'saliver' ),
					'icon'   => 'el el-cog',
					'fields' => array_merge(
						saliver_sidebar_pos_opts(['prefix' => 'post_', 'default' => true, 'default_value' => '-1']),
						array(
							array(
					            'id'=> 'post_video_link',
					            'type' => 'text',
					            'title' => esc_html__('Video Link', 'saliver'),
					            'validate' => 'url',
					            'default' => '',
					        ),
					        array(
								'id'             => 'content_spacing',
								'type'           => 'spacing',
								'output'         => array( '#pxl-wapper #pxl-main' ),
								'right'          => false,
								'left'           => false,
								'mode'           => 'padding',
								'units'          => array( 'px' ),
								'units_extended' => 'false',
								'title'          => esc_html__( 'Spacing Top/Bottom', 'saliver' ),
								'default'        => array(
									'padding-top'    => '',
									'padding-bottom' => '',
									'units'          => 'px',
								)
							),
					    )
					)
					],
					'page_title_post' => [
					'title'  => esc_html__( 'Page Title', 'saliver' ),
					'icon'   => 'el el-indent-left',
					'fields' => array_merge(
						saliver_page_title_opts([
							'default'         => true,
							'default_value'   => '-1'
						])
					)
				],
			]
		],
		'page' => [
			'opt_name'            => 'pxl_page_options',
			'display_name'        => esc_html__( 'Page Options', 'saliver' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'header' => [
					'title'  => esc_html__( 'Header', 'saliver' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
				        saliver_header_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						saliver_header_mobile_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
				                'id'       => 'header_display',
				                'type'     => 'button_set',
				                'title'    => esc_html__('Header Display', 'saliver'),
				                'options'  => array(
				                    'show' => esc_html__('Show', 'saliver'),
				                    'hide'  => esc_html__('Hide', 'saliver'),
				                ),
				                'default'  => 'show',
				            ),
				            array(
				                'id'       => 'page_mobile_style',
				                'type'     => 'button_set',
				                'title'    => esc_html__('Mobile Style', 'saliver'),
				                'options'  => array(
				                    'inherit'  => esc_html__('Inherit', 'saliver'),
				                    'light'  => esc_html__('Light', 'saliver'),
				                    'dark'  => esc_html__('Dark', 'saliver'),
				                ),
				                'default'  => 'inherit',
				            ),
				            array(
				           		'id'       => 'logo_m',
					            'type'     => 'media',
					            'title'    => esc_html__('Mobile Logo Dark', 'saliver'),
					            'default'  => '',
					            'url'      => false,
					        ),
					        array(
				           		'id'       => 'logo_light_m',
					            'type'     => 'media',
					            'title'    => esc_html__('Mobile Logo Light', 'saliver'),
					            'default'  => '',
					            'url'      => false,
					        ),
					        array(
				                'id'       => 'p_menu',
				                'type'     => 'select',
				                'title'    => esc_html__( 'Menu', 'saliver' ),
				                'options'  => saliver_get_nav_menu_slug(),
				                'default' => '',
				                'description' => 'When you select Custom Menu. The custom menu will apply to the entire layout when you use Bravis Nav Menu widget in Elementor and Menu on header layout in Mobile.'
				            ),
					    ),
					    array(
				            array(
				                'id'       => 'sticky_scroll',
				                'type'     => 'button_set',
				                'title'    => esc_html__('Sticky Scroll', 'saliver'),
				                'options'  => array(
				                    '-1' => esc_html__('Inherit', 'saliver'),
				                    'pxl-sticky-stt' => esc_html__('Scroll To Top', 'saliver'),
				                    'pxl-sticky-stb'  => esc_html__('Scroll To Bottom', 'saliver'),
				                ),
				                'default'  => '-1',
				            ),
				            array(
				                'id'       => 'header_margin',
				                'type'     => 'spacing',
				                'mode'     => 'margin',
				                'title'    => esc_html__('Margin', 'saliver'),
				                'width'    => false,
				                'unit'     => 'px',
				                'output'    => array('#pxl-header-elementor .pxl-header-elementor-main'),
				            ),
				        )
				    )
					 
				],
				'page_title' => [
					'title'  => esc_html__( 'Page Title', 'saliver' ),
					'icon'   => 'el el-indent-left',
					'fields' => array_merge(
				        saliver_page_title_opts([
							'default'         => true,
							'default_value'   => '-1'
						])
				    )
				],
				'content' => [
					'title'  => esc_html__( 'Content', 'saliver' ),
					'icon'   => 'el-icon-pencil',
					'fields' => array_merge(
						saliver_sidebar_pos_opts(['prefix' => 'page_', 'default' => false, 'default_value' => '0']),
						array(
					        array(
								'id'             => 'content_spacing',
								'type'           => 'spacing',
								'output'         => array( '#pxl-wapper #pxl-main' ),
								'right'          => false,
								'left'           => false,
								'mode'           => 'padding',
								'units'          => array( 'px' ),
								'units_extended' => 'false',
								'title'          => esc_html__( 'Spacing Top/Bottom', 'saliver' ),
								'default'        => array(
									'padding-top'    => '',
									'padding-bottom' => '',
									'units'          => 'px',
								)
							), 
					    )
					)
				],
				'footer' => [
					'title'  => esc_html__( 'Footer', 'saliver' ),
					'icon'   => 'el el-website',
					'fields' => array_merge(
				        saliver_footer_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
				                'id'       => 'footer_display',
				                'type'     => 'button_set',
				                'title'    => esc_html__('Footer Display', 'saliver'),
				                'options'  => array(
				                    'show' => esc_html__('Show', 'saliver'),
				                    'hide'  => esc_html__('Hide', 'saliver'),
				                ),
				                'default'  => 'show',
				            ),
							array(
				                'id'       => 'p_footer_fixed',
				                'type'     => 'button_set',
				                'title'    => esc_html__('Footer Fixed', 'saliver'),
				                'options'  => array(
				                    'inherit' => esc_html__('Inherit', 'saliver'),
				                    'on' => esc_html__('On', 'saliver'),
				                    'off' => esc_html__('Off', 'saliver'),
				                ),
				                'default'  => 'inherit',
				            ),
				            array(
				                'id'       => 'back_top_top_style',
				                'type'     => 'button_set',
				                'title'    => esc_html__('Back to Top Style', 'saliver'),
				                'options'  => array(
				                    'style-default' => esc_html__('Default', 'saliver'),
				                    'style-round' => esc_html__('Round', 'saliver'),
				                ),
				                'default'  => 'style-default',
				            ),
						)
				    )
				],
				'colors' => [
					'title'  => esc_html__( 'Colors', 'saliver' ),
					'icon'   => 'el el-website',
					'fields' => array_merge(
				        array(
				        	array(
							    'id'        => 'page_body_color',
							    'type'      => 'color',
							    'title'     => esc_html__('Body Background Color', 'saliver'),
							    'default'   => '',
							    'transparent' => false,
							    'output'    => array(
							        'background-color' => 'body',
							    )
							),
				        	array(
					            'id'          => 'primary_color',
					            'type'        => 'color',
					            'title'       => esc_html__('Primary Color', 'saliver'),
					            'transparent' => false,
					            'default'     => ''
					        ),
					        array(
					            'id'          => 'gradient_color',
					            'type'        => 'color_gradient',
					            'title'       => esc_html__('Gradient Color', 'saliver'),
					            'transparent' => false,
					            'default'  => array(
					                'from' => '',
					                'to'   => '', 
					            ),
					        ),
					    )
				    )
				],
				'extra' => [
					'title'  => esc_html__( 'Extra', 'saliver' ),
					'icon'   => 'el el-website',
					'fields' => array_merge(
				        array(
				        	array(
					            'id' => 'body_custom_class',
					            'type' => 'text',
					            'title' => esc_html__('Body Custom Class', 'saliver'),
					        ),
					    )
				    )
				]
			]
		],
		'portfolio' => [
			'opt_name'            => 'pxl_portfolio_options',
			'display_name'        => esc_html__( 'Portfolio Options', 'saliver' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'header' => [
					'title'  => esc_html__( 'General', 'saliver' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						array(
							array(
					            'id'=> 'portfolio_excerpt',
					            'type' => 'textarea',
					            'title' => esc_html__('Excerpt', 'saliver'),
					            'validate' => 'html_custom',
					            'default' => '',
					        ),
					        array(
								'id'             => 'content_spacing',
								'type'           => 'spacing',
								'output'         => array( '#pxl-wapper #pxl-main' ),
								'right'          => false,
								'left'           => false,
								'mode'           => 'padding',
								'units'          => array( 'px' ),
								'units_extended' => 'false',
								'title'          => esc_html__( 'Content Spacing Top/Bottom', 'saliver' ),
								'default'        => array(
									'padding-top'    => '',
									'padding-bottom' => '',
									'units'          => 'px',
								)
							),
						)
				    )
				],
			]
		],
		'service' => [
			'opt_name'            => 'pxl_service_options',
			'display_name'        => esc_html__( 'Service Options', 'saliver' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'header' => [
					'title'  => esc_html__( 'General', 'saliver' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						array(
							array(
								'id'          => 'bg_color',
								'type'        => 'color_rgba',
								'title'       => esc_html__('Background Color', 'saliver'),
								'transparent' => false,
								'default'     => ''
							),
							array(
					            'id'=> 'service_external_link',
					            'type' => 'text',
					            'title' => esc_html__('External Link', 'saliver'),
					            'validate' => 'url',
					            'default' => '',
					        ),
							array(
					            'id'=> 'service_excerpt',
					            'type' => 'textarea',
					            'title' => esc_html__('Excerpt', 'saliver'),
					            'validate' => 'html_custom',
					            'default' => '',
					        ),
					        array(
					            'id'       => 'service_icon_type',
					            'type'     => 'button_set',
					            'title'    => esc_html__('Icon Type', 'saliver'),
					            'options'  => array(
					                'icon'  => esc_html__('Icon', 'saliver'),
					                'image'  => esc_html__('Image', 'saliver'),
					            ),
					            'default'  => 'icon'
					        ),
							array(
								'id'       => 'service_icon_btn',
								'type'     => 'button_set',
								'title'    => esc_html__('Icon Type', 'saliver'),
								'required' => array( 0 => 'service_icon_type', 1 => 'equals', 2 => 'icon' ),
								'options'  => array(
									'font' => esc_html__('Font Icon', 'saliver'),
									'svg'  => esc_html__('SVG Icon', 'saliver'),
								),
								'default'  => 'font',
							),
					        array(
					            'id'       => 'service_icon_font',
					            'type'     => 'pxl_iconpicker',
					            'title'    => esc_html__('Icon', 'saliver'),
					            'required' => array( 0 => 'service_icon_btn', 1 => 'equals', 2 => 'font' ),
            					'force_output' => true
					        ),
							array(
								'id'       => 'service_icon_svg_upload',
								'type'     => 'media',
								'title'    => esc_html__('Upload SVG Icon', 'saliver'),
								'required' => array('service_icon_btn', 1 => 'equals', 2 => 'svg' ),
								'mime_type' => 'svg',
							),	
					        array(
					            'id'       => 'service_icon_img',
					            'type'     => 'media',
					            'title'    => esc_html__('Icon Image', 'saliver'),
					            'default' => '',
					            'required' => array( 0 => 'service_icon_type', 1 => 'equals', 2 => 'image' ),
				            	'force_output' => true
					        ),
					        array(
								'id'             => 'content_spacing',
								'type'           => 'spacing',
								'output'         => array( '#pxl-wapper #pxl-main' ),
								'right'          => false,
								'left'           => false,
								'mode'           => 'padding',
								'units'          => array( 'px' ),
								'units_extended' => 'false',
								'title'          => esc_html__( 'Content Spacing Top/Bottom', 'saliver' ),
								'default'        => array(
									'padding-top'    => '',
									'padding-bottom' => '',
									'units'          => 'px',
								)
							),
						),
						saliver_footer_opts([
							'default'         => true,
							'default_value'   => '-1'
						])
				    )
				],
			]
		],

		'career' => [
			'opt_name'            => 'pxl_career_options',
			'display_name'        => esc_html__( 'Career Options', 'saliver' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'header' => [
					'title'  => esc_html__( 'General', 'saliver' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						saliver_header_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
					            'id'=> 'career_excerpt',
					            'type' => 'textarea',
					            'title' => esc_html__('Excerpt', 'saliver'),
					            'validate' => 'html_custom',
					            'default' => '',
					        ),
					        array(
								'id'             => 'content_spacing',
								'type'           => 'spacing',
								'output'         => array( '#pxl-wapper #pxl-main' ),
								'right'          => false,
								'left'           => false,
								'mode'           => 'margin',
								'units'          => array( 'px' ),
								'units_extended' => 'false',
								'title'          => esc_html__( 'Content Spacing Top/Bottom', 'saliver' ),
								'default'        => array(
									'margin-top'    => '',
									'margin-bottom' => '',
									'units'          => 'px',
								)
							),
							array(
								'id'=>'custom_career_title_carousel',
								'type' => 'text',
								'title'    => esc_html__('Custom Title For Career', 'saliver'),
							),
							array(
								'id'=>'button_text',
								'type' => 'text',
								'title'    => esc_html__('Custom button text For Career', 'saliver'),
							),
						)
				    )
				],
				'career_page_title' => [
					'title'  => esc_html__( 'Career Page Title', 'saliver' ),
					'icon'   => 'el el-indent-left',
					'fields' => array_merge(
				        saliver_page_title_opts([
							'default'         => true,
							'default_value'   => '-1'
						])
				    )
				],
			]
		],


		'product' => [
			'opt_name'            => 'pxl_page_options',
			'display_name'        => esc_html__( 'Product Options', 'saliver' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'header' => [
					'title'  => esc_html__( 'Header', 'saliver' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
				        saliver_header_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						saliver_header_mobile_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
				                'id'       => 'header_display',
				                'type'     => 'button_set',
				                'title'    => esc_html__('Header Display', 'saliver'),
				                'options'  => array(
				                    'show' => esc_html__('Show', 'saliver'),
				                    'hide'  => esc_html__('Hide', 'saliver'),
				                ),
				                'default'  => 'show',
				            ),
				            array(
				                'id'       => 'page_mobile_style',
				                'type'     => 'button_set',
				                'title'    => esc_html__('Mobile Style', 'saliver'),
				                'options'  => array(
				                    'inherit'  => esc_html__('Inherit', 'saliver'),
				                    'light'  => esc_html__('Light', 'saliver'),
				                    'dark'  => esc_html__('Dark', 'saliver'),
				                ),
				                'default'  => 'inherit',
				            ),
				            array(
				           		'id'       => 'logo_m',
					            'type'     => 'media',
					            'title'    => esc_html__('Mobile Logo Dark', 'saliver'),
					            'default'  => '',
					            'url'      => false,
					        ),
					        array(
				           		'id'       => 'logo_light_m',
					            'type'     => 'media',
					            'title'    => esc_html__('Mobile Logo Light', 'saliver'),
					            'default'  => '',
					            'url'      => false,
					        ),
					        array(
				                'id'       => 'p_menu',
				                'type'     => 'select',
				                'title'    => esc_html__( 'Menu', 'saliver' ),
				                'options'  => saliver_get_nav_menu_slug(),
				                'default' => '',
				                'description' => 'When you select Custom Menu. The custom menu will apply to the entire layout when you use Bravis Nav Menu widget in Elementor and Menu on header layout in Mobile.'
				            ),
					    ),
					    array(
				            array(
				                'id'       => 'sticky_scroll',
				                'type'     => 'button_set',
				                'title'    => esc_html__('Sticky Scroll', 'saliver'),
				                'options'  => array(
				                    '-1' => esc_html__('Inherit', 'saliver'),
				                    'pxl-sticky-stt' => esc_html__('Scroll To Top', 'saliver'),
				                    'pxl-sticky-stb'  => esc_html__('Scroll To Bottom', 'saliver'),
				                ),
				                'default'  => '-1',
				            ),
				            array(
				                'id'       => 'header_margin',
				                'type'     => 'spacing',
				                'mode'     => 'margin',
				                'title'    => esc_html__('Margin', 'saliver'),
				                'width'    => false,
				                'unit'     => 'px',
				                'output'    => array('#pxl-header-elementor .pxl-header-elementor-main'),
				            ),
				        )
				    )
					 
				],
				'page_title' => [
					'title'  => esc_html__( 'Page Title', 'saliver' ),
					'icon'   => 'el el-indent-left',
					'fields' => array_merge(
				        saliver_page_title_opts([
							'default'         => true,
							'default_value'   => '-1'
						])
				    )
				],
				'content' => [
					'title'  => esc_html__( 'Content', 'saliver' ),
					'icon'   => 'el-icon-pencil',
					'fields' => array_merge(
						saliver_sidebar_pos_opts(['prefix' => 'page_', 'default' => false, 'default_value' => '0']),
						array(
					        array(
								'id'             => 'content_spacing',
								'type'           => 'spacing',
								'output'         => array( '#pxl-wapper #pxl-main' ),
								'right'          => false,
								'left'           => false,
								'mode'           => 'padding',
								'units'          => array( 'px' ),
								'units_extended' => 'false',
								'title'          => esc_html__( 'Spacing Top/Bottom', 'saliver' ),
								'default'        => array(
									'padding-top'    => '',
									'padding-bottom' => '',
									'units'          => 'px',
								)
							), 
					    )
					)
				],
				'footer' => [
					'title'  => esc_html__( 'Footer', 'saliver' ),
					'icon'   => 'el el-website',
					'fields' => array_merge(
				        saliver_footer_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
				                'id'       => 'footer_display',
				                'type'     => 'button_set',
				                'title'    => esc_html__('Footer Display', 'saliver'),
				                'options'  => array(
				                    'show' => esc_html__('Show', 'saliver'),
				                    'hide'  => esc_html__('Hide', 'saliver'),
				                ),
				                'default'  => 'show',
				            ),
							array(
				                'id'       => 'p_footer_fixed',
				                'type'     => 'button_set',
				                'title'    => esc_html__('Footer Fixed', 'saliver'),
				                'options'  => array(
				                    'inherit' => esc_html__('Inherit', 'saliver'),
				                    'on' => esc_html__('On', 'saliver'),
				                    'off' => esc_html__('Off', 'saliver'),
				                ),
				                'default'  => 'inherit',
				            ),
				            array(
				                'id'       => 'back_top_top_style',
				                'type'     => 'button_set',
				                'title'    => esc_html__('Back to Top Style', 'saliver'),
				                'options'  => array(
				                    'style-default' => esc_html__('Default', 'saliver'),
				                    'style-round' => esc_html__('Round', 'saliver'),
				                ),
				                'default'  => 'style-default',
				            ),
						)
				    )
				],
				'colors' => [
					'title'  => esc_html__( 'Colors', 'saliver' ),
					'icon'   => 'el el-website',
					'fields' => array_merge(
				        array(
				        	array(
							    'id'        => 'page_body_color',
							    'type'      => 'color',
							    'title'     => esc_html__('Body Background Color', 'saliver'),
							    'default'   => '',
							    'transparent' => false,
							    'output'    => array(
							        'background-color' => 'body',
							    )
							),
				        	array(
					            'id'          => 'primary_color',
					            'type'        => 'color',
					            'title'       => esc_html__('Primary Color', 'saliver'),
					            'transparent' => false,
					            'default'     => ''
					        ),
					        array(
					            'id'          => 'gradient_color',
					            'type'        => 'color_gradient',
					            'title'       => esc_html__('Gradient Color', 'saliver'),
					            'transparent' => false,
					            'default'  => array(
					                'from' => '',
					                'to'   => '', 
					            ),
					        ),
					    )
				    )
				],
				'extra' => [
					'title'  => esc_html__( 'Extra', 'saliver' ),
					'icon'   => 'el el-website',
					'fields' => array_merge(
				        array(
				        	array(
					            'id' => 'body_custom_class',
					            'type' => 'text',
					            'title' => esc_html__('Body Custom Class', 'saliver'),
					        ),
					    )
				    )
				]
			]
		],

		'pxl-template' => [ //post_type
			'opt_name'            => 'pxl_hidden_template_options',
			'display_name'        => esc_html__( 'Template Options', 'saliver' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'header' => [
					'title'  => esc_html__( 'General', 'saliver' ),
					'icon'   => 'el-icon-website',
					'fields' => array(
						array(
							'id'    => 'template_type',
							'type'  => 'select',
							'title' => esc_html__('Type', 'saliver'),
				            'options' => [
				            	'df'       	   => esc_html__('Select Type', 'saliver'), 
								'header'       => esc_html__('Header Desktop', 'saliver'),
								'header-mobile'       => esc_html__('Header Mobile', 'saliver'),
								'footer'       => esc_html__('Footer', 'saliver'), 
								'mega-menu'    => esc_html__('Mega Menu', 'saliver'), 
								'page-title'   => esc_html__('Page Title', 'saliver'), 
								'tab' => esc_html__('Tab', 'saliver'),
								'hidden-panel' => esc_html__('Hidden Panel', 'saliver'),
								'popup' => esc_html__('Popup', 'saliver'),
								'page' => esc_html__('Page', 'saliver'),
								'slider' => esc_html__('Slider', 'saliver'),
								'wgaboutauthor' => esc_html__('Widget Sidebar', 'saliver'),
				            ],
				            'default' => 'df',
				        ),
				        array(
							'id'    => 'header_type',
							'type'  => 'select',
							'title' => esc_html__('Header Type', 'saliver'),
				            'options' => [
				            	'px-header--default'       	   => esc_html__('Default', 'saliver'), 
								'px-header--transparent'       => esc_html__('Transparent', 'saliver'),
								'px-header--left_sidebar'       => esc_html__('Left Sidebar', 'saliver'),
				            ],
				            'default' => 'px-header--default',
				            'indent' => true,
                			'required' => array( 0 => 'template_type', 1 => 'equals', 2 => 'header' ),
				        ),

				        array(
							'id'    => 'header_mobile_type',
							'type'  => 'select',
							'title' => esc_html__('Header Type', 'saliver'),
				            'options' => [
				            	'px-header--default'       	   => esc_html__('Default', 'saliver'), 
								'px-header--transparent'       => esc_html__('Transparent', 'saliver'),
				            ],
				            'default' => 'px-header--default',
				            'indent' => true,
                			'required' => array( 0 => 'template_type', 1 => 'equals', 2 => 'header-mobile' ),
				        ),

				        array(
							'id'    => 'hidden_panel_position',
							'type'  => 'select',
							'title' => esc_html__('Hidden Panel Position', 'saliver'),
				            'options' => [
				            	'top'       	   => esc_html__('Top', 'saliver'),
				            	'right'       	   => esc_html__('Right', 'saliver'),
				            ],
				            'default' => 'right',
				            'required' => array( 0 => 'template_type', 1 => 'equals', 2 => 'hidden-panel' ),
				        ),
				        array(
				            'id'          => 'hidden_panel_height',
				            'type'        => 'text',
				            'title'       => esc_html__('Hidden Panel Height', 'saliver'),
				            'subtitle'       => esc_html__('Enter number.', 'saliver'),
				            'transparent' => false,
				            'default'     => '',
				            'force_output' => true,
				            'required' => array( 0 => 'hidden_panel_position', 1 => 'equals', 2 => 'top' ),
				        ),
				        array(
				            'id'          => 'hidden_panel_boxcolor',
				            'type'        => 'color',
				            'title'       => esc_html__('Box Color', 'saliver'),
				            'transparent' => false,
				            'default'     => '',
				            'required' => array( 0 => 'template_type', 1 => 'equals', 2 => 'hidden-panel' ),
				        ),
				        array(
				            'id'          => 'header_sidebar_width',
				            'type'        => 'slider',
				            'title'       => esc_html__('Header Sidebar Width', 'saliver'),
				            "default"   => 300,
						    "min"       => 50,
						    "step"      => 1,
						    "max"       => 900,
				            'force_output' => true,
				            'required' => array( 0 => 'header_type', 1 => 'equals', 2 => 'px-header--left_sidebar' ),
				        ),

				        array(
							'id'    => 'header_sidebar_style',
							'type'  => 'select',
							'title' => esc_html__('Header Sidebar Style', 'saliver'),
				            'options' => [
				            	'px-header-sidebar-style1'      => esc_html__('Style 1', 'saliver'), 
								'px-header-sidebar-style2'      => esc_html__('Style 2', 'saliver'),
				            ],
				            'default' => 'px-header-sidebar-style1',
				            'indent' => true,
                			'required' => array( 0 => 'header_type', 1 => 'equals', 2 => 'px-header--left_sidebar' ),
				        ),
					),
				    
				],
			]
		],
	];
 
	$metabox->add_meta_data( $panels );
}
 