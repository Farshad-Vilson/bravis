<?php 
 
if(!function_exists('saliver_get_post_grid')){
    function saliver_get_post_grid($posts = [], $settings = []){ 
        if (empty($posts) || !is_array($posts) || empty($settings) || !is_array($settings)) {
            return false;
        }
        switch ($settings['layout']) {
            case 'post-1':
                saliver_get_post_grid_layout1($posts, $settings);
                break;
            
            case 'post-2':
                saliver_get_post_grid_layout2($posts, $settings);
                break;

            case 'portfolio-1':
                saliver_get_portfolio_grid_layout1($posts, $settings);
                break;

            case 'portfolio-2':
                saliver_get_portfolio_grid_layout2($posts, $settings);
                break;

            case 'service-1':
                saliver_get_service_grid_layout1($posts, $settings);
                break;
            
            case 'service-2':
                saliver_get_service_grid_layout2($posts, $settings);
                break;
                
            // case 'product-1':
            //     saliver_get_product_grid_layout1($posts, $settings);
            //     break;

            // case 'product-2':
            //     saliver_get_product_grid_layout2($posts, $settings);
            //     break;

            default:
                return false;
                break;
        }
    }
}

// Start Post Grid
//--------------------------------------------------
function saliver_get_post_grid_layout1($posts = [], $settings = []){ 
    extract($settings);
    
    $image_size = !empty($img_size) ? $img_size : '400x300';
    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                if($grid_masonry[$key]['col_xl_m'] == 'col-66') {
                    $col_xl_m = '66-pxl';
                } else {
                    $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                }
                if($grid_masonry[$key]['col_lg_m'] == 'col-66') {
                    $col_lg_m = '66-pxl';
                } else {
                    $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                }
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";
                
                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = ''; 
            $current_user = wp_get_current_user();
            $index = sprintf('%02d', $key + 1);
            $post_video_link = get_post_meta($post->ID, 'post_video_link', true); 
            
            ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-item--inner wow <?php echo esc_attr($pxl_animate); ?>">
                        <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)):
                            $img_id = get_post_thumbnail_id($post->ID);
                            $img          = pxl_get_image_by_size( array(
                                'attach_id'  => $img_id,
                                'thumb_size' => $image_size
                            ) );
                            $thumbnail    = $img['thumbnail'];
                            ?>
                            <div class="pxl-post--featured hover-imge-effect2">
                                <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo wp_kses_post($thumbnail); ?></a>
                                <?php if(!empty($post_video_link)) : ?>
                                    <a href="<?php echo esc_url($post_video_link); ?>" class="post-button-video pxl-action-popup"><i class="caseicon-play1"></i></a>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        
                        <div class="pxl-post--tags">
                            <?php 
                            $tags = get_the_tags( $post->ID ); 
                            if ( $tags ) {
                                foreach ( $tags as $tag ) {
                                    echo '<a href="' . esc_url( get_tag_link( $tag->term_id ) ) . '" class="pxl-tag-link">' . esc_html( $tag->name ) . '</a> ';
                                }
                            } else {
                                echo esc_html__( 'No tags', 'saliver' );
                            }
                            ?>
                        </div>
                    </div>
                </div>
            <?php
        endforeach;
    endif;
}
function saliver_get_post_grid_layout2($posts = [], $settings = []){ 
    extract($settings);
    
    $image_size = !empty($img_size) ? $img_size : '800x500';
    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                if($grid_masonry[$key]['col_xl_m'] == 'col-66') {
                    $col_xl_m = '66-pxl';
                } else {
                    $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                }
                if($grid_masonry[$key]['col_lg_m'] == 'col-66') {
                    $col_lg_m = '66-pxl';
                } else {
                    $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                }
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";
                
                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = ''; 
            $current_user = wp_get_current_user();
            $index = sprintf('%02d', $key + 1);
            $post_video_link = get_post_meta($post->ID, 'post_video_link', true); 
            
            ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-item--inner wow <?php echo esc_attr($pxl_animate); ?>">
                        <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)):
                            $img_id = get_post_thumbnail_id($post->ID);
                            $img          = pxl_get_image_by_size( array(
                                'attach_id'  => $img_id,
                                'thumb_size' => $image_size
                            ) );
                            $thumbnail    = $img['thumbnail'];
                            ?>
                            <div class="pxl-post--featured hover-imge-effect2">
                                <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo wp_kses_post($thumbnail); ?></a>
                                <?php if(!empty($post_video_link)) : ?>
                                    <a href="<?php echo esc_url($post_video_link); ?>" class="post-button-video pxl-action-popup"><i class="caseicon-play1"></i></a>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        <div class="pxl-holder">
                            <div class="pxl-top">
                                <div class="pxl-post--tags">
                                    <?php 
                                    $tags = get_the_tags( $post->ID ); 
                                    if ( $tags ) {
                                        foreach ( $tags as $tag ) {
                                            echo '<a href="' . esc_url( get_tag_link( $tag->term_id ) ) . '" class="pxl-tag-link">' . esc_html( $tag->name ) . '</a> ';
                                        }
                                    } else {
                                        echo esc_html__( 'No tags', 'saliver' );
                                    }
                                    ?>
                                </div>
                                <?php if ( $show_date === 'true' ): ?>
                                    <div class="pxl-post--date pxl-mr-10">
                                        <span class="pxl-date"><?php echo get_the_date( 'F j, Y', $post->ID ); ?></span>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <h3 class="pxl-post--title"><a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_html(get_the_title($post->ID)); ?></a></h3>
                        </div>
                    </div>
                </div>
            <?php
        endforeach;
    endif;
}
// End Post Grid
//--------------------------------------------------

