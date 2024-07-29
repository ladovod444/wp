<div class="ale_author_info">
    <div class="author_name cf">
        <div class="author_title"><?php echo esc_html_e('About the author - ','ale'); echo get_the_author(); ?></div>
        <div class="author_separator"></div>
    </div>
    <div class="author_description cf">
        <div class="author_avatar">
            <?php $author_id = get_the_author_meta( 'ID' ) ?>
            <?php echo get_avatar( esc_attr($author_id), '72'); ?>
        </div>
        <div class="author_bio">
            <?php $author_meta = get_the_author_meta('description');
            echo '<p>'.esc_attr($author_meta).'</p>'; ?>
        </div>
    </div>
</div>