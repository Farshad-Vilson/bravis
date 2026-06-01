<div class="pxl-icon-box pxl-icon-box2 <?php echo esc_attr($settings['style'].' '.$settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <?php if ( ! empty( $settings['item_link']['url'] ) ) {
        $widget->add_render_attribute( 'item_link', 'href', $settings['item_link']['url'] );

        if ( $settings['item_link']['is_external'] ) {
            $widget->add_render_attribute( 'item_link', 'target', '_blank' );
        }

        if ( $settings['item_link']['nofollow'] ) {
            $widget->add_render_attribute( 'item_link', 'rel', 'nofollow' );
        } ?>
        <a class="pxl-item--link" <?php pxl_print_html($widget->get_render_attribute_string( 'item_link' )); ?>></a>
    <?php } ?>
    <div class="pxl-content-icon">
        <div class="pxl--item-icon">
            <?php if (!empty($settings['logo_image']['id'])) : ?>
                <div class="pxl-item--logo">
                    <?php 
                    $img_logo = pxl_get_image_by_size([
                        'attach_id'  => $settings['logo_image']['id'],
                        'thumb_size' => 'full',
                    ]);
                    echo pxl_print_html($img_logo['thumbnail']);
                    ?>
                </div>
            <?php endif; ?>

            <?php if ( 
                $settings['icon_type'] == 'icon' && 
                (!empty($settings['pxl_icon']['value']) || !empty($settings['pxl_icon1']['value']) || !empty($settings['pxl_icon2']['value'])) ) : ?>
                <div class="pxl-item--icon">
                    <?php 
                    if (!empty($settings['pxl_icon']['value'])) {
                        echo '<span class="icon">';
                        \Elementor\Icons_Manager::render_icon( $settings['pxl_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); 
                        echo '</span>';
                    }
                    if (!empty($settings['pxl_icon1']['value'])) {
                        echo '<span class="icon">';
                        \Elementor\Icons_Manager::render_icon( $settings['pxl_icon1'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); 
                        echo '</span>';
                    }
                    if (!empty($settings['pxl_icon2']['value'])) {
                        echo '<span class="icon">';
                        \Elementor\Icons_Manager::render_icon( $settings['pxl_icon2'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); 
                        echo '</span>';
                    }
                    ?>
                </div>
            <?php endif; ?>

            <?php if ( 
                $settings['icon_type'] == 'image' && 
                (!empty($settings['icon_image']['id']) || !empty($settings['icon_image1']['id']) || !empty($settings['icon_image2']['id'])) ) : ?>
                <div class="pxl-item--icon">
                    <?php 
                    if (!empty($settings['icon_image']['id'])) {
                        $img_icon = pxl_get_image_by_size([
                            'attach_id'  => $settings['icon_image']['id'],
                            'thumb_size' => 'full',
                        ]);
                        echo '<span class="img">' . pxl_print_html($img_icon['thumbnail']) . '</span>';
                    }
                    if (!empty($settings['icon_image1']['id'])) {
                        $img_icon1 = pxl_get_image_by_size([
                            'attach_id'  => $settings['icon_image1']['id'],
                            'thumb_size' => 'full',
                        ]);
                        echo '<span class="img">' . pxl_print_html($img_icon1['thumbnail']) . '</span>';
                    }
                    if (!empty($settings['icon_image2']['id'])) {
                        $img_icon2 = pxl_get_image_by_size([
                            'attach_id'  => $settings['icon_image2']['id'],
                            'thumb_size' => 'full',
                        ]);
                        echo '<span class="img">' . pxl_print_html($img_icon2['thumbnail']) . '</span>';
                    }
                    ?>
                </div>
            <?php endif; ?>

        </div>
    </div>

    <div class="pxl-content">
        <<?php echo esc_attr($settings['title_tag']); ?> class="pxl-item--title el-empty"><?php echo pxl_print_html($settings['title']); ?></<?php echo esc_attr($settings['title_tag']); ?>>
        <div class="pxl-item--description el-empty"><?php echo pxl_print_html($settings['desc']); ?></div>
    </div>
</div>