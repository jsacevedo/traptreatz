<?php get_header(); ?>

<!-- Front Page Banner -->
<section class="landing-banner">
  <div class="landing-banner-container">
    <img class="landing-title" alt="When Life Ain't Sweet Have A Traptreatz" src="<?php echo get_stylesheet_directory_uri(); ?>/images/tagline_small.gif">
    <button href="#" type="button" class="landing-button">Order Online</button>
  </div>
</section>

<!-- Our Story Section -->
<section class="our-story">
  <div class="our-story-container">
    <img class="our-story-title" alt="Our Story" src="<?php echo get_stylesheet_directory_uri(); ?>/images/our-story_small.gif">
    <div class="our-story-text">
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>
  </div>
</section>

<!-- Front Page Product Menu -->
<section class="product-menu" style="background-image: url(<?php echo get_theme_file_uri('/images/brick-wall.png'); ?>);">
  <div class="menu-title-container">
    <h2>Menu</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
  </div>
  <img class="sweet-menu-title" alt="Sweet" src="<?php echo get_stylesheet_directory_uri(); ?>/images/sweet_small.gif">
  <div class="sweet-items-list"></div>
  <img class="savory-menu-title" alt="Sweet" src="<?php echo get_stylesheet_directory_uri(); ?>/images/savory_small.gif">
  <div class="savory-items-list">
    <div class="savory-menu-item">
      <div class="item-image-container">
      </div>
      <div class="item-information">
        <h3 class="item-title">Smore'z</h3>
        <h4 class="item-price">3/$12.00</h4>
        <p class="item-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        <button type="button" href="#" class="add-to-cart">Add to Cart</button>
      </div>
    </div>
    <div class="savory-menu-item">
      <div class="item-image-container">
      </div>
      <div class="item-information">
        <h3 class="item-title">Fruit Loops</h3>
        <h4 class="item-price">3/$12.00</h4>
        <p class="item-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        <button type="button" href="#" class="add-to-cart">Add to Cart</button>
      </div>
    </div>
    <div class="savory-menu-item">
      <div class="item-image-container">
      </div>
      <div class="item-information">
        <h3 class="item-title">Toffee</h3>
        <h4 class="item-price">3/$12.00</h4>
        <p class="item-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        <button type="button" href="#" class="add-to-cart">Add to Cart</button>
      </div>
    </div>
  </div>
</section>

<!-- Contact Section -->
<section class="contact-form" style="background-image: url(<?php echo get_theme_file_uri('/images/yellow-orbs.png'); ?>), url(<?php echo get_theme_file_uri('/images/brick-wall.png'); ?>);">
  <form>
    <div class="field-first-name">
      <label for="first-name">First Name</label>
      <input type="text" name="first-name" id="first-name" class="form-field">
    </div>
    <div class="field-last-name">
      <label for="last-name">Last Name</label>
      <input type="text" name="last-name" id="last-name" class="form-field">
    </div>
    <div class="field-phone">
      <label for="phone">Phone</label>
      <input type="tel" name="phone" id="phone" class="form-field">
    </div>
    <div class="field-email">
      <label for="email">Email</label>
      <input type="email" name="email" id="email" class="form-field">
    </div>
    <div class="contact-message">
      <label for="contact">Message</label>
      <textarea name="contact" id="contact" rows="10" cols="30" class="form-textarea"></textarea>
    </div>
  </form>
</section>

<?php get_footer(); ?>