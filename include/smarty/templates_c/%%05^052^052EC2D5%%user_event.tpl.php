<?php /* Smarty version 2.6.14, created on 2011-12-23 17:53:30
         compiled from user_event.tpl */
?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'math', 'user_event.tpl', 145, false),array('function', 'cycle', 'user_event.tpl', 166, false),array('modifier', 'truncate', 'user_event.tpl', 188, false),array('modifier', 'choptext', 'user_event.tpl', 188, false),array('modifier', 'strip_tags', 'user_event.tpl', 245, false),)), $this);
?><?php
SELanguage::_preload_multi(3000086,3000087,3000089,3000218,646,3000090,3000091,3000092,3000221,175,39,3000094,3000220,3000219,3000098,3000099,3000100,3000101,3000103,3000102,182,184,185,183,589,3000104,3000105,3000203,3000202,3000204,3000277,3000168,3000170,3000245,3000097,3000169);
SELanguage::load();
?>﻿<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<h1><?php echo SELanguage::_get(3000086); ?></h1>
<div class="crumb">
	<a href="/">Главная</a>
	<span><?php echo SELanguage::_get(3000086); ?></span>
</div>

<div class="buttons">
	<?php if ($this->_tpl_vars['user']->level_info['level_event_allow'] == 7): ?>
		<span class="button2" id="add_event"><span class="l">&nbsp;</span><span class="c">
			<input type="button" value="Создать событие" name="creat" />
		</span><span class="r">&nbsp;</span></span>
		<span class="button2" id="add_action"><span class="l">&nbsp;</span><span class="c">
			<input type="button" value="Создать мероприятие" name="creat" />
		</span><span class="r">&nbsp;</span></span>
	<?php endif; ?>
</div>

<div>
  <?php echo sprintf(SELanguage::_get(3000087), 'browse_events.php'); ?>
</div>
<br />


<!--   <div class='button' style='float: left; padding-right: 20px;'>
    <a href="javascript:void(0);" onclick="$('event_search').style.display = ( $('event_search').style.display=='block' ? 'none' : 'block');"><img src='./images/icons/search16.gif' border='0' class='button' /><?php echo SELanguage::_get(3000089); ?></a>
  </div>
  <div style='clear: both; height: 0px;'></div>
</div>

<div id='event_search' class="seEventSearch"<?php if (empty ( $this->_tpl_vars['search'] )): ?> style='display: none;'<?php endif; ?>>
  <div style='padding: 10px;'>
    <form action='user_event.php' name='searchform' method='post'>
    <table cellpadding='0' cellspacing='0' align='center'>
      <tr>
        <td><b><?php echo SELanguage::_get(3000218); ?></b>&nbsp;&nbsp;</td>
        <td><input type='text' name='search' maxlength='100' size='30' value='<?php echo $this->_tpl_vars['search']; ?>
' />&nbsp;</td>
        <td><?php $this->assign('langBlockTemp', SE_Language::_get(646));


  ?><input type='submit' class='button' value='<?php echo $this->_tpl_vars['langBlockTemp']; ?>
' /><?php 

  ?></td>
      </tr>
    </table>
    <input type='hidden' name='s' value='<?php echo $this->_tpl_vars['s']; ?>
' />
    <input type='hidden' name='p' value='<?php echo $this->_tpl_vars['p']; ?>
' />
    <input type='hidden' name='view' value='list' />
    </form>
  </div>
</div>
-->
<!-- <div style='margin-top: 20px;'>
  <?php echo SELanguage::_get(3000090); ?>
  <a href="user_event.php?view=list"><?php echo SELanguage::_get(3000091); ?></a> |
  <a href="user_event.php?view=month"><?php echo SELanguage::_get(3000092); ?></a>
</div> -->


<div style='display: none;' id='confirmeventrequestcancel'>
  <div style='margin-top: 10px;'>
    <?php echo SELanguage::_get(3000221); ?>
  </div>
  <br />
  <?php $this->assign('langBlockTemp', SE_Language::_get(175));


  ?><input type='button' class='button' value='<?php echo $this->_tpl_vars['langBlockTemp']; ?>
' onClick='parent.SocialEngine.Event.cancelConfirm();' /><?php 

  ?>
  <?php $this->assign('langBlockTemp', SE_Language::_get(39));


  ?><input type='button' class='button' value='<?php echo $this->_tpl_vars['langBlockTemp']; ?>
