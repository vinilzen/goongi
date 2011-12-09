<?php

/* $Id: admin_viewhistorys.php 5 2009-01-11 06:01:16Z john $ */

$page = "admin_viewhistorys";
include "admin_header.php";

if(isset($_POST['s'])) { $s = $_POST['s']; } elseif(isset($_GET['s'])) { $s = $_GET['s']; } else { $s = "id"; }
if(isset($_POST['p'])) { $p = $_POST['p']; } elseif(isset($_GET['p'])) { $p = $_GET['p']; } else { $p = 1; }
if(isset($_POST['f_title'])) { $f_title = $_POST['f_title']; } elseif(isset($_GET['f_title'])) { $f_title = $_GET['f_title']; } else { $f_title = ""; }
if(isset($_POST['f_owner'])) { $f_owner = $_POST['f_owner']; } elseif(isset($_GET['f_owner'])) { $f_owner = $_GET['f_owner']; } else { $f_owner = ""; }
if(isset($_POST['task'])) { $task = $_POST['task']; } elseif(isset($_GET['task'])) { $task = $_GET['task']; } else { $task = "main"; }
if(isset($_POST['historyentry_id'])) { $historyentry_id = $_POST['historyentry_id']; } elseif(isset($_GET['historyentry_id'])) { $historyentry_id = $_GET['historyentry_id']; } else { $historyentry_id = 0; }
if(isset($_POST['delete_historyentries'])) { $delete_historyentries = $_POST['delete_historyentries']; } elseif(isset($_GET['delete_historyentries'])) { $delete_historyentries = $_GET['delete_historyentries']; } else { $delete_historyentries = NULL; }


// CREATE history OBJECT
$entries_per_page = 100;
$history = new se_history();



// DELETE ENTRIES
if( $task=="deleteentries" && !empty($delete_historyentries) )
{
  $history->history_entry_delete($delete_historyentries);
  header('Location: admin_viewhistorys.php');
  exit();
}



// SET history ENTRY SORT-BY VARIABLES FOR HEADING LINKS
$i = "id";   // historyENTRY_ID
$t = "t";    // historyENTRY_TITLE
$o = "o";    // OWNER OF ENTRY
$v = "v";    // VIEWS OF ENTRY
$d = "d";    // DATE OF ENTRY

// SET SORT VARIABLE FOR DATABASE QUERY
if($s == "i") {
  $sort = "se_historyentries.historyentry_id";
  $i = "id";
} elseif($s == "id") {
  $sort = "se_historyentries.historyentry_id DESC";
  $i = "i";
} elseif($s == "t") {
  $sort = "se_historyentries.historyentry_title";
  $t = "td";
} elseif($s == "td") {
  $sort = "se_historyentries.historyentry_title DESC";
  $t = "t";
} elseif($s == "o") {
  $sort = "se_users.user_username";
  $o = "od";
} elseif($s == "od") {
  $sort = "se_users.user_username DESC";
  $o = "o";
} elseif($s == "v") {
  $sort = "se_historyentries.historyentry_views";
  $v = "vd";
} elseif($s == "vd") {
  $sort = "se_historyentries.historyentry_views DESC";
  $v = "v";
} elseif($s == "d") {
  $sort = "se_historyentries.historyentry_date";
  $d = "dd";
} elseif($s == "dd") {
  $sort = "se_historyentries.historyentry_date DESC";
  $d = "d";
} else {
  $sort = "se_historyentries.historyentry_id DESC";
  $i = "i";
}




// ADD CRITERIA FOR FILTER
$where = "";
if($f_owner != "") { $where .= "se_users.user_username LIKE '%$f_owner%'"; }
if($f_owner != "" & $f_title != "") { $where .= " AND"; }
if($f_title != "") { $where .= " se_historyentries.historyentry_title LIKE '%$f_title%'"; }
if($where != "") { $where = "(".$where.")"; }


// GET TOTAL ENTRIES
$total_historyentries = $history->history_entries_total($where);

// MAKE ENTRY PAGES
$page_vars = make_page($total_historyentries, $entries_per_page, $p);
$page_array = Array();
for($x=0;$x<=$page_vars[2]-1;$x++) {
  if($x+1 == $page_vars[1]) { $link = "1"; } else { $link = "0"; }
  $page_array[$x] = Array('page' => $x+1,
			  'link' => $link);
}

// GET ENTRY ARRAY
$historyentries = $history->history_entries_list($page_vars[0], $entries_per_page, $sort, $where);


// ASSIGN VARIABLES AND SHOW VIEW ENTRIES PAGE
$smarty->assign('total_historyentries', $total_historyentries);
$smarty->assign('pages', $page_array);
$smarty->assign('entries', $historyentries);
$smarty->assign('f_title', $f_title);
$smarty->assign('f_owner', $f_owner);
$smarty->assign('i', $i);
$smarty->assign('t', $t);
$smarty->assign('o', $o);
$smarty->assign('v', $v);
$smarty->assign('d', $d);
$smarty->assign('p', $page_vars[1]);
$smarty->assign('s', $s);
include "admin_footer.php";
?>