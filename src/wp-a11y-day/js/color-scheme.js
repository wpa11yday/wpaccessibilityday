/**
 * Handle dark/light toggle.
 */
/* global wpA11YdayColorScheme */

document.addEventListener( 'DOMContentLoaded', () => {
	const prefersDarkScheme = window.matchMedia("(prefers-color-scheme: dark)").matches;
	const lightModeButton = document.querySelector('button[aria-label="Enable light mode"]');
	const darkModeButton = document.querySelector('button[aria-label="Enable dark mode"]');
	const colorSchemeCookieName = 'wpadColorScheme';
	const themeStyleSheet = document.getElementById('wp-accessibility-day-style-css');
	const head = themeStyleSheet.parentNode;
	const darkModeStyleSheet = document.createElement('link');
	const highContrastStyleSheet = document.createElement('link');


	darkModeStyleSheet.setAttribute('rel', 'stylesheet');
	darkModeStyleSheet.setAttribute('id', 'wp-accessibility-day-dark-css-toggle');
	darkModeStyleSheet.setAttribute('href', wpA11YdayColorScheme.darkstylesheet );
	darkModeStyleSheet.setAttribute('type', 'text/css');
	darkModeStyleSheet.setAttribute('media', 'all');

	highContrastStyleSheet.setAttribute('rel', 'stylesheet');
	highContrastStyleSheet.setAttribute('id', 'wp-accessibility-day-dark-css-toggle');
	highContrastStyleSheet.setAttribute('href', wpA11YdayColorScheme.hcstylesheet );
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
	 * @param {HTMLElement} active 
	 * @param {HTMLElement} inactive 
	 */
	const toggleButton = (active, inactive) => {
		active.setAttribute('aria-pressed', 'true');
		inactive.setAttribute('aria-pressed', 'false');
	}

	/**
	 * Checks if the user is has Inverted Colors on.
	 *
	 * @returns {Boolean}
	 */
	const isUsingMacInvertedColors = () => {
		const mediaQueryList = window.matchMedia('(inverted-colors: inverted)');
		return mediaQueryList.matches;
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
			break;
			default:
				head.insertBefore(darkModeStyleSheet, themeStyleSheet.nextSibling)
		}
	}

	const colorschemeCookie = getCookie(colorSchemeCookieName);

	// Update the active state.
	if ('dark' === colorschemeCookie || (! colorschemeCookie && prefersDarkScheme)) {
		toggleButton(darkModeButton, lightModeButton);
		toggleStyle();
		highContrastStyleSheet.setAttribute('href', isUsingMacInvertedColors ? wpA11YdayColorScheme.hcstylesheet : wpA11YdayColorScheme.hcdarkstylesheet );
	}

	if (isUsingMacInvertedColors() || isHighContrast()) {
		head.appendChild(highContrastStyleSheet);
	}

	lightModeButton.addEventListener('click', (e) => {
		e.preventDefault();

		if ('false' === lightModeButton.getAttribute('aria-pressed')) {
			toggleButton(lightModeButton, darkModeButton);
			toggleStyle('remove');
			setCookie(colorSchemeCookieName, 'light');
			highContrastStyleSheet.setAttribute('href', isUsingMacInvertedColors ? wpA11YdayColorScheme.hcdarkstylesheet : wpA11YdayColorScheme.hcstylesheet );
		}
	});

	darkModeButton.addEventListener('click', (e) => {
		e.preventDefault();

		if ('false' === darkModeButton.getAttribute('aria-pressed')) {
			toggleButton(darkModeButton, lightModeButton);
			toggleStyle();
			setCookie(colorSchemeCookieName, 'dark');
			highContrastStyleSheet.setAttribute('href', isUsingMacInvertedColors ? wpA11YdayColorScheme.hcstylesheet : wpA11YdayColorScheme.hcdarkstylesheet );
		}
	});
});
