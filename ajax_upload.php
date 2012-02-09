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
	
	if ($tip == '')
		$is_error ='Выберите фотографию для загрузки';


	if ( !$is_error )
	{
		$id = $_POST['u_id'];
		$user->user_ajax_photo_upload("photo",$id);
		// SAVE LAST UPDATE DATE
		$user->user_lastupdate();
		
		// DETERMINE SIZE OF THUMBNAIL TO SHOW IN ACTION
		$photo_width = $misc->photo_size($user->user_photo(), "111", "111", "w");
		$photo_height = $misc->photo_size($user->user_photo(), "111", "111", "h");
		//print_r($user); die();
		if ($user->profile_info['profilevalue_5'] == 2)
		{
			echo $user->user_photo('./images/avatars_11.gif',FALSE,$id);
		}
		else
		{
			echo $user->user_photo('./images/avatars_09.gif',FALSE,$id);
		}
	}
  	else
	{
  		echo $is_error;
	}	

  // END user_photo_upload() METHOD
?>