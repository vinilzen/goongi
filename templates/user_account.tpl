{include file='header.tpl'}
<h1>настройки учетной записи</h1>

<div class="crumb">
	<a href="/">Главная</a>
	<span>{lang_print id=655}</span>
</div>

{* $Id: user_account.tpl 8 2009-01-11 06:02:53Z john $ *}

<div class="buttons" >
	<span class="button2"><span class="l">&nbsp;</span><span class="c">
		<a href='user_account.php'>{lang_print id=655}</a>
	</span><span class="r">&nbsp;</span></span>

        <span class="button2"><span class="l">&nbsp;</span><span class="c">
		<a href='user_account_privacy.php'>{lang_print id=1055}</a>
	</span><span class="r">&nbsp;</span></span>

        <span class="button2"><span class="l">&nbsp;</span><span class="c">
		<a href='user_account_pass.php'>{lang_print id=756}</a>
	</span><span class="r">&nbsp;</span></span>
</div>


{* SHOW ERROR OR SUCCESS MESSAGES *}
{if $result != 0}
  <table cellpadding='0' cellspacing='0'><tr><td class='success'>
  {capture assign="old_subnet_name"}{lang_print id=$old_subnet_name}{/capture}
  {capture assign="new_subnet_name"}{lang_print id=$new_subnet_name}{/capture}
  <img src='./images/success.gif' border='0' class='icon'>{lang_sprintf id=$result 1=$old_subnet_name 2=$new_subnet_name}
  </td></tr></table>
{elseif $is_error != 0}
  <table cellpadding='0' cellspacing='0'>
  <tr><td class='error'>{lang_print id=$is_error}</td></tr>
  </table>
{/if}


<div class="form edit">
<form action='user_account.php' method='post' name='info'>
<div class = "input">
<label>{lang_print id=616}:</label>

  <input name='user_email' type='text' class='text' size='40' maxlength='70' value='{$user->user_info.user_email}'>
  {if $user->user_info.user_email != $user->user_info.user_newemail && $user->user_info.user_newemail != "" && $setting.setting_signup_verify != 0}<div class='form_desc'>{lang_sprintf id=818 1=$user->user_info.user_newemail}</div>{/if}
  {if $setting.setting_subnet_field1_id == 0 || $setting.setting_subnet_field2_id == 0}{capture assign='current_subnet'}{lang_print id=$user->subnet_info.subnet_name}{/capture}<div class='form_desc'>{lang_sprintf id=766 1=$current_subnet}</div>{/if}
</div>

{if $user->level_info.level_profile_change != 0 && $setting.setting_username}
 <div class = "input">
  <label>{lang_print id=28}:</label>
    <input name='user_username' type='text' class='text' size='40' maxlength='50' value='{$user->user_info.user_username}'>
    {capture assign=tip}{lang_print id=809}{/capture}
    <img src='./images/icons/tip.gif' border='0' class='Tips1' title='{$tip|replace:"'":"&#039;"}'>
    <div class='form_desc_accaunt'>{lang_print id=810}</div>
</div>
{/if}

{if $cats|@count > 1}
 <div class = "input">
 <label> {lang_print id=709}</label>
     <select name='user_profilecat_id'>
    {section name=cat_loop loop=$cats}
      <option value='{$cats[cat_loop].cat_id}'{if $user->user_info.user_profilecat_id == $cats[cat_loop].cat_id} selected='selected'{/if}>{lang_print id=$cats[cat_loop].cat_title}</option>
    {/section}
    </select>
    <div class='form_desc_accaunt'>{lang_print id=1014}</div>
