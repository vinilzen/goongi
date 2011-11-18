<?php /* Smarty version 2.6.14, created on 2011-11-18 14:50:43
         compiled from user_account_pass.tpl */
?><?php
SELanguage::_preload_multi(655,1055,756,757,758,191,269,46,47,173);
SELanguage::load();
?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<table class='tabs' cellpadding='0' cellspacing='0'>
<tr>
<td class='tab0'>&nbsp;</td>
<td class='tab2' NOWRAP><a href='user_account.php'><?php echo SELanguage::_get(655); ?></a></td>
<td class='tab'>&nbsp;</td>
<td class='tab2' NOWRAP><a href='user_account_privacy.php'><?php echo SELanguage::_get(1055); ?></a></td>
<td class='tab'>&nbsp;</td>
<td class='tab1' NOWRAP><a href='user_account_pass.php'><?php echo SELanguage::_get(756); ?></a></td>
<?php if ($this->_tpl_vars['user']->level_info['level_profile_delete'] != 0): ?><td class='tab'>&nbsp;</td><td class='tab2' NOWRAP><a href='user_account_delete.php'><?php echo SELanguage::_get(757); ?></a></td><?php endif; ?>
<td class='tab3'>&nbsp;</td>
</tr>
</table>

<img src='./images/icons/privacy48.gif' border='0' class='icon_big'>
<div class='page_header'><?php echo SELanguage::_get(756); ?></div>
<div><?php echo SELanguage::_get(758); ?></div>
<br />

<?php if ($this->_tpl_vars['result'] != 0): ?>
  <div class='success'><img src='./images/success.gif' border='0' class='icon'> <?php echo SELanguage::_get(191); ?></div><br>
<?php elseif ($this->_tpl_vars['is_error'] != 0): ?>
  <div class='error'><img src='./images/error.gif' border='0' class='icon'> <?php echo SELanguage::_get($this->_tpl_vars['is_error']); ?></div><br>
<?php endif; ?>

<form action='user_account_pass.php' method='POST'>
<table cellpadding='0' cellspacing='0'>
<tr>
<td class='form1'><?php echo SELanguage::_get(269); ?></td>
<td class='form2'><input type='password' name='password_old' class='text' size='30' maxlength='50'></td>
</tr>
<tr>
<td class='form1'><?php echo SELanguage::_get(46); ?></td>
<td class='form2'><input type='password' name='password_new' class='text' size='30' maxlength='50'></td>
</tr>
<tr>
<td class='form1'><?php echo SELanguage::_get(47); ?></td>
<td class='form2'><input type='password' name='password_new2' class='text' size='30' maxlength='50'></td>
</tr>
<tr>
<td class='form1'>&nbsp;</td>
<td class='form2'><input type='submit' class='button' value='<?php echo SELanguage::_get(173); ?>'></td>
</tr>
</table>
<input type='hidden' name='task' value='dosave'>
</form>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>