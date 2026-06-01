<?php
$html_id = pxl_get_element_id($settings);
$select_post_by = $widget->get_setting('select_post_by', '');
$source = $post_ids = [];
if($select_post_by === 'post_selected'){
    $post_ids = $widget->get_setting('source_'.$settings['post_type'].'_post_ids', '');
}else{
    $source  = $widget->get_setting('source_'.$settings['post_type'], '');
}
$orderby = $widget->get_setting('orderby', 'date');
$order = $widget->get_setting('order', 'desc');
$limit = $widget->get_setting('limit', 6);
$settings['layout']    = $settings['layout_'.$settings['post_type']];
extract(pxl_get_posts_of_grid('service', [
    'source' => $source,
    'orderby' => $orderby,
    'order' => $order,
    'limit' => $limit,
    'post_ids' => $post_ids,
]));

$pxl_animate = $widget->get_setting('pxl_animate', '');
$col_xs = $widget->get_setting('col_xs', '');
$col_sm = $widget->get_setting('col_sm', '');
$col_md = (int)$widget->get_setting('col_md', '');
if($col_md == 'custom') {
    $col_md = $widget->get_setting('col_md_custom', '');
}
$col_lg = (int)$widget->get_setting('col_lg', '');
if($col_lg == 'custom') {
    $col_lg = $widget->get_setting('col_lg_custom', '');
}
$col_xl = (int)$widget->get_setting('col_xl', '');
if($col_xl == 'custom') {
    $col_xl = $widget->get_setting('col_xl_custom', '');
}
$col_xxl = (int)$widget->get_setting('col_xxl', '');
if($col_xxl == 'custom') {
    $col_xxl = $widget->get_setting('col_xxl_custom', '');
}
$slides_to_scroll = $widget->get_setting('slides_to_scroll', '');

$show_excerpt = $widget->get_setting('show_excerpt');
$arrows = $widget->get_setting('arrows', false);
$pagination = $widget->get_setting('pagination', false);
$pagination_type = $widget->get_setting('pagination_type','bullets');
$pause_on_hover = $widget->get_setting('pause_on_hover', false);
$autoplay = $widget->get_setting('autoplay', false);
$autoplay_speed = $widget->get_setting('autoplay_speed', 5000);
$infinite = $widget->get_setting('infinite', false);
$speed = $widget->get_setting('speed', 500);
$drap = $widget->get_setting('drap', false);
$img_size = $widget->get_setting('img_size');
$show_button = $widget->get_setting('show_button');
$show_button = $widget->get_setting('show_button');
$bg_color = $widget->get_setting('bg_color');
$svg_url = !empty($service_icon_svg_upload['url']) ? $service_icon_svg_upload['url'] : '';
$num_words = $widget->get_setting('num_words');
$opts = [
    'slide_direction'               => 'horizontal',
    'slide_percolumn'               => 1, 
    'slide_percolumnfill'           => 1, 
    'slide_mode'                    => 'slide', 
    'slides_to_show'                => $col_xl, 
    'slides_to_show_xxl'            => $col_xxl, 
    'slides_to_show_lg'             => $col_lg, 
    'slides_to_show_md'             => $col_md, 
    'slides_to_show_sm'             => (int)$col_sm, 
    'slides_to_show_xs'             => (int)$col_xs, 
    'slides_to_scroll'              => (int)$slides_to_scroll,  
    'slides_gutter'                 => 30, 
    'arrow'                         => (bool)$arrows,
    'pagination'                    => (bool)$pagination,
    'pagination_type'               => $pagination_type,
    'autoplay'                      => (bool)$autoplay,
    'pause_on_hover'                => (bool)$pause_on_hover,
    'pause_on_interaction'          => true,
    'delay'                         => (int)$autoplay_speed,
    'loop'                          => (bool)$infinite,
    'speed'                         => (int)$speed,
];

$widget->add_render_attribute( 'carousel', [
    'class'         => 'pxl-swiper-container',
    'dir'           => is_rtl() ? 'rtl' : 'ltr',
    'data-settings' => wp_json_encode($opts)
]); ?>

