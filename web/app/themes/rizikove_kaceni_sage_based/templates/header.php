<header class="banner" role="banner">

        <nav role="navigation" class="navbar navbar-inverse ">
              <div class="container-fluid center-block menu-center">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                  </button>
                     <?php
                        define('THEME_IS_RESPONSIVE', true); // needs to be defined for BootstrapNavWalker class
                        if (has_nav_menu('primary_navigation')){
                            wp_nav_menu([
                                'theme_location'    => 'primary_navigation',
                                'menu_class'        => 'main-menu nav navbar-nav',
                                'container'         => 'div',
                                'container_class'   => 'collapse navbar-collapse main-menu-container',
                                'container_id'      => 'bs-example-navbar-collapse-1',
                                'walker'            => new \Webcode\WordPress\Template\BootstrapNavWalker()
                            ]);
                        }
                     ?>
              </div>
        </nav>
        <div class="header-image">
            <?php if (is_mobile() || is_tablet()) : ?>
            <div class="mobile">
                <div class="site-logo-title-wrap">
                    <div class="site-logo"></div>
                    <h1 class="site-title"><?php bloginfo('title') ?></h1>
                </div>
                <h4 class="site-description"><?php bloginfo('description') ?></h4>
            </div>
            <?php else : ?>
                <div class="desktop">
                    <div class="site-logo-title-wrap">
                        <div class="site-logo"></div>
                        <div class="title-description-wrap">
                            <h1 class="site-title"><?php bloginfo('title') ?></h1>
                            <h4 class="site-description"><?php bloginfo('description') ?></h4>
                        </div>
                    </div>
                </div>
            <?php endif ?>
        <div>

</header>

<!--    <a class="brand" href="--><?//= esc_url(home_url('/')); ?><!--">--><?php //bloginfo('name'); ?><!--</a>-->
