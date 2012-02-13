{include file='header.tpl'}

{* $Id: user_event_edit_settings.tpl 9 2009-01-11 06:03:21Z john $ *}

<h1>{lang_print id=3000157}</h1>
<div class="crumb">
	<a href="/">Главная</a>
	<a href='user_event.php'>{lang_print id=3000086}</a>
	<a href='event/{$event->event_info.event_id}/'>{$event->event_info.event_title}</a>
	<span>{lang_print id=3000001}</span>
</div>
<ul class="vk">
	<li><a href='user_event_edit.php?event_id={$event->event_info.event_id}'>{lang_print id=3000137}</a></li>
	<li><a href='user_event_edit_members.php?event_id={$event->event_info.event_id}'>{lang_print id=3000138}</a></li>
	<li class="active"><a href='user_event_edit_settings.php?event_id={$event->event_info.event_id}'>{lang_print id=3000001}</a></li>
</ul>
<!--
      <div class='page_header'>{lang_sprintf id=3000156 1="event.php?event_id=`$event->event_info.event_id`" 2=$event->event_info.event_title}</div>
      <div style="width: 500px;">{lang_print id=3000157}</div>
-->


{* SHOW SUCCESS MESSAGE *}
{if $result}
    SUCCESS -  {lang_print id=191}
{/if}


<div class="form">
<form action='user_event_edit_settings.php?event_id={$event->event_info.event_id}' method='POST'>




{* EVENT INVITE *}
{if $user->level_info.level_event_inviteonly}
<div><b>{lang_print id=3000117}</b></div>
<div class="form_desc">{lang_print id=3000118}</div>
<table cellpadding='0' cellspacing='0'>
  <tr>
    <td><input type='radio' name='event_inviteonly' id='event_inviteonly_0' value='0'{if !$event->event_info.event_inviteonly} checked{/if} /></td>
    <td><label for='event_inviteonly_0'>{lang_print id=3000119}</label></td>
  </tr>
  <tr>
    <td><input type='radio' name='event_inviteonly' id='event_inviteonly_1' value='1'{if  $event->event_info.event_inviteonly} checked{/if} /></td>
    <td><label for='event_inviteonly_1'>{lang_print id=3000120}</label></td>
  </tr>
</table>
<br />
<br />
{/if}


{* EVENT SEARCH *}
{if $user->level_info.level_event_search}
<div class="input">
<!-- 	<label>{lang_print id=3000121}</label> -->
	<label>{lang_print id=3000122}</label>
	<table cellpadding='0' cellspacing='0'>
	  <tr>
		<td><input type='radio' name='event_search' id='event_search_1' value='1'{if  $event->event_info.event_search} checked{/if} /></td>
		<td><label class="setlab" for='event_search_1'>{lang_print id=3000123}</label></td>
	  </tr>
	  <tr>
		<td><input type='radio' name='event_search' id='event_search_0' value='0'{if !$event->event_info.event_search} checked{/if} /></td>
		<td><label class="setlab" for='event_search_0'>{lang_print id=3000124}</label></td>
	  </tr>
	</table>
</div>
{/if}


{* EVENT INVITE *}
{* if $user->level_info.level_event_invite *}
<div class="input">
	<!-- 	<div><b>{lang_print id=3000267}</b></div> -->
	<label>{lang_print id=3000268}</label>
	<table cellpadding='0' cellspacing='0'>
	  <tr>
		<td><input type='radio' name='event_invite' id='event_invite_1' value='1'{if  $event->event_info.event_invite} checked{/if} /></td>
		<td><label class="setlab" for='event_invite_1'>{lang_print id=3000265}</label></td>
	  </tr>
	  <tr>
		<td><input type='radio' name='event_invite' id='event_invite_0' value='0'{if !$event->event_info.event_invite} checked{/if} /></td>
		<td><label class="setlab" for='event_invite_0'>{lang_print id=3000266}</label></td>
	  </tr>
	</table>
</div>
{* /if *}


{* EVENT PRIVACY *}
{if $privacy_options|@count > 1}
<div class="input">
	<!-- <div><b>{lang_print id=3000125}</b></div> -->
	<label>{lang_print id=3000126}</label>
	<table cellpadding='0' cellspacing='0'>
	{foreach from=$privacy_options name=privacy_loop key=k item=v}
	  <tr>
		<td><input type='radio' name='event_privacy' id='privacy_{$k}' value='{$k}'{if $event->event_info.event_privacy == $k} checked{/if} /></td>
		<td><label class="setlab" for='privacy_{$k}'>{lang_print id=$v}</label></td>
	  </tr>
	{/foreach}
	</table>
</div>
{/if}


{* EVENT COMMENTS *}
{if $comment_options|@count > 1 && 0}
<div><b>{lang_print id=3000127}</b></div>
<div class="form_desc">{lang_print id=3000128}</div>
<table cellpadding='0' cellspacing='0'>
{foreach from=$comment_options name=comment_loop key=k item=v}
  <tr>
    <td><input type='radio' name='event_comments' id='comment_{$k}' value='{$k}'{if $event->event_info.event_comments == $k} checked{/if} /></td>
    <td><label for='comment_{$k}'>{lang_print id=$v}</label></td>
  </tr>
{/foreach}
</table>
<br />
<br />
{/if}


{* EVENT UPLOAD *}
{if $upload_options|@count > 1}
<div><b>{lang_print id=3000129}</b></div>
<div class="form_desc">{lang_print id=3000130}</div>
<table cellpadding='0' cellspacing='0'>
{foreach from=$upload_options name=upload_loop key=k item=v}
  <tr>
    <td><input type='radio' name='event_upload' id='event_upload_{$k}' value='{$k}'{if $event->event_info.event_upload == $k} checked{/if} /></td>
    <td><label for='event_upload_{$k}'>{lang_print id=$v}</label></td>
  </tr>
{/foreach}
</table>
<br />
<br />
{/if}


{* EVENT TAG *}
{if $tag_options|@count > 1}
<div><b>{lang_print id=3000131}</b></div>
<div class="form_desc">{lang_print id=3000132}</div>
<table cellpadding='0' cellspacing='0'>
{foreach from=$tag_options name=tag_loop key=k item=v}
  <tr>
    <td><input type='radio' name='event_tag' id='event_tag_{$k}' value='{$k}'{if $event->event_info.event_tag == $k} checked{/if} /></td>
    <td><label for='event_tag_{$k}'>{lang_print id=$v}</label></td>
  </tr>
{/foreach}
</table>
<br />
<br />
{/if}




{* SHOW SUBMIT BUTTONS *}

{lang_block id=173 var=langBlockTemp}
	<div class="button"><span class="button2"><span class="l">&nbsp;</span><span class="c">
		<input type='submit' class='button' value='{$langBlockTemp}' /><input type='hidden' name='task' value='dosave' />
	</span><span class="r">&nbsp;</span></span></div>
{/lang_block}
</form>
</div>
{include file='footer.tpl'}