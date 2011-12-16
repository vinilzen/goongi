<?php /* Smarty version 2.6.14, created on 2011-12-15 15:38:22
         compiled from event_calendar.tpl */
?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'event_calendar.tpl', 29, false),array('function', 'math', 'event_calendar.tpl', 43, false),array('modifier', 'in_array', 'event_calendar.tpl', 38, false),array('modifier', 'count', 'event_calendar.tpl', 39, false),array('modifier', 'truncate', 'event_calendar.tpl', 85, false),array('modifier', 'choptext', 'event_calendar.tpl', 85, false),array('modifier', 'strip_tags', 'event_calendar.tpl', 130, false),)), $this);
?><?php
SELanguage::_preload_multi(3000237,3000238,3000239,3000240,3000241,3000242,3000243,3000276,589,3000104,3000105,3000203,3000202,3000204,3000236,3000230,3000231,3000232,3000233,3000234,3000235,3000277,3000168,3000170,3000245,3000097,3000219,3000169);
SELanguage::load();
?>

<?php if ($this->_tpl_vars['calendar_view'] == 'month_small'): ?>
  
  <div style='text-align: center; padding-bottom: 5px;font-weight: bold;'>
    <?php if (! isset ( $this->_tpl_vars['show_next_last'] ) || $this->_tpl_vars['show_next_last']): ?><a href='profile_event_calendar.php?user=<?php echo $this->_tpl_vars['owner']->user_info['user_username']; ?>
&date=<?php echo $this->_tpl_vars['date_last']; ?>
'>&#171;</a><?php endif; ?>
    <?php echo $this->_tpl_vars['month']; ?>
, <?php echo $this->_tpl_vars['year']; ?>

    <?php if (! isset ( $this->_tpl_vars['show_next_last'] ) || $this->_tpl_vars['show_next_last']): ?><a href='profile_event_calendar.php?user=<?php echo $this->_tpl_vars['owner']->user_info['user_username']; ?>
&date=<?php echo $this->_tpl_vars['date_next']; ?>
'>&#187;</a><?php endif; ?>
  </div>
  
  
  <table cellpadding='0' cellspacing='0' class='profile_events'>
    <tr>
      <td class='profile_events_cellheader'><?php echo SELanguage::_get(3000237); ?></td>
      <td class='profile_events_cellheader'><?php echo SELanguage::_get(3000238); ?></td>
      <td class='profile_events_cellheader'><?php echo SELanguage::_get(3000239); ?></td>
      <td class='profile_events_cellheader'><?php echo SELanguage::_get(3000240); ?></td>
      <td class='profile_events_cellheader'><?php echo SELanguage::_get(3000241); ?></td>
      <td class='profile_events_cellheader'><?php echo SELanguage::_get(3000242); ?></td>
      <td class='profile_events_cellheader'><?php echo SELanguage::_get(3000243); ?></td>
    </tr>
    
        <?php $this->assign('daycount', 1); ?>
    <?php unset($this->_sections['calendar']);
