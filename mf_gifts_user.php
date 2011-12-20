<?
$page = "mf_gifts_user";
include "header.php";

if(isset($_POST['task'])) { $task = $_POST['task']; } elseif(isset($_GET['task'])) { $task = $_GET['task']; } else { $task = ""; }
if(isset($_POST['p'])) { $p = $_POST['p']; } elseif(isset($_GET['p'])) { $p = $_GET['p']; } else { $p = 1; }
if(isset($_POST['gif_change'])) { $task = $_POST['gif_change']; } elseif(isset($_GET['gif_change'])) { $gif_change = $_GET['gif_change']; } else { $gif_change = ""; }
// PRELOAD LANGUAGE
SE_Language::_preload_multi(80000007);
  
        if (isset($_GET[user]) && $_GET[user] == $owner->user_info[user_username]){
        $ownergift = $owner->user_info[user_id];
        $owner = $owner->user_info[user_username];
        $smarty->assign('owner', $owner);
        $smarty->assign('flag', 0);
        }else{
        $ownergift = $user->user_info[user_id];
        $total_send_query = "SELECT * FROM mf_gifts WHERE from_id=$ownergift";
        $total_send = $database->database_num_rows($database->database_query($total_send_query));
        $owner = $user->user_info[user_username];
        $smarty->assign('total_send', $total_send);
        $smarty->assign('owner', $owner);
        $smarty->assign('flag', 1);
        }
        
if ($gif_change==1 || $gif_change==''){
   
        $type = array();
        $type_query = "SELECT * FROM mf_gifts WHERE to_id=$ownergift ORDER BY date DESC";
        $total_vars = $database->database_num_rows($database->database_query($type_query));
        $vars_per_page = 30;
        $page_vars = make_page($total_vars, $vars_per_page, $p);
        $type_query .= " LIMIT $page_vars[0], $vars_per_page";

        $type_query = $database->database_query("$type_query");
        while($gift_type = $database->database_fetch_assoc($type_query)) {
                $type[] = Array('gift_id' => $gift_type[id],
                'file' => $gift_type[gift],
                'message'=>$gift_type[message],
                'filetype' => $gift_type[filetype],
                'lang' => $gift_type[lang],
                'date' => $gift_type[date],
                'private' => $gift_type['private'],
                'from' =>  new se_user(Array($gift_type[from_id])),
                'to' =>  $gift_type[to_id]);
                SE_Language::_preload_multi($gift_type[lang]);
        }
  }
     
if ($gif_change==2){
    
        $type = array();
        $type_query = "SELECT * FROM mf_gifts WHERE from_id=$ownergift ORDER BY date DESC";
        $total_vars = $database->database_num_rows($database->database_query($type_query));
        $vars_per_page = 30;
        $page_vars = make_page($total_vars, $vars_per_page, $p);
        $type_query .= " LIMIT $page_vars[0], $vars_per_page";

        $type_query = $database->database_query("$type_query");
        while($gift_type = $database->database_fetch_assoc($type_query)) {
                $type[] = Array('gift_id' => $gift_type[id],
                'file' => $gift_type[gift],
                'message'=>$gift_type[message],
                'filetype' => $gift_type[filetype],
                'lang' => $gift_type[lang],
                'date' => $gift_type[date],
                'private' => $gift_type['private'],
                'from' =>  new se_user(Array($gift_type[to_id])),
                'to' =>  $gift_type[to_id]);
                SE_Language::_preload_multi($gift_type[lang]);
        }

  }

if($task == "gift_delete") {
  if(isset($_GET['gift_id'])) { $gift_id = $_GET['gift_id']; } else { $gift_id = 0; }
  $database->database_query("DELETE FROM mf_gifts WHERE (id ='$gift_id' AND to_id ='".$user->user_info[user_id]."')");

  // SEND AJAX CONFIRMATION
  echo "<html><head><meta http-equiv='Content-Type' content='text/html; charset=UTF-8'><script type='text/javascript'>";
  echo "window.parent.gift_delete('$gift_id');";
  echo "</script></head><body></body></html>";
  exit();
}

$smarty->assign('p', $p);
$smarty->assign('maxpage', $page_vars[2]);
$smarty->assign('p_start', $page_vars[0]+1);
$smarty->assign('p_end', $page_vars[0]+count($type));
$smarty->assign('total_vars', $total_vars);
$smarty->assign('gifts', $type);
$smarty->assign('total_gifts', $total_gifts);
$smarty->assign('gif_change', $gif_change);

include "footer.php";
?>