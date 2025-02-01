<?php

if (!defined('ABSPATH')) {
    exit; // Security Check
}

global $wpdb;
$table_name = $wpdb->prefix . 'csv_data';

if (!empty($_FILES['csv_file']['name'])) {
    $file = $_FILES['csv_file']['tmp_name'];
    $handle = fopen($file, "r");

    fgetcsv($handle); // প্রথম লাইন (header) স্কিপ করা
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $wpdb->insert($table_name, [
            'name'  => sanitize_text_field($data[0]),
            'email' => sanitize_email($data[1]),
            'phone' => sanitize_text_field($data[2]),
        ]);
    }
    fclose($handle);

    echo json_encode(["status" => "success", "message" => "CSV আপলোড সম্পন্ন হয়েছে!"]);
} else {
    echo json_encode(["status" => "error", "message" => "CSV ফাইল সিলেক্ট করুন!"]);
}

wp_die();