' onClick='parent.TB_remove();' /><?php 

  ?>
</div>


<div style='display: none;' id='confirmeventdelete'>
  <div style='margin-top: 10px;'>
    <?php echo SELanguage::_get(3000094); ?>
  </div>
  <br />
  <?php $this->assign('langBlockTemp', SE_Language::_get(175));


  ?><input type='button' class='button' value='<?php echo $this->_tpl_vars['langBlockTemp']; ?>
' onClick='parent.SocialEngine.Event.deleteConfirm();' /><?php 

  ?>
  <?php $this->assign('langBlockTemp', SE_Language::_get(39));


  ?><input type='button' class='button' value='<?php echo $this->_tpl_vars['langBlockTemp']; ?>
' onClick='parent.TB_remove();' /><?php 

  ?>
</div>


<div style='display: none;' id='confirmeventleave'>
  <div style='margin-top: 10px;'>
    <?php echo SELanguage::_get(3000220); ?>
  </div>
  <br />
  <?php $this->assign('langBlockTemp', SE_Language::_get(3000219));


  ?><input type='button' class='button' value='<?php echo $this->_tpl_vars['langBlockTemp']; ?>
' onClick='parent.SocialEngine.Event.leaveConfirm();' /><?php 

  ?>
  <?php $this->assign('langBlockTemp', SE_Language::_get(39));


  ?><input type='button' class='button' value='<?php echo $this->_tpl_vars['langBlockTemp']; ?>
' onClick='parent.TB_remove();' /><?php 

  ?>
</div>


<div style='display: none;' id='confirmeventrsvp'>
  <div style='margin: 10px 0px 10px 0px;'>
    <?php echo SELanguage::_get(3000098); ?>
  </div>
  <div>
    <a href="javascript:void(0);" onclick="rsvpConfirm(1);"><?php echo SELanguage::_get(3000099); ?></a><br />
    <a href="javascript:void(0);" onclick="rsvpConfirm(2);"><?php echo SELanguage::_get(3000100); ?></a><br />
    <a href="javascript:void(0);" onclick="rsvpConfirm(3);"><?php echo SELanguage::_get(3000101); ?></a><br />
  </div>
</div>



<?php if ($this->_tpl_vars['view'] == 'month'): ?>


	<div class="calendar">
		<div class="year"><a href="user_event.php?view=<?php echo $this->_tpl_vars['view']; ?>
&date=<?php echo $this->_tpl_vars['date_last']; ?>
" class="prev">&nbsp;</a><span><?php echo $this->_tpl_vars['month']; ?>
 <?php echo $this->_tpl_vars['year']; ?>
