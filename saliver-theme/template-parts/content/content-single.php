<?php
/**
 * Template part for displaying posts in loop
 *
 * @package Bravis-Themes
 */
$post_tag = saliver()->get_theme_opt( 'post_tag', true );
$post_navigation = saliver()->get_theme_opt( 'post_navigation', false );
$post_social_share = saliver()->get_theme_opt( 'post_social_share', false );
$tags_list = get_the_tag_list();
$sg_post_title = saliver()->get_theme_opt('sg_post_title', 'default');
$sg_featured_img_size = saliver()->get_theme_opt('sg_featured_img_size', '960x545');
$post_video_link = get_post_meta(get_the_ID(), 'post_video_link', true);
$post_author_info = saliver()->get_theme_opt( 'post_author_info', false );
?>
<article id="pxl-post-<?php the_ID(); ?>" <?php post_class('pxl---post'); ?>>
    <?php saliver()->blog->get_post_metas(); ?>
    <?php if (has_post_thumbnail()) {
        $img  = pxl_get_image_by_size( array(
            'attach_id'  => get_post_thumbnail_id($post->ID),
            'thumb_size' => $sg_featured_img_size,
        ) );
        $thumbnail    = $img['thumbnail']; ?>
        <div class="pxl-item--image">
            <?php echo wp_kses_post($thumbnail); ?>
            <?php if(!empty($post_video_link)) : ?>
                <a href="<?php echo esc_url($post_video_link); ?>" class="post-button-video pxl-action-popup"><i class="caseicon-play1"></i></a>
            <?php endif; ?>        
        </div>
    <?php } ?>
    <div class="pxl-item--content clearfix">
        <?php
            the_content();
            wp_link_pages( array(
                'before'      => '<div class="page-links">',
                'after'       => '</div>',
                'link_before' => '<span>',
                'link_after'  => '</span>',
            ) );
        ?>
    </div>

    <?php if($post_tag && $tags_list || $post_social_share ) :  ?>
        <div class="pxl--post-footer">
            <?php if($post_tag) { saliver()->blog->get_tagged_in(); } ?>
            <?php if($post_social_share) { saliver()->blog->get_socials_share(); } ?>
        </div>
    <?php endif; ?>
    <?php if($post_author_info) { saliver()->blog->get_post_author_info(); } ?>
    <?php if($post_navigation) { saliver()->blog->get_post_nav(); } ?>
</article><!-- #post -->