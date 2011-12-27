<?php /* Smarty version 2.6.14, created on 2011-12-26 12:04:17
         compiled from admin_gifts.tpl */
?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'admin_gifts.tpl', 32, false),array('function', 'math', 'admin_gifts.tpl', 96, false),array('modifier', 'count', 'admin_gifts.tpl', 177, false),)), $this);
?><?php
SELanguage::_preload_multi(80000005,80000008,191,192,80000012,173,80000009,80000010,80000011,80000013,359,312,310,714,182,184,185,183,80000014,80000016,107,80000015,497,188,189,39,175,80000034,80000035);
SELanguage::load();
?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin_header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<h2><?php echo SELanguage::_get(80000005); ?></h2>
<?php echo SELanguage::_get(80000008); ?> <br>
<br>
<?php if ($this->_tpl_vars['result'] != 0): ?>
<div class='success'><img src='../images/success.gif' class='icon' border='0'> <?php echo SELanguage::_get(191); ?></div>
<?php endif; ?>
<table cellpadding='0' cellspacing='0' width='100%'>
  <td class='header' colspan="2"><?php echo SELanguage::_get(192); ?></td>
  </tr>
  <td class='setting1'> <?php echo SELanguage::_get(80000012); ?><br>
      <form method="POST">
        <input type="text" style="margin: 2px 0px; width: 250px; <?php echo $this->_tpl_vars['error_ef']; ?>
" name="new_category">
        <select class='small' name='language_id'>
      <?php unset($this->_sections['lang_loop']);
