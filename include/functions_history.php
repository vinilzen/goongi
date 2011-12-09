<?php

/* $Id: functions_history.php 16 2009-01-13 04:01:31Z john $ */


//
//  THIS FILE CONTAINS history-RELATED FUNCTIONS
//  FUNCTIONS IN THIS CLASS:
//
//    search_history()
//    deleteuser_history()
//    site_statistics_history()
//


defined('SE_PAGE') or exit();










//
// THIS FUNCTION IS RUN DURING THE SEARCH PROCESS TO SEARCH THROUGH history ENTRIES
//
// INPUT:
//
// OUTPUT: 
//

function search_history()
{
	global $database, $url, $results_per_page, $p, $search_text, $t, $search_objects, $results, $total_results;

	// CONSTRUCT QUERY
  $sql = "
    SELECT
      se_historyentries.historyentry_id,
      se_historyentries.historyentry_title,
      se_historyentries.historyentry_body,
      se_users.user_id,
      se_users.user_username,
      se_users.user_photo,
      se_users.user_fname,
      se_users.user_lname
    FROM
      se_historyentries,
      se_users,
      se_levels
    WHERE
      se_historyentries.historyentry_user_id=se_users.user_id &&
      se_users.user_level_id=se_levels.level_id &&
      (
        se_historyentries.historyentry_search='1' ||
        se_levels.level_history_search='0'
      ) 
  ";
  
  $sql .= " && MATCH (`historyentry_title`, `historyentry_body`) AGAINST ('{$search_text}' IN BOOLEAN MODE)";
  
  /*
  $sql .= " && (
        historyentry_title LIKE '%$search_text%' ||
        historyentry_body LIKE '%$search_text%'
      )
  ";
  */
  
	// GET TOTAL ENTRIES
  $sql2 = $sql . " LIMIT 201";
  $resource = $database->database_query($sql2);
	$total_entries = $database->database_num_rows($resource);
  
	// IF NOT TOTAL ONLY
	if( $t=="history" )
  {
	  // MAKE history PAGES
	  $start = ($p - 1) * $results_per_page;
	  $limit = $results_per_page+1;
    
	  // SEARCH historyS
    $sql3 = $sql . " ORDER BY historyentry_id DESC LIMIT {$start}, {$limit}";
    $resource = $database->database_query($sql3);
    
	  while( $historyentry_info=$database->database_fetch_assoc($resource) )
    {
	    // CREATE AN OBJECT FOR AUTHOR
	    $profile = new se_user();
	    $profile->user_info['user_id']        = $historyentry_info['user_id'];
	    $profile->user_info['user_username']  = $historyentry_info['user_username'];
	    $profile->user_info['user_photo']     = $historyentry_info['user_photo'];
	    $profile->user_info['user_fname']     = $historyentry_info['user_fname'];
	    $profile->user_info['user_lname']     = $historyentry_info['user_lname'];
	    $profile->user_displayname();
      
	    // IF EMPTY TITLE
	    if( !trim($historyentry_info['historyentry_title']) )
        $historyentry_info['historyentry_title'] = SE_Language::get(589);
      
      $historyentry_info['historyentry_body'] = cleanHTML($historyentry_info['historyentry_body'], '');
      
	    // IF BODY IS LONG
	    if( strlen($historyentry_info['historyentry_body'])>150 )
        $historyentry_info['historyentry_body'] = substr($historyentry_info['historyentry_body'], 0, 147)."...";
      
      $result_url = $url->url_create('history_entry', $historyentry_info['user_username'], $historyentry_info['historyentry_id']);
      $result_name = 1500118;
      $result_desc = 1500119;
      
	    $results[] = array(
        'result_url'    => $result_url,
				'result_icon'   => './images/icons/history_history48.gif',
				'result_name'   => $result_name,
				'result_name_1' => $historyentry_info['historyentry_title'],
				'result_desc'   => $result_desc,
				'result_desc_1' => $url->url_create('profile', $historyentry_info['user_username']),
				'result_desc_2' => $profile->user_displayname,
				'result_desc_3' => $historyentry_info['historyentry_body']
      );
	  }
    
	  // SET TOTAL RESULTS
	  $total_results = $total_entries;
	}

	// SET ARRAY VALUES
	SE_Language::_preload_multi(1500118, 1500119, 1500120);
	if( $total_albums>200 )
    $total_albums = "200+";
  
	$search_objects[] = array(
    'search_type'   => 'history',
    'search_lang'   => 1500120,
    'search_total'  => $total_entries
  );
}

// END search_history() FUNCTION












// THIS FUNCTION IS RUN WHEN A USER IS DELETED
// INPUT: $user_id REPRESENTING THE USER ID OF THE USER BEING DELETED
// OUTPUT: 
function deleteuser_history($user_id) {
	global $database;

	// DELETE history ENTRIES AND COMMENTS
	$database->database_query("DELETE FROM se_historyentries, se_historycomments USING se_historyentries LEFT JOIN se_historycomments ON se_historyentries.historyentry_id=se_historycomments.historycomment_historyentry_id WHERE se_historyentries.historyentry_user_id='$user_id'");

	// DELETE COMMENTS POSTED BY USER
	$database->database_query("DELETE FROM se_historycomments WHERE historycomment_authoruser_id='$user_id'");

	// DELETE STYLE
	$database->database_query("DELETE FROM se_historystyles WHERE historystyle_user_id='$user_id'");

} // END deleteuser_history() FUNCTION









// THIS FUNCTION IS RUN WHEN GENERATING SITE STATISTICS
// INPUT: 
// OUTPUT: 
function site_statistics_history(&$args)
{
  global $database;
  
  $statistics =& $args['statistics'];
  
  // NOTE: CACHING WILL BE HANDLED BY THE FUNCTION THAT CALLS THIS
  
  $total = $database->database_fetch_assoc($database->database_query("SELECT COUNT(historyentry_id) AS total FROM se_historyentries"));
  $statistics['history'] = array(
    'title' => 1500150,
    'stat'  => (int) ( isset($total['total']) ? $total['total'] : 0 )
  );
  
  /*
  $total = $database->database_fetch_assoc($database->database_query("SELECT COUNT(historysubscription_id) AS total FROM se_historysubscriptions"));
  $statistics['historysubscriptions'] = array(
    'title' => 1500151,
    'stat'  => (int) ( isset($total['total']) ? $total['total'] : 0 )
  );
  */
}

// END site_statistics_history() FUNCTION

?>