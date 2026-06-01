<?php
// Register Button Widget
pxl_add_custom_widget(
    array(
        'name' => 'pxl_icon_user',
        'title' => esc_html__('Bravis User', 'saliver' ),
        'icon' => 'eicon-user-circle-o',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'source_section',
                    'label' => esc_html__('Source Settings', 'saliver' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'style1',
                            'options' => [
                                'style1' => esc_html__('Style 1 (Popup)', 'saliver' ),
                                'style2' => esc_html__('Style Icon', 'saliver' ),
                            ],
                        ),
                        array(
                            'name' => 'icon_color',
                            'label' => esc_html__('Color', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-user-account a, {{WRAPPER}} .pxl-sign-up-box' => 'color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'icon_color_hover',
                            'label' => esc_html__('Color Hover', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-user-account:hover a, {{WRAPPER}} .pxl-sign-up-box:hover' => 'color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'bg_btn_color',
                            'label' => esc_html__(' Button Color', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-user-account,{{WRAPPER}} .pxl-sign-up-box' => 'background: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Typography', 'saliver' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-user-account,{{WRAPPER}} .pxl-sign-up-box',
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
                                '{{WRAPPER}} .pxl-user-account,{{WRAPPER}} .pxl-sign-up-box' => 'border-style: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'border_width',
                            'label' => esc_html__( 'Border Width', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-user-account,{{WRAPPER}} .pxl-sign-up-box' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                            ],
                            'condition' => [
                                'border_type!' => '',
                            ],
                            'responsive' => true,
                        ),
                        array(
                            'name' => 'border_color',
                            'label' => esc_html__( 'Border Color', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-user-account,{{WRAPPER}} .pxl-sign-up-box' => 'border-color: {{VALUE}} !important;',
                            ],
                            'condition' => [
                                'border_type!' => '',
                            ],
                        ),
                        array(
                            'name' => 'post_type',
                            'label' => esc_html__('User Post Type', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '',
                            'options' => [
                                '' => esc_html__('All', 'saliver' ),
                                'page' => esc_html__('Page', 'saliver' ),
                                'post' => esc_html__('Post', 'saliver' ),
                                'lp_course' => esc_html__('Course', 'saliver' ),
                                'portfolio' => esc_html__('Portfolio', 'saliver' ),
                                'product' => esc_html__('Product', 'saliver' ),
                            ],
                        ),
                    ),
                ),
            ),
        ),
    ),
    saliver_get_class_widget_path()
);