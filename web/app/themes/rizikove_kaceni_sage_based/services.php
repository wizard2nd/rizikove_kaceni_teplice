<?php
/** Template Name: Services */
use rk\frontend_helper\FrontendHelper;
use rk\helpers\CarouselHelper;

?>

<div id="service-page" class="content-area service-page">
    <div id="content" class="site-content container" role="main">
        <div class="row">
            <div class="services-navigation">
                <div class="services-navigation__felling">
                    <h2><?php _e('Tree felling', 'sage')?></h2>
                    <ul class="services-links">
                        <?php $dynamic_nav = [36, 38, 40, 42]; ?>
                        <?php foreach ($dynamic_nav as $post_id) : ?>
                            <?php
                                $post_in_link = get_post($post_id);
                                $post_perm_link = get_permalink($post_id);
                            ?>
                            <li><a href="<?php echo $post_perm_link?>"><?php _e($post_in_link->post_title, 'sage') ?></a></li>
                        <?php endforeach ?>
                    </ul>
                </div>
                <div class="services-navigation__cms-content">
                    <?php
                    $service_list = get_post(27);
                    _e(FrontendHelper::add_icon_to_list_item($service_list->post_content));
                    ?>

                </div>
            </div>
            <div class="service-content">
                <?php if (have_posts()) : ?>
                    <?php
                        global $post;
                        $post_id = $post->ID;
                        $post = $post_id == 27 ? get_post(36): $post;
                        $attachment_img = FrontendHelper::get_thumbnail_image_by_device($post->ID);
                    ?>
                    <?php // TODO: Add class to title to change font-size for bigger titles ?>
                    <h1 class="<?php echo $post->post_name?>"><?php _e($post->post_title, 'sage') ?></h1>
                    <?php echo $attachment_img ?>
                    <p class="service-content__description"><?php _e($post->post_content, 'sage') ?></p>

                    <?php
                    $custom_images = get_fields($post->ID);
                    $featured_images = FrontendHelper::get_featured_images($custom_images);
                    FrontendHelper::render_featured_images($featured_images, 'mobile');
                    ?>

                <?php endif ?>
            </div>
        </div>
    </div><!-- #content -->
</div><!-- #primary -->