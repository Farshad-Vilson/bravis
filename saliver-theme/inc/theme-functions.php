<?php
/**
 * Helper functions for the theme
 *
 * @package Bravis-Themes
 */
  

function saliver_html($html){
    return $html;
}

/**
 * Google Fonts
*/
function saliver_fonts_url() {
    $fonts_url = '';
    $fonts     = array();
    $subsets   = 'latin,latin-ext';
    
    if ( 'off' !== _x( 'on', 'Plus Jakarta Sans font: on or off', 'saliver' ) ) {
        $fonts[] = 'Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800';
    }


    if ( $fonts ) {
        $fonts_url = add_query_arg( array(
            'family' => implode( '&family=', $fonts ),
            'subset' => urlencode( $subsets ),
        ), '//fonts.googleapis.com/css2' );
    }
    return $fonts_url;
}

/*
 * Get page ID by Slug
*/
function saliver_get_id_by_slug($slug, $post_type){
    $content = get_page_by_path($slug, OBJECT, $post_type);
    $id = $content->ID;
    return $id;
}

/**
 * Show content by slug
 **/
function saliver_content_by_slug($slug, $post_type){
    $content = saliver_get_content_by_slug($slug, $post_type);

    $id = saliver_get_id_by_slug($slug, $post_type);
    echo apply_filters('the_content',  $content);
}

/**
 * Get content by slug
 **/
function saliver_get_content_by_slug($slug, $post_type){
    $content = get_posts(
        array(
            'name'      => $slug,
            'post_type' => $post_type
        )
    );
    if(!empty($content))
        return $content[0]->post_content;
    else
        return;
}

 
/**
 * Custom Comment List
 */
function saliver_comment_list( $comment, $args, $depth ) {
	if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }
	?>
    <<?php echo ''.$tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
		<?php endif; ?>
		    <div class="comment-inner">
		        <?php if ($args['avatar_size'] != 0) : ?> 
                    <div class="comment-image pxl-mr-25">
                        <?php echo get_avatar($comment, 90); ?>
                    </div>
                <?php endif; ?>
		        <div class="comment-content">
                    <div class="comment-holder pxl-flex">
    		            <div class="comment-meta pxl-pr-30">
                            <h4 class="comment-title">
                                <?php printf( '%s', get_comment_author_link() ); ?>
                            </h4>
    		            	<span class="comment-date">
    	                        <?php echo get_comment_date(); ?>
    	                    </span>
    		            </div>
                    </div>
		            <div class="comment-text pxl-pr-40"><?php comment_text(); ?></div>
                    <div class="comment-reply">
                        <?php comment_reply_link( array_merge( $args, array(
                            'add_below' => $add_below,
                            'depth'     => $depth,
                            'max_depth' => $args['max_depth']
                        ) ) ); ?>
                    </div>
		        </div>
		    </div>
		<?php if ( 'div' != $args['style'] ) : ?>
        </div>
	<?php endif;
}

/**
 * Paginate Links
 */
function saliver_ajax_paginate_links($link){
    $parts = parse_url($link);
    if( !isset($parts['query']) ) return $link;
    parse_str($parts['query'], $query);
    if(isset($query['page']) && !empty($query['page'])){
        return '#' . $query['page'];
    }
    else{
        return '#1';
    }
}


/**
 * RGB Color
 */
function saliver_hex_rgb($color) {
 
    $default = '0,0,0';
 
    //Return default if no color provided
    if(empty($color))
        return $default; 
 
    //Sanitize $color if "#" is provided 
    if ($color[0] == '#' ) {
        $color = substr( $color, 1 );
    }

    //Check if color has 6 or 3 characters and get values
    if (strlen($color) == 6) {
        $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
    } elseif ( strlen( $color ) == 3 ) {
        $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
    } else {
        return $default;
    }

    //Convert hexadec to rgb
    $rgb =  array_map('hexdec', $hex);

    $output = implode(",",$rgb);

    //Return rgb(a) color string
    return $output;
}


/**
 * Image Size Crop
 */
