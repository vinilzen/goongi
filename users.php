<?php

/* $Id: user_messages_new.php 42 2009-01-29 04:55:14Z john $ */

$page = "friends";
include "header.php";

if(isset($_GET['query'])) {
	$str = $_GET['query'];
	
	//if ( preg_match( "/^(\w+)", $str)) {
	if (preg_match ("/^(\w+)/i", $str)) {
		$where = " `user_username` LIKE '$str%' ";
		$total_friends = $user->user_friend_total(0);
		$friends = $user->user_friend_list(0, $total_friends, 0, 1, "se_users.user_dateupdated DESC", $where);
		$result = "{ query:'$str',";
		
		$suggestions = array();
		
		$data = array();
		
 		foreach ($friends as $key => $value) {
			$suggestions[] = "'".$value->user_info['user_username']."'";
			$data[] = "'".$value->user_info['user_id']."'";
		 }
		$result .= "suggestions:[" . implode(',', $suggestions) . "],
 					data:[" . implode(',', $data) . "]}"; 
		
		echo $result;
		die('');
		
	} else {
		die('');
	}
} else {
	die('');
}

// CHECK FOR ADMIN ALLOWANCE OF MESSAGES
if( !$user->level_info['level_message_allow'] )
{
  header("Location: user_home.php");
  exit();
}


// SET ERROR VARIABLES AND EMPTY VARS
$is_error = 0;
$submitted = 0;

// GET LIST OF FRIENDS FOR SUGGEST BOX
$total_friends = $user->user_friend_total(0);
$friends = $user->user_friend_list(0, $total_friends, 0);


?>