<?php

add_action( 'admin_menu', 'wrace_options_page' );
function wrace_options_page()
{
    add_menu_page(
        'RunRace',
        'RunRace',
        'manage_options',
        'run_race',
        'runrace_options',
        plugin_dir_url(__FILE__) . 'images/icon_wprace.png',
        20
    );

    wp_enqueue_style('jquery-ui', '//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css');
    wp_enqueue_script('jquery-ui', 'https://code.jquery.com/ui/1.12.1/jquery-ui.js');
    wp_enqueue_script('jquery-datatables', '//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js');
    wp_enqueue_script('wprace-admin-script', plugins_url( 'js/wprace.js', __FILE__ ));
    wp_enqueue_style('wprace-admin-style', plugins_url( 'css/wprace.css', __FILE__ ));
    wp_enqueue_style('jquery-datatables', '//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css');
}

function runrace_options()
{
    global $wpdb;
    $data = [];
    $results = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}runrace_course LIMIT 1;");
    $data['race-name'] = $results[0]->name;
    $data['race-options'] = json_decode($results[0]->options, true);
    include_once plugin_dir_path(__FILE__) . 'view.php';
}

add_action( 'admin_action_rr_course_options', 'rr_course_options_admin_action' );
function rr_course_options_admin_action()
{
    global $wpdb;
    $wpdb->query( 
        $wpdb->prepare("UPDATE {$wpdb->prefix}runrace_course
            SET `updated` = %d, `name` = %s, `options` = %s",
            array(
                current_time('mysql'),
                $_POST['race-name'],
                json_encode(
                    [
                        'distance' => $_POST['race-distance'],
                        'units' => $_POST['units'],
                        'type' => 'real',
                        'team' => 'no',
                        'time-limit' => $_POST['time-limit'],
                        'participants-limit' => $_POST['participants-limit'],
                    ]
                )                
            )
        )
    );

    wp_redirect( $_SERVER['HTTP_REFERER'] );
}