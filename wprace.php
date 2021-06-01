<?php

/**
 * RunRace
 *
 * @package           WP RunRace
 * @author            Daniel Tabirca
 * @copyright         2021 Daniel Tabirca
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       WP RunRace
 * Plugin URI:        https://github.com/dtabirca/WP-Race-Plugin
 * Description:       Manages running competitions.
 * Version:           0.1
 * Requires at least: 5.7
 * Requires PHP:      7.4
 * Author:            Daniel Tabirca
 * Author URI:        https://github.com/dtabirca/
 * Text Domain:       wprace
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

if ( ! defined( 'WPINC' ) ) {
    die;
}

require_once 'vendor/autoload.php';

define( 'RUNRACE_DIRPATH', plugin_dir_path( __FILE__ ) );

register_activation_hook( __FILE__, 'wprace_activate' );
register_deactivation_hook( __FILE__, 'wprace_deactivate' );
//register_uninstall_hook(__FILE__, 'wprace_uninstall');

// if ( ! class_exists( 'RunRacePlugin' ) ) {
//     class RunRacePlugin {
        
//         /**
//          * Constructor
//          */
//         public function __construct() {
//             $this->setup_actions();
//         }
        
//         /**
//          * Setting up Hooks
//          */
//         public function setup_actions() {
//             //Main plugin hooks
//             register_activation_hook( DIR_PATH, array( 'RunRacePlugin', 'activate' ) );
//             register_deactivation_hook( DIR_PATH, array( 'RunRacePlugin', 'deactivate' ) );
//         }
        
//         /**
//          * Activate callback
//          */
//         public static function activate() {
//             //Activation code in here
//         }
        
//         /**
//          * Deactivate callback
//          */
//         public static function deactivate() {
//             //Deactivation code in here
//         }
        
//     }
    
    
//     // instantiate the plugin class
//     $wp_plugin_template = new RunRacePlugin();
// }


/**
 * [wprace_activate description]
 * @return [type] [description]
 */
function wprace_activate()
{
	global $wpdb;
	global $jal_db_version;

	$charset_collate = $wpdb->get_charset_collate();

	// 
	$table_name = "{$wpdb->prefix}wprace_settings";
	$sql[] = "CREATE TABLE $table_name (
		name tinytext NOT NULL,
		options text NOT NULL,
		updated datetime DEFAULT '0000-00-00 00:00:00' NOT NULL
	) $charset_collate;";

	$table_name = "{$wpdb->prefix}wprace_course";
	$sql[] = "CREATE TABLE $table_name (
		name tinytext NOT NULL,
		distance float NOT NULL,
		updated datetime DEFAULT '0000-00-00 00:00:00' NOT NULL
	) $charset_collate;";

	$table_name = "{$wpdb->prefix}wprace_checkpoint";
	$sql[] = "CREATE TABLE $table_name (
		name tinytext NOT NULL,
		distance float NOT NULL,
		updated datetime DEFAULT '0000-00-00 00:00:00' NOT NULL
	) $charset_collate;";

	$table_name = "{$wpdb->prefix}wprace_category";
	$sql[] = "CREATE TABLE $table_name (
		name tinytext NOT NULL,
		minage tinyint NOT NULL,
		maxage tinyint NOT NULL,
		updated datetime DEFAULT '0000-00-00 00:00:00' NOT NULL
	) $charset_collate;";

	$table_name = "{$wpdb->prefix}wprace_competitor";
	$sql[] = "CREATE TABLE $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		bib mediumint(9) NOT NULL,
		name tinytext NOT NULL,
		age tinyint NOT NULL,
		status tinyint NOT NULL,
		updated datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
  		PRIMARY KEY  (id)
	) $charset_collate;";

	$table_name = "{$wpdb->prefix}wprace_timing";
	$sql[] = "CREATE TABLE $table_name (
		checkpoint tinytext NOT NULL,
		competitor tinyint NOT NULL,
		time tinyint NOT NULL,
		updated datetime DEFAULT '0000-00-00 00:00:00' NOT NULL
	) $charset_collate;";

	$table_name = "{$wpdb->prefix}wprace_result";
	$sql[] = "CREATE TABLE $table_name (
		competitor tinyint NOT NULL,
		position tinyint NOT NULL,
		updated datetime DEFAULT '0000-00-00 00:00:00' NOT NULL
	) $charset_collate;";

	$table_name = "{$wpdb->prefix}wprace_certificate";
	$sql[] = "CREATE TABLE $table_name (
		competitor tinyint NOT NULL,
		certificate tinyint NOT NULL,
		updated datetime DEFAULT '0000-00-00 00:00:00' NOT NULL
	) $charset_collate;";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );

	$table_name = "{$wpdb->prefix}wprace_competitor";
	$wpdb->insert(
		$table_name,
		array(
			'updated' => current_time( 'mysql' ),
			'bib' => 123,
			'name' => 'Zgabeata Iftode',
			'age' => 43,
			'status' => 1,
		)
	);
}

/**
 * [wprace_deactivate description]
 * @return [type] [description]
 */
function wprace_deactivate()
{
	flush_rewrite_rules();
}

/**
 * [wprace_uninstall description]
 * @return [type] [description]
 */
function wprace_uninstall()
{
}

/**
 * admin
 */
if ( is_admin() ) {
    // we are in admin mode
    require_once __DIR__ . '/admin/wprace-admin.php';
}

