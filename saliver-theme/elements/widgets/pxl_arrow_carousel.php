<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_arrow_carousel',
        'title' => esc_html__('Bravis Nav Carousel', 'saliver'),
        'icon' => 'eicon-animation',
        'categories' => array('pxltheme-core'),
        'scripts' => array(),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'style_section',
                    'label' => esc_html__('Style', 'saliver' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        // array(
                        //     'name' => 'layout',
                        //     'label' => esc_html__('Layout', 'saliver' ),
                        //     'type' => \Elementor\Controls_Manager::SELECT,
                        //     'options' => [
                        //         '1' => 'Layout 1',
                        //         '2' => 'Layout 2',
                        //     ],
                        //     'default' => '1',
                        // ),
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style-1' => 'Style 1',
                            ],
                            'default' => 'style-1',
                        ),
                        array(
                            'name' => 'overlay_color',
                            'label' => esc_html__('Bg Arrow Color', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-navigation-arrow' => 'background: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'overlay_color1',
                            'label' => esc_html__('Bg Arrow Hover', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-navigation-arrow:hover' => 'background: {{VALUE}} !important;',
                            ],
                        ),
                    ),
                ),
            ),
        ),
    ),
    saliver_get_class_widget_path()
);