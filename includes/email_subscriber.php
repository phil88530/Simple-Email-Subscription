<?php
class email_subscriber{
  /*
   * Plugin Core Methods
   * */
  static function install_database() {
    //define create table query
    $sql = "CREATE TABLE IF NOT EXISTS ".SIMPLE_EMAIL_SUBSCRIBER_DB_NAME."(
      id mediumint(9) NOT NULL AUTO_INCREMENT,
      subscribe_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
      email VARCHAR(55) NOT NULL,
      UNIQUE KEY id (id)
    );";

    //update db and make it auto adjust
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);

    //add the options for db defination
    add_option("ses_db_version", SES_PLUGIN_VERSION);
  }

  function add_subscription($email){
    global $wpdb;
    $rows_affected = $wpdb->insert(SIMPLE_EMAIL_SUBSCRIBER_DB_NAME, array('email' => $email));
    if(! $rows_affected ){
      error_log('deletion didnt work for subscriptions');
    } else {
      echo 'Thank you for subscribing to this blog, your email has been added to the subscription list.';
    }

    return $rows_affected;
  }

  function remove_subscription($email){
    global $wpdb;
    $rows_affected = $wpdb->query($wpdb->prepare("DELETE FROM ".SIMPLE_EMAIL_SUBSCRIBER_DB_NAME
      ." WHERE email = %s", $email));

    if(! $rows_affected ){
      error_log('deletion didnt work for subscriptions');
      die('Could not delete data: ' . mysql_error());
    }

    return $rows_affected;
  }

  function fetch_subscription_list(){
    global $wpdb;
    //fetch all the subscribed emails
    $subscription_list = $wpdb->get_results(
      "SELECT * FROM ".SIMPLE_EMAIL_SUBSCRIBER_DB_NAME);

    return $subscription_list;
  }

  //check if an email has already subscribed
  function email_not_subscribed($email){
     global $wpdb;
    //fetch all the subscribed emails
    $subscription_list = $wpdb->get_results($wpdb->prepare(
      "SELECT * FROM ".SIMPLE_EMAIL_SUBSCRIBER_DB_NAME." WHERE email = %s", $email));
    
     if(!is_array($subscription_list) || count($subscription_list) != 0){ 
       echo 'Can not subscribe again: this email has already subscribed to our blog updates. <hr/>';
       return false;
     }

     return true;
  }
    
  //sending every subscriber an email when new post is made
  function on_publish_post($post_id){
    //get post information
    $post = get_post($post_id);

    $notification_email_sent = get_post_meta($post_id,SES_EMAIL_SENT_META, true);
    error_log($notification_email_sent);
    if($notification_email_sent != ''){
      return;
    }

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return false;
    if ($post->post_status != "publish") return;

    if(wp_is_post_revision($post->ID) || wp_is_post_autosave($post->ID)) return;

    //form the email content
    $blog_name = stripslashes ( get_option('blogname') );
    $email_title = "$blog_name: new post published";
    $from_email = get_option('admin_email' );
    $headers  = "MIME-Version: 1.0 \r\n";
		$headers .= "Content-type: text/html; charset=utf-8 \r\n";
		$headers .= "From: $blog_name <$from_email>\r\n";			

    //fetch all the subscribed emails
    $subscription_list = $this->fetch_subscription_list();
    
    //email each subscriber
    foreach($subscription_list as $subscriber){
      $email_content = get_the_author_meta( 'display_name', $post->post_author )." has published a new post on $blog_name: ".$post->post_title;
      $email_content .= "<br/> <a href='".get_permalink($post->ID)."'> Check this new post </a>";
      $email_content .= "<br /> If you no longer wants to receive this update, you can ";
      $email_content .= "<a href='".home_url()."?unsubscribe=true&email=".$subscriber->email."'> unsubscribe </a>";
      wp_mail($subscriber->email,$email_title, $email_content, $headers); 
    }

    //update the email meta to ensure not email anymore in the future
    update_post_meta($post->ID, SES_EMAIL_SENT_META, "1", true);
  }
}
?>
