<?php /* Smarty version 2.6.14, created on 2011-11-01 17:11:28
         compiled from user_account_privacy.tpl */
?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'user_account_privacy.tpl', 115, false),)), $this);
?><?php
SELanguage::_preload_multi(655,1055,756,757,1056,1057,191,813,814,815,1058,1059,1060,1061,1062,967,968,969,970,971,972,973,974,811,812,173);
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
<td class='tab1' NOWRAP><a href='user_account_privacy.php'><?php echo SELanguage::_get(1055); ?></a></td>
<td class='tab'>&nbsp;</td>
<td class='tab2' NOWRAP><a href='user_account_pass.php'><?php echo SELanguage::_get(756); ?></a></td>
<?php if ($this->_tpl_vars['user']->level_info['level_profile_delete'] != 0): ?><td class='tab'>&nbsp;</td><td class='tab2' NOWRAP><a href='user_account_delete.php'><?php echo SELanguage::_get(757); ?></a></td><?php endif; ?>
<td class='tab3'>&nbsp;</td>
</tr>
</table>

<img src='./images/icons/settings48.gif' border='0' class='icon_big'>
<div class='page_header'><?php echo SELanguage::_get(1056); ?></div>
<div><?php echo SELanguage::_get(1057); ?></div>
<br />
<br />

<?php if ($this->_tpl_vars['result'] != 0): ?>
  <table cellpadding='0' cellspacing='0'><tr><td class='success'>
  <img src='./images/success.gif' border='0' class='icon'><?php echo SELanguage::_get(191); ?>
  </td></tr></table>
<?php endif; 
 echo '
