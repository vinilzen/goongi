<?php /* Smarty version 2.6.14, created on 2011-12-23 20:36:24
         compiled from user_event_edit_settings.tpl */
?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'user_event_edit_settings.tpl', 93, false),)), $this);
?><?php
SELanguage::_preload_multi(3000157,3000086,3000001,3000137,3000138,3000156,191,3000117,3000118,3000119,3000120,3000121,3000122,3000123,3000124,3000267,3000268,3000265,3000266,3000125,3000126,3000127,3000128,3000129,3000130,3000131,3000132,173,39);
SELanguage::load();
?>﻿<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<h1><?php echo SELanguage::_get(3000157); ?></h1>
<div class="crumb">
	<a href="/">Главная</a>
	<a href='user_event.php'><?php echo SELanguage::_get(3000086); ?></a>
	<a href='event/<?php echo $this->_tpl_vars['event']->event_info['event_id']; ?>
/'><?php echo $this->_tpl_vars['event']->event_info['event_title']; ?>
</a>
	<span><?php echo SELanguage::_get(3000001); ?></span>
</div>
<ul class="vk">
	<li><a href='user_event_edit.php?event_id=<?php echo $this->_tpl_vars['event']->event_info['event_id']; ?>
'><?php echo SELanguage::_get(3000137); ?></a></li>
	<li><a href='user_event_edit_members.php?event_id=<?php echo $this->_tpl_vars['event']->event_info['event_id']; ?>
'><?php echo SELanguage::_get(3000138); ?></a></li>
	<li class="active"><a href='user_event_edit_settings.php?event_id=<?php echo $this->_tpl_vars['event']->event_info['event_id']; ?>
'><?php echo SELanguage::_get(3000001); ?></a></li>
</ul>
<!--
      <div class='page_header'><?php echo sprintf(SELanguage::_get(3000156), "event.php?event_id=".($this->_tpl_vars['event']->event_info['event_id']), $this->_tpl_vars['event']->event_info['event_title']); ?></div>
      <div style="width: 500px;"><?php echo SELanguage::_get(3000157); ?></div>
-->


<?php if ($this->_tpl_vars['result']): ?>
    SUCCESS -  <?php echo SELanguage::_get(191); 
 endif; ?>


<div class="form">
<form action='user_event_edit_settings.php?event_id=<?php echo $this->_tpl_vars['event']->event_info['event_id']; ?>
' method='POST'>




<?php if ($this->_tpl_vars['user']->level_info['level_event_inviteonly']): ?>
<div><b><?php echo SELanguage::_get(3000117); ?></b></div>
<div class="form_desc"><?php echo SELanguage::_get(3000118); ?></div>
<table cellpadding='0' cellspacing='0'>
  <tr>
    <td><input type='radio' name='event_inviteonly' id='event_inviteonly_0' value='0'<?php if (! $this->_tpl_vars['event']->event_info['event_inviteonly']): ?> checked<?php endif; ?> /></td>
    <td><label for='event_inviteonly_0'><?php echo SELanguage::_get(3000119); ?></label></td>
  </tr>
  <tr>
    <td><input type='radio' name='event_inviteonly' id='event_inviteonly_1' value='1'<?php if ($this->_tpl_vars['event']->event_info['event_inviteonly']): ?> checked<?php endif; ?> /></td>
    <td><label for='event_inviteonly_1'><?php echo SELanguage::_get(3000120); ?></label></td>
  </tr>
</table>
<br />
<br />
<?php endif; 
 if ($this->_tpl_vars['user']->level_info['level_event_search']): ?>
<div><b><?php echo SELanguage::_get(3000121); ?></b></div>
<div class="form_desc"><?php echo SELanguage::_get(3000122); ?></div>
<table cellpadding='0' cellspacing='0'>
  <tr>
    <td><input type='radio' name='event_search' id='event_search_1' value='1'<?php if ($this->_tpl_vars['event']->event_info['event_search']): ?> checked<?php endif; ?> /></td>
    <td><label for='event_search_1'><?php echo SELanguage::_get(3000123); ?></label></td>
  </tr>
  <tr>
    <td><input type='radio' name='event_search' id='event_search_0' value='0'<?php if (! $this->_tpl_vars['event']->event_info['event_search']): ?> checked<?php endif; ?> /></td>
    <td><label for='event_search_0'><?php echo SELanguage::_get(3000124); ?></label></td>
  </tr>
</table>
<br />
<br />
<?php endif; ?>


<div><b><?php echo SELanguage::_get(3000267); ?></b></div>
<div class="form_desc"><?php echo SELanguage::_get(3000268); ?></div>
<table cellpadding='0' cellspacing='0'>
  <tr>
    <td><input type='radio' name='event_invite' id='event_invite_1' value='1'<?php if ($this->_tpl_vars['event']->event_info['event_invite']): ?> checked<?php endif; ?> /></td>
    <td><label for='event_invite_1'><?php echo SELanguage::_get(3000265); ?></label></td>
  </tr>
  <tr>
    <td><input type='radio' name='event_invite' id='event_invite_0' value='0'<?php if (! $this->_tpl_vars['event']->event_info['event_invite']): ?> checked<?php endif; ?> /></td>
    <td><label for='event_invite_0'><?php echo SELanguage::_get(3000266); ?></label></td>
  </tr>
</table>
<br />
<br />


