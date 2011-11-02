<?php /* Smarty version 2.6.14, created on 2011-11-02 11:46:13
         compiled from profile.tpl */
?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'hook_foreach', 'profile.tpl', 123, false),array('modifier', 'substr', 'profile.tpl', 235, false),array('modifier', 'count', 'profile.tpl', 246, false),array('modifier', 'replace', 'profile.tpl', 278, false),array('modifier', 'choptext', 'profile.tpl', 278, false),array('modifier', 'default', 'profile.tpl', 467, false),array('function', 'math', 'profile.tpl', 366, false),)), $this);
?><?php
SELanguage::_preload_multi(786,843,844,768,845,773,1113,743,744,745,746,747,24,1120,1119,846,740,847,848,850,652,653,854,1317,852,851,1024,930,1197,646,1022,1020,934,1023,182,184,185,183,509,849,882,907,876,922,784,839,39,155,175,187,787,829,830,831,832,833,834,835,856,891,1025,1026,1032,1034,1071);
SELanguage::load();
?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<div class='page_header'><?php echo sprintf(SELanguage::_get(786), $this->_tpl_vars['owner']->user_displayname); ?></div>

<table cellpadding='0' cellspacing='0' width='100%'>
<tr>
	<td class='profile_leftside' width='200'>
		
				<!-- start USER MENU -->
				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'menu_main.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
				<!-- end USER MENU -->

			  <?php if ($this->_tpl_vars['showmenu'] == 1): ?>
				<div style='height: 10px; font-size: 1pt;'>&nbsp;</div>
			  <?php endif; ?>


			  			  <?php if ($this->_tpl_vars['is_profile_private'] != 0): ?>

		    </td>
    <td class='profile_rightside'>
    
      <img src='./images/icons/error48.gif' border='0' class='icon_big'>
      <div class='page_header'><?php echo SELanguage::_get(843); ?></div>
      <?php echo SELanguage::_get(844); ?>

    <?php else: ?>

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
        
    
        <?php $this->_tag_stack[] = array('hook_foreach', array('name' => 'profile_side','var' => 'profile_side_args')); $_block_repeat=true;smarty_block_hook_foreach($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['profile_side_args']['file'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_hook_foreach($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
    
    
    </td>
  <td class='profile_rightside'>
      
        <?php echo '
    <script type=\'text/javascript\'>
    <!--
      var visible_tab = \''; 
 echo $this->_tpl_vars['v']; 
 echo '\';
      function loadProfileTab(tabId)
      {
        if(tabId == visible_tab)
        {
          return false;
        }
        if($(\'profile_\'+tabId))
        {
          $(\'profile_tabs_\'+tabId).className=\'profile_tab2\';
          $(\'profile_\'+tabId).style.display = "block";
          if($(\'profile_tabs_\'+visible_tab))
          {
            $(\'profile_tabs_\'+visible_tab).className=\'profile_tab\';
            $(\'profile_\'+visible_tab).style.display = "none";
          }
          visible_tab = tabId;
        }
      }
    //-->
    </script>
    '; ?>

    
    <!-- SHOW PROFILE TAB BUTTONS start -->
    <table cellpadding='0' cellspacing='0'>
    <tr>
    <td valign='bottom'><table cellpadding='0' cellspacing='0'><tr><td class='profile_tab<?php if ($this->_tpl_vars['v'] == 'profile'): ?>2<?php endif; ?>' id='profile_tabs_profile' onMouseUp="this.blur()"><a href='javascript:void(0);' onMouseDown="loadProfileTab('profile')" onMouseUp="this.blur()"><?php echo SELanguage::_get(652); ?></a></td></tr></table></td>
    <?php if ($this->_tpl_vars['total_friends_all'] != 0): ?><td valign='bottom'><table cellpadding='0' cellspacing='0'><td class='profile_tab<?php if ($this->_tpl_vars['v'] == 'friends'): ?>2<?php endif; ?>' id='profile_tabs_friends' onMouseUp="this.blur()"><a href='javascript:void(0);' onMouseDown="loadProfileTab('friends');" onMouseUp="this.blur()"><?php echo SELanguage::_get(653); ?></a></td></tr></table></td><?php endif; ?>
    <?php if ($this->_tpl_vars['allowed_to_comment'] != 0 || $this->_tpl_vars['total_comments'] != 0): ?><td valign='bottom'><table cellpadding='0' cellspacing='0'><td class='profile_tab<?php if ($this->_tpl_vars['v'] == 'comments'): ?>2<?php endif; ?>' id='profile_tabs_comments' onMouseUp="this.blur()"><a href='javascript:void(0);' onMouseDown="loadProfileTab('comments');SocialEngine.ProfileComments.getComments(1)" onMouseUp="this.blur()"><?php echo SELanguage::_get(854); ?></a></td></tr></table></td><?php endif; ?>
    
        <?php $this->_tag_stack[] = array('hook_foreach', array('name' => 'profile_tab','var' => 'profile_tab_args','max' => 8,'complete' => 'profile_tab_complete')); $_block_repeat=true;smarty_block_hook_foreach($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
      <td valign='bottom'>
        <table cellpadding='0' cellspacing='0' style='float: left;'>
          <tr>
            <td class='profile_tab<?php if ($this->_tpl_vars['v'] == $this->_tpl_vars['profile_tab_args']['name']): ?>2<?php endif; ?>' id='profile_tabs_<?php echo $this->_tpl_vars['profile_tab_args']['name']; ?>
' onMouseUp="this.blur();">
              <a href='javascript:void(0);' onMouseDown="loadProfileTab('<?php echo $this->_tpl_vars['profile_tab_args']['name']; ?>
')" onMouseUp="this.blur();">
                <?php echo SELanguage::_get($this->_tpl_vars['profile_tab_args']['title']); ?>
              </a>
            </td>
          </tr>
        </table>
      </td>
    <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_hook_foreach($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
    
    <?php if (! $this->_tpl_vars['profile_tab_complete']): ?>
      <td valign='bottom'>
        <table cellpadding='0' cellspacing='0' style='float: left;'>
          <tr>
            <td class='profile_tab' onMouseUp="this.blur();" nowrap="nowrap">
              <a href="javascript:void(0);" onclick="$('profile_tab_dropdown').style.display = ( $('profile_tab_dropdown').style.display=='none' ? 'inline' : 'none' ); this.blur(); return false;" nowrap="nowrap">
                <?php echo SELanguage::_get(1317); ?>
              </a>
            </td>
          </tr>
        </table>
        <div class='menu_profile_dropdown' id='profile_tab_dropdown' style='display: none;'>
          <div>
                        <?php $this->_tag_stack[] = array('hook_foreach', array('name' => 'profile_tab','var' => 'profile_tab_args','start' => 8)); $_block_repeat=true;smarty_block_hook_foreach($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
            <div class='menu_profile_item_dropdown'>
              <div  id='profile_tabs_<?php echo $this->_tpl_vars['profile_tab_args']['name']; ?>
' onMouseUp="this.blur();">
              <a href='javascript:void(0);' onMouseDown="loadProfileTab('<?php echo $this->_tpl_vars['profile_tab_args']['name']; ?>
')" onMouseUp="this.blur();" class='menu_profile_item' style="text-align: left;">
                <?php echo SELanguage::_get($this->_tpl_vars['profile_tab_args']['title']); ?>
              </a>
            </div></div>
            <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_hook_foreach($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
          </div>
        </div>
      </td>
    <?php endif; ?>
    
    <td width='100%' class='profile_tab_end'>&nbsp;</td>
    </tr>
    </table>
    <!-- SHOW PROFILE TAB BUTTONS end -->
    
    
    
    <div class='profile_content'>
    
        <div id='profile_profile'<?php if ($this->_tpl_vars['v'] != 'profile'): ?> style='display: none;'<?php endif; ?>>
      
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
          <div class='profile_headline<?php if (! $this->_sections['subcat_loop']['first']): ?>2<?php endif; ?>'><b><?php echo SELanguage::_get($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['subcat_title']); ?></b></div>
            
            <table cellpadding='0' cellspacing='0'>
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
              <tr>
              <td valign='top' style='padding-right: 10px;' nowrap='nowrap'>
                <?php echo SELanguage::_get($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_title']); ?>:
              </td>
              <td>
                <div class='profile_field_value'><?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_value_formatted']; ?>
</div>
                <?php if ($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_special'] == 1 && ((is_array($_tmp=$this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_value'])) ? $this->_run_mod_handler('substr', true, $_tmp, 0, 4) : substr($_tmp, 0, 4)) != '0000'): ?> (<?php echo sprintf(SELanguage::_get(852), $this->_tpl_vars['datetime']->age($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_value'])); ?>)<?php endif; ?>
              </td>
              </tr>
            <?php endfor; endif; ?>
            </table>
          
        <?php endfor; endif; ?>
      <?php endfor; endif; ?>
            
            <?php if (count($this->_tpl_vars['actions']) > 0): ?>
        <?php echo '
        <script language="JavaScript">
        <!-- 
          Rollimage0 = new Image(10,12);
          Rollimage0.src = "./images/icons/action_delete1.gif";
          Rollimage1 = new Image(10,12);
          Rollimage1.src = "./images/icons/action_delete2.gif";
        //-->
        </script>
        '; ?>

        
                <div style='padding-bottom: 10px;' id='actions'>
          <div class='profile_headline2'><b><?php echo SELanguage::_get(851); ?></b></div>
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
' class='profile_action'>
              <table cellpadding='0' cellspacing='0'>
              <tr>
              <td valign='top'><img src='./images/icons/<?php echo $this->_tpl_vars['actions'][$this->_sections['actions_loop']['index']]['action_icon']; ?>
' border='0' class='icon'></td>
              <td valign='top' width='100%'>
                <div class='profile_action_date'>
                  <?php $this->assign('action_date', $this->_tpl_vars['datetime']->time_since($this->_tpl_vars['actions'][$this->_sections['actions_loop']['index']]['action_date'])); ?>
                  <?php echo sprintf(SELanguage::_get($this->_tpl_vars['action_date'][0]), $this->_tpl_vars['action_date'][1]); ?>
                                    <?php if ($this->_tpl_vars['setting']['setting_actions_selfdelete'] == 1 && $this->_tpl_vars['actions'][$this->_sections['actions_loop']['index']]['action_user_id'] == $this->_tpl_vars['user']->user_info['user_id']): ?>
                    <img src='./images/icons/action_delete1.gif' style='vertical-align: middle; margin-left: 3px; cursor: pointer; cursor: hand;' border='0' onmouseover="this.src=Rollimage1.src;" onmouseout="this.src=Rollimage0.src;" onClick="SocialEngine.Viewer.userActionDelete(<?php echo $this->_tpl_vars['actions'][$this->_sections['actions_loop']['index']]['action_id']; ?>
);" />
                  <?php endif; ?>
                </div>
                <?php $this->assign('action_media', ''); ?>
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
?><a href='<?php echo $this->_tpl_vars['actions'][$this->_sections['actions_loop']['index']]['action_media'][$this->_sections['action_media_loop']['index']]['actionmedia_link']; ?>
'><img src='<?php echo $this->_tpl_vars['actions'][$this->_sections['actions_loop']['index']]['action_media'][$this->_sections['action_media_loop']['index']]['actionmedia_path']; ?>
' border='0' width='<?php echo $this->_tpl_vars['actions'][$this->_sections['actions_loop']['index']]['action_media'][$this->_sections['action_media_loop']['index']]['actionmedia_width']; ?>
' class='recentaction_media'></a><?php endfor; endif; 
 $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('action_media', ob_get_contents());ob_end_clean(); 
 endif; ?>
                <?php $this->_tpl_vars['action_text'] = vsprintf(SELanguage::_get($this->_tpl_vars['actions'][$this->_sections['actions_loop']['index']]['action_text']), $this->_tpl_vars['actions'][$this->_sections['actions_loop']['index']]['action_vars']);; ?>
                <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['action_text'])) ? $this->_run_mod_handler('replace', true, $_tmp, "[media]", $this->_tpl_vars['action_media']) : smarty_modifier_replace($_tmp, "[media]", $this->_tpl_vars['action_media'])))) ? $this->_run_mod_handler('choptext', true, $_tmp, 50, "<br>") : smarty_modifier_choptext($_tmp, 50, "<br>")); ?>

              </td>
              </tr>
              </table>
            </div>
          <?php endfor; endif; ?>
        </div>
      <?php endif; ?>
            
    </div>
        
    
    
    
    
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
                <a href='javascript:void(0);' onClick="$('profile_friends_searchbox_link').style.display='none';$('profile_friends_searchbox').style.display='block';$('profile_friends_searchbox_input').focus();"><?php echo SELanguage::_get(1197); ?></a>
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
          <table cellpadding='0' cellspacing='0'>
          <tr><td class='result'>
            <img src='./images/icons/bulb16.gif' border='0' class='icon'><?php echo sprintf(SELanguage::_get(934), $this->_tpl_vars['owner']->user_displayname_short); ?>
          </td></tr>
          </table>
        <?php elseif ($this->_tpl_vars['m'] == 1 && $this->_tpl_vars['total_friends'] == 0): ?>
          <br>
          <table cellpadding='0' cellspacing='0'>
          <tr><td class='result'>
            <img src='./images/icons/bulb16.gif' border='0' class='icon'><?php echo sprintf(SELanguage::_get(1023), $this->_tpl_vars['owner']->user_displayname_short); ?>
          </td></tr>
          </table>
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
          <div class='browse_friends_result' style='overflow: hidden;'>
            <div class='profile_friend_photo'>
              <a href='<?php echo $this->_tpl_vars['url']->url_create('profile',$this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->user_info['user_username']); ?>
'>
                <img src='<?php echo $this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->user_photo("./images/nophoto.gif"); ?>
' width='<?php echo $this->_tpl_vars['misc']->photo_size($this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->user_photo("./images/nophoto.gif"),'90','90','w'); ?>
' border='0' alt="<?php echo sprintf(SELanguage::_get(509), $this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->user_displayname_short); ?>">
              </a>
            </div>
            <div class='profile_friend_info'>
              <div class='profile_friend_name'><a href='<?php echo $this->_tpl_vars['url']->url_create('profile',$this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->user_info['user_username']); ?>
'><?php echo $this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->user_displayname; ?>
</a></div>
              <div class='profile_friend_details'>
                <?php if ($this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->user_info['user_dateupdated'] != 0): ?><div><?php echo SELanguage::_get(849); ?> <?php $this->assign('last_updated', $this->_tpl_vars['datetime']->time_since($this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->user_info['user_dateupdated'])); 
 echo sprintf(SELanguage::_get($this->_tpl_vars['last_updated'][0]), $this->_tpl_vars['last_updated'][1]); ?></div><?php endif; ?>
                <?php if ($this->_tpl_vars['show_details'] != 0): ?>
                  <?php if ($this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->friend_type != ""): ?><div><?php echo SELanguage::_get(882); ?> <?php echo $this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->friend_type; ?>
</div><?php endif; ?>
                  <?php if ($this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->friend_explain != ""): ?><div><?php echo SELanguage::_get(907); ?> <?php echo $this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->friend_explain; ?>
</div><?php endif; ?>
                <?php endif; ?>
              </div>
            </div>
            <div class='profile_friend_options'>
              <?php if (! $this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->is_viewers_friend && ! $this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->is_viewers_blocklisted && $this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->user_info['user_id'] != $this->_tpl_vars['user']->user_info['user_id'] && $this->_tpl_vars['user']->user_exists != 0): ?><div id='addfriend_<?php echo $this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->user_info['user_id']; ?>
'><a href="javascript:TB_show('<?php echo SELanguage::_get(876); ?>', 'user_friends_manage.php?user=<?php echo $this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->user_info['user_username']; ?>
&TB_iframe=true&height=300&width=450', '', './images/trans.gif');"><?php echo SELanguage::_get(922); ?></a></div><?php endif; ?>
              <?php if (! $this->_tpl_vars['members'][$this->_sections['member_loop']['index']]['member']->is_viewer_blocklisted && ( $this->_tpl_vars['user']->level_info['level_message_allow'] == 2 || ( $this->_tpl_vars['user']->level_info['level_message_allow'] == 1 && $this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->is_viewers_friend == 2 ) ) && $this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->user_info['user_id'] != $this->_tpl_vars['user']->user_info['user_id']): ?><a href="javascript:TB_show('<?php echo SELanguage::_get(784); ?>', 'user_messages_new.php?to_user=<?php echo $this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->user_displayname; ?>
&to_id=<?php echo $this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->user_info['user_username']; ?>
&TB_iframe=true&height=400&width=450', '', './images/trans.gif');"><?php echo SELanguage::_get(839); ?></a><?php endif; ?>
            </div>
            <div style='clear: both;'></div>
          </div>
        <?php endfor; endif; ?>
        
        
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
        <div id="profile_<?php echo $this->_tpl_vars['owner']->user_info['user_id']; ?>
_comments" style='margin-left: auto; margin-right: auto;'></div>
        
        <?php 
$javascript_lang_import_list = SELanguage::_javascript_redundancy_filter(array(39,155,175,182,183,184,185,187,784,787,829,830,831,832,833,834,835,854,856,891,1025,1026,1032,1034,1071));
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
        <style type=\'text/css\'>
          div.comment_headline {
            font-size: 13px; 
            margin-bottom: 7px;
            font-weight: bold;
            padding: 0px;
            border: none;
            background: none;
            color: #555555;
          }
        </style>
        '; ?>

        
        <script type="text/javascript">
        
          SocialEngine.ProfileComments = new SocialEngineAPI.Comments({
            'canComment' : <?php if ($this->_tpl_vars['allowed_to_comment']): ?>true<?php else: ?>false<?php endif; ?>,
            'commentHTML' : '<?php echo ((is_array($_tmp=$this->_tpl_vars['setting']['setting_comment_html'])) ? $this->_run_mod_handler('replace', true, $_tmp, ",", ", ") : smarty_modifier_replace($_tmp, ",", ", ")); ?>
',
            'commentCode' : <?php if ($this->_tpl_vars['setting']['setting_comment_code']): ?>true<?php else: ?>false<?php endif; ?>,
            
            'type' : 'profile',
            'typeIdentifier' : 'user_id',
            'typeID' : <?php echo $this->_tpl_vars['owner']->user_info['user_id']; ?>
,
            
            'typeTab' : 'users',
            'typeCol' : 'user',
            
            'initialTotal' : <?php echo ((is_array($_tmp=@$this->_tpl_vars['total_comments'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
,
            
            'paginate' : true,
            'cpp' : 10,
            
            'commentLinks' : <?php echo '{\'reply\' : true, \'walltowall\' : true}'; ?>

          });
        
          SocialEngine.RegisterModule(SocialEngine.ProfileComments);
       
          // Backwards
          function addComment(is_error, comment_body, comment_date)
          {
            SocialEngine.ProfileComments.addComment(is_error, comment_body, comment_date);
          }
        
          function getComments(direction)
          {
            SocialEngine.ProfileComments.getComments(direction);
          }

        </script>
        
        
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
    
    
  <?php endif; ?>
  
  </div>

</td>
</tr>
</table>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>