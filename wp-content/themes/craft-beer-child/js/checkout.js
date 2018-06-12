jQuery(document).ready(function(){
  jQuery('#billing-data-edit').on('click', function(){
    jQuery('.billing-data').slideUp();
    jQuery('.woocommerce-billing-fields__field-wrapper').slideDown();
  });

  jQuery('#shipping-data-edit').on('click', function(){
    jQuery('.shipping-data').slideUp();
    jQuery('#ship-to-different-address-checkbox').trigger('click');
  });
});
