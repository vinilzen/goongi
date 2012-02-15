{include file='header.tpl'}

{* $Id: user_friends_requests.tpl 8 2009-01-11 06:02:53Z john $ *}
<h1>{lang_print id=895}<!-- Со мной хотят дружить --></h1>
						
<div class="crumb">
	<a href="/">Главная</a>
	<a href='{$url->url_create("profile", $user->user_info.user_username)}'>{lang_print id=652}</a>
	<span>{lang_print id=895}<!-- Мои друзья --></span>
</div>
<ul class="vk">
	<li><a  href="user_friends.php">{lang_print id=894}</a></li>
	<li class="active"><a href="user_friends_requests.php" >{lang_print id=895} {if $user->user_friend_total(1, 0)>0}<span>({$user->user_friend_total(1, 0)})</span>{/if}</a></li>
	<li><a href="user_friends_requests_outgoing.php">{lang_print id=896}</a></li>
</ul>

<!--<div class='page_header'>{lang_print id=895}</div>-->
<div>{lang_print id=909}</div>
</br>

{* DISPLAY MESSAGE IF NO FRIEND REQUESTS *}
{if $total_friends == 0}
{lang_print id=910}

{* DISPLAY FRIEND REQUESTS *}
{else}

  {* JAVASCRIPT FOR CHANGING FRIEND MENU OPTION *}
  {literal}
  <script type="text/javascript">
  <!-- 
  function friend_update(status) {
    {/literal}
    window.location = 'user_friends_requests.php?p={$p}';
    {literal}
  }
  //-->
  </script>
  {/literal}

  {* DISPLAY PAGINATION MENU IF APPLICABLE *}
  {if $maxpage > 1}
    <br>
    <div class='center'>
    {if $p != 1}<a href='user_friends_requests.php?p={math equation='p-1' p=$p}'>&#171; {lang_print id=182}</a>{else}<font class='disabled'>&#171; {lang_print id=182}</font>{/if}
    {if $p_start == $p_end}
      &nbsp;|&nbsp; {lang_sprintf id=184 1=$p_start 2=$total_friends} &nbsp;|&nbsp; 
    {else}
      &nbsp;|&nbsp; {lang_sprintf id=185 1=$p_start 2=$p_end 3=$total_friends} &nbsp;|&nbsp; 
    {/if}
    {if $p != $maxpage}<a href='user_friends_requests.php?p={math equation='p+1' p=$p}'>{lang_print id=183} &#187;</a>{else}<font class='disabled'>{lang_print id=183} &#187;</font>{/if}
    </div>
  {/if}
 <ul class="friends_list">
  {section name=friend_loop loop=$friends}
  {* LOOP THROUGH FRIENDS *}
    <li id="frend_{$friends[friend_loop]->user_info.user_id}">
		<a href="{$url->url_create('profile', $friends[friend_loop]->user_info.user_username)}" class="frend_img">
                                         {if $friends[friend_loop]->user_info.profilevalue_5 == 2}
						<img src="{$friends[friend_loop]->user_photo('./images/avatars_11.gif')}"  border='0' class='photo' alt='{lang_sprintf id=509 1=$friends[friend_loop]->user_displayname_short}' >
					{else}
						<img src="{$friends[friend_loop]->user_photo('./images/avatars_09.gif')}"  border='0' class='photo' alt='{lang_sprintf id=509 1=$friends[friend_loop]->user_displayname_short}' >
					{/if}
		
		</a>
    
		<div><h2><a href='{$url->url_create('profile', $friends[friend_loop]->user_info.user_username)}'>{$friends[friend_loop]->user_displayname}</a></div></h2><br>
      
 <!--    {if $friends[friend_loop]->user_info.user_dateupdated != 0}{lang_print id=849} &nbsp;{assign var='last_updated' value=$datetime->time_since($friends[friend_loop]->user_info.user_dateupdated)}{lang_sprintf id=$last_updated[0] 1=$last_updated[1]}{/if}
   {if $friends[friend_loop]->user_info.user_lastlogindate != 0}{lang_print id=906} &nbsp;{assign var='last_login' value=$datetime->time_since($friends[friend_loop]->user_info.user_lastlogindate)}{lang_sprintf id=$last_login[0] 1=$last_login[1]}{/if}-->
      {if $friends[friend_loop]->friend_type != ""}{lang_print id=882} &nbsp;{$friends[friend_loop]->friend_type}{/if}
      {if $friends[friend_loop]->friend_explain != ""}{lang_print id=907} &nbsp;{$friends[friend_loop]->friend_explain}</td></tr>{/if}

    <a class="add" rel="{$friends[friend_loop]->user_info.user_id}" rev="{$friends[friend_loop]->user_info.user_username}" href="user_friends_manage.php?user={$friends[friend_loop]->user_info.user_username}">{lang_print id=887}</a><br>
    <a class="reject" rel="{$friends[friend_loop]->user_info.user_id}" rev="{$friends[friend_loop]->user_info.user_username}" href="user_friends_manage.php?task=reject&user={$friends[friend_loop]->user_info.user_username}">{lang_print id=911}</a><br>
    {if $user->level_info.level_message_allow != 0}
		<!--<a href="user_messages_new.php?to_user={$friends[friend_loop]->user_displayname}&to_id={$friends[friend_loop]->user_info.user_username}">			{lang_print id=839}
		</a><br>-->
<a href="#" title="{$friends[friend_loop]->user_displayname}" id="add_msg">{lang_print id=839}</a>
	{/if}
    </li>
  {/section}
</ul>
  {* DISPLAY PAGINATION MENU IF APPLICABLE *}
  {if $maxpage > 1}
    <br>
    <div class='center'>
    {if $p != 1}<a href='user_friends_requests.php?p={math equation='p-1' p=$p}'>&#171; {lang_print id=182}</a>{else}<font class='disabled'>&#171; {lang_print id=182}</font>{/if}
    {if $p_start == $p_end}
      &nbsp;|&nbsp; {lang_sprintf id=184 1=$p_start 2=$total_friends} &nbsp;|&nbsp; 
    {else}
      &nbsp;|&nbsp; {lang_sprintf id=185 1=$p_start 2=$p_end 3=$total_friends} &nbsp;|&nbsp; 
    {/if}
    {if $p != $maxpage}<a href='user_friends_requests.php?p={math equation='p+1' p=$p}'>{lang_print id=183} &#187;</a>{else}<font class='disabled'>{lang_print id=183} &#187;</font>{/if}
    </div>
  {/if}
  
{/if}  
{include file='footer.tpl'}