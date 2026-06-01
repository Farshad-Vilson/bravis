<?php
$templates = saliver_get_templates_option('tab', []) ;
pxl_add_custom_widget(
    array(
        'name' => 'pxl_tabs_slip',
        'title' => esc_html__( 'Bravis Tabs Slip', 'saliver' ),
        'icon' => 'eicon-tabs',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'saliver-tabs',
            'pxl-ScrollToPlugin'
        ),
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
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_tabs_slip/layout-image/layout1.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_content',
                    'label' => esc_html__( 'Tabs', 'saliver' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style-1' => 'Style 1',
                                'style-2' => 'Style 2',
                            ],
                            'default' => 'style-1',
                        ),
                        array(
                            'name' => 'anchor',
                            'label' => esc_html__('Show anchor', 'saliver'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => false,
                            'condition' => ['style' => 'style-2'], 
                        ),
                        array(
                            'name' => 'pagination',
                            'label' => esc_html__('Show Pagination', 'saliver'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => false,
                            'condition' => ['style' => 'style-2'], 
                        ),
                        array(
                            'name' => 'w_block',
                            'label' => esc_html__('Top Sticky', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                                '%' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-tabs-slip1 .pxl-item--content' => 'top: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'tabs',
                            'label' => esc_html__( 'Content', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'content_template',
                                    'label' => esc_html__('Select Templates', 'saliver'),
                                    'type' => 'select',
                                    'options' => $templates,
                                    'default' => 'df',
                                    'description' => 'Add new tab template: "<a href="' . esc_url( admin_url( 'edit.php?post_type=pxl-template' ) ) . '" target="_blank">Click Here</a>"',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),saliver_get_class_widget_path()
);