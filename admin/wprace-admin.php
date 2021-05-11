<?php

add_action( 'admin_menu', 'wrace_options_page' );
function wrace_options_page()
{
    add_menu_page(
        'RunRace',
        'RunRace',
        'manage_options',
        plugin_dir_path(__FILE__) . 'view.php',
        null,
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