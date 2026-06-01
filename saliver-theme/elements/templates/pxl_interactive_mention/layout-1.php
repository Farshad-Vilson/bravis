<?php if(isset($settings['client']) && !empty($settings['client']) && count($settings['client'])): ?>
    <div class="pxl-interactive-mention pxl-interactive-mention1">
        <div class="pxl-item-inner">
            <?php foreach ($settings['client'] as $key => $value):
                $image = isset($value['image']) ? $value['image'] : '';
                $text = isset($value['text']) ? $value['text'] : '';?>
                <div class="pxl-item--inner <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
                    <div class="pxl-item--holder">
                        <?php  
                            $img = pxl_get_image_by_size( array(
                                'attach_id'  => $image['id'] ?? '',
                                'thumb_size' => 'full',
                                'class' => 'no-lazyload',
                            ));
                            $thumbnail = $img['url'] ?? '';
                        ?>
                        <div class="pxl-item--image bg-image" style="background-image: url(<?php echo esc_url($thumbnail); ?>);"></div>
                        <?php if ( !empty($text) ) : ?>
                            <div class="pxl-content">
                                <?php echo pxl_print_html($text); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>

