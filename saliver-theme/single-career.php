<?php
/**
 * @package Bravis-Themes
 */
$career_img_size = saliver()->get_theme_opt('career_img_size', 'full');
get_header();
?>
<div class="pxl-career-single">
    <?php if (has_post_thumbnail()) {
        $img  = pxl_get_image_by_size( array(
            'attach_id'  => get_post_thumbnail_id($post->ID),
            'thumb_size' => $career_img_size,
        ) );
        $thumbnail    = $img['thumbnail'];
        echo '<div class="pxl-item--image">'; ?>
            <?php echo pxl_print_html($thumbnail); ?>
        <?php echo '</div>';
    } ?>
    <div class="container">
        <div class="row">
            <div id="pxl-content-area" class="col-12">
                <main id="pxl-content-main">
                    <?php while ( have_posts() ) {
                        the_post(); ?>
                        <article id="pxl-post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <?php the_content();
                            wp_link_pages( array(
                                'before'      => '<div class="page-links">',
                                'after'       => '</div>',
                                'link_before' => '<span>',
                                'link_after'  => '</span>',
                            ) ); ?>
                        </article><!-- #post -->
                        <?php if ( comments_open() || get_comments_number() ) {
                            comments_template();
                        }
                    } ?>
                </main>
            </div>
        </div>
    </div>
</div>
<?php get_footer();
