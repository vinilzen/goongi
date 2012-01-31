{include file='header.tpl'}

{* $Id: lostpass.tpl 133 2009-03-22 20:16:35Z john $ *}
<div class="form auth">
	<h1>{lang_print id=33}</h1>

{lang_print id=34}

{* SHOW SUCCESS MESSAGE IF NO ERROR *}
{if $submitted == 1 AND $is_error == 0}

  <table cellpadding='0' cellspacing='0'>
    <tr>
      <td class='result'>
        <div class='success'>
          <img src='./images/success.gif' border='0' class='icon' />
          {lang_print id=35}
        </div>
      </td>
    </tr>
  </table>

{else}

  {if $is_error != 0}{lang_print id=$is_error}{/if}
<br></br>
  <form action='lostpass.php' method='post'>
 <div class="input">
      <label>{lang_print id=37}</label>
      <input type='text' class='text' name='user_email' maxlength='100' size='40' />
</div>
      <span class="button1"><span class="l">&nbsp;</span><span class="c"><input type='submit' class='button' value='{lang_print id=749}' /></span><span class="r">&nbsp;</span></span>
      <input type='hidden' name='task' value='send_email' />
      </form>
           
              <form action='login.php' method='POST'>
              
      <!--  <span class="button1"><span class="l">&nbsp;</span><span class="c"><input type='submit' class='button' value='{lang_print id=39}' /></span><span class="r">&nbsp;</span></span>-->
        </div>
              </form>
          

{/if}


{include file='footer_without_left_menu.tpl'}