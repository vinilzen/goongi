<?php

/* $Id: user_friends.php 42 2009-01-29 04:55:14Z john $ */

$page = "my_tree";
include "header.php";
$task = ( isset($_POST['task']) ? $_POST['task'] : ( isset($_GET['task']) ? $_GET['task'] : NULL ) );


 if( !$user->user_exists)
    {
    header("Location: home.php");
    exit();
    }

    
if( $task == "print" )
{
    $result = 0;
  // MUST BE LOGGED IN TO USE THIS TASK
  if( !$user->user_exists )
  {
      $result = 1;
    echo json_encode(array('is_error' => $result));
    exit();
  }
  $id_user =    $_POST['id'];
  $tip_tree =   $_POST['tipe'];
  $stil_tree=   $_POST['stil'];
  $name=        $_POST['name'];
  $title =      $_POST['title'];
  $description =$_POST['inf'];
  $level =      $_POST['level'];
  $level_print =$_POST['level_print'];
  
  $sql = "INSERT INTO `se_print_tree` (`id_user`, `tip_tree`, `stil_tree`, `name`, `title`, `description`, `level`, `level_print`)
  VALUES ('$id_user', '$tip_tree', '$stil_tree', '$name', '$title', '$description', '$level', '$level_print')";
if ( $database->database_query($sql) ) 	$result = 0;
		 else 
			$result = 1;
 echo json_encode(array('is_error' => $result));
 exit();

}

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