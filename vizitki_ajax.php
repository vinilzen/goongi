<?php

/* $Id: vizitki_ajax.php 134 2009-03-23 00:03:51Z john $ */

$page = "vizitki_ajax";
include "header.php";

// PROCESS INPUT
$task         = ( !empty($_POST['task'])          ? $_POST['task']          : ( !empty($_GET['task'])         ? $_GET['task']         : NULL ) );
$vizitkientry_id = ( !empty($_POST['vizitkientry_id'])  ? $_POST['vizitkientry_id']  : ( !empty($_GET['vizitkientry_id']) ? $_GET['vizitkientry_id'] : NULL ) );


// TRACKBACK COMPATIBILITY
if( empty($_POST['e_id']) && !empty($vizitkientry_id) )
  $_POST['e_id'] = $vizitkientry_id;


// CREATE vizitki OBJECT
$vizitki = new se_vizitki($user->user_exists ? $user->user_info['user_id'] : NULL);




// TRACKBACKS
if( $task=="trackback" )
{
  // Redirect if no data 
  if( !empty($vizitkientry_id) && empty($_POST['url']) && empty($_GET['url']) )
  {
    $vizitkientry_info = $vizitki->vizitki_entry_info($vizitkientry_id);
    header('Location: ' . $url->url_create('vizitki_entry', $vizitkientry_info['user_username'], $vizitkientry_id));
    exit();
  }
  
  echo $vizitki->vizitki_trackback_receive();
  exit();
}




/* ***** ACTIONS BELOW THIS LINE REQUIRE THE USER TO BE LOGGED IN ***** */
if( !$user->user_exists )
{
  echo json_encode(array('result' => FALSE));
  exit();
}




// DELETE
if( $task=="deletevizitka" )
{
  $result = $vizitki->vizitki_entry_delete($vizitkientry_id);
  echo json_encode(array('result' => ( $result ? 'success' : 'failure' )));
  exit();
}


// PREVIEW
elseif( $task=="previewvizitki" )
{
  $page = "vizitki";
  
  $owner =& $user;
  $vizitki->user_id = $user->user_info['user_id'];
  
  $vizitkientry_title            = $_POST['vizitkientry_title'];
  $vizitkientry_body             = $_POST['vizitkientry_body'];
  $vizitkientry_vizitkientrycat_id  = $_POST['vizitkientry_vizitkientrycat_id'];
  
  $vizitkientry_body = str_replace("\r\n", "", htmlspecialchars_decode($vizitkientry_body));
  
  // GET CUSTOM vizitki STYLE IF ALLOWED
  if( $user->level_info['level_vizitki_style'] )
  {
    $vizitkistyle_info = $database->database_fetch_assoc($database->database_query("SELECT vizitkistyle_css FROM se_vizitkistyles WHERE vizitkistyle_user_id='{$owner->user_info['user_id']}' LIMIT 1"));
    $global_css = $vizitkistyle_info['vizitkistyle_css'];
  }

  // GET ARCHIVE AND CATEGORIES
  $archive_list = $vizitki->vizitki_archive_generate();
  $category_list = $vizitki->vizitki_categories_generate();
  
  // ASSIGN VARIABLES AND DISPLAY vizitki PAGE
  $smarty->assign('total_vizitkientries', 1);
  $smarty->assign('entries', array(array(
    'vizitkientry_id'              => $vizitkientry_id,
    'vizitkientry_title'           => $vizitkientry_title,
    'vizitkientry_body'            => $vizitkientry_body,
    'vizitkientry_vizitkientrycat_id' => $vizitkientry_vizitkientrycat_id
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
elseif( $task=="subscribevizitki" )
{
  $result = $vizitki->vizitki_subscription_create($owner->user_info['user_id']);
  echo json_encode(array('result' => ( $result ? 'success' : 'failure' )));
  exit();
}


// UNSUBSCRIBE
elseif( $task=="unsubscribevizitki" )
{
  $result = $vizitki->vizitki_subscription_delete($owner->user_info['user_id']);
  echo json_encode(array('result' => ( $result ? 'success' : 'failure' )));
  exit();
}

?>