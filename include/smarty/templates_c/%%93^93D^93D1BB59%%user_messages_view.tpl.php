<?php /* Smarty version 2.6.14, created on 2011-11-02 11:55:52
         compiled from user_messages_view.tpl */
?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'user_messages_view.tpl', 45, false),array('modifier', 'choptext', 'user_messages_view.tpl', 48, false),array('modifier', 'count', 'user_messages_view.tpl', 61, false),)), $this);
?><?php
SELanguage::_preload_multi(780,781,801,796,1321,802,803,791,805,806,1181);
SELanguage::load();
?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<!-- start USER MENU -->
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'menu_main.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<!-- end USER MENU -->

<table class='tabs' cellpadding='0' cellspacing='0'>
<tr>
<td class='tab0'>&nbsp;</td>
<td class='tab<?php if ($this->_tpl_vars['b'] == 0): ?>1<?php else: ?>2<?php endif; ?>' NOWRAP><a href='user_messages.php'><?php echo SELanguage::_get(780); ?></a></td>
<td class='tab'>&nbsp;</td>
<td class='tab<?php if ($this->_tpl_vars['b'] == 0): ?>2<?php else: ?>1<?php endif; ?>' NOWRAP><a href='user_messages_outbox.php'><?php echo SELanguage::_get(781); ?></a></td>
<td class='tab3'>&nbsp;</td>
</tr>
</table>

<img src='./images/icons/messages48.gif' border='0' class='icon_big' />
<div class='page_header'><?php echo $this->_tpl_vars['pmconvo_info']['pmconvo_subject']; ?>
</div>
<?php ob_start(); 
 unset($this->_sections['coll_loop']);
