<div class="pxl-image-scroll pxl-image-scroll1 <?php echo esc_attr($settings['style'].' '.$settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <?php if (!empty($settings['box_image1']['id'])) : ?>
        <div class="pxl-box pxl-box1 left">
            <?php 
            $box_image1 = pxl_get_image_by_size([
                'attach_id'  => $settings['box_image1']['id'],
                'thumb_size' => 'full',
            ]);
            $thumbnail_url1    = $box_image1['url'];
            ?>
            <div class="pxl-bg-logo bg-image" style="background-image: url(<?php echo esc_url($thumbnail_url1); ?>);"></div>
        </div>
    <?php endif; ?>    
    <?php if (!empty($settings['box_image2']['id'])) : ?>
        <div class="pxl-box pxl-box2">
            <?php 
            $box_image2 = pxl_get_image_by_size([
                'attach_id'  => $settings['box_image2']['id'],
                'thumb_size' => 'full',
            ]);
            $thumbnail_url2    = $box_image2['url'];
            ?>
            <div class="pxl-bg-logo bg-image" style="background-image: url(<?php echo esc_url($thumbnail_url2); ?>);"></div>
            <a class="btn pxl-btn-video pxl-action-popup btn-icon-box2" href="<?php echo esc_url($settings['video_link']); ?>">
                <div class="pxl-btn-text"><?php echo pxl_print_html($settings['btn_text']); ?></div>
                <?php if ( !empty($settings['pxl_icon']['value']) ) : ?>
                    <div class="pxl--btn-icon">
                        <?php \Elementor\Icons_Manager::render_icon( $settings['pxl_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); ?>
                    </div>
                <?php endif; ?>
            </a>
        </div>
    <?php endif; ?>
    <?php if (!empty($settings['box_image3']['id'])) : ?>
        <div class="pxl-box pxl-box3 right">
            <?php 
            $box_image3 = pxl_get_image_by_size([
                'attach_id'  => $settings['box_image3']['id'],
                'thumb_size' => 'full',
            ]);
            $thumbnail_url3    = $box_image3['url'];
            ?>
            <div class="pxl-bg-logo bg-image" style="background-image: url(<?php echo esc_url($thumbnail_url3); ?>);"></div>
        </div>
    <?php endif; ?>
</div>
