<?php

/* $Id: admin_history.php 5 2009-01-11 06:01:16Z john $ */

$page = "admin_history";
include "admin_header.php";

$task                         = ( !empty($_POST['task'])                ? $_POST['task']                : NULL );
$historyentrycat_id              = ( !empty($_POST['historyentrycat_id'])     ? $_POST['historyentrycat_id']     : NULL );
$historyentrycat_title           = ( !empty($_POST['historyentrycat_title'])  ? $_POST['historyentrycat_title']  : NULL );
$historyentrycat_showusercreated = !empty($_POST['historyentrycat_showusercreated']);

// SET RESULT VARIABLE
$result = 0;



// DELETE CATEGORY
if( $task=="deletehistoryentrycat" )
{
  $sql = "DELETE FROM se_historyentrycats WHERE historyentrycat_id='{$historyentrycat_id}' LIMIT 1";
  $resource = $database->database_query($sql) or die($database->database_error()." <b>SQL was: </b>$sql");
  
  if( $database->database_affected_rows($resource) )
    echo '{"result" : "success"}';
  else
    echo '{"result" : "failure"}';
  
  exit();
}


// CREATE CATEGORY
else if( $task=="createhistoryentrycat" )
{
  $lvar_id = SE_Language::edit(0, $historyentrycat_title, NULL, LANGUAGE_INDEX_SUBNETS);
  $sql = "INSERT INTO se_historyentrycats (historyentrycat_languagevar_id,historyentrycat_title) VALUES ('{$lvar_id}','{$historyentrycat_title}')";
  $resource = $database->database_query($sql) or die($database->database_error()." <b>SQL was: </b>$sql");
  
  if( $database->database_affected_rows($resource) )
    echo '{"result" : "success", "historyentrycat_id" : '.$database->database_insert_id().', "historyentrycat_languagevar_id" : '.$lvar_id.'}';
  else
    echo '{"result" : "failure"}';
  
  exit();
}


// EDIT CATEGORY
else if( $task=="edithistoryentrycat" )
{
  // Get langvar id
  $sql = "SELECT * FROM se_historyentrycats WHERE historyentrycat_id='{$historyentrycat_id}' LIMIT 1";
  $resource = $database->database_query($sql) or die($database->database_error()." <b>SQL was: </b>$sql");
  
  if( !$database->database_num_rows($resource) )
  {
    echo '{"result" : "failure"}';
    exit();
  }
  
  $result = $database->database_fetch_assoc($resource);
  $lvar_id = $result['historyentrycat_languagevar_id'];
  
  
  SE_Language::edit($lvar_id, $historyentrycat_title);
  $sql = "UPDATE se_historyentrycats SET historyentrycat_title='{$historyentrycat_title}' WHERE historyentrycat_id='{$historyentrycat_id}' LIMIT 1";
  $resource = $database->database_query($sql) or die($database->database_error()." <b>SQL was: </b>$sql");
  
  if( $database->database_affected_rows($resource) || $resource )
    echo '{"result" : "success"}';
  else
    echo '{"result" : "failure"}';
  
  exit();
}


// SAVE CHANGES
elseif($task == "dosave")
{
  $setting_permission_history = $_POST['setting_permission_history'];
  
  $sql = "UPDATE se_settings SET setting_permission_history='$setting_permission_history'";
  $database->database_query($sql) or die($database->database_error()." <b>SQL was: </b>$sql");
  
  
  $setting = $database->database_fetch_assoc($database->database_query("SELECT * FROM se_settings LIMIT 1"));
  $result = 1;
}


// GET history ENTRY CATEGORIES
$categories_array = se_history::history_category_list($historyentrycat_showusercreated);

// ASSIGN VARIABLES AND SHOW GENERAL SETTINGS PAGE
$smarty->assign('result', $result);
$smarty->assign('historyentrycats', $categories_array);
include "admin_footer.php";
?>