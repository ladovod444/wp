<?php
    $post_id = get_the_ID();
    $user = wp_get_current_user();
    $user_identity = $user->exists() ? $user->display_name : '';

    $req = get_option( 'require_name_email' );
 ?>
<!-- Comments -->
<div class="comments" id="comments">
    <?php if (have_comments()) : ?>
    <div class="comments_containlker cf">
        <div class="comments_name cf">
            <div class="comments_title"><?php comments_number('0 ' . esc_html__('Comments','ale'), '1 '.esc_html__('Comment','ale'), '% '.esc_html__('Comments','ale')) ?></div>
            <div class="comments_separator"></div>
            <a name="comments"></a>
        </div>

        <?php if (post_password_required()) : ?>
            <p class="comments-protected"><?php esc_html_e('This post is password protected. Enter the password to view comments.', 'ale'); ?></p>
            <?php
            return; endif; ?>
        <?php if (have_comments()) : ?>
            <?php wp_list_comments(array('callback' => 'ale_comment_default','style' => 'div', 'max_depth' => 2,'avatar_size' => 55,)); ?>
            <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : // are there comments to navigate through ?>
                <nav class="comments-nav" class="pager">
                    <div class="previous"><?php previous_comments_link(esc_html__('&larr; Older comments', 'ale')); ?></div>
                    <div class="next"><?php next_comments_link(esc_html__('Newer comments &rarr;', 'ale')); ?></div>
                </nav>
            <?php endif; // check for comment navigation ?>
        <?php  endif; ?>
    </div>
    <?php  endif; ?>
    
    <?php
    // If comments are closed and there are comments, let's leave a little note, shall we?
    if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
    ?>
    <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'ale' ); ?></p>
    <?php endif; ?>

    <?php if(comments_open()){ ?>
    <div id="respond" class="leave-a-comment">
        <div class="comments_name cf">
            <div id="reply-title" class="comment-reply-title comments_title"><?php esc_html_e('Leave a comment','ale');?> <?php echo cancel_comment_reply_link(); ?></div>
            <div class="comments_separator"></div>
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

    <div class="line-item comment_container">
        <textarea id="message" name="comment" tabindex="1" class="message" required="required" placeholder="<?php esc_attr_e('Type here your comment','ale'); ?>"></textarea>
    </div>

    <?php if (!is_user_logged_in()) : ?>
    <div class="line-item cf">
        <div class="third_item">
            <input type="text" name="author" id="author" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> required="required" placeholder="<?php esc_attr_e('Your name*','ale'); ?>" />
        </div>
        <div class="third_item">
            <input type="email" name="email" id="email" tabindex="3" <?php if ($req) echo "aria-required='true'"; ?> required="required" email="true" placeholder="<?php esc_attr_e('Your e-mail*','ale'); ?>" />
        </div>
        <div class="third_item last">
            <input type="text" name="url" id="url" tabindex="4"  placeholder="<?php esc_attr_e('Your website','ale'); ?>"/>
        </div>
    </div>
    <?php endif; ?>

    <div class="line-item submit_container cf">
        <input type="submit" name="submit" tabindex="5" value="<?php esc_attr_e('Post a Comment','ale'); ?>"/>
    </div>

    <?php comment_id_fields(); ?>
    <?php do_action('comment_form', get_the_ID()); ?>
    </form>
    <?php endif; // if registration required and not logged in ?>

    <?php if(isset($wp_default_form)){ comment_form(); } ?>
</div>
<?php } ?>
</div>