<?

$plugin_name = "Gifts Plugin";
$plugin_version = "3.01";
$plugin_type = "gift";
$plugin_desc = "This plugin gives the chance to your users to give gifts to friends.";
$plugin_icon = "gifts16.gif";
$plugin_menu_title = "80000003";
$plugin_pages_main = "80000005<!>gifts16.gif<!>admin_gifts.php<~!~>";
$plugin_pages_level = "";
$plugin_url_htaccess = "";

if($install == "gift") {



	$database->database_query("INSERT INTO se_plugins (plugin_name,
					plugin_version,
					plugin_type,
					plugin_desc,
					plugin_icon,
					plugin_menu_title,
					plugin_pages_main,
					plugin_pages_level,
					plugin_url_htaccess
					) VALUES (
					'$plugin_name',
					'$plugin_version',
					'$plugin_type',
					'".str_replace("'", "\'", $plugin_desc)."',
					'$plugin_icon',
					'$plugin_menu_title',
					'$plugin_pages_main',
					'$plugin_pages_level',
					'$plugin_url_htaccess')");



	$database->database_query("CREATE TABLE `mf_gifts` (
		`id` int(11) PRIMARY KEY auto_increment,
		`from_id` varchar(55),
		`to_id` varchar(55),
		`gift` int(5),
		`message` text,
		`private` int(1),
		`date` varchar(55),
		`filetype` varchar(4),
		`lang` varchar(16))");

	$database->database_query("CREATE TABLE `mf_gifts_data` (
		`id` int(11) PRIMARY KEY auto_increment,
		`filetype` varchar(4),
		`type` int(5),
		`status` int(1),
		`lang` int(16),
		`date` varchar(55),
		`hits` int(55) default '0') ");

	$database->database_query("CREATE TABLE `mf_gifts_type` (
		`id` int(11) PRIMARY KEY auto_increment,
		`status` int(2),
		`lang` int(16))");


	$database->database_query("INSERT INTO `se_actiontypes` VALUES ('', 'sendgift', 'gifts16.gif', 1, 1, 700051, 80000027, '[username1],[displayname1],[username2],[displayname2],[message]', 0)");
	$database->database_query("INSERT INTO `se_notifytypes` VALUES ('', 'gifts16.gif', 'newgift', 80000036, 'profile.php?user=%1\$s&v=gift&del=notify', 80000037, 0)");
	$database->database_query("INSERT INTO `se_urls` VALUES ('', 'Gifts List', 'mf_gifts_user', 'mf_gifts_user.php?user=', '')");
	$database->database_query("INSERT INTO `se_systememails` VALUES ('', 'newgift', 80000038, 80000039, 80000040, 80000041, '[displayname],[sender],[link]')");

	$database->database_query("INSERT INTO `se_languagevars` (`languagevar_id`, `languagevar_language_id`, `languagevar_value`, `languagevar_default`) VALUES
(80000014, 1, 'Browse', ''),
(80000015, 1, 'Uploaded', ''),
(80000016, 1, 'All', ''),
(80000017, 1, 'To send a gift for', NULL),
(80000018, 1, 'Visibility', ''),
(80000019, 1, 'Public (your name and the message will be accessible to all)', ''),
(80000020, 1, 'Private (your name and the message are visible only to the addressee of a gift)', ''),
(80000021, 1, 'Your gift has been sent!', ''),
(80000022, 1, 'Send', NULL),
(80000023, 1, 'Has presented', NULL),
(80000024, 1, 'Private gift', NULL),
(80000025, 1, 'Gift of', NULL),
(80000034, 1, 'Are you sure you want to delete this category? Warning: All images within this category will also be deleted.', ''),
(80000036, 1, 'When I receive a new gift.', ''),
(80000028, 1, 'You have not chosen a gift', ''),
(80000029, 1, '%1\$s''s gifts', ''),
(80000030, 1, 'My Gifts', ''),
(80000031, 1, 'At you %1\$s gifts, you have presented %2\$s gifts.', NULL),
(80000007, 1, 'Gifts', 'header, '),
(80000008, 1, 'This page contains general gifts settings that affect your entire social network.', ''),
(80000005, 1, 'Global Gifts Settings', 'admin_viewusers_edit, admin_viewusers, admin_viewreports, admin_viewplugins, admin_viewadmins, admin_url, admin_templates, admin_subnetworks, admin_stats, admin_signup, admin_profile, admin_lostpass_reset, admin_lostpass, admin_login, admin_log, admin_levels_usersettings, admin_levels_messagesettings, admin_levels_edit, admin_levels_albumsettings, admin_levels, admin_language_edit, admin_language, admin_invite, admin_home, admin_general, admin_fields, admin_faq, admin_emails, admin_connections, admin_banning, admin_announcements, admin_ads_modify, admin_ads, admin_activity, '),
(80000012, 1, 'Create new category', ''),
(80000011, 1, 'Options', ''),
(80000009, 1, 'Title', ''),
(80000010, 1, 'Count', ''),
(80000006, 1, 'Gifts Settings', 'admin_viewusers_edit, admin_viewusers, admin_viewreports, admin_viewplugins, admin_viewadmins, admin_url, admin_templates, admin_subnetworks, admin_stats, admin_signup, admin_profile, admin_lostpass_reset, admin_lostpass, admin_login, admin_log, admin_levels_usersettings, admin_levels_messagesettings, admin_levels_edit, admin_levels_albumsettings, admin_levels, admin_language_edit, admin_language, admin_invite, admin_home, admin_general, admin_fields, admin_faq, admin_emails, admin_connections, admin_banning, admin_announcements, admin_ads_modify, admin_ads, admin_activity, '),
(80000013, 1, 'Select category', ''),
(80000033, 1, 'Choose the friend', ''),
(80000003, 1, 'Gifts Plugin Settings', 'admin_viewusers_edit, admin_viewusers, admin_viewreports, admin_viewplugins, admin_viewadmins, admin_url, admin_templates, admin_subnetworks, admin_stats, admin_signup, admin_profile, admin_lostpass_reset, admin_lostpass, admin_login, admin_log, admin_levels_usersettings, admin_levels_messagesettings, admin_levels_edit, admin_levels_albumsettings, admin_levels, admin_language_edit, admin_language, admin_invite, admin_home, admin_general, admin_fields, admin_faq, admin_emails, admin_connections, admin_banning, admin_announcements, admin_ads_modify, admin_ads, admin_activity, '),
(80000032, 1, 'You have not chosen any user', ''),
(80000026, 1, 'Send Gift', ''),
(80000027, 1, '<a href=\"profile.php?user=%1\$s\">%2\$s</a> has sent a gift for <a href=\"profile.php?user=%3\$s&v=gift\">%4\$s</a>', NULL),
(80000035, 1, 'Are you sure you want to delete this image? Warning: All data within this image will also be deleted.', ''),
(80000037, 1, '%1\$d New gift(s)', ''),
(80000038, 1, 'New Gift Email', ''),
(80000039, 1, 'This is the email that gets sent to a user when they receive a new gift.', ''),
(80000040, 1, 'You have received a new gift.', ''),
(80000041, 1, 'Hello %1\$s,<br><br>You have just received a new gift from %2\$s. Please click the following link to login and view it:<br><br>%3\$s<br><br>Best Regards,<br>Social Network Administration', ''),
(80000042, 1, 'Unfortunately still nobody gave you gifts. When you receive gifts in the future, they will be listed here.', '')") or die("Insert Into se_languagevars: ".mysql_error());

}



?>