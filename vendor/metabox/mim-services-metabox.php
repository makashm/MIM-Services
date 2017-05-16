<?php
/**
 * Plugin name: MDC Meta Box Example
 */
require dirname( __FILE__ ) . '/class.mdc-meta-box.php';

$args = array(
    'meta_box_id'   =>  'sample_meta_id',
    'label'     =>  'Sample Meta Box',
    'post_type' =>  array( 'mim-services' ),
    'context'   =>  'advanced', // side|normal|advanced
    'priority'  =>  'high', // high|low
    'fields'    =>  array(
        /**
         * PLEASE NOTE
         * desc, class, default, readonly, disabled, cols, rows, text_mode, teeny and media_buttons are optional.
         */
        array(
            'name'      =>  'sample_text',
            'label'     =>  __( 'Text Field' ),
            'type'      =>  'text',
            'desc'      =>  __( 'This is a text field.' ),
            'class'     =>  'regular-text',
            'default'   =>  'Hello World!',
            'readonly'  =>  false, // true|false
            'disabled'  =>  false, // true|false
        ),
    )
);

mdc_meta_box( $args );
