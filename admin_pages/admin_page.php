<h2> Simple Email Subscriber </h2>

<h3> Subscriber List </h3>
<table>
  <tr>
    <th>
      Email
    </th>
    <th>
      Join Date
    </th>
    <th>
    </th>
  </tr>

<?php
  //setup the action url is the request url
  $action_url=get_site_url().$_SERVER['REQUEST_URI'];

  //fetch all subscribers
  $simple_email_subscriber = new email_subscriber();
  $subscription_list = $simple_email_subscriber->fetch_subscription_list();
  foreach($subscription_list as $subscriber){
    echo '<tr>';
    echo '<td>'.$subscriber->email.'</td>';
    echo '<td>'.$subscriber->subscribe_time.'</td>';
    echo '<td>';
    echo "<form name='unsubscribe_email_form' action=$action_url method='post'>";
    echo '<input hidden="hidden" name="unsubscribe_email" value="'.$subscriber->email.'" />';
    echo '<input type="submit" name="unsubscribe_submit" value="unsubscribe" /></td>';
    echo '</form>';
    echo '</tr>';
  }
?>
</table>
 
<hr/>
<form name="subscribe_email_form" action=<?php echo $action_url;?> method="post">
  <input type="text" name="new_subscription_email" /> 
  <input type="submit" name="subscribe_submit" value="Add Subscription" />
</form>
