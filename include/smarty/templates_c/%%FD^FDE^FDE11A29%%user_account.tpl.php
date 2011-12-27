<?php /* Smarty version 2.6.14, created on 2011-12-27 17:36:39
         compiled from user_account.tpl */
?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'replace', 'user_account.tpl', 53, false),array('modifier', 'count', 'user_account.tpl', 59, false),)), $this);
?><?php
SELanguage::_preload_multi(655,1055,756,757,755,808,616,818,766,28,809,810,709,1014,206,959,960,173);
SELanguage::load();
?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<table class='tabs' cellpadding='0' cellspacing='0'>
<tr>
<td class='tab0'>&nbsp;</td>
<td class='tab1' NOWRAP><a href='user_account.php'><?php echo SELanguage::_get(655); ?></a></td>
<td class='tab'>&nbsp;</td>
<td class='tab2' NOWRAP><a href='user_account_privacy.php'><?php echo SELanguage::_get(1055); ?></a></td>
<td class='tab'>&nbsp;</td>
<td class='tab2' NOWRAP><a href='user_account_pass.php'><?php echo SELanguage::_get(756); ?></a></td>
<?php if ($this->_tpl_vars['user']->level_info['level_profile_delete'] != 0): ?><td class='tab'>&nbsp;</td><td class='tab2' NOWRAP><a href='user_account_delete.php'><?php echo SELanguage::_get(757); ?></a></td><?php endif; ?>
<td class='tab3'>&nbsp;</td>
</tr>
</table>

<img src='./images/icons/settings48.gif' border='0' class='icon_big'>
<div class='page_header'><?php echo SELanguage::_get(755); ?></div>
<div><?php echo SELanguage::_get(808); ?></div>
<br />
<br />

<?php if ($this->_tpl_vars['result'] != 0): ?>
  <table cellpadding='0' cellspacing='0'><tr><td class='success'>
  <?php ob_start(); 
 echo SELanguage::_get($this->_tpl_vars['old_subnet_name']); 
 $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('old_subnet_name', ob_get_contents());ob_end_clean(); ?>
  <?php ob_start(); 
 echo SELanguage::_get($this->_tpl_vars['new_subnet_name']); 
 $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('new_subnet_name', ob_get_contents());ob_end_clean(); ?>
  <img src='./images/success.gif' border='0' class='icon'><?php echo sprintf(SELanguage::_get($this->_tpl_vars['result']), $this->_tpl_vars['old_subnet_name'], $this->_tpl_vars['new_subnet_name']); ?>
  </td></tr></table>
<?php elseif ($this->_tpl_vars['is_error'] != 0): ?>
  <table cellpadding='0' cellspacing='0'>
  <tr><td class='error'><img src='./images/error.gif' border='0' class='icon'><?php echo SELanguage::_get($this->_tpl_vars['is_error']); ?></td></tr>
  </table>
<?php endif; ?>

<form action='user_account.php' method='post' name='info'>
<table cellpadding='0' cellspacing='0'>
<tr>
<td class='form1'><?php echo SELanguage::_get(616); ?>:</td>
<td class='form2'>
  <input name='user_email' type='text' class='text' size='40' maxlength='70' value='<?php echo $this->_tpl_vars['user']->user_info['user_email']; ?>
'>
  <?php if ($this->_tpl_vars['user']->user_info['user_email'] != $this->_tpl_vars['user']->user_info['user_newemail'] && $this->_tpl_vars['user']->user_info['user_newemail'] != "" && $this->_tpl_vars['setting']['setting_signup_verify'] != 0): ?><div class='form_desc'><?php echo sprintf(SELanguage::_get(818), $this->_tpl_vars['user']->user_info['user_newemail']); ?></div><?php endif; ?>
  <?php if ($this->_tpl_vars['setting']['setting_subnet_field1_id'] == 0 || $this->_tpl_vars['setting']['setting_subnet_field2_id'] == 0): 
 ob_start(); 
 echo SELanguage::_get($this->_tpl_vars['user']->subnet_info['subnet_name']); 
 $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('current_subnet', ob_get_contents());ob_end_clean(); ?><div class='form_desc'><?php echo sprintf(SELanguage::_get(766), $this->_tpl_vars['current_subnet']); ?></div><?php endif; ?>