$this->_sections['coll_loop']['name'] = 'coll_loop';
$this->_sections['coll_loop']['loop'] = is_array($_loop=$this->_tpl_vars['collaborators']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['coll_loop']['show'] = true;
$this->_sections['coll_loop']['max'] = $this->_sections['coll_loop']['loop'];
$this->_sections['coll_loop']['step'] = 1;
$this->_sections['coll_loop']['start'] = $this->_sections['coll_loop']['step'] > 0 ? 0 : $this->_sections['coll_loop']['loop']-1;
if ($this->_sections['coll_loop']['show']) {
    $this->_sections['coll_loop']['total'] = $this->_sections['coll_loop']['loop'];
    if ($this->_sections['coll_loop']['total'] == 0)
        $this->_sections['coll_loop']['show'] = false;
} else
    $this->_sections['coll_loop']['total'] = 0;
if ($this->_sections['coll_loop']['show']):

            for ($this->_sections['coll_loop']['index'] = $this->_sections['coll_loop']['start'], $this->_sections['coll_loop']['iteration'] = 1;
                 $this->_sections['coll_loop']['iteration'] <= $this->_sections['coll_loop']['total'];
                 $this->_sections['coll_loop']['index'] += $this->_sections['coll_loop']['step'], $this->_sections['coll_loop']['iteration']++):
$this->_sections['coll_loop']['rownum'] = $this->_sections['coll_loop']['iteration'];
$this->_sections['coll_loop']['index_prev'] = $this->_sections['coll_loop']['index'] - $this->_sections['coll_loop']['step'];
$this->_sections['coll_loop']['index_next'] = $this->_sections['coll_loop']['index'] + $this->_sections['coll_loop']['step'];
$this->_sections['coll_loop']['first']      = ($this->_sections['coll_loop']['iteration'] == 1);
$this->_sections['coll_loop']['last']       = ($this->_sections['coll_loop']['iteration'] == $this->_sections['coll_loop']['total']);
?><a href='<?php echo $this->_tpl_vars['url']->url_create('profile',$this->_tpl_vars['collaborators'][$this->_sections['coll_loop']['index']]->user_info['user_username']); ?>
'><?php echo $this->_tpl_vars['collaborators'][$this->_sections['coll_loop']['index']]->user_displayname; ?>
</a><?php if ($this->_sections['coll_loop']['last'] != TRUE): ?>, <?php endif; 
 endfor; endif; 
 $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('collaborators', ob_get_contents());ob_end_clean(); ?>
<div><?php echo sprintf(SELanguage::_get(801), $this->_tpl_vars['collaborators']); ?></div>
<br />
<br />


<?php echo '
<script type="text/javascript">
<!--
  window.addEvent(\'domready\', function() { textarea_autogrow(\'reply_body\'); });
//-->
</script>
'; ?>



<table cellpadding='0' cellspacing='0' width='100%'>
<?php unset($this->_sections['pm_loop']);
$this->_sections['pm_loop']['name'] = 'pm_loop';
$this->_sections['pm_loop']['loop'] = is_array($_loop=$this->_tpl_vars['pms']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['pm_loop']['show'] = true;
$this->_sections['pm_loop']['max'] = $this->_sections['pm_loop']['loop'];
$this->_sections['pm_loop']['step'] = 1;
$this->_sections['pm_loop']['start'] = $this->_sections['pm_loop']['step'] > 0 ? 0 : $this->_sections['pm_loop']['loop']-1;
if ($this->_sections['pm_loop']['show']) {
    $this->_sections['pm_loop']['total'] = $this->_sections['pm_loop']['loop'];
    if ($this->_sections['pm_loop']['total'] == 0)
        $this->_sections['pm_loop']['show'] = false;
} else
    $this->_sections['pm_loop']['total'] = 0;
if ($this->_sections['pm_loop']['show']):

            for ($this->_sections['pm_loop']['index'] = $this->_sections['pm_loop']['start'], $this->_sections['pm_loop']['iteration'] = 1;
                 $this->_sections['pm_loop']['iteration'] <= $this->_sections['pm_loop']['total'];
                 $this->_sections['pm_loop']['index'] += $this->_sections['pm_loop']['step'], $this->_sections['pm_loop']['iteration']++):
$this->_sections['pm_loop']['rownum'] = $this->_sections['pm_loop']['iteration'];
$this->_sections['pm_loop']['index_prev'] = $this->_sections['pm_loop']['index'] - $this->_sections['pm_loop']['step'];
$this->_sections['pm_loop']['index_next'] = $this->_sections['pm_loop']['index'] + $this->_sections['pm_loop']['step'];
$this->_sections['pm_loop']['first']      = ($this->_sections['pm_loop']['iteration'] == 1);
$this->_sections['pm_loop']['last']       = ($this->_sections['pm_loop']['iteration'] == $this->_sections['pm_loop']['total']);
?>
  <tr>
  <td class='messages_view1' width='1'>
    <a href='<?php echo $this->_tpl_vars['url']->url_create('profile',$this->_tpl_vars['pms'][$this->_sections['pm_loop']['index']]['author']->user_info['user_username']); ?>
'><img class='photo' src='<?php echo $this->_tpl_vars['pms'][$this->_sections['pm_loop']['index']]['author']->user_photo("./images/nophoto.gif",'TRUE'); ?>
' width='60' height='60' border='0'></a>
    <?php if ($this->_sections['pm_loop']['last']): ?><a name='bottom'></a><?php endif; ?>
  </td>
  <td class='messages_authorbox' nowrap='nowrap'>
    <div class='messages_author'><a href='<?php echo $this->_tpl_vars['url']->url_create('profile',$this->_tpl_vars['pms'][$this->_sections['pm_loop']['index']]['author']->user_info['user_username']); ?>
'><?php echo ((is_array($_tmp=$this->_tpl_vars['pms'][$this->_sections['pm_loop']['index']]['author']->user_displayname)) ? $this->_run_mod_handler('truncate', true, $_tmp, 20, "...", true) : smarty_modifier_truncate($_tmp, 20, "...", true)); ?>
</a></div>
    <div class='messages_date'><?php echo $this->_tpl_vars['datetime']->cdate(($this->_tpl_vars['setting']['setting_timeformat'])." ".($this->_tpl_vars['setting']['setting_dateformat']),$this->_tpl_vars['datetime']->timezone($this->_tpl_vars['pms'][$this->_sections['pm_loop']['index']]['pm_date'],$this->_tpl_vars['global_timezone'])); ?>
</div>
  </td>
  <td class='messages_view2'><?php echo ((is_array($_tmp=$this->_tpl_vars['pms'][$this->_sections['pm_loop']['index']]['pm_body'])) ? $this->_run_mod_handler('choptext', true, $_tmp, 75, "<br>") : smarty_modifier_choptext($_tmp, 75, "<br>")); ?>
</td>
  </tr>
  <tr><td colspan='3'>&nbsp;</td></tr>
<?php endfor; endif; ?>

<tr>
<td colspan='2'>&nbsp;</td>
<td class='messages_view2_bottom'>
  <a name='reply'></a>
  <div id='reply_error' style='display: none;'><?php echo SELanguage::_get(796); ?></div>
  <?php if ($this->_tpl_vars['blockerror']): ?><div id='reply_error2' style='display: <?php echo $this->_tpl_vars['blockerror']; ?>
;'><?php echo SELanguage::_get(1321); ?></div><?php endif; ?>
  <form action='user_messages_view.php#bottom' method='POST' onSubmit="<?php echo 'if(this.reply.value.replace(/ /g, \'\') == \'\') { $(\'reply_error\').style.display=\'block\'; return false; } else { return true; }'; ?>
">
  <?php if (count($this->_tpl_vars['collaborators']) == 1): 
 echo SELanguage::_get(802); 
 else: 
 echo SELanguage::_get(803); 
 endif; ?><br>
  <textarea name='reply' id='reply_body' rows='3' cols='60' style='margin-bottom: 5px; width: 100%;'></textarea>
  <br>
  <input type='submit' class='button' value='<?php echo SELanguage::_get(791); ?>'>

    <?php if ($this->_tpl_vars['b'] == 0): ?>
    <input type='button' class='button' value='<?php echo SELanguage::_get(805); ?>' onClick="window.location.href='user_messages.php';">
    <?php else: ?>
    <input type='button' class='button' value='<?php echo SELanguage::_get(806); ?>' onClick="window.location.href='user_messages_outbox.php';">
  <?php endif; ?>

  <input type='hidden' name='task' value='reply'>
  <input type='hidden' name='pmconvo_id' value='<?php echo $this->_tpl_vars['pmconvo_info']['pmconvo_id']; ?>
'>
  </form>

  <div style='padding-top: 15px;'><a href='user_messages_view.php?pmconvo_id=<?php echo $this->_tpl_vars['pmconvo_info']['pmconvo_id']; ?>
&task=delete'><?php echo SELanguage::_get(1181); ?></a></div>

</td>
</tr>

</table>



<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>