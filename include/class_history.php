<?php

/* $Id: class_history.php 62 2009-02-18 02:59:27Z john $ */


//
//  THIS CLASS CONTAINS history ENTRY-RELATED METHODS 
//
//  METHODS IN THIS CLASS:
//
//    se_history()
//
//    history_entry_info()
//    history_entry_post()
//    history_entry_delete()
//
//    history_entries_total()
//    history_entries_list()
//    history_entries_delete()
//
//    history_archive_generate()
//    history_categories_generate()
//    
//    history_subscription_create()
//    history_subscription_exists()
//    history_subscription_delete()
//    history_subscription_list()
//    history_subscription_total()
//    history_subscription_entry_list()
//    history_subscription_notification()
//
//    history_Trackback_history_receive()
//    history_Trackback_history_send()
//    history_Trackback_history_total()
//    history_Trackback_history_list()
//    
//    history_category_create()
//    history_category_list()
//


defined('SE_PAGE') or exit();




class se_history
{
	// INITIALIZE VARIABLES
	var $is_error;			// DETERMINES WHETHER THERE IS AN ERROR OR NOT
	var $error_message;		// CONTAINS RELEVANT ERROR MESSAGE

	var $user_id;			// CONTAINS THE USER ID OF THE USER WHOSE history WE ARE EDITING








	//
  // BEGIN METHOD se_history()
  //
  // OVERVIEW:
  //    THIS METHOD SETS INITIAL VARS
  //
	// INPUT:
  //    $user_id  (OPTIONAL) REPRESENTING THE USER ID OF THE USER WHOSE history WE ARE CONCERNED WITH
  //
	// OUTPUT: 
  //    void
  //
  
	function se_history($user_id=NULL)
  {
	  $this->user_id = $user_id;
	}
  
  //
  // END METHOD se_history()
  //







	//
  // BEGIN METHOD history_entry_info()
  //
  // OVERVIEW:
  //    Gets info about a single history entry
  //
	// INPUT:
  //    $historyentry_id   REPRESENTING THE ID OF THE ENTRY
  //
	// OUTPUT:
  //    AN ARRAY OF INFO
  //
  
/*	function history_entry_info($historyentry_id)
  {
    global $database, $user;
    
    if( !is_numeric($historyentry_id) )
      return FALSE;
    
    $sql = "
      SELECT
        se_historyentries.*
    ";
    
    if( !$this->user_id ) $sql .= ",
        se_users.user_id,
        se_users.user_username,
        se_users.user_photo,
        se_users.user_fname,
        se_users.user_lname
    ";
    
    // IF A USER IS LOGGED IN, SEE IF THEY ARE SUBSCRIBED
    if( $user->user_exists ) $sql .= ",
      IF(se_historysubscriptions.historysubscription_id IS NOT NULL, 1, 0) AS is_subscribed
    ";
    
    $sql .= "
      FROM
        se_historyentries
    ";
    
    // IF A USER IS LOGGED IN, SEE IF THEY ARE SUBSCRIBED
    if( $user->user_exists ) $sql .= "
      LEFT JOIN
        se_historysubscriptions
        ON (se_historysubscriptions.historysubscription_user_id='{$user->user_info['user_id']}' && se_historysubscriptions.historysubscription_owner_id=se_historyentries.historyentry_user_id)
    ";
    
    if( !$this->user_id ) $sql .= "
      LEFT JOIN
        se_users
        ON se_users.user_id=se_historyentries.historyentry_user_id
    ";
    
    $sql .= "
      WHERE
        historyentry_id='{$historyentry_id}'
    ";
    
    if( $this->user_id ) $sql .= " &&
        historyentry_user_id='{$this->user_id}'
    ";
    
    $sql .= "
      LIMIT
        1
    ";
    
    $resource = $database->database_query($sql);
    
    if( !$database->database_num_rows($resource) )
      return FALSE;
    
    // PREPARE THE DATA
    $historyentry_info = $database->database_fetch_assoc($resource);
    //$historyentry_info['history_Trackback_historys'] = split("\n", $historyentry_info['history_Trackback_historys']);
    
    return $historyentry_info;
	}
 *
 */
  
  //
  // END METHOD history_entry_info()
  //

function history_entry_info($historyentry_id)
  {
    global $database, $user;

    if( !is_numeric($historyentry_id) )
      return FALSE;

    $sql = "
      SELECT
        se_historyentries.*
    ";

    if( !$this->user_id ) $sql .= ",
        se_users.user_id,
        se_users.user_username,
        se_users.user_photo,
        se_users.user_fname,
        se_users.user_lname
    ";

    // IF A USER IS LOGGED IN, SEE IF THEY ARE SUBSCRIBED
    if( $user->user_exists ) $sql .= ",
      IF(se_historysubscriptions.historysubscription_id IS NOT NULL, 1, 0) AS is_subscribed
    ";

    $sql .= "
      FROM
        se_historyentries
    ";

    // IF A USER IS LOGGED IN, SEE IF THEY ARE SUBSCRIBED
    if( $user->user_exists ) $sql .= "
      LEFT JOIN
        se_historysubscriptions
        ON (se_historysubscriptions.historysubscription_user_id='{$user->user_info['user_id']}' && se_historysubscriptions.historysubscription_owner_id=se_historyentries.historyentry_user_id)
    ";

    if( !$this->user_id ) $sql .= "
      LEFT JOIN
        se_users
        ON se_users.user_id=se_historyentries.historyentry_user_id
    ";

    $sql .= "
      WHERE
        historyentry_id='{$historyentry_id}'
    ";

    if( $this->user_id ) $sql .= " &&
        historyentry_user_id='{$this->user_id}'
    ";

    $sql .= "
      LIMIT
        1
    ";

    $resource = $database->database_query($sql);

    if( !$database->database_num_rows($resource) )
      return FALSE;

    // PREPARE THE DATA
    $historyentry_info = $database->database_fetch_assoc($resource);
    //$historyentry_info['history_Trackback_historys'] = split("\n", $historyentry_info['history_Trackback_historys']);

    return $historyentry_info;
	}






	//
  // BEGIN METHOD history_entries_total()
  //
  // OVERVIEW:
  //    THIS METHOD RETURNS THE TOTAL NUMBER OF ENTRIES
  //
	// INPUT:
  //    $where  (OPTIONAL) REPRESENTING ADDITIONAL THINGS TO INCLUDE IN THE WHERE CLAUSE
  //
	// OUTPUT:
  //    AN INTEGER REPRESENTING THE NUMBER OF ENTRIES
  //
  
	function history_entries_total($where = "",$tree_id)
  {
	  global $database;
    
	  // BEGIN ENTRY QUERY
	  $sql = "
      SELECT
        NULL
      FROM
        se_historyentries
    ";
    
	  // IF NO USER ID SPECIFIED, JOIN TO USER TABLE

    
	  // ADD WHERE IF NECESSARY
	  if( !empty($where) || $this->user_id ) $sql .= "
      WHERE
    ";
    
	  // ENSURE USER ID IS NOT EMPTY
	  if( $this->user_id ) $sql .= "
       historyentry_historyentrycat_id 	='{$tree_id}'
    ";
    
	  // INSERT AND IF NECESSARY
	  if( $this->user_id && !empty($where) ) $sql .= " AND";
    
	  // ADD WHERE CLAUSE, IF NECESSARY
	  if( !empty($where) ) $sql .= "
        $where
    ";
    
	  // GET AND RETURN TOTAL history ENTRIES
    $resource = $database->database_query($sql);
	  return $database->database_num_rows($resource);
	}
  
  //
  // END METHOD history_entries_total()
  //







