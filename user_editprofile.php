<?php

/* $Id: user_editprofile.php 42 2009-01-29 04:55:14Z john $ */

$page = "user_editprofile";
include "header.php";

//print_r($owner); die();

if ($owner->user_exists == 0 ) {
	$owner = $user;
}


if(isset($_POST['task'])) { $task = $_POST['task']; } elseif(isset($_GET['task'])) { $task = $_GET['task']; } else { $task = "main"; }
if(isset($_POST['cat_id'])) { $cat_id = $_POST['cat_id']; } elseif(isset($_GET['cat_id'])) { $cat_id = $_GET['cat_id']; } else { $cat_id = NULL; }
$countryjs_id = ( !empty($_POST['countryid']) ? $_POST['countryid'] : ( !empty($_GET['countryid']) ? $_GET['countryid'] : NULL ) );
$regionjs_id = ( !empty($_POST['regoinid']) ? $_POST['regoinid'] : ( !empty($_GET['regoinid']) ? $_GET['regoinid'] : NULL ) );

if( $task=="get_city" )
{
	if ($countryjs_id != '' && $regionjs_id == '')
	{
		$country_s = 'country_id ='.$countryjs_id;
		$error = 0;
	}
	elseif ($regionjs_id != '')
	{
		$country_s = 'region_id ='.$regionjs_id;
		$error = 0;
	}
	else
	{
		$error = 1;
		header("Content-Type: application/json");
		echo json_encode(array('result' => '','error' => $error));
		exit();
	}
	
	$sql = $database->database_query ("SELECT * FROM city  WHERE ".$country_s." ORDER BY name ASC");
	while ($city_bd = $database->database_fetch_assoc ($sql))
	{
		if($city_id == $city_bd[city_id])
			$city_sel = " SELECTED";
		else
			$city_sel = "";

		$city .= "<option value='" . $city_bd[city_id] . "'" . $city_sel . ">" . $city_bd[name] . "</option>\n";
	}
	
	$sql = $database->database_query ("SELECT * FROM region  WHERE ".$country_s." ORDER BY name ASC");
	while ($region_bd = $database->database_fetch_assoc ($sql))
	{
		if($region_id == $region_bd[region_id])
			$region_sel = " SELECTED";
		else
			$region_sel = "";

		$region .= "<option value='" . $region_bd[region_id] . "'" . $region_sel . ">" . $region_bd[name] . "</option>\n";
	}
	
	header("Content-Type: application/json");
	echo json_encode(array('result' => $city,'error' => $error, 'region' => $region));
	exit();
}

if( $task=="get_region" )
{
	if ($countryjs_id != '')
	{
		$country_s = 'region_id ='.$countryjs_id;
		$error = 0;
	}
	else
	{
		$error = 1;
		header("Content-Type: application/json");
		echo json_encode(array('result' => '','error' => $error));
		exit();
	}
	$sql = "SELECT * FROM city  WHERE ".$country_s." ORDER BY name ASC";
	//echo $sql; die();
	$sql = $database->database_query ($sql);
	while ($city_bd = $database->database_fetch_assoc ($sql))
	{
		if($city_id == $city_bd[city_id])
			$city_sel = " SELECTED";
		else
			$city_sel = "";

		$city .= "<option value='" . $city_bd[city_id] . "'" . $city_sel . ">" . $city_bd[name] . "</option>\n";
	}
	header("Content-Type: application/json");
	echo json_encode(array('result' => $city,'error' => $error));
	exit();
}




if( is_null($cat_id) )
{
  $cat_query = $database->database_query("SELECT t2.profilecat_id AS profilecat_id, COUNT(profilefield_id) AS total_fields FROM se_profilecats AS t1 LEFT JOIN se_profilecats AS t2 ON t1.profilecat_id=t2.profilecat_dependency LEFT JOIN se_profilefields ON t2.profilecat_id=se_profilefields.profilefield_profilecat_id WHERE profilefield_id IS NOT NULL AND t1.profilecat_id='{$owner->user_info['user_profilecat_id']}' GROUP BY t2.profilecat_id ORDER BY t2.profilecat_order LIMIT 1"); 
  if($database->database_num_rows($cat_query) == 1)
  {
    $cat = $database->database_fetch_assoc($cat_query);
    $cat_id = $cat['profilecat_id'];
  }
  elseif($owner->level_info['level_photo_allow'] != 0)
  {
    header("Location: user_editprofile_photo.php");
    exit();
  }
  else
  {
    header("Location: user_editprofile_settings.php");
    exit();
  }
}

// INITIALIZE VARIABLES
$result = 0;
$is_error = 0;


