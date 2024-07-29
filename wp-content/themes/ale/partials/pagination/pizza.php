<?php if(get_previous_posts_link() || get_next_posts_link()){ ?>
    <div class="ale_pagination">
        <div class="all_pages">
            <?php ale_page_links(); ?>
        </div>
    </div>
<?php } ?>