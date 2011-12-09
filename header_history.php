<?php

/* $Id: header_history.php 58 2009-02-12 02:10:33Z john $ */

// ENSURE THIS IS BEING INCLUDED IN AN SE SCRIPT
defined('SE_PAGE') or exit();

// INCLUDE history FILES
include "./include/class_history.php";
include "./include/class_history_trackback.php";
include "./include/functions_history.php";


// PRELOAD LANGUAGE
SE_Language::_preload(15000071);


// SET MENU VARS
if( (!$user->user_exists && $setting['setting_permission_history']) || ($user->user_exists && $user->level_info['level_history_view']) )
  $plugin_vars['menu_main'] = array('file' => 'browse_historys.php', 'title' => 15000071);


if( $user->user_exists && $user->level_info['level_history_view'] )
  $plugin_vars['menu_user'] = array('file' => 'user_history.php', 'icon' => 'history_history16.gif', 'title' => 15000071);


// SET PROFILE MENU VARS
if( $owner->level_info['level_history_create'] && $page=="profile" ) {
  // START history
  $history = new se_history($owner->user_info['user_id']);
  $entries_per_page = 5;
  $sort = "historyentry_date DESC";

  // GET PRIVACY LEVEL AND SET WHERE
  $history_privacy_max = $owner->user_privacy_max($user);
  $where = "(historyentry_privacy & $history_privacy_max)";

  // GET TOTAL ENTRIES
  $total_historyentries = $history->history_entries_total($where);

  // GET ENTRY ARRAY
  $historyentries = $history->history_entries_list(0, $entries_per_page, $sort, $where);

  // ASSIGN ENTRIES SMARY VARIABLE
  $smarty->assign_by_ref('historyentries', $historyentries);
  $smarty->assign('total_historyentries', $total_historyentries);


  // SET PROFILE MENU VARS
  if( $total_historyentries )
  {
    $plugin_vars['menu_profile_tab'] = Array('file'=> 'profile_history.tpl', 'title' => 15000071, 'name' => 'history');
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

  if( strpos($page, 'history')!==FALSE || $page=="profile" )
    $smarty->assign_hook('styles', './templates/styles_history.css');
}


// SET HOOKS
SE_Hook::register("se_search_do", 'search_history');
SE_Hook::register("se_user_delete", 'deleteuser_history');
SE_Hook::register("se_site_statistics", 'site_statistics_history');

?>