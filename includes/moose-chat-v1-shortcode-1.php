<?php
 /*
 PROPERTY LIST DISPLAY SHORTCODE
  */

 // If this file is called directly, abort.
 if (!defined('WPINC')) {
  die;
 }

 /**
  *
  * Adding Custom Shortcode for Property or any CPT list
  *
  */

 function show_moose_chat($atts)
 {

  $current_user = wp_get_current_user();

  // echo '<pre>';
  // print_r($current_user);
  // echo '</pre>';
  // JUST AN EFFORT TO COLLECT THE CURRENT USER INFO
  $current_user_display_name = $current_user->display_name;
  $current_user_email        = $current_user->user_email;

  $atts = shortcode_atts(

   array(

    // JUST AN EFFORT TO COLLECT THE CURRENT USER INFO
    'loggedin_display_name' => $current_user_display_name,
    'loggedin_email'        => $current_user_email

   ),

   $atts
  );

  extract($atts);

  ob_start(); // OUTPUT BUFFERING

 ?>

<main class="MOOSE-CHAT-SHORTCODE">

  <?php
   include plugin_dir_path(__FILE__) . 'views/moose-chat-v1-view.php';
   ?>

</main>


<?php

  $module_contents = ob_get_contents();

  ob_end_clean();

  return $module_contents;
 }

add_shortcode('moose_chat_v1', 'show_moose_chat');