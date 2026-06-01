<?php
// 'pxl-splitting',
// 'pxl-typography-animation',
pxl_add_custom_widget(
    array(
        'name' => 'pxl_heading',
        'title' => esc_html__('Bravis Heading', 'saliver' ),
        'icon' => 'eicon-heading',
        'categories' => array('pxltheme-core'),
        'scripts'    => array(
            'gsap',
            'pxl-scroll-trigger',
            'pxl-splitText',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'saliver' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'source_type',
                            'label' => esc_html__('Source Type', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'text' => 'Text',
                                'title' => 'Page Title',
                            ],
                            'default' => 'text',
                        ),
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Title', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'label_block' => true,
                            'condition' => [
                                'source_type' => ['text'],
                            ],
                            'description' => 'Create Typewriter text width shortcode: [typewriter text="Text1, Text2"], Highlight text with shortcode: [highlight text="Text"] and Highlight image with shortcode: [highlight_image id_image="123"],[highlight_image_carousel image_ids="123,456,789,321,654,987"]',
                        ),
                        array(
                            'name' => 'text_animation',
                            'label' => esc_html__('Vertical Text Slider', 'saliver'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'condition' => [
                                'source_type' => ['text'],
                            ],
                            'controls' => array(
                                array(
                                    'name' => 'label',
                                    'label' => esc_html__('Label', 'saliver'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                            ),
                        ),
                        array(
                            'name' => 'sub_title',
                            'label' => esc_html__('Sub Title', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                          'name' => 'align',
                            'label' => esc_html__( 'Alignment', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'options' => [
                                'left' => [
                                    'title' => esc_html__( 'Left', 'saliver' ),
                                    'icon' => 'eicon-text-align-left',
                                ],
                                'center' => [
                                    'title' => esc_html__( 'Center', 'saliver' ),
                                    'icon' => 'eicon-text-align-center',
                                ],
                                'right' => [
                                    'title' => esc_html__( 'Right', 'saliver' ),
                                    'icon' => 'eicon-text-align-right',
                                ],
                                'justify' => [
                                    'title' => esc_html__( 'Justified', 'saliver' ),
                                    'icon' => 'eicon-text-align-justify',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-heading' => 'text-align: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'h_width',
                            'label' => esc_html__('Max Width', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-heading .pxl-heading--inner' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_title',
                    'label' => esc_html__('Title', 'saliver' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'title_tag',
                            'label' => esc_html__('HTML Tag', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'h1' => 'H1',
                                'h2' => 'H2',
                                'h3' => 'H3',
                                'h4' => 'H4',
                                'h5' => 'H5',
                                'h6' => 'H6',
                                'div' => 'div',
                                'span' => 'span',
                                'p' => 'p',
                            ],
                            'default' => 'h3',
                        ),
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Title Color', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-heading .pxl-item--title' => 'color: {{VALUE}};-webkit-text-stroke-color:{{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Typography', 'saliver' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-heading .pxl-item--title',
                        ),
                        array(
                            'name'         => 'title_box_shadow',
                            'label' => esc_html__( 'Title Shadow', 'saliver' ),
                            'type'         => \Elementor\Group_Control_Text_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector'     => '{{WRAPPER}} .pxl-heading .pxl-item--title'
                        ),
                        array(
                            'name' => 'title_space_bottom',
                            'label' => esc_html__('Bottom Spacer', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'default' => [
                                'size' => 0,
                            ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-heading .pxl-item--title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                            ],
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'h_title_style',
                            'label' => esc_html__('Style', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style-default' => 'Default',
                                'style-1' => 'Style Divider Footer',
                            ],
                            'default' => 'style-default',
                        ),
                        array(
                            'name' => 't_width',
                            'label' => esc_html__('Width Divider', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-heading .pxl-heading--inner .pxl-item--title.style-1::before' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'h_title_style' => 'style-1',
                            ],
                        ),
                        array(
                            'name' => 't_height',
                            'label' => esc_html__('Height Divider', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-heading .pxl-heading--inner .pxl-item--title.style-1::before' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'h_title_style' => 'style-1',
                            ],
                        ),
                        array(
                            'name' => 'before_space_bottom',
                            'label' => esc_html__('Bottom Spacer Divider', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'default' => [
                                'size' => 0,
                            ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-heading .pxl-heading--inner .pxl-item--title.style-1' => 'padding-bottom: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'h_title_style' => 'style-1',
                            ],
                        ),
                        array(
                            'name' => 'pxl_animate',
                            'label' => esc_html__('Bravis Animate', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => saliver_widget_animate_v2(),
                            'default' => '',
                        ),
                        array(
                            'name' => 'pxl_animate_delay',
                            'label' => esc_html__('Animate Delay', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '0',
                            'description' => 'Enter number. Default 0ms',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_title_sub',
                    'label' => esc_html__('Sub Title', 'saliver' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array_merge(
                        array(
                            array(
                                'name' => 'sub_title_style',
                                'label' => esc_html__('Style', 'saliver' ),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'options' => [
                                    'px-sub-title-default' => 'Default',
                                    'px-sub-line-animation' => 'Style Line Animation',
                                    'px-sub-title-style3' => 'Style 3',
                                ],
                                'default' => 'px-sub-title-default',
                            ),
                            array(
                                'name' => 'line_opacity',
                                'label' => esc_html__('Line Opacity (0 - 100)', 'saliver' ),
                                'type' => \Elementor\Controls_Manager::SLIDER,
                                'control_type' => 'responsive',
                                'size_units' => [ '%' ],
                                'default'    => [
                                    'unit' => '%'
                                ],
                                'range' => [
                                    '%' => [
                                        'min' => 0,
                                        'max' => 100,
                                    ],
                                ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-heading .px-sub-title-shape4 .pxl-item--subtext::before' => 'opacity: {{SIZE}}%;',
                                ],
                                'condition' => [
                                    'sub_title_style' => ['px-sub-title-shape4'],
                                ],
                            ),
                            array(
                                'name' => 'sub_title_bg_color',
                                'label' => esc_html__('Bg Color', 'saliver' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-heading .pxl-item--subtext' => 'background-color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'sub_title_color',
                                'label' => esc_html__('Color', 'saliver' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-heading .pxl-item--subtitle' => 'color: {{VALUE}};',
                                    '{{WRAPPER}} .pxl-heading .pxl-item--subtitle .pxl-item--subtext .text-gradient:not(.pxl-icon--heading)' => '--gradient-color-from:{{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'sub_title_typography',
                                'label' => esc_html__('Typography', 'saliver' ),
                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .pxl-heading .pxl-item--subtitle, {{WRAPPER}} .pxl-heading .pxl-item--subtitle span',
                            ),
                            array(
                                'name' => 'sub_title_border_color',
                                'label' => esc_html__('Color Border', 'saliver' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-heading .pxl-item--subtext' => 'border-color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'sub_title_space_top',
                                'label' => esc_html__('Top Spacer', 'saliver' ),
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
                                    '{{WRAPPER}} .pxl-heading .pxl-item--subtitle' => 'top: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'sub_title_space_bottom',
                                'label' => esc_html__('Bottom Spacer', 'saliver' ),
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
                                    '{{WRAPPER}} .pxl-heading .pxl-item--subtitle' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                            array(
                                'name' => 'pxl_animate_sub',
                                'label' => esc_html__('Bravis Animate', 'saliver' ),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'options' => saliver_widget_animate(),
                                'default' => '',
                            ),
                            array(
                                'name' => 'pxl_animate_delay_sub',
                                'label' => esc_html__('Animate Delay', 'saliver' ),
                                'type' => \Elementor\Controls_Manager::TEXT,
                                'default' => '0',
                                'description' => 'Enter number. Default 0ms',
                            ),
                        )
                    ),
                ),
                array(
                    'name' => 'section_style_highlight',
                    'label' => esc_html__('Highlight Text', 'saliver' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array_merge(
                        array(
                            array(
                                'name' => 'highlight_style',
                                'label' => esc_html__('Style', 'saliver' ),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'options' => [
                                    'highlight-default' => 'Default',
                                    'highlight-text-gradient' => 'Text Gradient',
                                ],
                                'default' => 'highlight-default',
                            ),
                            array(
                                'name' => 'highlight_color',
                                'label' => esc_html__('Color', 'saliver' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-heading .pxl-title--highlight' => 'color: {{VALUE}};',
                                ],
                                'condition' => [
                                    'highlight_style' => ['highlight-default'],
                                ],
                            ),
                            array(
                                'name' => 'highlight_color_from',
                                'label' => esc_html__('Color From', 'saliver' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-heading .pxl-title--highlight' => '--gradient-color-from: {{VALUE}};',
                                ],
                                'condition' => [
                                    'highlight_style' => ['highlight-text-gradient'],
                                ],
                            ),
                            array(
                                'name' => 'highlight_color_to',
                                'label' => esc_html__('Color To', 'saliver' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-heading .pxl-title--highlight' => '--gradient-color-to: {{VALUE}};',
                                ],
                                'condition' => [
                                    'highlight_style' => ['highlight-text-gradient'],
                                ],
                            ),
                            array(
                                'name' => 'highlight_typography',
                                'label' => esc_html__('Typography', 'saliver' ),
                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .pxl-heading .pxl-title--highlight',
                            ),
                            array(
                                'name' => 'highlight_text_image',
                                'label' => esc_html__( 'Text Image', 'saliver' ),
                                'type' => \Elementor\Controls_Manager::MEDIA,
                                'default' => '',
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-heading .pxl-title--highlight' => 'background-image: url( {{URL}} );',
                                ],  
                            ),
                            array(
                                'name' => 'highlight_image_position',
                                'label' => esc_html__( 'Text Image Position', 'saliver' ),
                                'type'         => \Elementor\Controls_Manager::SELECT,
                                'options'      => array(
                                    ''              => esc_html__( 'Default', 'saliver' ),
                                    'center center' => esc_html__( 'Center Center', 'saliver' ),
                                    'center left'   => esc_html__( 'Center Left', 'saliver' ),
                                    'center right'  => esc_html__( 'Center Right', 'saliver' ),
                                    'top center'    => esc_html__( 'Top Center', 'saliver' ),
                                    'top left'      => esc_html__( 'Top Left', 'saliver' ),
                                    'top right'     => esc_html__( 'Top Right', 'saliver' ),
                                    'bottom center' => esc_html__( 'Bottom Center', 'saliver' ),
                                    'bottom left'   => esc_html__( 'Bottom Left', 'saliver' ),
                                    'bottom right'  => esc_html__( 'Bottom Right', 'saliver' ),
                                    'initial'       =>  esc_html__( 'Custom', 'saliver' ),
                                ),
                                'default' => '',
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-heading .pxl-title--highlight' => 'background-position: {{VALUE}};',
                                ],
                                'condition' => [
                                    'highlight_text_image[url]!' => ''
                                ]        
                            ),
                            array(
                                'name' => 'highlight_image_size',
                                'label' => esc_html__( 'Text Image Size', 'saliver' ),
                                'type'         => \Elementor\Controls_Manager::SELECT,
                                'hide_in_inner' => true,
                                'options'      => array(
                                    ''              => esc_html__( 'Default', 'saliver' ),
                                    'auto' => esc_html__( 'Auto', 'saliver' ),
                                    'cover'   => esc_html__( 'Cover', 'saliver' ),
                                    'contain'  => esc_html__( 'Contain', 'saliver' ),
                                    'initial'    => esc_html__( 'Custom', 'saliver' ),
                                ),
                                'default'      => '',
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-heading .pxl-title--highlight' => 'background-size: {{VALUE}};',
                                ],
                                'condition' => [
                                    'highlight_text_image[url]!' => ''
                                ]        
                            ),
                            array(
                                'name' => 'highlight_margin',
                                'label' => esc_html__('Margin', 'saliver' ),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'size_units' => [ 'px' ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-heading .pxl-title--highlight' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                                'control_type' => 'responsive',
                            ),
                        )
                    ),
                ),

                array(
                    'name' => 'section_style_highlight_img',
                    'label' => esc_html__('Highlight Image', 'saliver' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array_merge(
                        array(
                            array(
                                'name' => 'h_img_width',
                                'label' => esc_html__('Width', 'saliver' ),
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
                                    '{{WRAPPER}} .pxl-heading .pxl-image--highlight' => 'width: {{SIZE}}{{UNIT}};',
                                ],
                                'separator' => 'after',
                            ),
                            array(
                                'name' => 'h_img_height',
                                'label' => esc_html__('Height', 'saliver' ),
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
                                    '{{WRAPPER}} .pxl-heading .pxl-image--highlight' => 'height: {{SIZE}}{{UNIT}};',
                                ],
                                'separator' => 'after',
                            ),
                            array(
                                'name' => 'margin_width',
                                'label' => esc_html__( 'Margin', 'saliver' ),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-heading .pxl-image--highlight' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                                'responsive' => true,
                            ),
                        )
                    ),
                ),

                array(
                    'name' => 'section_style_typewriter',
                    'label' => esc_html__('Typewriter', 'saliver' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array_merge(
                        array(
                            array(
                                'name' => 'typewriter_color',
                                'label' => esc_html__('Color', 'saliver' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-heading .pxl-title--typewriter' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'typewriter_typography',
                                'label' => esc_html__('Typography', 'saliver' ),
                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .pxl-heading .pxl-title--typewriter',
                            ),
                        )
                    ),
                ),
            ),
        ),
    ),
    saliver_get_class_widget_path()
);