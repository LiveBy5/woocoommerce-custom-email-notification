<?php
/**
 * Register the Tab by hooking into the 'woocommerce_product_data_tabs' filter
*/
  
add_filter( 'woocommerce_product_data_tabs', 'add_my_custom_product_data_tab' );
function add_my_custom_product_data_tab( $product_data_tabs ) {
    $product_data_tabs['email-notification-tab'] = array(
        'label' => __( 'Email Notification', 'woocommerce' ),
        'target' => 'custom_email_product_data',
        'class'     => array( '' ),
    );
    $insert_at_position = 2; // Change this for desire position
    $tabs = array_slice( $product_data_tabs , 0, $insert_at_position, true ); // First part of original tabs
    $tabs = array_merge( $tabs, $new_custom_tab ); // Add new
    $tabs = array_merge( $tabs, array_slice( $product_data_tabs , $insert_at_position, null, true ) ); // Glue the second part of original
    return $product_data_tabs;
}

/** CSS To Add Custom tab Icon */
function wcpp_custom_style() { 
	wp_enqueue_style('email-notification', plugin_dir_url(__FILE__).'/assets/css/email-notification.css');
}
add_action( 'admin_head', 'wcpp_custom_style' );

?>
