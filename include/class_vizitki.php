<?php

/* $Id: class_vizitki.php 62 2009-02-18 02:59:27Z john $ */


//
//  THIS CLASS CONTAINS vizitki ENTRY-RELATED METHODS 
//
//  METHODS IN THIS CLASS:
//
//    se_vizitki()
//
//    vizitki_entry_info()
//    vizitki_entry_post()
//    vizitki_entry_delete()
//
//    vizitki_entries_total()
//    vizitki_entries_list()
//    vizitki_entries_delete()
//
//    vizitki_archive_generate()
//    vizitki_categories_generate()
//    
//    vizitki_subscription_create()
//    vizitki_subscription_exists()
//    vizitki_subscription_delete()
//    vizitki_subscription_list()
//    vizitki_subscription_total()
//    vizitki_subscription_entry_list()
//    vizitki_subscription_notification()
//
//    vizitki_trackback_receive()
//    vizitki_trackback_send()
//    vizitki_trackback_total()
//    vizitki_trackback_list()
//    
//    vizitki_category_create()
//    vizitki_category_list()
//


defined('SE_PAGE') or exit();

include_once("resize.php");


class se_vizitki
{
	// INITIALIZE VARIABLES
	var $is_error;			// DETERMINES WHETHER THERE IS AN ERROR OR NOT
	var $error_message;		// CONTAINS RELEVANT ERROR MESSAGE

	var $user_id;			// CONTAINS THE USER ID OF THE USER WHOSE vizitki WE ARE EDITING








	//
  // BEGIN METHOD se_vizitki()
  //
  // OVERVIEW:
  //    THIS METHOD SETS INITIAL VARS
  //
	// INPUT:
  //    $user_id  (OPTIONAL) REPRESENTING THE USER ID OF THE USER WHOSE vizitki WE ARE CONCERNED WITH
  //
	// OUTPUT: 
  //    void
  //
  
	function se_vizitki($user_id=NULL)
  {
	  $this->user_id = $user_id;
	}

//add transation country
        function add_country_translate($country)
        {
             global $database, $user;
	   $sql = "
        INSERT INTO se_vizitki_country
        (
        vizitkisetting_country
        )
        VALUES
        (
          '$country'
        )";
      $resource = $database->database_query($sql);
 
	}


        function get_all_country()
        {
             global $database, $user;
	   $sql = "SELECT * FROM se_vizitki_country;";
           $resource = $database->database_query($sql);
            while( $vizitkientry_info=$database->database_fetch_assoc($resource) )
            $country[] = $vizitkientry_info;
            return $country;
	}

         function add_city_translate($id=NULL,$city)
        {
             global $database, $user;
	$sql = "
        INSERT INTO se_vizitki_city
        (
            vizitki_country_id,
            vizitki_city
        )
        VALUES
        (
          '$id',
            '$city'
        )";
      $resource = $database->database_query($sql);

	}

        function get_all_city()
        {
             global $database, $user;
	   $sql = "SELECT * FROM se_vizitki_city;";
           $resource = $database->database_query($sql);
            while( $vizitkientry_info=$database->database_fetch_assoc($resource) )
            $city[] = $vizitkientry_info;
            return $city;
	}
  
  //
  // END METHOD se_vizitki()
  //







	//
  // BEGIN METHOD vizitki_entry_info()
  //
  // OVERVIEW:
  //    Gets info about a single vizitki entry
  //
	// INPUT:
  //    $vizitkientry_id   REPRESENTING THE ID OF THE ENTRY
  //
	// OUTPUT:
  //    AN ARRAY OF INFO
  //
  
	function vizitki_entry_info($vizitkientry_id)
  {
    global $database, $user;
    
    if( !is_numeric($vizitkientry_id) )
      return FALSE;
    
    $sql = "
      SELECT
        se_ads.*
    ";
    
    if( !$this->user_id ) $sql .= ",
        se_users.user_id,
        se_users.user_username,
        se_users.user_photo,
        se_users.user_fname,
        se_users.user_lname
    ";
    
    // IF A USER IS LOGGED IN, SEE IF THEY ARE SUBSCRIBED
   
    $sql .= "
      FROM
        se_ads
    ";
    
    
    
    if( !$this->user_id ) $sql .= "
      LEFT JOIN
        se_users
        ON se_users.user_id=se_ads.vizitkientry_user_id
    ";
    
    $sql .= "
      WHERE
       ad_id='{$vizitkientry_id}'
    ";
    
    if( $this->user_id ) $sql .= " &&
        vizitkientry_user_id='{$this->user_id}'
    ";
    
    $sql .= "
      LIMIT
        1
    ";
    
    $resource = $database->database_query($sql);
    
    if( !$database->database_num_rows($resource) )
      return FALSE;
    
    // PREPARE THE DATA
    $vizitkientry_info = $database->database_fetch_assoc($resource);
    //$vizitkientry_info['vizitki_trackbacks'] = split("\n", $vizitkientry_info['vizitki_trackbacks']);
    
    return $vizitkientry_info;
	}
  
  //
  // END METHOD vizitki_entry_info()
  //







	//
  // BEGIN METHOD vizitki_entries_total()
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
  
	function vizitki_entries_total($where = "")
  {
	  global $database;
    
	  // BEGIN ENTRY QUERY
	  $sql = "
      SELECT
        NULL
      FROM
        se_vizitkientries
    ";
    
	  // IF NO USER ID SPECIFIED, JOIN TO USER TABLE
	  if( !$this->user_id ) $sql .= "
      LEFT JOIN
        se_users
        ON se_vizitkientries.vizitkientry_user_id=se_users.user_id
    ";
    
	  // ADD WHERE IF NECESSARY
	  if( !empty($where) || $this->user_id ) $sql .= "
      WHERE
    ";
    
	  // ENSURE USER ID IS NOT EMPTY
	  if( $this->user_id ) $sql .= "
        vizitkientry_user_id='{$this->user_id}'
    ";
    
	  // INSERT AND IF NECESSARY
	  if( $this->user_id && !empty($where) ) $sql .= " AND";
    
	  // ADD WHERE CLAUSE, IF NECESSARY
	  if( !empty($where) ) $sql .= "
        $where
    ";
    
	  // GET AND RETURN TOTAL vizitki ENTRIES
    $resource = $database->database_query($sql);
	  return $database->database_num_rows($resource);
	}
  
  //
  // END METHOD vizitki_entries_total()
  //







  //
  // BEGIN METHOD vizitki_entries_list()
  //
  // OVERVIEW:
	//    THIS METHOD RETURNS AN ARRAY OF vizitki ENTRIES
  //
	// INPUT:
  //    $start    REPRESENTING THE ENTRY TO START WITH
	//	  $limit    REPRESENTING THE NUMBER OF ENTRIES TO RETURN
	//	  $sort_by  (OPTIONAL) REPRESENTING THE ORDER BY CLAUSE
	//	  $where    (OPTIONAL) REPRESENTING ADDITIONAL THINGS TO INCLUDE IN THE WHERE CLAUSE
  //
	// OUTPUT:
  //    AN ARRAY OF vizitki ENTRIES
  //
  
