<?php
/** Template Name: Contact */

use \rk\contact\Contact;

?>

<div id="contact-page" class="content-area contact-page">
    <div id="content" class="site-content container" role="main">
        <div class="row">
            <div class="address-area">
                <h1 class="title-bottom-border"><?php _e('Address', 'sage')?></h1>
                <?php
                $address = new Contact();

                $address->render_address();
                $address->render_contact();
                ?>
                <div class="map-image">
                    <?php echo $address->get_map() ?>
                </div>
            </div>
            <div class="contact-form">
                <h1 class="title-bottom-border"><?php _e('Use this form to contact provider instantly')?></h1>
                <?php
                if ( have_posts() ) {
                    while ( have_posts() ) {
                        the_post();
                        the_content();
                    } // end while
                } // end if
                ?>
            </div>
        </div>

    </div><!-- #content -->
</div><!-- #primary -->