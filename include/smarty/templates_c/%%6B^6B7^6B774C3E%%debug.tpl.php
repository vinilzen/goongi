<?php /* Smarty version 2.6.14, created on 2011-11-04 11:58:45
         compiled from debug.tpl */
?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'debug.tpl', 23, false),array('modifier', 'string_format', 'debug.tpl', 38, false),array('modifier', 'truncate', 'debug.tpl', 86, false),array('function', 'counter', 'debug.tpl', 89, false),)), $this);
?><?php
SELanguage::load();
?>
<table style="width: 100%;" cellpadding='0' cellspacing='0'>
  <tr>
    <td nowrap="nowrap" width="1" id='se_debug_tabs_summary' class="profile_tab2" style="border-top: 0px solid #ffffff;">
      <a href="javascript:void(0);" onclick="loadDebugTab('summary');return false;">Summary</a>
    </td>
    <td nowrap="nowrap" width="1" id='se_debug_tabs_php' class="profile_tab" style="border-top: 0px solid #ffffff;">
      <a href="javascript:void(0);" onclick="loadDebugTab('php');return false;">PHP</a>
    </td>
    <td nowrap="nowrap" width="1" id='se_debug_tabs_sql' class="profile_tab" style="border-top: 0px solid #ffffff;">
      <a href="javascript:void(0);" onclick="loadDebugTab('sql');return false;">SQL</a>
    </td>
    <td class="profile_tab" style="border-top: 0px solid #ffffff;">&nbsp;</td>
  </tr>
</table>




<div id="se_debug_summary" align='left' style="margin: 5px;">
  <div>Total Time: <?php echo $this->_tpl_vars['debug_benchmark_total']; ?>
