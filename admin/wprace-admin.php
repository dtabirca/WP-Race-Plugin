<?php

add_action('admin_menu', 'wrace_options_page');
function wrace_options_page()
{
    add_menu_page(
        'RunRace',
        'RunRace',
        'manage_options',
        'run_race',
        'runrace_load_admin_tabs',
        plugin_dir_url(__FILE__) . 'images/icon_wprace.png',
        20
    );

    wp_enqueue_style('jquery-ui', '//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css');
    wp_enqueue_script('jquery-ui', 'https://code.jquery.com/ui/1.12.1/jquery-ui.js');
    wp_enqueue_script('jquery-datatables', '//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js');
    wp_enqueue_script('wprace-admin-script', plugins_url('js/wprace.js', __FILE__));
    wp_enqueue_style('wprace-admin-style', plugins_url('css/wprace.css', __FILE__));
    wp_enqueue_style('jquery-datatables', '//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css');
}

function runrace_load_admin_tabs()
{
    global $wpdb;
    $data = [];
    $couses = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}runrace_course LIMIT 1;");
    $data['race_name'] = $couses[0]->name;
    $data['race_options'] = json_decode($couses[0]->options, true);
    $competitors = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}runrace_competitor;");
    $data['race_competitors'] = $competitors;
    include_once plugin_dir_path(__FILE__) . 'view.php';
}

add_action('admin_action_rr_registered_competitors', 'rr_registered_competitors_admin_action');
function rr_registered_competitors_admin_action()
{
    global $wpdb;
    $wpdb->query(
        $wpdb->prepare(
            "UPDATE {$wpdb->prefix}runrace_competitor
            SET `updated` = %d, `status` = %d",
            array(
                current_time('mysql'),
                0
            )
        )
    );
    foreach ($_POST['status'] as $bib) {
        $wpdb->query(
            $wpdb->prepare(
                "UPDATE {$wpdb->prefix}runrace_competitor
                SET `updated` = %d, `status` = %d
                WHERE `bib` = %d;",
                array(
                    current_time('mysql'),
                    1,
                    $bib
                )
            )
        );
    }
    wp_redirect($_SERVER['HTTP_REFERER'] . '#tabs-2');
}

add_action('admin_action_rr_course_options', 'rr_course_options_admin_action');
function rr_course_options_admin_action()
{
    global $wpdb;
    $wpdb->query(
        $wpdb->prepare(
            "UPDATE {$wpdb->prefix}runrace_course
            SET `updated` = %d, `name` = %s, `options` = %s",
            array(
                current_time('mysql'),
                $_POST['race_name'],
                json_encode(
                    [
                        'distance' => $_POST['race_distance'],
                        'units' => $_POST['units'],
                        'type' => 'real',
                        'team' => 'no',
                        'time_limit' => $_POST['time_limit'],
                        'participants_limit' => $_POST['participants_limit'],
                    ]
                )
            )
        )
    );

    wp_redirect($_SERVER['HTTP_REFERER'] . '#tabs-1');
}

add_action('admin_action_rr_import_competitors', 'rr_import_competitors_admin_action');
function rr_import_competitors_admin_action()
{
    global $wpdb;
    if (isset($_FILES['import_competitors']) && ($_FILES['import_competitors']['size'] > 0)) {

        $arr_file_type = wp_check_filetype(basename($_FILES['import_competitors']['name']));
        $uploaded_file_type = $arr_file_type['type'];
        $allowed_file_types = array('application/vnd.ms-excel','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        if (in_array($uploaded_file_type, $allowed_file_types)) {

            $upload_overrides = array('test_form' => false);
            $uploaded_file = wp_handle_upload($_FILES['import_competitors'], $upload_overrides);
            if (isset($uploaded_file['file'])) {

                // use this to save in media library
                // $file_name_and_location = $uploaded_file['file'];
                // $file_title_for_media_library = 'your title here';
                // $attachment = array(
                //     'post_mime_type' => $uploaded_file_type,
                //     'post_title' => 'Uploaded image ' . addslashes($file_title_for_media_library),
                //     'post_content' => '',
                //     'post_status' => 'inherit'
                // );
                // // Run the wp_insert_attachment function. This adds the file to the media library and generates the thumbnails. If you wanted to attch this image to a post, you could pass the post id as a third param and it'd magically happen.
                // $attach_id = wp_insert_attachment( $attachment, $file_name_and_location );
                // require_once(ABSPATH . "wp-admin" . '/includes/image.php');
                // $attach_data = wp_generate_attachment_metadata( $attach_id, $file_name_and_location );
                // wp_update_attachment_metadata($attach_id,  $attach_data);

                // read xls file
                $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($uploaded_file['file']);
                $worksheet = $spreadsheet->getActiveSheet();
                $writer = new \PhpOffice\PhpSpreadsheet\Writer\Html($spreadsheet);
                $rows = $worksheet->toArray();
                $columns = array_shift($rows);// nrcrt, bib, name, sex, time, place open, place sex, place category...

                // insert data
                $table_name = "{$wpdb->prefix}runrace_competitor";
                $wpdb->query("TRUNCATE TABLE {$table_name};");
                foreach ($rows as $row) {
                    $wpdb->insert(
                        $table_name,
                        array(
                            'updated' => current_time('mysql'),
                            'bib' => $row[1],
                            'name' => $row[2],
                            'sex' => $row[3] ?? '',
                            'age' => 0,
                            'status' => 0,
                        )
                    );
                }

                // delete uploaded file
                @unlink($uploaded_file['file']);

                // use this for preview
                //echo $writer->generateHTMLAll();
            }
        }
    }

    wp_redirect($_SERVER['HTTP_REFERER'] . '#tabs-2');
}
