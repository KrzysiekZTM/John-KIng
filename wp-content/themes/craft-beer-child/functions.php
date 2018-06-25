<?php
function my_theme_enqueue_styles() {

    $parent_style = 'parent-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
    wp_enqueue_style( 'simple-line-icons', 'https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css' );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

function my_theme_scripts(){
  wp_enqueue_script('modal', get_stylesheet_directory_uri().'/js/modal.js');
  wp_enqueue_script('checkout', get_stylesheet_directory_uri().'/js/checkout.js');
  wp_enqueue_script('login', get_stylesheet_directory_uri().'/js/login.js');
  wp_enqueue_script('menuResize', get_stylesheet_directory_uri().'/js/menu-resize.js');

}

add_action( 'wp_enqueue_scripts', 'my_theme_scripts' );

// SVG support
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


function my_theme_transport_table_modal(){
$html = '<div style="display: none;" id="overlay"></div>
        <div style="display:none; z-index:9999" class="modal-window" data-modal="true" data-modal-id="transport-table">
          <div class="modal-content">
            <div class="modal-window_header">
              <h5>Tabela kosztów dostawy</h5>
            </div>
            <div class="modal-window_body">';
$html .= '';
$html .= '</div>
            <div class="modal-window_footer">
              <button class="button" type="button" name="button" data-modal="close">Zamknij</button>
            </div>
          </div>
        </div>';

echo $html;
}

add_action( 'woocommerce_after_cart', 'my_theme_transport_table_modal' );

function remove_image_zoom_support() {
    remove_theme_support( 'wc-product-gallery-zoom' );
}
add_action( 'wp', 'remove_image_zoom_support', 100 );

add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );

function custom_override_checkout_fields( $fields ) {
    unset($fields['billing']['billing_state']);
    return $fields;
}

add_filter( 'woocommerce_order_button_text', 'woo_custom_order_button_text' );

function woo_custom_order_button_text() {
    return __( 'Zamawiam', 'woocommerce' );
}

// Redirect users that are not logged include

function check_if_logged_in() {
    if (!is_user_logged_in() && !is_account_page()){
        wp_redirect( get_permalink( get_option('woocommerce_myaccount_page_id')) );
        exit;
    }
}
add_action('template_redirect', 'check_if_logged_in');


function add_logo_to_login(){
  echo "<div class='login-logo'>";
  boldthemes_logo( 'header' );
  echo "</div>";
  echo '<div class="login-text"><p>';
  echo esc_html_e('Skep hurtowy jest dostępny tylko dla użytkowników posiadających konto.', 'woocommerce');
  echo '<br>';
  echo esc_html_e('Jeśli chcesz z niego kożystać załóż konto i poczekaj na weryfikację.', 'woocommerce');
  echo '</p></div>';
}

add_action('woocommerce_before_customer_login_form', 'add_logo_to_login');

function jk_custom_billing_fields(){
  return apply_filters('jk_account_fields', array(
    'billing_nip' => array(
      'label'     => __('NIP', 'woocommerce'),
      'placeholder'   => _x('NIP', 'placeholder', 'woocommerce'),
      'required'  => true,
      'class'     => array('form-row-wide'),
      'clear'     => false,
      'type'      => 'number',
      'class'     => array('nip_number'),
    ),
  ));
}

function jk_reorder_billing_fields($fields){
  $fields2['billing_email'] = $fields['billing_email'];
  $fields2['billing_first_name'] = $fields['billing_first_name'];
  $fields2['billing_last_name'] = $fields['billing_last_name'];
  $fields2['billing_company'] = $fields['billing_company'];
  $fields2['billing_nip'] = $fields['billing_nip'];
  $fields2['billing_country'] = $fields['billing_country'];
  $fields2['billing_address_1'] = $fields['billing_address_1'];
  $fields2['billing_address_2'] = $fields['billing_address_2'];
  $fields2['billing_city'] = $fields['billing_city'];
  $fields2['billing_postcode'] = $fields['billing_postcode'];
  $fields2['billing_phone'] = $fields['billing_phone'];

  return $fields2;

}

