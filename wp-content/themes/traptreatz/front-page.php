<?php 

get_header(); 

while(have_posts()) {
  the_post();

// Front Page Banner ?>
  <section class="landing-banner" style="background-image: url(<?php echo get_theme_file_uri('/images/brick-wall_small.jpg'); ?>);">
    <div class="landing-banner-container">
      <img class="landing-image" alt="When Life Ain't Sweet Have A Traptreatz" src="<?php echo get_stylesheet_directory_uri(); ?>/images/hero-banner.png">
      <a href="#product-menu" class="landing-link">Order Online</a>
    </div>
  </section>

  <?php // Our Story section ?>
  <section class="our-story" id="our-story">
    <div class="our-story-container">
      <div class="our-story-title-container">
        <img class="our-story-title" alt="Our Story" src="<?php echo get_stylesheet_directory_uri(); ?>/images/our-story_small.gif">
        <img class="green-paint-can" alt="Green Spray Paint Can" src="<?php echo get_stylesheet_directory_uri(); ?>/images/green-paint-can.png">
      </div>
      <article class="our-story-text">
        <?php the_content(); ?>
      </article>
      <img class="our-story-image" alt="Mom With Traptreat" src="<?php echo get_stylesheet_directory_uri(); ?>/images/mom-treat.png">
    </div>
  </section>

  <?php // Front page product menu ?>
  <section class="product-menu" id="product-menu" style="background-image: url(<?php echo get_theme_file_uri('/images/brick-wall_small.jpg'); ?>);">
    <div class="menu-title-container">
      <h2>Menu</h2>
      <p><?php the_field('main_copy_text'); ?></p>
    </div>
    <?php // Container for sweet menu items ?>
    <div class="sweet-items-container">
      <div class="product-menu-title-container">
        <img class="pink-paint-can" alt="Pink Spray Paint Can" src="<?php echo get_stylesheet_directory_uri(); ?>/images/pink-paint-can.png">
        <img class="sweet-menu-title" alt="Sweet" src="<?php echo get_stylesheet_directory_uri(); ?>/images/sweet_small.gif">
      </div>
      <div class="sweet-items-list">
        <?php echo do_shortcode('[products columns="1" category="Sweet"]'); ?>
      </div>
    </div>

    <?php // Container for savory menu items ?>
    <div class="savory-items-container">
      <img class="savory-menu-title" alt="Sweet" src="<?php echo get_stylesheet_directory_uri(); ?>/images/savory_small.gif">
      <div class="savory-items-list">
        <?php echo do_shortcode('[products columns="1" category="Savory"]'); ?>
      </div>
    </div>

    <?php // Container for merch ?>
    <div class="merch-container">

    </div>
  </section>

  <?php // Contact Section ?>
  <section class="contact-form" id="contact-form" style="background-image: url(<?php echo get_theme_file_uri('/images/brick-wall_small.jpg'); ?>);">
    <div class="contact-title-container">
      <img class="green-paint-can-contact" alt="Green Spray Paint Can" src="<?php echo get_stylesheet_directory_uri(); ?>/images/green-paint-can.png">
      <img class="contact-title" alt="Contact" src="<?php echo get_stylesheet_directory_uri(); ?>/images/contact_small.gif">
    </div>
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
      <img class="contact-image" alt="Mom On Couch" src="<?php echo get_stylesheet_directory_uri(); ?>/images/couch-mom.png">
    </form>
  </section>
<?php } 

get_footer(); ?>