{include file='admin_header.tpl'}
<h2>{lang_print id=80000005}</h2>
{lang_print id=80000008} <br>
<br>
{if $result != 0}
<div class='success'><img src='../images/success.gif' class='icon' border='0'> {lang_print id=191}</div>
{/if}
<table cellpadding='0' cellspacing='0' width='100%'>
  <td class='header' colspan="2">{lang_print id=192}</td>
  </tr>
  <td class='setting1'> {lang_print id=80000012}<br>
      <form method="POST">
        <input type="text" style="margin: 2px 0px; width: 250px; {$error_ef}" name="new_category">
        <select class='small' name='language_id'>
      {section name=lang_loop loop=$lang_packlist}
          <option value='{$lang_packlist[lang_loop].language_id}'{if $lang_packlist[lang_loop].language_id == $global_language} selected='selected'{/if}>{$lang_packlist[lang_loop].language_name}</option>
       {/section}
        </select>
        <br>
        <input type='submit' class='button' value='{lang_print id=173}'>
        <input type='hidden' name='task' value='new_categ'>
      </form></td>
    <td class='setting1' valign="top" rowspan="2" width="250"><table cellpadding='0' cellspacing='0' class='list' width='350' border="0">
        <tr>
          <td class='header'>{lang_print id=80000009}</td>
          <td class='header' align="center" width="40" style='padding: 0px;'>{lang_print id=80000010}</td>
          <td class='header' align="center" width="70" style='padding: 0px;'>{lang_print id=80000011}</td>
        </tr>
        <!-- LOOP THROUGH USERS -->
        {foreach name=outer key=id item=category from=$categ_list}
        {foreach from=$category key=type_id item=type_val}
        <tr class='{cycle values="background1,background2"}'>
          <td class='item'><a href="admin_gifts.php?type={$id}"><span id='span_$id'>{lang_print id=$type_id}</span></a></td>
          <td style='padding: 0px; border-top: 1px solid #DDDDDD' align="center"><b>{$type_val}</b></td>
          <td style='padding: 0px; border-top: 1px solid #DDDDDD' align="center"><a href="javascript:void(0);" onClick="editPhrase('{$type_id}', {$type_id});" onFocus="toggleRow('tr_{$con.lang}');" onBlur="toggleRow('tr_{$type_id}');" tabindex='{$type_id}' id='link_{$type_id}'><img src="../images/icons/admin_language16.gif" class="icon2" border="0"></a><a href='javascript:void(0);' onClick="confirmDeleteCategory('{$id}');"><img src="../images/error.gif" class="icon2" border="0"></a></td>
        </tr>
        {/foreach}
        {/foreach}
      </table></td>
  </tr>
  <tr>
    <td class='setting2'> {if isset($categ_list)}
      <form method="POST" enctype="multipart/form-data">
        <table cellpadding='2' cellspacing='0'>
        <tr>
          <td width="90">{lang_print id=80000013}:</td>
          <td><select class='small' name='category'>
{foreach name=outer key=id item=category from=$categ_list}
{foreach from=$category key=type_id item=type_val}
              <option value="{$id}">{lang_print id=$type_id} ({$type_val})</option>
{/foreach}
{/foreach}      
            </select>
          </td>
        </tr>
        <tr>
          <td>{lang_print id=80000009}:</td>
          <td><input type='text' name='title' style="width:80%; {$error_ef2}">
            <select class='small' name='language_id'>
      {section name=lang_loop loop=$lang_packlist}
              <option value='{$lang_packlist[lang_loop].language_id}'{if $lang_packlist[lang_loop].language_id == $global_language} selected='selected'{/if}>{$lang_packlist[lang_loop].language_name}</option>
       {/section}
            </select>
          </td>
        </tr>
        <tr>
          <td>{lang_print id=359}</td>
          <td><input type='file' name='new_file' size='60' class='text'">
          </td>
        </tr>
        <tr>
          <td></td>
          <td><table cellpadding="0" cellspacing="0" width="100%">
              <tr>
                <td>{lang_print id=312}
                  <input type="text" name="height" size="2" value="200" style="background:none;border-right:hidden;border-top:hidden;border-left:hidden; border-bottom-color:#000000;text-align:center;" maxlength="4">
                  px</td>
                <td>{lang_print id=310}
                  <input type="text" name="width" size="2" value="200" style="background:none;border-right:hidden;border-top:hidden;border-left:hidden; border-bottom-color:#000000;text-align:center;" maxlength="4">
                  px</td>
                <td align="right"><input type='submit' class='button' value='{lang_print id=714}'></td>
              </tr>
            </table>
            <input type='hidden' name='task' value='add_file'>
      </form></td>
  </tr>
