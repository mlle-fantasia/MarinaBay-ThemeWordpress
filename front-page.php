<!DOCTYPE html>
<html <?php echo language_attributes(); ?>>


<?php get_header(); ?>

<?php
    $args= array(
            'post_type' => 'post',
            'posts_per_page' => 3
    );
    $my_query = new WP_Query($args);
?>


<?php if ( $my_query ->have_posts() ): ?>
    <section id="font-last-posts">
        <div class="container">
           <div class="row">

               <?php while($my_query ->have_posts()): $my_query ->the_post() ?>
                   <div class="col-md-4">
                       <div class="panel panel-default">
                           <div class="panel-heading">
                               <h2><?php the_title(); ?></h2>
                           </div>
                           <div class="panel-body">

                               <?php the_post_thumbnail('medium', array('class'=>'mb-width-100')) ?>

<!--                               <img src="--><?php //echo get_template_directory_uri(); ?><!--/assets/logo.jpg" alt="img" class="mb-width-100">-->
                               <?php the_excerpt(); ?>
                           </div>
                           <div class="panel-footer">
                               <?php  echo mb_get_meta_date_cat(esc_attr(get_the_date('c')), esc_html(get_the_date()), get_the_category_list(', '), get_the_tag_list('', ', ') ); ?>
                           </div>
                       </div>
                   </div>
               <?php endwhile; ?>

           </div>
        </div><!-- /container -->
    </section>

<?php endif;
wp_reset_postdata();
?>


<section>
    <div class="container">
        <?php if (have_posts()):
            while(have_posts()): the_post(); ?>
                <div class="row">
                    <div class="col-md-12">

                        <?php the_title('<h1>', '</h1>'); the_content(); ?>
                    </div>
                </div>
           <?php endwhile; ?>

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


<?php get_footer(); ?>

</body>
</html>