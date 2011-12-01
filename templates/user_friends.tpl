﻿{include file='header.tpl'}

{* $Id: user_friends.tpl 8 2009-01-11 06:02:53Z john $ *}
<h1>{lang_print id=894}<!-- Мои друзья --></h1>
<div class="crumb">
	<a href="/">Главная</a>
	<a href='{$url->url_create("profile", $user->user_info.user_username)}'>{lang_print id=652}</a>
	<span>{lang_print id=894}<!-- Мои друзья --></span>
</div>
<ul class="vk">
	<li class="active"><a href="user_friends.php">{lang_print id=894}</a></li>
	<li><a href="user_friends_requests.php" >{lang_print id=895}</a></li>
	<li><a href="user_friends_requests_outgoing.php">{lang_print id=896}</a></li>
</ul>
<div class="buttons">
	<span class="button2" id="add_group_link"><span class="l">&nbsp;</span><span class="c">
		<input type="button" value="Создать группу" id="create_group" name="creat" />
	</span><span class="r">&nbsp;</span></span>
</div>
{literal}
<script type="text/javascript">
function createGroup() {

	$('#msg_gr').html('<img src="/images/96.gif" border="0" />');
	var go = 1;
	if (go == 1) {
		go = 0;
		$.post(
			"user_add_group.php", 	
			{ task: 'add' , gn: $('#group_name').attr('value') },
			function(data) {
				if ( data.success == '0') {
					$('#msg_gr').html(data.msg);
					go = 1;
				}
				if (data.success == '1') {
					$('#msg_gr').html(data.msg);
					setTimeout ( function() {
						$('#popup').fadeOut(300);
						$('.window').hide();
						e.preventDefault();
					}, 1500);
					
					update_group_list();
				}
			}
			, "json" 
		);
	}
}
function update_group_list() {

	$.post(
			"user_add_group.php", 
			{ task: 'update' },
			function(data) {
				if ( data.success == '0') {
					alert(data.msg);
					go = 1;
				}
				if (data.success == '1') {
					$('#user_groups').html(data.msg);
				}
			}
			, "json" 
		);
	
}
function show_user() {
	alert('filtr');
}

</script>
{/literal}
<div class="group_list">
	<h2>Список групп</h2>
	<ul id="user_groups">
	{foreach from=$groups key=k item=v}
	<li><a href="#" rel="{$k}" onclick="show_user({$v.users});return false;">{$v.name}</a></li>
	{/foreach}</ul>
</div>


{* JAVASCRIPT FOR CREATING SUGGESTION BOX *}
{literal}
<script type="text/javascript">
<!-- 
  window.addEvent('domready', function(){
	var options = {
		script:"misc_js.php?task=suggest_friend&limit=5&",
		varname:"input",
		json:true,
		shownoresults:false,
		maxresults:5,
		multisuggest:false,
		callback: function (obj) { }
	};
	var as_json = new bsn.AutoSuggest('search', options);
  });
//-->
</script>
{/literal}

<div class='friends_search'>
  <table cellpadding='0' cellspacing='0' align='center'>
  <tr>
  <td align='right'>{lang_print id=899} &nbsp;</td>
  <td>
    <form action='user_friends.php' method='post' name='searchform'>
    <input type='text' maxlength='100' size='30' class='text' id='search' name='search' value='{$search}'>&nbsp;
    <div id='suggest' class='suggest'></div>
  </td>
  <td>
    <input type='submit' class='button' value='{lang_print id=646}'>
    <input type='hidden' name='s' value='{$s}'>
    <input type='hidden' name='p' value='{$p}'>
  </td>
  </tr>
  <tr>
  <td class='friends_sort' align='right'>{lang_print id=900} &nbsp;</td>
  <td class='friends_sort'>
    <select name='s' class='small'>
    <option value='{$u}'{if $s == "ud"} SELECTED{/if}>{lang_print id=901}</option>
    <option value='{$l}'{if $s == "ld"} SELECTED{/if}>{lang_print id=902}</option>
    <option value='{$t}'{if $s == "t"} SELECTED{/if}>{lang_print id=903}</option>
    </select>
    </form>
  </td>
  </tr>
  </table>
</div>

{* DISPLAY MESSAGE IF NO FRIENDS *}
{if $total_friends == 0}

  {* DISPLAY MESSAGE IF NO SEARCHED FRIENDS *}
  {if $search != ""}
    <table cellpadding='0' cellspacing='0' align='center'>
    <tr><td class='result'>
      <img src='./images/icons/bulb16.gif' border='0' class='icon'>{lang_print id=905}
    </td></tr>
    </table>
  {* DISPLAY MESSAGE IF NO FRIENDS ON LIST *}
  {else}
    <table cellpadding='0' cellspacing='0' align='center'>
    <tr><td class='result'>
      <img src='./images/icons/bulb16.gif' border='0' class='icon'>{lang_print id=904}
    </td></tr>
    </table>
  {/if}

