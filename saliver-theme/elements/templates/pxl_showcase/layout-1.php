<?php 
if ( ! empty( $settings['btn_link']['url'] ) ) {
    $widget->add_render_attribute( 'button', 'href', $settings['btn_link']['url'] );

    if ( $settings['btn_link']['is_external'] ) {
        $widget->add_render_attribute( 'button', 'target', '_blank' );
    }

    if ( $settings['btn_link']['nofollow'] ) {
        $widget->add_render_attribute( 'button', 'rel', 'nofollow' );
    }
}
if ( ! empty( $settings['btn_link2']['url'] ) ) {
    $widget->add_render_attribute( 'button2', 'href', $settings['btn_link2']['url'] );

    if ( $settings['btn_link2']['is_external'] ) {
        $widget->add_render_attribute( 'button2', 'target', '_blank' );
    }

    if ( $settings['btn_link2']['nofollow'] ) {
        $widget->add_render_attribute( 'button2', 'rel', 'nofollow' );
    }
}
?>
<div class="pxl-showcase pxl-showcase1 <?php echo esc_attr($settings['active']); ?> <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <span class="pxl-topbar-browser">
        <span></span>
        <span></span>
        <span></span>
    </span>
    <?php if(!empty($settings['image']['id'])) :
        $img = pxl_get_image_by_size( array(
            'attach_id'  => $settings['image']['id'],
            'thumb_size' => 'full',
        ));
        $thumbnail = $img['thumbnail']; 

        $img1 = pxl_get_image_by_size( array(
            'attach_id'  => $settings['image_logo']['id'],
            'thumb_size' => 'full',
        ));
        $thumbnail1 = is_array($img1) && isset($img1['thumbnail']) ? $img1['thumbnail'] : '';
        ?>
        <div class="pxl-item--image">
            <?php echo pxl_print_html($thumbnail); ?>
            <div class="pxl-bg-logo">
                <?php echo pxl_print_html($thumbnail1); ?>
            </div>
            <div class="pxl-ovlay"></div>
            <div class="pxl-item--meta">
                <?php if(!empty($settings['btn_text'])) : ?>
                    <a class="pxl-item--readmore" <?php pxl_print_html($widget->get_render_attribute_string( 'button' )); ?>><?php echo esc_html($settings['btn_text']); ?>
                        <span class="pxl--btn-icon">
                            <i aria-hidden="true" class="fal fa-long-arrow-right"></i>                            
                        </span>
                    </a>
                <?php endif; ?>
                <?php if(!empty($settings['btn_text2'])) : ?>
                    <a class="pxl-item--readmore" <?php pxl_print_html($widget->get_render_attribute_string( 'button2' )); ?>><?php echo esc_html($settings['btn_text2']); ?>
                        <span class="pxl--btn-icon">
                            <i aria-hidden="true" class="fal fa-long-arrow-right"></i>                            
                        </span>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
    <?php if(!empty($settings['title'])) : ?>
        <div class="pxl-item-holder">
            <div class="pxl-item--title">
                <span class="title">
                    <?php echo esc_html($settings['title']); ?>
                </span>
                <span class="category">
                    <?php echo esc_html($settings['category']); ?>
                </span>
            </div>
            <div class="pxl-item-attr">
                <?php echo esc_html($settings['attr']); ?>
            </div>
        </div>
    <?php endif; ?>
    <?php if($settings['active'] == 'yes' && !empty($settings['active_label']) && empty($settings['btn_text'])) : ?>
        <div class="pxl-item--label"><?php echo esc_html($settings['active_label']); ?></div>
    <?php endif; ?>
</div>