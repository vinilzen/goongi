<?php

/* $Id: user_history_entry.php 59 2009-02-13 03:25:54Z john $ */

$page = "user_history_entry";
include "header.php";
//echo 1;
$task         = ( !empty($_POST['task'])          ? $_POST['task']          : ( !empty($_GET['task'])         ? $_GET['task']         : NULL ) );
$historyentry_id = ( !empty($_POST['historyentry_id'])  ? $_POST['historyentry_id']  : ( !empty($_GET['historyentry_id']) ? $_GET['historyentry_id'] : NULL ) );
$status_user        = $_POST['status_user'];
//print_r ($_POST['status_user']);
//echo $_GET['status_user'];

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
  
//  if( !$historyentry_info )
 // {
//    header("Location: user_history.php");
//    exit();
//  }
  
  // GET TOTAL COMMENTS POSTED ON THIS ENTRY
  $comments_total = $database->database_num_rows($database->database_query("SELECT historycomment_id FROM se_historycomments WHERE historycomment_historyentry_id='{$historyentry_info[historyentry_id]}'"));
}
// DO SAVE
if( $task=="dosave" )
{
   if( !$historyentry_id ) $status_user = '0';
   $sql = "SELECT tree_id FROM se_tree_users WHERE user_id='{$user->user_info['user_id']}'";
      $resource = $database->database_query($sql);
      $treeid=$database->database_fetch_assoc($resource);
      $historyentry_historyentrycat_id = $treeid['tree_id'];


      $sql = "SELECT * FROM se_historyentries WHERE historyentry_historyentrycat_id='{$historyentry_historyentrycat_id}'";
      $resource = $database->database_query($sql);
      $historyentries =$database->database_fetch_assoc($resource);
      
  // echo $historyentries['historyentry_user_id'];
        if (($historyentries['historyentry_user_id'] != $user->user_info['user_id']) && ($status_user != '0'))
        {
         
              $status_user = '1';
              $historyentry_title            = $_POST['historyentry_title'];
              $historyentry_body             = $_POST['historyentry_body'];
              $historyentry_search           = $_POST['historyentry_search'];
              $historyentry_privacy          = $_POST['historyentry_privacy'];
              $historyentry_comments         = $_POST['historyentry_comments'];
              $new_historyentrycat_title     = $_POST['new_historyentrycat_title'];
              $smarty->assign('status_user',$status_user);
        }
       else   {
           $status_user = '0';
           $history->history_user_null($historyentry_historyentrycat_id);
    
  $historyentry_title            = $_POST['historyentry_title'];
  $historyentry_body             = $_POST['historyentry_body'];
  $historyentry_search           = $_POST['historyentry_search'];
  $historyentry_privacy          = $_POST['historyentry_privacy'];
  $historyentry_comments         = $_POST['historyentry_comments'];
  $new_historyentrycat_title     = $_POST['new_historyentrycat_title'];
  
  
  // CREATE VS EDIT
  $is_edit = !empty($historyentry_id);
  
  // POST ENTRY
  $result_array = $history->history_entry_post(
    $historyentry_id,
    $historyentry_title,
    $historyentry_body,
    $historyentry_search,
    $historyentry_privacy,
    $historyentry_comments,
    $historyentry_trackbacks
  );
 
  if( empty($historyentry_id) && !empty($result_array['historyentry_id']) )
    $historyentry_id = $result_array['historyentry_id'];
}
  
  // STUFF TO DO ON SUCCESS
  if( $result_array['result'] )
  {
   //    echo 1;
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
    $smarty->assign('status_user',$status_user);
    header("Location: user_history.php");
    exit();
  }
  
  // AN ERROR OCCURED SEND THE DATA BACK
  $historyentry_info = array(
    'historyentry_id'              => $historyentry_id,
    'historyentry_title'           => $historyentry_title,
    'historyentry_body'            => $historyentry_body,
  //  'historyentry_historyentrycat_id' => $historyentry_historyentrycat_id,
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

 if ($status_user == '') (int) $status_user=0;
// ASSIGN VARIABLES AND SHOW NEW historyENTRY PAGE
$smarty->assign('status_user',$status_user);

$smarty->assign('historyentry_info', $historyentry_info);
$smarty->assign('historyentrycats', $historyentrycats_array);
$smarty->assign('privacy_options', $privacy_options);
$smarty->assign('comment_options', $comment_options);
$smarty->assign('comments_total', $comments_total);
include "footer.php";
?>