<?php if (isset($settings['client']) && !empty($settings['client']) && count($settings['client'])): 
    $is_new = \Elementor\Icons_Manager::is_migration_allowed();
    $image_size = !empty($settings['img_size']) ? $settings['img_size'] : 'full';
    $max_items = !empty($settings['img_active']) ? intval($settings['img_active']) : 3; 
    $count = 0; 
?>
<div class="pxl-img-anmation <?php echo esc_attr($settings['style']); ?>">
    <div class="pxl-content">
        <?php foreach ($settings['client'] as $key => $value): 
            if ($count >= $max_items) break; 
            $count++; 
            $image = isset($value['image']) ? $value['image'] : '';
            $link_key = $widget->get_repeater_setting_key( 'link', 'value', $key );
            if ( ! empty( $value['link']['url'] ) ) {
                $widget->add_render_attribute( $link_key, 'href', $value['link']['url'] );
                if ( $value['link']['is_external'] ) {
                    $widget->add_render_attribute( $link_key, 'target', '_blank' );
                }
                if ( $value['link']['nofollow'] ) {
                    $widget->add_render_attribute( $link_key, 'rel', 'nofollow' );
                }
            }
            $link_attributes = $widget->get_render_attribute_string( $link_key ); ?>
            <div class="pxl-item--inner <?php echo esc_attr($settings['pxl_animate']); ?> pxl-img-item" data-id="<?php echo esc_attr($key); ?>" data-index="<?php echo esc_attr($count); ?>">
                <div class="pxl-item--holder">
                    <a class="pxl-link" <?php echo implode( ' ', [ $link_attributes ] ); ?>>
                        <?php if(!empty($image['id'])) { 
                            $img = pxl_get_image_by_size( array(
                                'attach_id'  => $image['id'],
                                'thumb_size' => $image_size,
                                'class' => 'no-lazyload',
                            ));
                            $thumbnail = $img['thumbnail'];?>
                            <div class="pxl-item--image">
                                <?php echo wp_kses_post($thumbnail); ?>
                            </div>
                        <?php } ?>
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="pxl-hidden-items" style="display: none;">
        <?php foreach ($settings['client'] as $key => $value):
            if ($key < $max_items) continue;
            $image = isset($value['image']) ? $value['image'] : '';
            $link_key = $widget->get_repeater_setting_key( 'link', 'value', $key );
            if ( ! empty( $value['link']['url'] ) ) {
                $widget->add_render_attribute( $link_key, 'href', $value['link']['url'] );
                if ( $value['link']['is_external'] ) {
                    $widget->add_render_attribute( $link_key, 'target', '_blank' );
                }
                if ( $value['link']['nofollow'] ) {
                    $widget->add_render_attribute( $link_key, 'rel', 'nofollow' );
                }
            }
            $link_attributes = $widget->get_render_attribute_string( $link_key ); ?>
            <div class="pxl-item--inner <?php echo esc_attr($settings['pxl_animate']); ?> pxl-img-item" data-id="<?php echo esc_attr($key); ?>">
                <div class="pxl-item--holder">
                    <a class="pxl-link" <?php echo implode( ' ', [ $link_attributes ] ); ?>>
                        <?php if(!empty($image['id'])) { 
                            $img = pxl_get_image_by_size( array(
                                'attach_id'  => $image['id'],
                                'thumb_size' => $image_size,
                                'class' => 'no-lazyload',
                            ));
                            $thumbnail = $img['thumbnail'];?>
                            <div class="pxl-item--image">
                                <?php echo wp_kses_post($thumbnail); ?>
                            </div>
                        <?php } ?>
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>
<?php endif; ?>
