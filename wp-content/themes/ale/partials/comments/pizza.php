<?php 
function pizza_comment_default($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);

    if ( 'div' == $args['style'] ) {
        $tag = 'div';
        $add_below = 'comment';
    } else {
        $tag = 'li';
        $add_below = 'div-comment';
    }
    ?>
    <<?php echo esc_attr($tag) ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
        <?php if ( 'div' != $args['style'] ) : ?>
            <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
        <?php endif; ?>
        <?php if ($depth > 1) { ?>
            <div class="comment-item comment2 second-level cf">
                <div class="response"></div>
        <?php } else { ?>
            <div class="comment-item comment1 first-level cf">
        <?php } ?>
        <div class="left_part">
            <?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['avatar_size'] ); ?>
        </div>
        <div class="comment-box">
            <div class="info-meta">
                <div class="left_meta font_one">
                    <?php printf("<span class='author'>".esc_html__('Posted by %s','delizioso')."</span>", get_comment_author_link()); ?>
                    &nbsp; / &nbsp; <span class="comment_date"><?php echo esc_html(get_comment_time()) .' '.esc_html(get_comment_date());?></span>
                </div>
                <?php if($depth == 1){ ?><span class="reply-link font_one"><?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?></span><?php } ?>
            </div>
            <div class="info-content">
                <?php if ($comment->comment_approved == '0') : ?>
                    <em class="comment-awaiting-moderation"><?php esc_html_e('Your comment is awaiting moderation.','delizioso') ?></em>
                    <br />
                <?php endif; ?>
                <?php comment_text() ?>
            </div>
        </div>
    </div>
    <?php if ( 'div' != $args['style'] ) : ?>
		</div>
		<?php endif; ?>
    <?php
}
?>
<div class="comments story" id="comments">
    <?php if (have_comments()) : ?>
        <div class="comments_container cf">
        <h3 class="comments_title"><?php esc_html_e('Comments','delizioso'); 
            if(get_comments_number()){
                echo ' ('.esc_html(get_comments_number()).')';
            }
        ?></h3>
        <a name="comments"></a>
        <?php wp_list_comments(array('callback' => 'pizza_comment_default','style' => 'div', 'max_depth' => 2,'avatar_size' => 100,)); ?>
        <?php the_comments_navigation(); ?>
        </div>
    <?php else :
        echo '<div class="comments_separator"></div>';  
    endif; ?>
    
    <?php
    // If comments are closed and there are comments, let's leave a little note, shall we?
    if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
    ?>
    <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'delizioso' ); ?></p>
    <?php endif; ?>

   <?php 
   $args = array(
        'comment_field' => '<div class="comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" placeholder="'.esc_attr__('Your Comment','delizioso').' *"></textarea></div>',
        'fields' => apply_filters( 'comment_form_default_fields', array(

                'author' =>
                    '<div class="fields_for_comment"><div class="comment-form-author"><input id="author" required name="author" type="text" size="30" placeholder="'.esc_attr__('Your name','delizioso').' *" /></div>',

                'email' =>
                    '<div class="comment-form-email"><input id="email" required name="email" type="text" size="30" placeholder="'.esc_attr__('Your email','delizioso').' *" /></div>',

                'url' =>
                    '<div class="comment-form-url"><input id="url" name="url" type="text" size="30" placeholder="'.esc_attr__('Website','delizioso').'" /></div></div>'
            )
        ),
        'submit_button' => '<div class="comments_submit_button"><input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" /></div>',
        'submit_field' => '<div class="form-submit">%1$s %2$s</div>'
    );
    comment_form( $args ); ?>
</div>