<div class="pxl-image-box pxl-image-box1 <?php echo esc_attr($settings['style'].' '.$settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    
    <?php if (!empty($settings['logo_image']['id'])) : ?>
        <div class="pxl-item--logo">
            <?php 
            $img_logo = pxl_get_image_by_size([
                'attach_id'  => $settings['logo_image']['id'],
                'thumb_size' => 'full',
            ]);
            $thumbnail_url    = $img_logo['url'];
            ?>
            <div class="pxl-bg-logo bg-image" style="background-image: url(<?php echo esc_url($thumbnail_url); ?>);"></div>
        </div>
    <?php endif; ?>    

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

    <?php if ( $settings['icon_type'] == 'icon' && !empty($settings['pxl_icon']['value']) ) : ?>
        <div class="pxl-item--icon">
            <?php \Elementor\Icons_Manager::render_icon( $settings['pxl_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); ?>
        </div>
    <?php endif; ?>
    <?php if ( $settings['icon_type'] == 'image' && !empty($settings['icon_image']['id']) ) : ?>
        <div class="pxl-item--icon">
            <?php $img_icon  = pxl_get_image_by_size( array(
                    'attach_id'  => $settings['icon_image']['id'],
                    'thumb_size' => 'full',
                ) );
                $thumbnail_icon    = $img_icon['thumbnail'];
            echo pxl_print_html($thumbnail_icon); ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($settings['box_image']['id'])) : ?>
        <div class="pxl-item--box">
            <?php 
            $img_box = pxl_get_image_by_size([
                'attach_id'  => $settings['box_image']['id'],
                'thumb_size' => 'full',
            ]);
            $thumbnail_img    = $img_box['thumbnail'];
            echo pxl_print_html($thumbnail_img);
            ?>
        </div>
    <?php endif; ?>

    <?php if ( !empty($settings['title']) || !empty($settings['desc']) ) : ?>
        <div class="pxl-content">
            <div class="pxl-item--data">
                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10" fill="none" stroke="black">
                    <path d="M9.16649 0.833496L0.83316 9.16683M9.16649 0.833496H1.66649M9.16649 0.833496V8.3335"  stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                <<?php echo esc_attr($settings['title_tag']); ?> class="pxl-item--title el-empty"><?php echo pxl_print_html($settings['title']); ?></<?php echo esc_attr($settings['title_tag']); ?>>
            </div>
            <div class="pxl-item--description el-empty"><?php echo pxl_print_html($settings['desc']); ?></div>
        </div>
    <?php endif; ?>
</div>
