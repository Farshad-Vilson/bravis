<?php
$widget->add_render_attribute( 'counter', [
    'class' => 'pxl-counter--value '.$settings['effect'].'',
    'data-duration' => $settings['duration'],
    'data-startnumber' => $settings['starting_number'],
    'data-endnumber' => $settings['ending_number'],
    'data-to-value' => $settings['ending_number'],
    'data-delimiter' => $settings['thousand_separator_char'],
] ); ?>
<div class="pxl-counter-box pxl-counter-box1 <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-counter--holder">
        <div class="pxl-content">
            <?php if(!empty($settings['title'])) : ?>
                <div class="pxl-counter--title"><?php echo pxl_print_html($settings['title']); ?></div>
            <?php endif; ?>
        </div>
        <div class="pxl-item--icon"> 
            <?php if ($settings['icon_type'] == 'icon' && !empty($settings['pxl_icon']['value'])) : ?>
                <div class="pxl-item--icon">
                    <span class="icon">
                        <?php \Elementor\Icons_Manager::render_icon($settings['pxl_icon'], ['aria-hidden' => 'true', 'class' => ''], 'i'); ?>
                    </span>
                </div>
            <?php endif; ?>

            <?php if ($settings['icon_type'] == 'image' && !empty($settings['icon_image']['id'])) : ?>
                <div class="pxl-item--icon">
                    <?php 
                    $img_icon = pxl_get_image_by_size([
                        'attach_id'  => $settings['icon_image']['id'],
                        'thumb_size' => 'full',
                    ]);
                    echo '<span class="img">' . pxl_print_html($img_icon['thumbnail']) . '</span>';
                    ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="pxl-counter--number pxl-flex <?php echo esc_attr($settings['shape_number']); ?>">
            <div class="pxl-item--number">
                <span class="pxl-counter--prefix el-empty"><?php echo pxl_print_html($settings['prefix']); ?></span>
                <span <?php pxl_print_html($widget->get_render_attribute_string( 'counter' )); ?>><?php echo esc_html($settings['starting_number']); ?></span>
                <?php if(!empty($settings['suffix'])) : ?>
                    <span class="pxl-counter--suffix"><?php echo pxl_print_html($settings['suffix']); ?></span>
                <?php endif; ?>
            </div>
        </div>
        <span class="pxl-counter--plus"><?php echo pxl_print_html($settings['under_suffix']); ?></span>
    </div>
</div>