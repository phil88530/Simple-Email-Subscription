<?php
  include_once WP_ADMIN_DIR.'template.php';
  $data = get_option('simple_email_subscription_widget');
  $checlist_args = array(
    'type'                     => 'post',
    'child_of'                 => 0,
    'parent'                   => '',
    'orderby'                  => 'name',
    'order'                    => 'ASC',
    'hide_empty'               => 1,
    'hierarchical'             => 1,
    'exclude'                  => '',
    'include'                  => '',
    'number'                   => '',
    'taxonomy'                 => 'category',
    'pad_counts'               => false
  );
  $categories=get_categories($args);  //get all the categories first

  //get the patient subscription detail
  $subscriber_detail = $subscriber->fetch_subscriber($_GET['email']);
  $subscribed_all = $subscriber_detail->subscribe_all;  //does he subscribe to all categories
  $subscribed_list = explode(',',$subscriber_detail->subscribe_category); //or does he subscribe to individual ones?
?>

<form name="update_categories" action=<?php echo home_url();?> method="post">
  <input hidden="hidden" name="subscriber_email" value=<?php echo $_GET['email']?> />
  <!-- display the category list -->
  <label>Update your subscription:</label><br/>
  <ul class='subscription_categories'>
    <li>
        <input type="radio" name="all_category" value="1" <?php if($subscribed_all) echo 'checked'; ?> >
         All Categories
        <br />
        <input type="radio" name="all_category" value="0" <?php if(! $subscribed_all) echo 'checked'; ?> >
          Specific Categories
    </li>
  <label>Please select the categories: (if not all)</label><br/>
<?php
  foreach($categories as $category) {
    $already_subscribed = in_array($category->term_id, $subscribed_list);
    $checked_string = ($already_subscribed||$subscribed_all)? "checked='checked'":"";
    echo "<li><input class='category' type='checkbox' name='subscribe_category[]' value=$category->term_id $checked_string> $category->name </li>";//get_category_link( $category->term_id )
  }

  echo "</ul>";
?>
  <input type="submit" name="modify_categories_submit" value="Update Subscription" />
</form>
<hr />

<form name="unsubscribe_email_form" action=<?php echo home_url();?>  method="post">
  <label> Thank you for following our service, do you really to unsubscribe our latest blog post with the email: <?php echo $_GET['email']?> ? </label>
  <input hidden="hidden" name="unsubscribe_email" value=<?php echo $_GET['email']?> />
  <input type="submit" name="unsubscribe_submit" value="Unsubscribe" />
</form>
