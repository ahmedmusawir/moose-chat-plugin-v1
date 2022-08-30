<?php
// RENAME THE FOLLOWING CONSTANTS WHEN STARTING A NEW PLUGIN
// MOOSE_CHAT_V1_URL
// MOOSE_CHAT_V1_BACKEND_STYLE_ID
// MOOSE_CHAT_V1_FRONTEND_STYLE_ID

// ALSO UPDATE THE FOLLOWING PREFIX WHEN STARTING A NEW PLUGIN
$PREFIX = 'MOOSE_CHAT_V1';
define('MOOSE_CHAT_V1_BACKEND_STYLE_ID', $PREFIX . '_backend');
define('MOOSE_CHAT_V1_FRONTEND_STYLE_ID', $PREFIX . '_frontend');

// Conditionally load CSS on plugin settings pages only
add_action('admin_enqueue_scripts', function ($hook) {

 // LOADING MAIN PLUGIN ADMIN SIDE STYLES

 wp_register_style(
  MOOSE_CHAT_V1_BACKEND_STYLE_ID,
  MOOSE_CHAT_V1_URL . 'admin/assets/dist/css/admin.min.css',
  [],
  time()
 );

 // ENABLE BACKEND ADMIN STYLES BY UNCOMMENTING THE FOLLOWING LINE
 wp_enqueue_style(MOOSE_CHAT_V1_BACKEND_STYLE_ID);
});

// Load CSS on the frontend
add_action('wp_enqueue_scripts',

 function () {

  // LOADING CUSTOM FRONEND STYLES
  wp_register_style(
   MOOSE_CHAT_V1_FRONTEND_STYLE_ID,
   MOOSE_CHAT_V1_URL . 'frontend/assets/dist/css/frontend.min.css',
   [],
   time()
  );

  wp_enqueue_style(MOOSE_CHAT_V1_FRONTEND_STYLE_ID);
 }, 100);