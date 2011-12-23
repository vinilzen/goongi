<?php /* Smarty version 2.6.14, created on 2011-12-23 20:16:48
         compiled from event.tpl */
?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'event.tpl', 110, false),array('modifier', 'escape', 'event.tpl', 259, false),array('modifier', 'count', 'event.tpl', 486, false),array('modifier', 'replace', 'event.tpl', 502, false),array('modifier', 'choptext', 'event.tpl', 502, false),array('function', 'math', 'event.tpl', 618, false),)), $this);
?><?php
SELanguage::_preload_multi(3000086,3000227,39,3000226,3000228,3000225,3000160,3000090,3000143,3000081,3000082,3000083,3000084,3000245,3000169,3000167,3000170,3000219,3000145,3000172,3000278,3000279,3000173,3000137,3000138,3000164,854,3000174,3000110,3000111,3000175,3000203,3000202,3000204,3000115,3000116,3000280,3000201,3000162,182,184,185,183,509,849,3000152,3000163,876,838,784,839);
SELanguage::load();
?>﻿<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<h1><?php echo SELanguage::_get(3000086); ?> - <?php echo $this->_tpl_vars['event']->event_info['event_title']; ?>
</h1>
<div class="crumb">
	<a href="/">Главная</a>
	<a href='user_event.php'><?php echo SELanguage::_get(3000086); ?></a>
	<span><?php echo $this->_tpl_vars['event']->event_info['event_title']; ?>
<!-- <?php echo SELanguage::_get($this->_tpl_vars['eventcat_info']['subcat_title']); ?> --></span>
</div>
<div class="buttons">
	<span class="button2"><span class="l">&nbsp;</span><span class="c">
		<a href="/user_event_edit.php?event_id=<?php echo $this->_tpl_vars['event']->event_info['event_id']; ?>
">Редактировать</a>
	</span><span class="r">&nbsp;</span></span>
	<span class="button3"><span class="l">&nbsp;</span><span class="c">
		<input type="button" value="Удалить" name="creat" id="event_del" rel="<?php echo $this->_tpl_vars['event']->event_info['event_id']; ?>
" />
	</span><span class="r">&nbsp;</span></span>
</div>





<div style='display: none;' id='eventmemberinvite'>
    <div style='text-align:center;margin:10px;font-weight:bold;border: 1px dashed #CCCCCC;background: #FFFFFF;padding: 7px 8px 7px 7px;' id='noFriends'>
    <img src='./images/icons/bulb16.gif' class='icon'>
    <?php echo SELanguage::_get(3000227); ?>
    <br />
    <br />
    <?php $this->assign('langBlockTemp', SE_Language::_get(39));


  ?><input type='button' class='button' value='<?php echo $this->_tpl_vars['langBlockTemp']; ?>
' onClick='parent.TB_remove();' /><?php 

  ?>
  </div>
  
    <div style='display:none;text-align:left;padding:10px;' id='inviteForm'>
    <div><?php echo SELanguage::_get(3000226); ?></div>
    <br />
    
    <div><a href='javascript:void(0);' id="eventMemberInviteSelectAll" onClick="var checkboxes = document.getElementsByTagName('input'); for( var i=0, l=checkboxes.length; i<l; i++ ) if( checkboxes[i].type=='checkbox' && parseInt(checkboxes[i].value)>0 ) { checkboxes[i].checked = true; parent.SocialEngine.Event.memberInviteUpdate(checkboxes[i].value, true); }"><?php echo SELanguage::_get(3000228); ?></a></div>
    <div id='invite_friendlist' class='invite_friendlist'></div>
    
    <div style='margin-top: 20px;'>
      <?php $this->assign('langBlockTemp', SE_Language::_get(3000225));


  ?><input type='button' class='button' value='<?php echo $this->_tpl_vars['langBlockTemp']; ?>
' onClick='parent.SocialEngine.Event.memberInviteSend();' /><?php 

  ?>
      <?php $this->assign('langBlockTemp', SE_Language::_get(39));


  ?><input type='button' class='button' value='<?php echo $this->_tpl_vars['langBlockTemp']; ?>
' onClick='parent.TB_remove();' /><?php 

  ?>
    </div>
  </div>
  
    <div style='display:none;text-align:left;padding:10px;' id='inviteResults'></div>
</div>


<div class="meropriatie_item">
	<?php unset($this->_sections['officer_loop']);
