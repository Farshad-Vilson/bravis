<?php
// Register Icon Box Widget
pxl_add_custom_widget(
    array(
        'name' => 'pxl_image_transform',
        'title' => esc_html__('Bravis Image Transform', 'saliver' ),
        'icon' => 'eicon-icon-box',
        'categories' => array('pxltheme-core'),
        'scripts' => [
            'pxl-scroll-trigger',
        ],
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'saliver' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'logo_image',
                            'label' => esc_html__( 'Main Image', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                        ),
                        array(
                            'name' => 'transform_image1',
                            'label' => esc_html__( 'Box Image 1', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                        ),
                        array(
                            'name' => 'transform_image2',
                            'label' => esc_html__( 'Box Image 2', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                        ),
                        array(
                            'name' => 'transform_image3',
                            'label' => esc_html__( 'Box Image 3', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_general',
                    'label' => esc_html__('General', 'saliver' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        
                    ),
                ),
                saliver_widget_animation_settings(),
            ),
        ),
    ),
    saliver_get_class_widget_path()
);