</td>
</tr>

<?php if ($this->_tpl_vars['user']->level_info['level_profile_change'] != 0 && $this->_tpl_vars['setting']['setting_username']): ?>
  <tr>
  <td class='form1'><?php echo SELanguage::_get(28); ?>:</td>
  <td class='form2'>
    <input name='user_username' type='text' class='text' size='40' maxlength='50' value='<?php echo $this->_tpl_vars['user']->user_info['user_username']; ?>
'>
    <?php ob_start(); 
 echo SELanguage::_get(809); 
 $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('tip', ob_get_contents());ob_end_clean(); ?>
    <img src='./images/icons/tip.gif' border='0' class='Tips1' title='<?php echo ((is_array($_tmp=$this->_tpl_vars['tip'])) ? $this->_run_mod_handler('replace', true, $_tmp, "'", "&#039;") : smarty_modifier_replace($_tmp, "'", "&#039;")); ?>
'>
    <div class='form_desc'><?php echo SELanguage::_get(810); ?></div>
  </td>
  </tr>
<?php endif; 
 if (count($this->_tpl_vars['cats']) > 1): ?>
  <tr>
  <td class='form1'><?php echo SELanguage::_get(709); ?>:</td>
  <td class='form2'>
    <select name='user_profilecat_id'>
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
      <option value='<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['cat_id']; ?>
'<?php if ($this->_tpl_vars['user']->user_info['user_profilecat_id'] == $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['cat_id']): ?> selected='selected'<?php endif; ?>><?php echo SELanguage::_get($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['cat_title']); ?></option>
    <?php endfor; endif; ?>
    </select>
    <div class='form_desc'><?php echo SELanguage::_get(1014); ?></div>
  </td>
  </tr>
<?php endif; ?>

