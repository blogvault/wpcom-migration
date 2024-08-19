( function () {
	const toggleFoldable = function ( foldableElement ) {
		foldableElement.classList.toggle('wpcom-migration-foldable--expanded');
	}

	const checkInputGroupCheckboxes = function ( inputGroupElement, checked ) {
		inputGroupElement.querySelectorAll( 'input[type="checkbox"]' ).forEach( ( checkboxElement ) => {
			checkboxElement.checked = checked;
		} );
	}

	document.querySelectorAll( '.wpcom-migration-foldable__header' ).forEach( ( element ) => {
		element.addEventListener( 'click', () => toggleFoldable( element.parentElement ) );
	} );

	document.querySelectorAll( 'input.wpcom-migration-select-all' ).forEach( ( checkboxElement ) => {
		checkboxElement.addEventListener( 'change', () => {
			const inputGroupElement = checkboxElement.closest( '.wpcom-migration-input-group' );

			checkInputGroupCheckboxes( inputGroupElement, checkboxElement.checked );
		} );
	} );
} )();
