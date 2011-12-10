<?php /* Smarty version 2.6.14, created on 2011-12-10 12:39:41
         compiled from user_messages_outbox.tpl */
?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'math', 'user_messages_outbox.tpl', 47, false),array('modifier', 'truncate', 'user_messages_outbox.tpl', 74, false),array('modifier', 'choptext', 'user_messages_outbox.tpl', 82, false),)), $this);
?><?php
SELanguage::_preload_multi(652,780,781,784,182,184,185,183,799,155,786,788);
SELanguage::load();
?>﻿<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<h1>мои сообщения</h1>
<div class="crumb">
	<a href="/">Главная</a>
	<a href='<?php echo $this->_tpl_vars['url']->url_create('profile',$this->_tpl_vars['user']->user_info['user_username']); ?>
'	><?php echo SELanguage::_get(652); ?></a>
	<span>Mои сообщения</span>
</div>
<ul class="vk">
	<li><a href="/user_messages.php"><?php echo SELanguage::_get(780); ?><!-- Полученные --><font><?php if ($this->_tpl_vars['user_unread_pms'] > 0): ?>(<?php echo $this->_tpl_vars['user_unread_pms']; ?>
)<?php endif; ?></font></a></li>
	<li class="active last_b"><a href="/user_messages_outbox.php"><?php echo SELanguage::_get(781); ?><!-- Отправленные --></a></li>
	<!-- <li><a href="#">Спам  <font>(8)</font></a></li> -->
	<li id="add_msg"><a href="user_messages_new.php"><?php echo SELanguage::_get(784); ?><!-- Написать сообщение --></a></li>
</ul>
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
  <?php if ($this->_tpl_vars['p'] != 1): ?><a href='user_messages_outbox.php?p=<?php echo smarty_function_math(array('equation' => 'p-1','p' => $this->_tpl_vars['p']), $this);?>
'>&#171; <?php echo SELanguage::_get(182); ?></a><?php else: ?><font class='disabled'>&#171; <?php echo SELanguage::_get(182); ?></font><?php endif; ?>
  <?php if ($this->_tpl_vars['p_start'] == $this->_tpl_vars['p_end']): ?>
    &nbsp;|&nbsp; <?php echo sprintf(SELanguage::_get(184), $this->_tpl_vars['p_start'], $this->_tpl_vars['total_pms']); ?> &nbsp;|&nbsp; 
  <?php else: ?>
    &nbsp;|&nbsp; <?php echo sprintf(SELanguage::_get(185), $this->_tpl_vars['p_start'], $this->_tpl_vars['p_end'], $this->_tpl_vars['total_pms']); ?> &nbsp;|&nbsp; 
  <?php endif; ?>
  <?php if ($this->_tpl_vars['p'] != $this->_tpl_vars['maxpage']): ?><a href='user_messages_outbox.php?p=<?php echo smarty_function_math(array('equation' => 'p+1','p' => $this->_tpl_vars['p']), $this);?>
'><?php echo SELanguage::_get(183); ?> &#187;</a><?php else: ?><font class='disabled'><?php echo SELanguage::_get(183); ?> &#187;</font><?php endif; ?>
  </div>
<br>
<?php endif; 
 if ($this->_tpl_vars['total_pms'] == 0): ?>
  <div class='center'><?php echo SELanguage::_get(799); ?></div>
<?php else: ?>

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
	<li>
	<!-- <input type='checkbox' name='delete_convos[]' value='<?php echo $this->_tpl_vars['pms'][$this->_sections['pm_loop']['index']]['pmconvo_id']; ?>
'> -->
	<a href='user_messages_view.php?b=1&pmconvo_id=<?php echo $this->_tpl_vars['pms'][$this->_sections['pm_loop']['index']]['pmconvo_id']; ?>
&task=delete' class="del"><?php echo SELanguage::_get(155); ?></a>
	<a href="<?php echo $this->_tpl_vars['url']->url_create('profile',$this->_tpl_vars['pms'][$this->_sections['pm_loop']['index']]['pm_user']->user_info['user_username']); ?>
">
		<img src="<?php echo $this->_tpl_vars['pms'][$this->_sections['pm_loop']['index']]['pm_user']->user_photo('./images/nophoto.gif','TRUE'); ?>
" alt="<?php echo sprintf(SELanguage::_get(786), $this->_tpl_vars['pms'][$this->_sections['pm_loop']['index']]['pm_user']->user_displayname_short); ?>" />
	</a>
	<a href="<?php echo $this->_tpl_vars['url']->url_create('profile',$this->_tpl_vars['pms'][$this->_sections['pm_loop']['index']]['pm_user']->user_info['user_username']); ?>
" class="name"><?php echo ((is_array($_tmp=$this->_tpl_vars['pms'][$this->_sections['pm_loop']['index']]['author']->user_displayname)) ? $this->_run_mod_handler('truncate', true, $_tmp, 20, "...", true) : smarty_modifier_truncate($_tmp, 20, "...", true)); ?>
</a>
	<span><?php echo $this->_tpl_vars['datetime']->cdate(($this->_tpl_vars['setting']['setting_timeformat'])." ".($this->_tpl_vars['setting']['setting_dateformat']),$this->_tpl_vars['datetime']->timezone($this->_tpl_vars['pms'][$this->_sections['pm_loop']['index']]['pm_date'],$this->_tpl_vars['global_timezone'])); ?>
</span>
	
	
	<a href='user_messages_view.php?pmconvo_id=<?php echo $this->_tpl_vars['pms'][$this->_sections['pm_loop']['index']]['pmconvo_id']; ?>
#bottom'>
		<?php echo ((is_array($_tmp=$this->_tpl_vars['pms'][$this->_sections['pm_loop']['index']]['pmconvo_subject'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 50) : smarty_modifier_truncate($_tmp, 50)); ?>

	</a>
		
	<p><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['pms'][$this->_sections['pm_loop']['index']]['pm_body'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 150) : smarty_modifier_truncate($_tmp, 150)))) ? $this->_run_mod_handler('choptext', true, $_tmp, 75, "<br>") : smarty_modifier_choptext($_tmp, 75, "<br>")); ?>
</p>
	<?php if ($this->_sections['pm_loop']['last']): ?><a name='bottom'></a><?php endif; ?>
	</li>
 <?php endfor; endif; ?>
</ul>
  
  <br>

  <input type='submit' class='button' value='<?php echo SELanguage::_get(788); ?>'>
  <input type='hidden' name='task' value='deleteselected'>
  <input type='hidden' name='p' value='<?php echo $this->_tpl_vars['p']; ?>
'>
  </form>

<?php endif; 
 $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>