<?php
    $post_id = get_the_ID();
    $user = wp_get_current_user();
    $user_identity = $user->exists() ? $user->display_name : '';

    $req = get_option( 'require_name_email' );

    function ale_keira_comment_default($comment, $args, $depth) {
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
    
    
            <div class="comment-box font_two">
                <div class="info-meta">
                    <span class="comment_author"><?php echo get_comment_author(); ?></span>
                    <span class="comment_post_date"><?php printf( ale_wp_kses(esc_html__('%1$s %2$s','ale')), get_comment_time(), get_comment_date() ) ?></span>
                    </div>
                <div class="info-content">
                    <?php if ($comment->comment_approved == '0') : ?>
                        <em class="comment-awaiting-moderation"><?php esc_html_e('Your comment is awaiting moderation.','ale') ?></em>
                        <br />
                    <?php endif; ?>
                    <?php comment_text() ?>
                </div>
                <?php if($depth == 1){ ?><div class="reply_link_box"><span class="reply-link">- <?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?></span></div><?php } ?>
            </div>
    
        </div>
        <?php if ( 'div' != $args['style'] ) : ?>
            </div>
            <?php endif; ?>
        <?php
    }
?>
<h3 class="keira_comments_title"><?php esc_html_e('Leave a comment','ale');?></h3>
<!-- Comments -->
<div class="comments keira_comments" id="comments">
    <?php if (have_comments()) : ?>
    <div class="comments_containlker cf">
        <a name="comments"></a>

        <?php if (post_password_required()) : ?>
            <p class="comments-protected"><?php esc_html_e('This post is password protected. Enter the password to view comments.', 'ale'); ?></p>
            <?php
            return; endif; ?>
        <?php if (have_comments()) : ?>

            <?php wp_list_comments(array('callback' => 'ale_keira_comment_default','style' => 'div', 'max_depth' => 2,'avatar_size' => 0,)); ?>


            <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : // are there comments to navigate through ?>
                <nav class="comments-nav" class="pager">
                    <div class="previous"><?php previous_comments_link(esc_html__('&larr; Older comments', 'ale')); ?></div>
                    <div class="next"><?php next_comments_link(esc_html__('Newer comments &rarr;', 'ale')); ?></div>
                </nav>
            <?php endif; // check for comment navigation ?>
        <?php  endif; ?>
    </div>
    <?php endif; ?>

    <?php
    // If comments are closed and there are comments, let's leave a little note, shall we?
    if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
    ?>
    <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'ale' ); ?></p>
    <?php endif; ?>

    <?php if(comments_open()){ ?>
    <div id="respond" class="leave-a-comment">
        <div id="reply-title" class="comment-reply-title comments_name cf">
            <?php echo cancel_comment_reply_link(); ?>
            <a name="respond"></a>
        </div>

        <?php if (get_option('comment_registration') && !is_user_logged_in()) : ?>
            <p class="loginforcomment"><?php printf(ale_wp_kses(__('You must be <a href="%s">logged in</a> to post a comment.', 'ale')), wp_login_url(get_permalink())); ?></p>
        <?php else : ?>
        <form action="<?php echo esc_url(get_option('siteurl')); ?>/wp-comments-post.php" id="comment-form" method="post" class="comment-form cf">

            <?php if (is_user_logged_in()) : ?>
            <div class="loginforcomment cf">
            <p><?php printf(ale_wp_kses(__('Logged in as <a class="login_link" href="%s/wp-admin/profile.php">%s</a>.', 'ale')), get_option('siteurl'), $user_identity); ?> <a href="<?php echo esc_url(wp_logout_url(get_permalink())); ?>" title="<?php esc_html__('Log out of this account', 'ale'); ?>"><?php esc_html_e('Log out', 'ale'); ?></a></p>
    </div>
    <?php endif; ?>

    <?php if (!is_user_logged_in()) : ?>
        <input type="text" class="font_two" name="author" id="author" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> required="required" placeholder="<?php esc_attr_e('Your name*','ale'); ?>" />
        <input type="email" class="font_two" name="email" id="email" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> required="required" email="true" placeholder="<?php esc_attr_e('Your e-mail*','ale'); ?>" />
    <?php endif; ?>
        <textarea id="message" name="comment" tabindex="4" class="message font_two" required="required" placeholder="<?php esc_attr_e('Type here your comment','ale'); ?>"></textarea>
        <input type="submit" name="submit" class="font_two" tabindex="5" value="<?php esc_attr_e('Post a Comment','ale'); ?>"/>
    <?php comment_id_fields(); ?>
    <?php do_action('comment_form', get_the_ID()); ?>
    </form>
    <?php endif; // if registration required and not logged in ?>
</div>
<?php } ?>
</div>