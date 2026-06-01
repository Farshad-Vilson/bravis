<?php 
$html_id = pxl_get_element_id($settings); 
$list_data = [];

if (!empty($settings['texts'])): 
    foreach ($settings['texts'] as $key => $value) {
        $list_data[] = [
            'text' => $value['text'] ?? '',
            'img' => $value['image']['url'] ?? ''
        ];
    }

    $widget->add_render_attribute('lists_text', [
        'class' => 'pxl-button_physics',
        'data-settings' => wp_json_encode($list_data)
    ]);
    ?>
    <div <?php pxl_print_html($widget->get_render_attribute_string('lists_text')); ?>></div>
<?php endif; ?>
