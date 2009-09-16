<?php $settings = $this->getSettings(); ?>
<div class="wrap">
	<h2><?php _e( 'Gigya Toolbar Settings' ); ?></h2>
	<form method="post">
		<table class="form-table">
			<tbody>
				<tr>
					<th scope="row"><label for="gigya-toolbar-for-wordpress-partner-id"><?php _e( 'Gigya Partner ID' ); ?></label></th>
					<td>
						<input type="text" class="regular-text" id="gigya-toolbar-for-wordpress-partner-id" name="gigya-toolbar-for-wordpress-partner-id" value="<?php echo attribute_escape( $settings[ 'gigya-toolbar-for-wordpress-partner-id' ] ); ?>" />
					</td>
				</tr>
				<tr>
					<th scope="row"><label for="gigya-toolbar-for-wordpress-status-text"><?php _e( 'Default Status Message' ); ?></label></th>
					<td>
						<textarea class="large-text" rows="3" name="gigya-toolbar-for-wordpress-status-text"><?php echo htmlentities( $settings[ 'gigya-toolbar-for-wordpress-status-text' ] ); ?></textarea><br />
						<?php _e( 'Use the following placeholders in the text above.  This text will be used when others share your article.' ); ?>
						<ul>
							<li><?php _e( '<code>%SITENAME%</code> - Replaced with the name of your WordPress blog.' ); ?></li>
							<li><?php _e( '<code>%URL%</code> - Replaced with the link to the post being shared.' ); ?></li>
							<li><?php _e( '<code>%TITLE%</code> - Replaced with the title of the post being shared.' ); ?></li>
						</ul>
					</td>
				</tr>
				<tr>
					<th scope="row"><label for="gigya-toolbar-for-wordpress-email-subject"><?php _e( 'Email Subject' ); ?></label></th>
					<td>
						<textarea class="large-text" rows="3" name="gigya-toolbar-for-wordpress-email-subject"><?php echo htmlentities( $settings[ 'gigya-toolbar-for-wordpress-email-subject' ] ); ?></textarea><br />
						<?php _e( 'Use the following placeholders in the text above.  This text will be used when others share your article.' ); ?>
						<ul>
							<li><?php _e( '<code>%SITENAME%</code> - Replaced with the name of your WordPress blog.' ); ?></li>
							<li><?php _e( '<code>%URL%</code> - Replaced with the link to the post being shared.' ); ?></li>
							<li><?php _e( '<code>%TITLE%</code> - Replaced with the title of the post being shared.' ); ?></li>
						</ul>
					</td>
				</tr>
				<tr>
					<th scope="row"><label for="gigya-toolbar-for-wordpress-email-body"><?php _e( 'Email Body' ); ?></label></th>
					<td>
						<textarea class="large-text" rows="3" name="gigya-toolbar-for-wordpress-email-body"><?php echo htmlentities( $settings[ 'gigya-toolbar-for-wordpress-email-body' ] ); ?></textarea><br />
						<?php _e( 'Use the following placeholders in the text above.  This text will be used when others share your article.' ); ?>
						<ul>
							<li><?php _e( '<code>%SITENAME%</code> - Replaced with the name of your WordPress blog.' ); ?></li>
							<li><?php _e( '<code>%URL%</code> - Replaced with the link to the post being shared.' ); ?></li>
							<li><?php _e( '<code>%TITLE%</code> - Replaced with the title of the post being shared.' ); ?></li>
						</ul>
					</td>
				</tr>

			</tbody>
		</table>
		<p class="submit">
			<?php wp_nonce_field( 'save-gigya-toolbar-for-wordpress-settings' ); ?>
			<input type="submit" name="save-gigya-toolbar-for-wordpress-settings" id="save-gigya-toolbar-for-wordpress-settings" value="<?php _e( 'Save Settings' ); ?>" />
		</p>
	</form>
</div>