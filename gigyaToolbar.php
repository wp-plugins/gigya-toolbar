<?php
/*
Plugin Name: Gigya Toolbar for WordPress
Plugin URI: http://gigya.com
Description: This plugin integrate the Gigya Toolbar into your blog quickly and easily.
Author: Gigya
Version: 1.0.1
Author URI: http://gigya.com
*/

if( !class_exists( 'GigyaToolbarForWordPress' ) ) {

	class GigyaToolbarForWordPress {

		// SETTINGS


		/**
		 * Associative array of languages and language codes.
		 *
		 * @var array
		 */
		var $languages = array();

		/**
		 * Default settings for the plugin.  These settings are used when no settings have yet been saved by the user.
		 *
		 * @var array
		 */
		var $defaults = array( 'gigya-toolbar-for-wordpress-partner-id' => '671981', 'gigya-toolbar-for-wordpress-status-text' => 'reading %TITLE% at %URL%', 'gigya-toolbar-for-wordpress-email-subject' => 'Nice article - %TITLE%', 'gigya-toolbar-for-wordpress-email-body' => 'Take a look at this article - <a href=\'%URL%\'>%TITLE%</a> from %SITENAME%' );

		/**
		 * Array of items that need to get rendered via JavaScript.
		 *
		 * @var array
		 */
		var $needToRender = array();

		// MISC


		/**
		 * A string containing the version for this plugin.  Always update this when releaseing a new version.
		 *
		 * @var string
		 */
		var $version = '1.0.1';

		/**
		 * Adds all the appropriate actions and filters.
		 *
		 * @return GigyaToolbarForWordPress
		 */
		function GigyaToolbarForWordPress() {
			register_deactivation_hook( __FILE__, array( &$this, 'deleteSettings' ) );
			add_action( 'admin_menu', array( &$this, 'addAdministrativePage' ) );
			add_action( 'init', array( &$this, 'savePluginSettings' ) );
			add_action( 'wp_footer', array( &$this, 'displayRenderingPage' ) );
		}

		/// CALLBACKS


		/**
		 * Registers a new administrative page which displays the settings panel.
		 *
		 */
		function addAdministrativePage() {
			add_options_page( __( 'Gigya Toolbar' ), __( 'Gigya Toolbar' ), 'manage_options', 'gigya-toolbar', array( $this, 'displaySettingsPage' ) );
		}

		/**
		 * Attempts to intercept a POST request that is saving the settings for the GS for WordPress plugin.
		 *
		 */
		function savePluginSettings() {
			$settings = $this->getSettings( );
			if( is_admin( ) && isset( $_POST[ 'save-gigya-toolbar-for-wordpress-settings' ] ) && check_admin_referer( 'save-gigya-toolbar-for-wordpress-settings' ) ) {
				$settings[ 'gigya-toolbar-for-wordpress-partner-id' ] = trim( htmlentities( strip_tags( stripslashes( $_POST[ 'gigya-toolbar-for-wordpress-partner-id' ] ) ) ) );
				$settings[ 'gigya-toolbar-for-wordpress-status-text' ] = strip_tags( stripslashes( $_POST[ 'gigya-toolbar-for-wordpress-status-text' ] ), '<a><img><div><span><strong><em><b><i>' );
				$settings[ 'gigya-toolbar-for-wordpress-email-subject' ] = strip_tags( stripslashes( $_POST[ 'gigya-toolbar-for-wordpress-email-subject' ] ), '<a><img><div><span><strong><em><b><i>' );
				$settings[ 'gigya-toolbar-for-wordpress-email-body' ] = strip_tags( stripslashes( $_POST[ 'gigya-toolbar-for-wordpress-email-body' ] ), '<a><img><div><span><strong><em><b><i>' );
				$this->saveSettings( $settings );
				wp_redirect( 'options-general.php?page=gigya-toolbar&updated=true' );
				exit( );
			}
		}

		/// DISPLAY

		/**
		 * Includes the necessary inline JavaScript that will render all the appropriate divs.
		 *
		 */
		function displayRenderingPage() {
			echo('<!-- Gigya Toolbar -->');
			include 'views/rendering-script.php';
		}

		/**
		 * Outputs the correct HTML for the settings page.
		 *
		 */
		function displaySettingsPage() {
			include ( 'views/settings.php' );
		}

		/// SETTINGS


		/**
		 * Removes the settings for the Gigya Toolbar for WordPress plugin from the database.
		 *
		 */
		function deleteSettings() {
			delete_option( 'Gigya Toolbar Settings' );
		}

		/**
		 * Returns the settings for the Gigya Toolbar for WordPress plugin.
		 *
		 * @return array An associative array of settings for the Gigya Toolbar for WordPress plugin.
		 */
		function getSettings() {
			if( $this->settings === null ) {
				$this->settings = get_option( 'Gigya Toolbar Setting', $this->defaults );
				if( !isset( $this->settings[ 'gigya-toolbar-for-wordpress-status-text' ] ) || empty( $this->settings[ 'gigya-toolbar-for-wordpress-status-text' ] ) ) {
					$this->settings[ 'gigya-toolbar-for-wordpress-status-text' ] = __( 'reading %TITLE% at %URL%' );
				}
				if( !isset( $this->settings[ 'gigya-toolbar-for-wordpress-email-subject' ] ) || empty( $this->settings[ 'gigya-toolbar-for-wordpress-email-subject' ] ) ) {
					$this->settings[ 'gigya-toolbar-for-wordpress-email-subject' ] = __( 'Nice article - %TITLE%' );
				}
				if( !isset( $this->settings[ 'gigya-toolbar-for-wordpress-email-body' ] ) || empty( $this->settings[ 'gigya-toolbar-for-wordpress-email-body' ] ) ) {
					$this->settings[ 'gigya-toolbar-for-wordpress-email-body' ] = __( 'Take a look at this article - <a href=\'%URL%\'>%TITLE%</a> from %SITENAME%' );
				}
			}
			return $this->settings;
		}

		/**
		 * Saves the settings for the Gigya Toolbar for WordPress plugin.
		 *
		 * @param array $settings An array of settings for the Gigya Toolbar for WordPress plugin.
		 */
		function saveSettings( $settings ) {
			$this->settings = $settings;
			update_option( 'Gigya Toolbar Setting', $this->settings );
		}
	}
}

if( class_exists( 'GigyaToolbarForWordPress' ) ) {
	$gwfw = new GigyaToolbarForWordPress( );
}