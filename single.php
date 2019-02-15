<!DOCTYPE html>
<html <?php echo language_attributes(); ?>>

<?php if (get_header()) ?>


<section>
    <div class="container">
        <?php if (have_posts()): ?>
            <?php  while(have_posts()): the_post(); ?>

                <div class="row">
                    <div class="col-md-12">

                        <h1><?php the_title() ?></h1>
                        <p>
                            <?php
                                echo mb_get_meta_date_cat(  esc_attr(get_the_date('c')), //récupère la date au format iso
                                                            esc_html(get_the_date()),      //récupère la date au format demandé dans wp
                                                            get_the_category_list(', '), //récupère la liste des cat de l'article sous forme de lien
                                                            get_the_tag_list('', ', '));  //récupère la liste des tag de l'article sous forme de lien
                            ?>
                        </p>

                        <?php
                        if($thumbnail_html = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large')):
                            $thumbnail_src = $thumbnail_html[0];
                            ?>
                            <img src="<?php echo $thumbnail_src ?>" alt="image principale de l'article" class="img_100">
                        <?php endif; ?>

                        <p>
                            <?php the_content() ?>
                        </p>
                    </div>
                </div><!-- /row -->
            <?php endwhile; ?>

            <div class="row">
                <div class="col-md-12">
                    <nav>
                        <ul class="marinabay-pager">
                            <li class="float-left"><?php previous_post_link(); ?></li>
                            <li class="float-right"><?php next_post_link(); ?></li>
                        </ul>
                    </nav>
                </div>
            </div>



        <?php else:?>
            <div class="row">
                <div class="col-md-12">
                    <p>
                        pas d'articles ici
                    </p>
                </div>
            </div>
        <?php endif; ?>
    </div><!-- /container -->
</section>

<?php if (get_footer()) ?>

</body>
</html>