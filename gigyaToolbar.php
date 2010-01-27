<?php
/*
Plugin Name: Gigya Toolbar for WordPress
Plugin URI: http://wiki.gigya.com/030_Gigya_Socialize_API_2.0/Social_Toolbar
Description: This plugin integrate the Gigya Toolbar into your blog quickly and easily.
Author: Gigya
Version: 1.0.7
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
		var $defaults = array( 'gigya-toolbar-for-wordpress-partner-id' => '825901', 'gigya-toolbar-for-wordpress-status-text' => 'reading %TITLE% at %URL%', 'gigya-toolbar-for-wordpress-email-subject' => 'Nice article - %TITLE%', 'gigya-toolbar-for-wordpress-email-body' => 'Take a look at this article - <a href=\'%URL%\'>%TITLE%</a> from %SITENAME%', 'gigya-toolbar-for-wordpress-welcome-text' => 'Use the toolbar below to stay updated and to share stuff from this site on Facebook, Twitter and more.' );

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
		var $version = '1.0.7';

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

		function activation_notice_new(){
						if(function_exists('admin_url')){
						echo '<div class="error fade" style="background-color:red;"><p><strong>You need to configure your API Key to use Gigya Toolbar. Go to <a href="' . admin_url( 'options-general.php?page=gigya-toolbar' ) . '">the admin page</a> to configure the plugin.</strong></p></div>';
		}else{
				echo '<div class="error fade" style="background-color:red;"><p><strong>You need to configure your API Key to use Gigya Toolbar. Go to <a href="' . get_option('siteurl') . 'options-general.php?page=gigya-toolbar' . '">the admin page</a> to configure the plugin.</strong></p></div>';
		}
		}

		function activation_notice_update(){
				if(function_exists('admin_url')){
				echo '<div class="error fade" style="background-color:red;"><p><strong>Gigya Toolbar now requires an API Key. Go to <a href="' . admin_url( 'options-general.php?page=gigya-toolbar' ) . '">the admin page</a> to enable and configure the plugin.</strong></p></div>';
		}else{
			echo '<div class="error fade" style="background-color:red;"><p><strong>Gigya Toolbar now requires an API Key. Go to <a href="' . get_option('siteurl') . 'options-general.php?page=gigya-toolbar' . '">the admin page</a> to configure the plugin.</strong></p></div>';
		}
		}

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
			if( ($settings[ 'gigya-toolbar-for-wordpress-api-key' ] == null))
			{
				if ( $settings[ 'gigya-toolbar-for-wordpress-partner-id' ] == null )
				{
					add_action( 'admin_notices', array( &$this, 'activation_notice_new' ));
				}
				else 
				{
					add_action( 'admin_notices', array( &$this, 'activation_notice_update' ));
				}
			}

			if( is_admin( ) && isset( $_POST[ 'save-gigya-toolbar-for-wordpress-settings' ] ) && check_admin_referer( 'save-gigya-toolbar-for-wordpress-settings' ) ) {
				$settings[ 'gigya-toolbar-for-wordpress-api-key' ] = trim( htmlentities( strip_tags( stripslashes( $_POST[ 'gigya-toolbar-for-wordpress-api-key' ] ) ) ) );
				$settings[ 'gigya-toolbar-for-wordpress-partner-id' ] = trim( htmlentities( strip_tags( stripslashes( $_POST[ 'gigya-toolbar-for-wordpress-partner-id' ] ) ) ) );
				$settings[ 'gigya-toolbar-for-wordpress-status-text' ] = strip_tags( stripslashes( $_POST[ 'gigya-toolbar-for-wordpress-status-text' ] ), '<a><img><div><span><strong><em><b><i>' );
				$settings[ 'gigya-toolbar-for-wordpress-email-subject' ] = strip_tags( stripslashes( $_POST[ 'gigya-toolbar-for-wordpress-email-subject' ] ), '<a><img><div><span><strong><em><b><i>' );
				$settings[ 'gigya-toolbar-for-wordpress-email-body' ] = strip_tags( stripslashes( $_POST[ 'gigya-toolbar-for-wordpress-email-body' ] ), '<a><img><div><span><strong><em><b><i>' );
				$settings[ 'gigya-toolbar-for-wordpress-welcome-text' ] = strip_tags( stripslashes( $_POST[ 'gigya-toolbar-for-wordpress-welcome-text' ] ), '<a><img><div><span><strong><em><b><i>' );
				$settings[ 'gigya-toolbar-for-wordpress-rss-url' ] = trim( htmlentities( strip_tags( stripslashes( $_POST[ 'gigya-toolbar-for-wordpress-rss-url' ] ) ) ) );
				$settings[ 'gigya-toolbar-for-wordpress-twitter-name' ] = trim( htmlentities( strip_tags( stripslashes( $_POST[ 'gigya-toolbar-for-wordpress-twitter-name' ] ) ) ) );
				$settings[ 'gigya-toolbar-for-wordpress-facebook-pageid' ] = trim( htmlentities( strip_tags( stripslashes( $_POST[ 'gigya-toolbar-for-wordpress-facebook-pageid' ] ) ) ) );
				$settings[ 'gigya-toolbar-for-wordpress-theme' ] = trim( htmlentities( strip_tags( stripslashes( $_POST[ 'gigya-toolbar-for-wordpress-theme' ] ) ) ) );
				$settings[ 'gigya-toolbar-for-wordpress-hide-search' ] = trim( htmlentities( strip_tags( stripslashes( $_POST[ 'gigya-toolbar-for-wordpress-hide-search' ] ) ) ) );
				$settings[ 'gigya-toolbar-for-wordpress-enable-welcome' ] = trim( htmlentities( strip_tags( stripslashes( $_POST[ 'gigya-toolbar-for-wordpress-enable-welcome' ] ) ) ) );

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
				if( !isset( $this->settings[ 'gigya-toolbar-for-wordpress-welcome-text' ] ) || empty( $this->settings[ 'gigya-toolbar-for-wordpress-welcome-text' ] ) ) {
					$this->settings[ 'gigya-toolbar-for-wordpress-welcome-text' ] = __( 'Use the toolbar below to stay updated and to share stuff from this site on Facebook, Twitter and more.' );
				}
				if( !isset( $this->settings[ 'gigya-toolbar-for-wordpress-rss-url' ] ) || empty( $this->settings[ 'gigya-toolbar-for-wordpress-rss-url' ] ) ) {
					$this->settings[ 'gigya-toolbar-for-wordpress-rss-url' ] = get_bloginfo( 'rss2_url' );
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