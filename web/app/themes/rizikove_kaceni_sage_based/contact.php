<?php
/** Template Name: Contact */

use \rk\contact\Contact;

?>

<div id="contact-page" class="content-area contact-page">
    <div id="content" class="site-content container" role="main">
        <h1>Contact</h1>
        <?php

        $address = new Contact();

        $address->render_address();
        $address->render_contact();

        ?>
    </div><!-- #content -->
</div><!-- #primary -->