{* INCLUDE HEADER CODE *}
{include file="header.tpl"}


<table cellpadding='0' cellspacing='0' border="0">
<tr>
<td style="width: 100%;text-align: left;vertical-align: middle;">
  <img src='images/icons/gifts48.gif' border='0' class='icon_big'>
  <div class='page_header'>{if $flag == 0}{lang_print id=80000026}{else}{lang_print id=80000017} {$to_username}{/if}</div>
 <br>
</td>
<td>
  <table cellpadding='0' cellspacing='0'>
  <tr><td nowrap='nowrap'>
    
  {if $type_a == 0}
  <b>{lang_print id=1021}</b> 
  {else}
  <a href="mf_gifts_send.php?type=0{$to}">{lang_print id=1021}</a>
  {/if}
  {foreach from=$type key=type_id item=type_val}
  {if $type_a == $type_id}
  &nbsp;&nbsp;&nbsp;&nbsp;<b>{lang_print id=$type_val}</b>
  {else}
  
  &nbsp;&nbsp;&nbsp;&nbsp;<a href="mf_gifts_send.php?type={$type_id}{$to}">{lang_print id=$type_val}</a>
	
  {/if}
  {/foreach} </div>
  
  
     </td></tr></table>
</td>
</tr>
</table>


{* JAVASCRIPT FOR CREATING SUGGESTION BOX *}
  {literal}
<script type="text/javascript">
  <!-- 
    // THIS FUNCTION SHOWS THE ERROR OR SUCCESS MESSAGE
  function messageSent(is_error, error_message) {
    if(is_error != 0) {
      $('error_div').style.display = 'block';
      $('error_message').innerHTML = error_message;
    } else {
      $('form_div').style.display = 'none';
      $('success_div').style.display = 'block';
      setTimeout("window.parent.TB_remove();", "1000");
    }
  }
  //-->
  </script>
  
  
  
{/literal}
<div id='success_div' style='display: none;'>
    <table cellpadding='0' cellspacing='0'>
      <tr>
        <td style="	font-weight: bold;
	color: #00CC00;
	text-align: center;
	padding: 7px 8px 7px 7px;
	background: #E6FFE6;"><img src='./images/success.gif' border='0' class='icon'><b>{lang_print id=80000021}</b></td>
      </tr>
    </table>
  </div>
<div id='form_div'> {* SHOW ERRORS *}
  <div id='error_div' style='display: none;'> <br>
    <table cellpadding='0' cellspacing='0'>
      <tr>
        <td class='error'><img src='./images/error.gif' border='0' class='icon'> <span id='error_message'></span> </td>
      </tr>
    </table>
  </div>
</div>


  {* DISPLAY PAGINATION MENU IF APPLICABLE *}
  {if $maxpage > 1}
    <div align='center'>
      {if $p != 1}<a href='mf_gifts_send.php?p={math equation='p-1' p=$p}{$tl}{$to}'>&#171; {lang_print id=182}</a>{else}<font class='disabled'>&#171; {lang_print id=182}</font>{/if}
      {if $p_start == $p_end}
        &nbsp;|&nbsp; {lang_sprintf id=184 1=$p_start 2=$total_vars} &nbsp;|&nbsp; 
      {else}
        &nbsp;|&nbsp; {lang_sprintf id=185 1=$p_start 2=$p_end 3=$total_vars} &nbsp;|&nbsp; 
      {/if}
      {if $p != $maxpage}<a href='mf_gifts_send.php?p={math equation='p+1' p=$p}{$tl}{$to}'>{lang_print id=183} &#187;</a>{else}<font class='disabled'>{lang_print id=183} &#187;</font>{/if}
      </div>
    </div>
  {/if}


<form action='mf_gifts_send.php' method='POST' target="ajaxframe">
  <table align="center" width="90%" border="0" cellpadding="15">
    {foreach key=cid item=con from=$gift_vars}
    {cycle name="startrow3" values="
    <tr align=center>,,,,"}
      <td><img src="mf_gifts/{$con.id}_thumb.{$con.filetype}" onclick="document.getElementById('gift_id_{$con.id}').checked=true;"><br>
        <input type="radio" id="gift_id_{$con.id}" name="gift_id" value="{$con.id}" >
        {lang_print id=$con.lang}</a><br />
      </td>
      {cycle name="endrow3" values=",,,,</tr>
    "}
    {/foreach}
  </table>
  
  
  {* DISPLAY PAGINATION MENU IF APPLICABLE *}
  {if $maxpage > 1}
    <div align='center'>
      {if $p != 1}<a href='mf_gifts_send.php?p={math equation='p-1' p=$p}{$tl}{$to}'>&#171; {lang_print id=182}</a>{else}<font class='disabled'>&#171; {lang_print id=182}</font>{/if}
      {if $p_start == $p_end}
        &nbsp;|&nbsp; {lang_sprintf id=184 1=$p_start 2=$total_vars} &nbsp;|&nbsp; 
      {else}
        &nbsp;|&nbsp; {lang_sprintf id=185 1=$p_start 2=$p_end 3=$total_vars} &nbsp;|&nbsp; 
      {/if}
      {if $p != $maxpage}<a href='mf_gifts_send.php?p={math equation='p+1' p=$p}{$tl}{$to}'>{lang_print id=183} &#187;</a>{else}<font class='disabled'>{lang_print id=183} &#187;</font>{/if}
      </div>
    </div>
  {/if}
  
  
  
  
  

  
  
  
  <table cellpadding='0' cellspacing='0'>
 {if $flag == 0}
  <tr>
      <td class='form1' valign='top'>{lang_print id=790}</td>
      <td class='form2' valign='top' align='left' style='position: relative;'> 
      
      <select name="to">
          <option value="0">{lang_print id=80000033}</option>
  {section name=friend_loop loop=$friends}
          <option value="{$friends[friend_loop]->user_info.user_id}">{$friends[friend_loop]->user_displayname}</option>
   {/section}
</select>
   
      </td>
    </tr>
    {else}
<input type="hidden" name="to" value={$to_id}>{/if}
    <tr>
      <td class='form1'>{lang_print id=726}</td>
      <td class='form2' align='left'><textarea rows='5' cols='20' style='width:350px;' name='message'>{$message}</textarea></td>
    </tr>
    <tr>
      <td class='form1'>{lang_print id=80000018}</td>
      <td class='form2' align='left'><label>
        <input type="radio" name="private" value="0" checked="1">
        {lang_print id=80000019}</label>
        <br>
        <label>
        <input type="radio" name="private" value="1">
        {lang_print id=80000020}</label>
        <br>
      </td>
    </tr>
    <tr>
      <td class='form1'>&nbsp;</td>
      <td class='form2' align='left'><table cellpadding='0' cellspacing='0'>
          <tr>
            <td><input type='submit' class='button' value='{lang_print id=80000022}'>
              &nbsp;</td>
            <input type='hidden' name='task' value='send'>
            <td><input type='button' class='button' value='{lang_print id=39}'></td>
          </tr>
        </table></td>
    </tr>
  </table>
</form>
</div>
</body></html>