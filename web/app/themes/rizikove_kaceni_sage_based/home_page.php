<?php
/** Template Name: Home Page */
use rk\frontend_helper\FrontendHelper;

?>

<div id="home-page" class="content-area">
    <div id="content" class="site-content container" role="main">
        <?php $index_pages = array(
            36 => __('Risk Felling', 'sage'),
            38 => __('Pruning trees', 'sage'),
            40 => __('Directional felling', 'sage'),
            42 => __('Forklift trim', 'sage')
        );
        ?>

            <div id="home-page-carousel" class="carousel slide" data-ride="carousel">
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <?php $i = 0 ?>
                    <?php foreach($index_pages as $page_id => $title) : ?>
                        <?php
                            $active = $i++ == 0 ? 'active': null;
                            $page_url = get_page_link($page_id);
                        ?>
                        <div class="item <?php echo $active ?>">
                            <a href="<?php echo $page_url?>">
                                <?php //$page = get_post($page_id) ?>
                                <?php echo FrontendHelper::get_thumbnail_image_by_device($page_id)?>
                                <div class="item__bottom-title">
                                    <h1><?php echo $title ?></h1>
                                    <a class="item__bottom-title--link" href="<?php echo $page_url ?>">
                                        <div class="more-info"><p><?php _e('More info', 'sage') ?></p><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></div>
                                    </a>
                                </div>
                            </a>
                        </div>
                    <?php endforeach ?>
                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#home-page-carousel" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#home-page-carousel" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        <div class="home-page-post">
            <?php
                if (have_posts()){
                    echo FrontendHelper::add_icon_to_list_item($post->post_content);
                }
            ?>
        </div>

    </div><!-- #content -->
</div><!-- #primary -->

