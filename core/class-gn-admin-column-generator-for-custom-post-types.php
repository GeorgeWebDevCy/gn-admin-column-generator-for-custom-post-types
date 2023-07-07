<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * HELPER COMMENT START
 * 
 * This is the main class that is responsible for registering
 * the core functions, including the files and setting up all features. 
 * 
 * To add a new class, here's what you need to do: 
 * 1. Add your new class within the following folder: core/includes/classes
 * 2. Create a new variable you want to assign the class to (as e.g. public $helpers)
 * 3. Assign the class within the instance() function ( as e.g. self::$instance->helpers = new Gn_Admin_Column_Generator_For_Custom_Post_Types_Helpers();)
 * 4. Register the class you added to core/includes/classes within the includes() function
 * 
 * HELPER COMMENT END
 */

if ( ! class_exists( 'Gn_Admin_Column_Generator_For_Custom_Post_Types' ) ) :

	/**
	 * Main Gn_Admin_Column_Generator_For_Custom_Post_Types Class.
	 *
	 * @package		GNADMINCOL
	 * @subpackage	Classes/Gn_Admin_Column_Generator_For_Custom_Post_Types
	 * @since		1.0.0
	 * @author		George Nicolaou
	 */
	final class Gn_Admin_Column_Generator_For_Custom_Post_Types {

		/**
		 * The real instance
		 *
		 * @access	private
		 * @since	1.0.0
		 * @var		object|Gn_Admin_Column_Generator_For_Custom_Post_Types
		 */
		private static $instance;

		/**
		 * GNADMINCOL helpers object.
		 *
		 * @access	public
		 * @since	1.0.0
		 * @var		object|Gn_Admin_Column_Generator_For_Custom_Post_Types_Helpers
		 */
		public $helpers;

		/**
		 * GNADMINCOL settings object.
		 *
		 * @access	public
		 * @since	1.0.0
		 * @var		object|Gn_Admin_Column_Generator_For_Custom_Post_Types_Settings
		 */
		public $settings;

		/**
		 * Throw error on object clone.
		 *
		 * Cloning instances of the class is forbidden.
		 *
		 * @access	public
		 * @since	1.0.0
		 * @return	void
		 */
		public function __clone() {
			_doing_it_wrong( __FUNCTION__, __( 'You are not allowed to clone this class.', 'gn-admin-column-generator-for-custom-post-types' ), '1.0.0' );
		}

		/**
		 * Disable unserializing of the class.
		 *
		 * @access	public
		 * @since	1.0.0
		 * @return	void
		 */
		public function __wakeup() {
			_doing_it_wrong( __FUNCTION__, __( 'You are not allowed to unserialize this class.', 'gn-admin-column-generator-for-custom-post-types' ), '1.0.0' );
		}

		/**
		 * Main Gn_Admin_Column_Generator_For_Custom_Post_Types Instance.
		 *
		 * Insures that only one instance of Gn_Admin_Column_Generator_For_Custom_Post_Types exists in memory at any one
		 * time. Also prevents needing to define globals all over the place.
		 *
		 * @access		public
		 * @since		1.0.0
		 * @static
		 * @return		object|Gn_Admin_Column_Generator_For_Custom_Post_Types	The one true Gn_Admin_Column_Generator_For_Custom_Post_Types
		 */
		public static function instance() {
			if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Gn_Admin_Column_Generator_For_Custom_Post_Types ) ) {
				self::$instance					= new Gn_Admin_Column_Generator_For_Custom_Post_Types;
				self::$instance->base_hooks();
				self::$instance->includes();
				self::$instance->helpers		= new Gn_Admin_Column_Generator_For_Custom_Post_Types_Helpers();
				self::$instance->settings		= new Gn_Admin_Column_Generator_For_Custom_Post_Types_Settings();

				//Fire the plugin logic
				new Gn_Admin_Column_Generator_For_Custom_Post_Types_Run();

				/**
				 * Fire a custom action to allow dependencies
				 * after the successful plugin setup
				 */
				do_action( 'GNADMINCOL/plugin_loaded' );
			}

			return self::$instance;
		}

		/**
		 * Include required files.
		 *
		 * @access  private
		 * @since   1.0.0
		 * @return  void
		 */
		private function includes() {
			require_once GNADMINCOL_PLUGIN_DIR . 'core/includes/classes/class-gn-admin-column-generator-for-custom-post-types-helpers.php';
			require_once GNADMINCOL_PLUGIN_DIR . 'core/includes/classes/class-gn-admin-column-generator-for-custom-post-types-settings.php';

			require_once GNADMINCOL_PLUGIN_DIR . 'core/includes/classes/class-gn-admin-column-generator-for-custom-post-types-run.php';
		}

		/**
		 * Add base hooks for the core functionality
		 *
		 * @access  private
		 * @since   1.0.0
		 * @return  void
		 */
		private function base_hooks() {
			add_action( 'plugins_loaded', array( self::$instance, 'load_textdomain' ) );
		}

		/**
		 * Loads the plugin language files.
		 *
		 * @access  public
		 * @since   1.0.0
		 * @return  void
		 */
		public function load_textdomain() {
			load_plugin_textdomain( 'gn-admin-column-generator-for-custom-post-types', FALSE, dirname( plugin_basename( GNADMINCOL_PLUGIN_FILE ) ) . '/languages/' );
		}

	}

endif; // End if class_exists check.