  //
  // BEGIN METHOD history_entries_list()
  //
  // OVERVIEW:
	//    THIS METHOD RETURNS AN ARRAY OF history ENTRIES
  //
	// INPUT:
  //    $start    REPRESENTING THE ENTRY TO START WITH
	//	  $limit    REPRESENTING THE NUMBER OF ENTRIES TO RETURN
	//	  $sort_by  (OPTIONAL) REPRESENTING THE ORDER BY CLAUSE
	//	  $where    (OPTIONAL) REPRESENTING ADDITIONAL THINGS TO INCLUDE IN THE WHERE CLAUSE
  //
	// OUTPUT:
  //    AN ARRAY OF history ENTRIES
  //
  
	function history_entries_list($start, $limit, $sort_by = "historyentry_date DESC", $where=NULL,$id_tree)
  {
	  global $database, $user, $owner;
    
	  // BEGIN QUERY
/*	  $sql = "
      SELECT
        se_historyentries.*,
       / se_historyentrycats.*
    ";
  */

    $sql = "
      SELECT
        se_historyentries.*
    ";
    // IF A USER IS LOGGED IN, SEE IF THEY ARE SUBSCRIBED
    if( $user->user_exists ) $sql .= ",
        (SELECT TRUE FROM se_historysubscriptions WHERE se_historyentries.historyentry_historyentrycat_id='{$id_tree}' LIMIT 1) AS is_subscribed
    ";
    
	  // IF NO USER ID SPECIFIED, RETRIEVE USER INFORMATION
	  if( !$this->user_id ) $sql .= ",
        se_users.user_id,
        se_users.user_username,
        se_users.user_photo,
        se_users.user_fname,
        se_users.user_lname
    ";
    
	  // CONTINUE QUERY
	  $sql .= "
      FROM
        se_historyentries
      LEFT JOIN
        se_historyentrycats
        ON se_historyentries.historyentry_historyentrycat_id='{$id_tree}'
    ";
  
	  // IF NO USER ID SPECIFIED, JOIN TO USER TABLE
	  if( !$this->user_id ) $sql .= "
      LEFT JOIN
        se_users
        ON se_historyentries.historyentry_historyentrycat_id='{$id_tree}'";
    
    
	  // ADD WHERE IF NECESSARY
	  if( !empty($where) || $this->user_id ) $sql .= "
      WHERE
    ";
    
	  // ENSURE USER ID IS NOT EMPTY
	  if( $this->user_id ) {
              
              $sql .= "historyentry_historyentrycat_id='{$id_tree}'";

              }
    
	  // INSERT AND IF NECESSARY
	  if( $this->user_id && !empty($where) ) $sql .= " AND";
    
	  // ADD WHERE CLAUSE, IF NECESSARY
	  if( !empty($where) ) $sql .= "
        $where
    ";
    
	  // ADD ORDER, AND LIMIT CLAUSE
    
	  $sql .= "
      ORDER BY
        $sort_by
      LIMIT
        $start, $limit
    ";
    
	  // RUN QUERY
    $resource = $database->database_query($sql);
    
	  // GET history ENTRIES INTO AN ARRAY
	  $historyentry_array = Array();
	  while( $historyentry_info=$database->database_fetch_assoc($resource) )
    {

        
      // Check title
      if( !trim($historyentry_info['historyentry_title']) )
      {
        SE_Language::_preload(1500015);
        SE_Language::load();
        $historyentry_info['historyentry_title'] = SE_Language::_get(1500015);
      }
      
      // Load category title
      if( !empty($historyentry_info['historyentrycat_languagevar_id']) )
      {
        SE_Language::_preload($historyentry_info['historyentrycat_languagevar_id']);
      }
      
	    // CONVERT HTML CHARACTERS BACK
	    $historyentry_info['historyentry_body'] = str_replace("\r\n", "", htmlspecialchars_decode($historyentry_info['historyentry_body'], ENT_QUOTES));
	    
	    // IF NO USER ID SPECIFIED, CREATE OBJECT FOR AUTHOR
	    if( !$this->user_id )
      {
               
	      $author = new se_user();
	      $author->user_exists = TRUE;
	      $author->user_info['user_id']       = $historyentry_info['user_id'];
	      $author->user_info['user_username'] = $historyentry_info['user_username'];
	      $author->user_info['user_photo']    = $historyentry_info['user_photo'];
	      $author->user_info['user_fname']    = $historyentry_info['user_fname'];
	      $author->user_info['user_lname']    = $historyentry_info['user_lname'];
	      $author->user_displayname();
        
        $historyentry_info['historyentry_author'] =& $author;
        unset($author);
	    }
      
	    // OTHERWISE, SET AUTHOR TO OWNER/LOGGED-IN USER
      elseif( $owner->user_exists && $owner->user_info['user_id']==$historyentry_info['historyentry_user_id'] )
      {
         
	      $historyentry_info['historyentry_author'] =& $owner;
	    }
      elseif( $user->user_exists  )
      {
         
	      $historyentry_info['historyentry_author'] =& $user;
	    }
      
	    // GET ENTRY COMMENT PRIVACY
      // TODO: FIND A WAY TO MAKE THIS WORK WITH THE AUTHOR
	    $allowed_to_comment = TRUE;
	    if( $owner->user_exists )
      {
	      $comment_level = $owner->user_privacy_max($user, $owner->level_info['level_history_comments']);
	    }
      $historyentry_info['allowed_to_comment'] = $allowed_to_comment;
      
      
      // GET CATEGORY TITLE
      //$historyentry_info['historyentry_historyentrycat_title'] = $historyentry_info['historyentrycat_title'];
      //unset($historyentry_info['historyentrycat_title']);
      
      
	    // SET historyENTRY ARRAY
	    $historyentry_array[] = $historyentry_info;
	  }
    
	  // RETURN ARRAY
         // print_r ($historyentry_array);
	  return $historyentry_array;
	}
  
  //
  // END METHOD history_entries_list()
  //








  //
  // BEGIN METHOD history_entries_delete()
  //
  // OVERVIEW:
  //    THIS METHOD DELETES SELECTED history ENTRIES
  //
	// INPUT:
  //    $start REPRESENTING THE ENTRY TO START WITH
	//	  $limit REPRESENTING THE NUMBER OF ENTRIES TO RETURN
	//	  $sort_by (OPTIONAL) REPRESENTING THE ORDER BY CLAUSE
	//	  $where (OPTIONAL) REPRESENTING ADDITIONAL THINGS TO INCLUDE IN THE WHERE CLAUSE
  //
	// OUTPUT:
  //    void
  //
  
	function history_entries_delete($start, $limit, $sort_by = "historyentry_date DESC", $where = "") {
	  global $database;
    
	  // BEGIN QUERY
	  $historyentry_query = "SELECT historyentry_id FROM se_historyentries";
    
	  // ADD WHERE IF NECESSARY
	  if($where != "" | $this->user_id != 0) { $historyentry_query .= " WHERE"; }
    
	  // ENSURE USER ID IS NOT EMPTY
	  if($this->user_id != 0) { $historyentry_query .= " historyentry_user_id='{$this->user_id}'"; }
    
	  // INSERT AND IF NECESSARY
	  if($this->user_id != 0 & $where != "") { $historyentry_query .= " AND"; }
    
	  if( $where ) { $historyentry_query .= " $where"; }
    
	  // ADD ORDER, AND LIMIT CLAUSE
	  $historyentry_query .= " ORDER BY $sort_by LIMIT $start, $limit";
    
	  // RUN QUERY
	  $historyentries = $database->database_query($historyentry_query);
    
	  // GET history ENTRIES INTO AN ARRAY
	  $historyentry_delete = "";
	  while($historyentry_info = $database->database_fetch_assoc($historyentries)) {
	    $var = "delete_historyentry_".$historyentry_info['historyentry_id'];
	    if($_POST[$var] == 1) { 
	      if($historyentry_delete != "") { $historyentry_delete .= " OR "; }
	      $historyentry_delete .= "historyentry_id='{$historyentry_info['historyentry_id']}'";
	    }
	  }
    
	  // IF DELETE CLAUSE IS NOT EMPTY, DELETE ENTRIES
	  if($historyentry_delete != "") { 
	    $delete_query = "DELETE FROM se_historyentries, se_historycomments USING se_historyentries LEFT JOIN se_historycomments ON se_historyentries.historyentry_id=se_historycomments.historycomment_historyentry_id WHERE ";
	    if($this->user_id != 0) { $delete_query .= "se_historyentries.historyentry_user_id='{$this->user_id}' AND "; }
	    $delete_query .= "($historyentry_delete)";
	    $database->database_query($delete_query); 
	  }
	}
  
