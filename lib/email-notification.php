<?php
/**
 * Add another email recipient for admin New Order emails if a shippable product is ordered
 *
 * @param string $recipient a comma-separated string of email recipients (will turn into an array after this filter!)
 * @param \WC_Order $order the order object for which the email is sent
 * @return string $recipient the updated list of email recipients
 */
 
function custom_email_field_recipient( $recipient, $order ) {
	global $post;
	
	$page = $_GET['page'] = isset( $_GET['page'] ) ? $_GET['page'] : '';
	if ( 'wc-settings' === $page ) {
		return $recipient; 
	}	

	if ( ! $order instanceof WC_Order ) {
		return $recipient; 
	}
	$items = $order->get_items();
	
	// check if a shipped product is in the order	
	foreach ( $items as $item ) {
		$product = $order->get_product_from_item( $item );
		$product_id = $item['product_id'];
		$new_email = get_post_meta($product_id, '_email_text_field', true);
		$email_option = get_post_meta($product_id, '_enabled_checkbox', true);
		if ( $product ) {
			if ($email_option == 'yes') {
				$recipient .= ", ".$new_email;
				return $recipient;
			}
		}
	}
	
	return $recipient;
}
add_filter( 'woocommerce_email_recipient_new_order', 'custom_email_field_recipient', 10, 2 );

?>