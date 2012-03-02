<?php

/* $Id: user_history.php 16 2009-01-13 04:01:31Z john $ */

$page = "user_history";
include "header.php";

$task         = ( !empty($_POST['task'])          ? $_POST['task']          : ( !empty($_GET['task'])         ? $_GET['task']         : NULL  ) );
$search       = ( !empty($_POST['search'])        ? $_POST['search']        : ( !empty($_GET['search'])       ? $_GET['search']       : NULL  ) );
$p            = ( !empty($_POST['p'])             ? $_POST['p']             : ( !empty($_GET['p'])            ? $_GET['p']            : 1     ) );
$s            = ( !empty($_POST['s'])             ? $_POST['s']             : ( !empty($_GET['s'])            ? $_GET['s']            : NULL  ) );



// CREATE history OBJECT
$entries_per_page = 10;
$history = new se_history($user->user_info['user_id']);



// DELETE NECESSARY ENTRIES
if( $task=="delete" && !empty($_POST['delete_historyentries']) && is_array($_POST['delete_historyentries']) )
{
  $history->history_entry_delete($_POST['delete_historyentries']);
}



// SET ENTRY SORT-BY VARIABLES FOR HEADING LINKS
$s = "historyentry_date DESC";

$where = NULL;
if( trim($search) ) $where = "(historyentry_title LIKE '%{$search}%' OR historyentry_body LIKE '%{$search}%')";



// GET ENTRIES

$page_vars = make_page($total_historyentries, $entries_per_page, $p);
//$historyentries = $history->history_entries_list($page_vars[0], $entries_per_page, $s, $where);
$id_tree_us = $user->get_tree_id($user->user_info['user_id']);
$id_tree_owner = $user->get_tree_id($owner->user_info['user_id']);

if ($owner->user_info['user_id'] != 0 && $owner->user_info['user_id'] != $user->user_info['user_id'])
{
	$user_id = $owner->user_info['user_id'];
	
	if ($id_tree_us == $id_tree_owner) 
		$show_edit = 1;
	else 
		$show_edit = 0;

}
else
{ 
	$user_id = $user->user_info['user_id'];
    $show_edit = 1;
}

if (!$historyentry_id)
{
   
    $sql = "SELECT tree_id FROM se_tree_users WHERE user_id='{$user_id}'";
    $resource = $database->database_query($sql);
    $treeid=$database->database_fetch_assoc($resource);
    $historyentry_historyentrycat_id = $treeid['tree_id'];

	$total_historyentries = $history->history_entries_total($where,$historyentry_historyentrycat_id);
	$historyentries = $history->history_entries_list($page_vars[0], $entries_per_page, $s, $where,$historyentry_historyentrycat_id);

}
//print_r ($historyentries);

// ASSIGN VARIABLES AND SHOW VIEW ENTRIES PAGE
$smarty->assign('total_historyentries', $total_historyentries);
$smarty->assign_by_ref('historyentries', $historyentries);

$smarty->assign('s', $s);
$smarty->assign('search', $search);
$smarty->assign('show_edit', $show_edit);

$smarty->assign('p', $page_vars[1]);
$smarty->assign('maxpage', $page_vars[2]);
$smarty->assign('p_start', $page_vars[0]+1);
$smarty->assign('p_end', $page_vars[0]+count($historyentries));

include "footer.php";
?>