<tr>
<td class='form1'><?php echo SELanguage::_get(206); ?>:</td>
<td class='form2'>
  <select name='user_timezone'>
  <option value='-8'<?php if ($this->_tpl_vars['user']->user_info['user_timezone'] == "-8"): ?> SELECTED<?php endif; ?>>Pacific Time (US & Canada)</option>
  <option value='-7'<?php if ($this->_tpl_vars['user']->user_info['user_timezone'] == "-7"): ?> SELECTED<?php endif; ?>>Mountain Time (US & Canada)</option>
  <option value='-6'<?php if ($this->_tpl_vars['user']->user_info['user_timezone'] == "-6"): ?> SELECTED<?php endif; ?>>Central Time (US & Canada)</option>
  <option value='-5'<?php if ($this->_tpl_vars['user']->user_info['user_timezone'] == "-5"): ?> SELECTED<?php endif; ?>>Eastern Time (US & Canada)</option>
  <option value='-4'<?php if ($this->_tpl_vars['user']->user_info['user_timezone'] == "-4"): ?> SELECTED<?php endif; ?>>Atlantic Time (Canada)</option>
  <option value='-9'<?php if ($this->_tpl_vars['user']->user_info['user_timezone'] == "-9"): ?> SELECTED<?php endif; ?>>Alaska (US & Canada)</option>
  <option value='-10'<?php if ($this->_tpl_vars['user']->user_info['user_timezone'] == "-10"): ?> SELECTED<?php endif; ?>>Hawaii (US)</option>
  <option value='-11'<?php if ($this->_tpl_vars['user']->user_info['user_timezone'] == "-11"): ?> SELECTED<?php endif; ?>>Midway Island, Samoa</option>
  <option value='-12'<?php if ($this->_tpl_vars['user']->user_info['user_timezone'] == "-12"): ?> SELECTED<?php endif; ?>>Eniwetok, Kwajalein</option>
  <option value='-3.3'<?php if ($this->_tpl_vars['user']->user_info['user_timezone'] == "-3.3"): ?> SELECTED<?php endif; ?>>Newfoundland</option>
  <option value='-3'<?php if ($this->_tpl_vars['user']->user_info['user_timezone'] == "-3"): ?> SELECTED<?php endif; ?>>Brasilia, Buenos Aires, Georgetown</option>
  <option value='-2'<?php if ($this->_tpl_vars['user']->user_info['user_timezone'] == "-2"): ?> SELECTED<?php endif; ?>>Mid-Atlantic</option>
  <option value='-1'<?php if ($this->_tpl_vars['user']->user_info['user_timezone'] == "-1"): ?> SELECTED<?php endif; ?>>Azores, Cape Verde Is.</option>
  <option value='0'<?php if ($this->_tpl_vars['user']->user_info['user_timezone'] == '0'): ?> SELECTED<?php endif; ?>>Greenwich Mean Time (Lisbon, London)</option>
  <option value='1'<?php if ($this->_tpl_vars['user']->user_info['user_timezone'] == '1'): ?> SELECTED<?php endif; ?>>Amsterdam, Berlin, Paris, Rome, Madrid</option>
  <option value='2'<?php if ($this->_tpl_vars['user']->user_info['user_timezone'] == '2'): ?> SELECTED<?php endif; ?>>Athens, Helsinki, Istanbul, Cairo, E. Europe</option>
  <option value='3'<?php if ($this->_tpl_vars['user']->user_info['user_timezone'] == '3'): ?> SELECTED<?php endif; ?>>Baghdad, Kuwait, Nairobi, Moscow</option>
  <option value='3.3'<?php if ($this->_tpl_vars['user']->user_info['user_timezone'] == "3.3"): ?> SELECTED<?php endif; ?>>Tehran</option>
  <option value='4'<?php if ($this->_tpl_vars['user']->user_info['user_timezone'] == '4'): ?> SELECTED<?php endif; ?>>Abu Dhabi, Kazan, Muscat</option>
  <option value='4.3'<?php if ($this->_tpl_vars['user']->user_info['user_timezone'] == "4.3"): ?> SELECTED<?php endif; ?>>Kabul</option>
  <option value='5'<?php if ($this->_tpl_vars['user']->user_info['user_timezone'] == '5'): ?> SELECTED<?php endif; ?>>Islamabad, Karachi, Tashkent</option>
  <option value='5.5'<?php if ($this->_tpl_vars['user']->user_info['user_timezone'] == "5.5"): ?> SELECTED<?php endif; ?>>Bombay, Calcutta, New Delhi</option>
  <option value='6'<?php if ($this->_tpl_vars['user']->user_info['user_timezone'] == '6'): ?> SELECTED<?php endif; ?>>Almaty, Dhaka</option>
  <option value='7'<?php if ($this->_tpl_vars['user']->user_info['user_timezone'] == '7'): ?> SELECTED<?php endif; ?>>Bangkok, Jakarta, Hanoi</option>
  <option value='8'<?php if ($this->_tpl_vars['user']->user_info['user_timezone'] == '8'): ?> SELECTED<?php endif; ?>>Beijing, Hong Kong, Singapore, Taipei</option>
  <option value='9'<?php if ($this->_tpl_vars['user']->user_info['user_timezone'] == '9'): ?> SELECTED<?php endif; ?>>Tokyo, Osaka, Sapporto, Seoul, Yakutsk</option>
  <option value='9.3'<?php if ($this->_tpl_vars['user']->user_info['user_timezone'] == "9.3"): ?> SELECTED<?php endif; ?>>Adelaide, Darwin</option>
  <option value='10'<?php if ($this->_tpl_vars['user']->user_info['user_timezone'] == '10'): ?> SELECTED<?php endif; ?>>Brisbane, Melbourne, Sydney, Guam</option>
  <option value='11'<?php if ($this->_tpl_vars['user']->user_info['user_timezone'] == '11'): ?> SELECTED<?php endif; ?>>Magadan, Soloman Is., New Caledonia</option>
  <option value='12'<?php if ($this->_tpl_vars['user']->user_info['user_timezone'] == '12'): ?> SELECTED<?php endif; ?>>Fiji, Kamchatka, Marshall Is., Wellington</option>
  </select>
