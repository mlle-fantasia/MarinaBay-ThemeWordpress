<footer>
    <div class="container">
        <div class="row">
           <?php
               if(is_active_sidebar('widgetized-footer')):
               dynamic_sidebar('widgetized-footer');
               else:
           ?>
                <p class="mb-text-center">Theme Marina Bay créé pour Wordpress</p>

           <?php endif; ?>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
