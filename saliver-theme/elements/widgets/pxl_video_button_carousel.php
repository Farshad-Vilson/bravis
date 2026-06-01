<?php
$slides_to_show = range( 1, 10 );
$slides_to_show = array_combine( $slides_to_show, $slides_to_show );

pxl_add_custom_widget(
    array(
        'name' => 'pxl_video_button_carousel',
        'title' => esc_html__('Bravis Video Button Carousel', 'saliver'),
        'icon' => 'eicon-posts-carousel',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'swiper',
            'pxl-swiper',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'saliver'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'btn_video_style',
                            'label' => esc_html__('Button Video Style', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style1' => 'Style Default',
                                'style2' => 'Style 1',
                                'style3' => 'Style 2',
                                'style4' => 'Style 3',
                            ],
                            'default' => 'style1',
                        ),
                        array(
                            'name' => 'client',
                            'label' => esc_html__('Client', 'saliver'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'video_link',
                                    'label' => esc_html__('Link', 'saliver' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'default' => 'https://www.youtube.com/watch?v=SF4aHwxHtZ0'
                                ),
                                array(
                                    'name' => 'title',
                                    'label' => esc_html__('Title Btn', 'saliver'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'video_icon',
                                    'label' => esc_html__('Video Icon', 'saliver' ),
                                    'type' => \Elementor\Controls_Manager::ICONS,
                                    'fa4compatibility' => 'icon',
                                ),
                                array(
                                    'name' => 'image_type',
                                    'label' => esc_html__('Image Type', 'saliver' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'options' => [
                                        'none' => 'None',
                                        'img' => 'Image',
                                        'bg' => 'Background',
                                        'bg-parallax' => 'Background Parallax',
                                    ],
                                    'default' => 'none',
                                ),
                                array(
                                    'name' => 'image',
                                    'label' => esc_html__('Image', 'saliver' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                    'condition' => [
                                        'image_type' => ['img', 'bg', 'bg-parallax'],
                                    ],
                                ),
                                array(
                                    'name' => 'img_size',
                                    'label' => esc_html__('Image Size', 'saliver' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'description' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height).',
                                    'condition' => [
                                        'image_type' => 'img',
                                    ],
                                ),
                                array(
                                    'name' => 'img_border_radius',
                                    'label' => esc_html__('Image Border Radius', 'saliver' ),
                                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                    'size_units' => [ 'px' ],
                                    'selectors' => [
                                        '{{WRAPPER}} .pxl-video-button-carousel .pxl-video--imagebg, {{WRAPPER}} .pxl-video-button-carousel .pxl-video--holder img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                    ],
                                    'condition' => [
                                        'image_type' => ['img', 'bg', 'bg-parallax'],
                                    ],
                                ),
                                array(
                                    'name' => 'image_width',
                                    'label' => esc_html__('Image Width', 'saliver' ),
                                    'type' => \Elementor\Controls_Manager::SLIDER,
                                    'description' => esc_html__('Enter number.', 'saliver' ),
                                    'condition' => [
                                        'image_type' => ['bg', 'bg-parallax'],
                                    ],
                                    'size_units' => [ 'px', '%' ],
                                    'range' => [
                                        'px' => [
                                            'min' => 0,
                                            'max' => 3000,
                                        ],
                                    ],
                                    'control_type' => 'responsive',
                                    'selectors' => [
                                        '{{WRAPPER}} .pxl-video-button-carousel .pxl-video--holder' => 'width: {{SIZE}}{{UNIT}};',
                                    ],
                                ),
                                array(
                                    'name' => 'image_height',
                                    'label' => esc_html__('Image Height', 'saliver' ),
                                    'type' => \Elementor\Controls_Manager::SLIDER,
                                    'description' => esc_html__('Enter number.', 'saliver' ),
                                    'condition' => [
                                        'image_type' => ['bg', 'bg-parallax'],
                                    ],
                                    'range' => [
                                        'px' => [
                                            'min' => 0,
                                            'max' => 3000,
                                        ],
                                    ],
                                    'control_type' => 'responsive',
                                    'selectors' => [
                                        '{{WRAPPER}} .pxl-video-button-carousel .pxl-video--imagebg' => 'height: {{SIZE}}{{UNIT}};',
                                    ],
                                ),
                                array(
                                    'name' => 'btn_video_style1',
                                    'label' => esc_html__('Button Video Style', 'saliver' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'options' => [
                                        'style1' => 'Style Default',
                                    ],
                                    'default' => 'style1',
                                ),
                                
                                array(
                                    'name'         => 'btn_gradient',
                                    'label' => esc_html__( 'Background Type', 'saliver' ),
                                    'type'         => \Elementor\Group_Control_Background::get_type(),
                                    'control_type' => 'group',
                                    'types' => [ 'gradient' ],
                                    'selector'     => '{{WRAPPER}} .pxl-video-button-carousel .pxl-overlay-color',
                                ),
                            ),
                        ),
                    ),
                ),
                array(
                    'name' => 'section_settings_carousel',
                    'label' => esc_html__('Settings', 'saliver'),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array(
                        array(
                            'name' => 'col_xs',
                            'label' => esc_html__('Columns XS Devices', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '1',
                            'options' => [
                                'auto' => 'Auto',
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'col_sm',
                            'label' => esc_html__('Columns SM Devices', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '2',
                            'options' => [
                                'auto' => 'Auto',
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'col_md',
                            'label' => esc_html__('Columns MD Devices', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '3',
                            'options' => [
                                'auto' => 'Auto',
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'col_lg',
                            'label' => esc_html__('Columns LG Devices', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '3',
                            'options' => [
                                'auto' => 'Auto',
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'col_xl',
                            'label' => esc_html__('Columns XL Devices', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '3',
                            'options' => [
                                'auto' => 'Auto',
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '5' => '5',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'col_xxl',
                            'label' => esc_html__('Columns XXL Devices', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '3',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '5' => '5',
                                '6' => '6',
                                '8' => '8',
                            ],
                        ),

                        array(
                            'name' => 'slides_to_scroll',
                            'label' => esc_html__('Slides to scroll', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '1',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '5' => '5',
                                '6' => '6',
                                
                            ],
                        ),
                        array(
                            'name' => 'arrows',
                            'label' => esc_html__('Show Arrows', 'saliver'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                        ),
                        array(
                            'name' => 'pagination',
                            'label' => esc_html__('Show Pagination', 'saliver'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'false',
                        ),
                        array(
                            'name' => 'pagination_type',
                            'label' => esc_html__('Pagination Type', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'bullets',
                            'options' => [
                                'bullets' => 'Bullets',
                                'fraction' => 'Fraction',
                            ],
                            'condition' => [
                                'pagination' => 'true'
                            ]
                        ),
                        array(
                            'name' => 'pause_on_hover',
                            'label' => esc_html__('Pause on Hover', 'saliver'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                        ),
                        array(
                            'name' => 'autoplay',
                            'label' => esc_html__('Autoplay', 'saliver'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                        ),
                        array(
                            'name' => 'autoplay_speed',
                            'label' => esc_html__('Autoplay Delay', 'saliver'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 5000,
                            'condition' => [
                                'autoplay' => 'true'
                            ]
                        ),
                        array(
                            'name' => 'infinite',
                            'label' => esc_html__('Infinite Loop', 'saliver'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                        ),
                        array(
                            'name' => 'speed',
                            'label' => esc_html__('Animation Speed', 'saliver'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 500,
                        ),
                        array(
                            'name' => 'drap',
                            'label' => esc_html__('Show Scroll Drap', 'saliver'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'false',
                        ),
                        array(
                            'name' => 'offset_left',
                            'label' => esc_html__('Offset Left', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-swiper-sliders .pxl-swiper-container' => 'margin-left: -{{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'offset_right',
                            'label' => esc_html__('Offset Right', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-swiper-sliders .pxl-swiper-container' => 'margin-right: -{{SIZE}}{{UNIT}};',
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