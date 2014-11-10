<?php
global $wpdb;
define('SIMPLE_EMAIL_SUBSCRIBER_PLUGIN_DIR', plugin_dir_path(__FILE__));  //plugin dir
define('SIMPLE_EMAIL_SUBSCRIBER_DB_NAME', $wpdb->prefix."email_subscription");
define('SIMPLE_EMAIL_SUBSCRIBE_LOCATION', 'http://wordpress.org/extend/plugins/');
define('SES_EMAIL_SENT_META', 'post_email_sent_on_publish');
define('SES_PLUGIN_VERSION', "2.3");
define('WP_ADMIN_DIR',$_SERVER["DOCUMENT_ROOT"].'/wp-admin/includes/');
?>
