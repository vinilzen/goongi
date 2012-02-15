<?php

/* $Id: user_friends.php 42 2009-01-29 04:55:14Z john $ */

$page = "user_friends";
include "header.php";

if(isset($_POST['p'])) { $p = $_POST['p']; } elseif(isset($_GET['p'])) { $p = $_GET['p']; } else { $p = 1; }
if(isset($_POST['s'])) { $s = $_POST['s']; } elseif(isset($_GET['s'])) { $s = $_GET['s']; } else { $s = "ud"; }
if(isset($_POST['search'])) { $search = $_POST['search']; } elseif(isset($_GET['search'])) { $search = $_GET['search']; } else { $search = ""; }
if(isset($_POST['task'])) { $task = $_POST['task']; } elseif(isset($_GET['task'])) { $task = $_GET['task']; } else { $task = ""; }

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
switch($s) {
  case "ud": $sort = "se_users.user_dateupdated DESC"; $u = "ud"; break;
  case "ld": $sort = "se_users.user_lastlogindate DESC"; $l = "ld"; break;
  case "t": $sort = "se_friends.friend_type"; $t = "td"; break;
  default: $sort = "se_users.user_dateupdated DESC"; $u = "ud";
}

// SET WHERE CLAUSE
$is_where = 0;
$where = "";
if($search != "") {
  $is_where = 1;
  $where = "(se_users.user_username LIKE '%$search%' OR se_users.user_fname LIKE '%$search%' OR se_users.user_lname LIKE '%$search%' OR CONCAT(se_users.user_fname, ' ', se_users.user_lname) LIKE '%$search%' OR se_users.user_email LIKE '%$search%')";
}

// DECIDE WHETHER TO SHOW DETAILS
$connection_types = explode("<!>", trim($setting['setting_connection_types']));
$show_details = ( !empty($connection_types) || $setting['setting_connection_other'] || $setting['setting_connection_explain'] );

// GET TOTAL FRIENDS
$total_friends = $user->user_friend_total(0, 1, $is_where, $where);

if ( isset($_POST['json']) && $_POST['json'] == 1 ){
	 if ( isset($_POST['task']) && $_POST['task'] == 'get_friends' )  {
		if ($total_friends > 0) {
			$friends = $user->user_friend_list(0, $total_friends, 0, 1, $sort, $where, $show_details);
			
			foreach ($friends AS $k=>$v){
				$result[ $v->user_info['user_id'] ] = $v->user_info;
				$result[ $v->user_info['user_id'] ]['user_sex'] = $user->get_sex( $v->user_info['user_id'] );
			}
			//echo '<pre>';
			//print_r($result);
			echo json_encode(array('error'=>0,'result'=>$result)); 
			die();
		} else {
			echo json_encode(array('error'=>1,'result'=>SE_Language::get(904)));  // Your friend list is empty.
			die();
		}
	} elseif( isset($_POST['task']) && $_POST['task'] == 'save_group' ){
		
		if ( $user->update_user_group( $_POST['group'],$_POST['users'] ) ) {
			
			echo json_encode(array('error'=>0,'result'=>'Группа обновленна.')); 
			die();
			
		} else {
			
			echo json_encode(array('error'=>1,'result'=>'Ошибкак обновления группы друзей.'));  // Your friend list is empty.
			die();
			
		}
	} elseif( isset($_POST['task']) && $_POST['task'] == 'del_group' ){
		
		if ( $user->del_group( $_POST['group'] ) ) {
			
			echo json_encode(array('error'=>0,'result'=>'Группа обновленна.')); 
			die();
			
		} else {
			
			echo json_encode(array('error'=>1,'result'=>'Ошибкак обновления группы друзей.'));  // Your friend list is empty.
			die();
			
		}
	}
}

// MAKE FRIEND PAGES
$friends_per_page = 10;
$page_vars = make_page($total_friends, $friends_per_page, $p);



// GET FRIEND ARRAY
$friends = $user->user_friend_list($page_vars[0], $friends_per_page, 0, 1, $sort, $where, $show_details);

$groups = $user->user_group_list();
$smarty->assign('$user_exists', $user->user_exists);
$smarty->assign('s', $s);
$smarty->assign('u', $u);
$smarty->assign('l', $l);
$smarty->assign('t', $t);
$smarty->assign('search', $search);
$smarty->assign('friends', $friends);
$smarty->assign('user_groups', $user_groups);
if ( isset($groups) && count($groups) )
	$smarty->assign('groups', $groups);
$smarty->assign('total_friends', $total_friends);
$smarty->assign('maxpage', $page_vars[2]);
$smarty->assign('p', $page_vars[1]);
$smarty->assign('p_start', $page_vars[0]+1);
$smarty->assign('p_end', $page_vars[0]+count($friends));
$smarty->assign('show_details', $show_details);
include "footer.php";
?>