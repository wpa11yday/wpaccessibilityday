/**
 * Scripts to run when in WordPress Gutenberg editor
 * 
 * Unregister any block styles we don't want user to be able to select
 * or register our own custom block styles.
 */
wp.domReady( () => {
    // Unregister any block styles we don't want user to be able to select
    wp.blocks.unregisterBlockStyle( 'core/button', 'outline' );
    
    // Add custom block styles:
    wp.blocks.registerBlockStyle("core/button", {
      name: "button-underline",
      label: "Underline"
    });

} );