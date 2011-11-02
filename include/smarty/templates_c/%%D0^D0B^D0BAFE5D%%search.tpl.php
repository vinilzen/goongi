<?php /* Smarty version 2.6.14, created on 2011-11-02 11:47:18
         compiled from search.tpl */
?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'math', 'search.tpl', 69, false),array('function', 'cycle', 'search.tpl', 82, false),array('modifier', 'truncate', 'search.tpl', 91, false),)), $this);
?><?php
SELanguage::_preload_multi(646,924,925,926,927,182,184,928,185,183,929);
SELanguage::load();
?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<img src='./images/icons/search48.gif' border='0' class='icon_big'>
<div class='page_header'><?php echo SELanguage::_get(646); ?></div>
<div><?php echo SELanguage::_get(924); ?></div>
<br />
<br />

<form action='search.php' name='search_form' method='post'>
<table cellpadding='0' cellspacing='0' align='center'>
<tr>
<td class='search'>
  <table cellpadding='0' cellspacing='0' align='center'>
  <tr>
  <td><?php echo SELanguage::_get(925); ?></td>
  <td>&nbsp;<input type='text' size='30' class='text' name='search_text' id='search_text' value='<?php echo $this->_tpl_vars['search_text']; ?>
' maxlength='100'></td>
  <td>
    &nbsp;<input type='submit' class='button' value='<?php echo SELanguage::_get(646); ?>'>
    <input type='hidden' name='task' value='dosearch'>
    <input type='hidden' name='t' value='0'>
  </td>
  </tr>
  <tr>
  <td>&nbsp;</td>
  <td colspan='2'>&nbsp;<a href='search_advanced.php'><?php echo SELanguage::_get(926); ?></a></td>
  </tr>
  </table>
</div>
</form>
</td>
</tr>
</table>

<br>

<?php if ($this->_tpl_vars['search_text'] != ""): ?>

  <?php if ($this->_tpl_vars['is_results'] == 0): ?>

    <table cellpadding='0' cellspacing='0' align='center'>
    <tr>
    <td class='result'>
      <img src='./images/icons/bulb16.gif' class='icon'>
      <?php echo sprintf(SELanguage::_get(927), $this->_tpl_vars['search_text']); ?>
    </td>
    </tr>
    </table>

  <?php else: ?>


        <table class='tabs' cellpadding='0' cellspacing='0'>
    <tr>
    <td class='tab0'>&nbsp;</td>
      <?php unset($this->_sections['search_loop']);
