<?php

if (!class_exists('Saliver_Blog')) {

    class Saliver_Blog
    {
        
        public function get_archive_meta() {
            $archive_author = saliver()->get_theme_opt( 'archive_author', true );
            $archive_date = saliver()->get_theme_opt( 'archive_date', true );
            $archive_view = saliver()->get_theme_opt( 'archive_view', true );
            $archive_comment = saliver()->get_theme_opt( 'archive_comment', true );
            $views = saliver_get_post_views(get_the_ID());
            $suffix = ($views >= 1000) ? 'k' : '+';
            if($archive_author || $archive_view || $archive_date || $archive_comment) : ?>
                <div class="pxl-item--meta pxl-blog-meta">
                    <div class="pxl-blog-meta-inner">
                        <?php if($archive_author) : ?>
                            <div class="pxl-item--author pxl-mr-28">
                                <i class="flaticon-user text-gradient pxl-mr-8"></i>
                                <?php echo esc_html__('by', 'saliver'); ?>&nbsp;<?php the_author_posts_link(); ?>
                            </div>
                        <?php endif; ?>
                        <?php if($archive_comment) : ?>
                            <div class="pxl-item--comment pxl-mr-28">
                                <i class="flaticon-chat text-gradient pxl-mr-8"></i>
                                <a href="<?php the_permalink(); ?>#comments">
                                    <?php echo comments_number(esc_html__('No Comments', 'saliver'),esc_html__('1 Comment', 'saliver'),esc_html__('% Comments', 'saliver')); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                        <?php if($archive_date) : ?>
                            <div class="pxl-item--date pxl-mr-28">
                                <i class="flaticon-calendar text-gradient pxl-mr-8"></i>
                                <?php echo get_the_date('d M'); ?>/<?php echo get_the_date('y'); ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($archive_view) : ?>
                            <div class="pxl-item--view pxl-post-list">
                                <i class="caseicon-view-alt pxl-mr-5"></i>
                               <span class="pxl-mr-3"><?php echo esc_html( $views ) . esc_html( $suffix ); ?><?php echo esc_html__('View', 'saliver');?></span>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
            <?php endif; 
        }

        public function get_post_metas(){
            $post_author = saliver()->get_theme_opt( 'post_author', true );
            $post_comment = saliver()->get_theme_opt( 'post_comment', true );
            $post_date = saliver()->get_theme_opt( 'post_date', true );
            $post_view = saliver()->get_theme_opt( 'post_view', true );
            $views = saliver_get_post_views(get_the_ID());
            $suffix = ($views >= 1000) ? 'k' : '+';
            $author_id = get_post_field('post_author', get_the_ID());
            $author_name = get_the_author_meta( 'display_name' , $author_id );
            $post_categories = get_the_category();
            if($post_author || $post_date|| $post_view) : ?>
                <div class="pxl-item--meta pxl-blog-meta">
                    <div class="pxl-blog-meta-inner">
                        <div class="pxl-left">
                            <?php if ( ! empty( $post_categories ) ) :?>
                                <div class="pxl-item--category pxl-mr-40">
                                    <?php
                                        foreach ( $post_categories as $key => $category ) {
                                            if ( $key > 0 ) echo ', ';
                                            echo '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a>';
                                        }
                                    ?>
                                </div>
                            <?php endif; ?>
                            <?php if($post_date) : ?>
                                <div class="pxl-item--date pxl-mr-40">
                                    <?php echo get_the_date('M d'); ?>,<?php echo get_the_date('Y'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="pxl-right">
                            <?php if($post_comment) : ?>
                                <div class="pxl-item--comment pxl-mr-40">
                                    <i aria-hidden="true" class="fas fa-comments"></i>
                                    <a href="<?php the_permalink(); ?>#comments">
                                        <?php echo comments_number(esc_html__('0', 'saliver'),esc_html__('1 +', 'saliver'),esc_html__('% +', 'saliver')); ?>
                                        <?php echo esc_html__(' COMMNETS', 'saliver');?>
                                    </a>
                                </div>
                            <?php endif; ?>
                            <?php if ($post_view) : ?>
                                <div class="pxl-item--view pxl-post-list">
                                    <i aria-hidden="true" class="far fa-eye"></i>
                                    <span class="pxl-mr-3"><?php echo esc_html( $views ) . esc_html( $suffix ); ?><?php echo esc_html__('View', 'saliver');?></span>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endif; 
        }

        public function get_excerpt(){
            $archive_excerpt_length = saliver()->get_theme_opt('archive_excerpt_length', '50');
            $saliver_the_excerpt = get_the_excerpt();
            if(!empty($saliver_the_excerpt)) {
                echo wp_trim_words( $saliver_the_excerpt, $archive_excerpt_length, $more = null );
            } else {
                echo wp_kses_post($this->get_excerpt_more( $archive_excerpt_length ));
            }
        }

        public function get_excerpt_more( $post = null ) {
            $archive_excerpt_length = saliver()->get_theme_opt('archive_excerpt_length', '50');
            $post = get_post( $post );

            if ( empty( $post ) || 0 >= $archive_excerpt_length ) {
                return '';
            }

            if ( post_password_required( $post ) ) {
                return esc_html__( 'Post password required.', 'saliver' );
            }

            $content = apply_filters( 'the_content', strip_shortcodes( $post->post_content ) );
            $content = str_replace( ']]>', ']]&gt;', $content );

            $excerpt_more = apply_filters( 'saliver_excerpt_more', '&hellip;' );
            $excerpt      = wp_trim_words( $content, $archive_excerpt_length, $excerpt_more );

            return $excerpt;
        }

        public function saliver_set_post_views( $postID ) {
            $countKey = 'post_views_count';
            $count    = get_post_meta( $postID, $countKey, true );
            if ( $count == '' ) {
                $count = 0;
                delete_post_meta( $postID, $countKey );
                add_post_meta( $postID, $countKey, '0' );
            } else {
                $count ++;
                update_post_meta( $postID, $countKey, $count );
            }
        }

        public function get_tagged_in(){
            $tags_list = get_the_tag_list( ' ' );
            if ( $tags_list )
            {
                echo '<div class="pxl--tags pxl-mr-15">';
                printf('%2$s', '', $tags_list);
                echo '</div>';
            }
        }

        


        public function get_socials_share() { 
            $img_url = '';
            if (has_post_thumbnail(get_the_ID()) && wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), false)) {
                $img_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), false);
            }
            $social_facebook = saliver()->get_theme_opt( 'social_facebook', true );
            $social_twitter = saliver()->get_theme_opt( 'social_twitter', true );
            $social_pinterest = saliver()->get_theme_opt( 'social_pinterest', true );
            $social_linkedin = saliver()->get_theme_opt( 'social_linkedin', true );
            ?>
            <div class="pxl--social">
                
                <?php if($social_facebook) : ?>
                    <a class="fb-social" title="<?php echo esc_attr__('Facebook', 'saliver'); ?>" target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="caseicon-facebook"></i></a>
                <?php endif; ?>
                <?php if($social_twitter) : ?>
                    <a class="tw-social" title="<?php echo esc_attr__('Twitter', 'saliver'); ?>" target="_blank" href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>%20"><i class="caseicon-twitter"></i></a>
                <?php endif; ?>
                <?php if($social_pinterest) : ?>
                    <a class="pin-social" title="<?php echo esc_attr__('Pinterest', 'saliver'); ?>" target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo esc_url($img_url[0]); ?>&description=<?php the_title(); ?>%20"><i class="caseicon-pinterest"></i></a>
                <?php endif; ?>
                <?php if($social_linkedin) : ?>
                    <a class="lin-social" title="<?php echo esc_attr__('LinkedIn', 'saliver'); ?>" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>%20"><i class="caseicon-linkedin"></i></a>
                <?php endif; ?>
            </div>
            <?php
        } 

        public function get_socials_share_portfolio() { 
            $img_url = '';
            if (has_post_thumbnail(get_the_ID()) && wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), false)) {
                $img_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), false);
            }
            ?>
            <div class="pxl--social">
                <a class="fb-social" title="<?php echo esc_attr__('Facebook', 'saliver'); ?>" target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="caseicon-facebook"></i></a>
                <a class="tw-social" title="<?php echo esc_attr__('Twitter', 'saliver'); ?>" target="_blank" href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>%20"><i class="caseicon-twitter"></i></a>
                <a class="pin-social" title="<?php echo esc_attr__('Pinterest', 'saliver'); ?>" target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo esc_url($img_url[0]); ?>&description=<?php the_title(); ?>%20"><i class="caseicon-pinterest"></i></a>
                <a class="lin-social" title="<?php echo esc_attr__('LinkedIn', 'saliver'); ?>" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>%20"><i class="caseicon-linkedin"></i></a>
            </div>
            <?php
        }


        public function get_post_author_info() { ?>
            <div class="pxl-post--author-info pxl-item--flexnw">
                <div class="pxl-post--author-image pxl-mr-25">
                    <?php echo get_avatar( get_the_author_meta( 'ID' ), 160 ); ?>
                </div>
                <div class="pxl-post--author-meta">
                    <div class="pxl-post-inner">
                        <span><?php echo esc_html__( 'Author', 'saliver' ); ?></span>
                        <h5 class="pxl-post--author-title"><?php the_author_posts_link(); ?></h5>
                    </div>
                    <div class="pxl-post--author-description">
                        <span>
                             <?php the_author_meta( 'description' ); ?> 
                        </span>
                        <?php saliver_get_user_social(); ?>
                    </div>
                </div>
            </div>
        <?php }

        public function get_post_nav() {
            global $post;
            $previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
            $next     = get_adjacent_post( false, '', false );

            if ( ! $next && ! $previous )
                return;
            ?>
            <?php
            $next_post = get_next_post();
            $previous_post = get_previous_post();

            if( !empty($next_post) || !empty($previous_post) ) { 
                $page_for_posts = get_option( 'page_for_posts' );
                ?>
                <div class="pxl-post--navigation pxl-flex">
                    
                    <?php if ( is_a( $previous_post , 'WP_Post' ) && get_the_title( $previous_post->ID ) != '') { 
                        $prev_img_id = get_post_thumbnail_id($previous_post->ID);
                        $img_prev  = pxl_get_image_by_size( array(
                            'attach_id'  => $prev_img_id,
                            'thumb_size' => '260x260',
                        ) );
                        $thumbnail_prev    = $img_prev['url']; ?>
                        <div class="pxl-navigation--col pxl-navigation--prev">
                            <div class="pxl-navigation--image bg-image pxl-mr-20">
                                <a href="<?php echo esc_url(get_permalink( $previous_post->ID )); ?>" class="pxl-navigation--link">
                                    <i aria-hidden="true" class="far fa-long-arrow-left"></i>
                                </a>
                            </div>
                            <div class="pxl-navigation--meta">
                            <div class="pxl-navigation--pre"><?php echo esc_html__('prev post', 'saliver'); ?></div>
                                <h5 class="pxl-navigation--title">
                                    <a  href="<?php echo esc_url(get_permalink( $previous_post->ID )); ?>"><?php echo get_the_title( $previous_post->ID ); ?></a>
                                </h5>
                            </div>
                        </div>
                    <?php } ?>
                    
                    <?php if ( is_a( $next_post , 'WP_Post' ) && get_the_title( $next_post->ID ) != '') { 
                        $next_img_id = get_post_thumbnail_id($next_post->ID);
                        $img_next  = pxl_get_image_by_size( array(
                            'attach_id'  => $next_img_id,
                            'thumb_size' => '260x260',
                        ) );
                        $thumbnail_next    = $img_next['url']; ?>
                        <div class="pxl-navigation--col pxl-navigation--next">
                            <div class="pxl-navigation--meta pxl-text-right">
                                <div class="pxl-navigation--next"><?php echo esc_html__('next post', 'saliver'); ?></div>
                                <h5 class="pxl-navigation--title">
                                    <a  href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>"><?php echo get_the_title( $next_post->ID ); ?></a>
                                </h5>
                            </div>
                            <div class="pxl-navigation--image bg-image pxl-ml-20">
                                <a href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>" class="pxl-navigation--link">
                                    <i aria-hidden="true" class="far fa-long-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                    
                </div>
            <?php }
        }

        public function get_related_post(){
            $post_related_on = saliver()->get_theme_opt( 'post_related_on', false );

            if($post_related_on) {
                global $post;
                $current_id = $post->ID;
                $posttags = get_the_category($post->ID);
                if (empty($posttags)) return;

                $tags = array();

                foreach ($posttags as $tag) {

                    $tags[] = $tag->term_id;
                }
                $post_number = '6';
                $query_similar = new WP_Query(array('posts_per_page' => $post_number, 'post_type' => 'post', 'post_status' => 'publish', 'category__in' => $tags));
                if (count($query_similar->posts) > 1) {
                    wp_enqueue_script( 'swiper' );
                    wp_enqueue_script( 'pxl-swiper' );
                    $opts = [
                        'slide_direction'               => 'horizontal',
                        'slide_percolumn'               => '1', 
                        'slide_mode'                    => 'slide', 
                        'slides_to_show'                => 3, 
                        'slides_to_show_lg'             => 3, 
                        'slides_to_show_md'             => 2, 
                        'slides_to_show_sm'             => 2, 
                        'slides_to_show_xs'             => 1, 
                        'slides_to_scroll'              => 1, 
                        'slides_gutter'                 => 30, 
                        'arrow'                         => false,
                        'dots'                          => true,
                        'dots_style'                    => 'bullets'
                    ];
                    $data_settings = wp_json_encode($opts);
                    $dir           = is_rtl() ? 'rtl' : 'ltr';
                    ?>
                    <div class="pxl-related-post">
                        <h4 class="widget-title"><?php echo esc_html__('Related Posts', 'saliver'); ?></h4>
                        <div class="class" data-settings="<?php echo esc_attr($data_settings) ?>" data-rtl="<?php echo esc_attr($dir) ?>">
                            <div class="pxl-related-post-inner pxl-swiper-wrapper swiper-wrapper">
                            <?php foreach ($query_similar->posts as $post):
                                $thumbnail_url = '';
                                if (has_post_thumbnail(get_the_ID()) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)) :
                                    $thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'pxl-blog-small', false);
                                endif;
                                if ($post->ID !== $current_id) : ?>
                                    <div class="pxl-swiper-slide swiper-slide grid-item">
                                        <div class="pxl-grid-item-inner">
                                            <?php if (has_post_thumbnail()) { ?>
                                                <div class="item-featured">
                                                    <a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($thumbnail_url[0]); ?>" /></a>
                                                </div>
                                            <?php } ?>
                                            <h3 class="item-title">
                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            </h3>
                                        </div>
                                    </div>
                                <?php endif;
                            endforeach; ?>
                            </div>
                        </div>
                    </div>
                <?php }
            }

            wp_reset_postdata();
        }
    }
}
