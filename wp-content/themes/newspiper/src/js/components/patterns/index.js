
export function newsletterAnimation() {
	// Get the <figure> element by class name
	const figureElement = document.querySelector( '.newsletter-pattern .wp-block-image' );

	if ( ! figureElement ) {
		return;
	}

	// Create the <div> element with the desired HTML content
	const divElement = document.createElement( 'div' );
	divElement.className = 'lines';
	divElement.innerHTML = '<small></small>';

	// Insert the <div> element as the next sibling of the <figure> element
	figureElement.parentNode.insertBefore( divElement, figureElement.nextSibling );
}
