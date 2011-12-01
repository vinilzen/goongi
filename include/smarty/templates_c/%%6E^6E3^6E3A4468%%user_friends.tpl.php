<?php /* Smarty version 2.6.14, created on 2011-12-01 16:01:57
         compiled from user_friends.tpl */
?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'math', 'user_friends.tpl', 171, false),array('function', 'cycle', 'user_friends.tpl', 207, false),array('modifier', 'truncate', 'user_friends.tpl', 198, false),)), $this);
?><?php
SELanguage::_preload_multi(894,652,895,896,899,646,900,901,902,903,905,904,182,184,185,183,509,849,906,907,839,836,889);
SELanguage::load();
?>﻿<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<h1><?php echo SELanguage::_get(894); ?><!-- Мои друзья --></h1>
<div class="crumb">
	<a href="/">Главная</a>
	<a href='<?php echo $this->_tpl_vars['url']->url_create('profile',$this->_tpl_vars['user']->user_info['user_username']); ?>
'><?php echo SELanguage::_get(652); ?></a>
	<span><?php echo SELanguage::_get(894); ?><!-- Мои друзья --></span>
</div>
<ul class="vk">
	<li class="active"><a href="user_friends.php"><?php echo SELanguage::_get(894); ?></a></li>
	<li><a href="user_friends_requests.php" ><?php echo SELanguage::_get(895); ?></a></li>
	<li><a href="user_friends_requests_outgoing.php"><?php echo SELanguage::_get(896); ?></a></li>
</ul>
<div class="buttons">
	<span class="button2" id="add_group_link"><span class="l">&nbsp;</span><span class="c">
		<input type="button" value="Создать группу" id="create_group" name="creat" />
	</span><span class="r">&nbsp;</span></span>
