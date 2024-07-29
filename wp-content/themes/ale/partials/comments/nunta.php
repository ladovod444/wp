<?php
    $post_id = get_the_ID();
    $user = wp_get_current_user();
    $user_identity = $user->exists() ? $user->display_name : '';

    $req = get_option( 'require_name_email' );

    function ale_nunta_comment_default($comment, $args, $depth) {
        $GLOBALS['comment'] = $comment; ?>
        <li <?php comment_class(); ?> data-comment-id="<?php echo esc_attr($comment->comment_ID); ?>">
            <div id="comment-<?php comment_ID(); ?>">
                <header class="comment-author vcard cf mainfont font_one">
                    <?php printf(__('<cite class="fn">%s</cite>', 'ale'), get_comment_author_link()); ?>
                </header>
                <?php if ($comment->comment_approved == '0') : ?>
                <p><?php esc_html_e('Your comment is awaiting moderation.', 'ale'); ?></p>
                <?php endif; ?>
                <section class="comment-body"><?php comment_text() ?></section>
            </div>
        </li>
    <?php }
 ?>
<section class="commentform cf">
        <a name="comments"></a>
            <?php if (!comments_open() && !is_page() && post_type_supports(get_post_type(), 'comments')) : ?>
                <p class="comments-closed"><?php esc_html_e('Comments are closed.', 'ale'); ?></p>
            <?php endif; ?>
        <?php if (comments_open()) : ?>
        <section class="comments">
            <div class="whiteboxexternal">
                <div class="whiteboxinternal">
                    <div class="paddingbox" style="height: 240px;">
                        <div class="scrollbox">
                        <?php if (post_password_required()) : ?>
                            <p class="comments-protected"><?php esc_html_e('This post is password protected. Enter the password to view comments.', 'ale'); ?></p>
                        <?php
                        return; endif; ?>
                        <?php if (have_comments()) : ?>
                            <ol class="commentlist">
                                <?php wp_list_comments(array('callback' => 'ale_nunta_comment_default', 'max_depth' => 2)); ?>
                            </ol>
                            <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : // are there comments to navigate through ?>
                                <nav class="comments-nav" class="pager">
                                    <div class="previous"><?php previous_comments_link(esc_html__('Older comments', 'ale')); ?></div>
                                    <div class="next"><?php next_comments_link(esc_html__('Newer comments', 'ale')); ?></div>
                                </nav>
                            <?php endif; // check for comment navigation ?>
                        <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="respond cf">
            <div class="whiteboxexternal">
                <div class="whiteboxinternal">
                    <div class="paddingbox" style="height: 240px;">
                        <a name="respond"></a>
                        <p class="cancel-comment-reply"><?php cancel_comment_reply_link(); ?></p>
                        <?php if (get_option('comment_registration') && !is_user_logged_in()) : ?>
                            <p><?php printf(__('You must be <a href="%s">logged in</a> to post a comment.', 'ale'), wp_login_url(get_permalink())); ?></p>
                        <?php else : ?>
                            <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" class="comment-form">
                                <p class="error"></p>
                                <div class="area1 ta cf">
                                    <?php if (is_user_logged_in()) : ?>
                                        <p><?php printf(__('Logged in as <a href="%s/wp-admin/profile.php">%s</a>.', 'ale'), get_option('siteurl'), $user_identity); ?> <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php esc_html__('Log out of this account', 'ale'); ?>"><?php esc_html_e('Log out &raquo;', 'ale'); ?></a></p>
                                    <?php else : ?>
                                    <div class="comentforminput">
                                        <label for="author"><?php esc_html_e('Your name', 'ale'); ?></label>
                                        <input type="text" class="text" placeholder="<?php esc_attr_e('Type here your name', 'ale'); ?> *" name="author" id="author" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> required="required">
                                    </div>
                                    <div class="comentforminput">
                                        <label for="email"><?php esc_html_e('Your email', 'ale'); ?></label>
                                        <input type="email" placeholder="<?php esc_attr_e('Type here your email', 'ale'); ?> *" class="text" name="email" id="email" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> required="required" email="true">
                                    </div>

                                    <?php endif; ?>
                                </div>
                                <div class="area2 ta cf">
                                    <div class="commenttextarea">
                                        <label for="comment"><?php esc_html_e('Your comment', 'ale'); ?></label>
                                        <textarea name="comment" placeholder="<?php esc_attr_e('Type here your comment', 'ale'); ?> *" id="comment" class="input-xlarge" tabindex="4" rows="5" cols="40" required="required"></textarea>
                                        <span class="succes"></span>
                                    </div>
                                    <div class="buttoncomment">
                                        <input name="submit" class="submit" type="submit" tabindex="5" value="<?php esc_attr_e('Submit', 'ale'); ?>" />
                                    </div>
                                </div>
                                <div class="cf"></div>
                                <?php comment_id_fields(); ?>
                                <?php do_action('comment_form', $post->ID); ?>
                            </form>
                        <?php endif; // if registration required and not logged in ?>
                    </div>
                </div>
             </div>
        </section>
        <?php endif; ?>
    </section>