<?php

/* $Id: history.php 40 2009-01-28 20:09:58Z john $ */

$page = "history";
include "header.php";


// DISPLAY ERROR PAGE IF USER IS NOT LOGGED IN AND ADMIN SETTING REQUIRES REGISTRATION
if( !$user->user_exists && !$setting['setting_permission_history'] )
{
  $page = "error";
  $smarty->assign('error_header', 639);
  $smarty->assign('error_message', 656);
  $smarty->assign('error_submit', 641);
  include "footer.php";
}

// DISPLAY ERROR PAGE IF NO OWNER
if( !$owner->user_exists )
{
  $page = "error";
  $smarty->assign('error_header', 639);
  $smarty->assign('error_message', 828);
  $smarty->assign('error_submit', 641);
  include "footer.php";
}

// ENSURE historyS ARE ENABLED FOR THIS USER
if( !$owner->level_info['level_history_create'] )
{
  header("Location: ".$url->url_create('profile', $owner->user_info['user_username']));
  exit();
}


// PROCESS INPUT
$p            = ( !empty($_POST['p'])             ? $_POST['p']             : ( !empty($_GET['p'])            ? $_GET['p']            : NULL ) );
$historyentry_id = ( !empty($_POST['historyentry_id'])  ? $_POST['historyentry_id']  : ( !empty($_GET['historyentry_id']) ? $_GET['historyentry_id'] : NULL ) );
$category_id  = ( !empty($_POST['category_id'])   ? $_POST['category_id']   : ( !empty($_GET['category_id'])  ? $_GET['category_id']  : NULL ) );
$date_start   = ( !empty($_POST['date_start'])    ? $_POST['date_start']    : ( !empty($_GET['date_start'])   ? $_GET['date_start']   : NULL ) );
$date_end     = ( !empty($_POST['date_end'])      ? $_POST['date_end']      : ( !empty($_GET['date_end'])     ? $_GET['date_end']     : NULL ) );
$history_search  = ( !empty($_POST['history_search'])   ? $_POST['history_search']   : ( !empty($_GET['history_search'])  ? $_GET['history_search']  : NULL ) );


// CREATE history OBJECT
$history = new se_history($owner->user_info['user_id']);


// GENERATE WHERE CLAUSE
$privacy_max = $owner->user_privacy_max($user);
$where = "(historyentry_privacy & '{$privacy_max}')";

if( !empty($historyentry_id) && is_numeric($historyentry_id) )
{
  // SPECIFIC ENTRY SPECIFIED
  $where .= " && historyentry_id='{$historyentry_id}'";
}

else
{
  // SEARCH PARAMETERS
  if( !empty($date_start) && !empty($date_end) && is_numeric($date_start) && is_numeric($date_end) )
    $where .= " && historyentry_date>'{$date_start}' && historyentry_date<'{$date_end}'";

  if( !empty($category_id) && is_numeric($category_id) )
    $where .= " && historyentry_historyentrycat_id='{$category_id}'";
  
  if( !empty($history_search) )
    $where .= " && MATCH (historyentry_title, historyentry_body) AGAINST ('{$history_search}' IN BOOLEAN MODE)";
}


// GET TOTAL ENTRIES
$total_historyentries = $history->history_entries_total($where);

// MAKE ENTRY PAGES
$entries_per_page = (int) $owner->level_info['level_history_entries'];
if( $entries_per_page<=0 || $entries_per_page>100 ) $entries_per_page = 10;
$page_vars = make_page($total_historyentries, $entries_per_page, $p);

// GET ENTRY ARRAY
$historyentries = $history->history_entries_list($page_vars[0], $entries_per_page, "historyentry_date DESC", $where);

// GET CUSTOM history STYLE IF ALLOWED
if( $owner->level_info['level_history_style'] )
{
  $historystyle_info = $database->database_fetch_assoc($database->database_query("SELECT historystyle_css FROM se_historystyles WHERE historystyle_user_id='{$owner->user_info['user_id']}' LIMIT 1"));
  $global_css = $historystyle_info['historystyle_css'];
}

// GET ARCHIVE AND CATEGORIES
$archive_list = $history->history_archive_generate("(se_historyentries.historyentry_privacy & '{$privacy_max}')");
$category_list = $history->history_categories_generate("(se_historyentries.historyentry_privacy & '{$privacy_max}')");

$is_subscribed = $history->history_subscription_exists($owner->user_info['user_id'], $user->user_info['user_id']);