</div>
  <div>Total SQL Time: <?php echo ((is_array($_tmp=@$this->_tpl_vars['database']->log_data_totals['time'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
</div>
  <div>Total SQL Queries: <?php echo ((is_array($_tmp=@$this->_tpl_vars['database']->log_data_totals['total'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
</div>
  <div>Total SQL Queries (failed): <?php echo ((is_array($_tmp=@$this->_tpl_vars['database']->log_data_totals['failed'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
</div>
</div>



<div id="se_debug_php" align='left' style="margin: 5px;display:none;">
  <?php $_from = $this->_tpl_vars['debug_benchmark']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['benchmark_label'] => $this->_tpl_vars['benchmark_data']):
?>
  <div style="display:block;border: 1px solid #cccccc;">
    <table cellpadding='0' cellspacing='0'>
      <tr>
        <td style="padding: 5px 10px 5px 10px;">
          <span style="display:block;">Label: <?php echo $this->_tpl_vars['benchmark_label']; ?>
</span>
          <span style="display:block;">Time: <?php echo ((is_array($_tmp=$this->_tpl_vars['benchmark_data']['total'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.4f") : smarty_modifier_string_format($_tmp, "%.4f")); ?>
</span>
          <span style="display:block;">Index: <?php echo $this->_tpl_vars['benchmark_data']['index']; ?>
</span>
          <span style="display:block;"><a href="javascript:void(0);" onclick="$('se_debug_benchmark_details_<?php echo $this->_tpl_vars['benchmark_label']; ?>
').style.display = ( $('se_debug_benchmark_details_<?php echo $this->_tpl_vars['benchmark_label']; ?>
').style.display=='none' ? '' : 'none');">Details</a></span>
          <span id="se_debug_benchmark_details_<?php echo $this->_tpl_vars['benchmark_label']; ?>
" style="display: none;">
            <?php $_from = $this->_tpl_vars['benchmark_data']['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['benchmark_detail_index'] => $this->_tpl_vars['benchmark_detail_data']):
?>
            <span style="display:block;">Index: <?php echo $this->_tpl_vars['benchmark_detail_index']; ?>
</span>
            <span style="display:block;">Delta: <?php echo ((is_array($_tmp=$this->_tpl_vars['benchmark_detail_data']['delta_time'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.4f") : smarty_modifier_string_format($_tmp, "%.4f")); ?>
 / <?php echo $this->_tpl_vars['benchmark_detail_data']['delta_memory']; ?>
</span>
            <span style="display:block;">Start: <?php echo ((is_array($_tmp=$this->_tpl_vars['benchmark_detail_data']['start_time'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.4f") : smarty_modifier_string_format($_tmp, "%.4f")); ?>
 / <?php echo $this->_tpl_vars['benchmark_detail_data']['start_memory']; ?>
</span>
            <span style="display:block;">End: <?php echo ((is_array($_tmp=$this->_tpl_vars['benchmark_detail_data']['end_time'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.4f") : smarty_modifier_string_format($_tmp, "%.4f")); ?>
 / <?php echo $this->_tpl_vars['benchmark_detail_data']['end_memory']; ?>
</span>
            <span style="display:block;">Note: <?php echo $this->_tpl_vars['benchmark_detail_data']['note']; ?>
</span>
            <?php endforeach; endif; unset($_from); ?>
          </span>
        </td>
      </tr>
    </table>
  </div>
  <?php endforeach; endif; unset($_from); ?>
</div>



<div id="se_debug_sql" align='left' style="margin: 5px;display:none;">
  <div>Total SQL Time: <?php echo ((is_array($_tmp=@$this->_tpl_vars['database']->log_data_totals['time'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
</div>
  <div>Total SQL Queries: <?php echo ((is_array($_tmp=@$this->_tpl_vars['database']->log_data_totals['total'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
</div>
  <div>Total SQL Queries (failed): <?php echo ((is_array($_tmp=@$this->_tpl_vars['database']->log_data_totals['failed'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
</div>
  <br />
  <br />
  
  <div id="sqlexplaindiv" style="display:none;">
    <div id="sqlquery"   style="width: 98%; display: block; padding: 5px; border:1px solid #cccccc; border-bottom:none;"></div>
    <div id="sqlexplain" style="width: 98%; display: block; padding: 5px; border:1px solid #cccccc;"></div>
  </div>
  
  <?php echo $this->_tpl_vars['database']->database_benchmark_sort(); ?>

  
  <?php unset($this->_sections['stat_loop']);
$this->_sections['stat_loop']['name'] = 'stat_loop';
$this->_sections['stat_loop']['loop'] = is_array($_loop=$this->_tpl_vars['database']->log_data) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['stat_loop']['show'] = true;
$this->_sections['stat_loop']['max'] = $this->_sections['stat_loop']['loop'];
$this->_sections['stat_loop']['step'] = 1;
$this->_sections['stat_loop']['start'] = $this->_sections['stat_loop']['step'] > 0 ? 0 : $this->_sections['stat_loop']['loop']-1;
if ($this->_sections['stat_loop']['show']) {
    $this->_sections['stat_loop']['total'] = $this->_sections['stat_loop']['loop'];
    if ($this->_sections['stat_loop']['total'] == 0)
        $this->_sections['stat_loop']['show'] = false;
} else
    $this->_sections['stat_loop']['total'] = 0;
if ($this->_sections['stat_loop']['show']):

            for ($this->_sections['stat_loop']['index'] = $this->_sections['stat_loop']['start'], $this->_sections['stat_loop']['iteration'] = 1;
                 $this->_sections['stat_loop']['iteration'] <= $this->_sections['stat_loop']['total'];
                 $this->_sections['stat_loop']['index'] += $this->_sections['stat_loop']['step'], $this->_sections['stat_loop']['iteration']++):
$this->_sections['stat_loop']['rownum'] = $this->_sections['stat_loop']['iteration'];
$this->_sections['stat_loop']['index_prev'] = $this->_sections['stat_loop']['index'] - $this->_sections['stat_loop']['step'];
$this->_sections['stat_loop']['index_next'] = $this->_sections['stat_loop']['index'] + $this->_sections['stat_loop']['step'];
$this->_sections['stat_loop']['first']      = ($this->_sections['stat_loop']['iteration'] == 1);
$this->_sections['stat_loop']['last']       = ($this->_sections['stat_loop']['iteration'] == $this->_sections['stat_loop']['total']);
?>
  <div style="display:block;border: 1px solid #cccccc;">
    <table cellpadding='0' cellspacing='0'>
      <tr>
        <td style="width:10px;background:<?php echo $this->_tpl_vars['database']->log_data[$this->_sections['stat_loop']['index']]['color']; ?>
;">&nbsp;</td>
        <td style="padding: 5px 10px 5px 10px;">
          <span style="display:block;">Index: <?php echo $this->_tpl_vars['database']->log_data[$this->_sections['stat_loop']['index']]['index']; ?>
</span>
          <span style="display:block;">Hash: <?php echo $this->_tpl_vars['database']->log_data[$this->_sections['stat_loop']['index']]['query_hash']; ?>
</span>
          <?php if (! $this->_tpl_vars['database']->log_data[$this->_sections['stat_loop']['index']]['result']): ?>
            <span style="display:block;"><span style="color: #ff0000;">Error:</span> <?php echo $this->_tpl_vars['database']->log_data[$this->_sections['stat_loop']['index']]['error']; ?>
</span>
          <?php endif; ?>
          <span style="display:block;">Benchmark: <?php echo $this->_tpl_vars['database']->log_data[$this->_sections['stat_loop']['index']]['time']; ?>
</span>
          <span style="display:block;">Short: <?php echo ((is_array($_tmp=$this->_tpl_vars['database']->log_data[$this->_sections['stat_loop']['index']]['query'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 70) : smarty_modifier_truncate($_tmp, 70)); ?>
</span>
          <span style="display:block;"><a href="javascript:void(0);" onclick="$('se_debug_sql_query_<?php echo $this->_tpl_vars['database']->log_data[$this->_sections['stat_loop']['index']]['index']; ?>
').style.display = ( $('se_debug_sql_query_<?php echo $this->_tpl_vars['database']->log_data[$this->_sections['stat_loop']['index']]['index']; ?>
').style.display=='none' ? '' : 'none');">Details</a></span>
          <div id="se_debug_sql_query_<?php echo $this->_tpl_vars['database']->log_data[$this->_sections['stat_loop']['index']]['index']; ?>
" style="display:none;">
            <?php echo smarty_function_counter(array('start' => 0,'skip' => 1,'print' => 0), $this);?>

            <?php unset($this->_sections['backtrace_loop']);
$this->_sections['backtrace_loop']['name'] = 'backtrace_loop';
$this->_sections['backtrace_loop']['loop'] = is_array($_loop=$this->_tpl_vars['database']->log_data[$this->_sections['stat_loop']['index']]['backtrace']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['backtrace_loop']['show'] = true;
$this->_sections['backtrace_loop']['max'] = $this->_sections['backtrace_loop']['loop'];
$this->_sections['backtrace_loop']['step'] = 1;
$this->_sections['backtrace_loop']['start'] = $this->_sections['backtrace_loop']['step'] > 0 ? 0 : $this->_sections['backtrace_loop']['loop']-1;
if ($this->_sections['backtrace_loop']['show']) {
    $this->_sections['backtrace_loop']['total'] = $this->_sections['backtrace_loop']['loop'];
    if ($this->_sections['backtrace_loop']['total'] == 0)
        $this->_sections['backtrace_loop']['show'] = false;
} else
    $this->_sections['backtrace_loop']['total'] = 0;
if ($this->_sections['backtrace_loop']['show']):

            for ($this->_sections['backtrace_loop']['index'] = $this->_sections['backtrace_loop']['start'], $this->_sections['backtrace_loop']['iteration'] = 1;
                 $this->_sections['backtrace_loop']['iteration'] <= $this->_sections['backtrace_loop']['total'];
                 $this->_sections['backtrace_loop']['index'] += $this->_sections['backtrace_loop']['step'], $this->_sections['backtrace_loop']['iteration']++):
$this->_sections['backtrace_loop']['rownum'] = $this->_sections['backtrace_loop']['iteration'];
$this->_sections['backtrace_loop']['index_prev'] = $this->_sections['backtrace_loop']['index'] - $this->_sections['backtrace_loop']['step'];
$this->_sections['backtrace_loop']['index_next'] = $this->_sections['backtrace_loop']['index'] + $this->_sections['backtrace_loop']['step'];
$this->_sections['backtrace_loop']['first']      = ($this->_sections['backtrace_loop']['iteration'] == 1);
$this->_sections['backtrace_loop']['last']       = ($this->_sections['backtrace_loop']['iteration'] == $this->_sections['backtrace_loop']['total']);
?>
              <span style="display:block;">Backtrace <?php echo smarty_function_counter(array(), $this);?>
:  <?php echo $this->_tpl_vars['database']->log_data[$this->_sections['stat_loop']['index']]['backtrace'][$this->_sections['backtrace_loop']['index']]['file_short']; ?>
 [<?php echo $this->_tpl_vars['database']->log_data[$this->_sections['stat_loop']['index']]['backtrace'][$this->_sections['backtrace_loop']['index']]['line']; ?>
] <?php echo $this->_tpl_vars['database']->log_data[$this->_sections['stat_loop']['index']]['backtrace'][$this->_sections['backtrace_loop']['index']]['function']; ?>
</span>
            <?php endfor; endif; ?>
            <span style="display:block;">Query: <?php echo $this->_tpl_vars['database']->log_data[$this->_sections['stat_loop']['index']]['query']; ?>
</span>
          </div>
        </td>
      </tr>
    </table>
  </div>
  <?php endfor; endif; ?>
  
  <?php echo '
  <script type="text/javascript">
    
    window.addEvent(\'load\', function()
    {
      if( failed_queries>0 )
        alert_summary(failed_queries);
    });
    
  </script>
  '; ?>

</div>