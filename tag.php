<!DOCTYPE html>
<html <?php echo language_attributes(); ?>>


<?php if (get_header()) ?>



<section>
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <p class="lead">
                    Articles avec l'étiquette :  <?php the_tags(''); ?>
                </p>
            </div>
        </div>


        <?php if (have_posts()): ?>
            <?php  while(have_posts()): the_post();
                get_template_part('content');
            endwhile; ?>

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