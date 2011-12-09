<?php

/* $Id: admin_levels_historysettings.php 5 2009-01-11 06:01:16Z john $ */

$page = "admin_levels_historysettings";
include "admin_header.php";

if(isset($_POST['task'])) { $task = $_POST['task']; } else { $task = "main"; }
if(isset($_POST['level_id'])) { $level_id = $_POST['level_id']; } elseif(isset($_GET['level_id'])) { $level_id = $_GET['level_id']; } else { $level_id = 0; }


// VALIDATE LEVEL ID
$sql = "SELECT * FROM se_levels WHERE level_id='{$level_id}' LIMIT 1";
$resource = $database->database_query($sql) or die($database->database_error()." <b>SQL was: </b>$sql");

if( !$database->database_num_rows($resource) )
{ 
  header("Location: admin_levels.php");
  exit();
}

$level_info = $database->database_fetch_assoc($resource);


// SET RESULT AND ERROR VARS
$result = FALSE;
$is_error = FALSE;



// SAVE CHANGES
if($task == "dosave")
{
  $level_history_view              = $_POST['level_history_view'];
  $level_history_create            = $_POST['level_history_create'];
  $level_history_category_create   = !empty($_POST['level_history_category_create']);
  $level_history_entries           = $_POST['level_history_entries'];
  $level_history_style             = $_POST['level_history_style'];
  $level_history_search            = $_POST['level_history_search'];
  $level_history_trackbacks_allow  = $_POST['level_history_trackbacks_allow'];
  $level_history_trackbacks_detect = $_POST['level_history_trackbacks_detect'];
  $level_history_html              = $_POST['level_history_html'];
  $level_history_privacy           = is_array($_POST['level_history_privacy']) ? $_POST['level_history_privacy'] : array();
  $level_history_comments          = is_array($_POST['level_history_comments']) ? $_POST['level_history_comments'] : array();
  
  // FORMAT HTML CORRECTLY
  $level_history_html = preg_replace('/[,\s]+/', ',', $level_history_html);
  
  // CHECK THAT A NUMBER BETWEEN 1 AND 999 WAS ENTERED FOR history ENTRIES
  if( !is_numeric($level_history_entries) || $level_history_entries<1 || $level_history_entries>999 )
  {
    $is_error = 1500110;
  }
  
  else
  {
    // GET PRIVACY AND PRIVACY DIFFERENCES
    if( empty($level_history_privacy) || !is_array($level_history_privacy) ) $level_history_privacy = array(63);
    rsort($level_history_privacy);
    $new_privacy_options = $level_history_privacy;
    $level_history_privacy = serialize($level_history_privacy);
    
    // GET COMMENT AND COMMENT DIFFERENCES
    if( empty($level_history_comments) || !is_array($level_history_comments) ) $level_history_privacy = array(63);
    rsort($level_history_comments);
    $new_comments_options = $level_history_comments;
    $level_history_comments = serialize($level_history_comments);
    
    // SAVE SETTINGS
    $sql = "
      UPDATE
        se_levels
      SET 
        level_history_view='$level_history_view',
        level_history_create='$level_history_create',
        level_history_category_create='$level_history_category_create',
        level_history_entries='$level_history_entries',
        level_history_search='$level_history_search',
        level_history_privacy='$level_history_privacy',
        level_history_comments='$level_history_comments',
        level_history_style='$level_history_style',
        level_history_trackbacks_allow='$level_history_trackbacks_allow',
        level_history_trackbacks_detect='$level_history_trackbacks_detect',
        level_history_html='$level_history_html'
      WHERE
        level_id='{$level_info['level_id']}'
      LIMIT
        1
    ";
    
    $resource = $database->database_query($sql) or die($database->database_error()." <b>SQL was: </b>$sql");
    
    if( !$level_history_search )
      $database->database_query("UPDATE se_historyentries INNER JOIN se_users ON se_users.user_id=se_historyentries.historyentry_user_id SET se_historyentries.historyentry_search='1' WHERE se_users.user_level_id='{$level_info['level_id']}'") or die("<b>Error: </b>".$database->database_error()."<br /><b>File: </b>".__FILE__."<br /><b>Line: </b>".__LINE__."<br /><b>Query: </b>".$sql);
    
    $database->database_query("UPDATE se_historyentries INNER JOIN se_users ON se_users.user_id=se_historyentries.historyentry_user_id SET se_historyentries.historyentry_privacy='{$new_privacy_options[0]}' WHERE se_users.user_level_id='{$level_info['level_id']}' && se_historyentries.historyentry_privacy NOT IN('".join("','", $new_privacy_options)."')") or die("<b>Error: </b>".$database->database_error()."<br /><b>File: </b>".__FILE__."<br /><b>Line: </b>".__LINE__."<br /><b>Query: </b>".$sql);
    $database->database_query("UPDATE se_historyentries INNER JOIN se_users ON se_users.user_id=se_historyentries.historyentry_user_id SET se_historyentries.historyentry_comments='{$new_comments_options[0]}' WHERE se_users.user_level_id='{$level_info['level_id']}' && se_historyentries.historyentry_comments NOT IN('".join("','", $new_comments_options)."')") or die("<b>Error: </b>".$database->database_error()."<br /><b>File: </b>".__FILE__."<br /><b>Line: </b>".__LINE__."<br /><b>Query: </b>".$sql);
    
    $level_info = $database->database_fetch_assoc($database->database_query("SELECT * FROM se_levels WHERE level_id='{$level_info['level_id']}'"));
    $result = TRUE;
  }

}


// GET PREVIOUS PRIVACY SETTINGS
for( $c=6; $c>0; $c-- )
{
  $priv = pow(2, $c)-1;
  $upl = user_privacy_levels($priv);
  if( !$upl ) continue;
  
  SE_Language::_preload($upl);
  $privacy_options[$priv] = $upl;
}

for( $c=6; $c>=0; $c-- )
{
  $priv = pow(2, $c)-1;
  $upl = user_privacy_levels($priv);
  if( !$upl ) continue;
  
  SE_Language::_preload($upl);
  $comment_options[$priv] = $upl;
}




// ASSIGN VARIABLES AND SHOW history SETTINGS PAGE
$smarty->assign('result', $result);
$smarty->assign('is_error', $is_error);

$smarty->assign_by_ref('level_info', $level_info);

$smarty->assign('level_history_privacy', unserialize($level_info['level_history_privacy']));
$smarty->assign('level_history_comments', unserialize($level_info['level_history_comments']));
$smarty->assign('level_history_html', str_replace(',', ', ', $level_info['level_history_html']));

$smarty->assign('history_privacy', $privacy_options);
$smarty->assign('history_comments', $comment_options);

include "admin_footer.php";
?>