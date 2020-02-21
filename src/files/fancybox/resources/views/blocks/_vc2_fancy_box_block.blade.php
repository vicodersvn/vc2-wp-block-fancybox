<?php
    $id = 'fancybox-' . $block['id'];
    if( !empty($block['anchor']) ) {
        $id = $block['anchor'];
    }

    // Create class attribute allowing for custom "className" and "align" values.
    $className = 'fancybox';
    if( !empty($block['className']) ) {
        $className .= ' ' . $block['className'];
    }
    if( !empty($block['align']) ) {
        $className .= ' align' . $block['align'];
    }
    if( $is_preview ) {
        $className .= ' is-admin';
    }

    $vc_column = get_field('vc_column');
?>
    <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
        <?php if( have_rows('fancy_items') ): ?>
            <div class="fancy-items fancy-row row">
                <?php while( have_rows('fancy_items') ): the_row(); 
                    $fancy_title = get_sub_field('fancy_title');
                    $fancy_description = get_sub_field('fancy_description');
                    $fancy_button_link = get_sub_field('fancy_button_link') ? get_sub_field('fancy_button_link') : '#' ;
                    $fancy_button_text = get_sub_field('fancy_button_text');
                ?>
                    <div class="fancy-item vc-col-<?php echo $vc_column; ?>">  
                        <div class="fancy-content">
                            <?php if (!empty($fancy_title) ): ?>
                                <h3 class="fancy-title"> <?php echo $fancy_title; ?> </h3>
                            <?php endif ?>
                            <?php if (!empty($fancy_description)): ?>
                                <div class="fancy-description">
                                    <?php echo $fancy_description; ?>
                                </div>
                            <?php endif ?>
                            <?php if (!empty($fancy_button_text)): ?>
                                <a class="fancy-button" href="<?php echo $fancy_button_link; ?>">
                                    <?php echo $fancy_button_text; ?>
                                </a>
                            <?php endif ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <p>Please add some box.</p>
        <?php endif; ?>
    </div>
<?php    