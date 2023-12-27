/**
 * Merges menus on mobile into one for better UX
 */
export default function combineMenusOnMobile() {
	const hasSocialIcons = newspiper_customizer_object.show_top_bar_icons_mobile;
	const mediaQuery = window.matchMedia( '(max-width: 54rem)' );
	function configureMenus() {
		if ( ! document.getElementById( 'top-navigation' ) ) {
			return;
		}
		const topMenu = document.getElementById( 'top-navigation' );
		const topMenuUl = topMenu.getElementsByTagName( 'ul' )[ 0 ];
		const topMenuItems = topMenuUl.querySelectorAll( ':scope > li' );
		const primaryMenu = document.getElementById( 'primary-menu' );
		if ( mediaQuery.matches ) {
			//combine menus
			for ( let i = 0; i < topMenuItems.length; i++ ) {
				if ( ! hasSocialIcons && topMenuItems[ i ].className.indexOf( 'social-icon' ) > -1 ) {
					continue;
				}
				topMenuItems[ i ].classList.add( 'moved-item' );
				primaryMenu.append( topMenuItems[ i ] );
			}
			//hide secondary menu
			topMenu.style.display = 'none';
		} else {
			const movedItems = primaryMenu.querySelectorAll( '.moved-item' );
			//show secondary menu
			topMenu.style.display = 'flex';
			//split menus
			for ( let i = 0; i < movedItems.length; i++ ) {
				movedItems[ i ].remove();
				topMenuUl.append( movedItems[ i ] );
			}
		}
	}

	document.addEventListener( 'DOMContentLoaded', configureMenus );
	// this is better than the resize listener, as it executes only on the specific viewport width
	mediaQuery.addEventListener( 'change', function() {
		configureMenus();
	} );
}
