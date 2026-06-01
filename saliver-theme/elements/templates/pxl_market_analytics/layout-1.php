<?php
$accordion = $widget->get_settings('lists');
$wg_id = pxl_get_element_id($settings);
$is_new = \Elementor\Icons_Manager::is_migration_allowed();
if(!empty($accordion)) : ?>
    <div class="pxl-market-analytics pxl-market-analytics1 <?php echo esc_attr($settings['style'].' '.$settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
        <div class="pxl-header-title">
            <div class="pxl-header">
                <?php echo esc_html__('stock name', 'saliver'); ?>
            </div>
            <div class="pxl-header">
                <?php echo esc_html__('market cap', 'saliver'); ?>
            </div>
            <div class="pxl-header">
                <?php echo esc_html__('volume', 'saliver'); ?>
            </div>
            <div class="pxl-header">
                <?php echo esc_html__('supply', 'saliver'); ?>
            </div>
            <div class="pxl-header">
                
            </div>
        </div>
        <?php foreach ($accordion as $key => $value):
            $market_cap = isset($value['market_cap']) ? $value['market_cap'] : '';
            $volume = isset($value['volume']) ? $value['volume'] : '';
            $supply = isset($value['supply']) ? $value['supply'] : '';
            $text_link = isset($value['text_link']) ? $value['text_link'] : '';
            $title = isset($value['title']) ? $value['title'] : '';
            $position = isset($value['position']) ? $value['position'] : '';
            $image = isset($value['image']) ? $value['image'] : '';
            $icon_type = isset($value['icon_type']) ? $value['icon_type'] : '';
            $image_size = !empty($settings['img_size']) ? $settings['img_size'] : 'full';
            $link = saliver_render_link_attributes($value['item_link']);
            $icon_key = $widget->get_repeater_setting_key( 'pxl_icon', 'icons', $key );
            $widget->add_render_attribute( $icon_key, [
                'class' => $value['pxl_icon'],
                'aria-hidden' => 'true',
            ] );
            ?>
            <div class="pxl--item ">
                    <div class="pxl-item--image">
                        
                        <?php if ( $value['icon_type'] == 'icon' && !empty($value['pxl_icon']['value']) ) : ?>
                            <div class="pxl-item--icon">
                                <?php \Elementor\Icons_Manager::render_icon( $value['pxl_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); ?>
                            </div>
                        <?php endif; ?>
                        <?php if ( $value['icon_type'] == 'image' && !empty($value['icon_image']['id']) ) : ?>
                            <div class="pxl-item--icon">
                                <?php $img = pxl_get_image_by_size( array(
                                    'attach_id'  => $image['id'],
                                    'thumb_size' => $image_size,
                                    'class' => 'no-lazyload',
                                ));
                                $thumbnail = $img['thumbnail'];?>
                                <?php echo wp_kses_post($thumbnail); ?>
                            </div>
                        <?php endif; ?>
                        <div class="pxl-name-title">
                            <div class="pxl-title">
                                <?php echo pxl_print_html($value['title'])?>
                            </div>
                            <div class="pxl-position">
                                <?php echo pxl_print_html($value['position'])?>
                            </div>
                        </div>
                    </div>
                <?php if(!empty($value['market_cap'])) : ?>
                    <div class="pxl-item--market-cap">
                        <?php echo pxl_print_html($value['market_cap'])?>
                    </div>
                <?php endif; ?>
                <?php if(!empty($value['volume'])) : ?>
                    <div class="pxl-item--volume">
                        <?php echo pxl_print_html($value['volume'])?>
                    </div>
                <?php endif; ?>
                <?php if(!empty($value['supply'])) : ?>
                    <div class="pxl-item--supply">
                        <?php echo pxl_print_html($value['supply'])?>
                    </div>
                <?php endif; ?>
                <?php if(!empty($value['text_link'])) : ?>
                    <a class="pxl-item--text-link" <?php pxl_print_html($link); ?>>
                        <?php echo pxl_print_html($value['text_link'])?>
                    </a>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>



