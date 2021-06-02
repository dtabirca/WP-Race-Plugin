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

class RunRaceWPFacade
{
    private $wpdb;
    private $jal_db_version;
    private $isAdmin;

    public function __construct()
    {
        global $wpdb;
        global $jal_db_version;
        $this->wpdb = $wpdb;
        $this->jal_db_version = $jal_db_version;
        $this->isAdmin = is_admin();
    }
}
