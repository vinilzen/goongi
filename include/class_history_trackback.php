<?php

/**
 * PHP Class to handle Trackback_historys (send/ping, receive, retreive, detect, seed, etc...)
 * 
 * <code><?php
 * include('Trackback_history_cls.php');
 * $Trackback_history = new Trackback_history('historyish', 'Ran Aroussi', 'UTF-8');
 * ?></code>
 * 
 * ==============================================================================
 * 
 * @version $Id: class_history_Trackback_history.php 1 2009-01-10 12:24:57Z john $
 * @copyright Copyright (c) 2004 Ran Aroussi (http://www.historyish.org)
 * @author Ran Aroussi <ran@historyish.org> 
 * @license http://opensource.org/licenses/gpl-license.php GNU General Public License (GPL)
 * 
 * ==============================================================================
 */

/**
 * Trackback_history - The main class
 * 
 * @param string $history_name 
 * @param string $author 
 * @param string $encoding 
 */

class Trackback_history
{
  var $history_name = '';    // Default history name used throughout the class (ie. historyish)
  var $author = '';       // Default author name used throughout the class (ie. Ran Aroussi)
  var $encoding = '';     // Default encoding used throughout the class (ie. UTF-8)
  
  var $e_id = NULL;
  var $bname = NULL;
  
  var $get_e_id = '';     // Retreives and holds $_GET['e_id'] (if not empty)
  var $post_e_id = '';    // Retreives and holds $_POST['e_id'] (if not empty)
  var $url = '';          // Retreives and holds $_POST['url'] (if not empty)
  var $title = '';        // Retreives and holds $_POST['title'] (if not empty)
  var $excerpt = '';      // Retreives and holds $_POST['excerpt'] (if not empty)
  
  
  
  /**
   * Class Constructure
   * 
   * @param string $history_name 
   * @param string $author 
   * @param string $encoding 
   * @return 
   */
  
  function Trackback_history($history_name, $author, $encoding = "UTF-8")
  {
    $this->history_name = $history_name;
    $this->author = $author;
    $this->encoding = $encoding; 
    
    // Gather $_POST information
    $this->e_id     = ( !empty($_POST['e_id'])      ? $_POST['e_id']      : ( !empty($_GET['e_id'])       ? $_GET['e_id']       : NULL ) );
    $this->url      = ( !empty($_POST['url'])       ? $_POST['url']       : ( !empty($_GET['url'])        ? $_GET['url']        : NULL ) );
    $this->title    = ( !empty($_POST['title'])     ? $_POST['title']     : ( !empty($_GET['title'])      ? $_GET['title']      : NULL ) );
    $this->excerpt  = ( !empty($_POST['excerpt'])   ? $_POST['excerpt']   : ( !empty($_GET['excerpt'])    ? $_GET['excerpt']    : NULL ) );
    $this->bname    = ( !empty($_POST['history_name']) ? $_POST['history_name'] : ( !empty($_GET['history_name'])  ? $_GET['history_name']  : NULL ) );
    
    // Old
    if( isset($_GET['e_id']) )
      $this->get_e_id = $_GET['e_id'];
    
    if( isset($_POST['e_id']) )
      $this->post_e_id = $_POST['e_id'];
  } 
  
  
  
  /**
   * Sends a Trackback_history ping to a specified Trackback_history URL.
   * allowing clients to auto-discover the Trackback_history Ping URL. 
   * 
   * <code><?php
   * include('Trackback_history_cls.php');
   * $Trackback_history = new Trackback_history('historyish', 'Ran Aroussi', 'UTF-8');
   * if ($Trackback_history->ping('http://tracked-history.com', 'http://your-url.com', 'Your entry title')) {
   * 	echo "Trackback_history sent successfully...";
   * } else {
   * 	echo "Error sending Trackback_history....";
   * }
   * ?></code>
   * 
   * @param string $tb 
   * @param string $url 
   * @param string $title 
   * @param string $excerpt 
   * @return boolean 
   */
  
