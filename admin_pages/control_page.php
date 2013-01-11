<?php
  $data = get_option('simple_email_subscription_widget');
?>
  <p><label>Subscription Hint: </label></p>
  <input name="ses_subscription_hint"
      type="text" value="<?php echo $data['subscription_hint']; ?>" />
  
  <p><label>Success Message: </label></p>
    <textarea name="ses_success_msg" cols="30" rows="4"
    type="text" > <?php echo $data['success_msg']; ?> </textarea>  
<?php  
  if (isset($_POST['ses_subscription_hint'])){
    $data['subscription_hint'] = attribute_escape($_POST['ses_subscription_hint']);
    $data['success_msg'] = attribute_escape($_POST['ses_success_msg']);
    update_option('simple_email_subscription_widget', $data);
  }
?>
