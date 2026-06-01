<?php
$active = intval($settings['active'] ?? 0);
$accordion = $widget->get_settings('lists');
$wg_id = pxl_get_element_id($settings);
$image_size = $settings['img_size'] ?? 'full';

if (!empty($accordion)) : ?>
    <div class="pxl-testimonial-box pxl-testimonial-box3 <?php echo esc_attr("{$settings['style']} {$settings['pxl_animate']}"); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay'] ?? 0); ?>ms">
        <?php foreach ($accordion as $key => $value):
            $is_active = ($key + 1) == $active;
            $pxl_id = $value['_id'] ?? '';
            $title = $value['title'] ?? '';
            $desc = $value['desc'] ?? '';
            $address = $value['address'] ?? '';
            $image = $value['image'] ?? [];
            ?>
            <div class='pxl--item <?php echo esc_attr( $is_active ? 'active' : '' ); ?>'>
                <div class="pxl-image-logo">
                    <?php if (!empty($image['id'])) {
                        $img = pxl_get_image_by_size([
                            'attach_id'  => $image['id'],
                            'thumb_size' => $image_size,
                            'class'      => 'no-lazyload',
                        ]);
                        echo '<div class="pxl-item--image">' . wp_kses_post($img['thumbnail']) . '</div>';
                    } ?>
                </div>
                <span class="pxl-item-desc"><?php echo wp_kses_post(nl2br($desc)); ?></span>
                <div class="pxl--content">
                    <div class="content">
                        <span class="pxl-title--text"><?php echo wp_kses_post($title); ?></span>
                        <span class="pxl-title--add"><?php echo wp_kses_post($address); ?></span>
                    </div>
                    <div class="pxl-quote">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="20" viewBox="0 0 24 20" fill="white">
                            <path d="M0 10V20H10.0001V10H3.33338C3.33338 6.32408 6.32413 3.33335 10.0001 3.33335V0C4.4857 0 0 4.48567 0 10Z"/>
                            <path d="M23.3341 3.33335V0C17.8197 0 13.334 4.48567 13.334 10V20H23.3341V10H16.6674C16.6674 6.32408 19.6581 3.33335 23.3341 3.33335Z"/>
                        </svg>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
