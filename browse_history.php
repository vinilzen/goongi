<?php

/* $Id: browse_historys.php 205 2009-08-05 01:15:28Z john $ */

$page = "browse_historys";
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


// PARSE GET/POST
if(isset($_POST['p'])) { $p = $_POST['p']; } elseif(isset($_GET['p'])) { $p = $_GET['p']; } else { $p = 1; }
if(isset($_POST['s'])) { $s = $_POST['s']; } elseif(isset($_GET['s'])) { $s = $_GET['s']; } else { $s = "historyentry_date DESC"; }
if(isset($_POST['v'])) { $v = $_POST['v']; } elseif(isset($_GET['v'])) { $v = $_GET['v']; } else { $v = 0; }
if(isset($_POST['c'])) { $c = $_POST['c']; } elseif(isset($_GET['c'])) { $c = $_GET['c']; } else { $c = -1; }
if(isset($_POST['history_search'])) { $history_search = $_POST['history_search']; } elseif(isset($_GET['c'])) { $history_search = $_GET['history_search']; } else { $c = NULL; }

// ENSURE SORT/VIEW ARE VALID
if($s != "historyentry_date DESC" && $s != "historyentry_views DESC" && $s != "historyentry_totalcomments DESC") { $s = "historyentry_date DESC"; }
if($v != "0" && $v != "1") { $v = 0; }


// SET WHERE CLAUSE
$where = "CASE
	    WHEN se_historyentries.historyentry_user_id='{$user->user_info['user_id']}'
	      THEN TRUE
	    WHEN ((se_historyentries.historyentry_privacy & @SE_PRIVACY_REGISTERED) AND '{$user->user_exists}'<>0)
	      THEN TRUE
	    WHEN ((se_historyentries.historyentry_privacy & @SE_PRIVACY_ANONYMOUS) AND '{$user->user_exists}'=0)
	      THEN TRUE
	    WHEN ((se_historyentries.historyentry_privacy & @SE_PRIVACY_FRIEND) AND (SELECT TRUE FROM se_friends WHERE friend_user_id1=se_historyentries.historyentry_user_id AND friend_user_id2='{$user->user_info['user_id']}' AND friend_status='1' LIMIT 1))
	      THEN TRUE
	    WHEN ((se_historyentries.historyentry_privacy & @SE_PRIVACY_SUBNET) AND '{$user->user_exists}'<>0 AND (SELECT TRUE FROM se_users WHERE user_id=se_historyentries.historyentry_user_id AND user_subnet_id='{$user->user_info['user_subnet_id']}' LIMIT 1))
	      THEN TRUE
	    WHEN ((se_historyentries.historyentry_privacy & @SE_PRIVACY_FRIEND2) AND (SELECT TRUE FROM se_friends AS friends_primary LEFT JOIN se_users ON friends_primary.friend_user_id1=se_users.user_id LEFT JOIN se_friends AS friends_secondary ON friends_primary.friend_user_id2=friends_secondary.friend_user_id1 WHERE friends_primary.friend_user_id1=se_historyentries.historyentry_user_id AND friends_secondary.friend_user_id2='{$user->user_info['user_id']}' AND se_users.user_subnet_id='{$user->user_info['user_subnet_id']}' LIMIT 1))
	      THEN TRUE
	    ELSE FALSE
	END";


// ONLY MY FRIENDS' historyS
if( $v=="1" && $user->user_exists )
{
  // SET WHERE CLAUSE
  $where .= " AND (SELECT TRUE FROM se_friends WHERE friend_user_id1='{$user->user_info['user_id']}' AND friend_user_id2=se_historyentries.historyentry_user_id AND friend_status=1)";
}


// CATEGORIES
if( isset($c) && $c!=-1 )
{
  if( $c==0 || !is_numeric($c) ) $c = '0';
  $where .= " AND historyentry_historyentrycat_id='{$c}'";
}


// SEARCH
if( !empty($history_search) )
{
  $where .= " && MATCH (`historyentry_title`, `historyentry_body`) AGAINST ('{$history_search}' IN BOOLEAN MODE)";
}



// CREATE history OBJECT
$history = new se_history();


// GET TOTAL historys
$total_historyentries = $history->history_entries_total($where);


// MAKE ENTRY PAGES
$historyentries_per_page = 10;
$page_vars = make_page($total_historyentries, $historyentries_per_page, $p);


// GET history ARRAY
$historyentry_array = $history->history_entries_list($page_vars[0], $historyentries_per_page, $s, $where);


// GET history ENTRY CATEGORIES
$historyentrycats_query = $database->database_query("SELECT * FROM se_historyentrycats WHERE historyentrycat_user_id=0 ORDER BY historyentrycat_id ASC");
$historyentrycats_array = array();
while( $historyentrycat=$database->database_fetch_assoc($historyentrycats_query) )
{
  $historyentrycats_array[] = array(
    'historyentrycat_id' => $historyentrycat['historyentrycat_id'],
    'historyentrycat_title' => $historyentrycat['historyentrycat_title']
  );
}



// ASSIGN SMARTY VARIABLES AND DISPLAY historys PAGE
$smarty->assign('total_historyentries', $total_historyentries);
$smarty->assign_by_ref('historyentries', $historyentry_array);
$smarty->assign_by_ref('historyentrycats', $historyentrycats_array);

$smarty->assign('history_search', $history_search);

$smarty->assign('p', $page_vars[1]);
$smarty->assign('maxpage', $page_vars[2]);
$smarty->assign('p_start', $page_vars[0]+1);
$smarty->assign('p_end', $page_vars[0]+count($historyentry_array));
$smarty->assign('s', $s);
$smarty->assign('v', $v);
$smarty->assign('c', $c);
include "footer.php";
?>