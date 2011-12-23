<?php /* Smarty version 2.6.14, created on 2011-12-23 20:37:17
         compiled from user_event_edit_members.tpl */
?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'math', 'user_event_edit_members.tpl', 179, false),)), $this);
?><?php
SELanguage::_preload_multi(3000141,3000086,3000138,3000137,3000001,3000142,3000080,3000081,3000082,3000083,3000084,3000085,3000093,3000097,3000153,3000154,3000170,3000219,3000223,3000225,3000229,3000155,175,39,3000224,3000227,3000226,3000228,643,646,3000144,3000143,3000222,900,901,902,3000145,3000146,182,184,185,183,3000147,3000148,906,3000152,3000149,3000150,3000151,784,839);
SELanguage::load();
?>﻿<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<h1><?php echo sprintf(SELanguage::_get(3000141), "event.php?event_id=".($this->_tpl_vars['event']->event_info['event_id']), $this->_tpl_vars['event']->event_info['event_title']); ?></h1>
<div class="crumb">
	<a href="/">Главная</a>
	<a href='user_event.php'><?php echo SELanguage::_get(3000086); ?></a>
	<a href='event/<?php echo $this->_tpl_vars['event']->event_info['event_id']; ?>
/'><?php echo $this->_tpl_vars['event']->event_info['event_title']; ?>
</a>
	<span><?php echo SELanguage::_get(3000138); ?></span>
</div>
<ul class="vk">
	<li><a href='user_event_edit.php?event_id=<?php echo $this->_tpl_vars['event']->event_info['event_id']; ?>
'><?php echo SELanguage::_get(3000137); ?></a></li>
	<li class="active"><a href='user_event_edit_members.php?event_id=<?php echo $this->_tpl_vars['event']->event_info['event_id']; ?>
'><?php echo SELanguage::_get(3000138); ?></a></li>
	<li><a href='user_event_edit_settings.php?event_id=<?php echo $this->_tpl_vars['event']->event_info['event_id']; ?>
'><?php echo SELanguage::_get(3000001); ?></a></li>
</ul>

<?php echo SELanguage::_get(3000142); ?>
<br />


<?php 
$javascript_lang_import_list = SELanguage::_javascript_redundancy_filter(array(3000080,3000081,3000082,3000083,3000084,3000085,3000093,3000097,3000153,3000154,3000170,3000219,3000223,3000225,3000229));
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
<script type="text/javascript" src="./include/js/class_event.js"></script>
<script type="text/javascript">
  
  SocialEngine.Event = new SocialEngineAPI.Event(<?php echo $this->_tpl_vars['event']->event_generate_javascript_structure(); ?>
);
  SocialEngine.RegisterModule(SocialEngine.Event);
  
</script>


<div style='display: none;' id='confirmeventmemberdelete'>
  <div style='margin-top: 10px;'>
    <?php echo SELanguage::_get(3000155); ?>
  </div>
  <br />
  <?php $this->assign('langBlockTemp', SE_Language::_get(175));


  ?><input type='button' class='button' value='<?php echo $this->_tpl_vars['langBlockTemp']; ?>
' onClick='parent.SocialEngine.Event.memberDeleteConfirm();' /><?php 

  ?>
  <?php $this->assign('langBlockTemp', SE_Language::_get(39));


  ?><input type='button' class='button' value='<?php echo $this->_tpl_vars['langBlockTemp']; ?>
' onClick='parent.TB_remove();' /><?php 

  ?>
</div>


<div style='display: none;' id='confirmeventmembercancel'>
  <div style='margin-top: 10px;'>
    <?php echo SELanguage::_get(3000224); ?>
  </div>
  <br />
  <?php $this->assign('langBlockTemp', SE_Language::_get(175));


  ?><input type='button' class='button' value='<?php echo $this->_tpl_vars['langBlockTemp']; ?>
' onClick='parent.SocialEngine.Event.memberCancelConfirm();' /><?php 

  ?>
  <?php $this->assign('langBlockTemp', SE_Language::_get(39));


  ?><input type='button' class='button' value='<?php echo $this->_tpl_vars['langBlockTemp']; ?>
' onClick='parent.TB_remove();' /><?php 

  ?>
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




<table cellpadding="0" cellspacing="0" width="100%"><tr><td valign="top" width="270">
  
  
  
  <div style="border: 1px solid rgb(187, 187, 187); padding: 10px; background: rgb(238, 238, 238) none repeat scroll 0% 0%; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial;">
    
    <form name="event_members_form" action="user_event_edit_members.php?event_id=<?php echo $this->_tpl_vars['event']->event_info['event_id']; ?>
