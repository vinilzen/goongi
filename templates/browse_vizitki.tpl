{include file='header.tpl'}

{* $Id: browse_vizitkis.tpl 241 2009-11-14 02:48:21Z phil $ *}

<div class='page_header'>{lang_print id=1700031}</div>

<form method="get" name="seBrowsevizitkis" action="browse_vizitkis.php">
<input type="hidden" name="p" value="{$p|default:1}" />

<div style='padding: 7px 10px 7px 10px; background: #F2F2F2; border: 1px solid #BBBBBB; margin: 10px 0px 10px 0px; font-weight: bold;'>
  <table cellpadding='0' cellspacing='0'>
    <tr>
      <td style='padding-right: 3px;'>
        {lang_print id=643}
      </td>
      <td>
        <input type="text" name="vizitki_search" value="{$vizitki_search}" class="text" onblur="document.seBrowsevizitkis.submit();"style="width:120px;" />
      </td>
      <td style='padding-left: 3px;'>
        <input type='submit' class='button' value='{lang_print id=646}' />
      </td>
    
      <td style='padding-left: 10px; padding-right: 3px;'>
        {lang_print id=1700032}
      </td>
      <td>
        <select class='small' name='v' onchange="document.seBrowsevizitkis.submit();">
        <option value='0'{if $v == "0"} SELECTED{/if}>{lang_print id=1700116}</option>
        {if $user->user_exists}<option value='1'{if $v == "1"} SELECTED{/if}>{lang_print id=1700117}</option>{/if}
        </select>
      </td>
      
      <td style='padding-left: 10px; padding-right: 3px;'>
        {lang_print id=1700034}
      </td>
      <td>
        <select class='small' name='c' onchange="document.seBrowsevizitkis.submit();">
          <option value='-1'> </option>
          {section name=vizitkientrycat_loop loop=$vizitkientrycats}
          <option value='{$vizitkientrycats[vizitkientrycat_loop].vizitkientrycat_id}'{if $c==$vizitkientrycats[vizitkientrycat_loop].vizitkientrycat_id} SELECTED{/if}>
            {$vizitkientrycats[vizitkientrycat_loop].vizitkientrycat_title|truncate:24}
          </option>
          {/section}
          <option value='0'{if isset($c) && $c==0} SELECTED{/if}>{lang_print id=1700035}</option>
        </select>
      </td>
      
      <td style='padding-left: 10px; padding-right: 3px;'>
        {lang_print id=1700033}
      </td>
      <td>
        <select class='small' name='s' onchange="document.seBrowsevizitkis.submit();">
        <option value='vizitkientry_date DESC'{if $s == "vizitkientry_date DESC"} SELECTED{/if}>{lang_print id=1700036}</option>
        <option value='vizitkientry_views DESC'{if $s == "vizitkientry_views DESC"} SELECTED{/if}>{lang_print id=1700037}</option>
        <option value='vizitkientry_totalcomments DESC'{if $s == "vizitkientry_totalcomments DESC"} SELECTED{/if}>{lang_print id=1700038}</option>
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
      <a href='javascript:void(0);' onclick='document.seBrowsevizitkis.p.value={math equation="p-1" p=$p};document.seBrowsevizitkis.submit();'>&#171; {lang_print id=182}</a>
    {else}
      &#171; {lang_print id=182}
    {/if}
    &nbsp;|&nbsp;&nbsp;
    {if $p_start == $p_end}
      <b>{lang_sprintf id=184 1=$p_start 2=$total_vizitkientries}</b>
    {else}
      <b>{lang_sprintf id=185 1=$p_start 2=$p_end 3=$total_vizitkientries}</b>
    {/if}
    &nbsp;&nbsp;|&nbsp;
    {if $p != $maxpage}
      <a href='javascript:void(0);' onclick='document.seBrowsevizitkis.p.value={math equation="p+1" p=$p};document.seBrowsevizitkis.submit();'>{lang_print id=183} &#187;</a>
    {/if}
  </div>
{/if}



<div>

  {section name=vizitkientry_loop loop=$vizitkientries}
    
    <div class='vizitkis_browse_item {cycle name="vizitkimg" values="vizitkis_browse_item_left, vizitkis_browse_item_right"} {cycle name="vizitkibg" values="vizitkis_browse1,vizitkis_browse2,vizitkis_browse2,vizitkis_browse1"}' style='width: 443px; height:115px; float: left;'>
      <table cellpadding='0' cellspacing='0'>
        <tr>
          <td style='vertical-align: top; padding: 10px;'>
            <div style='font-weight: bold; font-size: 13px;'>
              <img src="./images/icons/vizitki_vizitki16.gif" class='button' style='float: left;'>
              <a href='{$url->url_create("vizitki_entry", $vizitkientries[vizitkientry_loop].vizitkientry_author->user_info.user_username, $vizitkientries[vizitkientry_loop].vizitkientry_id)}'>
                {$vizitkientries[vizitkientry_loop].vizitkientry_title|truncate:30:"...":true}
              </a>
            </div>
            <div class='vizitkis_browse_date'>
              {assign var='vizitkientry_date' value=$datetime->time_since($vizitkientries[vizitkientry_loop].vizitkientry_date)}{capture assign="created"}{lang_sprintf id=$vizitkientry_date[0] 1=$vizitkientry_date[1]}{/capture}
              {lang_sprintf id=1700039 1=$created 2=$url->url_create("profile", $vizitkientries[vizitkientry_loop].vizitkientry_author->user_info.user_username) 3=$vizitkientries[vizitkientry_loop].vizitkientry_author->user_displayname}
            </div>
            {if !empty($vizitkientries[vizitkientry_loop].vizitkientrycat_languagevar_id) || !empty($vizitkientries[vizitkientry_loop].vizitkientrycat_title)}
            <div class='vizitkis_browse_date'>
              {if !empty($vizitkientries[vizitkientry_loop].vizitkientrycat_languagevar_id)}{capture assign=vizitkientrycat_title}{lang_print id=$vizitkientries[vizitkientry_loop].vizitkientrycat_languagevar_id}{/capture}{else}{assign var=vizitkientrycat_title value=$vizitkientries[vizitkientry_loop].vizitkientrycat_title}{/if}
              Category:
              {if !$vizitkientries[vizitkientry_loop].vizitkientrycat_user_id}<a href='browse_vizitkis.php?c={$vizitkientries[vizitkientry_loop].vizitkientry_vizitkientrycat_id}'>{/if}
                {$vizitkientrycat_title|truncate:48}
              {if !$vizitkientries[vizitkientry_loop].vizitkientrycat_user_id}</a>{/if}
            </div>
            {/if}
            <div style='margin-top: 5px;'>
              {lang_sprintf id=1700041 1=$vizitkientries[vizitkientry_loop].vizitkientry_views},
              {lang_sprintf id=1700042 1=$vizitkientries[vizitkientry_loop].vizitkientry_totalcomments}
            </div>
            <div style='margin-top: 8px; font-size: 9px;'>
              {$vizitkientries[vizitkientry_loop].vizitkientry_body|strip_tags|truncate:140:"...":true}
            </div>
          </td>
        </tr>
      </table>
    </div>
    
    {cycle name="vizitkiret" values=",<div style='clear: both; height: 10px;'></div>"}
  {/section}
  
  <div style='clear: both;'></div>
  
</div>


{include file='footer.tpl'}