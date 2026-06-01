<?php
// Register Icon Box Widget
pxl_add_custom_widget(
    array(
        'name' => 'pxl_client_review',
        'title' => esc_html__('Bravis Client Review', 'saliver' ),
        'icon' => 'eicon-blockquote',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'elementor-waypoints',
            'jquery-numerator',                    
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'saliver' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'layout',
                            'label' => esc_html__('Layout', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                '1' => 'Layout 1',
                                '2' => 'Layout 2',
                            ],
                            'default' => '1',
                        ),
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'style-1',
                            'options' => [
                                'style-1' => esc_html__('(Default)', 'saliver' ),
                                'style-2' => esc_html__('Style2', 'saliver' ),
                                'style-3' => esc_html__('Style Used For Cite', 'saliver' ),
                            ],
                            'condition' => [
                                'layout' => '1',
                            ],
                        ),
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Title', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'tt2',
                            'label' => esc_html__('Title 2', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                            'condition' => [
                                'layout' => '2',
                            ],
                        ),
                        array(
                            'name' => 'text_box',
                            'label' => esc_html__('Text Box', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                            'condition' => [
                                'layout' => '1',
                            ],
                        ),
                        array(
                            'name' => 'link',
                            'label' => esc_html__('Link', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::URL,
                        ),
                        array(
                            'name' => '_color',
                            'label' => esc_html__( 'Color Title', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-client-review .pxl-item--meta .pxl-item--title a' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Typography', 'saliver' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-client-review .pxl-item--meta .pxl-item--title a',
                        ),
                        array(
                            'name' => 'tt_color',
                            'label' => esc_html__( 'Color Title 2', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-client-review .pxl-item--meta .pxl-item--title .pxl-item--title2' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography2',
                            'label' => esc_html__('Typography', 'saliver' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',  
                            'selector' => '{{WRAPPER}} .pxl-client-review .pxl-item--meta .pxl-item--title .pxl-item--title2',
                        ),
                        array(
                            'name' => 'images',
                            'label' => esc_html__('Images', 'saliver'),
                            'type' => \Elementor\Controls_Manager::GALLERY,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'icon_max_width',
                            'label' => esc_html__('Img Size', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-client-review .pxl-item--inner .pxl-item--images .pxl-item--img' => 'min-width: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'bd_color',
                            'label' => esc_html__( 'Color Border Img', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-client-review .pxl-item--inner .pxl-item--images .pxl-item--img' => 'border-color: {{VALUE}};',
                            ],
                        ),
                    ),
                ),
                saliver_widget_animation_settings(),
            ),
        ),
    ),
    saliver_get_class_widget_path()
);