  //
  // END METHOD history_entries_delete()
  //








	// 
  // BEGIN METHOD history_entry_post()
  //
  // OVERVIEW:
  //    This methods posts or edits an entry.
  //
	// INPUT:
  //    $historyentry_id               REPRESENTING THE ID OF THE history ENTRY TO EDIT. IF NO ENTRY WITH THIS ID IS FOUND, A NEW ENTRY WILL BE ADDED
	//	  $historyentry_title            REPRESENTING THE TITLE OF THE history ENTRY
	//	  $historyentry_body             REPRESENTING THE BODY OF THE history ENTRY
	//	  $historyentry_historyentrycat_id  REPRESENTING THE ID OF THE SELECTED history ENTRY CATEGORY
	//	  $historyentry_search           REPRESENTING WHETHER THE history ENTRY SHOULD BE INCLUDED IN SEARCH RESULTS
	//	  $historyentry_privacy          REPRESENTING THE PRIVACY LEVEL OF THE ENTRY
	//	  $historyentry_comments         REPRESENTING WHO CAN COMMENT ON THE ENTRY
	//	  $historyentry_trackbacks       REPRESENTING THE URLS TO SEND Trackback_history DATA TO
  //
	// OUTPUT:
  //    returns FALSE or the history entry id
  //
  
	function history_entry_post($historyentry_id=NULL, $historyentry_title, $historyentry_body, $historyentry_historyentrycat_id=NULL, $historyentry_search=NULL, $historyentry_privacy=NULL, $historyentry_comments=NULL, $historyentry_trackbacks=NULL)
  {
	  global $database, $user;
    
    $is_error = FALSE;
    
	  // GET SETTINGS
	  $level_history_privacy   = unserialize($user->level_info['level_history_privacy']);
	  $level_history_comments  = unserialize($user->level_info['level_history_comments']);
    
    // PREPARE VARS
	//  $historyentry_user_id    = $this->user_id;
	  $historyentry_date       = time();
    $historyentry_title      = censor(trim($historyentry_title));
    
    // Input filter class seems to be doing the decoding, don't decode it twice (not good for posting a history about HTML)
    //$historyentry_body         = censor(htmlspecialchars_decode($historyentry_body, ENT_QUOTES));
    
    $historyentry_body         = cleanHTML($historyentry_body, $user->level_info['level_history_html']);
    $historyentry_body         = censor($historyentry_body);
    $historyentry_body         = htmlspecialchars($historyentry_body, ENT_QUOTES, 'UTF-8');
    
    // OLD HTML ALLOWED: strong,b,em,i,u,strike,sub,sup,p,div,pre,address,h1,h2,h3,h4,h5,h6,span,ol,li,ul,a,img,embed
    
//	  if( !$historyentry_historyentrycat_id )
  //    $historyentry_historyentrycat_id = 0;
    
 //   if( is_string($historyentry_trackbacks) )
//      $historyentry_trackbacks = preg_split('/[\s\r\n]/', $historyentry_trackbacks);
    
 //   if( !is_array($historyentry_trackbacks) || empty($historyentry_trackbacks) )
 //     $historyentry_trackbacks = array();
    
	  if( !in_array($historyentry_privacy, $level_history_privacy) )
      $historyentry_privacy = $level_history_privacy[0];
    
//	  if( !in_array($historyentry_comments, $level_history_comments) )
  //    $historyentry_comments = $level_history_comments[0];
    
    
    // VALIDATE
//    if( empty($historyentry_user_id) )
  //    $is_error = TRUE;
    
    if( empty($historyentry_title) )
      $is_error = TRUE;
    
    
    // VALIDATE ID
    if( !empty($historyentry_id) )
    {
      $sql = "SELECT NULL FROM se_historyentries WHERE historyentry_id='{$historyentry_id}'";
      $resource = $database->database_query($sql);
      
      if( !$database->database_num_rows($resource) )
        $is_error = TRUE;
    }
    echo $is_error;
	  // UPDATE
    if( !$is_error && !empty($historyentry_id) )
    {
      $sql = "
        UPDATE
          se_historyentries
        SET
          historyentry_title='$historyentry_title',
          historyentry_body='$historyentry_body',
      
          historyentry_search='$historyentry_search',
          historyentry_privacy='$historyentry_privacy',
          historyentry_comments='$historyentry_comments'
        WHERE
          historyentry_id='$historyentry_id'
      ";
      
      $resource = $database->database_query($sql);
	  }
    
    // INSERT
    elseif( !$is_error )
    {

      $sql = "SELECT tree_id FROM se_tree_users WHERE user_id='{$user->user_info['user_id']}'";
      $resource = $database->database_query($sql);
      $treeid=$database->database_fetch_assoc($resource);
      $historyentry_historyentrycat_id = $treeid['tree_id'];

   //   $sql = "SELECT *  FROM se_historyentries WHERE historyentry_historyentrycat_id='{$historyentry_historyentrycat_id}'";
    //  $resource = $database->database_query($sql);
    //  $historyentries =$database->database_fetch_assoc($resource);
      $sql = "
        INSERT INTO se_historyentries
        (
          historyentry_user_id,
          historyentry_historyentrycat_id,
          historyentry_date,
          historyentry_title,
          historyentry_body,
          historyentry_search,
          historyentry_privacy,
          historyentry_comments,
          historyentry_trackbacks
        )
        VALUES
        (
          '$historyentry_user_id',
          '$historyentry_historyentrycat_id',
          '$historyentry_date',
          '$historyentry_title',
          '$historyentry_body',
          '$historyentry_search',
          '$historyentry_privacy',
          '$historyentry_comments',
          '".join("\n", $historyentry_trackbacks)."'
        )
      ";
      
      $resource = $database->database_query($sql);
      
      if( $database->database_affected_rows($resource) )
        $historyentry_id = $database->database_insert_id();
      else
        $is_error = TRUE;
	  }
    
    
    // Trackback_historyS
    $Trackback_history_results = array();
    if( !$is_error && is_array($historyentry_trackbacks) && !empty($historyentry_trackbacks) )
    {
      $this->history_Trackback_history_send($historyentry_trackbacks, $historyentry_id, $historyentry_title, $historyentry_body);
    }
    
    
    // SUBSCRIPTION NOTIFICATION
    if( !$is_error )
    {
      $this->history_subscription_notification($historyentry_id, $historyentry_title, $historyentry_privacy);
    }
    
  
    return array(
      'result' => !$is_error,
      'error' => $is_error,
      'historyentry_id' => $historyentry_id,
      'Trackback_history_results' => $Trackback_history_results
    );
	}
  
  //
  // END METHOD history_entry_post()
  //