$this->_sections['lang_loop']['name'] = 'lang_loop';
$this->_sections['lang_loop']['loop'] = is_array($_loop=$this->_tpl_vars['lang_packlist']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['lang_loop']['show'] = true;
$this->_sections['lang_loop']['max'] = $this->_sections['lang_loop']['loop'];
$this->_sections['lang_loop']['step'] = 1;
$this->_sections['lang_loop']['start'] = $this->_sections['lang_loop']['step'] > 0 ? 0 : $this->_sections['lang_loop']['loop']-1;
if ($this->_sections['lang_loop']['show']) {
    $this->_sections['lang_loop']['total'] = $this->_sections['lang_loop']['loop'];
    if ($this->_sections['lang_loop']['total'] == 0)
        $this->_sections['lang_loop']['show'] = false;
} else
    $this->_sections['lang_loop']['total'] = 0;
if ($this->_sections['lang_loop']['show']):

            for ($this->_sections['lang_loop']['index'] = $this->_sections['lang_loop']['start'], $this->_sections['lang_loop']['iteration'] = 1;
                 $this->_sections['lang_loop']['iteration'] <= $this->_sections['lang_loop']['total'];
                 $this->_sections['lang_loop']['index'] += $this->_sections['lang_loop']['step'], $this->_sections['lang_loop']['iteration']++):
$this->_sections['lang_loop']['rownum'] = $this->_sections['lang_loop']['iteration'];
$this->_sections['lang_loop']['index_prev'] = $this->_sections['lang_loop']['index'] - $this->_sections['lang_loop']['step'];
$this->_sections['lang_loop']['index_next'] = $this->_sections['lang_loop']['index'] + $this->_sections['lang_loop']['step'];
$this->_sections['lang_loop']['first']      = ($this->_sections['lang_loop']['iteration'] == 1);
$this->_sections['lang_loop']['last']       = ($this->_sections['lang_loop']['iteration'] == $this->_sections['lang_loop']['total']);
?>
          <option value='<?php echo $this->_tpl_vars['lang_packlist'][$this->_sections['lang_loop']['index']]['language_id']; ?>
'<?php if ($this->_tpl_vars['lang_packlist'][$this->_sections['lang_loop']['index']]['language_id'] == $this->_tpl_vars['global_language']): ?> selected='selected'<?php endif; ?>><?php echo $this->_tpl_vars['lang_packlist'][$this->_sections['lang_loop']['index']]['language_name']; ?>
</option>
       <?php endfor; endif; ?>
        </select>
        <br>
        <input type='submit' class='button' value='<?php echo SELanguage::_get(173); ?>'>
        <input type='hidden' name='task' value='new_categ'>
      </form></td>
    <td class='setting1' valign="top" rowspan="2" width="250"><table cellpadding='0' cellspacing='0' class='list' width='350' border="0">
        <tr>
          <td class='header'><?php echo SELanguage::_get(80000009); ?></td>
          <td class='header' align="center" width="40" style='padding: 0px;'><?php echo SELanguage::_get(80000010); ?></td>
          <td class='header' align="center" width="70" style='padding: 0px;'><?php echo SELanguage::_get(80000011); ?></td>
        </tr>
        <!-- LOOP THROUGH USERS -->
        <?php $_from = $this->_tpl_vars['categ_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['outer'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['outer']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['category']):
        $this->_foreach['outer']['iteration']++;
?>
        <?php $_from = $this->_tpl_vars['category']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['type_id'] => $this->_tpl_vars['type_val']):
?>
        <tr class='<?php echo smarty_function_cycle(array('values' => "background1,background2"), $this);?>
'>
          <td class='item'><a href="admin_gifts.php?type=<?php echo $this->_tpl_vars['id']; ?>
"><span id='span_$id'><?php echo SELanguage::_get($this->_tpl_vars['type_id']); ?></span></a></td>
          <td style='padding: 0px; border-top: 1px solid #DDDDDD' align="center"><b><?php echo $this->_tpl_vars['type_val']; ?>
</b></td>
          <td style='padding: 0px; border-top: 1px solid #DDDDDD' align="center"><a href="javascript:void(0);" onClick="editPhrase('<?php echo $this->_tpl_vars['type_id']; ?>
', <?php echo $this->_tpl_vars['type_id']; ?>
);" onFocus="toggleRow('tr_<?php echo $this->_tpl_vars['con']['lang']; ?>
');" onBlur="toggleRow('tr_<?php echo $this->_tpl_vars['type_id']; ?>
');" tabindex='<?php echo $this->_tpl_vars['type_id']; ?>
' id='link_<?php echo $this->_tpl_vars['type_id']; ?>
'><img src="../images/icons/admin_language16.gif" class="icon2" border="0"></a><a href='javascript:void(0);' onClick="confirmDeleteCategory('<?php echo $this->_tpl_vars['id']; ?>
');"><img src="../images/error.gif" class="icon2" border="0"></a></td>
        </tr>
        <?php endforeach; endif; unset($_from); ?>
        <?php endforeach; endif; unset($_from); ?>
      </table></td>
  </tr>
  <tr>
    <td class='setting2'> <?php if (isset ( $this->_tpl_vars['categ_list'] )): ?>
      <form method="POST" enctype="multipart/form-data">
        <table cellpadding='2' cellspacing='0'>
        <tr>
          <td width="90"><?php echo SELanguage::_get(80000013); ?>:</td>
          <td><select class='small' name='category'>
<?php $_from = $this->_tpl_vars['categ_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['outer'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['outer']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['category']):
        $this->_foreach['outer']['iteration']++;

 $_from = $this->_tpl_vars['category']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['type_id'] => $this->_tpl_vars['type_val']):
?>
              <option value="<?php echo $this->_tpl_vars['id']; ?>
"><?php echo SELanguage::_get($this->_tpl_vars['type_id']); ?> (<?php echo $this->_tpl_vars['type_val']; ?>
)</option>
<?php endforeach; endif; unset($_from); 
 endforeach; endif; unset($_from); ?>      
            </select>
          </td>
        </tr>
        <tr>
          <td><?php echo SELanguage::_get(80000009); ?>:</td>
          <td><input type='text' name='title' style="width:80%; <?php echo $this->_tpl_vars['error_ef2']; ?>
">
            <select class='small' name='language_id'>
      <?php unset($this->_sections['lang_loop']);