" method="post">
    
    <table align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td style="font-weight: bold;" align="right"><?php echo SELanguage::_get(643); ?>&nbsp;</td>
        <td style="padding-left: 3px;">
          <table cellpadding="0" cellspacing="0">
            <tr>
              <td><input maxlength="100" name="search" class="event_search text" value="<?php echo $this->_tpl_vars['search']; ?>
" type="text" />&nbsp;</td>
              <td><?php $this->assign('langBlockTemp', SE_Language::_get(646));


  ?><input class="button" value="<?php echo $this->_tpl_vars['langBlockTemp']; ?>
" style="vertical-align: middle;" type="submit" /><?php 

  ?></td>
            </tr>
          </table>
        </td>
      </tr>
      
      <tr>
        <td style="font-weight: bold;" align="right"><?php echo SELanguage::_get(3000144); ?>&nbsp;</td>
        <td style="padding: 3px;">
          <select name="v" class="event_small" onchange="document.event_members_form.submit();">
            <option value=""<?php if (! isset ( $this->_tpl_vars['v'] )): ?> selected<?php endif; ?>><?php echo SELanguage::_get(3000143); ?></option>
            
            <?php if ($this->_tpl_vars['event']->event_info['event_inviteonly']): ?><option value="-2"<?php if ($this->_tpl_vars['v'] == "-2"): ?> selected<?php endif; ?>><?php echo SELanguage::_get(3000080); ?></option><?php endif; ?>
            <option value="-1"<?php if ($this->_tpl_vars['v'] == "-1"): ?> selected<?php endif; ?>><?php echo SELanguage::_get(3000222); ?></option>
            
            <option value="0"<?php if ($this->_tpl_vars['v'] == '0'): ?> selected<?php endif; ?>><?php echo SELanguage::_get(3000081); ?></option>
            <option value="1"<?php if ($this->_tpl_vars['v'] == '1'): ?> selected<?php endif; ?>><?php echo SELanguage::_get(3000082); ?></option>
            <option value="2"<?php if ($this->_tpl_vars['v'] == '2'): ?> selected<?php endif; ?>><?php echo SELanguage::_get(3000083); ?></option>
            <option value="3"<?php if ($this->_tpl_vars['v'] == '3'): ?> selected<?php endif; ?>><?php echo SELanguage::_get(3000084); ?></option>
          </select>
        </td>
      </tr>
      
      <tr>
        <td style="font-weight: bold;" align="right"><?php echo SELanguage::_get(900); ?>&nbsp;</td>
        <td style="padding: 3px;">
          <select name="s" class="event_small" onchange="document.event_members_form.submit();">
            <option value=""<?php if (! isset ( $this->_tpl_vars['v'] )): ?> selected<?php endif; ?>> </option>
            <option value="se_users.user_dateupdated DESC"<?php if ($this->_tpl_vars['v'] == 'se_users.user_dateupdated DESC'): ?> selected<?php endif; ?>><?php echo SELanguage::_get(901); ?></option>
            <option value="se_users.user_lastlogindate DESC"<?php if ($this->_tpl_vars['v'] == 'se_users.user_lastlogindate DESC'): ?> selected<?php endif; ?>><?php echo SELanguage::_get(902); ?></option>
          </select>
        </td>
      </tr>
    </table>
    
    <input name="p" value="1" type="hidden" />
    </form>
    
  </div>

  <div style="margin-top: 10px;">
    <table align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td>
          <a href="javascript:void(0)" onclick="SocialEngine.Event.memberInvitePopulate();">
            <img src="./images/icons/event_invite16.gif" class="button" border="0" />
            <?php echo SELanguage::_get(3000145); ?>
          </a>
        </td>
      </tr>
    </table>
  </div>
  
  
  
</td><td style="padding-left: 10px;" valign="top">
  
  
  
  <?php if (! $this->_tpl_vars['total_members']): ?>
  
  <table align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td class="result">
        <img src="./images/icons/bulb16.gif" class="icon" />
        <?php echo SELanguage::_get(3000146); ?>
      </td>
    </tr>
  </table>

  <?php else: ?>
  
    <div class="event_pages_top">
    <?php if ($this->_tpl_vars['p'] != 1): ?>
      <a href='javascript:void(0);' onclick='document.event_members_form.p.value=<?php echo smarty_function_math(array('equation' => "p-1",'p' => $this->_tpl_vars['p']), $this);?>
