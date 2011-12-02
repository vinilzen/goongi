<?php /* Smarty version 2.6.14, created on 2011-12-02 09:45:40
         compiled from user_friends_requests.tpl */
?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'math', 'user_friends_requests.tpl', 45, false),)), $this);
?><?php
SELanguage::_preload_multi(895,652,894,896,909,910,182,184,185,183,509,849,906,882,907,887,911,839);
SELanguage::load();
?>﻿<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<h1><?php echo SELanguage::_get(895); ?><!-- Со мной хотят дружить --></h1>
						
<div class="crumb">
	<a href="/">Главная</a>
	<a href='<?php echo $this->_tpl_vars['url']->url_create('profile',$this->_tpl_vars['user']->user_info['user_username']); ?>
'><?php echo SELanguage::_get(652); ?></a>
	<span><?php echo SELanguage::_get(895); ?><!-- Мои друзья --></span>
</div>
<ul class="vk">
	<li><a href="user_friends.php"><?php echo SELanguage::_get(894); ?></a></li>
	<li class="active"><a href="user_friends_requests.php" ><?php echo SELanguage::_get(895); ?></a></li>
	<li><a href="user_friends_requests_outgoing.php"><?php echo SELanguage::_get(896); ?></a></li>
</ul>

<div class='page_header'><?php echo SELanguage::_get(895); ?></div>
<div><?php echo SELanguage::_get(909); ?></div>


<?php if ($this->_tpl_vars['total_friends'] == 0): 
 echo SELanguage::_get(910); 
 else: ?>

    <?php echo '
  <script type="text/javascript">
  <!-- 
  function friend_update(status) {
    '; ?>

    window.location = 'user_friends_requests.php?p=<?php echo $this->_tpl_vars['p']; ?>
';
    <?php echo '
  }
  //-->
  </script>
  '; ?>


    <?php if ($this->_tpl_vars['maxpage'] > 1): ?>
    <br>
    <div class='center'>
    <?php if ($this->_tpl_vars['p'] != 1): ?><a href='user_friends_requests.php?p=<?php echo smarty_function_math(array('equation' => 'p-1','p' => $this->_tpl_vars['p']), $this);?>
'>&#171; <?php echo SELanguage::_get(182); ?></a><?php else: ?><font class='disabled'>&#171; <?php echo SELanguage::_get(182); ?></font><?php endif; ?>
    <?php if ($this->_tpl_vars['p_start'] == $this->_tpl_vars['p_end']): ?>
      &nbsp;|&nbsp; <?php echo sprintf(SELanguage::_get(184), $this->_tpl_vars['p_start'], $this->_tpl_vars['total_friends']); ?> &nbsp;|&nbsp; 
    <?php else: ?>
      &nbsp;|&nbsp; <?php echo sprintf(SELanguage::_get(185), $this->_tpl_vars['p_start'], $this->_tpl_vars['p_end'], $this->_tpl_vars['total_friends']); ?> &nbsp;|&nbsp; 
    <?php endif; ?>
    <?php if ($this->_tpl_vars['p'] != $this->_tpl_vars['maxpage']): ?><a href='user_friends_requests.php?p=<?php echo smarty_function_math(array('equation' => 'p+1','p' => $this->_tpl_vars['p']), $this);?>
'><?php echo SELanguage::_get(183); ?> &#187;</a><?php else: ?><font class='disabled'><?php echo SELanguage::_get(183); ?> &#187;</font><?php endif; ?>
    </div>
  <?php endif; ?>
 <ul class="friends_list">
  <?php unset($this->_sections['friend_loop']);