function jk_add_custom_billing_field_to_checkout( $fields ) {
  $custom_billing_fields = jk_custom_billing_fields();

  foreach($custom_billing_fields as $key => $val){
    $fields['billing'][$key] = $val;
  }
  return $fields;
}
add_filter( 'woocommerce_checkout_fields' , 'jk_add_custom_billing_field_to_checkout' );

function jk_add_custom_billing_fields( $fields ) {

    $user_id = get_current_user_id();
    $user    = get_userdata( $user_id );

    if ( !$user ) return;

    foreach(jk_custom_billing_fields() as $key => $val){
      $fields[$key] = $val;
      $fields[$key]['default'] = get_user_meta( $user_id, $key, true ); // assing default value if any
    }
    $fields['billing_company']['required'] = true;
    unset($fields['billing_state']);

    return jk_reorder_billing_fields($fields);
}
add_filter('woocommerce_billing_fields', 'jk_add_custom_billing_fields');

function jk_save_custom_billing_fields($customer_id){
  foreach(jk_custom_billing_fields() as $key=>$val){
    if (isset($_POST[$key])) {
        update_user_meta($customer_id, $key, sanitize_text_field($_POST[$key]));
    }
  }
}

add_action('woocommerce_save_account_details', 'text_domain_woo_save_reg_form_fields');




function my_custom_checkout_field_display_admin_order_meta($order){
    echo '<p><strong>'.__('NIP From Checkout Form').':</strong> ' . get_post_meta( $order->get_id(), '_billing_nip', true ) . '</p>';
}

// Hook in




function extra_form_fields() {
    ?>
    <p class="form-row form-row-first">
        <label for="billing_first_name"><?php _e('Imię ', 'text_domain'); ?><span class="required">*</span></label>
        <input type="text" class="input-text" name="billing_first_name" id="billing_first_name" value="<?php if (!empty($_POST['billing_first_name'])) esc_attr_e($_POST['billing_first_name']); ?>" />
    </p>
    <p class="form-row form-row-last">
        <label for="billing_last_name"><?php _e('Nazwisko', 'text_domain'); ?><span class="required">*</span></label>
        <input type="text" class="input-text" name="billing_last_name" id="billing_last_name" value="<?php if (!empty($_POST['billing_last_name'])) esc_attr_e($_POST['billing_last_name']); ?>" />
    </p>
    <p class="form-row form-row-last">
        <label for="billing_company"><?php _e('Firma', 'text_domain'); ?><span class="required">*</span></label>
        <input type="text" class="input-text" name="billing_company" id="billing_company" value="<?php if (!empty($_POST['billing_company'])) esc_attr_e($_POST['billing_company']); ?>" />
    </p>
    <p class="form-row form-row-last">
        <label for="billing_nip"><?php _e('NIP', 'text_domain'); ?><span class="required">*</span></label>
        <input type="text" class="input-text" name="billing_nip" id="billing_nip" value="<?php if (!empty($_POST['billing_nip'])) esc_attr_e($_POST['billing_nip']); ?>" />
    </p>
    <p class="form-row form-row-last">
        <label for="billing_address_1"><?php _e('Adres', 'text_domain'); ?><span class="required">*</span></label>
        <input type="text" class="input-text" name="billing_address_1" id="billing_address_1" value="<?php if (!empty($_POST['billing_address_1'])) esc_attr_e($_POST['billing_address_1']); ?>" />
    </p>
    <p class="form-row form-row-last">
        <label for="billing_address_2"><?php _e('Adres cd.', 'text_domain'); ?></label>
        <input type="text" class="input-text" name="billing_address_2" id="billing_address_2" value="<?php if (!empty($_POST['billing_address_2'])) esc_attr_e($_POST['billing_address_2']); ?>" />
    </p>
    <p class="form-row form-row-last">
        <label for="billing_city"><?php _e('Miasto', 'text_domain'); ?><span class="required">*</span></label>
        <input type="text" class="input-text" name="billing_city" id="billing_city" value="<?php if (!empty($_POST['billing_city'])) esc_attr_e($_POST['billing_city']); ?>" />
    </p>
    <p class="form-row form-row-last">
        <label for="billing_postcode"><?php _e('Kod pocztowy', 'text_domain'); ?><span class="required">*</span></label>
        <input type="text" class="input-text" name="billing_postcode" id="billing_postcode" value="<?php if (!empty($_POST['billing_postcode'])) esc_attr_e($_POST['billing_postcode']); ?>" />
    </p>
    <p class="form-row form-row-last">
        <label for="billing_country"><?php _e('Kraj', 'text_domain'); ?><span class="required">*</span></label>
        <input type="text" class="input-text" name="billing_country" id="billing_country" value="<?php if (!empty($_POST['billing_country'])) esc_attr_e($_POST['billing_country']); ?>" />
    </p>
    <p class="form-row form-row-last">
        <label for="billing_phone"><?php _e('Nr Telefonu', 'text_domain'); ?><span class="required">*</span></label>
        <input type="text" class="input-text" name="billing_phone" id="billing_phone" value="<?php if (!empty($_POST['billing_phone'])) esc_attr_e($_POST['billing_phone']); ?>" />
    </p>

    <div class="clear"></div>
    <?php
}

