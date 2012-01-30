<?php

/* $Id: user_vizitki_entry.php 59 2009-02-13 03:25:54Z john $ */

$page = "user_vizitki_entry";
include "header.php";

$task         = ( !empty($_POST['task'])          ? $_POST['task']          : ( !empty($_GET['task'])         ? $_GET['task']         : NULL ) );
$vizitkientry_id = ( !empty($_POST['vizitkientry_id'])  ? $_POST['vizitkientry_id']  : ( !empty($_GET['vizitkientry_id']) ? $_GET['vizitkientry_id'] : NULL ) );
$country_id = ( !empty($_POST['countryid'])          ? $_POST['countryid']          : ( !empty($_GET['countryid'])         ? $_GET['countryid']         : NULL ) );
//echo $vizitkientry_id;

// ENSURE vizitkiS ARE ENABLED FOR THIS USER
if( !$user->level_info['level_vizitki_create'] )
{
  header("Location: user_home.php");
  exit();
}



// START vizitki METHOD 
$vizitki = new se_vizitki($user->user_info['user_id']);



// MAKE SURE THIS vizitki ENTRY BELONGS TO THIS USER AND IS NUMERIC
if( $vizitkientry_id )
{
  $vizitkientry_info = $vizitki->vizitki_entry_info($vizitkientry_id);
  
  if( !$vizitkientry_info )
  {
    header("Location: user_vizitki.php");
    exit();
  }
  
  // GET TOTAL COMMENTS POSTED ON THIS ENTRY
  $comments_total = $database->database_num_rows($database->database_query("SELECT vizitkicomment_id FROM se_vizitkicomments WHERE vizitkicomment_vizitkientry_id='{$vizitkientry_info[vizitkientry_id]}'"));
}





 
// DO SAVE
if( $task=="dosave" )
{
   
    if ($_FILES['upload2']['name']){
  $file_maxsize = "4194304";
  $file_exts = Array('jpg', 'jpeg', 'gif', 'png');
  $file_types = Array('image/jpeg', 'image/jpg', 'image/jpe', 'image/pjpeg', 'image/pjpg', 'image/x-jpeg', 'x-jpg', 'image/gif', 'image/x-gif', 'image/png', 'image/x-png');
  $file_maxwidth = 105;
  $file_maxheight = 105;
  $ext = str_replace(".", "", strrchr($_FILES['upload2']['name'], "."));
  $rand = rand(100000000, 999999999);
  $photo_newname = "banner$rand.".$ext;
  $photo_newname2 = "banner1$rand".$ext;
  $file_dest = "./uploads_admin/ads/$photo_newname";
  $file_dest2 = "./uploads_admin/ads/$photo_newname";
  $photo_name = "upload2";
  $new_photo = new se_upload();
  //$new_photo->new_upload($photo_name, $file_maxsize, $file_exts, $file_types, $file_maxwidth, $file_maxheight);
  
  $link = "<a href='$file_dest' target='_blank'><img src='$file_dest' border='0' width = '105' height = '105'/></a>";
  $link  = str_replace("'","&#039;", $link);
   
 
     $new_photo->crop($_FILES['upload2']['tmp_name'],$file_dest);
     $new_photo->resize($file_dest,$file_dest2, $file_maxwidth, $file_maxheight);
   //else
  //{
     // $new_photo->new_upload($photo_name, $file_maxsize, $file_exts, $file_types, $file_maxwidth, $file_maxheight);
      //    if($new_photo->is_error == 0)
 //     move_uploaded_file($_FILES['upload2']['tmp_name'], $file_dest);
      //$new_photo->new_upload($photo_name, $file_maxsize, $file_exts, $file_types, $file_maxwidth, $file_maxheight);
            //    $new_photo->upload_photo($file_dest);
  //        }
    }
  else {
      $photo_newname = '';
      $link ='';
  }
  
  $vizitkientry_vizitkientrycat_id  = $_POST['vizitkientry_vizitkientrycat_id'];
  $vizitkientry_search           = $_POST['vizitkientry_search'];
  $vizitkientry_privacy          = $_POST['vizitkientry_privacy'];
  $vizitkientry_comments         = $_POST['vizitkientry_comments'];
  $vizitkientry_trackbacks       = $_POST['vizitkientry_trackbacks'];
  $new_vizitkientrycat_title     = $_POST['new_vizitkientrycat_title'];

  $vizitkientry_title            = $_POST['name'];
  $vizitkientry_category         = $_POST['categor'];
  $vizitkientry_image            = $photo_newname;//$_POST['fakeupload'];
  $vizitkientry_body             = $_POST['desc'];
  $vizitkientry_price            = $_POST['cena'];
  $vizitkientry_telephon         = $_POST['phone'];
  $vizitkientry_email            = $_POST['mail'];
  $vizitkientry_site             = $_POST['link'];
  $vizitkientry_contry           = $_POST['contry'];
  $vizitkientry_city             = $_POST['city'];
  
 

  // CATEGORY
  if( $vizitkientry_vizitkientrycat_id==-1 && !trim($new_vizitkientrycat_title) )
    $vizitkientry_vizitkientrycat_id = 0;
  
  if( $user->level_info['level_vizitki_category_create'] && $vizitkientry_vizitkientrycat_id==-1 )
    $vizitkientry_vizitkientrycat_id = $vizitki->vizitki_category_create($new_vizitkientrycat_title);
  
  // CREATE VS EDIT
  $is_edit = !empty($vizitkientry_id);
 
  // POST ENTRY
  $result_array = $vizitki->vizitki_entry_post(
    $vizitkientry_id,
    $user->user_info['user_id'],
    $vizitkientry_title,
    $vizitkientry_body,
    $vizitkientry_vizitkientrycat_id,
    $vizitkientry_search,
    $vizitkientry_privacy,
    $vizitkientry_comments,
    $vizitkientry_trackbacks,
      $vizitkientry_category,
      $vizitkientry_image,
      $vizitkientry_price,
      $vizitkientry_telephon,
      $vizitkientry_email,
      $vizitkientry_site,
      $vizitkientry_contry,
      $vizitkientry_city,
      $link
  );
  
  if( empty($vizitkientry_id) && !empty($result_array['vizitkientry_id']) )
    $vizitkientry_id = $result_array['vizitkientry_id'];
  
  // STUFF TO DO ON SUCCESS
  if( $result_array['result'] )
  {
    // UPDATE LAST UPDATE DATE (SAY THAT 10 TIMES FAST)
    $user->user_lastupdate();
    
    // INSERT ACTION
    if( !$is_edit )
    {
      if( strlen($vizitkientry_title)>100 )
        $vizitkientry_title = substr($vizitkientry_title, 0, 97); $vizitkientry_title .= "...";
      
      $actions->actions_add(
        $user,
        "postvizitki",
        array(
          $user->user_info['user_username'],
          $user->user_displayname,
          $vizitkientry_id,
          $vizitkientry_title
        ),
        array(),
        0,
        FALSE,
        "user",
        $user->user_info['user_id'],
        $vizitkientry_privacy
      );
    }
    
    // SEND USER BACK TO VIEW ENTRIES PAGE
    header("Location: user_vizitki.php");
    exit();
  }
  
  
  
  // AN ERROR OCCURED SEND THE DATA BACK
  $vizitkientry_info = array(
    'vizitkientry_id'              => $vizitkientry_id,
    'vizitkientry_title'           => $vizitkientry_title,
    'vizitkientry_body'            => $vizitkientry_body,
    'vizitkientry_vizitkientrycat_id' => $vizitkientry_vizitkientrycat_id,
    'vizitkientry_search'          => $vizitkientry_search,
    'vizitkientry_privacy'         => $vizitkientry_privacy,
    'vizitkientry_comments'        => $vizitkientry_comments,
    'vizitkientry_trackbacks'      => $vizitkientry_trackbacks
  );
}
if( $task=="get_city" )
{
$city=$vizitki->get_country_city($country_id);
if (count($city) == 0) $error = 1;
else $error = 0;
  header("Content-Type: application/json");
  echo json_encode(array('result' => &$city,'error' => $error));
  exit();
}


