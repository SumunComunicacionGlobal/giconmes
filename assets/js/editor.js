/* eslint-disable indent */
/* eslint-disable no-undef */
wp.domReady( () => {
	wp.blocks.registerBlockStyle( 'core/list', [
		{
			name: 'default',
			label: 'Default',
			isDefault: true,
		},
		{
			name: 'separator-list',
			label: 'Separador e icono',
		},
		{
			name: 'numbers-list',
			label: 'Números',
		},
		{
			name: 'arrow-list',
			label: 'Flecha simple',
		},
	] );
	wp.blocks.registerBlockStyle( 'core/cover', [
		{
			name: 'default',
			label: 'Default',
			isDefault: true,
		},
		{
			name: 'hero-cover',
			label: 'Hero Cover page',
		},
	] );
	wp.blocks.registerBlockStyle( 'core/columns', [
		{
			name: 'default',
			label: 'Default',
			isDefault: true,
		},
		{
			name: 'no-gap',
			label: 'Sin márgenes',
		},
	] );
	wp.blocks.registerBlockStyle( 'core/button', [
		{
			name: 'theme-link',
			label: 'Simple con icono',
		},
		{
			name: 'with-arrow',
			label: 'Con Flecha',
		},
	] );
	wp.blocks.registerBlockStyle( 'core/paragraph', [
		{
			name: 'default',
			label: 'Default',
			isDefault: true,
		},
		{
			name: 'title-has-image',
			label: 'Imagen integrada',
		},
	] );
} );

/* ADD data space height to wp-block-spacer in gutenberg */
wp.data.subscribe( function() {
	setTimeout( function() {
		const spacerBlocks = document.querySelectorAll( '.wp-block.wp-block-spacer' );

		for ( let item = 0; item < spacerBlocks.length; item++ ) {
			const block = spacerBlocks[ item ];

			const style = getComputedStyle( block ),
				height = parseInt( style.height ) || 0;

			block.querySelector( '.components-resizable-box__container' ).setAttribute( 'data-spaceheight', height + 'px' );
		}
	}, 1 );
} );

