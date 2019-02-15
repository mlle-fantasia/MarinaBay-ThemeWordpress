jQuery(document).ready(function($){

    //************* ajout image dans page **************

    var frame = wp.media({
        title: 'selectionner une image',
        button: {
            text: 'Utiliser ce média'
        },
        multiple: false
    });

    $("#form-mb-options #btn_img_01").click(function(e){
        e.preventDefault();
        frame.open();
    });

    frame.on( 'select', function() {

        var objImg = frame.state().get('selection').first().toJSON();
        var img_url = objImg.sizes.thumbnail.url;

        $("img#img_preview_01").attr('src', img_url);
        $("input#mb_image_01").attr('value', img_url);
        $("input#mb_image_url_01").attr('value', img_url);
    });

});