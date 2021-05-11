<?php

// if uninstall.php is not called by WordPress, die
if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}
 
// $option_name = 'wporg_option';
 
// delete_option($option_name);
 
// // for site options in Multisite
// delete_site_option($option_name);
 
// // drop a custom database table
global $wpdb;
$wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}wprace_settings;");
$wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}wprace_course;");
$wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}wprace_checkpoint;");
$wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}wprace_category;");
$wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}wprace_competitor;");
$wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}wprace_timing;");
$wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}wprace_result;");
$wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}wprace_certificate;");

echo "DROP TABLE IF EXISTS {$wpdb->prefix}wprace_settings;";
exit;