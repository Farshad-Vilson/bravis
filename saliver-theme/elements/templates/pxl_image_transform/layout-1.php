<div class="pxl-image-transform pxl-image-transform1 <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    
    <?php if (!empty($settings['logo_image']['id'])) : ?>
        <div class="pxl-item--logo">
            <?php 
            $img_logo = pxl_get_image_by_size([
                'attach_id'  => $settings['logo_image']['id'],
                'thumb_size' => 'full',
            ]);
            $thumbnail_img    = $img_logo['thumbnail'];
            echo pxl_print_html($thumbnail_img);
            ?>
        </div>
    <?php endif; ?>
    <div class="pxl-image-holder">
        <?php if (!empty($settings['transform_image1']['id'])) : ?>
            <div class="pxl-item--transform pxl-item--transform1">
                <?php 
                $img_transform1 = pxl_get_image_by_size([
                    'attach_id'  => $settings['transform_image1']['id'],
                    'thumb_size' => 'full',
                ]);
                $thumbnail_img1    = $img_transform1['thumbnail'];
                echo pxl_print_html($thumbnail_img1);
                ?>
            </div>
        <?php endif; ?>
        <?php if (!empty($settings['transform_image2']['id'])) : ?>
            <div class="pxl-item--transform pxl-item--transform2">
                <?php 
                $img_transform2 = pxl_get_image_by_size([
                    'attach_id'  => $settings['transform_image2']['id'],
                    'thumb_size' => 'full',
                ]);
                $thumbnail_img2    = $img_transform2['thumbnail'];
                echo pxl_print_html($thumbnail_img2);
                ?>
            </div>
        <?php endif; ?>
        <?php if (!empty($settings['transform_image3']['id'])) : ?>
            <div class="pxl-item--transform pxl-item--transform3">
                <?php 
                $img_transform3 = pxl_get_image_by_size([
                    'attach_id'  => $settings['transform_image3']['id'],
                    'thumb_size' => 'full',
                ]);
                $thumbnail_img3    = $img_transform3['thumbnail'];
                echo pxl_print_html($thumbnail_img3);
                ?>
            </div>
        <?php endif; ?>
    </div>
</div>
