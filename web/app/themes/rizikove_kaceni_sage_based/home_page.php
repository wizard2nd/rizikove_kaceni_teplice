<?php
/** Template Name: Home Page */
use rk\FrontendHelper;

?>

<div id="home-page" class="content-area">
    <div id="content" class="site-content container home-page" role="main">
        <?php $index_pages = array(
            36 => __('Risk Felling', 'sage'),
            38 => __('Pruning trees', 'sage'),
            40 => __('Directional felling', 'sage'),
            42 => __('Forklift trim', 'sage')
        );
        ?>

            <div id="home-page-carousel" class="carousel slide" data-ride="carousel" data-interval="4000" data-pause="hover">
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <?php $i = 0 ?>
                    <?php foreach($index_pages as $page_id => $title) : ?>
                        <?php
                            $active = $i++ == 0 ? 'active': null;
                            $page_url = get_page_link($page_id);
                            $long_title = strlen($title) > 20 ? 'long-title' : null;
                        ?>
                        <div class="item <?php echo $active ?>">
                            <a href="<?php echo $page_url?>">
                                <?php //$page = get_post($page_id) ?>
                                <?php echo FrontendHelper::get_thumbnail_image_by_device($page_id)?>
                                <a class="bottom-title <?= $long_title?>" href="<?php echo $page_url ?>">
                                    <h1><?php echo $title ?></h1>
                                    <div class="more-info"><span class="more-info__text"><? _e('More info', 'sage')?></span><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></div>
                                </a>
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

