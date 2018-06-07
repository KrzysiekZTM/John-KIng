'use strict';

var bt_initHeader;

(function( $ ) {
	
	var hasCentralMenu, verticalMenuEnabled, belowMenu, btStickyEnabled
	
	function initial_header_setup() {
		
		hasCentralMenu = $( 'body' ).hasClass( 'btMenuCenterEnabled' );
		verticalMenuEnabled = $( 'body' ).hasClass( 'btMenuVerticalLeftEnabled' ) || $( 'body' ).hasClass( 'btMenuVerticalRightEnabled' );
		
		belowMenu = $( 'body' ).hasClass( 'btBelowMenu' );
		btStickyEnabled = $( 'body' ).hasClass( 'btStickyEnabled' );
		
		if ( typeof window.btStickyOffset == 'undefined' ) window.btStickyOffset = 250;
		if ( typeof window.responsiveResolution == 'undefined' ) window.responsiveResolution = '1200';
	}
	
	function final_header_setup() {
		
		$( 'li.btMenuWideDropdown' ).addClass(function(){
			return 'btMenuWideDropdownCols-' + $( this ).children( 'ul' ).children( 'li' ).length;
		});
	
		$( 'li.btMenuWideDropdown' ).each(function() {
			var maxChildItems = 0;
			$( this ).find( '> ul > li > ul' ).each(function( index ) {
				if ( $( this ).children().length > maxChildItems ) {
					maxChildItems = $( this ).children().length;
				}
			});
			$( this ).find( '> ul > li > ul' ).each(function( index ) {
				var bt_menu_base_length = $( this ).children().length;
				if ( bt_menu_base_length < maxChildItems ) {
					for ( var i = 0; i < maxChildItems - bt_menu_base_length; i++ ) {
						$( this ).append( '<li><a class="btEmptyElement">&nbsp;</a></li>' );
					} 
				}
			});
		});

		/* Show hide menu */

		$( '.btHorizontalMenuTrigger' ).on( 'click', function () {
			$( 'body' ).toggleClass( 'btShowMenu' );
			return false;
		});

		/* responsive menu toggler */

		$( '.btVerticalMenuTrigger' ).on( 'click', function () {
			$( 'body' ).toggleClass( 'btMenuVerticalOn' );
			return false;
		});
	}
	
	function top_tools_search() {
		/* Top tools search */
		
		//if (!$('.btSearchInner.btFromTopBox').length ) {
			$('.mainHeader .btSearchInner').prependTo('body').addClass( 'btFromTopBox' );
		//}
		
		$('.mainHeader .widget_search').addClass( 'btIconWidget' );
		$( '.mainHeader .btSearch, .btFromTopBox .btSearchInnerClose' ).on( 'click', function () {
			$( 'body' ).toggleClass( 'btTopToolsSearchOpen' );
			return false;
		});

	}

	function divide_menu() {

		if ( $( '.btTextLogo' ).length ) {
			var logoWidth = $( '.mainHeader .logo' ).width();
		} else  {
			var logoWidth = $( '.mainHeader .logo' ).height() * $( '.mainHeader .logo .btMainLogo' ).data( 'hw' );
		}

		$( '.menuPort nav' ).addClass( 'leftNav' );
		$( '.menuPort' ).append( '<nav class="rightNav"><ul></ul></nav>' );
		var halfItems = Math.ceil( $( '.menuPort nav.leftNav ul>li:not(li li)' ).length * .5 );
		$( '.menuPort nav.rightNav > ul' ).append( $( '.menuPort nav.leftNav > ul > li' ).slice ( halfItems ) );
		$( '.menuPort nav.leftNav > ul > li' ).slice( halfItems ).remove();
		
		$( '.mainHeader .logo' ).css( 'transform', 'translateX(' + Math.round(-logoWidth * .5) + 'px)' );
		$( '.mainHeader .logo' ).css( 'width', logoWidth + 'px' );
		$( '.menuPort nav.leftNav' ).css( 'margin-right', Math.round(logoWidth * .5) + 'px' );
		$( '.menuPort nav.rightNav' ).css( 'margin-left', Math.round(logoWidth * .5) + 'px' );
	}
	
	/* Activate sticky function and call */
	
	function boldthemes_activate_sticky() {
		var fromTop = $( window ).scrollTop();
		if ( fromTop > window.btStickyOffset ) {
			if ( $('body').hasClass('btStickyHeaderActive') ) return false;
			$( 'body' ).addClass( 'btStickyHeaderActive' );
			setTimeout( function() { $( 'body' ).addClass( 'btStickyHeaderOpen' ) }, 500 );
		} else {
			if ( !$('body').hasClass('btStickyHeaderActive') ) return false;
			$( 'body' ).addClass( 'btStickyHeaderClosed' );
			setTimeout( function() { $( 'body' ).removeClass( 'btStickyHeaderActive btStickyHeaderOpen btStickyHeaderClosed' ) }, 250 );
		}
	}
	
	/* Vertical menu setup */
	
	function responsive_menu_handler() {
		if ( !verticalMenuEnabled ) {
			$(window).on("resize", function(event){
				if( window.innerWidth < window.responsiveResolution ) {
					$( 'body' ).addClass( 'btMenuVerticalLeft btMenuVertical' ).removeClass( 'btMenuHorizontal' );
				} else {
					$( 'body' ).removeClass( 'btMenuVertical btMenuVerticalLeft btMenuVerticalOn' ).addClass( 'btMenuHorizontal' );				
				}
				boldthemes_calculate_content_padding();
			});	
		}
	}

	function init_menu() {
            		
		initial_header_setup();
		
		if ( verticalMenuEnabled ) {
			if ( $( 'body' ).hasClass( 'btMenuVerticalLeftEnabled' )) $( 'body' ).addClass( 'btMenuVerticalLeft btMenuVertical' );
			if ( $( 'body' ).hasClass( 'btMenuVerticalRightEnabled' )) $( 'body' ).addClass( 'btMenuVerticalRight btMenuVertical' );
		} else {
			if ( $( 'body' ).hasClass( 'btMenuRightEnabled' )) $( 'body' ).addClass( 'btMenuRight btMenuHorizontal' );
			if ( $( 'body' ).hasClass( 'btMenuLeftEnabled' )) $( 'body' ).addClass( 'btMenuLeft btMenuHorizontal' );
			if ( $( 'body' ).hasClass( 'btMenuCenterBelowEnabled' )) $( 'body' ).addClass( 'btMenuCenterBelow btMenuHorizontal' );
			if ( $( 'body' ).hasClass( 'btMenuCenterEnabled' )) $( 'body' ).addClass( 'btMenuCenter btMenuHorizontal' );
			/* Switch to vertical */
			if( window.innerWidth < window.responsiveResolution ) {
				$( 'body' ).addClass( 'btMenuVerticalLeft btMenuVertical' ).removeClass( 'btMenuHorizontal' );
			} else {
				$( 'body' ).removeClass( 'btMenuVertical btMenuVerticalLeft btMenuVerticalOn' ).addClass( 'btMenuHorizontal' );				
			}
		}	
			
		// Move content below menu, must be donne after menu switch
		if ( ! belowMenu ) {
			boldthemes_calculate_content_padding();
		}
		
		setTimeout( function() { $( 'body' ).addClass( 'btMenuInitFinished' ); }, 100 );
		
		if ( btStickyEnabled ) {
			setTimeout( function() { 
				$( window ).scroll(function(){
					boldthemes_activate_sticky();
				});
			}, 1000 );
		}
		
		/* Menu split */
		
		if ( hasCentralMenu ) divide_menu();

		/* Menu sub togglers */
		
		$( '.menuPort ul ul' ).parent().prepend( '<div class="subToggler"></div>');

		$( '.menuPort ul li' ).on( 'mouseenter mouseleave', function (e) {
			if ( $( 'body' ).hasClass( 'btMenuVertical' ) || $( 'html' ).hasClass( 'touch' ) ) {
				return false;
			}
			e.preventDefault();
			$( this ).siblings().removeClass( 'on' );
			$( this ).toggleClass( 'on' );
		});

		$( 'div.subToggler' ).on( 'click', function(e) {
			var parent = $( this ).parent();
			parent.siblings().removeClass( 'on' );
			parent.toggleClass( 'on' );
			if ( $( 'body' ).hasClass( 'btMenuVertical' ) ) {
				parent.find( 'ul' ).first().slideToggle( 200 );
			}
			return false;
		});
		
		final_header_setup();
		
	}
	
	/* Calculate content padding for not below menu */
	
	function boldthemes_calculate_content_padding() {
		if ( ! belowMenu ) {
			if( $( window ).width() < window.responsiveResolution || verticalMenuEnabled ) {
				$( '.btContentWrap' ).css( 'padding-top', $( '.btVerticalHeaderTop' ).height() +'px');
			} else if ( !$( 'body' ).hasClass( 'btStickyHeaderActive' ) ) {
				$( '.btContentWrap' ).css( 'padding-top', $( '.mainHeader' ).height() +'px');
			}	
		}
	}

	function reinit_menu() {
		top_tools_search();
		setTimeout(function(){ init_menu(); }, 100);
		boldthemes_calculate_content_padding();
	}

	$( window ).on( "load", function() { 
		boldthemes_calculate_content_padding();
	});	
	
	bt_initHeader = reinit_menu;
	top_tools_search();
	init_menu();
	responsive_menu_handler();
	
	
})( jQuery );