if(!function_exists('saliver_get_image_by_size')){
    function saliver_get_image_by_size( $params = array() ) {
        $params = array_merge( array(
            'post_id' => null,
            'attach_id' => null,
            'thumb_size' => 'thumbnail',
            'class' => '',
        ), $params );

        if ( ! $params['thumb_size'] ) {
            $params['thumb_size'] = 'thumbnail';
        }

        if ( ! $params['attach_id'] && ! $params['post_id'] ) {
            return false;
        }

        $post_id = $params['post_id'];

        $attach_id = $post_id ? get_post_thumbnail_id( $post_id ) : $params['attach_id'];
        $attach_id = apply_filters( 'pxl_object_id', $attach_id );
        $thumb_size = $params['thumb_size'];
        $thumb_class = ( isset( $params['class'] ) && '' !== $params['class'] ) ? $params['class'] . ' ' : '';

        global $_wp_additional_image_sizes;
        $thumbnail = '';

        $sizes = array(
            'thumbnail',
            'thumb',
            'medium',
            'medium_large',
            'large',
            'full',
        );
        if ( is_string( $thumb_size ) && ( ( ! empty( $_wp_additional_image_sizes[ $thumb_size ] ) && is_array( $_wp_additional_image_sizes[ $thumb_size ] ) ) || in_array( $thumb_size, $sizes, true ) ) ) {
            $attributes = array( 'class' => $thumb_class . 'attachment-' . $thumb_size );
            $thumbnail = wp_get_attachment_image( $attach_id, $thumb_size, false, $attributes );
            $thumbnail_url = wp_get_attachment_image_url($attach_id, $thumb_size, false);
        } elseif ( $attach_id ) {
            if ( is_string( $thumb_size ) ) {
                preg_match_all( '/\d+/', $thumb_size, $thumb_matches );
                if ( isset( $thumb_matches[0] ) ) {
                    $thumb_size = array();
                    $count = count( $thumb_matches[0] );
                    if ( $count > 1 ) {
                        $thumb_size[] = $thumb_matches[0][0]; // width
                        $thumb_size[] = $thumb_matches[0][1]; // height
                    } elseif ( 1 === $count ) {
                        $thumb_size[] = $thumb_matches[0][0]; // width
                        $thumb_size[] = $thumb_matches[0][0]; // height
                    } else {
                        $thumb_size = false;
                    }
                }
            }
            if ( is_array( $thumb_size ) ) {
                // Resize image to custom size
                $p_img = pxl_resize( $attach_id, null, $thumb_size[0], $thumb_size[1], true );
                $alt = trim( wp_strip_all_tags( get_post_meta( $attach_id, '_wp_attachment_image_alt', true ) ) );
                $attachment = get_post( $attach_id );
                if ( ! empty( $attachment ) ) {
                    $title = trim( wp_strip_all_tags( $attachment->post_title ) );

                    if ( empty( $alt ) ) {
                        $alt = trim( wp_strip_all_tags( $attachment->post_excerpt ) ); // If not, Use the Caption
                    }
                    if ( empty( $alt ) ) {
                        $alt = $title;
                    }
                    if ( $p_img ) {

                        $attributes = pxl_stringify_attributes( array(
                            'class' => $thumb_class,
                            'src' => $p_img['url'],
                            'width' => $p_img['width'],
                            'height' => $p_img['height'],
                            'alt' => $alt,
                            'title' => $title,
                        ) );

                        $thumbnail = '<img ' . $attributes . ' />';
                    }
                }
            }
            $thumbnail_url = $p_img['url'];
        }

        $p_img_large = wp_get_attachment_image_src( $attach_id, 'large' );

        return apply_filters( 'pxl_el_getimagesize', array(
            'thumbnail' => $thumbnail,
            'url' => $thumbnail_url,
            'p_img_large' => $p_img_large,
        ), $attach_id, $params );

    }
}



// Render link to elementor option
if(!function_exists('saliver_render_link_attributes')){
    function saliver_render_link_attributes($link) {
        $ouput = null;
        if (isset($link['url']) && !empty($link['url'])) {
            $ouput = 'href="' . esc_url($link['url']) . '"';
            if ($link['is_external']) {
                $ouput .= ' target="_blank"';
            }
            if ($link['nofollow']) {
                $ouput .= ' rel="nofollow"';
            }
            if (!empty($link['custom_attributes'])) {
                $custom_attributes = explode(',', $link["custom_attributes"]);
                foreach ($custom_attributes as $attr) {
                    list($key, $value) = explode('|', $attr);
                    $ouput .= ' ' . esc_attr($key) . '="' . esc_attr($value) . '"';
                }
            }
        }
        return $ouput;
    }
}
/**
 * Search Form
 */
function saliver_header_mobile_search_form() { 
    $search_mobile = saliver()->get_theme_opt( 'search_mobile', false );
    $search_placeholder_mobile = saliver()->get_theme_opt( 'search_placeholder_mobile' );
    if($search_mobile) : ?>
    <div class="pxl-header-mobile-search pxl-hide-xl">
        <?php get_search_form(); ?>
    </div>
<?php endif; }

/**
 * Year Shortcode [pxl_year]
 */
if(function_exists( 'pxl_register_shortcode' )) {
    function saliver_year_shortcode() {
        ob_start(); ?>
            <span><?php date('Y'); ?></span>
        <?php $output = ob_get_clean();
        return $output;
    }
    pxl_register_shortcode('pxl_year', 'saliver_year_shortcode');
}

/* Highlight Shortcode  */
if(function_exists( 'pxl_register_shortcode' )) {
    function saliver_text_highlight_shortcode( $atts = array() ) {
        $atts = shortcode_atts(array(
         'text' => '',
        ), $atts);
        $text = $atts['text'];

        ob_start();
        if(!empty($text)) : ?>
            <span class="pxl-title--highlight">
                <?php echo wp_kses_post($text); ?>
            </span>
        <?php  endif;
        $output = ob_get_clean();

        return $output;
    }
    pxl_register_shortcode('highlight', 'saliver_text_highlight_shortcode');
}

if(function_exists( 'pxl_register_shortcode' )) {
    function saliver_image_highlight_shortcode( $atts = array() ) {
        $atts = shortcode_atts(array(
         'id_image' => '',
        ), $atts);
        $id_image = $atts['id_image'];

        ob_start();
        if(!empty($id_image)) : 
            $img  = pxl_get_image_by_size( array(
                'attach_id'  => $id_image,
                'thumb_size' => 'full',
            ) );
            $thumbnail_url    = $img['thumbnail']; ?>
            <div class="pxl-image--highlight bg-image">
                &nbsp;
                <?php echo pxl_print_html($thumbnail_url); ?>
            </div>
        <?php  endif;
        $output = ob_get_clean();

        return $output;
    }
    pxl_register_shortcode('highlight_image', 'saliver_image_highlight_shortcode');
}

