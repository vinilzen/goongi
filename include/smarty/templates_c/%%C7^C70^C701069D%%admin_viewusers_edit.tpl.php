<?php /* Smarty version 2.6.14, created on 2011-12-23 15:16:16
         compiled from admin_viewusers_edit.tpl */
?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'admin_viewusers_edit.tpl', 124, false),array('modifier', 'replace', 'admin_viewusers_edit.tpl', 165, false),array('modifier', 'choptext', 'admin_viewusers_edit.tpl', 165, false),)), $this);
?><?php
SELanguage::_preload_multi(1123,1124,37,1008,1131,1132,1133,1134,1135,1136,999,1137,1138,617,1139,173,39,24,1125,1126,1127,1128,1129,1130,1144,1145,851);
SELanguage::load();
?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin_header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 
 ob_start(); 
 if ($this->_tpl_vars['setting']['setting_username']): 
 echo $this->_tpl_vars['user']->user_info['user_username']; 
 else: 
 echo $this->_tpl_vars['user']->user_displayname; 
 endif; 
 $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('user_showname', ob_get_contents());ob_end_clean(); ?>
<h2><?php echo sprintf(SELanguage::_get(1123), $this->_tpl_vars['user_showname']); ?></h2>
<?php echo SELanguage::_get(1124); ?>
<br />
<br />

<?php if ($this->_tpl_vars['is_error'] != 0): ?>
  <div class='error'><img src='../images/error.gif' border='0' class='icon'> <?php echo SELanguage::_get($this->_tpl_vars['is_error']); ?></div>
  <br>
<?php endif; 
 if ($this->_tpl_vars['result'] != 0): ?>
  <?php ob_start(); 
 echo SELanguage::_get($this->_tpl_vars['old_subnet_name']); 
 $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('old_subnet_name', ob_get_contents());ob_end_clean(); ?>
  <?php ob_start(); 
 echo SELanguage::_get($this->_tpl_vars['new_subnet_name']); 
 $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('new_subnet_name', ob_get_contents());ob_end_clean(); ?>
  <div class='success'><img src='../images/success.gif' border='0' class='icon'> <?php echo sprintf(SELanguage::_get($this->_tpl_vars['result']), $this->_tpl_vars['old_subnet_name'], $this->_tpl_vars['new_subnet_name']); ?></div>
  <br>
<?php endif; ?>

<table cellpadding='0' cellspacing='0'>
<tr>
<td valign='top'>

<form action='admin_viewusers_edit.php' method='post'>
<table cellpadding='0' cellspacing='0'>
<tr>
<td class='form1'><?php echo SELanguage::_get(37); ?></td>
<td class='form2'>
  <input type='text' class='text' name='user_email' value='<?php echo $this->_tpl_vars['user']->user_info['user_email']; ?>
