{include file='header.tpl'}

{* $Id: login.tpl 158 2009-04-09 01:19:50Z john $ *}
<div class="all">
	<div class="center_one">
		<div class="block3">
			<div class="c">
				<div class="bg_l">
					<div class="bg_r">
						<div class="form auth">
							<h1>{lang_print id=658}<!-- авторизация --></h1>

{lang_print id=673}
{if $setting.setting_signup_verify == 1}{lang_print id=674}{/if}
{* SHOW ERROR MESSAGE *}
{if $is_error != 0}<div class="error"> <img src='./images/error.gif' border='0' class='icon'>{lang_print id=$is_error} </div>{/if}
<form action='login.php' method='POST' name='login'>
	<div class="input"><label>{lang_print id=89}</label><input type='text' class='text' name='email' id='email' value='{$email}' size='30' maxlength='70' /></div>
	<div class="input"><label><a href="lostpass.php">{lang_print id=675}<!-- Забыли пароль?--></a>{lang_print id=29}</label><input type='password' class='text' name='password' id='password' size='30' maxlength='50' /></div>

{if !empty($setting.setting_login_code) || (!empty($setting.setting_login_code_failedcount) && $failed_login_count>=$setting.setting_login_code_failedcount)}
  <table cellpadding='0' cellspacing='0'>
	<tr>
	  <td><input type='text' name='login_secure' class='text' size='6' maxlength='10' />&nbsp;</td>
	  <td>
		<table cellpadding='0' cellspacing='0'>
		  <tr>
			<td align='center'>
			  <img src='./images/secure.php' id='secure_image' border='0' height='20' width='67' class='signup_code' /><br />
			  <a href="javascript:void(0);" onClick="$('secure_image').src = './images/secure.php?' + (new Date()).getTime();">{lang_print id=975}</a>
			</td>
			<td>{capture assign=tip}{lang_print id=691}{/capture}<img src='./images/icons/tip.gif' border='0' class='Tips1' title='{$tip|escape:quotes}'></td>
		  </tr>
		</table>
	  </td>
	</tr>
  </table>
{/if}
	<div class="check"><label><input type='checkbox' class='checkbox' name='hidden_pass' id='persistent' value='1' /><span>Скрыть пароль</span></label></div>
	<div class="check rem"><label><input type='checkbox' class='checkbox' name='persistent' id='persistent' value='1' /><span>{lang_print id=660}</span></label></div>
	<span class="button1"><span class="l">&nbsp;</span><span class="c"><input type='submit' class='button' value='{lang_print id=30}' /></span><span class="r">&nbsp;</span></span>     
	<a href='/signup.php' class="reg">{lang_print id=6000143}</a>
	<noscript><input type='hidden' name='javascript_disabled' value='1' /></noscript>
	<input type='hidden' name='task' value='dologin' />
	<input type='hidden' name='return_url' value='{$return_url}' />
</form>

{literal}
<script language="JavaScript">
<!--
window.addEvent('domready', function() {
	if($('email').value == "") {
	  $('email').focus();
	} else {
	  $('password').focus();
	}
});
// -->
</script>
{/literal}
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