// Start Portfolio Grid
//--------------------------------------------------
function saliver_get_portfolio_grid_layout1($posts = [], $settings = []){ 
    extract($settings);
    
    $images_size = !empty($img_size) ? $img_size : '1200x900';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                if($grid_masonry[$key]['col_xl_m'] == 'col-66') {
                    $col_xl_m = '66-pxl';
                } else {
                    $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                }
                if($grid_masonry[$key]['col_lg_m'] == 'col-66') {
                    $col_lg_m = '66-pxl';
                } else {
                    $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                }
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";
                
                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = '';

            $img_id = get_post_thumbnail_id($post->ID); 
            if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): ?>
                <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                    <div class="pxl-post--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                        <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)):
                            $img_id = get_post_thumbnail_id($post->ID);
                            $img          = pxl_get_image_by_size( array(
                                'attach_id'  => $img_id,
                                'thumb_size' => $images_size,
                                'class'   =>  '',
                            ) );
                            $thumbnail    = $img['thumbnail'];
                            
                            ?>
                            <div class="pxl-post--featured hover-imge-effect2">
                                <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="pxl-featured-link">
                                    <?php echo wp_kses_post($thumbnail); ?>
                                </a>
                                <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="pxl-button">
                                    <svg width="11" height="11" viewBox="0 0 11 11" fill="black" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4.95873 1.10621C4.9369 0.9075 5.11378 0.730625 5.33459 0.730348L10.4576 0.72392C10.6784 0.723643 10.8327 0.878021 10.8325 1.09884L10.826 6.2218C10.8258 6.44261 10.6489 6.61949 10.4502 6.59766L10.1189 6.62015C9.92022 6.59832 9.76584 6.44394 9.74401 6.24524L9.74867 2.53551L1.45763 10.8265C1.30287 10.9813 1.08205 10.9816 0.92767 10.8272L0.70713 10.6067C0.574806 10.4743 0.553029 10.2315 0.707795 10.0767L8.99883 1.78567L5.31115 1.81238C5.11245 1.79055 4.95807 1.63617 4.93624 1.43746L4.95873 1.10621Z" />
                                    </svg>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach;
    endif;
}
function saliver_get_portfolio_grid_layout2($posts = [], $settings = []){ 
    extract($settings);
    
    $images_size = !empty($img_size) ? $img_size : '1200x900';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                if($grid_masonry[$key]['col_xl_m'] == 'col-66') {
                    $col_xl_m = '66-pxl';
                } else {
                    $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                }
                if($grid_masonry[$key]['col_lg_m'] == 'col-66') {
                    $col_lg_m = '66-pxl';
                } else {
                    $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                }
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";
                
                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = '';

            $img_id = get_post_thumbnail_id($post->ID); 
            if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): ?>
                <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                    <div class="pxl-post--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                        <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)):
                            $img_id = get_post_thumbnail_id($post->ID);
                            $img          = pxl_get_image_by_size( array(
                                'attach_id'  => $img_id,
                                'thumb_size' => $images_size,
                                'class'   =>  '',
                            ) );
                            $thumbnail    = $img['thumbnail'];
                            
                            ?>
                            <div class="pxl-post--featured hover-imge-effect2">
                                <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="pxl-featured-link">
                                    <?php echo wp_kses_post($thumbnail); ?>
                                </a>
                                <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="pxl-button">
                                    <svg width="11" height="11" viewBox="0 0 11 11" fill="black" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4.95873 1.10621C4.9369 0.9075 5.11378 0.730625 5.33459 0.730348L10.4576 0.72392C10.6784 0.723643 10.8327 0.878021 10.8325 1.09884L10.826 6.2218C10.8258 6.44261 10.6489 6.61949 10.4502 6.59766L10.1189 6.62015C9.92022 6.59832 9.76584 6.44394 9.74401 6.24524L9.74867 2.53551L1.45763 10.8265C1.30287 10.9813 1.08205 10.9816 0.92767 10.8272L0.70713 10.6067C0.574806 10.4743 0.553029 10.2315 0.707795 10.0767L8.99883 1.78567L5.31115 1.81238C5.11245 1.79055 4.95807 1.63617 4.93624 1.43746L4.95873 1.10621Z" />
                                    </svg>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach;
    endif;
}
// End Portfolio Grid
//--------------------------------------------------