{* DISPLAY FRIENDS *}
{else}

  {* JAVASCRIPT FOR CHANGING FRIEND MENU OPTION *}
  {literal}
  <script type="text/javascript">
  <!-- 
  function friend_update(status) {
    {/literal}
    window.location = 'user_friends.php?s={$s}&search={$search}&p={$p}';
    {literal}
  }
  //-->
  </script>
  {/literal}

  {* DISPLAY PAGINATION MENU IF APPLICABLE *}
  {if $maxpage > 1}
    <div class='center' style='margin-top: 10px;'>
      {if $p != 1}<a href='user_friends.php?s={$s}&search={$search}&p={math equation='p-1' p=$p}'>&#171; {lang_print id=182}</a>{else}<font class='disabled'>&#171; {lang_print id=182}</font>{/if}
      {if $p_start == $p_end}
        &nbsp;|&nbsp; {lang_sprintf id=184 1=$p_start 2=$total_friends} &nbsp;|&nbsp; 
      {else}
        &nbsp;|&nbsp; {lang_sprintf id=185 1=$p_start 2=$p_end 3=$total_friends} &nbsp;|&nbsp; 
      {/if}
      {if $p != $maxpage}<a href='user_friends.php?s={$s}&search={$search}&p={math equation='p+1' p=$p}'>{lang_print id=183} &#187;</a>{else}<font class='disabled'>{lang_print id=183} &#187;</font>{/if}
    </div>
  {/if}

  <div style='margin-left: auto; margin-right: auto; width: 850px;'>
  <ul class="friends_list">
    {section name=friend_loop loop=$friends}
    {* LOOP THROUGH FRIENDS *}
	<li id="frend_{$friends[friend_loop]->user_info.user_id}">
		<a href="{$url->url_create('profile',$friends[friend_loop]->user_info.user_username)}"  class="frend_img">
			<img src='{$friends[friend_loop]->user_photo('./images/nophoto.gif')}' class='photo' width='{$misc->photo_size($friends[friend_loop]->user_photo('./images/nophoto.gif'),'90','90','w')}' border='0' alt="{lang_sprintf id=509 1=$friends[friend_loop]->user_displayname_short}">
		</a>
		<div>
			<p><a href="#">vip</a><a href="#">название группы</a></p>
			<h2><a href='{$url->url_create('profile',$friends[friend_loop]->user_info.user_username)}'>
				{$friends[friend_loop]->user_displayname}
			</a></h2>
			<div class='friends_stats'>
				{if $friends[friend_loop]->user_info.user_dateupdated != 0}<div>{lang_print id=849} {assign var='last_updated' value=$datetime->time_since($friends[friend_loop]->user_info.user_dateupdated)}{lang_sprintf id=$last_updated[0] 1=$last_updated[1]}</div>{/if}
				{if $friends[friend_loop]->user_info.user_lastlogindate != 0}<div>{lang_print id=906} {assign var='last_login' value=$datetime->time_since($friends[friend_loop]->user_info.user_lastlogindate)}{lang_sprintf id=$last_login[0] 1=$last_login[1]}</div>{/if}
				{if $show_details != 0}
					{if $friends[friend_loop]->friend_explain != ""}<div>{lang_print id=907} &nbsp;{$friends[friend_loop]->friend_explain|truncate:30:"...":true}</div>{/if}
				{/if}
			</div>
			
			<a href="#" rev="{$friends[friend_loop]->user_info.user_id}" class="send_msg_to">{lang_print id=839}</a><br />
			<a href='profile.php?user={$friends[friend_loop]->user_info.user_username}&v=friends'>{lang_sprintf id=836 1=''}</a><br />
			<a class="del" rel="{$friends[friend_loop]->user_info.user_id}" rev="{$friends[friend_loop]->user_info.user_username}" href="#">{lang_print id=889}</a>
		</div>
	</li>
      {cycle values=",<div style='clear: both;'></div>"} 
    {/section}
    </ul>
  </div>

  {* DISPLAY PAGINATION MENU IF APPLICABLE *}
  {if $maxpage > 1}
    <div class='center' style='margin-top: 10px;'>
      {if $p != 1}<a href='user_friends.php?s={$s}&search={$search}&p={math equation='p-1' p=$p}'>&#171; {lang_print id=182}</a>{else}<font class='disabled'>&#171; {lang_print id=182}</font>{/if}
      {if $p_start == $p_end}
        &nbsp;|&nbsp; {lang_sprintf id=184 1=$p_start 2=$total_friends} &nbsp;|&nbsp; 
      {else}
        &nbsp;|&nbsp; {lang_sprintf id=185 1=$p_start 2=$p_end 3=$total_friends} &nbsp;|&nbsp; 
      {/if}
      {if $p != $maxpage}<a href='user_friends.php?s={$s}&search={$search}&p={math equation='p+1' p=$p}'>{lang_print id=183} &#187;</a>{else}<font class='disabled'>{lang_print id=183} &#187;</font>{/if}
    </div>
  {/if}
{/if}
{include file='footer.tpl'}