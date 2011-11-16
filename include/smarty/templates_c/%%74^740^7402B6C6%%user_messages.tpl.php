<?php /* Smarty version 2.6.14, created on 2011-11-10 17:09:48
         compiled from user_messages.tpl */
?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'math', 'user_messages.tpl', 52, false),array('modifier', 'truncate', 'user_messages.tpl', 107, false),array('modifier', 'choptext', 'user_messages.tpl', 108, false),)), $this);
?><?php
SELanguage::_preload_multi(780,781,784,182,184,185,183,785,601,520,155,786,788);
SELanguage::load();
?>﻿<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<div class="all">
	<div class="center_all">
		<div class="block4">
			<div class="c">
				<div class="bg_l">
					<div class="bg_r">
						<h1>мои сообщения</h1>
						<div class="crumb"><a href="#">Главная</a><a href="#">Профиль</a><span>Mои сообщения</span></div>
						<ul class="vk">
							<li class="active"><a href="/user_messages.php"><?php echo SELanguage::_get(780); ?><!-- Полученные --><font><?php if ($this->_tpl_vars['user_unread_pms'] > 0): ?>(<?php echo $this->_tpl_vars['user_unread_pms']; ?>
)<?php endif; ?></font></a></li>
							<li><a href="/user_messages_outbox.php"><?php echo SELanguage::_get(781); ?><!-- Отправленные --></a></li>
							<li><a href="#">Спам  <font>(8)</font></a></li>
							<li id="add_msg"><a href="javascript:TB_show('<?php echo SELanguage::_get(784); ?>', 'user_messages_new.php?TB_iframe=true&height=400&width=450', '', './images/trans.gif');"><?php echo SELanguage::_get(784); ?><!-- Написать сообщение --></a></li>
						</ul>
						<div class="message">
<?php echo '
  <script language=\'JavaScript\'> 
  <!---
  var checkboxcount = 1;
  function doCheckAll() {
    if(checkboxcount == 0) {
      with (document.messageform) {
      for (var i=0; i < elements.length; i++) {
      if (elements[i].type == \'checkbox\') {
      elements[i].checked = false;
      }}
      checkboxcount = checkboxcount + 1;
      }
    } else
      with (document.messageform) {
      for (var i=0; i < elements.length; i++) {
      if (elements[i].type == \'checkbox\') {
      elements[i].checked = true;
      }}
      checkboxcount = checkboxcount - 1;
      }
  }
  // -->
  </script>
'; 
 if ($this->_tpl_vars['maxpage'] > 1): ?>
  <div class='center'>
	<?php if ($this->_tpl_vars['p'] != 1): ?>
		<a href='user_messages.php?p=<?php echo smarty_function_math(array('equation' => 'p-1','p' => $this->_tpl_vars['p']), $this);?>
'>&#171; <?php echo SELanguage::_get(182); ?></a>
	<?php else: ?>
		<font class='disabled'>&#171; <?php echo SELanguage::_get(182); ?></font>
	<?php endif; ?>
  <?php if ($this->_tpl_vars['p_start'] == $this->_tpl_vars['p_end']): ?>
    &nbsp;|&nbsp; <?php echo sprintf(SELanguage::_get(184), $this->_tpl_vars['p_start'], $this->_tpl_vars['total_pms']); ?> &nbsp;|&nbsp; 
  <?php else: ?>
    &nbsp;|&nbsp; <?php echo sprintf(SELanguage::_get(185), $this->_tpl_vars['p_start'], $this->_tpl_vars['p_end'], $this->_tpl_vars['total_pms']); ?> &nbsp;|&nbsp; 
  <?php endif; ?>
  <?php if ($this->_tpl_vars['p'] != $this->_tpl_vars['maxpage']): ?><a href='user_messages.php?p=<?php echo smarty_function_math(array('equation' => 'p+1','p' => $this->_tpl_vars['p']), $this);?>
'><?php echo SELanguage::_get(183); ?> &#187;</a><?php else: ?><font class='disabled'><?php echo SELanguage::_get(183); ?> &#187;</font><?php endif; ?>
  </div>
<br>
<?php endif; 
 if ($this->_tpl_vars['total_pms'] == 0): ?>

  <div class='center'>
  <table cellpadding='0' cellspacing='0'><tr>
  <td class='result'><img src='./images/icons/bulb16.gif' border='0' class='icon'><?php echo SELanguage::_get(785); ?><!-- 785 --></td>
  </tr></table>
  </div>


<?php else: ?>

  <form action='user_messages.php' method='post' name='messageform'>


	<a href='javascript:void(0);' onClick='doCheckAll();this.blur();'>
		<img src='./images/icons/checkall16.gif' border='0' style='margin-left: 3px;'>
	</a>
<?php echo SELanguage::_get(601); ?><!-- От -->

  <?php echo SELanguage::_get(520); ?><!-- Тема -->
	<ul class="comment_list">
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

        <?php if ($this->_tpl_vars['pms'][$this->_sections['pm_loop']['index']]['pm_read'] === FALSE): ?>
      <?php $this->assign('row_class', 'messages_unread'); ?>
    <?php else: ?>
      <?php $this->assign('row_class', 'messages_read'); ?>
    <?php endif; ?>

    <li>
		<a href="user_messages_view.php?pmconvo_id=<?php echo $this->_tpl_vars['pms'][$this->_sections['pm_loop']['index']]['pmconvo_id']; ?>
