<?

// ENSURE THIS IS BEING INCLUDED IN AN SE SCRIPT
if(!defined('SE_PAGE')) { exit(); }

include "./include/class_mf_gifts.php";

$gift = new mf_gifts();

// PRELOAD LANGUAGE
SE_Language::_preload_multi(80000007, 80000026);

$ownergift = $owner->user_info[user_id];
if(isset($_GET[del]) == 'notify'){
	$id_noti = $database->database_fetch_assoc($database->database_query("SELECT notifytype_id FROM se_notifytypes WHERE notifytype_name = 'newgift'"));
	$database->database_query("DELETE FROM se_notifys WHERE notify_user_id =".$owner->user_info[user_id]." AND notify_notifytype_id ='$id_noti[notifytype_id]'");
}

$type_query = $database->database_query(" SELECT id AS gift_id, gift AS file, filetype, lang FROM mf_gifts WHERE to_id=$ownergift ORDER BY date DESC LIMIT 5 "); $type = array(); while($gift_type = $database->database_fetch_assoc($type_query))
{ $type[] = $gift_type; SE_Language::_preload_multi($gift_type['lang']); }

if($gift->user_gifts_total($ownergift) > 0){
	$plugin_vars[menu_profile_tab] = Array('file'=> 'profile_gifts_tab.tpl', 'title' => 80000007);
}

if($ownergift != $user->user_info[user_id] and $user->user_exists != 0){
	$plugin_vars[menu_profile_menu] = Array('file' => "mf_gifts_send.php?to=".$owner->user_info[user_username]."", 'icon' => 'gifts16.gif', 'title' => 80000026);
}

$count_img = $database->database_num_rows($database->database_query("SELECT id FROM mf_gifts_data WHERE status=1"));
if($count_img > 0) {
	$plugin_vars[menu_user] = Array('file' => 'mf_gifts_user.php', 'icon' => 'gifts16.gif', 'title' => 80000007);
}

$smarty->assign('gifts', $type);
$smarty->assign('total_gifts', $gift->user_gifts_total($ownergift));
$smarty->assign('gifts_count', $count_img);
?>