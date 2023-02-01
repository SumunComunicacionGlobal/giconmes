/* Storing user's device details in a variable*/
const details = navigator.userAgent;

/* Creating a regular expression
containing some mobile devices keywords
to search it in details string*/
const regexp = /android|iphone|kindle|ipad/i;

/* Using test() method to search regexp in details
it returns boolean value*/
const isMobileDevice = regexp.test( details );

/*

An accessible menu for WordPress
https://github.com/argenteum/accessible-nav-wp

Licensed GPL v.2 (http://www.gnu.org/licenses/gpl-2.0.html)

*/

( function( $ ) {
	const menuContainer = $( '#menu-container' );
	const menuToggle = $( '.menu-toggle' );
	const searchToggle = $( '.search-toggle' );
	const siteHeaderMenu = menuContainer.find( '#site-header-menu' );
	const siteNavigation = menuContainer.find( '#site-navigation' );

	// If you are using WordPress, and do not need to localise your script, or if you are not using WordPress, then uncomment the next line
	const screenReaderText = { expand: 'Expand child menu', collapse: 'Collapse child menu' };

	const dropdownToggle = $( '<button />', { class: 'dropdown-toggle', 'aria-expanded': false } )
		.append( $( '<span />', { class: 'screen-reader-text', text: screenReaderText.expand } ) );

	// Toggles the menu button
	( function() {
		if ( ! menuToggle.length ) {
			return;
		}

		menuToggle.add( siteNavigation ).attr( 'aria-expanded', 'false' );

		menuToggle.on( 'click', function() {
			$( this ).add( siteHeaderMenu ).toggleClass( 'toggled-open' );
			$( this ).add( '#site-header' ).toggleClass( 'site-header--open' );

			if ( isMobileDevice ) {
				$( siteHeaderMenu ).slideToggle( 300 );
			} else {
				$( siteHeaderMenu ).slideToggle( {
					start() {
						$( this ).css( 'display', 'grid' );
					},
				} );
			}

			// jscs:disable
			$( this ).add( siteNavigation )
				.attr( 'aria-expanded', $( this )
					.add( siteNavigation ).attr( 'aria-expanded' ) === 'false' ? 'true' : 'false' );
			// jscs:enable
		} );
	}() );

	// Show the search bar when click on button
	searchToggle.on( 'click', function() {
		$( this ).add( '#topbar' ).toggleClass( 'search-bar--open' );
		$( '#search-bar' ).slideToggle( 300 );
	} );

	// Adds the dropdown toggle button
	$( '.menu-item-has-children > a' ).after( dropdownToggle );

	// Adds aria attribute
	siteHeaderMenu.find( '.menu-item-has-children' ).attr( 'aria-haspopup', 'true' );

	// Adds a class to sub-menus for styling
	$( '.sub-menu .menu-item-has-children' ).parent( '.sub-menu' ).addClass( 'has-sub-menu' );

	// Toggles the sub-menu when dropdown toggle button clicked
	siteHeaderMenu.find( '.dropdown-toggle' ).click( function( e ) {
		const screenReaderSpan = $( this ).find( '.screen-reader-text' );

		e.preventDefault();
		$( this ).toggleClass( 'toggled-on' );

		$( this ).nextAll( '.sub-menu' ).slideToggle( 300 );
		$( this ).nextAll( '.sub-menu' ).toggleClass( 'toggled-on' );

		// jscs:disable
		$( this ).attr( 'aria-expanded', $( this ).attr( 'aria-expanded' ) === 'false'
			? 'true' : 'false' );
		// jscs:enable
		screenReaderSpan.text( screenReaderSpan.text() ===
        screenReaderText.expand ? screenReaderText.collapse
			: screenReaderText.expand );
	} );

	// Keyboard navigation
	$( '.menu-item a, button.dropdown-toggle' ).on( 'keydown', function( e ) {
		if ( [ 37, 38, 39, 40 ].indexOf( e.keyCode ) === -1 ) {
			return;
		}

		switch ( e.keyCode ) {
			case 37: 				// left key
				e.preventDefault();
				e.stopPropagation();

				if ( $( this ).hasClass( 'dropdown-toggle' ) ) {
					$( this ).prev( 'a' ).focus();
				} else if ( $( this ).parent().prev().children( 'button.dropdown-toggle' ).length ) {
					$( this ).parent().prev().children( 'button.dropdown-toggle' ).focus();
				} else {
					$( this ).parent().prev().children( 'a' ).focus();
				}

				if ( $( this ).is( 'ul ul ul.sub-menu.toggled-on li:first-child a' ) ) {
					$( this ).parents( 'ul.sub-menu.toggled-on li' ).children( 'button.dropdown-toggle' ).focus();
				}

				break;

			case 39: 				// right key
				e.preventDefault();
				e.stopPropagation();

				if ( $( this ).next( 'button.dropdown-toggle' ).length ) {
					$( this ).next( 'button.dropdown-toggle' ).focus();
				} else {
					$( this ).parent().next().children( 'a' ).focus();
				}

				if ( $( this ).is( 'ul.sub-menu .dropdown-toggle.toggled-on' ) ) {
					$( this ).parent().find( 'ul.sub-menu li:first-child a' ).focus();
				}

				break;

			case 40: 				// down key
				e.preventDefault();
				e.stopPropagation();

				if ( $( this ).next().length ) {
					$( this ).next().find( 'li:first-child a' ).first().focus();
				} else {
					$( this ).parent().next().children( 'a' ).focus();
				}

				if ( ( $( this ).is( 'ul.sub-menu a' ) ) && ( $( this ).next( 'button.dropdown-toggle' ).length ) ) {
					$( this ).parent().next().children( 'a' ).focus();
				}

				if ( ( $( this ).is( 'ul.sub-menu .dropdown-toggle' ) ) && ( $( this ).parent().next().children( '.dropdown-toggle' ).length ) ) {
					$( this ).parent().next().children( '.dropdown-toggle' ).focus();
				}

				break;

			case 38: 				// up key
				e.preventDefault();
				e.stopPropagation();

				if ( $( this ).parent().prev().length ) {
					$( this ).parent().prev().children( 'a' ).focus();
				} else {
					$( this ).parents( 'ul' ).first().prev( '.dropdown-toggle.toggled-on' ).focus();
				}

				if ( ( $( this ).is( 'ul.sub-menu .dropdown-toggle' ) ) && ( $( this ).parent().prev().children( '.dropdown-toggle' ).length ) ) {
					$( this ).parent().prev().children( '.dropdown-toggle' ).focus();
				}

				break;
		}
	} );
// eslint-disable-next-line no-undef
}( jQuery ) );

document.addEventListener( 'scroll', function() {
	const distanceFromTop = Math.abs(
		document.body.getBoundingClientRect().top
	);
	const navbarHeight = 96;
	const mastHead = document.getElementById( 'masthead' );

	if ( distanceFromTop >= navbarHeight ) {
		mastHead.classList.add( 'scrolled-on' );
	} else {
		mastHead.classList.remove( 'scrolled-on' );
	}
} );

