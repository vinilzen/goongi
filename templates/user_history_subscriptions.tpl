{include file='header.tpl'}

{* $Id: user_history_subscriptions.tpl 241 2009-11-14 02:48:21Z phil $ *}


{* JAVASCRIPT *}
<script type="text/javascript" src="./include/js/class_history.js"></script>
<script type="text/javascript">
  
  SocialEngine.history = new SocialEngineAPI.history();
  SocialEngine.RegisterModule(SocialEngine.history);
  
</script>



<table cellpadding='0' cellspacing='0' width='100%'>
  <tr>
    <td valign='top'>
      
      <img src='./images/icons/history_history48.gif' border='0' class='icon_big' style="margin-bottom: 15px;">
      <div class='page_header'>{lang_print id=1500077}</div>
      <div>
        {lang_print id=1500078}
      </div>
      <br />
      
    </td>
    <td valign='top' align='right'>
      
      <table cellpadding='0' cellspacing='0' width='130'>
      <tr><td class='button' nowrap='nowrap'><a href='user_history.php'><img src='./images/icons/back16.gif' border='0' class='button'>{lang_print id=1500055}</a></td></tr>
      </table>
      
    </td>
  </tr>
</table>
<br />


{* DISPLAY PAGINATION MENU IF APPLICABLE *}
{if $maxpage > 1}
  <div class='center'>
    {if $p != 1}
      <a href='user_history_subscriptions.php?s={$s}&p={math equation="p-1" p=$p}'>&#171; {lang_print id=182}</a>
    {else}
      <font class='disabled'>&#171; {lang_print id=182}</font>
    {/if}
    {if $p_start == $p_end}
      &nbsp;|&nbsp; {lang_sprintf id=184 1=$p_start 2=$history_subscriptions_total} &nbsp;|&nbsp; 
    {else}
      &nbsp;|&nbsp; {lang_sprintf id=185 1=$p_start 2=$p_end 3=$history_subscriptions_total} &nbsp;|&nbsp; 
    {/if}
    {if $p != $maxpage}
      <a href='user_history_subscriptions.php?s={$s}&p={math equation="p+1" p=$p}'>{lang_print id=183} &#187;</a>
    {else}
      <font class='disabled'>{lang_print id=183} &#187;</font>
    {/if}
  </div>
  <br />
{/if}


{* DISPLAY MESSAGE IF NO history SUBSCRIPTIONS *}
{if !$history_subscriptions_total}

  <table cellpadding='0' cellspacing='0' align='center'>
    <tr>
      <td class='result'>
        <img src='./images/icons/bulb16.gif' border='0' class='icon'>
        {lang_print id=1500079}
      </td>
    </tr>
  </table>


{* DISPLAY SUBSCRIPTIONS *}
{else}

  {section name=history_subscriptions_loop loop=$history_subscriptions_list}
    <div style='width: 500px;' id="sehistorySubscriptionRow_{$history_subscriptions_list[history_subscriptions_loop].history_author->user_info.user_id}" class="history_subscription">
      <table cellpadding='0' cellspacing='0' width='100%'>
      <tr>
      <td style='font-size: 12px; font-weight: bold;'>
        <a href="{$url->url_create('profile', $history_subscriptions_list[history_subscriptions_loop].history_author->user_info.user_username)}">{$history_subscriptions_list[history_subscriptions_loop].history_author->user_displayname}</a>
      </td>
      <td align='right'>
        <a href="{$url->url_create('history', $history_subscriptions_list[history_subscriptions_loop].history_author->user_info.user_username)}">{lang_print id=1500083}</a>
        |
        <a href="javascript:void(0);" onclick="SocialEngine.history.unsubscribehistory({$history_subscriptions_list[history_subscriptions_loop].history_author->user_info.user_id});">{lang_print id=1500129}</a>
      </td>
      </tr>
      </table>
      {if !empty($history_subscriptions_list[history_subscriptions_loop].historyentry_id)}
        <div class='sehistoryEntryDate'>{lang_print id=1500081} {$datetime->cdate("`$setting.setting_dateformat`", $datetime->timezone($history_subscriptions_list[history_subscriptions_loop].historyentry_date, $global_timezone))}</div>
        <div><a href="{$url->url_create('history_entry', $history_subscriptions_list[history_subscriptions_loop].history_author->user_info.user_username, $history_subscriptions_list[history_subscriptions_loop].historyentry_id)}">{$history_subscriptions_list[history_subscriptions_loop].historyentry_title}</a></div>
      {/if}
    </div>
  {/section}

{/if}


{include file='footer.tpl'}