	function vizitki_entries_list($start, $limit, $sort_by = "vizitkientry_date DESC", $where=NULL)
  {
	  global $database, $user, $owner;
    
	  // BEGIN QUERY
	  $sql = "
      SELECT
        se_ads.*
   ";
    
    // IF A USER IS LOGGED IN, SEE IF THEY ARE SUBSCRIBED
        
	  // IF NO USER ID SPECIFIED, RETRIEVE USER INFORMATION
	  if( !$this->user_id ) $sql .= ",
        se_users.user_id,
        se_users.user_username,
        se_users.user_photo,
        se_users.user_fname,
        se_users.user_lname
    ";
    
	
	
	  // ADD WHERE IF NECESSARY
	  if( !empty($where) || $this->user_id ) $sql .= " FROM
        se_ads
      WHERE
    ";
    
	  // ENSURE USER ID IS NOT EMPTY
	  if( $this->user_id ) $sql .= "
        vizitkientry_user_id='{$this->user_id}'
    ";
    
	  // INSERT AND IF NECESSARY
	  if( $this->user_id && !empty($where) ) $sql .= " AND";
    
	  // ADD WHERE CLAUSE, IF NECESSARY
	  if( !empty($where) ) $sql .= "
        $where
    ";
    
	  // ADD ORDER, AND LIMIT CLAUSE
    
	  $sql .= "
      ORDER BY
        ad_date_start
      LIMIT
        $start, $limit
    ";
    //echo $sql;
	  // RUN QUERY
    $resource = $database->database_query($sql);
    
	  // GET vizitki ENTRIES INTO AN ARRAY
	  $vizitkientry_array = Array();
         // $vizitkientry_info=$database->database_fetch_assoc($resource);
        //  print_r($vizitkientry_info);
	  while( $vizitkientry_info=$database->database_fetch_assoc($resource) )
    {
              
          
      // Check title
      if( !trim($vizitkientry_info['vizitkientry_title']) )
      {
        SE_Language::_preload(1500015);
        SE_Language::load();
        $vizitkientry_info['vizitkientry_title'] = SE_Language::_get(1500015);
      }
      
      // Load category title
      if( !empty($vizitkientry_info['vizitkientrycat_languagevar_id']) )
      {
        SE_Language::_preload($vizitkientry_info['vizitkientrycat_languagevar_id']);
      }
      
	    // CONVERT HTML CHARACTERS BACK
	    $vizitkientry_info['vizitkientry_body'] = str_replace("\r\n", "", htmlspecialchars_decode($vizitkientry_info['vizitkientry_body'], ENT_QUOTES));
	    
	    // IF NO USER ID SPECIFIED, CREATE OBJECT FOR AUTHOR
	    if( !$this->user_id )
      {
	      $author = new se_user();
	      $author->user_exists = TRUE;
	      $author->user_info['user_id']       = $vizitkientry_info['user_id'];
	      $author->user_info['user_username'] = $vizitkientry_info['user_username'];
	      $author->user_info['user_photo']    = $vizitkientry_info['user_photo'];
	      $author->user_info['user_fname']    = $vizitkientry_info['user_fname'];
	      $author->user_info['user_lname']    = $vizitkientry_info['user_lname'];
	      $author->user_displayname();
        
        $vizitkientry_info['vizitkientry_author'] =& $author;
        unset($author);
	    }
      
	    // OTHERWISE, SET AUTHOR TO OWNER/LOGGED-IN USER
      elseif( $owner->user_exists && $owner->user_info['user_id']==$vizitkientry_info['vizitkientry_user_id'] )
      {
	      $vizitkientry_info['vizitkientry_author'] =& $owner;
	    }
      elseif( $user->user_exists  && $user->user_info['user_id']==$vizitkientry_info['vizitkientry_user_id'] )
      {
	      $vizitkientry_info['vizitkientry_author'] =& $user;
	    }
      
	    // GET ENTRY COMMENT PRIVACY
      // TODO: FIND A WAY TO MAKE THIS WORK WITH THE AUTHOR
//	    $allowed_to_comment = TRUE;
//	    if( $owner->user_exists )
  //    {
//	      $comment_level = $owner->user_privacy_max($user, $owner->level_info['level_vizitki_comments']);
//	    }
     // $vizitkientry_info['allowed_to_comment'] = $allowed_to_comment;
      
      
      // GET CATEGORY TITLE
      //$vizitkientry_info['vizitkientry_vizitkientrycat_title'] = $vizitkientry_info['vizitkientrycat_title'];
      //unset($vizitkientry_info['vizitkientrycat_title']);
      
      
	    // SET vizitkiENTRY ARRAY
	    $vizitkientry_array[] = $vizitkientry_info;
	  }
    
	  // RETURN ARRAY
	  return $vizitkientry_array;
	}
  
  //
  // END METHOD vizitki_entries_list()
  //








  //
  // BEGIN METHOD vizitki_entries_delete()
  //
  // OVERVIEW:
  //    THIS METHOD DELETES SELECTED vizitki ENTRIES
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
  
	function vizitki_entries_delete($start, $limit, $sort_by = "vizitkientry_date DESC", $where = "") {
	  global $database;
    
	  // BEGIN QUERY
	  $vizitkientry_query = "SELECT vizitkientry_id FROM se_vizitkientries";
    
	  // ADD WHERE IF NECESSARY
	  if($where != "" | $this->user_id != 0) { $vizitkientry_query .= " WHERE"; }
    
	  // ENSURE USER ID IS NOT EMPTY
	  if($this->user_id != 0) { $vizitkientry_query .= " vizitkientry_user_id='{$this->user_id}'"; }
    
	  // INSERT AND IF NECESSARY
	  if($this->user_id != 0 & $where != "") { $vizitkientry_query .= " AND"; }
    
	  if( $where ) { $vizitkientry_query .= " $where"; }
    
	  // ADD ORDER, AND LIMIT CLAUSE
	  $vizitkientry_query .= " ORDER BY $sort_by LIMIT $start, $limit";
    
	  // RUN QUERY
	  $vizitkientries = $database->database_query($vizitkientry_query);
    
	  // GET vizitki ENTRIES INTO AN ARRAY
	  $vizitkientry_delete = "";
	  while($vizitkientry_info = $database->database_fetch_assoc($vizitkientries)) {
	    $var = "delete_vizitkientry_".$vizitkientry_info['vizitkientry_id'];
	    if($_POST[$var] == 1) { 
	      if($vizitkientry_delete != "") { $vizitkientry_delete .= " OR "; }
	      $vizitkientry_delete .= "vizitkientry_id='{$vizitkientry_info['vizitkientry_id']}'";
	    }
	  }
    
	  // IF DELETE CLAUSE IS NOT EMPTY, DELETE ENTRIES
	  if($vizitkientry_delete != "") { 
	    $delete_query = "DELETE FROM se_vizitkientries, se_vizitkicomments USING se_vizitkientries LEFT JOIN se_vizitkicomments ON se_vizitkientries.vizitkientry_id=se_vizitkicomments.vizitkicomment_vizitkientry_id WHERE ";
	    if($this->user_id != 0) { $delete_query .= "se_vizitkientries.vizitkientry_user_id='{$this->user_id}' AND "; }
	    $delete_query .= "($vizitkientry_delete)";
	    $database->database_query($delete_query); 
	  }
	}
  