add_action('woocommerce_register_form_start', 'extra_form_fields');

function custom_validate_user_register_input($username, $email, $validation_errors) {
    if (isset($_POST['billing_first_name']) && empty($_POST['billing_first_name'])) {
        $validation_errors->add('billing_first_name_error', __('<strong>Error</strong>: First name is required!', 'text_domain'));
    }

    if (isset($_POST['billing_last_name']) && empty($_POST['billing_last_name'])) {
        $validation_errors->add('billing_last_name_error', __('<strong>Error</strong>: Last name is required!.', 'text_domain'));
    }

    if (isset($_POST['billing_addres_1']) && empty($_POST['billing_addres_1'])) {
        $validation_errors->add('billing_addres_1_error', __('<strong>Error</strong>: Address is required!.', 'text_domain'));
    }

    if (isset($_POST['billing_company']) && empty($_POST['billing_company'])) {
        $validation_errors->add('billing_company_error', __('<strong>Error</strong>: Last name is required!.', 'text_domain'));
    }

    if (isset($_POST['billing_nip']) && empty($_POST['billing_nip'])) {
        $validation_errors->add('billing_nip_error', __('<strong>Error</strong>: Last name is required!.', 'text_domain'));
    }

    if (isset($_POST['billing_city']) && empty($_POST['billing_city'])) {
        $validation_errors->add('billing_city_error', __('<strong>Error</strong>: Last name is required!.', 'text_domain'));
    }

    if (isset($_POST['billing_postcode']) && empty($_POST['billing_postcode'])) {
        $validation_errors->add('billing_postcode_error', __('<strong>Error</strong>: Last name is required!.', 'text_domain'));
    }

    if (isset($_POST['billing_country']) && empty($_POST['billing_country'])) {
        $validation_errors->add('billing_country_error', __('<strong>Error</strong>: Last name is required!.', 'text_domain'));
    }

    if (isset($_POST['billing_phone']) && empty($_POST['billing_phone'])) {
        $validation_errors->add('billing_phone_error', __('<strong>Error</strong>: Last name is required!.', 'text_domain'));
    }
    return $validation_errors;
}

add_action('woocommerce_register_post', 'custom_validate_user_register_input', 10, 3);