$this->_sections['search_loop']['name'] = 'search_loop';
$this->_sections['search_loop']['loop'] = is_array($_loop=$this->_tpl_vars['search_objects']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['search_loop']['show'] = true;
$this->_sections['search_loop']['max'] = $this->_sections['search_loop']['loop'];
$this->_sections['search_loop']['step'] = 1;
$this->_sections['search_loop']['start'] = $this->_sections['search_loop']['step'] > 0 ? 0 : $this->_sections['search_loop']['loop']-1;
if ($this->_sections['search_loop']['show']) {
    $this->_sections['search_loop']['total'] = $this->_sections['search_loop']['loop'];
    if ($this->_sections['search_loop']['total'] == 0)
        $this->_sections['search_loop']['show'] = false;
} else
    $this->_sections['search_loop']['total'] = 0;
if ($this->_sections['search_loop']['show']):

            for ($this->_sections['search_loop']['index'] = $this->_sections['search_loop']['start'], $this->_sections['search_loop']['iteration'] = 1;
                 $this->_sections['search_loop']['iteration'] <= $this->_sections['search_loop']['total'];
                 $this->_sections['search_loop']['index'] += $this->_sections['search_loop']['step'], $this->_sections['search_loop']['iteration']++):
$this->_sections['search_loop']['rownum'] = $this->_sections['search_loop']['iteration'];
$this->_sections['search_loop']['index_prev'] = $this->_sections['search_loop']['index'] - $this->_sections['search_loop']['step'];
$this->_sections['search_loop']['index_next'] = $this->_sections['search_loop']['index'] + $this->_sections['search_loop']['step'];
$this->_sections['search_loop']['first']      = ($this->_sections['search_loop']['iteration'] == 1);
$this->_sections['search_loop']['last']       = ($this->_sections['search_loop']['iteration'] == $this->_sections['search_loop']['total']);
?>
        <td class='tab<?php if ($this->_tpl_vars['t'] == $this->_tpl_vars['search_objects'][$this->_sections['search_loop']['index']]['search_type']): ?>1<?php else: ?>2<?php endif; ?>' NOWRAP><?php if ($this->_tpl_vars['search_objects'][$this->_sections['search_loop']['index']]['search_total'] == 0): 
 echo sprintf(SELanguage::_get($this->_tpl_vars['search_objects'][$this->_sections['search_loop']['index']]['search_lang']), $this->_tpl_vars['search_objects'][$this->_sections['search_loop']['index']]['search_total']); 
 else: ?><a href='search.php?task=dosearch&search_text=<?php echo $this->_tpl_vars['url_search']; ?>
&t=<?php echo $this->_tpl_vars['search_objects'][$this->_sections['search_loop']['index']]['search_type']; ?>
'><?php echo sprintf(SELanguage::_get($this->_tpl_vars['search_objects'][$this->_sections['search_loop']['index']]['search_lang']), $this->_tpl_vars['search_objects'][$this->_sections['search_loop']['index']]['search_total']); ?></a><?php endif; ?></td>
        <td class='tab'>&nbsp;</td>
      <?php endfor; endif; ?>
      <td class='tab3'>&nbsp;</td>
    </tr>
    </table>

    <div class='search_results'>

            <?php if ($this->_tpl_vars['p'] != 1): ?><a href='search.php?task=dosearch&search_text=<?php echo $this->_tpl_vars['url_search']; ?>
&t=<?php echo $this->_tpl_vars['t']; ?>
&p=<?php echo smarty_function_math(array('equation' => 'p-1','p' => $this->_tpl_vars['p']), $this);?>
'>&#171; <?php echo SELanguage::_get(182); ?></a> &nbsp;|&nbsp;&nbsp;<?php endif; ?>
      <?php if ($this->_tpl_vars['p_start'] == $this->_tpl_vars['p_end']): ?>
        <b><?php echo sprintf(SELanguage::_get(184), $this->_tpl_vars['p_start'], $this->_tpl_vars['total_results']); ?></b> (<?php echo sprintf(SELanguage::_get(928), $this->_tpl_vars['search_time']); ?>) 
      <?php else: ?>
        <b><?php echo sprintf(SELanguage::_get(185), $this->_tpl_vars['p_start'], $this->_tpl_vars['p_end'], $this->_tpl_vars['total_results']); ?></b> (<?php echo sprintf(SELanguage::_get(928), $this->_tpl_vars['search_time']); ?>) 
      <?php endif; ?>
      <?php if ($this->_tpl_vars['p'] != $this->_tpl_vars['maxpage']): ?>&nbsp;&nbsp;|&nbsp; <a href='search.php?task=dosearch&search_text=<?php echo $this->_tpl_vars['url_search']; ?>
&t=<?php echo $this->_tpl_vars['t']; ?>
&p=<?php echo smarty_function_math(array('equation' => 'p+1','p' => $this->_tpl_vars['p']), $this);?>
'><?php echo SELanguage::_get(183); ?> &#187;</a><?php endif; ?>

      <br><br>

            <?php unset($this->_sections['result_loop']);
$this->_sections['result_loop']['name'] = 'result_loop';
$this->_sections['result_loop']['loop'] = is_array($_loop=$this->_tpl_vars['results']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['result_loop']['show'] = true;
$this->_sections['result_loop']['max'] = $this->_sections['result_loop']['loop'];
$this->_sections['result_loop']['step'] = 1;
$this->_sections['result_loop']['start'] = $this->_sections['result_loop']['step'] > 0 ? 0 : $this->_sections['result_loop']['loop']-1;
if ($this->_sections['result_loop']['show']) {
    $this->_sections['result_loop']['total'] = $this->_sections['result_loop']['loop'];
    if ($this->_sections['result_loop']['total'] == 0)
        $this->_sections['result_loop']['show'] = false;
} else
    $this->_sections['result_loop']['total'] = 0;
if ($this->_sections['result_loop']['show']):

            for ($this->_sections['result_loop']['index'] = $this->_sections['result_loop']['start'], $this->_sections['result_loop']['iteration'] = 1;
                 $this->_sections['result_loop']['iteration'] <= $this->_sections['result_loop']['total'];
                 $this->_sections['result_loop']['index'] += $this->_sections['result_loop']['step'], $this->_sections['result_loop']['iteration']++):
$this->_sections['result_loop']['rownum'] = $this->_sections['result_loop']['iteration'];
$this->_sections['result_loop']['index_prev'] = $this->_sections['result_loop']['index'] - $this->_sections['result_loop']['step'];
$this->_sections['result_loop']['index_next'] = $this->_sections['result_loop']['index'] + $this->_sections['result_loop']['step'];
$this->_sections['result_loop']['first']      = ($this->_sections['result_loop']['iteration'] == 1);
$this->_sections['result_loop']['last']       = ($this->_sections['result_loop']['iteration'] == $this->_sections['result_loop']['total']);
?>
	
	<div class='search_result<?php echo smarty_function_cycle(array('name' => 'class_name','values' => "1,2,2,1"), $this);?>
' style='width: 400px; float: left; border: 1px solid #CCCCCC; margin: 5px;'>
	<table cellpadding='0' cellspacing='0'>
        <tr>
        <td valign='top' style='padding-right: 4px;'>
	  <a href="<?php echo $this->_tpl_vars['results'][$this->_sections['result_loop']['index']]['result_url']; ?>
" class="title"><img src='<?php echo $this->_tpl_vars['results'][$this->_sections['result_loop']['index']]['result_icon']; ?>
' class='photo' width='60' height='60' border='0'></a>
	</td>
	<td valign='top'>
          <div class='search_result_text'>
	    <?php ob_start(); 
 echo sprintf(SELanguage::_get($this->_tpl_vars['results'][$this->_sections['result_loop']['index']]['result_name']), $this->_tpl_vars['results'][$this->_sections['result_loop']['index']]['result_name_1']); 
 $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('result_title', ob_get_contents());ob_end_clean(); ?>
            <a href="<?php echo $this->_tpl_vars['results'][$this->_sections['result_loop']['index']]['result_url']; ?>
" class="title"><?php echo ((is_array($_tmp=$this->_tpl_vars['result_title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 40, "...", true) : smarty_modifier_truncate($_tmp, 40, "...", true)); ?>
</a>
            <div class='search_result_text2'><?php echo sprintf(SELanguage::_get($this->_tpl_vars['results'][$this->_sections['result_loop']['index']]['result_desc']), $this->_tpl_vars['results'][$this->_sections['result_loop']['index']]['result_desc_1'], $this->_tpl_vars['results'][$this->_sections['result_loop']['index']]['result_desc_2'], $this->_tpl_vars['results'][$this->_sections['result_loop']['index']]['result_desc_3']); ?></div>
	    <?php if ($this->_tpl_vars['results'][$this->_sections['result_loop']['index']]['result_online'] == 1): ?><div style='margin-top: 5px;'><img src='./images/icons/online16.gif' border='0' class='icon'><?php echo SELanguage::_get(929); ?></div><?php endif; ?>
          </div>
	</td>
	</tr>
	</table>
	</div>
        <?php echo smarty_function_cycle(array('name' => 'clear_cycle','values' => ",<div style='clear: both; height: 0px;'></div>"), $this);?>

      <?php endfor; endif; ?>

      <div style='clear:both;'></div><br />

            <?php if ($this->_tpl_vars['p'] != 1): ?><a href='search.php?task=dosearch&search_text=<?php echo $this->_tpl_vars['url_search']; ?>
&t=<?php echo $this->_tpl_vars['t']; ?>
&p=<?php echo smarty_function_math(array('equation' => 'p-1','p' => $this->_tpl_vars['p']), $this);?>
'>&#171; <?php echo SELanguage::_get(182); ?></a> &nbsp;|&nbsp;&nbsp;<?php endif; ?>
      <?php if ($this->_tpl_vars['p_start'] == $this->_tpl_vars['p_end']): ?>
        <b><?php echo sprintf(SELanguage::_get(184), $this->_tpl_vars['p_start'], $this->_tpl_vars['total_results']); ?></b> (<?php echo sprintf(SELanguage::_get(928), $this->_tpl_vars['search_time']); ?>) 
      <?php else: ?>
        <b><?php echo sprintf(SELanguage::_get(185), $this->_tpl_vars['p_start'], $this->_tpl_vars['p_end'], $this->_tpl_vars['total_results']); ?></b> (<?php echo sprintf(SELanguage::_get(928), $this->_tpl_vars['search_time']); ?>) 
      <?php endif; ?>
      <?php if ($this->_tpl_vars['p'] != $this->_tpl_vars['maxpage']): ?>&nbsp;&nbsp;|&nbsp; <a href='search.php?task=dosearch&search_text=<?php echo $this->_tpl_vars['url_search']; ?>
&t=<?php echo $this->_tpl_vars['t']; ?>
&p=<?php echo smarty_function_math(array('equation' => 'p+1','p' => $this->_tpl_vars['p']), $this);?>
'><?php echo SELanguage::_get(183); ?> &#187;</a><?php endif; ?>


    </div>
  <?php endif; 
 endif; 
 echo '
<script type="text/javascript">
<!-- 
  window.addEvent(\'load\', function(){ $(\'search_text\').focus(); });
//-->
</script>
'; 
 $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>