<?php if (count($this->_tpl_vars['privacy_options']) > 1): ?>
<div><b><?php echo SELanguage::_get(3000125); ?></b></div>
<div class="form_desc"><?php echo SELanguage::_get(3000126); ?></div>
<table cellpadding='0' cellspacing='0'>
<?php $_from = $this->_tpl_vars['privacy_options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['privacy_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['privacy_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
        $this->_foreach['privacy_loop']['iteration']++;
?>
  <tr>
    <td><input type='radio' name='event_privacy' id='privacy_<?php echo $this->_tpl_vars['k']; ?>
' value='<?php echo $this->_tpl_vars['k']; ?>
'<?php if ($this->_tpl_vars['event']->event_info['event_privacy'] == $this->_tpl_vars['k']): ?> checked<?php endif; ?> /></td>
    <td><label for='privacy_<?php echo $this->_tpl_vars['k']; ?>
'><?php echo SELanguage::_get($this->_tpl_vars['v']); ?></label></td>
  </tr>
<?php endforeach; endif; unset($_from); ?>
</table>
<br />
<br />
<?php endif; 
 if (count($this->_tpl_vars['comment_options']) > 1): ?>
<div><b><?php echo SELanguage::_get(3000127); ?></b></div>
<div class="form_desc"><?php echo SELanguage::_get(3000128); ?></div>
<table cellpadding='0' cellspacing='0'>
<?php $_from = $this->_tpl_vars['comment_options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['comment_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['comment_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
        $this->_foreach['comment_loop']['iteration']++;
?>
  <tr>
    <td><input type='radio' name='event_comments' id='comment_<?php echo $this->_tpl_vars['k']; ?>
' value='<?php echo $this->_tpl_vars['k']; ?>
'<?php if ($this->_tpl_vars['event']->event_info['event_comments'] == $this->_tpl_vars['k']): ?> checked<?php endif; ?> /></td>
    <td><label for='comment_<?php echo $this->_tpl_vars['k']; ?>
'><?php echo SELanguage::_get($this->_tpl_vars['v']); ?></label></td>
  </tr>
<?php endforeach; endif; unset($_from); ?>
</table>
<br />
<br />
<?php endif; 
 if (count($this->_tpl_vars['upload_options']) > 1): ?>
<div><b><?php echo SELanguage::_get(3000129); ?></b></div>
<div class="form_desc"><?php echo SELanguage::_get(3000130); ?></div>
<table cellpadding='0' cellspacing='0'>
<?php $_from = $this->_tpl_vars['upload_options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['upload_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['upload_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
        $this->_foreach['upload_loop']['iteration']++;
?>
  <tr>
    <td><input type='radio' name='event_upload' id='event_upload_<?php echo $this->_tpl_vars['k']; ?>
' value='<?php echo $this->_tpl_vars['k']; ?>
'<?php if ($this->_tpl_vars['event']->event_info['event_upload'] == $this->_tpl_vars['k']): ?> checked<?php endif; ?> /></td>
    <td><label for='event_upload_<?php echo $this->_tpl_vars['k']; ?>
'><?php echo SELanguage::_get($this->_tpl_vars['v']); ?></label></td>
  </tr>
<?php endforeach; endif; unset($_from); ?>
</table>
<br />
<br />
<?php endif; 
 if (count($this->_tpl_vars['tag_options']) > 1): ?>
<div><b><?php echo SELanguage::_get(3000131); ?></b></div>
<div class="form_desc"><?php echo SELanguage::_get(3000132); ?></div>
<table cellpadding='0' cellspacing='0'>
<?php $_from = $this->_tpl_vars['tag_options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['tag_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['tag_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
        $this->_foreach['tag_loop']['iteration']++;
?>
  <tr>
    <td><input type='radio' name='event_tag' id='event_tag_<?php echo $this->_tpl_vars['k']; ?>
' value='<?php echo $this->_tpl_vars['k']; ?>
'<?php if ($this->_tpl_vars['event']->event_info['event_tag'] == $this->_tpl_vars['k']): ?> checked<?php endif; ?> /></td>
    <td><label for='event_tag_<?php echo $this->_tpl_vars['k']; ?>
'><?php echo SELanguage::_get($this->_tpl_vars['v']); ?></label></td>
  </tr>
<?php endforeach; endif; unset($_from); ?>
</table>
<br />
<br />
<?php endif; 
 $this->assign('langBlockTemp', SE_Language::_get(173));


  ?>
	<div class="button"><span class="button2"><span class="l">&nbsp;</span><span class="c">
		<input type='submit' class='button' value='<?php echo $this->_tpl_vars['langBlockTemp']; ?>
' /><input type='hidden' name='task' value='dosave' />
	</span><span class="r">&nbsp;</span></span></div>
<?php 

  ?>
      
      </form>
<br />
      <form action='user_event_edit_settings.php?event_id=<?php echo $this->_tpl_vars['event']->event_info['event_id']; ?>
' method='GET'>
      <?php $this->assign('langBlockTemp', SE_Language::_get(39));


  ?><div class="button"><span class="button2"><span class="l">&nbsp;</span><span class="c"><input type='submit' class='button' value='<?php echo $this->_tpl_vars['langBlockTemp']; ?>
' /></span><span class="r">&nbsp;</span></span></div><?php 

  ?>
      </form>
</div>
<br />


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>