$this->_sections['friend_loop']['name'] = 'friend_loop';
$this->_sections['friend_loop']['loop'] = is_array($_loop=$this->_tpl_vars['friends']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['friend_loop']['show'] = true;
$this->_sections['friend_loop']['max'] = $this->_sections['friend_loop']['loop'];
$this->_sections['friend_loop']['step'] = 1;
$this->_sections['friend_loop']['start'] = $this->_sections['friend_loop']['step'] > 0 ? 0 : $this->_sections['friend_loop']['loop']-1;
if ($this->_sections['friend_loop']['show']) {
    $this->_sections['friend_loop']['total'] = $this->_sections['friend_loop']['loop'];
    if ($this->_sections['friend_loop']['total'] == 0)
        $this->_sections['friend_loop']['show'] = false;
} else
    $this->_sections['friend_loop']['total'] = 0;
if ($this->_sections['friend_loop']['show']):

            for ($this->_sections['friend_loop']['index'] = $this->_sections['friend_loop']['start'], $this->_sections['friend_loop']['iteration'] = 1;
                 $this->_sections['friend_loop']['iteration'] <= $this->_sections['friend_loop']['total'];
                 $this->_sections['friend_loop']['index'] += $this->_sections['friend_loop']['step'], $this->_sections['friend_loop']['iteration']++):
$this->_sections['friend_loop']['rownum'] = $this->_sections['friend_loop']['iteration'];
$this->_sections['friend_loop']['index_prev'] = $this->_sections['friend_loop']['index'] - $this->_sections['friend_loop']['step'];
$this->_sections['friend_loop']['index_next'] = $this->_sections['friend_loop']['index'] + $this->_sections['friend_loop']['step'];
$this->_sections['friend_loop']['first']      = ($this->_sections['friend_loop']['iteration'] == 1);
$this->_sections['friend_loop']['last']       = ($this->_sections['friend_loop']['iteration'] == $this->_sections['friend_loop']['total']);
?>
      <li id="frend_<?php echo $this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->user_info['user_id']; ?>
">
		<a href="<?php echo $this->_tpl_vars['url']->url_create('profile',$this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->user_info['user_username']); ?>
" class="frend_img">
			<img src="<?php echo $this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->user_photo('./images/nophoto.gif'); ?>
" class="photo" width="<?php echo $this->_tpl_vars['misc']->photo_size($this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->user_photo('./images/nophoto.gif'),'90','90','w'); ?>
" border="0" alt="<?php echo sprintf(SELanguage::_get(509), $this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->user_displayname_short); ?>" />
		</a>
    
		<div><font class='big'><a href='<?php echo $this->_tpl_vars['url']->url_create('profile',$this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->user_info['user_username']); ?>
'><img src='./images/icons/user16.gif' border='0' class='icon'><?php echo $this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->user_displayname; ?>
</a></div></font><br>
      
      <?php if ($this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->user_info['user_dateupdated'] != 0): 
 echo SELanguage::_get(849); ?> &nbsp;<?php $this->assign('last_updated', $this->_tpl_vars['datetime']->time_since($this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->user_info['user_dateupdated'])); 
 echo sprintf(SELanguage::_get($this->_tpl_vars['last_updated'][0]), $this->_tpl_vars['last_updated'][1]); 
 endif; ?>
      <?php if ($this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->user_info['user_lastlogindate'] != 0): 
 echo SELanguage::_get(906); ?> &nbsp;<?php $this->assign('last_login', $this->_tpl_vars['datetime']->time_since($this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->user_info['user_lastlogindate'])); 
 echo sprintf(SELanguage::_get($this->_tpl_vars['last_login'][0]), $this->_tpl_vars['last_login'][1]); 
 endif; ?>
      <?php if ($this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->friend_type != ""): 
 echo SELanguage::_get(882); ?> &nbsp;<?php echo $this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->friend_type; 
 endif; ?>
      <?php if ($this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->friend_explain != ""): 
 echo SELanguage::_get(907); ?> &nbsp;<?php echo $this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->friend_explain; ?>
</td></tr><?php endif; ?>

    <a class="add" rel="<?php echo $this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->user_info['user_id']; ?>
" rev="<?php echo $this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->user_info['user_username']; ?>
" href="user_friends_manage.php?user=<?php echo $this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->user_info['user_username']; ?>
"><?php echo SELanguage::_get(887); ?></a><br>
    <a class="reject" rel="<?php echo $this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->user_info['user_id']; ?>
" rev="<?php echo $this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->user_info['user_username']; ?>
" href="user_friends_manage.php?task=reject&user=<?php echo $this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->user_info['user_username']; ?>
"><?php echo SELanguage::_get(911); ?></a><br>
    <?php if ($this->_tpl_vars['user']->level_info['level_message_allow'] != 0): ?>
		<a href="user_messages_new.php?to_user=<?php echo $this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->user_displayname; ?>
&to_id=<?php echo $this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->user_info['user_username']; ?>
">			<?php echo SELanguage::_get(839); ?>
		</a><br>
	<?php endif; ?>
    </li>
  <?php endfor; endif; ?>
</ul>
    <?php if ($this->_tpl_vars['maxpage'] > 1): ?>
    <br>
    <div class='center'>
    <?php if ($this->_tpl_vars['p'] != 1): ?><a href='user_friends_requests.php?p=<?php echo smarty_function_math(array('equation' => 'p-1','p' => $this->_tpl_vars['p']), $this);?>
'>&#171; <?php echo SELanguage::_get(182); ?></a><?php else: ?><font class='disabled'>&#171; <?php echo SELanguage::_get(182); ?></font><?php endif; ?>
    <?php if ($this->_tpl_vars['p_start'] == $this->_tpl_vars['p_end']): ?>
      &nbsp;|&nbsp; <?php echo sprintf(SELanguage::_get(184), $this->_tpl_vars['p_start'], $this->_tpl_vars['total_friends']); ?> &nbsp;|&nbsp; 
    <?php else: ?>
      &nbsp;|&nbsp; <?php echo sprintf(SELanguage::_get(185), $this->_tpl_vars['p_start'], $this->_tpl_vars['p_end'], $this->_tpl_vars['total_friends']); ?> &nbsp;|&nbsp; 
    <?php endif; ?>
    <?php if ($this->_tpl_vars['p'] != $this->_tpl_vars['maxpage']): ?><a href='user_friends_requests.php?p=<?php echo smarty_function_math(array('equation' => 'p+1','p' => $this->_tpl_vars['p']), $this);?>
'><?php echo SELanguage::_get(183); ?> &#187;</a><?php else: ?><font class='disabled'><?php echo SELanguage::_get(183); ?> &#187;</font><?php endif; ?>
    </div>
  <?php endif; ?>
  
<?php endif; ?>  
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>