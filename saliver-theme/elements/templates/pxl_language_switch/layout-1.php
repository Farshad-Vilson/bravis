<?php if(isset($settings['language']) && !empty($settings['language']) && count($settings['language'])): 
    $active = intval($settings['active']); ?>
    <div class="pxl-language-switch <?php echo esc_attr($settings['style_l'])?> <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
        <?php foreach ($settings['language'] as $key => $value):
            $is_active = ($key + 1) == $active;
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
            $link_attributes = $widget->get_render_attribute_string( $link_key );
            if(!empty($value['name'])) : ?>
                <div class="pxl--item <?php echo esc_attr($is_active ? 'active' : ''); ?>">
                    <a <?php echo implode( ' ', [ $link_attributes ] ); ?>>
                        <?php echo esc_attr($value['name']); ?>
                    </a>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
<?php endif; ?>