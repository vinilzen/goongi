{include file='header.tpl'}
<h1>{lang_print id=756}</h1>

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
	
	{if $user->level_info.level_profile_delete != 0}
    <span class="button2"><span class="l">&nbsp;</span><span class="c">
		<a href='user_account_delete'>{lang_print id=757}</a>
	</span><span class="r">&nbsp;</span></span>
	{/if}
</div>

<!-- Если Вы хотите изменить пароль учетной записи, пожалуйста, заполните следующую форму.<div>{lang_print id=758}</div> -->


{* SHOW SUCCESS OR ERROR MESSAGE *}
{if $result != 0}
  <div class='success'>{lang_print id=191}</div><br>
{elseif $is_error != 0}
  <div class='error'> {lang_print id=$is_error}</div><br>
{/if}

<form action='user_account_pass.php' method='POST'>
<table cellpadding='0' cellspacing='0' class="change_pass">
<tr>
<td class='form1'>{lang_print id=269}</td>
<td class='form2'><input type='password' name='password_old' class='text' size='30' maxlength='50'></td>
</tr>
<tr>
<td class='form1'>{lang_print id=46}</td>
<td class='form2'><input type='password' name='password_new' class='text' size='30' maxlength='50'></td>
</tr>
<tr>
<td class='form1'>{lang_print id=47}</td>
<td class='form2'><input type='password' name='password_new2' class='text' size='30' maxlength='50'></td>
</tr>
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
{include file='footer.tpl'}