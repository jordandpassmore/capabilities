/**
 * extrafunctions.js
 *For Jquery functions
 */

( function( $ ) {
    $('.team-member-index-item').hover(function(){
        $('.team-member-name', this).toggle();
        console.log('heyo');
    });
} )( jQuery );