// DO STUFF IF ONLY ONE ENTRY IS BEING DISPLAYED
if( $total_historyentries==1 && $historyentry_id )
{
  $historyentry_info =& $historyentries[0];
  

  // ENSURE OWNER OF history ENTRY MATCHES OWNER OBJECT
  if( $owner->user_info['user_id']!=$historyentry_info['historyentry_user_id'] )
  {
    header("Location: home.php");
    exit();
  }


  // UPDATE ENTRY VIEWS
  if( $user->user_info['user_id']!=$owner->user_info['user_id'] )
  {
    $database->database_query("UPDATE se_historyentries SET historyentry_views=historyentry_views+1 WHERE historyentry_id='{$historyentry_info['historyentry_id']}'");
  }
  
  
  // GET ENTRY COMMENT PRIVACY
  $allowed_to_comment = TRUE;
  if( !($privacy_max & $historyentry_info['historyentry_comments']) ) 
    $allowed_to_comment = FALSE;
  
  
  // GET history TRACKBACKS
  $tb_where = "historytrackback_historyentry_id='{$historyentry_id}'";
  $trackback_total = $history->history_trackback_total($tb_where);
  $trackback_list  = $history->history_trackback_list(NULL, NULL, NULL, $tb_where);
  
  
  // MAKE TRACKBACK DISCOVERY
  $trackback_rdf = $history->history_trackback_generate($historyentry_info);
  
  
  // UPDATE NOTIFICATIONS
  if( $is_subscribed )
  {
    $database->database_query("
      DELETE FROM
        se_notifys
      USING
        se_notifys
      LEFT JOIN
        se_notifytypes
        ON se_notifys.notify_notifytype_id=se_notifytypes.notifytype_id
      WHERE
        se_notifys.notify_user_id='{$user->user_info['user_id']}' AND
        se_notifytypes.notifytype_name='newhistorysubscriptionentry' AND
        notify_object_id='{$historyentry_id}'
    ");
  }
  
  if( $user->user_info['user_id']==$owner->user_info['user_id'])
  {
    $database->database_query("
      DELETE FROM
        se_notifys
      USING
        se_notifys
      LEFT JOIN
        se_notifytypes
        ON se_notifys.notify_notifytype_id=se_notifytypes.notifytype_id
      WHERE
        se_notifys.notify_user_id='{$owner->user_info['user_id']}' AND
        se_notifytypes.notifytype_name='historycomment' AND
        notify_object_id='{$historyentry_id}'
    ");
  }
  
  
  // SET SEO STUFF
  $global_page_content = $historyentry_info['historyentry_title'];
  $global_page_content = cleanHTML(str_replace('>', '> ', $global_page_content), NULL);
  if( strlen($global_page_content)>255 ) $global_page_content = substr($global_page_content, 0, 251).'...';
  $global_page_content = addslashes(trim(preg_replace('/\s+/', ' ',$global_page_content)));
  
  $global_page_title = array(
    1500125,
    $owner->user_displayname,
    $global_page_content
  );
  
  $global_page_content = $historyentry_info['historyentry_body'];
  $global_page_content = cleanHTML(str_replace('>', '> ', $global_page_content), NULL);
  if( strlen($global_page_content)>255 ) $global_page_content = substr($global_page_content, 0, 251).'...';
  $global_page_content = addslashes(trim(preg_replace('/\s+/', ' ',$global_page_content)));
  
  $global_page_description = array(
    1500125,
    $owner->user_displayname,
    $global_page_content
  );
  
  
  // ASSIGN
  $smarty->assign('total_comments', $total_comments);
  $smarty->assign('allowed_to_comment', $allowed_to_comment);
  $smarty->assign('trackback_rdf', $trackback_rdf);
  
  $smarty->assign('trackback_total', $trackback_total);
  $smarty->assign_by_ref('trackback_list', $trackback_list);
  $smarty->assign_by_ref('historyentry_info', $historyentry_info);
}


// DO STUFF IF MORE THAN ONE ENTRY IS BEING DISPLAYED
else
{
  // SET SEO STUFF
  $global_page_title = array(1500124, $owner->user_displayname);
  $global_page_description = array(1500124, $owner->user_displayname);
}




// ASSIGN VARIABLES AND DISPLAY history PAGE
$smarty->assign('total_historyentries', $total_historyentries);
$smarty->assign_by_ref('entries', $historyentries);
$smarty->assign_by_ref('archive_list', $archive_list);
$smarty->assign_by_ref('category_list', $category_list);

$smarty->assign('is_subscribed', $is_subscribed);

$smarty->assign('historyentry_id', $historyentry_id);
$smarty->assign('category_id', $category_id);
$smarty->assign('date_start', $date_start);
$smarty->assign('date_end', $date_end);
$smarty->assign('history_search', $history_search);

$smarty->assign('p', $page_vars[1]);
$smarty->assign('maxpage', $page_vars[2]);
$smarty->assign('p_start', $page_vars[0]+1);
$smarty->assign('p_end', $page_vars[0]+count($historyentries));

include "footer.php";
?>