if (function_exists('pxl_register_shortcode')) {
    function saliver_image_carousel_shortcode($atts = array()) {
        $atts = shortcode_atts(array(
            'image_ids' => '', 
        ), $atts);

        $image_ids = explode(',', $atts['image_ids']);
        $image_ids = array_filter(array_map('trim', $image_ids));
        if (count($image_ids) < 1) return;

        ob_start(); ?>
        <div class="pxl-image-highlight-carousel">
            &nbsp;
            <div class="pxl-img-anmation">
                <div class="pxl-content">
                    <?php
                    foreach ($image_ids as $id) {
                        $img = pxl_get_image_by_size(array(
                            'attach_id'  => $id,
                            'thumb_size' => 'full',
                            'class'      => 'no-lazyload',
                        ));
                        echo '<div class="pxl-img-item">';
                        echo wp_kses_post($img['thumbnail']);
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php
        return ob_get_clean();
    }
    pxl_register_shortcode('highlight_image_carousel', 'saliver_image_carousel_shortcode');
}



if(function_exists( 'pxl_register_shortcode' )) {
    function saliver_text_highlight_shortcode_editor( $atts = array() ) {
        $atts = shortcode_atts(array(
         'text' => '',
        ), $atts);
        $text = $atts['text'];

        ob_start();
        if(!empty($text)) : ?>
            <span class="pxl-text--highlight">
                <?php echo esc_attr($text); ?>
            </span>
        <?php  endif;
        $output = ob_get_clean();

        return $output;
    }
    pxl_register_shortcode('pxl_highlight', 'saliver_text_highlight_shortcode_editor');
}

/* Typewriter Shortcode  */
if(function_exists( 'pxl_register_shortcode' )) {
    function saliver_text_typewriter_shortcode( $atts = array() ) {
        $atts = shortcode_atts(array(
         'text' => '',
        ), $atts);
        $text = $atts['text'];

        ob_start();
        if(!empty($text)) : 
            $arr_str = explode(',', $text);
            ?>
            <span class="pxl-title--typewriter">
                <?php foreach ($arr_str as $index => $value) {
                    $item_count = '';
                    if($index == 0) {
                        $item_count = 'is-active';
                    }
                    $arr_str[$index] = '<span class="pxl-item--text '.$item_count.'">' . $value . '</span>';
                }
                $str = implode(' ', $arr_str);
                echo wp_kses_post($str); ?>
            </span>
        <?php  endif;
        $output = ob_get_clean();

        return $output;
    }
    pxl_register_shortcode('typewriter', 'saliver_text_typewriter_shortcode');
}

/* Square Animate */
if(function_exists( 'pxl_register_shortcode' )) {
    function saliver_square_animate_shortcode( $atts = array() ) {
        $atts = shortcode_atts(array(
         'columns' => '',
        ), $atts);
        $columns = $atts['columns'];

        ob_start(); ?>
        <div class="pxl-square-animate">
            <div class="pxl-square-item"><span></span></div>
            <div class="pxl-square-item"><span></span></div>
            <div class="pxl-square-item"><span></span></div>
            <div class="pxl-square-item"><span></span></div>
            <div class="pxl-square-item"><span></span></div>
            <div class="pxl-square-item"><span></span></div>
        </div>
        <?php $output = ob_get_clean();

        return $output;
    }
    pxl_register_shortcode('pxl_square_animate', 'saliver_square_animate_shortcode');
}

/* Button Shortcode  */
if(function_exists( 'pxl_register_shortcode' )) {
    function saliver_btn_shortcode( $atts = array() ) {
        $atts = shortcode_atts(array(
         'text' => '',
         'style' => '',
         'icon_class' => '',
         'text_color' => '',
         'bg_color' => '',
        ), $atts);
        $text = $atts['text'];
        $style = $atts['style'];
        $icon_class = $atts['icon_class'];
        $text_color = $atts['text_color'];
        $bg_color = $atts['bg_color'];

        ob_start();
        if(!empty($text)) : ?>
            <span class="btn <?php echo esc_attr($style); ?>" <?php if(!empty($text_color) || !empty($bg_color)) { ?>style="<?php if(!empty($bg_color)) { echo '--gradient-color-to:'.esc_attr($bg_color); } ?>; color: <?php echo esc_attr($text_color); ?>"<?php } ?> data-text-pr="<?php echo esc_attr($text); ?>">
                <?php if(!empty($icon_class)) : ?>
                    <span class="pxl--btn-icon"><i class="<?php echo esc_attr($icon_class); ?>"></i></span>
                <?php endif; ?>
                <span class="pxl--btn-text" data-text="<?php echo esc_attr($text); ?>">
                    <?php 
                    $chars = preg_split('//u', $text, -1, PREG_SPLIT_NO_EMPTY);
                    foreach ($chars as $value) {
                        if($value == ' ') {
                            echo '<span class="spacer">&nbsp;</span>';
                        } else {
                            echo '<span>'.esc_attr($value).'</span>';
                        }
                    } ?>
                </span>
            </span>
        <?php  endif;
        $output = ob_get_clean();

        return $output;
    }
    pxl_register_shortcode('pxl_button', 'saliver_btn_shortcode');
}

if(function_exists( 'pxl_register_shortcode' )) {
    function saliver_btn_submit_shortcode( $atts = array() ) {
        $atts = shortcode_atts(array(
         'text' => '',
         'style' => 'btn pxl-icon-active btn-icon-box pxl-icon--right wpcf7-submit',
        ), $atts);
        $text = $atts['text'];
        $style = $atts['style'];

        ob_start();
        if(!empty($text)) : ?>
            <button class="<?php echo esc_attr($style); ?>" type="submit">
                <span class="pxl--btn-text"><?php echo esc_html($text); ?></span>
                <span class="pxl--btn-icon"><i class="flaticon flaticon-right-arrows"></i></span>
            </button>
        <?php  endif;
        $output = ob_get_clean();

        return $output;
    }
    pxl_register_shortcode('pxl_button_submit', 'saliver_btn_submit_shortcode');
}

if(function_exists( 'pxl_register_shortcode' )) {
    function saliver_slider_arrow( $atts = array() ) {
        $atts = shortcode_atts(array(
         'type' => 'next',
         'style' => 'style-1',
        ), $atts);
        $type = $atts['type'];
        $style = $atts['style'];

        ob_start(); ?>
         <div class="pxl-slider-rev-arrow">
            <?php if($type == 'next') { ?>
                <i class="caseicon-angle-arrow-right"></i>
            <?php } else { ?>
                <i class="caseicon-angle-arrow-left"></i>
            <?php } ?>
        </div>
        <?php $output = ob_get_clean();

        return $output;
    }
    pxl_register_shortcode('slider_arrow', 'saliver_slider_arrow');
}

if(function_exists( 'pxl_register_shortcode' )) {
    function saliver_text_gradient_shortcode( $atts = array() ) {
        $atts = shortcode_atts(array(
         'text' => '',
         'form' => '',
         'to' => '',
        ), $atts);
        $text = $atts['text'];
        $form = $atts['form'];
        $to = $atts['to'];

        ob_start();
        if(!empty($text)) : ?>
            <span class="text-gradient" style="<?php if(!empty($form)) { echo '--gradient-color-from:'.$form; } if(!empty($to)) { echo '--gradient-color-to:'.$to; } ?>">
                <?php echo esc_attr($text); ?>
            </span>
        <?php  endif;
        $output = ob_get_clean();

        return $output;
    }
    pxl_register_shortcode('text_gradient', 'saliver_text_gradient_shortcode');
}

// Shortcode Row/Column Grid
if(function_exists( 'pxl_register_shortcode' )) {
    function saliver_start_row_shortcode( $atts = array() ) {
        ob_start(); ?>
            <div class="pxl-post-container">
                <div class="row pxl-post-row">
        <?php $output = ob_get_clean();
        return $output;
    }
    pxl_register_shortcode('pxl_start_row', 'saliver_start_row_shortcode');
}

if(function_exists( 'pxl_register_shortcode' )) {
    function saliver_end_row_shortcode( $atts = array() ) {
        ob_start(); ?>
            </div>
        </div>       
        <?php $output = ob_get_clean();
        return $output;
    }
    pxl_register_shortcode('pxl_end_row', 'saliver_end_row_shortcode');
}

if(function_exists( 'pxl_register_shortcode' )) {
    function saliver_start_col_shortcode( $atts = array() ) {
        $atts = shortcode_atts(array(
         'class' => 'col-12',
        ), $atts);
        $class = $atts['class'];
        ob_start(); ?>
        <div class="<?php echo esc_attr($class); ?>">     
        <?php $output = ob_get_clean();
        return $output;
    }
    pxl_register_shortcode('pxl_start_column', 'saliver_start_col_shortcode');
}

if(function_exists( 'pxl_register_shortcode' )) {
    function saliver_end_col_shortcode( $atts = array() ) {
        ob_start(); ?>
        </div>  
        <?php $output = ob_get_clean();
        return $output;
    }
    pxl_register_shortcode('pxl_end_column', 'saliver_end_col_shortcode');
}

// End Shortcode Row/Column Grid

/* Gallery Shortcode  */
if(function_exists( 'pxl_register_shortcode' )) {
    function saliver_gallery_shortcode( $atts = array() ) {
        $atts = shortcode_atts(array(
         'link_video' => '',
         'images_id' => '',
         'col' => '2',
         'img_size' => '600x368',
         'masonry' => '',
        ), $atts);
        $link_video = $atts['link_video'];
        $images_id = $atts['images_id'];
        $col = $atts['col'];
        $img_size = $atts['img_size'];
        $masonry = $atts['masonry'];

        $pxl_g_id = uniqid();

        ob_start();
        ?>
        <div id="pxl-gallery-<?php echo esc_attr($pxl_g_id); ?>" class="pxl-gallery gallery-<?php echo esc_attr($col); ?>-columns <?php if(!empty($masonry)) { echo 'masonry-'.esc_attr($masonry); } ?>">
        <?php
        $pxl_images = explode( ',', $images_id );
        foreach ($pxl_images as $key => $img_id) :
            $img = pxl_get_image_by_size( array(
                'attach_id'  => $img_id,
                'thumb_size' => $img_size,
                'class'      => '',
            ));
            $thumbnail = $img['thumbnail'];

            $img_url = pxl_get_image_by_size( array(
                'attach_id'  => $img_id,
                'thumb_size' => 'full',
                'class'      => '',
            ));

            $thumbnail_url = $img_url['url'];
            ?>
            <div class="pxl--item">
                <div class="pxl--item-inner">
                    <a href="<?php echo esc_url($thumbnail_url); ?>" data-elementor-lightbox-slideshow="pxl-gallery-<?php echo esc_attr($pxl_g_id); ?>"><?php echo saliver_html($thumbnail); ?></a>
                    <?php if($key == 0 && !empty($link_video)) : ?>
                        <a class="pxl-btn-video style2 pxl-action-popup" href="<?php echo esc_url($link_video); ?>"><i class="fa fa-play"></i></a>
                    <?php endif; ?>
                </div>
            </div>
            <?php
        endforeach;
        ?>
        </div>
        <?php
        $output = ob_get_clean();

        return $output;
    }
    pxl_register_shortcode('pxl_gallery', 'saliver_gallery_shortcode');
}

/* Addd shortcode Video button */
if(function_exists( 'pxl_register_shortcode' )) {
    function saliver_video_button_shortcode( $atts = array() ) {
        $atts = shortcode_atts(array(
         'link' => '',
         'text' => '',
         'class' => 'pxl-btn-slide-video-style1',
        ), $atts);
        $link = $atts['link'];
        $text = $atts['text'];
        $class = $atts['class'];

        ob_start();
        ?>
        <a href="<?php echo esc_url($link); ?>" class="pxl-button-video1 btn-video pxl-action-popup <?php echo esc_attr($class); ?>">
            <span class="slider-video-icon">
                <i aria-hidden="true" class="fas fa-play"></i>
            </span>
            <?php if(!empty($text)) : ?>
                <h4 class="slider-video-title"><?php echo esc_html($text); ?></h4>
            <?php endif; ?>
        </a>
        <?php
        $output = ob_get_clean();

        return $output;
    }
    pxl_register_shortcode('pxl_video_button', 'saliver_video_button_shortcode');
}
/////
if(function_exists( 'pxl_register_shortcode' )) {
    function saliver_button_shortcode_1( $atts = array() ) {
        $atts = shortcode_atts(array(
         'link' => '',
         'text' => '',
         'class' => 'pxl-btn-slide-style1',
        ), $atts);
        $link = $atts['link'];
        $text = $atts['text'];
        $class = $atts['class'];

        ob_start();
        ?>
        <a href="<?php echo esc_url($link); ?>" class="btn pxl-icon-active  btn-block-inline <?php echo esc_attr($class); ?>">
            <?php if(!empty($text)) : ?>
                <span class="pxl--btn-text"><?php echo esc_html($text); ?></span>
            <?php endif; ?>
            <div class="pxl--btn-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="21" viewBox="0 0 22 21" fill="#4F7661"><g clip-path="url(#clip0_2064_21)"><path d="M21.1909 10.7617L21.23 10.1367H21.2104C21.2104 10.1367 21.2039 10.1367 21.1909 10.1367C21.1779 10.1367 21.1649 10.1367 21.1519 10.1367C21.1128 10.1237 21.0705 10.1139 21.0249 10.1074C20.9793 10.1009 20.9305 10.0911 20.8784 10.0781C20.7612 10.0521 20.6213 10.0195 20.4585 9.98047C20.2957 9.94141 20.1102 9.88932 19.9019 9.82422C19.5112 9.70703 19.075 9.54753 18.5933 9.3457C18.1115 9.14388 17.6362 8.88672 17.1675 8.57422C16.7378 8.28776 16.3504 7.92318 16.0054 7.48047C15.6603 7.03776 15.3706 6.59505 15.1362 6.15234C15.019 5.93099 14.9149 5.72591 14.8237 5.53711C14.7326 5.34831 14.661 5.18229 14.6089 5.03906C14.5828 4.96094 14.5568 4.89583 14.5308 4.84375C14.5047 4.79167 14.4852 4.74609 14.4722 4.70703C14.4722 4.68099 14.4689 4.66146 14.4624 4.64844C14.4559 4.63542 14.4461 4.6224 14.4331 4.60938V4.58984C14.4331 4.58984 14.4071 4.59961 14.355 4.61914C14.3029 4.63867 14.1336 4.69401 13.8472 4.78516C13.5477 4.88932 13.3719 4.94792 13.3198 4.96094C13.2677 4.97396 13.2417 4.98047 13.2417 4.98047L13.2612 5.01953C13.2612 5.03255 13.2645 5.04883 13.271 5.06836C13.2775 5.08789 13.2873 5.11068 13.3003 5.13672C13.3133 5.17578 13.3328 5.22786 13.3589 5.29297C13.3849 5.35807 13.4175 5.42969 13.4565 5.50781C13.5216 5.66406 13.603 5.84961 13.7007 6.06445C13.7983 6.2793 13.9123 6.50391 14.0425 6.73828C14.3029 7.22005 14.6349 7.72786 15.0386 8.26172C15.4422 8.79557 15.924 9.2513 16.4839 9.62891C16.6271 9.72005 16.7703 9.80794 16.9136 9.89258C17.0568 9.97721 17.2 10.0586 17.3433 10.1367H1.22998V11.3867H17.3433C17.2 11.4648 17.0568 11.5462 16.9136 11.6309C16.7703 11.7155 16.6271 11.8034 16.4839 11.8945C15.924 12.2721 15.4422 12.7279 15.0386 13.2617C14.6349 13.7956 14.3029 14.3034 14.0425 14.7852C13.9123 15.0195 13.7983 15.2409 13.7007 15.4492C13.603 15.6576 13.5216 15.8464 13.4565 16.0156C13.4175 16.0938 13.3849 16.1654 13.3589 16.2305C13.3328 16.2956 13.3133 16.3477 13.3003 16.3867C13.2873 16.4128 13.2775 16.4355 13.271 16.4551C13.2645 16.4746 13.2612 16.4844 13.2612 16.4844L13.2417 16.5234V16.543C13.2417 16.543 13.2677 16.5495 13.3198 16.5625C13.3719 16.5755 13.5477 16.6341 13.8472 16.7383C14.1336 16.8294 14.3029 16.8848 14.355 16.9043C14.4071 16.9238 14.4331 16.9336 14.4331 16.9336V16.9141C14.4461 16.901 14.4559 16.888 14.4624 16.875C14.4689 16.862 14.4722 16.8424 14.4722 16.8164C14.4852 16.7773 14.5047 16.7318 14.5308 16.6797C14.5568 16.6276 14.5828 16.5625 14.6089 16.4844C14.661 16.3411 14.7326 16.1751 14.8237 15.9863C14.9149 15.7975 15.019 15.5924 15.1362 15.3711C15.3706 14.9284 15.6603 14.4857 16.0054 14.043C16.3504 13.6003 16.7378 13.2357 17.1675 12.9492C17.6362 12.6367 18.1115 12.3796 18.5933 12.1777C19.075 11.9759 19.5112 11.8164 19.9019 11.6992C20.1102 11.6341 20.2957 11.582 20.4585 11.543C20.6213 11.5039 20.7612 11.4714 20.8784 11.4453C20.9305 11.4323 20.9793 11.4225 21.0249 11.416C21.0705 11.4095 21.1128 11.3997 21.1519 11.3867C21.1649 11.3867 21.1779 11.3867 21.1909 11.3867C21.2039 11.3867 21.2104 11.3867 21.2104 11.3867H21.23L21.1909 10.7617Z"></path></g><defs><clipPath id="clip0_2064_21"><rect width="21" height="20" fill="white" transform="matrix(1 0 0 -1 0.72998 20.8398)"></rect></clipPath></defs></svg>            
            </div>
        </a>
        <?php
        $output = ob_get_clean();

        return $output;
    }
    pxl_register_shortcode('pxl_button1', 'saliver_button_shortcode_1');
}
/////
if(function_exists( 'pxl_register_shortcode' )) {
    function saliver_button_shortcode_2( $atts = array() ) {
        $atts = shortcode_atts(array(
         'link' => '',
         'text' => '',
         'class' => 'pxl-btn-slide-style2',
        ), $atts);
        $link = $atts['link'];
        $text = $atts['text'];
        $class = $atts['class'];

        ob_start();
        ?>
        <a href="<?php echo esc_url($link); ?>" class="btn pxl-icon-active  btn-block-inline <?php echo esc_attr($class); ?>">
            <?php if(!empty($text)) : ?>
                <span class="pxl--btn-text"><?php echo esc_html($text); ?></span>
            <?php endif; ?>
            <div class="pxl--btn-icon">
                <svg width="81" height="45" viewBox="0 0 81 45" fill="none" stroke="white" xmlns="http://www.w3.org/2000/svg">
                    <path d="M57.265 2.00006L79.5 22.6226L57.265 43.2451L52.5287 38.1501L65.5238 26.0988L2 26.0988L2 19.1463L65.5238 19.1463L52.5288 7.09506L57.265 2.00006Z"  stroke-width="2.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>            
            </div>
        </a>
        <?php
        $output = ob_get_clean();

        return $output;
    }
    pxl_register_shortcode('pxl_button2', 'saliver_button_shortcode_2');
}
/////
if(function_exists( 'pxl_register_shortcode' )) {
    function saliver_button_shortcode_3( $atts = array() ) {
        $atts = shortcode_atts(array(
         'link' => '',
         'text' => '',
         'class' => 'pxl-btn-slide-style3',
        ), $atts);
        $link = $atts['link'];
        $text = $atts['text'];
        $class = $atts['class'];

        ob_start();
        ?>
        <a href="<?php echo esc_url($link); ?>" class="btn pxl-icon-active  btn-block-inline <?php echo esc_attr($class); ?>">
            <?php if(!empty($text)) : ?>
                <span class="pxl--btn-text"><?php echo esc_html($text); ?></span>
            <?php endif; ?> 
        </a>
        <?php
        $output = ob_get_clean();

        return $output;
    }
    pxl_register_shortcode('pxl_button3', 'saliver_button_shortcode_3');
}
/* Get Category Shortcode  */
if(function_exists( 'pxl_register_shortcode' )) {
    function saliver_post_category_shortcode( $atts = array() ) {
        $atts = shortcode_atts(array(
         'items' => '6',
         'columns' => '2',
        ), $atts);
        $items = $atts['items'];
        $columns = $atts['columns'];

        ob_start();
        $categories = get_categories(); ?>
        <div class="pxl-wg-categories columns-<?php echo esc_attr($columns); ?>">
            <?php foreach($categories as $category) {
                $term_bg = get_term_meta( $category->term_id, 'bg_category', true ); ?>
                <div class="pxl-category">
                    <div class="pxl-category--inner">
                        <div class="pxl-category--img bg-image" <?php if(!empty($term_bg["url"])) : ?>style="background-image: url(<?php echo esc_url($term_bg["url"]); ?>);"<?php endif; ?>></div>
                        <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>"></a>
                        <span><?php echo esc_html($category->name); ?></span>
                    </div>
                </div>
            <?php } ?>
        </div>
        <?php $output = ob_get_clean();

        return $output;
    }
    pxl_register_shortcode('pxl_post_category', 'saliver_post_category_shortcode');
}

/* Slider 1  */
if(function_exists( 'pxl_register_shortcode' )) {
    function saliver_slider_price_shortcode( $atts = array() ) {
        $atts = shortcode_atts(array(
         'price' => '',
         'desc' => '',
        ), $atts);
        $price = $atts['price'];
        $desc = $atts['desc'];

        ob_start();
        if(!empty($price) || !empty($desc)) : ?>
            <div class="pxl-slider-price1">
                <div class="pxl-item--inner">
                    <div class="pxl-item--price"><?php echo esc_html($price); ?></div>
                    <div class="pxl-item--desc"><?php echo esc_html($desc); ?></div>
                </div>
            </div>
        <?php  endif;
        $output = ob_get_clean();

        return $output;
    }
    pxl_register_shortcode('pxl_slider_price', 'saliver_slider_price_shortcode');
}


/**
 * Custom Widget Archive - Count
 */
add_filter('get_archives_link', 'saliver_wg_archive_count');
function saliver_wg_archive_count($links) {
    $dir = '';
    $links = str_replace('</a>&nbsp;(', ' <span class="pxl-count '.$dir.'">', $links);
    $links = str_replace(')', '</span></a>', $links);
    return $links;
}

/**
 * Custom Widget Product Categories 
 */
add_filter('wp_list_categories', 'saliver_wc_cat_count_span');
function saliver_wc_cat_count_span($links) {
    $dir = '';
    $links = str_replace('</a> <span class="count">(', ' <span class="pxl-count '.$dir.'">', $links);
    $links = str_replace(')</span>', '</span></a>', $links);
    return $links;
}


/**
 * Get mega menu builder ID
 */
function saliver_get_mega_menu_builder_id(){
    $mn_id = [];
    $menus = get_terms( 'nav_menu', array( 'hide_empty' => false ) );
    if ( is_array( $menus ) && ! empty( $menus ) ) {
        foreach ( $menus as $menu ) {
            if ( is_object( $menu )){
                $menu_obj = get_term( $menu->term_id, 'nav_menu' );
                $menu = wp_get_nav_menu_object( $menu_obj ) ;
                $menu_items = wp_get_nav_menu_items( $menu->term_id, array( 'update_post_term_cache' => false ) );
                foreach ($menu_items as $menu_item) {
                    if( !empty($menu_item->pxl_megaprofile)){
                        $mn_id[] = (int)$menu_item->pxl_megaprofile;
                    }
                }  
            }
        }
    }
    return $mn_id;
}

/**
 * Get page popup builder ID
 */
function saliver_get_page_popup_builder_id(){
    $pp_id = [];
    $page_popup = get_terms( 'nav_menu', array( 'hide_empty' => false ) );
    if ( is_array( $page_popup ) && ! empty( $page_popup ) ) {
        foreach ( $page_popup as $page ) {
            if ( is_object( $page )){
                $page_obj = get_term( $page->term_id, 'nav_menu' );
                $page = wp_get_nav_menu_object( $page_obj ) ;
                $page_items = wp_get_nav_menu_items( $page->term_id, array( 'update_post_term_cache' => false ) );
                foreach ($page_items as $page_item) {
                    if( !empty($page_item->pxl_page_popup)){
                        $pp_id[] = (int)$page_item->pxl_page_popup;
                    }
                }  
            }
        }
    }
    return $pp_id;
}

/* Mouse Move Animation */
function saliver_mouse_move_animation() { 
    $mouse_move_animation = saliver()->get_theme_opt('mouse_move_animation', 'off'); 
    if($mouse_move_animation == 'on') {
        wp_enqueue_script( 'saliver-cursor', get_template_directory_uri() . '/assets/js/libs/cursor.js', array( 'jquery' ), '1.0.0', true ); ?>  
        <div class="pxl-cursor pxl-js-cursor">
            <div class="pxl-cursor-wrapper">
                <div class="pxl-cursor--follower pxl-js-follower"></div>
                <div class="pxl-cursor--label pxl-js-label"></div>
                <div class="pxl-cursor--drap pxl-js-drap"></div>
                <div class="pxl-cursor--icon pxl-js-icon"></div>
            </div>
        </div>
    <?php }
}


/**
 * Start - Cookie Policy
 */
function saliver_cookie_policy() {
    $cookie_policy = saliver()->get_theme_opt('cookie_policy', 'hide');
    $cookie_policy_description = saliver()->get_theme_opt('cookie_policy_description');
    $cookie_policy_btntext = saliver()->get_theme_opt('cookie_policy_btntext');
    $cookie_policy_link = get_permalink(saliver()->get_theme_opt('cookie_policy_link')); 
    wp_enqueue_script('pxl-cookie'); ?>
    <?php if($cookie_policy == 'show' && !empty($cookie_policy_description)) : ?>
        <div class="pxl-cookie-policy">
            <div class="pxl-item--icon pxl-mr-8"><img src="<?php echo esc_url(get_template_directory_uri().'/assets/img/cookie.png'); ?>" alt="<?php echo esc_attr($cookie_policy_btntext); ?>" /></div>
            <div class="pxl-item--description">
                <?php echo esc_attr($cookie_policy_description); ?>
                <a class="pxl-item--link" href="<?php echo esc_url( $cookie_policy_link ); ?>" target="_blank"><?php echo esc_html($cookie_policy_btntext); ?></a>
            </div>
            <div class="pxl-item--close pxl-close"></div>
        </div>
    <?php endif; ?>
<?php }   
/**
 * End - Cookie Policy
 */

/**
 * Start - Subscribe Popup
 */
function saliver_subscribe_popup() {
    $subscribe = saliver()->get_theme_opt('subscribe', 'hide');
    $subscribe_layout = saliver()->get_theme_opt('subscribe_layout');
    $popup_effect = saliver()->get_theme_opt('popup_effect', 'fade');
    $args = [
        'subscribe_layout' => $subscribe_layout
    ];
    wp_enqueue_script('pxl-cookie'); ?>
    <?php if($subscribe == 'show' && isset($args['subscribe_layout']) && $args['subscribe_layout'] > 0) : ?>
        <div class="pxl-popup pxl-subscribe-popup pxl-effect-<?php echo esc_attr($popup_effect); ?>">
            <div class="pxl-popup--content">
                <?php echo Elementor\Plugin::$instance->frontend->get_builder_content_for_display( $args['subscribe_layout']); ?>
            </div>
        </div>
    <?php endif; ?>
<?php }   
/**
 * End - Subscribe Popup
 */
function saliver_set_post_views($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
    
    return $count;
}

function saliver_track_post_views() {
    if ( is_single() ) {
        global $post;
        if ( $post ) {
            saliver_set_post_views( $post->ID );
        }
    }
}

add_action( 'wp_head', 'saliver_track_post_views' );
function saliver_get_post_views( $postID ) {
    $countKey = 'post_views_count';
    $count = get_post_meta( $postID, $countKey, true );
    if ( $count == '' ) {
        return "0";
    }
    return $count;
}

/**
 * Start - User custom fields.
 */
add_action( 'show_user_profile', 'saliver_user_fields' );
add_action( 'edit_user_profile', 'saliver_user_fields' );
function saliver_user_fields($user){

    $user_name = get_user_meta($user->ID, 'user_name', true);
    $user_position = get_user_meta($user->ID, 'user_position', true);

    $user_facebook = get_user_meta($user->ID, 'user_facebook', true);
    $user_twitter = get_user_meta($user->ID, 'user_twitter', true);
    $user_instagram = get_user_meta($user->ID, 'user_instagram', true);
    $user_linkedin = get_user_meta($user->ID, 'user_linkedin', true);
    $user_youtube = get_user_meta($user->ID, 'user_youtube', true);

    ?>
    <h3><?php esc_html_e('Theme Custom', 'saliver'); ?></h3>
    <table class="form-table">
        <tr>
            <th><label for="user_name"><?php esc_html_e('Author Name', 'saliver'); ?></label></th>
            <td>
                <input id="user_name" name="user_name" type="text" value="<?php echo esc_attr(isset($user_name) ? $user_name : ''); ?>" />
            </td>
        </tr>

        <tr>
            <th><label for="user_position"><?php esc_html_e('Author Position', 'saliver'); ?></label></th>
            <td>
                <input id="user_position" name="user_position" type="text" value="<?php echo esc_attr(isset($user_position) ? $user_position : ''); ?>" />
            </td>
        </tr>

        <tr>
            <th><label for="user_facebook"><?php esc_html_e('Facebook', 'saliver'); ?></label></th>
            <td>
                <input id="user_facebook" name="user_facebook" type="text" value="<?php echo esc_attr(isset($user_facebook) ? $user_facebook : ''); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="user_twitter"><?php esc_html_e('Twitter', 'saliver'); ?></label></th>
            <td>
                <input id="user_twitter" name="user_twitter" type="text" value="<?php echo esc_attr(isset($user_twitter) ? $user_twitter : ''); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="user_instagram"><?php esc_html_e('Instagram', 'saliver'); ?></label></th>
            <td>
                <input id="user_instagram" name="user_instagram" type="text" value="<?php echo esc_attr(isset($user_instagram) ? $user_instagram : ''); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="user_linkedin"><?php esc_html_e('Linkedin', 'saliver'); ?></label></th>
            <td>
                <input id="user_linkedin" name="user_linkedin" type="text" value="<?php echo esc_attr(isset($user_linkedin) ? $user_linkedin : ''); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="user_youtube"><?php esc_html_e('Youtube', 'saliver'); ?></label></th>
            <td>
                <input id="user_youtube" name="user_youtube" type="text" value="<?php echo esc_attr(isset($user_youtube) ? $user_youtube : ''); ?>" />
            </td>
        </tr>
    </table>
    <?php
}

add_action( 'personal_options_update', 'saliver_save_user_custom_fields' );
add_action( 'edit_user_profile_update', 'saliver_save_user_custom_fields' );
function saliver_save_user_custom_fields( $user_id )
{
    if ( !current_user_can( 'edit_user', $user_id ) )
        return false;

    if(isset($_POST['user_name']))
        update_user_meta( $user_id, 'user_name', $_POST['user_name'] );

    if(isset($_POST['user_position']))
        update_user_meta( $user_id, 'user_position', $_POST['user_position'] );

    if(isset($_POST['user_facebook']))
        update_user_meta( $user_id, 'user_facebook', $_POST['user_facebook'] );
    if(isset($_POST['user_twitter']))
        update_user_meta( $user_id, 'user_twitter', $_POST['user_twitter'] );
    if(isset($_POST['user_instagram']))
        update_user_meta( $user_id, 'user_instagram', $_POST['user_instagram'] );
    if(isset($_POST['user_linkedin']))
        update_user_meta( $user_id, 'user_linkedin', $_POST['user_linkedin'] );
    if(isset($_POST['user_youtube']))
        update_user_meta( $user_id, 'user_youtube', $_POST['user_youtube'] );
}




function saliver_get_user_name() {

    $user_name = get_user_meta(get_the_author_meta( 'ID' ), 'user_name', true);
    if(!empty($user_name)) { ?>
        <div class="pxl-user--name">
            <?php echo esc_attr($user_name); ?>
        </div>
    <?php } else { ?>
        <div class="pxl-user--name">
            <?php the_author_posts_link(); ?>
        </div>
    <?php }
}

function saliver_get_user_position() {

    $user_position = get_user_meta(get_the_author_meta( 'ID' ), 'user_position', true);
    if(!empty($user_position)) { ?>
        <div class="pxl-user--position">
            <?php echo esc_attr($user_position); ?>
        </div>
    <?php }
}
/**
 * End - User custom fields.
 */

/* Author Social */
function saliver_get_user_social() {

    $user_facebook = get_user_meta(get_the_author_meta( 'ID' ), 'user_facebook', true);
    $user_twitter = get_user_meta(get_the_author_meta( 'ID' ), 'user_twitter', true);
    $user_linkedin = get_user_meta(get_the_author_meta( 'ID' ), 'user_linkedin', true);
    $user_instagram = get_user_meta(get_the_author_meta( 'ID' ), 'user_instagram', true);
    $user_youtube = get_user_meta(get_the_author_meta( 'ID' ), 'user_youtube', true); ?>
    <div class="pxl-post--author-social">
        <?php if(!empty($user_facebook)) { ?>
            <a href="<?php echo esc_url($user_facebook); ?>" class="pxl-mr-18"><i class="caseicon-facebook"></i></a>
        <?php } ?>
        <?php if(!empty($user_twitter)) { ?>
            <a href="<?php echo esc_url($user_twitter); ?>" class="pxl-mr-18"><i class="caseicon-twitter"></i></a>
        <?php } ?>
        <?php if(!empty($user_linkedin)) { ?>
            <a href="<?php echo esc_url($user_linkedin); ?>" class="pxl-mr-18"><i class="caseicon-linkedin"></i></a>
        <?php } ?>
        <?php if(!empty($user_instagram)) { ?>
            <a href="<?php echo esc_url($user_instagram); ?>" class="pxl-mr-18"><i class="caseicon-instagram"></i></a>
        <?php } ?>
        <?php if(!empty($user_youtube)) { ?>
            <a href="<?php echo esc_url($user_youtube); ?>" class="pxl-mr-18"><i class="caseicon-youtube"></i></a>
        <?php } ?>
    </div>
<?php }

// Darken Color
function pxl_darker_color($rgb, $darker=2) {

    $hash = (strpos($rgb, '#') !== false) ? '#' : '';
    $rgb = (strlen($rgb) == 7) ? str_replace('#', '', $rgb) : ((strlen($rgb) == 6) ? $rgb : false);
    if(strlen($rgb) != 6) return $hash.'000000';
    $darker = ($darker > 1) ? $darker : 1;

    list($R16,$G16,$B16) = str_split($rgb,2);

    $R = sprintf("%02X", floor(hexdec($R16)/$darker));
    $G = sprintf("%02X", floor(hexdec($G16)/$darker));
    $B = sprintf("%02X", floor(hexdec($B16)/$darker));

    return $hash.$R.$G.$B;
}