' size='30' maxlength='70'>
  <?php if ($this->_tpl_vars['user']->user_info['user_verified'] == 0): ?> 
  <br>(<?php echo SELanguage::_get(1008); ?> - <a href='admin_viewusers_edit.php?user_id=<?php echo $this->_tpl_vars['user']->user_info['user_id']; ?>
&task=resend&s=<?php echo $this->_tpl_vars['s']; ?>
&p=<?php echo $this->_tpl_vars['p']; ?>
&f_user=<?php echo $this->_tpl_vars['f_user']; ?>
&f_email=<?php echo $this->_tpl_vars['f_email']; ?>
&f_level=<?php echo $this->_tpl_vars['f_level']; ?>
&f_subnet=<?php echo $this->_tpl_vars['f_subnet']; ?>
&f_enabled=<?php echo $this->_tpl_vars['f_enabled']; ?>
'><?php echo SELanguage::_get(1131); ?></a> - <a href='admin_viewusers_edit.php?user_id=<?php echo $this->_tpl_vars['user']->user_info['user_id']; ?>
&task=verify&s=<?php echo $this->_tpl_vars['s']; ?>
&p=<?php echo $this->_tpl_vars['p']; ?>
&f_user=<?php echo $this->_tpl_vars['f_user']; ?>
&f_email=<?php echo $this->_tpl_vars['f_email']; ?>
&f_level=<?php echo $this->_tpl_vars['f_level']; ?>
&f_subnet=<?php echo $this->_tpl_vars['f_subnet']; ?>
&f_enabled=<?php echo $this->_tpl_vars['f_enabled']; ?>
'><?php echo SELanguage::_get(1132); ?></a>)
  <?php endif; ?>
</td>
</tr>
<?php if ($this->_tpl_vars['setting']['setting_username']): ?>
  <tr>
  <td class='form1'><?php echo SELanguage::_get(1133); ?></td>
  <td class='form2'><input type='text' class='text' name='user_username' value='<?php echo $this->_tpl_vars['user']->user_info['user_username']; ?>
' size='30' maxlength='50'></td>
  </tr>
<?php endif; ?>
<tr>
<td class='form1'><?php echo SELanguage::_get(1134); ?></td>
<td class='form2'><input type='password' class='text' name='user_password' value='' size='30' maxlength='50'><br><?php echo SELanguage::_get(1135); ?></td>
</tr>
<tr>
<td class='form1'><?php echo SELanguage::_get(1136); ?></td>
<td class='form2'><select class='text' name='user_enabled'><option value='1'<?php if ($this->_tpl_vars['user']->user_info['user_enabled'] == 1): ?> SELECTED<?php endif; ?>><?php echo SELanguage::_get(999); ?></option><option value='0'<?php if ($this->_tpl_vars['user']->user_info['user_enabled'] == 0): ?> SELECTED<?php endif; ?>><?php echo SELanguage::_get(1137); ?></option></td>
</tr>
<tr>
<td class='form1'><?php echo SELanguage::_get(1138); ?></td>
<td class='form2'><select class='text' name='user_level_id'><?php unset($this->_sections['level_loop']);
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
?><option value='<?php echo $this->_tpl_vars['levels'][$this->_sections['level_loop']['index']]['level_id']; ?>
'<?php if ($this->_tpl_vars['user']->user_info['user_level_id'] == $this->_tpl_vars['levels'][$this->_sections['level_loop']['index']]['level_id']): ?> SELECTED<?php endif; ?>><?php echo $this->_tpl_vars['levels'][$this->_sections['level_loop']['index']]['level_name']; ?>
</option><?php endfor; endif; ?></td>
</tr>
<tr>
<td class='form1'><?php echo SELanguage::_get(617); ?></td>
<td class='form2'><select class='text' name='user_profilecat_id'><?php unset($this->_sections['cat_loop']);
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
?><option value='<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['cat_id']; ?>
'<?php if ($this->_tpl_vars['user']->user_info['user_profilecat_id'] == $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['cat_id']): ?> SELECTED<?php endif; ?>><?php echo SELanguage::_get($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['cat_title']); ?></option><?php endfor; endif; ?></td>
</tr>
<tr>
<td class='form1'><?php echo SELanguage::_get(1139); ?></td>
<td class='form2'><input type='text' class='text' name='user_invitesleft' value='<?php echo $this->_tpl_vars['user']->user_info['user_invitesleft']; ?>
' maxlength='3' size='2'></td>
</tr>
<tr>
<td class='form1'>&nbsp;</td>
<td class='form2'>
  <table cellpadding='0' cellspacing='0'>
  <tr>
  <td>
    <input type='submit' class='button' value='<?php echo SELanguage::_get(173); ?>'>&nbsp;
    <input type='hidden' name='task' value='edituser'>
    <input type='hidden' name='user_id' value='<?php echo $this->_tpl_vars['user']->user_info['user_id']; ?>
'>
    <input type='hidden' name='s' value='<?php echo $this->_tpl_vars['s']; ?>
'>
    <input type='hidden' name='p' value='<?php echo $this->_tpl_vars['p']; ?>
'>
    <input type='hidden' name='f_user' value='<?php echo $this->_tpl_vars['f_user']; ?>
'>
    <input type='hidden' name='f_email' value='<?php echo $this->_tpl_vars['f_email']; ?>
'>
    <input type='hidden' name='f_level' value='<?php echo $this->_tpl_vars['f_level']; ?>
'>
    <input type='hidden' name='f_subnet' value='<?php echo $this->_tpl_vars['f_subnet']; ?>
'>
    <input type='hidden' name='f_enabled' value='<?php echo $this->_tpl_vars['f_enabled']; ?>
'>
    </form>
  </td>
  <td>
    <form action='admin_viewusers.php' method='GET'>
    <input type='submit' class='button' value='<?php echo SELanguage::_get(39); ?>'></td>
    <input type='hidden' name='s' value='<?php echo $this->_tpl_vars['s']; ?>
'>
    <input type='hidden' name='p' value='<?php echo $this->_tpl_vars['p']; ?>
'>
    <input type='hidden' name='f_user' value='<?php echo $this->_tpl_vars['f_user']; ?>
'>
    <input type='hidden' name='f_email' value='<?php echo $this->_tpl_vars['f_email']; ?>
'>
    <input type='hidden' name='f_level' value='<?php echo $this->_tpl_vars['f_level']; ?>
'>
    <input type='hidden' name='f_subnet' value='<?php echo $this->_tpl_vars['f_subnet']; ?>
'>
    <input type='hidden' name='f_enabled' value='<?php echo $this->_tpl_vars['f_enabled']; ?>
'>
    </form>
  </td>
  </tr>
  </table>
</td>
</tr>
</table>

</td>
<td valign='top'>

<div class='smallbox' style='width: 250px; margin-left: 20px;'>
  <div class='smallbox_header'><b><?php echo SELanguage::_get(24); ?></b></div>
  <div class='smallbox_content'>
    <div><?php echo $this->_tpl_vars['total_friends']; ?>
 <?php echo SELanguage::_get(1125); ?></div>
    <div><?php echo $this->_tpl_vars['user']->user_info['user_logins']; ?>
 <?php echo SELanguage::_get(1126); ?></div>
    <div><?php echo $this->_tpl_vars['total_messages']; ?>
 <?php echo SELanguage::_get(1127); ?></div>
    <div><?php echo $this->_tpl_vars['total_comments']; ?>
 <?php echo SELanguage::_get(1128); ?></div>
    <div><?php echo SELanguage::_get(1129); ?> <?php if ($this->_tpl_vars['user']->user_info['user_lastlogindate'] == 0): 
 echo SELanguage::_get(1130); 
 else: 
 $this->assign('user_lastlogin', $this->_tpl_vars['datetime']->timezone($this->_tpl_vars['user']->user_info['user_lastlogindate'],$this->_tpl_vars['setting']['setting_timezone'])); 
 echo $this->_tpl_vars['datetime']->cdate(($this->_tpl_vars['setting']['setting_dateformat']).", ".($this->_tpl_vars['setting']['setting_timeformat']),$this->_tpl_vars['user_lastlogin']); 
 endif; ?></div>
    <div><?php echo SELanguage::_get(1144); ?> <?php if ($this->_tpl_vars['user']->user_info['user_ip_signup'] == ""): ?>---<?php else: 
 echo $this->_tpl_vars['user']->user_info['user_ip_signup']; 
 endif; ?></div>
    <div><?php echo SELanguage::_get(1145); ?> <?php echo $this->_tpl_vars['user']->user_info['user_ip_lastactive']; ?>
</div>
  </div>
</div>

</td>
</tr>
</table>


<br>

<?php if (count($this->_tpl_vars['actions']) > 0): ?>
  <?php echo '
  <script language="JavaScript">
  <!-- 
    Rollimage0 = new Image(10,12);
    Rollimage0.src = "../images/icons/action_delete1.gif";
    Rollimage1 = new Image(10,12);
    Rollimage1.src = "../images/icons/action_delete2.gif";

    var total_actions = '; 
 echo count($this->_tpl_vars['actions']); 
 echo ';
    function action_delete(action_id) {
      $(\'action_\' + action_id).style.display = \'none\';
      total_actions--;
      if(total_actions == 0)
        $(\'actions\').style.display = "none";
    }
  //-->
  </script>
  '; ?>


    <div class='smallbox' style='width: 575px;' id='actions'>
    <div class='smallbox_header' style='margin-bottom: 7px;'><b><?php echo SELanguage::_get(851); ?></b></div>
    <?php unset($this->_sections['actions_loop']);
$this->_sections['actions_loop']['name'] = 'actions_loop';
$this->_sections['actions_loop']['loop'] = is_array($_loop=$this->_tpl_vars['actions']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['actions_loop']['show'] = true;
$this->_sections['actions_loop']['max'] = $this->_sections['actions_loop']['loop'];
$this->_sections['actions_loop']['step'] = 1;
$this->_sections['actions_loop']['start'] = $this->_sections['actions_loop']['step'] > 0 ? 0 : $this->_sections['actions_loop']['loop']-1;
if ($this->_sections['actions_loop']['show']) {
    $this->_sections['actions_loop']['total'] = $this->_sections['actions_loop']['loop'];
    if ($this->_sections['actions_loop']['total'] == 0)
        $this->_sections['actions_loop']['show'] = false;
} else
    $this->_sections['actions_loop']['total'] = 0;
if ($this->_sections['actions_loop']['show']):

            for ($this->_sections['actions_loop']['index'] = $this->_sections['actions_loop']['start'], $this->_sections['actions_loop']['iteration'] = 1;
                 $this->_sections['actions_loop']['iteration'] <= $this->_sections['actions_loop']['total'];
                 $this->_sections['actions_loop']['index'] += $this->_sections['actions_loop']['step'], $this->_sections['actions_loop']['iteration']++):
$this->_sections['actions_loop']['rownum'] = $this->_sections['actions_loop']['iteration'];
$this->_sections['actions_loop']['index_prev'] = $this->_sections['actions_loop']['index'] - $this->_sections['actions_loop']['step'];
$this->_sections['actions_loop']['index_next'] = $this->_sections['actions_loop']['index'] + $this->_sections['actions_loop']['step'];
$this->_sections['actions_loop']['first']      = ($this->_sections['actions_loop']['iteration'] == 1);
$this->_sections['actions_loop']['last']       = ($this->_sections['actions_loop']['iteration'] == $this->_sections['actions_loop']['total']);
?>
      <div id='action_<?php echo $this->_tpl_vars['actions'][$this->_sections['actions_loop']['index']]['action_id']; ?>
' style='padding: 0px 5px 5px 5px; <?php if ($this->_sections['actions_loop']['last'] != true): ?>border-bottom: 1px solid #EAEAEA; margin-bottom: 5px;<?php endif; ?>'>
        <table cellpadding='0' cellspacing='0'>
          <tr>	
	  <td valign='top'><img src='../images/icons/<?php echo $this->_tpl_vars['actions'][$this->_sections['actions_loop']['index']]['action_icon']; ?>
' border='0' class='icon2'></td>
	  <td valign='top' width='100%'>
	    <div style='color: #999999; float: right; padding-left: 5px;'>
	      <?php $this->assign('action_date', $this->_tpl_vars['datetime']->time_since($this->_tpl_vars['actions'][$this->_sections['actions_loop']['index']]['action_date'])); ?>
	      <?php echo sprintf(SELanguage::_get($this->_tpl_vars['action_date'][0]), $this->_tpl_vars['action_date'][1]); ?>
	      <img src='../images/icons/action_delete1.gif' style='vertical-align: middle; margin-left: 3px; cursor: pointer; cursor: hand;' border='0' onmouseover="this.src=Rollimage1.src;" onmouseout="this.src=Rollimage0.src;" onClick="javascript:$('ajaxframe').src='admin_viewusers_edit.php?task=action_delete&user_id=<?php echo $this->_tpl_vars['user']->user_info['user_id']; ?>
&action_id=<?php echo $this->_tpl_vars['actions'][$this->_sections['actions_loop']['index']]['action_id']; ?>
'">
	    </div>

	    <?php if ($this->_tpl_vars['actions'][$this->_sections['actions_loop']['index']]['action_media'] !== FALSE): 
 ob_start(); 
 unset($this->_sections['action_media_loop']);
$this->_sections['action_media_loop']['name'] = 'action_media_loop';
$this->_sections['action_media_loop']['loop'] = is_array($_loop=$this->_tpl_vars['actions'][$this->_sections['actions_loop']['index']]['action_media']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['action_media_loop']['show'] = true;
$this->_sections['action_media_loop']['max'] = $this->_sections['action_media_loop']['loop'];
$this->_sections['action_media_loop']['step'] = 1;
$this->_sections['action_media_loop']['start'] = $this->_sections['action_media_loop']['step'] > 0 ? 0 : $this->_sections['action_media_loop']['loop']-1;
if ($this->_sections['action_media_loop']['show']) {
    $this->_sections['action_media_loop']['total'] = $this->_sections['action_media_loop']['loop'];
    if ($this->_sections['action_media_loop']['total'] == 0)
        $this->_sections['action_media_loop']['show'] = false;
} else
    $this->_sections['action_media_loop']['total'] = 0;
if ($this->_sections['action_media_loop']['show']):

            for ($this->_sections['action_media_loop']['index'] = $this->_sections['action_media_loop']['start'], $this->_sections['action_media_loop']['iteration'] = 1;
                 $this->_sections['action_media_loop']['iteration'] <= $this->_sections['action_media_loop']['total'];
                 $this->_sections['action_media_loop']['index'] += $this->_sections['action_media_loop']['step'], $this->_sections['action_media_loop']['iteration']++):
$this->_sections['action_media_loop']['rownum'] = $this->_sections['action_media_loop']['iteration'];
$this->_sections['action_media_loop']['index_prev'] = $this->_sections['action_media_loop']['index'] - $this->_sections['action_media_loop']['step'];
$this->_sections['action_media_loop']['index_next'] = $this->_sections['action_media_loop']['index'] + $this->_sections['action_media_loop']['step'];
$this->_sections['action_media_loop']['first']      = ($this->_sections['action_media_loop']['iteration'] == 1);
$this->_sections['action_media_loop']['last']       = ($this->_sections['action_media_loop']['iteration'] == $this->_sections['action_media_loop']['total']);
?><a href='../<?php echo $this->_tpl_vars['actions'][$this->_sections['actions_loop']['index']]['action_media'][$this->_sections['action_media_loop']['index']]['actionmedia_link']; ?>
'><img src='../<?php echo $this->_tpl_vars['actions'][$this->_sections['actions_loop']['index']]['action_media'][$this->_sections['action_media_loop']['index']]['actionmedia_path']; ?>
' border='0' width='<?php echo $this->_tpl_vars['actions'][$this->_sections['actions_loop']['index']]['action_media'][$this->_sections['action_media_loop']['index']]['actionmedia_width']; ?>
'></a><?php endfor; endif; 
 $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('action_media', ob_get_contents());ob_end_clean(); 
 endif; ?>




	    <?php ob_start(); 
 echo sprintf(SELanguage::_get($this->_tpl_vars['actions'][$this->_sections['actions_loop']['index']]['action_text']), $this->_tpl_vars['actions'][$this->_sections['actions_loop']['index']]['action_vars'][0], $this->_tpl_vars['actions'][$this->_sections['actions_loop']['index']]['action_vars'][1], $this->_tpl_vars['actions'][$this->_sections['actions_loop']['index']]['action_vars'][2], $this->_tpl_vars['actions'][$this->_sections['actions_loop']['index']]['action_vars'][3], $this->_tpl_vars['actions'][$this->_sections['actions_loop']['index']]['action_vars'][4], $this->_tpl_vars['actions'][$this->_sections['actions_loop']['index']]['action_vars'][5], $this->_tpl_vars['actions'][$this->_sections['actions_loop']['index']]['action_vars'][6]); 
 $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('action_text', ob_get_contents());ob_end_clean(); ?>
	    <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['action_text'])) ? $this->_run_mod_handler('replace', true, $_tmp, "[media]", $this->_tpl_vars['action_media']) : smarty_modifier_replace($_tmp, "[media]", $this->_tpl_vars['action_media'])))) ? $this->_run_mod_handler('choptext', true, $_tmp, 50, "<br>") : smarty_modifier_choptext($_tmp, 50, "<br>")); ?>

          </td>
	  </tr>
	</table>
      </div>
    <?php endfor; endif; ?>

  </div>
<?php endif; 
 $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin_footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>