<?php
  $data = get_option('simple_email_subscription_widget');
  echo $data['subscription_hint'].': <br />';
?>

<form name="subscribe_email_form" action=<?php echo $action_url;?> method="post">
  <input type="text" name="new_subscription_email" /> 
  <input type="submit" name="subscribe_submit" value="Subscribe" />
</form>

<br><br>
We would like to keep you updated with our blog. You can always stop the updates by clicking the 	&ldquo;unsubscribe&rdquo; link in the emails from us
