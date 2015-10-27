<?php
/** Template Name: References */



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
    </div><!-- #content -->
</div><!-- #primary -->