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
		// user exists, just add a relationship
		if ($_POST['start_user'] != $_POST['relations_user']) {
			if (isset($_POST['unions_type']) && isset($_POST['start_user'])  ) {
				
				$start_user = (int)$_POST['start_user'];
				$role = $_POST['unions_type'];
				$user_rel = (int)$_POST['relations_user'];
				$rewrite = (int)$_POST['rewrite']; // rewrite if exist role
				
				switch ( $role ) {
					
					case $role == 'pcf': // add father
						$role = 'father';
						$result = $user->add_role_for_user($start_user,$role,$user_rel, $rewrite );
					break;
					
					case $role == 'pcm': // add mother
						$role = 'mother';
						$result = $user->add_role_for_user($start_user,$role,$user_rel, $rewrite );
					break;
					
					case $role == 'pcc': // add btother / sister
						$role = 'brother';
						$result = $user->add_role_for_user($start_user,$role,$user_rel, $rewrite );
					break;
					
					case $role == 'pm': // add spouse wife
						$role = 'wife';
						$result = $user->add_role_for_user($start_user,$role,$user_rel, $rewrite );
					break;
					
					case $role == 'pf': // add spouse husband
						$role = 'husbend';
						$result = $user->add_role_for_user($start_user,$role,$user_rel, $rewrite );
					break;
					
					case $role == 'pc': // add child
						$role = 'child';
						$result = $user->add_role_for_user($start_user,$role,$user_rel, $rewrite );
					break;
					
					default:
						$result = array('msg'	=> 'Такого рода связей еще нет, обратитесь к администрации.',
										'success'	=> 0,	); 
					break;
				}
			}
		} else {
			$result = array('msg'	=> 'Вы не можете создать связь между одним и тем же человеком.',
							'success'	=> 0,	); 
		}
		
		//echo 'select_user';
	}
	//die();
}
$users = $user->get_users();
$family = $user->get_relatives_displayname(); // array ( user_id => displayname )

//echo '<pre>->'; print_r($user); echo '</pre>';  die();

// ASSIGN VARIABLES AND INCLUDE FOOTER
$smarty->assign('$user_exists', $user->user_exists);
$smarty->assign('msg', $result['msg']);
$smarty->assign('success', $result['success']);
$smarty->assign('family', $family);
$smarty->assign('users', $users);
include "footer.php";
?>