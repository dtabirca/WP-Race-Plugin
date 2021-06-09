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
 * Plugin Name:       RunRace
 * Plugin URI:        https://github.com/dtabirca/WP-Race-Plugin
 * Description:       Manages running competitions.
 * Version:           0.2
 * Requires at least: 5.7
 * Requires PHP:      7.4
 * Author:            Daniel Tabirca
 * Author URI:        https://github.com/dtabirca/
 * Text Domain:       wprace
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

declare(strict_types=1);

namespace RunRace;

if (!defined('WPINC')) {
    die;
}

require_once 'lib/autoload.php';

define('RUNRACE_DIRPATH', plugin_dir_path(__FILE__));
define('RUNRACE_FILE', __FILE__);

$GLOBALS['runRacePlugin'] = (new RunRacePlugin())->init();
