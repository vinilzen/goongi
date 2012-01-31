<?php
	  // CHECK FOR ADMIN ALLOWANCE OF PHOTO
$page = "ajax_upload";
include "header.php";

if( !$user->level_info['level_photo_allow'] ) {
  header("Location: user_home.php");
  exit();
}
 // $is_error = $user->is_error;
  if ($_FILES['photo']['size'] > 1000000)
      $is_error = 'Размер не должен превышать 1 MB';

  $tip = $_FILES['photo']['type'];
 $file_types = explode(",", str_replace(" ", "", strtolower("image/jpeg, image/jpg, image/jpe, image/pjpeg, image/pjpg, image/x-jpeg, x-jpg, image/gif, image/x-gif, image/png, image/x-png")));
 
  $tip = strtolower($tip);
   if( !in_array($tip, $file_types) )
        $is_error = 'Допускается загрузка фотографий: GIF, PNG, JPG';

  if ($tip == '') $is_error ='Выберите фотографию для загрузки';

  if ( !$is_error ) {
  $id = $_POST['u_id'];
  $user->user_ajax_photo_upload("photo",$id);
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
  else echo $is_error;

  // END user_photo_upload() METHOD
?>