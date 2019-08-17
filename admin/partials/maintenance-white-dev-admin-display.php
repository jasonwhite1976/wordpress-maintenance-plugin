<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       www.whitedev.co.uk
 * @since      1.0.0
 *
 * @package    Maintenance_White_Dev
 * @subpackage Maintenance_White_Dev/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div id="wrap">
	<form method="post" action="options.php">
		<?php
			settings_fields( 'maintenance-white-dev-settings' );
			do_settings_sections( 'maintenance-white-dev-settings' );
			submit_button();
		?>
	</form>
</div>