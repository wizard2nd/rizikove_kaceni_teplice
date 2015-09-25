<?php
/** Template Name: Galery */



?>

<div id="contact-page" class="content-area contact-page">
    <div id="content" class="site-content container" role="main">
        <div class="modal-wrap-2"></div>
        <?php

            if (have_posts()){
                while (have_posts()){
                    the_post();
                    the_content();
                }
            }
        ?>

    </div><!-- #content -->
</div><!-- #primary -->