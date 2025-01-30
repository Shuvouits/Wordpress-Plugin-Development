<?php 

/**
 * Plugin Name: Hello World
 * Description: This is our first plugin which creates some information widget to admin dashboard as well as at admin notice
 * Author: Shuvo Bhowmik
 * Version: 1.0
 * Author URI: https://devexplorers.xyz/
 * Plugin URI: http://example.com/hello-world
 */

 //Admin Notices

 add_action("admin_notices", 'hw_show_success_message');
 add_action("admin_notices", 'hw_show_error_message');


 function hw_show_success_message(){
    echo '<div class="notice notice-success is-dismissible"><p>Hello, I am a success message</p></div>';
 }

 function hw_show_error_message(){
    echo '<div class="notice notice-error is-dismissible"><p>Hello, I am a success message</p></div>';
 }


?>