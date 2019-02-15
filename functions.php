<?php

//==================================================
// ===========   chargement des scripts
//==================================================

define('MB_VERSION','1.0.0');

// ajout ses styles et des script dans mon thème
function mb_scripts(){
    wp_enqueue_style('mb_bootstrap', get_template_directory_uri().'/css/bootstrap.min.css', array(), 'MB_VERSION', 'all');

    wp_enqueue_style('mb_custom', get_template_directory_uri().'/style.css', array('mb_bootstrap'), 'MB_VERSION', 'all');

    wp_enqueue_script('mb_bootstrap_js', get_template_directory_uri().'/js/bootstrap.min.js', array('jquery'), 'MB_VERSION', true);

    wp_enqueue_script('mb_custom_js', get_template_directory_uri().'/js/marinabay.js', array('jquery', 'mb_bootstrap_js'), 'MB_VERSION', true);
}

add_action('wp_enqueue_scripts', 'mb_scripts');



// Ajout ses styles et script dans l'administration de wp
//======================================================================

function mb_admin_init()
{

    //action 1 : ajout de bootstrap
    function mb_admin_scripts()
    {
        if (!isset($_GET['page']) || $_GET['page'] != "mb_theme_opts") {
            return;
        }
        wp_enqueue_style('mb_admin_bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), 'MB_VERSION', 'all');

        //chargement des script admin
        wp_enqueue_media();
        wp_enqueue_script('mb-admin-int', get_template_directory_uri() . '/js/admin-options.js', array(), MB_VERSION, true);

    }
    add_action('admin_enqueue_scripts', 'mb_admin_scripts');

    //action 2 : ajout options
    include('includes/save_options-page.php'); //contient a fonction mb_save_options
    add_action('admin_post_mb_save_options', 'mb_save_options');
}

add_action('admin_init', 'mb_admin_init');


//==================================================
// ===========   utilitaires
//==================================================

function mb_setup(){

    //permet d'ajouter un image a la une sur les articles
    add_theme_support('post-thumbnails');

    //enlèle le génératuer de version
    remove_action('wp_head', 'wp_generator');

    //enlever les guillemets à la française
    //remove_filter('the_content', 'wptexturize');

    // ajoute le titre
    add_theme_support('title-tag');

    //lier le menu wp avec la structure bootstrap
    require_once('includes/class-wp-bootstrap-navwalker.php');

    //active menu
    register_nav_menus(array('primary'=> 'principal'));
}

add_action('after_setup_theme', 'mb_setup' );


//=================================================================
// ===========   ajoute un taille medium large dans la selection des images
//=================================================================

function my_image_size($sizes){
    $addsizes = array(
        "medium_large" => "Medium Large"
    );
    $newsizes = array_merge($sizes, $addsizes);
    return $newsizes;
}

add_filter('image_size_names_choose', 'my_image_size' );


//=================================================================
// ===========  activation d'option
//=================================================================

function mb_activ_options(){

    $theme_opt = get_option('mb_opts');
    if(!$theme_opt){
        $opts = array(
            'image_01_url' =>'',
            'legend_01' => ''
        );
        add_action('mb_opts', $opts);
    }
}

add_action('after_switch_theme', 'mb_activ_options');


//=================================================================
// ===========  ajouter l'option de menu dans l'administration
//=================================================================

function mb_admin_menu(){

    add_menu_page(
        'marinabay Option',
        'options du theme',
        'publish_pages',
        'mb_theme_opts',
        'mb_build_option_page'
    );

    include('includes/build-options-page.php');
}

add_action('admin_menu', 'mb_admin_menu');


//=================================================================
// ===========  ajouter l'option des widgets dans l'administration
//=================================================================

function mb_admin_widget() {
    register_sidebar(array(
        'name'          =>'Footer Widget Zone',
        'description'   =>'widget affichés dans le footer : 4 au maximum',
        'id'            =>'widgetized-footer',
        'before_widget' =>'<div id="%1$s" class="col-md-3 col-sm-6 %2$s" ><div class="inside-widget"> ',
        'after_widget'  =>'</div></div>',
        'before_title'  =>'<h2 class=""> ',
        'after_title'   =>'</h2>'
    ));

}
add_action('widgets_init', 'mb_admin_widget');




//=================================================================
//=================================================================
//============      Fonctions d'affichage
//=================================================================
//=================================================================


//=================================================================
// ===========   affichage de la date et des catégories
//=================================================================

function mb_get_meta_date_cat($date1, $date2, $cat, $tags){

    $chaine = 'publié le <time class="entry-date" datetime="';
    $chaine .= $date1;
    $chaine .= '">';
    $chaine .= $date2;
    $chaine .= '</time> dans la catégorie : ';
    $chaine .= $cat;
    if(strlen($tags)>0):
        $chaine .= ' avec les étiquettes : '.$tags;
    endif;
    return $chaine;
}

//=================================================================
// ===========   modifie le texte de suite de l'excerpt
//=================================================================

function mb_excerpt_more($more){
    return'<a class="more-link" href="'.get_permalink().'">' .' [lire la suite]'.'</a>';
}

add_filter('excerpt_more','mb_excerpt_more' );



//=================================================================
// ===========  ajouter pagination
//=================================================================

function mb_pagination()
{
    global $wp_query;
    $big = 999999999; // need an unlikely intege
    $total_page = $wp_query->max_num_pages;

    if ($total_page > 1): ?>
        <div class="col-md-12 mb-pagination">
            <?php echo paginate_links(array(
                'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                'format' => '?paged=%#%',
                'current' => max(1, get_query_var('paged')),
                'total' => $total_page,
                'prev_next' => true,
                'prev_text' => '<- Page pécédente ',
                'next_text' => ' Page suivante ->',
            )); ?>
        </div>
    <?php endif;
}