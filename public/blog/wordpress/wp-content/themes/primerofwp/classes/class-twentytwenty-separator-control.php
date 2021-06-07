<?php
/**
 * Customizer Separator Control settings for this theme.
 *
 * @package WordPress
 * @subpackage Primary_of_WP
 * @since 1.0.0
 */

if ( class_exists( 'WP_Customize_Control' ) ) {

	if ( ! class_exists( 'twentytwenty_Separator_Control' ) ) {
		/**
		 * Separator Control.
		 */
		class twentytwenty_Separator_Control extends WP_Customize_Control {
			/**
			 * Render the hr.
			 */
			public function render_content() {
				echo '<hr/>';
			}

		}
	}
}