function text_domain_woo_save_reg_form_fields($customer_id) {
    //First name field
    if (isset($_POST['billing_first_name'])) {
        update_user_meta($customer_id, 'first_name', sanitize_text_field($_POST['billing_first_name']));
        update_user_meta($customer_id, 'billing_first_name', sanitize_text_field($_POST['billing_first_name']));
        update_user_meta($customer_id, 'shipping_first_name', sanitize_text_field($_POST['billing_first_name']));
    }
    //Last name field
    if (isset($_POST['billing_last_name'])) {
        update_user_meta($customer_id, 'last_name', sanitize_text_field($_POST['billing_last_name']));
        update_user_meta($customer_id, 'billing_last_name', sanitize_text_field($_POST['billing_last_name']));
        update_user_meta($customer_id, 'shipping_last_name', sanitize_text_field($_POST['billing_last_name']));
    }
    // Address fields
    if (isset($_POST['billing_address_1'])) {
        update_user_meta($customer_id, 'address_1', sanitize_text_field($_POST['billing_address_1']));
        update_user_meta($customer_id, 'billing_address_1', sanitize_text_field($_POST['billing_address_1']));
        update_user_meta($customer_id, 'shipping_address_1', sanitize_text_field($_POST['billing_address_1']));
    }
    if (isset($_POST['billing_address_2'])) {
        update_user_meta($customer_id, 'address_2', sanitize_text_field($_POST['billing_address_2']));
        update_user_meta($customer_id, 'billing_address_2', sanitize_text_field($_POST['billing_address_2']));
        update_user_meta($customer_id, 'shipping_address_2', sanitize_text_field($_POST['billing_address_2']));
    }
    // Company
    if (isset($_POST['billing_company'])) {
        update_user_meta($customer_id, 'company', sanitize_text_field($_POST['billing_company']));
        update_user_meta($customer_id, 'billing_company', sanitize_text_field($_POST['billing_company']));
        update_user_meta($customer_id, 'shipping_company', sanitize_text_field($_POST['billing_company']));
    }
    // VAT number
    if (isset($_POST['billing_nip'])) {
        update_user_meta($customer_id, 'billing_nip', sanitize_text_field($_POST['billing_nip']));
    }
    // City and postcode
    if (isset($_POST['billing_city'])) {
        update_user_meta($customer_id, 'city', sanitize_text_field($_POST['billing_city']));
        update_user_meta($customer_id, 'billing_city', sanitize_text_field($_POST['billing_city']));
        update_user_meta($customer_id, 'shipping_city', sanitize_text_field($_POST['billing_city']));
    }
    if (isset($_POST['billing_postcode'])) {
        update_user_meta($customer_id, 'postcode', sanitize_text_field($_POST['billing_postcode']));
        update_user_meta($customer_id, 'billing_postcode', sanitize_text_field($_POST['billing_postcode']));
        update_user_meta($customer_id, 'shipping_postcode', sanitize_text_field($_POST['billing_postcode']));
    }
    // Country
    if (isset($_POST['billing_country'])) {
        update_user_meta($customer_id, 'country', sanitize_text_field($_POST['billing_country']));
        update_user_meta($customer_id, 'billing_country', sanitize_text_field($_POST['billing_country']));
        update_user_meta($customer_id, 'shipping_country', sanitize_text_field($_POST['billing_country']));
    }
    // Phone
    if (isset($_POST['billing_phone'])) {
        update_user_meta($customer_id, 'phone', sanitize_text_field($_POST['billing_phone']));
        update_user_meta($customer_id, 'billing_phone', sanitize_text_field($_POST['billing_phone']));
    }
}

add_action('woocommerce_created_customer', 'text_domain_woo_save_reg_form_fields');


// Reorder Checkout Fields
add_filter('woocommerce_checkout_fields','reorder_woo_fields');

function reorder_woo_fields($fields) {
    $fields2['billing']['billing_email'] = $fields['billing']['billing_email'];
    $fields2['billing']['billing_first_name'] = $fields['billing']['billing_first_name'];
    $fields2['billing']['billing_last_name'] = $fields['billing']['billing_last_name'];
    $fields2['billing']['billing_company'] = $fields['billing']['billing_company'];
    $fields2['billing']['billing_nip'] = $fields['billing']['billing_nip'];
    $fields2['billing']['billing_country'] = $fields['billing']['billing_country'];
    $fields2['billing']['billing_address_1'] = $fields['billing']['billing_address_1'];
    $fields2['billing']['billing_address_2'] = $fields['billing']['billing_address_2'];
    $fields2['billing']['billing_city'] = $fields['billing']['billing_city'];
    $fields2['billing']['billing_postcode'] = $fields['billing']['billing_postcode'];
	  $fields2['billing']['billing_phone'] = $fields['billing']['billing_phone'];

    $fields2['shipping']['shipping_first_name'] = $fields['shipping']['shipping_first_name'];
    $fields2['shipping']['shipping_last_name'] = $fields['shipping']['shipping_last_name'];
    $fields2['shipping']['shipping_company'] = $fields['shipping']['shipping_company'];
    $fields2['shipping']['shipping_country'] = $fields['shipping']['shipping_country'];
    $fields2['shipping']['shipping_address_1'] = $fields['shipping']['shipping_address_1'];
    $fields2['shipping']['shipping_address_2'] = $fields['shipping']['shipping_address_2'];
    $fields2['shipping']['shipping_city'] = $fields['shipping']['shipping_city'];
    $fields2['shipping']['shipping_postcode'] = $fields['shipping']['shipping_postcode'];

    $fields2['order']['order_comments'] = $fields['order']['order_comments'];

    // Add full width Classes and Clears to Adjustments
    $fields2['billing']['billing_email'] = array(
		  'label'     => __('Email', 'woocommerce'),
	    'required'  => true,
	    'class'     => array('form-row-wide'),
	    'clear'     => true
    );

    $fields2['billing']['billing_company'] = array(
		  'label'     => __('Company', 'woocommerce'),
	    'required'  => true,
	    'class'     => array('form-row-wide'),
	    'clear'     => false
    );

    $fields2['billing']['billing_phone'] = array(
		  'label'     => __('Phone', 'woocommerce'),
	    'required'  => false,
	    'class'     => array('form-row-wide'),
	    'clear'     => true
    );

    $fields2['shipping']['shipping_company'] = array(
		  'label'     => __('Company', 'woocommerce'),
	    'required'  => true,
	    'class'     => array('form-row-wide'),
      'clear'     => true
    );

    return $fields2;
}