<?php if (is_array($posts)): ?>
    <div class="pxl-swiper-slider pxl-service-carousel pxl-service-carousel2 pxl-service-style2" <?php if($drap !== false): ?>data-cursor-drap="<?php echo esc_attr__('DRAG', 'saliver'); ?>"<?php endif; ?>>
        <div class="pxl-carousel-inner">
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php
                        $image_size = !empty($img_size) ? $img_size : '578x771';
                        $i = 0;
                        foreach ($posts as $post):
                            $service_external_link = get_post_meta($post->ID, 'service_external_link', true);
                            $service_icon_type = get_post_meta($post->ID, 'service_icon_type', true);
                            $service_icon_font = get_post_meta($post->ID, 'service_icon_font', true);
                            $service_icon_svg_upload = get_post_meta($post->ID, 'service_icon_svg_upload', true);
                            $service_icon_img = get_post_meta($post->ID, 'service_icon_img', true); 
                            $svg_url = !empty($service_icon_svg_upload['url']) ? $service_icon_svg_upload['url'] : '';
                            $bg_color = get_post_meta($post->ID, 'bg_color', true);
                            $service_excerpt = get_post_meta($post->ID,'service_excerpt');
                        ?>
                        <div class="pxl-swiper-slide">
                            <div class="pxl-post--inner wow <?php echo esc_attr($pxl_animate); ?>"  data-wow-duration="1.2s">
                                <div class="pxl-item--number">
                                    <span>
                                        <?php printf('%02d', $i + 1); ?>
                                    </span>
                                </div>
                                <div class="pxl-item-icon">
                                    <?php if (!empty($service_icon_font) || !empty($svg_url)) : ?>
                                        <div class="pxl-post--icon pxl-fl-middle">
                                            <?php if (!empty($service_icon_font)) : ?>
                                                <i class="<?php echo esc_attr($service_icon_font); ?>"></i>
                                            <?php elseif (!empty($svg_url)) : ?>
                                                <img src="<?php echo esc_url($svg_url); ?>" alt="icon svg" loading="lazy" />
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if($service_icon_type == 'image' && !empty($service_icon_img)) : 
                                        $icon_img = pxl_get_image_by_size( array(
                                            'attach_id'  => $service_icon_img['id'],
                                            'thumb_size' => 'full',
                                        ));
                                        $icon_thumbnail = $icon_img['thumbnail'];
                                        ?>
                                        <div class="pxl-post--icon pxl-fl-middle">
                                            <?php echo wp_kses_post($icon_thumbnail); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="pxl-post--holder">
                                    <h5 class="pxl-post--title"><a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_html(get_the_title($post->ID)); ?></a></h5>
                                    <?php if($show_excerpt == 'true'): ?>
                                        <div class="pxl-item--content">
                                            <?php echo wp_trim_words( $post->service_excerpt, $num_words, $more = null ); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <a class="pxl-item--btn" href="<?php echo esc_url(get_permalink( $post->ID )); ?>"> 
                                    <?php if($show_button == 'true') : ?>                                   
                                        <?php if(!empty($button_text)) {
                                            echo esc_attr($button_text);
                                        } else {
                                            echo esc_html__('Read More', 'saliver');
                                        } ?>                                       
                                    <?php endif; ?>
                                    <span class="pxl-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="8" viewBox="0 0 15 8" fill="black">
                                            <path d="M10.2242 0.116959C10.3492 -0.0389864 10.5994 -0.0389864 10.7557 0.116959L14.3827 3.73489C14.5391 3.89084 14.5391 4.10916 14.3827 4.26511L10.7557 7.88304C10.5994 8.03899 10.3492 8.03899 10.2242 7.88304L9.97404 7.66472C9.84897 7.50877 9.84897 7.29045 9.97404 7.1345L12.6005 4.51462H0.875209C0.656337 4.51462 0.5 4.35867 0.5 4.14035V3.82846C0.5 3.64133 0.656337 3.45419 0.875209 3.45419H12.6005L9.97404 0.865497C9.84897 0.709552 9.84897 0.491228 9.97404 0.335283L10.2242 0.116959Z" />
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </div>    
                    <?php $i++; endforeach; ?>
                </div> 
            </div>
            
            <?php if($pagination !== false): ?>
                <div class="pxl-swiper-dots-wrap">
                    <div class="pxl-swiper-dots style-1"></div>
                </div>
            <?php endif; ?>

            <?php if($arrows !== false): ?>
                <div class="pxl-swiper-arrow-wrap style-1">
                    <div class="pxl-swiper-arrow pxl-swiper-arrow-prev"><i class="caseicon-angle-arrow-left rtl-icon"></i></div>
                    <div class="pxl-swiper-arrow pxl-swiper-arrow-next"><i class="caseicon-angle-arrow-right rtl-icon"></i></div>
                </div>
            <?php endif; ?>

        </div>
    </div>
<?php endif; ?>