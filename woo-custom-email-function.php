<?php
   /*
   Plugin Name: Woocommerce Custom Email Notification
   Plugin URI:  http://
   Description: Add an additional tab and email cc field to send a notification based on specific product page settings.
   Version: 1.0
   Author: Liveby6
   Author URI: https://liveby5.com/
   License: GPLv2 or later
   License URI: https://www.gnu.org/licenses/gpl-2.0.html
   Text Domain: woocommerce-custom-email-notification
   Domain Path: /lang/
    */

   /*
    Copyright 2019 by Liveby5

    This program is owned and developed under Liveby5 and will be used
    by the Company alone and limit to use on it's personal projects only.

    */

   if ( ! defined( 'ABSPATH' ) ) {
      die( '-1' );
   }
   
   include('lib/tab.php');
   include('lib/custom-field.php');
   include('lib/email-notification.php');
   

