<?php /* Smarty version 2.6.14, created on 2011-12-10 14:35:37
         compiled from profile.tpl */
?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'substr', 'profile.tpl', 70, false),array('block', 'hook_foreach', 'profile.tpl', 82, false),array('function', 'math', 'profile.tpl', 185, false),)), $this);
?><?php
SELanguage::_preload_multi(786,652,895,917,838,887,889,852,1024,930,1197,646,1022,1020,934,1023,182,184,185,183,509,849,882,907,876,922,784,839);
SELanguage::load();
?>﻿<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<!-- <div class='page_header'><?php echo sprintf(SELanguage::_get(786), $this->_tpl_vars['owner']->user_displayname); ?></div> -->
<h1><?php echo $this->_tpl_vars['owner']->user_info['user_displayname']; ?>
 [<?php echo $this->_tpl_vars['owner']->user_info['user_id']; ?>
]</h1>
<div class="crumb">
	<a href="/">Главная</a>
	<span><?php echo SELanguage::_get(652); ?><!-- Профиль --></span>
</div>
<?php if ($this->_tpl_vars['owner']->user_info['user_id'] == $this->_tpl_vars['user']->user_info['user_id']): ?>
<div class="buttons">
	<span class="button2">
		<span class="l">&nbsp;</span><span class="c">
			<a href="/user_editprofile.php">Редактировать информацию</a>
		</span><span class="r">&nbsp;</span>
	</span>
</div>
<?php endif; 
 if ($this->_tpl_vars['user']->user_exists != 0 && $this->_tpl_vars['owner']->user_info['user_id'] != $this->_tpl_vars['user']->user_info['user_id']): ?>
	<?php if ($this->_tpl_vars['owner']->user_info['user_id'] != 0): ?>
		<div class="buttons" style="overflow:visible;">
			
			<div class="profil_mn"><a href="#" class="p_link"><span>профиль</span></a>
				<div class="p_mn">
					<div class="p_mn_t"></div>
					<div class="p_mn_c">
						<div class="p_mn_b">
							<a href="javascript:void(0);" rel="/tree.php?user=<?php echo $this->_tpl_vars['owner']->user_info['user_username']; ?>
">Древо</a>
							<a href="/friends.php?user=<?php echo $this->_tpl_vars['owner']->user_info['user_username']; ?>
">Друзья</a>
							<a href="javascript:void(0);">История рода</a>
							<a href="javascript:void(0);" rel="/blog.php?user=<?php echo $this->_tpl_vars['owner']->user_info['user_username']; ?>
">Статьи</a>
							<a href="javascript:void(0);">Медали</a>
							<a href="javascript:void(0);">Визитки</a>
						</div>
					</div>
				</div>
			</div>
			<?php if ($this->_tpl_vars['is_friend_pending'] == 1): ?> <span class="button2" id="preli" ><?php echo SELanguage::_get(895); ?></span><?php endif; ?>
			<span class="button2">
				<span class="l">&nbsp;</span><span id="add_to_fr_li" class="c">
					<a href="#" id="add_to_fr" rev="<?php if ($this->_tpl_vars['is_friend_pending'] == 2): ?>cancel_do<?php endif; 
 if ($this->_tpl_vars['is_friend_pending'] == 0 && $this->_tpl_vars['is_friend'] == FALSE || $this->_tpl_vars['is_friend_pending'] == 1): ?>add_do<?php endif; 
 if ($this->_tpl_vars['is_friend'] != FALSE): ?>remove_do<?php endif; ?>" rel="<?php echo $this->_tpl_vars['owner']->user_info['user_username']; ?>
">
						<?php if ($this->_tpl_vars['is_friend_pending'] == 2): ?> <?php echo SELanguage::_get(917); 
 endif; ?>
						<?php if ($this->_tpl_vars['is_friend_pending'] == 0 && $this->_tpl_vars['is_friend'] == FALSE): 
 echo SELanguage::_get(838); 
 endif; ?>
						<?php if ($this->_tpl_vars['is_friend_pending'] == 1): ?> <?php echo SELanguage::_get(887); 
 endif; ?>
						<?php if ($this->_tpl_vars['is_friend'] != FALSE): 
 echo SELanguage::_get(889); 
 endif; ?>
					</a>							
				
			</span><span class="r">&nbsp;</span>
			</span>
			<div class="clear"></div>
		</div>
		
	<?php endif; 
 endif; ?>

