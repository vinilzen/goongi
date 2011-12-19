
{* $Id: profile_history.tpl 36 2009-01-27 02:35:37Z john $ *}

{* BEGIN history ENTRIES *}
{if $owner->level_info.level_history_create && $total_historyentries}

  <div class='profile_headline'>{lang_print id=1500043} ({$total_historyentries})</div>
  <div>
    {* LOOP THROUGH FIRST 5 history ENTRIES *}
    {section name=historyentry_loop loop=$historyentries max=5}
    <div class='profile_historyentry'>
      <table cellpadding='0' cellspacing='0'>
        <tr>
          <td valign='top'>
            <a href='{$url->url_create("history_entry", $owner->user_info.user_username, $historyentries[historyentry_loop].historyentry_id)}'>
            </a>
          </td>
          <td valign='top'>
            <div class='profile_historyentry_title'>
              <a href='{$url->url_create("history_entry", $owner->user_info.user_username, $historyentries[historyentry_loop].historyentry_id)}'>
                {$historyentries[historyentry_loop].historyentry_title|truncate:35:"...":true}
              </a>
            </div>
            <div class='profile_historyentry_date'>
              {lang_print id=1500016}
              {assign var="historyentry_date" value=$datetime->time_since($historyentries[historyentry_loop].historyentry_date)}
              {lang_sprintf id=$historyentry_date[0] 1=$historyentry_date[1]}
            </div>
            {if !empty($historyentries[historyentry_loop].historyentrycat_languagevar_id) || !empty($historyentries[historyentry_loop].historyentrycat_title)}
            <div class='profile_historyentry_date'>
              Category:
              <a href='{$url->url_create("history", $owner->user_info.user_username)}&category_id={$historyentries[historyentry_loop].historyentry_historyentrycat_id}'>
                {if !empty($historyentries[historyentry_loop].historyentrycat_languagevar_id)}
                  {capture assign=historyentrycat_title}{lang_print id=$historyentries[historyentry_loop].historyentrycat_languagevar_id}{/capture}
                {else}
                  {assign var=historyentrycat_title value=$historyentries[historyentry_loop].historyentrycat_title}
                {/if}
                {$historyentrycat_title|truncate:97}
              </a>
            </div>
            {/if}
            <div class='profile_historyentry_body'>
              {$historyentries[historyentry_loop].historyentry_body|strip_tags|truncate:160:"...":true}
            </div>
          </td>
        </tr>
      </table>
    </div>
    {/section}
    {* IF MORE THAN 5 ENTRIES, SHOW VIEW MORE LINKS *}
    {if $total_historyentries > 5}
    <div style='border-top: 1px solid #DDDDDD; padding-top: 10px;'>
      <div style='float: left;'>
        <a href='{$url->url_create("history", $owner->user_info.user_username)}'>
          <img src='./images/icons/history_subscribe16.gif' border='0' class='button' style='float: left;' />
          {lang_print id=1500121}
        </a>
      </div>
      <div style='clear: both; height: 0px;'></div>
    </div>
    {/if}
  </div>

{/if}