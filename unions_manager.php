<?php

/* $Id: user_friends.php 42 2009-01-29 04:55:14Z john $ */

$page = "unions_manager";
include "header.php";


// ENSURE CONECTIONS ARE ALLOWED FOR THIS USER
if( !$setting['setting_connection_allow'] ) {
  header("Location: user_home.php");
  exit();
}
if ( isset($_POST['do']) && $_POST['do'] == 1 ) {
	
	if(isset($_POST['add_user']) && $_POST['add_user'] == 1) {
		// user does not
		echo 'add_user';
		
	} else {
		// user isset
		if (isset($_POST['unions_type']) && isset($_POST['start_user'])  ) {
			
			$start_user = (int)$_POST['start_user'];
			$role = $_POST['unions_type'];
			$user_rel = (int)$_POST['relations_user'];
			$rewrite = (int)$_POST['rewrite'];
			
			switch ( $role ) {
				
				case $role == 'pf': // add father
					$role = 'father';
					$result = $user->add_role_for_user($start_user,$role,$user_rel, $rewrite );
				break;
				
				case $role == 'pm': // add mother
					$role = 'mother';
					$result = $user->add_role_for_user($start_user,$role,$user_rel, $rewrite );
				break;
				
				case $role == 'pc': // add child
					$role = 'child';
					$result = $user->add_role_for_user($start_user,$role,$user_rel, $rewrite );
				break;
				
				case $role == 'pw': // add spouse
					$role = 'spouse';
					$result = $user->add_role_for_user($start_user,$role,$user_rel, $rewrite );
				break;
				
			}
		}
		
		echo 'select_user';
	}
	die();
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

//echo '<pre>'; print_r($user); die();

// GET FRIEND ARRAY
$friends = $user->user_friend_list($page_vars[0], $friends_per_page, 0, 1, $sort, $where, $show_details);
//$unions = $user->get_user_union();
$family = $user->get_relatives_displayname(); // array ( user_id => displayname )

//echo '<pre>->'; print_r($user); echo '</pre>';  die();

// ASSIGN VARIABLES AND INCLUDE FOOTER
$smarty->assign('$user_exists', $user->user_exists);
$smarty->assign('s', $s);
$smarty->assign('u', $u);
$smarty->assign('l', $l);
$smarty->assign('t', $t);
$smarty->assign('search', $search);
$smarty->assign('friends', $friends);
$smarty->assign('family', $family);
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