<div class="my_page_inf">
	<div class="my_page_img"><img alt="" src="/uploads_user/1000/<?php echo $this->_tpl_vars['owner']->user_info['user_id']; ?>
/<?php echo $this->_tpl_vars['owner']->user_info['user_id']; ?>
.jpg"></div>
	<div class="my_page_info">
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
			<?php unset($this->_sections['subcat_loop']);
$this->_sections['subcat_loop']['name'] = 'subcat_loop';
$this->_sections['subcat_loop']['loop'] = is_array($_loop=$this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['subcat_loop']['show'] = true;
$this->_sections['subcat_loop']['max'] = $this->_sections['subcat_loop']['loop'];
$this->_sections['subcat_loop']['step'] = 1;
$this->_sections['subcat_loop']['start'] = $this->_sections['subcat_loop']['step'] > 0 ? 0 : $this->_sections['subcat_loop']['loop']-1;
if ($this->_sections['subcat_loop']['show']) {
    $this->_sections['subcat_loop']['total'] = $this->_sections['subcat_loop']['loop'];
    if ($this->_sections['subcat_loop']['total'] == 0)
        $this->_sections['subcat_loop']['show'] = false;
} else
    $this->_sections['subcat_loop']['total'] = 0;
if ($this->_sections['subcat_loop']['show']):

            for ($this->_sections['subcat_loop']['index'] = $this->_sections['subcat_loop']['start'], $this->_sections['subcat_loop']['iteration'] = 1;
                 $this->_sections['subcat_loop']['iteration'] <= $this->_sections['subcat_loop']['total'];
                 $this->_sections['subcat_loop']['index'] += $this->_sections['subcat_loop']['step'], $this->_sections['subcat_loop']['iteration']++):
$this->_sections['subcat_loop']['rownum'] = $this->_sections['subcat_loop']['iteration'];
$this->_sections['subcat_loop']['index_prev'] = $this->_sections['subcat_loop']['index'] - $this->_sections['subcat_loop']['step'];
$this->_sections['subcat_loop']['index_next'] = $this->_sections['subcat_loop']['index'] + $this->_sections['subcat_loop']['step'];
$this->_sections['subcat_loop']['first']      = ($this->_sections['subcat_loop']['iteration'] == 1);
$this->_sections['subcat_loop']['last']       = ($this->_sections['subcat_loop']['iteration'] == $this->_sections['subcat_loop']['total']);
?>
				<h2><?php echo SELanguage::_get($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['subcat_title']); ?><!-- персональная инфорвация --></h2>
								<?php unset($this->_sections['field_loop']);
$this->_sections['field_loop']['name'] = 'field_loop';
$this->_sections['field_loop']['loop'] = is_array($_loop=$this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['field_loop']['show'] = true;
$this->_sections['field_loop']['max'] = $this->_sections['field_loop']['loop'];
$this->_sections['field_loop']['step'] = 1;
$this->_sections['field_loop']['start'] = $this->_sections['field_loop']['step'] > 0 ? 0 : $this->_sections['field_loop']['loop']-1;
if ($this->_sections['field_loop']['show']) {
    $this->_sections['field_loop']['total'] = $this->_sections['field_loop']['loop'];
    if ($this->_sections['field_loop']['total'] == 0)
        $this->_sections['field_loop']['show'] = false;
} else
    $this->_sections['field_loop']['total'] = 0;
if ($this->_sections['field_loop']['show']):

            for ($this->_sections['field_loop']['index'] = $this->_sections['field_loop']['start'], $this->_sections['field_loop']['iteration'] = 1;
                 $this->_sections['field_loop']['iteration'] <= $this->_sections['field_loop']['total'];
                 $this->_sections['field_loop']['index'] += $this->_sections['field_loop']['step'], $this->_sections['field_loop']['iteration']++):
$this->_sections['field_loop']['rownum'] = $this->_sections['field_loop']['iteration'];
$this->_sections['field_loop']['index_prev'] = $this->_sections['field_loop']['index'] - $this->_sections['field_loop']['step'];
$this->_sections['field_loop']['index_next'] = $this->_sections['field_loop']['index'] + $this->_sections['field_loop']['step'];
$this->_sections['field_loop']['first']      = ($this->_sections['field_loop']['iteration'] == 1);
$this->_sections['field_loop']['last']       = ($this->_sections['field_loop']['iteration'] == $this->_sections['field_loop']['total']);
?>
				<p>
					<span>
						<?php echo SELanguage::_get($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_title']); ?>:
					</span>
					<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_value_formatted']; ?>

					<?php if ($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_special'] == 1 && ((is_array($_tmp=$this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_value'])) ? $this->_run_mod_handler('substr', true, $_tmp, 0, 4) : substr($_tmp, 0, 4)) != '0000'): ?> <!--(<?php echo sprintf(SELanguage::_get(852), $this->_tpl_vars['datetime']->age($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_value'])); ?>) --><?php endif; ?>
				</p>
				<?php endfor; endif; ?>
				
			<?php endfor; endif; ?>
		<?php endfor; endif; ?>
	</div>
</div>
      <!-- <div class='page_header'></div> -->
  
    <?php if (0): ?>
        <?php $this->_tag_stack[] = array('hook_foreach', array('name' => 'profile_side','var' => 'profile_side_args')); $_block_repeat=true;smarty_block_hook_foreach($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['profile_side_args']['file'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_hook_foreach($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
	<?php endif; ?>
  
  
	<h2>Написать сообщение</h2>
	<div class="form add_com napisat_so">
		<div class="input">
			<textarea id="comment_msg" rows="3" cols="10" name="text"></textarea>
		</div>
		<span class="button2"><span class="l">&nbsp;</span><span class="c">
			<input type="submit"  style="padding:1px 8px 0px 8px;"  onclick="comment_post('<?php echo $this->_tpl_vars['owner']->user_info['user_username']; ?>
',<?php echo $this->_tpl_vars['owner']->user_info['user_id']; ?>
, <?php echo $this->_tpl_vars['user']->user_info['user_id']; ?>
, 'profile', 'user_id', 'users' , 'user'); return false;" value="Отправить" name="creat" />
		</span><span class="r">&nbsp;</span></span>
	</div>

      	  <h2>Записи на стене</h2>
		<ul class="comments wall" id="comments_list"></ul>
		<div class="pager">
			<a href="#" class="prev">Сюда</a>
			
			<a href="#" class="active">1</a>
			<a href="#">2</a>
			<a href="#">3</a>
			<a href="#">4</a>
			<a href="#">5</a>
			<a href="#">6</a> ... <a href="#">99</a>
			
			<a href="#" class="next">Туда</a>
		</div>
    <?php echo '
	<script type="text/javascript">
		comment_get(\''; 
 echo $this->_tpl_vars['owner']->user_info['user_username']; 
 echo '\','; 
 echo $this->_tpl_vars['owner']->user_info['user_id']; 
 echo ', '; 
 echo $this->_tpl_vars['user']->user_info['user_id']; 
 echo ',\'profile\',\'user_id\', \'users\' , \'user\');
	</script>
    '; ?>

    
    
    
        <?php if ($this->_tpl_vars['total_friends_all'] != 0): ?>
      <div id='profile_friends'<?php if ($this->_tpl_vars['v'] != 'friends'): ?> style='display: none;'<?php endif; ?>>
        <div>
          <div style='float: left; width: 50%;'>
            <div class='profile_headline'>
              <?php if ($this->_tpl_vars['m'] == 1): ?>
                <?php echo sprintf(SELanguage::_get(1024), $this->_tpl_vars['owner']->user_displayname_short); ?>
              <?php else: ?>
                <?php echo sprintf(SELanguage::_get(930), $this->_tpl_vars['owner']->user_displayname_short); ?>
              <?php endif; ?> (<?php echo $this->_tpl_vars['total_friends']; ?>
)
            </div>
          </div>
          <div style='float: right; width: 50%; text-align: right;'>
            <?php if ($this->_tpl_vars['search'] == ""): ?>
              <div id='profile_friends_searchbox_link'>
                <a onClick="$('profile_friends_searchbox_link').style.display='none';$('profile_friends_searchbox').style.display='block';$('profile_friends_searchbox_input').focus();"><?php echo SELanguage::_get(1197); ?></a>
              </div>
            <?php endif; ?>
            <div id='profile_friends_searchbox' style='text-align: right;<?php if ($this->_tpl_vars['search'] == ""): ?> display: none;<?php endif; ?>'>
              <form action='profile.php' method='post'>
              <input type='text' maxlength='100' size='30' class='text' name='search' value='<?php echo $this->_tpl_vars['search']; ?>
' id='profile_friends_searchbox_input'>
              <input type='submit' class='button' value='<?php echo SELanguage::_get(646); ?>'>
              <input type='hidden' name='p' value='<?php echo $this->_tpl_vars['p']; ?>
'>
              <input type='hidden' name='v' value='friends'>
              <input type='hidden' name='user' value='<?php echo $this->_tpl_vars['owner']->user_info['user_username']; ?>
'>
              </form>
            </div>
          </div>
          <div style='clear: both;'></div>
        </div>
        
                <?php if ($this->_tpl_vars['owner']->user_info['user_id'] != $this->_tpl_vars['user']->user_info['user_id'] && $this->_tpl_vars['total_friends_mut'] != 0): ?>
          <div style='margin-bottom: 10px;'>
            <?php if ($this->_tpl_vars['m'] != 1): ?>
              <?php echo SELanguage::_get(1022); ?>
            <?php else: ?>
              <a href='profile.php?user=<?php echo $this->_tpl_vars['owner']->user_info['user_username']; ?>
&v=friends'><?php echo SELanguage::_get(1022); ?></a>
            <?php endif; ?>
            &nbsp;|&nbsp; 
            <?php if ($this->_tpl_vars['m'] == 1): ?>
              <?php echo SELanguage::_get(1020); ?>
            <?php else: ?>
              <a href='profile.php?user=<?php echo $this->_tpl_vars['owner']->user_info['user_username']; ?>
&v=friends&m=1'><?php echo SELanguage::_get(1020); ?></a>
            <?php endif; ?>
          </div>
        <?php endif; ?>
        
                <?php if ($this->_tpl_vars['search'] != "" && $this->_tpl_vars['total_friends'] == 0): ?>
          <br>
            <?php echo sprintf(SELanguage::_get(934), $this->_tpl_vars['owner']->user_displayname_short); ?>
        <?php elseif ($this->_tpl_vars['m'] == 1 && $this->_tpl_vars['total_friends'] == 0): ?>
          <br>
            <?php echo sprintf(SELanguage::_get(1023), $this->_tpl_vars['owner']->user_displayname_short); ?>
        <?php endif; ?>
        
        
                <?php if ($this->_tpl_vars['maxpage_friends'] > 1): ?>
          <div style='text-align: center;'>
            <?php if ($this->_tpl_vars['p_friends'] != 1): ?><a href='profile.php?user=<?php echo $this->_tpl_vars['owner']->user_info['user_username']; ?>
&v=friends&search=<?php echo $this->_tpl_vars['search']; ?>
&m=<?php echo $this->_tpl_vars['m']; ?>
&p=<?php echo smarty_function_math(array('equation' => 'p-1','p' => $this->_tpl_vars['p_friends']), $this);?>
'>&#171; <?php echo SELanguage::_get(182); ?></a><?php else: ?><font class='disabled'>&#171; <?php echo SELanguage::_get(182); ?></font><?php endif; ?>
            <?php if ($this->_tpl_vars['p_start_friends'] == $this->_tpl_vars['p_end_friends']): ?>
              &nbsp;|&nbsp; <?php echo sprintf(SELanguage::_get(184), $this->_tpl_vars['p_start_friends'], $this->_tpl_vars['total_friends']); ?> &nbsp;|&nbsp; 
            <?php else: ?>
              &nbsp;|&nbsp; <?php echo sprintf(SELanguage::_get(185), $this->_tpl_vars['p_start_friends'], $this->_tpl_vars['p_end_friends'], $this->_tpl_vars['total_friends']); ?> &nbsp;|&nbsp; 
            <?php endif; ?>
            <?php if ($this->_tpl_vars['p_friends'] != $this->_tpl_vars['maxpage_friends']): ?><a href='profile.php?user=<?php echo $this->_tpl_vars['owner']->user_info['user_username']; ?>
&v=friends&search=<?php echo $this->_tpl_vars['search']; ?>
&m=<?php echo $this->_tpl_vars['m']; ?>
&p=<?php echo smarty_function_math(array('equation' => 'p+1','p' => $this->_tpl_vars['p_friends']), $this);?>
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
			<li>
				<a href='<?php echo $this->_tpl_vars['url']->url_create('profile',$this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->user_info['user_username']); ?>
'>
					<img src='<?php echo $this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->user_photo("./images/nophoto.gif"); ?>
' width='<?php echo $this->_tpl_vars['misc']->photo_size($this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->user_photo("./images/nophoto.gif"),'90','90','w'); ?>
' border='0' alt="<?php echo sprintf(SELanguage::_get(509), $this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->user_displayname_short); ?>">
				</a>
				<div>
					<p><a href="#">vip</a><a href="#">название группы</a></p>	
					<h2>
						<a href='<?php echo $this->_tpl_vars['url']->url_create('profile',$this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->user_info['user_username']); ?>
'><?php echo $this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->user_displayname; ?>
</a>
					</h2>
					<?php if ($this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->user_info['user_dateupdated'] != 0): ?><div><?php echo SELanguage::_get(849); ?> <?php $this->assign('last_updated', $this->_tpl_vars['datetime']->time_since($this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->user_info['user_dateupdated'])); 
 echo sprintf(SELanguage::_get($this->_tpl_vars['last_updated'][0]), $this->_tpl_vars['last_updated'][1]); ?></div><?php endif; ?>
					<?php if ($this->_tpl_vars['show_details'] != 0): ?>
						<?php if ($this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->friend_type != ""): ?>
							<div><?php echo SELanguage::_get(882); ?> <?php echo $this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->friend_type; ?>
</div>
						<?php endif; ?>
						<?php if ($this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->friend_explain != ""): ?>
							<div><?php echo SELanguage::_get(907); ?> <?php echo $this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->friend_explain; ?>
</div>
						<?php endif; ?>
					<?php endif; ?>
					
					<?php if (! $this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->is_viewers_friend && ! $this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->is_viewers_blocklisted && $this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->user_info['user_id'] != $this->_tpl_vars['user']->user_info['user_id'] && $this->_tpl_vars['user']->user_exists != 0): ?>
						<div id='addfriend_<?php echo $this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->user_info['user_id']; ?>
'><a href="javascript:TB_show('<?php echo SELanguage::_get(876); ?>', 'user_friends_manage.php?user=<?php echo $this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->user_info['user_username']; ?>
&TB_iframe=true&height=300&width=450', '', './images/trans.gif');"><?php echo SELanguage::_get(922); ?></a></div>
					<?php endif; ?>
					
					<?php if (! $this->_tpl_vars['members'][$this->_sections['member_loop']['index']]['member']->is_viewer_blocklisted && ( $this->_tpl_vars['user']->level_info['level_message_allow'] == 2 || ( $this->_tpl_vars['user']->level_info['level_message_allow'] == 1 && $this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->is_viewers_friend == 2 ) ) && $this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->user_info['user_id'] != $this->_tpl_vars['user']->user_info['user_id']): ?>
						<a href="javascript:TB_show('<?php echo SELanguage::_get(784); ?>', 'user_messages_new.php?to_user=<?php echo $this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->user_displayname; ?>
&to_id=<?php echo $this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->user_info['user_username']; ?>
&TB_iframe=true&height=400&width=450', '', './images/trans.gif');"><?php echo SELanguage::_get(839); ?></a>
					<?php endif; ?>
				</div>
          </li>
        <?php endfor; endif; ?>
        </ul>
        
                <?php if ($this->_tpl_vars['maxpage_friends'] > 1): ?>
          <div style='text-align: center;'>
            <?php if ($this->_tpl_vars['p_friends'] != 1): ?><a href='profile.php?user=<?php echo $this->_tpl_vars['owner']->user_info['user_username']; ?>
&v=friends&search=<?php echo $this->_tpl_vars['search']; ?>
&m=<?php echo $this->_tpl_vars['m']; ?>
&p=<?php echo smarty_function_math(array('equation' => 'p-1','p' => $this->_tpl_vars['p_friends']), $this);?>
'>&#171; <?php echo SELanguage::_get(182); ?></a><?php else: ?><font class='disabled'>&#171; <?php echo SELanguage::_get(182); ?></font><?php endif; ?>
            <?php if ($this->_tpl_vars['p_start_friends'] == $this->_tpl_vars['p_end_friends']): ?>
              &nbsp;|&nbsp; <?php echo sprintf(SELanguage::_get(184), $this->_tpl_vars['p_start_friends'], $this->_tpl_vars['total_friends']); ?> &nbsp;|&nbsp; 
            <?php else: ?>
              &nbsp;|&nbsp; <?php echo sprintf(SELanguage::_get(185), $this->_tpl_vars['p_start_friends'], $this->_tpl_vars['p_end_friends'], $this->_tpl_vars['total_friends']); ?> &nbsp;|&nbsp; 
            <?php endif; ?>
            <?php if ($this->_tpl_vars['p_friends'] != $this->_tpl_vars['maxpage_friends']): ?><a href='profile.php?user=<?php echo $this->_tpl_vars['owner']->user_info['user_username']; ?>
&v=friends&search=<?php echo $this->_tpl_vars['search']; ?>
&m=<?php echo $this->_tpl_vars['m']; ?>
&p=<?php echo smarty_function_math(array('equation' => 'p+1','p' => $this->_tpl_vars['p_friends']), $this);?>
'><?php echo SELanguage::_get(183); ?> &#187;</a><?php else: ?><font class='disabled'><?php echo SELanguage::_get(183); ?> &#187;</font><?php endif; ?>
          </div>
        <?php endif; ?>
        
        
      </div>
    <?php endif; ?>
        
    
    
    
    
    
    
        <?php if ($this->_tpl_vars['allowed_to_comment'] != 0 || $this->_tpl_vars['total_comments'] != 0): ?>
      
            <div id='profile_comments'<?php if ($this->_tpl_vars['v'] != 'comments'): ?> style='display: none;'<?php endif; ?>>
        
                <div id="profile_<?php echo $this->_tpl_vars['owner']->user_info['user_id']; ?>
_postcomment"></div>
		<h2>Записи на стене</h2>
		<ul class="comments wall">
			<li><div id="profile_<?php echo $this->_tpl_vars['owner']->user_info['user_id']; ?>
_comments" style='margin-left: auto; margin-right: auto;'></div></li>
        
		</ul>
      </div>
      
      
    <?php endif; ?>
        
    
    
        <?php $this->_tag_stack[] = array('hook_foreach', array('name' => 'profile_tab','var' => 'profile_tab_args')); $_block_repeat=true;smarty_block_hook_foreach($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
      <div id='profile_<?php echo $this->_tpl_vars['profile_tab_args']['name']; ?>
'<?php if ($this->_tpl_vars['v'] != $this->_tpl_vars['profile_tab_args']['name']): ?> style='display: none;'<?php endif; ?>>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['profile_tab_args']['file'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
      </div>
    <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_hook_foreach($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
    
    

  
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>