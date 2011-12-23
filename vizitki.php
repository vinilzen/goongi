<?php

/* $Id: vizitki.php 40 2009-01-28 20:09:58Z john $ */

$page = "vizitki";
include "header.php";


// DISPLAY ERROR PAGE IF USER IS NOT LOGGED IN AND ADMIN SETTING REQUIRES REGISTRATION
if( !$user->user_exists && !$setting['setting_permission_vizitki'] )
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

// ENSURE vizitkiS ARE ENABLED FOR THIS USER
if( !$owner->level_info['level_vizitki_create'] )
{
  header("Location: ".$url->url_create('profile', $owner->user_info['user_username']));
  exit();
}


// PROCESS INPUT
$p            = ( !empty($_POST['p'])             ? $_POST['p']             : ( !empty($_GET['p'])            ? $_GET['p']            : NULL ) );
$vizitkientry_id = ( !empty($_POST['vizitkientry_id'])  ? $_POST['vizitkientry_id']  : ( !empty($_GET['vizitkientry_id']) ? $_GET['vizitkientry_id'] : NULL ) );
$category_id  = ( !empty($_POST['category_id'])   ? $_POST['category_id']   : ( !empty($_GET['category_id'])  ? $_GET['category_id']  : NULL ) );
$date_start   = ( !empty($_POST['date_start'])    ? $_POST['date_start']    : ( !empty($_GET['date_start'])   ? $_GET['date_start']   : NULL ) );
$date_end     = ( !empty($_POST['date_end'])      ? $_POST['date_end']      : ( !empty($_GET['date_end'])     ? $_GET['date_end']     : NULL ) );
$vizitki_search  = ( !empty($_POST['vizitki_search'])   ? $_POST['vizitki_search']   : ( !empty($_GET['vizitki_search'])  ? $_GET['vizitki_search']  : NULL ) );


// CREATE vizitki OBJECT
$vizitki = new se_vizitki($owner->user_info['user_id']);


// GENERATE WHERE CLAUSE
$privacy_max = $owner->user_privacy_max($user);
$where = "(vizitkientry_privacy & '{$privacy_max}')";

if( !empty($vizitkientry_id) && is_numeric($vizitkientry_id) )
{
  // SPECIFIC ENTRY SPECIFIED
  $where .= " && vizitkientry_id='{$vizitkientry_id}'";
}

else
{
  // SEARCH PARAMETERS
  if( !empty($date_start) && !empty($date_end) && is_numeric($date_start) && is_numeric($date_end) )
    $where .= " && vizitkientry_date>'{$date_start}' && vizitkientry_date<'{$date_end}'";

  if( !empty($category_id) && is_numeric($category_id) )
    $where .= " && vizitkientry_vizitkientrycat_id='{$category_id}'";
  
  if( !empty($vizitki_search) )
    $where .= " && MATCH (vizitkientry_title, vizitkientry_body) AGAINST ('{$vizitki_search}' IN BOOLEAN MODE)";
}


// GET TOTAL ENTRIES
$total_vizitkientries = $vizitki->vizitki_entries_total($where);

// MAKE ENTRY PAGES
$entries_per_page = (int) $owner->level_info['level_vizitki_entries'];
if( $entries_per_page<=0 || $entries_per_page>100 ) $entries_per_page = 10;
$page_vars = make_page($total_vizitkientries, $entries_per_page, $p);

// GET ENTRY ARRAY
$vizitkientries = $vizitki->vizitki_entries_list($page_vars[0], $entries_per_page, "vizitkientry_date DESC", $where);

// GET CUSTOM vizitki STYLE IF ALLOWED
if( $owner->level_info['level_vizitki_style'] )
{
  $vizitkistyle_info = $database->database_fetch_assoc($database->database_query("SELECT vizitkistyle_css FROM se_vizitkistyles WHERE vizitkistyle_user_id='{$owner->user_info['user_id']}' LIMIT 1"));
  $global_css = $vizitkistyle_info['vizitkistyle_css'];
}

