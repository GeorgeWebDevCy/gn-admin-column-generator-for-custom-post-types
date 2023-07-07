<?php
/**
 * GN Admin Column Generator for Custom Post Types
 *
 * @package       GNADMINCOL
 * @author        George Nicolaou
 * @license       gplv2
 * @version       1.0.0
 *
 * @wordpress-plugin
 * Plugin Name:   GN Admin Column Generator for Custom Post Types
 * Plugin URI:    https://www.georgenicolaou.me/plugins/gn-admin-column-generator-for-custom-post-types
 * Description:   Allows you to generate column for custom post types in the admin table of the respective post type
 * Version:       1.0.0
 * Author:        George Nicolaou
 * Author URI:    https://www.georgenicolaou.me/
 * Text Domain:   gn-admin-column-generator-for-custom-post-types
 * Domain Path:   /languages
 * License:       GPLv2
 * License URI:   https://www.gnu.org/licenses/gpl-2.0.html
 *
 * You should have received a copy of the GNU General Public License
 * along with GN Admin Column Generator for Custom Post Types. If not, see <https://www.gnu.org/licenses/gpl-2.0.html/>.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * HELPER COMMENT START
 * 
 * This file contains the main information about the plugin.
 * It is used to register all components necessary to run the plugin.
 * 
 * The comment above contains all information about the plugin 
 * that are used by WordPress to differenciate the plugin and register it properly.
 * It also contains further PHPDocs parameter for a better documentation
 * 
 * The function GNADMINCOL() is the main function that you will be able to 
 * use throughout your plugin to extend the logic. Further information
 * about that is available within the sub classes.
 * 
 * HELPER COMMENT END
 */

// Plugin name
define( 'GNADMINCOL_NAME',			'GN Admin Column Generator for Custom Post Types' );

// Plugin version
define( 'GNADMINCOL_VERSION',		'1.0.0' );

// Plugin Root File
define( 'GNADMINCOL_PLUGIN_FILE',	__FILE__ );

// Plugin base
define( 'GNADMINCOL_PLUGIN_BASE',	plugin_basename( GNADMINCOL_PLUGIN_FILE ) );

// Plugin Folder Path
define( 'GNADMINCOL_PLUGIN_DIR',	plugin_dir_path( GNADMINCOL_PLUGIN_FILE ) );

// Plugin Folder URL
define( 'GNADMINCOL_PLUGIN_URL',	plugin_dir_url( GNADMINCOL_PLUGIN_FILE ) );

/**
 * Load the main class for the core functionality
 */
require_once GNADMINCOL_PLUGIN_DIR . 'core/class-gn-admin-column-generator-for-custom-post-types.php';

/**
 * The main function to load the only instance
 * of our master class.
 *
 * @author  George Nicolaou
 * @since   1.0.0
 * @return  object|Gn_Admin_Column_Generator_For_Custom_Post_Types
 */
function GNADMINCOL() {
	return Gn_Admin_Column_Generator_For_Custom_Post_Types::instance();
}

GNADMINCOL();
