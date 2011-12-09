{include file='header.tpl'}

{* $Id: browse_historys.tpl 241 2009-11-14 02:48:21Z phil $ *}

<div class='page_header'>{lang_print id=1500031}</div>

<form method="get" name="seBrowsehistorys" action="browse_historys.php">
<input type="hidden" name="p" value="{$p|default:1}" />

<div style='padding: 7px 10px 7px 10px; background: #F2F2F2; border: 1px solid #BBBBBB; margin: 10px 0px 10px 0px; font-weight: bold;'>
  <table cellpadding='0' cellspacing='0'>
    <tr>
      <td style='padding-right: 3px;'>
        {lang_print id=643}
      </td>
      <td>
        <input type="text" name="history_search" value="{$history_search}" class="text" onblur="document.seBrowsehistorys.submit();"style="width:120px;" />
      </td>
      <td style='padding-left: 3px;'>
        <input type='submit' class='button' value='{lang_print id=646}' />
      </td>
    
      <td style='padding-left: 10px; padding-right: 3px;'>
        {lang_print id=1500032}
      </td>
      <td>
        <select class='small' name='v' onchange="document.seBrowsehistorys.submit();">
        <option value='0'{if $v == "0"} SELECTED{/if}>{lang_print id=1500116}</option>
        {if $user->user_exists}<option value='1'{if $v == "1"} SELECTED{/if}>{lang_print id=1500117}</option>{/if}
        </select>
      </td>
      
      <td style='padding-left: 10px; padding-right: 3px;'>
        {lang_print id=1500034}
      </td>
      <td>
        <select class='small' name='c' onchange="document.seBrowsehistorys.submit();">
          <option value='-1'> </option>
          {section name=historyentrycat_loop loop=$historyentrycats}
          <option value='{$historyentrycats[historyentrycat_loop].historyentrycat_id}'{if $c==$historyentrycats[historyentrycat_loop].historyentrycat_id} SELECTED{/if}>
            {$historyentrycats[historyentrycat_loop].historyentrycat_title|truncate:24}
          </option>
          {/section}
          <option value='0'{if isset($c) && $c==0} SELECTED{/if}>{lang_print id=1500035}</option>
        </select>
      </td>
      
      <td style='padding-left: 10px; padding-right: 3px;'>
        {lang_print id=1500033}
      </td>
      <td>
        <select class='small' name='s' onchange="document.seBrowsehistorys.submit();">
        <option value='historyentry_date DESC'{if $s == "historyentry_date DESC"} SELECTED{/if}>{lang_print id=1500036}</option>
        <option value='historyentry_views DESC'{if $s == "historyentry_views DESC"} SELECTED{/if}>{lang_print id=1500037}</option>
        <option value='historyentry_totalcomments DESC'{if $s == "historyentry_totalcomments DESC"} SELECTED{/if}>{lang_print id=1500038}</option>
        </select>
      </td>
      
    </tr>
  </table>
</div>

</form>


{* DISPLAY PAGINATION MENU IF APPLICABLE *}
{if $maxpage > 1}
  <div style='text-align: center; padding-bottom: 10px;'>
    {if $p != 1}
      <a href='javascript:void(0);' onclick='document.seBrowsehistorys.p.value={math equation="p-1" p=$p};document.seBrowsehistorys.submit();'>&#171; {lang_print id=182}</a>
    {else}
      &#171; {lang_print id=182}
    {/if}
    &nbsp;|&nbsp;&nbsp;
    {if $p_start == $p_end}
      <b>{lang_sprintf id=184 1=$p_start 2=$total_historyentries}</b>
    {else}
      <b>{lang_sprintf id=185 1=$p_start 2=$p_end 3=$total_historyentries}</b>
    {/if}
    &nbsp;&nbsp;|&nbsp;
    {if $p != $maxpage}
      <a href='javascript:void(0);' onclick='document.seBrowsehistorys.p.value={math equation="p+1" p=$p};document.seBrowsehistorys.submit();'>{lang_print id=183} &#187;</a>
    {/if}
  </div>
{/if}



<div>

  {section name=historyentry_loop loop=$historyentries}
    
    <div class='historys_browse_item {cycle name="historymg" values="historys_browse_item_left, historys_browse_item_right"} {cycle name="historybg" values="historys_browse1,historys_browse2,historys_browse2,historys_browse1"}' style='width: 443px; height:115px; float: left;'>
      <table cellpadding='0' cellspacing='0'>
        <tr>
          <td style='vertical-align: top; padding: 10px;'>
            <div style='font-weight: bold; font-size: 13px;'>
              <img src="./images/icons/history_history16.gif" class='button' style='float: left;'>
              <a href='{$url->url_create("history_entry", $historyentries[historyentry_loop].historyentry_author->user_info.user_username, $historyentries[historyentry_loop].historyentry_id)}'>
                {$historyentries[historyentry_loop].historyentry_title|truncate:30:"...":true}
              </a>
            </div>
            <div class='historys_browse_date'>
              {assign var='historyentry_date' value=$datetime->time_since($historyentries[historyentry_loop].historyentry_date)}{capture assign="created"}{lang_sprintf id=$historyentry_date[0] 1=$historyentry_date[1]}{/capture}
              {lang_sprintf id=1500039 1=$created 2=$url->url_create("profile", $historyentries[historyentry_loop].historyentry_author->user_info.user_username) 3=$historyentries[historyentry_loop].historyentry_author->user_displayname}
            </div>
            {if !empty($historyentries[historyentry_loop].historyentrycat_languagevar_id) || !empty($historyentries[historyentry_loop].historyentrycat_title)}
            <div class='historys_browse_date'>
              {if !empty($historyentries[historyentry_loop].historyentrycat_languagevar_id)}{capture assign=historyentrycat_title}{lang_print id=$historyentries[historyentry_loop].historyentrycat_languagevar_id}{/capture}{else}{assign var=historyentrycat_title value=$historyentries[historyentry_loop].historyentrycat_title}{/if}
              Category:
              {if !$historyentries[historyentry_loop].historyentrycat_user_id}<a href='browse_historys.php?c={$historyentries[historyentry_loop].historyentry_historyentrycat_id}'>{/if}
                {$historyentrycat_title|truncate:48}
              {if !$historyentries[historyentry_loop].historyentrycat_user_id}</a>{/if}
            </div>
            {/if}
            <div style='margin-top: 5px;'>
              {lang_sprintf id=1500041 1=$historyentries[historyentry_loop].historyentry_views},
              {lang_sprintf id=1500042 1=$historyentries[historyentry_loop].historyentry_totalcomments}
            </div>
            <div style='margin-top: 8px; font-size: 9px;'>
              {$historyentries[historyentry_loop].historyentry_body|strip_tags|truncate:140:"...":true}
            </div>
          </td>
        </tr>
      </table>
    </div>
    
    {cycle name="historyret" values=",<div style='clear: both; height: 10px;'></div>"}
  {/section}
  
  <div style='clear: both;'></div>
  
</div>


{include file='footer.tpl'}