<?php
  include_once WP_ADMIN_DIR.'template.php';
  $data = get_option('simple_email_subscription_widget');
  $checlist_args = array(
  	'descendants_and_self'  => 0,
    'selected_cats'         => true,
    'popular_cats'          => false,
    'walker'                => null,
    'taxonomy'              => 'category',
    'checked_ontop'         => true
  );
?>

<form name="subscribe_email_form" action=<?php echo $action_url;?> method="post">
 <label>Subscript To: </label><br/>
<?php 
  //display the category list
  echo "<ui class='subscription_categories'>";
  echo wp_terms_checklist($checlist_args);
  echo "</ui>";

  //display the subscription email entering fields
  echo '<br />'.$data['subscription_hint'].': <br />';
?>
  <input type="text" name="new_subscription_email" /> 
  <hr />
  We would like to keep you updated with our blog. You can always stop the updates by clicking the 	&ldquo;unsubscribe&rdquo; link in the emails from us
  <br>
  <input type="submit" name="subscribe_submit" value="Subscribe" />

</form>

