<div class="pxl-feauture-box pxl-feauture-box1 <?php echo esc_attr($settings['style'].' '.$settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <?php $link = saliver_render_link_attributes($settings['item_link']);?>
    <div class="pxl-item--number"> <span><?php echo pxl_print_html($settings['number']); ?></span> </div>
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
    <div class="pxl-content">
        <<?php echo esc_attr($settings['title_tag']); ?> class="pxl-item--title el-empty"><?php echo pxl_print_html($settings['title']); ?></<?php echo esc_attr($settings['title_tag']); ?>>
        <div class="pxl-item--description el-empty"><?php echo pxl_print_html($settings['desc']); ?></div>
    </div>
    <a class="pxl-item--btn" <?php pxl_print_html($link); ?>> 
        <?php echo pxl_print_html($settings['title_btn']);?>
        <span class="pxl-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="8" viewBox="0 0 15 8" fill="black">
                <path d="M10.2242 0.116959C10.3492 -0.0389864 10.5994 -0.0389864 10.7557 0.116959L14.3827 3.73489C14.5391 3.89084 14.5391 4.10916 14.3827 4.26511L10.7557 7.88304C10.5994 8.03899 10.3492 8.03899 10.2242 7.88304L9.97404 7.66472C9.84897 7.50877 9.84897 7.29045 9.97404 7.1345L12.6005 4.51462H0.875209C0.656337 4.51462 0.5 4.35867 0.5 4.14035V3.82846C0.5 3.64133 0.656337 3.45419 0.875209 3.45419H12.6005L9.97404 0.865497C9.84897 0.709552 9.84897 0.491228 9.97404 0.335283L10.2242 0.116959Z" />
            </svg>
        </span>
    </a>
</div>