$this->_sections['calendar']['name'] = 'calendar';
$this->_sections['calendar']['loop'] = is_array($_loop=$this->_tpl_vars['total_cells']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['calendar']['show'] = true;
$this->_sections['calendar']['max'] = $this->_sections['calendar']['loop'];
$this->_sections['calendar']['step'] = 1;
$this->_sections['calendar']['start'] = $this->_sections['calendar']['step'] > 0 ? 0 : $this->_sections['calendar']['loop']-1;
if ($this->_sections['calendar']['show']) {
    $this->_sections['calendar']['total'] = $this->_sections['calendar']['loop'];
    if ($this->_sections['calendar']['total'] == 0)
        $this->_sections['calendar']['show'] = false;
} else
    $this->_sections['calendar']['total'] = 0;
if ($this->_sections['calendar']['show']):

            for ($this->_sections['calendar']['index'] = $this->_sections['calendar']['start'], $this->_sections['calendar']['iteration'] = 1;
                 $this->_sections['calendar']['iteration'] <= $this->_sections['calendar']['total'];
                 $this->_sections['calendar']['index'] += $this->_sections['calendar']['step'], $this->_sections['calendar']['iteration']++):
$this->_sections['calendar']['rownum'] = $this->_sections['calendar']['iteration'];
$this->_sections['calendar']['index_prev'] = $this->_sections['calendar']['index'] - $this->_sections['calendar']['step'];
$this->_sections['calendar']['index_next'] = $this->_sections['calendar']['index'] + $this->_sections['calendar']['step'];
$this->_sections['calendar']['first']      = ($this->_sections['calendar']['iteration'] == 1);
$this->_sections['calendar']['last']       = ($this->_sections['calendar']['iteration'] == $this->_sections['calendar']['total']);
?>
    
        <?php echo smarty_function_cycle(array('name' => 'startrow','values' => "<tr>,,,,,,"), $this);?>

    
        <?php if ($this->_sections['calendar']['index']+1 < $this->_tpl_vars['first_day_of_month'] || $this->_sections['calendar']['index']+1 > $this->_tpl_vars['last_day_of_month']): ?>
      <td class='profile_events_cellblank'>&nbsp;</td>
    
        <?php else: ?>
      <?php $this->assign('day_events', $this->_tpl_vars['events'][$this->_tpl_vars['daycount']]); ?>
      <?php if (is_array ( $this->_tpl_vars['event_days'] )): 
 $this->assign('is_event_day', ((is_array($_tmp=$this->_tpl_vars['daycount'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['event_days']) : in_array($_tmp, $this->_tpl_vars['event_days']))); 
 else: 
 $this->assign('is_event_day', 0); 
 endif; ?>
      <td class='profile_events_cell<?php if ($this->_tpl_vars['is_event_day']): ?>4<?php elseif ($this->_tpl_vars['today_day'] == $this->_tpl_vars['daycount'] && $this->_tpl_vars['today_month'] == $this->_tpl_vars['date_current']): ?>3<?php elseif (count($this->_tpl_vars['day_events']) != 0): ?>2<?php else: ?>1<?php endif; ?>' align='center'>
        <?php if (count($this->_tpl_vars['day_events']) == 0): ?>
	  <?php echo $this->_tpl_vars['daycount']; ?>

	<?php else: ?>
	  <a href='javascript:void(0)' onClick="parent.se_popup('day<?php echo $this->_tpl_vars['daycount']; ?>
', '<?php echo smarty_function_math(array('equation' => 'x*200','x' => count($this->_tpl_vars['day_events'])), $this);?>
');"><?php echo $this->_tpl_vars['daycount']; ?>
</a>


	  <table id='day<?php echo $this->_tpl_vars['daycount']; ?>
' cellpadding='0' cellspacing='0' class='profile_event_popup'>
          <tr>
          <td class='profile_event_transparent' colspan='3' style='height: 20px;'>&nbsp;</td>
          </tr>
          <tr>
          <td class='profile_event_transparent' style='width: 20px;'>&nbsp;</td>
          <td class='profile_event_popup2'>
          
            <table cellpadding='0' cellspacing='0' width='100%'>
            <tr>
            <td class='profile_event_popup_title'><?php echo sprintf(SELanguage::_get(3000276), $this->_tpl_vars['owner']->user_displayname, ($this->_tpl_vars['month'])." ".($this->_tpl_vars['daycount'])); ?></td>
            </tr>
            </table>
            
            <?php unset($this->_sections['event_loop']);
$this->_sections['event_loop']['name'] = 'event_loop';
$this->_sections['event_loop']['loop'] = is_array($_loop=$this->_tpl_vars['day_events']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
              
<div id='seEvent_<?php echo $this->_tpl_vars['day_events'][$this->_sections['event_loop']['index']]['event']->event_info['event_id']; ?>
' class="seEventMonth" style="margin-top: 20px;">

  <table cellpadding='0' cellspacing='0' width='100%'>
    <tr>
      <td class='seEventLeft' width='1'>
        <div class='seEventPhoto' style='width: 140px; height: 140px;'>
          <table cellpadding='0' cellspacing='0' width='140' height='140'>
            <tr>
              <td>
                <a href='<?php echo $this->_tpl_vars['url']->url_create('event',$this->_tpl_vars['user']->user_info['user_username'],$this->_tpl_vars['day_events'][$this->_sections['event_loop']['index']]['event']->event_info['event_id']); ?>
'>
                  <img src='<?php echo $this->_tpl_vars['day_events'][$this->_sections['event_loop']['index']]['event']->event_photo("./images/nophoto.gif"); ?>
' border='0' width='<?php echo $this->_tpl_vars['misc']->photo_size($this->_tpl_vars['day_events'][$this->_sections['event_loop']['index']]['event']->event_photo("./images/nophoto.gif"),'140','140','w'); ?>
' />
                </a>
              </td>
            </tr>
          </table>
        </div>
      </td>
      <td class='seEventRight' width='100%'>
      
                <div class='seEventTitle'>
          <a href='<?php echo $this->_tpl_vars['url']->url_create('event',$this->_tpl_vars['user']->user_info['user_username'],$this->_tpl_vars['day_events'][$this->_sections['event_loop']['index']]['event']->event_info['event_id']); ?>
'>
            <?php if (! $this->_tpl_vars['day_events'][$this->_sections['event_loop']['index']]['event']->event_info['event_title']): ?><i><?php echo SELanguage::_get(589); ?></i><?php else: 
 echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['day_events'][$this->_sections['event_loop']['index']]['event']->event_info['event_title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 70, "...", false) : smarty_modifier_truncate($_tmp, 70, "...", false)))) ? $this->_run_mod_handler('choptext', true, $_tmp, 40, "<br />") : smarty_modifier_choptext($_tmp, 40, "<br />")); 
 endif; ?>
          </a>
        </div>
        
                <?php if (! empty ( $this->_tpl_vars['day_events'][$this->_sections['event_loop']['index']]['event']->event_info['main_category_title'] )): ?>
        <div class='seEventCategory'>
          <?php echo SELanguage::_get(3000104); ?>
                    <?php if (! empty ( $this->_tpl_vars['day_events'][$this->_sections['event_loop']['index']]['event']->event_info['parent_category_title'] )): ?>
            <a href="browse_events.php?eventcat_id=<?php echo $this->_tpl_vars['day_events'][$this->_sections['event_loop']['index']]['event']->event_info['parent_category_id']; ?>
"><?php echo SELanguage::_get($this->_tpl_vars['day_events'][$this->_sections['event_loop']['index']]['event']->event_info['parent_category_title']); ?></a>
            -
          <?php endif; ?>
          <a href="browse_events.php?eventcat_id=<?php echo $this->_tpl_vars['day_events'][$this->_sections['event_loop']['index']]['event']->event_info['main_category_id']; ?>
"><?php echo SELanguage::_get($this->_tpl_vars['day_events'][$this->_sections['event_loop']['index']]['event']->event_info['main_category_title']); ?></a>
        </div>
        <?php endif; ?>
        
                <div class='seEventStats'>
          <?php $this->assign('event_date_start', $this->_tpl_vars['datetime']->timezone($this->_tpl_vars['day_events'][$this->_sections['event_loop']['index']]['event']->event_info['event_date_start'],$this->_tpl_vars['global_timezone'])); ?>
          <?php $this->assign('event_date_end', $this->_tpl_vars['datetime']->timezone($this->_tpl_vars['day_events'][$this->_sections['event_loop']['index']]['event']->event_info['event_date_end'],$this->_tpl_vars['global_timezone'])); ?>
          
          <?php echo SELanguage::_get(3000105); ?>
          
                    <?php if (! $this->_tpl_vars['day_events'][$this->_sections['event_loop']['index']]['event']->event_info['event_date_end']): ?>
            <?php echo sprintf(SELanguage::_get(3000203), $this->_tpl_vars['datetime']->cdate($this->_tpl_vars['setting']['setting_dateformat'],$this->_tpl_vars['event_date_start']), $this->_tpl_vars['datetime']->cdate($this->_tpl_vars['setting']['setting_timeformat'],$this->_tpl_vars['event_date_start'])); ?>
          
                    <?php elseif ($this->_tpl_vars['datetime']->cdate("F j, Y",$this->_tpl_vars['event_date_start']) == $this->_tpl_vars['datetime']->cdate("F j, Y",$this->_tpl_vars['event_date_end'])): ?>
            <?php echo sprintf(SELanguage::_get(3000202), $this->_tpl_vars['datetime']->cdate($this->_tpl_vars['setting']['setting_dateformat'],$this->_tpl_vars['event_date_start']), $this->_tpl_vars['datetime']->cdate($this->_tpl_vars['setting']['setting_timeformat'],$this->_tpl_vars['event_date_start']), $this->_tpl_vars['datetime']->cdate($this->_tpl_vars['setting']['setting_timeformat'],$this->_tpl_vars['event_date_end'])); ?>
          
                    <?php else: ?>
            <?php echo sprintf(SELanguage::_get(3000204), $this->_tpl_vars['datetime']->cdate(($this->_tpl_vars['setting']['setting_dateformat'])." ".($this->_tpl_vars['setting']['setting_timeformat']),$this->_tpl_vars['event_date_start']), $this->_tpl_vars['datetime']->cdate(($this->_tpl_vars['setting']['setting_dateformat'])." ".($this->_tpl_vars['setting']['setting_timeformat']),$this->_tpl_vars['event_date_end'])); ?>
          <?php endif; ?>
        </div>
        
                <div class='seEventStats'>
          <?php echo SELanguage::_get($this->_tpl_vars['day_events'][$this->_sections['event_loop']['index']]['event_rsvp_lvid']); ?>
        </div>
        
                <div class='seEventBody' style='margin-top: 8px; margin-bottom: 8px;'>
          <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['day_events'][$this->_sections['event_loop']['index']]['event']->event_info['event_desc'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 197, "...", true) : smarty_modifier_truncate($_tmp, 197, "...", true)); ?>

        </div>
      </td>
    </tr>
  </table>
  
</div>
              
              <?php endfor; endif; ?>
              
            </td>
            <td class='profile_event_transparent' style='width: 20px;'>&nbsp;</td>
          </tr>
          <tr>
            <td colspan='3' class='profile_event_transparent' style='height: 20px;'>&nbsp;</td>
          </tr>
        </table>
          
        <?php endif; ?>
      </td>
      <?php $this->assign('daycount', $this->_tpl_vars['daycount']+1); ?>
    <?php endif; ?>
    
        <?php echo smarty_function_cycle(array('name' => 'endrow','values' => ",,,,,,</tr>"), $this);?>

    
  <?php endfor; endif; ?>

  </table>



<?php elseif ($this->_tpl_vars['calendar_view'] == 'month'): ?>

  <table cellpadding='0' cellspacing='0' class='event_calendar'>
    <tr>
	  <td class='event_cellheader'><?php echo SELanguage::_get(3000236); ?></td>
      <td class='event_cellheader'><?php echo SELanguage::_get(3000230); ?></td>
      <td class='event_cellheader'><?php echo SELanguage::_get(3000231); ?></td>
      <td class='event_cellheader'><?php echo SELanguage::_get(3000232); ?></td>
      <td class='event_cellheader'><?php echo SELanguage::_get(3000233); ?></td>
      <td class='event_cellheader'><?php echo SELanguage::_get(3000234); ?></td>
      <td class='event_cellheader'><?php echo SELanguage::_get(3000235); ?></td>
      
    </tr>
    
        <?php $this->assign('daycount', 1); ?>
    <?php unset($this->_sections['calendar']);
$this->_sections['calendar']['name'] = 'calendar';
$this->_sections['calendar']['loop'] = is_array($_loop=$this->_tpl_vars['total_cells']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['calendar']['show'] = true;
$this->_sections['calendar']['max'] = $this->_sections['calendar']['loop'];
$this->_sections['calendar']['step'] = 1;
$this->_sections['calendar']['start'] = $this->_sections['calendar']['step'] > 0 ? 0 : $this->_sections['calendar']['loop']-1;
if ($this->_sections['calendar']['show']) {
    $this->_sections['calendar']['total'] = $this->_sections['calendar']['loop'];
    if ($this->_sections['calendar']['total'] == 0)
        $this->_sections['calendar']['show'] = false;
} else
    $this->_sections['calendar']['total'] = 0;
if ($this->_sections['calendar']['show']):

            for ($this->_sections['calendar']['index'] = $this->_sections['calendar']['start'], $this->_sections['calendar']['iteration'] = 1;
                 $this->_sections['calendar']['iteration'] <= $this->_sections['calendar']['total'];
                 $this->_sections['calendar']['index'] += $this->_sections['calendar']['step'], $this->_sections['calendar']['iteration']++):
$this->_sections['calendar']['rownum'] = $this->_sections['calendar']['iteration'];
$this->_sections['calendar']['index_prev'] = $this->_sections['calendar']['index'] - $this->_sections['calendar']['step'];
$this->_sections['calendar']['index_next'] = $this->_sections['calendar']['index'] + $this->_sections['calendar']['step'];
$this->_sections['calendar']['first']      = ($this->_sections['calendar']['iteration'] == 1);
$this->_sections['calendar']['last']       = ($this->_sections['calendar']['iteration'] == $this->_sections['calendar']['total']);
?>
    
        <?php echo smarty_function_cycle(array('name' => 'startrow','values' => "<tr>,,,,,,"), $this);?>

    
        <?php if ($this->_sections['calendar']['index'] < $this->_tpl_vars['first_day_of_month'] || $this->_sections['calendar']['index'] > $this->_tpl_vars['last_day_of_month']): ?>
		<?php if ($this->_tpl_vars['first_day_of_month'] != 7 || $this->_sections['calendar']['index'] > $this->_tpl_vars['first_day_of_month']): ?>
      <td height='80' class='event_cellblank'>
        <div class='event_cellnum'>&nbsp;</div>
      </td>
		<?php endif; ?>
        <?php else: ?>
      <?php $this->assign('day_events', $this->_tpl_vars['events'][$this->_tpl_vars['daycount']]); ?>
      <td height='80' id="event_cell<?php echo $this->_tpl_vars['daycount']; ?>
" class='event_cell<?php if ($this->_tpl_vars['today_month'] == $this->_tpl_vars['date_current'] && $this->_tpl_vars['today_day'] == $this->_tpl_vars['daycount']): ?>3<?php elseif (count($this->_tpl_vars['day_events']) != 0): ?>2<?php else: ?>1<?php endif; ?>'>
      
        <table cellpadding='0' cellspacing='0' width='100%' height='100%'>
          <tr>
            <td class='event_celldesc'>
              
              <?php unset($this->_sections['event_loop']);
$this->_sections['event_loop']['name'] = 'event_loop';
$this->_sections['event_loop']['loop'] = is_array($_loop=$this->_tpl_vars['day_events']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
              <a href='/event/<?php echo $this->_tpl_vars['day_events'][$this->_sections['event_loop']['index']]['event']->event_info['event_id']; ?>
/' id="seEventMonthShow_" title="<?php echo $this->_tpl_vars['daycount']; ?>
" ><?php echo $this->_tpl_vars['day_events'][$this->_sections['event_loop']['index']]['event']->event_info['event_title']; ?>
</a><br>
              <?php if ($this->_tpl_vars['day_events'][$this->_sections['event_loop']['index']]['event']->event_info['event_title'] != ""): ?>
              <table id='event<?php echo $this->_tpl_vars['day_events'][$this->_sections['event_loop']['index']]['event']->event_info['event_id']; ?>
' cellpadding='0' cellspacing='0' class='profile_event_popup'>
                <tr>
                  <td class='profile_event_transparent' colspan='3' style='height: 20px;'>&nbsp;</td>
                </tr>
                <tr>
                  <td class='profile_event_transparent' style='width: 20px;'>&nbsp;</td>
                  <td class='profile_event_popup2'>
<div id='seEvent_<?php echo $this->_tpl_vars['day_events'][$this->_sections['event_loop']['index']]['event']->event_info['event_id']; ?>
' class="seEventMonth">

  <table cellpadding='0' cellspacing='0' width='100%'>
    <tr>
      <td class='seEventLeft' width='1'>
        <div class='seEventPhoto' style='width: 140px; height: 140px;'>
          <table cellpadding='0' cellspacing='0' width='140' height='140'>
            <tr>
              <td>
                <a href='<?php echo $this->_tpl_vars['url']->url_create('event',$this->_tpl_vars['user']->user_info['user_username'],$this->_tpl_vars['day_events'][$this->_sections['event_loop']['index']]['event']->event_info['event_id']); ?>
'>
                  <img src='<?php echo $this->_tpl_vars['day_events'][$this->_sections['event_loop']['index']]['event']->event_photo("./images/nophoto.gif"); ?>
' border='0' width='<?php echo $this->_tpl_vars['misc']->photo_size($this->_tpl_vars['day_events'][$this->_sections['event_loop']['index']]['event']->event_photo("./images/nophoto.gif"),'140','140','w'); ?>
' />
                </a>
              </td>
            </tr>
          </table>
        </div>
      </td>
      <td class='seEventRight' width='100%'>
      
                <div class='seEventTitle'>
          <a href='<?php echo $this->_tpl_vars['url']->url_create('event',$this->_tpl_vars['user']->user_info['user_username'],$this->_tpl_vars['day_events'][$this->_sections['event_loop']['index']]['event']->event_info['event_id']); ?>
'>
            <?php if (! $this->_tpl_vars['day_events'][$this->_sections['event_loop']['index']]['event']->event_info['event_title']): ?><i><?php echo SELanguage::_get(589); ?></i><?php else: 
 echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['day_events'][$this->_sections['event_loop']['index']]['event']->event_info['event_title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 70, "...", false) : smarty_modifier_truncate($_tmp, 70, "...", false)))) ? $this->_run_mod_handler('choptext', true, $_tmp, 40, "<br />") : smarty_modifier_choptext($_tmp, 40, "<br />")); 
 endif; ?>
          </a>
        </div>
        
                <?php if (! empty ( $this->_tpl_vars['day_events'][$this->_sections['event_loop']['index']]['event']->event_info['main_category_title'] )): ?>
        <div class='seEventCategory'>
          <?php echo SELanguage::_get(3000104); ?>
                    <?php if (! empty ( $this->_tpl_vars['day_events'][$this->_sections['event_loop']['index']]['event']->event_info['parent_category_title'] )): ?>
            <a href="browse_events.php?eventcat_id=<?php echo $this->_tpl_vars['day_events'][$this->_sections['event_loop']['index']]['event']->event_info['parent_category_id']; ?>
"><?php echo SELanguage::_get($this->_tpl_vars['day_events'][$this->_sections['event_loop']['index']]['event']->event_info['parent_category_title']); ?></a>
            -
          <?php endif; ?>
          <a href="browse_events.php?eventcat_id=<?php echo $this->_tpl_vars['day_events'][$this->_sections['event_loop']['index']]['event']->event_info['main_category_id']; ?>
"><?php echo SELanguage::_get($this->_tpl_vars['day_events'][$this->_sections['event_loop']['index']]['event']->event_info['main_category_title']); ?></a>
        </div>
        <?php endif; ?>
        
                <div class='seEventStats'>
          <?php $this->assign('event_date_start', $this->_tpl_vars['datetime']->timezone($this->_tpl_vars['day_events'][$this->_sections['event_loop']['index']]['event']->event_info['event_date_start'],$this->_tpl_vars['global_timezone'])); ?>
          <?php $this->assign('event_date_end', $this->_tpl_vars['datetime']->timezone($this->_tpl_vars['day_events'][$this->_sections['event_loop']['index']]['event']->event_info['event_date_end'],$this->_tpl_vars['global_timezone'])); ?>
          
          <?php echo SELanguage::_get(3000105); ?>
          
                    <?php if (! $this->_tpl_vars['day_events'][$this->_sections['event_loop']['index']]['event']->event_info['event_date_end']): ?>
            <?php echo sprintf(SELanguage::_get(3000203), $this->_tpl_vars['datetime']->cdate($this->_tpl_vars['setting']['setting_dateformat'],$this->_tpl_vars['event_date_start']), $this->_tpl_vars['datetime']->cdate($this->_tpl_vars['setting']['setting_timeformat'],$this->_tpl_vars['event_date_start'])); ?>
          
                    <?php elseif ($this->_tpl_vars['datetime']->cdate("F j, Y",$this->_tpl_vars['event_date_start']) == $this->_tpl_vars['datetime']->cdate("F j, Y",$this->_tpl_vars['event_date_end'])): ?>
            <?php echo sprintf(SELanguage::_get(3000202), $this->_tpl_vars['datetime']->cdate($this->_tpl_vars['setting']['setting_dateformat'],$this->_tpl_vars['event_date_start']), $this->_tpl_vars['datetime']->cdate($this->_tpl_vars['setting']['setting_timeformat'],$this->_tpl_vars['event_date_start']), $this->_tpl_vars['datetime']->cdate($this->_tpl_vars['setting']['setting_timeformat'],$this->_tpl_vars['event_date_end'])); ?>
          
                    <?php else: ?>
            <?php echo sprintf(SELanguage::_get(3000204), $this->_tpl_vars['datetime']->cdate(($this->_tpl_vars['setting']['setting_dateformat'])." ".($this->_tpl_vars['setting']['setting_timeformat']),$this->_tpl_vars['event_date_start']), $this->_tpl_vars['datetime']->cdate(($this->_tpl_vars['setting']['setting_dateformat'])." ".($this->_tpl_vars['setting']['setting_timeformat']),$this->_tpl_vars['event_date_end'])); ?>
          <?php endif; ?>
        </div>
        
                <div class='seEventStats'>
          <?php echo SELanguage::_get(3000277); ?>
          
          <span class="seEventStatusAccept"<?php if ($this->_tpl_vars['day_events'][$this->_sections['event_loop']['index']]['event']->is_member): ?> style="display:none;"<?php endif; ?>>
            <a href='javascript:void(0);' onclick="SocialEngine.Event.removeShow(<?php echo $this->_tpl_vars['day_events'][$this->_sections['event_loop']['index']]['event']->event_info['event_id']; ?>
);">
              <?php echo SELanguage::_get($this->_tpl_vars['day_events'][$this->_sections['event_loop']['index']]['event_rsvp_lvid']); ?>
            </a>
          </span>
          
          <span class="seEventStatusRSVP"<?php if (! $this->_tpl_vars['day_events'][$this->_sections['event_loop']['index']]['event']->is_member): ?> style="display:none;"<?php endif; ?>>
            <a href='javascript:void(0);' onclick="SocialEngine.Event.rsvpShow(<?php echo $this->_tpl_vars['day_events'][$this->_sections['event_loop']['index']]['event']->event_info['event_id']; ?>
);" id="seEventRSVP_<?php echo $this->_tpl_vars['day_events'][$this->_sections['event_loop']['index']]['event']->event_info['event_id']; ?>
">
              <?php echo SELanguage::_get($this->_tpl_vars['day_events'][$this->_sections['event_loop']['index']]['event_rsvp_lvid']); ?>
            </a>
          </span>
        </div>
        
                <div class='seEventBody' style='margin-top: 8px; margin-bottom: 8px;'>
          <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['day_events'][$this->_sections['event_loop']['index']]['event']->event_info['event_desc'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 197, "...", true) : smarty_modifier_truncate($_tmp, 197, "...", true)); ?>

        </div>
        
                <div class='seEventOptions'>
          
                    <div class="seEventOption1 seEventUserOptionJoin"<?php if (! $this->_tpl_vars['day_events'][$this->_sections['event_loop']['index']]['event']->is_member_waiting || ! $this->_tpl_vars['day_events'][$this->_sections['event_loop']['index']]['event_approved']): ?> style="display:none;"<?php endif; ?>>
            <a href='javascript:void(0);' onclick="parent.SocialEngine.Event.join(<?php echo $this->_tpl_vars['day_events'][$this->_sections['event_loop']['index']]['event']->event_info['event_id']; ?>
);">
              <img src='./images/icons/event_join16.gif' border='0' class='button' />
              <?php echo SELanguage::_get(3000168); ?>
            </a>
          </div>
          
                    <div class="seEventOption1 seEventUserOptionRequestCancel"<?php if (! $this->_tpl_vars['day_events'][$this->_sections['event_loop']['index']]['event']->is_member_waiting || $this->_tpl_vars['day_events'][$this->_sections['event_loop']['index']]['event_approved']): ?> style="display:none;"<?php endif; ?>>
            <a href='javascript:void(0);' onclick="parent.SocialEngine.Event.cancelShow(<?php echo $this->_tpl_vars['day_events'][$this->_sections['event_loop']['index']]['event']->event_info['event_id']; ?>
);">
              <img src='./images/icons/event_remove16.gif' border='0' class='button' />
              <?php echo SELanguage::_get(3000170); ?>
            </a>
          </div>
          
                    <div class="seEventOption1 seEventUserOptionEdit"<?php if ($this->_tpl_vars['day_events'][$this->_sections['event_loop']['index']]['event']->user_rank != 3): ?> style="display:none;"<?php endif; ?>>
            <a href='user_event_edit.php?event_id=<?php echo $this->_tpl_vars['day_events'][$this->_sections['event_loop']['index']]['event']->event_info['event_id']; ?>
'>
              <img src='./images/icons/event_edit16.gif' border='0' class='button' />
              <?php echo SELanguage::_get(3000245); ?>
            </a>
          </div>
          
                    <div class="seEventOption1 seEventUserOptionRsvp"<?php if (! $this->_tpl_vars['day_events'][$this->_sections['event_loop']['index']]['event']->is_member): ?> style="display:none;"<?php endif; ?>>
            <a href='javascript:void(0);' onclick="parent.SocialEngine.Event.rsvpShow(<?php echo $this->_tpl_vars['day_events'][$this->_sections['event_loop']['index']]['event']->event_info['event_id']; ?>
);">
              <img src='./images/icons/event_rsvp16.gif' border='0' class='button' />
              <?php echo SELanguage::_get(3000097); ?>
            </a>
          </div>
          
                    <div class="seEventOption1 seEventUserOptionLeave"<?php if ($this->_tpl_vars['day_events'][$this->_sections['event_loop']['index']]['event']->user_rank == 3 || ! $this->_tpl_vars['day_events'][$this->_sections['event_loop']['index']]['event']->is_member): ?> style="display:none;"<?php endif; ?>>
            <a href='javascript:void(0);' onclick="parent.SocialEngine.Event.leaveShow(<?php echo $this->_tpl_vars['day_events'][$this->_sections['event_loop']['index']]['event']->event_info['event_id']; ?>
);">
              <img src='./images/icons/event_remove16.gif' border='0' class='button' />
              <?php echo SELanguage::_get(3000219); ?>
            </a>
          </div>
          
                    <div class="seEventOption1 seEventUserOptionDelete"<?php if ($this->_tpl_vars['day_events'][$this->_sections['event_loop']['index']]['event']->user_rank != 3): ?> style="display:none;"<?php endif; ?>>
            <a href='javascript:void(0);' onclick="parent.SocialEngine.Event.deleteShow(<?php echo $this->_tpl_vars['day_events'][$this->_sections['event_loop']['index']]['event']->event_info['event_id']; ?>
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
                </td>
                <td class='profile_event_transparent' style='width: 20px;'>&nbsp;</td>
              </tr>
              <tr>
                <td colspan='3' class='profile_event_transparent' style='height: 20px;'>&nbsp;</td>
              </tr>
    	      </table>
            <?php endif; ?>
            <?php endfor; endif; ?>
            &nbsp;
            </td>
          </tr>
          <tr>
            <td class='event_cellnum<?php if (count($this->_tpl_vars['day_events']) != 0): ?>2<?php else: ?>1<?php endif; ?>'><?php echo $this->_tpl_vars['daycount']; ?>
</td>
          </tr>
        </table>
        
      </td>
    <?php $this->assign('daycount', $this->_tpl_vars['daycount']+1); ?>
    <?php endif; ?>
    
        <?php echo smarty_function_cycle(array('name' => 'endrow','values' => ",,,,,,</tr>"), $this);?>

    
    <?php endfor; endif; ?>
    
  </table>



<?php elseif ($this->_tpl_vars['calendar_view'] == 'day'): 
 elseif ($this->_tpl_vars['calendar_view'] == 'year'): 
 endif; ?>




