<?php

function mb_save_options(){

    if(!current_user_can('publish_pages')){
        wp_die('vous n\'êtes pas autorisé à éffectuer cette oppération');
    }
    check_admin_referer('mb_options_verify');

    $opts = get_option('mb_opts');

    //sauvegarde légende
    $opts['legend_01'] = sanitize_text_field($_POST["mb_legend_01"]);

    //sauvegarde image
    $opts['image_01_url'] = sanitize_text_field($_POST["mb_image_url_01"]);

    update_option('mb_opts', $opts);

    wp_redirect(admin_url('admin.php?page=mb_theme_opts&status=1'));
    exit;

} // fin de la function mb_save_options()