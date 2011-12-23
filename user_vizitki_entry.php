<?php

/* $Id: user_vizitki_entry.php 59 2009-02-13 03:25:54Z john $ */

$page = "user_vizitki_entry";
include "header.php";

$task         = ( !empty($_POST['task'])          ? $_POST['task']          : ( !empty($_GET['task'])         ? $_GET['task']         : NULL ) );
$vizitkientry_id = ( !empty($_POST['vizitkientry_id'])  ? $_POST['vizitkientry_id']  : ( !empty($_GET['vizitkientry_id']) ? $_GET['vizitkientry_id'] : NULL ) );


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
  //  print_r($_FILES);
  $file = $_FILES["upload2"]["tmp_name"];
 // print_r ($file);
  $vizitkientry_vizitkientrycat_id  = $_POST['vizitkientry_vizitkientrycat_id'];
  $vizitkientry_search           = $_POST['vizitkientry_search'];
  $vizitkientry_privacy          = $_POST['vizitkientry_privacy'];
  $vizitkientry_comments         = $_POST['vizitkientry_comments'];
  $vizitkientry_trackbacks       = $_POST['vizitkientry_trackbacks'];
  $new_vizitkientrycat_title     = $_POST['new_vizitkientrycat_title'];

  $vizitkientry_title            = $_POST['name'];
  $vizitkientry_category         = $_POST['categor'];
  $vizitkientry_image            = 'vizitki';//$_POST['fakeupload'];
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
      $file
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
$sett=$vizitki->vizitki_settings();
$smarty->assign('sett', $sett);
// ASSIGN VARIABLES AND SHOW NEW vizitkiENTRY PAGE

$smarty->assign('vizitkientry_info', $vizitkientry_info);
$smarty->assign('vizitkientrycats', $vizitkientrycats_array);
$smarty->assign('privacy_options', $privacy_options);
$smarty->assign('comment_options', $comment_options);
$smarty->assign('comments_total', $comments_total);
include "footer.php";
?>