// GET vizitki ENTRY CATEGORIES
$vizitkientrycats_array = $vizitki->vizitki_category_list($user->user_info['user_id']);



// GET PREVIOUS PRIVACY SETTINGS
$level_vizitki_privacy = unserialize($user->level_info['level_vizitki_privacy']);
rsort($level_vizitki_privacy);
for( $c=0; $c<count($level_vizitki_privacy); $c++ )
{
  $lvar = user_privacy_levels($level_vizitki_privacy[$c]);
  if( $lvar )
    SE_Language::_preload($privacy_options[$level_vizitki_privacy[$c]] = $lvar);
}

$level_vizitki_comments = unserialize($user->level_info['level_vizitki_comments']);
rsort($level_vizitki_comments);
for( $c=0; $c<count($level_vizitki_comments); $c++ )
{
  $lvar = user_privacy_levels($level_vizitki_comments[$c]);
  if( $lvar )
    SE_Language::_preload($comment_options[$level_vizitki_comments[$c]] = $lvar);
}


// CONVERT HTML CHARACTERS BACK
$vizitkientry_info['vizitkientry_body'] = str_replace("\r\n", "", htmlspecialchars_decode($vizitkientry_info['vizitkientry_body']));
//print_r ($vizitkientry_info);

if ($vizitkientry_info['vizitkientry_contry'] != '')
{
    $city = $vizitki->get_country_city($vizitkientry_info['vizitkientry_contry']);
}
else $city[] = 'нет городов';
//print_r($city);
$country=$vizitki->get_all_country();
$smarty->assign('city', $city);
$smarty->assign('country', $country);
$settcat=$vizitki->vizitki_category_list();
$smarty->assign('settcat', $settcat);

// ASSIGN VARIABLES AND SHOW NEW vizitkiENTRY PAGE

$smarty->assign('vizitkientry_info', $vizitkientry_info);
$smarty->assign('vizitkientrycats', $vizitkientrycats_array);
$smarty->assign('privacy_options', $privacy_options);
$smarty->assign('comment_options', $comment_options);
$smarty->assign('comments_total', $comments_total);
include "footer.php";
?>