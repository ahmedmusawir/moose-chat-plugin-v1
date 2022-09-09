<?php

function moose_chat_plugin_user_signup($user_id, $user_data)
{

 echo '<pre>';
 print_r($user_data);
 echo '</pre>';

 add_action('wp_enqueue_scripts',

// Conditionally load JS on single post pages
  function () {

   wp_register_script(
    'MOOSE_CHAT_USER_SIGNUP',
    MOOSE_CHAT_V1_URL . 'frontend/assets/dist/js/mooseChatUserSignup.js',
    [],
    time()
   );

   $current_user_name = $user_data->user_email;
   // $current_user = wp_get_current_user();

   wp_localize_script('MOOSE_CHAT_USER_SIGNUP', 'mooseChatData', array(
    'root_url'          => get_site_url(),
    'ajax_url'          => admin_url('admin-ajax.php'),
    'currentWPUserName' => $current_user_name
   ));

   /* THIS SCRIPT ONLY LOADS ON WP FRONTEND FOR SINGLE BLOG POST OR CPT SINGLE ONLY */
   //  if (!is_single()) {
   wp_enqueue_script('MOOSE_CHAT_USER_SIGNUP');
   //  }
  }, 100);

}

add_action('user_register', 'moose_chat_plugin_user_signup', 10, 2);