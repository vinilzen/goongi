{include file='header.tpl'}

{* $Id: invite.tpl 8 2009-01-11 06:02:53Z john $ *}

<div class="all">
	<div class="center_one">
		<div class="block3">
			<div class="c">
				<div class="bg_l">
					<div class="bg_r">
						<div class="form auth">
							<h1>{lang_print id=1074}</h1>
<div>{lang_print id=1075}</div>
{if $setting.setting_signup_invite == 2} {lang_print id=1078}{/if}
<br />
<br />

{* SHOW SUCCESS MESSAGE *}
{if $result != 0}<img src='./images/success.gif' border='0' class='icon'>{lang_print id=$result}{/if}


{* SHOW MUST BE LOGGED IN ERROR *}
{if $setting.setting_signup_invite == 2 && $user->user_exists == 0}

  <table cellpadding='0' cellspacing='0'>
  <tr>
  <td class='error'><img src='./images/icons/error16.gif' border='0' class='icon'> {lang_print id=1076}</td>
  </tr>
  </table>




{* SHOW NO INVITES LEFT PAGE *}
{elseif $setting.setting_signup_invite == 2 && $user->user_info.user_invitesleft == 0}

  <table cellpadding='0' cellspacing='0'>
  <tr>
  <td class='result'><img src='./images/icons/bulb16.gif' border='0' class='icon'> {lang_sprintf id=1077 1='0'}</td>
  </tr>
  </table>


{* SHOW INVITE PAGE *}
{else}

  {* IF INVITE ONLY FEATURE IS TURNED OFF, HIDE NUMBER OF INVITES LEFT *}
  {if $setting.setting_signup_invite == 2}
    <table cellpadding='0' cellspacing='0'>
    <tr>
    <td class='result'><img src='./images/icons/bulb16.gif' border='0' class='icon'> {lang_sprintf id=1077 1=$user->user_info.user_invitesleft}</td>
    </tr>
    </table>
    <br>
  {/if}

  {* SHOW ERROR MESSAGE *}
  {if $is_error != 0}
    <table cellpadding='0' cellspacing='0'>
    <tr>
    <td class='error'><img src='./images/error.gif' border='0' class='icon'>{lang_print id=$is_error}</td>
    </tr>
    </table>
  {/if}

  <form action='invite.php' method='POST'>
  <table cellpadding='0' cellspacing='0'>
  <tr>
  <td class='form1'>{lang_print id=1079}</td>
  <td class='form2'>
  <textarea name='invite_emails' rows='2' cols='45''>{$invite_emails}</textarea><br>
  {lang_print id=1080}
  </td>
  </tr>
  <tr>
  <td class='form1'>{lang_print id=1081}</td>
  <td class='form2'>
  <textarea name='invite_message' rows='5' cols='45''>{$invite_message}</textarea><br>
  {lang_print id=1082}
  </td>
  </tr>
  {if $setting.setting_invite_code == 1}
    <tr>
    <td class='form1'>&nbsp;</td>
    <td class='form2'>
      <table cellpadding='0' cellspacing='0'>
      <tr>
      <td><input type='text' name='invite_secure' class='text' size='6' maxlength='10'>&nbsp;</td>
      <td align='center'><a href="javascript:void(0);" onClick="this.blur();javascript:$('secure_image').src = $('secure_image').src + '?' + (new Date()).getTime();"><img src='./images/secure.php' id='secure_image' border='0' height='20' width='67' class='signup_code'></a></td>
      <td>{capture assign=tip}{lang_print id=856}{/capture}<img src='./images/icons/tip.gif' border='0' class='Tips1' style='vertical-align: middle;' title='{$tip|replace:"'":"&#039;"}'></td>
      </tr>
      </table>
    </td>
    </tr>
  {/if}
  <tr>
  <td class='form1'>&nbsp;</td>
  <td class='form2'><input type='submit' class='button' value='{lang_print id=728}'></td>
  </tr>
  </table>

  <input type='hidden' name='task' value='doinvite'>
  </form>
{/if}
  
									</div>
                                </div>
                            </div>
                        </div>
                        <div class="b"></div>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <div id="clearfooter"></div>
</div>
{include file='footer_without_left_menu.tpl'}