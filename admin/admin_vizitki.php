<?php

/* $Id: admin_vizitki.php 5 2009-01-11 06:01:16Z john $ */

$page = "admin_vizitki";
include "admin_header.php";

$task                         = ( !empty($_POST['task'])                ? $_POST['task']                : NULL );
$vizitkientrycat_id              = ( !empty($_POST['vizitkientrycat_id'])     ? $_POST['vizitkientrycat_id']     : NULL );
$vizitkientrycat_title           = ( !empty($_POST['vizitkientrycat_title'])  ? $_POST['vizitkientrycat_title']  : NULL );
$vizitkientrycat_showusercreated = !empty($_POST['vizitkientrycat_showusercreated']);
$country =               ( !empty($_POST['countr'])  ? $_POST['countr']  : NULL );

// SET RESULT VARIABLE
$result = 0;



// DELETE CATEGORY
if( $task=="deletevizitkientrycat" )
{
  $sql = "DELETE FROM se_vizitkientrycats WHERE vizitkientrycat_id='{$vizitkientrycat_id}' LIMIT 1";
  $resource = $database->database_query($sql) or die($database->database_error()." <b>SQL was: </b>$sql");
  
  if( $database->database_affected_rows($resource) )
    echo '{"result" : "success"}';
  else
    echo '{"result" : "failure"}';
  
  exit();
}


// CREATE CATEGORY
else if( $task=="createvizitkientrycat" )
{
  $lvar_id = SE_Language::edit(0, $vizitkientrycat_title, NULL, LANGUAGE_INDEX_SUBNETS);
  $sql = "INSERT INTO se_vizitkientrycats (vizitkientrycat_languagevar_id,vizitkientrycat_title) VALUES ('{$lvar_id}','{$vizitkientrycat_title}')";
  $resource = $database->database_query($sql) or die($database->database_error()." <b>SQL was: </b>$sql");
  
  if( $database->database_affected_rows($resource) )
    echo '{"result" : "success", "vizitkientrycat_id" : '.$database->database_insert_id().', "vizitkientrycat_languagevar_id" : '.$lvar_id.'}';
  else
    echo '{"result" : "failure"}';
  
  exit();
}

else if ( $task=="deletcountry" )
{
  $sql = "DELETE FROM se_vizitki_country WHERE vizitkisetting_id='{$vizitkientrycat_id}' LIMIT 1";
  $resource = $database->database_query($sql) or die($database->database_error()." <b>SQL was: </b>$sql");

  if( $database->database_affected_rows($resource) )
    echo '{"result" : "success"}';
  else
    echo '{"result" : "failure"}';

  exit();
}

else if( $task=="createcountry" )
{
 // $lvar_id = SE_Language::edit(0, $vizitkientrycat_title, NULL, LANGUAGE_INDEX_SUBNETS);
    $sql = "
        INSERT INTO se_vizitki_country
        (
        vizitkisetting_country
        )
        VALUES
        (
          '$vizitkientrycat_title'
        )";
      //$resource = $database->database_query($sql);
  $resource = $database->database_query($sql) or die($database->database_error()." <b>SQL was: </b>$sql");

  if( $database->database_affected_rows($resource) )
    echo '{"result" : "success", "vizitkientrycat_id" : '.$database->database_insert_id().'}';
  else
    echo '{"result" : "failure"}';

  exit();
}

else if( $task=="editcountry" )
{
  // Get langvar id
//  $sql = "SELECT * FROM se_vizitki_country WHERE vizitkisetting_id 	='{$vizitkientrycat_id}' LIMIT 1";
  $sql = "UPDATE se_vizitki_country SET vizitkisetting_country='{$vizitkientrycat_title}' WHERE vizitkisetting_id='{$vizitkientrycat_id}' LIMIT 1";
  $resource = $database->database_query($sql) or die($database->database_error()." <b>SQL was: </b>$sql");

  if( !$database->database_num_rows($resource) )
  {
    echo '{"result" : "failure"}';
    exit();
  }
$result = $database->database_fetch_assoc($resource);
 // $lvar_id = $result['vizitkientrycat_languagevar_id'];
 // SE_Language::edit($lvar_id, $vizitkientrycat_title);
//  $sql = "UPDATE se_vizitkientrycats SET vizitkientrycat_title='{$vizitkientrycat_title}' WHERE vizitkientrycat_id='{$vizitkientrycat_id}' LIMIT 1";
//  $resource = $database->database_query($sql) or die($database->database_error()." <b>SQL was: </b>$sql");

  if( $database->database_affected_rows($resource) || $resource )
    echo '{"result" : "success"}';
  else
    echo '{"result" : "failure"}';

  exit();
}
//////////////==========city
else if ( $task=="deletcity" )
{
  $sql = "DELETE FROM se_vizitki_city WHERE vizitkisetting_id='{$vizitkientrycat_id}' LIMIT 1";
  
  $resource = $database->database_query($sql) or die($database->database_error()." <b>SQL was: </b>$sql");

  if( $database->database_affected_rows($resource) )
    echo '{"result" : "success"}';
  else
    echo '{"result" : "failure"}';

  exit();
}

