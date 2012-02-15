{include file='header.tpl'}

{* $Id: user_friends_requests_outgoing.tpl 8 2009-01-11 06:02:53Z john $ *}
<h1>{lang_print id=896}</h1><!-- Я ХОЧУ ДРУЖИТЬ С ... -->

<div class="crumb">
	<a href="/">Главная</a>
	<a href='{$url->url_create("profile", $user->user_info.user_username)}'>{lang_print id=652}</a>
	<span>{lang_print id=896}<!-- Я ХОЧУ ДРУЖИТЬ С  --></span>
</div>

<ul class="vk">
	<li><a href="user_friends.php">{lang_print id=894}</a></li>
	<li><a href="user_friends_requests.php" >{lang_print id=895} {if $user->user_friend_total(1, 0)>0}<span>({$user->user_friend_total(1, 0)})</span>{/if}</a></li>
	<li class="active"><a href="user_friends_requests_outgoing.php">{lang_print id=896} </a></li>
</ul>

<!--<div class='page_header'>{lang_print id=896}</div>-->
<div>{lang_print id=915}</div>
<br />
<a href = "/search.php">Поиск друзей</a>

{* DISPLAY MESSAGE IF NO FRIEND REQUESTS *}
{if $total_friends == 0}

    <table cellpadding='0' cellspacing='0' align='center'>
    <tr><td class='result'>
    <!--<img src='./images/icons/bulb16.gif' border='0' class='icon'>-->
    {lang_print id=916}</td>

    </tr>
      </table>

{* DISPLAY FRIEND REQUESTS *}
{else}

  {* JAVASCRIPT FOR CHANGING FRIEND MENU OPTION *}
  {literal}
  <script type="text/javascript">
  <!-- 
  function friend_update(status) {
    {/literal}
    window.location = 'user_friends_requests_outgoing.php?p={$p}';
    {literal}
  }
  //-->
  </script>
  {/literal}

  {* DISPLAY PAGINATION MENU IF APPLICABLE *}
  {if $maxpage > 1}
    <br>
    <div class='center'>
    {if $p != 1}<a href='user_friends_requests_outgoing.php?p={math equation='p-1' p=$p}'>&#171; {lang_print id=182}</a>{else}<font class='disabled'>&#171; {lang_print id=182}</font>{/if}
    {if $p_start == $p_end}
      &nbsp;|&nbsp; {lang_sprintf id=184 1=$p_start 2=$total_friends} &nbsp;|&nbsp; 
    {else}
      &nbsp;|&nbsp; {lang_sprintf id=185 1=$p_start 2=$p_end 3=$total_friends} &nbsp;|&nbsp; 
    {/if}
    {if $p != $maxpage}<a href='user_friends_requests_outgoing.php?p={math equation='p+1' p=$p}'>{lang_print id=183} &#187;</a>{else}<font class='disabled'>{lang_print id=183} &#187;</font>{/if}
    </div>
  {/if}
 <ul class="friends_list">
  {section name=friend_loop loop=$friends}
  {* LOOP THROUGH FRIENDS *}
    <li id="frend_{$friends[friend_loop]->user_info.user_id}">
		<a href="{$url->url_create('profile', $friends[friend_loop]->user_info.user_username)}" class="frend_img">
			{if $friends[friend_loop]->profile_info.profilevalue_5 == 2}
				<img src="{$friends[friend_loop]->user_photo('./images/avatars_11.gif')}" alt="{lang_sprintf id=509 1=$friends[friend_loop]->user_displayname_short}" />
			{else}
				<img src="{$friends[friend_loop]->user_photo('./images/avatars_09.gif')}" alt="{lang_sprintf id=509 1=$friends[friend_loop]->user_displayname_short}" />
			{/if}
		</a>
		<div>
            <h2><a href="{$url->url_create('profile', $friends[friend_loop]->user_info.user_username)}">{$friends[friend_loop]->user_displayname}</a></h2>
		
		  {if $friends[friend_loop]->user_info.user_dateupdated != 0}{lang_print id=849} &nbsp;<br />{assign var='last_updated' value=$datetime->time_since($friends[friend_loop]->user_info.user_dateupdated)}{lang_sprintf id=$last_updated[0] 1=$last_updated[1]}<br />{/if}
		  {if $friends[friend_loop]->user_info.user_lastlogindate != 0}{lang_print id=906} &nbsp;{assign var='last_login' value=$datetime->time_since($friends[friend_loop]->user_info.user_lastlogindate)}{lang_sprintf id=$last_login[0] 1=$last_login[1]}<br />{/if}
		  {if $friends[friend_loop]->friend_type != ""}{lang_print id=882} &nbsp;{$friends[friend_loop]->friend_type}<br />{/if}
		  {if $friends[friend_loop]->friend_explain != ""}{lang_print id=907} &nbsp;{$friends[friend_loop]->friend_explain}<br />{/if}
			<br>
		  <a class="cancel" rel="{$friends[friend_loop]->user_info.user_id}" rev="{$friends[friend_loop]->user_info.user_username}" href="#">{lang_print id=917}</a><br />
		  {if $user->level_info.level_message_allow != 0}<a href="user_messages_new.php?to_user={$friends[friend_loop]->user_displayname}&to_id={$friends[friend_loop]->user_info.user_username}">{lang_print id=839}</a>{/if}
	  </div>
    </li>
  {/section}
</ul>
  {* DISPLAY PAGINATION MENU IF APPLICABLE *}
  {if $maxpage > 1}
    <div class='center'>
    {if $p != 1}<a href='user_friends_requests_outgoing.php?p={math equation='p-1' p=$p}'>&#171; {lang_print id=182}</a>{else}<font class='disabled'>&#171; {lang_print id=182}</font>{/if}
    {if $p_start == $p_end}
      &nbsp;|&nbsp; {lang_sprintf id=184 1=$p_start 2=$total_friends} &nbsp;|&nbsp; 
    {else}
      &nbsp;|&nbsp; {lang_sprintf id=185 1=$p_start 2=$p_end 3=$total_friends} &nbsp;|&nbsp; 
    {/if}
    {if $p != $maxpage}<a href='user_friends_requests_outgoing.php?p={math equation='p+1' p=$p}'>{lang_print id=183} &#187;</a>{else}<font class='disabled'>{lang_print id=183} &#187;</font>{/if}
    </div>
  {/if}
  
{/if}
{include file='footer.tpl'}