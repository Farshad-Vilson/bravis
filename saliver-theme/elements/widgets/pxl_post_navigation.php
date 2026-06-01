<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_post_navigation',
        'title' => esc_html__('Bravis Post Navigation', 'saliver' ),
        'icon' => 'eicon-navigation-horizontal',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'saliver' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array (
                            'name' => 'type',
                            'label' => esc_html__('Type', 'saliver'),
                            'type' => Elementor\Controls_Manager::SELECT,
                            'default' => 'pagination',
                            'options' => [
                                'navigation' => esc_html__('Navigation', 'saliver'),
                            ]
                        ),
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Prev Title', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'title1',
                            'label' => esc_html__('Next Title', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'show_share',
                            'label' => esc_html__('Show Share', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                        array(
                            'name' => 'show_grid',
                            'label' => esc_html__('Show Grid', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'false',
                        ),
                        array(
                            'name' => 'logo_link',
                            'label' => esc_html__('Link', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::URL,
                        ),
                        array(
                            'name' => 'link_grid_page',
                            'label' => esc_html__('Link Gird Page', 'saliver' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => esc_html__('#', 'saliver'),
                            'condition' => [
                                'show_grid' => 'true',
                            ]
                        ),
                    ),
                ),
            ),
        ),
    ),
    saliver_get_class_widget_path()
)
?>