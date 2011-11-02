<?php /* Smarty version 2.6.14, created on 2011-11-01 16:55:27
         compiled from admin_subnetworks.tpl */
?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'admin_subnetworks.tpl', 101, false),array('modifier', 'replace', 'admin_subnetworks.tpl', 106, false),)), $this);
?><?php
SELanguage::_preload_multi(9,612,613,614,615,617,616,736,618,619,620,87,258,273,621,153,622,623,187,155,636,624,635,637,175,39,633,634,625,626,627,628,629,630,631,579,580,581);
SELanguage::load();
?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin_header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<h2><?php echo SELanguage::_get(9); ?></h2>
<?php echo SELanguage::_get(612); ?>
<br />
<br />

<?php echo '
<script language=\'JavaScript\'>
<!--

//-->
</script>
'; ?>


<div id='button1' style='display: block;'>
  [ <a onClick="<?php echo '$(\'subnet_help\').setStyles({display:\'block\'});$(\'button1\').setStyles({display:\'none\'});'; ?>
" href="#"><?php echo SELanguage::_get(613); ?></a> ]
  <br><br>
</div>

<div id='subnet_help' style='display: none;'>
  <?php echo SELanguage::_get(614); ?>
  <br><br>
</div>


<?php if ($this->_tpl_vars['result'] != 0): ?><div class='success'><img src='../images/success.gif' class='icon' border='0'> <?php echo SELanguage::_get($this->_tpl_vars['result']); ?></div><?php endif; ?>

<div class='center'>
<div class='box' style='width: 500px;'>

<table cellpadding='0' cellspacing='0'>
<tr><form action='admin_subnetworks.php' method='POST'><td>
  <table cellpadding='0' cellspacing='0'>
  <tr>
  <td align='right'><?php echo SELanguage::_get(615); ?> &nbsp;</td>
  <td>
  <select class='text' name='setting_subnet_field1_id'>
  <option value='-2'></option>
  <option value='-1'<?php if ($this->_tpl_vars['primary']['field_id'] == "-1"): ?> SELECTED<?php endif; ?>><?php echo SELanguage::_get(617); ?></option>
  <option value='0'<?php if ($this->_tpl_vars['primary']['field_id'] == '0'): ?> SELECTED<?php endif; ?>><?php echo SELanguage::_get(616); ?></option>
  <?php unset($this->_sections['cat_loop']);
$this->_sections['cat_loop']['name'] = 'cat_loop';
$this->_sections['cat_loop']['loop'] = is_array($_loop=$this->_tpl_vars['cats']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['cat_loop']['show'] = true;
$this->_sections['cat_loop']['max'] = $this->_sections['cat_loop']['loop'];
$this->_sections['cat_loop']['step'] = 1;
$this->_sections['cat_loop']['start'] = $this->_sections['cat_loop']['step'] > 0 ? 0 : $this->_sections['cat_loop']['loop']-1;
if ($this->_sections['cat_loop']['show']) {
    $this->_sections['cat_loop']['total'] = $this->_sections['cat_loop']['loop'];
    if ($this->_sections['cat_loop']['total'] == 0)
        $this->_sections['cat_loop']['show'] = false;
} else
    $this->_sections['cat_loop']['total'] = 0;
if ($this->_sections['cat_loop']['show']):

            for ($this->_sections['cat_loop']['index'] = $this->_sections['cat_loop']['start'], $this->_sections['cat_loop']['iteration'] = 1;
                 $this->_sections['cat_loop']['iteration'] <= $this->_sections['cat_loop']['total'];
                 $this->_sections['cat_loop']['index'] += $this->_sections['cat_loop']['step'], $this->_sections['cat_loop']['iteration']++):
$this->_sections['cat_loop']['rownum'] = $this->_sections['cat_loop']['iteration'];
$this->_sections['cat_loop']['index_prev'] = $this->_sections['cat_loop']['index'] - $this->_sections['cat_loop']['step'];
$this->_sections['cat_loop']['index_next'] = $this->_sections['cat_loop']['index'] + $this->_sections['cat_loop']['step'];
$this->_sections['cat_loop']['first']      = ($this->_sections['cat_loop']['iteration'] == 1);
$this->_sections['cat_loop']['last']       = ($this->_sections['cat_loop']['iteration'] == $this->_sections['cat_loop']['total']);
?>
    <?php unset($this->_sections['subcat_loop']);
$this->_sections['subcat_loop']['name'] = 'subcat_loop';
$this->_sections['subcat_loop']['loop'] = is_array($_loop=$this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['subcat_loop']['show'] = true;
$this->_sections['subcat_loop']['max'] = $this->_sections['subcat_loop']['loop'];
$this->_sections['subcat_loop']['step'] = 1;
$this->_sections['subcat_loop']['start'] = $this->_sections['subcat_loop']['step'] > 0 ? 0 : $this->_sections['subcat_loop']['loop']-1;
if ($this->_sections['subcat_loop']['show']) {
    $this->_sections['subcat_loop']['total'] = $this->_sections['subcat_loop']['loop'];
    if ($this->_sections['subcat_loop']['total'] == 0)
        $this->_sections['subcat_loop']['show'] = false;
} else
    $this->_sections['subcat_loop']['total'] = 0;
if ($this->_sections['subcat_loop']['show']):

            for ($this->_sections['subcat_loop']['index'] = $this->_sections['subcat_loop']['start'], $this->_sections['subcat_loop']['iteration'] = 1;
                 $this->_sections['subcat_loop']['iteration'] <= $this->_sections['subcat_loop']['total'];
                 $this->_sections['subcat_loop']['index'] += $this->_sections['subcat_loop']['step'], $this->_sections['subcat_loop']['iteration']++):
$this->_sections['subcat_loop']['rownum'] = $this->_sections['subcat_loop']['iteration'];
$this->_sections['subcat_loop']['index_prev'] = $this->_sections['subcat_loop']['index'] - $this->_sections['subcat_loop']['step'];
$this->_sections['subcat_loop']['index_next'] = $this->_sections['subcat_loop']['index'] + $this->_sections['subcat_loop']['step'];
$this->_sections['subcat_loop']['first']      = ($this->_sections['subcat_loop']['iteration'] == 1);
$this->_sections['subcat_loop']['last']       = ($this->_sections['subcat_loop']['iteration'] == $this->_sections['subcat_loop']['total']);
?>
      <?php unset($this->_sections['field_loop']);
$this->_sections['field_loop']['name'] = 'field_loop';
$this->_sections['field_loop']['loop'] = is_array($_loop=$this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['field_loop']['show'] = true;
$this->_sections['field_loop']['max'] = $this->_sections['field_loop']['loop'];
$this->_sections['field_loop']['step'] = 1;
$this->_sections['field_loop']['start'] = $this->_sections['field_loop']['step'] > 0 ? 0 : $this->_sections['field_loop']['loop']-1;
if ($this->_sections['field_loop']['show']) {
    $this->_sections['field_loop']['total'] = $this->_sections['field_loop']['loop'];
    if ($this->_sections['field_loop']['total'] == 0)
        $this->_sections['field_loop']['show'] = false;
} else
    $this->_sections['field_loop']['total'] = 0;
if ($this->_sections['field_loop']['show']):

            for ($this->_sections['field_loop']['index'] = $this->_sections['field_loop']['start'], $this->_sections['field_loop']['iteration'] = 1;
                 $this->_sections['field_loop']['iteration'] <= $this->_sections['field_loop']['total'];
                 $this->_sections['field_loop']['index'] += $this->_sections['field_loop']['step'], $this->_sections['field_loop']['iteration']++):
$this->_sections['field_loop']['rownum'] = $this->_sections['field_loop']['iteration'];
$this->_sections['field_loop']['index_prev'] = $this->_sections['field_loop']['index'] - $this->_sections['field_loop']['step'];
$this->_sections['field_loop']['index_next'] = $this->_sections['field_loop']['index'] + $this->_sections['field_loop']['step'];
$this->_sections['field_loop']['first']      = ($this->_sections['field_loop']['iteration'] == 1);
$this->_sections['field_loop']['last']       = ($this->_sections['field_loop']['iteration'] == $this->_sections['field_loop']['total']);
?>
        <option value='<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_id']; ?>
'<?php if ($this->_tpl_vars['primary']['field_id'] == $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_id']): ?> selected='selected'<?php endif; ?>><?php echo SELanguage::_get($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_title']); 
 if ($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_special'] == 1): ?> <?php echo SELanguage::_get(736); 
 endif; ?></option>
      <?php endfor; endif; ?>
    <?php endfor; endif; ?>
  <?php endfor; endif; ?>
  </select>
  </td>
  </tr>
  <tr>
  <td align='right'><?php echo SELanguage::_get(618); ?> &nbsp;</td>
  <td>
  <select class='text' name='setting_subnet_field2_id'>
  <option value='-2'></option>
  <option value='-1'<?php if ($this->_tpl_vars['secondary']['field_id'] == "-1"): ?> SELECTED<?php endif; ?>><?php echo SELanguage::_get(617); ?></option>
  <option value='0'<?php if ($this->_tpl_vars['secondary']['field_id'] == '0'): ?> SELECTED<?php endif; ?>><?php echo SELanguage::_get(616); ?></option>
  <?php unset($this->_sections['cat_loop']);
$this->_sections['cat_loop']['name'] = 'cat_loop';
$this->_sections['cat_loop']['loop'] = is_array($_loop=$this->_tpl_vars['cats']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['cat_loop']['show'] = true;
$this->_sections['cat_loop']['max'] = $this->_sections['cat_loop']['loop'];
$this->_sections['cat_loop']['step'] = 1;
$this->_sections['cat_loop']['start'] = $this->_sections['cat_loop']['step'] > 0 ? 0 : $this->_sections['cat_loop']['loop']-1;
if ($this->_sections['cat_loop']['show']) {
    $this->_sections['cat_loop']['total'] = $this->_sections['cat_loop']['loop'];
    if ($this->_sections['cat_loop']['total'] == 0)
        $this->_sections['cat_loop']['show'] = false;
} else
    $this->_sections['cat_loop']['total'] = 0;
if ($this->_sections['cat_loop']['show']):

            for ($this->_sections['cat_loop']['index'] = $this->_sections['cat_loop']['start'], $this->_sections['cat_loop']['iteration'] = 1;
                 $this->_sections['cat_loop']['iteration'] <= $this->_sections['cat_loop']['total'];
                 $this->_sections['cat_loop']['index'] += $this->_sections['cat_loop']['step'], $this->_sections['cat_loop']['iteration']++):
$this->_sections['cat_loop']['rownum'] = $this->_sections['cat_loop']['iteration'];
$this->_sections['cat_loop']['index_prev'] = $this->_sections['cat_loop']['index'] - $this->_sections['cat_loop']['step'];
$this->_sections['cat_loop']['index_next'] = $this->_sections['cat_loop']['index'] + $this->_sections['cat_loop']['step'];
$this->_sections['cat_loop']['first']      = ($this->_sections['cat_loop']['iteration'] == 1);
$this->_sections['cat_loop']['last']       = ($this->_sections['cat_loop']['iteration'] == $this->_sections['cat_loop']['total']);
?>
    <?php unset($this->_sections['subcat_loop']);
$this->_sections['subcat_loop']['name'] = 'subcat_loop';
$this->_sections['subcat_loop']['loop'] = is_array($_loop=$this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['subcat_loop']['show'] = true;
$this->_sections['subcat_loop']['max'] = $this->_sections['subcat_loop']['loop'];
$this->_sections['subcat_loop']['step'] = 1;
$this->_sections['subcat_loop']['start'] = $this->_sections['subcat_loop']['step'] > 0 ? 0 : $this->_sections['subcat_loop']['loop']-1;
if ($this->_sections['subcat_loop']['show']) {
    $this->_sections['subcat_loop']['total'] = $this->_sections['subcat_loop']['loop'];
    if ($this->_sections['subcat_loop']['total'] == 0)
        $this->_sections['subcat_loop']['show'] = false;
} else
    $this->_sections['subcat_loop']['total'] = 0;
if ($this->_sections['subcat_loop']['show']):

            for ($this->_sections['subcat_loop']['index'] = $this->_sections['subcat_loop']['start'], $this->_sections['subcat_loop']['iteration'] = 1;
                 $this->_sections['subcat_loop']['iteration'] <= $this->_sections['subcat_loop']['total'];
                 $this->_sections['subcat_loop']['index'] += $this->_sections['subcat_loop']['step'], $this->_sections['subcat_loop']['iteration']++):
$this->_sections['subcat_loop']['rownum'] = $this->_sections['subcat_loop']['iteration'];
$this->_sections['subcat_loop']['index_prev'] = $this->_sections['subcat_loop']['index'] - $this->_sections['subcat_loop']['step'];
$this->_sections['subcat_loop']['index_next'] = $this->_sections['subcat_loop']['index'] + $this->_sections['subcat_loop']['step'];
$this->_sections['subcat_loop']['first']      = ($this->_sections['subcat_loop']['iteration'] == 1);
$this->_sections['subcat_loop']['last']       = ($this->_sections['subcat_loop']['iteration'] == $this->_sections['subcat_loop']['total']);
?>
      <?php unset($this->_sections['field_loop']);
$this->_sections['field_loop']['name'] = 'field_loop';
$this->_sections['field_loop']['loop'] = is_array($_loop=$this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['field_loop']['show'] = true;
$this->_sections['field_loop']['max'] = $this->_sections['field_loop']['loop'];
$this->_sections['field_loop']['step'] = 1;
$this->_sections['field_loop']['start'] = $this->_sections['field_loop']['step'] > 0 ? 0 : $this->_sections['field_loop']['loop']-1;
if ($this->_sections['field_loop']['show']) {
    $this->_sections['field_loop']['total'] = $this->_sections['field_loop']['loop'];
    if ($this->_sections['field_loop']['total'] == 0)
        $this->_sections['field_loop']['show'] = false;
} else
    $this->_sections['field_loop']['total'] = 0;
if ($this->_sections['field_loop']['show']):

            for ($this->_sections['field_loop']['index'] = $this->_sections['field_loop']['start'], $this->_sections['field_loop']['iteration'] = 1;
                 $this->_sections['field_loop']['iteration'] <= $this->_sections['field_loop']['total'];
                 $this->_sections['field_loop']['index'] += $this->_sections['field_loop']['step'], $this->_sections['field_loop']['iteration']++):
$this->_sections['field_loop']['rownum'] = $this->_sections['field_loop']['iteration'];
$this->_sections['field_loop']['index_prev'] = $this->_sections['field_loop']['index'] - $this->_sections['field_loop']['step'];
$this->_sections['field_loop']['index_next'] = $this->_sections['field_loop']['index'] + $this->_sections['field_loop']['step'];
$this->_sections['field_loop']['first']      = ($this->_sections['field_loop']['iteration'] == 1);
$this->_sections['field_loop']['last']       = ($this->_sections['field_loop']['iteration'] == $this->_sections['field_loop']['total']);
?>
        <option value='<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_id']; ?>
'<?php if ($this->_tpl_vars['secondary']['field_id'] == $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_id']): ?> selected='selected'<?php endif; ?>><?php echo SELanguage::_get($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_title']); 
 if ($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_special'] == 1): ?> <?php echo SELanguage::_get(736); 
 endif; ?></option>
      <?php endfor; endif; ?>
    <?php endfor; endif; ?>
  <?php endfor; endif; ?>
  </select>
  </td>
  </tr>
  </table>
</td><td>
&nbsp; <input type='submit' class='button' value='<?php echo SELanguage::_get(619); ?>'>
</td><input type='hidden' name='task' value='doupdate'><input type='hidden' name='s' value='<?php echo $this->_tpl_vars['s']; ?>
'></form></tr></table>
</div>
</div>

<br>

<input type='submit' class='button' value='<?php echo SELanguage::_get(620); ?>' onClick='createSubnet();'>

<br><br>

<table cellpadding='0' cellspacing='0' class='list'>
<tr>
<td class='header' width='10'><a class='header' href='admin_subnetworks.php?s=<?php echo $this->_tpl_vars['i']; ?>
'><?php echo SELanguage::_get(87); ?></a></td>
<td class='header' width='200'><?php echo SELanguage::_get(258); ?></td>
<td class='header' align='center'><a class='header' href='admin_subnetworks.php?s=<?php echo $this->_tpl_vars['u']; ?>
'><?php echo SELanguage::_get(273); ?></a></td>
<td class='header'><?php echo SELanguage::_get(621); ?></td>
<td class='header' width='100'><?php echo SELanguage::_get(153); ?></td>
</tr>
<tr class='background1'>
<td class='item'>0</td>
<td class='item'><?php echo SELanguage::_get(622); ?></td>
<td class='item' align='center'><a href='admin_viewusers.php?f_subnet=0'><?php echo $this->_tpl_vars['default_users']; ?>
</a></td>
<td class='item'><?php echo SELanguage::_get(623); ?></td>
<td class='item'>&nbsp;</td>
</tr>
<?php unset($this->_sections['subnet_loop']);
$this->_sections['subnet_loop']['name'] = 'subnet_loop';
$this->_sections['subnet_loop']['loop'] = is_array($_loop=$this->_tpl_vars['subnets']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['subnet_loop']['show'] = true;
$this->_sections['subnet_loop']['max'] = $this->_sections['subnet_loop']['loop'];
$this->_sections['subnet_loop']['step'] = 1;
$this->_sections['subnet_loop']['start'] = $this->_sections['subnet_loop']['step'] > 0 ? 0 : $this->_sections['subnet_loop']['loop']-1;
if ($this->_sections['subnet_loop']['show']) {
    $this->_sections['subnet_loop']['total'] = $this->_sections['subnet_loop']['loop'];
    if ($this->_sections['subnet_loop']['total'] == 0)
        $this->_sections['subnet_loop']['show'] = false;
} else
    $this->_sections['subnet_loop']['total'] = 0;
if ($this->_sections['subnet_loop']['show']):

            for ($this->_sections['subnet_loop']['index'] = $this->_sections['subnet_loop']['start'], $this->_sections['subnet_loop']['iteration'] = 1;
                 $this->_sections['subnet_loop']['iteration'] <= $this->_sections['subnet_loop']['total'];
                 $this->_sections['subnet_loop']['index'] += $this->_sections['subnet_loop']['step'], $this->_sections['subnet_loop']['iteration']++):
$this->_sections['subnet_loop']['rownum'] = $this->_sections['subnet_loop']['iteration'];
$this->_sections['subnet_loop']['index_prev'] = $this->_sections['subnet_loop']['index'] - $this->_sections['subnet_loop']['step'];
$this->_sections['subnet_loop']['index_next'] = $this->_sections['subnet_loop']['index'] + $this->_sections['subnet_loop']['step'];
$this->_sections['subnet_loop']['first']      = ($this->_sections['subnet_loop']['iteration'] == 1);
$this->_sections['subnet_loop']['last']       = ($this->_sections['subnet_loop']['iteration'] == $this->_sections['subnet_loop']['total']);
?>
  <?php ob_start(); 
 echo SELanguage::_get($this->_tpl_vars['subnets'][$this->_sections['subnet_loop']['index']]['subnet_name']); 
 $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('subnet_name', ob_get_contents());ob_end_clean(); ?>
  <tr class='<?php echo smarty_function_cycle(array('values' => "background2,background1"), $this);?>
'>
  <td class='item'><?php echo $this->_tpl_vars['subnets'][$this->_sections['subnet_loop']['index']]['subnet_id']; ?>
</td>
  <td class='item'><?php echo SELanguage::_get($this->_tpl_vars['subnets'][$this->_sections['subnet_loop']['index']]['subnet_name']); ?></td>
  <td class='item' align='center'><a href='admin_viewusers.php?f_subnet=<?php echo $this->_tpl_vars['subnets'][$this->_sections['subnet_loop']['index']]['subnet_id']; ?>
'><?php echo $this->_tpl_vars['subnets'][$this->_sections['subnet_loop']['index']]['subnet_users']; ?>
</a></td>
  <td class='item'><?php echo SELanguage::_get($this->_tpl_vars['primary']['field_title']); 
 if ($this->_tpl_vars['primary']['field_special'] == 1): ?> <?php echo SELanguage::_get(736); 
 endif; ?> <?php echo $this->_tpl_vars['subnets'][$this->_sections['subnet_loop']['index']]['subnet_field1_qual']; ?>
 <?php echo $this->_tpl_vars['subnets'][$this->_sections['subnet_loop']['index']]['subnet_field1_value_formatted']; ?>
<br><?php if ($this->_tpl_vars['subnets'][$this->_sections['subnet_loop']['index']]['subnet_field2_qual'] != "" && $this->_tpl_vars['subnets'][$this->_sections['subnet_loop']['index']]['subnet_field2_value_formatted'] != ""): 
 echo SELanguage::_get($this->_tpl_vars['secondary']['field_title']); 
 if ($this->_tpl_vars['secondary']['field_special'] == 1): ?> <?php echo SELanguage::_get(736); 
 endif; ?> <?php echo $this->_tpl_vars['subnets'][$this->_sections['subnet_loop']['index']]['subnet_field2_qual']; ?>
 <?php echo $this->_tpl_vars['subnets'][$this->_sections['subnet_loop']['index']]['subnet_field2_value_formatted']; 
 endif; ?></td>
  <td class='item'>[ <a href="javascript: editSubnet('<?php echo $this->_tpl_vars['subnets'][$this->_sections['subnet_loop']['index']]['subnet_id']; ?>
', '<?php echo ((is_array($_tmp=$this->_tpl_vars['subnet_name'])) ? $this->_run_mod_handler('replace', true, $_tmp, "&#039;", "\&#039;") : smarty_modifier_replace($_tmp, "&#039;", "\&#039;")); ?>
', '<?php echo $this->_tpl_vars['subnets'][$this->_sections['subnet_loop']['index']]['subnet_field1_qual']; ?>
', '<?php echo $this->_tpl_vars['subnets'][$this->_sections['subnet_loop']['index']]['subnet_field1_value']; ?>
', '<?php echo $this->_tpl_vars['subnets'][$this->_sections['subnet_loop']['index']]['subnet_field1_month']; ?>
', '<?php echo $this->_tpl_vars['subnets'][$this->_sections['subnet_loop']['index']]['subnet_field1_day']; ?>
', '<?php echo $this->_tpl_vars['subnets'][$this->_sections['subnet_loop']['index']]['subnet_field1_year']; ?>
', '<?php echo $this->_tpl_vars['subnets'][$this->_sections['subnet_loop']['index']]['subnet_field2_qual']; ?>
', '<?php echo $this->_tpl_vars['subnets'][$this->_sections['subnet_loop']['index']]['subnet_field2_value']; ?>
', '<?php echo $this->_tpl_vars['subnets'][$this->_sections['subnet_loop']['index']]['subnet_field2_month']; ?>
', '<?php echo $this->_tpl_vars['subnets'][$this->_sections['subnet_loop']['index']]['subnet_field2_day']; ?>
', '<?php echo $this->_tpl_vars['subnets'][$this->_sections['subnet_loop']['index']]['subnet_field2_year']; ?>
');"><?php echo SELanguage::_get(187); ?></a> ] [ <a href="javascript: confirmDelete('<?php echo $this->_tpl_vars['subnets'][$this->_sections['subnet_loop']['index']]['subnet_id']; ?>
');"><?php echo SELanguage::_get(155); ?></a> ]</td>
  </tr>
<?php endfor; endif; ?>
</table>


<?php echo '
<script type="text/javascript">
<!-- 
var subnet_id = 0;
function confirmDelete(id) {
  subnet_id = id;
  TB_show(\''; 
 echo SELanguage::_get(636); 
 echo '\', \'#TB_inline?height=150&width=300&inlineId=confirmdelete\', \'\', \'../images/trans.gif\');

}

function deleteSubnet() {
  window.location = \'admin_subnetworks.php?task=delete&subnet_id=\'+subnet_id;
}

function createSubnet() {
  $(\'task\').value = \'create\';
  $(\'createbutton\').value = \''; 
 echo SELanguage::_get(624); 
 echo '\';
  $(\'subnet_id\').value = 0;  
  $(\'subnet_name\').value = \'\';  
  $(\'subnet_name\').defaultValue = \'\';  
  $(\'subnet_field1_qual\').options[$(\'subnet_field1_qual\').selectedIndex].defaultSelected = false;
  if($(\'subnet_field1_value\')) {
    if($(\'subnet_field1_value\').options) { 
      $(\'subnet_field1_value\').options[$(\'subnet_field1_value\').selectedIndex].defaultSelected = false; 
    } else {
      $(\'subnet_field1_value\').value = \'\';
      $(\'subnet_field1_value\').defaultValue = \'\';
    }
  } else {
    $(\'subnet_field1_month\').options[$(\'subnet_field1_month\').selectedIndex].defaultSelected = false;
    $(\'subnet_field1_day\').options[$(\'subnet_field1_day\').selectedIndex].defaultSelected = false;
    $(\'subnet_field1_year\').options[$(\'subnet_field1_year\').selectedIndex].defaultSelected = false;
  }
  if($(\'subnet_field2_qual\')) {
    $(\'subnet_field2_qual\').options[$(\'subnet_field2_qual\').selectedIndex].defaultSelected = false;
    if($(\'subnet_field2_value\')) {
      if($(\'subnet_field2_value\').options) { 
        $(\'subnet_field2_value\').options[$(\'subnet_field2_value\').selectedIndex].defaultSelected = false; 
      } else {
        $(\'subnet_field2_value\').value = \'\';
        $(\'subnet_field2_value\').defaultValue = \'\';
      }
    } else {
      $(\'subnet_field2_month\').options[$(\'subnet_field2_month\').selectedIndex].defaultSelected = false;
      $(\'subnet_field2_day\').options[$(\'subnet_field2_day\').selectedIndex].defaultSelected = false;
      $(\'subnet_field2_year\').options[$(\'subnet_field2_year\').selectedIndex].defaultSelected = false;
    }
  }
  TB_show(\''; 
 echo SELanguage::_get(624); 
 echo '\', \'#TB_inline?height=450&width=500&inlineId=createsubnet\', \'\', \'../images/trans.gif\');
}

function editSubnet(subnet_id, subnet_name, subnet_field1_qual, subnet_field1_value, subnet_field1_month, subnet_field1_day, subnet_field1_year, subnet_field2_qual, subnet_field2_value, subnet_field2_month, subnet_field2_day, subnet_field2_year) {
  $(\'task\').value = \'edit\';
  $(\'createbutton\').value = \''; 
 echo SELanguage::_get(635); 
 echo '\';
  $(\'subnet_id\').value = subnet_id;  
  $(\'subnet_name\').value = subnet_name;  
  $(\'subnet_name\').defaultValue = subnet_name;  
  $(\'subnet_field1_qual\').value = subnet_field1_qual;
  $(\'subnet_field1_qual\').options[$(\'subnet_field1_qual\').selectedIndex].defaultSelected = true;
  if($(\'subnet_field1_value\')) {
    $(\'subnet_field1_value\').value = subnet_field1_value;
    if($(\'subnet_field1_value\').options) { 
      $(\'subnet_field1_value\').options[$(\'subnet_field1_value\').selectedIndex].defaultSelected = true; 
    } else {
      $(\'subnet_field1_value\').defaultValue = subnet_field1_value;
    }
  } else {
    $(\'subnet_field1_month\').value = subnet_field1_month;
    $(\'subnet_field1_month\').options[$(\'subnet_field1_month\').selectedIndex].defaultSelected = true;
    $(\'subnet_field1_day\').value = subnet_field1_day;
    $(\'subnet_field1_day\').options[$(\'subnet_field1_day\').selectedIndex].defaultSelected = true;
    $(\'subnet_field1_year\').value = subnet_field1_year;
    $(\'subnet_field1_year\').options[$(\'subnet_field1_year\').selectedIndex].defaultSelected = true;
  }
  if($(\'subnet_field2_qual\')) {
    $(\'subnet_field2_qual\').value = subnet_field2_qual;
    $(\'subnet_field2_qual\').options[$(\'subnet_field2_qual\').selectedIndex].defaultSelected = true;
    if($(\'subnet_field2_value\')) {
      $(\'subnet_field2_value\').value = subnet_field2_value;
      if($(\'subnet_field2_value\').options) { 
        $(\'subnet_field2_value\').options[$(\'subnet_field2_value\').selectedIndex].defaultSelected = true; 
      } else {
        $(\'subnet_field2_value\').defaultValue = subnet_field2_value;
      }
    } else {
      $(\'subnet_field2_month\').value = subnet_field2_month;
      $(\'subnet_field2_month\').options[$(\'subnet_field2_month\').selectedIndex].defaultSelected = true;
      $(\'subnet_field2_day\').value = subnet_field2_day;
      $(\'subnet_field2_day\').options[$(\'subnet_field2_day\').selectedIndex].defaultSelected = true;
      $(\'subnet_field2_year\').value = subnet_field2_year;
      $(\'subnet_field2_year\').options[$(\'subnet_field2_year\').selectedIndex].defaultSelected = true;
    }
  }
  TB_show(\''; 
 echo SELanguage::_get(635); 
 echo '\', \'#TB_inline?height=450&width=500&inlineId=createsubnet\', \'\', \'../images/trans.gif\');
}

//-->
</script>
'; ?>



<div style='display: none;' id='confirmdelete'>
  <div style='margin-top: 10px;'>
    <?php echo SELanguage::_get(637); ?>
  </div>
  <br>
  <input type='button' class='button' value='<?php echo SELanguage::_get(175); ?>' onClick='parent.TB_remove();parent.deleteSubnet();'> <input type='button' class='button' value='<?php echo SELanguage::_get(39); ?>' onClick='parent.TB_remove();'>
</div>


<div style='display: none;' id='createsubnet'>
  <form action='admin_subnetworks.php' method='post' target='_parent' onSubmit="<?php echo 'if(this.subnet_name.value == \'\'){ alert(\''; 
 echo SELanguage::_get(633); 
 echo '\'); return false; } else if($(this).getElement(\'select[id=subnet_field1_qual]\').value == \'\' || ($(this).getElement(\'input[id=subnet_field1_value]\') && $(this).getElement(\'input[id=subnet_field1_value]\').value == \'\') || ($(this).getElement(\'select[id=subnet_field1_value]\') && $(this).getElement(\'select[id=subnet_field1_value]\').value == \'\') || ($(this).getElement(\'select[id=subnet_field1_month]\') && $(this).getElement(\'select[id=subnet_field1_month]\').value == \'\') || ($(this).getElement(\'select[id=subnet_field1_day]\') && $(this).getElement(\'select[id=subnet_field1_day]\').value == \'\') || ($(this).getElement(\'select[id=subnet_field1_year]\') && $(this).getElement(\'select[id=subnet_field1_year]\').value == \'\')) { alert(\''; 
 echo SELanguage::_get(634); 
 echo '\'); return false; } else { return true; }'; ?>
">
  <div style='margin-top: 10px;'><?php echo SELanguage::_get(625); ?></div>
  <br>
  <b><?php echo SELanguage::_get(258); ?>:</b><br>
  <input type='text' class='text' name='subnet_name' id='subnet_name' maxlength='20'>
  <br><br>
  <b><?php echo SELanguage::_get(621); ?>:</b><br>
    <table cellpadding='0' cellspacing='0'>
    <tr>
    <td>
    <select class='text'>
    <option><?php echo SELanguage::_get($this->_tpl_vars['primary']['field_title']); 
 if ($this->_tpl_vars['primary']['field_special'] == 1): ?> <?php echo SELanguage::_get(736); 
 endif; ?></option>
    </select>&nbsp;
    </td>
    <td>
    <select class='text' name='subnet_field1_qual' id='subnet_field1_qual'>
    <option value=''></option>
    <option value='=='><?php echo SELanguage::_get(626); ?></option>
    <option value='!='><?php echo SELanguage::_get(627); ?></option>
    <option value='>'><?php echo SELanguage::_get(628); ?></option>
    <option value='<'><?php echo SELanguage::_get(629); ?></option>
    <option value='>='><?php echo SELanguage::_get(630); ?></option>
    <option value='<='><?php echo SELanguage::_get(631); ?></option>
    </select>&nbsp;
    </td>
    <td>
            <?php if ($this->_tpl_vars['primary']['field_type'] == 1 || $this->_tpl_vars['primary']['field_type'] == 2): ?>
        <input type='text' class='text' name='subnet_field1_value' id='subnet_field1_value' maxlength='250' size='30'>

            <?php elseif ($this->_tpl_vars['primary']['field_type'] == 3 || $this->_tpl_vars['primary']['field_type'] == 4): ?>
        <select class='text' name='subnet_field1_value' id='subnet_field1_value'>
        <option value=''></option>
                <?php unset($this->_sections['option_loop']);
$this->_sections['option_loop']['name'] = 'option_loop';
$this->_sections['option_loop']['loop'] = is_array($_loop=$this->_tpl_vars['primary']['field_options']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['option_loop']['show'] = true;
$this->_sections['option_loop']['max'] = $this->_sections['option_loop']['loop'];
$this->_sections['option_loop']['step'] = 1;
$this->_sections['option_loop']['start'] = $this->_sections['option_loop']['step'] > 0 ? 0 : $this->_sections['option_loop']['loop']-1;
if ($this->_sections['option_loop']['show']) {
    $this->_sections['option_loop']['total'] = $this->_sections['option_loop']['loop'];
    if ($this->_sections['option_loop']['total'] == 0)
        $this->_sections['option_loop']['show'] = false;
} else
    $this->_sections['option_loop']['total'] = 0;
if ($this->_sections['option_loop']['show']):

            for ($this->_sections['option_loop']['index'] = $this->_sections['option_loop']['start'], $this->_sections['option_loop']['iteration'] = 1;
                 $this->_sections['option_loop']['iteration'] <= $this->_sections['option_loop']['total'];
                 $this->_sections['option_loop']['index'] += $this->_sections['option_loop']['step'], $this->_sections['option_loop']['iteration']++):
$this->_sections['option_loop']['rownum'] = $this->_sections['option_loop']['iteration'];
$this->_sections['option_loop']['index_prev'] = $this->_sections['option_loop']['index'] - $this->_sections['option_loop']['step'];
$this->_sections['option_loop']['index_next'] = $this->_sections['option_loop']['index'] + $this->_sections['option_loop']['step'];
$this->_sections['option_loop']['first']      = ($this->_sections['option_loop']['iteration'] == 1);
$this->_sections['option_loop']['last']       = ($this->_sections['option_loop']['iteration'] == $this->_sections['option_loop']['total']);
?>
          <option value='<?php echo $this->_tpl_vars['primary']['field_options'][$this->_sections['option_loop']['index']]['value']; ?>
'><?php echo SELanguage::_get($this->_tpl_vars['primary']['field_options'][$this->_sections['option_loop']['index']]['label']); ?></option>
        <?php endfor; endif; ?>
        </select>

            <?php elseif ($this->_tpl_vars['primary']['field_type'] == 5): ?>
        <select class='text' name='subnet_field1_month' id='subnet_field1_month'>
        <option value=''><?php echo SELanguage::_get(579); ?></option>
        <?php unset($this->_sections['field1_month']);
$this->_sections['field1_month']['name'] = 'field1_month';
$this->_sections['field1_month']['start'] = (int)1;
$this->_sections['field1_month']['loop'] = is_array($_loop=13) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['field1_month']['show'] = true;
$this->_sections['field1_month']['max'] = $this->_sections['field1_month']['loop'];
$this->_sections['field1_month']['step'] = 1;
if ($this->_sections['field1_month']['start'] < 0)
    $this->_sections['field1_month']['start'] = max($this->_sections['field1_month']['step'] > 0 ? 0 : -1, $this->_sections['field1_month']['loop'] + $this->_sections['field1_month']['start']);
else
    $this->_sections['field1_month']['start'] = min($this->_sections['field1_month']['start'], $this->_sections['field1_month']['step'] > 0 ? $this->_sections['field1_month']['loop'] : $this->_sections['field1_month']['loop']-1);
if ($this->_sections['field1_month']['show']) {
    $this->_sections['field1_month']['total'] = min(ceil(($this->_sections['field1_month']['step'] > 0 ? $this->_sections['field1_month']['loop'] - $this->_sections['field1_month']['start'] : $this->_sections['field1_month']['start']+1)/abs($this->_sections['field1_month']['step'])), $this->_sections['field1_month']['max']);
    if ($this->_sections['field1_month']['total'] == 0)
        $this->_sections['field1_month']['show'] = false;
} else
    $this->_sections['field1_month']['total'] = 0;
if ($this->_sections['field1_month']['show']):

            for ($this->_sections['field1_month']['index'] = $this->_sections['field1_month']['start'], $this->_sections['field1_month']['iteration'] = 1;
                 $this->_sections['field1_month']['iteration'] <= $this->_sections['field1_month']['total'];
                 $this->_sections['field1_month']['index'] += $this->_sections['field1_month']['step'], $this->_sections['field1_month']['iteration']++):
$this->_sections['field1_month']['rownum'] = $this->_sections['field1_month']['iteration'];
$this->_sections['field1_month']['index_prev'] = $this->_sections['field1_month']['index'] - $this->_sections['field1_month']['step'];
$this->_sections['field1_month']['index_next'] = $this->_sections['field1_month']['index'] + $this->_sections['field1_month']['step'];
$this->_sections['field1_month']['first']      = ($this->_sections['field1_month']['iteration'] == 1);
$this->_sections['field1_month']['last']       = ($this->_sections['field1_month']['iteration'] == $this->_sections['field1_month']['total']);
?>
          <option value='<?php echo $this->_sections['field1_month']['index']; ?>
'><?php echo $this->_tpl_vars['datetime']->cdate('M',$this->_tpl_vars['datetime']->MakeTime(0,0,0,$this->_sections['field1_month']['index'],1,1990)); ?>
</option>
        <?php endfor; endif; ?>
        </select>
 
        <select class='text' name='subnet_field1_day' id='subnet_field1_day'>
        <option value=''><?php echo SELanguage::_get(580); ?></option>
        <?php unset($this->_sections['field1_day']);
$this->_sections['field1_day']['name'] = 'field1_day';
$this->_sections['field1_day']['start'] = (int)1;
$this->_sections['field1_day']['loop'] = is_array($_loop=32) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['field1_day']['show'] = true;
$this->_sections['field1_day']['max'] = $this->_sections['field1_day']['loop'];
$this->_sections['field1_day']['step'] = 1;
if ($this->_sections['field1_day']['start'] < 0)
    $this->_sections['field1_day']['start'] = max($this->_sections['field1_day']['step'] > 0 ? 0 : -1, $this->_sections['field1_day']['loop'] + $this->_sections['field1_day']['start']);
else
    $this->_sections['field1_day']['start'] = min($this->_sections['field1_day']['start'], $this->_sections['field1_day']['step'] > 0 ? $this->_sections['field1_day']['loop'] : $this->_sections['field1_day']['loop']-1);
if ($this->_sections['field1_day']['show']) {
    $this->_sections['field1_day']['total'] = min(ceil(($this->_sections['field1_day']['step'] > 0 ? $this->_sections['field1_day']['loop'] - $this->_sections['field1_day']['start'] : $this->_sections['field1_day']['start']+1)/abs($this->_sections['field1_day']['step'])), $this->_sections['field1_day']['max']);
    if ($this->_sections['field1_day']['total'] == 0)
        $this->_sections['field1_day']['show'] = false;
} else
    $this->_sections['field1_day']['total'] = 0;
if ($this->_sections['field1_day']['show']):

            for ($this->_sections['field1_day']['index'] = $this->_sections['field1_day']['start'], $this->_sections['field1_day']['iteration'] = 1;
                 $this->_sections['field1_day']['iteration'] <= $this->_sections['field1_day']['total'];
                 $this->_sections['field1_day']['index'] += $this->_sections['field1_day']['step'], $this->_sections['field1_day']['iteration']++):
$this->_sections['field1_day']['rownum'] = $this->_sections['field1_day']['iteration'];
$this->_sections['field1_day']['index_prev'] = $this->_sections['field1_day']['index'] - $this->_sections['field1_day']['step'];
$this->_sections['field1_day']['index_next'] = $this->_sections['field1_day']['index'] + $this->_sections['field1_day']['step'];
$this->_sections['field1_day']['first']      = ($this->_sections['field1_day']['iteration'] == 1);
$this->_sections['field1_day']['last']       = ($this->_sections['field1_day']['iteration'] == $this->_sections['field1_day']['total']);
?>
          <option value='<?php echo $this->_sections['field1_day']['index']; ?>
'><?php echo $this->_sections['field1_day']['index']; ?>
</option>
        <?php endfor; endif; ?>
        </select>

        <select class='text' name='subnet_field1_year' id='subnet_field1_year'>
        <option value=''><?php echo SELanguage::_get(581); ?></option>
        <?php unset($this->_sections['field1_year']);
$this->_sections['field1_year']['name'] = 'field1_year';
$this->_sections['field1_year']['loop'] = is_array($_loop=2009) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['field1_year']['max'] = (int)80;
$this->_sections['field1_year']['step'] = ((int)-1) == 0 ? 1 : (int)-1;
$this->_sections['field1_year']['show'] = true;
if ($this->_sections['field1_year']['max'] < 0)
    $this->_sections['field1_year']['max'] = $this->_sections['field1_year']['loop'];
$this->_sections['field1_year']['start'] = $this->_sections['field1_year']['step'] > 0 ? 0 : $this->_sections['field1_year']['loop']-1;
if ($this->_sections['field1_year']['show']) {
    $this->_sections['field1_year']['total'] = min(ceil(($this->_sections['field1_year']['step'] > 0 ? $this->_sections['field1_year']['loop'] - $this->_sections['field1_year']['start'] : $this->_sections['field1_year']['start']+1)/abs($this->_sections['field1_year']['step'])), $this->_sections['field1_year']['max']);
    if ($this->_sections['field1_year']['total'] == 0)
        $this->_sections['field1_year']['show'] = false;
} else
    $this->_sections['field1_year']['total'] = 0;
if ($this->_sections['field1_year']['show']):

            for ($this->_sections['field1_year']['index'] = $this->_sections['field1_year']['start'], $this->_sections['field1_year']['iteration'] = 1;
                 $this->_sections['field1_year']['iteration'] <= $this->_sections['field1_year']['total'];
                 $this->_sections['field1_year']['index'] += $this->_sections['field1_year']['step'], $this->_sections['field1_year']['iteration']++):
$this->_sections['field1_year']['rownum'] = $this->_sections['field1_year']['iteration'];
$this->_sections['field1_year']['index_prev'] = $this->_sections['field1_year']['index'] - $this->_sections['field1_year']['step'];
$this->_sections['field1_year']['index_next'] = $this->_sections['field1_year']['index'] + $this->_sections['field1_year']['step'];
$this->_sections['field1_year']['first']      = ($this->_sections['field1_year']['iteration'] == 1);
$this->_sections['field1_year']['last']       = ($this->_sections['field1_year']['iteration'] == $this->_sections['field1_year']['total']);
?>
          <option value='<?php echo $this->_sections['field1_year']['index']; ?>
'><?php echo $this->_sections['field1_year']['index']; ?>
</option>
        <?php endfor; endif; ?>
        </select>
      <?php endif; ?>
    </td>
    </tr>
    </table>
  <br>
  <?php if ($this->_tpl_vars['secondary']['field_id'] != -2): ?>
    <table cellpadding='0' cellspacing='0'>
    <tr>
    <td>
    <select class='text'>
    <option><?php echo SELanguage::_get($this->_tpl_vars['secondary']['field_title']); 
 if ($this->_tpl_vars['secondary']['field_special'] == 1): ?> <?php echo SELanguage::_get(736); 
 endif; ?></option>
    </select>&nbsp;
    </td>
    <td>
    <select class='text' name='subnet_field2_qual' id='subnet_field2_qual'>
    <option value=''></option>
    <option value='=='><?php echo SELanguage::_get(626); ?></option>
    <option value='!='><?php echo SELanguage::_get(627); ?></option>
    <option value='>'><?php echo SELanguage::_get(628); ?></option>
    <option value='<'><?php echo SELanguage::_get(629); ?></option>
    <option value='>='><?php echo SELanguage::_get(630); ?></option>
    <option value='<='><?php echo SELanguage::_get(631); ?></option>
    </select>&nbsp;
    </td>
    <td>
            <?php if ($this->_tpl_vars['secondary']['field_type'] == 1 || $this->_tpl_vars['secondary']['field_type'] == 2): ?>
        <input type='text' class='text' name='subnet_field2_value' id='subnet_field2_value' maxlength='250' size='30'>

            <?php elseif ($this->_tpl_vars['secondary']['field_type'] == 3 || $this->_tpl_vars['secondary']['field_type'] == 4): ?>
        <select class='text' name='subnet_field2_value' id='subnet_field2_value'>
        <option value=''></option>
                <?php unset($this->_sections['option_loop']);
$this->_sections['option_loop']['name'] = 'option_loop';
$this->_sections['option_loop']['loop'] = is_array($_loop=$this->_tpl_vars['secondary']['field_options']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['option_loop']['show'] = true;
$this->_sections['option_loop']['max'] = $this->_sections['option_loop']['loop'];
$this->_sections['option_loop']['step'] = 1;
$this->_sections['option_loop']['start'] = $this->_sections['option_loop']['step'] > 0 ? 0 : $this->_sections['option_loop']['loop']-1;
if ($this->_sections['option_loop']['show']) {
    $this->_sections['option_loop']['total'] = $this->_sections['option_loop']['loop'];
    if ($this->_sections['option_loop']['total'] == 0)
        $this->_sections['option_loop']['show'] = false;
} else
    $this->_sections['option_loop']['total'] = 0;
if ($this->_sections['option_loop']['show']):

            for ($this->_sections['option_loop']['index'] = $this->_sections['option_loop']['start'], $this->_sections['option_loop']['iteration'] = 1;
                 $this->_sections['option_loop']['iteration'] <= $this->_sections['option_loop']['total'];
                 $this->_sections['option_loop']['index'] += $this->_sections['option_loop']['step'], $this->_sections['option_loop']['iteration']++):
$this->_sections['option_loop']['rownum'] = $this->_sections['option_loop']['iteration'];
$this->_sections['option_loop']['index_prev'] = $this->_sections['option_loop']['index'] - $this->_sections['option_loop']['step'];
$this->_sections['option_loop']['index_next'] = $this->_sections['option_loop']['index'] + $this->_sections['option_loop']['step'];
$this->_sections['option_loop']['first']      = ($this->_sections['option_loop']['iteration'] == 1);
$this->_sections['option_loop']['last']       = ($this->_sections['option_loop']['iteration'] == $this->_sections['option_loop']['total']);
?>
          <option value='<?php echo $this->_tpl_vars['secondary']['field_options'][$this->_sections['option_loop']['index']]['value']; ?>
'><?php echo SELanguage::_get($this->_tpl_vars['secondary']['field_options'][$this->_sections['option_loop']['index']]['label']); ?></option>
        <?php endfor; endif; ?>
        </select>

            <?php elseif ($this->_tpl_vars['secondary']['field_type'] == 5): ?>
        <select class='text' name='subnet_field2_month' id='subnet_field2_month'>
        <option value=''><?php echo SELanguage::_get(579); ?></option>
        <?php unset($this->_sections['field2_month']);
$this->_sections['field2_month']['name'] = 'field2_month';
$this->_sections['field2_month']['start'] = (int)1;
$this->_sections['field2_month']['loop'] = is_array($_loop=13) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['field2_month']['show'] = true;
$this->_sections['field2_month']['max'] = $this->_sections['field2_month']['loop'];
$this->_sections['field2_month']['step'] = 1;
if ($this->_sections['field2_month']['start'] < 0)
    $this->_sections['field2_month']['start'] = max($this->_sections['field2_month']['step'] > 0 ? 0 : -1, $this->_sections['field2_month']['loop'] + $this->_sections['field2_month']['start']);
else
    $this->_sections['field2_month']['start'] = min($this->_sections['field2_month']['start'], $this->_sections['field2_month']['step'] > 0 ? $this->_sections['field2_month']['loop'] : $this->_sections['field2_month']['loop']-1);
if ($this->_sections['field2_month']['show']) {
    $this->_sections['field2_month']['total'] = min(ceil(($this->_sections['field2_month']['step'] > 0 ? $this->_sections['field2_month']['loop'] - $this->_sections['field2_month']['start'] : $this->_sections['field2_month']['start']+1)/abs($this->_sections['field2_month']['step'])), $this->_sections['field2_month']['max']);
    if ($this->_sections['field2_month']['total'] == 0)
        $this->_sections['field2_month']['show'] = false;
} else
    $this->_sections['field2_month']['total'] = 0;
if ($this->_sections['field2_month']['show']):

            for ($this->_sections['field2_month']['index'] = $this->_sections['field2_month']['start'], $this->_sections['field2_month']['iteration'] = 1;
                 $this->_sections['field2_month']['iteration'] <= $this->_sections['field2_month']['total'];
                 $this->_sections['field2_month']['index'] += $this->_sections['field2_month']['step'], $this->_sections['field2_month']['iteration']++):
$this->_sections['field2_month']['rownum'] = $this->_sections['field2_month']['iteration'];
$this->_sections['field2_month']['index_prev'] = $this->_sections['field2_month']['index'] - $this->_sections['field2_month']['step'];
$this->_sections['field2_month']['index_next'] = $this->_sections['field2_month']['index'] + $this->_sections['field2_month']['step'];
$this->_sections['field2_month']['first']      = ($this->_sections['field2_month']['iteration'] == 1);
$this->_sections['field2_month']['last']       = ($this->_sections['field2_month']['iteration'] == $this->_sections['field2_month']['total']);
?>
          <option value='<?php echo $this->_sections['field2_month']['index']; ?>
'><?php echo $this->_tpl_vars['datetime']->cdate('M',$this->_tpl_vars['datetime']->MakeTime(0,0,0,$this->_sections['field2_month']['index'],1,1990)); ?>
</option>
        <?php endfor; endif; ?>
        </select>
 
        <select class='text' name='subnet_field2_day' id='subnet_field2_day'>
        <option value=''><?php echo SELanguage::_get(580); ?></option>
        <?php unset($this->_sections['field2_day']);
$this->_sections['field2_day']['name'] = 'field2_day';
$this->_sections['field2_day']['start'] = (int)1;
$this->_sections['field2_day']['loop'] = is_array($_loop=32) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['field2_day']['show'] = true;
$this->_sections['field2_day']['max'] = $this->_sections['field2_day']['loop'];
$this->_sections['field2_day']['step'] = 1;
if ($this->_sections['field2_day']['start'] < 0)
    $this->_sections['field2_day']['start'] = max($this->_sections['field2_day']['step'] > 0 ? 0 : -1, $this->_sections['field2_day']['loop'] + $this->_sections['field2_day']['start']);
else
    $this->_sections['field2_day']['start'] = min($this->_sections['field2_day']['start'], $this->_sections['field2_day']['step'] > 0 ? $this->_sections['field2_day']['loop'] : $this->_sections['field2_day']['loop']-1);
if ($this->_sections['field2_day']['show']) {
    $this->_sections['field2_day']['total'] = min(ceil(($this->_sections['field2_day']['step'] > 0 ? $this->_sections['field2_day']['loop'] - $this->_sections['field2_day']['start'] : $this->_sections['field2_day']['start']+1)/abs($this->_sections['field2_day']['step'])), $this->_sections['field2_day']['max']);
    if ($this->_sections['field2_day']['total'] == 0)
        $this->_sections['field2_day']['show'] = false;
} else
    $this->_sections['field2_day']['total'] = 0;
if ($this->_sections['field2_day']['show']):

            for ($this->_sections['field2_day']['index'] = $this->_sections['field2_day']['start'], $this->_sections['field2_day']['iteration'] = 1;
                 $this->_sections['field2_day']['iteration'] <= $this->_sections['field2_day']['total'];
                 $this->_sections['field2_day']['index'] += $this->_sections['field2_day']['step'], $this->_sections['field2_day']['iteration']++):
$this->_sections['field2_day']['rownum'] = $this->_sections['field2_day']['iteration'];
$this->_sections['field2_day']['index_prev'] = $this->_sections['field2_day']['index'] - $this->_sections['field2_day']['step'];
$this->_sections['field2_day']['index_next'] = $this->_sections['field2_day']['index'] + $this->_sections['field2_day']['step'];
$this->_sections['field2_day']['first']      = ($this->_sections['field2_day']['iteration'] == 1);
$this->_sections['field2_day']['last']       = ($this->_sections['field2_day']['iteration'] == $this->_sections['field2_day']['total']);
?>
          <option value='<?php echo $this->_sections['field2_day']['index']; ?>
'><?php echo $this->_sections['field2_day']['index']; ?>
</option>
        <?php endfor; endif; ?>
        </select>

        <select class='text' name='subnet_field2_year' id='subnet_field2_year'>
        <option value=''><?php echo SELanguage::_get(581); ?></option>
        <?php unset($this->_sections['field2_year']);
$this->_sections['field2_year']['name'] = 'field2_year';
$this->_sections['field2_year']['loop'] = is_array($_loop=2009) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['field2_year']['max'] = (int)80;
$this->_sections['field2_year']['step'] = ((int)-1) == 0 ? 1 : (int)-1;
$this->_sections['field2_year']['show'] = true;
if ($this->_sections['field2_year']['max'] < 0)
    $this->_sections['field2_year']['max'] = $this->_sections['field2_year']['loop'];
$this->_sections['field2_year']['start'] = $this->_sections['field2_year']['step'] > 0 ? 0 : $this->_sections['field2_year']['loop']-1;
if ($this->_sections['field2_year']['show']) {
    $this->_sections['field2_year']['total'] = min(ceil(($this->_sections['field2_year']['step'] > 0 ? $this->_sections['field2_year']['loop'] - $this->_sections['field2_year']['start'] : $this->_sections['field2_year']['start']+1)/abs($this->_sections['field2_year']['step'])), $this->_sections['field2_year']['max']);
    if ($this->_sections['field2_year']['total'] == 0)
        $this->_sections['field2_year']['show'] = false;
} else
    $this->_sections['field2_year']['total'] = 0;
if ($this->_sections['field2_year']['show']):

            for ($this->_sections['field2_year']['index'] = $this->_sections['field2_year']['start'], $this->_sections['field2_year']['iteration'] = 1;
                 $this->_sections['field2_year']['iteration'] <= $this->_sections['field2_year']['total'];
                 $this->_sections['field2_year']['index'] += $this->_sections['field2_year']['step'], $this->_sections['field2_year']['iteration']++):
$this->_sections['field2_year']['rownum'] = $this->_sections['field2_year']['iteration'];
$this->_sections['field2_year']['index_prev'] = $this->_sections['field2_year']['index'] - $this->_sections['field2_year']['step'];
$this->_sections['field2_year']['index_next'] = $this->_sections['field2_year']['index'] + $this->_sections['field2_year']['step'];
$this->_sections['field2_year']['first']      = ($this->_sections['field2_year']['iteration'] == 1);
$this->_sections['field2_year']['last']       = ($this->_sections['field2_year']['iteration'] == $this->_sections['field2_year']['total']);
?>
          <option value='<?php echo $this->_sections['field2_year']['index']; ?>
'><?php echo $this->_sections['field2_year']['index']; ?>
</option>
        <?php endfor; endif; ?>
        </select>
      <?php endif; ?>
    </td>
    </tr>
    </table>
  <br>
  <?php endif; ?>

  <br>
  <input type='submit' class='button' id='createbutton' value='<?php echo SELanguage::_get(624); ?>'> <input type='button' class='button' value='<?php echo SELanguage::_get(39); ?>' onClick='parent.TB_remove();'>
  <input type='hidden' name='task' value='create' id='task'>
  <input type='hidden' name='subnet_id' id='subnet_id' value='0'>
  </form>
</div>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin_footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>