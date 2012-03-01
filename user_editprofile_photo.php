<?php

/* $Id: user_editprofile_photo.php 130 2009-03-21 23:36:57Z john $ */

$page = "user_editprofile_photo";
include "header.php";
if ($owner->user_exists == 0 ) {
	$owner = $user;
}

$task = ( isset($_POST['task']) ? $_POST['task'] : NULL );

// CHECK FOR ADMIN ALLOWANCE OF PHOTO
if( !$owner->level_info['level_photo_allow'] ) {
  header("Location: user_home.php");
  exit();
}

// SET ERROR VARIABLES
$is_error = 0;

// DELETE PHOTO
if( $task == "remove" ) {
  $owner->user_photo_delete();
  $owner->user_lastupdate();
  echo 'Вы можете загрузить новое фото!'; die();
  exit();
}


// UPLOAD PHOTO
if( $task == "upload" ) {
  $owner->user_photo_upload("photo");
  $is_error = $owner->is_error;
  if( !$is_error ) {
    // SAVE LAST UPDATE DATE
    $owner->user_lastupdate(); 
    
    // DETERMINE SIZE OF THUMBNAIL TO SHOW IN ACTION
    $photo_width = $misc->photo_size($owner->user_photo(), "111", "111", "w");
    $photo_height = $misc->photo_size($owner->user_photo(), "111", "111", "h");
    
    // INSERT ACTION
    $action_media = Array(Array('media_link'=>$url->url_create('profile', $owner->user_info['user_username']), 'media_path'=>$owner->user_photo(), 'media_width'=>$photo_width, 'media_height'=>$photo_height));
    $actions->actions_add($user, "editphoto", Array($owner->user_info['user_username'], $owner->user_displayname), $action_media, 999999999, TRUE, "user", $owner->user_info['user_id'], $owner->user_info['user_privacy']);
  }
}

// GET TABS TO DISPLAY ON TOP MENU
$field = new se_field("profile", $owner->profile_info);
$field->cat_list(0, 0, 0, "profilecat_id='{$owner->user_info['user_profilecat_id']}'");
$cat_array = $field->subcats;


// ASSIGN VARIABLES AND INCLUDE FOOTER
$smarty->assign('is_error', $is_error);
$smarty->assign('cats', $cat_array);
include "footer.php";
?>