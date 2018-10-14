<?php
/** Template Name: Home Page */
use rk\FrontendHelper;

?>

<div id="home-page" class="content-area">
    <div id="content" class="home-page" role="main">
        <?php $index_pages = array(
            36 => __('Risk Felling', 'sage'),
            38 => __('Pruning trees', 'sage'),
            40 => __('Directional felling', 'sage'),
            42 => __('Forklift trim', 'sage')
        );
        ?>
        <section id="service-list" class="service-list">

            <div class="row">
                <?php foreach ($index_pages as $page_id => $title) : ?>
                    <?php $service = get_post($page_id) ?>
                    <div class="col-md-3 service-list__item">
                        <div class="shadow-box">
                            <?php echo FrontendHelper::get_thumbnail_image_by_device($page_id) ?>
                            <div class="service-list__content home-page-content-background">
                                <h2 class="service-list__title"><?= $title ?></h2>
                                <div class="short-description">
                                    <?= wp_trim_words(__($service->post_content, 'sage'), 20, '...') ?>
                                </div>

                                <a href="<?php echo get_page_link($page_id) ?>" class="service-list__more-info">
                                    <span class="more-info__text"><? _e('More info', 'sage') ?></span>
                                    <span class="glyphicon glyphicon-menu-right" aria-hidden="true">
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </section>
        <section class="home-page-post home-page-content-background">
            <?php
            if (have_posts()) {
                echo FrontendHelper::add_icon_to_list_item($post->post_content);
            }
            ?>
        </section>
    </div><!-- #content -->
</div><!-- #primary -->

