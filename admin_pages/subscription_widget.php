<?php
  include_once WP_ADMIN_DIR.'template.php';
  $data = get_option('simple_email_subscription_widget');
  $checlist_args = array(
    'type'                     => 'post',
    'child_of'                 => 0,
    'parent'                   => '',
    'orderby'                  => 'id',
    'order'                    => 'ASC',
    'hide_empty'               => 0,
    'hierarchical'             => 0,
    'exclude'                  => '',
    'include'                  => '',
    'number'                   => '',
    'taxonomy'                 => 'category',
    'pad_counts'               => false 
  );
  $categories=get_categories($args);
?>

<form name="subscribe_email_form" action=<?php echo $action_url;?> method="post">

  <!-- display the category list -->
  <ui class='subscription_categories'>
    <li>
        <input type="radio" name="all_category" value="1" checked>
         All Categories
        <br />
        <input type="radio" name="all_category" value="0">
          Specific Categories
    </li>
  <label>Please select the categories: </label><br/>
<?php
  foreach($categories as $category) { 
    echo "<li><input class='category' type='checkbox' name='subscribe__category[]' value=$category->term_id checked='checked'> $category->name </li>";//get_category_link( $category->term_id )
  } 

  echo "</ui>";
  echo "<hr />";

  //display the subscription email entering fields
  echo $data['subscription_hint'].': <br />';
?>
  <input type="text" name="new_subscription_email" /> 
  <hr />
  We would like to keep you updated with our blog. You can always stop the updates by clicking the 	&ldquo;unsubscribe&rdquo; link in the emails from us
  <br>
  <input type="submit" name="subscribe_submit" value="Subscribe" />
</form>

