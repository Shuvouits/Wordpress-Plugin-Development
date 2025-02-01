<?php

/*
Plugin Name: AJAX CSV Upload Plugin
Plugin URI: https://example.com/csv-upload-plugin
Description: Upload csv file via ajax
Version: 1.0
Author: Shuvo Bhowmik
Author URI: https://devexplorers.xyz
License: GPL2
*/

if (!defined('ABSPATH')) {
    exit; // Security Check
}

// ডাটাবেজে টেবিল তৈরি
register_activation_hook(__FILE__, 'csv_upload_create_table');

function csv_upload_create_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'csv_data';

    $charset_collate = $wpdb->get_charset_collate();
    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        name varchar(255) NOT NULL,
        email varchar(255) NOT NULL,
        phone varchar(20) NOT NULL,
        PRIMARY KEY (id)
    ) $charset_collate;";

    require_once ABSPATH . 'wp-admin/includes/upgrade.php';
    dbDelta($sql);
}

// JavaScript & CSS লোড করা
function csv_upload_enqueue_scripts() {
    wp_enqueue_script('csv-upload-script', plugin_dir_url(__FILE__) . 'js/script.js', array('jquery'), '1.0', true);
    wp_localize_script('csv-upload-script', 'ajaxurl', admin_url('admin-ajax.php'));
}

add_action('wp_enqueue_scripts', 'csv_upload_enqueue_scripts');

// Shortcode দিয়ে ফর্ম দেখানো
function csv_upload_form() {
    ob_start();
    ?>
    <form id="csv-upload-form" enctype="multipart/form-data">
        <input type="file" name="csv_file" id="csv_file" accept=".csv" required>
        <button type="submit">Upload CSV</button>
        <div id="csv-upload-response"></div>
    </form>
    <?php
    return ob_get_clean();
}
add_shortcode('csv_upload', 'csv_upload_form');

// AJAX অ্যাকশন রেজিস্টার করা
add_action('wp_ajax_csv_upload_handler', 'csv_upload_handler');
add_action('wp_ajax_nopriv_csv_upload_handler', 'csv_upload_handler');

function csv_upload_handler() {
    require_once plugin_dir_path(__FILE__) . 'upload-handler.php';
}