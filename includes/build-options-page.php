<?php
function mb_build_option_page(){

    $theme_opts = get_option('mb_opts');
?>

    <div class="wrap">
        <div class="container">

            <?php
                if(isset($_GET['status']) && $_GET['status']==1){
                        echo '<div class="alert-success">Mise à jour éffectuées avec succès</div>';
                }
            ?>

            <div class="jumbotron">
                <h1> paramètres</h1>
            </div>
            <form id="form-mb-options" action="admin-post.php" method="post" class="form-horizontal" >
                <input type="hidden" name="action" value="mb_save_options">
                <?php wp_nonce_field('mb_options_verify'); ?>

                <div class="clo-md-12">
                    <h1> image du logo</h1>
                    <div class="row">
                        <div class="col-md-4">
                            <img src="<?php echo $theme_opts['image_01_url']; ?>" alt="" class="" id="img_preview_01">
                        </div>
                        <div class="col-md-4">
                            <button id="btn_img_01" class="btn btn-primary btn-select-img">Choisir une image pour le logo</button>
                        </div>
                        <div class="col-md-4">
                            <input type="text" id="mb_image_01" name="mb_image_01" value="<?php echo $theme_opts['image_01_url']; ?>" disabled/>
                            <input type="hidden" id="mb_image_url_01" name="mb_image_url_01" value="<?php echo $theme_opts['image_01_url']; ?>"/>
                        </div>
                    </div>
                </div>


                <div class="col-md-12">
                    <div class="form-group">
                        <label for="mb_legend_01" class="control-label col-md-2">légende</label>
                        <div class="col-md-10">
                            <input type="text" id="mb_legend_01" name="mb_legend_01" value="<?php echo $theme_opts['legend_01']; ?>" class="mb-width-100">
                        </div>
                    </div>
                </div>


                <div>
                    <button id=" validator" type="submit" class="btn btn-success btn-lg">Enregistrer</button>
                </div>
            </form>

        </div>
    </div>




<?php
}// fin de mb_build_option_page()
