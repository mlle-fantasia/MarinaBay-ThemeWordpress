    <head>
        <meta <?php echo bloginfo('charset'); ?>>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <?php if(is_home()): ?>
            <meta name="description" content="page des articles du blog" >
        <?php endif; ?>

        <?php if(is_front_page()): ?>
            <meta name="description" content="page d'accueil du site" >
        <?php endif; ?>

        <?php if(is_page() && !is_front_page() ): ?>
            <meta name="description" content="page aussi la page d'accueil" >
        <?php endif; ?>

        <?php if(is_category()): ?>
            <meta name="description" content="page des categories : <?php echo single_cat_title('', false); ?> " >
        <?php endif; ?>

        <?php if(is_tag()): ?>
            <meta name="description" content="page des tag :  <?php echo single_tag_title('', false); ?> " >
        <?php endif; ?>



        <?php wp_head(); ?>
    </head>
<body>
    <header>
        <div class="container">
            <?php $theme_opts = get_option('mb_opts'); ?>
            <div class="row">
                <div class="margin-auto">
                    <a href="/"><img src="<?php echo $theme_opts['image_01_url']; ?>" alt="<?php echo $theme_opts['legend_01']; ?>"></a>
                </div>
            </div>
            <!--            <h1>Welcome to Marina Bay</h1>-->
        </div>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light d-flex justify-content-center">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <?php
                wp_nav_menu(array(
                    'menu'               => 'top-menu', // 'top-menu' est le nom que l'on donne a notre menu
                    'theme_location'     => 'primary', // 'primary' correspond à ce qu'oon a écrit dans register_nav_menus() dans functions.php
                    'depth'              => 2,
                    'container'          => 'div',
                    'container_class'    => 'collapse navbar-collapse d-flex justify-content-center',
                    'container_id'       => 'navbarSupportedContent',
                    'menu_class'         => 'navbar-nav ',
                    'fallback_cb'        => 'wp_bootstrap_navwalker::fallback',
                    'walker'             => new wp_bootstrap_navwalker()
                ));
                ?>

            </nav>
        </div>
    </header>


