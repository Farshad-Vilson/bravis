<?php if($settings['search_type'] == 'popup') : ?>
	<div class="pxl-search-popup-button pxl-cursor--cta <?php echo esc_attr($settings['style']); ?>">
		<?php if(!empty($settings['pxl_icon']['value'])) {
	            \Elementor\Icons_Manager::render_icon( $settings['pxl_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' );
	    } else { ?>
	    	<svg xmlns="http://www.w3.org/2000/svg" width="20" height="19" viewBox="0 0 20 19" fill="none" stroke="#4E4E53">
				<path d="M8.91012 16.482C13.2599 16.482 16.7861 12.9558 16.7861 8.60598C16.7861 4.25619 13.2599 0.72998 8.91012 0.72998C4.56032 0.72998 1.03412 4.25619 1.03412 8.60598C1.03412 12.9558 4.56032 16.482 8.91012 16.482Z"  stroke-miterlimit="10"/>
				<path d="M14.5251 14.127L18.8121 18.416" stroke="#4E4E53" stroke-miterlimit="10"/>
			</svg>
	    <?php } ?>
	</div>
	<?php add_action( 'pxl_anchor_target', 'saliver_hook_anchor_search'); ?>
<?php endif; ?>

<?php if($settings['search_type'] == 'form') : ?>
	<?php get_search_form(); ?>
<?php endif; ?>