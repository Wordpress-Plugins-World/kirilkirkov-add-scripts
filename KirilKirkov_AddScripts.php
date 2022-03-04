<?php
/*
Plugin Name: Add scripts
Plugin URI: https://github.com/Wordpress-Plugins-World/kirilkirkov-add-scripts
Description: This plugin integrates your scripts to your theme.
Version: 1.0
Author: Kiril Kirkov
Author URI: https://github.com/kirilkirkov/
*/

if(!class_exists('KirilKirkov_AddScripts')) {
	class KirilKirkov_AddScripts 
	{
		private static $instance;

		private function __construct()
		{
			$this->constants();	// Defines any constants used in the plugin
			$this->init();	// Sets up all the actions and filters
		}

		public static function getInstance()
		{
			if ( !self::$instance ) {
				self::$instance = new KirilKirkov_AddScripts();
			}

			return self::$instance;
		}

		private function constants()
		{
			define( 'KIRILKIRKOV_ADD_SCRIPTS_TEXT_DOMAIN', 'Add Scripts' );
			define( 'KIRILKIRKOV_ADD_SCRIPTS_SETTING_GET_PARAM', 'kirilkirkov-add-scripts-settings');
			define( 'KIRILKIRKOV_ADD_SCRIPTS_INPUTS_PREFIX', 'kirilkirkov_add_scripts_' );
			define( 'KIRILKIRKOV_ADD_SCRIPTS_SCRIPTS_PREFIX', 'kirilkirkov_add_scripts_');
			define( 'KIRILKIRKOV_ADD_SCRIPTS_INPUTS_GROUP', 'kirilkirkov-add-scripts-update-options');
		}

		private function init()
		{
			// Register the options with the settings API
			add_action( 'admin_init', array( $this, 'admin_init' ) );

			// Public init
			add_action( 'init', array( $this, 'public_init' ) );

			// Add the menu page
			add_action( 'admin_menu', array( $this, 'setup_admin' ) );

			// admin scripts
			add_action('admin_enqueue_scripts', array($this, 'load_admin_assets'));
		}

		public function public_init()
		{
			add_action( 'wp_head', array($this, 'add_scripts'), 10 );
		}

		public function load_admin_assets($hook)
		{
			$current_screen = get_current_screen();
			if (strpos($current_screen->base, KIRILKIRKOV_ADD_SCRIPTS_SETTING_GET_PARAM) === false) {
				return;
			}
			wp_enqueue_style(KIRILKIRKOV_ADD_SCRIPTS_SCRIPTS_PREFIX.'boot_core_css', plugins_url('Includes/Admin/core.css', __FILE__ ));
			wp_enqueue_style(KIRILKIRKOV_ADD_SCRIPTS_SCRIPTS_PREFIX.'boot_admin_css', plugins_url('Includes/Admin/admin.css', __FILE__ ));
			wp_enqueue_script(KIRILKIRKOV_ADD_SCRIPTS_SCRIPTS_PREFIX.'boot_admin_js', plugins_url('Includes/Admin/admin.js', __FILE__ ), array(), false, true);
		}

		/**
		 * Add scripts code if has in settings
		 */
		public function add_scripts()
		{
			if(get_option( KIRILKIRKOV_ADD_SCRIPTS_INPUTS_PREFIX.'scripts' ) 
				&& trim(get_option( KIRILKIRKOV_ADD_SCRIPTS_INPUTS_PREFIX.'scripts' )) != '') {
				
				// echo to theme
				echo get_option( KIRILKIRKOV_ADD_SCRIPTS_INPUTS_PREFIX.'scripts' );
			}
		}

		public function admin_init()
		{
			if (!is_admin()) {
				wp_die( __( 'This code is for admin area only' ) );
			}
			
			register_setting( KIRILKIRKOV_ADD_SCRIPTS_INPUTS_GROUP, KIRILKIRKOV_ADD_SCRIPTS_INPUTS_PREFIX.'scripts' );
		}

		public function setup_admin()
		{
			// add settings page
			add_options_page( __( 'Add Scripts Plugin', KIRILKIRKOV_ADD_SCRIPTS_TEXT_DOMAIN ), __( 'Add Scripts', KIRILKIRKOV_ADD_SCRIPTS_TEXT_DOMAIN ), 'administrator', KIRILKIRKOV_ADD_SCRIPTS_SETTING_GET_PARAM, array( $this, 'admin_page' ) );
		}

		/**
		 * Admin settings page
		 */
		public function admin_page() 
		{
			require 'Includes/Admin/SettingsForm.php';
		}
	}

	$s = KirilKirkov_AddScripts::getInstance();
}