  //
  // END METHOD vizitki_entries_delete()
  //








	// 
  // BEGIN METHOD vizitki_entry_post()
  //
  // OVERVIEW:
  //    This methods posts or edits an entry.
  //
	// INPUT:
  //    $vizitkientry_id               REPRESENTING THE ID OF THE vizitki ENTRY TO EDIT. IF NO ENTRY WITH THIS ID IS FOUND, A NEW ENTRY WILL BE ADDED
	//	  $vizitkientry_title            REPRESENTING THE TITLE OF THE vizitki ENTRY
	//	  $vizitkientry_body             REPRESENTING THE BODY OF THE vizitki ENTRY
	//	  $vizitkientry_vizitkientrycat_id  REPRESENTING THE ID OF THE SELECTED vizitki ENTRY CATEGORY
	//	  $vizitkientry_search           REPRESENTING WHETHER THE vizitki ENTRY SHOULD BE INCLUDED IN SEARCH RESULTS
	//	  $vizitkientry_privacy          REPRESENTING THE PRIVACY LEVEL OF THE ENTRY
	//	  $vizitkientry_comments         REPRESENTING WHO CAN COMMENT ON THE ENTRY
	//	  $vizitkientry_trackbacks       REPRESENTING THE URLS TO SEND TRACKBACK DATA TO
  //
	// OUTPUT:
  //    returns FALSE or the vizitki entry id
  //
  
	function vizitki_entry_post($vizitkientry_id=NULL, $vizitkientry_user_id,$vizitkientry_title, $vizitkientry_body, $vizitkientry_vizitkientrycat_id=NULL, $vizitkientry_search=NULL, $vizitkientry_privacy=NULL, $vizitkientry_comments=NULL, $vizitkientry_trackbacks=NULL,$vizitkientry_category=NULL, $vizitkientry_image=NULL,$vizitkientry_price=NULL,$vizitkientry_telephon=NULL,$vizitkientry_email=NULL,$vizitkientry_site=NULL,$vizitkientry_contry=NULL,$vizitkientry_city=NULL,$link)
  {
	  global $database, $user;
    if( !empty($vizitkientry_id) )
    {
$sql = "
        UPDATE
          se_ads
        SET";

if ($vizitkientry_image != ''){
     $sql .= " ad_filename ='$vizitkientry_image',
              ad_html='$link',
        ";
   
}
    $sql .= "
          ad_name='$vizitkientry_title',
          vizitkientry_body='$vizitkientry_body',
          vizitkientry_category='$vizitkientry_category',
          vizitkientry_price='$vizitkientry_price',
          vizitkientry_telephon='$vizitkientry_telephon',
          vizitkientry_email='$vizitkientry_email',
          vizitkientry_site='$vizitkientry_site',
          vizitkientry_contry='$vizitkientry_contry',
          vizitkientry_city='$vizitkientry_city'
         
        WHERE
          ad_id='$vizitkientry_id'
      ";
    //   echo $sql;
      $resource = $database->database_query($sql);
      
	  }
    
    // INSERT
    elseif( !$is_error )
    {
         
       $sql = "
        INSERT INTO se_ads
        (
          vizitkientry_user_id,
          ad_name,
          vizitkientry_body,
          vizitkientry_category,
          ad_filename,
          vizitkientry_price,
          vizitkientry_telephon,
          vizitkientry_email,
          vizitkientry_site,
          vizitkientry_contry,
          vizitkientry_city,
           ad_html
        )
        VALUES
        (
          '$vizitkientry_user_id',
          '$vizitkientry_title',
          '$vizitkientry_body',
          '$vizitkientry_category',
          '$vizitkientry_image',
          '$vizitkientry_price',
          '$vizitkientry_telephon',
          '$vizitkientry_email',
          '$vizitkientry_site',
          '$vizitkientry_contry',
          '$vizitkientry_city',
          '$link'

        )";

      
      $resource = $database->database_query($sql);
   // print_r($database->database_affected_rows($resource));
      if( $database->database_affected_rows($resource) )
      {
        $vizitkientry_id = $database->database_insert_id();
        $this->vizitka_photo_upload($vizitkientry_id,$file);
      }
      else
        $is_error = TRUE;
	  }
    
    
    // TRACKBACKS
    $trackback_results = array();
    if( !$is_error && is_array($vizitkientry_trackbacks) && !empty($vizitkientry_trackbacks) )
    {
      $this->vizitki_trackback_send($vizitkientry_trackbacks, $vizitkientry_id, $vizitkientry_title, $vizitkientry_body);
    }
    
    
    // SUBSCRIPTION NOTIFICATION
    if( !$is_error )
    {
      $this->vizitki_subscription_notification($vizitkientry_id, $vizitkientry_title, $vizitkientry_privacy);
    }
    
    
    return array(
      'result' => !$is_error,
      'error' => $is_error,
      'vizitkientry_id' => $vizitkientry_id,
      'trackback_results' => $trackback_results
    );
	}
  
  //
  // END METHOD vizitki_entry_post()
  //



        function vizitka_photo_upload($last_id,$file, $width, $height){
		global $database;
		
		$extension = strtolower(substr(strrchr($file_name, "."), 1));
		$rand = rand(100000000, 999999999);
                $photo_newname = "banner$rand.jpg";
		$uploaddir =  "../uploads_admin/ads/$photo_newname";

		move_uploaded_file($file, $uploaddir.$photo_newname);
		resize($uploaddir.$photo_newname, 100, 50, $uploaddir.$photo_newname);
                return $photo_newname;
		//header("Location: admin_gifts.php");
	}

	function deleteimage($image){
		global $database;
		$file = $database->database_fetch_assoc($database->database_query('SELECT id, filetype, lang FROM mf_gifts_data WHERE id = '.$image.''));
		$database->database_query('DELETE FROM se_languagevars WHERE languagevar_id = '.$file[lang].'');
		$database->database_query('DELETE FROM mf_gifts WHERE gift = '.$file[id].'');
		$database->database_query('DELETE FROM mf_gifts_data WHERE id = '.$file[id].'');
		unlink(APP_ROOT."/mf_gifts/$file[id].$file[filetype]");
		unlink(APP_ROOT."/mf_gifts/$file[id]_thumb.$file[filetype]");
		header("Location: admin_gifts.php");
	}



