<?php
/** Template Name: Services */
use rk\frontend_helper\FrontendHelper;
use rk\helpers\CarouselHelper;

?>

<div id="profile-page" class="content-area profile-page">
    <div id="content" class="site-content container profile-post" role="main">
        <div class="row">
            <div class="services-navigation">
                <div class="services-navigation__felling">
                    <h2><?php _e('Tree felling', 'sage')?></h2>
                </div>
                <div class="services-navigation__cms-content">
                    <?php
                        if(have_posts()){
                            echo FrontendHelper::add_icon_to_list_item($post->post_content);
                        }
                    ?>
                </div>
            </div>
            <div class="col-md-8">
                content
            </div>
        </div>
    </div><!-- #content -->
</div><!-- #primary -->