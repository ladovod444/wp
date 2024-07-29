<a name="success"></a>
<?php

if (isset($_GET['success'])) :
    echo '<p class="success">'.esc_html__("Thank you for your message!", "ale").'</p>';
endif;

if (isset($error) && isset($error['msg'])) :
    echo '<p class="error">'.esc_attr($error['msg']).'</p>';
endif; ?>

<?php if(ALETHEME_DESIGN_STYLE == 'bebe'){  ?>
    <form class="cf" method="post" id="contact-form" action="<?php echo esc_url(get_the_permalink())?>">
        <input id="name" name="contact[name]" type="text" placeholder="<?php esc_attr_e('Name','ale'); ?>" value="" required="required" />
        <input id="email" name="contact[email]" type="email" placeholder="<?php esc_attr_e('Email','ale'); ?>" value="" required="required" />
        <textarea id="message" name="contact[message]" placeholder="<?php esc_attr_e('Message','ale'); ?>" required="required"></textarea>
        <input id="submit" type="submit" value="<?php esc_attr_e('Send','ale'); ?>"/>
        <input name="contact[receive]" type="hidden" value="<?php echo esc_attr(ale_get_option('footer_email_address')); ?>" />
        <input name="contact[subject]" type="hidden" value="<?php esc_attr_e('Footer Contact Form','ale'); ?>" />
        <?php wp_nonce_field(); ?>
    </form>
<?php } else { ?>
    <form method="post" action="<?php echo esc_url(get_the_permalink())?>" class="cf font_two clearfix">
        <input name="contact[name]" type="text" class="item_field" placeholder="<?php esc_attr_e('Your name','ale'); ?>" value="" required="required" id="contact-form-name" />
        <input name="contact[email]" type="email" class="item_field" placeholder="<?php esc_attr_e('Your Email','ale'); ?>" value="" required="required" id="contact-form-email" />
        <textarea name="contact[message]" class="item_field" placeholder="<?php esc_attr_e('Your Message','ale'); ?>" id="contact-form-message" required="required"></textarea>
        <input type="submit" class="submit submit_button" value="<?php esc_attr_e('Send','ale'); ?>"/>
        <input name="contact[receive]" type="hidden" value="<?php echo esc_attr(ale_get_option('footer_email_address')); ?>" />
        <input name="contact[subject]" type="hidden" value="<?php esc_attr_e('Footer Contact Form','ale'); ?>" />
        <?php wp_nonce_field(); ?>
    </form>
<?php } ?>