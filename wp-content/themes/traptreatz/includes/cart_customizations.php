<?php

/*
 * Cart Customizations
 * 1. Add automatic cart total updates to bag link icon in the header
 * 2. Add plus/minus button operation and automatic cart updates
 * 3. Add "Your Bag" title/quantity
 * 4. Delete the "Cart Updated" message
 * 
 * */

// Add AJAX support for updating the cart total in the header
add_filter('add_to_cart_fragments', 'traptreatz_woocommerce_header_add_to_cart_fragment');
 
function traptreatz_woocommerce_header_add_to_cart_fragment($fragments) {
  global $woocommerce; 

  ob_start(); ?>

  <a class="cart-contents" id="bag-icon" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your bag', 'woothemes'); ?>">
  <img class="header-icon" src="<?php echo get_stylesheet_directory_uri(); ?>/images/shopping-bag.png">
    <div class="bag-total">
      <?php echo sprintf($woocommerce->cart->cart_contents_count);?>
    </div>
  </a>

  <?php
    $fragments['a.cart-contents'] = ob_get_clean();
    return $fragments; 
} 

// Add JQuery for plus/minus button operation and updating the cart automatically
add_action('wp_footer', 'traptreatz_add_cart_quantity_plus_minus', 30);
  
function traptreatz_add_cart_quantity_plus_minus() { ?>
  <script type="text/javascript">
    // Initialize timeout variable for auto cart update
    var timeout;
    
    jQuery(document).ready(function($) {
      // Add initial click behavior to single item plus/minus buttons
      $('form.cart').on('click', '.quantity-plus', function(e) {
        $input = $(this).prev('div.quantity').find('input.qty');
        var val = parseInt($input.val());
        $input.val(val + 1).change();
      });

      $('form.cart').on('click', '.quantity-minus', function(e) {
        $input = $(this).next('div.quantity').find('input.qty');
        var val = parseInt($input.val());

        if (val > 1) {
          $input.val(val - 1).change();
        } 
      });

      // Add initial click behavior to checkout plus/minus buttons
      $('div.product-quantity').on('click', '.quantity-plus', function(e) {
        $input = $(this).prev('div.quantity').find('input.qty');
        var val = parseInt($input.val());
        $input.val(val + 1).change();
      });

      $('div.product-quantity').on('click', '.quantity-minus', function(e) {
        $input = $(this).next('div.quantity').find('input.qty');
        var val = parseInt($input.val());

        if (val > 1) {
          $input.val(val - 1).change();
        } 
      });

      // Auto-update cart after change
      $('div.quantity').on('change', 'input.qty', function(e) {
        if (timeout !== undefined) {
          clearTimeout(timeout);
        }

        timeout = setTimeout(function() {
          $("[name='update_cart']").trigger("click");
        }, 1000 ); // 1 second delay, half a second (500) seems comfortable too
      });
    });

    jQuery(document).ajaxComplete(function() {
      // Add click behavior after AJAX call is complete to checkout plus/minus buttons
      jQuery('div.product-quantity').off('click', '.quantity-plus').on('click', '.quantity-plus', function(e) {        
        $input = jQuery(this).prev('div.quantity').find('input.qty');
        var val = parseInt($input.val());
        $input.val(val + 1).change();
      });

      jQuery('div.product-quantity').off('click', '.quantity-minus').on('click', '.quantity-minus', function(e) {       
        $input = jQuery(this).next('div.quantity').find('input.qty');
        var val = parseInt($input.val());
    
        if (val > 1) {
          $input.val(val - 1).change();
        }
      });

      // Auto-update cart after change (after AJAX call is complete)
      jQuery('div.quantity').off('change', 'input.qty').on('change', 'input.qty', function(e) {
        if (timeout !== undefined) {
          clearTimeout(timeout);
        }

        timeout = setTimeout(function() {
          jQuery("[name='update_cart']").trigger("click");
        }, 1000 ); // 1 second delay, half a second (500) seems comfortable too
      });
    });
  </script>
<?php }

// Add "Your Bag" title and bag item quantity to the Cart Page
add_action( 'woocommerce_before_cart_table', 'traptreatz_add_to_cart_title' );

function traptreatz_add_to_cart_title() {
  global $woocommerce;
  
  echo '
    <div class="cart-title">
      <h2>Your Bag</h2>
      <h3>
  ';
  echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);
  echo '</h3></div>';
}

// Delete the "Cart Updated" message
add_filter('woocommerce_add_message', '__return_false');