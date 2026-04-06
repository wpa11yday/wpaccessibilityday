/**
 * Handle dark/light toggle.
 */
/* global themeColorScheme */

document.addEventListener( 'DOMContentLoaded', () => {
	const prefersDarkScheme = window.matchMedia("(prefers-color-scheme: dark)").matches;
	const modeButton = document.querySelector('button[aria-label="Enable dark mode"]');
	const colorSchemeCookieName = 'wpadColorScheme';
	const themeStyleSheet = document.getElementById('wp-accessibility-day-event-css');
	const head = themeStyleSheet.parentNode;
	const darkModeStyleSheet = document.createElement('link');
	const highContrastStyleSheet = document.createElement('link');
	const logo = document.querySelector( '.site-branding img' );
	const lockup = document.querySelector( '.lockup img' );


	darkModeStyleSheet.setAttribute('rel', 'stylesheet');
	darkModeStyleSheet.setAttribute('id', 'wp-accessibility-day-dark-css-toggle');
	darkModeStyleSheet.setAttribute('href', themeColorScheme.darkstylesheet );
	darkModeStyleSheet.setAttribute('type', 'text/css');
	darkModeStyleSheet.setAttribute('media', 'all');

	highContrastStyleSheet.setAttribute('rel', 'stylesheet');
	highContrastStyleSheet.setAttribute('id', 'wp-accessibility-day-dark-css-toggle');
	highContrastStyleSheet.setAttribute('href', themeColorScheme.hcstylesheet );
	highContrastStyleSheet.setAttribute('type', 'text/css');
	highContrastStyleSheet.setAttribute('media', 'all');

	/**
	 * Get the value of a cookie
	 * Source: https://gist.github.com/wpsmith/6cf23551dd140fb72ae7
	 * @param  {String} name  The name of the cookie
	 * @return {String}       The cookie value
	 */
	const getCookie = (name) => {
		let value = `; ${document.cookie}`;
		let parts = value.split(`; ${name}=`);
		if (parts.length === 2) return parts.pop().split(';').shift();
	}

	/**
	 * Set a cookie with default length of one year.
	 *
	 * @param {String} name 
	 * @param {String} value 
	 * @param {Number} days 
	 */
	const setCookie = (name, value, days = 365) => {
		document.cookie = `${name}=${value}; path=/; max-age=${60 * 60 * 24 * days};`;
	}

	/**
	 * Toggles the active/pressed state of the buttons.
	 *
	 * @param {HTMLElement} active element
	 * @param {string} state 
	 */
	const toggleButton = (active, state) => {
		active.setAttribute('aria-pressed', state);
	}

	/**
	 * Checks if the user requested high contrast.
	 *
	 * @returns {Boolean}
	 */
	const isHighContrast = () => {
		const mediaQueryList = matchMedia('(forced-colors: active)');
		const prefersContrast = matchMedia("(prefers-contrast: more)");
		return mediaQueryList.matches || prefersContrast.matches;
	}

	/**
	 * Switches the stylesheet.
	 *
	 * @param {String} action 
	 */
	const toggleStyle = (action = 'add') => {
		switch (action) {
			case 'remove':
				head.removeChild(darkModeStyleSheet);
				logo.setAttribute( 'src', themeColorScheme.lightModeLogo );
				lockup.setAttribute( 'src', themeColorScheme.lightModeLockup );
			break;
			default:
				head.insertBefore(darkModeStyleSheet, themeStyleSheet.nextSibling)
				logo.setAttribute( 'src', themeColorScheme.darkModeLogo );
				lockup.setAttribute( 'src', themeColorScheme.darkModeLockup );

		}
	}

	const colorschemeCookie = getCookie(colorSchemeCookieName);

	// Update the active state.
	if ('dark' === colorschemeCookie || (! colorschemeCookie && prefersDarkScheme)) {
		toggleButton(modeButton, 'true');
		toggleStyle();
		
		highContrastStyleSheet.setAttribute('href', themeColorScheme.hcdarkstylesheet );
	}

	if (isHighContrast()) {
		head.appendChild(highContrastStyleSheet);
	}

	modeButton.addEventListener('click', (e) => {
		e.preventDefault();

		if ('true' === modeButton.getAttribute('aria-pressed')) {
			toggleButton(modeButton,'false');
			toggleStyle('remove');
			setCookie(colorSchemeCookieName, 'light');
			highContrastStyleSheet.setAttribute('href', themeColorScheme.hcstylesheet );
		} else if ('false' === modeButton.getAttribute('aria-pressed')) {
			toggleButton(modeButton, 'true');
			toggleStyle();
			setCookie(colorSchemeCookieName, 'dark');
			highContrastStyleSheet.setAttribute('href', themeColorScheme.hcdarkstylesheet );
		}
	});
});
