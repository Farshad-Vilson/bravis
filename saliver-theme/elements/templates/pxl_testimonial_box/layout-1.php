<?php
$active = intval($settings['active']);
$accordion = $widget->get_settings('lists');
$wg_id = pxl_get_element_id($settings);
$is_new = \Elementor\Icons_Manager::is_migration_allowed();
if(!empty($accordion)) : ?>
    <div class="pxl-testimonial-box pxl-accordion pxl-accordion-testimonial pxl-testimonial-box1 wow skewIn <?php echo esc_attr($settings['style'].' '.$settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
        <?php foreach ($accordion as $key => $value):
            $is_active = ($key + 1) == $active;
            $pxl_id = isset($value['_id']) ? $value['_id'] : '';
            $title = isset($value['title']) ? $value['title'] : '';
            $desc = isset($value['desc']) ? $value['desc'] : '';
            $address = isset($value['address']) ? $value['address'] : '';
            $image = isset($value['image']) ? $value['image'] : '';
            $image_size = !empty($settings['img_size']) ? $settings['img_size'] : 'full';
            $icon_key = $widget->get_repeater_setting_key( 'pxl_icon', 'icons', $key );
            $widget->add_render_attribute( $icon_key, [
                'class' => $value['pxl_icon'],
                'aria-hidden' => 'true',
            ] );
            ?>
            <div class="pxl--item <?php echo esc_attr($is_active ? 'active' : ''); ?>">
                <<?php pxl_print_html($settings['title_tag']); ?> class="pxl-accordion--title" data-target="<?php echo esc_attr('#'.$wg_id.'-'.$pxl_id); ?>">
                    
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
                    <?php if($settings['style'] == 'style-default') : ?><span class="pxl-icon--action"><span class="pxl-icon--plus"><span></span></span></span><?php endif; ?>
                </<?php pxl_print_html($settings['title_tag']); ?>>
                <div id="<?php echo esc_attr($wg_id.'-'.$pxl_id); ?>" class="pxl-accordion--content" <?php if($is_active){ ?>style="display: block;"<?php } ?>>
                    <div class="pxl-content">
                        <div class="pxl-icon">
                            <?php if ( $is_new ):
                                    \Elementor\Icons_Manager::render_icon( $value['pxl_icon'], [ 'aria-hidden' => 'true' ] );
                                elseif(!empty($value['pxl_icon'])): ?>
                                    <i class="<?php echo esc_attr( $value['pxl_icon'] ); ?>" aria-hidden="true"></i>
                                <?php endif; 
                            ?>
                        </div>
                        <span class="pxl-item-desc">
                            <?php echo wp_kses_post(nl2br($desc)); ?>
                        </span>
                        <span class="pxl-title--text"><?php echo wp_kses_post($title); ?></span>
                        <span class="pxl-title--add"><?php echo wp_kses_post($address); ?></span>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>