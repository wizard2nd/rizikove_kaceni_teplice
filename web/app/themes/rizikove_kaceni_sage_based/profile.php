<?php
/** Template Name: Profile */
use rk\frontend_helper\FrontendHelper;
use rk\helpers\CarouselHelper;

?>

<div id="profile-page" class="content-area profile-page">
    <div id="content" class="site-content container" role="main">

        <div class="profile-post">
            <?php
            if (have_posts()){
                echo FrontendHelper::add_icon_to_list_item($post->post_content);
            }
            ?>

            <?php
                $featured_images = get_fields();
                //var_dump($featured_images);
                $slider_images = [];
            ?>
            <ul class="slider-images">
                <?php foreach ($featured_images as $title => $fe_img_id) : ?>
                    <?php if (preg_match('/feature/', $title)) : ?>
                        <?php unset($featured_images[$title])?>
                        <?php $slider_image = wp_get_attachment_image( $fe_img_id, 'mobile'); ?>
                        <?php $slider_images[] = $slider_image; ?>
                        <li class="slider-images__image"><a href="profile-carousel" class="slide-image modal-open"><?php print $slider_image; ?></a></li>
                    <?php endif ?>
                <?php endforeach ?>
            </ul>
            <?php
                $profile_carousel = new CarouselHelper('profile-carousel', $slider_images);
                $profile_carousel->render();
            ?>
            <div id="certificates" class="certificates">
                <h1><?php _e('Certificates', 'sage')?></h1>
                <ul  class="certificates__list">
                    <?php foreach($featured_images as $title => $img_id) : ?>
                        <?php

                            $titles = [
                                'arbor'     => __('Arboriculture', 'sage'),
                                'hgw'       => __('Height ground work', 'sage'),
                                'insurance' => __('Insurance', 'sage')
                            ];

                            switch($title){
                                case 'arboriculture_certifikate': $title = $titles['arbor'];
                                    break;
                                case 'high_ground_work_cert': $title = $titles['hgw'];
                                    break;
                                case 'insurance_contract': $title = $titles['insurance'];

                            }

                            $certificate = wp_get_attachment_image($img_id, 'cert-desktop', false, array('id' => $title));
                        ?>
                        <li class="certificates__list--single">
                            <h3 class="cert-title"><?php echo $title?></h3>
                            <a href="<?php echo $title?>" class="slide-image modal-open"><?php print $certificate; ?></a>
                        </li>
                    <?php endforeach?>
                </ul>
            </div>
            <div class="modal-wrap">
                <span id="close-modal" class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                <div class="modal-wrap__controls">
                    <div class="rk-modal-content"><div>
                </div>
            </div>
        </div>
    </div><!-- #content -->
</div><!-- #primary -->