
{* $Id: profile_vizitki.tpl 36 2009-01-27 02:35:37Z john $ *}

{* BEGIN vizitki ENTRIES *}
{if $owner->level_info.level_vizitki_create && $total_vizitkientries}

  <div class='profile_headline'>{lang_print id=1700043} ({$total_vizitkientries})</div>
  <div>
    {* LOOP THROUGH FIRST 5 vizitki ENTRIES *}
    {section name=vizitkientry_loop loop=$vizitkientries max=5}
    <div class='profile_vizitkientry'>
      <table cellpadding='0' cellspacing='0'>
        <tr>
          <td valign='top'>
            <a href='{$url->url_create("vizitki_entry", $owner->user_info.user_username, $vizitkientries[vizitkientry_loop].vizitkientry_id)}'>
              <img src='./images/icons/vizitki_vizitki16.gif' border='0' class='icon' />
            </a>
          </td>
          <td valign='top'>
            <div class='profile_vizitkientry_title'>
              <a href='{$url->url_create("vizitki_entry", $owner->user_info.user_username, $vizitkientries[vizitkientry_loop].vizitkientry_id)}'>
                {$vizitkientries[vizitkientry_loop].vizitkientry_title|truncate:35:"...":true}
              </a>
            </div>
            <div class='profile_vizitkientry_date'>
              {lang_print id=1700016}
              {assign var="vizitkientry_date" value=$datetime->time_since($vizitkientries[vizitkientry_loop].vizitkientry_date)}
              {lang_sprintf id=$vizitkientry_date[0] 1=$vizitkientry_date[1]}
            </div>
            {if !empty($vizitkientries[vizitkientry_loop].vizitkientrycat_languagevar_id) || !empty($vizitkientries[vizitkientry_loop].vizitkientrycat_title)}
            <div class='profile_vizitkientry_date'>
              Category:
              <a href='{$url->url_create("vizitki", $owner->user_info.user_username)}&category_id={$vizitkientries[vizitkientry_loop].vizitkientry_vizitkientrycat_id}'>
                {if !empty($vizitkientries[vizitkientry_loop].vizitkientrycat_languagevar_id)}
                  {capture assign=vizitkientrycat_title}{lang_print id=$vizitkientries[vizitkientry_loop].vizitkientrycat_languagevar_id}{/capture}
                {else}
                  {assign var=vizitkientrycat_title value=$vizitkientries[vizitkientry_loop].vizitkientrycat_title}
                {/if}
                {$vizitkientrycat_title|truncate:97}
              </a>
            </div>
            {/if}
            <div class='profile_vizitkientry_body'>
              {$vizitkientries[vizitkientry_loop].vizitkientry_body|strip_tags|truncate:160:"...":true}
            </div>
          </td>
        </tr>
      </table>
    </div>
    {/section}
    {* IF MORE THAN 5 ENTRIES, SHOW VIEW MORE LINKS *}
    {if $total_vizitkientries > 5}
    <div style='border-top: 1px solid #DDDDDD; padding-top: 10px;'>
      <div style='float: left;'>
        <a href='{$url->url_create("vizitki", $owner->user_info.user_username)}'>
          <img src='./images/icons/vizitki_subscribe16.gif' border='0' class='button' style='float: left;' />
          {lang_print id=1700121}
        </a>
      </div>
      <div style='clear: both; height: 0px;'></div>
    </div>
    {/if}
  </div>

{/if}