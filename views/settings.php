<?php $settings = $this->getSettings(); ?>
<div class="wrap" style="direction: ltr;">
	<h2><?php _e( 'Gigya Toolbar Settings' ); ?></h2>
	<form method="post">
		<table class="form-table">
			<tbody>
				<tr>
					<th scope="row"><label for="gigya-toolbar-for-wordpress-api-key"><?php _e( 'Gigya API Key' ); ?></label></th>
					<td>
						<input type="text" class="regular-text" id="gigya-toolbar-for-wordpress-api-key" name="gigya-toolbar-for-wordpress-api-key" value="<?php echo attribute_escape( $settings[ 'gigya-toolbar-for-wordpress-api-key' ] ); ?>" /><br />
						<?php _e( 'You must register your site and enter your API key for the toolbar to appear.' ); ?><br/>
						<?php _e( 'Get your API Key from <a href="http://www.gigya.com/site/partners/Socialize.aspx" target="_blank" >Gigya</a>.' ); ?>
					</td>
				</tr>
				<tr>
					<th scope="row"><label for="gigya-toolbar-for-wordpress-partner-id"><?php _e( 'Gigya Partner ID' ); ?></label></th>
					<td>
						<input type="text" class="regular-text" id="gigya-toolbar-for-wordpress-partner-id" name="gigya-toolbar-for-wordpress-partner-id" value="<?php echo attribute_escape( $settings[ 'gigya-toolbar-for-wordpress-partner-id' ] ); ?>" />
					</td>
				</tr>
				<tr>
					<th scope="row"><label for="gigya-toolbar-for-wordpress-facebook-pageid"><?php _e( 'Facebook Page ID' ); ?></label></th>
					<td>
						<input type="text" class="regular-text" id="gigya-toolbar-for-wordpress-facebook-pageid" name="gigya-toolbar-for-wordpress-facebook-pageid" value="<?php echo attribute_escape( $settings[ 'gigya-toolbar-for-wordpress-facebook-pageid' ] ); ?>" /><br />
						<?php _e( 'Enter your Facebook page ID to enable the "Fan Page" button' ); ?>
					</td>
				</tr>
				<tr>
					<th scope="row"><label for="gigya-toolbar-for-wordpress-twitter-name"><?php _e( 'Twitter name' ); ?></label></th>
					<td>
						<input type="text" class="regular-text" id="gigya-toolbar-for-wordpress-twitter-name" name="gigya-toolbar-for-wordpress-twitter-name" value="<?php echo attribute_escape( $settings[ 'gigya-toolbar-for-wordpress-twitter-name' ] ); ?>" /><br />
						<?php _e( 'Enter your twitter user name to enable the twitter widget button' ); ?>
					</td>
				</tr>
				<tr>
					<th scope="row"><label for="gigya-toolbar-for-wordpress-rss-url"><?php _e( 'RSS Url' ); ?></label></th>
					<td>
						<input type="text" class="regular-text" id="gigya-toolbar-for-wordpress-rss-url" name="gigya-toolbar-for-wordpress-rss-url" value="<?php echo attribute_escape( $settings[ 'gigya-toolbar-for-wordpress-rss-url' ] ); ?>" /><br />
						<?php _e( 'Enter your RSS url to enable the RSS button' ); ?>
					</td>
				</tr>
				<tr>
					<th scope="row"><label for="gigya-toolbar-for-wordpress-status-text"><?php _e( 'Default Status Message' ); ?></label></th>
					<td>
						<textarea class="large-text" rows="1" name="gigya-toolbar-for-wordpress-status-text"><?php echo htmlspecialchars( $settings[ 'gigya-toolbar-for-wordpress-status-text' ] ); ?></textarea><br />
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
						<textarea class="large-text" rows="1" name="gigya-toolbar-for-wordpress-email-subject"><?php echo htmlspecialchars( $settings[ 'gigya-toolbar-for-wordpress-email-subject' ] ); ?></textarea><br />
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
						<textarea class="large-text" rows="1" name="gigya-toolbar-for-wordpress-email-body"><?php echo htmlspecialchars( $settings[ 'gigya-toolbar-for-wordpress-email-body' ] ); ?></textarea><br />
						<?php _e( 'Use the following placeholders in the text above.  This text will be used when others share your article.' ); ?>
						<ul>
							<li><?php _e( '<code>%SITENAME%</code> - Replaced with the name of your WordPress blog.' ); ?></li>
							<li><?php _e( '<code>%URL%</code> - Replaced with the link to the post being shared.' ); ?></li>
							<li><?php _e( '<code>%TITLE%</code> - Replaced with the title of the post being shared.' ); ?></li>
						</ul>
					</td>
				</tr>
				<tr>
					<th scope="row"><label for="gigya-toolbar-for-wordpress-enable-welcome"><?php _e( 'Show Welcome Message' ); ?></label></th>
					<td>
						<input <?php checked( 1, $settings[ 'gigya-toolbar-for-wordpress-enable-welcome' ] ); ?>type="checkbox" value="1" id="gigya-toolbar-for-wordpress-enable-welcome" name="gigya-toolbar-for-wordpress-enable-welcome" />
					</td>
</tr><tr>
					<th scope="row"><label for="gigya-toolbar-for-wordpress-welcome-text"><?php _e( 'Welcome Message Text' ); ?></label></th>
					<td>
						<textarea class="large-text" rows="1" name="gigya-toolbar-for-wordpress-welcome-text"><?php echo htmlspecialchars( $settings[ 'gigya-toolbar-for-wordpress-welcome-text' ] ); ?></textarea><br />
					</td>
				</tr>
				<tr>
					<th scope="row"><label for="gigya-toolbar-for-wordpress-theme"><?php _e( 'Toolbar Theme' ); ?></label></th>
					<td>
						<select id="gigya-toolbar-for-wordpress-theme" name="gigya-toolbar-for-wordpress-theme">
							<option <?php selected( 'blue', $settings[ 'gigya-toolbar-for-wordpress-theme' ] ); ?> value="blue"><?php _e( 'Blue' ); ?></option>
							<option <?php selected( 'gray', $settings[ 'gigya-toolbar-for-wordpress-theme' ] ); ?> value="gray"><?php _e( 'Gray' ); ?></option>
						<option <?php selected( 'brown', $settings[ 'gigya-toolbar-for-wordpress-theme' ] ); ?> value="brown"><?php _e( 'Brown' ); ?></option>
						</select>
					</td>
				</tr>
				<tr>
					<th scope="row"><label for="gigya-toolbar-for-wordpress-hide-search"><?php _e( 'Hide Search Box' ); ?></label></th>
					<td>
						<input <?php checked( 1, $settings[ 'gigya-toolbar-for-wordpress-hide-search' ] ); ?>type="checkbox" value="1" id="gigya-toolbar-for-wordpress-hide-search" name="gigya-toolbar-for-wordpress-hide-search" />
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