<div class="pxl-user-review pxl-user-review1 ">
    <div class="pxl--inner">
        <div class="pxl-item--holder ">
            <div class="pxl-item--icon">
                <?php if (!empty($settings['avatar']['id'])) {
                        $img_icon = pxl_get_image_by_size([
                            'attach_id'  => $settings['avatar']['id'],
                            'thumb_size' => 'full',
                        ]);
                        $thumbnail_icon = $img_icon['thumbnail'] ?? '';

                        if (!empty($thumbnail_icon)) {
                            echo pxl_print_html($thumbnail_icon);
                        }
                    }
                ?>
            </div>
            <div class="pxl-content">
                <h3 class="pxl-title">
                    <?php echo pxl_print_html($settings['title']); ?>
                </h3>
                <div class="pxl-address">
                    <?php echo pxl_print_html($settings['address']); ?>
                </div>
            </div>
        </div>
    </div>
</div>