<script type="text/javascript">
<!-- 
  window.addEvent(\'domready\', function(){
	var options = {
		script:"misc_js.php?task=suggest_user&limit=10&",
		varname:"input",
		json:true,
		shownoresults:false,
		maxresults:10,
		callback: function (obj) { 
		  if(obj.id != \'\') {
		    var newDiv = document.createElement(\'div\');
		    newDiv.id = \'block_\'+obj.id;
		    newDiv.innerHTML = "<div style=\'padding-left: 5px;\'><div style=\'float: left;\'><img src=\'./images/icons/action_delete2.gif\' class=\'icon\' style=\'cursor: pointer;\' onClick=\\"$(\'block_"+obj.id+"\').getParent().removeChild($(\'block_"+obj.id+"\'))\\" border=\'0\'><input type=\'hidden\' name=\'user_blocklist[]\' value=\'"+obj.id+"\'></div><div><a href=\'profile.php?user="+obj.id+"\'>"+obj.value+"</a></div><div style=\'clear: both;\'></div></div>";
		    $(\'blocks\').insertBefore(newDiv, $(\'block_user\'));
		    $(\'block_user\').value = \'\';
		  }
		}
	};
	var as_json = new bsn.AutoSuggest(\'block_user\', options);
  });
//-->
</script>
'; ?>


<form action='user_account_privacy.php' method='post' name='info'>
<table cellpadding='0' cellspacing='0'>

<?php if ($this->_tpl_vars['user']->level_info['level_profile_block'] != 0): ?>
  <tr>
  <td class='form1' nowrap='nowrap'><?php echo SELanguage::_get(813); ?>:</td>
  <td class='form2' id='blocks'>
    <div style='padding: 3px 0px 5px 0px;'><?php echo SELanguage::_get(814); ?></div>
    <?php unset($this->_sections['block_loop']);
$this->_sections['block_loop']['name'] = 'block_loop';
$this->_sections['block_loop']['loop'] = is_array($_loop=$this->_tpl_vars['blocked_users']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['block_loop']['show'] = true;
$this->_sections['block_loop']['max'] = $this->_sections['block_loop']['loop'];
$this->_sections['block_loop']['step'] = 1;
$this->_sections['block_loop']['start'] = $this->_sections['block_loop']['step'] > 0 ? 0 : $this->_sections['block_loop']['loop']-1;
if ($this->_sections['block_loop']['show']) {
    $this->_sections['block_loop']['total'] = $this->_sections['block_loop']['loop'];
    if ($this->_sections['block_loop']['total'] == 0)
        $this->_sections['block_loop']['show'] = false;
} else
    $this->_sections['block_loop']['total'] = 0;
if ($this->_sections['block_loop']['show']):

            for ($this->_sections['block_loop']['index'] = $this->_sections['block_loop']['start'], $this->_sections['block_loop']['iteration'] = 1;
                 $this->_sections['block_loop']['iteration'] <= $this->_sections['block_loop']['total'];
                 $this->_sections['block_loop']['index'] += $this->_sections['block_loop']['step'], $this->_sections['block_loop']['iteration']++):
$this->_sections['block_loop']['rownum'] = $this->_sections['block_loop']['iteration'];
$this->_sections['block_loop']['index_prev'] = $this->_sections['block_loop']['index'] - $this->_sections['block_loop']['step'];
$this->_sections['block_loop']['index_next'] = $this->_sections['block_loop']['index'] + $this->_sections['block_loop']['step'];
$this->_sections['block_loop']['first']      = ($this->_sections['block_loop']['iteration'] == 1);
$this->_sections['block_loop']['last']       = ($this->_sections['block_loop']['iteration'] == $this->_sections['block_loop']['total']);
?>
      <div id='block_<?php echo $this->_tpl_vars['blocked_users'][$this->_sections['block_loop']['index']]->user_info['user_id']; ?>
'>
        <div style='float: left;'><img src='./images/icons/action_delete2.gif' class='icon' style='cursor: pointer; margin-left: 5px;' onClick="$('block_<?php echo $this->_tpl_vars['blocked_users'][$this->_sections['block_loop']['index']]->user_info['user_id']; ?>
').getParent().removeChild($('block_<?php echo $this->_tpl_vars['blocked_users'][$this->_sections['block_loop']['index']]->user_info['user_id']; ?>
'))" border='0'><input type='hidden' name='user_blocklist[]' value='<?php echo $this->_tpl_vars['blocked_users'][$this->_sections['block_loop']['index']]->user_info['user_id']; ?>
'></div>
        <div><a href='<?php echo $this->_tpl_vars['url']->url_create('profile',$this->_tpl_vars['blocked_users'][$this->_sections['block_loop']['index']]->user_info['user_username']); ?>
'><?php echo $this->_tpl_vars['blocked_users'][$this->_sections['block_loop']['index']]->user_displayname; ?>
</a></div>
        <div style='clear: both;'></div>
      </div>
    <?php endfor; endif; ?>

    <div id='block_user_link' style='padding: 5px 0px 0px 2px; font-weight: bold;'><a href='javascript:void(0);' onClick="$('block_user_link').style.display='none';$('block_user').style.display='block';$('block_user').focus();"><?php echo SELanguage::_get(815); ?></a></div>
    <input type='text' class='text' id='block_user' size='30' maxlength='50' value='' style='margin-top: 3px; display: none;'>

  </td>
  </tr>
<?php endif; 
 if ($this->_tpl_vars['user']->level_info['level_profile_invisible'] == 1): ?>
  <tr>
  <td class='form1' nowrap='nowrap'><?php echo SELanguage::_get(1058); ?>:</td>
  <td class='form2'>
    <table cellpadding='0' cellspacing='0'>
    <tr>
    <td><input type='checkbox' name='user_invisible' id='invisible' value='1'<?php if ($this->_tpl_vars['user']->user_info['user_invisible'] == 1): ?> checked='checked'<?php endif; ?>>&nbsp;</td>
    <td><label for='invisible'><?php echo SELanguage::_get(1059); ?></label></td>
    </tr>
    </table>
  </td>
  </tr>
<?php endif; 
 if ($this->_tpl_vars['user']->level_info['level_profile_views'] == 1): ?>
  <tr>
  <td class='form1' nowrap='nowrap'><?php echo SELanguage::_get(1060); ?>:</td>
  <td class='form2'>
    <table cellpadding='0' cellspacing='0'>
    <tr>
    <td><input type='checkbox' name='user_saveviews' id='saveviews' value='1'<?php if ($this->_tpl_vars['user']->user_info['user_saveviews'] == 1): ?> checked='checked'<?php endif; ?>>&nbsp;</td>
    <td><label for='saveviews'><?php echo SELanguage::_get(1061); ?></label></td>
    </tr>
    </table>
    <div class='form_desc' style='width: 500px;'><?php echo SELanguage::_get(1062); ?></div>
  </td>
  </tr>
<?php endif; 
 if (count($this->_tpl_vars['privacy_options']) > 1): ?>
  <tr>
  <td class='form1' nowrap='nowrap'><?php echo SELanguage::_get(967); ?>:</td>
  <td class='form2'>
    <div style='padding: 3px 0px 5px 0px;'><?php echo SELanguage::_get(968); ?></div>
    <table cellpadding='0' cellspacing='0'>
        <?php $_from = $this->_tpl_vars['privacy_options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
      <tr>
      <td><input type='radio' name='privacy_profile' id='privacy_<?php echo $this->_tpl_vars['k']; ?>
' value='<?php echo $this->_tpl_vars['k']; ?>
'<?php if ($this->_tpl_vars['user']->user_info['user_privacy'] == $this->_tpl_vars['k']): ?> checked='checked'<?php endif; ?>></td>
      <td><label for='privacy_<?php echo $this->_tpl_vars['k']; ?>
'><?php echo SELanguage::_get($this->_tpl_vars['v']); ?></label></td>
      </tr>
    <?php endforeach; endif; unset($_from); ?>
    </table>
  </td>
  </tr>
<?php endif; 
 if (count($this->_tpl_vars['comment_options']) > 1): ?>
  <tr>
  <td class='form1' nowrap='nowrap'><?php echo SELanguage::_get(969); ?>:</td>
  <td class='form2'>
    <div style='padding: 3px 0px 5px 0px;'><?php echo SELanguage::_get(970); ?></div>
    <table cellpadding='0' cellspacing='0'>
        <?php $_from = $this->_tpl_vars['comment_options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
      <tr>
      <td><input type='radio' name='comments_profile' id='comments_<?php echo $this->_tpl_vars['k']; ?>
' value='<?php echo $this->_tpl_vars['k']; ?>
'<?php if ($this->_tpl_vars['user']->user_info['user_comments'] == $this->_tpl_vars['k']): ?> checked='checked'<?php endif; ?>></td>
      <td><label for='comments_<?php echo $this->_tpl_vars['k']; ?>
'><?php echo SELanguage::_get($this->_tpl_vars['v']); ?></label></td>
      </tr>
    <?php endforeach; endif; unset($_from); ?>
    </table>
  </td>
  </tr>
<?php endif; 
 if ($this->_tpl_vars['user']->level_info['level_profile_search'] == 1): ?>
  <tr>
  <td class='form1' nowrap='nowrap'><?php echo SELanguage::_get(971); ?>:</td>
  <td class='form2'>
    <div style='padding: 3px 0px 5px 0px;'><?php echo SELanguage::_get(972); ?></div>
    <table cellpadding='0' cellspacing='0'>
    <tr><td><input type='radio' name='search_profile' id='search_profile1' value='1'<?php if ($this->_tpl_vars['user']->user_info['user_search'] == 1): ?> checked='checked'<?php endif; ?>></td><td><label for='search_profile1'><?php echo SELanguage::_get(973); ?></label></td></tr>
    <tr><td><input type='radio' name='search_profile' id='search_profile0' value='0'<?php if ($this->_tpl_vars['user']->user_info['user_search'] == 0): ?> checked='checked'<?php endif; ?>></td><td><label for='search_profile0'><?php echo SELanguage::_get(974); ?></label></td></tr>
    </table>
  </td>
  </tr>
<?php endif; 
 if ($this->_tpl_vars['setting']['setting_actions_privacy'] == 1): ?>
  <tr>
  <td class='form1' nowrap='nowrap'><?php echo SELanguage::_get(811); ?>:</td>
  <td class='form2'>
    <div style='padding: 3px 0px 5px 0px;'><?php echo SELanguage::_get(812); ?></div>
    <table cellpadding='0' cellspacing='0'>
    <?php unset($this->_sections['actiontypes_loop']);
$this->_sections['actiontypes_loop']['name'] = 'actiontypes_loop';
$this->_sections['actiontypes_loop']['loop'] = is_array($_loop=$this->_tpl_vars['actiontypes']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['actiontypes_loop']['show'] = true;
$this->_sections['actiontypes_loop']['max'] = $this->_sections['actiontypes_loop']['loop'];
$this->_sections['actiontypes_loop']['step'] = 1;
$this->_sections['actiontypes_loop']['start'] = $this->_sections['actiontypes_loop']['step'] > 0 ? 0 : $this->_sections['actiontypes_loop']['loop']-1;
if ($this->_sections['actiontypes_loop']['show']) {
    $this->_sections['actiontypes_loop']['total'] = $this->_sections['actiontypes_loop']['loop'];
    if ($this->_sections['actiontypes_loop']['total'] == 0)
        $this->_sections['actiontypes_loop']['show'] = false;
} else
    $this->_sections['actiontypes_loop']['total'] = 0;
if ($this->_sections['actiontypes_loop']['show']):

            for ($this->_sections['actiontypes_loop']['index'] = $this->_sections['actiontypes_loop']['start'], $this->_sections['actiontypes_loop']['iteration'] = 1;
                 $this->_sections['actiontypes_loop']['iteration'] <= $this->_sections['actiontypes_loop']['total'];
                 $this->_sections['actiontypes_loop']['index'] += $this->_sections['actiontypes_loop']['step'], $this->_sections['actiontypes_loop']['iteration']++):
$this->_sections['actiontypes_loop']['rownum'] = $this->_sections['actiontypes_loop']['iteration'];
$this->_sections['actiontypes_loop']['index_prev'] = $this->_sections['actiontypes_loop']['index'] - $this->_sections['actiontypes_loop']['step'];
$this->_sections['actiontypes_loop']['index_next'] = $this->_sections['actiontypes_loop']['index'] + $this->_sections['actiontypes_loop']['step'];
$this->_sections['actiontypes_loop']['first']      = ($this->_sections['actiontypes_loop']['iteration'] == 1);
$this->_sections['actiontypes_loop']['last']       = ($this->_sections['actiontypes_loop']['iteration'] == $this->_sections['actiontypes_loop']['total']);
?>
      <tr>
      <td><input type='checkbox' name='actiontype[]' id='actiontype_id_<?php echo $this->_tpl_vars['actiontypes'][$this->_sections['actiontypes_loop']['index']]['actiontype_id']; ?>
' value='<?php echo $this->_tpl_vars['actiontypes'][$this->_sections['actiontypes_loop']['index']]['actiontype_id']; ?>
'<?php if ($this->_tpl_vars['actiontypes'][$this->_sections['actiontypes_loop']['index']]['actiontype_selected'] == 1): ?> checked='checked'='checked'<?php endif; ?>></td>
      <td><label for='actiontype_id_<?php echo $this->_tpl_vars['actiontypes'][$this->_sections['actiontypes_loop']['index']]['actiontype_id']; ?>
'><?php echo SELanguage::_get($this->_tpl_vars['actiontypes'][$this->_sections['actiontypes_loop']['index']]['actiontype_desc']); ?></label></td>
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