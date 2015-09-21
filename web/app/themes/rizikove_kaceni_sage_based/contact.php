<?php
/** Template Name: Contact */

use \rk\contact\Contact;

?>

<div id="contact-page" class="content-area contact-page">
    <div id="content" class="site-content container" role="main">
        <div class="address-area">
        <?php
        $address = new Contact();

        $address->render_address();
        $address->render_contact();

        ?>
        </div>
        <div class="map-image">
            <?php echo $address->get_map()?>
        </div>
        <div class="contact-form">
            <?php
            if ( have_posts() ) {
                while ( have_posts() ) {
                    the_post();
                    the_content();
                } // end while
            } // end if
            ?>
        </div>
    </div><!-- #content -->
</div><!-- #primary -->