<?php

/* $Id: user_vizitki.php 16 2009-01-13 04:01:31Z john $ */

$page = "user_vizitki";
include "header.php";

$task         = ( !empty($_POST['task'])          ? $_POST['task']          : ( !empty($_GET['task'])         ? $_GET['task']         : NULL  ) );
$search       = ( !empty($_POST['search'])        ? $_POST['search']        : ( !empty($_GET['search'])       ? $_GET['search']       : NULL  ) );
$p            = ( !empty($_POST['p'])             ? $_POST['p']             : ( !empty($_GET['p'])            ? $_GET['p']            : 1     ) );
$s            = ( !empty($_POST['s'])             ? $_POST['s']             : ( !empty($_GET['s'])            ? $_GET['s']            : NULL  ) );



// CREATE vizitki OBJECT
$entries_per_page = 10;
$vizitki = new se_vizitki($user->user_info['user_id']);



// DELETE NECESSARY ENTRIES
if( $task=="delete" && !empty($_POST['delete_vizitkientries']) && is_array($_POST['delete_vizitkientries']) )
{
  $vizitki->vizitki_entry_delete($_POST['delete_vizitkientries']);
}



// SET ENTRY SORT-BY VARIABLES FOR HEADING LINKS
$s = "vizitkientry_date DESC";

$where = NULL;
if( trim($search) ) $where = "(vizitkientry_title LIKE '%{$search}%' OR vizitkientry_body LIKE '%{$search}%')";



// GET ENTRIES
$total_vizitkientries = $vizitki->vizitki_entries_total($where);
$page_vars = make_page($total_vizitkientries, $entries_per_page, $p);
$vizitkientries = $vizitki->vizitki_entries_list($page_vars[0], $entries_per_page, $s, $where);

//print_r ($sett);
//print_r ($vizitkientries);
// ASSIGN VARIABLES AND SHOW VIEW ENTRIES PAGE
$smarty->assign('total_vizitkientries', $total_vizitkientries);
$smarty->assign_by_ref('vizitkientries', $vizitkientries);

$smarty->assign('s', $s);

$smarty->assign('search', $search);

$smarty->assign('p', $page_vars[1]);
$smarty->assign('maxpage', $page_vars[2]);
$smarty->assign('p_start', $page_vars[0]+1);
$smarty->assign('p_end', $page_vars[0]+count($vizitkientries));

include "footer.php";
?>