<?php
/*
 * Admin Menu Display Methods
 * */
class options_page {
  function __construct(){
    add_action( 'admin_menu', array( $this, 'admin_menu' ));
  }

  function admin_menu(){
    add_options_page( 'Simple Email Subscriber', 'Simple Email Subscriber', 'manage_options', 'settings_page', array( $this, 'settings_page' ) );
  }


	function  settings_page () {
    form_validator::process_form(); //process subscription requests
		include SIMPLE_EMAIL_SUBSCRIBER_PLUGIN_DIR."admin_pages/admin_page.php";
  }

}
?>
