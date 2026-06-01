<?php 
$html_id = pxl_get_element_id($settings); 

if (isset($settings['tabs']) && !empty($settings['tabs']) && count($settings['tabs'])): 
    $tab_bd_ids = [];
$tab_count = count($settings['tabs']);
$is_style_2 = ($settings['style'] === 'style-2'); 
?>
<div class="pxl-tabs-slip pxl-tabs-slip1 <?php echo esc_attr($settings['style']); ?>">
    <div class="pxl-tabs--content" <?php if ($is_style_2) { ?> style="width: <?php echo esc_attr($tab_count * 100); ?>%;"<?php } ?>>
        <?php if ($is_style_2) { ?>
            <?php if ($settings['anchor'] == 'true') { ?>
                <nav class="anchor-nav" role="navigation">
                    <?php foreach ($settings['tabs'] as $key => $content) : ?>
                        <a href="<?php echo esc_attr('#tab-item-' . $key); ?>" class="anchor"><?php echo esc_html($key + 1); ?></a>
                    <?php endforeach; ?>
                </nav>
            <?php } ?>
            <?php if ($settings['pagination'] == 'true') { ?>
                <div class="pagination-fraction">
                    <span class="current-page">01</span>
                    <span class="separator">/</span>
                    <span class="total-pages">03</span>
                </div>
            <?php } ?>
        <?php } ?>
        <?php foreach ($settings['tabs'] as $key => $content) : 
            $content_template_id = (int)$content['content_template']; 
            $tab_content = Elementor\Plugin::$instance->frontend->get_builder_content_for_display($content_template_id);
            $tab_bd_ids[] = $content_template_id; 
            ?>
            <div id="<?php echo esc_attr('tab-item-' . $key); ?>" class="pxl-item--content pxl-item--content-<?php echo esc_attr($key + 1); ?>">
                <?php pxl_print_html($tab_content); ?>        
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php endif; ?>
