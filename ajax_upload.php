<?php
	  // CHECK FOR ADMIN ALLOWANCE OF PHOTO
$page = "ajax_upload";
include "header.php";

if( !$user->level_info['level_photo_allow'] ) {
  header("Location: user_home.php");
  exit();
}
  $id = $_POST['u_id'];
  $user->user_ajax_photo_upload("photo",$id);
  
  $is_error = $user->is_error;
  if( !$is_error ) {
    // SAVE LAST UPDATE DATE
    $user->user_lastupdate();

    // DETERMINE SIZE OF THUMBNAIL TO SHOW IN ACTION
    $photo_width = $misc->photo_size($user->user_photo(), "111", "111", "w");
    $photo_height = $misc->photo_size($user->user_photo(), "111", "111", "h");

    // INSERT ACTION
  //  $action_media = Array(Array('media_link'=>$url->url_create('profile', $user->user_info['user_username']), 'media_path'=>$user->user_photo(), 'media_width'=>$photo_width, 'media_height'=>$photo_height));
 //   $actions->actions_add($user, "editphoto", Array($user->user_info['user_username'], $user->user_displayname), $action_media, 999999999, TRUE, "user", $user->user_info['user_id'], $user->user_info['user_privacy']);
    echo 'Фотография изменена(перезагрузите страницу)';
  }

  // END user_photo_upload() METHOD
?>