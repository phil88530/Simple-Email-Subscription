<?php
add_action("widgets_init", array('simple_email_subscription_widget', 'register'));
register_activation_hook( __FILE__, array('simple_email_subscription_widget', 'activate'));
register_deactivation_hook( __FILE__, array('simple_email_subscription_widget', 'deactivate'));

class simple_email_subscription_widget {
  function activate(){
    $data = array( 'ses_subscription_hint' => 'Enter email to subscribe: ', 
      'ses_subscription_description' => 'We would like to keep you updated with our blog. You can always stop the updates by clicking the \"unsubscribe\” link in the emails from us ',
      'ses_success_msg' => 'Your email subscription has now been set, you will get the latest updates whenever we have a new post !',
      'ses_unsubscribe_content' => 'If you no longer wants to receive this update, or wants to change your subscription settings, you can',
      'ses_email_footer' => '',
      'ses_category_option' => 0);
    if ( ! get_option('simple_email_subscription_widget')){
      add_option('simple_email_subscription_widget' , $data);
    } else {
      update_option('simple_email_subscription_widget' , $data);
    }
  }

  function deactivate(){
    delete_option('simple_email_subscription_widget');
  }

  function control(){
    include SIMPLE_EMAIL_SUBSCRIBER_PLUGIN_DIR."admin_pages/control_page.php";
  }

  function widget($args){
    $subscriber = new email_subscriber();

    $action_url=get_site_url().$_SERVER['REQUEST_URI'];
    echo $args['before_widget'];
    echo $args['before_title'] . 'Subscription' . $args['after_title'];
    
    form_validator::process_form($data['success_msg']); //process subscription requests
    if(isset($_GET['unsubscribe']) && $_GET['unsubscribe']==true){
      include SIMPLE_EMAIL_SUBSCRIBER_PLUGIN_DIR."admin_pages/unsubscription_widget.php";
    } else {
		  include SIMPLE_EMAIL_SUBSCRIBER_PLUGIN_DIR."admin_pages/subscription_widget.php";
    }
    echo $args['after_widget'];
  }
  function register(){
    register_sidebar_widget('Simple Email Subscription', array('simple_email_subscription_widget', 'widget'));
    register_widget_control('Simple Email Subscription', array('simple_email_subscription_widget', 'control'));
  }
}
?>