// VALIDATE CAT ID
if($task == "dosave") {
	$validate = 1;
} else {
	$validate = 0;
}

$field = new se_field("profile", $owner->profile_info);
$field->cat_list($validate, 0, 0, "profilecat_id='{$owner->user_info['user_profilecat_id']}'", "profilecat_id='{$cat_id}'");
$field_array = $field->fields;

if($validate == 1) {
	$is_error = $field->is_error;
}

if(count($field_array) == 0) {
	header("Location: user_editprofile.php");
	exit();
}

// SAVE PROFILE FIELDS
if($task == "dosave" && $is_error == 0)
{
  // SAVE PROFILE VALUES
  $profile_query = "UPDATE se_profilevalues SET {$field->field_query} WHERE profilevalue_user_id='{$owner->user_info['user_id']}'";
  $database->database_query($profile_query);
  
  
  // Flush cached data
  $owner->profile_info = NULL;
  $owner->profile_info =& SEUser::getProfileValues($owner->user_info['user_id']);
  
  $cache_object = SECache::getInstance();
  if( is_object($cache_object) )
  {
    $cache_object->remove('site_user_profiles_'.$owner->user_info['user_id']);
  }
  
  /*
  $profilevalues_static =& SEUser::getProfileValues($owner->user_info['user_id']);
  $profilevalues_static = NULL;
  
   = $database->database_fetch_assoc($database->database_query("SELECT * FROM se_profilevalues WHERE profilevalue_user_id='".$owner->user_info[user_id]."'"));
  //$owner->profile_info = $database->database_fetch_assoc($database->database_query("SELECT * FROM se_profilevalues WHERE profilevalue_user_id='".$owner->user_info[user_id]."'"));
  */
  
  
  // SAVE FIRST/LAST NAME, IF RELEVANT
  if(isset($field->field_special[2])) { $flquery[] = "user_fname='".$field->field_special[2]."'"; }
  if(isset($field->field_special[3])) { $flquery[] = "user_lname='".$field->field_special[3]."'"; }
  if(count($flquery) != 0) { $database->database_query("UPDATE se_users SET ".implode(", ", $flquery)." WHERE user_id='{$owner->user_info['user_id']}'"); }
  
  // UPDATE CACHED DISPLAYNAME
  $owner->user_displayname_update($field->field_special[2], $field->field_special[3]);
  
  
  // SET SUBNETWORK
  $subnet = $owner->user_subnet_select($owner->user_info['user_email'], $owner->user_info['user_profilecat_id'], $owner->profile_info); 
  if($subnet[0] != $owner->user_info['user_subnet_id'])
  {
    $database->database_query("UPDATE se_users SET user_subnet_id='{$subnet[0]}' WHERE user_id='{$owner->user_info['user_id']}'");
    $owner->user_info['user_subnet_id'] = $subnet[0];
    $owner->subnet_info['subnet_id'] = $subnet[0];
    $owner->subnet_info['subnet_name'] = $subnet[1];
    $result = 2;
  }
  else
  {
    $result = 1;
  }

  $owner->user_lastupdate();

  // INSERT ACTION
  $actions->actions_add($user, "editprofile", Array($owner->user_info['user_username'], $owner->user_displayname), Array(), 1800, false, "user", $owner->user_info['user_id'], $owner->user_info['user_privacy']);

  
}



if(isset($_POST['dhtmlgoodies_country'])) {
        $country=$_POST['dhtmlgoodies_country'];
        $id_ex = $owner->user_info['user_id'];
        $sql = "SELECT profilevalue_7 FROM se_profilevalues WHERE profilevalue_user_id=$id_ex LIMIT 1";
        if(!$database->database_query($sql))
        {
            $query="INSERT INTO `se_profilevalues` (`profilevalue_user_id`, `profilevalue_7`) VALUES ($id_ex,'$country')";
            $database->database_query($query);
        }
        else
        {
            
            $query="UPDATE `se_profilevalues` SET `profilevalue_7` = '$country' WHERE  profilevalue_user_id = $id_ex";
            $database->database_query($query);
       }
}

if(isset($_POST['dhtmlgoodies_country_birhday'])) {
        $country_birhday=$_POST['dhtmlgoodies_country_birhday'];
        $id_ex = $user_info['user_id'];
        $sql = "SELECT profilevalue_9 FROM se_profilevalues WHERE profilevalue_user_id=$id_ex LIMIT 1";
        if(!$database->database_query($sql))
        {
            $query="INSERT INTO `se_profilevalues` (`profilevalue_user_id`, `profilevalue_9`) VALUES ($id_ex,'$country_birhday')";
            $database->database_query($query);
        }
        else
        {

            $query="UPDATE `se_profilevalues` SET `profilevalue_9` = '$country_birhday' WHERE  profilevalue_user_id = $id_ex";
            $database->database_query($query);
        }
}


