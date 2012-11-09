<form name="unsubscribe_email_form" action=<?php echo home_url();?>  method="post">
  <label> Thank you for following our service, do you really to unsubscribe our latest blog post with the email: <?php echo $_GET['email']?> ? </label>
  <input hidden="hidden" name="unsubscribe_email" value=<?php echo $_GET['email']?> />
  <input type="submit" name="unsubscribe_submit" value="Unsubscribe" />
</form>