;document.event_members_form.submit();'>&#171; <?php echo SELanguage::_get(182); ?></a>
    <?php else: ?>
      <font class='disabled'>&#171; <?php echo SELanguage::_get(182); ?></font>
    <?php endif; ?>
    <?php if ($this->_tpl_vars['p_start'] == $this->_tpl_vars['p_end']): ?>
      &nbsp;|&nbsp; <?php echo sprintf(SELanguage::_get(184), $this->_tpl_vars['p_start'], $this->_tpl_vars['total_members']); ?> &nbsp;|&nbsp; 
    <?php else: ?>
      &nbsp;|&nbsp; <?php echo sprintf(SELanguage::_get(185), $this->_tpl_vars['p_start'], $this->_tpl_vars['p_end'], $this->_tpl_vars['total_members']); ?> &nbsp;|&nbsp; 
    <?php endif; ?>
    <?php if ($this->_tpl_vars['p'] != $this->_tpl_vars['maxpage']): ?>
      <a href='javascript:void(0);' onclick='document.event_members_form.p.value=<?php echo smarty_function_math(array('equation' => "p+1",'p' => $this->_tpl_vars['p']), $this);?>
;document.event_members_form.submit();'><?php echo SELanguage::_get(183); ?> &#187;</a>
    <?php else: ?>
      <font class='disabled'><?php echo SELanguage::_get(183); ?> &#187;</font>
    <?php endif; ?>
  </div>
  
  
  
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
  <?php $this->assign('member_status', $this->_tpl_vars['members'][$this->_sections['member_loop']['index']]['eventmember_status']); ?>
  <div class="event_member">
    
    <table cellpadding="0" cellspacing="0">
      <tr>
        <td>
          <a href="<?php echo $this->_tpl_vars['url']->url_create('profile',$this->_tpl_vars['members'][$this->_sections['member_loop']['index']]['member']->user_info['user_username']); ?>
">
            <img src="<?php echo $this->_tpl_vars['members'][$this->_sections['member_loop']['index']]['member']->user_photo('./images/nophoto.gif'); ?>
" class="photo" border="0" width="60" height="60" />
          </a>
        </td>
        <td style="padding-left: 7px; vertical-align: top;" width="100%">
          <div class="event_member_title">
            <img src="./images/icons/user16.gif" class="icon" border="0" />
            <a href="<?php echo $this->_tpl_vars['url']->url_create('profile',$this->_tpl_vars['members'][$this->_sections['member_loop']['index']]['member']->user_info['user_username']); ?>