</span><a href="user_event.php?view=<?php echo $this->_tpl_vars['view']; ?>
&date=<?php echo $this->_tpl_vars['date_next']; ?>
" class="next">&nbsp;</a></div>
    
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'event_calendar.tpl', 'smarty_include_vars' => array('calendar_view' => $this->_tpl_vars['view'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        
	</div>


<?php elseif ($this->_tpl_vars['view'] == 'list'): ?>
  
  
    <div id="seClassifiedNullMessage"<?php if ($this->_tpl_vars['total_events']): ?> style="display: none;"<?php endif; ?>>
    <table cellpadding='0' cellspacing='0' align='center'>
      <tr>
        <td class='result'>
          <?php if (! empty ( $this->_tpl_vars['search'] ) || ! ( $this->_tpl_vars['user']->level_info['level_event_allow'] & 4 )): ?>
            <img src='./images/icons/bulb16.gif' border='0' class='icon' />
            <?php echo SELanguage::_get(3000103); ?>
          <?php else: ?>
            <img src='./images/icons/bulb16.gif' border='0' class='icon' />
            <?php echo sprintf(SELanguage::_get(3000102), 'user_event_add.php'); ?>
          <?php endif; ?>
        </td>
      </tr>
    </table>
  </div>
  
  
    <?php if ($this->_tpl_vars['maxpage'] > 1): ?>
    <div class='center'>
      <?php if ($this->_tpl_vars['p'] != 1): ?>
        <a href='user_event.php?view=list&search=<?php echo $this->_tpl_vars['search']; ?>
&p=<?php echo smarty_function_math(array('equation' => "p-1",'p' => $this->_tpl_vars['p']), $this);?>
'>&#171; <?php echo SELanguage::_get(182); ?></a>
      <?php else: ?>
        <font class='disabled'>&#171; <?php echo SELanguage::_get(182); ?></font>
      <?php endif; ?>
      <?php if ($this->_tpl_vars['p_start'] == $this->_tpl_vars['p_end']): ?>
        &nbsp;|&nbsp; <?php echo sprintf(SELanguage::_get(184), $this->_tpl_vars['p_start'], $this->_tpl_vars['total_events']); ?> &nbsp;|&nbsp; 
      <?php else: ?>
        &nbsp;|&nbsp; <?php echo sprintf(SELanguage::_get(185), $this->_tpl_vars['p_start'], $this->_tpl_vars['p_end'], $this->_tpl_vars['total_events']); ?> &nbsp;|&nbsp; 
      <?php endif; ?>
      <?php if ($this->_tpl_vars['p'] != $this->_tpl_vars['maxpage']): ?>
        <a href='user_event.php?view=list&search=<?php echo $this->_tpl_vars['search']; ?>
&p=<?php echo smarty_function_math(array('equation' => "p+1",'p' => $this->_tpl_vars['p']), $this);?>
'><?php echo SELanguage::_get(183); ?> &#187;</a>
      <?php else: ?>
        <font class='disabled'><?php echo SELanguage::_get(183); ?> &#187;</font>
      <?php endif; ?>
    </div>
    <br />
  <?php endif; ?>
  
  
    <?php unset($this->_sections['event_loop']);
$this->_sections['event_loop']['name'] = 'event_loop';
$this->_sections['event_loop']['loop'] = is_array($_loop=$this->_tpl_vars['events']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['event_loop']['show'] = true;
$this->_sections['event_loop']['max'] = $this->_sections['event_loop']['loop'];
$this->_sections['event_loop']['step'] = 1;
$this->_sections['event_loop']['start'] = $this->_sections['event_loop']['step'] > 0 ? 0 : $this->_sections['event_loop']['loop']-1;
if ($this->_sections['event_loop']['show']) {
    $this->_sections['event_loop']['total'] = $this->_sections['event_loop']['loop'];
    if ($this->_sections['event_loop']['total'] == 0)
        $this->_sections['event_loop']['show'] = false;
} else
    $this->_sections['event_loop']['total'] = 0;
if ($this->_sections['event_loop']['show']):

            for ($this->_sections['event_loop']['index'] = $this->_sections['event_loop']['start'], $this->_sections['event_loop']['iteration'] = 1;
                 $this->_sections['event_loop']['iteration'] <= $this->_sections['event_loop']['total'];
                 $this->_sections['event_loop']['index'] += $this->_sections['event_loop']['step'], $this->_sections['event_loop']['iteration']++):
$this->_sections['event_loop']['rownum'] = $this->_sections['event_loop']['iteration'];
$this->_sections['event_loop']['index_prev'] = $this->_sections['event_loop']['index'] - $this->_sections['event_loop']['step'];
$this->_sections['event_loop']['index_next'] = $this->_sections['event_loop']['index'] + $this->_sections['event_loop']['step'];
$this->_sections['event_loop']['first']      = ($this->_sections['event_loop']['iteration'] == 1);
$this->_sections['event_loop']['last']       = ($this->_sections['event_loop']['iteration'] == $this->_sections['event_loop']['total']);
?>
  <div id='seEvent_<?php echo $this->_tpl_vars['events'][$this->_sections['event_loop']['index']]['event']->event_info['event_id']; ?>
' class="seEvent <?php echo smarty_function_cycle(array('values' => 'seEvent1,seEvent2'), $this);?>
">

    <table cellpadding='0' cellspacing='0' width='100%'>
      <tr>
        <td class='seEventLeft' width='1'>
          <div class='seEventPhoto' style='width: 140px;'>
            <table cellpadding='0' cellspacing='0' width='140'>
              <tr>
                <td>
                  <a href='<?php echo $this->_tpl_vars['url']->url_create('event',$this->_tpl_vars['user']->user_info['user_username'],$this->_tpl_vars['events'][$this->_sections['event_loop']['index']]['event']->event_info['event_id']); ?>
'>
                    <img src='<?php echo $this->_tpl_vars['events'][$this->_sections['event_loop']['index']]['event']->event_photo("./images/nophoto.gif"); ?>
' border='0' width='<?php echo $this->_tpl_vars['misc']->photo_size($this->_tpl_vars['events'][$this->_sections['event_loop']['index']]['event']->event_photo("./images/nophoto.gif"),'140','140','w'); ?>
' />
                  </a>
                </td>
              </tr>
            </table>
          </div>
        </td>
        <td class='seEventRight' width='100%'>
        
                    <div class='seEventTitle'>
            <a href='<?php echo $this->_tpl_vars['url']->url_create('event',$this->_tpl_vars['user']->user_info['user_username'],$this->_tpl_vars['events'][$this->_sections['event_loop']['index']]['event']->event_info['event_id']); ?>
'>
              <?php if (! $this->_tpl_vars['events'][$this->_sections['event_loop']['index']]['event']->event_info['event_title']): ?><i><?php echo SELanguage::_get(589); ?></i><?php else: 
 echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['events'][$this->_sections['event_loop']['index']]['event']->event_info['event_title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 70, "...", false) : smarty_modifier_truncate($_tmp, 70, "...", false)))) ? $this->_run_mod_handler('choptext', true, $_tmp, 40, "<br />") : smarty_modifier_choptext($_tmp, 40, "<br />")); 
 endif; ?>
            </a>
          </div>
          
                    <?php if (! empty ( $this->_tpl_vars['events'][$this->_sections['event_loop']['index']]['event']->event_info['main_category_title'] )): ?>
          <div class='seEventCategory'>
            <?php echo SELanguage::_get(3000104); ?>
                        <?php if (! empty ( $this->_tpl_vars['events'][$this->_sections['event_loop']['index']]['event']->event_info['parent_category_title'] )): ?>
              <a href="browse_events.php?eventcat_id=<?php echo $this->_tpl_vars['events'][$this->_sections['event_loop']['index']]['event']->event_info['parent_category_id']; ?>
"><?php echo SELanguage::_get($this->_tpl_vars['events'][$this->_sections['event_loop']['index']]['event']->event_info['parent_category_title']); ?></a>
              -
            <?php endif; ?>
            <a href="browse_events.php?eventcat_id=<?php echo $this->_tpl_vars['events'][$this->_sections['event_loop']['index']]['event']->event_info['main_category_id']; ?>
"><?php echo SELanguage::_get($this->_tpl_vars['events'][$this->_sections['event_loop']['index']]['event']->event_info['main_category_title']); ?></a>
          </div>
          <?php endif; ?>
          
                    <div class='seEventStats'>
            <?php $this->assign('event_date_start', $this->_tpl_vars['datetime']->timezone($this->_tpl_vars['events'][$this->_sections['event_loop']['index']]['event']->event_info['event_date_start'],$this->_tpl_vars['global_timezone'])); ?>
            <?php $this->assign('event_date_end', $this->_tpl_vars['datetime']->timezone($this->_tpl_vars['events'][$this->_sections['event_loop']['index']]['event']->event_info['event_date_end'],$this->_tpl_vars['global_timezone'])); ?>
            
            <?php echo SELanguage::_get(3000105); ?>
            
                        <?php if (! $this->_tpl_vars['events'][$this->_sections['event_loop']['index']]['event']->event_info['event_date_end']): ?>
              <?php echo sprintf(SELanguage::_get(3000203), $this->_tpl_vars['datetime']->cdate($this->_tpl_vars['setting']['setting_dateformat'],$this->_tpl_vars['event_date_start']), $this->_tpl_vars['datetime']->cdate($this->_tpl_vars['setting']['setting_timeformat'],$this->_tpl_vars['event_date_start'])); ?>
            
                        <?php elseif ($this->_tpl_vars['datetime']->cdate("F j, Y",$this->_tpl_vars['event_date_start']) == $this->_tpl_vars['datetime']->cdate("F j, Y",$this->_tpl_vars['event_date_end'])): ?>
              <?php echo sprintf(SELanguage::_get(3000202), $this->_tpl_vars['datetime']->cdate($this->_tpl_vars['setting']['setting_dateformat'],$this->_tpl_vars['event_date_start']), $this->_tpl_vars['datetime']->cdate($this->_tpl_vars['setting']['setting_timeformat'],$this->_tpl_vars['event_date_start']), $this->_tpl_vars['datetime']->cdate($this->_tpl_vars['setting']['setting_timeformat'],$this->_tpl_vars['event_date_end'])); ?>
            
                        <?php else: ?>
              <?php echo sprintf(SELanguage::_get(3000204), $this->_tpl_vars['datetime']->cdate(($this->_tpl_vars['setting']['setting_dateformat'])." ".($this->_tpl_vars['setting']['setting_timeformat']),$this->_tpl_vars['event_date_start']), $this->_tpl_vars['datetime']->cdate(($this->_tpl_vars['setting']['setting_dateformat'])." ".($this->_tpl_vars['setting']['setting_timeformat']),$this->_tpl_vars['event_date_end'])); ?>
            <?php endif; ?>
          </div>
          
                    <div class='seEventStats'>
            <?php echo SELanguage::_get(3000277); ?>
            
            <span class="seEventStatusAccept"<?php if ($this->_tpl_vars['events'][$this->_sections['event_loop']['index']]['event']->is_member): ?> style="display:none;"<?php endif; ?>>
              <a href='javascript:void(0);' onclick="SocialEngine.Event.removeShow(<?php echo $this->_tpl_vars['events'][$this->_sections['event_loop']['index']]['event']->event_info['event_id']; ?>
);">
                <?php echo SELanguage::_get($this->_tpl_vars['events'][$this->_sections['event_loop']['index']]['event_rsvp_lvid']); ?>
              </a>
            </span>
            
            <span class="seEventStatusRSVP"<?php if (! $this->_tpl_vars['events'][$this->_sections['event_loop']['index']]['event']->is_member): ?> style="display:none;"<?php endif; ?>>
              <a href='javascript:void(0);' onclick="SocialEngine.Event.rsvpShow(<?php echo $this->_tpl_vars['events'][$this->_sections['event_loop']['index']]['event']->event_info['event_id']; ?>
);" id="seEventRSVP_<?php echo $this->_tpl_vars['events'][$this->_sections['event_loop']['index']]['event']->event_info['event_id']; ?>
">
                <?php echo SELanguage::_get($this->_tpl_vars['events'][$this->_sections['event_loop']['index']]['event_rsvp_lvid']); ?>
              </a>
            </span>
          </div>
          
                    <div class='seEventBody' style='margin-top: 8px; margin-bottom: 8px;'>
            <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['events'][$this->_sections['event_loop']['index']]['event']->event_info['event_desc'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 197, "...", true) : smarty_modifier_truncate($_tmp, 197, "...", true)); ?>

          </div>
          
                    <div class='seEventOptions'>
            
                        <div class="seEventOption1 seEventUserOptionJoin"<?php if (! $this->_tpl_vars['events'][$this->_sections['event_loop']['index']]['event']->is_member_waiting || ! $this->_tpl_vars['events'][$this->_sections['event_loop']['index']]['event_approved']): ?> style="display:none;"<?php endif; ?>>
              <a href='javascript:void(0);' onclick="SocialEngine.Event.join(<?php echo $this->_tpl_vars['events'][$this->_sections['event_loop']['index']]['event']->event_info['event_id']; ?>
);">
                <img src='./images/icons/event_join16.gif' border='0' class='button' />
                <?php echo SELanguage::_get(3000168); ?>
              </a>
            </div>
            
                        <div class="seEventOption1 seEventUserOptionRequestCancel"<?php if (! $this->_tpl_vars['events'][$this->_sections['event_loop']['index']]['event']->is_member_waiting || $this->_tpl_vars['events'][$this->_sections['event_loop']['index']]['event_approved']): ?> style="display:none;"<?php endif; ?>>
              <a href='javascript:void(0);' onclick="SocialEngine.Event.cancelShow(<?php echo $this->_tpl_vars['events'][$this->_sections['event_loop']['index']]['event']->event_info['event_id']; ?>
);">
                <img src='./images/icons/event_remove16.gif' border='0' class='button' />
                <?php echo SELanguage::_get(3000170); ?>
              </a>
            </div>
            
                        <div class="seEventOption1 seEventUserOptionEdit"<?php if ($this->_tpl_vars['events'][$this->_sections['event_loop']['index']]['event']->user_rank != 3): ?> style="display:none;"<?php endif; ?>>
              <a href='user_event_edit.php?event_id=<?php echo $this->_tpl_vars['events'][$this->_sections['event_loop']['index']]['event']->event_info['event_id']; ?>
