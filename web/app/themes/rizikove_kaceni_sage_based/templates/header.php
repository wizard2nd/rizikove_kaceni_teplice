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
        <div class="header-image center-block">
            <div class="site-title">
                <h1><?php bloginfo('title') ?></h1>
                <h4><?php bloginfo('description') ?></h4>
            </div>
        <div>

</header>

<!--    <a class="brand" href="--><?//= esc_url(home_url('/')); ?><!--">--><?php //bloginfo('name'); ?><!--</a>-->
