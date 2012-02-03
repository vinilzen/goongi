<?php

/* $Id: user_messages_new.php 42 2009-01-29 04:55:14Z john $ */

$page = "user_messages_new";
include "header.php";

if(isset($_POST['task'])) { $task = $_POST['task']; } elseif(isset($_GET['task'])) { $task = $_GET['task']; } else { $task = "main"; }
if(isset($_POST['to_user'])) { $to_user = $_POST['to_user']; } elseif(isset($_GET['to_user'])) { $to_user = $_GET['to_user']; } else { $to_user = ""; }
if(isset($_POST['to_id'])) { $to_id = $_POST['to_id']; } elseif(isset($_GET['to_id'])) { $to_id = $_GET['to_id']; } else { $to_id = ""; }

// CHECK FOR ADMIN ALLOWANCE OF MESSAGES
if( !$user->level_info['level_message_allow'] )
{
  header("Location: user_home.php");
  exit();
}


// SET ERROR VARIABLES AND EMPTY VARS
$is_error = 0;
$submitted = 0;


// TRY TO SEND MESSAGE
if($task == "send") {
    $is_error = '1';
	if ( isset($_POST['to']) && $_POST['to'] != '' ) {
		$to = $_POST['to'];
	} elseif ( isset($_POST['to_display']) && $_POST['to_display'] != '' )  {
		$to = $_POST['to_display'];
	}

$total_friends = $user->user_friend_total(0);
if ($total_friends>0)
{
$friends = $user->user_friend_list(0, $total_friends, 0);
       foreach ($friends as $key => $value) {
		if ($to == $value->user_info['user_displayname'])
                        {
                    $is_error = '0';
                    $id_user = $value->user_info['user_id'];
                }
		 }
}
//echo $user->user_info['user_id'];
$id_my = $user->user_info['user_id'];
//conv_id
$resource =$database->database_query("SELECT pmconvoop_pmconvo_id FROM se_pmconvoops WHERE pmconvoop_user_id ='{$id_my}' AND pmconvoop_deleted_outbox != 1");
 while( $pmconvoop_info=$database->database_fetch_assoc($resource) )
 {
     $convo_idp = $pmconvoop_info['pmconvoop_pmconvo_id'];
     $resource2 =$database->database_query("SELECT pmconvoop_pmconvo_id FROM se_pmconvoops WHERE pmconvoop_user_id ='{$id_user}' AND pmconvoop_pmconvo_id = '{$convo_idp}'");
         if ($database->database_num_rows($resource2)) {$convo_id = $pmconvoop_info['pmconvoop_pmconvo_id']; continue;}
         else $convo_id = '';
 }
//$convo_id = $resource['pmconvoop_pmconvo_id'];
///
if ($is_error == '0')
{
	$subject = $_POST['subject'];
	$message = $_POST['message'];
	
	$id = $user->user_message_send($id_user,$to, $subject, $message,$convo_id);
	$is_error = $user->is_error;

	if($is_error != 0) {
		SE_Language::_preload($is_error);
		SE_Language::load();
		$error_message = SE_Language::_get($is_error);
	} else $error_message = 'Ваше сообщение отправлено';
// if ($is_error != 0)
///      {echo $error_message; die();}
// else {echo 'Отправленно'; die();}
}
else $error_message = 'Выберите пользователя из списка';
 echo json_encode(array(
    'is_error' => $is_error,
     'result' =>$error_message,
     'id'=>$id
  ));
 exit();

}
if($task == "show_f") {
    $is_error=0;
$total_friends = $user->user_friend_total(0);
$friends = $user->user_friend_list(0, $total_friends, 0);
  echo json_encode(array(
    'is_error' => $is_error,
    'total_friends' => $total_friends,
    'photo'=>$user->user_photo("./images/nophoto.gif"),
    'name'=>$user->user_friend_list(0, $total_friends, 0),
    'friends' => $friends
  ));
 exit();
}


// GET LIST OF FRIENDS FOR SUGGEST BOX
$total_friends = $user->user_friend_total(0);
$friends = $user->user_friend_list(0, $total_friends, 0);

//echo '<pre>'; print_r($friends); die();

// ASSIGN SMARTY VARS AND INCLUDE FOOTER
$smarty->assign('is_error', $is_error);
$smarty->assign('submitted', $submitted);

$smarty->assign_by_ref('friends', $friends);

$smarty->assign('to_user', $to_user);
$smarty->assign('to_id', $to_id);
$smarty->assign('subject', $subject);
$smarty->assign('message', $message);
include "footer.php";
?>