'>
                <img src='./images/icons/event_edit16.gif' border='0' class='button' />
                <?php echo SELanguage::_get(3000245); ?>
              </a>
            </div>
            
                        <div class="seEventOption1 seEventUserOptionRsvp"<?php if (! $this->_tpl_vars['events'][$this->_sections['event_loop']['index']]['event']->is_member): ?> style="display:none;"<?php endif; ?>>
              <a href='javascript:void(0);' onclick="SocialEngine.Event.rsvpShow(<?php echo $this->_tpl_vars['events'][$this->_sections['event_loop']['index']]['event']->event_info['event_id']; ?>
);">
                <img src='./images/icons/event_rsvp16.gif' border='0' class='button' />
                <?php echo SELanguage::_get(3000097); ?>
              </a>
            </div>
            
                        <div class="seEventOption1 seEventUserOptionLeave"<?php if ($this->_tpl_vars['events'][$this->_sections['event_loop']['index']]['event']->user_rank == 3 || ! $this->_tpl_vars['events'][$this->_sections['event_loop']['index']]['event']->is_member): ?> style="display:none;"<?php endif; ?>>
              <a href='javascript:void(0);' onclick="SocialEngine.Event.leaveShow(<?php echo $this->_tpl_vars['events'][$this->_sections['event_loop']['index']]['event']->event_info['event_id']; ?>
);">
                <img src='./images/icons/event_remove16.gif' border='0' class='button' />
                <?php echo SELanguage::_get(3000219); ?>
              </a>
            </div>
            
                        <div class="seEventOption1 seEventUserOptionDelete"<?php if ($this->_tpl_vars['events'][$this->_sections['event_loop']['index']]['event']->user_rank != 3): ?> style="display:none;"<?php endif; ?>>
              <a href='javascript:void(0);' onclick="SocialEngine.Event.deleteShow(<?php echo $this->_tpl_vars['events'][$this->_sections['event_loop']['index']]['event']->event_info['event_id']; ?>
);">
                <img src='./images/icons/event_delete16.gif' border='0' class='button' />
                <?php echo SELanguage::_get(3000169); ?>
              </a>
            </div>
            
          </div>
        </td>
      </tr>
    </table>
    
  </div>
  <?php endfor; endif; ?>

  <div style='clear: both; height: 0px;'></div>
  
  
    <?php if ($this->_tpl_vars['maxpage'] > 1): ?>
    <div class='center'>
      <?php if ($this->_tpl_vars['p'] != 1): ?>
        <a href='user_event.php?view=list&search=<?php echo $this->_tpl_vars['search']; ?>
