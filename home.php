<!DOCTYPE html>
<html <?php echo language_attributes(); ?>>

<?php if (get_header()) ?>



<section>
    <div class="container">
        <?php if (have_posts()):
            while(have_posts()): the_post();

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

        <div class="row">
            <?php mb_pagination() ?>
        </div>
    </div><!-- /container -->
</section>

<?php if (get_footer()) ?>

</body>
</html>