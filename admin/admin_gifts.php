<?php
$page = "admin_gifts";
include "admin_header.php";
define('APP_ROOT', dirname(dirname(__FILE__)));

include "../include/class_mf_gifts.php";

$adm_gift = new mf_gifts();


if(isset($_POST['p'])) { $p = $_POST['p']; } elseif(isset($_GET['p'])) { $p = $_GET['p']; } else { $p = 1; }
if(isset($_POST['task'])) { $task = $_POST['task']; } elseif(isset($_GET['task'])) { $task = $_GET['task']; } else { $task = "main"; }

// CREATE CATEGORY
if($task == "new_categ") {
	$new_category = trim($_POST['new_category']);
	if (empty($new_category)){
		$error_ef = 'background-color:#FFC4C4;';
		$smarty->assign('error_ef', $error_ef);
	}else {
		$adm_gift->create_category($new_category);
	}
}

// UPLOAD FILE
if($task == "add_file") {
	$gift_title = trim($_POST['title']);
	if(!isset($_FILES)){
		$error_ef = 'background-color:#FFC4C4;';
		$smarty->assign('error_ef3', $error_ef);
	}elseif (empty($gift_title)){
		$error_ef = 'background-color:#FFC4C4;';
		$smarty->assign('error_ef2', $error_ef);
	}else {

		$file = $_FILES["new_file"]["tmp_name"];
		$file_name = $_FILES["new_file"]["name"];
		$file_size = $_FILES["new_file"]["size"];
		$file_type = $_FILES["new_file"]["type"];
		$error_flag = $_FILES["new_file"]["error"];

		if($error_flag == 0)
		{
			$adm_gift->upload($gift_title, $_POST['category'], $_POST['language_id'], $file, $_POST['width'], $_POST['height']);

		}
		else
		{
		}
	}
}

if($task == "delete_img"){
	$adm_gift->deleteimage($_GET[image_id]);
}

if($task == "delete_cat"){
	$adm_gift->deletecategory($_GET[category_id]);
}

// GET LANGUAGES AVAILABLE IF NECESSARY
if($setting[setting_lang_anonymous] == 1 || ($setting[setting_lang_allow] == 1 && $user->user_exists != 0)) {
	$lang_packlist = SE_Language::list_packs();
	ksort($lang_packlist);
	$lang_packlist = array_values($lang_packlist);
}

$type_query = $database->database_query("SELECT * FROM mf_gifts_type");
while($gift_type = $database->database_fetch_assoc($type_query)) {
	$type[$gift_type[id]] .= $gift_type[lang];
	SE_Language::_preload_multi($gift_type[lang]);
}
if(!empty($type)){
	foreach ($type as $k => $v){
		$categ_list[$k] = array($v => $database->database_num_rows($database->database_query("SELECT * FROM mf_gifts_data WHERE type=$k")));
	}
	$smarty->assign('categ_list', $categ_list);
}

if(!isset($_GET['type']) OR $_GET['type'] == 0) {
	$query = "SELECT * FROM mf_gifts_data";
}else{
	$query = "SELECT * FROM mf_gifts_data WHERE type=".$_GET['type']."";
}

// GET TOTAL VARS
$total_vars = $database->database_num_rows($database->database_query($query));

// MAKE VAR PAGES
$vars_per_page = 30;
$page_vars = make_page($total_vars, $vars_per_page, $p);
$query .= " LIMIT $page_vars[0], $vars_per_page";

$gifts = $database->database_query($query);
while($gift_info = $database->database_fetch_assoc($gifts)) {
	$gift_vars[$gift_info[id]] = $gift_info;
	SE_Language::_preload_multi($gift_info[lang]);
}


// ASSIGN VARIABLES AND SHOW GENERAL SETTINGS PAGE
$smarty->assign('type_a', $_GET['type']);
$smarty->assign('gift_vars', $gift_vars);
$smarty->assign('p', $p);
$smarty->assign('maxpage', $page_vars[2]);
$smarty->assign('p_start', $page_vars[0]+1);
$smarty->assign('p_end', $page_vars[0]+count($gift_vars));
$smarty->assign('total_vars', $total_vars);
$smarty->assign('result', $result);
$smarty->assign('lang_packlist', $lang_packlist);
$smarty->assign('lang', $_GET[lang]);
include "admin_footer.php";
?>