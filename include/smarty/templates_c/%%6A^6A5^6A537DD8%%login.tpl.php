<?php /* Smarty version 2.6.14, created on 2011-12-22 09:07:01
         compiled from login.tpl */
?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'login.tpl', 26, false),)), $this);
?><?php
SELanguage::_preload_multi(658,673,674,89,675,29,975,691,660,30,6000143);
SELanguage::load();
?>﻿<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div class="form auth">
	<h1><?php echo SELanguage::_get(658); ?><!-- авторизация --></h1>

<?php echo SELanguage::_get(673); 
 if ($this->_tpl_vars['setting']['setting_signup_verify'] == 1): 
 echo SELanguage::_get(674); 
 endif; 
 if ($this->_tpl_vars['is_error'] != 0): ?><div class="error"> <img src='./images/error.gif' border='0' class='icon'><?php echo SELanguage::_get($this->_tpl_vars['is_error']); ?> </div><?php endif; ?>
<form action='login.php' method='POST' name='login'>
	<div class="input"><label><?php echo SELanguage::_get(89); ?></label><input type='text' class='text' name='email' id='email' value='<?php echo $this->_tpl_vars['email']; ?>
' size='30' maxlength='70' /></div>
	<div class="input"><label><a href="lostpass.php"><?php echo SELanguage::_get(675); ?><!-- Забыли пароль?--></a><?php echo SELanguage::_get(29); ?></label><input type='password' class='text' name='password' id='password' size='30' maxlength='50' /></div>

<?php if (! empty ( $this->_tpl_vars['setting']['setting_login_code'] ) || ( ! empty ( $this->_tpl_vars['setting']['setting_login_code_failedcount'] ) && $this->_tpl_vars['failed_login_count'] >= $this->_tpl_vars['setting']['setting_login_code_failedcount'] )): ?>
  <table cellpadding='0' cellspacing='0'>
	<tr>
	  <td><input type='text' name='login_secure' class='text' size='6' maxlength='10' />&nbsp;</td>
	  <td>
		<table cellpadding='0' cellspacing='0'>
		  <tr>
			<td align='center'>
			  <img src='./images/secure.php' id='secure_image' border='0' height='20' width='67' class='signup_code' /><br />
			  <a href="javascript:void(0);" onClick="$('secure_image').src = './images/secure.php?' + (new Date()).getTime();"><?php echo SELanguage::_get(975); ?></a>
			</td>
			<td><?php ob_start(); 
 echo SELanguage::_get(691); 
 $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('tip', ob_get_contents());ob_end_clean(); ?><img src='./images/icons/tip.gif' border='0' class='Tips1' title='<?php echo ((is_array($_tmp=$this->_tpl_vars['tip'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'quotes') : smarty_modifier_escape($_tmp, 'quotes')); ?>
'></td>
		  </tr>
		</table>
	  </td>
	</tr>
  </table>
<?php endif; ?>
	<div class="check"><label><input type='checkbox' class='checkbox' name='hidden_pass' id='persistent' value='1' /><span>Скрыть пароль</span></label></div>
	<div class="check rem"><label><input type='checkbox' class='checkbox' name='persistent' id='persistent' value='1' /><span><?php echo SELanguage::_get(660); ?></span></label></div>
	<span class="button1"><span class="l">&nbsp;</span><span class="c"><input type='submit' class='button' value='<?php echo SELanguage::_get(30); ?>' /></span><span class="r">&nbsp;</span></span>     
	<a href='/signup.php' class="reg"><?php echo SELanguage::_get(6000143); ?></a>
	<noscript><input type='hidden' name='javascript_disabled' value='1' /></noscript>
	<input type='hidden' name='task' value='dologin' />
	<input type='hidden' name='return_url' value='<?php echo $this->_tpl_vars['return_url']; ?>
' />
</form>

<?php echo '
<script language="JavaScript">
<!--
window.addEvent(\'domready\', function() {
	if($(\'email\').value == "") {
	  $(\'email\').focus();
	} else {
	  $(\'password\').focus();
	}
});
// -->
</script>
'; 
 $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer_without_left_menu.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>