<?php 
$default_settings = [
	'style' => '',
	'text_placeholder' => '',
	'text_button' => '',
	'post_type' => '',
	'quick_user' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
?>

<div class="pxl-icon--users icon-item h-btn-user <?php echo esc_attr($settings['style']) ?>">
	<?php 
	if (is_user_logged_in()) {
		$current_user = wp_get_current_user();
		$display_name = $current_user->display_name;
		?>
		<ul class="pxl-user-account">
			<li><a href="<?php echo esc_url(wp_logout_url()); ?>"><?php echo esc_html__('Log Out', 'saliver'); ?></a></li>
			<span class="pxl--btn-icon">
				<i aria-hidden="true" class="fal fa-long-arrow-right"></i>                            
			</span>
		</ul>
		<?php 
	} else {
		?>
		<div class="pxl-is-not-login">
			<a href="javascript:void(0)" class="btn-sign-up"> 
				<div class="pxl-sign-up-box">
					<?php echo esc_html__('Sign Up', 'saliver');?>
					<span class="pxl--btn-icon">
						<i aria-hidden="true" class="fal fa-long-arrow-right"></i>                            
					</span>
				</div>
			</a>
		</div>
		<?php 
	}
	?>
	
</div> 