</table>
{/if}
</td>
<td></td>
</tr>
</table>
<br>
{* DISPLAY PAGINATION MENU IF APPLICABLE *}
  {if $maxpage > 1}
  <div align='center'> {if $p != 1}<a href='admin_gifts.php?type={$type_a}&p={math equation='p-1' p=$p}'>&#171; {lang_print id=182}</a>{else}<font class='disabled'>&#171; {lang_print id=182}</font>{/if}
  {if $p_start == $p_end}
  &nbsp;|&nbsp; {lang_sprintf id=184 1=$p_start 2=$total_vars} &nbsp;|&nbsp; 
  {else}
  &nbsp;|&nbsp; {lang_sprintf id=185 1=$p_start 2=$p_end 3=$total_vars} &nbsp;|&nbsp; 
  {/if}
  {if $p != $maxpage}<a href='admin_gifts.php?type={$type_a}&p={math equation='p+1' p=$p}'>{lang_print id=183} &#187;</a>{else}<font class='disabled'>{lang_print id=183} &#187;</font>{/if} </div>
  </div>
{/if}
<h2>{lang_print id=80000014} {if !isset($type_a)}{lang_print id=80000016}{else}{lang_print id=$type_a+80000100}{/if}</h2>
<table align="center" border="0">
  {foreach key=cid item=con from=$gift_vars}
  {cycle name="startrow3" values="
  <tr valign=top>,,"}
    <td><table cellpadding="5" cellspacing="5" border="0" style="	border: 1px solid #CCCCCC; padding: 0px; margin-right: 10px;" width="250">
        <tr>
          <td width="70"><img src='../mf_gifts/{$con.id}_thumb.{$con.filetype}' class='photo' border='0'> </td>
          <td valign="top"><b>{lang_print id=80000009}:</b> <span id='span_{$con.lang}'>{lang_print id=$con.lang}</span><br>
            <b>{lang_print id=107}</b> {lang_print id=$con.type+80000100}<br>
            <b>{lang_print id=80000015}:</b> {$datetime->cdate("`$setting.setting_dateformat`", $datetime->timezone("`$con.date`", $global_timezone))}<br>
            <b>{lang_print id=497}:</b> {$con.hits}
            <div align="right"><a href="javascript:void(0);" onClick="editPhrase('{$con.lang}', {$cid});" onFocus="toggleRow('tr_{$con.lang}');" onBlur="toggleRow('tr_{$con.lang}');" tabindex='{$cid}' id='link_{$cid}'><img src="../images/icons/admin_language16.gif" class="icon2" border="0"></a><a href='javascript:void(0);' onClick="confirmDeleteImage('{$con.id}');"><img src="../images/error.gif" class="icon2" border="0"></a></div></td>
        </tr>
      </table></td>
    {cycle name="endrow3" values=",,</tr>
  "}
  {/foreach}
</table>
{* DISPLAY PAGINATION MENU IF APPLICABLE *}
  {if $maxpage > 1}
  <div align='center'> {if $p != 1}<a href='admin_gifts.php?type={$type_a}&p={math equation='p-1' p=$p}'>&#171; {lang_print id=182}</a>{else}<font class='disabled'>&#171; {lang_print id=182}</font>{/if}
  {if $p_start == $p_end}
  &nbsp;|&nbsp; {lang_sprintf id=184 1=$p_start 2=$total_vars} &nbsp;|&nbsp; 
  {else}
  &nbsp;|&nbsp; {lang_sprintf id=185 1=$p_start 2=$p_end 3=$total_vars} &nbsp;|&nbsp; 
  {/if}
  {if $p != $maxpage}<a href='admin_gifts.php?type={$type_a}&p={math equation='p+1' p=$p}'>{lang_print id=183} &#187;</a>{else}<font class='disabled'>{lang_print id=183} &#187;</font>{/if} </div>
  </div>
{/if}
  {* JAVASCRIPT FOR CONFIRMING DELETION *}
  {literal}
<script type="text/javascript">
  <!-- 
  var current_tabindex = 1;
  function editPhrase(id, tabindex) {
    current_tabindex = tabindex+1;
    $('languagevar_id').value = id;
    var request = new Request.JSON({secure: false, url: 'admin_language_edit.php?task=getphrase&languagevar_id='+id,
		onComplete: function(jsonObj) { 
			edit(jsonObj.phrases);
		}
    }).send();
  }
  function edit(phrases) {
    phrases.each(function(phrase) {
      for(var x in phrase) {
        $('var_'+x).innerHTML = phrase[x];
      }
    });

    TB_show('{/literal}{lang_print id=188}{literal}', '#TB_inline?height=400&width=600&inlineId=editphrase', '', '../images/trans.gif');
    setTimeout("$('TB_window').getElementById('var_{/literal}{$language.language_id}{literal}').focus();$('TB_window').getElementById('var_{/literal}{$language.language_id}{literal}').select();", "300");
  }
  function edit_result(id, phrase_value) {
    $('span_'+id).innerHTML = phrase_value.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;");
    changefocus();
  }
  function changefocus() {
    if($('link_'+current_tabindex)) $('link_'+current_tabindex).focus();
  }
  //-->
  </script>
{/literal}

  {* HIDDEN DIV TO DISPLAY EDIT PHRASES *}
<div style='display: none;' id='editphrase'>
  <form action='admin_language_edit.php' method='post' name='editform' target='ajaxframe' onSubmit='parent.TB_remove();'>
    {lang_print id=189}<br>
    <br>
    {section name=lang_loop loop=$lang_packlist}
    {$lang_packlist[lang_loop].language_name}<br>
    <textarea name='languagevar_value[{$lang_packlist[lang_loop].language_id}]' id='var_{$lang_packlist[lang_loop].language_id}' cols='25' rows='7' onFocus='this.select();' tabindex='{math equation='x+y+1' x=$langvars|@count y=$smarty.section.lang_loop.index}' class='text' style='width: 100%; font-size: 9pt;'></textarea>
    <br>
    <br>
    {/section}
    <input type='submit' class='button' value='{lang_print id=188}' tabindex='{math equation='x+y+1' x=$langvars|@count y=$lang_packlist|@count}'>
    <input type='button' class='button' value='{lang_print id=39}' onClick='parent.TB_remove();parent.changefocus();' tabindex='{math equation='x+y+1' x=$langvars|@count y=$lang_packlist|@count}'>
    <input type='hidden' name='task' value='edit'>
    <input type='hidden' name='languagevar_id' id='languagevar_id' value=''>
    <input type='hidden' name='language_id' value='1'>
    <input type='hidden' name='p' value='1}'>
    <input type='hidden' name='phrase' value='report'>
  </form>
</div>
{* JAVASCRIPT FOR CONFIRMING DELETION *}
{literal}
<script type="text/javascript">
<!-- 
var object = 0;
function confirmDeleteCategory(id) {
  object = id;
  TB_show('{/literal}{lang_print id=175}?{literal}', '#TB_inline?height=100&width=300&inlineId=confirmdeleteCategory', '', '../images/trans.gif');

}
function confirmDeleteImage(id) {
  object = id;
  TB_show('{/literal}{lang_print id=175}?{literal}', '#TB_inline?height=100&width=300&inlineId=confirmdeleteImage', '', '../images/trans.gif');

}

function deleteCategory() {
  window.location = 'admin_gifts.php?task=delete_cat&category_id='+object;
}

function deleteImage(redirect) {
  window.location = 'admin_gifts.php?task=delete_img&image_id='+object;
}

function reorderAlbum(id, prev_id) {
  $('album_'+id).inject('album_'+prev_id, 'before');
}

//-->
</script>
{/literal}

{* HIDDEN DIV TO DISPLAY CONFIRMATION MESSAGE *}
<div style='display: none;' id='confirmdeleteCategory'>
  <div style='margin-top: 10px;'> {lang_print id=80000034} </div>
  <br>
  <input type='button' class='button' value='{lang_print id=175}' onClick='parent.TB_remove();parent.deleteCategory();'>
  <input type='button' class='button' value='{lang_print id=39}' onClick='parent.TB_remove();'>
</div>
{* HIDDEN DIV TO DISPLAY CONFIRMATION MESSAGE *}
<div style='display: none;' id='confirmdeleteImage'>
  <div style='margin-top: 10px;'> {lang_print id=80000035} </div>
  <br>
  <input type='button' class='button' value='{lang_print id=175}' onClick='parent.TB_remove();parent.deleteImage();'>
  <input type='button' class='button' value='{lang_print id=39}' onClick='parent.TB_remove();'>
</div>
{include file='admin_footer.tpl'}