  //
  // BEGIN METHOD vizitki_entry_delete()
  //
  // OVERVIEW:
	//    Deletes entries
  //
	// INPUT:
  //    $vizitkientry_id       REPRESENTING THE ID OF THE vizitki ENTRY TO DELETE, OR AN ARRAY OF IDS
  //
	// OUTPUT:
  //    Return whether or not the entrie(s) was(were) deleted
  //
  function vizitki_settings()
  {
        global $database;

         $sql = "
      SELECT
        *
      FROM
        se_vizitkisetting";

         $resource = $database->database_query($sql);
       
    while( $result=$database->database_fetch_assoc($resource) )
    {
      // Create vizitki entry author object
     
      $vizitkiset_list[] = $result;
    }
         return $vizitkiset_list;
  }


	function vizitki_entry_delete($vizitkientry_id)
  {
	  global $database;
    $ad_id = $vizitkientry_id;
    if( !is_array($vizitkientry_id) )
      $vizitkientry_id = array($vizitkientry_id);
    
    $vizitkientry_id = array_unique(array_filter($vizitkientry_id));
  
	  // CREATE DELETE QUERY
	  $sql = "DELETE FROM se_ads WHERE ad_id='$ad_id' LIMIT 1";
    
	  // IF USER ID IS NOT EMPTY, ADD USER ID CLAUSE
	
    
	  // RUN QUERY
    $resource = $database->database_query($sql);
 
    return (bool) ($database->database_affected_rows($resource)==count($vizitkientry_id) );
	}
  
  //
  // END METHOD vizitki_entry_delete()
  //
  
  
  
  
  
  
  
  //
  // BEGIN METHOD vizitki_archive_generate()
  //
  // OVERVIEW:
	//    Generates a list of dates using the current user's vizitki entries for an archive list.
  //
	// INPUT:
  //    $where
  //
	// OUTPUT:
  //    An array of data about each date, including a label, start and end periods
  //
  
