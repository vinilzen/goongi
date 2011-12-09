<?php

/* $Id: user_history_entry.php 59 2009-02-13 03:25:54Z john $ */

$page = "user_history_entry";
include "header.php";

$task         = ( !empty($_POST['task'])          ? $_POST['task']          : ( !empty($_GET['task'])         ? $_GET['task']         : NULL ) );
$historyentry_id = ( !empty($_POST['historyentry_id'])  ? $_POST['historyentry_id']  : ( !empty($_GET['historyentry_id']) ? $_GET['historyentry_id'] : NULL ) );


// ENSURE historyS ARE ENABLED FOR THIS USER
if( !$user->level_info['level_history_create'] )
{
  header("Location: user_home.php");
  exit();
}



// START history METHOD 
$history = new se_history($user->user_info['user_id']);



// MAKE SURE THIS history ENTRY BELONGS TO THIS USER AND IS NUMERIC
if( $historyentry_id )
{
  $historyentry_info = $history->history_entry_info($historyentry_id);
  
  if( !$historyentry_info )
  {
    header("Location: user_history.php");
    exit();
  }
  
  // GET TOTAL COMMENTS POSTED ON THIS ENTRY
  $comments_total = $database->database_num_rows($database->database_query("SELECT historycomment_id FROM se_historycomments WHERE historycomment_historyentry_id='{$historyentry_info[historyentry_id]}'"));
}


// DO SAVE
if( $task=="dosave" )
{
    echo $historyentry_body;
  $historyentry_title            = $_POST['historyentry_title'];
  $historyentry_body             = $_POST['historyentry_body'];
  $historyentry_historyentrycat_id  = $_POST['historyentry_historyentrycat_id'];
  $historyentry_search           = $_POST['historyentry_search'];
  $historyentry_privacy          = $_POST['historyentry_privacy'];
  $historyentry_comments         = $_POST['historyentry_comments'];
  $historyentry_trackbacks       = $_POST['historyentry_trackbacks'];
  $new_historyentrycat_title     = $_POST['new_historyentrycat_title'];
  
  // CATEGORY
  if( $historyentry_historyentrycat_id==-1 && !trim($new_historyentrycat_title) )
    $historyentry_historyentrycat_id = 0;
  
  if( $user->level_info['level_history_category_create'] && $historyentry_historyentrycat_id==-1 )
    $historyentry_historyentrycat_id = $history->history_category_create($new_historyentrycat_title);
  
  // CREATE VS EDIT
  $is_edit = !empty($historyentry_id);
  
  // POST ENTRY
  $result_array = $history->history_entry_post(
    $historyentry_id,
    $historyentry_title,
    $historyentry_body,
    $historyentry_historyentrycat_id,
    $historyentry_search,
    $historyentry_privacy,
    $historyentry_comments,
    $historyentry_trackbacks
  );
  
  if( empty($historyentry_id) && !empty($result_array['historyentry_id']) )
    $historyentry_id = $result_array['historyentry_id'];
  
  // STUFF TO DO ON SUCCESS
  if( $result_array['result'] )
  {
    // UPDATE LAST UPDATE DATE (SAY THAT 10 TIMES FAST)
    $user->user_lastupdate();
    
    // INSERT ACTION
    if( !$is_edit )
    {
      if( strlen($historyentry_title)>100 )
        $historyentry_title = substr($historyentry_title, 0, 97); $historyentry_title .= "...";
      
      $actions->actions_add(
        $user,
        "posthistory",
        array(
          $user->user_info['user_username'],
          $user->user_displayname,
          $historyentry_id,
          $historyentry_title
        ),
        array(),
        0,
        FALSE,
        "user",
        $user->user_info['user_id'],
        $historyentry_privacy
      );
    }
    
    // SEND USER BACK TO VIEW ENTRIES PAGE
    header("Location: user_history.php");
    exit();
  }
  
  
  
  // AN ERROR OCCURED SEND THE DATA BACK
  $historyentry_info = array(
    'historyentry_id'              => $historyentry_id,
    'historyentry_title'           => $historyentry_title,
    'historyentry_body'            => $historyentry_body,
    'historyentry_historyentrycat_id' => $historyentry_historyentrycat_id,
    'historyentry_search'          => $historyentry_search,
    'historyentry_privacy'         => $historyentry_privacy,
    'historyentry_comments'        => $historyentry_comments,
    'historyentry_trackbacks'      => $historyentry_trackbacks
  );
}



// GET history ENTRY CATEGORIES
$historyentrycats_array = $history->history_category_list($user->user_info['user_id']);



// GET PREVIOUS PRIVACY SETTINGS
$level_history_privacy = unserialize($user->level_info['level_history_privacy']);
rsort($level_history_privacy);
for( $c=0; $c<count($level_history_privacy); $c++ )
{
  $lvar = user_privacy_levels($level_history_privacy[$c]);
  if( $lvar )
    SE_Language::_preload($privacy_options[$level_history_privacy[$c]] = $lvar);
}

$level_history_comments = unserialize($user->level_info['level_history_comments']);
rsort($level_history_comments);
for( $c=0; $c<count($level_history_comments); $c++ )
{
  $lvar = user_privacy_levels($level_history_comments[$c]);
  if( $lvar )
    SE_Language::_preload($comment_options[$level_history_comments[$c]] = $lvar);
}


// CONVERT HTML CHARACTERS BACK
$historyentry_info['historyentry_body'] = str_replace("\r\n", "", htmlspecialchars_decode($historyentry_info['historyentry_body']));


// ASSIGN VARIABLES AND SHOW NEW historyENTRY PAGE
$smarty->assign('historyentry_info', $historyentry_info);
$smarty->assign('historyentrycats', $historyentrycats_array);
$smarty->assign('privacy_options', $privacy_options);
$smarty->assign('comment_options', $comment_options);
$smarty->assign('comments_total', $comments_total);
include "footer.php";
?>