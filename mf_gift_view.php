<?php
$page = "mf_gift_view";
include "header.php";

if(isset($_GET[view])){$query = "SELECT * FROM mf_gifts WHERE id=$_GET[view] AND to_id = $_GET[user]";
}else{header("Location: ".$url->url_create('profile', $user->user_info[user_username]));}


$gifts = $database->database_query($query);
while($gift_info = $database->database_fetch_assoc($gifts)) {
	$gift_author = new se_user(Array($gift_info[from_id]));
	$gift_vars[$gift_info[id]] = $gift_info;
	SE_Language::_preload_multi($gift_info[lang]);
}

// ASSIGN SMARTY VARS AND INCLUDE FOOTER
$smarty->assign('gift_author', $gift_author);
$smarty->assign('gift_vars', $gift_vars);
include "footer.php";
?>