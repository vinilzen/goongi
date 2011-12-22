<?php

/* $Id: tree_build.php 42 2011-12-12 04:55:14Z vinilzen $ */

$page = "tree_build";
include "header.php";

// ENSURE CONECTIONS ARE ALLOWED FOR THIS USER
if( !$setting['setting_connection_allow'] ) {
  header("Location: user_home.php");
  exit();
}

if ( $user->user_exists != 1) {
  header("Location: login.php");
  exit();
}

//echo 'test - 1'; die();
//var_dump($owner->user_info);
//var_dump($user->user_info); die();

$type_request = $_POST['type_request'];

switch ($type_request) {
	case 'add':
		if (isset($_POST['user_id']) && isset($_POST['role']) && isset($_POST['fname']) && strlen($_POST['fname']) && isset($_POST['lname'])  && strlen($_POST['lname'])  ) {
			
			$user_id = (int)$_POST['user_id']; // add new user for USER_ID  (child, parent, spouse)
			
			if (is_numeric($user_id) && $user_id != 0 ) {
			
				$role = $_POST['role'];	// role for new user = child | parent | spouse
				
				if ($user->user_exist($user_id)) {
					
					$role = $_POST['role'];
					
					if (	$role == 'child' || 
							$role == 'father' || $role == 'mother' || 
							$role == 'wife' || $role == 'husband' || 
							$role == 'brother' || $role == 'sister' ) {
						
						//echo $role; die();
						switch ($role) {
							case 'father':
								
								$role = 'father';
								$new_user["sex"] = 'm';
								//echo $role;	die();
								
								if ( !$user->check_existing_parent($user_id, $role) ) {
										
									$family_id = $user->get_parent_family_id($user_id);
									
									$error = 'все чё';
									$result = 'ok.';
									
								} else {
									$error = 'Ошибка';
									$result = 'У этого пользователя уже есть '.$role;
								}
								
								break;
							
							case 'mother':
								$role = 'mother';
								$new_user["sex"] = 'w';
								if ( !$user->check_existing_parent($user_id, $role) ) {
										
									$family_id = $user->get_parent_family_id($user_id);
										
									$error = 'все чё';
									$result = 'ok.';
									
								} else {
									$error = 'Ошибка';
									$result = 'У этого пользователя уже есть '.$role;
								}
								
								break;
								
							case 'wife':
								$role = 'mother';
								$new_user["sex"] = 'w';
								$s = $user->get_sex($user_id);
								if ($s == 'm') {
								
									if ( !$user->check_existing_spouse($user_id, $role) ) {
										
										$family_id = $user->get_main_family_id($user_id,'m');
										
										$error = 'все чё';
										$result = 'ok.';
										
									} else {
										$error = 'Ошибка';
										$result = 'У этого пользователя уже есть wife';
									}
								} else {
									$error = 'Ошибка';
									$result = 'Однополый брак wifi';
								}
								break;

							case 'husband':
								$role = 'father';
								$new_user["sex"] = 'm';
								$s = $user->get_sex($user_id);
								if ($s == 'w') {
									if ( !$user->check_existing_spouse($user_id, $role) ) {
	
										$family_id = $user->get_main_family_id($user_id,'m');
										
										$error = 'все чё';
										$result = 'ok.';
										
									} else {
										$error = 'Ошибка';
										$result = 'У этого пользователя уже есть husb';
									}
								} else {
									$error = 'Ошибка';
									$result = 'Однополый брак husb';
								}
								break;
								
							case 'child':
								
								$role = 'child';
								$s = $user->get_sex($user_id);
								$family_id = $user->get_main_family_id($user_id,$s);
																
								break;
								
							case 'brother'||'sister':
								$role = 'child';
								$family_id = $user->get_parent_family_id($user_id);
								
								echo $family_id; die();
								
								break;
							
							default:
								$error = 'error ROLE';
								$result = 'default msg ';
						}
						
						$new_user["email"] = $_POST['email'];
						$new_user["fname"] = $_POST['fname'];
						$new_user["lname"] = $_POST['lname'];
			
						$new_user["send_invite"] = (isset($_POST['send_invite']) && $_POST['send_invite'] == 1)?1:0;
						$new_user["displayname"] = $new_user["lname"]." ".$new_user["fname"];
						$new_user["photo"] = "0_8208.jpg";
						$new_user["signupdate"] = time();
						$new_user["lastlogindate"] = 0;
						$new_user["lastactive"] = 0;
						$new_user["birthday"] = $_POST['birthday'];
						
						$new_user["death"] = $_POST['death'];// 0000-00-00
						$new_user["alias"] = $_POST['lname'];
						/*$user->user_create_fast(
							$new_user['fname'],
							$new_user['lname'], 
							$user_id, 
							$role, 
							$new_user['email'],
							$new_user["birthday"],
							$new_user["sex"],
							$new_user["death"],
							$new_user["alias"],
							$new_user["send_invite"] );
						 * 
						 */
			
					} else {
						
						$error = 'Ошибка';
						$result = 'Укажите корректные пользовательские связи.';
						
					}
					
				} else {
					
					$error = 'Ошибка';
					$result = 'Такого пользователя нет.';
					
				}
			} else {
					
					$error = 'Ошибка';
					$result = 'Неверный user_id.';
					
				}

		} else {
			$error = 'Ошибка';
			$result = 'Указаны не все обязательные параметры.';
		}
		
		break;
	
	case 'edit':
		
		$user_id = (int)$_POST['user_id'];
		if ( isset($user_id) && $user_id != 0 ) {
			
			$set = array(); // for table se_users
			$set_fields = array(); // for table se_profilevalues

			
			if ( isset($_POST['alias']) ) {  // ADD CHECKING - PROZVISHE
				$set_fields[] = " `profilevalue_11` = '" . mysql_real_escape_string($_POST['alias']) . "' ";
			}

			if ( isset($_POST['hobbie']) ) {  // ADD CHECKING // hobbie
				$set_fields[] = " `profilevalue_13` = '" . mysql_real_escape_string($_POST['hobbie']) . "' ";
			}

			if ( isset($_POST['photo']) ) {  // ADD CHECKING  
				$set[] = " `user_photo` = '" . mysql_real_escape_string($_POST['photo']) . "' ";
			}
			
			if (isset($_POST['death']) && is_numeric($_POST['death']) ) {  // ADD CHECKING
				$d_date = date('Y-m-d',$_POST['death']);
				$set_fields[] = " `profilevalue_12` = '" . $d_date . "' ";
			}
			
			if (isset($_POST['birthday']) && is_numeric($_POST['birthday']) ) {  // ADD CHECKING
				$b_date = date('Y-m-d',$_POST['birthday']);
				$set_fields[] = " `profilevalue_4` = '" . $b_date . "' ";
			}
			
			if ( $user_id != $user->user_info['user_id'] ) { // new login
				if (isset($_POST['email'])) {  // ADD CHECKING
					$set[] = " `user_email` = '" . mysql_real_escape_string($_POST['email']) . "' ";
					$set[] = " `user_newemail` = '" . mysql_real_escape_string($_POST['email']) . "' ";
					
					
				}
			}
			
			if (isset($_POST['displayname'])) { // ADD CHECKING
				$set[] = " `user_displayname` = '" . mysql_real_escape_string($_POST['displayname']) . "' ";
			}
			
			if (isset($_POST['fname'])) {  // ADD CHECKING
				$set[] = " `user_fname` = '" . mysql_real_escape_string($_POST['fname']) . "' ";
				$set_fields[] = " `profilevalue_2` = '" . mysql_real_escape_string($_POST['fname']) . "' ";
			}
			
			if ( isset($_POST['lname']) ) {
				$set[] = " `user_lname` = '" . $_POST['lname'] . "' ";
				$set_fields[] = " `profilevalue_3` = '" .mysql_real_escape_string($_POST['lname']) . "' ";
			}

			if ( isset($_POST['lname']) && isset($_POST['fname']) && strlen($_POST['fname']) && strlen($_POST['lname']) ) {
				
				$set[] = " `user_displayname` = '"	. mysql_real_escape_string($_POST['fname']) . " " 
													. mysql_real_escape_string($_POST['lname']) . "' ";
			
			}

			if ( isset($_POST['sex']) && ($_POST['sex'] == 'w' || $_POST['sex'] == 'm') ) {
				if ($_POST['sex'] == 'w')
					$sex = 2	;
				elseif ($_POST['sex'] == 'm')
					$sex = 1;
				$set_fields[] = " `profilevalue_5` = " . $sex . " ";
			}
			
			
			
			if (count($set) > 0) {
				$sql = "UPDATE `se_users` SET " . implode(' , ', $set) ." WHERE `user_id` = $user_id LIMIT 1;";
				$r = $database->database_query($sql);
			} else {
				$r = true;
			}
			
			if (count($set_fields) > 0) {
				$sql_fields = "UPDATE `se_profilevalues` SET " . implode(' , ', $set_fields) ." WHERE `profilevalue_user_id` = $user_id LIMIT 1;";
				$r_fields = $database->database_query($sql_fields);
			} else {
				$r_fields = true;
			}
			//print_r($sql_fields); die();
			if ( $r || $r_fields  ) {
				$user->user_lastupdate_id($user_id);
				$error = 0;
				$result = 'Сохраненно.';
			} else {
				$error = 'Ошибка DB';
				$result = 'Не удалось отредактировать.sql-'.$sql.', sql_fieldset-'.serialize($sql_fields);
			}
		} else {
			$error = 'Ошибка доступа';
			$result = 'Необходимо указать пользователя для редактирования.';
		}
		break;
	
	case 'del':
		$user_id = (int)$_POST['user_id'];
		if ( $user->user_info['user_id'] == $user_id ) {
			if ( isset($user_id) && $user_id != 0 ) {
				
				if ( $user->user_del($user_id) ) {
				
					$error = 0;
					$result = 'Пользователь успешно удален.';
				} else {
					$error = 'Ошибка доступа';
					$result = 'Не удалось удалить пользователя.';
				}
				
			} else {
				$error = 'Ошибка доступа';
				$result = 'Необходимо указать пользователя для удаления.';
			}
		}
		break;
	
	
	default:
		$error = 'Ошибка запроса';
		$result = 'Не верно указан тип запроса';
		break;
}

	echo json_encode(array('error' => $error, 'result' => $result));
	die();
