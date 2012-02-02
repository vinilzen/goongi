{* INCLUDE HEADER CODE *}
{include file="header_global.tpl"}
<link rel="stylesheet" href="./templates/styles_mf_gifts.css" title="stylesheet" type="text/css">
<br>
<div id='success_div' style='display: none;'>{lang_print id=80000021}</div>
{foreach key=cid item=con from=$gift_vars}
<table cellpadding="3" cellspacing="0" border="0" align="center" width="400">
  <tr>
    <td><div class="page_header" align="left">{lang_print id=$con.lang}</div></td>
  </tr>
  <tr>
    <td><img src="mf_gifts/{$con.gift}.{$con.filetype}" onClick="document.getElementById('gift_id_{$con.id}').checked=true;"> </td>
  </tr>
  <tr>
    <td align="left"><div style="margin-top: 10px; margin-bottom: 0px;">
        <div style="margin-top: 10px; margin-bottom: 20px;text-align: left; "><b>{lang_print id=80000023}</b></div>
        {if $con.private != 1 OR $user->user_info.user_id == $con.to_id}
        <div style="float: left; text-align: center; width: 90px;"><a href='{$url->url_create('profile', $gift_author->user_info.user_username)}'><img src='{$gift_author->user_photo('./images/no_photo.gif')}' class='photo' width='{$misc->photo_size($gift_author->user_photo('./images/no_photo.gif'),'75','75','w')}' border='0'></a></div>
        <div style="overflow: hidden;">
          <div class="profile_comment_author"><a href='{$url->url_create('profile', $gift_author->user_info.user_username)}' target="_parent"><b>{$gift_author->user_displayname}</b></a></div>
          {/if}
          <div class="profile_comment_date">{$datetime->cdate("`$setting.setting_dateformat` `$setting.setting_timeformat`", $datetime->timezone($con.date, $global_timezone))}</div>
          <div class="profile_comment_body" id="profile_comment_body_2">{if $con.private != 1 OR $user->user_info.user_id == $con.to_id}{$con.message}{else}
            <div class="page_header" align="center"><b>{lang_print id=80000024}</b></div>
            {/if}</div>
          <div class="profile_comment_links">
            <input type='button' class='button' value='{lang_print id=466}' onClick='parent.TB_remove();'>
          </div>
        </div>
      </div></td>
  </tr>
</table>
{/foreach}
</form>
</div>
</body></html>