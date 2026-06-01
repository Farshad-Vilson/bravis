<?php
/**
 * @package Bravis-Themes
 */
get_header(); ?>
<div class="container">
    <div class="row content-row">
        <div id="pxl-content-area" class="pxl-content-area col-12">
            <main id="pxl-content-main" class="pxl-text-center">
                <div class="pxl-error-inner bg-image">
                    <h1 class="pxl-error">4<span>0</span>4</h1>
                    <div class="pxl-error-desc">
                        <?php echo esc_html__('Looks like here is nothing', 'saliver'); ?>
                    </div>
                    <a class="btn " href="<?php echo esc_url(home_url('/')); ?>">
                        <span class="pxl--btn-text"><?php echo esc_html__('go back home', 'saliver'); ?></span>
                        <span class="pxl--btn-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="8" viewBox="0 0 14 8" fill="black">
                                <path d="M9.72418 0.116959C9.84925 -0.0389864 10.0994 -0.0389864 10.2557 0.116959L13.8827 3.73489C14.0391 3.89084 14.0391 4.10916 13.8827 4.26511L10.2557 7.88304C10.0994 8.03899 9.84925 8.03899 9.72418 7.88304L9.47404 7.66472C9.34897 7.50877 9.34897 7.29045 9.47404 7.1345L12.1005 4.51462H0.375209C0.156337 4.51462 0 4.35867 0 4.14035V3.82846C0 3.64133 0.156337 3.45419 0.375209 3.45419H12.1005L9.47404 0.865497C9.34897 0.709552 9.34897 0.491228 9.47404 0.335283L9.72418 0.116959Z" />
                            </svg>
                        </span>
                    </a>
                </div>
            </main>
        </div>
    </div>
</div>
<?php get_footer();