// Start Service Grid
//--------------------------------------------------
function saliver_get_service_grid_layout1($posts = [], $settings = []){ 
    extract($settings);

    $images_size = !empty($img_size) ? $img_size : '432x432';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                if($grid_masonry[$key]['col_xl_m'] == 'col-66') {
                    $col_xl_m = '66-pxl';
                } else {
                    $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                }
                if($grid_masonry[$key]['col_lg_m'] == 'col-66') {
                    $col_lg_m = '66-pxl';
                } else {
                    $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                }
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";
                
                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = '';

            $service_external_link = get_post_meta($post->ID, 'service_external_link', true);
            $service_icon_type = get_post_meta($post->ID, 'service_icon_type', true);
            $service_icon_font = get_post_meta($post->ID, 'service_icon_font', true);
            $service_icon_svg_upload = get_post_meta($post->ID, 'service_icon_svg_upload', true);
            $service_icon_img = get_post_meta($post->ID, 'service_icon_img', true); 
            $service_excerpt = get_post_meta($post->ID, 'service_excerpt', true);
            $svg_url = !empty($service_icon_svg_upload['url']) ? $service_icon_svg_upload['url'] : '';
            $index = $key + 1;
            ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-post--inner <?php echo esc_attr($pxl_animate); ?>"  data-wow-duration="1.2s">
                    <div class="pxl-post--holder">
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
                            <div class="pxl-number">
                                <?php echo str_pad($index, 2, '0', STR_PAD_LEFT); ?>
                            </div>
                        </div>
                        <h3 class="pxl-post--title">
                            <a href="<?php if(!empty($service_external_link)) { echo esc_url($service_external_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>"><?php echo esc_html(get_the_title($post->ID)); ?></a>
                        </h3>
                        <?php if($show_excerpt == 'true' && !empty($service_excerpt)): ?>
                            <div class="pxl-item--content">
                                <?php echo wp_trim_words( $service_excerpt, $num_words, $more = null ); ?>
                            </div>
                        <?php endif; ?>
                        <?php if($show_button == 'true') : ?>
                            <div class="pxl-post--readmore">
                                <?php if(!empty($button_text)) {
                                    echo esc_attr($button_text);
                                } else {
                                    echo esc_html__('Read More', 'saliver');
                                } ?>
                                <div class="pxl-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="8" viewBox="0 0 15 8" fill="black">
                                        <path d="M10.2242 0.116959C10.3492 -0.0389864 10.5994 -0.0389864 10.7557 0.116959L14.3827 3.73489C14.5391 3.89084 14.5391 4.10916 14.3827 4.26511L10.7557 7.88304C10.5994 8.03899 10.3492 8.03899 10.2242 7.88304L9.97404 7.66472C9.84897 7.50877 9.84897 7.29045 9.97404 7.1345L12.6005 4.51462H0.875209C0.656337 4.51462 0.5 4.35867 0.5 4.14035V3.82846C0.5 3.64133 0.656337 3.45419 0.875209 3.45419H12.6005L9.97404 0.865497C9.84897 0.709552 9.84897 0.491228 9.97404 0.335283L10.2242 0.116959Z" />
                                    </svg>
                                </div>
                                <a class="pxl-post--link" href="<?php if(!empty($service_external_link)) { echo esc_url($service_external_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>"></a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach;
    endif;
}
function saliver_get_service_grid_layout2($posts = [], $settings = []){ 
    extract($settings);

    $images_size = !empty($img_size) ? $img_size : 'full';

    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                if($grid_masonry[$key]['col_xl_m'] == 'col-66') {
                    $col_xl_m = '66-pxl';
                } else {
                    $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                }
                if($grid_masonry[$key]['col_lg_m'] == 'col-66') {
                    $col_lg_m = '66-pxl';
                } else {
                    $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                }
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";
                
                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = '';

            $service_external_link = get_post_meta($post->ID, 'service_external_link', true);
            $service_icon_type = get_post_meta($post->ID, 'service_icon_type', true);
            $service_icon_font = get_post_meta($post->ID, 'service_icon_font', true);
            $service_icon_svg_upload = get_post_meta($post->ID, 'service_icon_svg_upload', true);
            $service_icon_img = get_post_meta($post->ID, 'service_icon_img', true); 
            $service_excerpt = get_post_meta($post->ID, 'service_excerpt', true);
            $item_number =  sprintf('%02d', $key + 1);
            ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-post--inner <?php echo esc_attr($pxl_animate); ?>"  data-wow-duration="1.2s">
                    <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)):
                        $img_id = get_post_thumbnail_id($post->ID);
                        $img          = pxl_get_image_by_size( array(
                            'attach_id'  => $img_id,
                            'thumb_size' => $images_size
                        ) );
                        $thumbnail    = $img['thumbnail'];
                        $thumbnail_url    = $img['url'];
                        ?>
                    <?php endif; ?>
                    <div class="pxl-post--holder">
                        <h1 class="pxl-item--number">
                            <?php echo esc_html($item_number); ?>
                        </h1>
                        <div class="pxl-post--featured ">
                            <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="pxl-featured-link">
                                <?php echo wp_kses_post($thumbnail); ?>
                            </a>
                        </div>
                        <h3 class="pxl-post--title">
                            <a href="<?php if(!empty($service_external_link)) { echo esc_url($service_external_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>"><?php echo esc_html(get_the_title($post->ID)); ?></a>
                        </h3>
                        <?php if($show_excerpt == 'true' && !empty($service_excerpt)): ?>
                            <div class="pxl-item--content">
                                <?php echo wp_trim_words( $service_excerpt, $num_words, $more = null ); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach;
    endif;
}

