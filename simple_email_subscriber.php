<?php
/*  Copyright 2014  YuFei Zhu  (email : support@phil88530.com)
    Plugin Name: Simple Email Subscriber
    Plugin URI: http://wordpress.org/extend/plugins/simple-email-subscriber/
    Version: 2.3
    Description: <strong> Simple Email Subscriber </strong> allows you blogger to get email subscribe when a new post is published. You can unsubscripe the post through the receving email.
    Usage:  Simply activate the plugin after putting the source folder into the wordpress plugins folder
    Author: YuFei Zhu
    Author URI: http://phil88530.com

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
include_once "define.php";
include_once 'includes/form_processor.php';
include_once 'includes/email_subscriber.php';
include_once 'includes/options_page.php';
include_once 'includes/widget.php';

//register the plugin installation methods
register_activation_hook(__FILE__, 'install_simple_subscriber_plugin');
register_deactivation_hook(__FILE__, 'uninstall_simple_subscriber_plugin');

//register the plugin url
wp_enqueue_style('simple-email-subscriber-css', plugins_url('/stylesheets/style.css', __FILE__ ) );
add_action('plugins_loaded', 'setup_plugin_actions');

function install_simple_subscriber_plugin(){
  email_subscriber::install_database();
  email_subscriber::update_database();
}

function setup_plugin_actions(){
  if(has_action('publish_post')){
    $simple_email_subscriber = new email_subscriber();
    //add action listener to post publication
    add_action('publish_post', array($simple_email_subscriber, 'on_publish_post'));
    add_action('publish__future_post', array($simple_email_subscriber, 'on_publish_post'));
  }

  //add the admin menu pages
  $options_page = new options_page();
}

function uninstall_simple_subscriber_plugin(){
  remove_action('plugins_loaded', 'setup_plugin_actions');
}
?>
