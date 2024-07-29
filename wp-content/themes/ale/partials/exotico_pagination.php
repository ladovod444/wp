<?php if(ale_show_posts_nav()){ ?>
    <div class="pagination_exotico">
        <nav class="exotico-wrap-pagination wrap-pagibation_blogs">
            <div class="pagination__side pagination__side_prev">
                <?php if(get_previous_posts_link()) { echo get_previous_posts_link(esc_html__('Prev','ale')); }
                else { echo '<span>'.esc_html__("Prev","ale").'</span>'; } ?>
            </div>
            <div class="pagination__side pagination__side_next">
                <?php if(get_next_posts_link()){echo  get_next_posts_link(esc_html__('Next','ale'));}
                else { echo '<span>'.esc_html__("Next","ale").'</span>'; } ?>
            </div>
            <?php echo paginate_links(array(
                'prev_next'=>false,
                'type'=>'list'
            )); ?>
        </nav>
    </div>
<?php } ?>

