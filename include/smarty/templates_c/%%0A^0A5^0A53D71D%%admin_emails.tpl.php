<?php /* Smarty version 2.6.14, created on 2011-11-01 16:55:56
         compiled from admin_emails.tpl */
?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'replace', 'admin_emails.tpl', 58, false),)), $this);
?><?php
SELanguage::_preload_multi(20,513,191,514,515,516,517,520,521,578,173);
SELanguage::load();
?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin_header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<h2><?php echo SELanguage::_get(20); ?></h2>
<?php echo SELanguage::_get(513); ?>

<br><br>

<?php if ($this->_tpl_vars['result'] != 0): ?>
<div class='success'><img src='../images/success.gif' class='icon' border='0'> <?php echo SELanguage::_get(191); ?></div>
<?php endif; ?>

<table cellpadding='0' cellspacing='0' width='600'>
<tr><form action='admin_emails.php' method='POST'>
<td class='header'><?php echo SELanguage::_get(514); ?></td>
</tr>
<td class='setting1'>
<?php echo SELanguage::_get(515); ?>
</td>
</tr>
<tr>
<td class='setting2'>
  <table cellpadding='0' cellspacing='0'>
  <tr>
  <td width='80'><?php echo SELanguage::_get(516); ?></td>
  <td><input type='text' class='text' size='30' name='setting_email_fromname' value='<?php echo $this->_tpl_vars['setting']['setting_email_fromname']; ?>
' maxlength='70'></td>
  </tr>
  <tr>
  <td><?php echo SELanguage::_get(517); ?></td>
  <td><input type='text' class='text' size='30' name='setting_email_fromemail' value='<?php echo $this->_tpl_vars['setting']['setting_email_fromemail']; ?>
' maxlength='70'></td>
  </tr>
  </table>
</td>
</tr>
</table>

<br>

<?php unset($this->_sections['email_loop']);
$this->_sections['email_loop']['name'] = 'email_loop';
$this->_sections['email_loop']['loop'] = is_array($_loop=$this->_tpl_vars['emails']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['email_loop']['show'] = true;
$this->_sections['email_loop']['max'] = $this->_sections['email_loop']['loop'];
$this->_sections['email_loop']['step'] = 1;
$this->_sections['email_loop']['start'] = $this->_sections['email_loop']['step'] > 0 ? 0 : $this->_sections['email_loop']['loop']-1;
if ($this->_sections['email_loop']['show']) {
    $this->_sections['email_loop']['total'] = $this->_sections['email_loop']['loop'];
    if ($this->_sections['email_loop']['total'] == 0)
        $this->_sections['email_loop']['show'] = false;
} else
    $this->_sections['email_loop']['total'] = 0;
if ($this->_sections['email_loop']['show']):

            for ($this->_sections['email_loop']['index'] = $this->_sections['email_loop']['start'], $this->_sections['email_loop']['iteration'] = 1;
                 $this->_sections['email_loop']['iteration'] <= $this->_sections['email_loop']['total'];
                 $this->_sections['email_loop']['index'] += $this->_sections['email_loop']['step'], $this->_sections['email_loop']['iteration']++):
$this->_sections['email_loop']['rownum'] = $this->_sections['email_loop']['iteration'];
$this->_sections['email_loop']['index_prev'] = $this->_sections['email_loop']['index'] - $this->_sections['email_loop']['step'];
$this->_sections['email_loop']['index_next'] = $this->_sections['email_loop']['index'] + $this->_sections['email_loop']['step'];
$this->_sections['email_loop']['first']      = ($this->_sections['email_loop']['iteration'] == 1);
$this->_sections['email_loop']['last']       = ($this->_sections['email_loop']['iteration'] == $this->_sections['email_loop']['total']);
?>
  <table cellpadding='0' cellspacing='0' width='600'>
  <tr>
  <td class='header'><?php echo SELanguage::_get($this->_tpl_vars['emails'][$this->_sections['email_loop']['index']]['systememail_title']); ?></td>
  </tr>
  <td class='setting1'>
  <?php echo SELanguage::_get($this->_tpl_vars['emails'][$this->_sections['email_loop']['index']]['systememail_desc']); ?>
  </td>
  </tr>
  <tr>
  <td class='setting2'>
    <table cellpadding='0' cellspacing='0'>
    <tr>
    <td width='80'><?php echo SELanguage::_get(520); ?></td>
    <td><input type='text' class='text' size='30' name='subject[<?php echo $this->_tpl_vars['emails'][$this->_sections['email_loop']['index']]['systememail_id']; ?>
]' value='<?php echo sprintf(SELanguage::_get($this->_tpl_vars['emails'][$this->_sections['email_loop']['index']]['systememail_subject']), $this->_tpl_vars['emails'][$this->_sections['email_loop']['index']]['systememail_vars_array'][0], $this->_tpl_vars['emails'][$this->_sections['email_loop']['index']]['systememail_vars_array'][1], $this->_tpl_vars['emails'][$this->_sections['email_loop']['index']]['systememail_vars_array'][2], $this->_tpl_vars['emails'][$this->_sections['email_loop']['index']]['systememail_vars_array'][3], $this->_tpl_vars['emails'][$this->_sections['email_loop']['index']]['systememail_vars_array'][4]); ?>' maxlength='200'></td>
    </tr><tr>
    <td valign='top'><?php echo SELanguage::_get(521); ?></td>
    <?php ob_start(); 
 echo sprintf(SELanguage::_get($this->_tpl_vars['emails'][$this->_sections['email_loop']['index']]['systememail_body']), $this->_tpl_vars['emails'][$this->_sections['email_loop']['index']]['systememail_vars_array'][0], $this->_tpl_vars['emails'][$this->_sections['email_loop']['index']]['systememail_vars_array'][1], $this->_tpl_vars['emails'][$this->_sections['email_loop']['index']]['systememail_vars_array'][2], $this->_tpl_vars['emails'][$this->_sections['email_loop']['index']]['systememail_vars_array'][3], $this->_tpl_vars['emails'][$this->_sections['email_loop']['index']]['systememail_vars_array'][4]); 
 $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('body', ob_get_contents());ob_end_clean(); ?>
    <td><textarea rows='6' cols='80' class='text' name='message[<?php echo $this->_tpl_vars['emails'][$this->_sections['email_loop']['index']]['systememail_id']; ?>
]'><?php echo ((is_array($_tmp=$this->_tpl_vars['body'])) ? $this->_run_mod_handler('replace', true, $_tmp, "<br>", "\r\n") : smarty_modifier_replace($_tmp, "<br>", "\r\n")); ?>
</textarea><br><?php echo SELanguage::_get(578); ?> <?php echo $this->_tpl_vars['emails'][$this->_sections['email_loop']['index']]['systememail_vars']; ?>
</td>
    </tr>
    </table>
  </td>
  </tr>
  </table>

  <br>
<?php endfor; endif; ?>


<input type='submit' class='button' value='<?php echo SELanguage::_get(173); ?>'>
<input type='hidden' name='task' value='dosave'>
</form>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin_footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>