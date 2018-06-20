<?php

/*
Plugin Name:  Block users orders
Plugin URI:   http://zostawtonam.pl
Description:  Blocking users orders
Version:      1.0
Author:       Krzysztof Jabłoński @ Zostaw To Nam
Author URI:   http://zostawtonam.pl
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  zostawtonam
Domain Path:  /languages
*/

defined( 'ABSPATH' ) or die( 'No direct access' );

// Block orders if user has pending order_comments


// Actions

add_action( 'show_user_profile', 'block_user_orders' );
add_action( 'edit_user_profile', 'block_user_orders' );

add_action( 'personal_options_update', 'save_my_extra_fields' );
add_action( 'edit_user_profile_update', 'save_my_extra_fields' );

add_action( 'wp', 'redirect_from_checkout' );
add_action( 'woocommerce_proceed_to_checkout', 'disable_place_order_button_cart', 1 );

add_action('woocommerce_before_shop_loop', 'show_block_notice');
add_action('woocommerce_checkout_before_customer_details', 'show_block_notice');
add_action('woocommerce_before_single_product_summary', 'show_block_notice');
add_action('woocommerce_account_dashboard', 'show_block_notice');

function block_user_orders($user){
?>
  <h3>Blokowanie zamówień</h3>

    <table class="form-table">
   	 <tr>
   		 <th><label for="block_orders">Zablokować składanie zamówień?</label></th>
   		 <td>
          <select name="block_orders" id="block_orders">
            <?php if(get_the_author_meta( 'block_orders', $user->ID ) == 1): ?>
              <option value="1" selected>TAK</option>
              <option value="0">NIE</option>
            <?php else: ?>
              <option value="1">TAK</option>
              <option value="0" selected>NIE</option>
            <?php endif; ?>
          </select>
   		 </td>
   	 </tr>
    </table>

    <?php if(get_the_author_meta( 'block_orders', $user->ID ) == 1):?>
      <div style="background-color: white; width: 100%; padding: 15px;">
        <h3 style="color:red">Ten użytkownik nie może składać zamówień</h3>
      </div>
    <?php endif;?>
<?php
}




// Save changes
function save_my_extra_fields( $user_id ) {

    // Check to see if user can edit this profile
    if ( ! current_user_can( 'edit_user', $user_id ) ){
      return false;
    }
    update_usermeta( $user_id, 'block_orders', $_POST['block_orders'] );
}

//Disable place order button
function disable_place_order_button_cart(){
  $current_user = wp_get_current_user();
  if(get_the_author_meta( 'block_orders', $current_user->ID ) == 1){
    remove_action( 'woocommerce_proceed_to_checkout', 'woocommerce_button_proceed_to_checkout', 20 );
    ?>
    <div class="order-blocked-info">
      <p style="color: red"><strong><?php _e('Składanie zamówień zostało wstrzymane ze względu na nieopacone faktury. Prosimy opłacić zaległości w celu złożenia kolejnego zamówienia', 'text_domain') ?></strong></p>
    </div>
    <?php
  }
}

function redirect_from_checkout(){
  $current_user = wp_get_current_user();
  if(function_exists( 'is_checkout' ) && is_checkout()){
    if(get_the_author_meta( 'block_orders', $current_user->ID ) == 1){
        wp_redirect( esc_url( WC()->cart->get_cart_url() ) );
        exit;
    }
  }
}

function show_block_notice(){
  $current_user = wp_get_current_user();
    if(get_the_author_meta( 'block_orders', $current_user->ID ) == 1){
      $notice = '<div class="woocommerce-message" role="alert">Składanie zamówień zostało wstrzymane ze względu na nieopacone faktury. Prosimy opłacić zaległości w celu złożenia kolejnego zamówienia</div>';
      echo $notice;
    }
}
