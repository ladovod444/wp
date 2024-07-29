<?php $images = get_post_meta($post->ID, 'ale_gallery_id', true);
if ( $images ){
    if(ALETHEME_DESIGN_STYLE == 'keira'){

        wp_enqueue_script( 'slick' );

        ?>
        <div class="keira_single_post_images_slider">
            <?php foreach ( $images as $attachment ) { ?>
                <div>
                    <?php echo wp_get_attachment_image( $attachment, 'post-squarelarge' ); ?>
                </div>
            <?php } ?>
        </div>
    <?php } else if(ALETHEME_DESIGN_STYLE == 'bebe'){?>
        <div id="bebe-gallery-slider">
            <ul class="slides">
            <?php foreach ( $images as $attachment ) { ?>
                <li>
                    <?php echo wp_get_attachment_image( $attachment, 'bebe-slider' ); ?>
                </li>
            <?php } ?>
            </ul>
        </div>
    <?php } else { ?>
        <div class="single_post_images_slider">
            <ul class="slides">
                <?php foreach ( $images as $attachment ) { ?>
                    <li>
                        <?php echo wp_get_attachment_image( $attachment, 'full' ); ?>
                    </li>
                <?php } ?>
            </ul>
        </div>
    <?php } ?>
<?php } ?>