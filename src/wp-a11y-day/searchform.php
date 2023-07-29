<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="search"><?php echo _x( 'Search for:', 'label', 'wp-accessibility-day' ); ?></label>
	<div class="search-field">
		<input id="search" type="search" class="search-field" value="<?php echo get_search_query(); ?>" name="s" />
		<button type="submit" class="search-submit"><?php echo _x( 'Search', 'submit button', 'wp-accessibility-day' ); ?></button>
	</div>
</form>