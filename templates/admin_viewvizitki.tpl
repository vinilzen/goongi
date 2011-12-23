{include file='admin_header.tpl'}

{* $Id: admin_viewvizitkis.tpl 5 2009-01-11 06:01:16Z john $ *}

<h2>{lang_print id=1700002}</h2>
{lang_print id=1700131}
<br />
<br />


<form action='admin_viewvizitkis.php' method='post'>
<table cellpadding='0' cellspacing='0' width='400' align='center'>
  <tr>
    <td align='center'>
      <div class='box'>
        <table cellpadding='0' cellspacing='0' align='center'>
          <tr>
            <td>
              {lang_print id=1700111}<br />
              <input type='text' class='text' name='f_title' value='{$f_title}' size='15' maxlength='100' />
            </td>
            <td style="padding-left: 3px;">
              {lang_print id=1700080}<br />
              <input type='text' class='text' name='f_owner' value='{$f_owner}' size='15' maxlength='50' />
            </td>
            <td style="padding-left: 3px;">
              {lang_block id=1002 var=langBlockTemp}<input type='submit' class='button' value='{$langBlockTemp}' />{/lang_block}
            </td>
          </tr>
        </table>
      </div>
    </td>
  </tr>
</table>
<input type='hidden' name='s' value='{$s}' />
</form>
<br />


{* IF THERE ARE NO vizitki ENTRIES *}
{if $total_vizitkientries == 0}

  <table cellpadding='0' cellspacing='0' width='400' align='center'>
    <tr>
      <td align='center'>
        <div class='box' style='width: 300px;'><b>{lang_print id=1700112}</b></div>
      </td>
    </tr>
  </table>
  <br>


{* IF THERE ARE vizitki ENTRIES *}
{else}

  {* JAVASCRIPT FOR CHECK ALL *}
  {literal}
  <script language='JavaScript'> 
  <!---
  var checkboxcount = 1;
  function doCheckAll() {
    if(checkboxcount == 0) {
      with (document.items) {
      for (var i=0; i < elements.length; i++) {
      if (elements[i].type == 'checkbox') {
      elements[i].checked = false;
      }}
      checkboxcount = checkboxcount + 1;
      }
    } else
      with (document.items) {
      for (var i=0; i < elements.length; i++) {
      if (elements[i].type == 'checkbox') {
      elements[i].checked = true;
      }}
      checkboxcount = checkboxcount - 1;
      }
  }
  // -->
  </script>
  {/literal}

  <div class='pages'>
    {lang_sprintf id=1700113 1=$total_vizitkientries}
    &nbsp;|&nbsp;
    {lang_print id=1005}
    {section name=page_loop loop=$pages}
      {if $pages[page_loop].link}
        {$pages[page_loop].page}
      {else}
        <a href='admin_viewvizitkis.php?s={$s}&p={$pages[page_loop].page}&f_title={$f_title}&f_owner={$f_owner}'>{$pages[page_loop].page}</a>
      {/if}
    {/section}
  </div>
  
  <form action='admin_viewvizitkis.php' method='post' name='items'>
  <table cellpadding='0' cellspacing='0' class='list'>
    <tr>
      <td class='header' width='10'><input type='checkbox' name='select_all' onClick='javascript:doCheckAll()'></td>
      <td class='header' width='10' style='padding-left: 0px;'><a class='header' href='admin_viewvizitkis.php?s={$i}&p={$p}&f_title={$f_title}&f_owner={$f_owner}'>{lang_print id=87}</a></td>
      <td class='header'><a class='header' href='admin_viewvizitkis.php?s={$t}&p={$p}&f_title={$f_title}&f_owner={$f_owner}'>{lang_print id=1700111}</a></td>
      <td class='header'><a class='header' href='admin_viewvizitkis.php?s={$o}&p={$p}&f_title={$f_title}&f_owner={$f_owner}'>{lang_print id=1700080}</a></td>
      <td class='header' align='center'><a class='header' href='admin_viewvizitkis.php?s={$v}&p={$p}&f_title={$f_title}&f_owner={$f_owner}'>{lang_print id=396}</a></td>
      <td class='header' width='100'><a class='header' href='admin_viewvizitkis.php?s={$d}&p={$p}&f_title={$f_title}&f_owner={$f_owner}'>{lang_print id=88}</a></td>
      <td class='header' width='100'>{lang_print id=173}</td>
    </tr>
    
    {section name=vizitki_loop loop=$entries}
    {assign var='vizitkientry_url' value=$url->url_create('vizitki_entry', $entries[vizitki_loop].vizitkientry_author->user_info.user_username, $entries[vizitki_loop].vizitkientry_id)}
    
    {* CHECK IF NO TITLE *}
    <tr class='{cycle values="background1,background2"}'>
      <td class='item' style='padding-right: 0px;'><input type='checkbox' name='delete_vizitkientries[]' value='{$entries[vizitki_loop].vizitkientry_id}' /></td>
      <td class='item' style='padding-left: 0px;'>{$entries[vizitki_loop].vizitkientry_id}</td>
      <td class='item'>{$entries[vizitki_loop].vizitkientry_title}</td>
      <td class='item'><a href='{$url->url_create("profile", $entries[vizitki_loop].vizitkientry_author->user_info.user_username)}' target='_blank'>{$entries[vizitki_loop].vizitkientry_author->user_info.user_username}</a></td>
      <td class='item' align='center'>{$entries[vizitki_loop].vizitkientry_views}</td>
      <td class='item'>{$datetime->cdate($setting.setting_dateformat, $datetime->timezone($entries[vizitki_loop].vizitkientry_date, $setting.setting_timezone))}</td>
      <td class='item'>
        [ <a href='admin_loginasuser.php?user_id={$entries[vizitki_loop].vizitkientry_author->user_info.user_id}&return_url={$vizitkientry_url}' target='_blank'>{lang_print id=1700115}</a> ]
        [ <a href="javascript:if(confirm('{lang_print id=1700114}')) {literal}{{/literal} location.href = 'admin_viewvizitkis.php?task=deleteentries&delete_vizitkientries[]={$entries[vizitki_loop].vizitkientry_id}&s={$s}&p={$p}&f_title={$f_title}&f_owner={$f_owner}'; {literal}}{/literal}">{lang_print id=175}</a> ]
      </td>
    </tr>
    {/section}
  </table>
  <br />
  
  
  <table cellpadding='0' cellspacing='0' width='100%'>
    <tr>
      <td>
        {lang_block id=788 var=langBlockTemp}<input type='submit' class='button' value='{$langBlockTemp}' />{/lang_block}
        <input type='hidden' name='task' value='deleteentries' />
        <input type='hidden' name='p' value='{$p}' />
        <input type='hidden' name='s' value='{$s}' />
        <input type='hidden' name='f_title' value='{$f_title}' />
        <input type='hidden' name='f_owner' value='{$f_owner}' />
        </form>
      </td>
      <td align='right' valign='top'>
        <div class='pages2'>
          {lang_sprintf id=1700113 1=$total_vizitkientries}
          &nbsp;|&nbsp;
          {lang_print id=1005}
          {section name=page_loop loop=$pages}
            {if $pages[page_loop].link}
              {$pages[page_loop].page}
            {else}
              <a href='admin_viewvizitkis.php?s={$s}&p={$pages[page_loop].page}&f_title={$f_title}&f_owner={$f_owner}'>{$pages[page_loop].page}</a>
            {/if}
          {/section}
        </div>
      </td>
    </tr>
  </table>

{/if}

{include file='admin_footer.tpl'}