if(isset($_POST['dhtmlgoodies_region']))
{
	$region=$_POST['dhtmlgoodies_region'];
	$region_tb = $database->database_fetch_assoc($database->database_query("SELECT profilevalue_user_id FROM se_profilevalues WHERE profilevalue_user_id='".$owner->user_info['user_id']."' LIMIT 1"));
	$region_id = $region_tb[profilevalue_user_id];
	//$sql = "SELECT profilevalue_8 FROM se_profilevalues WHERE profilevalue_user_id=$id_ex LIMIT 1";
	if($region_id <= 0)
	{
		$query="INSERT INTO `se_profilevalues` (`profilevalue_user_id`, `profilevalue_17`) VALUES ($id_ex,'$region')";
		$database->database_query($query);
	}
	else
	{
		$query="UPDATE `se_profilevalues` SET `profilevalue_17` = '$region' WHERE  `se_profilevalues`.`profilevalue_user_id` = '".$owner->user_info['user_id']."'";
		$database->database_query($query);
	}
}

if(isset($_POST['dhtmlgoodies_city']))
{
    $id_ex=$owner->user_info['user_id'];
	$city=$_POST['dhtmlgoodies_city'];
	$city_tb = $database->database_fetch_assoc($database->database_query("SELECT profilevalue_user_id FROM se_profilevalues WHERE profilevalue_user_id='".$owner->user_info['user_id']."' LIMIT 1"));
	$city_id = $city_tb[profilevalue_user_id];
	//$sql = "SELECT profilevalue_9 FROM se_profilevalues WHERE profilevalue_id='".$owner->user_info['user_id']."' LIMIT 1";
	if($city_id <= 0)
	{
		$query="INSERT INTO `se_profilevalues` (`profilevalue_user_id`, `profilevalue_8`) VALUES ($id_ex,'$city')";
		$database->database_query($query);
	}
	else
	{
		$query="UPDATE `se_profilevalues` SET `profilevalue_8` = '$city' WHERE  profilevalue_user_id = '".$owner->user_info['user_id']."'";
		$database->database_query($query);
	}
}

// GET TABS TO DISPLAY ON TOP MENU
$field->cat_list(0, 0, 0, "profilecat_id='{$owner->user_info['user_profilecat_id']}'", "", "profilefield_id=0");
$cat_array = $field->subcats;



$country_tb = $database->database_fetch_assoc($database->database_query("SELECT profilevalue_7 FROM se_profilevalues WHERE profilevalue_user_id='".$owner->user_info['user_id']."' LIMIT 1"));
$country_id = $country_tb[profilevalue_7];
$sql = $database->database_query ("SELECT * FROM country");
while ($country_bd = $database->database_fetch_assoc ($sql))
{
	if($country_id == $country_bd[country_id])
		$country_sel = " SELECTED";
	else
		$country_sel = "";

	$country .= "<option value='" . $country_bd[country_id] . "'" . $country_sel . ">" . $country_bd[name] . "</option>\n";
}

$region_tb = $database->database_fetch_assoc($database->database_query("SELECT profilevalue_17 FROM se_profilevalues WHERE profilevalue_user_id='".$owner->user_info['user_id']."' LIMIT 1"));
$region_id = $region_tb[profilevalue_17];

//echo $region_id; die();

if($region_id > 0)
{
	$region_tb = $database->database_fetch_assoc($database->database_query("SELECT * FROM region WHERE region_id='".$region_id."' LIMIT 1"));

	$sql = $database->database_query("SELECT * FROM region WHERE country_id=".$region_tb[country_id].";");
	while ( $region_bd = $database->database_fetch_assoc($sql) )
	{
		if($region_id == $region_bd[region_id])
			$region_sel = " SELECTED";
		else
			$region_sel = "";

		$region .= "<option value='" . $region_bd[region_id] . "'" . $region_sel . ">" . $region_bd[name] . "</option>\n";
	}

	//$region .= "<option value='" . $region_tb[region_id] . "' SELECTED>" . $region_tb[name] . "</option>\n";
}
else
{
	if ($country_id != '') $country_s = ' country_id ='.$country_id;
	$sql = $database->database_query ("SELECT * FROM region WHERE ".$country_s.";");
	while ($region_bd = $database->database_fetch_assoc ($sql))
	{
		if($region_id == $region_bd[region_id])
			$region_sel = " SELECTED";
		else
			$region_sel = "";

		$region .= "<option value='" . $region_bd[region_id] . "'" . $region_sel . ">" . $region_bd[name] . "</option>\n";
	}
}
$city_tb = $database->database_fetch_assoc($database->database_query("SELECT profilevalue_8 FROM se_profilevalues WHERE profilevalue_user_id='".$owner->user_info['user_id']."' LIMIT 1"));
$city_id = $city_tb[profilevalue_8];


