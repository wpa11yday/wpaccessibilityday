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

			label.html( '<span class="localtime">' + userTime + ' on ' + userDate + ' <span class="timezone">(' + zone + ')</span></span>' );
		});
		/**
		 * Render volunteer application input times to local timezones.
		 */
		$( '#input_5_21 .gfield-choice-input' ).each( function( index ) {
			var id          = $( this ).attr( 'id' );
			var label       = $( 'label[for=' + id + ']' );
			var labelText   = label.text();
			var labelParts  = labelText.split( ' – ' );
			var labelTimeA  = labelParts[0].replace( ' UTC', '' ).split( ':' )[0];
			let dateA;
			if ( labelTimeA > 15 && labelTimeA < 24 ) {
				dateA = 15; // First day of event.
			} else {
				dateA = 16; // Second day of event. 
			}
			let labelTimeB = parseInt( labelTimeA ) + 3;
			if ( labelTimeB > 24 ) {
				labelTimeB = labelTimeB - 24;
			}
			let dateB;
			if ( labelTimeB > 15 && labelTimeB < 24 ) {
				dateB = 15;
			} else {
				dateB = 16;
			}

			let time1 = ( labelTimeA.length === 1 ) ? '0' + labelTimeA : labelTimeA;
			var date1 = '2025-10-' + dateA + 'T' + time1  + ':00:00Z';
			let time2 = ( labelTimeB.toString().length === 1 ) ? '0' + labelTimeB : labelTimeB;
			var date2 = '2025-10-' + dateB + 'T' + time2 + ':00:00Z';
			console.log( date1 + ' ' + date2 );
			var utc1   = Date.parse( date1 );
			var utc2  = Date.parse( date2 );

			var userTime = new Date( utc1 ).toLocaleTimeString().replace( ':00', '' );
			var userDate = new Date( utc1 ).toLocaleDateString();
			var userTime2 = new Date( utc2 ).toLocaleTimeString().replace( ':00', '' );
			var userDate2 = new Date( utc2 ).toLocaleDateString();
			if ( userDate === userDate2 ) {
				label.html( '<span class="localtime">' + userTime + ' to ' + userTime2 + ' on ' + userDate + ' (' + zone + ')</span>' );
			} else {
				console.log( userDate + ' ' + userDate2 );
				label.html( '<span class="localtime">' + userTime + ' on ' + userDate + ' to ' + userTime2 + ' on ' + userDate2 + ' <span class="timezone">(' + zone + ')</span></span>' );
			}
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