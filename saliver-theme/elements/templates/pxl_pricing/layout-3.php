
<?php
$editor_title = $widget->get_settings_for_display( 'popular', '' );
if( !empty($editor_title) )
  $editor_title = $widget->parse_text_editor( $editor_title );

$is_new = \Elementor\Icons_Manager::is_migration_allowed();
?>

<div class="pxl-pricing pxl-pricing3 <?php echo esc_html($settings['_active']); ?>">
    <div class="pxl-item1">
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
        <?php } ?>
    </div>
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
    <div class="pxl-item2">
        <?php if(isset($settings['feature']) && !empty($settings['feature']) && count($settings['feature'])): ?>
            <ul class="pxl-pricing--feature">
                <?php foreach ($settings['feature'] as $key => $link):
                    $feature_text = $widget->parse_text_editor($link['feature_text']);
                    $feature_active = $widget->parse_text_editor($link['feature_active']);  
                    $icon_key = $widget->get_repeater_setting_key('pxl_icon', 'icons', $key);
                    $widget->add_render_attribute($icon_key, [
                        'class' => $link['pxl_icon'],
                        'aria-hidden' => 'true',
                    ]);

                    $li_class = ($feature_active == 'no') ? ' class="no"' : '';?>
                        <li class="<?php echo esc_attr( $li_class ); ?>">
                            <span class="pxl-icon--check">
                            <?php if ($is_new):
                                \Elementor\Icons_Manager::render_icon($link['pxl_icon'], ['aria-hidden' => 'true']);
                            elseif (!empty($link['pxl_icon'])): ?>
                                <i class="<?php echo esc_attr($link['pxl_icon']); ?>" aria-hidden="true"></i>
                            <?php endif; ?>
                            </span>
                            <?php if ($feature_active == 'no') echo ''; ?>
                            <?php echo pxl_print_html($feature_text); ?>
                            <?php if ($feature_active == 'no') echo ''; ?>
                        </li>
                <?php endforeach; ?>

            </ul>
        <?php endif; ?>
    </div>
</div>