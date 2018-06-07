'use strict';

var bt_initTheme;

window.onunload = function(){};

window.addEventListener("pageshow", function(evt){
        if(evt.persisted){
        setTimeout(function(){
            window.location.reload();
        },10);
    }
}, false);

function bt_refresh_cart() {
	jQuery( '.btCartWidgetIcon' ).unbind('click').on( 'click', function ( e ) { 
		jQuery(this).parent().parent().toggleClass( 'on' ); 
		jQuery('body').toggleClass( 'btCartDropdownOn' ); 
	});
	jQuery('.verticalMenuCartToggler').unbind('click').on( 'click', function(){
		jQuery(this).closest('.widget_shopping_cart_content').removeClass('on');
		jQuery('body').removeClass('.btCartDropdownOn');
	});
}

(function( $ ) {
	
	function initFancySelect() {
		$( '.no-touch .btSidebar select, .no-touch select.orderby, .no-touch #btSettingsPanelContent select, .no-touch .wpcf7-form select:not([multiple])' ).fancySelect().on( 'change.fs', function() {
			$( this ).trigger( 'change.$' );
		});
	}
	
	function loadInitActions() {
		// remove preloader
		if(!$( 'body' ).hasClass( "btRemovePreloader" )) {
			$( 'body' ).addClass( 'btRemovePreloader' );
		}
		
		// trigger custom load event
		setTimeout( function() { $( window ).trigger( 'btload' ); window.boldthemes_loaded = true; }, 500 );
		
		// gmaps with img overlay, iframes
		$( window ).trigger( 'resize' );
	}
	
	function initFooter() {
		$( '#boldSiteFooterWidgetsRow' ).attr( 'data-width', $( '#boldSiteFooterWidgetsRow' ).children().length ).children().addClass('bt_bb_column');
	}
	
	function initModernizrAndDetectBrowser() {
		btModernizr.load([
		{
			test: window.matchMedia
		}
		]);
		
		// Browser detect
	
		var doc = document.documentElement;
		doc.setAttribute('data-useragent', navigator.userAgent);

		// IE startsWith/endsWith compatibility 
		
		if ( ! String.prototype.startsWith ) {
			String.prototype.startsWith = function(searchString, position) {
				position = position || 0;
				return this.lastIndexOf(searchString, position) === position;
			};
		}

		if ( ! String.prototype.endsWith ) {
			String.prototype.endsWith = function(searchString, position) {
				var subjectString = this.toString();
				if (position === undefined || position > subjectString.length) {
					position = subjectString.length;
				}
				position -= searchString.length;
				var lastIndex = subjectString.indexOf(searchString, position);
				return lastIndex !== -1 && lastIndex === position;
			};
		}
	}
	
	function initPreloader() {
		// delay click to allow on page leave screen
		$( 'body.bodyPreloader .mainHeader .menu' ).unbind('click').on( 'click', 'a', function() {
			var href = $( this ).attr( 'href' );
			if ( 
				href !== undefined && 
				! href.startsWith( '#' ) && 
				! href.startsWith( 'mailto' ) &&  
				! href.startsWith( 'callto' ) && 
				! $( this ).hasClass( 'lightbox' ) && 
				! $( this ).hasClass( 'add_to_cart_button' ) && 
				$( this ).attr( 'target' ) != '_blank'
			) {
				$( 'body' ).removeClass( 'btRemovePreloader' );
				setTimeout( function() { window.location = href }, 750 );
				return false;
			}
		});
	}
	
	function initRefreshCart() {
		$( '.cart-contents' ).each(function() {
			bt_refresh_cart();
		});
	}
	
	function initTheme() {
		initFancySelect();
		initFooter();
		initModernizrAndDetectBrowser();
		initPreloader();
		initRefreshCart();
		loadInitActions();
	}
	
	// LOAD
	$( window ).load(function() {
		loadInitActions();
	});
	
	// READY
	
	$( document ).ready(function() {
		initRefreshCart();
	});

	initFancySelect();
	initFooter();
	initModernizrAndDetectBrowser();
	initPreloader();
	
	bt_initTheme = initTheme;
  
})( jQuery );

