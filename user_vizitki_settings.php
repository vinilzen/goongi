<?php

/* $Id: user_vizitki_settings.php 16 2009-01-13 04:01:31Z john $ */

$page = "user_vizitki_settings";
include "header.php";

if(isset($_POST['task'])) { $task = $_POST['task']; } elseif(isset($_GET['task'])) { $task = $_GET['task']; } else { $task = "main"; }


// SET VARS
$result = 0;


// SAVE NEW CSS
if($task == "dosave")
{
  $style_vizitki = addslashes(str_replace("-moz-binding", "", strip_tags(htmlspecialchars_decode($_POST['style_vizitki'], ENT_QUOTES))));
  $user->usersetting_info['usersetting_notify_vizitkicomment'] = $usersetting_notify_vizitkicomment = $_POST['usersetting_notify_vizitkicomment'];
  $user->usersetting_info['usersetting_notify_vizitkitrackback'] = $usersetting_notify_vizitkitrackback = $_POST['usersetting_notify_vizitkitrackback'];
  $user->usersetting_info['usersetting_notify_newvizitkisubscriptionentry'] = $usersetting_notify_newvizitkisubscriptionentry = $_POST['usersetting_notify_newvizitkisubscriptionentry'];
  
  // STYLES
  $sql = "UPDATE se_vizitkistyles SET vizitkistyle_css='{$style_vizitki}' WHERE vizitkistyle_user_id='{$user->user_info['user_id']}'";
  $resource = $database->database_query($sql) or die($database->database_error()." <b>SQL was: </b>$sql");
  
  // USERSETTINGS
  $sql = "
    UPDATE
      se_usersettings
    SET
      usersetting_notify_vizitkicomment='$usersetting_notify_vizitkicomment',
      usersetting_notify_vizitkitrackback='$usersetting_notify_vizitkitrackback',
      usersetting_notify_newvizitkisubscriptionentry='$usersetting_notify_newvizitkisubscriptionentry'
    WHERE
      usersetting_user_id='{$user->user_info['user_id']}'
  ";
  $resource = $database->database_query($sql) or die($database->database_error()." <b>SQL was: </b>$sql");
  
  
  $user->user_lastupdate();
  $result = 1;
}



// GET THIS USER'S vizitki CSS
$style_query = $database->database_query("SELECT vizitkistyle_css FROM se_vizitkistyles WHERE vizitkistyle_user_id='{$user->user_info['user_id']}' LIMIT 1");
if($database->database_num_rows($style_query) == 1) { 
  $style_info = $database->database_fetch_assoc($style_query); 
} else {
  $database->database_query("INSERT INTO se_vizitkistyles (vizitkistyle_user_id, vizitkistyle_css) VALUES ('{$user->user_info['user_id']}', '')");
  $style_info = $database->database_fetch_assoc($database->database_query("SELECT vizitkistyle_css FROM se_vizitkistyles WHERE vizitkistyle_user_id='{$user->user_info['user_id']}' LIMIT 1")); 
}


// ASSIGN USER SETTINGS
$user->user_settings();

// ASSIGN SMARTY VARIABLES AND DISPLAY vizitki STYLE PAGE
$smarty->assign('style_vizitki', htmlspecialchars($style_info['vizitkistyle_css'], ENT_QUOTES, 'UTF-8'));
$smarty->assign('result', $result);
include "footer.php";
?>