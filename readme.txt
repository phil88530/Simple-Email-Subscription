=== Simple Email Subscriber ===
Contributors: phil88530
Donate link: https://github.com/phil88530/Simple-Email-Subscription
Tags: email, subscription, non-login, widget
Requires at least: 3.0.1
Tested up to: 4.0
Stable tag: 4.3
License: OPEN SOURCE

The simple email subscriber plugin allows user to register their email to the wordpress subscription list

== Description ==
Requires user to register for email subscription is a pain: lots blogs doesn't allow user to register even.

The simple email subscriber plugin allows user to register their email to the wordpress subscription list, and it's flexible that user can always un-subscribe through click the unsubscribe email link.


== Installation ==
1. Download the plugin into the plugin folder 
1. Activate it through the plugins panel
1. Go to widget panel, and add the widget to your page(with fill in Subscription hint and successful message content
1. To manually unsubscribe an email, simply go to Settings -> simple email subscriber, and unsubscribe/add the email address you want. 

== Frequently Asked Questions ==

= When will the email be send? =
The plugin is configured to send email whenever a new post is PUBLISHED, that is if you schedule your post, it will send email only if the post is available to users.

= Clicking the email subscription goes to a 404 page =
Wordpress allows user to do all sort of random setups, which can mess up the url. This plugin uses one of the wordpress standard url getter: home_url() as your website homee link. to set it up, go to settings->general and define "wordpress address" to your blog home page.

Alternatively, if you wants to use the get_site_url() method instead, feel free to go into the plugin code and change all the home_url() to get_site_url() and setup the "site address" to be your home url.


== Screenshots ==
1. adding subscription to widget demo1.png
2. manage subscribers in the wordpress admin demo2.png
3. what plugin looks like in widget demo3.png
3. what profile page looks like in widget demo3.png

== Changelog ==
= 2.3 =
Replaced ui element for ul

= 2.2 =
* added unsubscribe email content modifiable in the widget pannel
* added email subscription description modifiable in the widget pannel

= 2.1 =
* allow user to enable/disable category subscription

= 2.0 =
* can subscribe by categories
* add options to adjust the look of the email with extra footer.(HTML/text format)
* fixing bug of not able to customize success subscription message in the widget
* able to change your subscription profile page from email links.

= 1.5 =
* Added a successful message on the widget for subscription 

= 1.4 =
* Further bug fix for404 issues when My blog is installed in a subdirectory of webroot
* Ensures unsubscription widget not show up after user unsubscrbe

= 1.3 =
* Fixing bug of wordpress under different repository of site and results 404(Using home_url() instead of get_site_url())
 

= 1.2 =
* Fixing bug of unsubscribe link is the from_email issue. (should be to_email)

= 1.1 =
* supports sub-domains or sub-directory blogs

= 1.0 =
*First version of this plugin

== Upgrade Notice ==
= 2.3 =
Replaced ui element for ul

= 2.2 =
* added unsubscribe email content modifiable in the widget pannel
* added email subscription description modifiable in the widget pannel

= 2.1 =
* allow user to enable/disable category subscription

= 2.0 =
* can subscribe by categories
* add options to adjust the look of the email with extra footer.(HTML/text format)
* fixing bug of not able to customize success subscription message in the widget
* able to change your subscription profile page from email links.

= 1.5 =
* Added a successful message on the widget for subscription

= 1.4 =
* Further bug fix for404 issues when My blog is installed in a subdirectory of webroot
* Ensures unsubscription widget not show up after user unsubscrbe

= 1.3 =
* Fixing bug of wordpress under different repository of site and results 404(Using home_url() instead of get_site_url())

= 1.2 =
* Fixing bug of unsubscribe link is the from_email issue. (should be to_email)

= 1.0 =
*first version of the plugin
