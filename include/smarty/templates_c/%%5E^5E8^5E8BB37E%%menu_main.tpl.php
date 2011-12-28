<?php /* Smarty version 2.6.14, created on 2011-12-28 15:05:45
         compiled from menu_main.tpl */
?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'hook_foreach', 'menu_main.tpl', 37, false),array('modifier', 'escape', 'menu_main.tpl', 80, false),)), $this);
?><?php
SELanguage::_preload_multi(1204,1170,1161,1162,652,1163,1164,1166,654,784,1167,1169,1173,1174,876,838,887,885,875,837,839,857,840,869,841,868,842,768,845,773,1113,743,744,745,746,747,24,1120,1119,846,740,847,848,850);
SELanguage::load();
?>    <?php if ($this->_tpl_vars['total_photo_tags'] != 0 && 0): ?>
   <a href='profile_photos.php?user=<?php echo $this->_tpl_vars['owner']->user_info['user_username']; ?>
'><?php echo sprintf(SELanguage::_get(1204), $this->_tpl_vars['owner']->user_displayname_short, $this->_tpl_vars['total_photo_tags']); ?></a>
    <?php $this->assign('showmenu', '1'); ?>
  <?php endif; ?>


  <!-- START USER MENU -->
<?php if ($this->_tpl_vars['user']->user_exists != 0): ?>	
<div class="block0">
	<div class="bg">
		<div class="c">
			<div class="pro">
				<div id="main_photo"><img src="<?php echo $this->_tpl_vars['user']->user_photo('./images/nophoto.gif'); ?>
" alt="" /></div>
					<ul>
						<li>вы - id[<?php echo $this->_tpl_vars['user']->user_info['user_id']; ?>
]</li>
						<li <?php if ($this->_tpl_vars['global_page'] == 'my_tree'): ?>class="active"<?php endif; ?>><a href='/my_tree.php'>Мое дерево</a></li>
							
												<?php if ($this->_tpl_vars['setting']['setting_connection_allow'] != 0): ?>
							<li <?php if ($this->_tpl_vars['global_page'] == 'user_friends'): ?>class="active"<?php endif; ?>><a href='/user_friends.php'><?php echo SELanguage::_get(1170); ?></a></li>
						<?php endif; ?>
						
												<!-- <li <?php if ($this->_tpl_vars['global_page'] == 'user_home'): ?>class="active"<?php endif; ?>><a href='/user_home.php'><?php echo SELanguage::_get(1161); ?></a></li>
						<li><a href='/network.php'><?php echo SELanguage::_get(1162); ?></a></li> -->
    
										<li <?php if ($this->_tpl_vars['global_page'] == 'profile'): ?>class="active"<?php endif; ?>><a href='<?php echo $this->_tpl_vars['url']->url_create('profile',$this->_tpl_vars['user']->user_info['user_username']); ?>
