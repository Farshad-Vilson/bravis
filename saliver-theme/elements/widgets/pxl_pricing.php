<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_pricing',
        'title' => esc_html__('Bravis Pricing', 'saliver'),
        'icon' => 'eicon-settings',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_layout',
                    'label' => esc_html__('Layout', 'saliver' ),
                    'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
                    'controls' => array(
                        array(
                            'name' => 'layout',
                            'label' => esc_html__('Templates', 'saliver' ),
                            'type' => 'layoutcontrol',
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label' => esc_html__('Layout 1', 'saliver' ),
                                    'image' => get_template_directory_uri() . '/elements/assets/img/pxl_pricing/layout1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'saliver' ),
                                    'image' => get_template_directory_uri() . '/elements/assets/img/pxl_pricing/layout2.jpg'
                                ],
                                '3' => [
                                    'label' => esc_html__('Layout 3', 'saliver' ),
                                    'image' => get_template_directory_uri() . '/elements/assets/img/pxl_pricing/layout3.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'saliver'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => '_active',
                            'label' => esc_html__('Active', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'active' => 'Yes',
                                'no' => 'No',
                            ],
                            'default' => 'no',
                        ),
                        array(
                            'name' => 'popular',
                            'label' => esc_html__('Popular', 'saliver'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'sub_title',
                            'label' => esc_html__('Sub Title', 'saliver'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'currency',
                            'label' => esc_html__('Currency', 'saliver'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'price',
                            'label' => esc_html__('Price', 'saliver'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'btn_text',
                            'label' => esc_html__('Button Text', 'saliver'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'btn_link',
                            'label' => esc_html__('Button Link', 'saliver'),
                            'type' => \Elementor\Controls_Manager::URL,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'feature',
                            'label' => esc_html__('Feature', 'saliver'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'pxl_icon',
                                    'label' => esc_html__('Icon', 'saliver' ),
                                    'type' => \Elementor\Controls_Manager::ICONS,
                                    'fa4compatibility' => 'icon',
                                    'description' => 'Layout 1 has icons',

                                ),
                                array(
                                    'name' => 'feature_text',
                                    'label' => esc_html__('Text', 'saliver'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'feature_active',
                                    'label' => esc_html__('Active', 'saliver' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'options' => [
                                        'yes' => 'Yes',
                                        'no' => 'No',
                                    ],
                                    'default' => 'yes',
                                ),
                            ),
                            'title_field' => '{{{ feature_text }}}',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_normal',
                    'label' => esc_html__('Normal', 'saliver'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'bg_color_nomal',
                            'label' => esc_html__('Color Bg', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing, {{WRAPPER}} .pxl-pricing .pxl-item-left' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'bg_color_nomal_ac',
                            'label' => esc_html__('Color Bg Active', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing.active' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'border_type',
                            'label' => esc_html__( 'Border Type', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                '' => esc_html__( 'None', 'saliver' ),
                                'solid' => esc_html__( 'Solid', 'saliver' ),
                                'double' => esc_html__( 'Double', 'saliver' ),
                                'dotted' => esc_html__( 'Dotted', 'saliver' ),
                                'dashed' => esc_html__( 'Dashed', 'saliver' ),
                                'groove' => esc_html__( 'Groove', 'saliver' ),
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing' => 'border-style: {{VALUE}} !important;',
                            ],
                            'condition' => [
                            ],
                        ),
                        array(
                            'name' => 'border_width',
                            'label' => esc_html__( 'Border Width', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                            ],
                            'condition' => [
                                'border_type!' => '',
                            ],
                            'responsive' => true,
                        ),
                        array(
                            'name' => 'border_color_nomal',
                            'label' => esc_html__( 'Border Color', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing' => 'border-color: {{VALUE}} !important;',
                            ],
                            'condition' => [
                                'border_type!' => '',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style',
                    'label' => esc_html__('Style', 'saliver'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Color Title', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing .pxl-pricing--price' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_color_active',
                            'label' => esc_html__('Color Title Active', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing.active .pxl-pricing--price' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Typography', 'saliver' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-pricing .pxl-pricing--price',
                        ),
                        array(
                            'name' => 'popular_color',
                            'label' => esc_html__('Color Popular', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing .pxl-pricing--top span' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'popular_color_ac',
                            'label' => esc_html__('Color Popular Active', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing.active .pxl-pricing--top span' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'popular_typography',
                            'label' => esc_html__('Typography', 'saliver' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-pricing .pxl-pricing--top span',
                        ),
                        array(
                            'name' => 'desc_color',
                            'label' => esc_html__('Color Desc', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing .pxl-pricing--subtitle' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'desc_color_ac',
                            'label' => esc_html__('Color Desc Active', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing.active .pxl-pricing--subtitle' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'desc_typography',
                            'label' => esc_html__('Typography', 'saliver' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-pricing .pxl-pricing--subtitle',
                        ),
                    )
                ),
                array(
                    'name' => 'section_style_btn',
                    'label' => esc_html__('Button', 'saliver'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'bg_color',
                            'label' => esc_html__('Color Bg', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing .pxl-pricing--button .btn' => 'background: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'bg_color_ac',
                            'label' => esc_html__('Color Bg Active', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing.active .pxl-pricing--button .btn' => 'background: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'btn_color',
                            'label' => esc_html__('Color Btn', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing .pxl-pricing--button .btn' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'btn_color_ac',
                            'label' => esc_html__('Color Btn Active', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing.active .pxl-pricing--button .btn' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'btn_typography',
                            'label' => esc_html__('Typography', 'saliver' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-pricing .pxl-pricing--button .btn',
                        ),
                        array(
                            'name' => 'border_type_hover',
                            'label' => esc_html__( 'Border Type', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                '' => esc_html__( 'None', 'saliver' ),
                                'solid' => esc_html__( 'Solid', 'saliver' ),
                                'double' => esc_html__( 'Double', 'saliver' ),
                                'dotted' => esc_html__( 'Dotted', 'saliver' ),
                                'dashed' => esc_html__( 'Dashed', 'saliver' ),
                                'groove' => esc_html__( 'Groove', 'saliver' ),
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing .pxl-pricing--button .btn' => 'border-style: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'border_width_hover',
                            'label' => esc_html__( 'Border Width', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing .pxl-pricing--button .btn' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                            ],
                            'condition' => [
                                'border_type_hover!' => '',
                            ],
                            'responsive' => true,
                        ),
                        array(
                            'name' => 'border_color',
                            'label' => esc_html__( 'Border Color', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing .pxl-pricing--button .btn' => 'border-color: {{VALUE}} !important;',
                            ],
                            'condition' => [
                                'border_type_hover!' => '',
                            ],
                        ),
                        array(
                            'name' => 'border_color_ac',
                            'label' => esc_html__( 'Border Color Active', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing.active .pxl-pricing--button .btn' => 'border-color: {{VALUE}} !important;',
                            ],
                            'condition' => [
                                'border_type_hover!' => '',
                            ],
                        ),
                        array(
                            'name' => 'border_color_hover',
                            'label' => esc_html__( 'Border Color Hover', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing .pxl-pricing--button .btn:hover' => 'border-color: {{VALUE}} !important;',
                            ],
                            'condition' => [
                                'border_type_hover!' => '',
                            ],
                        ),
                        array(
                            'name' => 'btn_border_radius_hover',
                            'label' => esc_html__('Border Radius', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing .pxl-pricing--button .btn, {{WRAPPER}} .pxl-pricing:focus' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'ic_color',
                            'label' => esc_html__( 'Ic Color', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing .pxl-pricing--button .btn .pxl-icon svg' => 'fill: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'ic_bg_color',
                            'label' => esc_html__( 'Ic Bg Color', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing .pxl-pricing--button .btn .pxl-icon' => 'background-color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'ic_bg_color_ac',
                            'label' => esc_html__( 'Ic Bg Color Active', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing.active .pxl-pricing--button .btn .pxl-icon' => 'background-color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'ic_bg_color_hover',
                            'label' => esc_html__( 'Ic Bg Color Hover', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing .pxl-pricing--button .btn:hover .pxl-icon' => 'background-color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name'         => 'btn_box_shadow_hover',
                            'label' => esc_html__( 'Box Shadow', 'saliver' ),
                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector'     => '{{WRAPPER}} .pxl-pricing .pxl-pricing--button .btn, {{WRAPPER}} .pxl-pricing:focus',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_list',
                    'label' => esc_html__('List', 'saliver'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'list_color',
                            'label' => esc_html__('Color list', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing .pxl-pricing--feature li' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'list_color_unactive',
                            'label' => esc_html__('Color list Unactive', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing .pxl-pricing--feature li.no' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'list_typography',
                            'label' => esc_html__('Typography', 'saliver' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-pricing .pxl-pricing--feature li',
                        ),
                        array(
                            'name' => 'icon_list_color',
                            'label' => esc_html__('Color Ic list', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing .pxl-pricing--feature li .pxl-icon--check' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-pricing .pxl-pricing--feature li .pxl-icon--check svg' => 'fill: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_list_color_unactive',
                            'label' => esc_html__('Color Ic list Unactive', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pricing .pxl-pricing--feature li.no .pxl-icon--check' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-pricing .pxl-pricing--feature li.no .pxl-icon--check svg' => 'fill: {{VALUE}};',
                            ],
                        ),
                    ),
                ),
            ),
        ),
    ),
    saliver_get_class_widget_path()
);