  function ping($tb, $url, $title = "", $excerpt = "")
  {
    $response = "";
    $reason = ""; 
    
    // Set default values
    if (empty($title)) {
        $title = "Trackback_historying your entry...";
    } 
    if (empty($excerpt)) {
        $excerpt = "I found your entry interesting do I've added a Trackback_history to it on my wehistory :)";
    } 
    
    // Parse the target
    $target = parse_url($tb);
    
    if ((isset($target["query"])) && ($target["query"] != "")) {
        $target["query"] = "?" . $target["query"];
    } else {
        $target["query"] = "";
    } 
    
    if ((isset($target["port"]) && !is_numeric($target["port"])) || (!isset($target["port"]))) {
        $target["port"] = 80;
    } 
    
    // Open the socket
    $tb_sock = @fsockopen($target["host"], $target["port"]); 
    
    // Something didn't work out, return
    if (!is_resource($tb_sock)) {
        return "1";
        exit;
    } 
    
    // Put together the things we want to send
    $tb_send = "url=" . rawurlencode($url) . "&title=" . rawurlencode($title) . "&history_name=" . rawurlencode($this->history_name) . "&excerpt=" . rawurlencode($excerpt); 
    $encoding = $this->encoding;
    
    // Send the Trackback_history
    fputs($tb_sock, "POST " . $target["path"] . $target["query"] . " HTTP/1.1\r\n");
    fputs($tb_sock, "Host: " . $target["host"] . "\r\n");
    fputs($tb_sock, "Content-type: application/x-www-form-urlencoded; charset=$encoding\r\n");
    fputs($tb_sock, "Content-length: " . strlen($tb_send) . "\r\n");
    fputs($tb_sock, "Connection: close\r\n\r\n");
    fputs($tb_sock, $tb_send); 
    
    // Gather result
    while (!feof($tb_sock)) {
      $response .= fgets($tb_sock, 128);
    } 
    
    // Close socket
    fclose($tb_sock); 
    
    // Did the Trackback_history ping work
    if( strpos($response, '<error>0</error>') )
    {
      $return = "2";
    }
    else
    {
      $return = "3";
    }
    // send result
    return $return;
  } 
  
  
  
  /**
   * Produces XML response for Trackback_historyers with ok/error message.
   * 
   * <code><?php
   * // Set page header to XML
   * header('Content-Type: text/xml'); // MUST be the 1st line
   * //
   * // Instantiate the class
   * //
   * include('Trackback_history_cls.php');
   * $Trackback_history = new Trackback_history('historyish', 'Ran Aroussi', 'UTF-8');
   * //
   * // Get Trackback_history information
   * //
   * $tb_e_id = $Trackback_history->post_e_id; // The e_id of the item being Trackback_historyed
   * $tb_url = $Trackback_history->url; // The URL from which we got the Trackback_history
   * $tb_title = $Trackback_history->title; // Subject/title send by Trackback_history
   * $tb_excerpt = $Trackback_history->excerpt; // Short text send by Trackback_history
   * //  
   * // Do whatever to log the Trackback_history (save in DB, flatfile, etc...)
   * //
   * if (Trackback_history_LOGGED_SUCCESSFULLY) {
   * 	// Logged successfully...
   * 	echo $Trackback_history->recieve(true);
   * } else {
   * 	// Something went wrong...
   * 	echo $Trackback_history->recieve(false, 'Explain why you return error');
   * }
   * ?></code>
   * 
   * @param boolean $success 
   * @param string $err_response 
   * @return boolean 
   */
  
  function recieve($success = false, $err_response = "")
  { 
    // Default error response in case of problems...
    if (!$success && empty($err_response))
    {
      $err_response = "An error occured while tring to log your Trackback_history...";
    } 
    
    // Start response to Trackback_historyer...
    $return = '<?xml version="1.0" encoding="' . $this->encoding . '"?>' . "\n";
    $return .= "<response> \n"; 
    
    // Send back response...
    if ($success)
    {
      // Trackback_history received successfully...
      $return .= "	<error>0</error> \n";
    }
    else
    {
      // Something went wrong...
      $return .= "	<error>1</error> \n";
      $return .= "	<message>" . $this->xml_safe($err_response) . "</message>\n";
    }
    
    // End response to Trackback_historyer...
    $return .= "</response>";
    
    return $return;
  } 
  
  
  
  /**
   * Feteched Trackback_history information and produces an RSS-0.91 feed.
   * 
   * <code><?php
   * // 1
   * header('Content-Type: text/xml'); // MUST be the 1st line
   * // 2
   * include('Trackback_history_cls.php');
   * $Trackback_history = new Trackback_history('historyish', 'Ran Aroussi', 'UTF-8');
   * // 3
   * $tb_e_id = $Trackback_history->get_e_id;
   * // 4
   * Do whatever to get Trackback_history information by ID (search db, etc...)
   * if (GOT_Trackback_history_INFO) {
   * 	// Successful - pass Trackback_history info as array()...
   * 	$tb_info = array('title' => string Trackback_history_TITLE, 
   * 			'excerpt'	=> string Trackback_history_EXCERPT,
   * 			'permalink' => string PERMALINK_URL,
   * 			'Trackback_history' => string Trackback_history_URL
   * 		);
   * 	echo $Trackback_history->fetch(true, $tb_info);
   * } else {
   * 	// Something went wrong - tell my why...
   * 	echo $Trackback_history->fetch(false, string RESPONSE);
   * }
   * ?></code>
   * 
   * @param boolean $success 
   * @param string $response 
   * @return string XML response to the caller
   */
  
