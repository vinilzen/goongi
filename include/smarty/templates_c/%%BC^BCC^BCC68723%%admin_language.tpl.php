<?php /* Smarty version 2.6.14, created on 2011-10-04 16:50:38
         compiled from admin_language.tpl */
?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'admin_language.tpl', 20, false),array('modifier', 'replace', 'admin_language.tpl', 21, false),)), $this);
?><?php
SELanguage::_preload_multi(49,147,149,150,1147,151,152,153,154,1283,155,156,1284,157,158,159,160,161,162,163,164,165,166,167,168,169,170,171,172,173,174,175,39,176,177);
SELanguage::load();
?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin_header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<h2><?php echo SELanguage::_get(49); ?></h2>
<div><?php echo SELanguage::_get(147); ?></div>
<br />


<table cellpadding='0' cellspacing='0' class='list' style='width: 700px;'>
  <tr>
    <td class='header'><?php echo SELanguage::_get(149); ?></td>
    <td class='header'><?php echo SELanguage::_get(150); ?></td>
    <td class='header'><?php echo SELanguage::_get(1147); ?></td>
    <td class='header'><?php echo SELanguage::_get(151); ?></td>
    <td class='header' align='center'><?php echo SELanguage::_get(152); ?></td>
    <td class='header' width='175'><?php echo SELanguage::_get(153); ?></td>
  </tr>
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
  <tr class='<?php echo smarty_function_cycle(array('values' => "background2,background1"), $this);?>
'>
    <td class='item'><a href="javascript:editPack('<?php echo $this->_tpl_vars['lang_packlist'][$this->_sections['lang_loop']['index']]['language_id']; ?>
', '<?php echo ((is_array($_tmp=$this->_tpl_vars['lang_packlist'][$this->_sections['lang_loop']['index']]['language_name'])) ? $this->_run_mod_handler('replace', true, $_tmp, "&#039;", "\&#039;") : smarty_modifier_replace($_tmp, "&#039;", "\&#039;")); ?>
', '<?php echo $this->_tpl_vars['lang_packlist'][$this->_sections['lang_loop']['index']]['language_code']; ?>
', '<?php echo $this->_tpl_vars['lang_packlist'][$this->_sections['lang_loop']['index']]['language_setlocale']; ?>
', '<?php echo $this->_tpl_vars['lang_packlist'][$this->_sections['lang_loop']['index']]['language_autodetect_regex']; ?>
')"><?php echo $this->_tpl_vars['lang_packlist'][$this->_sections['lang_loop']['index']]['language_name']; ?>
</a></td>
    <td class='item'><?php echo $this->_tpl_vars['lang_packlist'][$this->_sections['lang_loop']['index']]['language_code']; ?>
</td>
    <td class='item'><?php echo $this->_tpl_vars['lang_packlist'][$this->_sections['lang_loop']['index']]['language_setlocale']; ?>
</td>
    <td class='item'><?php echo $this->_tpl_vars['lang_packlist'][$this->_sections['lang_loop']['index']]['language_autodetect_regex']; ?>
</td>
    <td class='item' align='center'><?php if ($this->_tpl_vars['lang_packlist'][$this->_sections['lang_loop']['index']]['language_default'] == 1): ?><img src='../images/icons/admin_checkbox2.gif' border='0' class='icon'><?php else: ?><a href='admin_language.php?task=setdefault&language_id=<?php echo $this->_tpl_vars['lang_packlist'][$this->_sections['lang_loop']['index']]['language_id']; ?>