    function history_udate_time($historyentry_historyentrycat_id,$name)
    {
            	  // UPDATE
           // echo$name;
    if( !empty($historyentry_historyentrycat_id))
    {
        global $database, $user;
         $time_up = time();
         $name = (string ) $name;
      $sql = "
        UPDATE
          se_historyentries
        SET
            historyentry_date= '$time_up',
            historyentry_user_id='{$this->user_id}',
            historyentry_trackbacks='$name'
        WHERE
           historyentry_historyentrycat_id='$historyentry_historyentrycat_id'";

      $resource = $database->database_query($sql);
	  }

        }

   function history_user_null($historyentry_historyentrycat_id)
  {
       if( !empty($historyentry_historyentrycat_id))
        {
     //  echo $historyentry_historyentrycat_id;
            global $database;
            $s = -1;
         $sql = "
            UPDATE
              se_historyentries
            SET
                historyentry_user_id='-1'
            WHERE
               historyentry_historyentrycat_id='$historyentry_historyentrycat_id'";
          $resource = $database->database_query($sql);
         }

        }


  //
  // BEGIN METHOD history_entry_delete()
  //
  // OVERVIEW:
	//    Deletes entries
  //
	// INPUT:
  //    $historyentry_id       REPRESENTING THE ID OF THE history ENTRY TO DELETE, OR AN ARRAY OF IDS
  //
	// OUTPUT:
  //    Return whether or not the entrie(s) was(were) deleted
  //
  
	function history_entry_delete($historyentry_id)
  {
	  global $database;
    
    if( !is_array($historyentry_id) )
      $historyentry_id = array($historyentry_id);
    
    $historyentry_id = array_unique(array_filter($historyentry_id));
    
	  // CREATE DELETE QUERY
	  $sql = "
      DELETE FROM
        se_historyentries,
        se_historycomments
      USING
        se_historyentries
      LEFT JOIN
        se_historycomments
        ON se_historyentries.historyentry_id=se_historycomments.historycomment_historyentry_id
      WHERE
        se_historyentries.historyentry_id IN('".join("','", $historyentry_id)."')
    ";
    
	  // IF USER ID IS NOT EMPTY, ADD USER ID CLAUSE
	  if( $this->user_id ) 
      $sql .= " AND se_historyentries.historyentry_user_id='{$this->user_id}'";
    
	  // RUN QUERY
    $resource = $database->database_query($sql);
    
    return (bool) ($database->database_affected_rows($resource)==count($historyentry_id) );
	}
  
  //
  // END METHOD history_entry_delete()
  //
  
  
  
  
  
  
  
  //
  // BEGIN METHOD history_archive_generate()
  //
  // OVERVIEW:
	//    Generates a list of dates using the current user's history entries for an archive list.
  //
	// INPUT:
  //    $where
  //
	// OUTPUT:
  //    An array of data about each date, including a label, start and end periods
  //
  
  function history_archive_generate($where=NULL)
  {
    global $database;
    
    $sql = "
      SELECT
        historyentry_date
      FROM
        se_historyentries
      WHERE
        historyentry_user_id='{$this->user_id}'
    ";
    
    if( $where ) $sql .= " &&
        $where
    ";
    
    $sql .= "
      ORDER BY
        historyentry_date DESC
    ";
    
    $resource = $database->database_query($sql);
    
    // GET DATES
    $history_dates = array();
    while( $result=$database->database_fetch_assoc($resource) )
      $history_dates[] = $result['historyentry_date'];
    
    // GEN ARCHIVE LIST
    $time = time();
    $archive_list = array();
    
    foreach( $history_dates as $history_date )
    {
      $ltime = localtime($history_date, TRUE);
      $ltime["tm_mon"] = $ltime["tm_mon"] + 1;
      $ltime["tm_year"] = $ltime["tm_year"] + 1900;
      
      // LESS THAN A YEAR AGO - MONTHS
      if( $history_date+31536000>$time )
      {
        $date_start = mktime(0, 0, 0, $ltime["tm_mon"], 1, $ltime["tm_year"]);
        $date_end = mktime(0, 0, 0, $ltime["tm_mon"]+1, 1, $ltime["tm_year"]);
        $label = date('F Y', $history_date);
        $type = 'month';
      }
      
      // MORE THAN A YEAR AGO - YEARS
      else
      {
        $date_start = mktime(0, 0, 0, 1, 1, $ltime["tm_year"]);
        $date_end = mktime(0, 0, 0, 1, 1, $ltime["tm_year"]+1);
        $label = date('Y', $history_date);
        $type = 'year';
      }
      
      if( !isset($archive_list[$date_start]) )
      {
        $archive_list[$date_start] = array(
          'type' => $type,
          'label' => $label,
          'date_start' => $date_start,
          'date_end' => $date_end,
          'count' => 1
        );
      }
      else
      {
        $archive_list[$date_start]['count']++;
      }
    }
    
    //krsort($archive_list);
    
    return $archive_list;
  }
  
  //
  // END METHOD history_archive_generate()
  //
  
  
  
  
  
  
  
  //
  // BEGIN METHOD history_categories_generate()
  //
  // OVERVIEW:
	//    Generates a list of categories using the current user's history entries for a category list.
  //
	// INPUT:
  //    $where
  //
	// OUTPUT:
  //    An array of data about each category, including a title and ID
  //
  
  function history_categories_generate($where=NULL)
  {
    global $database;
    
    $sql = "
      SELECT
        COUNT(*) AS historyentry_count,
        se_historyentries.historyentry_historyentrycat_id,
        se_historyentrycats.*
      FROM
        se_historyentries
      LEFT JOIN
        se_historyentrycats
        ON se_historyentrycats.historyentrycat_id=se_historyentries.historyentry_historyentrycat_id
      WHERE
        se_historyentries.historyentry_user_id='{$this->user_id}' &&
        (se_historyentries.historyentry_historyentrycat_id=0 || se_historyentrycats.historyentrycat_user_id=0 || se_historyentrycats.historyentrycat_user_id='{$this->user_id}')
    ";
    
    if( $where ) $sql .= " &&
        $where
    ";
    
    $sql .= "
      GROUP BY
        se_historyentries.historyentry_historyentrycat_id
      ORDER BY
        se_historyentries.historyentry_historyentrycat_id ASC
    ";
    
    $resource = $database->database_query($sql);
    
    $history_cats = array();
    while( $result=$database->database_fetch_assoc($resource) )
    {
      if( empty($result['historyentrycat_id']) )
      {
        $result['historyentrycat_id'] = 0;
        $result['historyentrycat_title'] = SE_Language::get(1500035);
      }
      
      if( !empty($result['historyentrycat_languagevar_id']) )
        SE_Language::_preload($result['historyentrycat_languagevar_id']);
      
      $history_cats[] = $result;
    }
    
    return $history_cats;
  }
  
  //
  // END METHOD history_categories_generate()
  //
  
  
  
  
  
  
  
  //
  // BEGIN METHOD history_subscription_create()
  //
  // OVERVIEW:
	//    Subscribes the current user to the specified user's history
  //
	// INPUT:
  //    $history_owner_user_id   The user id of the owner of the history to subscribe to
  //
	// OUTPUT:
  //    TRUE if the subscription was create, otherwise FALSE
  //
  
  function history_subscription_create($history_owner_user_id)
  {
    global $database, $user;
    
    // MUST BE LOGGED IN
    if( !$user->user_exists || !$user->user_info['user_id'] )
      return FALSE;
    
    // CHECK FOR EXISTING SUBSCRIPTION
    $sql = "
      SELECT
        NULL
      FROM
        se_historysubscriptions
      WHERE
        historysubscription_user_id='{$user->user_info['user_id']}' &&
        historysubscription_owner_id='{$history_owner_user_id}'
      LIMIT
        1
    ";
    
    $resource = $database->database_query($sql);
    
    // Already subscribed
    if( $database->database_num_rows($resource) )
      return FALSE;
    
    // Insert
    $time = time();
    
    $sql = "
      INSERT INTO se_historysubscriptions (
        historysubscription_user_id,
        historysubscription_owner_id,
        historysubscription_date
      ) VALUES (
        '{$user->user_info['user_id']}',
        '{$history_owner_user_id}',
        '{$time}'
      )
    ";
    
    $resource = $database->database_query($sql);
    
    return ( $database->database_affected_rows($resource) ? $database->database_insert_id() : FALSE );
  }
  
