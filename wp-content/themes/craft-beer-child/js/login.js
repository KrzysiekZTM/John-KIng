jQuery(document).ready(function(){
  jQuery('#open-register').on('click', function(){
    jQuery('#custom-login').slideUp();
    jQuery('#custom_register').slideDown();
  });
  jQuery('#open-login').on('click', function(){
    jQuery('#custom_register').slideUp();
    jQuery('#custom-login').slideDown();
  });
});
