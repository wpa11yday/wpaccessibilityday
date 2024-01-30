(function ($) {
	'use strict';
	$(function () {
		var zone = Intl.DateTimeFormat().resolvedOptions().timeZone;
		// Handle IE fallback.
		if ( undefined === zone ) {
			zone = 'your local time';
		}
		/**
		 * Render speaker application input times to local timezones.
		 */
		$( '#input_8_36 .gfield-choice-input' ).each( function( index ) {
			var id    = $( this ).attr( 'id' );
			var label = $( 'label[for=' + id + ']' );
			var labelText = label.text();
			if ( -1 !== labelText.indexOf( tz.pointer ) ) {
				var time = labelText.replace( tz.replaceEnd, '' );
				time = ( time.length === 4 ) ? '0' + time : time;
				var date = tz.end + time  + ':00Z';
			} else {
				var time = labelText.replace( tz.replaceStart, '' );
				time = ( time.length === 4 ) ? '0' + time : time;
				var date = tz.start + time + ':00Z';
			}
			var utc   = Date.parse( date );
			var userTime = new Date( utc ).toLocaleTimeString().replace( ':00', '' );
			var userDate = new Date( utc ).toLocaleDateString();

			label.html( '<span class="localtime">' + userTime + ' on ' + userDate + ' (' + zone + ')</span>' );
		});

	var toggleDetails = document.querySelectorAll( '.toggle-details' );
	if ( null !== toggleDetails ) {
		toggleDetails.forEach( (el) => {
			var parentEl = el.closest( '.schedule' );
			var target   = parentEl.querySelector( '.inside' );
			if ( 'false' === el.getAttribute( 'aria-expanded' ) ) {
				target.classList.add( 'hidden' );
			} else {
				parentEl.classList.add( 'active' );
			}
			el.addEventListener( 'click', function(e) {
				var expanded = this.getAttribute( 'aria-expanded' );
				if ( 'true' === expanded ) {
					target.classList.add( 'hidden' );
					parentEl.classList.remove( 'active' );

					this.setAttribute( 'aria-expanded', 'false' );
					this.firstChild.classList.add( 'dashicons-plus' );
					this.firstChild.classList.remove( 'dashicons-minus' );
				} else {
					target.classList.remove( 'hidden' );
					parentEl.classList.add( 'active' );

					this.setAttribute( 'aria-expanded', 'true' );
					this.firstChild.classList.add( 'dashicons-minus' );
					this.firstChild.classList.remove( 'dashicons-plus' );
				}
			});
		});
	}

	var transcript_group = $( '.wp-block-group.transcript' );
	if ( transcript_group ) {
		var summary    = transcript_group.find( 'h2' );
		var details  = transcript_group.find( '.wp-block-group__inner-container' );
		summary.wrap( '<summary></summary>' );
		details.replaceWith( '<details>' + details.html() + '</details>' );
	}

	var emptyLabel = document.querySelector( '#gform_fields_login .gfield_label_before_complex' );
	if ( emptyLabel ) {
		emptyLabel.remove();
	}

	});
}(jQuery));