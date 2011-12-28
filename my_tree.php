<?php

/* $Id: user_friends.php 42 2009-01-29 04:55:14Z john $ */

$page = "my_tree";
include "header.php";


$users = $user->get_users();
$family_array = $user->get_relatives_displayname(); // array ( user_id => displayname )

if ( isset($owner) && $owner->user_exists == 1 ) {
	
	$smarty->assign('owner_link', '?user='.$owner->user_info['user_username']);
	$family = $user->get_family($owner->user_info['user_id']);
} else {
	$family = $user->get_family();
}
// ASSIGN VARIABLES AND INCLUDE FOOTER
$smarty->assign('$user_exists', $user->user_exists);
$smarty->assign('family', $family);
$smarty->assign('users', $users);


include "footer.php";
?>