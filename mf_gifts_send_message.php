<?php
$page = "mf_gifts_send_message";
include "header.php";

if(isset($_POST['task'])) { $task = $_POST['task']; } elseif(isset($_GET['task'])) { $task = $_GET['task']; } else { $task = ""; }
if(isset($_POST['p'])) { $p = $_POST['p']; } elseif(isset($_GET['p'])) { $p = $_GET['p']; } else { $p = 1; }
if(isset($_GET['to']) && $_GET['to'] != ''){
   
	$user_info = $gift->user_info($_GET['to']);
	$to = "&to=$_GET[to]";
	$to_username = "$_GET[to]";
	$smarty->assign('flag', 1);
	$smarty->assign('to', $to);
	$smarty->assign('to_id', $user_info[user_id]);
	$smarty->assign('to_username', $to_username);
}else {$smarty->assign('flag', 0);}
if(isset($_GET['type']) && $_GET['type'] != ''){
	$tl = "&type=$_GET[type]";
	$smarty->assign('tl', $tl);
}
// ��������� ��������
$type = $database->database_query("SELECT * FROM mf_gifts_type WHERE status = 1");
while($type_info = $database->database_fetch_assoc($type)) {
	$type_vars[$type_info[id]] .= $type_info[lang];
	SE_Language::_preload_multi($type_info[lang]);
}

// ����� �������� �� ��������� �� GET �������
if(!isset($_GET['type']) OR $_GET['type'] == 0) {
	$query = "SELECT * FROM mf_gifts_data";
}else{
	$query = "SELECT * FROM mf_gifts_data WHERE type=".$_GET['type']."";
}

$total_vars = $database->database_num_rows($database->database_query($query));
$vars_per_page = 20;
$page_vars = make_page($total_vars, $vars_per_page, $p);
$query .= " LIMIT $page_vars[0], $vars_per_page";

$gifts = $database->database_query($query);
while($gift_info = $database->database_fetch_assoc($gifts)) {
	$gift_vars[$gift_info[id]] = $gift_info;
	SE_Language::_preload_multi($gift_info[lang]);
}

// SET ERROR VARIABLES AND EMPTY VARS
$is_error = 0;


// TRY TO SEND MESSAGE
if($task == "send") {

	$message = ereg_replace("http://([.]?[a-zA-Z0-9_/-])*", "<a href=\"\\0\">\\0</a>", $_POST['message']);
	$message = ereg_replace("(^| |\n)(www([.]?[a-zA-Z0-9_/-])*)", "\\1<a href=\"http://\\2\">\\2</a>", $message);
	$message = cleanHTML($message, "a");
	$message = str_replace("\n", "<br>", $message);
      $to_user =  $_POST['to'];
      $gift_id = $_POST['gift_id'];
	if($gift_id != '' AND $to_user != ''){
           
		$data = array(
		'to_user' => $to_user,
		'gift_id' => $gift_id,
		'from_id' => $user->user_info[user_id],
		'from_un' => $user->user_info[user_username],
		'from_dn' => $user->user_displayname,
		'message' => $message,
		'private' => $_POST['private']);
		$gift->save_data($data);
	}else{
		$is_error = 80000028;
	}
	if($_POST['to'] == 0){$is_error = 80000032;}
	if($is_error != 0) { SE_Language::_preload($is_error); SE_Language::load(); $error_message = SE_Language::_get($is_error); }
        echo 'all ok'; die();
	// SEND AJAX CONFIRMATION
	/*echo "<html><head><meta http-equiv='Content-Type' content='text/html; charset=UTF-8'><script type='text/javascript'>";
	echo "window.parent.messageSent('$is_error', '".str_replace("'", "\'", $error_message)."');";
	echo "</script></head><body></body></html>";*/
	exit();

}
if($task == "show_gif") {
    $is_error=0;
$total_friends = $user->user_friend_total(0);
$friends = $user->user_friend_list(0, $total_friends, 0);
  echo json_encode(array(
    'is_error' => $is_error,
    'total_friends' => $total_friends,
    'photo'=>$user->user_photo("./images/nophoto.gif"),
    'name'=>$user->user_friend_list(0, $total_friends, 0),
    'friends' => $friends
  ));
 exit();
}

// GET LIST OF FRIENDS FOR SUGGEST BOX
$total_friends = $user->user_friend_total(0);
$friends = $user->user_friend_list(0, $total_friends, 0);

// ASSIGN SMARTY VARS AND INCLUDE FOOTER
$smarty->assign('type', $type_vars);
$smarty->assign('type_a', $_GET['type']);
$smarty->assign('gift_vars', $gift_vars);
$smarty->assign('is_error', $is_error);
$smarty->assign('message', $message);
$smarty->assign('friends', $friends);
$smarty->assign('p', $p);
$smarty->assign('maxpage', $page_vars[2]);
$smarty->assign('p_start', $page_vars[0]+1);
$smarty->assign('p_end', $page_vars[0]+count($gift_vars));
$smarty->assign('total_vars', $total_vars);
include "footer.php";
?>