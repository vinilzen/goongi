<?php

/* $Id: header_vizitki.php 58 2009-02-12 02:10:33Z john $ */

// ENSURE THIS IS BEING INCLUDED IN AN SE SCRIPT
defined('SE_PAGE') or exit();

// INCLUDE vizitki FILES
include "./include/class_vizitki.php";
include "./include/functions_vizitki.php";


// PRELOAD LANGUAGE
SE_Language::_preload(900001);


// SET MENU VARS
if( (!$user->user_exists && $setting['setting_permission_vizitki']) || ($user->user_exists && $user->level_info['level_vizitki_view']) )
  $plugin_vars['menu_main'] = array('file' => 'browse_vizitkis.php', 'title' => 900001);

if( $user->user_exists && $user->level_info['level_vizitki_view'] )
  $plugin_vars['menu_user'] = array('file' => 'user_vizitki.php', 'icon' => 'vizitki_vizitki16.gif', 'title' => 900001);


// SET PROFILE MENU VARS
if( $owner->level_info['level_vizitki_create'] && $page=="profile" )
{
  // START vizitki
  $vizitki = new se_vizitki($owner->user_info['user_id']);
  $entries_per_page = 5;
  $sort = "vizitkientry_date DESC";

  // GET PRIVACY LEVEL AND SET WHERE
  $vizitki_privacy_max = $owner->user_privacy_max($user);
  $where = "(vizitkientry_privacy & $vizitki_privacy_max)";

  // GET TOTAL ENTRIES
  $total_vizitkientries = $vizitki->vizitki_entries_total($where);

  // GET ENTRY ARRAY
  $vizitkientries = $vizitki->vizitki_entries_list(0, $entries_per_page, $sort, $where);

  // ASSIGN ENTRIES SMARY VARIABLE
  $smarty->assign_by_ref('vizitkientries', $vizitkientries);
  $smarty->assign('total_vizitkientries', $total_vizitkientries);


  // SET PROFILE MENU VARS
  if( $total_vizitkientries )
  {
    $plugin_vars['menu_profile_tab'] = Array('file'=> 'profile_vizitki.tpl', 'title' => 900001, 'name' => 'vizitki');
    $plugin_vars['menu_profile_side'] = "";
  }
}


// Use new template hooks
if( is_a($smarty, 'SESmarty') )
{
  $plugin_vars['uses_tpl_hooks'] = TRUE;
  
  if( !empty($plugin_vars['menu_main']) )
    $smarty->assign_hook('menu_main', $plugin_vars['menu_main']);
  
  if( !empty($plugin_vars['menu_user']) )
    $smarty->assign_hook('menu_user_apps', $plugin_vars['menu_user']);
  
  if( !empty($plugin_vars['menu_profile_side']) )
    $smarty->assign_hook('profile_side', $plugin_vars['menu_profile_side']);
  
  if( !empty($plugin_vars['menu_profile_tab']) )
    $smarty->assign_hook('profile_tab', $plugin_vars['menu_profile_tab']);
  
  if( !empty($plugin_vars['menu_userhome']) )
    $smarty->assign_hook('user_home', $plugin_vars['menu_userhome']);

  if( strpos($page, 'vizitki')!==FALSE || $page=="profile" )
    $smarty->assign_hook('styles', './templates/styles_vizitki.css');
}



// SET HOOKS
SE_Hook::register("se_search_do", 'search_vizitki');
SE_Hook::register("se_user_delete", 'deleteuser_vizitki');
SE_Hook::register("se_site_statistics", 'site_statistics_vizitki');

?>