</div>
{/if}

 <div class = "input">
 <label>{lang_print id=206}:</label>
  <select name='user_timezone'>
  <option value='-8'{if $user->user_info.user_timezone == "-8"} SELECTED{/if}>Pacific Time (US & Canada)</option>
  <option value='-7'{if $user->user_info.user_timezone == "-7"} SELECTED{/if}>Mountain Time (US & Canada)</option>
  <option value='-6'{if $user->user_info.user_timezone == "-6"} SELECTED{/if}>Central Time (US & Canada)</option>
  <option value='-5'{if $user->user_info.user_timezone == "-5"} SELECTED{/if}>Eastern Time (US & Canada)</option>
  <option value='-4'{if $user->user_info.user_timezone == "-4"} SELECTED{/if}>Atlantic Time (Canada)</option>
  <option value='-9'{if $user->user_info.user_timezone == "-9"} SELECTED{/if}>Alaska (US & Canada)</option>
  <option value='-10'{if $user->user_info.user_timezone == "-10"} SELECTED{/if}>Hawaii (US)</option>
  <option value='-11'{if $user->user_info.user_timezone == "-11"} SELECTED{/if}>Midway Island, Samoa</option>
  <option value='-12'{if $user->user_info.user_timezone == "-12"} SELECTED{/if}>Eniwetok, Kwajalein</option>
  <option value='-3.3'{if $user->user_info.user_timezone == "-3.3"} SELECTED{/if}>Newfoundland</option>
  <option value='-3'{if $user->user_info.user_timezone == "-3"} SELECTED{/if}>Brasilia, Buenos Aires, Georgetown</option>
  <option value='-2'{if $user->user_info.user_timezone == "-2"} SELECTED{/if}>Mid-Atlantic</option>
  <option value='-1'{if $user->user_info.user_timezone == "-1"} SELECTED{/if}>Azores, Cape Verde Is.</option>
  <option value='0'{if $user->user_info.user_timezone == "0"} SELECTED{/if}>Greenwich Mean Time (Lisbon, London)</option>
  <option value='1'{if $user->user_info.user_timezone == "1"} SELECTED{/if}>Amsterdam, Berlin, Paris, Rome, Madrid</option>
  <option value='2'{if $user->user_info.user_timezone == "2"} SELECTED{/if}>Athens, Helsinki, Istanbul, Cairo, E. Europe</option>
  <option value='3'{if $user->user_info.user_timezone == "3"} SELECTED{/if}>Baghdad, Kuwait, Nairobi, Moscow</option>
  <option value='3.3'{if $user->user_info.user_timezone == "3.3"} SELECTED{/if}>Tehran</option>
  <option value='4'{if $user->user_info.user_timezone == "4"} SELECTED{/if}>Abu Dhabi, Kazan, Muscat</option>
  <option value='4.3'{if $user->user_info.user_timezone == "4.3"} SELECTED{/if}>Kabul</option>
  <option value='5'{if $user->user_info.user_timezone == "5"} SELECTED{/if}>Islamabad, Karachi, Tashkent</option>
  <option value='5.5'{if $user->user_info.user_timezone == "5.5"} SELECTED{/if}>Bombay, Calcutta, New Delhi</option>
  <option value='6'{if $user->user_info.user_timezone == "6"} SELECTED{/if}>Almaty, Dhaka</option>
  <option value='7'{if $user->user_info.user_timezone == "7"} SELECTED{/if}>Bangkok, Jakarta, Hanoi</option>
  <option value='8'{if $user->user_info.user_timezone == "8"} SELECTED{/if}>Beijing, Hong Kong, Singapore, Taipei</option>
  <option value='9'{if $user->user_info.user_timezone == "9"} SELECTED{/if}>Tokyo, Osaka, Sapporto, Seoul, Yakutsk</option>
  <option value='9.3'{if $user->user_info.user_timezone == "9.3"} SELECTED{/if}>Adelaide, Darwin</option>
  <option value='10'{if $user->user_info.user_timezone == "10"} SELECTED{/if}>Brisbane, Melbourne, Sydney, Guam</option>
  <option value='11'{if $user->user_info.user_timezone == "11"} SELECTED{/if}>Magadan, Soloman Is., New Caledonia</option>
  <option value='12'{if $user->user_info.user_timezone == "12"} SELECTED{/if}>Fiji, Kamchatka, Marshall Is., Wellington</option>
  </select>
</div>

{* SHOW NOTIFICATION SETTINGS *}
{if $notifytypes|@count != 0}
 <div class = "input">
  <label>{lang_print id=959}:</label>
   {lang_print id=960}
       {section name=notifytype_loop loop=$notifytypes}
      {capture assign="usersetting_col"}usersetting_notify_{$notifytypes[notifytype_loop].notifytype_name}{/capture}
     <input type='checkbox' name='notifications[{$notifytypes[notifytype_loop].notifytype_name}]' id='{$usersetting_col}' value='1'{if $user->usersetting_info.$usersetting_col == 1} checked='checked'{/if}>
      <label for='{$usersetting_col}'>{lang_print id=$notifytypes[notifytype_loop].notifytype_title}</label>
    {/section}
    </div>
{/if}

<div class="button"><span class="button2"><span class="l">&nbsp;</span><span class="c">
		<input type="submit" value="{lang_print id=173}" />
	</span><span class="r">&nbsp;</span></span></div>
</table>
<input type='hidden' name='task' value='dosave'>
</form>
</div>
{include file='footer.tpl'}