  function fetch($success = false, $response = "")
  {
    if (!$success && empty($response)) {
      $response = "An error occured while tring to retreive Trackback_history information...";
    } 
    // Start response to caller
    $return = '<?xml version="1.0" encoding="' . $this->encoding . '"?>' . "\n";
    $return .= "<response> \n";
    
    // Send back response...
    if ($success)
    {
      // Trackback_history retreived successfully...
      // Sending back an RSS (0.91) - Trackback_history information from $response (array)...
      $return .= "	<error>0</error> \n";
      $return .= "	<rss version=\"0.91\"> \n";
      $return .= "	<channel> \n";
      $return .= "	  <title>" . $this->xml_safe($response['title']) . "</title> \n";
      $return .= "	  <link>" . $this->xml_safe($response['Trackback_history']) . "</link> \n";
      $return .= "	  <description>" . $this->xml_safe($response['excerpt']) . "</description> \n";
      $return .= "	  <item> \n";
      $return .= "		<title>" . $this->xml_safe($response['title']) . "</title> \n";
      $return .= "		<link>" . $this->xml_safe($response['permalink']) . "</link> \n";
      $return .= "		<description>" . $this->xml_safe($response['excerpt']) . "</description> \n";
      $return .= "	  </item> \n";
      $return .= "	</channel> \n";
      $return .= "	</rss> \n";
    }
    else
    {
      // Something went wrong - provide reason from $response (string)...
      $return .= "	<error>1</error> \n";
      $return .= "	<message>" . $this->xml_safe($response) . "</message>\n";
    }
    
    // End response to Trackback_historyer
    $return .= "</response>";
    
    return $return;
  } 
  
  
  
  /**
   * Produces embedded RDF representing metadata about the entry,
   * allowing clients to auto-discover the Trackback_history Ping URL.
   * 
   * NOTE: DATE should be string in RFC822 Format - Use RFC822_from_datetime().
   * 
   * <code><?php
   * include('Trackback_history_cls.php');
   * $Trackback_history = new Trackback_history('historyish', 'Ran Aroussi', 'UTF-8');
   * 
   * echo $Trackback_history->rdf_autodiscover(string DATE, string TITLE, string EXCERPT, string PERMALINK, string Trackback_history [, string AUTHOR]);
   * ?></code>
   * 
   * @param string $RFC822_date 
   * @param string $title 
   * @param string $excerpt 
   * @param string $permalink 
   * @param string $Trackback_history 
   * @param string $author 
   * @return string 
   */
  
  function rdf_autodiscover($RFC822_date, $title, $excerpt, $permalink, $Trackback_history, $author = "")
  {
    if ( !$author )
      $author = $this->author;
    
    $return = "<!-- \n";
    $return .= "<rdf:RDF xmlns:rdf=\"http://www.w3.org/1999/02/22-rdf-syntax-ns#\" \n";
    $return .= "	xmlns:dc=\"http://purl.org/dc/elements/1.1/\" \n";
    $return .= "	xmlns:Trackback_history=\"http://madskills.com/public/xml/rss/module/Trackback_history/\"> \n";
    $return .= "<rdf:Description \n";
    $return .= "	rdf:about=\"" . $this->xml_safe($permalink) . "\" \n";
    $return .= "	dc:identifier=\"" . $this->xml_safe($permalink) . "\" \n";
    $return .= "	Trackback_history:ping=\"" . $this->xml_safe($Trackback_history) . "\" \n";
    $return .= "	dc:title=\"" . $this->xml_safe($title) . "\" \n";
    $return .= "	dc:subject=\"Trackback_history\" \n";
    $return .= "	dc:description=\"" . $this->xml_safe($this->cut_short($excerpt)) . "\" \n";
    $return .= "	dc:creator=\"" . $this->xml_safe($author) . "\" \n";
    $return .= "	dc:date=\"" . $RFC822_date . "\" /> \n";
    $return .= "</rdf:RDF> \n";
    $return .= "-->  \n";
    
    return $return;
  } 
  
  
  
