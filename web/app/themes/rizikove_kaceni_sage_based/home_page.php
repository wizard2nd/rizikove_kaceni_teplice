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
                    <div class="col-md-3 service-list__item">
                        <?php echo FrontendHelper::get_thumbnail_image_by_device($page_id) ?>
                        <div class="title">
                            <?= $title ?>
                        </div>
                        <div class="short-description">
                            Lorem Ipsum .....
                        </div>

                        <a href="<?php echo get_page_link($page_id) ?>">
                            <div class="more-info">
                                <span class="more-info__text"><? _e('More info', 'sage') ?></span>
                                <span class="glyphicon glyphicon-menu-right" aria-hidden="true">
                            </div>
                        </a>
                    </div>
                <?php endforeach ?>
            </div>

            <div class="home-page-post">
                <?php
                if (have_posts()) {
                    echo FrontendHelper::add_icon_to_list_item($post->post_content);
                }
                ?>
            </div>

        </section>
    </div><!-- #content -->
</div><!-- #primary -->

