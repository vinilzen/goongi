{include file='header.tpl'}

{* $Id: user_vizitki_subscriptions.tpl 241 2009-11-14 02:48:21Z phil $ *}


{* JAVASCRIPT *}
<script type="text/javascript" src="./include/js/class_vizitki.js"></script>
<script type="text/javascript">
  
  SocialEngine.vizitki = new SocialEngineAPI.vizitki();
  SocialEngine.RegisterModule(SocialEngine.vizitki);
  
</script>



<table cellpadding='0' cellspacing='0' width='100%'>
  <tr>
    <td valign='top'>
      
      <img src='./images/icons/vizitki_vizitki48.gif' border='0' class='icon_big' style="margin-bottom: 15px;">
      <div class='page_header'>{lang_print id=1700077}</div>
      <div>
        {lang_print id=1700078}
      </div>
      <br />
      
    </td>
    <td valign='top' align='right'>
      
      <table cellpadding='0' cellspacing='0' width='130'>
      <tr><td class='button' nowrap='nowrap'><a href='user_vizitki.php'><img src='./images/icons/back16.gif' border='0' class='button'>{lang_print id=1700055}</a></td></tr>
      </table>
      
    </td>
  </tr>
</table>
<br />


{* DISPLAY PAGINATION MENU IF APPLICABLE *}
{if $maxpage > 1}
  <div class='center'>
    {if $p != 1}
      <a href='user_vizitki_subscriptions.php?s={$s}&p={math equation="p-1" p=$p}'>&#171; {lang_print id=182}</a>
    {else}
      <font class='disabled'>&#171; {lang_print id=182}</font>
    {/if}
    {if $p_start == $p_end}
      &nbsp;|&nbsp; {lang_sprintf id=184 1=$p_start 2=$vizitki_subscriptions_total} &nbsp;|&nbsp; 
    {else}
      &nbsp;|&nbsp; {lang_sprintf id=185 1=$p_start 2=$p_end 3=$vizitki_subscriptions_total} &nbsp;|&nbsp; 
    {/if}
    {if $p != $maxpage}
      <a href='user_vizitki_subscriptions.php?s={$s}&p={math equation="p+1" p=$p}'>{lang_print id=183} &#187;</a>
    {else}
      <font class='disabled'>{lang_print id=183} &#187;</font>
    {/if}
  </div>
  <br />
{/if}


{* DISPLAY MESSAGE IF NO vizitki SUBSCRIPTIONS *}
{if !$vizitki_subscriptions_total}

  <table cellpadding='0' cellspacing='0' align='center'>
    <tr>
      <td class='result'>
        <img src='./images/icons/bulb16.gif' border='0' class='icon'>
        {lang_print id=1700079}
      </td>
    </tr>
  </table>


{* DISPLAY SUBSCRIPTIONS *}
{else}

  {section name=vizitki_subscriptions_loop loop=$vizitki_subscriptions_list}
    <div style='width: 500px;' id="sevizitkiSubscriptionRow_{$vizitki_subscriptions_list[vizitki_subscriptions_loop].vizitki_author->user_info.user_id}" class="vizitki_subscription">
      <table cellpadding='0' cellspacing='0' width='100%'>
      <tr>
      <td style='font-size: 12px; font-weight: bold;'>
        <a href="{$url->url_create('profile', $vizitki_subscriptions_list[vizitki_subscriptions_loop].vizitki_author->user_info.user_username)}">{$vizitki_subscriptions_list[vizitki_subscriptions_loop].vizitki_author->user_displayname}</a>
      </td>
      <td align='right'>
        <a href="{$url->url_create('vizitki', $vizitki_subscriptions_list[vizitki_subscriptions_loop].vizitki_author->user_info.user_username)}">{lang_print id=1700083}</a>
        |
        <a href="javascript:void(0);" onclick="SocialEngine.vizitki.unsubscribevizitki({$vizitki_subscriptions_list[vizitki_subscriptions_loop].vizitki_author->user_info.user_id});">{lang_print id=1700129}</a>
      </td>
      </tr>
      </table>
      {if !empty($vizitki_subscriptions_list[vizitki_subscriptions_loop].vizitkientry_id)}
        <div class='sevizitkiEntryDate'>{lang_print id=1700081} {$datetime->cdate("`$setting.setting_dateformat`", $datetime->timezone($vizitki_subscriptions_list[vizitki_subscriptions_loop].vizitkientry_date, $global_timezone))}</div>
        <div><a href="{$url->url_create('vizitki_entry', $vizitki_subscriptions_list[vizitki_subscriptions_loop].vizitki_author->user_info.user_username, $vizitki_subscriptions_list[vizitki_subscriptions_loop].vizitkientry_id)}">{$vizitki_subscriptions_list[vizitki_subscriptions_loop].vizitkientry_title}</a></div>
      {/if}
    </div>
  {/section}

{/if}


{include file='footer.tpl'}