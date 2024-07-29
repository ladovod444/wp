<?php
$hover_id = '1';
if(ale_get_option('work_hover')){
	$hover_id = ale_get_option('work_hover');
}
if(ale_get_option('work_hover')=='10'){
    get_template_part('partials/hover/style_'.esc_attr($hover_id));
} else {?>
    <article <?php post_class('grid-item'); ?> id="post-<?php the_ID()?>" data-post-id="<?php the_ID()?>">
        <div class="work_item_gutter">
            <?php
            //Display the selected hover thumbnail
            get_template_part('partials/hover/style_'.esc_attr($hover_id));
            ?>
            <?php if(ale_get_option('work_hover') !== '6'){ ?>
                <?php if(ale_get_option('item_style') == '2') {?>
                    <div class="title_with_icon">
                        <h2 class="work_title aspect_color font_one"><a href="<?php echo esc_url(the_permalink()); ?>" title="<?php echo esc_attr(get_the_title()); ?>"><?php the_title(); ?></a></h2>

                        <?php $type_terms = get_the_terms( get_the_ID(), "work-category" );
                        wp_enqueue_script( 'ale-appear' );

                        if(!empty($type_terms)){
                            foreach($type_terms as $term){
                                $type_id = $term->term_id;
                                $ale_term_data = get_option("tax_meta_$type_id");

                                if(isset($ale_term_data['ale_image_field_id'])){
                                    echo '<span class="category_icon"><img src="'.esc_url($ale_term_data['ale_image_field_id']['url']).'" alt="'.esc_attr(get_the_title()).'" /></span>';
                                }
                                break;
                            }
                        } ?>
                    </div>
                <?php }
                if(ale_get_option('item_style') == '5'){ ?>
                    <h2 class="work_title font_one jade_work_title"><a href="<?php echo esc_url(the_permalink()); ?>" title="<?php echo esc_attr(get_the_title()); ?>"><?php the_title(); ?></a></h2>
                <?php }
                if(ale_get_option('item_style') == '3'){ ?>
                    <div class="title_with_cat">
                        <h2 class="work_title aspect_color font_one"><a href="<?php echo esc_url(the_permalink()); ?>" title="<?php echo esc_attr(get_the_title()); ?>"><?php the_title(); ?></a></h2>

                        <?php $type_terms = get_the_terms( get_the_ID(), "work-category" );
                        if(!empty($type_terms)){
                            foreach($type_terms as $term){
                                if(isset($term->name)){
                                    echo '<span class="category">'.esc_attr($term->name).'</span>';
                                } break;
                            }
                        } ?>
                    </div>
                <?php } if(ale_get_option('item_style') == '4'){ ?>
                    <div class="hover_title_category">
                        <h2 class="work_title font_two"><a href="<?php echo esc_url(the_permalink()); ?>" title="<?php echo esc_attr(get_the_title()); ?>"><?php the_title(); ?></a></h2>
                        <?php $type_terms = get_the_terms( get_the_ID(), "work-category" );
                        if(!empty($type_terms)){
                            foreach($type_terms as $term){
                                if(isset($term->name)){
                                    echo '<span class="category">'.esc_attr($term->name).'</span>';
                                } break;
                            }
                        } ?>
                    </div>
                <?php }?>
            <?php } ?>
        </div>
    </article>
<?php } ?>
