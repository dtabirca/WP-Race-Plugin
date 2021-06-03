<?php

/**
 * RunRace
 *
 * @package           WP RunRace
 * @author            Daniel Tabirca
 * @copyright         2021 Daniel Tabirca
 * @license           GPL-2.0-or-later
 */

declare(strict_types=1);

namespace RunRace;

if (!defined('WPINC')) {
    die;
}

if (!class_exists('RunRacePlugin')) {
    final class RunRacePlugin
    {
        //public $version = '0.1';
        //protected static $_instance = null;
        private $wpdb;
        private $jal_db_version;

        public function init()
        {
            $this->setupHooks();
            $this->include();

            return $this;
        }

        private static function instance()
        {
            return new self();
        }

        public function __construct()
        {
            global $wpdb;
            global $jal_db_version;
            $this->wpdb = $wpdb;
            $this->jal_db_version = $jal_db_version;
            $this->isAdmin = is_admin();
        }

        public function __clone()
        {
        }

        private function include()
        {
            if ($this->isAdmin) {
                require_once RUNRACE_DIRPATH . '/admin/wprace-admin.php';
            } else {
                //require_once RUNRACE_DIRPATH . '/public/wprace-public.php';
            }
        }

        private function setupHooks()
        {
            register_activation_hook(RUNRACE_FILE, array($this, 'activate' ));
            register_deactivation_hook(RUNRACE_FILE, array($this, 'deactivate' ));
            register_uninstall_hook(RUNRACE_FILE, array('RunRace\RunRacePlugin', 'uninstall'));
            // add_shortcode('Dribbble', array($this, 'shortcode'));
        }

        public function activate()
        {
            if ($this->wpdb->get_var("SHOW TABLES LIKE 'runrace_course'") != "{$this->wpdb->prefix}runrace_course") {
                $this->createTables();
                $this->insertData();
            }
        }

        private function createTables()
        {
            $charset_collate = $this->wpdb->get_charset_collate();

            $table_name = "{$this->wpdb->prefix}runrace_course";
            $sql[] = "CREATE TABLE $table_name (
                name tinytext NOT NULL,
                options longtext NOT NULL,
                updated datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
            ) $charset_collate;";

            $table_name = "{$this->wpdb->prefix}runrace_checkpoint";
            $sql[] = "CREATE TABLE $table_name (
                name tinytext NOT NULL,
                distance float NOT NULL,
                updated datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
            ) $charset_collate;";

            $table_name = "{$this->wpdb->prefix}runrace_category";
            $sql[] = "CREATE TABLE $table_name (
                name tinytext NOT NULL,
                minage tinyint NOT NULL,
                maxage tinyint NOT NULL,
                updated datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
            ) $charset_collate;";

            $table_name = "{$this->wpdb->prefix}runrace_competitor";
            $sql[] = "CREATE TABLE $table_name (
                id mediumint(9) NOT NULL AUTO_INCREMENT,
                bib mediumint(9) NOT NULL,
                name tinytext NOT NULL,
                age tinyint NOT NULL,
                sex varchar(20) NOT NULL,
                status tinyint NOT NULL,
                updated datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
                  PRIMARY KEY  (id)
            ) $charset_collate;";

            $table_name = "{$this->wpdb->prefix}runrace_timing";
            $sql[] = "CREATE TABLE $table_name (
                checkpoint tinytext NOT NULL,
                competitor tinyint NOT NULL,
                time tinyint NOT NULL,
                updated datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
            ) $charset_collate;";

            $table_name = "{$this->wpdb->prefix}runrace_result";
            $sql[] = "CREATE TABLE $table_name (
                competitor tinyint NOT NULL,
                position tinyint NOT NULL,
                updated datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
            ) $charset_collate;";

            $table_name = "{$this->wpdb->prefix}runrace_certificate";
            $sql[] = "CREATE TABLE $table_name (
                competitor tinyint NOT NULL,
                certificate tinyint NOT NULL,
                updated datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
            ) $charset_collate;";

            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            dbDelta($sql);
        }

        private function insertData()
        {
            $table_name = "{$this->wpdb->prefix}runrace_course";
            $this->wpdb->insert(
                $table_name,
                array(
                    'updated' => current_time('mysql'),
                    'name' => 'Semimarathon',
                    'options' => json_encode(
                        [
                            'distance' => 21.00,
                            'units' => 'metric',
                            'type' => 'real',
                            'team' => 'no',
                            'time_limit' => 300,
                            'participants_limit' => 100,
                        ]
                    )
                )
            );
        }

        public function deactivate()
        {
            flush_rewrite_rules();
        }

        /**
         * this needs to be called as static
         */
        public static function uninstall()
        {
            $self = self::instance();
            //error_log('uninstall');
            $self->wpdb->query("DROP TABLE IF EXISTS {$self->wpdb->prefix}runrace_course;");
            $self->wpdb->query("DROP TABLE IF EXISTS {$self->wpdb->prefix}runrace_checkpoint;");
            $self->wpdb->query("DROP TABLE IF EXISTS {$self->wpdb->prefix}runrace_category;");
            $self->wpdb->query("DROP TABLE IF EXISTS {$self->wpdb->prefix}runrace_competitor;");
            $self->wpdb->query("DROP TABLE IF EXISTS {$self->wpdb->prefix}runrace_timing;");
            $self->wpdb->query("DROP TABLE IF EXISTS {$self->wpdb->prefix}runrace_result;");
            $self->wpdb->query("DROP TABLE IF EXISTS {$self->wpdb->prefix}runrace_certificate;");
            wp_cache_flush();
        }
    }
}