$this->_sections['lang_loop']['name'] = 'lang_loop';
$this->_sections['lang_loop']['loop'] = is_array($_loop=$this->_tpl_vars['lang_packlist']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['lang_loop']['show'] = true;
$this->_sections['lang_loop']['max'] = $this->_sections['lang_loop']['loop'];
$this->_sections['lang_loop']['step'] = 1;
$this->_sections['lang_loop']['start'] = $this->_sections['lang_loop']['step'] > 0 ? 0 : $this->_sections['lang_loop']['loop']-1;
if ($this->_sections['lang_loop']['show']) {
    $this->_sections['lang_loop']['total'] = $this->_sections['lang_loop']['loop'];
    if ($this->_sections['lang_loop']['total'] == 0)
        $this->_sections['lang_loop']['show'] = false;
} else
    $this->_sections['lang_loop']['total'] = 0;
if ($this->_sections['lang_loop']['show']):

            for ($this->_sections['lang_loop']['index'] = $this->_sections['lang_loop']['start'], $this->_sections['lang_loop']['iteration'] = 1;
                 $this->_sections['lang_loop']['iteration'] <= $this->_sections['lang_loop']['total'];
                 $this->_sections['lang_loop']['index'] += $this->_sections['lang_loop']['step'], $this->_sections['lang_loop']['iteration']++):
$this->_sections['lang_loop']['rownum'] = $this->_sections['lang_loop']['iteration'];
$this->_sections['lang_loop']['index_prev'] = $this->_sections['lang_loop']['index'] - $this->_sections['lang_loop']['step'];
$this->_sections['lang_loop']['index_next'] = $this->_sections['lang_loop']['index'] + $this->_sections['lang_loop']['step'];
$this->_sections['lang_loop']['first']      = ($this->_sections['lang_loop']['iteration'] == 1);
$this->_sections['lang_loop']['last']       = ($this->_sections['lang_loop']['iteration'] == $this->_sections['lang_loop']['total']);
?>
              <option value='<?php echo $this->_tpl_vars['lang_packlist'][$this->_sections['lang_loop']['index']]['language_id']; ?>
'<?php if ($this->_tpl_vars['lang_packlist'][$this->_sections['lang_loop']['index']]['language_id'] == $this->_tpl_vars['global_language']): ?> selected='selected'<?php endif; ?>><?php echo $this->_tpl_vars['lang_packlist'][$this->_sections['lang_loop']['index']]['language_name']; ?>
</option>
       <?php endfor; endif; ?>
            </select>
          </td>
        </tr>
        <tr>
          <td><?php echo SELanguage::_get(359); ?></td>
          <td><input type='file' name='new_file' size='60' class='text'">
          </td>
        </tr>
        <tr>
          <td></td>
          <td><table cellpadding="0" cellspacing="0" width="100%">
              <tr>
                <td><?php echo SELanguage::_get(312); ?>
                  <input type="text" name="height" size="2" value="200" style="background:none;border-right:hidden;border-top:hidden;border-left:hidden; border-bottom-color:#000000;text-align:center;" maxlength="4">
                  px</td>
                <td><?php echo SELanguage::_get(310); ?>
                  <input type="text" name="width" size="2" value="200" style="background:none;border-right:hidden;border-top:hidden;border-left:hidden; border-bottom-color:#000000;text-align:center;" maxlength="4">
                  px</td>
                <td align="right"><input type='submit' class='button' value='<?php echo SELanguage::_get(714); ?>'></td>
              </tr>
            </table>
            <input type='hidden' name='task' value='add_file'>
      </form></td>
  </tr>
</table>
<?php endif; ?>
</td>
<td></td>
</tr>
</table>
<br>
  <?php if ($this->_tpl_vars['maxpage'] > 1): ?>
  <div align='center'> <?php if ($this->_tpl_vars['p'] != 1): ?><a href='admin_gifts.php?type=<?php echo $this->_tpl_vars['type_a']; ?>
&p=<?php echo smarty_function_math(array('equation' => 'p-1','p' => $this->_tpl_vars['p']), $this);?>
'>&#171; <?php echo SELanguage::_get(182); ?></a><?php else: ?><font class='disabled'>&#171; <?php echo SELanguage::_get(182); ?></font><?php endif; ?>
  <?php if ($this->_tpl_vars['p_start'] == $this->_tpl_vars['p_end']): ?>
  &nbsp;|&nbsp; <?php echo sprintf(SELanguage::_get(184), $this->_tpl_vars['p_start'], $this->_tpl_vars['total_vars']); ?> &nbsp;|&nbsp; 
  <?php else: ?>
  &nbsp;|&nbsp; <?php echo sprintf(SELanguage::_get(185), $this->_tpl_vars['p_start'], $this->_tpl_vars['p_end'], $this->_tpl_vars['total_vars']); ?> &nbsp;|&nbsp; 
  <?php endif; ?>
  <?php if ($this->_tpl_vars['p'] != $this->_tpl_vars['maxpage']): ?><a href='admin_gifts.php?type=<?php echo $this->_tpl_vars['type_a']; ?>
&p=<?php echo smarty_function_math(array('equation' => 'p+1','p' => $this->_tpl_vars['p']), $this);?>
'><?php echo SELanguage::_get(183); ?> &#187;</a><?php else: ?><font class='disabled'><?php echo SELanguage::_get(183); ?> &#187;</font><?php endif; ?> </div>
  </div>
<?php endif; ?>
<h2><?php echo SELanguage::_get(80000014); ?> <?php if (! isset ( $this->_tpl_vars['type_a'] )): 
 echo SELanguage::_get(80000016); 
 else: 
 echo SELanguage::_get($this->_tpl_vars['type_a']+80000100); 
 endif; ?></h2>
<table align="center" border="0">
  <?php $_from = $this->_tpl_vars['gift_vars']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cid'] => $this->_tpl_vars['con']):
?>
  <?php echo smarty_function_cycle(array('name' => 'startrow3','values' => "
  <tr valign=top>,,"), $this);?>

    <td><table cellpadding="5" cellspacing="5" border="0" style="	border: 1px solid #CCCCCC; padding: 0px; margin-right: 10px;" width="250">
        <tr>
          <td width="70"><img src='../mf_gifts/<?php echo $this->_tpl_vars['con']['id']; ?>
_thumb.<?php echo $this->_tpl_vars['con']['filetype']; ?>
' class='photo' border='0'> </td>
          <td valign="top"><b><?php echo SELanguage::_get(80000009); ?>:</b> <span id='span_<?php echo $this->_tpl_vars['con']['lang']; ?>
'><?php echo SELanguage::_get($this->_tpl_vars['con']['lang']); ?></span><br>
            <b><?php echo SELanguage::_get(107); ?></b> <?php echo SELanguage::_get($this->_tpl_vars['con']['type']+80000100); ?><br>
            <b><?php echo SELanguage::_get(80000015); ?>:</b> <?php echo $this->_tpl_vars['datetime']->cdate(($this->_tpl_vars['setting']['setting_dateformat']),$this->_tpl_vars['datetime']->timezone(($this->_tpl_vars['con']['date']),$this->_tpl_vars['global_timezone'])); ?>
<br>
            <b><?php echo SELanguage::_get(497); ?>:</b> <?php echo $this->_tpl_vars['con']['hits']; ?>

            <div align="right"><a href="javascript:void(0);" onClick="editPhrase('<?php echo $this->_tpl_vars['con']['lang']; ?>
', <?php echo $this->_tpl_vars['cid']; ?>
);" onFocus="toggleRow('tr_<?php echo $this->_tpl_vars['con']['lang']; ?>
');" onBlur="toggleRow('tr_<?php echo $this->_tpl_vars['con']['lang']; ?>
');" tabindex='<?php echo $this->_tpl_vars['cid']; ?>
' id='link_<?php echo $this->_tpl_vars['cid']; ?>
'><img src="../images/icons/admin_language16.gif" class="icon2" border="0"></a><a href='javascript:void(0);' onClick="confirmDeleteImage('<?php echo $this->_tpl_vars['con']['id']; ?>
');"><img src="../images/error.gif" class="icon2" border="0"></a></div></td>
        </tr>
      </table></td>
    <?php echo smarty_function_cycle(array('name' => 'endrow3','values' => ",,</tr>
  "), $this);?>

  <?php endforeach; endif; unset($_from); ?>
</table>
  <?php if ($this->_tpl_vars['maxpage'] > 1): ?>
  <div align='center'> <?php if ($this->_tpl_vars['p'] != 1): ?><a href='admin_gifts.php?type=<?php echo $this->_tpl_vars['type_a']; ?>
&p=<?php echo smarty_function_math(array('equation' => 'p-1','p' => $this->_tpl_vars['p']), $this);?>
'>&#171; <?php echo SELanguage::_get(182); ?></a><?php else: ?><font class='disabled'>&#171; <?php echo SELanguage::_get(182); ?></font><?php endif; ?>
  <?php if ($this->_tpl_vars['p_start'] == $this->_tpl_vars['p_end']): ?>
  &nbsp;|&nbsp; <?php echo sprintf(SELanguage::_get(184), $this->_tpl_vars['p_start'], $this->_tpl_vars['total_vars']); ?> &nbsp;|&nbsp; 
  <?php else: ?>
  &nbsp;|&nbsp; <?php echo sprintf(SELanguage::_get(185), $this->_tpl_vars['p_start'], $this->_tpl_vars['p_end'], $this->_tpl_vars['total_vars']); ?> &nbsp;|&nbsp; 
  <?php endif; ?>
  <?php if ($this->_tpl_vars['p'] != $this->_tpl_vars['maxpage']): ?><a href='admin_gifts.php?type=<?php echo $this->_tpl_vars['type_a']; ?>
&p=<?php echo smarty_function_math(array('equation' => 'p+1','p' => $this->_tpl_vars['p']), $this);?>
'><?php echo SELanguage::_get(183); ?> &#187;</a><?php else: ?><font class='disabled'><?php echo SELanguage::_get(183); ?> &#187;</font><?php endif; ?> </div>
  </div>
<?php endif; ?>
    <?php echo '
<script type="text/javascript">
  <!-- 
  var current_tabindex = 1;
  function editPhrase(id, tabindex) {
    current_tabindex = tabindex+1;
    $(\'languagevar_id\').value = id;
    var request = new Request.JSON({secure: false, url: \'admin_language_edit.php?task=getphrase&languagevar_id=\'+id,
		onComplete: function(jsonObj) { 
			edit(jsonObj.phrases);
		}
    }).send();
  }
  function edit(phrases) {
    phrases.each(function(phrase) {
      for(var x in phrase) {
        $(\'var_\'+x).innerHTML = phrase[x];
      }
    });

    TB_show(\''; 
 echo SELanguage::_get(188); 
 echo '\', \'#TB_inline?height=400&width=600&inlineId=editphrase\', \'\', \'../images/trans.gif\');
    setTimeout("$(\'TB_window\').getElementById(\'var_'; 
 echo $this->_tpl_vars['language']['language_id']; 
 echo '\').focus();$(\'TB_window\').getElementById(\'var_'; 
 echo $this->_tpl_vars['language']['language_id']; 
 echo '\').select();", "300");
  }
  function edit_result(id, phrase_value) {
    $(\'span_\'+id).innerHTML = phrase_value.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;");
    changefocus();
  }
  function changefocus() {
    if($(\'link_\'+current_tabindex)) $(\'link_\'+current_tabindex).focus();
  }
  //-->
  </script>
'; ?>


  <div style='display: none;' id='editphrase'>
  <form action='admin_language_edit.php' method='post' name='editform' target='ajaxframe' onSubmit='parent.TB_remove();'>
    <?php echo SELanguage::_get(189); ?><br>
    <br>
    <?php unset($this->_sections['lang_loop']);
$this->_sections['lang_loop']['name'] = 'lang_loop';
$this->_sections['lang_loop']['loop'] = is_array($_loop=$this->_tpl_vars['lang_packlist']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['lang_loop']['show'] = true;
$this->_sections['lang_loop']['max'] = $this->_sections['lang_loop']['loop'];
$this->_sections['lang_loop']['step'] = 1;
$this->_sections['lang_loop']['start'] = $this->_sections['lang_loop']['step'] > 0 ? 0 : $this->_sections['lang_loop']['loop']-1;
if ($this->_sections['lang_loop']['show']) {
    $this->_sections['lang_loop']['total'] = $this->_sections['lang_loop']['loop'];
    if ($this->_sections['lang_loop']['total'] == 0)
        $this->_sections['lang_loop']['show'] = false;
} else
    $this->_sections['lang_loop']['total'] = 0;
if ($this->_sections['lang_loop']['show']):

            for ($this->_sections['lang_loop']['index'] = $this->_sections['lang_loop']['start'], $this->_sections['lang_loop']['iteration'] = 1;
                 $this->_sections['lang_loop']['iteration'] <= $this->_sections['lang_loop']['total'];
                 $this->_sections['lang_loop']['index'] += $this->_sections['lang_loop']['step'], $this->_sections['lang_loop']['iteration']++):
$this->_sections['lang_loop']['rownum'] = $this->_sections['lang_loop']['iteration'];
$this->_sections['lang_loop']['index_prev'] = $this->_sections['lang_loop']['index'] - $this->_sections['lang_loop']['step'];
$this->_sections['lang_loop']['index_next'] = $this->_sections['lang_loop']['index'] + $this->_sections['lang_loop']['step'];
$this->_sections['lang_loop']['first']      = ($this->_sections['lang_loop']['iteration'] == 1);
$this->_sections['lang_loop']['last']       = ($this->_sections['lang_loop']['iteration'] == $this->_sections['lang_loop']['total']);
?>
    <?php echo $this->_tpl_vars['lang_packlist'][$this->_sections['lang_loop']['index']]['language_name']; ?>
<br>
    <textarea name='languagevar_value[<?php echo $this->_tpl_vars['lang_packlist'][$this->_sections['lang_loop']['index']]['language_id']; ?>
]' id='var_<?php echo $this->_tpl_vars['lang_packlist'][$this->_sections['lang_loop']['index']]['language_id']; ?>
' cols='25' rows='7' onFocus='this.select();' tabindex='<?php echo smarty_function_math(array('equation' => 'x+y+1','x' => count($this->_tpl_vars['langvars']),'y' => $this->_sections['lang_loop']['index']), $this);?>
' class='text' style='width: 100%; font-size: 9pt;'></textarea>
    <br>
    <br>
    <?php endfor; endif; ?>
    <input type='submit' class='button' value='<?php echo SELanguage::_get(188); ?>' tabindex='<?php echo smarty_function_math(array('equation' => 'x+y+1','x' => count($this->_tpl_vars['langvars']),'y' => count($this->_tpl_vars['lang_packlist'])), $this);?>
'>
    <input type='button' class='button' value='<?php echo SELanguage::_get(39); ?>' onClick='parent.TB_remove();parent.changefocus();' tabindex='<?php echo smarty_function_math(array('equation' => 'x+y+1','x' => count($this->_tpl_vars['langvars']),'y' => count($this->_tpl_vars['lang_packlist'])), $this);?>
'>
    <input type='hidden' name='task' value='edit'>
    <input type='hidden' name='languagevar_id' id='languagevar_id' value=''>
    <input type='hidden' name='language_id' value='1'>
    <input type='hidden' name='p' value='1}'>
    <input type='hidden' name='phrase' value='report'>
  </form>
</div>
<?php echo '
<script type="text/javascript">
<!-- 
var object = 0;
function confirmDeleteCategory(id) {
  object = id;
  TB_show(\''; 
 echo SELanguage::_get(175); ?>?<?php echo '\', \'#TB_inline?height=100&width=300&inlineId=confirmdeleteCategory\', \'\', \'../images/trans.gif\');

}
function confirmDeleteImage(id) {
  object = id;
  TB_show(\''; 
 echo SELanguage::_get(175); ?>?<?php echo '\', \'#TB_inline?height=100&width=300&inlineId=confirmdeleteImage\', \'\', \'../images/trans.gif\');

}

function deleteCategory() {
  window.location = \'admin_gifts.php?task=delete_cat&category_id=\'+object;
}

function deleteImage(redirect) {
  window.location = \'admin_gifts.php?task=delete_img&image_id=\'+object;
}

function reorderAlbum(id, prev_id) {
  $(\'album_\'+id).inject(\'album_\'+prev_id, \'before\');
}

//-->
</script>
'; ?>


<div style='display: none;' id='confirmdeleteCategory'>
  <div style='margin-top: 10px;'> <?php echo SELanguage::_get(80000034); ?> </div>
  <br>
  <input type='button' class='button' value='<?php echo SELanguage::_get(175); ?>' onClick='parent.TB_remove();parent.deleteCategory();'>
  <input type='button' class='button' value='<?php echo SELanguage::_get(39); ?>' onClick='parent.TB_remove();'>
</div>
<div style='display: none;' id='confirmdeleteImage'>
  <div style='margin-top: 10px;'> <?php echo SELanguage::_get(80000035); ?> </div>
  <br>
  <input type='button' class='button' value='<?php echo SELanguage::_get(175); ?>' onClick='parent.TB_remove();parent.deleteImage();'>
  <input type='button' class='button' value='<?php echo SELanguage::_get(39); ?>' onClick='parent.TB_remove();'>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin_footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>