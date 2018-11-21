<?php
    if (is_ie() && get_browser_version() <= 8){
        // Redirect if browser is lte IE8
        $post = Timber::get_post();
        if ($post->slug != 'no-support'){
            header('location: '. $_SERVER['SERVER_URI'] .'/no-support');
        }
    }
?>

<header class="banner" role="banner">
        <?php $home_on_mobile = (is_mobile() && is_front_page() && !is_tablet()) ?>
        <nav role="navigation" class="navbar navbar-inverse ">
              <div class="container-fluid">
                  <?php if (!$home_on_mobile && !is_tablet() && !is_desktop()) : ?>
                      <button type="button" class="collapsed menu-logo clearfix" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                      </button>
                      <h1 class="mobile-menu-title"><?php bloginfo('title')?></h1>
                  <?php else : ?>
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                  </button>
                  <?php endif ?>
                  <?php
                     define('THEME_IS_RESPONSIVE', true); // needs to be defined for BootstrapNavWalker class
                     if (has_nav_menu('primary_navigation')){
                        wp_nav_menu([
                            'theme_location'    => 'primary_navigation',
                            'menu_class'        => 'main-menu nav navbar-nav',
                            'container'         => 'div',
                            'container_class'   => 'collapse navbar-collapse main-menu-container',
                            'container_id'      => 'bs-example-navbar-collapse-1'
                        ]);
                     }
                  ?>
              </div>
        </nav>
        <div class="header-image <?php if (!$home_on_mobile && !is_desktop() && !is_tablet()) echo 'hide-header'; ?>">
            <?php if ($home_on_mobile || is_tablet()) : ?>
                <div class="mobile">
                    <div class="site-logo-title-wrap">
                        <div class="site-logo"></div>
                        <h1 class="site-title"><?php bloginfo('title') ?></h1>
                    </div>
                    <h2 class="site-description"><?php bloginfo('description') ?></h2>
                </div>
            <?php elseif (is_mobile()) : ?>

            <?php else : ?>
                <div class="desktop">
                    <div class="site-logo-title-wrap">
                        <div class="title-background">
                            <div class="title-description-wrap">
                                <div class="site-logo"></div>
                                <h1 class="site-title"><?php bloginfo('title') ?></h1>
                                <h2 class="site-description"><?php bloginfo('description') ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif ?>
        <div>

</header>

<!--    <a class="brand" href="--><?//= esc_url(home_url('/')); ?><!--">--><?php //bloginfo('name'); ?><!--</a>-->
