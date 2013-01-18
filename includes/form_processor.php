<?php
class form_validator{
  /* process all the new email subscription or 
   * unsubscription requests
   */
  static function process_form($success_msg=""){
    $subscriber = new email_subscriber();

    // If form was submitted
    if ( $_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['subscribe_submit'])) {
      $email_address = $_POST['new_subscription_email'];
      $subscript_all = $_POST['all_category']; //1(all) 0(individual)
      $subscribe_categories = $_POST['subscribe_category'];

      if(form_validator::check_email_is_valid($email_address) && $subscriber->email_not_subscribed($email_address)){
        //subscribe now
        $subscriber->add_subscription($email_address,$subscript_all, $subscribe_categories);
      } 

    } else if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['unsubscribe_submit'])) {
      $email_address = $_POST['unsubscribe_email'];
      $subscriber->remove_subscription($email_address);
      
    } else if($_SERVER["REQUEST_METHOD"] == "POST" &&  isset($_POST['modify_categories_submit'])){
      $email_address = $_POST['subscriber_email'];
      $subscript_all = $_POST['all_category']; //1(all) 0(individual)
      $subscribe_categories = $_POST['subscribe_category'];        //subscribe now
      $subscriber->update_subscription($email_address,$subscript_all, $subscribe_categories);
     
    }
  }

  /* Syntex Check Method */
  static function check_email_is_valid($email){
    $email_regex = "/^[-a-z0-9_+\.]+\@([-a-z0-9]+\.)+[a-z0-9]{2,4}$/i";  //the syntex check for email
    //return true if email valid
    if(preg_match($email_regex, $email)){
      return true; 
    }
    echo "<strong> Error: Subscription Email address invalid </strong><hr/>";
    return false;
  }
}
?>
