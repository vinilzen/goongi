<?php /* Smarty version 2.6.14, created on 2011-11-16 14:17:57
         compiled from search.tpl */
?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'math', 'search.tpl', 66, false),array('function', 'cycle', 'search.tpl', 94, false),array('modifier', 'truncate', 'search.tpl', 83, false),)), $this);
?><?php
SELanguage::_preload_multi(924,646,926,927,182,184,928,185,183,929);
SELanguage::load();
?>﻿<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<div class="all">
	<div class="center_all">
		<div class="block4">
			<div class="c">
				<div class="bg_l">
					<div class="bg_r">
						<h1><?php echo SELanguage::_get(924); ?><!-- Поиск по сайту --></h1>
						<div class="crumb"><a href="#">Главная</a><span><?php echo SELanguage::_get(646); ?><!-- Поиск --></span></div>
						<div class="buttons">
							<form action='search.php' name='search_form' method='post'>
								
								<input type='text' size='30' class="srch_inp" name='search_text' id='search_text' value='<?php echo $this->_tpl_vars['search_text']; ?>
' maxlength='100'></td>
								<span class="button2" style="margin:0;"><span class="l">&nbsp;</span><span class="c">
									<input type='submit' class='button' value='<?php echo SELanguage::_get(646); ?>'>
								</span><span class="r">&nbsp;</span></span>
								<input type='hidden' name='task' value='dosearch'>
								<input type='hidden' name='t' value='0'>
								<a href='search_advanced.php'><?php echo SELanguage::_get(926); ?></a>
							</form>						
						</div>
						<div class="group_list">
							<ul>
								<li><a href="#">Быстрый поиск</a></li>
								<li><a href="#">Поиск людей</a></li>
								<li><a href="#">Поиск мероприятий</a></li>
								<li><a href="#">Поиск событий</a></li>
								<li><a href="#">Поиск статей</a></li>
							</ul>
						</div>

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
<ul class="friends_list">
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
<li>
	<a href="<?php echo $this->_tpl_vars['results'][$this->_sections['result_loop']['index']]['result_url']; ?>
"><img src='<?php echo $this->_tpl_vars['results'][$this->_sections['result_loop']['index']]['result_icon']; ?>
' class='photo' border='0'></a>
	<div>
		<p><a href="#">vip</a><a href="#">название группы</a></p>
		<h2><a href="<?php echo $this->_tpl_vars['results'][$this->_sections['result_loop']['index']]['result_url']; ?>
">
			<?php echo ((is_array($_tmp=$this->_tpl_vars['results'][$this->_sections['result_loop']['index']]['result_name_1'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 30, "...", true) : smarty_modifier_truncate($_tmp, 30, "...", true)); ?>

		</a></h2>
		<a href="#" class="add_msg">Написать сообщение</a><br />
		<a href="#">Добавить в группу</a><br />
		<!-- <a href="#" class="del">Убрать из друзей</a> -->
	   
        <a href="<?php echo $this->_tpl_vars['results'][$this->_sections['result_loop']['index']]['result_url']; ?>
" class="title"></a>
        <div class='search_result_text2'><?php echo sprintf(SELanguage::_get($this->_tpl_vars['results'][$this->_sections['result_loop']['index']]['result_desc']), $this->_tpl_vars['results'][$this->_sections['result_loop']['index']]['result_desc_1'], $this->_tpl_vars['results'][$this->_sections['result_loop']['index']]['result_desc_2'], $this->_tpl_vars['results'][$this->_sections['result_loop']['index']]['result_desc_3']); ?></div>
	    <?php if ($this->_tpl_vars['results'][$this->_sections['result_loop']['index']]['result_online'] == 1): ?><span><?php echo SELanguage::_get(929); ?></span><?php endif; ?>
	</div>
</li>
        <?php echo smarty_function_cycle(array('name' => 'clear_cycle','values' => ",<div style='clear: both; height: 0px;'></div>"), $this);?>

      <?php endfor; endif; ?>

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
'; ?>


					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>