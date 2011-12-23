<?php

/* $Id: functions_vizitki.php 16 2009-01-13 04:01:31Z john $ */


//
//  THIS FILE CONTAINS vizitki-RELATED FUNCTIONS
//  FUNCTIONS IN THIS CLASS:
//
//    search_vizitki()
//    deleteuser_vizitki()
//    site_statistics_vizitki()
//


defined('SE_PAGE') or exit();










//
// THIS FUNCTION IS RUN DURING THE SEARCH PROCESS TO SEARCH THROUGH vizitki ENTRIES
//
// INPUT:
//
// OUTPUT: 
//

function search_vizitki()
{
	global $database, $url, $results_per_page, $p, $search_text, $t, $search_objects, $results, $total_results;

	// CONSTRUCT QUERY
  $sql = "
    SELECT
      se_vizitkientries.vizitkientry_id,
      se_vizitkientries.vizitkientry_title,
      se_vizitkientries.vizitkientry_body,
      se_users.user_id,
      se_users.user_username,
      se_users.user_photo,
      se_users.user_fname,
      se_users.user_lname
    FROM
      se_vizitkientries,
      se_users,
      se_levels
    WHERE
      se_vizitkientries.vizitkientry_user_id=se_users.user_id &&
      se_users.user_level_id=se_levels.level_id &&
      (
        se_vizitkientries.vizitkientry_search='1' ||
        se_levels.level_vizitki_search='0'
      ) 
  ";
  
  $sql .= " && MATCH (`vizitkientry_title`, `vizitkientry_body`) AGAINST ('{$search_text}' IN BOOLEAN MODE)";
  
  /*
  $sql .= " && (
        vizitkientry_title LIKE '%$search_text%' ||
        vizitkientry_body LIKE '%$search_text%'
      )
  ";
  */
  
	// GET TOTAL ENTRIES
  $sql2 = $sql . " LIMIT 201";
  $resource = $database->database_query($sql2);
	$total_entries = $database->database_num_rows($resource);
  
	// IF NOT TOTAL ONLY
	if( $t=="vizitki" )
  {
	  // MAKE vizitki PAGES
	  $start = ($p - 1) * $results_per_page;
	  $limit = $results_per_page+1;
    
	  // SEARCH vizitkiS
    $sql3 = $sql . " ORDER BY vizitkientry_id DESC LIMIT {$start}, {$limit}";
    $resource = $database->database_query($sql3);
    
	  while( $vizitkientry_info=$database->database_fetch_assoc($resource) )
    {
	    // CREATE AN OBJECT FOR AUTHOR
	    $profile = new se_user();
	    $profile->user_info['user_id']        = $vizitkientry_info['user_id'];
	    $profile->user_info['user_username']  = $vizitkientry_info['user_username'];
	    $profile->user_info['user_photo']     = $vizitkientry_info['user_photo'];
	    $profile->user_info['user_fname']     = $vizitkientry_info['user_fname'];
	    $profile->user_info['user_lname']     = $vizitkientry_info['user_lname'];
	    $profile->user_displayname();
      
	    // IF EMPTY TITLE
	    if( !trim($vizitkientry_info['vizitkientry_title']) )
        $vizitkientry_info['vizitkientry_title'] = SE_Language::get(589);
      
      $vizitkientry_info['vizitkientry_body'] = cleanHTML($vizitkientry_info['vizitkientry_body'], '');
      
	    // IF BODY IS LONG
	    if( strlen($vizitkientry_info['vizitkientry_body'])>150 )
        $vizitkientry_info['vizitkientry_body'] = substr($vizitkientry_info['vizitkientry_body'], 0, 147)."...";
      
      $result_url = $url->url_create('vizitki_entry', $vizitkientry_info['user_username'], $vizitkientry_info['vizitkientry_id']);
      $result_name = 1500118;
      $result_desc = 1500119;
      
	    $results[] = array(
        'result_url'    => $result_url,
				'result_icon'   => './images/icons/vizitki_vizitki48.gif',
				'result_name'   => $result_name,
				'result_name_1' => $vizitkientry_info['vizitkientry_title'],
				'result_desc'   => $result_desc,
				'result_desc_1' => $url->url_create('profile', $vizitkientry_info['user_username']),
				'result_desc_2' => $profile->user_displayname,
				'result_desc_3' => $vizitkientry_info['vizitkientry_body']
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
    'search_type'   => 'vizitki',
    'search_lang'   => 1500120,
    'search_total'  => $total_entries
  );
}

// END search_vizitki() FUNCTION












// THIS FUNCTION IS RUN WHEN A USER IS DELETED
// INPUT: $user_id REPRESENTING THE USER ID OF THE USER BEING DELETED
// OUTPUT: 
function deleteuser_vizitki($user_id) {
	global $database;

	// DELETE vizitki ENTRIES AND COMMENTS
	$database->database_query("DELETE FROM se_vizitkientries, se_vizitkicomments USING se_vizitkientries LEFT JOIN se_vizitkicomments ON se_vizitkientries.vizitkientry_id=se_vizitkicomments.vizitkicomment_vizitkientry_id WHERE se_vizitkientries.vizitkientry_user_id='$user_id'");

	// DELETE COMMENTS POSTED BY USER
	$database->database_query("DELETE FROM se_vizitkicomments WHERE vizitkicomment_authoruser_id='$user_id'");

	// DELETE STYLE
	$database->database_query("DELETE FROM se_vizitkistyles WHERE vizitkistyle_user_id='$user_id'");

} // END deleteuser_vizitki() FUNCTION









// THIS FUNCTION IS RUN WHEN GENERATING SITE STATISTICS
// INPUT: 
// OUTPUT: 
function site_statistics_vizitki(&$args)
{
  global $database;
  
  $statistics =& $args['statistics'];
  
  // NOTE: CACHING WILL BE HANDLED BY THE FUNCTION THAT CALLS THIS
  
  $total = $database->database_fetch_assoc($database->database_query("SELECT COUNT(vizitkientry_id) AS total FROM se_vizitkientries"));
  $statistics['vizitki'] = array(
    'title' => 1500150,
    'stat'  => (int) ( isset($total['total']) ? $total['total'] : 0 )
  );
  
  /*
  $total = $database->database_fetch_assoc($database->database_query("SELECT COUNT(vizitkisubscription_id) AS total FROM se_vizitkisubscriptions"));
  $statistics['vizitkisubscriptions'] = array(
    'title' => 1500151,
    'stat'  => (int) ( isset($total['total']) ? $total['total'] : 0 )
  );
  */
}

// END site_statistics_vizitki() FUNCTION

?>