  //
  // END METHOD history_subscription_create()
  //
  
  
  
  
  
  
  
  //
  // BEGIN METHOD history_subscription_exists()
  //
  // OVERVIEW:
	//    Does the specified subscription exist
  //
	// INPUT:
  //    $history_owner_user_id         The user id of the owner
  //    $history_subscriber_user_id    The user id of the subscriber
  //
	// OUTPUT:
  //    TRUE if the subscription exists, otherwise FALSE
  //
  
  function history_subscription_exists($history_owner_user_id, $history_subscriber_user_id)
  {
    global $database, $user;
    
    // MUST BE LOGGED IN AND NOT SELF
    if( !$history_subscriber_user_id || !$history_owner_user_id || $history_owner_user_id==$history_subscriber_user_id )
      return FALSE;
    
    // CHECK FOR EXISTING SUBSCRIPTION
    $sql = "
      SELECT
        NULL
      FROM
        se_historysubscriptions
      WHERE
        historysubscription_user_id='{$history_subscriber_user_id}' &&
        historysubscription_owner_id='{$history_owner_user_id}'
      LIMIT
        1
    ";
    
    $resource = $database->database_query($sql);
    
    return (bool) $database->database_num_rows($resource);
  }
  
  //
  // END METHOD history_subscription_exists()
  //
  
  
  
  
  
  
  
  //
  // BEGIN METHOD history_subscription_delete()
  //
  // OVERVIEW:
	//    Unsubscribes the current user from the specified user's history
  //
	// INPUT:
  //    $history_owner_user_id   The user id of the owner of the history to unsubscribe from
  //
	// OUTPUT:
  //    TRUE if the subscription was deleted, otherwise FALSE
  //
  
  function history_subscription_delete($history_owner_user_id)
  {
    global $database, $user;
    
    // MUST BE LOGGED IN
    if( !$user->user_exists || !$user->user_info['user_id'] )
      return FALSE;
    
    // DELETE
    $sql = "
      DELETE FROM
        se_historysubscriptions
      WHERE
        historysubscription_user_id='{$user->user_info['user_id']}' &&
        historysubscription_owner_id='{$history_owner_user_id}'
      LIMIT
        1
    ";
    
    $resource = $database->database_query($sql);
    
    return (bool) $database->database_affected_rows($resource);
  }
  
  //
  // END METHOD history_subscription_delete()
  //
  
  
  
  
  
  
  
  //
  // BEGIN METHOD history_subscription_total()
  //
  // OVERVIEW:
	//    Count of history subscriptions
  //
	// INPUT:
  //    $where      SQL WHERE
  //
	// OUTPUT:
  //    Count of history subscriptions
  //
  
  function history_subscription_total($where=NULL)
  {
    global $database, $user;
    
    // Generate query
    $sql = "
      SELECT
        COUNT(*) AS historysubscription_count
      FROM
        se_historysubscriptions
      WHERE
        se_historysubscriptions.historysubscription_user_id='{$user->user_info['user_id']}'
    ";
    
    if( !empty($where) )
      $sql .= " && $where";
    
    $resource = $database->database_query($sql);
    $result = $database->database_fetch_assoc($resource);
    
    return ( !empty($result['historysubscription_count']) ? $result['historysubscription_count'] : 0 );
  }
  
  //
  // END METHOD history_subscription_total()
  //
  
  
  
  
  
  
  
  //
  // BEGIN METHOD history_subscription_list()
  //
  // OVERVIEW:
	//    Lists history subscriptions
  //
	// INPUT:
  //    $start                SQL START
  //    $limit                SQL LIMIT
  //    $order_by             SQL ORDER BY
  //    $where                SQL WHERE
  //    $getmostrecententry   SQL WHERE
  //
	// OUTPUT:
  //    Array of history subscriptions
  //
  
  function history_subscription_list($start=NULL, $limit=NULL, $order_by=NULL, $where=NULL, $getmostrecententry=FALSE)
  {
    global $database, $user;
    
    if( !$start           ) $start = '0';
    if( !isset($limit)    ) $limit = 20;
    if( empty($order_by)  ) $order_by = "se_historysubscriptions.historysubscription_date DESC";
    
    // Generate query
    $sql = "
      SELECT
        se_historysubscriptions.*,
        se_users.user_id,
        se_users.user_username,
        se_users.user_photo,
        se_users.user_fname,
        se_users.user_lname
    ";
    
    if( $getmostrecententry ) $sql .= ",
        se_historyentries.*
    ";
    
    $sql .= "
      FROM
        se_historysubscriptions
      LEFT JOIN
        se_users
        ON se_users.user_id=se_historysubscriptions.historysubscription_owner_id
    ";
    
    if( $getmostrecententry ) $sql .= "
      LEFT JOIN
        se_historyentries
        ON (
          se_historyentries.historyentry_user_id=se_historysubscriptions.historysubscription_owner_id &&
          se_historyentries.historyentry_id=(
            SELECT
              se_historyentries.historyentry_id
            FROM
              se_historyentries
            WHERE
              (se_historyentries.historyentry_search IS NULL || se_historyentries.historyentry_search=1) && 
              se_historyentries.historyentry_user_id=se_historysubscriptions.historysubscription_owner_id
            ORDER BY
              se_historyentries.historyentry_date DESC
            LIMIT
              1
          )
        )
    ";
    
    $sql .= "
      WHERE
        se_historysubscriptions.historysubscription_user_id='{$user->user_info['user_id']}'
    ";
    
    if( !empty($where) )
      $sql .= " && $where";
    
    if( $getmostrecententry ) $sql .= "
      GROUP BY
        se_historysubscriptions.historysubscription_owner_id
    ";
    
    $sql .= "
      ORDER BY
        $order_by
    ";
    
    $sql .= "
      LIMIT
        {$start}, {$limit}
    ";
    
    $resource = $database->database_query($sql);
    
    // Get results
    $historysubscription_list = array();
    
    while( $result=$database->database_fetch_assoc($resource) )
    {
      // Create history entry author object
      $author = new se_user();
      $author->user_info['user_id'] = $result['user_id'];
      $author->user_info['user_username'] = $result['user_username'];
      $author->user_info['user_photo'] = $result['user_photo'];
      $author->user_info['user_fname'] = $result['user_fname'];
      $author->user_info['user_lname'] = $result['user_lname'];
      $author->user_displayname();
      $result['history_author'] =& $author;
      unset($author);
      
      $historysubscription_list[] = $result;
    }
    
    return $historysubscription_list;
  }
  
  //
  // END METHOD history_subscription_list()
  //
  
  
  
  
  
  
  
  //
  // BEGIN METHOD history_subscription_entry_list()
  //
  // OVERVIEW:
	//    Lists recent historys from the specified user's subscriptions
  //
	// INPUT:
  //    $start      SQL START
  //    $limit      SQL LIMIT
  //    $order_by   SQL ORDER BY
  //    $where      SQL WHERE
  //
	// OUTPUT:
  //    Array of historyentries
  //
  
