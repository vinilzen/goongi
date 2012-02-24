{include file='header.tpl'}
<h1>{lang_print id=1056}</h1>

<div class="crumb">
	<a href="/">Главная</a>
	<span>{lang_print id=1055}</span>
</div>


{* $Id: user_account_privacy.tpl 8 2009-01-11 06:02:53Z john $ *}
<ul class="vk">
		<li><a href='user_account.php'>{lang_print id=655}</a></li>
 		<li class="active"><a href='user_account_privacy.php'>{lang_print id=1055}</a></li>
		<li><a href='user_account_pass.php'>{lang_print id=756}</a></li>
                {if $user->level_info.level_profile_delete != 0}
                        <li><a href='user_account_delete'>{lang_print id=757}</a></li>
                {/if}
</ul>

<!-- Измените параметры настройки Вашей конфиденциальности. <div>{lang_print id=1057}</div> -->

{* SHOW SUCCESS MESSAGES *}
{if $result != 0}{lang_print id=191}{/if}
<div class="fl">
<form action='user_account_privacy.php' method='post' name='info'>
<table cellpadding='0' cellspacing='0'>

{* SHOW BLOCKLIST *}
{if $user->level_info.level_profile_block != 0}
  <tr>
  <td class='form1' nowrap='nowrap'>{lang_print id=813}:</td>
  <td class='form2' id='blocks'>
    <div style='padding: 3px 0px 5px 0px;'>{lang_print id=814}</div>
    {section name=block_loop loop=$blocked_users}
      <div id='block_{$blocked_users[block_loop]->user_info.user_id}'>
        <div style='float: left;'><img src='./images/icons/action_delete2.gif' class='icon' style='cursor: pointer; margin-left: 5px;' onClick="$('block_{$blocked_users[block_loop]->user_info.user_id}').getParent().removeChild($('block_{$blocked_users[block_loop]->user_info.user_id}'))" border='0'><input type='hidden' name='user_blocklist[]' value='{$blocked_users[block_loop]->user_info.user_id}'></div>
        <div><a href='{$url->url_create('profile', $blocked_users[block_loop]->user_info.user_username)}'>{$blocked_users[block_loop]->user_displayname}</a></div>
        <div style='clear: both;'></div>
      </div>
    {/section}

    <div id='block_user_link' style='padding: 5px 0px 0px 2px; font-weight: bold;'><a href='javascript:void(0);' onClick="$('block_user_link').style.display='none';$('block_user').style.display='block';$('block_user').focus();">{lang_print id=815}</a></div>
    <input type='text' class='text' id='block_user' size='30' maxlength='50' value='' style='margin-top: 3px; display: none;'>

  </td>
  </tr>
{/if}

{* SHOW INVISIBILITY SETTING *}
{if $user->level_info.level_profile_invisible == 1}
  <tr>
  <td class='form1' nowrap='nowrap'>{lang_print id=1058}:</td>
  <td class='form2'>
    <table cellpadding='0' cellspacing='0'>
    <tr>
    <td><input type='checkbox' name='user_invisible' id='invisible' value='1'{if $user->user_info.user_invisible == 1} checked='checked'{/if}>&nbsp;</td>
    <td><label for='invisible'>{lang_print id=1059}</label></td>
    </tr>
    </table>
  </td>
  </tr>
{/if}

{* SHOW PROFILE VIEWS SETTING *}
{if $user->level_info.level_profile_views == 1 && 0} нету у нас просмотров профиля
  <tr>
  <td class='form1' nowrap='nowrap'>{lang_print id=1060}:</td>
  <td class='form2'>
    <table cellpadding='0' cellspacing='0'>
    <tr>
    <td><input type='checkbox' name='user_saveviews' id='saveviews' value='1'{if $user->user_info.user_saveviews == 1} checked='checked'{/if}>&nbsp;</td>
    <td><label for='saveviews'>{lang_print id=1061}</label></td>
    </tr>
    </table>
    <div class='form_desc' style='width: 500px;'>{lang_print id=1062}</div>
  </td>
  </tr>
{/if}

