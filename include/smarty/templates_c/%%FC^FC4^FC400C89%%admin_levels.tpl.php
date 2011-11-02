<?php /* Smarty version 2.6.14, created on 2011-11-01 16:55:31
         compiled from admin_levels.tpl */
?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'admin_levels.tpl', 23, false),)), $this);
?><?php
SELanguage::_preload_multi(8,271,272,87,258,273,152,153,274,187,155,280,279,175,39,276,275,277,278);
SELanguage::load();
?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin_header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<h2><?php echo SELanguage::_get(8); ?></h2>
<?php echo SELanguage::_get(271); ?>

<br><br>

<input type='button' class='button' value='<?php echo SELanguage::_get(272); ?>' onClick='createLevel();'>

<br><br>

<table cellpadding='0' cellspacing='0' class='list'>
<tr>
<td class='header' width='10'><a class='header' href='admin_levels.php?s=<?php echo $this->_tpl_vars['i']; ?>
'><?php echo SELanguage::_get(87); ?></a></td>
<td class='header'><a class='header' href='admin_levels.php?s=<?php echo $this->_tpl_vars['n']; ?>
'><?php echo SELanguage::_get(258); ?></a></td>
<td class='header' align='center'><a class='header' href='admin_levels.php?s=<?php echo $this->_tpl_vars['u']; ?>
'><?php echo SELanguage::_get(273); ?></td>
<td class='header' align='center'><?php echo SELanguage::_get(152); ?></td>
<td class='header' width='100'><?php echo SELanguage::_get(153); ?></td>
</tr>
<?php unset($this->_sections['level_loop']);
$this->_sections['level_loop']['name'] = 'level_loop';
$this->_sections['level_loop']['loop'] = is_array($_loop=$this->_tpl_vars['levels']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['level_loop']['show'] = true;
$this->_sections['level_loop']['max'] = $this->_sections['level_loop']['loop'];
$this->_sections['level_loop']['step'] = 1;
$this->_sections['level_loop']['start'] = $this->_sections['level_loop']['step'] > 0 ? 0 : $this->_sections['level_loop']['loop']-1;
if ($this->_sections['level_loop']['show']) {
    $this->_sections['level_loop']['total'] = $this->_sections['level_loop']['loop'];
    if ($this->_sections['level_loop']['total'] == 0)
        $this->_sections['level_loop']['show'] = false;
} else
    $this->_sections['level_loop']['total'] = 0;
if ($this->_sections['level_loop']['show']):

            for ($this->_sections['level_loop']['index'] = $this->_sections['level_loop']['start'], $this->_sections['level_loop']['iteration'] = 1;
                 $this->_sections['level_loop']['iteration'] <= $this->_sections['level_loop']['total'];
                 $this->_sections['level_loop']['index'] += $this->_sections['level_loop']['step'], $this->_sections['level_loop']['iteration']++):
$this->_sections['level_loop']['rownum'] = $this->_sections['level_loop']['iteration'];
$this->_sections['level_loop']['index_prev'] = $this->_sections['level_loop']['index'] - $this->_sections['level_loop']['step'];
$this->_sections['level_loop']['index_next'] = $this->_sections['level_loop']['index'] + $this->_sections['level_loop']['step'];
$this->_sections['level_loop']['first']      = ($this->_sections['level_loop']['iteration'] == 1);
$this->_sections['level_loop']['last']       = ($this->_sections['level_loop']['iteration'] == $this->_sections['level_loop']['total']);
?>
  <tr class='<?php echo smarty_function_cycle(array('values' => "background2,background1"), $this);?>
'>
  <td class='item'><?php echo $this->_tpl_vars['levels'][$this->_sections['level_loop']['index']]['level_id']; ?>
</td>
  <td class='item'><?php echo $this->_tpl_vars['levels'][$this->_sections['level_loop']['index']]['level_name']; ?>
</td>
  <td class='item' align='center'><a href='admin_viewusers.php?f_level=<?php echo $this->_tpl_vars['levels'][$this->_sections['level_loop']['index']]['level_id']; ?>
'><?php echo $this->_tpl_vars['levels'][$this->_sections['level_loop']['index']]['users']; ?>
 <?php echo SELanguage::_get(274); ?></a></td>
  <td class='item' align='center'><?php if ($this->_tpl_vars['levels'][$this->_sections['level_loop']['index']]['level_default'] == 0): ?><a href='admin_levels.php?task=savechanges&default=<?php echo $this->_tpl_vars['levels'][$this->_sections['level_loop']['index']]['level_id']; ?>
'><img src='../images/icons/admin_checkbox1.gif' border='0' class='icon'></a><?php else: ?><img src='../images/icons/admin_checkbox2.gif' border='0' class='icon'><?php endif; ?></td>
  <td class='item'>[ <a href='admin_levels_edit.php?level_id=<?php echo $this->_tpl_vars['levels'][$this->_sections['level_loop']['index']]['level_id']; ?>
'><?php echo SELanguage::_get(187); ?></a> ]<?php if ($this->_tpl_vars['levels'][$this->_sections['level_loop']['index']]['level_default'] == 0): ?> [ <a href="javascript: confirmDelete('<?php echo $this->_tpl_vars['levels'][$this->_sections['level_loop']['index']]['level_id']; ?>
')"><?php echo SELanguage::_get(155); ?></a> ]<?php endif; ?></td>
  </tr>
<?php endfor; endif; ?>
</table>

<?php echo '
<script type="text/javascript">
<!-- 
var level_id = 0;
function confirmDelete(id) {
  level_id = id;
  TB_show(\''; 
 echo SELanguage::_get(280); 
 echo '\', \'#TB_inline?height=150&width=300&inlineId=confirmdelete\', \'\', \'../images/trans.gif\');

}

function deletePack() {
  window.location = \'admin_levels.php?task=delete&level_id=\'+level_id;
}

function createLevel() {
  TB_show(\''; 
 echo SELanguage::_get(272); 
 echo '\', \'#TB_inline?height=250&width=350&inlineId=createlevel\', \'\', \'../images/trans.gif\');
}

//-->
</script>
'; ?>



<div style='display: none;' id='confirmdelete'>
  <div style='margin-top: 10px;'>
    <?php echo SELanguage::_get(279); ?>
  </div>
  <br>
  <input type='button' class='button' value='<?php echo SELanguage::_get(175); ?>' onClick='parent.TB_remove();parent.deletePack();'> <input type='button' class='button' value='<?php echo SELanguage::_get(39); ?>' onClick='parent.TB_remove();'>
</div>


<div style='display: none;' id='createlevel'>
  <form action='admin_levels.php' method='post' target='_parent' onSubmit="<?php echo 'if(this.level_name.value == \'\'){ alert(\''; 
 echo SELanguage::_get(276); 
 echo '\'); return false;}else{return true;}'; ?>
">
  <div style='margin-top: 10px;'><?php echo SELanguage::_get(275); ?></div>
  <br>
  <table cellpadding='0' cellspacing='0' width='100%'>
  <tr>
  <td align='right'><?php echo SELanguage::_get(258); ?>:&nbsp;</td>
  <td><input type='text' class='text' name='level_name' id='level_name' size='30' maxlength='50'></td>
  </tr>
  <tr>
  <td align='right' valign='top'><?php echo SELanguage::_get(277); ?>:&nbsp;</td>
  <td><textarea name='level_desc' rows='4' cols='40' class='text' style='width: 100%;'></textarea></td>
  </tr>
  </table>

  <br>
  <input type='submit' class='button' value='<?php echo SELanguage::_get(278); ?>'> <input type='button' class='button' value='<?php echo SELanguage::_get(39); ?>' onClick='parent.TB_remove();'>
  <input type='hidden' name='task' value='create'>
  </form>
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin_footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>