<?php 

/**
 * Plugin Name: Shortcode Plugin
 * Description: This is our Second plugin which creates some information widget to admin dashboard as well as at admin notice
 * Author: Shuvo Bhowmik
 * Version: 1.0
 * Author URI: https://devexplorers.xyz/
 * Plugin URI: http://example.com/shorcode
 */

 //Basic Shortcode

 add_shortcode("message", "sp_show_static_message"); // [message]

 function sp_show_static_message(){
    return "<h3>Hello I am a simple shortcode message</h3>";
 }

 add_shortcode('student', "sp_handle_student_data");

 //Parameter Shortcode

 function sp_handle_student_data($attributes){

    $attributes = shortcode_atts(array(
        "name" => "Default Student",
        "email" => "Default Email",
    ), $attributes, "student");

    return "<h3>Student Data: Name - {$attributes['name']}, Email - {$attributes['email']}</h3>";
 }

 //Shortcode with dynamic data

 add_shortcode("list-posts", "sp_handle_list_posts");

 function sp_handle_list_posts(){
     global $wpdb; 
 
     $table_prefix = $wpdb->prefix; // WP Table Prefix
     $table_name = $table_prefix . "posts";
 
     // Get Posts whose post_type = post and post_status = publish
     $posts = $wpdb->get_results(
         "SELECT ID, post_title FROM {$table_name} WHERE post_type = 'post' AND post_status = 'publish'"
     );
 
     if (count($posts) > 0) {
         $output = "<ul>";
         foreach ($posts as $post) {
             $permalink = get_permalink($post->ID); // Get the post link
             $output .= "<li><a href='" . esc_url($permalink) . "'>" . esc_html($post->post_title) . "</a></li>";
         }
         $output .= "</ul>";
 
         return $output; // Shortcode function must return data, not echo
     }
 
     return "<p>No posts found.</p>";
 }
 

 ?>