  /**
   * Search text for links, and searches links for Trackback_history URLs.
   * 
   * <code><?php
   * 
   * include('Trackback_history_cls.php');
   * $Trackback_history = new Trackback_history('historyish', 'Ran Aroussi', 'UTF-8');
   * 
   * if ($tb_array = $Trackback_history->auto_discovery(string TEXT)) {
   * 	// Found Trackback_historys in TEXT. Looping...
   * 	foreach($tb_array as $tb_key => $tb_url) {
   * 	// Attempt to ping each one...
   * 		if ($Trackback_history->ping($tb_url, string URL, [string TITLE], [string EXCERPT])) {
   * 			// Successful ping...
   * 			echo "Trackback_history sent to <i>$tb_url</i>...\n";
   * 		} else {
   * 			// Error pinging...
   * 			echo "Trackback_history to <i>$tb_url</i> failed....\n";
   * 		}
   * 	}
   * } else {
   * 	// No Trackback_historys in TEXT...
   * 	echo "No Trackback_historys were auto-discover...\n"
   * }
   * ?></code>
   * 
   * @param string $text 
   * @return array Trackback_history URLs.
   */
  
  function auto_discovery($text)
  { 
    // Get a list of UNIQUE links from text...
    // ---------------------------------------
    // RegExp to look for (0=>link, 4=>host in 'replace')
    $reg_exp = "/(http)+(s)?:(\\/\\/)((\\w|\\.)+)(\\/)?(\\S+)?/i";
    
    // Make sure each link ends with [sapce]
    $text = eregi_replace("www.", "http://www.", $text);
    $text = eregi_replace("http://http://", "http://", $text);
    $text = eregi_replace("\"", " \"", $text);
    $text = eregi_replace("'", " '", $text);
    $text = eregi_replace(">", " >", $text); 
    
    // Create an array with unique links
    $uri_array = array();
    if( preg_match_all($reg_exp, strip_tags($text, "<a>"), $array, PREG_PATTERN_ORDER) )
    {
      foreach( $array[0] as $key => $link )
      {
        foreach( (array(",", ".", ":", ";")) as $t_key => $t_value )
        {
          $link = trim($link, $t_value);
        } 
        $uri_array[] = ($link);
      } 
      $uri_array = array_unique($uri_array);
    }
    
    // Get the Trackback_history URIs from those links...
    // ------------------------------------------
    // Loop through the URIs array and extract RDF segments
    $rdf_array = array(); // <- holds list of RDF segments
    foreach( $uri_array as $key => $link )
    {
      if( $link_content = @implode("", @file($link)) )
      {
        preg_match_all('/(<rdf:RDF.*?<\/rdf:RDF>)/sm', $link_content, $link_rdf, PREG_SET_ORDER);
        for ($i = 0; $i < count($link_rdf); $i++) {
          if (preg_match('|dc:identifier="' . preg_quote($link) . '"|ms', $link_rdf[$i][1])) {
            $rdf_array[] = trim($link_rdf[$i][1]);
          } 
        } 
      } 
    }
    
    // Loop through the RDFs array and extract Trackback_history URIs
    $tb_array = array(); // <- holds list of Trackback_history URIs
    if (!empty($rdf_array)) {
      for ($i = 0; $i < count($rdf_array); $i++) {
        if (preg_match('/Trackback_history:ping="([^"]+)"/', $rdf_array[$i], $array)) {
          $tb_array[] = trim($array[1]);
        } 
      } 
    }
    
    // Return Trackback_historys
    return $tb_array;
  } 
  
  
  
  
  
  
  
  /**
   * Other Useful functions used in this class
   */

  /**
   * Converts MySQL datetime to a standart RFC 822 date format
   * 
   * @param string $datetime 
   * @return string RFC 822 date
   */
  
  function RFC822_from_datetime($datetime)
  {
    $timestamp = mktime(
      substr($datetime, 8, 2),
      substr($datetime, 10, 2),
      substr($datetime, 12, 2),
      substr($datetime, 4, 2),
      substr($datetime, 6, 2),
      substr($datetime, 0, 4)
    );
    
    return date("r", $timestamp);
  } 
  
  
  
  /**
   * Converts a string into an XML-safe string (replaces &, <, >, " and ')
   * 
   * @param string $string 
   * @return string 
   */
  
  function xml_safe($string)
  {
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
  } 
  
  
  
  /**
   * Cuts a string short (with "...") accroding to $max_length...
   * 
   * @param string $string 
   * @param integer $max_length 
   * @return string 
   */
  
  function cut_short($string, $max_length = 255)
  {
    if( strlen($string)>$max_length )
    {
      $string = substr($string, 0, $max_length) . '...';
    } 
    
    return $string;
  } 
} 

?>