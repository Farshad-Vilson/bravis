<?php
$col_xs = $widget->get_setting('col_xs', '');
$col_sm = $widget->get_setting('col_sm', '');
$col_md = $widget->get_setting('col_md', '');
$col_lg = $widget->get_setting('col_lg', '');
$col_xl = $widget->get_setting('col_xl', '');
$col_xxl = $widget->get_setting('col_xxl', '');
if($col_xxl == 'inherit') {
    $col_xxl = $col_xl;
}
$slides_to_scroll = $widget->get_setting('slides_to_scroll');
$arrows = $widget->get_setting('arrows', false);  
$pagination = $widget->get_setting('pagination', false);
$pagination_type = $widget->get_setting('pagination_type', 'bullets');
$pause_on_hover = $widget->get_setting('pause_on_hover', false);
$autoplay = $widget->get_setting('autoplay', false);
$autoplay_speed = $widget->get_setting('autoplay_speed', 5000);
$infinite = $widget->get_setting('infinite', false);  
$speed = $widget->get_setting('speed', 500);
$drap = $widget->get_setting('drap', false);
$opts = [
    'slide_direction'               => 'horizontal',
    'slide_percolumn'               => 1, 
    'slide_mode'                    => 'slide', 
    'slides_to_show'                => (int)$col_xl,
    'slides_to_show_xxl'            => (int)$col_xxl, 
    'slides_to_show_lg'             => (int)$col_lg, 
    'slides_to_show_md'             => (int)$col_md, 
    'slides_to_show_sm'             => (int)$col_sm, 
    'slides_to_show_xs'             => (int)$col_xs, 
    'slides_to_scroll'              => (int)$slides_to_scroll,
    'arrow'                         => (bool)$arrows,
    'pagination'                    => (bool)$pagination,
    'pagination_type'               => $pagination_type,
    'autoplay'                      => (bool)$autoplay,
    'pause_on_hover'                => (bool)$pause_on_hover,
    'pause_on_interaction'          => true,
    'delay'                         => (int)$autoplay_speed,
    'loop'                          => (bool)$infinite,
    'speed'                         => (int)$speed
];
$widget->add_render_attribute( 'carousel', [
    'class'         => 'pxl-swiper-container',
    'dir'           => is_rtl() ? 'rtl' : 'ltr',
    'data-settings' => wp_json_encode($opts)
]);
if(isset($settings['testimonial']) && !empty($settings['testimonial']) && count($settings['testimonial'])): ?>
    <div class="pxl-swiper-slider pxl-testimonial-carousel pxl-testimonial-carousel1 " <?php if($drap !== false) : ?>data-cursor-drap="<?php echo esc_attr__('DRAG', 'saliver'); ?>"<?php endif; ?>>
        <div class="pxl-carousel-inner">
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php foreach ($settings['testimonial'] as $key => $value):
                        $title = isset($value['title']) ? $value['title'] : '';
                        $desc = isset($value['desc']) ? $value['desc'] : '';
                        $desc = isset($value['desc']) ? $value['desc'] : '';
                        $address = isset($value['address']) ? $value['address'] : '';
                        $image = isset($value['image']) ? $value['image'] : '';
                        $avatar = isset($value['avatar']) ? $value['avatar'] : '';
                        $style_star = isset($value['style_star']) ? $value['style_star'] : '';
                        $image_size = !empty($settings['img_size']) ? $settings['img_size'] : '330x430';
                        ?>
                        <div class="pxl-swiper-slide">
                            <div class="pxl-item--inner <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">                          
                                <div class="pxl-leftt">  
                                    <div class="pxl-desc">
                                        <?php echo pxl_print_html($desc)?>
                                    </div>                                
                                    <div class="pxl-item--holder ">
                                        <div class="pxl-item--avatar el-empty">
                                            <?php foreach ($value['avatar'] as $key => $value): 
                                                $img = pxl_get_image_by_size( array(
                                                    'attach_id'  => $value['id'],
                                                    'thumb_size' => 'full',
                                                ));
                                                $thumbnail = $img['thumbnail'];
                                                ?>
                                                <div class="pxl-item--avt">
                                                    <?php echo wp_kses_post($thumbnail); ?>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>  
                                        <div class="pxl-content">
                                            <h3 class="pxl-title">
                                                <?php echo pxl_print_html($title)?>
                                            </h3>
                                            <div class="pxl-address">
                                                <?php echo pxl_print_html($address)?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pxl-rightt">
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
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
        
        <?php if($pagination !== false): ?>
            <div class="pxl-swiper-dots style-1"></div>
        <?php endif; ?>

        <?php if($arrows !== false): ?>
            <div class="pxl-swiper-arrow-wrap style-1">
                <div class="pxl-swiper-arrow pxl-swiper-arrow-prev">
                    <i aria-hidden="true" class="fal fa-long-arrow-left"></i>
                </div>
                <div class="pxl-swiper-arrow pxl-swiper-arrow-next">
                    <i aria-hidden="true" class="fal fa-long-arrow-right"></i>
                </div>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>