if($city_id > 0)
{
	$country_s = $country_id != ''?'country_id ='.$country_id:1;
	$region_s = $region_id != ''?'region_id ='.$region_id:1;
	
	//$sql = $database->database_query("SELECT city_id, name FROM city WHERE city_id='".$city_id."' ".$country_s);
    $sql = $database->database_query ("SELECT * FROM city  WHERE ".$country_s." AND ".$region_s." ORDER BY name ASC");
        while ($city_bd = $database->database_fetch_assoc ($sql))
	{
           
		if($city_id == $city_bd[city_id])
			$city_sel = " SELECTED";
		else
			$city_sel = "";

		$city .= "<option value='" . $city_bd[city_id] . "'" . $city_sel . ">" . $city_bd[name] . "</option>\n";
	}

	//$city .= "<option value='" . $city_tb[city_id] . "' SELECTED>" . $city_tb[name] . "</option>\n";
}
else
{
	if ($country_id != '') $country_s = ' country_id ='.$country_id;
	$sql = $database->database_query ("SELECT * FROM city  WHERE ".$country_s." ORDER BY name ASC");
   //    echo $sql;
	while ($city_bd = $database->database_fetch_assoc ($sql))
	{
		if($city_id == $city_bd[city_id])
			$city_sel = " SELECTED";
		else
			$city_sel = "";

		$city .= "<option value='" . $city_bd[city_id] . "'" . $city_sel . ">" . $city_bd[name] . "</option>\n";
	}
}


$country_birhday_tb = $database->database_fetch_assoc($database->database_query("SELECT profilevalue_9 FROM se_profilevalues WHERE profilevalue_user_id='".$owner->user_info['user_id']."' LIMIT 1"));
$country_birhday_id = $country_birhday_tb[profilevalue_9];
$sql = $database->database_query ("SELECT * FROM country");

while ($country_birhday_bd = $database->database_fetch_assoc ($sql))
{
	if($country_birhday_id == $country_birhday_bd[country_id])
		$country_birhday_sel = " SELECTED";
	else
		$country_birhday_sel = "";

	$country_birhday .= "<option value='" . $country_birhday_bd[country_id] . "'" . $country_birhday_sel . ">" . $country_birhday_bd[name] . "</option>\n";
}


if ($owner->profile_info['profilevalue_12'] != '0000-00-00')
{
	$date_d = explode('-', $owner->profile_info['profilevalue_12']);
	//echo "<pre>"; print_r($date_d); echo "</pre>"; echo '$date_d - '.$date_d.'<br>';	die();
	$jdDate = gregoriantojd( $date_d[1], $date_d[2], $date_d[0]); 
	//echo '$jdDate - '.$jdDate.'<br>'; die();
	$gregorianMonthName = jdmonthname ( $jdDate, 1 ); 
	//echo '$gregorianMonthName - '.$gregorianMonthName.'<br>';
	$hebrewDate = jdtojewish ($jdDate); 
	//echo '$hebrewDate - '.$hebrewDate.'<br>';
	
	list ($hebrewMonth, $hebrewDay, $hebrewYear) = split ('/', $hebrewDate); 
	
	$hebrewMonthName = jdmonthname ( $jdDate, 4);
	//echo '$hebrewMonthName - '.$hebrewMonthName.'<br>';	die();

	$smarty->assign('jd_death_d', $hebrewDay);
	$smarty->assign('jd_death_m', $hebrewMonth); 
	$smarty->assign('jd_death_mn', $hebrewMonthName); 
	$smarty->assign('jd_death_y', $hebrewYear); 

}

$smarty->assign('country', $country);
$smarty->assign('country_birhday', $country_birhday);
$smarty->assign('city', $city);
$smarty->assign('region', $region);




// ASSIGN VARIABLES AND INCLUDE FOOTER
$smarty->assign('result', $result);
$smarty->assign('is_error', $is_error);
$smarty->assign('cat_id', $cat_id);
$smarty->assign('cats', $cat_array);
$smarty->assign('fields', $field_array);
$smarty->assign('old_subnet_name', $subnet[2]);
$smarty->assign('new_subnet_name', $subnet[1]);
include "footer.php";
?>