  function history_subscription_entry_list($start=NULL, $limit=NULL, $order_by=NULL, $where=NULL)
  {
    global $database, $user;
    
    if( !$start         ) $start = '0';
    if( !isset($limit)  ) $limit = 20;
    
    // Generate query
    $sql = "
      SELECT
        se_historyentries.*,
        se_historyentrycats.*,
        se_users.user_id,
        se_users.user_username,
        se_users.user_photo,
        se_users.user_fname,
        se_users.user_lname
      FROM
        se_historysubscriptions
      LEFT JOIN
        se_historyentries
        ON se_historyentries.historyentry_user_id=se_historysubscriptions.historysubscription_owner_id
      LEFT JOIN
        se_historyentrycats
        ON se_historyentrycats.historyentrycat_id=se_historyentries.historyentry_historyentrycat_id
      LEFT JOIN
        se_users
        ON se_user.user_id=se_historysubscriptions.historysubscription_owner_id
    ";
    
    $sql .= "
      WHERE
        se_historysubscriptions.historysubscription_user_id='{$user->user_info['user_id']}' &&
        CASE
          WHEN se_historyentries.historyentry_user_id='{$user->user_info['user_id']}'
            THEN TRUE
          WHEN ((se_historyentries.historyentry_privacy & @SE_PRIVACY_REGISTERED) AND '{$user->user_exists}'<>0)
            THEN TRUE
          WHEN ((se_historyentries.historyentry_privacy & @SE_PRIVACY_ANONYMOUS) AND '{$user->user_exists}'=0)
            THEN TRUE
          WHEN ((se_historyentries.historyentry_privacy & @SE_PRIVACY_FRIEND) AND (SELECT TRUE FROM se_friends WHERE friend_user_id1=se_historyentries.historyentry_user_id AND friend_user_id2='{$user->user_info['user_id']}' AND friend_status='1' LIMIT 1))
            THEN TRUE
          WHEN ((se_historyentries.historyentry_privacy & @SE_PRIVACY_SUBNET) AND '{$user->user_exists}'<>0 AND (SELECT TRUE FROM se_users WHERE user_id=se_historyentries.historyentry_user_id AND user_subnet_id='{$user->user_info['user_subnet_id']}' LIMIT 1))
            THEN TRUE
          WHEN ((se_historyentries.historyentry_privacy & @SE_PRIVACY_FRIEND2) AND (SELECT TRUE FROM se_friends AS friends_primary LEFT JOIN se_users ON friends_primary.friend_user_id1=se_users.user_id LEFT JOIN se_friends AS friends_secondary ON friends_primary.friend_user_id2=friends_secondary.friend_user_id1 WHERE friends_primary.friend_user_id1=se_historyentries.historyentry_user_id AND friends_secondary.friend_user_id2='{$user->user_info['user_id']}' AND se_users.user_subnet_id='{$user->user_info['user_subnet_id']}' LIMIT 1))
            THEN TRUE
          ELSE FALSE
        END
    ";
    
    if( !empty($where) )
      $sql .= " && $where";
    
    if( !empty($order_by) ) $sql .= "
      ORDER BY
        $order_by
    ";
    
    $sql .= "
      LIMIT
        {$start}, {$limit}
    ";
    
    $resource = $database->database_query($sql);
    
    // Get results
    $historyentry_list = array();
    
    while( $result=$database->database_fetch_assoc($resource) )
    {
      // Create history entry author object
      $author = new se_user();
      $author->user_info['user_id'] = $result['user_id'];
      $author->user_info['user_username'] = $result['user_username'];
      $author->user_info['user_photo'] = $result['user_photo'];
      $author->user_info['user_fname'] = $result['user_fname'];
      $author->user_info['user_lname'] = $result['user_lname'];
      $result['historyentry_author'] =& $author;
      
      $historyentry_list[] = $result;
      unset($author);
    }
    
    return $historyentry_list;
  }
  
  //
  // END METHOD history_subscription_entry_list()
  //
  
  
  
  
  
  
  
  //
  // BEGIN METHOD history_subscription_notification()
  //
  // OVERVIEW:
	//    Lists recent historys from the specified user's subscriptions
  //
	// INPUT:
  //
	// OUTPUT:
  //
  
  function history_subscription_notification($newhistoryentry_id, $newhistoryentry_title, $newhistoryentry_privacy=1)
  {
    global $database, $user, $url, $notify;
    
    // Quick fix for self
    if( !$newhistoryentry_privacy || $newhistoryentry_privacy==1 )
      return;
    
    // Generate query
    $sql = "
      SELECT
        se_historysubscriptions.*,
        subscriber.user_id,
        subscriber.user_username,
        subscriber.user_fname,
        subscriber.user_lname,
        subscriber.user_email,
        subscriber_settings.usersetting_notify_newhistorysubscriptionentry
      FROM
        se_historysubscriptions
      LEFT JOIN
        se_users AS subscriber
        ON subscriber.user_id=se_historysubscriptions.historysubscription_user_id
      LEFT JOIN
        se_usersettings AS subscriber_settings
        ON subscriber_settings.usersetting_user_id=subscriber.user_id
      WHERE
        se_historysubscriptions.historysubscription_owner_id='{$user->user_info['user_id']}' &&
        CASE
          /* DO NOT SEND AN EMAIL TO SELF, BESIDES THEY SHOULDNT BE SUBSCRIBED TO THEIR OWN history... */
          WHEN subscriber.user_id='{$user->user_info['user_id']}'
            THEN FALSE
          /* IGNORE MISSING USERS */
          WHEN (({$newhistoryentry_privacy} & @SE_PRIVACY_ANONYMOUS) AND subscriber.user_id IS NULL)
            THEN FALSE
          /* NORMAL */
          WHEN (({$newhistoryentry_privacy} & @SE_PRIVACY_REGISTERED) AND subscriber.user_id IS NOT NULL)
            THEN TRUE
          WHEN (({$newhistoryentry_privacy} & @SE_PRIVACY_FRIEND) AND (SELECT TRUE FROM se_friends WHERE friend_user_id1='{$user->user_info['user_id']}' AND friend_user_id2=subscriber.user_id AND friend_status='1' LIMIT 1))
            THEN TRUE
          WHEN (({$newhistoryentry_privacy} & @SE_PRIVACY_SUBNET) AND (SELECT TRUE FROM se_users WHERE user_id='{$user->user_info['user_id']}' AND user_subnet_id=subscriber.user_subnet_id LIMIT 1))
            THEN TRUE
          WHEN (({$newhistoryentry_privacy} & @SE_PRIVACY_FRIEND2) AND (
              SELECT TRUE FROM se_friends AS friends_primary
              LEFT JOIN se_users ON friends_primary.friend_user_id1=se_users.user_id
              LEFT JOIN se_friends AS friends_secondary ON friends_primary.friend_user_id2=friends_secondary.friend_user_id1
              WHERE friends_primary.friend_user_id1='{$user->user_info['user_id']}' AND friends_secondary.friend_user_id2=subscriber.user_id AND se_users.user_subnet_id=subscriber.user_subnet_id LIMIT 1)
              )
            THEN TRUE
          ELSE FALSE
        END
    ";
    
    $resource = $database->database_query($sql);
    
    // Get all recipients and send emails
    // TODO: large numbers of subscribers
    
    $historyentry_url = $url->url_create('history_entry', $user->user_info['user_username'], $newhistoryentry_id);
    
    while( $result=$database->database_fetch_assoc($resource) )
    {
      // Create user object for displayname
      $recipient_object = new se_user();
      $recipient_object->user_info['user_id'] = $result['user_id'];
      $recipient_object->user_info['user_username'] = $result['user_username'];
      $recipient_object->user_info['user_fname'] = $result['user_fname'];
      $recipient_object->user_info['user_lname'] = $result['user_lname'];
      $recipient_object->user_displayname();
      
      // NOTIFICATION
      $notifytype = $notify->notify_add(
        $recipient_object->user_info['user_id'],
        "newhistorysubscriptionentry",
        $newhistoryentry_id,
        Array(
          $user->user_info['user_username'],
          $newhistoryentry_id
        ),
        Array(
          $newhistoryentry_title
        )
      );
      
      // EMAIL NOTIFICATION
      if( !empty($result['user_email']) && $result['usersetting_notify_newhistorysubscriptionentry'] )
      {
        
        send_systememail('newhistorysubscriptionentry', $result['user_email'], Array(
          $recipient_object->user_displayname,
          $user->user_displayname,
          "<a href=\"$historyentry_url\">$historyentry_url</a>"
        ));
      }
      
      unset($recipient_object);
    }
  }
  