'><img src='../images/icons/admin_checkbox1.gif' border='0' class='icon'></a><?php endif; ?></td>
    <td class='item'>
      [ <a href='admin_language_edit.php?language_id=<?php echo $this->_tpl_vars['lang_packlist'][$this->_sections['lang_loop']['index']]['language_id']; ?>
'><?php echo SELanguage::_get(154); ?></a> ]
      [ <a href='admin_language_export.php?language_id=<?php echo $this->_tpl_vars['lang_packlist'][$this->_sections['lang_loop']['index']]['language_id']; ?>
&task=doexport'><?php echo SELanguage::_get(1283); ?></a> ]
      <?php if ($this->_tpl_vars['lang_packlist'][$this->_sections['lang_loop']['index']]['language_default'] != 1): ?>
      [ <a href="javascript:confirmDelete('<?php echo $this->_tpl_vars['lang_packlist'][$this->_sections['lang_loop']['index']]['language_id']; ?>
');"><?php echo SELanguage::_get(155); ?></a> ]
      <?php endif; ?>
    </td>
  </tr>
  <?php endfor; endif; ?>
</table>
<br />


<a href="admin_language.php" onclick="createPack(); return false;"><?php echo SELanguage::_get(156); ?></a>  |  
<a href="admin_language_import.php"><?php echo SELanguage::_get(1284); ?></a>


<?php echo '
<script type="text/javascript">
<!-- 
var lang_id = 0;
function confirmDelete(id) {
  lang_id = id;
  TB_show(\''; 
 echo SELanguage::_get(157); 
 echo '\', \'#TB_inline?height=100&width=300&inlineId=confirmdelete\', \'\', \'../images/trans.gif\');

}

function deletePack() {
  window.location = \'admin_language.php?task=delete&language_id=\'+lang_id;
}

function createPack() {
  $(\'createbutton\').value = \''; 
 echo SELanguage::_get(158); 
 echo '\';
  $(\'language_id\').value = \'0\';  
  $(\'language_name\').defaultValue = \'\';  
  $(\'language_name\').value = \'\';  
  $(\'language_code\').defaultValue = \'\';  
  $(\'language_code\').value = \'\';  
  $(\'language_setlocale\').value = \'\';  
  
  if( $(\'language_setlocale_select\') )
  {
    $(\'language_setlocale_select\').options[$(\'language_setlocale_select\').selectedIndex].defaultSelected = false;
    $(\'language_setlocale_select\').options[0].selected = true;
  }
  
  $(\'language_autodetect_regex\').defaultValue = \'\';  
  $(\'language_autodetect_regex\').value = \'\';  
  TB_show(\''; 
 echo SELanguage::_get(158); 
 echo '\', \'#TB_inline?height=350&width=300&inlineId=createpack\', \'\', \'../images/trans.gif\');
}

function editPack(id, lang_name, lang_code, lang_setlocale, lang_autodetect_regex)
{
  $(\'createbutton\').value = \''; 
 echo SELanguage::_get(159); 
 echo '\';
  $(\'language_id\').value = id;  
  $(\'language_name\').defaultValue = lang_name;  
  $(\'language_name\').value = lang_name;  
  $(\'language_code\').defaultValue = lang_code;  
  $(\'language_code\').value = lang_code;  
  $(\'language_setlocale\').value = lang_setlocale;
  $(\'language_setlocale\').defaultValue = lang_setlocale;
  
  if( $(\'language_setlocale_select\') )
  {
    $(\'language_setlocale_select\').options[$(\'language_setlocale_select\').selectedIndex].defaultSelected = false;
    $(\'language_setlocale_select\').options[0].selected = true;
    $(\'language_setlocale_select\').value = lang_setlocale;
    $(\'language_setlocale_select\').options[$(\'language_setlocale_select\').selectedIndex].defaultSelected = true;
  }
  
  $(\'language_autodetect_regex\').defaultValue = lang_autodetect_regex;
  $(\'language_autodetect_regex\').value = lang_autodetect_regex;
  TB_show(\''; 
 echo SELanguage::_get(159); 
 echo '\', \'#TB_inline?height=350&width=300&inlineId=createpack\', \'\', \'../images/trans.gif\');
}

//-->
</script>
'; ?>


<br><br>

<form action='admin_language.php' method='post'>

<table cellpadding='0' cellspacing='0' width='600'>
<tr><td class='header'><?php echo SELanguage::_get(160); ?></td></tr>
<tr><td class='setting1'><?php echo SELanguage::_get(161); ?></td></tr>
<tr>
<td class='setting2'>
  <table cellpadding='0' cellspacing='0'>
  <tr>
  <td><input type='radio' name='setting_lang_allow' id='lang_allow_1' value='1'<?php if ($this->_tpl_vars['setting']['setting_lang_allow'] == 1): ?> checked='checked'<?php endif; ?>></td>
  <td><label for='lang_allow_1'><?php echo SELanguage::_get(162); ?></label></td>
  </tr>
  <tr>
  <td><input type='radio' name='setting_lang_allow' id='lang_allow_0' value='0'<?php if ($this->_tpl_vars['setting']['setting_lang_allow'] == 0): ?> checked='checked'<?php endif; ?>></td>
  <td><label for='lang_allow_0'><?php echo SELanguage::_get(163); ?></label></td>
  </tr>
  </table>
</td>
</tr>
<tr><td class='setting1'><?php echo SELanguage::_get(164); ?></td></tr>
<tr>
<td class='setting2'>
  <table cellpadding='0' cellspacing='0'>
  <tr>
  <td><input type='radio' name='setting_lang_anonymous' id='lang_anonymous_1' value='1'<?php if ($this->_tpl_vars['setting']['setting_lang_anonymous'] == 1): ?> checked='checked'<?php endif; ?>></td>
  <td><label for='lang_anonymous_1'><?php echo SELanguage::_get(165); ?></label></td>
  </tr>
  <tr>
  <td><input type='radio' name='setting_lang_anonymous' id='lang_anonymous_0' value='0'<?php if ($this->_tpl_vars['setting']['setting_lang_anonymous'] == 0): ?> checked='checked'<?php endif; ?>></td>
  <td><label for='lang_anonymous_0'><?php echo SELanguage::_get(166); ?></label></td>
  </tr>
  </table>
</td>
</tr>
<tr><td class='setting1'>
  <?php echo SELanguage::_get(167); ?>
  <br><br>
  <table cellpadding='0' cellspacing='0'>
    <tr>
    <td><?php echo SELanguage::_get(168); ?></td>
    <td>&nbsp;&nbsp;<?php echo $this->_tpl_vars['HTTP_ACCEPT_LANGUAGE']; ?>
</td>
    </tr>
    <tr>
    <td><?php echo SELanguage::_get(169); ?></td>
    <td>&nbsp;&nbsp;<?php echo $this->_tpl_vars['HTTP_ACCEPT_LANGUAGE_CLEAN']; ?>
</td>
    </tr>
    <tr>
    <td><?php echo SELanguage::_get(170); ?></td>
    <td>&nbsp;&nbsp;<?php echo $this->_tpl_vars['AUTODETECTED_LANGUAGE']; ?>
</td>
    </tr>
  </table>
</td></tr>
<tr>
<td class='setting2'>
  <table cellpadding='0' cellspacing='0'>
  <tr>
  <td><input type='radio' name='setting_lang_autodetect' id='lang_autodetect_1' value='1'<?php if ($this->_tpl_vars['setting']['setting_lang_autodetect'] == 1): ?> checked='checked'<?php endif; ?>></td>
  <td><label for='lang_autodetect_1'><?php echo SELanguage::_get(171); ?></label></td>
  </tr>
  <tr>
  <td><input type='radio' name='setting_lang_autodetect' id='lang_autodetect_0' value='0'<?php if ($this->_tpl_vars['setting']['setting_lang_autodetect'] == 0): ?> checked='checked'<?php endif; ?>></td>
  <td><label for='lang_autodetect_0'><?php echo SELanguage::_get(172); ?></label></td>
  </tr>
  </table>
</td>
</tr>
</table>

<br>
<input type='hidden' name='task' value='dosave'>
<input type='submit' class='button' value='<?php echo SELanguage::_get(173); ?>'>
</form>

<br>

<div style='display: none;' id='confirmdelete'>
  <div style='margin-top: 10px;'>
    <?php echo SELanguage::_get(174); ?>
  </div>
  <br>
  <input type='button' class='button' value='<?php echo SELanguage::_get(175); ?>' onClick='parent.TB_remove();parent.deletePack();'> <input type='button' class='button' value='<?php echo SELanguage::_get(39); ?>' onClick='parent.TB_remove();'>
</div>


<div style='display: none;' id='createpack'>
  <form action='admin_language.php' name='createForm' method='post' target='_parent' onSubmit="<?php echo 'if(this.language_name.value == \'\'){ alert(\''; 
 echo SELanguage::_get(176); 
 echo '\'); return false;}else{return true;}'; ?>
">
  <div style='margin-top: 10px;'><?php echo SELanguage::_get(177); ?></div>
  <br />
  
  <table cellpadding='0' cellspacing='2'>
    <tr>
      <td align='right'><?php echo SELanguage::_get(149); ?>:&nbsp;</td>
      <td><input type='text' class='text' name='language_name' id='language_name' maxlength='20' /></td>
    </tr>
    <tr>
      <td align='right'><?php echo SELanguage::_get(150); ?>:&nbsp;</td>
      <td><input type='text' class='text' name='language_code' id='language_code' maxlength='9' /></td>
    </tr>
    <tr>
      <td align='right'><?php echo SELanguage::_get(1147); ?>:&nbsp;</td>
      <td>
        <input type='text' class='text' id='language_setlocale' name='language_setlocale' value="" />
        <?php if (! empty ( $this->_tpl_vars['locales'] ) && is_array ( $this->_tpl_vars['locales'] )): ?>
        <br />
        <select class="text" id='language_setlocale_select' onchange="if( this.value!='' ) $(this).getParent().getElement('input').value=this.value;">
          <option value=''></option>
          <?php unset($this->_sections['locale_loop']);
$this->_sections['locale_loop']['name'] = 'locale_loop';
$this->_sections['locale_loop']['loop'] = is_array($_loop=$this->_tpl_vars['locales']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['locale_loop']['show'] = true;
$this->_sections['locale_loop']['max'] = $this->_sections['locale_loop']['loop'];
$this->_sections['locale_loop']['step'] = 1;
$this->_sections['locale_loop']['start'] = $this->_sections['locale_loop']['step'] > 0 ? 0 : $this->_sections['locale_loop']['loop']-1;
if ($this->_sections['locale_loop']['show']) {
    $this->_sections['locale_loop']['total'] = $this->_sections['locale_loop']['loop'];
    if ($this->_sections['locale_loop']['total'] == 0)
        $this->_sections['locale_loop']['show'] = false;
} else
    $this->_sections['locale_loop']['total'] = 0;
if ($this->_sections['locale_loop']['show']):

            for ($this->_sections['locale_loop']['index'] = $this->_sections['locale_loop']['start'], $this->_sections['locale_loop']['iteration'] = 1;
                 $this->_sections['locale_loop']['iteration'] <= $this->_sections['locale_loop']['total'];
                 $this->_sections['locale_loop']['index'] += $this->_sections['locale_loop']['step'], $this->_sections['locale_loop']['iteration']++):
$this->_sections['locale_loop']['rownum'] = $this->_sections['locale_loop']['iteration'];
$this->_sections['locale_loop']['index_prev'] = $this->_sections['locale_loop']['index'] - $this->_sections['locale_loop']['step'];
$this->_sections['locale_loop']['index_next'] = $this->_sections['locale_loop']['index'] + $this->_sections['locale_loop']['step'];
$this->_sections['locale_loop']['first']      = ($this->_sections['locale_loop']['iteration'] == 1);
$this->_sections['locale_loop']['last']       = ($this->_sections['locale_loop']['iteration'] == $this->_sections['locale_loop']['total']);
?>
          <option value='<?php echo $this->_tpl_vars['locales'][$this->_sections['locale_loop']['index']]; ?>
'><?php echo $this->_tpl_vars['locales'][$this->_sections['locale_loop']['index']]; ?>
</option>
          <?php endfor; endif; ?>
        </select>
        <?php endif; ?>
      </td>
    </tr>
    <tr>
      <td align='right'><?php echo SELanguage::_get(151); ?>:&nbsp;</td>
      <td><input type='text' class='text' name='language_autodetect_regex' id='language_autodetect_regex' maxlength='64' /></td>
    </tr>
  </table>
  <br />
  
  <input type='submit' class='button' id='createbutton' value='<?php echo SELanguage::_get(158); ?>'> <input type='button' class='button' value='<?php echo SELanguage::_get(39); ?>' onClick='parent.TB_remove();' />
  <input type='hidden' name='task' value='create' />
  <input type='hidden' name='language_id' id='language_id' value='0' />
  </form>
</div>




<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin_footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>