&p=<?php echo smarty_function_math(array('equation' => "p-1",'p' => $this->_tpl_vars['p']), $this);?>
'>&#171; <?php echo SELanguage::_get(182); ?></a>
      <?php else: ?>
        <font class='disabled'>&#171; <?php echo SELanguage::_get(182); ?></font>
      <?php endif; ?>
      <?php if ($this->_tpl_vars['p_start'] == $this->_tpl_vars['p_end']): ?>
        &nbsp;|&nbsp; <?php echo sprintf(SELanguage::_get(184), $this->_tpl_vars['p_start'], $this->_tpl_vars['total_events']); ?> &nbsp;|&nbsp; 
      <?php else: ?>
        &nbsp;|&nbsp; <?php echo sprintf(SELanguage::_get(185), $this->_tpl_vars['p_start'], $this->_tpl_vars['p_end'], $this->_tpl_vars['total_events']); ?> &nbsp;|&nbsp; 
      <?php endif; ?>
      <?php if ($this->_tpl_vars['p'] != $this->_tpl_vars['maxpage']): ?>
        <a href='user_event.php?view=list&search=<?php echo $this->_tpl_vars['search']; ?>
&p=<?php echo smarty_function_math(array('equation' => "p+1",'p' => $this->_tpl_vars['p']), $this);?>
'><?php echo SELanguage::_get(183); ?> &#187;</a>
      <?php else: ?>
        <font class='disabled'><?php echo SELanguage::_get(183); ?> &#187;</font>
      <?php endif; ?>
    </div>
    <br />
  <?php endif; ?>
  
  
<?php endif; 
 $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>