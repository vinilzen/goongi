<?php

/* $Id: browse_vizitkis.php 205 2009-08-05 01:15:28Z john $ */

$page = "browse_vizitkis";
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


// PARSE GET/POST
if(isset($_POST['p'])) { $p = $_POST['p']; } elseif(isset($_GET['p'])) { $p = $_GET['p']; } else { $p = 1; }
if(isset($_POST['s'])) { $s = $_POST['s']; } elseif(isset($_GET['s'])) { $s = $_GET['s']; } else { $s = "vizitkientry_date DESC"; }
if(isset($_POST['v'])) { $v = $_POST['v']; } elseif(isset($_GET['v'])) { $v = $_GET['v']; } else { $v = 0; }
if(isset($_POST['c'])) { $c = $_POST['c']; } elseif(isset($_GET['c'])) { $c = $_GET['c']; } else { $c = -1; }
if(isset($_POST['vizitki_search'])) { $vizitki_search = $_POST['vizitki_search']; } elseif(isset($_GET['c'])) { $vizitki_search = $_GET['vizitki_search']; } else { $c = NULL; }

// ENSURE SORT/VIEW ARE VALID
if($s != "vizitkientry_date DESC" && $s != "vizitkientry_views DESC" && $s != "vizitkientry_totalcomments DESC") { $s = "vizitkientry_date DESC"; }
if($v != "0" && $v != "1") { $v = 0; }


// SET WHERE CLAUSE
$where = "CASE
	    WHEN se_vizitkientries.vizitkientry_user_id='{$user->user_info['user_id']}'
	      THEN TRUE
	    WHEN ((se_vizitkientries.vizitkientry_privacy & @SE_PRIVACY_REGISTERED) AND '{$user->user_exists}'<>0)
	      THEN TRUE
	    WHEN ((se_vizitkientries.vizitkientry_privacy & @SE_PRIVACY_ANONYMOUS) AND '{$user->user_exists}'=0)
	      THEN TRUE
	    WHEN ((se_vizitkientries.vizitkientry_privacy & @SE_PRIVACY_FRIEND) AND (SELECT TRUE FROM se_friends WHERE friend_user_id1=se_vizitkientries.vizitkientry_user_id AND friend_user_id2='{$user->user_info['user_id']}' AND friend_status='1' LIMIT 1))
	      THEN TRUE
	    WHEN ((se_vizitkientries.vizitkientry_privacy & @SE_PRIVACY_SUBNET) AND '{$user->user_exists}'<>0 AND (SELECT TRUE FROM se_users WHERE user_id=se_vizitkientries.vizitkientry_user_id AND user_subnet_id='{$user->user_info['user_subnet_id']}' LIMIT 1))
	      THEN TRUE
	    WHEN ((se_vizitkientries.vizitkientry_privacy & @SE_PRIVACY_FRIEND2) AND (SELECT TRUE FROM se_friends AS friends_primary LEFT JOIN se_users ON friends_primary.friend_user_id1=se_users.user_id LEFT JOIN se_friends AS friends_secondary ON friends_primary.friend_user_id2=friends_secondary.friend_user_id1 WHERE friends_primary.friend_user_id1=se_vizitkientries.vizitkientry_user_id AND friends_secondary.friend_user_id2='{$user->user_info['user_id']}' AND se_users.user_subnet_id='{$user->user_info['user_subnet_id']}' LIMIT 1))
	      THEN TRUE
	    ELSE FALSE
	END";


// ONLY MY FRIENDS' vizitkiS
if( $v=="1" && $user->user_exists )
{
  // SET WHERE CLAUSE
  $where .= " AND (SELECT TRUE FROM se_friends WHERE friend_user_id1='{$user->user_info['user_id']}' AND friend_user_id2=se_vizitkientries.vizitkientry_user_id AND friend_status=1)";
}


// CATEGORIES
if( isset($c) && $c!=-1 )
{
  if( $c==0 || !is_numeric($c) ) $c = '0';
  $where .= " AND vizitkientry_vizitkientrycat_id='{$c}'";
}


// SEARCH
if( !empty($vizitki_search) )
{
  $where .= " && MATCH (`vizitkientry_title`, `vizitkientry_body`) AGAINST ('{$vizitki_search}' IN BOOLEAN MODE)";
}



// CREATE vizitki OBJECT
$vizitki = new se_vizitki();


// GET TOTAL vizitkis
$total_vizitkientries = $vizitki->vizitki_entries_total($where);


// MAKE ENTRY PAGES
$vizitkientries_per_page = 10;
$page_vars = make_page($total_vizitkientries, $vizitkientries_per_page, $p);


// GET vizitki ARRAY
$vizitkientry_array = $vizitki->vizitki_entries_list($page_vars[0], $vizitkientries_per_page, $s, $where);


// GET vizitki ENTRY CATEGORIES
$vizitkientrycats_query = $database->database_query("SELECT * FROM se_vizitkientrycats WHERE vizitkientrycat_user_id=0 ORDER BY vizitkientrycat_id ASC");
$vizitkientrycats_array = array();
while( $vizitkientrycat=$database->database_fetch_assoc($vizitkientrycats_query) )
{
  $vizitkientrycats_array[] = array(
    'vizitkientrycat_id' => $vizitkientrycat['vizitkientrycat_id'],
    'vizitkientrycat_title' => $vizitkientrycat['vizitkientrycat_title']
  );
}



// ASSIGN SMARTY VARIABLES AND DISPLAY vizitkis PAGE
$smarty->assign('total_vizitkientries', $total_vizitkientries);
$smarty->assign_by_ref('vizitkientries', $vizitkientry_array);
$smarty->assign_by_ref('vizitkientrycats', $vizitkientrycats_array);

$smarty->assign('vizitki_search', $vizitki_search);

$smarty->assign('p', $page_vars[1]);
$smarty->assign('maxpage', $page_vars[2]);
$smarty->assign('p_start', $page_vars[0]+1);
$smarty->assign('p_end', $page_vars[0]+count($vizitkientry_array));
$smarty->assign('s', $s);
$smarty->assign('v', $v);
$smarty->assign('c', $c);
include "footer.php";
?>