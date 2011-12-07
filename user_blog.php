<?php

/* $Id: user_blog.php 16 2009-01-13 04:01:31Z john $ */

$page = "user_blog";
include "header.php";

$task         = ( !empty($_POST['task'])          ? $_POST['task']          : ( !empty($_GET['task'])         ? $_GET['task']         : NULL  ) );
$search       = ( !empty($_POST['search'])        ? $_POST['search']        : ( !empty($_GET['search'])       ? $_GET['search']       : NULL  ) );
$p            = ( !empty($_POST['p'])             ? $_POST['p']             : ( !empty($_GET['p'])            ? $_GET['p']            : 1     ) );
$s            = ( !empty($_POST['s'])             ? $_POST['s']             : ( !empty($_GET['s'])            ? $_GET['s']            : NULL  ) );





// CREATE BLOG OBJECT
$entries_per_page = 5;
$blog = new se_blog($user->user_info['user_id']);

if (($_GET['blogentry_id'])&&($_GET['del']==1))
{
  $blog->blog_entry_delete($_GET['blogentry_id']);
}

// DELETE NECESSARY ENTRIES
if( $task=="delete" && !empty($_POST['delete_blogentries']) && is_array($_POST['delete_blogentries']) )
{
  $blog->blog_entry_delete($_POST['delete_blogentries']);
}



// SET ENTRY SORT-BY VARIABLES FOR HEADING LINKS
$s = "blogentry_date DESC";

$where = NULL;
if( trim($search) ) $where = "(blogentry_title LIKE '%{$search}%' OR blogentry_body LIKE '%{$search}%')";



// GET ENTRIES
$total_blogentries = $blog->blog_entries_total($where);
$page_vars = make_page($total_blogentries, $entries_per_page, $p);
$blogentries = $blog->blog_entries_list($page_vars[0], $entries_per_page, $s, $where);

$i = 0;
/*foreach ($blogentries as $blogentry_loop) {
	//echo  ($blogentry_loop[blogentry_author]->user_displayname);
	$i++;
	$date = explode('.',date('d.m.Y', $blogentry_loop[blogentry_date]));
	$monthList = array('января', 'февраля', 'марта', 'апреля', 'мая', 'июня', 'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря');
	$data_rus[$i] =  $date[0].' '.$monthList[$date[1]-1].' '.$date[2];
}*/
//print_r ($blogentries);
// ASSIGN VARIABLES AND SHOW VIEW ENTRIES PAGE
$smarty->assign('total_blogentries', $total_blogentries);
$smarty->assign_by_ref('blogentries', $blogentries);
//$smarty->assign('data_rus', $data_rus);

$smarty->assign('s', $s);
$smarty->assign('search', $search);

$smarty->assign('p', $page_vars[1]);
$smarty->assign('maxpage', $page_vars[2]);
$smarty->assign('p_start', $page_vars[0]+1);
$smarty->assign('p_end', $page_vars[0]+count($blogentries));

include "footer.php";
?>