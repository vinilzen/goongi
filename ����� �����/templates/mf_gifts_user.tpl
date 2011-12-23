{include file='header.tpl'}

{if $flag == 1}
<table cellpadding='0' cellspacing='0'>
  <tr>
    <td class='messages_left'><img src='images/icons/gifts48.gif' border='0' class='icon_big'>
      <div class='page_header'>{lang_print id=80000030}</div>
      <div>{lang_sprintf id=80000031 1=$total_vars 2=$total_send}</div>
      <br>
    </td>
    <td class='messages_right'><table cellpadding='0' cellspacing='0'>
        <tr>
          <td class='button' nowrap='nowrap'><a href="mf_gifts_send.php"><img src='images/icons/gifts16.gif' class='icon' border='0'>{lang_print id=80000026}</a> </td>
        </tr>
      </table></td>
  </tr>
</table>
{else}
<div class='page_header'><a href='{$url->url_create('profile', $owner)}'>{lang_sprintf id=80000029 1=$owner}</a></div>
{/if}

  {* DISPLAY PAGINATION MENU IF APPLICABLE *}
  {if $maxpage > 1}
  <div align='center'> {if $p != 1}<a href='mf_gifts_user.php?user={$owner->user_info.user_username}&p={math equation='p-1' p=$p}'>&#171; {lang_print id=182}</a>{else}<font class='disabled'>&#171; {lang_print id=182}</font>{/if}
  {if $p_start == $p_end}
  &nbsp;|&nbsp; {lang_sprintf id=184 1=$p_start 2=$total_vars} &nbsp;|&nbsp; 
  {else}
  &nbsp;|&nbsp; {lang_sprintf id=185 1=$p_start 2=$p_end 3=$total_vars} &nbsp;|&nbsp; 
  {/if}
  {if $p != $maxpage}<a href='mf_gifts_user.php?user={$owner->user_info.user_username}&p={math equation='p+1' p=$p}'>{lang_print id=183} &#187;</a>{else}<font class='disabled'>{lang_print id=183} &#187;</font>{/if} </div>
  </div>
{/if}
  
        {literal}
<script language="JavaScript">
        <!--
        Rollimage0 = new Image(10,12);
        Rollimage0.src = "images/icons/action_delete1.gif";
        Rollimage1 = new Image(10,12);
        Rollimage1.src = "images/icons/action_delete2.gif";

        function gift_delete(gift_id) {
        	$('gift_' + gift_id).style.display = 'none';
        }
        //-->
        </script>
{/literal}
<table align="center" border="0">
  {foreach key=cid item=con from=$gifts}
  {cycle name="startrow3" values="
  <tr align=center>,,,,"}
    <td width="200" height="150"><div style='padding-bottom: 10px;' id='gift_{$con.gift_id}'>
        <table>
          <tr>
            <td align="center"><a href="javascript:TB_show('{lang_print id=8000025} {$owner->user_displayname}', 'mf_gift_view.php?view={$con.gift_id}&user={$con.to}&TB_iframe=true&height=420&width=400', '', './images/trans.gif');"><img src="mf_gifts/{$con.file}_thumb.{$con.filetype}" border="0"></a><br>
              <a href="javascript:TB_show('{lang_print id=8000025} {$owner->user_displayname}', 'mf_gift_view.php?view={$con.gift_id}&user={$owner->user_info.user_id}&TB_iframe=true&height=420&width=400', '', './images/trans.gif');">{lang_print id=$con.lang}</a><br>
              {if $con.private != 1 OR $user->user_info.user_id == $con.to} <a href='{$url->url_create('profile', $con.from->user_info.user_username)}'><b>{$con.from->user_displayname}</b></a> {else}<b>{lang_print id=80000024}</b>{/if} <br>
              {$datetime->cdate("`$setting.setting_dateformat`", $datetime->timezone("`$con.date`", $global_timezone))}<br>
              {if $user->user_info.user_id == $con.to}<img src='./images/icons/action_delete1.gif' style='vertical-align: middle; margin-left: 3px; cursor: pointer; cursor: hand;' border='0' onMouseOver="this.src=Rollimage1.src;" onMouseOut="this.src=Rollimage0.src;" onClick="javascript:$('ajaxframe').src='mf_gifts_user.php?task=gift_delete&gift_id={$con.gift_id}'">{/if} </td>
          </tr>
        </table>
      </div></td>
    {cycle name="endrow3" values=",,,,</tr>
  "}
  {/foreach}
</table>
</div>
{* DISPLAY PAGINATION MENU IF APPLICABLE *}
  {if $maxpage > 1}
  <div align='center'> {if $p != 1}<a href='mf_gifts_user.php?user={$owner->user_info.user_username}&p={math equation='p-1' p=$p}'>&#171; {lang_print id=182}</a>{else}<font class='disabled'>&#171; {lang_print id=182}</font>{/if}
  {if $p_start == $p_end}
  &nbsp;|&nbsp; {lang_sprintf id=184 1=$p_start 2=$total_vars} &nbsp;|&nbsp; 
  {else}
  &nbsp;|&nbsp; {lang_sprintf id=185 1=$p_start 2=$p_end 3=$total_vars} &nbsp;|&nbsp; 
  {/if}
  {if $p != $maxpage}<a href='mf_gifts_user.php?user={$owner->user_info.user_username}&p={math equation='p+1' p=$p}'>{lang_print id=183} &#187;</a>{else}<font class='disabled'>{lang_print id=183} &#187;</font>{/if} </div>
  </div>
{/if}
{include file='footer.tpl'}