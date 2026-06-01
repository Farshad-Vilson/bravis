<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_marquee',
        'title' => esc_html__('Case Marquee', 'saliver'),
        'icon' => 'eicon-person',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'saliver'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'layout',
                            'label' => esc_html__('Layout', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                '1' => 'Style Default',
                                '2' => 'Style For Language',
                            ],
                            'default' => '1',
                        ),
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style-1' => 'Style 1',
                                'style-2' => 'Filter',
                            ],
                            'default' => 'style-1',
                        ),
                        array(
                            'name' => 'item',
                            'label' => esc_html__('Item', 'saliver'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'image',
                                    'label' => esc_html__('Image', 'saliver' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'text',
                                    'label' => esc_html__('Text', 'saliver'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                    'description' => 'Apply style for language'
                                ),
                                array(
                                    'name' => 'link',
                                    'label' => esc_html__('Link', 'saliver'),
                                    'type' => \Elementor\Controls_Manager::URL,
                                    'label_block' => true,
                                ),
                            ),
                            'title_field' => '{{{ text }}}'
                        ),
                        array(
                            'name' => 'direction',
                            'label' => esc_html__( 'Direction', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'options' => [
                                'left' => [
                                    'title' => esc_html__( 'Left', 'saliver' ),
                                    'icon' => 'eicon-arrow-left',
                                ],
                                'right' => [
                                    'title' => esc_html__( 'Right', 'saliver' ),
                                    'icon' => 'eicon-arrow-right',
                                ], 
                                'top' => [
                                    'title' => esc_html__( 'Top', 'saliver' ),
                                    'icon' => 'eicon-arrow-up',
                                ], 
                                'bottom' => [
                                    'title' => esc_html__( 'Bottom', 'saliver' ),
                                    'icon' => 'eicon-arrow-down',
                                ],
                            ],
                            'default' => 'left'
                        ),
                        array(
                            'name' => 'pause_on_hover',
                            'label' => esc_html__('Pause On Hover', 'saliver'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => false,
                        ),

                        array(
                            'name' => 'time_run',
                            'label' => esc_html__('Time Run', 'saliver'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '30',
                        ),

                        array(
                            'name' => 'item_to_show',
                            'label' => esc_html__('Item To Show', 'saliver'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => '3',
                            'condition' => [
                                'layout' => '2'
                            ]
                        ),

                        array(
                            'name' => 'gap',
                            'label' => esc_html__('Gap', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px'],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-marquee ul' => 'gap: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'max_width',
                            'label' => esc_html__('Max Width', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => ['px', '%'],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                                '%' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-marquee' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'max_height',
                            'label' => esc_html__('Max Heihgt', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => ['px', '%'],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                                '%' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-marquee' => 'max-height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style',
                    'label' => esc_html__('Content', 'saliver'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'image_radius',
                            'label' => esc_html__('Image Radius', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', '%' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-marquee img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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