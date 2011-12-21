<div class='profile_headline'> {lang_print id=80000007} ({$total_gifts}) </div>
{if $total_gifts > 10}&nbsp;[ <a href='{$url->url_create('mf_gifts_user', $owner->user_info.user_username)}'>{lang_print id=1021}</a> ]{/if}
<table cellpadding='0' cellspacing='0' class='list' width='350' border="0">
<tr>
  <table align="center" border="0" cellpadding="5">
    {foreach key=cid item=con from=$gifts}
    {cycle name="startrow3" values="
    <tr align=center>,,,,"}
      <td width="100"><a href="javascript:TB_show('{lang_print id=8000025} {$owner->user_displayname}', 'mf_gift_view.php?view={$con.gift_id}&user={$owner->user_info.user_id}&TB_iframe=true&height=420&width=450', '', './images/trans.gif');"><img src="mf_gifts/{$con.file}_thumb.{$con.filetype}" border="0"></a><br>
        <a href="javascript:TB_show('{lang_print id=8000025} {$owner->user_displayname}', 'mf_gift_view.php?view={$con.gift_id}&user={$owner->user_info.user_id}&TB_iframe=true&height=420&width=450', '', './images/trans.gif');">{lang_print id=$con.lang}</a><br />
      </td>
      {cycle name="endrow3" values=",,,,</tr>
    "}
    {/foreach}
  </table>