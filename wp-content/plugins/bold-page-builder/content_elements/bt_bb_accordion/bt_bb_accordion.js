(function( $ ) {
	"use strict";
	
	$( '.bt_bb_accordion_item_title' ).click(function() {
		if ( !$(this).parent().hasClass('on') ) {
			$( this ).closest( '.bt_bb_accordion' ).find( '.bt_bb_accordion_item' ).removeClass( 'on' );
			$( this ).closest( '.bt_bb_accordion_item' ).addClass( 'on' );
		
		} else {
			$( this ).parent().removeClass( 'on' );
		
		}
	});

	$( '.bt_bb_accordion' ).each(function() {
		if ( $( this ).data( 'closed' ) != 'closed' ) {
			$( this ).find( '.bt_bb_accordion_item_title' ).first().click();
		}
	});
})( jQuery );