<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>
    <header class="site-header">
      <div class="site-header-container">
        <span class="navbar-open" id="side-navbar-open">
          <svg class="svg-icon" viewBox="0 0 20 20">
            <path fill="none" d="M3.314,4.8h13.372c0.41,0,0.743-0.333,0.743-0.743c0-0.41-0.333-0.743-0.743-0.743H3.314
              c-0.41,0-0.743,0.333-0.743,0.743C2.571,4.467,2.904,4.8,3.314,4.8z M16.686,15.2H3.314c-0.41,0-0.743,0.333-0.743,0.743
              s0.333,0.743,0.743,0.743h13.372c0.41,0,0.743-0.333,0.743-0.743S17.096,15.2,16.686,15.2z M16.686,9.257H3.314
              c-0.41,0-0.743,0.333-0.743,0.743s0.333,0.743,0.743,0.743h13.372c0.41,0,0.743-0.333,0.743-0.743S17.096,9.257,16.686,9.257z">
            </path>
          </svg>
        </span>
        <a id="search-icon" href="#"><img class="header-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/images/search.png"></a>
        <img class="logo" src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png" alt="Traptreatz Logo">
        <nav class="main-header-navigation">
          <?php
            wp_nav_menu(array(
              'theme_location' => 'headerNavMenu'
            ));
          ?>
        </nav>
        <a id="user-icon" href="#"><img class="header-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/images/man-user.png"></a>
        <a id="bag-icon" href="#"><img class="header-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/images/shopping-bag.png"></a>
        
        <!-- Responsive side navigation menu -->
        <div id="side-menu" class="side-nav hide-menu">
          <span class="side-menu-close" id="side-navbar-close">
            <svg class="svg-icon" viewBox="0 0 20 20">
							<path fill="none" d="M11.469,10l7.08-7.08c0.406-0.406,0.406-1.064,0-1.469c-0.406-0.406-1.063-0.406-1.469,0L10,8.53l-7.081-7.08
							  c-0.406-0.406-1.064-0.406-1.469,0c-0.406,0.406-0.406,1.063,0,1.469L8.531,10L1.45,17.081c-0.406,0.406-0.406,1.064,0,1.469
							  c0.203,0.203,0.469,0.304,0.735,0.304c0.266,0,0.531-0.101,0.735-0.304L10,11.469l7.08,7.081c0.203,0.203,0.469,0.304,0.735,0.304
                c0.267,0,0.532-0.101,0.735-0.304c0.406-0.406,0.406-1.064,0-1.469L11.469,10z">
              </path>
						</svg>
          </span>
          <?php
            wp_nav_menu(array(
              'theme_location' => 'headerNavMenu'
            ));
          ?>
        </div>
      </div>
    </header>
    