<?php
/**
 * Flatsome functions and definitions
 *
 * @package flatsome
 */

require get_template_directory() . '/inc/init.php';

update_option( 'flatsome_wup_purchase_code', '846b8d75-85b3-4b3e-976c-2e29d386339d' );
update_option( 'flatsome_wup_supported_until', '01.01.2050' );
update_option( 'flatsome_wup_buyer', 'Licensed' );
update_option( 'flatsome_wup_sold_at', time() );
delete_option( 'flatsome_wup_errors');
/**
 * Note: It's not recommended to add any custom code here. Please use a child theme so that your customizations aren't lost during updates.
 * Learn more here: http://codex.wordpress.org/Child_Themes
 */
