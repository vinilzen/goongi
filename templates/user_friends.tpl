{include file='header.tpl'}

{* $Id: user_friends.tpl 8 2009-01-11 06:02:53Z john $ *}
<h1>{lang_print id=894}<!-- Мои друзья --></h1>
<div class="crumb">
	<a href="/">Главная</a>
	<a href='{$url->url_create("profile", $user->user_info.user_username)}'>{lang_print id=652}</a>
	<span>{lang_print id=894}<!-- Мои друзья --></span>
</div>
<ul class="vk">
	<li class="active"><a href="user_friends.php">{lang_print id=894}</a></li>
	<li><a href="user_friends_requests.php" >{lang_print id=895} {if $user->user_friend_total(1, 0)>0}<span>({$user->user_friend_total(1, 0)})</span>{/if}</a></li>
	<li><a href="user_friends_requests_outgoing.php">{lang_print id=896}</a></li>
</ul>
<div class="buttons">
	<div class="create_group">
		<span class="button2" id="add_group_link"><span class="l">&nbsp;</span><span class="c">
			<input type="button" value="Создать группу" id="create_group" name="creat" />
		</span><span class="r">&nbsp;</span></span>
	</div>	
	<div class="edit_group">
		<span class="button2" id="add_group_link"><span class="l">&nbsp;</span><span class="c">
			<input type="button" value="Редактировать группу" id="edit_group_b" rel="0" name="creat" />
		</span><span class="r">&nbsp;</span></span>
		<span class="button2" id="add_group_link"><span class="l">&nbsp;</span><span class="c">
			<input type="button" value="Удалить группу" id="del_group" name="creat" />
		</span><span class="r">&nbsp;</span></span>
	</div>
</div>
<div class="group_list">
	<h2>Список групп</h2>
	<ul id="user_groups">
		{foreach from=$groups key=k item=v}
		<li><a href="#" class="gr_name" id="group_{$k}" rel="{$k}">{$v.name}</a></li>
		{/foreach}
		<li class="last"><a href="#" class="gr_name" rel="0">Показать всех</a></li>
	</ul>
</div>

{if $total_friends == 0}
	{* DISPLAY MESSAGE IF NO FRIENDS *}
	{if $search != ""}
		{* DISPLAY MESSAGE IF NO SEARCHED FRIENDS *}
		{lang_print id=905}
	{else}
		{* DISPLAY MESSAGE IF NO FRIENDS ON LIST *}
		{lang_print id=904}
	{/if}
{else}{* DISPLAY FRIENDS *}

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

  <div class="frlst">
  <ul class="friends_list">
    {section name=friend_loop loop=$friends}
    {* LOOP THROUGH FRIENDS *}
	<li id="frend_{$friends[friend_loop]->user_info.user_id}" class="{foreach from=$friends[friend_loop]->user_info.groups item=group key=k}group_{$k} {/foreach}">
		<a href="{$url->url_create('profile',$friends[friend_loop]->user_info.user_username)}"  class="frend_img">
			{if $friends[friend_loop]->user_info.profilevalue_5 == 2}
				<img src="{$friends[friend_loop]->user_photo('./images/avatars_11.gif')}" alt="{lang_sprintf id=509 1=$friends[friend_loop]->user_displayname_short}" />
			{else}
				<img src="{$friends[friend_loop]->user_photo('./images/avatars_09.gif')}" alt="{lang_sprintf id=509 1=$friends[friend_loop]->user_displayname_short}" />
			{/if}
		</a>
		<div>
			<p>{foreach from=$friends[friend_loop]->user_info.groups item=group key=k}
				<a href="#" class="gr_name" rel="{$k}">{$group.name}</a>
			{/foreach}</p>
			<h2><a href='{$url->url_create('profile',$friends[friend_loop]->user_info.user_username)}'>
				{$friends[friend_loop]->user_displayname}
			</a></h2>
			<div class='friends_stats'>
				<!--{if $friends[friend_loop]->user_info.user_dateupdated != 0}<div>{lang_print id=849} {assign var='last_updated' value=$datetime->time_since($friends[friend_loop]->user_info.user_dateupdated)}{lang_sprintf id=$last_updated[0] 1=$last_updated[1]}</div>{/if}-->
				<!--{if $friends[friend_loop]->user_info.user_lastlogindate != 0}<div>{lang_print id=906} {assign var='last_login' value=$datetime->time_since($friends[friend_loop]->user_info.user_lastlogindate)}{lang_sprintf id=$last_login[0] 1=$last_login[1]}</div>{/if}-->
				{if $show_details != 0}
					{if $friends[friend_loop]->friend_explain != ""}<div>{lang_print id=907} &nbsp;{$friends[friend_loop]->friend_explain|truncate:30:"...":true}</div>{/if}
				{/if}
			</div>
			
			<a href="#" rev="{$friends[friend_loop]->user_info.user_id}" class="send_msg_to"  title="{$friends[friend_loop]->user_displayname}" id="add_msg">{lang_print id=839}</a><br />
			<a href='friends.php?user={$friends[friend_loop]->user_info.user_username}'>{lang_sprintf id=836 1=''}</a><br />
			<a class="del" rel="{$friends[friend_loop]->user_info.user_id}" rev="{$friends[friend_loop]->user_info.user_username}" href="#">{lang_print id=889}</a>
		</div>
	</li>
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