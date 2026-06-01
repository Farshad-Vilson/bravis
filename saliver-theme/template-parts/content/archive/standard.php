<?php
/**
 * @package Bravis-Themes
 */
$archive_readmore_text = saliver()->get_theme_opt('archive_readmore_text', esc_html__('Read More', 'saliver'));
$featured_img_size = saliver()->get_theme_opt('featured_img_size', '960x460');
$post_video_link = get_post_meta(get_the_ID(), 'post_video_link', true);
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('pxl---post pxl-item--archive pxl-item--standard'); ?>>
    <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)):
        $img_id = get_post_thumbnail_id($post->ID);
        $img          = pxl_get_image_by_size( array(
            'attach_id'  => $img_id,
            'thumb_size' => $featured_img_size
        ) );
        $thumbnail    = $img['thumbnail'];
        ?>
        <div class="pxl-post--featured hover-imge-effect2">
            <a class="hover-imge-effect2" href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo wp_kses_post($thumbnail); ?></a>
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
            <div class="pxl-post--date pxl-mr-10">
                <span class="pxl-date"><?php echo get_the_date( 'F j, Y', $post->ID ); ?></span>
            </div>
        </div>
        <h3 class="pxl-post--title"><a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_html(get_the_title($post->ID)); ?></a></h3>
        <div class="pxl-post--button ">
            <a class="button-post " href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                <?php if(!empty($button_text)) {
                    echo esc_attr($button_text);
                } else {
                    echo esc_html__('Read More', 'saliver');
                } ?>
            </a>
        </div>
    </div>
</article>

