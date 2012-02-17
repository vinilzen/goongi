<?php

/* $Id: user_friends.php 42 2009-01-29 04:55:14Z john $ */

$page = "user_friends";
include "header.php";

//print_r($user->user_info); die();

if (!isset($_POST['task'])) {
	echo json_encode(array("success"=>"0","msg"=>"Произошла ошибка, попробуйте еще раз."));
	die();
} 

if ( $_POST['task'] == 'add' && isset($_POST['gn']) ) {
	
	$group_name = $_POST['gn'];
	
	if ($group_name == '') {
		
		echo json_encode(array("success"=>"0","msg"=>"Заполните Название группы"));
		die();
		
	} elseif ( strlen($group_name) < 3 ) {
		
		echo json_encode(array("success"=>"0","msg"=>"Название группы должно быть длиннее 2 символов."));
		die();
		
	//} elseif (  !preg_match("/^[a-zA-Z0-9]+$/",$group_name)  ) {
	//
	//	echo json_encode(array("success"=>"0","msg"=>"Название группы должно содержать только буквы и цифры."));
	//	die();
		
	}  elseif ( $user->user_check_group_name($group_name) ) {
		
		echo json_encode(array("success"=>"0","msg"=>"Группа с таким именем у вас уже есть."));
		die();
		
	} else {
		
		$group_id = $user->user_add_group($group_name);
		if ( $group_id ) {
			
			echo json_encode(array("success"=>"1","msg"=>"Группа ".$group_name." успешно создана!","group_id"=>$group_id));
			die();	
		} else {
			echo json_encode(array("success"=>"0","msg"=>"Произошла ошибка при создании группы, попробуйте еще раз."));
			die();
		}
		//$groups = $user->user_group_list();
	}
}  elseif ($_POST['task'] == 'update') {
	
	$group_list = $user->user_group_list();
	//print_r($group_list); die();
	$str = '';
	if ( isset($group_list) && count($group_list) ) {
		foreach ($group_list AS $k=>$v) {
			$str .= '<li><a href="#" onclick="show_user('. $v['users'] . '); return false;">' . $v['name'] . '</a></li>';
		}
	}
	echo json_encode(array("success"=>"1","msg"=>$str));
	die();
	
} else {
	
	echo json_encode(array("success"=>"0","msg"=>"Произошла ошибка, попробуйте еще раз."));
	die();
	
}

die();

// ENSURE CONECTIONS ARE ALLOWED FOR THIS USER
if( !$setting['setting_connection_allow'] ) {
  header("Location: user_home.php");
  exit();
}


// SET FRIEND SORT-BY VARIABLES FOR HEADING LINKS
$u = "ud";    // LAST UPDATE DATE
$l = "ld";    // LAST LOGIN DATE
$t = "t";     // FRIEND TYPE

// SET SORT VARIABLE FOR DATABASE QUERY
switch($s)
{
  case "ud": $sort = "se_users.user_dateupdated DESC"; $u = "ud"; break;
  case "ld": $sort = "se_users.user_lastlogindate DESC"; $l = "ld"; break;
  case "t": $sort = "se_friends.friend_type"; $t = "td"; break;
  default: $sort = "se_users.user_dateupdated DESC"; $u = "ud";
}

// SET WHERE CLAUSE
$is_where = 0;
$where = "";
if($search != "")
{
  $is_where = 1;
  $where = "(se_users.user_username LIKE '%$search%' OR se_users.user_fname LIKE '%$search%' OR se_users.user_lname LIKE '%$search%' OR CONCAT(se_users.user_fname, ' ', se_users.user_lname) LIKE '%$search%' OR se_users.user_email LIKE '%$search%')";
}

// DECIDE WHETHER TO SHOW DETAILS
$connection_types = explode("<!>", trim($setting['setting_connection_types']));
$show_details = ( !empty($connection_types) || $setting['setting_connection_other'] || $setting['setting_connection_explain'] );

// GET TOTAL FRIENDS
$total_friends = $user->user_friend_total(0, 1, $is_where, $where);

// MAKE FRIEND PAGES
$friends_per_page = 10;
$page_vars = make_page($total_friends, $friends_per_page, $p);

// GET FRIEND ARRAY
$friends = $user->user_friend_list($page_vars[0], $friends_per_page, 0, 1, $sort, $where, $show_details);



// ASSIGN VARIABLES AND INCLUDE FOOTER
$smarty->assign('s', $s);
$smarty->assign('u', $u);
$smarty->assign('l', $l);
$smarty->assign('t', $t);
$smarty->assign('search', $search);
$smarty->assign('friends', $friends);
$smarty->assign('total_friends', $total_friends);
$smarty->assign('maxpage', $page_vars[2]);
$smarty->assign('p', $page_vars[1]);
$smarty->assign('p_start', $page_vars[0]+1);
$smarty->assign('p_end', $page_vars[0]+count($friends));
$smarty->assign('show_details', $show_details);
include "footer.php";
?>