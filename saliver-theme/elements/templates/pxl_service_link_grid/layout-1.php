<div class="pxl-service-link-grid pxl-service-link-grid1 <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <ul class="pxl-wrap-item">
        <?php foreach ($settings['progressbar_list'] as $key => $value):
            $content = isset($value['content']) ? $value['content'] : '';
            $icon_key = $widget->get_repeater_setting_key( 'pxl_icon', 'icons', $key );
            $link_key = $widget->get_repeater_setting_key( 'link', 'value', $key );
            if ( ! empty( $value['link']['url'] ) ) {
                $widget->add_render_attribute( $link_key, 'href', $value['link']['url'] );

                if ( $value['link']['is_external'] ) {
                    $widget->add_render_attribute( $link_key, 'target', '_blank' );
                }

                if ( $value['link']['nofollow'] ) {
                    $widget->add_render_attribute( $link_key, 'rel', 'nofollow' );
                }
            }
            $link_attributes = $widget->get_render_attribute_string( $link_key ); ?>

            <li class="pxl-item">
                <div class="wrap-content">
                    <a <?php echo implode( ' ', [ $link_attributes ] ); ?>>
                        <div class="pxl-content">
                            <div class="pxl-icon pxl-mr-18">
                                <?php if(!empty($value['pxl_icon'])){
                                    \Elementor\Icons_Manager::render_icon( $value['pxl_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' );} 
                                ?>
                            </div>
                            <h4 class="pxl-item-content"><?php echo pxl_print_html($content); ?></h4>
                        </div>
                        <svg width="10" height="16" viewBox="0 0 10 16" fill="none" stroke="white" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1L8 8L1 14.5"  stroke-width="1.5"/>
                        </svg>
                    </a>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</div>


