<?php

/** Hook callback function for the custom fields */
add_action('woocommerce_product_data_panels', 'woocom_custom_product_data_fields');

function woocom_custom_product_data_fields() {
    // Set global parameters
    global $woocommerce;
    global $post;
    global $product;

    // Note the 'id' attribute needs to match the 'target' parameter set above
    ?> <div id = 'custom_email_product_data'
    class = 'panel woocommerce_options_panel' > <?php
        ?> <div class = 'options_group' > <?php
        
  // Checkbox
  woocommerce_wp_checkbox(
    array(
      'id' => '_enabled_checkbox',
      'label' => __('Enable Notification', 'woocommerce' ),
      'description' => __( '', 'woocommerce' )
    )
  );
              // Text Field
  woocommerce_wp_text_input(
    array(
      'id' => '_email_text_field',
      'label' => __( 'CC Email', 'woocommerce' ),
      'wrapper_class' => '', 
      'placeholder' => 'Enter email address',
      'desc_tip' => 'true',
      'description' => __( 'Enter email address here, ex. support@liveby.com', 'woocommerce' )
    )
  );

  ?> 
  	</div>
    </div>
<?php
}

/** Hook callback function to save custom fields information */
add_action('woocommerce_process_product_meta', 'woocommerce_product_custom_fields_save');

/** Update the custom fields */
function woocommerce_product_custom_fields_save($post_id)
{
    // Save Checkbox
    $woocommerce_custom_product_checkbox = isset($_POST['_enabled_checkbox']) ? 'yes' : 'no';
    update_post_meta($post_id, '_enabled_checkbox', $woocommerce_custom_product_checkbox);
    
    // Save CC Email field 
    $cc_email_field = $_POST['_email_text_field'];
    update_post_meta($post_id, '_email_text_field', $cc_email_field );
}

?>