else if( $task=="createcity" )
{
 // $lvar_id = SE_Language::edit(0, $vizitkientrycat_title, NULL, LANGUAGE_INDEX_SUBNETS);
    $sql = "
        INSERT INTO se_vizitki_city
        (
        vizitki_country_id,
        vizitki_city 
        )
        VALUES
        (
          '$country',
          '$vizitkientrycat_title'
        )";
      //$resource = $database->database_query($sql);
  $resource = $database->database_query($sql) or die($database->database_error()." <b>SQL was: </b>$sql");

  if( $database->database_affected_rows($resource) )
    echo '{"result" : "success", "vizitkientrycat_id" : '.$database->database_insert_id().'}';
  else
    echo '{"result" : "failure"}';

  exit();
}

else if( $task=="editcity" )
{
  // Get langvar id
//  $sql = "SELECT * FROM se_vizitki_country WHERE vizitkisetting_id 	='{$vizitkientrycat_id}' LIMIT 1";
  $sql = "UPDATE se_vizitki_city SET vizitki_city='{$vizitkientrycat_title}',vizitki_country_id = '{$country}' WHERE vizitkisetting_id='{$vizitkientrycat_id}' LIMIT 1";
  $resource = $database->database_query($sql) or die($database->database_error()." <b>SQL was: </b>$sql");

  if( !$database->database_num_rows($resource) )
  {
    echo '{"result" : "failure"}';
    exit();
  }
$result = $database->database_fetch_assoc($resource);
 // $lvar_id = $result['vizitkientrycat_languagevar_id'];
 // SE_Language::edit($lvar_id, $vizitkientrycat_title);
//  $sql = "UPDATE se_vizitkientrycats SET vizitkientrycat_title='{$vizitkientrycat_title}' WHERE vizitkientrycat_id='{$vizitkientrycat_id}' LIMIT 1";
//  $resource = $database->database_query($sql) or die($database->database_error()." <b>SQL was: </b>$sql");

 // if( $database->database_affected_rows($resource) || $resource )
    echo '{"result" : "success"}';
//  else
//    echo '{"result" : "failure"}';

  exit();
}

// EDIT CATEGORY
else if( $task=="editvizitkientrycat" )
{
  // Get langvar id
  $sql = "SELECT * FROM se_vizitkientrycats WHERE vizitkientrycat_id='{$vizitkientrycat_id}' LIMIT 1";
  $resource = $database->database_query($sql) or die($database->database_error()." <b>SQL was: </b>$sql");
  
  if( !$database->database_num_rows($resource) )
  {
    echo '{"result" : "failure"}';
    exit();
  }
  
  $result = $database->database_fetch_assoc($resource);
  $lvar_id = $result['vizitkientrycat_languagevar_id'];
  SE_Language::edit($lvar_id, $vizitkientrycat_title);
  $sql = "UPDATE se_vizitkientrycats SET vizitkientrycat_title='{$vizitkientrycat_title}' WHERE vizitkientrycat_id='{$vizitkientrycat_id}' LIMIT 1";
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
  $setting_permission_vizitki = $_POST['setting_permission_vizitki'];
  
  $sql = "UPDATE se_settings SET setting_permission_vizitki='$setting_permission_vizitki'";
  $database->database_query($sql) or die($database->database_error()." <b>SQL was: </b>$sql");
  
  
  $setting = $database->database_fetch_assoc($database->database_query("SELECT * FROM se_settings LIMIT 1"));
  $result = 1;
}


// GET vizitki ENTRY CATEGORIES
$categories_array = se_vizitki::vizitki_category_list($vizitkientrycat_showusercreated);
$city= se_vizitki::get_all_city();
$country= se_vizitki::get_all_country();
// ASSIGN VARIABLES AND SHOW GENERAL SETTINGS PAGE
$smarty->assign('result', $result);
$smarty->assign('vizitkientrycats', $categories_array);

$smarty->assign('city', $city);
$smarty->assign('country', $country);

include "admin_footer.php";
?>