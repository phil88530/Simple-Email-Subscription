<?php
  $data = get_option('simple_email_subscription_widget');
?>
  <input type="checkbox" name="ses_category_option" value="1" <?php echo ($data['category_option'] == 1)?  'checked' : '' ?>/>
  <label> Enable Category Subscription </label><hr />

  <p><label>Subscription Hint: </label></p>
  <input name="ses_subscription_hint"
      type="text" value="<?php echo $data['subscription_hint']; ?>" />

  <p><label>Subscription Description: </label></p>
    <textarea name="ses_subscription_description" cols="30" rows="4"
    type="text" > <?php echo $data['subscription_description']; ?> </textarea>  

  <p><label>Success Message: </label></p>
    <textarea name="ses_success_msg" cols="30" rows="4"
    type="text" > <?php echo $data['success_msg']; ?> </textarea>  

  <p><label>Email Footer(Optional: html/text): </label></p>
    <textarea name="ses_email_footer" cols="30" rows="4"
    type="text" > <?php echo $data['email_footer']; ?> </textarea>  
  
  <p><label>Unsubscription Email Content: </label></p>
    <textarea name="ses_unsubscribe_content" cols="30" rows="4"
    type="text" > <?php echo $data['unsubscribe_content']; ?> </textarea>  

<?php  
  if (isset($_POST['ses_subscription_hint'])){
    $data['subscription_hint'] = attribute_escape($_POST['ses_subscription_hint']);
    $data['subscription_description'] = attribute_escape($_POST['ses_subscription_description']);
    $data['success_msg'] = attribute_escape($_POST['ses_success_msg']);
    $data['email_footer'] = attribute_escape($_POST['ses_email_footer']);
    $data['category_option'] = attribute_escape($_POST['ses_category_option']);
    $data['unsubscribe_content'] = attribute_escape($_POST['ses_unsubscribe_content']);
    update_option('simple_email_subscription_widget', $data);
  }
?>