$this->_sections['officer_loop']['name'] = 'officer_loop';
$this->_sections['officer_loop']['loop'] = is_array($_loop=$this->_tpl_vars['officers']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['officer_loop']['show'] = true;
$this->_sections['officer_loop']['max'] = $this->_sections['officer_loop']['loop'];
$this->_sections['officer_loop']['step'] = 1;
$this->_sections['officer_loop']['start'] = $this->_sections['officer_loop']['step'] > 0 ? 0 : $this->_sections['officer_loop']['loop']-1;
if ($this->_sections['officer_loop']['show']) {
    $this->_sections['officer_loop']['total'] = $this->_sections['officer_loop']['loop'];
    if ($this->_sections['officer_loop']['total'] == 0)
        $this->_sections['officer_loop']['show'] = false;
} else
    $this->_sections['officer_loop']['total'] = 0;
if ($this->_sections['officer_loop']['show']):

            for ($this->_sections['officer_loop']['index'] = $this->_sections['officer_loop']['start'], $this->_sections['officer_loop']['iteration'] = 1;
                 $this->_sections['officer_loop']['iteration'] <= $this->_sections['officer_loop']['total'];
                 $this->_sections['officer_loop']['index'] += $this->_sections['officer_loop']['step'], $this->_sections['officer_loop']['iteration']++):
$this->_sections['officer_loop']['rownum'] = $this->_sections['officer_loop']['iteration'];
$this->_sections['officer_loop']['index_prev'] = $this->_sections['officer_loop']['index'] - $this->_sections['officer_loop']['step'];
$this->_sections['officer_loop']['index_next'] = $this->_sections['officer_loop']['index'] + $this->_sections['officer_loop']['step'];
$this->_sections['officer_loop']['first']      = ($this->_sections['officer_loop']['iteration'] == 1);
$this->_sections['officer_loop']['last']       = ($this->_sections['officer_loop']['iteration'] == $this->_sections['officer_loop']['total']);
?>
		<div class="img">
			<a href="<?php echo $this->_tpl_vars['url']->url_create('profile',$this->_tpl_vars['officers'][$this->_sections['officer_loop']['index']]['member']->user_info['user_username']); ?>
">
				<img src="./uploads_user/1000/1/0_3554_thumb.jpg" alt="">
			</a>
		</div>
		<div class="name"><span>Автор:</span>
			<?php if ($this->_tpl_vars['officers'][$this->_sections['officer_loop']['index']]['eventmember_rank'] == 3): ?>
				 <a href="<?php echo $this->_tpl_vars['url']->url_create('profile',$this->_tpl_vars['officers'][$this->_sections['officer_loop']['index']]['member']->user_info['user_username']); ?>
"><?php echo $this->_tpl_vars['officers'][$this->_sections['officer_loop']['index']]['member']->user_displayname; ?>
</a>
			<?php endif; ?>
		</div>
	<?php endfor; endif; ?> 
	<div class="inf">
		<?php if (! empty ( $this->_tpl_vars['event']->event_info['event_desc'] )): ?>
			<?php echo $this->_tpl_vars['event']->event_info['event_desc']; ?>

		<?php endif; ?>
	</div>
</div>
	
<h2>В мероприятии участвуют</h2>
<ul class="friend_list h200">
	<li><a href="#"><img src="images/3.jpg" alt=""></a><a href="#">Александр Белый</a></li>
	<li><a href="#"><img src="images/3.jpg" alt=""></a><a href="#">Александр Белый</a></li>
	<li><a href="#"><img src="images/3.jpg" alt=""></a><a href="#">Александр Белый</a></li>
	<li style="margin-right: 0px; "><a href="#"><img src="images/3.jpg" alt=""></a><a href="#">Александр Белый</a></li>
	<li><a href="#"><img src="images/3.jpg" alt=""></a><a href="#">Александр Белый</a></li>
	<li><a href="#"><img src="images/3.jpg" alt=""></a><a href="#">Александр Белый</a></li>
	<li><a href="#"><img src="images/3.jpg" alt=""></a><a href="#">Александр Белый</a></li>
	<li style="margin-right: 0px; "><a href="#"><img src="images/3.jpg" alt=""></a><a href="#">Александр Белый</a></li>
	<li><a href="#"><img src="images/3.jpg" alt=""></a><a href="#">Александр Белый</a></li>
	<li><a href="#"><img src="images/3.jpg" alt=""></a><a href="#">Александр Белый</a></li>
	<li><a href="#"><img src="images/3.jpg" alt=""></a><a href="#">Александр Белый</a></li>
	<li style="margin-right: 0px; "><a href="#"><img src="images/3.jpg" alt=""></a><a href="#">Александр Белый</a></li>
	<li><a href="#"><img src="images/3.jpg" alt=""></a><a href="#">Александр Белый</a></li>
	<li><a href="#"><img src="images/3.jpg" alt=""></a><a href="#">Александр Белый</a></li>
	<li><a href="#"><img src="images/3.jpg" alt=""></a><a href="#">Александр Белый</a></li>
	<li style="margin-right: 0px; "><a href="#"><img src="images/3.jpg" alt=""></a><a href="#">Александр Белый</a></li>
</ul>
    <table cellpadding='0' cellspacing='0' width='100%' style="display:none;"><tr>
        <td valign='top'>
          <div class='event_headline'><?php echo SELanguage::_get(3000160); ?> (<?php echo $this->_tpl_vars['event']->event_info['event_totalmembers']; ?>
)</div>
        </td>
        <td valign='top' align='right'>

          <div id='event_members_searchbox' style='text-align: right;'>
            
            <form name="event_search_members_form" action='<?php echo $this->_tpl_vars['url']->url_create('event','NULL',$this->_tpl_vars['event']->event_info['event_id']); ?>
' method='post'>
            <?php echo '<table cellpadding=\'0\' cellspacing=\'0\' align="right"><tr><td>'; 
 echo SELanguage::_get(3000090); 
 echo '&nbsp;</td><td><select name="v_members" class="event_small" onchange="document.event_search_members_form.submit();"><option value=""'; 
 if (! isset ( $this->_tpl_vars['v_members'] )): 
 echo ' selected'; 
 endif; 
 echo '>'; 
 echo SELanguage::_get(3000143); 
 echo ' ('; 
 echo ((is_array($_tmp=@$this->_tpl_vars['event']->event_info['event_totalmembers'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); 
 echo ')</option><option value="0"'; 
 if ($this->_tpl_vars['v_members'] == '0'): 
 echo ' selected'; 
 endif; 
 echo '>'; 
 echo SELanguage::_get(3000081); 
 echo ' ('; 
 echo ((is_array($_tmp=@$this->_tpl_vars['total_members_waiting'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); 
 echo ')</option><option value="1"'; 
 if ($this->_tpl_vars['v_members'] == '1'): 
 echo ' selected'; 
 endif; 
 echo '>'; 
 echo SELanguage::_get(3000082); 
 echo ' ('; 
 echo ((is_array($_tmp=@$this->_tpl_vars['total_members_attending'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); 
 echo ')</option><option value="2"'; 
 if ($this->_tpl_vars['v_members'] == '2'): 
 echo ' selected'; 
 endif; 
 echo '>'; 
 echo SELanguage::_get(3000083); 
 echo ' ('; 
 echo ((is_array($_tmp=@$this->_tpl_vars['total_members_maybeattending'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); 
 echo ')</option><option value="3"'; 
 if ($this->_tpl_vars['v_members'] == '3'): 
 echo ' selected'; 
 endif; 
 echo '>'; 
 echo SELanguage::_get(3000084); 
 echo ' ('; 
 echo ((is_array($_tmp=@$this->_tpl_vars['total_members_notattending'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); 
 echo ')</option></select></td></tr></table>'; ?>

            
            <input type='hidden' name='p' value='<?php echo $this->_tpl_vars['p_members']; ?>
' />
            <input type='hidden' name='v' value='members' />
            <input type='hidden' name='event_id_rem' value='<?php echo $this->_tpl_vars['event']->event_info['event_id']; ?>
' />
            </form>
            
          </div>
        </td>
    </tr></table>






<table width='100%' cellpadding='0' cellspacing='0' style="display:none;"><tr><td class='profile_leftside' width='200' >

  <table class='profile_menu' cellpadding='0' cellspacing='0' width='100%'>
    
    <?php if ($this->_tpl_vars['allowed_to_view']): ?>
    
        <?php if ($this->_tpl_vars['event']->is_member && $this->_tpl_vars['event']->user_rank == 3): ?>
    <tr>
      <td class='profile_menu1'>
        <a href='user_event_edit.php?event_id=<?php echo $this->_tpl_vars['event']->event_info['event_id']; ?>
'>
          <img src='./images/icons/event_edit16.gif' border='0' class='icon' />
          <?php echo SELanguage::_get(3000245); ?>
        </a>
      </td>
    </tr>
    <?php endif; ?>
    
        <?php if ($this->_tpl_vars['event']->is_member && $this->_tpl_vars['event']->user_rank == 3): ?>
    <tr>
      <td class='profile_menu1'>
        <a href='javascript:void(0);' onclick="SocialEngine.Event.deleteShow();">
          <img src='./images/icons/event_delete16.gif' border='0' class='icon' />
          <?php echo SELanguage::_get(3000169); ?>
        </a>
      </td>
    </tr>
    <?php endif; ?>
    
            
        
        <tr id="eventProfileMenuRequest"<?php if (! ( ! $this->_tpl_vars['event']->is_member && ! $this->_tpl_vars['event']->is_member_waiting && $this->_tpl_vars['event']->event_info['event_inviteonly'] )): ?> style="display:none;"<?php endif; ?>>
      <td class='profile_menu1'>
        <a href='javascript:void(0);' onclick="SocialEngine.Event.request();">
          <img src='./images/icons/event_join16.gif' border='0' class='icon' />
          <?php echo SELanguage::_get(3000167); ?>
        </a>
      </td>
    </tr>
    
        <tr id="eventProfileMenuCancel"<?php if (! ( ! $this->_tpl_vars['event']->eventmember_info['eventmember_approved'] && $this->_tpl_vars['event']->eventmember_info['eventmember_status'] )): ?> style="display:none;"<?php endif; ?>>
      <td class='profile_menu1'>
        <a href='javascript:void(0);' onclick="SocialEngine.Event.cancelShow();">
          <img src='./images/icons/event_remove16.gif' border='0' class='icon' />
          <?php echo SELanguage::_get(3000170); ?>
        </a>
      </td>
    </tr>
    
            
        <tr id="eventProfileMenuLeave"<?php if ($this->_tpl_vars['event']->user_rank == 3 || ! $this->_tpl_vars['event']->is_member): ?> style="display:none;"<?php endif; ?>>
      <td class='profile_menu1'>
        <a href='javascript:void(0);' onclick="SocialEngine.Event.leaveShow();">
          <img src='./images/icons/event_remove16.gif' border='0' class='icon' />
          <?php echo SELanguage::_get(3000219); ?>
        </a>
      </td>
    </tr>
    
        <tr id="eventProfileMenuInvite"<?php if ($this->_tpl_vars['event']->user_rank != 3 && ! ( $this->_tpl_vars['event']->is_member && $this->_tpl_vars['event']->event_info['event_invite'] )): ?> style="display:none;"<?php endif; ?>>
      <td class='profile_menu1'>
        <a href='javascript:void(0);' onclick='SocialEngine.Event.memberInvitePopulate();'>
          <img src='./images/icons/event_invite16.gif' border='0' class='icon' />
          <?php echo SELanguage::_get(3000145); ?>
        </a>
      </td>
    </tr>
    
    
        <?php $_from = $this->_tpl_vars['global_plugins']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['plugin_k'] => $this->_tpl_vars['plugin_v']):
?>
      <?php if (! empty ( $this->_tpl_vars['plugin_v']['menu_event_actions'] )): ?>
        <?php $_from = $this->_tpl_vars['plugin_v']['menu_event_actions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['plugin_mk'] => $this->_tpl_vars['plugin_mv']):
?>
        <tr>
          <td class='<?php echo ((is_array($_tmp=@$this->_tpl_vars['plugin_mv']['className'])) ? $this->_run_mod_handler('default', true, $_tmp, 'profile_menu1') : smarty_modifier_default($_tmp, 'profile_menu1')); ?>
'>
            <a href='<?php echo $this->_tpl_vars['plugin_mv']['link']; ?>
'<?php if (! empty ( $this->_tpl_vars['plugin_mv']['onclick'] )): ?> onclick="<?php echo $this->_tpl_vars['plugin_mv']['onclick']; ?>
"<?php endif; ?>>
              <img src='<?php echo $this->_tpl_vars['plugin_mv']['icon']; ?>
' class='icon' border='0' />
              <?php echo SELanguage::_get($this->_tpl_vars['plugin_mk']['title']); ?>
            </a>
          </td>
        </tr>
        <?php endforeach; endif; unset($_from); ?>
      <?php endif; ?>
    <?php endforeach; endif; unset($_from); ?>
    
    <?php endif; ?>
    
    
    
        <tr>
      <td class='profile_menu1'>
        <a href="javascript:TB_show('<?php echo SELanguage::_get(3000172); ?>', 'user_report.php?return_url=<?php echo ((is_array($_tmp=$this->_tpl_vars['url']->url_current())) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
&TB_iframe=true&height=300&width=450', '', './images/trans.gif');">
          <img src='./images/icons/report16.gif' class='icon' border='0' />
          <?php echo SELanguage::_get(3000172); ?>
        </a>
      </td>
    </tr>
    
  </table>
  
  
  <?php if ($this->_tpl_vars['allowed_to_view']): ?>
  
    <table cellpadding='0' cellspacing='0' width='100%' id="eventProfileMenuRSVP" style='margin-top: 10px;<?php if (( ! $this->_tpl_vars['event']->is_member && $this->_tpl_vars['event']->event_info['event_inviteonly'] && empty ( $this->_tpl_vars['event']->eventmember_info['eventmember_approved'] ) || ! $this->_tpl_vars['user']->user_exists )): ?>display:none;<?php endif; ?>'>
    <tr>
      <td class='header'><?php echo SELanguage::_get(3000278); ?></td>
    </tr>
    <tr>
      <td class='profile'>
        <div id="seEventProfileRSVPSuccess" style="display:none;margin-bottom: 4px;"><?php echo SELanguage::_get(3000279); ?></div>
        
        <table cellpadding='0' cellspacing='0'>
          <tr>
            <td style="vertical-align:middle;padding:3px 3px 0px 0px;"><input class="seEventProfileRSVP" type="radio" id="seEventProfileRSVP_1" name="event_rsvp" onchange="SocialEngine.Event.rsvpConfirm(1, true);"<?php if ($this->_tpl_vars['event']->eventmember_info['eventmember_rsvp'] == 1): ?> checked<?php endif; ?> /></td>
            <td style="vertical-align:middle;padding:3px 3px 0px 0px;"><label for="seEventProfileRSVP_1"><?php echo SELanguage::_get(3000082); ?></label></td>
          </tr>
          <tr>
            <td style="vertical-align:middle;padding:3px 3px 0px 0px;"><input class="seEventProfileRSVP" type="radio" id="seEventProfileRSVP_2" name="event_rsvp" onchange="SocialEngine.Event.rsvpConfirm(2, true);"<?php if ($this->_tpl_vars['event']->eventmember_info['eventmember_rsvp'] == 2): ?> checked<?php endif; ?> /></td>
            <td style="vertical-align:middle;padding:3px 3px 0px 0px;"><label for="seEventProfileRSVP_2"><?php echo SELanguage::_get(3000083); ?></label></td>
          </tr>
          <tr>
            <td style="vertical-align:middle;padding:3px 3px 3px 0px;"><input class="seEventProfileRSVP" type="radio" id="seEventProfileRSVP_3" name="event_rsvp" onchange="SocialEngine.Event.rsvpConfirm(3, true);"<?php if ($this->_tpl_vars['event']->eventmember_info['eventmember_rsvp'] == 3): ?> checked<?php endif; ?> /></td>
            <td style="vertical-align:middle;padding:3px 3px 3px 0px;"><label for="seEventProfileRSVP_3"><?php echo SELanguage::_get(3000084); ?></label></td>
          </tr>
        </table>
        
      </td>
    </tr>
  </table>
    
  
  
    <?php $_from = $this->_tpl_vars['global_plugins']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['plugin_k'] => $this->_tpl_vars['plugin_v']):
?>
    <?php if (! empty ( $this->_tpl_vars['plugin_v']['menu_event_side'] )): ?>
      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['plugin_v']['menu_event_side']['file'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php endif; ?> 
  <?php endforeach; endif; unset($_from); ?>
  
  <?php endif; ?>
  
  
  
</td><td class='profile_rightside'>
  
  
  
    <?php if (! $this->_tpl_vars['allowed_to_view']): ?>
    
    <img src='./images/icons/error48.gif' border='0' class='icon_big' />
    <div class='page_header'><?php echo SELanguage::_get(3000173); ?></div>
    You are not allowed to view this event.
    
    <?php else: ?>
    
    
        <table cellpadding='0' cellspacing='0' id="event_tab_table">
      <tr>
        <td valign='bottom'>
          <table cellpadding='0' cellspacing='0'>
            <tr>
              <td class='event_tab event_tab_left event_tab_active' id='event_tabs_profile' onMouseUp="this.blur();" nowrap="nowrap">
                <a href='javascript:void(0);' onMouseDown="SocialEngine.Event.loadProfileTab('profile')" onMouseUp="this.blur();"><?php echo SELanguage::_get(3000137); ?></a>
              </td>
            </tr>
          </table>
        </td>
        
                
        <td valign='bottom'>
          <table cellpadding='0' cellspacing='0'>
            <tr>
              <td class='event_tab' id='event_tabs_members' onMouseUp="this.blur();" nowrap="nowrap">
                <a href='javascript:void(0);' onMouseDown="SocialEngine.Event.loadProfileTab('members');" onMouseUp="this.blur();"><?php echo SELanguage::_get(3000138); ?></a>
              </td>
            </tr>
          </table>
        </td>
        
        <td valign='bottom'>
          <table cellpadding='0' cellspacing='0'>
            <tr>
              <td class='event_tab' id='event_tabs_photos' onMouseUp="this.blur();" nowrap="nowrap">
                <a href='javascript:void(0);' onMouseDown="SocialEngine.Event.loadProfileTab('photos');" onMouseUp="this.blur();"><?php echo SELanguage::_get(3000164); ?></a>
              </td>
            </tr>
          </table>
        </td>
        
        <?php if ($this->_tpl_vars['allowed_to_comment'] || $this->_tpl_vars['event']->event_info['event_totalcomments']): ?>
        <td valign='bottom'>
          <table cellpadding='0' cellspacing='0'>
            <tr>
              <td class='event_tab' id='event_tabs_comments' onMouseUp="this.blur();" nowrap="nowrap">
                <a href='javascript:void(0);' onMouseDown="SocialEngine.Event.loadProfileTab('comments');SocialEngine.EventComments.getComments(1);" onMouseUp="this.blur();"><?php echo SELanguage::_get(854); ?></a>
              </td>
            </tr>
          </table>
        </td>
        <?php endif; ?>
        
        <?php if (! empty ( $this->_tpl_vars['plugin_v']['menu_event_tab'] )): ?>
        <?php $_from = $this->_tpl_vars['global_plugins']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['plugin_k'] => $this->_tpl_vars['plugin_v']):
?>
        <?php if (! empty ( $this->_tpl_vars['plugin_v']['menu_event_tab'] )): ?>
        <td valign='bottom'>
          <table cellpadding='0' cellspacing='0'>
            <tr>
              <td class='event_tab' id='event_tabs_<?php echo $this->_tpl_vars['plugin_k']; ?>
' onMouseUp="this.blur();" nowrap="nowrap">
                <a href='javascript:void(0);' onMouseDown="SocialEngine.Event.loadProfileTab('<?php echo $this->_tpl_vars['plugin_k']; ?>
');" onMouseUp="this.blur();"><?php echo SELanguage::_get($this->_tpl_vars['plugin_v']['menu_profile_tab']['title']); ?></a>
              </td>
            </tr>
          </table>
        </td>
        <?php endif; ?> 
        <?php endforeach; endif; unset($_from); ?>
        <?php endif; ?>
        
        <td width='100%' class='profile_tab_end'>&nbsp;</td>
      </tr>
    </table>
    
    
    
    <div class='profile_content'>
      
            <div id='event_profile'>
      
                <div style='margin-bottom: 10px;'>
          <div class='event_headline'><?php echo SELanguage::_get(3000174); ?></div>
          <table cellpadding='0' cellspacing='0'>
            <tr>
              <td width='100' valign='top' nowrap='nowrap'><?php echo SELanguage::_get(3000110); ?></td>
              <td><?php echo $this->_tpl_vars['event']->event_info['event_title']; ?>
</td>
            </tr>
            <?php if (! empty ( $this->_tpl_vars['event']->event_info['event_desc'] )): ?>
            <tr>
              <td valign='top' nowrap='nowrap'><?php echo SELanguage::_get(3000111); ?></td>
              <td><?php echo $this->_tpl_vars['event']->event_info['event_desc']; ?>
</td>
            </tr>
            <?php endif; ?>
            <tr>
              <td valign='top' nowrap='nowrap'><?php echo SELanguage::_get(3000175); ?></td>
              <td>
                <?php $this->assign('event_date_start', $this->_tpl_vars['datetime']->timezone($this->_tpl_vars['event']->event_info['event_date_start'],$this->_tpl_vars['global_timezone'])); ?>
                <?php $this->assign('event_date_end', $this->_tpl_vars['datetime']->timezone($this->_tpl_vars['event']->event_info['event_date_end'],$this->_tpl_vars['global_timezone'])); ?>
                
                                <?php if (! $this->_tpl_vars['event']->event_info['event_date_end']): ?>
                  <?php echo sprintf(SELanguage::_get(3000203), $this->_tpl_vars['datetime']->cdate($this->_tpl_vars['setting']['setting_dateformat'],$this->_tpl_vars['event_date_start']), $this->_tpl_vars['datetime']->cdate($this->_tpl_vars['setting']['setting_timeformat'],$this->_tpl_vars['event_date_start'])); ?>
                
                                <?php elseif ($this->_tpl_vars['datetime']->cdate("F j, Y",$this->_tpl_vars['event_date_start']) == $this->_tpl_vars['datetime']->cdate("F j, Y",$this->_tpl_vars['event_date_end'])): ?>
                  <?php echo sprintf(SELanguage::_get(3000202), $this->_tpl_vars['datetime']->cdate($this->_tpl_vars['setting']['setting_dateformat'],$this->_tpl_vars['event_date_start']), $this->_tpl_vars['datetime']->cdate($this->_tpl_vars['setting']['setting_timeformat'],$this->_tpl_vars['event_date_start']), $this->_tpl_vars['datetime']->cdate($this->_tpl_vars['setting']['setting_timeformat'],$this->_tpl_vars['event_date_end'])); ?>
                
                                <?php else: ?>
                  <?php echo sprintf(SELanguage::_get(3000204), $this->_tpl_vars['datetime']->cdate(($this->_tpl_vars['setting']['setting_dateformat'])." ".($this->_tpl_vars['setting']['setting_timeformat']),$this->_tpl_vars['event_date_start']), $this->_tpl_vars['datetime']->cdate(($this->_tpl_vars['setting']['setting_dateformat'])." ".($this->_tpl_vars['setting']['setting_timeformat']),$this->_tpl_vars['event_date_end'])); ?>
                <?php endif; ?>
              </td>
            </tr>
            <?php if (! empty ( $this->_tpl_vars['event']->event_info['event_host'] )): ?>
            <tr>
              <td valign='top' nowrap='nowrap'><?php echo SELanguage::_get(3000115); ?></td>
              <td><?php echo $this->_tpl_vars['event']->event_info['event_host']; ?>
</td>
            </tr>
            <?php endif; ?>
            <?php if (! empty ( $this->_tpl_vars['event']->event_info['event_location'] )): ?>
            <tr>
              <td valign='top' nowrap='nowrap'><?php echo SELanguage::_get(3000116); ?></td>
              <td><?php echo $this->_tpl_vars['event']->event_info['event_location']; ?>
</td>
            </tr>
            <?php endif; ?>
            
            <tr>
              <td valign='top' nowrap='nowrap'><?php echo SELanguage::_get(3000280); ?></td>
              <td>
                <?php if ($this->_tpl_vars['eventcat_info']['subcat_dependency'] == 0): ?>
                  <a href='browse_events.php?eventcat_id=<?php echo $this->_tpl_vars['eventcat_info']['subcat_id']; ?>
'><?php echo SELanguage::_get($this->_tpl_vars['eventcat_info']['subcat_title']); ?></a>
                <?php else: ?>
                  <a href='browse_events.php?eventcat_id=<?php echo $this->_tpl_vars['eventcat_info']['cat_id']; ?>
'><?php echo SELanguage::_get($this->_tpl_vars['eventcat_info']['cat_title']); ?></a> -
                  <a href='browse_events.php?eventcat_id=<?php echo $this->_tpl_vars['eventcat_info']['subcat_id']; ?>
'><?php echo SELanguage::_get($this->_tpl_vars['eventcat_info']['subcat_title']); ?></a>
                <?php endif; ?>
              </td>
            </tr>
            
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
              <?php unset($this->_sections['field_loop']);
$this->_sections['field_loop']['name'] = 'field_loop';
$this->_sections['field_loop']['loop'] = is_array($_loop=$this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                  <td valign='top' nowrap='nowrap'><?php echo SELanguage::_get($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_title']); ?>:</td>
                  <td><div class='profile_field_value'><?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_value_formatted']; ?>
</div></td>
                </tr>
              <?php endfor; endif; ?>
            <?php endfor; endif; ?>
            
          </table>
        </div>
        
                <?php if (count($this->_tpl_vars['actions']) > 0): ?>
        <div style='margin-bottom: 10px;'>
          <div class='event_headline'><?php echo SELanguage::_get(3000201); ?></div>
          <?php unset($this->_sections['actions_loop']);
$this->_sections['actions_loop']['name'] = 'actions_loop';
$this->_sections['actions_loop']['loop'] = is_array($_loop=$this->_tpl_vars['actions']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['actions_loop']['max'] = (int)20;
$this->_sections['actions_loop']['show'] = true;
if ($this->_sections['actions_loop']['max'] < 0)
    $this->_sections['actions_loop']['max'] = $this->_sections['actions_loop']['loop'];
$this->_sections['actions_loop']['step'] = 1;
$this->_sections['actions_loop']['start'] = $this->_sections['actions_loop']['step'] > 0 ? 0 : $this->_sections['actions_loop']['loop']-1;
if ($this->_sections['actions_loop']['show']) {
    $this->_sections['actions_loop']['total'] = min(ceil(($this->_sections['actions_loop']['step'] > 0 ? $this->_sections['actions_loop']['loop'] - $this->_sections['actions_loop']['start'] : $this->_sections['actions_loop']['start']+1)/abs($this->_sections['actions_loop']['step'])), $this->_sections['actions_loop']['max']);
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
                  <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['action_text'])) ? $this->_run_mod_handler('replace', true, $_tmp, "[media]", $this->_tpl_vars['action_media']) : smarty_modifier_replace($_tmp, "[media]", $this->_tpl_vars['action_media'])))) ? $this->_run_mod_handler('choptext', true, $_tmp, 50, "<br />") : smarty_modifier_choptext($_tmp, 50, "<br />")); ?>

                </td>
              </tr>
            </table>
          </div>
          <?php endfor; endif; ?>
        </div>
        <?php endif; ?>
                
      </div>
            
      
      
      
      
                        
      
      
      
      
            <div id='event_members' style='display: none;'>
        
                <?php echo '
        <script type="text/javascript">
       <!-- 
          function friend_update(status, id)
          {
            if(status == \'pending\') {
              if($(\'addfriend_\'+id))
                $(\'addfriend_\'+id).style.display = \'none\';
            } else if(status == \'remove\') {
              if($(\'addfriend_\'+id))
                $(\'addfriend_\'+id).style.display = \'none\';
              }
            }
        //-->
        </script>
        '; ?>

        
        <table cellpadding='0' cellspacing='0' width='100%'>
        <tr>
        <td valign='top'>
          <div class='event_headline'><?php echo SELanguage::_get(3000160); ?> (<?php echo $this->_tpl_vars['event']->event_info['event_totalmembers']; ?>
)</div>
        </td>
        <td valign='top' align='right'>

          <div id='event_members_searchbox' style='text-align: right;'>
            
            <form name="event_search_members_form" action='<?php echo $this->_tpl_vars['url']->url_create('event','NULL',$this->_tpl_vars['event']->event_info['event_id']); ?>
' method='post'>
            <?php echo '<table cellpadding=\'0\' cellspacing=\'0\' align="right"><tr><td>'; 
 echo SELanguage::_get(3000090); 
 echo '&nbsp;</td><td><select name="v_members" class="event_small" onchange="document.event_search_members_form.submit();"><option value=""'; 
 if (! isset ( $this->_tpl_vars['v_members'] )): 
 echo ' selected'; 
 endif; 
 echo '>'; 
 echo SELanguage::_get(3000143); 
 echo ' ('; 
 echo ((is_array($_tmp=@$this->_tpl_vars['event']->event_info['event_totalmembers'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); 
 echo ')</option><option value="0"'; 
 if ($this->_tpl_vars['v_members'] == '0'): 
 echo ' selected'; 
 endif; 
 echo '>'; 
 echo SELanguage::_get(3000081); 
 echo ' ('; 
 echo ((is_array($_tmp=@$this->_tpl_vars['total_members_waiting'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); 
 echo ')</option><option value="1"'; 
 if ($this->_tpl_vars['v_members'] == '1'): 
 echo ' selected'; 
 endif; 
 echo '>'; 
 echo SELanguage::_get(3000082); 
 echo ' ('; 
 echo ((is_array($_tmp=@$this->_tpl_vars['total_members_attending'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); 
 echo ')</option><option value="2"'; 
 if ($this->_tpl_vars['v_members'] == '2'): 
 echo ' selected'; 
 endif; 
 echo '>'; 
 echo SELanguage::_get(3000083); 
 echo ' ('; 
 echo ((is_array($_tmp=@$this->_tpl_vars['total_members_maybeattending'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); 
 echo ')</option><option value="3"'; 
 if ($this->_tpl_vars['v_members'] == '3'): 
 echo ' selected'; 
 endif; 
 echo '>'; 
 echo SELanguage::_get(3000084); 
 echo ' ('; 
 echo ((is_array($_tmp=@$this->_tpl_vars['total_members_notattending'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); 
 echo ')</option></select></td></tr></table>'; ?>

            
            <input type='hidden' name='p' value='<?php echo $this->_tpl_vars['p_members']; ?>
' />
            <input type='hidden' name='v' value='members' />
            <input type='hidden' name='event_id_rem' value='<?php echo $this->_tpl_vars['event']->event_info['event_id']; ?>
' />
            </form>
            
          </div>
        </td>
        </tr>
        </table>
        
                <?php if ($this->_tpl_vars['search'] != "" && $this->_tpl_vars['total_members'] == 0): ?>
          
          <table cellpadding='0' cellspacing='0' style="margin-top: 6px;">
            <tr>
              <td class='result'>
                <img src='./images/icons/bulb16.gif' border='0' class='icon' />
                <?php echo SELanguage::_get(3000162); ?>
              </td>
            </tr>
          </table>
          
        <?php endif; ?>
        
                <?php if ($this->_tpl_vars['maxpage_members'] > 1): ?>
          <div style='text-align: center; margin-bottom: 5px;'>
            <?php if ($this->_tpl_vars['p_members'] != 1): ?>
              <a href='<?php echo $this->_tpl_vars['url']->url_create('event','NULL',$this->_tpl_vars['event']->event_info['event_id']); ?>
&v=members&search=<?php echo $this->_tpl_vars['search']; ?>
&p=<?php echo smarty_function_math(array('equation' => "p-1",'p' => $this->_tpl_vars['p_members']), $this);?>
'>&#171; <?php echo SELanguage::_get(182); ?></a>
            <?php else: ?>
              <font class='disabled'>&#171; <?php echo SELanguage::_get(182); ?></font>
            <?php endif; ?>
            <?php if ($this->_tpl_vars['p_start_members'] == $this->_tpl_vars['p_end_members']): ?>
              &nbsp;|&nbsp; <?php echo sprintf(SELanguage::_get(184), $this->_tpl_vars['p_start_members'], $this->_tpl_vars['total_members']); ?> &nbsp;|&nbsp; 
            <?php else: ?>
              &nbsp;|&nbsp; <?php echo sprintf(SELanguage::_get(185), $this->_tpl_vars['p_start_members'], $this->_tpl_vars['p_end_members'], $this->_tpl_vars['total_members']); ?> &nbsp;|&nbsp; 
            <?php endif; ?>
            <?php if ($this->_tpl_vars['p_members'] != $this->_tpl_vars['maxpage_members']): ?>
              <a href='<?php echo $this->_tpl_vars['url']->url_create('event','NULL',$this->_tpl_vars['event']->event_info['event_id']); ?>
&v=members&search=<?php echo $this->_tpl_vars['search']; ?>
&p=<?php echo smarty_function_math(array('equation' => "p+1",'p' => $this->_tpl_vars['p_members']), $this);?>
'><?php echo SELanguage::_get(183); ?> &#187;</a>
            <?php else: ?>
              <font class='disabled'><?php echo SELanguage::_get(183); ?> &#187;</font>
            <?php endif; ?>
          </div>
        <?php endif; ?>
        
                <?php unset($this->_sections['member_loop']);
$this->_sections['member_loop']['name'] = 'member_loop';
$this->_sections['member_loop']['loop'] = is_array($_loop=$this->_tpl_vars['members']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['member_loop']['show'] = true;
$this->_sections['member_loop']['max'] = $this->_sections['member_loop']['loop'];
$this->_sections['member_loop']['step'] = 1;
$this->_sections['member_loop']['start'] = $this->_sections['member_loop']['step'] > 0 ? 0 : $this->_sections['member_loop']['loop']-1;
if ($this->_sections['member_loop']['show']) {
    $this->_sections['member_loop']['total'] = $this->_sections['member_loop']['loop'];
    if ($this->_sections['member_loop']['total'] == 0)
        $this->_sections['member_loop']['show'] = false;
} else
    $this->_sections['member_loop']['total'] = 0;
if ($this->_sections['member_loop']['show']):

            for ($this->_sections['member_loop']['index'] = $this->_sections['member_loop']['start'], $this->_sections['member_loop']['iteration'] = 1;
                 $this->_sections['member_loop']['iteration'] <= $this->_sections['member_loop']['total'];
                 $this->_sections['member_loop']['index'] += $this->_sections['member_loop']['step'], $this->_sections['member_loop']['iteration']++):
$this->_sections['member_loop']['rownum'] = $this->_sections['member_loop']['iteration'];
$this->_sections['member_loop']['index_prev'] = $this->_sections['member_loop']['index'] - $this->_sections['member_loop']['step'];
$this->_sections['member_loop']['index_next'] = $this->_sections['member_loop']['index'] + $this->_sections['member_loop']['step'];
$this->_sections['member_loop']['first']      = ($this->_sections['member_loop']['iteration'] == 1);
$this->_sections['member_loop']['last']       = ($this->_sections['member_loop']['iteration'] == $this->_sections['member_loop']['total']);
?>
          <div class='event_members_result' style='overflow: hidden;'>
            <div class='event_members_photo'>
              <a href='<?php echo $this->_tpl_vars['url']->url_create('profile',$this->_tpl_vars['members'][$this->_sections['member_loop']['index']]['member']->user_info['user_username']); ?>
'>
                <img src='<?php echo $this->_tpl_vars['members'][$this->_sections['member_loop']['index']]['member']->user_photo("./images/nophoto.gif"); ?>
' width='<?php echo $this->_tpl_vars['misc']->photo_size($this->_tpl_vars['members'][$this->_sections['member_loop']['index']]['member']->user_photo("./images/nophoto.gif"),'90','90','w'); ?>
' border='0' alt="<?php echo sprintf(SELanguage::_get(509), $this->_tpl_vars['members'][$this->_sections['member_loop']['index']]['member']->user_displayname_short); ?>" class='photo' />
              </a>
            </div>
            <div class='profile_friend_info'>
              <div class='profile_friend_name'>
                <a href='<?php echo $this->_tpl_vars['url']->url_create('profile',$this->_tpl_vars['members'][$this->_sections['member_loop']['index']]['member']->user_info['user_username']); ?>
'>
                  <?php echo $this->_tpl_vars['members'][$this->_sections['member_loop']['index']]['member']->user_displayname; ?>

                </a>
              </div>
              <div class='profile_friend_details'>
                <?php if ($this->_tpl_vars['members'][$this->_sections['member_loop']['index']]['member']->user_info['user_dateupdated'] != 0): ?>
                <div>
                  <?php echo SELanguage::_get(849); ?>
                  <?php $this->assign('last_updated', $this->_tpl_vars['datetime']->time_since($this->_tpl_vars['members'][$this->_sections['member_loop']['index']]['member']->user_info['user_dateupdated'])); ?>
                  <?php echo sprintf(SELanguage::_get($this->_tpl_vars['last_updated'][0]), $this->_tpl_vars['last_updated'][1]); ?>
                </div>
                <?php endif; ?>
                
                                <div>
                  <?php if ($this->_tpl_vars['members'][$this->_sections['member_loop']['index']]['member']->user_info['user_id'] == $this->_tpl_vars['event']->event_info['event_user_id']): ?>
                    <?php echo SELanguage::_get(3000152); ?>
                  <?php else: ?>
                    <?php echo SELanguage::_get(3000163); ?>
                  <?php endif; ?>
                </div>
                
                                <div>
                  <?php echo SELanguage::_get($this->_tpl_vars['members'][$this->_sections['member_loop']['index']]['eventmember_rsvp_lvid']); ?>
                </div>
              </div>
            </div>
            <div class='profile_friend_options'>
              <?php if (! $this->_tpl_vars['members'][$this->_sections['member_loop']['index']]['member']->is_viewers_friend && ! $this->_tpl_vars['members'][$this->_sections['member_loop']['index']]['member']->is_viewer_blocklisted && $this->_tpl_vars['members'][$this->_sections['member_loop']['index']]['member']->user_info['user_id'] != $this->_tpl_vars['user']->user_info['user_id'] && $this->_tpl_vars['user']->user_exists): ?>
              <div id='addfriend_<?php echo $this->_tpl_vars['members'][$this->_sections['member_loop']['index']]['member']->user_info['user_id']; ?>
'>
                <a href="javascript:TB_show('<?php echo SELanguage::_get(876); ?>', 'user_friends_manage.php?user=<?php echo $this->_tpl_vars['members'][$this->_sections['member_loop']['index']]['member']->user_info['user_username']; ?>
&TB_iframe=true&height=300&width=450', '', './images/trans.gif');"><?php echo SELanguage::_get(838); ?></a>
              </div>
              <?php endif; ?>
              <?php if (! $this->_tpl_vars['members'][$this->_sections['member_loop']['index']]['member']->is_viewer_blocklisted && ( $this->_tpl_vars['user']->level_info['level_message_allow'] == 2 || ( $this->_tpl_vars['user']->level_info['level_message_allow'] == 1 && $this->_tpl_vars['members'][$this->_sections['member_loop']['index']]['member']->is_viewers_friend ) ) && $this->_tpl_vars['members'][$this->_sections['member_loop']['index']]['member']->user_info['user_id'] != $this->_tpl_vars['user']->user_info['user_id']): ?>
              <div id='messageuser_<?php echo $this->_tpl_vars['members'][$this->_sections['member_loop']['index']]['member']->user_info['user_id']; ?>
'>
                <a href="javascript:TB_show('<?php echo SELanguage::_get(784); ?>', 'user_messages_new.php?to_user=<?php echo $this->_tpl_vars['members'][$this->_sections['member_loop']['index']]['member']->user_displayname; ?>
&to_id=<?php echo $this->_tpl_vars['members'][$this->_sections['member_loop']['index']]['member']->user_info['user_username']; ?>
&TB_iframe=true&height=400&width=450', '', './images/trans.gif');"><?php echo SELanguage::_get(839); ?></a>
              </div>
              <?php endif; ?>
            </div>
            <div style='clear: both;'></div>
          </div>
          <?php if (! $this->_sections['member_loop']['last']): ?><div style='clear: both; height: 8px;'></div><?php endif; ?>
        <?php endfor; endif; ?>
        
                <?php if ($this->_tpl_vars['maxpage_members'] > 1): ?>
          <div style='text-align: center; margin-top: 5px;'>
            <?php if ($this->_tpl_vars['p_members'] != 1): ?><a href='event.php?event_id=<?php echo $this->_tpl_vars['event']->event_info['event_id']; ?>
&v=members&search=<?php echo $this->_tpl_vars['search']; ?>
&p=<?php echo smarty_function_math(array('equation' => 'p-1','p' => $this->_tpl_vars['p_members']), $this);?>
'>&#171; <?php echo SELanguage::_get(182); ?></a><?php else: ?><font class='disabled'>&#171; <?php echo SELanguage::_get(182); ?></font><?php endif; ?>
            <?php if ($this->_tpl_vars['p_start_members'] == $this->_tpl_vars['p_end_members']): ?>
              &nbsp;|&nbsp; <?php echo sprintf(SELanguage::_get(184), $this->_tpl_vars['p_start_members'], $this->_tpl_vars['total_members']); ?> &nbsp;|&nbsp; 
            <?php else: ?>
              &nbsp;|&nbsp; <?php echo sprintf(SELanguage::_get(185), $this->_tpl_vars['p_start_members'], $this->_tpl_vars['p_end_members'], $this->_tpl_vars['total_members']); ?> &nbsp;|&nbsp; 
            <?php endif; ?>
            <?php if ($this->_tpl_vars['p_members'] != $this->_tpl_vars['maxpage_members']): ?><a href='event.php?event_id=<?php echo $this->_tpl_vars['event']->event_info['event_id']; ?>
&v=members&search=<?php echo $this->_tpl_vars['search']; ?>
&p=<?php echo smarty_function_math(array('equation' => 'p+1','p' => $this->_tpl_vars['p_members']), $this);?>
'><?php echo SELanguage::_get(183); ?> &#187;</a><?php else: ?><font class='disabled'><?php echo SELanguage::_get(183); ?> &#187;</font><?php endif; ?>
          </div>
        <?php endif; ?>
        
      </div>
            
           <?php $_from = $this->_tpl_vars['global_plugins']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['plugin_k'] => $this->_tpl_vars['plugin_v']):
?>
        <?php if (! empty ( $this->_tpl_vars['plugin_v']['menu_event_tab'] )): ?>
          <div id='event_<?php echo $this->_tpl_vars['plugin_k']; ?>
' style='display: none;'>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['plugin_v']['menu_event_tab']['file'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
          </div>
        <?php endif; ?> 
      <?php endforeach; endif; unset($_from); ?>
            
    </div>
    
  <?php endif; ?>
  

</td></tr></table>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>