  //
  // END METHOD history_subscription_notification()
  //
  
  
  
  
  
  
  
  //
  // BEGIN METHOD history_Trackback_history_generate()
  //
  // OVERVIEW:
	//    Creates the RDF signature used for Trackback_history auto discovery
  //
	// INPUT:
  //    &$historyentry_info   An array of info about the history
  //
	// OUTPUT:
  //    The RDF signature
  //
  
  function history_Trackback_history_generate(&$historyentry_info)
  {
    global $url, $owner;
    
    $Trackback_history = new Trackback_history(NULL, $owner->user_displayname, "UTF-8");
    
    return $Trackback_history->rdf_autodiscover(
      date("r", $historyentry_info['historyentry_date']),
      $historyentry_info['historyentry_title'],
      $historyentry_info['historyentry_body'],
      $url->url_create('history_entry', $owner->user_info['user_username'], $historyentry_info['historyentry_id']),
      $url->url_create('history_Trackback_history', $owner->user_info['user_username'], $historyentry_info['historyentry_id']),
      $owner->user_displayname
    );
  }
  
  //
  // END METHOD history_Trackback_history_generate()
  //
  
  
  
  
  
  
  
  //
  // BEGIN METHOD history_Trackback_history_receive()
  //
  // OVERVIEW:
	//    Used to receive a Trackback_history send request from a remote server
  //
	// INPUT:
  //    void
  //
	// OUTPUT:
  //    A Trackback_history XML response
  //
  
  function history_Trackback_history_receive()
  {
    global $database, $user, $setting;
    
    $is_error = FALSE;
    
    // Create Trackback_history class instance
    $Trackback_history = new Trackback_history(NULL, NULL, "UTF-8");
    
    // Prepare data
    $Trackback_history_eid          = $Trackback_history->e_id;
    $Trackback_history_url          = trim($Trackback_history->url);
    $Trackback_history_title        = trim($Trackback_history->title);
    $Trackback_history_excerpt      = trim($Trackback_history->excerpt);
    $Trackback_history_bname        = trim($Trackback_history->bname);
    $Trackback_history_ip           = $_SERVER['REMOTE_ADDR'];
    $Trackback_history_time         = time();
    $Trackback_history_excerpthash  = md5($Trackback_history_excerpt);
    
    // Clean body
	  $Trackback_history_excerpt = str_replace("\r\n", "<br />", cleanHTML(censor(htmlspecialchars_decode($Trackback_history_excerpt)), $setting['setting_comment_html']));
    
    // Trackback_historys not allowed
    if( !$user->level_info['level_history_Trackback_historys_allow'] )
      $is_error = 1500013;
    
    // No ID specified
    if( !$Trackback_history_eid )
      $is_error = 1500008;
      
    // Trackback_history URL is empty
    if( !$Trackback_history_url )
      $is_error = 1500009;
    
    // Get entry info. TODO: switch to SELECT NULL?
    if( !$is_error )
    {
      $sql = "
        SELECT
          NULL
        FROM
          se_historyentries
        WHERE
          se_historyentries.historyentry_id='{$Trackback_history_eid}'
        LIMIT
          1
      ";
      
      $resource = $database->database_query($sql);
      
      // Entry not found
      if( !$database->database_num_rows($resource) )
        $is_error = 1500010;
    }
    
    
    // See if Trackback_history has already been received
    if( !$is_error )
    {
      $sql = "
        SELECT
          NULL
        FROM
          se_historyTrackback_historys
        WHERE
          historyTrackback_history_historyentry_id='{$Trackback_history_eid}' &&
          historyTrackback_history_name='{$Trackback_history_bname}' &&
          historyTrackback_history_excerpthash='{$Trackback_history_excerpthash}'
        LIMIT
          1
      ";
      
      $resource = $database->database_query($sql);
      
      // Already tracked
      if( $database->database_num_rows($resource) )
        $is_error = 1500011;
    }
    
    
    // Only 1/15 seconds
    if( !$is_error )
    {
      $Trackback_history_timeout = 15;
      
      $sql = "
        SELECT
          NULL
        FROM
          se_historyTrackback_historys
        WHERE
          historyTrackback_history_ip='{$Trackback_history_ip}' &&
          historyTrackback_history_date>".($Trackback_history_time - $Trackback_history_timeout)."
        LIMIT
          1
      ";
      
      $resource = $database->database_query($sql);
      
      if( $database->database_num_rows($resource) )
        $is_error = 1500012;
    }
    
    
    // TODO: antispam
    
    
    // INSERT
    if( !$is_error )
    {
      $sql = "
        INSERT INTO se_historyTrackback_historys
        (
          historyTrackback_history_historyentry_id,
          historyTrackback_history_name,
          historyTrackback_history_title,
          historyTrackback_history_excerpt,
          historyTrackback_history_excerpthash,
          historyTrackback_history_url,
          historyTrackback_history_ip,
          historyTrackback_history_date
        ) VALUES (
          '{$Trackback_history_eid}',
          '{$Trackback_history_bname}',
          '{$Trackback_history_title}',
          '{$Trackback_history_excerpt}',
          '{$Trackback_history_excerpthash}',
          '{$Trackback_history_url}',
          '{$Trackback_history_ip}',
          '{$Trackback_history_time}'
        )
      ";
      
      $resource = $database->database_query($sql);
      
      if( !$database->database_affected_rows($resource) )
        $is_error = 1500013;
      
      
      // UPDATE Trackback_history COUNT
      $sql = "UPDATE se_historyentries SET historyentry_totalTrackback_historys=historyentry_totalTrackback_historys+1 WHERE historyentry_id='{$Trackback_history_eid}' LIMIT 1";
      $database->database_query($sql);
    }
    
    
    
    // LOG
    if( empty($historyentry_url) && !empty($_SERVER['HTTP_REFERER']) )
      $historyentry_url = $_SERVER['HTTP_REFERER'];
    if( empty($historyentry_url) && !empty($_SERVER['REMOTE_ADDR']) )
      $historyentry_url = $_SERVER['REMOTE_ADDR'];
    
    $sql = "
      INSERT INTO se_historypings
      (
        historyping_historyentry_id,
        historyping_target_url,
        historyping_source_url,
        historyping_status,
        historyping_type,
        historyping_ip
      ) VALUES (
        '{$Trackback_history_eid}',
        '".$database->database_real_escape_string($_SERVER['REQUEST_URI'])."',
        '".$database->database_real_escape_string($historyentry_url)."',
        '1',
        '2',
        '{$_SERVER['REMOTE_ADDR']}'
      )
    ";
    
    $resource = $database->database_query($sql);
    
    
    // GET ERROR MESSAGE
    SE_Language::_preload( $is_error ? $is_error : 1500014 );
    SE_Language::load();
    $message = SE_Language::_get( $is_error ? $is_error : 1500014 );
    
    return $Trackback_history->recieve(!$is_error, $message);
  }
  
