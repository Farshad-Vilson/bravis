<div class="pxl-client-review pxl-client-review2 <?php echo esc_attr($settings['pxl_animate']); ?> <?php echo esc_attr( $settings['style']) ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-item--inner">
        <div class="pxl-item--meta">
            <div class="pxl-item--title">
                <?php {
                    $widget->add_render_attribute( 'link', 'href', $settings['link']['url'] );

                    if ( $settings['link']['is_external'] ) {
                        $widget->add_render_attribute( 'link', 'target', '_blank' );
                    }

                    if ( $settings['link']['nofollow'] ) {
                        $widget->add_render_attribute( 'link', 'rel', 'nofollow' );
                    } ?>
                    <a class="pxl-item--link" <?php pxl_print_html($widget->get_render_attribute_string( 'link' )); ?>><?php echo pxl_print_html($settings['title']); ?></a>
                <?php } ?>
                <?php if(!empty($settings['tt2'])) { ?>
                    <div class="pxl-item--title2"><?php echo pxl_print_html($settings['tt2']); ?></div>
                <?php } ?>
            </div>
        </div>
        <div class="pxl-item--images el-empty">
            <?php foreach ($settings['images'] as $key => $value): 
                $img = pxl_get_image_by_size( array(
                    'attach_id'  => $value['id'],
                    'thumb_size' => 'full',
                ));
                $thumbnail = $img['thumbnail'];
                ?>
                <div class="pxl-item--img">
                    <?php echo wp_kses_post($thumbnail); ?>
                </div>
            <?php endforeach; ?>
            <?php if(!empty($settings['text_box'])) { ?>
                <h4 class="pxl-item--user-plus"><?php echo pxl_print_html($settings['text_box']); ?></h4>
            <?php } ?>
        </div>
    </div>
</div>