</div>
<?php echo '
<script type="text/javascript">
function createGroup() {

	$(\'#msg_gr\').html(\'<img src="/images/96.gif" border="0" />\');
	var go = 1;
	if (go == 1) {
		go = 0;
		$.post(
			"user_add_group.php", 	
			{ task: \'add\' , gn: $(\'#group_name\').attr(\'value\') },
			function(data) {
				if ( data.success == \'0\') {
					$(\'#msg_gr\').html(data.msg);
					go = 1;
				}
				if (data.success == \'1\') {
					$(\'#msg_gr\').html(data.msg);
					setTimeout ( function() {
						$(\'#popup\').fadeOut(300);
						$(\'.window\').hide();
						e.preventDefault();
					}, 1500);
					
					update_group_list();
				}
			}
			, "json" 
		);
	}
}
function update_group_list() {

	$.post(
			"user_add_group.php", 
			{ task: \'update\' },
			function(data) {
				if ( data.success == \'0\') {
					alert(data.msg);
					go = 1;
				}
				if (data.success == \'1\') {
					$(\'#user_groups\').html(data.msg);
				}
			}
			, "json" 
		);
	
}
function show_user() {
	alert(\'filtr\');
}

</script>
'; ?>

<div class="group_list">
	<h2>Список групп</h2>
	<ul id="user_groups">
	<?php $_from = $this->_tpl_vars['groups']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
	<li><a href="#" rel="<?php echo $this->_tpl_vars['k']; ?>
" onclick="show_user(<?php echo $this->_tpl_vars['v']['users']; ?>
);return false;"><?php echo $this->_tpl_vars['v']['name']; ?>
</a></li>
	<?php endforeach; endif; unset($_from); ?></ul>
</div>


<?php echo '
<script type="text/javascript">
<!-- 
  window.addEvent(\'domready\', function(){
	var options = {
		script:"misc_js.php?task=suggest_friend&limit=5&",
		varname:"input",
		json:true,
		shownoresults:false,
		maxresults:5,
		multisuggest:false,
		callback: function (obj) { }
	};
	var as_json = new bsn.AutoSuggest(\'search\', options);
  });
//-->
</script>
'; ?>


<div class='friends_search'>
  <table cellpadding='0' cellspacing='0' align='center'>
  <tr>
  <td align='right'><?php echo SELanguage::_get(899); ?> &nbsp;</td>
  <td>
    <form action='user_friends.php' method='post' name='searchform'>
    <input type='text' maxlength='100' size='30' class='text' id='search' name='search' value='<?php echo $this->_tpl_vars['search']; ?>
'>&nbsp;
    <div id='suggest' class='suggest'></div>
  </td>
  <td>
    <input type='submit' class='button' value='<?php echo SELanguage::_get(646); ?>'>
    <input type='hidden' name='s' value='<?php echo $this->_tpl_vars['s']; ?>
'>
    <input type='hidden' name='p' value='<?php echo $this->_tpl_vars['p']; ?>
'>
  </td>
  </tr>
  <tr>
  <td class='friends_sort' align='right'><?php echo SELanguage::_get(900); ?> &nbsp;</td>
  <td class='friends_sort'>
    <select name='s' class='small'>
    <option value='<?php echo $this->_tpl_vars['u']; ?>
'<?php if ($this->_tpl_vars['s'] == 'ud'): ?> SELECTED<?php endif; ?>><?php echo SELanguage::_get(901); ?></option>
    <option value='<?php echo $this->_tpl_vars['l']; ?>
'<?php if ($this->_tpl_vars['s'] == 'ld'): ?> SELECTED<?php endif; ?>><?php echo SELanguage::_get(902); ?></option>
    <option value='<?php echo $this->_tpl_vars['t']; ?>
'<?php if ($this->_tpl_vars['s'] == 't'): ?> SELECTED<?php endif; ?>><?php echo SELanguage::_get(903); ?></option>
    </select>
    </form>
  </td>
  </tr>
  </table>
</div>

<?php if ($this->_tpl_vars['total_friends'] == 0): ?>

    <?php if ($this->_tpl_vars['search'] != ""): ?>
    <table cellpadding='0' cellspacing='0' align='center'>
    <tr><td class='result'>
      <img src='./images/icons/bulb16.gif' border='0' class='icon'><?php echo SELanguage::_get(905); ?>
    </td></tr>
    </table>
    <?php else: ?>
    <table cellpadding='0' cellspacing='0' align='center'>
    <tr><td class='result'>
      <img src='./images/icons/bulb16.gif' border='0' class='icon'><?php echo SELanguage::_get(904); ?>
    </td></tr>
    </table>
  <?php endif; 
 else: ?>

    <?php echo '
  <script type="text/javascript">
  <!-- 
  function friend_update(status) {
    '; ?>

    window.location = 'user_friends.php?s=<?php echo $this->_tpl_vars['s']; ?>
&search=<?php echo $this->_tpl_vars['search']; ?>
&p=<?php echo $this->_tpl_vars['p']; ?>
';
    <?php echo '
  }
  //-->
  </script>
  '; ?>


    <?php if ($this->_tpl_vars['maxpage'] > 1): ?>
    <div class='center' style='margin-top: 10px;'>
      <?php if ($this->_tpl_vars['p'] != 1): ?><a href='user_friends.php?s=<?php echo $this->_tpl_vars['s']; ?>
&search=<?php echo $this->_tpl_vars['search']; ?>
&p=<?php echo smarty_function_math(array('equation' => 'p-1','p' => $this->_tpl_vars['p']), $this);?>
'>&#171; <?php echo SELanguage::_get(182); ?></a><?php else: ?><font class='disabled'>&#171; <?php echo SELanguage::_get(182); ?></font><?php endif; ?>
      <?php if ($this->_tpl_vars['p_start'] == $this->_tpl_vars['p_end']): ?>
        &nbsp;|&nbsp; <?php echo sprintf(SELanguage::_get(184), $this->_tpl_vars['p_start'], $this->_tpl_vars['total_friends']); ?> &nbsp;|&nbsp; 
      <?php else: ?>
        &nbsp;|&nbsp; <?php echo sprintf(SELanguage::_get(185), $this->_tpl_vars['p_start'], $this->_tpl_vars['p_end'], $this->_tpl_vars['total_friends']); ?> &nbsp;|&nbsp; 
      <?php endif; ?>
      <?php if ($this->_tpl_vars['p'] != $this->_tpl_vars['maxpage']): ?><a href='user_friends.php?s=<?php echo $this->_tpl_vars['s']; ?>
&search=<?php echo $this->_tpl_vars['search']; ?>
&p=<?php echo smarty_function_math(array('equation' => 'p+1','p' => $this->_tpl_vars['p']), $this);?>
'><?php echo SELanguage::_get(183); ?> &#187;</a><?php else: ?><font class='disabled'><?php echo SELanguage::_get(183); ?> &#187;</font><?php endif; ?>
    </div>
  <?php endif; ?>

  <div style='margin-left: auto; margin-right: auto; width: 850px;'>
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
"  class="frend_img">
			<img src='<?php echo $this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->user_photo('./images/nophoto.gif'); ?>
' class='photo' width='<?php echo $this->_tpl_vars['misc']->photo_size($this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->user_photo('./images/nophoto.gif'),'90','90','w'); ?>
' border='0' alt="<?php echo sprintf(SELanguage::_get(509), $this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->user_displayname_short); ?>">
		</a>
		<div>
			<p><a href="#">vip</a><a href="#">название группы</a></p>
			<h2><a href='<?php echo $this->_tpl_vars['url']->url_create('profile',$this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->user_info['user_username']); ?>
'>
				<?php echo $this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->user_displayname; ?>

			</a></h2>
			<div class='friends_stats'>
				<?php if ($this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->user_info['user_dateupdated'] != 0): ?><div><?php echo SELanguage::_get(849); ?> <?php $this->assign('last_updated', $this->_tpl_vars['datetime']->time_since($this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->user_info['user_dateupdated'])); 
 echo sprintf(SELanguage::_get($this->_tpl_vars['last_updated'][0]), $this->_tpl_vars['last_updated'][1]); ?></div><?php endif; ?>
				<?php if ($this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->user_info['user_lastlogindate'] != 0): ?><div><?php echo SELanguage::_get(906); ?> <?php $this->assign('last_login', $this->_tpl_vars['datetime']->time_since($this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->user_info['user_lastlogindate'])); 
 echo sprintf(SELanguage::_get($this->_tpl_vars['last_login'][0]), $this->_tpl_vars['last_login'][1]); ?></div><?php endif; ?>
				<?php if ($this->_tpl_vars['show_details'] != 0): ?>
					<?php if ($this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->friend_explain != ""): ?><div><?php echo SELanguage::_get(907); ?> &nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->friend_explain)) ? $this->_run_mod_handler('truncate', true, $_tmp, 30, "...", true) : smarty_modifier_truncate($_tmp, 30, "...", true)); ?>
</div><?php endif; ?>
				<?php endif; ?>
			</div>
			
			<a href="#" rev="<?php echo $this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->user_info['user_id']; ?>
" class="send_msg_to"><?php echo SELanguage::_get(839); ?></a><br />
			<a href='profile.php?user=<?php echo $this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->user_info['user_username']; ?>
&v=friends'><?php echo sprintf(SELanguage::_get(836), ''); ?></a><br />
			<a class="del" rel="<?php echo $this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->user_info['user_id']; ?>
" rev="<?php echo $this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->user_info['user_username']; ?>
" href="#"><?php echo SELanguage::_get(889); ?></a>
		</div>
	</li>
      <?php echo smarty_function_cycle(array('values' => ",<div style='clear: both;'></div>"), $this);?>
 
    <?php endfor; endif; ?>
    </ul>
  </div>

    <?php if ($this->_tpl_vars['maxpage'] > 1): ?>
    <div class='center' style='margin-top: 10px;'>
      <?php if ($this->_tpl_vars['p'] != 1): ?><a href='user_friends.php?s=<?php echo $this->_tpl_vars['s']; ?>
&search=<?php echo $this->_tpl_vars['search']; ?>
&p=<?php echo smarty_function_math(array('equation' => 'p-1','p' => $this->_tpl_vars['p']), $this);?>
'>&#171; <?php echo SELanguage::_get(182); ?></a><?php else: ?><font class='disabled'>&#171; <?php echo SELanguage::_get(182); ?></font><?php endif; ?>
      <?php if ($this->_tpl_vars['p_start'] == $this->_tpl_vars['p_end']): ?>
        &nbsp;|&nbsp; <?php echo sprintf(SELanguage::_get(184), $this->_tpl_vars['p_start'], $this->_tpl_vars['total_friends']); ?> &nbsp;|&nbsp; 
      <?php else: ?>
        &nbsp;|&nbsp; <?php echo sprintf(SELanguage::_get(185), $this->_tpl_vars['p_start'], $this->_tpl_vars['p_end'], $this->_tpl_vars['total_friends']); ?> &nbsp;|&nbsp; 
      <?php endif; ?>
      <?php if ($this->_tpl_vars['p'] != $this->_tpl_vars['maxpage']): ?><a href='user_friends.php?s=<?php echo $this->_tpl_vars['s']; ?>
&search=<?php echo $this->_tpl_vars['search']; ?>
&p=<?php echo smarty_function_math(array('equation' => 'p+1','p' => $this->_tpl_vars['p']), $this);?>
'><?php echo SELanguage::_get(183); ?> &#187;</a><?php else: ?><font class='disabled'><?php echo SELanguage::_get(183); ?> &#187;</font><?php endif; ?>
    </div>
  <?php endif; 
 endif; 
 $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>