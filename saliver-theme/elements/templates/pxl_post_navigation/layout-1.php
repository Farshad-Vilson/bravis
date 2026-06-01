<?php
if($settings['type'] === 'navigation') :
    global $post;
    $previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
    $next     = get_adjacent_post( false, '', false );
    if ( ! $next && ! $previous ) {
        return;
    }
    $next_post = get_next_post();
    $previous_post = get_previous_post();
    if ( ! empty( $settings['logo_link']['url'] ) ) {
        $widget->add_render_attribute( 'logo_link', 'href', $settings['logo_link']['url'] );

        if ( $settings['logo_link']['is_external'] ) {
            $widget->add_render_attribute( 'logo_link', 'target', '_blank' );
        }

        if ( $settings['logo_link']['nofollow'] ) {
            $widget->add_render_attribute( 'logo_link', 'rel', 'nofollow' );
        }
    }
    function render_social_share_buttons($post_id)
    {
        $post_title = urlencode(get_the_title($post_id));
        $post_url = urlencode(get_permalink($post_id));
        $share_facebook = "https://www.facebook.com/sharer.php?u=$post_url";
        $share_twitter = "https://twitter.com/share?url=$post_url&text=$post_title";
        $share_linkedin = "https://www.linkedin.com/shareArticle?mini=true&url=$post_url&title=$post_title";

        echo "
        <div class='social-share'>
        <div class='social'>
        <a href='$share_facebook' target='_blank' class='share-facebook'><i class='fab fa-facebook-f'></i></a>
        <a href='$share_twitter' target='_blank' class='share-twitter'><i class='fab fa-twitter'></i></a>
        <a href='$share_linkedin' target='_blank' class='share-linkedin'><i class='fab fa-linkedin-in'></i></a>
        </div>
        </div>
        ";
    }
    if( !empty($next_post) || !empty($previous_post) ) { ?>
        <div class="pxl-post-navigation">
            <?php if ( is_a( $previous_post , 'WP_Post' ) && get_the_title( $previous_post->ID ) != '') { ?>
                <div class="pxl--item item--prev pxl-navigation-btn--wrap pxl-navigation--prev">
                    <a class="pxl-icon-link pxl-arrow--prev" href="<?php echo esc_url(get_permalink( $previous_post->ID )); ?>">
                        <span class="pxl-item-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="8" viewBox="0 0 14 8" fill="black">
                                <path d="M4.27582 0.116959C4.15075 -0.0389864 3.90061 -0.0389864 3.74428 0.116959L0.117253 3.73489C-0.0390835 3.89084 -0.0390835 4.10916 0.117253 4.26511L3.74428 7.88304C3.90061 8.03899 4.15075 8.03899 4.27582 7.88304L4.52596 7.66472C4.65103 7.50877 4.65103 7.29045 4.52596 7.1345L1.8995 4.51462H13.6248C13.8437 4.51462 14 4.35867 14 4.14035V3.82846C14 3.64133 13.8437 3.45419 13.6248 3.45419H1.8995L4.52596 0.865497C4.65103 0.709552 4.65103 0.491228 4.52596 0.335283L4.27582 0.116959Z" />
                            </svg>                        
                        </span>
                        <?php
                        $title = !empty($settings['title']) ? $settings['title'] : esc_html__('prev case','saliver');
                        echo pxl_print_html($title);
                        ?>
                    </a>
                    <div class="prev-post-title">
                        <h3><?php echo esc_html(get_the_title($previous_post->ID)); ?></h3>
                    </div>
                </div>
            <?php } ?>
            <?php if ($settings['show_grid'] == true) { ?>
               <div class="pxl--item pxl--item-grid">
                <a <?php pxl_print_html($widget->get_render_attribute_string( 'logo_link' )); ?>>
                    <span class="bl bl1"></span>
                    <span class="bl bl2"></span>
                    <span class="bl bl3"></span>
                    <span class="bl bl4"></span>
                </a>
            </div>
        <?php } else { ?>
            <div class="pxl--item post-shares">
                <?php if ($settings['show_share'] == true) { ?>
                 <span class="label">
                   <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"><g><g><path d="M406,332c-29.641,0-55.761,14.581-72.167,36.755L191.99,296.124c2.355-8.027,4.01-16.346,4.01-25.124    c0-11.906-2.441-23.225-6.658-33.636l148.445-89.328C354.307,167.424,378.589,180,406,180c49.629,0,90-40.371,90-90    c0-49.629-40.371-90-90-90c-49.629,0-90,40.371-90,90c0,11.437,2.355,22.286,6.262,32.358l-148.887,89.59    C156.869,193.136,132.937,181,106,181c-49.629,0-90,40.371-90,90c0,49.629,40.371,90,90,90c30.13,0,56.691-15.009,73.035-37.806    l141.376,72.395C317.807,403.995,316,412.75,316,422c0,49.629,40.371,90,90,90c49.629,0,90-40.371,90-90    C496,372.371,455.629,332,406,332z"/></g></g><g></g><g>
                   </g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
               </span>
               <?php render_social_share_buttons($post->ID); ?>
           <?php } ?>
       </div>
   <?php } ?>
   <?php if ( is_a( $next_post , 'WP_Post' ) && get_the_title( $next_post->ID ) != '') { ?>
    <div class="pxl--item item--next pxl-navigation-btn--wrap pxl-navigation--next ">
        <a class="pxl-icon-link pxl-arrow--next" href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>">
            <?php
                $title1 = !empty($settings['title']) ? $settings['title1'] : esc_html__('next case','saliver');
                echo pxl_print_html($title1);
            ?>
            <span class="pxl-item-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="8" viewBox="0 0 14 8" fill="black">
                    <path d="M9.72418 0.116959C9.84925 -0.0389864 10.0994 -0.0389864 10.2557 0.116959L13.8827 3.73489C14.0391 3.89084 14.0391 4.10916 13.8827 4.26511L10.2557 7.88304C10.0994 8.03899 9.84925 8.03899 9.72418 7.88304L9.47404 7.66472C9.34897 7.50877 9.34897 7.29045 9.47404 7.1345L12.1005 4.51462H0.375209C0.156337 4.51462 0 4.35867 0 4.14035V3.82846C0 3.64133 0.156337 3.45419 0.375209 3.45419H12.1005L9.47404 0.865497C9.34897 0.709552 9.34897 0.491228 9.47404 0.335283L9.72418 0.116959Z" />
                </svg>            
            </span>
        </a>
        <div class="next-post-title">
            <h3><?php echo esc_html(get_the_title($next_post->ID)); ?></h3>
        </div>
    </div>
<?php } ?>

</div>
<?php } 
endif;?>
