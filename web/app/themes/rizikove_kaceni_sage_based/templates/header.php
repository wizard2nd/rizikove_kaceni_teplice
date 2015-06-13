<header class="banner" role="banner">
  <div class="">
      <nav role="navigation" class="navbar navbar-inverse navbar-fixed-top">
          <div class="container-fluid">
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
                            'menu_class'        => 'nav navbar-nav',
                            'container'         => 'div',
                            'container_class'   => 'collapse navbar-collapse',
                            'container_id'      => 'bs-example-navbar-collapse-1',
                            'walker'            => new \Webcode\WordPress\Template\BootstrapNavWalker()
                        ]);
                    }
                 ?>

          </div>
      </nav>
  </div>
</header>

<!--    <a class="brand" href="--><?//= esc_url(home_url('/')); ?><!--">--><?php //bloginfo('name'); ?><!--</a>-->
