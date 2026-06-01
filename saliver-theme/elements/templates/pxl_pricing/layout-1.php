
<?php
$editor_title = $widget->get_settings_for_display( 'popular', '' );
if( !empty($editor_title) )
  $editor_title = $widget->parse_text_editor( $editor_title );
?>

<div class="pxl-pricing pxl-pricing1 <?php echo esc_html($settings['_active']); ?>">
    <div class="pxl-item-left">
        <?php if (!empty($settings['popular'])) : ?>
            <div class="pxl-pricing--top">
                <span><?php echo wp_kses_post($editor_title); ?></span>
            </div>
        <?php endif; ?>
        <div class="pxl-pricing--price">
            <span class="pxl-pricing--currency"><?php echo esc_html($settings['currency']); ?></span>
            <span><?php echo esc_html($settings['price']); ?></span>
        </div>
        <div class="pxl-pricing--subtitle pxl-empty"><?php echo esc_html($settings['sub_title']); ?></div>
        <?php if ( ! empty( $settings['btn_text'] ) ) {
            $widget->add_render_attribute( 'btn_link', 'href', $settings['btn_link']['url'] );

            if ( $settings['btn_link']['is_external'] ) {
                $widget->add_render_attribute( 'btn_link', 'target', '_blank' );
            }

            if ( $settings['btn_link']['nofollow'] ) {
                $widget->add_render_attribute( 'btn_link', 'rel', 'nofollow' );
            } ?>
            <div class="pxl-pricing--button">
                <a class="btn" <?php pxl_print_html($widget->get_render_attribute_string( 'btn_link' )); ?>>
                    <span><?php echo esc_html($settings['btn_text']); ?></span>
                    <span class="pxl-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="8" viewBox="0 0 14 8" fill="black">
                            <path d="M9.72418 0.116959C9.84925 -0.0389864 10.0994 -0.0389864 10.2557 0.116959L13.8827 3.73489C14.0391 3.89084 14.0391 4.10916 13.8827 4.26511L10.2557 7.88304C10.0994 8.03899 9.84925 8.03899 9.72418 7.88304L9.47404 7.66472C9.34897 7.50877 9.34897 7.29045 9.47404 7.1345L12.1005 4.51462H0.375209C0.156337 4.51462 0 4.35867 0 4.14035V3.82846C0 3.64133 0.156337 3.45419 0.375209 3.45419H12.1005L9.47404 0.865497C9.34897 0.709552 9.34897 0.491228 9.47404 0.335283L9.72418 0.116959Z" />
                        </svg>
                    </span>
                </a>
            </div>
        <?php } ?>
    </div>
    <div class="pxl-item-right">
        <?php if(isset($settings['feature']) && !empty($settings['feature']) && count($settings['feature'])): ?>
            <ul class="pxl-pricing--feature">
                <?php
                    foreach ($settings['feature'] as $key => $link):
                        $feature_text = $widget->parse_text_editor( $link['feature_text'] );
                        $feature_active = $widget->parse_text_editor( $link['feature_active'] );  ?>
                        <li>
                            <span class="pxl-icon--check">
                                <svg width="16" height="13" viewBox="0 0 16 13" fill="#9FE870" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14.5195 0.484375C14.6953 0.34375 14.9414 0.34375 15.1172 0.484375L15.5039 0.90625C15.6797 1.04688 15.6797 1.32812 15.5039 1.50391L4.95703 12.0508C4.81641 12.1914 4.53516 12.1914 4.39453 12.0508L0.210938 7.86719C0.0351562 7.69141 0.0351562 7.41016 0.210938 7.26953L0.597656 6.84766C0.773438 6.70703 1.01953 6.70703 1.19531 6.84766L4.67578 10.3281L14.5195 0.484375Z" />
                                </svg>
                            </span>
                            <?php if($feature_active == 'no') { echo '<del>'; } ?>
                            <?php echo pxl_print_html($feature_text); ?>
                            <?php if($feature_active == 'no') { echo '</del>'; } ?>
                        </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
</div>