  function vizitki_archive_generate($where=NULL)
  {
    global $database;
    
    $sql = "
      SELECT
        vizitkientry_date
      FROM
        se_vizitkientries
      WHERE
        vizitkientry_user_id='{$this->user_id}'
    ";
    
    if( $where ) $sql .= " &&
        $where
    ";
    
    $sql .= "
      ORDER BY
        vizitkientry_date DESC
    ";
    
    $resource = $database->database_query($sql);
    
    // GET DATES
    $vizitki_dates = array();
    while( $result=$database->database_fetch_assoc($resource) )
      $vizitki_dates[] = $result['vizitkientry_date'];
    
    // GEN ARCHIVE LIST
    $time = time();
    $archive_list = array();
    
    foreach( $vizitki_dates as $vizitki_date )
    {
      $ltime = localtime($vizitki_date, TRUE);
      $ltime["tm_mon"] = $ltime["tm_mon"] + 1;
      $ltime["tm_year"] = $ltime["tm_year"] + 1900;
      
      // LESS THAN A YEAR AGO - MONTHS
      if( $vizitki_date+31536000>$time )
      {
        $date_start = mktime(0, 0, 0, $ltime["tm_mon"], 1, $ltime["tm_year"]);
        $date_end = mktime(0, 0, 0, $ltime["tm_mon"]+1, 1, $ltime["tm_year"]);
        $label = date('F Y', $vizitki_date);
        $type = 'month';
      }
      
      // MORE THAN A YEAR AGO - YEARS
      else
      {
        $date_start = mktime(0, 0, 0, 1, 1, $ltime["tm_year"]);
        $date_end = mktime(0, 0, 0, 1, 1, $ltime["tm_year"]+1);
        $label = date('Y', $vizitki_date);
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
  // END METHOD vizitki_archive_generate()
  //
  
  
  
  
  
  
  
  //
  // BEGIN METHOD vizitki_categories_generate()
  //
  // OVERVIEW:
	//    Generates a list of categories using the current user's vizitki entries for a category list.
  //
	// INPUT:
  //    $where
  //
	// OUTPUT:
  //    An array of data about each category, including a title and ID
  //
  
  function vizitki_categories_generate($where=NULL)
  {
    global $database;
    
    $sql = "
      SELECT
        COUNT(*) AS vizitkientry_count,
        se_vizitkientries.vizitkientry_vizitkientrycat_id,
        se_vizitkientrycats.*
      FROM
        se_vizitkientries
      LEFT JOIN
        se_vizitkientrycats
        ON se_vizitkientrycats.vizitkientrycat_id=se_vizitkientries.vizitkientry_vizitkientrycat_id
      WHERE
        se_vizitkientries.vizitkientry_user_id='{$this->user_id}' &&
        (se_vizitkientries.vizitkientry_vizitkientrycat_id=0 || se_vizitkientrycats.vizitkientrycat_user_id=0 || se_vizitkientrycats.vizitkientrycat_user_id='{$this->user_id}')
    ";
    
    if( $where ) $sql .= " &&
        $where
    ";
    
    $sql .= "
      GROUP BY
        se_vizitkientries.vizitkientry_vizitkientrycat_id
      ORDER BY
        se_vizitkientries.vizitkientry_vizitkientrycat_id ASC
    ";
    
    $resource = $database->database_query($sql);
    
    $vizitki_cats = array();
    while( $result=$database->database_fetch_assoc($resource) )
    {
      if( empty($result['vizitkientrycat_id']) )
      {
        $result['vizitkientrycat_id'] = 0;
        $result['vizitkientrycat_title'] = SE_Language::get(1500035);
      }
      
      if( !empty($result['vizitkientrycat_languagevar_id']) )
        SE_Language::_preload($result['vizitkientrycat_languagevar_id']);
      
      $vizitki_cats[] = $result;
    }
    
    return $vizitki_cats;
  }
  
  //
  // END METHOD vizitki_categories_generate()
  //
  
  
  
  
  
  
  
  //
  // BEGIN METHOD vizitki_subscription_create()
  //
  // OVERVIEW:
	//    Subscribes the current user to the specified user's vizitki
  //
	// INPUT:
  //    $vizitki_owner_user_id   The user id of the owner of the vizitki to subscribe to
  //
	// OUTPUT:
  //    TRUE if the subscription was create, otherwise FALSE
  //
  
  function vizitki_subscription_create($vizitki_owner_user_id)
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
        se_vizitkisubscriptions
      WHERE
        vizitkisubscription_user_id='{$user->user_info['user_id']}' &&
        vizitkisubscription_owner_id='{$vizitki_owner_user_id}'
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
      INSERT INTO se_vizitkisubscriptions (
        vizitkisubscription_user_id,
        vizitkisubscription_owner_id,
        vizitkisubscription_date
      ) VALUES (
        '{$user->user_info['user_id']}',
        '{$vizitki_owner_user_id}',
        '{$time}'
      )
    ";
    
    $resource = $database->database_query($sql);
    
    return ( $database->database_affected_rows($resource) ? $database->database_insert_id() : FALSE );
  }
  
  //
  // END METHOD vizitki_subscription_create()
  //
  
  
  
  
  
  
  
  //
  // BEGIN METHOD vizitki_subscription_exists()
  //
  // OVERVIEW:
	//    Does the specified subscription exist
  //
	// INPUT:
  //    $vizitki_owner_user_id         The user id of the owner
  //    $vizitki_subscriber_user_id    The user id of the subscriber
  //
	// OUTPUT:
  //    TRUE if the subscription exists, otherwise FALSE
  //
  
  function vizitki_subscription_exists($vizitki_owner_user_id, $vizitki_subscriber_user_id)
  {
    global $database, $user;
    
    // MUST BE LOGGED IN AND NOT SELF
    if( !$vizitki_subscriber_user_id || !$vizitki_owner_user_id || $vizitki_owner_user_id==$vizitki_subscriber_user_id )
      return FALSE;
    
    // CHECK FOR EXISTING SUBSCRIPTION
    $sql = "
      SELECT
        NULL
      FROM
        se_vizitkisubscriptions
      WHERE
        vizitkisubscription_user_id='{$vizitki_subscriber_user_id}' &&
        vizitkisubscription_owner_id='{$vizitki_owner_user_id}'
      LIMIT
        1
    ";
    
    $resource = $database->database_query($sql);
    
    return (bool) $database->database_num_rows($resource);
  }
  
  //
  // END METHOD vizitki_subscription_exists()
  //
  
  
  
  
  
  
  
  //
  // BEGIN METHOD vizitki_subscription_delete()
  //
  // OVERVIEW:
	//    Unsubscribes the current user from the specified user's vizitki
  //
	// INPUT:
  //    $vizitki_owner_user_id   The user id of the owner of the vizitki to unsubscribe from
  //
	// OUTPUT:
  //    TRUE if the subscription was deleted, otherwise FALSE
  //
  
  function vizitki_subscription_delete($vizitki_owner_user_id)
  {
    global $database, $user;
    
    // MUST BE LOGGED IN
    if( !$user->user_exists || !$user->user_info['user_id'] )
      return FALSE;
    
    // DELETE
    $sql = "
      DELETE FROM
        se_vizitkisubscriptions
      WHERE
        vizitkisubscription_user_id='{$user->user_info['user_id']}' &&
        vizitkisubscription_owner_id='{$vizitki_owner_user_id}'
      LIMIT
        1
    ";
    
    $resource = $database->database_query($sql);
    
    return (bool) $database->database_affected_rows($resource);
  }
  
  //
  // END METHOD vizitki_subscription_delete()
  //
  
  
  
  
  
  
  
  //
  // BEGIN METHOD vizitki_subscription_total()
  //
  // OVERVIEW:
	//    Count of vizitki subscriptions
  //
	// INPUT:
  //    $where      SQL WHERE
  //
	// OUTPUT:
  //    Count of vizitki subscriptions
  //
  
  function vizitki_subscription_total($where=NULL)
  {
    global $database, $user;
    
    // Generate query
    $sql = "
      SELECT
        COUNT(*) AS vizitkisubscription_count
      FROM
        se_vizitkisubscriptions
      WHERE
        se_vizitkisubscriptions.vizitkisubscription_user_id='{$user->user_info['user_id']}'
    ";
    
    if( !empty($where) )
      $sql .= " && $where";
    
    $resource = $database->database_query($sql);
    $result = $database->database_fetch_assoc($resource);
    
    return ( !empty($result['vizitkisubscription_count']) ? $result['vizitkisubscription_count'] : 0 );
  }
  
  //
  // END METHOD vizitki_subscription_total()
  //
  
  
  
  
  
  
  
  //
  // BEGIN METHOD vizitki_subscription_list()
  //
  // OVERVIEW:
	//    Lists vizitki subscriptions
  //
	// INPUT:
  //    $start                SQL START
  //    $limit                SQL LIMIT
  //    $order_by             SQL ORDER BY
  //    $where                SQL WHERE
  //    $getmostrecententry   SQL WHERE
  //
	// OUTPUT:
  //    Array of vizitki subscriptions
  //
  
  function vizitki_subscription_list($start=NULL, $limit=NULL, $order_by=NULL, $where=NULL, $getmostrecententry=FALSE)
  {
    global $database, $user;
    
    if( !$start           ) $start = '0';
    if( !isset($limit)    ) $limit = 20;
    if( empty($order_by)  ) $order_by = "se_vizitkisubscriptions.vizitkisubscription_date DESC";
    
    // Generate query
    $sql = "
      SELECT
        se_vizitkisubscriptions.*,
        se_users.user_id,
        se_users.user_username,
        se_users.user_photo,
        se_users.user_fname,
        se_users.user_lname
    ";
    
    if( $getmostrecententry ) $sql .= ",
        se_vizitkientries.*
    ";
    
    $sql .= "
      FROM
        se_vizitkisubscriptions
      LEFT JOIN
        se_users
        ON se_users.user_id=se_vizitkisubscriptions.vizitkisubscription_owner_id
    ";
    
    if( $getmostrecententry ) $sql .= "
      LEFT JOIN
        se_vizitkientries
        ON (
          se_vizitkientries.vizitkientry_user_id=se_vizitkisubscriptions.vizitkisubscription_owner_id &&
          se_vizitkientries.vizitkientry_id=(
            SELECT
              se_vizitkientries.vizitkientry_id
            FROM
              se_vizitkientries
            WHERE
              (se_vizitkientries.vizitkientry_search IS NULL || se_vizitkientries.vizitkientry_search=1) && 
              se_vizitkientries.vizitkientry_user_id=se_vizitkisubscriptions.vizitkisubscription_owner_id
            ORDER BY
              se_vizitkientries.vizitkientry_date DESC
            LIMIT
              1
          )
        )
    ";
    
    $sql .= "
      WHERE
        se_vizitkisubscriptions.vizitkisubscription_user_id='{$user->user_info['user_id']}'
    ";
    
    if( !empty($where) )
      $sql .= " && $where";
    
    if( $getmostrecententry ) $sql .= "
      GROUP BY
        se_vizitkisubscriptions.vizitkisubscription_owner_id
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
    $vizitkisubscription_list = array();
    
    while( $result=$database->database_fetch_assoc($resource) )
    {
      // Create vizitki entry author object
      $author = new se_user();
      $author->user_info['user_id'] = $result['user_id'];
      $author->user_info['user_username'] = $result['user_username'];
      $author->user_info['user_photo'] = $result['user_photo'];
      $author->user_info['user_fname'] = $result['user_fname'];
      $author->user_info['user_lname'] = $result['user_lname'];
      $author->user_displayname();
      $result['vizitki_author'] =& $author;
      unset($author);
      
      $vizitkisubscription_list[] = $result;
    }
    
    return $vizitkisubscription_list;
  }
  
  //
  // END METHOD vizitki_subscription_list()
  //
  
  
  
  
  
  
  
  //
  // BEGIN METHOD vizitki_subscription_entry_list()
  //
  // OVERVIEW:
	//    Lists recent vizitkis from the specified user's subscriptions
  //
	// INPUT:
  //    $start      SQL START
  //    $limit      SQL LIMIT
  //    $order_by   SQL ORDER BY
  //    $where      SQL WHERE
  //
	// OUTPUT:
  //    Array of vizitkientries
  //
  
  function vizitki_subscription_entry_list($start=NULL, $limit=NULL, $order_by=NULL, $where=NULL)
  {
    global $database, $user;
    
    if( !$start         ) $start = '0';
    if( !isset($limit)  ) $limit = 20;
    
    // Generate query
    $sql = "
      SELECT
        se_vizitkientries.*,
        se_vizitkientrycats.*,
        se_users.user_id,
        se_users.user_username,
        se_users.user_photo,
        se_users.user_fname,
        se_users.user_lname
      FROM
        se_vizitkisubscriptions
      LEFT JOIN
        se_vizitkientries
        ON se_vizitkientries.vizitkientry_user_id=se_vizitkisubscriptions.vizitkisubscription_owner_id
      LEFT JOIN
        se_vizitkientrycats
        ON se_vizitkientrycats.vizitkientrycat_id=se_vizitkientries.vizitkientry_vizitkientrycat_id
      LEFT JOIN
        se_users
        ON se_user.user_id=se_vizitkisubscriptions.vizitkisubscription_owner_id
    ";
    
    $sql .= "
      WHERE
        se_vizitkisubscriptions.vizitkisubscription_user_id='{$user->user_info['user_id']}' &&
        CASE
          WHEN se_vizitkientries.vizitkientry_user_id='{$user->user_info['user_id']}'
            THEN TRUE
          WHEN ((se_vizitkientries.vizitkientry_privacy & @SE_PRIVACY_REGISTERED) AND '{$user->user_exists}'<>0)
            THEN TRUE
          WHEN ((se_vizitkientries.vizitkientry_privacy & @SE_PRIVACY_ANONYMOUS) AND '{$user->user_exists}'=0)
            THEN TRUE
          WHEN ((se_vizitkientries.vizitkientry_privacy & @SE_PRIVACY_FRIEND) AND (SELECT TRUE FROM se_friends WHERE friend_user_id1=se_vizitkientries.vizitkientry_user_id AND friend_user_id2='{$user->user_info['user_id']}' AND friend_status='1' LIMIT 1))
            THEN TRUE
          WHEN ((se_vizitkientries.vizitkientry_privacy & @SE_PRIVACY_SUBNET) AND '{$user->user_exists}'<>0 AND (SELECT TRUE FROM se_users WHERE user_id=se_vizitkientries.vizitkientry_user_id AND user_subnet_id='{$user->user_info['user_subnet_id']}' LIMIT 1))
            THEN TRUE
          WHEN ((se_vizitkientries.vizitkientry_privacy & @SE_PRIVACY_FRIEND2) AND (SELECT TRUE FROM se_friends AS friends_primary LEFT JOIN se_users ON friends_primary.friend_user_id1=se_users.user_id LEFT JOIN se_friends AS friends_secondary ON friends_primary.friend_user_id2=friends_secondary.friend_user_id1 WHERE friends_primary.friend_user_id1=se_vizitkientries.vizitkientry_user_id AND friends_secondary.friend_user_id2='{$user->user_info['user_id']}' AND se_users.user_subnet_id='{$user->user_info['user_subnet_id']}' LIMIT 1))
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
    $vizitkientry_list = array();
    
    while( $result=$database->database_fetch_assoc($resource) )
    {
      // Create vizitki entry author object
      $author = new se_user();
      $author->user_info['user_id'] = $result['user_id'];
      $author->user_info['user_username'] = $result['user_username'];
      $author->user_info['user_photo'] = $result['user_photo'];
      $author->user_info['user_fname'] = $result['user_fname'];
      $author->user_info['user_lname'] = $result['user_lname'];
      $result['vizitkientry_author'] =& $author;
      
      $vizitkientry_list[] = $result;
      unset($author);
    }
    
    return $vizitkientry_list;
  }
  
  //
  // END METHOD vizitki_subscription_entry_list()
  //
  
  
  
  
  
  
  
  //
  // BEGIN METHOD vizitki_subscription_notification()
  //
  // OVERVIEW:
	//    Lists recent vizitkis from the specified user's subscriptions
  //
	// INPUT:
  //
	// OUTPUT:
  //
  
  function vizitki_subscription_notification($newvizitkientry_id, $newvizitkientry_title, $newvizitkientry_privacy=1)
  {
    global $database, $user, $url, $notify;
    
    // Quick fix for self
    if( !$newvizitkientry_privacy || $newvizitkientry_privacy==1 )
      return;
    
    // Generate query
    $sql = "
      SELECT
        se_vizitkisubscriptions.*,
        subscriber.user_id,
        subscriber.user_username,
        subscriber.user_fname,
        subscriber.user_lname,
        subscriber.user_email,
        subscriber_settings.usersetting_notify_newvizitkisubscriptionentry
      FROM
        se_vizitkisubscriptions
      LEFT JOIN
        se_users AS subscriber
        ON subscriber.user_id=se_vizitkisubscriptions.vizitkisubscription_user_id
      LEFT JOIN
        se_usersettings AS subscriber_settings
        ON subscriber_settings.usersetting_user_id=subscriber.user_id
      WHERE
        se_vizitkisubscriptions.vizitkisubscription_owner_id='{$user->user_info['user_id']}' &&
        CASE
          /* DO NOT SEND AN EMAIL TO SELF, BESIDES THEY SHOULDNT BE SUBSCRIBED TO THEIR OWN vizitki... */
          WHEN subscriber.user_id='{$user->user_info['user_id']}'
            THEN FALSE
          /* IGNORE MISSING USERS */
          WHEN (({$newvizitkientry_privacy} & @SE_PRIVACY_ANONYMOUS) AND subscriber.user_id IS NULL)
            THEN FALSE
          /* NORMAL */
          WHEN (({$newvizitkientry_privacy} & @SE_PRIVACY_REGISTERED) AND subscriber.user_id IS NOT NULL)
            THEN TRUE
          WHEN (({$newvizitkientry_privacy} & @SE_PRIVACY_FRIEND) AND (SELECT TRUE FROM se_friends WHERE friend_user_id1='{$user->user_info['user_id']}' AND friend_user_id2=subscriber.user_id AND friend_status='1' LIMIT 1))
            THEN TRUE
          WHEN (({$newvizitkientry_privacy} & @SE_PRIVACY_SUBNET) AND (SELECT TRUE FROM se_users WHERE user_id='{$user->user_info['user_id']}' AND user_subnet_id=subscriber.user_subnet_id LIMIT 1))
            THEN TRUE
          WHEN (({$newvizitkientry_privacy} & @SE_PRIVACY_FRIEND2) AND (
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
    
    $vizitkientry_url = $url->url_create('vizitki_entry', $user->user_info['user_username'], $newvizitkientry_id);
    
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
        "newvizitkisubscriptionentry",
        $newvizitkientry_id,
        Array(
          $user->user_info['user_username'],
          $newvizitkientry_id
        ),
        Array(
          $newvizitkientry_title
        )
      );
      
      // EMAIL NOTIFICATION
      if( !empty($result['user_email']) && $result['usersetting_notify_newvizitkisubscriptionentry'] )
      {
        
        send_systememail('newvizitkisubscriptionentry', $result['user_email'], Array(
          $recipient_object->user_displayname,
          $user->user_displayname,
          "<a href=\"$vizitkientry_url\">$vizitkientry_url</a>"
        ));
      }
      
      unset($recipient_object);
    }
  }
  
  //
  // END METHOD vizitki_subscription_notification()
  //
  
  
  
  
  
  
  
  //
  // BEGIN METHOD vizitki_trackback_generate()
  //
  // OVERVIEW:
	//    Creates the RDF signature used for trackback auto discovery
  //
	// INPUT:
  //    &$vizitkientry_info   An array of info about the vizitki
  //
	// OUTPUT:
  //    The RDF signature
  //
  
  function vizitki_trackback_generate(&$vizitkientry_info)
  {
    global $url, $owner;
    
    $trackback = new Trackback(NULL, $owner->user_displayname, "UTF-8");
    
    return $trackback->rdf_autodiscover(
      date("r", $vizitkientry_info['vizitkientry_date']),
      $vizitkientry_info['vizitkientry_title'],
      $vizitkientry_info['vizitkientry_body'],
      $url->url_create('vizitki_entry', $owner->user_info['user_username'], $vizitkientry_info['vizitkientry_id']),
      $url->url_create('vizitki_trackback', $owner->user_info['user_username'], $vizitkientry_info['vizitkientry_id']),
      $owner->user_displayname
    );
  }
  
  //
  // END METHOD vizitki_trackback_generate()
  //
  
  
  
  
  
  
  
  //
  // BEGIN METHOD vizitki_trackback_receive()
  //
  // OVERVIEW:
	//    Used to receive a trackback send request from a remote server
  //
	// INPUT:
  //    void
  //
	// OUTPUT:
  //    A trackback XML response
  //
  
  function vizitki_trackback_receive()
  {
    global $database, $user, $setting;
    
    $is_error = FALSE;
    
    // Create trackback class instance
    $trackback = new Trackback(NULL, NULL, "UTF-8");
    
    // Prepare data
    $trackback_eid          = $trackback->e_id;
    $trackback_url          = trim($trackback->url);
    $trackback_title        = trim($trackback->title);
    $trackback_excerpt      = trim($trackback->excerpt);
    $trackback_bname        = trim($trackback->bname);
    $trackback_ip           = $_SERVER['REMOTE_ADDR'];
    $trackback_time         = time();
    $trackback_excerpthash  = md5($trackback_excerpt);
    
    // Clean body
	  $trackback_excerpt = str_replace("\r\n", "<br />", cleanHTML(censor(htmlspecialchars_decode($trackback_excerpt)), $setting['setting_comment_html']));
    
    // Trackbacks not allowed
    if( !$user->level_info['level_vizitki_trackbacks_allow'] )
      $is_error = 1500013;
    
    // No ID specified
    if( !$trackback_eid )
      $is_error = 1500008;
      
    // Trackback URL is empty
    if( !$trackback_url )
      $is_error = 1500009;
    
    // Get entry info. TODO: switch to SELECT NULL?
    if( !$is_error )
    {
      $sql = "
        SELECT
          NULL
        FROM
          se_vizitkientries
        WHERE
          se_vizitkientries.vizitkientry_id='{$trackback_eid}'
        LIMIT
          1
      ";
      
      $resource = $database->database_query($sql);
      
      // Entry not found
      if( !$database->database_num_rows($resource) )
        $is_error = 1500010;
    }
    
    
    // See if trackback has already been received
    if( !$is_error )
    {
      $sql = "
        SELECT
          NULL
        FROM
          se_vizitkitrackbacks
        WHERE
          vizitkitrackback_vizitkientry_id='{$trackback_eid}' &&
          vizitkitrackback_name='{$trackback_bname}' &&
          vizitkitrackback_excerpthash='{$trackback_excerpthash}'
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
      $trackback_timeout = 15;
      
      $sql = "
        SELECT
          NULL
        FROM
          se_vizitkitrackbacks
        WHERE
          vizitkitrackback_ip='{$trackback_ip}' &&
          vizitkitrackback_date>".($trackback_time - $trackback_timeout)."
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
        INSERT INTO se_vizitkitrackbacks
        (
          vizitkitrackback_vizitkientry_id,
          vizitkitrackback_name,
          vizitkitrackback_title,
          vizitkitrackback_excerpt,
          vizitkitrackback_excerpthash,
          vizitkitrackback_url,
          vizitkitrackback_ip,
          vizitkitrackback_date
        ) VALUES (
          '{$trackback_eid}',
          '{$trackback_bname}',
          '{$trackback_title}',
          '{$trackback_excerpt}',
          '{$trackback_excerpthash}',
          '{$trackback_url}',
          '{$trackback_ip}',
          '{$trackback_time}'
        )
      ";
      
      $resource = $database->database_query($sql);
      
      if( !$database->database_affected_rows($resource) )
        $is_error = 1500013;
      
      
      // UPDATE TRACKBACK COUNT
      $sql = "UPDATE se_vizitkientries SET vizitkientry_totaltrackbacks=vizitkientry_totaltrackbacks+1 WHERE vizitkientry_id='{$trackback_eid}' LIMIT 1";
      $database->database_query($sql);
    }
    
    
    
    // LOG
    if( empty($vizitkientry_url) && !empty($_SERVER['HTTP_REFERER']) )
      $vizitkientry_url = $_SERVER['HTTP_REFERER'];
    if( empty($vizitkientry_url) && !empty($_SERVER['REMOTE_ADDR']) )
      $vizitkientry_url = $_SERVER['REMOTE_ADDR'];
    
    $sql = "
      INSERT INTO se_vizitkipings
      (
        vizitkiping_vizitkientry_id,
        vizitkiping_target_url,
        vizitkiping_source_url,
        vizitkiping_status,
        vizitkiping_type,
        vizitkiping_ip
      ) VALUES (
        '{$trackback_eid}',
        '".$database->database_real_escape_string($_SERVER['REQUEST_URI'])."',
        '".$database->database_real_escape_string($vizitkientry_url)."',
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
    
    return $trackback->recieve(!$is_error, $message);
  }
  
  //
  // END METHOD vizitki_trackback_receive()
  //
  
  
  
  
  
  
  
  //
  // BEGIN METHOD vizitki_trackback_send()
  //
  // OVERVIEW:
	//    Sends a trackback to a remote server
  //
	// INPUT:
  //    $ping_urls              An array of trackback URLs
  //    $vizitkientry_id           The id of the local vizitkientry
  //    $vizitkientry_title        The title of the local vizitkientry
  //    &$vizitkientry_body        The body of the local vizitkientry
  //
	// OUTPUT:
  //    'result'                Whether or not it was successful
  //    'trackback_results'     An array of results for each trackback url
  //
  
  function vizitki_trackback_send($ping_urls, $vizitkientry_id, $vizitkientry_title, &$vizitkientry_body)
  {
    global $database, $user, $url, $setting;
    
    // Trackback class
    $trackback = new Trackback($user->user_displayname."'s vizitki", $user->user_displayname, "UTF-8");
    
    // Prepare data
    $vizitkientry_excerpt = ( strlen($vizitkientry_body)>255 ? substr($vizitkientry_body, 0, 254) : $vizitkientry_body );
    $vizitkientry_url = $url->url_create('vizitki_entry', $user->user_info['user_username'], $vizitkientry_id);
    
    // Allow multiple trackbacks
    if( !is_array($ping_urls) )
      $ping_urls = array($ping_urls);
    
    // Detect trackbacks
    if( $user->level_info['level_vizitki_trackbacks_detect'] )
    {
      $detected_trackback_urls = $trackback->auto_discovery($vizitkientry_body);
      $ping_urls = array_merge($ping_urls, $detected_trackback_urls);
    }
    
    $ping_urls = array_unique(array_filter($ping_urls));
    
    // Ping the trackback urls (and generate ping log query)
    $sql = "INSERT INTO se_vizitkipings (vizitkiping_vizitkientry_id, vizitkiping_target_url, vizitkiping_source_url, vizitkiping_status, vizitkiping_type, vizitkiping_ip) VALUES ";
    $isFirst = TRUE;
    
    $trackback_results = array();
    foreach( $ping_urls as $ping_url )
    {
      $tb_result = $trackback->ping($ping_url, $vizitkientry_url, $vizitkientry_title, $vizitkientry_excerpt);
      
      if( $tb_result=="1" )
        $trackback_results[$ping_url] = "Could not connect";
      elseif( $tb_result=="2" )
        $trackback_results[$ping_url] = "Success";
      elseif( $tb_result=="3" )
        $trackback_results[$ping_url] = "An error occurred";
      else
        $trackback_results[$ping_url] = "An unknown error has occurred";
      
      if( !$isFirst ) $sql .= ',';
      $sql .= "('$vizitkientry_id', '".$database->database_real_escape_string($ping_url)."', '".$database->database_real_escape_string($_SERVER['REQUEST_URI'])."', 1, 1, '{$_SERVER['REMOTE_ADDR']}')";
      
      $isFirst = FALSE;
    }
    
    if( !$isFirst )
      $resource = $database->database_query($sql);
    
    return array(
      'result' => TRUE,
      'trackback_results' => $results
    );
  }
  
  //
  // END METHOD vizitki_trackback_send()
  //
  
  
  
  
  
  
  
  //
  // BEGIN METHOD vizitki_trackback_total()
  //
  // OVERVIEW:
	//    Gets a count of trackbacks stored on the local server
  //
	// INPUT:
  //    $where                ---
  //
	// OUTPUT:
  //    The number of trackbacks
  //
  
  function vizitki_trackback_total($where=NULL)
  {
    global $database;
    
    $sql = "
      SELECT
        COUNT(*) AS trackback_count
      FROM
        se_vizitkitrackbacks
    ";
    
    if( $where ) $sql .= "
      WHERE
        $where
    ";
    
    $resource = $database->database_query($sql);
    $result = $database->database_fetch_assoc($resource);
    
    return ( !empty($result['trackback_count']) ? $result['trackback_count'] : 0 );
  }
  
  //
  // END METHOD vizitki_trackback_total()
  //
  
  
  
  
  
  
  
  //
  // BEGIN METHOD vizitki_trackback_list()
  //
  // OVERVIEW:
	//    Gets a list of trackbacks stored on the local server
  //
	// INPUT:
  //    $where                ---
  //
	// OUTPUT:
  //    A list of trackbacks
  //
  
  function vizitki_trackback_list($start=NULL, $limit=NULL, $order='vizitkitrackback_date ASC', $where=NULL)
  {
    global $database;
    
    if( !$limit ) $limit = 20;
    
    $sql = "
      SELECT
        *
      FROM
        se_vizitkitrackbacks
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
    
    $trackbacks = array();
    while( $result=$database->database_fetch_assoc($resource) )
      $trackbacks[] = $result;
    
    return $trackbacks;
  }
  
  //
  // END METHOD vizitki_trackback_list()
  //
  
  
  
  
  
  function vizitki_category_create($category_title, $parent_category_id=NULL)
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
    elseif( !is_object($user) || !$user->user_exists || !$user->level_info['level_vizitki_category_create'] )
    {
      return FALSE;
    }
    
    // INSERT
    $category_title = addslashes($category_title);
    
    $sql = "
      INSERT INTO se_vizitkientrycats (
        vizitkientrycat_title,
        vizitkientrycat_user_id,
        vizitkientrycat_languagevar_id,
        vizitkientrycat_parentcat_id
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
  
  
  
  
  
  function vizitki_category_list($user_id=FALSE)
  {
    global $database;
    
    $sql = "SELECT * FROM se_vizitkientrycats ";
    
    if( $user_id!==TRUE && $user_id>0 )
      $sql .= "WHERE vizitkientrycat_user_id=0 || vizitkientrycat_user_id='{$user_id}' ";
    elseif( $user_id===FALSE )
      $sql .= "WHERE vizitkientrycat_user_id=0 ";
    
    $sql .= "ORDER BY vizitkientrycat_id ASC";
    
    $resource = $database->database_query($sql);
    
    $vizitkientrycats_array = array();
    while( $result=$database->database_fetch_assoc($resource) )
    {
      // PRELOAD
      if( !empty($result['vizitkientrycat_languagevar_id']) )
        SE_Language::_preload($result['vizitkientrycat_languagevar_id']);
      
      $vizitkientrycats_array[] = $result;
    }
    
    return $vizitkientrycats_array;
  }
  
}

?>