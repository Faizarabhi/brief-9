<?php
/**
 * Form View: User Description
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<div class="ur-input-type-description ur-admin-template">
	<div class="ur-label">
		<label><?php echo esc_html( $this->get_general_setting_data( 'label' ) ); ?></label>
	</div>
	<div class="ur-field" data-field-key="description">
		<textarea id="ur-input-type-description" disabled></textarea>
	</div>
</div>