&task=delete" class="del"><?php echo SELanguage::_get(155); ?><!-- удалить --></a>
		<a href="<?php echo $this->_tpl_vars['url']->url_create('profile',$this->_tpl_vars['pms'][$this->_sections['pm_loop']['index']]['pm_user']->user_info['user_username']); ?>
">
			<img src="<?php echo $this->_tpl_vars['pms'][$this->_sections['pm_loop']['index']]['pm_user']->user_photo('./images/nophoto.gif','TRUE'); ?>
" alt="<?php echo sprintf(SELanguage::_get(786), $this->_tpl_vars['pms'][$this->_sections['pm_loop']['index']]['pm_user']->user_displayname_short); ?>" />
		</a>
		<a href="<?php echo $this->_tpl_vars['url']->url_create('profile',$this->_tpl_vars['pms'][$this->_sections['pm_loop']['index']]['pm_user']->user_info['user_username']); ?>
" class="name"><?php echo $this->_tpl_vars['pms'][$this->_sections['pm_loop']['index']]['pm_user']->user_displayname; ?>
</a>
		<span><?php echo $this->_tpl_vars['datetime']->cdate(($this->_tpl_vars['setting']['setting_timeformat'])." ".($this->_tpl_vars['setting']['setting_dateformat']),$this->_tpl_vars['datetime']->timezone($this->_tpl_vars['pms'][$this->_sections['pm_loop']['index']]['pm_date'],$this->_tpl_vars['global_timezone'])); ?>
</span>
		<a href='user_messages_view.php?pmconvo_id=<?php echo $this->_tpl_vars['pms'][$this->_sections['pm_loop']['index']]['pmconvo_id']; ?>
#bottom'><?php echo ((is_array($_tmp=$this->_tpl_vars['pms'][$this->_sections['pm_loop']['index']]['pmconvo_subject'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 50) : smarty_modifier_truncate($_tmp, 50)); ?>
</a>
		<p><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['pms'][$this->_sections['pm_loop']['index']]['pm_body'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 100) : smarty_modifier_truncate($_tmp, 100)))) ? $this->_run_mod_handler('choptext', true, $_tmp, 75, "<br>") : smarty_modifier_choptext($_tmp, 75, "<br>")); ?>
</p>										
		<!-- <input type='checkbox' name='delete_convos[]' value='<?php echo $this->_tpl_vars['pms'][$this->_sections['pm_loop']['index']]['pmconvo_id']; ?>
' /><?php if ($this->_tpl_vars['pms'][$this->_sections['pm_loop']['index']]['pm_replied']): ?><div style='padding-left: 5px; padding-top: 3px;'><img src='./images/icons/message_replied16.gif' class='icon' border='0'></div><?php endif; ?></td> -->
    </li>
  <?php endfor; endif; ?>
  </ul>

  <br>

    <?php if ($this->_tpl_vars['total_pms'] != 0): ?>
    <input type='submit' class='button' value='<?php echo SELanguage::_get(788); ?>'>
    <input type='hidden' name='task' value='deleteselected'>
    <input type='hidden' name='p' value='<?php echo $this->_tpl_vars['p']; ?>
'>
  <?php endif; ?>

  </form>

<?php endif; 
 if ($this->_tpl_vars['maxpage'] > 1): ?>
  <div class='center'>
  <?php if ($this->_tpl_vars['p'] != 1): ?><a href='user_messages.php?p=<?php echo smarty_function_math(array('equation' => 'p-1','p' => $this->_tpl_vars['p']), $this);?>
'>&#171; <?php echo SELanguage::_get(182); ?></a><?php else: ?><font class='disabled'>&#171; <?php echo SELanguage::_get(182); ?></font><?php endif; ?>
  <?php if ($this->_tpl_vars['p_start'] == $this->_tpl_vars['p_end']): ?>
    &nbsp;|&nbsp; <?php echo sprintf(SELanguage::_get(184), $this->_tpl_vars['p_start'], $this->_tpl_vars['total_pms']); ?> &nbsp;|&nbsp; 
  <?php else: ?>
    &nbsp;|&nbsp; <?php echo sprintf(SELanguage::_get(185), $this->_tpl_vars['p_start'], $this->_tpl_vars['p_end'], $this->_tpl_vars['total_pms']); ?> &nbsp;|&nbsp; 
  <?php endif; ?>
  <?php if ($this->_tpl_vars['p'] != $this->_tpl_vars['maxpage']): ?><a href='user_messages.php?p=<?php echo smarty_function_math(array('equation' => 'p+1','p' => $this->_tpl_vars['p']), $this);?>
'><?php echo SELanguage::_get(183); ?> &#187;</a><?php else: ?><font class='disabled'><?php echo SELanguage::_get(183); ?> &#187;</font><?php endif; ?>
  </div>
<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>