// End Service Grid
//-------------------------------------------------

// Start Product Grid
//--------------------------------------------------

// End Product Grid
//--------------------------------------------------

add_action( 'wp_ajax_saliver_load_more_post_grid', 'saliver_load_more_post_grid' );
add_action( 'wp_ajax_nopriv_saliver_load_more_post_grid', 'saliver_load_more_post_grid' );
function saliver_load_more_post_grid(){
    if ( ! check_ajax_referer( '_ajax_nonce', 'wpnonce' ) || empty( sanitize_text_field( wp_unslash($_POST['wpnonce'] ))) ) {
        wp_send_json(
            array(
                'status' => false,
                'message' => esc_attr__('Nonce error, please reload.', 'saliver'),
                'data' => array(),
            )
        );
    }
    
    try{
        if(!isset($_POST['settings'])){
            throw new Exception(__('Something went wrong while requesting. Please try again!', 'saliver'));
        }
    
        $settings = isset($_POST['settings']) ? $_POST['settings'] : null;
       
        $source = isset($settings['source']) ? $settings['source'] : '';
        $term_slug = isset($settings['term_slug']) ? $settings['term_slug'] : '';
        if( !empty($term_slug) && $term_slug !='*'){
            $term_slug = str_replace('.', '', $term_slug);
            $source = [$term_slug.'|'.$settings['tax'][0]]; 
        }
        if( isset($_POST['handler_click']) && sanitize_text_field(wp_unslash( $_POST[ 'handler_click' ] )) == 'filter'){
            set_query_var('paged', 1);
            $settings['paged'] = 1;
        }else{
            set_query_var('paged', $settings['paged']);
        }
        extract(pxl_get_posts_of_grid($settings['post_type'], [
                'source' => $source,
                'orderby' => isset($settings['orderby'])?$settings['orderby']:'date',
                'order' => isset($settings['order'])?$settings['order']:'desc',
                'limit' => isset($settings['limit'])?$settings['limit']:'6',
                'post_ids' => isset($settings['post_ids'])?$settings['post_ids']: [],
                'post_not_in' => isset($settings['post_not_in'])?$settings['post_not_in']: [],
            ],
            $settings['tax']
        ));

        ob_start();
            saliver_get_post_grid($posts, $settings);
        $html = ob_get_clean();

        $pagin_html = '';
        if( isset($settings['pagination_type']) && $settings['pagination_type'] == 'pagination' ){ 
            ob_start();
                saliver()->page->get_pagination( $query,  true );
            $pagin_html = ob_get_clean();
        }
        wp_send_json(
            array(
                'status' => true,
                'message' => esc_attr__('Load Successfully!', 'saliver'),
                'data' => array(
                    'html' => $html,
                    'pagin_html' => $pagin_html,
                    'paged' => $settings['paged'],
                    'posts' => $posts,
                    'max' => $max,
                ),
            )
        );
    }
    catch (Exception $e){
        wp_send_json(array('status' => false, 'message' => $e->getMessage()));
    }
    die;
}
  /* User Login/Register */
  function saliver_user_form() {
    if(function_exists('up_get_template_part') && !is_user_logged_in()) : ?>
        <div class="pxl-ovlay">
            <div class="pxl-modal pxl-user-popup remove">
                <div class="pxl-ovlay"></div>
                <div class="pxl-modal-close"><i class="pxl-icon-close"></i></div>
                <div class="pxl-modal-content">
                    
                    <!-- Register Form -->
                    <div class="pxl-user pxl-user-register u-close">
                        <div class="pxl-user-content">
                            <h3 class="pxl-user-heading"><?php echo esc_html__('Create your account', 'saliver'); ?></h3>
                            <?php echo do_shortcode('[bravis-user-form form_type="register"]'); ?>
                            <div class="pxl-user-footer">
                                <a href="javascript:void(0)" class="btn-sign-in"><?php esc_html_e('Already have an account? Sign In', 'saliver');?></a>
                            </div>
                        </div>
                    </div>

                    <!-- Login Form -->
                    <div class="pxl-user pxl-user-login u-open">
                        <div class="pxl-user-content">
                            <h3 class="pxl-user-heading"><?php echo esc_html__('Log in to Your Account', 'saliver'); ?></h3>
                            <?php echo do_shortcode('[bravis-user-form form_type="login" is_logged="profile"]'); ?>  

                            <?php if(class_exists('Woocommerce')) :
                                $my_ac = get_option('woocommerce_myaccount_page_id'); 
                                $lost_password = get_option('woocommerce_myaccount_lost_password_endpoint');
                                ?>
                                <div class="pxl-user-forgot-pass">
                                    <a href="<?php echo esc_url(get_permalink($my_ac)); ?><?php echo esc_html($lost_password); ?>">
                                        <?php esc_html_e('Forgot your password?', 'saliver'); ?>
                                    </a>
                                </div>
                            <?php endif; ?>

                            <div class="pxl-user-footer">
                                <a href="javascript:void(0)" class="btn-sign-up"><?php esc_html_e('Create an account', 'saliver'); ?></a>
                            </div>
                        </div>
                    </div> 

                </div>
            </div>
        </div>
    <?php endif;
}
