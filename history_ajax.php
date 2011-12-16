<?php

/* $Id: history_ajax.php 134 2009-03-23 00:03:51Z john $ */

$page = "history_ajax";
include "header.php";

// PROCESS INPUT
$task         = ( !empty($_POST['task'])          ? $_POST['task']          : ( !empty($_GET['task'])         ? $_GET['task']         : NULL ) );
$historyentry_id = ( !empty($_POST['historyentry_id'])  ? $_POST['historyentry_id']  : ( !empty($_GET['historyentry_id']) ? $_GET['historyentry_id'] : NULL ) );


// TRACKBACK COMPATIBILITY
if( empty($_POST['e_id']) && !empty($historyentry_id) )
  $_POST['e_id'] = $historyentry_id;


// CREATE history OBJECT
$history = new se_history($user->user_exists ? $user->user_info['user_id'] : NULL);


if( $task=="update" )
{
    
  if( !empty($historyentry_id))
  {
      $sql = "SELECT tree_id FROM se_tree_users WHERE user_id='{$user->user_info['user_id']}'";
      $resource = $database->database_query($sql);
      $treeid=$database->database_fetch_assoc($resource);
      $historyentry_historyentrycat_id = $treeid['tree_id'];

      $sql = "SELECT *  FROM se_historyentries WHERE historyentry_historyentrycat_id='{$historyentry_historyentrycat_id}'";
      $resource = $database->database_query($sql);
      $historyentries =$database->database_fetch_assoc($resource);
      if (($historyentries['historyentry_date']+600 < time()) || ($historyentries['historyentry_user_id'] == $user->user_info['user_id']) ||($historyentries['historyentry_user_id'] == -1))
     {
        $history->history_udate_time($historyentry_historyentrycat_id,$user->user_info['user_username']);
        echo json_encode(array('result' => 'success'));
     }else{echo json_encode(array('result' => 'error',
                          'name_user' => $historyentries['historyentry_trackbacks'])
                        );}
  }
  //  echo json_encode(array('result' => FALSE));
  // header ('Location: http://world-blog.ru');
exit;

}

if( $task=="save_nulid" )
{

  if( !empty($historyentry_id))
  {
    
      $sql = "SELECT tree_id FROM se_tree_users WHERE user_id='{$user->user_info['user_id']}'";
      $resource = $database->database_query($sql);
      $treeid=$database->database_fetch_assoc($resource);
      $historyentry_historyentrycat_id = $treeid['tree_id'];

       
      $sql = "SELECT * FROM se_historyentries WHERE historyentry_historyentrycat_id='{$historyentry_historyentrycat_id}'";
      $resource = $database->database_query($sql);
      $historyentries =$database->database_fetch_assoc($resource);

        if (($historyentries['historyentry_user_id'] != $user->user_info['user_id']))
        {
               $status_user = '1';
               echo json_encode(array('result' => 'success',
                               'status_user' => $status_user,
                               'historyentry_id_b' => $historyentry_id,
                               ));
        }
       else   { 
           $status_user = '0';
           $history->history_user_null($historyentry_historyentrycat_id);
           echo json_encode(array('result' => 'success',
                               'status_user' => $status_user,
                               ));
       }
  }
  
exit;

}


// TRACKBACKS
if( $task=="trackback" )
{
  // Redirect if no data 
  if( !empty($historyentry_id) && empty($_POST['url']) && empty($_GET['url']) )
  {
    $historyentry_info = $history->history_entry_info($historyentry_id);
    header('Location: ' . $url->url_create('history_entry', $historyentry_info['user_username'], $historyentry_id));
    exit();
  }
  
  echo $history->history_trackback_receive();
  exit();
}




/* ***** ACTIONS BELOW THIS LINE REQUIRE THE USER TO BE LOGGED IN ***** */
if( !$user->user_exists )
{
  echo json_encode(array('result' => FALSE));
  exit();
}




// DELETE
if( $task=="deletehistory" )
{
  $result = $history->history_entry_delete($historyentry_id);
  echo json_encode(array('result' => ( $result ? 'success' : 'failure' )));
  exit();
}


// PREVIEW
elseif( $task=="previewhistory" )
{
  $page = "history";
  
  $owner =& $user;
  $history->user_id = $user->user_info['user_id'];
  
  $historyentry_title            = $_POST['historyentry_title'];
  $historyentry_body             = $_POST['historyentry_body'];
  $historyentry_historyentrycat_id  = $_POST['historyentry_historyentrycat_id'];
  
  $historyentry_body = str_replace("\r\n", "", htmlspecialchars_decode($historyentry_body));
  
  // GET CUSTOM history STYLE IF ALLOWED
  if( $user->level_info['level_history_style'] )
  {
    $historystyle_info = $database->database_fetch_assoc($database->database_query("SELECT historystyle_css FROM se_historystyles WHERE historystyle_user_id='{$owner->user_info['user_id']}' LIMIT 1"));
    $global_css = $historystyle_info['historystyle_css'];
  }

  // GET ARCHIVE AND CATEGORIES
  $archive_list = $history->history_archive_generate();
  $category_list = $history->history_categories_generate();
  
  // ASSIGN VARIABLES AND DISPLAY history PAGE
  $smarty->assign('total_historyentries', 1);
  $smarty->assign('entries', array(array(
    'historyentry_id'              => $historyentry_id,
    'historyentry_title'           => $historyentry_title,
    'historyentry_body'            => $historyentry_body,
    'historyentry_historyentrycat_id' => $historyentry_historyentrycat_id
  )));
  
  $smarty->assign_by_ref('archive_list', $archive_list);
  $smarty->assign_by_ref('category_list', $category_list);
  $smarty->assign('p', 1);
  $smarty->assign('maxpage', 1);
  $smarty->assign('p_start', 1);
  $smarty->assign('p_end', 1);
  
  ob_end_clean();
  
  include "footer.php";
  exit();
}


// SUBSCRIBE
elseif( $task=="subscribehistory" )
{
  $result = $history->history_subscription_create($owner->user_info['user_id']);
  echo json_encode(array('result' => ( $result ? 'success' : 'failure' )));
  exit();
}


// UNSUBSCRIBE
elseif( $task=="unsubscribehistory" )
{
  $result = $history->history_subscription_delete($owner->user_info['user_id']);
  echo json_encode(array('result' => ( $result ? 'success' : 'failure' )));
  exit();
}

?>