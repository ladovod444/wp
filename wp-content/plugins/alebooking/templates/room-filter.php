<div class="filter">
	<form method="post" action="<?php echo get_post_type_archive_link( 'room' ); ?>">
		<select name="location">
			<option value="<?php echo esc_html__( 'Select location', 'alebooking' ); ?>"><?php echo esc_html__( 'Select location', 'alebooking' ); ?></option>
			<?php $data->instance->get_terms_hierarchical( 'location' ); ?>

		</select>

		<select name="room_type">
			<option value="<?php echo esc_html__( 'Select type', 'alebooking' ); ?>"><?php echo esc_html__( 'Select type', 'alebooking' ); ?></option>
			<?php $data->instance->get_terms_hierarchical( 'room_type' ); ?>

		</select>

		<input type="text" name="price_down" placeholder="Min price" value="<?php echo $_POST['price_down'] ?? '' ?>" />
		<input type="text" name="price_up" placeholder="Max price" value="<?php echo $_POST['price_up'] ?? '' ?>" />
		<input type="text" name="beds_count" placeholder="Minimum beds" value="<?php echo $_POST['beds_count'] ?? '' ?>" />

		<input type="submit" name="submit" value="<?php echo esc_html__( 'Filter', 'alebooking' ); ?>">
	</form>
</div>