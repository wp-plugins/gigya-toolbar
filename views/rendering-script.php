<?php
$settings = $this->getSettings();
$sitename = get_bloginfo();
if (is_singular())
{
	$title = get_the_title();
	$permalink = get_permalink();
}
else
{
	$title = $sitename;
	$permalink = get_bloginfo('home');
}
$partner = $settings[ 'gigya-toolbar-for-wordpress-partner-id' ];
$apiKey = $settings[ 'gigya-toolbar-for-wordpress-api-key' ];
$statusMsg = $settings[ 'gigya-toolbar-for-wordpress-status-text' ];
if (!empty($statusMsg))
{
	$statusMsg = str_replace( array( '%URL%', '%SITENAME%', '%TITLE%' ), array( $permalink, $sitename, $title ), $statusMsg);
}
$emailSubject = $settings[ 'gigya-toolbar-for-wordpress-email-subject' ];
if (!empty($emailSubject))
{
	$emailSubject = str_replace( array( '%URL%', '%SITENAME%', '%TITLE%' ), array( $permalink, $sitename, $title ), $emailSubject);
}
$emailBody = $settings[ 'gigya-toolbar-for-wordpress-email-body' ];
if (!empty($emailBody))
{
	$emailBody = str_replace( array( '%URL%', '%SITENAME%', '%TITLE%' ), array( $permalink, $sitename, $title ), $emailBody);
}
$welcomeMessage = $settings[ 'gigya-toolbar-for-wordpress-welcome-text' ];
$twitterName = $settings[ 'gigya-toolbar-for-wordpress-twitter-name' ];
$rssUrl = $settings[ 'gigya-toolbar-for-wordpress-rss-url' ];
$facebookPageId = $settings[ 'gigya-toolbar-for-wordpress-facebook-pageid' ];
$theme = $settings[ 'gigya-toolbar-for-wordpress-theme' ];
$hideSearch = $settings[ 'gigya-toolbar-for-wordpress-hide-search' ];
$showWelcome = $settings[ 'gigya-toolbar-for-wordpress-enable-welcome' ];
?>
<script>
	var gs_partner = '<?php echo addslashes($partner); ?>';
	<?php if (!empty($apiKey)) : ?>
	var gs_apikey = '<?php echo addslashes($apiKey); ?>';
	<?php endif; ?>
	<?php if (!empty($statusMsg)) : ?>
	var gs_statusMessage = '<?php echo addslashes($statusMsg); ?>';
	<?php endif; ?>
	<?php if (!empty($emailSubject)) : ?>
	var gs_subject = '<?php echo addslashes($emailSubject); ?>';
	<?php endif; ?>
	<?php if (!empty($emailBody)) : ?>
	var gs_body = '<?php echo addslashes($emailBody); ?>';
	<?php endif; ?>
	<?php if (!empty($twitterName)) : ?>
	var gs_twitterName = '<?php echo addslashes($twitterName); ?>';
	<?php endif; ?>
	<?php if (!empty($rssUrl)) : ?>
	var gs_RSSUrl = '<?php echo addslashes($rssUrl); ?>';
	<?php endif; ?>
	<?php if (!empty($facebookPageId)) : ?>
	var gs_facebookPageId = '<?php echo addslashes($facebookPageId); ?>';
	<?php endif; ?>
	<?php if (!empty($theme)) : ?>
	var gs_theme = '<?php echo addslashes($theme); ?>';
	<?php endif; ?>
	<?php if (!empty($hideSearch) && ($hideSearch)) : ?>
	var gs_hideSearch = true;
	<?php endif; ?>
	<?php if (!empty($showWelcome) && ($showWelcome) && !empty($welcomeMessage)) : ?>
	var gs_welcomeMessage = '<?php echo addslashes($welcomeMessage); ?>';
	var gs_showWelcome = true
	<?php endif; ?>
</script>
	<?php if (!empty($apiKey)) : ?>
	<script src='http://toolbar.cdn.gigya.com/v2/toolbar.js'></script>
	<?php endif; ?>
