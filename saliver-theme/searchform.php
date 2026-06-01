<?php
/**
 * Search Form
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url( '/' )); ?>">
	<div class="searchform-wrap">
        <input type="text" placeholder="<?php esc_attr_e('Search...', 'saliver'); ?>" name="s" class="search-field" />
    	<button type="submit" class="search-submit"><i aria-hidden="true" class="far fa-search"></i></button>
    </div>
</form>