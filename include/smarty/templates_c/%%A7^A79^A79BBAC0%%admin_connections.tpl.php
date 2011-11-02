<?php /* Smarty version 2.6.14, created on 2011-11-01 16:54:40
         compiled from admin_connections.tpl */
?><?php
SELanguage::_preload_multi(18,227,191,228,229,230,231,232,233,234,235,236,237,238,239,240,241,242,243,244,245,246,247,248,249,250,251,252,253,254,255,256,173);
SELanguage::load();
?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin_header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<h2><?php echo SELanguage::_get(18); ?></h2>
<?php echo SELanguage::_get(227); ?>

<br><br>

<?php if ($this->_tpl_vars['result'] != 0): ?>
<div class='success'><img src='../images/success.gif' class='icon' border='0'> <?php echo SELanguage::_get(191); ?></div>
<?php endif; 
 echo '
<script type="text/javascript">
<!-- Begin
function addInput(fieldname) {
  var newdiv = document.createElement(\'div\');
  newdiv.innerHTML = "<input type=\'text\' name=\'setting_connection_types[]\' class=\'text\' size=\'30\' maxlength=\'50\'>&nbsp;<br>";
  $(fieldname).appendChild(newdiv);
}
// End -->
</script>
'; ?>



<form action='admin_connections.php' method='POST' name='info'>
<table cellpadding='0' cellspacing='0' width='600'>
<tr><td class='header'><?php echo SELanguage::_get(228); ?></td></tr>
<tr><td class='setting1'>
<?php echo SELanguage::_get(229); ?>
</td></tr><tr><td class='setting2'>
  <table cellpadding='0' cellspacing='0'><tr>
  <td style='vertical-align: top;'><input type='radio' name='setting_connection_allow' id='invitation_0' value='0'<?php if ($this->_tpl_vars['setting']['setting_connection_allow'] == 0): ?> CHECKED<?php endif; ?>>&nbsp;</td>
  <td><label for='invitation_0'><b><?php echo SELanguage::_get(230); ?></b><br><?php echo SELanguage::_get(231); ?></label>
  </td></tr></table>
</td></tr>
<tr><td class='setting2'>
  <table cellpadding='0' cellspacing='0'><tr>
  <td style='vertical-align: top;'><input type='radio' name='setting_connection_allow' id='invitation_3' value='3'<?php if ($this->_tpl_vars['setting']['setting_connection_allow'] == 3): ?> CHECKED<?php endif; ?>>&nbsp;</td>
  <td><label for='invitation_3'><b><?php echo SELanguage::_get(232); ?></b><br><?php echo SELanguage::_get(233); ?></label>
  </td></tr></table>
</td></tr>
<tr><td class='setting2'>
  <table cellpadding='0' cellspacing='0'><tr>
  <td style='vertical-align: top;'><input type='radio' name='setting_connection_allow' id='invitation_2' value='2'<?php if ($this->_tpl_vars['setting']['setting_connection_allow'] == 2): ?> CHECKED<?php endif; ?>>&nbsp;</td>
  <td><label for='invitation_2'><b><?php echo SELanguage::_get(234); ?></b><br><?php echo SELanguage::_get(235); ?></label>
  </td></tr></table>
</td></tr>
<tr><td class='setting2'>
  <table cellpadding='0' cellspacing='0'><tr>
  <td style='vertical-align: top;'><input type='radio' name='setting_connection_allow' id='invitation_1' value='1'<?php if ($this->_tpl_vars['setting']['setting_connection_allow'] == 1): ?> CHECKED<?php endif; ?>>&nbsp;</td>
  <td><label for='invitation_1'><b><?php echo SELanguage::_get(236); ?></b><br><?php echo SELanguage::_get(237); ?></label>
  </td></tr></table>
</td></tr>
</table>
<br>

<table cellpadding='0' cellspacing='0' width='600'>
<tr><td class='header'><?php echo SELanguage::_get(238); ?></td></tr>
<tr><td class='setting1'>
<?php echo SELanguage::_get(239); ?>
</td></tr><tr><td class='setting2'>
  <table cellpadding='0' cellspacing='0'><tr>
  <td style='vertical-align: top;'><input type='radio' name='setting_connection_framework' id='framework_0' value='0'<?php if ($this->_tpl_vars['setting']['setting_connection_framework'] == 0): ?> CHECKED<?php endif; ?>>&nbsp;</td>
  <td><label for='framework_0'><b><?php echo SELanguage::_get(240); ?></b><br><?php echo SELanguage::_get(241); ?></label>
  </td></tr></table>
</td></tr><tr><td class='setting2'>
  <table cellpadding='0' cellspacing='0'><tr>
  <td style='vertical-align: top;'><input type='radio' name='setting_connection_framework' id='framework_1' value='1'<?php if ($this->_tpl_vars['setting']['setting_connection_framework'] == 1): ?> CHECKED<?php endif; ?>>&nbsp;</td>
  <td><label for='framework_1'><b><?php echo SELanguage::_get(242); ?></b><br><?php echo SELanguage::_get(243); ?></label>
  </td></tr></table>
</td></tr><tr><td class='setting2'>
  <table cellpadding='0' cellspacing='0'><tr>
  <td style='vertical-align: top;'><input type='radio' name='setting_connection_framework' id='framework_2' value='2'<?php if ($this->_tpl_vars['setting']['setting_connection_framework'] == 2): ?> CHECKED<?php endif; ?>>&nbsp;</td>
  <td><label for='framework_2'><b><?php echo SELanguage::_get(244); ?></b><br><?php echo SELanguage::_get(245); ?></label>
  </td></tr></table>
</td></tr><tr><td class='setting2'>
  <table cellpadding='0' cellspacing='0'><tr>
  <td style='vertical-align: top;'><input type='radio' name='setting_connection_framework' id='framework_3' value='3'<?php if ($this->_tpl_vars['setting']['setting_connection_framework'] == 3): ?> CHECKED<?php endif; ?>>&nbsp;</td>
  <td><label for='framework_3'><b><?php echo SELanguage::_get(246); ?></b><br><?php echo SELanguage::_get(247); ?></label>
  </td></tr></table>
</td></tr></table>
<br>

<table cellpadding='0' cellspacing='0' width='600'>
<tr><td class='header'><?php echo SELanguage::_get(248); ?></td></tr>
<tr><td class='setting1'>
<?php echo SELanguage::_get(249); ?>
</td></tr><tr><td class='setting2'>
  <table cellpadding='0' cellspacing='0'>
  <tr><td><?php echo SELanguage::_get(248); ?></td></tr>
  <tr><td id='newtype'>
<?php unset($this->_sections['type_loop']);
$this->_sections['type_loop']['name'] = 'type_loop';
$this->_sections['type_loop']['loop'] = is_array($_loop=$this->_tpl_vars['types']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['type_loop']['show'] = true;
$this->_sections['type_loop']['max'] = $this->_sections['type_loop']['loop'];
$this->_sections['type_loop']['step'] = 1;
$this->_sections['type_loop']['start'] = $this->_sections['type_loop']['step'] > 0 ? 0 : $this->_sections['type_loop']['loop']-1;
if ($this->_sections['type_loop']['show']) {
    $this->_sections['type_loop']['total'] = $this->_sections['type_loop']['loop'];
    if ($this->_sections['type_loop']['total'] == 0)
        $this->_sections['type_loop']['show'] = false;
} else
    $this->_sections['type_loop']['total'] = 0;
if ($this->_sections['type_loop']['show']):

            for ($this->_sections['type_loop']['index'] = $this->_sections['type_loop']['start'], $this->_sections['type_loop']['iteration'] = 1;
                 $this->_sections['type_loop']['iteration'] <= $this->_sections['type_loop']['total'];
                 $this->_sections['type_loop']['index'] += $this->_sections['type_loop']['step'], $this->_sections['type_loop']['iteration']++):
$this->_sections['type_loop']['rownum'] = $this->_sections['type_loop']['iteration'];
$this->_sections['type_loop']['index_prev'] = $this->_sections['type_loop']['index'] - $this->_sections['type_loop']['step'];
$this->_sections['type_loop']['index_next'] = $this->_sections['type_loop']['index'] + $this->_sections['type_loop']['step'];
$this->_sections['type_loop']['first']      = ($this->_sections['type_loop']['iteration'] == 1);
$this->_sections['type_loop']['last']       = ($this->_sections['type_loop']['iteration'] == $this->_sections['type_loop']['total']);
?>
<input type='text' class='text' name='setting_connection_types[]' value='<?php echo $this->_tpl_vars['types'][$this->_sections['type_loop']['index']]; ?>
' size='30' maxlength='50'>&nbsp;<br>
<?php endfor; endif; ?>
  </td></tr>
  <tr><td><a href="javascript:addInput('newtype')"><?php echo SELanguage::_get(250); ?></a></td></tr>
  </table>
</td></tr><tr><td class='setting2'>
  <table cellpadding='0' cellspacing='0'>
  <tr><td>&nbsp;</td><td><b><?php echo SELanguage::_get(251); ?></b></td></tr>
  <tr>
  <td style='vertical-align: top;'><input type='radio' name='setting_connection_other' id='other_1' value='1'<?php if ($this->_tpl_vars['setting']['setting_connection_other'] == 1): ?> CHECKED<?php endif; ?>>&nbsp;</td>
  <td><label for='other_1'><?php echo SELanguage::_get(252); ?></label></td>
  </tr><tr>
  <td style='vertical-align: top;'><input type='radio' name='setting_connection_other' id='other_0' value='0'<?php if ($this->_tpl_vars['setting']['setting_connection_other'] == 0): ?> CHECKED<?php endif; ?>>&nbsp;</td>
  <td><label for='other_0'><?php echo SELanguage::_get(253); ?></label></td>
  </tr></table>
</td></tr><tr><td class='setting2'>
  <table cellpadding='0' cellspacing='0'>
  <tr><td>&nbsp;</td><td><b><?php echo SELanguage::_get(254); ?></b></td></tr>
  <tr>
  <td style='vertical-align: top;'><input type='radio' name='setting_connection_explain' id='explain_1' value='1'<?php if ($this->_tpl_vars['setting']['setting_connection_explain'] == 1): ?> CHECKED<?php endif; ?>>&nbsp;</td>
  <td><label for='explain_1'><?php echo SELanguage::_get(255); ?></label></td>
  </tr><tr>
  <td style='vertical-align: top;'><input type='radio' name='setting_connection_explain' id='explain_0' value='0'<?php if ($this->_tpl_vars['setting']['setting_connection_explain'] == 0): ?> CHECKED<?php endif; ?>>&nbsp;</td>
  <td><label for='explain_0'><?php echo SELanguage::_get(256); ?></label></td>
  </tr></table>
</td></tr></table>
<br>


<input type='submit' class='button' value='<?php echo SELanguage::_get(173); ?>'>
<input type='hidden' name='task' value='dosave'>
</form>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin_footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>