// GET ARCHIVE AND CATEGORIES
$archive_list = $vizitki->vizitki_archive_generate("(se_vizitkientries.vizitkientry_privacy & '{$privacy_max}')");
$category_list = $vizitki->vizitki_categories_generate("(se_vizitkientries.vizitkientry_privacy & '{$privacy_max}')");

$is_subscribed = $vizitki->vizitki_subscription_exists($owner->user_info['user_id'], $user->user_info['user_id']);




// DO STUFF IF ONLY ONE ENTRY IS BEING DISPLAYED
if( $total_vizitkientries==1 && $vizitkientry_id )
{
  $vizitkientry_info =& $vizitkientries[0];
  

  // ENSURE OWNER OF vizitki ENTRY MATCHES OWNER OBJECT
  if( $owner->user_info['user_id']!=$vizitkientry_info['vizitkientry_user_id'] )
  {
    header("Location: home.php");
    exit();
  }


  // UPDATE ENTRY VIEWS
  if( $user->user_info['user_id']!=$owner->user_info['user_id'] )
  {
    $database->database_query("UPDATE se_vizitkientries SET vizitkientry_views=vizitkientry_views+1 WHERE vizitkientry_id='{$vizitkientry_info['vizitkientry_id']}'");
  }
  
  
  // GET ENTRY COMMENT PRIVACY
  $allowed_to_comment = TRUE;
  if( !($privacy_max & $vizitkientry_info['vizitkientry_comments']) ) 
    $allowed_to_comment = FALSE;
  
  
  // GET vizitki TRACKBACKS
  $tb_where = "vizitkitrackback_vizitkientry_id='{$vizitkientry_id}'";
  $trackback_total = $vizitki->vizitki_trackback_total($tb_where);
  $trackback_list  = $vizitki->vizitki_trackback_list(NULL, NULL, NULL, $tb_where);
  
  
  // MAKE TRACKBACK DISCOVERY
  $trackback_rdf = $vizitki->vizitki_trackback_generate($vizitkientry_info);
  
  
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
        se_notifytypes.notifytype_name='newvizitkisubscriptionentry' AND
        notify_object_id='{$vizitkientry_id}'
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
        se_notifytypes.notifytype_name='vizitkicomment' AND
        notify_object_id='{$vizitkientry_id}'
    ");
  }
  
  
  // SET SEO STUFF
  $global_page_content = $vizitkientry_info['vizitkientry_title'];
  $global_page_content = cleanHTML(str_replace('>', '> ', $global_page_content), NULL);
  if( strlen($global_page_content)>255 ) $global_page_content = substr($global_page_content, 0, 251).'...';
  $global_page_content = addslashes(trim(preg_replace('/\s+/', ' ',$global_page_content)));
  
  $global_page_title = array(
    1500125,
    $owner->user_displayname,
    $global_page_content
  );
  
  $global_page_content = $vizitkientry_info['vizitkientry_body'];
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
  $smarty->assign_by_ref('vizitkientry_info', $vizitkientry_info);
}


// DO STUFF IF MORE THAN ONE ENTRY IS BEING DISPLAYED
else
{
  // SET SEO STUFF
  $global_page_title = array(1500124, $owner->user_displayname);
  $global_page_description = array(1500124, $owner->user_displayname);
}




// ASSIGN VARIABLES AND DISPLAY vizitki PAGE
$smarty->assign('total_vizitkientries', $total_vizitkientries);
$smarty->assign_by_ref('entries', $vizitkientries);
$smarty->assign_by_ref('archive_list', $archive_list);
$smarty->assign_by_ref('category_list', $category_list);

$smarty->assign('is_subscribed', $is_subscribed);

$smarty->assign('vizitkientry_id', $vizitkientry_id);
$smarty->assign('category_id', $category_id);
$smarty->assign('date_start', $date_start);
$smarty->assign('date_end', $date_end);
$smarty->assign('vizitki_search', $vizitki_search);

$smarty->assign('p', $page_vars[1]);
$smarty->assign('maxpage', $page_vars[2]);
$smarty->assign('p_start', $page_vars[0]+1);
$smarty->assign('p_end', $page_vars[0]+count($vizitkientries));

include "footer.php";
?>