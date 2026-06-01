<?php
// Register Button Widget
pxl_add_custom_widget(
    array(
        'name' => 'physics_item',
        'title' => esc_html__('Case Physics', 'saliver' ),
        'icon' => 'eicon-cart-medium',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'pxl-matter'
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'source_section',
                    'label' => esc_html__('Source Settings', 'saliver' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'texts',
                            'label' => esc_html__('List', 'saliver'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            
                            'controls' => array(
                                array(
                                    'name' => 'text',
                                    'label' => esc_html__('Text', 'saliver' ),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                ),
                                array(
                                    'name' => 'image',
                                    'label' => esc_html__('Image', 'saliver' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                    'default' => [
                                        'url' => \Elementor\Utils::get_placeholder_image_src(),
                                    ],
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    saliver_get_class_widget_path()
);