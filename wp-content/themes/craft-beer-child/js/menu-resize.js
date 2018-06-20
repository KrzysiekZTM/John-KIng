function adapt_menu(){
  if(jQuery(window).width() < 1680){
    var margin = jQuery('.cart_myaccount').width()
    jQuery('.menuPort').css('margin-right', margin+20+'px');
  }else{
    jQuery('.menuPort').css('margin-right', '0');
  }
}

jQuery(document).ready(function(){
  adapt_menu();
  jQuery(window).on('resize', function(){
    adapt_menu();
  });
});
