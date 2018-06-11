jQuery(document).ready(function(){

  function add_overlay(){
    var style = "position: fixed; left:0; top: 0; width 100vw; height:100vh;"
    var html = "<div style=></div>"
  }

  jQuery('*[modal-modal="open"]').on('click', function(){
    var target_id = jQuery(this).attr('data-modal-open_id');
    jQuery('div[data-modal-id = '+target_id+']').show();
    jQuery('#overlay').show();
  });

  jQuery('button[data-modal="close"]').on('click', function(){
    jQuery('div[data-modal="true"]').hide();
    jQuery('#overlay').hide();
  });

  jQuery('#overlay').on('click', function(){
    jQuery('div[data-modal="true"]').hide();
    jQuery('#overlay').hide();
  });


});