  //
  // END METHOD history_Trackback_history_receive()
  //
  
  
  
  
  
  
  
  //
  // BEGIN METHOD history_Trackback_history_send()
  //
  // OVERVIEW:
	//    Sends a Trackback_history to a remote server
  //
	// INPUT:
  //    $ping_urls              An array of Trackback_history URLs
  //    $historyentry_id           The id of the local historyentry
  //    $historyentry_title        The title of the local historyentry
  //    &$historyentry_body        The body of the local historyentry
  //
	// OUTPUT:
  //    'result'                Whether or not it was successful
  //    'Trackback_history_results'     An array of results for each Trackback_history url
  //
  
  function history_Trackback_history_send($ping_urls, $historyentry_id, $historyentry_title, &$historyentry_body)
  {
    global $database, $user, $url, $setting;
    
    // Trackback_history class
    $Trackback_history = new Trackback_history($user->user_displayname."'s history", $user->user_displayname, "UTF-8");
    
    // Prepare data
    $historyentry_excerpt = ( strlen($historyentry_body)>255 ? substr($historyentry_body, 0, 254) : $historyentry_body );
    $historyentry_url = $url->url_create('history_entry', $user->user_info['user_username'], $historyentry_id);
    
    // Allow multiple Trackback_historys
    if( !is_array($ping_urls) )
      $ping_urls = array($ping_urls);
    
    // Detect Trackback_historys
    if( $user->level_info['level_history_Trackback_historys_detect'] )
    {
      $detected_Trackback_history_urls = $Trackback_history->auto_discovery($historyentry_body);
      $ping_urls = array_merge($ping_urls, $detected_Trackback_history_urls);
    }
    
    $ping_urls = array_unique(array_filter($ping_urls));
    
    // Ping the Trackback_history urls (and generate ping log query)
    $sql = "INSERT INTO se_historypings (historyping_historyentry_id, historyping_target_url, historyping_source_url, historyping_status, historyping_type, historyping_ip) VALUES ";
    $isFirst = TRUE;
    
    $Trackback_history_results = array();
    foreach( $ping_urls as $ping_url )
    {
      $tb_result = $Trackback_history->ping($ping_url, $historyentry_url, $historyentry_title, $historyentry_excerpt);
      
      if( $tb_result=="1" )
        $Trackback_history_results[$ping_url] = "Could not connect";
      elseif( $tb_result=="2" )
        $Trackback_history_results[$ping_url] = "Success";
      elseif( $tb_result=="3" )
        $Trackback_history_results[$ping_url] = "An error occurred";
      else
        $Trackback_history_results[$ping_url] = "An unknown error has occurred";
      
      if( !$isFirst ) $sql .= ',';
      $sql .= "('$historyentry_id', '".$database->database_real_escape_string($ping_url)."', '".$database->database_real_escape_string($_SERVER['REQUEST_URI'])."', 1, 1, '{$_SERVER['REMOTE_ADDR']}')";
      
      $isFirst = FALSE;
    }
    
    if( !$isFirst )
      $resource = $database->database_query($sql);
    
    return array(
      'result' => TRUE,
      'Trackback_history_results' => $results
    );
  }
  
  //
  // END METHOD history_Trackback_history_send()
  //
  
  
  
  
  
  
  
  //
  // BEGIN METHOD history_Trackback_history_total()
  //
  // OVERVIEW:
	//    Gets a count of Trackback_historys stored on the local server
  //
	// INPUT:
  //    $where                ---
  //
	// OUTPUT:
  //    The number of Trackback_historys
  //
  
  function history_Trackback_history_total($where=NULL)
  {
    global $database;
    
    $sql = "
      SELECT
        COUNT(*) AS Trackback_history_count
      FROM
        se_historyTrackback_historys
    ";
    
    if( $where ) $sql .= "
      WHERE
        $where
    ";
    
    $resource = $database->database_query($sql);
    $result = $database->database_fetch_assoc($resource);
    
    return ( !empty($result['Trackback_history_count']) ? $result['Trackback_history_count'] : 0 );
  }
  
  //
  // END METHOD history_Trackback_history_total()
  //
  
  
  
  
  
  
  
  //
  // BEGIN METHOD history_Trackback_history_list()
  //
  // OVERVIEW:
	//    Gets a list of Trackback_historys stored on the local server
  //
	// INPUT:
  //    $where                ---
  //
	// OUTPUT:
  //    A list of Trackback_historys
  //
  
  function history_Trackback_history_list($start=NULL, $limit=NULL, $order='historyTrackback_history_date ASC', $where=NULL)
  {
    global $database;
    
    if( !$limit ) $limit = 20;
    
    $sql = "
      SELECT
        *
      FROM
        se_historyTrackback_historys
    ";
    
    if( $where ) $sql .= "
      WHERE
        $where
    ";
    
    if( $order ) $sql .= "
      ORDER BY
        $order
    ";
    
    if( $start || $limit )
      $sql .= " LIMIT";
      
    if( $start )
      $sql .= " {$start},";
      
    if( $limit )
      $sql .= " {$limit}";
    
    $resource = $database->database_query($sql);
    
    $Trackback_historys = array();
    while( $result=$database->database_fetch_assoc($resource) )
      $Trackback_historys[] = $result;
    
    return $Trackback_historys;
  }
  
  //
  // END METHOD history_Trackback_history_list()
  //
  
  
  
  
  
  function history_category_create($category_title, $parent_category_id=NULL)
  {
    global $database, $admin, $user;
    
    if( !trim($category_title) ) return FALSE;
    if( !$parent_category_id ) $parent_category_id = '0';
    
    // Truncate and escape
    if( strlen($category_title)>64 ) $category_title = substr($category_title, 0, 64);
    
    $user_id = $user->user_info['user_id'];
    $lvar_id = 0;
    
    // If admin, create language variable
    if( is_object($admin) && $admin->admin_exists )
    {
      $lvar_id = SE_Language::edit(0, $category_title, NULL, LANGUAGE_INDEX_SUBNETS);
      $user_id = 0;
    }
    
    // If not user or not allowed, return
    elseif( !is_object($user) || !$user->user_exists || !$user->level_info['level_history_category_create'] )
    {
      return FALSE;
    }
    
    // INSERT
    $category_title = addslashes($category_title);
    
    $sql = "
      INSERT INTO se_historyentrycats (
        historyentrycat_title,
        historyentrycat_user_id,
        historyentrycat_languagevar_id,
        historyentrycat_parentcat_id
      ) VALUES (
        '{$category_title}',
        '{$user_id}',
        '{$lvar_id}',
        '{$parent_category_id}'
      )
    ";
    
    $resource = $database->database_query($sql);
    
    return ( $database->database_affected_rows($resource) ? $database->database_insert_id() : FALSE );
  }
  
  
  
  
  
  function history_category_list($user_id=FALSE)
  {
    global $database;
    
    $sql = "SELECT * FROM se_historyentrycats ";
    
    if( $user_id!==TRUE && $user_id>0 )
      $sql .= "WHERE historyentrycat_user_id=0 || historyentrycat_user_id='{$user_id}' ";
    elseif( $user_id===FALSE )
      $sql .= "WHERE historyentrycat_user_id=0 ";
    
    $sql .= "ORDER BY historyentrycat_id ASC";
    
    $resource = $database->database_query($sql);
    
    $historyentrycats_array = array();
    while( $result=$database->database_fetch_assoc($resource) )
    {
      // PRELOAD
      if( !empty($result['historyentrycat_languagevar_id']) )
        SE_Language::_preload($result['historyentrycat_languagevar_id']);
      
      $historyentrycats_array[] = $result;
    }
    
    return $historyentrycats_array;
  }
  
}

?>