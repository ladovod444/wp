<div class="wrapper content_wrapper">
        <?php 
        $alekids_blog_grid = ['featured_image' => 'post-smallimage','post_class'=>'smallpost', 'exist_sticky' => ''];
        $i=1;

        if (have_posts()) {
            echo '<div class="posts_grid">';
            while (have_posts()) : the_post(); 

                if($i == 4){
                    $alekids_blog_grid['featured_image'] = 'post-bigimage';
                    $alekids_blog_grid['post_class'] = 'bigpost';
                } else {
                    $alekids_blog_grid['featured_image'] = 'post-smallimage';
                    $alekids_blog_grid['post_class'] = 'smallpost';
                }

                //Change grid if sticky post exist.
                $alekids_sticky_post_ids = array();
                $alekids_sticky_post_ids = get_option( 'sticky_posts' );
                
                foreach($alekids_sticky_post_ids as $sticky_id){
                    if($sticky_id == get_the_ID()){
                        $alekids_blog_grid['exist_sticky'] = '1';
                    }
                }
                
                get_template_part('partials/blog/preview/mimi','',$alekids_blog_grid);
                $i++;
            endwhile;
            echo '</div>';

            get_template_part('partials/pagination/mimi');
        }  else {
            get_template_part('partials/notfound');
        } ?>
    </div>