<?php

/* $Id: user_friends.php 42 2009-01-29 04:55:14Z john $ */

$page = "tree";
include "header.php";


 if( !$user->user_exists)
    {
    header("Location: home.php");
    exit();
    }

$users = $user->get_users();
//$family_array = $user->get_relatives_displayname(); // array ( user_id => displayname )
if ( isset($owner) && $owner->user_exists == 1 )
	$family = $user->get_family($owner->user_info['user_id']);
else
	$family = $user->get_family();


//$unions = $user->get_user_union();
//echo '<pre>->'; print_r($user); echo '</pre>';  die();
// ASSIGN VARIABLES AND INCLUDE FOOTER
$smarty->assign('$user_exists', $user->user_exists);
/*$smarty->assign('msg', $result['msg']);
$smarty->assign('success', $result['success']); */
$smarty->assign('family', $family);
$smarty->assign('users', $users);


include "footer.php";
?>