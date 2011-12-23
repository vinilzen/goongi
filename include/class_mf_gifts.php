<? include_once("resize.php");
<<<<<<< HEAD
define('APP_ROOT', dirname(dirname(__FILE__)));
=======

>>>>>>> 090a87080da322dc25d17106a926f1e8d957961f
class mf_gifts {

	function user_info($username){
		global $database;
		$user_data = $database->database_fetch_assoc($database->database_query("SELECT * FROM se_users WHERE user_username = '$username'"));
		return $user_data;
	}

	function user_gifts_total($to_id) {
		global $database;
		$total_user_gifts = $database->database_num_rows($database->database_query("SELECT * FROM mf_gifts WHERE to_id=$to_id"));
		return $total_user_gifts;
	}

	function save_data($data){
		global $database, $url, $actions, $user, $notify;
		$user_data = $database->database_fetch_assoc($database->database_query("SELECT * FROM se_users WHERE user_id = '$data[to_user]'"));
		$gift_data = $database->database_fetch_assoc($database->database_query("SELECT * FROM mf_gifts_data WHERE id = '$data[gift_id]'"));
		$user_data_dn = $user_data[user_fname]." ".$user_data[user_lname];
		$date = time();
		$hits = $gift_data[hits]+1;
		$database->database_query("INSERT INTO `mf_gifts` (`from_id` , `to_id` , `gift` , `message` , `private` , `date`, `filetype`, `lang` ) VALUES ('$data[from_id]', '$user_data[user_id]', '$data[gift_id]', '$data[message]', '$data[private]', '$date', '$gift_data[filetype]', '$gift_data[lang]')");
		$database->database_query("UPDATE mf_gifts_data SET hits='$hits' WHERE id = $gift_data[id]");
		send_systememail('newgift', ''.$user_data[user_email].'', Array($user_data[user_username], $data[from_dn], "<a href=\"".$url->url_base."login.php\">".$url->url_base."login.php</a>"));
		$notify->notify_add($data[to_user], 'newgift', 0, Array($user_data[user_username]));
		if($data['private'] != 1) {
			$actions->actions_add($user, "sendgift", Array($data[from_un], $data[from_dn], $user_data[user_username], $user_data_dn));
		}
		return true;
	}

	function create_category($new_category){
		global $database;
		$new_category = substr($new_category,0,255);
		$new_category = htmlspecialchars(stripslashes($new_category));
		$new_type = $database->database_query("INSERT INTO mf_gifts_type (status) VALUES ('1')");
		$cat_id = $database->database_insert_id();
		$cat_lang_id = 80000100 + $cat_id;
		$new_type_lng = $database->database_query("INSERT INTO `se_languagevars` (`languagevar_id`, `languagevar_language_id`, `languagevar_value`, `languagevar_default`) VALUES ('$cat_lang_id', '".$_POST['language_id']."', '$new_category', '')");
		$database->database_query("UPDATE mf_gifts_type SET	lang ='$cat_lang_id' WHERE id=$cat_id");
		header("Location: admin_gifts.php");
	}

	function upload($gift_title, $category, $language_id, $file, $width, $height){
		global $database;
		$gift_title = substr($gift_title,0,255);
		$gift_title = htmlspecialchars(stripslashes($gift_title));
		$extension = strtolower(substr(strrchr($file_name, "."), 1));
		$add_date = time ();
		$database->database_query("INSERT INTO `mf_gifts_data` (`filetype`, `type`, `status`, `date`) VALUES ('$extension', '$category', '1', '$add_date')");
		$last_id = $database->database_insert_id();
		$gift_lang_id = 80000500 + $last_id;
		$database->database_query("INSERT INTO `se_languagevars` (`languagevar_id`, `languagevar_language_id`, `languagevar_value`, `languagevar_default`) VALUES ('$gift_lang_id', '$language_id', '$gift_title', '')");
		$database->database_query("UPDATE mf_gifts_data SET lang ='$gift_lang_id' WHERE id='$last_id'");
		$newname = $last_id.".".$extension;
		$newname_thumb = $last_id."_thumb.".$extension;
		$uploaddir = APP_ROOT."/mf_gifts/";

				move_uploaded_file($file, $uploaddir.$newname);
		resize($uploaddir.$newname, $width, $height, $uploaddir.$newname_thumb);
		header("Location: admin_gifts.php");
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

	function deletecategory($category){
		global $database;
		$delete_query = $database->database_query("SELECT * FROM mf_gifts_data WHERE type = $category");
		while($gifts = $database->database_fetch_assoc($delete_query)) {
			$database->database_query('DELETE FROM se_languagevars WHERE languagevar_id = '.$gifts[lang].'');
			$database->database_query('DELETE FROM mf_gifts WHERE gift = '.$gifts[id].'');
			$database->database_query('DELETE FROM mf_gifts_data WHERE id = '.$gifts[id].'');
			if(!empty($gifts)){
				unlink(APP_ROOT."/mf_gifts/$gifts[id].$gifts[filetype]");
				unlink(APP_ROOT."/mf_gifts/$gifts[id]_thumb.$gifts[filetype]");
			}
		}
		$cat = $database->database_fetch_assoc($database->database_query('SELECT id, lang FROM mf_gifts_type WHERE id = '.$_GET[category_id].''));
		$database->database_query('DELETE FROM se_languagevars WHERE languagevar_id = '.$cat[lang].'');
		$database->database_query('DELETE FROM mf_gifts_type WHERE id = '.$cat[id].'');
		header("Location: admin_gifts.php");
	}

}
?>