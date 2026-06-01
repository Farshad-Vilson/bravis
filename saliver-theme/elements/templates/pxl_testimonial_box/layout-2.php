<?php
$active = intval($settings['active']);
$accordion = $widget->get_settings('lists');
$wg_id = pxl_get_element_id($settings);
if(!empty($accordion)) : ?>
    <div class="pxl-testimonial-box pxl-testimonial-box2 wow skewIn <?php echo esc_attr($settings['style'].' '.$settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
        <?php foreach ($accordion as $key => $value):
            $is_active = ($key + 1) == $active;
            $pxl_id = isset($value['_id']) ? $value['_id'] : '';
            $title = isset($value['title']) ? $value['title'] : '';
            $desc = isset($value['desc']) ? $value['desc'] : '';
            $address = isset($value['address']) ? $value['address'] : '';
            $image = isset($value['image']) ? $value['image'] : '';
            $image_size = !empty($settings['img_size']) ? $settings['img_size'] : 'full';
            ?>
            <div class="pxl--item <?php echo esc_attr($is_active ? 'active' : ''); ?>">
                <span class="pxl-item-desc">
                    <?php echo wp_kses_post(nl2br($desc)); ?>
                </span>    
                <div class="pxl-content">
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
                    <span class="pxl-title--text"><?php echo wp_kses_post($title); ?></span>
                    <span class="pxl-title--add"><?php echo wp_kses_post($address); ?></span>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>