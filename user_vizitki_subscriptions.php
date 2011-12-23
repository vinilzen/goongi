<?php

/* $Id: user_vizitki_subscriptions.php 5 2009-01-11 06:01:16Z john $ */

$page = "user_vizitki_subscriptions";
include "header.php";

if(isset($_POST['task'])) { $task = $_POST['task']; } elseif(isset($_GET['task'])) { $task = $_GET['task']; } else { $task = "main"; }
if(isset($_POST['p'])) { $p = $_POST['p']; } elseif(isset($_GET['p'])) { $p = $_GET['p']; } else { $p = 1; }
if(isset($_POST['s'])) { $s = $_POST['s']; } elseif(isset($_GET['s'])) { $s = $_GET['s']; } else { $s = "dd"; }

$sort = NULL; //"se_vizitkientries.vizitkientry_date DESC";
$where = NULL;


// ENSURE vizitkiS ARE ENABLED FOR THIS USER
if( !$user->level_info['level_vizitki_view'] )
{
  header("Location: user_home.php");
  exit();
}


// CREATE vizitki OBJECT
$subscriptions_per_page = 10;
$vizitki_object = new se_vizitki($user->user_info['user_id']);


// GET TOTAL ENTRIES
$vizitki_subscriptions_total = $vizitki_object->vizitki_subscription_total($where);


// MAKE ENTRY PAGES
$page_vars = make_page($vizitki_subscriptions_total, $subscriptions_per_page, $p);


// GET ENTRY ARRAY
$vizitki_subscriptions_list = $vizitki_object->vizitki_subscription_list($page_vars[0], $subscriptions_per_page, $sort, $where, TRUE);

//echo mysql_get_server_info();
//print_r($vizitki_subscriptions_list);


// ASSIGN VARIABLES AND SHOW PAGE
$smarty->assign       ('vizitki_subscriptions_total', $vizitki_subscriptions_total);
$smarty->assign_by_ref('vizitki_subscriptions_list' , $vizitki_subscriptions_list );

$smarty->assign('s', $s);
$smarty->assign('p', $page_vars[1]);
$smarty->assign('maxpage', $page_vars[2]);
$smarty->assign('p_start', $page_vars[0]+1);
$smarty->assign('p_end', $page_vars[0]+count($vizitki_subscriptions_list));

include "footer.php";
?>