'><?php echo SELanguage::_get(652); ?></a></li>
					<li <?php if ($this->_tpl_vars['global_page'] == 'user_editprofile'): ?>class="active"<?php endif; ?>><a href='user_editprofile.php'><?php echo SELanguage::_get(1163); ?></a></li>
					<li <?php if ($this->_tpl_vars['global_page'] == 'user_editprofile_photo'): ?>class="active"<?php endif; ?>><a href='user_editprofile_photo.php'><?php echo SELanguage::_get(1164); ?></a></li>

										<?php if ($this->_tpl_vars['global_plugins']['plugin_controls']['show_menu_user']): ?>
						<!-- <li><a href="javascript:showMenu('menu_dropdown_apps');" onMouseUp="this.blur()"><?php echo SELanguage::_get(1166); ?></a></li> -->
												<?php $this->_tag_stack[] = array('hook_foreach', array('name' => 'menu_user_apps','var' => 'user_apps_args')); $_block_repeat=true;smarty_block_hook_foreach($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
							<li><a href='<?php echo $this->_tpl_vars['user_apps_args']['file']; ?>
'><?php echo SELanguage::_get($this->_tpl_vars['user_apps_args']['title']); ?></a></li>
						<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_hook_foreach($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
					<?php endif; ?>

										<?php if ($this->_tpl_vars['user']->level_info['level_message_allow'] != 0): ?>
						<!--<li><a href='user_messages.php'><?php echo SELanguage::_get(654); 
 if ($this->_tpl_vars['user_unread_pms'] != 0): ?> (<?php echo $this->_tpl_vars['user_unread_pms']; ?>
)<?php endif; ?></a></li> -->
						<!-- <li><a rel="<?php echo SELanguage::_get(784); ?>" href="/user_messages_new.php"><?php echo SELanguage::_get(1167); ?></a></li> -->
						<!-- <li  id="add_msg_l"><a href="#" >-><?php echo SELanguage::_get(1167); ?></a></li> -->
						<li <?php if ($this->_tpl_vars['global_page'] == 'user_messages'): ?>class="active"<?php endif; ?>><a href='user_messages.php'><?php echo SELanguage::_get(654); ?><!-- сообщения --></a></li>
						<!-- <li><a href='user_messages_outbox.php'><?php echo SELanguage::_get(1169); ?></a></li> -->
					<?php endif; ?>
					
										<li <?php if ($this->_tpl_vars['global_page'] == 'user_account'): ?>class="active"<?php endif; ?>><a href='user_account.php'><?php echo SELanguage::_get(1173); ?><!-- настройки аккаунта --></a></li>
					<!-- <li><a href='user_account.php'><?php echo SELanguage::_get(1173); ?></a></li>
					<li><a href='user_account_privacy.php'><?php echo SELanguage::_get(1174); ?></a></li> -->
				<ul>
			</div>
		</div>
	</div>
	 <div class="b"></div>
</div>
<?php endif; ?>
<!-- END USER MENU -->



    <?php if ($this->_tpl_vars['owner']->user_info['user_id'] != $this->_tpl_vars['user']->user_info['user_id']): ?>
 
        <?php if ($this->_tpl_vars['friendship_allowed'] != 0 && $this->_tpl_vars['user']->user_exists != 0 && 0): ?>
        <div id='addfriend_<?php echo $this->_tpl_vars['owner']->user_info['user_id']; ?>
'<?php if ($this->_tpl_vars['is_friend'] == TRUE || $this->_tpl_vars['is_friend_pending'] != 0): ?> style='display: none;'<?php endif; ?>><a href="/user_friends_manage.php?user=<?php echo $this->_tpl_vars['owner']->user_info['user_username']; ?>
"><!-- <?php echo SELanguage::_get(876); ?> --><img src='./images/icons/addfriend16.gif' class='icon' border='0'><?php echo SELanguage::_get(838); ?></a></div>
        <div id='confirmfriend_<?php echo $this->_tpl_vars['owner']->user_info['user_id']; ?>
'<?php if ($this->_tpl_vars['is_friend_pending'] != 1): ?> style='display: none;'<?php endif; ?>><a href="javascript:TB_show('<?php echo SELanguage::_get(887); ?>', 'user_friends_manage.php?user=<?php echo $this->_tpl_vars['owner']->user_info['user_username']; ?>
&TB_iframe=true&height=300&width=450', '', './images/trans.gif');"><img src='./images/icons/addfriend16.gif' class='icon' border='0'><?php echo SELanguage::_get(885); ?></a></div>
        <div id='pendingfriend_<?php echo $this->_tpl_vars['owner']->user_info['user_id']; ?>
'<?php if ($this->_tpl_vars['is_friend_pending'] != 2): ?> style='display: none;'<?php endif; ?> class='nolink'><img src='./images/icons/addfriend16.gif' class='icon' border='0'><?php echo SELanguage::_get(875); ?></div>
       <!--  <div id='removefriend_<?php echo $this->_tpl_vars['owner']->user_info['user_id']; ?>
'<?php if ($this->_tpl_vars['is_friend'] == FALSE || $this->_tpl_vars['is_friend_pending'] != 0): ?> style='display: none;'<?php endif; ?>><a href="javascript:TB_show('<?php echo SELanguage::_get(837); ?>', 'user_friends_manage.php?task=remove&user=<?php echo $this->_tpl_vars['owner']->user_info['user_username']; ?>
&TB_iframe=true&height=300&width=450', '', './images/trans.gif');"><img src='./images/icons/remove_friend16.gif' class='icon' border='0'><?php echo SELanguage::_get(837); ?></a></div> -->
      <?php $this->assign('showmenu', '1'); ?>
    <?php endif; ?>
    
        <?php if (0 && ( $this->_tpl_vars['user']->level_info['level_message_allow'] == 2 || ( $this->_tpl_vars['user']->level_info['level_message_allow'] == 1 && $this->_tpl_vars['is_friend'] ) ) && $this->_tpl_vars['owner']->level_info['level_message_allow'] != 0): ?>
      <a href="javascript:TB_show('<?php echo SELanguage::_get(784); ?>', 'user_messages_new.php?to_user=<?php echo ((is_array($_tmp=$this->_tpl_vars['owner']->user_displayname)) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
&to_id=<?php echo $this->_tpl_vars['owner']->user_info['user_username']; ?>
&TB_iframe=true&height=400&width=450', '', './images/trans.gif');"><img src='./images/icons/sendmessage16.gif' class='icon' border='0'><?php echo SELanguage::_get(839); ?></a>
      <?php $this->assign('showmenu', '1'); ?>
    <?php endif; ?>
    
        <?php if ($this->_tpl_vars['user']->user_exists != 0 && 0): ?>
      <a href="javascript:TB_show('<?php echo SELanguage::_get(857); ?>', 'user_report.php?return_url=<?php echo ((is_array($_tmp=$this->_tpl_vars['url']->url_current())) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
&TB_iframe=true&height=300&width=450', '', './images/trans.gif');"><img src='./images/icons/report16.gif' class='icon' border='0'><?php echo SELanguage::_get(840); ?></a>
      <?php $this->assign('showmenu', '1'); ?>
    <?php endif; ?>
    
        <?php if ($this->_tpl_vars['user']->level_info['level_profile_block'] != 0): ?>
        <div id='unblock'<?php if ($this->_tpl_vars['user']->user_blocked($this->_tpl_vars['owner']->user_info['user_id']) == FALSE): ?> style='display: none;'<?php endif; ?>><a href="javascript:TB_show('<?php echo SELanguage::_get(869); ?>', 'user_friends_block.php?task=unblock&user=<?php echo $this->_tpl_vars['owner']->user_info['user_username']; ?>
&TB_iframe=true&height=300&width=450', '', './images/trans.gif');"><img src='./images/icons/unblock16.gif' class='icon' border='0'><?php echo SELanguage::_get(841); ?></a></div>
        <div id='block'<?php if ($this->_tpl_vars['user']->user_blocked($this->_tpl_vars['owner']->user_info['user_id']) == TRUE): ?> style='display: none;'<?php endif; ?>><a href="javascript:TB_show('<?php echo SELanguage::_get(868); ?>', 'user_friends_block.php?task=block&user=<?php echo $this->_tpl_vars['owner']->user_info['user_username']; ?>
&TB_iframe=true&height=300&width=450', '', './images/trans.gif');"><img src='./images/icons/block16.gif' class='icon' border='0'><?php echo SELanguage::_get(842); ?></a></div>
      <?php $this->assign('showmenu', '1'); ?>
    <?php endif; ?>

  <?php endif; ?>


    <?php $this->_tag_stack[] = array('hook_foreach', array('name' => 'profile_menu','var' => 'profile_menu_args')); $_block_repeat=true;smarty_block_hook_foreach($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
    <?php $this->assign('showmenu', '1'); ?>

        <a href='<?php echo $this->_tpl_vars['profile_menu_args']['file']; ?>
'>
          <?php echo sprintf(SELanguage::_get($this->_tpl_vars['profile_menu_args']['title']), $this->_tpl_vars['profile_menu_args']['title_1'], $this->_tpl_vars['profile_menu_args']['title_2']); ?>
        </a>

  <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_hook_foreach($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
  
     <!-- status -->
	<?php if (0): ?>
    <?php if (( $this->_tpl_vars['owner']->level_info['level_profile_status'] != 0 && ( $this->_tpl_vars['owner']->user_info['user_status'] != "" || $this->_tpl_vars['owner']->user_info['user_id'] == $this->_tpl_vars['user']->user_info['user_id'] ) ) || $this->_tpl_vars['is_online'] == 1): ?>
      <table cellpadding='0' cellspacing='0' width='100%' style='margin-bottom: 10px;'>
      <tr>
      <td class='header'><?php echo SELanguage::_get(768); ?></td>
      <tr>
      <td class='profile'>
        <?php if ($this->_tpl_vars['is_online'] == 1): ?>
          <table cellpadding='0' cellspacing='0'>
          <tr>
          <td valign='top'><img src='./images/icons/online16.gif' border='0' class='icon'></td>
          <td><?php echo sprintf(SELanguage::_get(845), $this->_tpl_vars['owner']->user_displayname_short); ?></td>
          </tr>
          </table>
        <?php endif; ?>
        
        <?php if ($this->_tpl_vars['owner']->level_info['level_profile_status'] != 0 && ( $this->_tpl_vars['owner']->user_info['user_status'] != "" || $this->_tpl_vars['owner']->user_info['user_id'] == $this->_tpl_vars['user']->user_info['user_id'] )): ?>
          <table cellpadding='0' cellspacing='0'<?php if ($this->_tpl_vars['is_online'] == 1): ?> style='margin-top: 5px;'<?php endif; ?>>
          <tr>
          <td valign='top'><img src='./images/icons/status16.gif' border='0' class='icon'></td>
          <td>
            <?php if ($this->_tpl_vars['owner']->user_info['user_id'] == $this->_tpl_vars['user']->user_info['user_id']): ?>
                            <?php 
$javascript_lang_import_list = SELanguage::_javascript_redundancy_filter(array(773,1113,743,744,745,746,747));
$javascript_lang_import_first = TRUE;
if( is_array($javascript_lang_import_list) && !empty($javascript_lang_import_list) )
{
  echo "\n<script type='text/javascript'>\n<!--\n";
  echo "SocialEngine.Language.Import({\n";
  foreach( $javascript_lang_import_list as $javascript_import_id )
  {
    if( !$javascript_lang_import_first ) echo ",\n";
    echo "  ".$javascript_import_id." : '".addslashes(SE_Language::_get($javascript_import_id))."'";
    $javascript_lang_import_first = FALSE;
  }
  echo "\n});\n//-->\n</script>\n";
}
 ?>
              <?php echo '
              <script type="text/javascript">
              <!-- 
              SocialEngine.Viewer.user_status = \''; 
 echo $this->_tpl_vars['user']->user_info['user_status']; 
 echo '\';
              //-->
              </script>
              '; ?>

              
              <div id='ajax_status'>
              <?php if ($this->_tpl_vars['owner']->user_info['user_status'] != ""): ?>
                <?php $this->assign('status_date', $this->_tpl_vars['datetime']->time_since($this->_tpl_vars['user']->user_info['user_status_date'])); ?>
                <?php echo $this->_tpl_vars['user']->user_displayname_short; ?>
 <span id='ajax_currentstatus_value'><?php echo $this->_tpl_vars['user']->user_info['user_status']; ?>
</span>
                <div style='padding-top: 5px;'>
                  <div style='float: left; padding-right: 5px;'>[ <a href="javascript:void(0);" onClick="SocialEngine.Viewer.userStatusChange(); return false;"><?php echo SELanguage::_get(745); ?></a> ]</div>
                  <div class='home_updated'>
                    <?php echo SELanguage::_get(1113); ?>
                    <span id='ajax_currentstatus_date'><?php echo sprintf(SELanguage::_get($this->_tpl_vars['status_date'][0]), $this->_tpl_vars['status_date'][1]); ?></span>
                  </div>
                  <div style='clear: both; height: 0px;'></div>
                </div>
              <?php else: ?>
                <a href="javascript:void(0);" onClick="SocialEngine.Viewer.userStatusChange(); return false;"><?php echo SELanguage::_get(743); ?></a>
              <?php endif; ?>
              </div>
            <?php else: ?>
              <?php $this->assign('status_date', $this->_tpl_vars['datetime']->time_since($this->_tpl_vars['owner']->user_info['user_status_date'])); ?>
              <?php echo $this->_tpl_vars['owner']->user_displayname_short; ?>
 <?php echo $this->_tpl_vars['owner']->user_info['user_status']; ?>

              <br><?php echo SELanguage::_get(1113); ?> <span id='ajax_currentstatus_date'><?php echo sprintf(SELanguage::_get($this->_tpl_vars['status_date'][0]), $this->_tpl_vars['status_date'][1]); ?></span>
            <?php endif; ?>
          </td>
          </tr>
          </table>
        <?php endif; ?>
      </td>
      </tr>
      </table>
    <?php endif; ?>
    <?php endif; ?>
        
    <!-- stats -->
	<?php if (0): ?>
    <table cellpadding='0' cellspacing='0' width='100%' style='margin-bottom: 10px;'>
    <tr><td class='header'><?php echo SELanguage::_get(24); ?></td></tr>
    <tr>
    <td class='profile'>
      <table cellpadding='0' cellspacing='0'>
      <tr><td width='80' valign='top'><?php echo SELanguage::_get(1120); ?></td><td><a href='search_advanced.php?cat_selected=<?php echo $this->_tpl_vars['owner']->profilecat_info['profilecat_id']; ?>
'><?php echo SELanguage::_get($this->_tpl_vars['owner']->profilecat_info['profilecat_title']); ?></a></td></tr>
      <tr><td valign='top'><?php echo SELanguage::_get(1119); ?></td><td><?php echo SELanguage::_get($this->_tpl_vars['owner']->subnet_info['subnet_name']); ?></td></tr>
      <tr><td><?php echo SELanguage::_get(846); ?></td><td><?php echo sprintf(SELanguage::_get(740), $this->_tpl_vars['profile_views']); ?></td></tr>
      <?php if ($this->_tpl_vars['setting']['setting_connection_allow'] != 0): ?><tr><td><?php echo SELanguage::_get(847); ?></td><td><?php echo sprintf(SELanguage::_get(848), $this->_tpl_vars['total_friends']); ?></td></tr><?php endif; ?>
      <?php if ($this->_tpl_vars['owner']->user_info['user_dateupdated'] != ""): ?><tr><td><?php echo SELanguage::_get(1113); ?></td><td><?php $this->assign('last_updated', $this->_tpl_vars['datetime']->time_since($this->_tpl_vars['owner']->user_info['user_dateupdated'])); 
 echo sprintf(SELanguage::_get($this->_tpl_vars['last_updated'][0]), $this->_tpl_vars['last_updated'][1]); ?></td></tr><?php endif; ?>
      <?php if ($this->_tpl_vars['owner']->user_info['user_signupdate'] != ""): ?><tr><td><?php echo SELanguage::_get(850); ?></td><td><?php echo $this->_tpl_vars['datetime']->cdate(($this->_tpl_vars['setting']['setting_dateformat']),$this->_tpl_vars['datetime']->timezone(($this->_tpl_vars['owner']->user_info['user_signupdate']),$this->_tpl_vars['global_timezone'])); ?>
</td></tr><?php endif; ?>
      </table>
    </td>
    </tr>
    </table>
	<?php endif; ?>
    