</td>
</tr>

<?php if (count($this->_tpl_vars['notifytypes']) != 0): ?>
  <tr>
  <td class='form1'><?php echo SELanguage::_get(959); ?>:</td>
  <td class='form2'>
    <div style='padding: 3px 0px 5px 0px;'><?php echo SELanguage::_get(960); ?></div>
    <table cellpadding='0' cellspacing='0'>
    <?php unset($this->_sections['notifytype_loop']);
$this->_sections['notifytype_loop']['name'] = 'notifytype_loop';
$this->_sections['notifytype_loop']['loop'] = is_array($_loop=$this->_tpl_vars['notifytypes']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['notifytype_loop']['show'] = true;
$this->_sections['notifytype_loop']['max'] = $this->_sections['notifytype_loop']['loop'];
$this->_sections['notifytype_loop']['step'] = 1;
$this->_sections['notifytype_loop']['start'] = $this->_sections['notifytype_loop']['step'] > 0 ? 0 : $this->_sections['notifytype_loop']['loop']-1;
if ($this->_sections['notifytype_loop']['show']) {
    $this->_sections['notifytype_loop']['total'] = $this->_sections['notifytype_loop']['loop'];
    if ($this->_sections['notifytype_loop']['total'] == 0)
        $this->_sections['notifytype_loop']['show'] = false;
} else
    $this->_sections['notifytype_loop']['total'] = 0;
if ($this->_sections['notifytype_loop']['show']):

            for ($this->_sections['notifytype_loop']['index'] = $this->_sections['notifytype_loop']['start'], $this->_sections['notifytype_loop']['iteration'] = 1;
                 $this->_sections['notifytype_loop']['iteration'] <= $this->_sections['notifytype_loop']['total'];
                 $this->_sections['notifytype_loop']['index'] += $this->_sections['notifytype_loop']['step'], $this->_sections['notifytype_loop']['iteration']++):
$this->_sections['notifytype_loop']['rownum'] = $this->_sections['notifytype_loop']['iteration'];
$this->_sections['notifytype_loop']['index_prev'] = $this->_sections['notifytype_loop']['index'] - $this->_sections['notifytype_loop']['step'];
$this->_sections['notifytype_loop']['index_next'] = $this->_sections['notifytype_loop']['index'] + $this->_sections['notifytype_loop']['step'];
$this->_sections['notifytype_loop']['first']      = ($this->_sections['notifytype_loop']['iteration'] == 1);
$this->_sections['notifytype_loop']['last']       = ($this->_sections['notifytype_loop']['iteration'] == $this->_sections['notifytype_loop']['total']);
?>
      <?php ob_start(); ?>usersetting_notify_<?php echo $this->_tpl_vars['notifytypes'][$this->_sections['notifytype_loop']['index']]['notifytype_name']; 
 $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('usersetting_col', ob_get_contents());ob_end_clean(); ?>
      <tr>
      <td><input type='checkbox' name='notifications[<?php echo $this->_tpl_vars['notifytypes'][$this->_sections['notifytype_loop']['index']]['notifytype_name']; ?>
]' id='<?php echo $this->_tpl_vars['usersetting_col']; ?>
' value='1'<?php if ($this->_tpl_vars['user']->usersetting_info[$this->_tpl_vars['usersetting_col']] == 1): ?> checked='checked'<?php endif; ?>></td>
      <td><label for='<?php echo $this->_tpl_vars['usersetting_col']; ?>
'><?php echo SELanguage::_get($this->_tpl_vars['notifytypes'][$this->_sections['notifytype_loop']['index']]['notifytype_title']); ?></label></td>
      </tr>
    <?php endfor; endif; ?>
    </table>
  </td>
  </tr>
<?php endif; ?>

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