{* SHOW PROFILE PRIVACY OPTIONS *}
{if $privacy_options|@count > 1}
  <tr>
	<td class='form1' nowrap='nowrap'>
		{lang_print id=967}:
		<div style='padding: 3px 0px 5px 0px;'>{lang_print id=968}</div>
	</td>
  <td class='form2'>
    <table cellpadding='0' cellspacing='0'>
    {* LIST PRIVACY OPTIONS *}
    {foreach from=$privacy_options key=k item=v}
      <tr>
      <td><input type='radio' name='privacy_profile' id='privacy_{$k}' value='{$k}'{if $user->user_info.user_privacy == $k} checked='checked'{/if}></td>
      <td><label for='privacy_{$k}'>{lang_print id=$v}</label></td>
      </tr>
    {/foreach}
    </table>
  </td>
  </tr>
{/if}

{* SHOW PROFILE COMMENT OPTIONS *}
{if $comment_options|@count > 1}
  <tr>
	<td class='form1' nowrap='nowrap'>
		{lang_print id=969}:
		<div style='padding: 3px 0px 5px 0px;'>{lang_print id=970}</div>
	</td>
  <td class='form2'>
    <table cellpadding='0' cellspacing='0'>
    {* LIST COMMENT OPTIONS *}
    {foreach from=$comment_options key=k item=v}
      <tr>
      <td><input type='radio' name='comments_profile' id='comments_{$k}' value='{$k}'{if $user->user_info.user_comments == $k} checked='checked'{/if}></td>
      <td><label for='comments_{$k}'>{lang_print id=$v}</label></td>
      </tr>
    {/foreach}
    </table>
  </td>
  </tr>
{/if}

{* SHOW PROFILE SEARCH OPTIONS *}
{if $user->level_info.level_profile_search == 1}
  <tr>
	<td class='form1' >
		{lang_print id=971}:
		<div style='padding: 3px 0px 5px 0px; width:300px;'>{lang_print id=972}</div>
	</td>
  <td class='form2'>
    
    <table cellpadding='0' cellspacing='0'>
    <tr><td><input type='radio' name='search_profile' id='search_profile1' value='1'{if $user->user_info.user_search == 1} checked='checked'{/if}></td><td><label for='search_profile1'>{lang_print id=973}</label></td></tr>
    <tr><td><input type='radio' name='search_profile' id='search_profile0' value='0'{if $user->user_info.user_search == 0} checked='checked'{/if}></td><td><label for='search_profile0'>{lang_print id=974}</label></td></tr>
    </table>
  </td>
  </tr>
{/if}

{* SHOW ACTION PRIVACY SETTING *}
{if $setting.setting_actions_privacy == 1 && 0} нету у нас новостей
  <tr>
  <td class='form1' nowrap='nowrap'>{lang_print id=811}:</td>
  <td class='form2'>
    <div style='padding: 3px 0px 5px 0px;'>{lang_print id=812}</div>
    <table cellpadding='0' cellspacing='0'>
    {section name=actiontypes_loop loop=$actiontypes}
      <tr>
      <td><input type='checkbox' name='actiontype[]' id='actiontype_id_{$actiontypes[actiontypes_loop].actiontype_id}' value='{$actiontypes[actiontypes_loop].actiontype_id}'{if $actiontypes[actiontypes_loop].actiontype_selected == 1} checked='checked'='checked'{/if}></td>
      <td><label for='actiontype_id_{$actiontypes[actiontypes_loop].actiontype_id}'>{lang_print id=$actiontypes[actiontypes_loop].actiontype_desc}</label></td>
      </tr>
    {/section}
    </table>
  </td>
  </tr>
{/if}

<tr>
<td class='form1' colspan="2" style="text-align: center;">
<div class="button"><span class="button2"><span class="l">&nbsp;</span><span class="c">
		<input type="submit" value="Сохранить изменения">
	</span><span class="r">&nbsp;</span></span></div>
</td>
</tr>
</table>

<input type='hidden' name='task' value='dosave'>
</form>
</div>
{include file='footer.tpl'}