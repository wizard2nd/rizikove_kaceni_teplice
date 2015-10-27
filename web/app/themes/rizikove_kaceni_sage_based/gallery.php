<?php
/** Template Name: Gallery */



?>

<div id="contact-page" class="content-area contact-page">
    <div id="content" class="site-content container" role="main">

        <?php
            if (have_posts()){
                while (have_posts()){
                    the_post();
                    the_content();
                }
            }
        ?>
        <div id="slider-modal-wrap" class="hide-slider slider-modal-wrap" data-get-attachment-images="get_gallery_attachments_images">
            <div id="close-modal">
                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
            </div>
            <img class="loader" src="<?php echo get_stylesheet_directory_uri().'/dist/styles/images/spinner.gif'?>"/>
            <div class="slider-wrap invisible">
                <ul class="bx-slider"></ul>
                <div class="slider-wrap__controls">
                    <div id="prev-slide" class="control">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    </div>
                    <div id="next-slide" class="control">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- #content -->
</div><!-- #primary -->