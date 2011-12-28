<?php /* Smarty version 2.6.14, created on 2011-12-28 15:05:45
         compiled from profile_event_list.tpl */
?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'profile_event_list.tpl', 22, false),array('modifier', 'strip_tags', 'profile_event_list.tpl', 45, false),)), $this);
?><?php
SELanguage::_preload_multi(3000007,3000105,3000203,3000202,3000204);
SELanguage::load();
?>

<?php if (( $this->_tpl_vars['owner']->level_info['level_event_allow'] & 6 ) && $this->_tpl_vars['total_events'] > 0): ?>

  <div class='profile_headline'><?php echo SELanguage::_get(3000007); ?> (<?php echo $this->_tpl_vars['total_events']; ?>
)</div>
  <div>
        <?php unset($this->_sections['event_loop']);
$this->_sections['event_loop']['name'] = 'event_loop';
$this->_sections['event_loop']['loop'] = is_array($_loop=$this->_tpl_vars['events']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['event_loop']['max'] = (int)5;
$this->_sections['event_loop']['show'] = true;
if ($this->_sections['event_loop']['max'] < 0)
    $this->_sections['event_loop']['max'] = $this->_sections['event_loop']['loop'];
$this->_sections['event_loop']['step'] = 1;
$this->_sections['event_loop']['start'] = $this->_sections['event_loop']['step'] > 0 ? 0 : $this->_sections['event_loop']['loop']-1;
if ($this->_sections['event_loop']['show']) {
    $this->_sections['event_loop']['total'] = min(ceil(($this->_sections['event_loop']['step'] > 0 ? $this->_sections['event_loop']['loop'] - $this->_sections['event_loop']['start'] : $this->_sections['event_loop']['start']+1)/abs($this->_sections['event_loop']['step'])), $this->_sections['event_loop']['max']);
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
    <div class='profile_event_main'>
      <table cellpadding='0' cellspacing='0'>
        <tr>
          <td valign='top'>
            <a href='<?php echo $this->_tpl_vars['url']->url_create('event',$this->_tpl_vars['owner']->user_info['user_username'],$this->_tpl_vars['events'][$this->_sections['event_loop']['index']]['event']->event_info['event_id']); ?>
'>
              <img src='./images/icons/event_event16.gif' border='0' class='icon' />
            </a>
          </td>
          <td valign='top'>
            <div class='profile_event_title'>
              <a href='<?php echo $this->_tpl_vars['url']->url_create('event',$this->_tpl_vars['owner']->user_info['user_username'],$this->_tpl_vars['events'][$this->_sections['event_loop']['index']]['event']->event_info['event_id']); ?>
'>
                <?php echo ((is_array($_tmp=$this->_tpl_vars['events'][$this->_sections['event_loop']['index']]['event']->event_info['event_title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 35, "...", true) : smarty_modifier_truncate($_tmp, 35, "...", true)); ?>

              </a>
            </div>
            <div class='profile_event_date'>
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
            <div class='profile_event_desc'>
              <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['events'][$this->_sections['event_loop']['index']]['event']->event_info['event_desc'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 160, "...", true) : smarty_modifier_truncate($_tmp, 160, "...", true)); ?>

            </div>
          </td>
        </tr>
      </table>
    </div>
    <?php endfor; endif; ?>
          </div>
  
<?php endif; ?>