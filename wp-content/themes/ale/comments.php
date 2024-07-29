<?php 
if ( post_password_required() ) {
	return;
} 

do_action('aletheme_specific_comments_list_and_form');