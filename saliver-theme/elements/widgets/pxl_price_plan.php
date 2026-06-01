<?php
// Register Icon Box Widget
pxl_add_custom_widget(
    array(
        'name' => 'pxl_price_plan',
        'title' => esc_html__('Bravis Price & Plans', 'saliver' ),
        'icon' => 'eicon-icon-box',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'tab_content',
                    'label' => esc_html__('Content', 'saliver'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'lists',
                            'label' => esc_html__('Content', 'saliver'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'type',
                                    'label' => esc_html__('Icon Type', 'saliver' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'options' => [
                                        'text' => 'Text',
                                        'icon' => 'Icon',
                                    ],
                                    'default' => 'text',
                                ),
                                array(
                                    'name' => 'plan',
                                    'label' => esc_html__('Plan', 'saliver' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'free_plan',
                                    'label' => esc_html__('Free Plan', 'saliver' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                    'condition' => [
                                        'type' => 'text',
                                    ],
                                ),
                                array(
                                    'name' => 'pro_plan',
                                    'label' => esc_html__('Pro Plan', 'saliver' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                    'condition' => [
                                        'type' => 'text',
                                    ],
                                ),
                                array(
                                    'name' => 'enterprise',
                                    'label' => esc_html__('Enterprise', 'saliver' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                    'condition' => [
                                        'type' => 'text',
                                    ],
                                ),
                                array(
                                    'name' => 'pxl_icon_free',
                                    'label' => esc_html__('Icon Free', 'saliver' ),
                                    'type' => \Elementor\Controls_Manager::ICONS,
                                    'fa4compatibility' => 'icon',
                                    'condition' => [
                                        'type' => 'icon',
                                    ],
                                ),
                                array(
                                    'name' => 'pxl_icon_pro',
                                    'label' => esc_html__('Icon Pro', 'saliver' ),
                                    'type' => \Elementor\Controls_Manager::ICONS,
                                    'fa4compatibility' => 'icon',
                                    'condition' => [
                                        'type' => 'icon',
                                    ],
                                ),
                                array(
                                    'name' => 'pxl_icon_enterprise',
                                    'label' => esc_html__('Icon Enterprise', 'saliver' ),
                                    'type' => \Elementor\Controls_Manager::ICONS,
                                    'fa4compatibility' => 'icon',
                                    'condition' => [
                                        'type' => 'icon',
                                    ],
                                ),
                            ),
                        ), 
                        array(
                            'name' => 'plan_pro',
                            'label' => esc_html__('Plan Pro %', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'btn_plan_free',
                            'label' => esc_html__('Btn Plan Free', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'item_link',
                            'label' => esc_html__('Item Link', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::URL,
                        ),
                        array(
                            'name' => 'btn_plan_pro',
                            'label' => esc_html__('Btn Plan Pro', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'item_link1',
                            'label' => esc_html__('Item Link', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::URL,
                        ),
                        array(
                            'name' => 'btn_plan_enterprise',
                            'label' => esc_html__('Btn Enterprise', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'item_link2',
                            'label' => esc_html__('Item Link', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::URL,
                        ),
                    ),
                ),
                
                array(
                    'name' => 'section_style_title',
                    'label' => esc_html__('Title', 'saliver'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Color Plan', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-price-plan1 .pxl-plan > div' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Typography', 'saliver' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '.pxl-price-plan1 .pxl-plan > div',
                        ),
                        array(
                            'name' => 'title_color1',
                            'label' => esc_html__('Color Plan Option', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-price-plan1 .pxl-plan-free > div,.pxl-price-plan1 .pxl-plan-pro > div,.pxl-price-plan1 .pxl-plan-enterprise > div' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography1',
                            'label' => esc_html__('Typography', 'saliver' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '.pxl-price-plan1 .pxl-plan-free > div,.pxl-price-plan1 .pxl-plan-pro > div,.pxl-price-plan1 .pxl-plan-enterprise > div',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_desc',
                    'label' => esc_html__('Description', 'saliver'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'desc_color',
                            'label' => esc_html__('Color', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-featured-image-box .pxl-desc' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'desc_typography',
                            'label' => esc_html__('Typography', 'saliver' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-featured-image-box .pxl-desc',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_footer',
                    'label' => esc_html__('Footer Content', 'saliver'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'author_color',
                            'label' => esc_html__('Color', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-featured-image-box .pxl-author-name' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'author_typography',
                            'label' => esc_html__('Typography', 'saliver' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-featured-image-box .pxl-author-name',
                        ),
                        array(
                            'name' => 'date_color',
                            'label' => esc_html__('Color', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-featured-image-box .pxl-date' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'date_typography',
                            'label' => esc_html__('Typography', 'saliver' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-featured-image-box .pxl-date',
                        ),
                    ),
                ),
saliver_widget_animation_settings(),
),
),
),
saliver_get_class_widget_path()
);