<div class="row">
    <div class="col-md-2">
        <?php
        if($thumbnail_html = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'thumbnail')):
            $thumbnail_src = $thumbnail_html[0];
            ?>
            <a href="<?php the_permalink(); ?>"><img src="<?php echo $thumbnail_src ?>" alt="vignette de l'article" class="img-responsive img-thumbnail"></a>
        <?php endif; ?>
    </div>
    <div class="col-md-10">
        <h1><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h1>

        <p>
            <?php
                echo mb_get_meta_date_cat(esc_attr(get_the_date('c')), esc_html(get_the_date()), get_the_category_list(', '), get_the_tag_list('', ', ') );
            ?>
        </p>

        <p>
            <?php the_excerpt() ?>
        </p>
    </div>
</div><!-- /row -->