// Test

// (1) Printing the Billing Address on My Account
add_filter( 'woocommerce_my_account_my_address_formatted_address', 'custom_my_account_my_address_formatted_address', 10, 3 );
function custom_my_account_my_address_formatted_address( $fields, $customer_id, $type ) {

  foreach(jk_custom_billing_fields() as $key=>$val){
    if ( $type == 'billing' ) {
  		$fields[$key] = get_user_meta( $customer_id, $key, true );
  	}
  }

	return $fields;
}

add_filter( 'woocommerce_formatted_address_replacements', 'custom_formatted_address_replacements', 10, 2 );
function custom_formatted_address_replacements( $address, $args ) {
  foreach(jk_custom_billing_fields() as $key=>$val){
    $address['{'.$key.'}'] = '';
    $address['{'.$key.'_upper}']= '';

    if ( ! empty( $args[''.$key.''] ) ) {
      $address['{'.$key.'}'] = $args[$key];
      $address['{'.$key.'_upper}'] = strtoupper($args[$key]);
    }
  }
	return $address;
}

add_filter( 'woocommerce_localisation_address_formats', 'custom_localisation_address_format' );
function custom_localisation_address_format( $formats ) {
  foreach(jk_custom_billing_fields() as $key=>$val){
    $string_to_add = "\nNIP: {".$key."_upper}";
  }
	$formats['PL'] = "{name}\n{company}".$string_to_add."\n{address_1}\n{address_2}\n{postcode} {city}\n{state}\n{country}";

	return $formats;
}

add_filter( 'woocommerce_admin_billing_fields', 'jk_custom_admin_billing_fields' );
function jk_custom_admin_billing_fields( $fields ) {
  foreach(jk_custom_billing_fields() as $key=>$val){
    $fields[$key] = array(
  		'label' => __( $val['label'], 'john-king' ),
  		'show'  => true,
  	);
  }

	return $fields;
}

add_filter( 'woocommerce_found_customer_details', 'custom_found_customer_details' );
function custom_found_customer_details( $customer_data ) {
  foreach(jk_custom_billing_fields() as $key=>$val){
    $customer_data[$key] = get_user_meta( $_POST['user_id'], $key, true );
  }
	return $customer_data;
}

add_filter( 'woocommerce_customer_meta_fields', 'custom_customer_meta_fields' );
function custom_customer_meta_fields( $fields ) {
  foreach(jk_custom_billing_fields() as $key=>$val){
    $new[$key] = array(
  		'label'       => __( $val['label'], 'john-king' ),
      'description' => ""
  	);
  }

  $keys = array_keys($fields['billing']['fields']);
  $search = array_search('billing_company', $keys);
  $sliced = array_slice($fields['billing']['fields'], 0, $search+1 );
  $sliced2 = array_slice($fields['billing']['fields'], $search+1 );
  $fields['billing']['fields'] = array_merge($sliced, $new, $sliced2);

  return $fields;
}

// Wish list