"><?php echo $this->_tpl_vars['members'][$this->_sections['member_loop']['index']]['member']->user_displayname; ?>
</a>
          </div>
          <div style="padding-top: 5px;">
            <div class="event_member_info"><?php echo SELanguage::_get(3000147); ?> <?php echo SELanguage::_get($this->_tpl_vars['event']->event_rsvp_levels[$this->_tpl_vars['member_status']]); ?></div>
            <?php if ($this->_tpl_vars['members'][$this->_sections['member_loop']['index']]['member']->user_info['user_dateupdated']): ?>
            <?php $this->assign('user_dateupdated', $this->_tpl_vars['datetime']->time_since($this->_tpl_vars['members'][$this->_sections['member_loop']['index']]['member']->user_info['user_dateupdated'])); ?>
            <div class="event_member_info"><?php echo SELanguage::_get(3000148); ?> &nbsp;<?php echo sprintf(SELanguage::_get($this->_tpl_vars['user_dateupdated'][0]), $this->_tpl_vars['user_dateupdated'][1]); ?></div>
            <?php endif; ?>
            <?php if ($this->_tpl_vars['members'][$this->_sections['member_loop']['index']]['member']->user_info['user_lastlogindate']): ?>
            <?php $this->assign('user_lastlogindate', $this->_tpl_vars['datetime']->time_since($this->_tpl_vars['members'][$this->_sections['member_loop']['index']]['member']->user_info['user_lastlogindate'])); ?>
            <div class="event_member_info"><?php echo SELanguage::_get(906); ?> &nbsp;<?php echo sprintf(SELanguage::_get($this->_tpl_vars['user_lastlogindate'][0]), $this->_tpl_vars['user_lastlogindate'][1]); ?></div>
            <?php endif; ?>
          </div>
        </td>
        <td style="vertical-align: top;" nowrap="nowrap">
          <div>
            
                        <?php if ($this->_tpl_vars['members'][$this->_sections['member_loop']['index']]['member']->user_info['user_id'] == $this->_tpl_vars['event']->event_info['event_user_id']): ?>
              <div><?php echo SELanguage::_get(3000152); ?></div>
              
                        <?php elseif (! $this->_tpl_vars['members'][$this->_sections['member_loop']['index']]['eventmember_approved'] && $this->_tpl_vars['members'][$this->_sections['member_loop']['index']]['eventmember_status']): ?>
              <div><a href='javascript:void(0);' onclick='SocialEngine.Event.memberAccept(<?php echo $this->_tpl_vars['members'][$this->_sections['member_loop']['index']]['member']->user_info['user_id']; ?>
);'><?php echo SELanguage::_get(3000149); ?></a></div>
              <div><a href='javascript:void(0);' onclick='SocialEngine.Event.memberReject(<?php echo $this->_tpl_vars['members'][$this->_sections['member_loop']['index']]['member']->user_info['user_id']; ?>
);'><?php echo SELanguage::_get(3000150); ?></a></div>
              
                        <?php elseif ($this->_tpl_vars['members'][$this->_sections['member_loop']['index']]['eventmember_approved'] && ! $this->_tpl_vars['members'][$this->_sections['member_loop']['index']]['eventmember_status']): ?>
              <div><a href='javascript:void(0);' onclick='SocialEngine.Event.memberCancel(<?php echo $this->_tpl_vars['members'][$this->_sections['member_loop']['index']]['member']->user_info['user_id']; ?>
);'>Cancel Invite</a></div>
              
                        <?php else: ?>
              
                            <div><a href='javascript:void(0);' onclick='SocialEngine.Event.memberDelete(<?php echo $this->_tpl_vars['members'][$this->_sections['member_loop']['index']]['member']->user_info['user_id']; ?>
);'><?php echo SELanguage::_get(3000151); ?></a></div>
              
                            <div><a href='javascript:void(0);' onClick="TB_show('<?php echo SELanguage::_get(784); ?>', 'user_messages_new.php?to_user=<?php echo $this->_tpl_vars['members'][$this->_sections['member_loop']['index']]['member']->user_displayname; ?>
&to_id=<?php echo $this->_tpl_vars['members'][$this->_sections['member_loop']['index']]['member']->user_info['user_username']; ?>
&TB_iframe=true&height=400&width=450', '', './images/trans.gif');"><?php echo SELanguage::_get(839); ?></a></div>
              
            <?php endif; ?>
          </div>
        </td>
      </tr>
    </table>
  </div>
  <?php endfor; endif; ?>
  
  
  
    <div class="event_pages_bottom">
    <?php if ($this->_tpl_vars['p'] != 1): ?>
      <a href='javascript:void(0);' onclick='document.event_members_form.p.value=<?php echo smarty_function_math(array('equation' => "p-1",'p' => $this->_tpl_vars['p']), $this);?>
;document.event_members_form.submit();'>&#171; <?php echo SELanguage::_get(182); ?></a>
    <?php else: ?>
      <font class='disabled'>&#171; <?php echo SELanguage::_get(182); ?></font>
    <?php endif; ?>
    <?php if ($this->_tpl_vars['p_start'] == $this->_tpl_vars['p_end']): ?>
      &nbsp;|&nbsp; <?php echo sprintf(SELanguage::_get(184), $this->_tpl_vars['p_start'], $this->_tpl_vars['total_members']); ?> &nbsp;|&nbsp; 
    <?php else: ?>
      &nbsp;|&nbsp; <?php echo sprintf(SELanguage::_get(185), $this->_tpl_vars['p_start'], $this->_tpl_vars['p_end'], $this->_tpl_vars['total_members']); ?> &nbsp;|&nbsp; 
    <?php endif; ?>
    <?php if ($this->_tpl_vars['p'] != $this->_tpl_vars['maxpage']): ?>
      <a href='javascript:void(0);' onclick='document.event_members_form.p.value=<?php echo smarty_function_math(array('equation' => "p+1",'p' => $this->_tpl_vars['p']), $this);?>
;document.event_members_form.submit();'><?php echo SELanguage::_get(183); ?> &#187;</a>
    <?php else: ?>
      <font class='disabled'><?php echo SELanguage::_get(183); ?> &#187;</font>
    <?php endif; ?>
  </div>
  
  <?php endif; ?>
  
  
  
</td></tr></table>




<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>