<?php


/**
 * The template for displaying the list of comments and the comment form.
 *
 * @package HelloElementor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! post_type_supports( get_post_type(), 'comments' ) ) {
	return;
}

if ( ! have_comments() && ! comments_open() ) {
	return;
}

// Comment Reply Script.
if ( comments_open() && get_option( 'thread_comments' ) ) {
	wp_enqueue_script( 'comment-reply' );
}
?>
<section id="comments" class="comments-area comments my-4">

	<?php if ( have_comments() ) : ?>
        <h3 class="mb-5">Comments:</h3>

		<?php the_comments_navigation(); ?>

		<ol class="comment-list p-0">
			<?php
			wp_list_comments(
				[
					'walker'            => new Bootstrap_Walker_Comment(),
					'max_depth'         => '2',
					'style'             => 'ol',
					'callback'          => null,
					'end-callback'      => null,
					'type'              => 'all',
					'reply_text'        => __('Reply<i class="fa fa-reply"></i>', 'band_digital'),
					//'reply_text'        => 'Rep',
					'page'              => '',
					'per_page'          => '10',
					'avatar_size'       => 80,
					'reverse_top_level' => null,
					'reverse_children'  => '',
					'format'            => 'html5', // или xhtml, если HTML5 не поддерживается темой
					'short_ping'        => false,    // С версии 3.6,
					'echo'              => true,     // true или false
				]
			);
			?>
		</ol>

		<?php the_comments_navigation(); ?>

	<?php endif; ?>

	<?php
	$defaults = [
		'fields'               => [

			'author' => '<div class="col-lg-6"><div class="form-group mb-4">
			
			<input id="author" placeholder="Name" class="form-control" name="author" type="text" value="" size="30"/>
		</div></div>',
			'email'  => '<div class="col-lg-6"><div class="form-group mb-4">
			
			<input id="email" placeholder="Email" class="form-control" name="email" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-describedby="email-notes"/>
		</div></div>',
		],
		'comment_field'        => '<div class="col-lg-12"><div class="form-group mb-3">
		<textarea id="comment" placeholder="Message" class="form-control" name="comment" cols="45" rows="8"  aria-required="true" required="required"></textarea>
	</div></div>',
		'must_log_in'          => '<p class="must-log-in">' .
		                          sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( $post->ID ) ) ) ) . '
	 </p>',
		'logged_in_as'         => '<p class="logged-in-as">' .
		                          sprintf( __( '<a href="%1$s" aria-label="Logged in as %2$s. Edit your profile.">Logged in as %2$s</a>. <a href="%3$s">Log out?</a>' ), get_edit_user_link(), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post->ID ) ) ) ) . '
	 </p>',
		'comment_notes_before' => '<p class="comment-notes">
		<span id="email-notes">' . __( 'Your email address will not be published.' ) . '</span></p>',
		'comment_notes_after'  => '',
		'id_form'              => 'commentform',
		'id_submit'            => 'submit',
		'class_container'      => 'comment-respond',
		'class_form'           => 'comment-form row',
		'class_submit'         => 'btn btn-hero btn-circled',
		'name_submit'          => 'submit',
		'title_reply'          => __( 'Leave a Reply' ),
		'title_reply_to'       => __( 'Leave a Reply to %s' ),
		'title_reply_before'   => '<h3 id="reply-title" class="comment-reply-title">',
		'title_reply_after'    => '</h3>',
		'cancel_reply_before'  => ' <small>',
		'cancel_reply_after'   => '</small>',
		'cancel_reply_link'    => __( 'Cancel reply' ),
		'label_submit'         => __( 'Post Comment!' ),
		//'submit_button'        => '<button name="%1$s" type="submit" id="%2$s" class="%3$s" >%4$s</button',
		//'submit_button'        => '<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" />',
		'submit_button'        => '<div class="col-lg-12"><input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" /></div>',
		'submit_field'         => '<p class="form-submit">%1$s %2$s</p>',
		'format'               => 'html5',
	];

	comment_form( $defaults );
	?>

</section>


<div class="comments my-4">


<!--    <div class="media mb-4">-->
<!--        <img src="images/blog/2.jpg" alt="" class="img-fluid d-flex mr-4 rounded">-->
<!--        <div class="media-body">-->
<!--            <h5>Антон Колесников</h5>-->
<!--            <span class="text-muted">20 января 2020</span>-->
<!--            <p class="mt-2">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nisi laborum dolores quidem ea optio fuga nesciunt tempora, in tenetur iusto!</p>-->
<!---->
<!--            <a href="#" class="reply">Ответить <i class="fa fa-reply"></i></a>-->
<!---->
<!--            <div class="media mt-5">-->
<!--                <img src="images/blog/2.jpg" alt="" class="img-fluid d-flex mr-4 rounded">-->
<!--                <div class="media-body">-->
<!--                    <h5>Егор Савицкий</h5>-->
<!--                    <span class="text-muted">20 января 2020</span>-->
<!--                    <p class="mt-2">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nisi laborum dolores quidem ea optio fuga nesciunt tempora, in tenetur iusto!</p>-->
<!---->
<!--                    <a href="#" class="reply">--><?php //_e('Reply<i class="fa fa-reply"></i>', 'band_digital') ?><!--,</a>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="media mb-4">-->
<!--        <img src="images/blog/2.jpg" alt="" class="img-fluid d-flex mr-4 rounded">-->
<!--        <div class="media-body">-->
<!--            <h5>Валентин Крашков</h5>-->
<!--            <span class="text-muted">14 февраля 2020</span>-->
<!--            <p class="mt-2">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nisi laborum dolores quidem ea optio fuga nesciunt tempora, in tenetur iusto!</p>-->
<!---->
<!--            <a href="#" class="reply">Ответить <i class="fa fa-reply"></i></a>-->
<!--        </div>-->
<!--    </div>-->
</div>

<div class="mt-5 mb-3">
    <h3 class="mt-5 mb-2">Оставьте комментарий</h3>
    <p class="mb-4">Ваш E-mail защищен от спама</p>
    <form action="#" class="row">
        <div class="col-lg-12">
            <div class="form-group mb-3">
                <textarea cols="30" rows="6" class="form-control"  placeholder="Комментарий"></textarea>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group mb-3">
                <input type="text" class="form-control" placeholder="Имя">
            </div>
        </div>

        <div class="col-lg-6">
            <div class="form-group mb-4">
                <input type="email" class="form-control" placeholder="Email">
            </div>
        </div>

        <div class="col-lg-12">
            <a href="#" class="btn btn-hero btn-circled">Оставить комментарий</a>
        </div>
    </form>
</div>
