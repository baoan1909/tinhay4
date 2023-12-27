import { debounce } from '../components/helpers.js';
import { fixedMenu, stickyHeader } from '../components/sticky-header.js';
import { postLoopAnimation, articlesInViewport, typingAnimation } from '../components/animation.js';
import { darkMode } from '../components/dark-mode.js';
import fixedItems, { backToTop } from '../components/fixed-items.js';

export default function themeOptions() {
	window.addEventListener( 'scroll', debounce( fixedMenu, 10 ) );
	window.addEventListener( 'scroll', debounce( postLoopAnimation, 25 ) );
	window.addEventListener( 'scroll', debounce( fixedItems, 100 ) );
	stickyHeader();
	darkMode();
	backToTop();
	window.addEventListener( 'load', function() {
		articlesInViewport();
		typingAnimation();
	} );
}
