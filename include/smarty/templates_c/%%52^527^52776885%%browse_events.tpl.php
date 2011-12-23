<?php /* Smarty version 2.6.14, created on 2011-12-22 16:02:15
         compiled from browse_events.tpl */
?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'browse_events.tpl', 94, false),array('modifier', 'strip_tags', 'browse_events.tpl', 174, false),array('modifier', 'truncate', 'browse_events.tpl', 174, false),array('function', 'math', 'browse_events.tpl', 123, false),)), $this);
?><?php
SELanguage::_preload_multi(3000205,3000090,3000206,3000207,3000210,3000208,3000209,3000211,3000212,3000213,3000214,182,184,185,183,3000203,3000202,3000204,3000215,3000216,3000217);
SELanguage::load();
?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<div class='page_header'>
  <?php if ($this->_tpl_vars['eventcat'] == ""): ?>
    <?php echo SELanguage::_get(3000205); ?>
  <?php else: ?>
    <a href='browse_events.php'><?php echo SELanguage::_get(3000205); ?></a> >
    <?php if ($this->_tpl_vars['eventsubcat'] == ""): ?>
      <?php echo SELanguage::_get($this->_tpl_vars['eventcat']['eventcat_title']); ?>
    <?php else: ?>
      <a href='browse_events.php?v=<?php echo $this->_tpl_vars['v']; ?>
&s=<?php echo $this->_tpl_vars['s']; ?>
&eventcat_id=<?php echo $this->_tpl_vars['eventcat']['eventcat_id']; ?>
'><?php echo SELanguage::_get($this->_tpl_vars['eventcat']['eventcat_title']); ?></a> >
      <?php echo SELanguage::_get($this->_tpl_vars['eventsubcat']['eventcat_title']); ?>
    <?php endif; ?>
  <?php endif; ?>
</div>

<table cellpadding='0' cellspacing='0' width='100%' style='margin-top: 10px;'>
<tr>
<td style='width: 200px; vertical-align: top;'>

  <div style='padding: 10px; background: #F2F2F2; border: 1px solid #BBBBBB; font-weight: bold;'>

    <div style='text-align: center; line-height: 16px;'>
      <table cellpadding='0' cellspacing='0' align='center'>
      <tr>
      <td><?php echo SELanguage::_get(3000090); ?>&nbsp;</td>
      <td>
        <select class='event_small' name='v' onchange="window.location.href='browse_events.php?c=<?php echo $this->_tpl_vars['c']; ?>
&s=<?php echo $this->_tpl_vars['s']; ?>
&v='+this.options[this.selectedIndex].value;">
        <option value='1'<?php if ($this->_tpl_vars['v'] == '1'): ?> SELECTED<?php endif; ?>><?php echo SELanguage::_get(3000206); ?></option>
        <?php if ($this->_tpl_vars['user']->user_exists): ?><option value='2'<?php if ($this->_tpl_vars['v'] == '2'): ?> SELECTED<?php endif; ?>><?php echo SELanguage::_get(3000207); ?></option><?php endif; ?>
        <option value='3'<?php if ($this->_tpl_vars['v'] == '3' || empty ( $this->_tpl_vars['v'] )): ?> SELECTED<?php endif; ?>><?php echo SELanguage::_get(3000210); ?></option>
        </select>
      </td>
      </tr>
      </table>
    </div>

    <div style='text-align: center; line-height: 16px; margin-top: 5px;'>
      <table cellpadding='0' cellspacing='0' align='center'>
      <tr>
      <td><?php echo SELanguage::_get(3000208); ?>&nbsp;</td>
      <td>
        <select class='event_small' name='s' onchange="window.location.href='browse_events.php?c=<?php echo $this->_tpl_vars['c']; ?>
&v=<?php echo $this->_tpl_vars['v']; ?>
&s='+this.options[this.selectedIndex].value;">
        <option value='event_totalmembers DESC'<?php if ($this->_tpl_vars['s'] == 'event_totalmembers DESC'): ?> SELECTED<?php endif; ?>><?php echo SELanguage::_get(3000209); ?></option>
        <option value='event_date_start ASC'<?php if ($this->_tpl_vars['s'] == 'event_date_start ASC' || empty ( $this->_tpl_vars['s'] )): ?> SELECTED<?php endif; ?>><?php echo SELanguage::_get(3000211); ?> (AZ)</option>
        <option value='event_date_start DESC'<?php if ($this->_tpl_vars['s'] == 'event_date_start DESC'): ?> SELECTED<?php endif; ?>><?php echo SELanguage::_get(3000211); ?> (ZA)</option>
        <option value='event_date_end ASC'<?php if ($this->_tpl_vars['s'] == 'event_date_end ASC'): ?> SELECTED<?php endif; ?>><?php echo SELanguage::_get(3000212); ?> (AZ)</option>
        <option value='event_date_end DESC'<?php if ($this->_tpl_vars['s'] == 'event_date_end DESC'): ?> SELECTED<?php endif; ?>><?php echo SELanguage::_get(3000212); ?> (ZA)</option>
        </select>
      </td>
      </tr>
      </table>
    </div>

  </div>

    <?php echo '
  <script type="text/javascript">
  <!-- 

  // ADD ABILITY TO MINIMIZE/MAXIMIZE CATS
  var cat_minimized = new Hash.Cookie(\'cat_cookie\', {duration: 3600});

  //-->
  </script>
  '; ?>



  <div style='margin-top: 10px; padding: 5px; background: #F2F2F2; border: 1px solid #BBBBBB; margin: 10px 0px 10px 0px; font-weight: bold;'>

    <div style='padding: 5px 8px 5px 8px; border: 1px solid #DDDDDD; background: #FFFFFF;'>
      <a href='browse_events.php?s=<?php echo $this->_tpl_vars['s']; ?>
&v=<?php echo $this->_tpl_vars['v']; ?>
'><?php echo SELanguage::_get(3000213); ?></a>
    </div>
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

            <?php echo '
      <script type="text/javascript">
      <!-- 
        window.addEvent(\'domready\', function() { 
          if(cat_minimized.get('; 
 echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['cat_id']; 
 echo ') == 1) {
	    $(\'subcats_'; 
 echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['cat_id']; 
 echo '\').style.display = \'\';
	    $(\'icon_'; 
 echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['cat_id']; 
 echo '\').src = \'./images/icons/minus16.gif\';
	  }
	});
      //-->
      </script>
      '; ?>


      <div style='padding: 5px 8px 5px 8px; border: 1px solid #DDDDDD; border-top: none; background: #FFFFFF;'>
        <img id='icon_<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['cat_id']; ?>
' src='./images/icons/<?php if (count($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats']) > 0 && $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'] != ""): ?>plus16<?php else: ?>minus16_disabled<?php endif; ?>.gif' <?php if (count($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats']) > 0 && $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'] != ""): ?>style='cursor: pointer;' onClick="if($('subcats_<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['cat_id']; ?>
').style.display == 'none') <?php echo '{'; ?>
 $('subcats_<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['cat_id']; ?>
').style.display = ''; this.src='./images/icons/minus16.gif'; cat_minimized.set(<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['cat_id']; ?>
, 1); <?php echo '} else {'; ?>
 $('subcats_<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['cat_id']; ?>
').style.display = 'none'; this.src='./images/icons/plus16.gif'; cat_minimized.set(<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['cat_id']; ?>
, 0); <?php echo '}'; ?>
"<?php endif; ?> border='0' class='icon'><a href='browse_events.php?s=<?php echo $this->_tpl_vars['s']; ?>
&v=<?php echo $this->_tpl_vars['v']; ?>
&eventcat_id=<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['cat_id']; ?>
'><?php echo SELanguage::_get($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['cat_title']); ?></a>
        <div id='subcats_<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['cat_id']; ?>
' style='display: none;'>
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
            <div style='font-weight: normal;'><img src='./images/trans.gif' border='0' class='icon' style='width: 16px;'><a href='browse_events.php?s=<?php echo $this->_tpl_vars['s']; ?>
&v=<?php echo $this->_tpl_vars['v']; ?>
&eventcat_id=<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['subcat_id']; ?>
'><?php echo SELanguage::_get($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['subcat_title']); ?></a></div>
          <?php endfor; endif; ?>
        </div>
      </div>
    <?php endfor; endif; ?>
  </div>

</td>
<td style='vertical-align: top; padding-left: 10px;'>

    <?php if (count($this->_tpl_vars['events']) == 0): ?>
    <br>
    <table cellpadding='0' cellspacing='0' align='center'>
      <tr>
        <td class='result'>
          <img src='./images/icons/bulb16.gif' border='0' class='icon' />
          <?php echo SELanguage::_get(3000214); ?>
        </td>
      </tr>
    </table>
  <?php endif; ?>

    <?php if ($this->_tpl_vars['maxpage'] > 1): ?>
    <div class='event_pages_top'>
    <?php if ($this->_tpl_vars['p'] != 1): ?><a href='browse_events.php?s=<?php echo $this->_tpl_vars['s']; ?>
&v=<?php echo $this->_tpl_vars['v']; ?>
&eventcat_id=<?php echo $this->_tpl_vars['eventcat_id']; ?>
&p=<?php echo smarty_function_math(array('equation' => "p-1",'p' => $this->_tpl_vars['p']), $this);?>
'>&#171; <?php echo SELanguage::_get(182); ?></a><?php else: ?>&#171; <?php echo SELanguage::_get(182); 
 endif; ?>
    &nbsp;|&nbsp;&nbsp;
    <?php if ($this->_tpl_vars['p_start'] == $this->_tpl_vars['p_end']): ?>
      <b><?php echo sprintf(SELanguage::_get(184), $this->_tpl_vars['p_start'], $this->_tpl_vars['total_events']); ?></b>
    <?php else: ?>
      <b><?php echo sprintf(SELanguage::_get(185), $this->_tpl_vars['p_start'], $this->_tpl_vars['p_end'], $this->_tpl_vars['total_events']); ?></b>
    <?php endif; ?>
    &nbsp;&nbsp;|&nbsp;
    <?php if ($this->_tpl_vars['p'] != $this->_tpl_vars['maxpage']): ?><a href='browse_events.php?s=<?php echo $this->_tpl_vars['s']; ?>
&v=<?php echo $this->_tpl_vars['v']; ?>
&eventcat_id=<?php echo $this->_tpl_vars['eventcat_id']; ?>
&p=<?php echo smarty_function_math(array('equation' => "p+1",'p' => $this->_tpl_vars['p']), $this);?>
'><?php echo SELanguage::_get(183); ?> &#187;</a><?php else: 
 echo SELanguage::_get(183); ?> &#187;<?php endif; ?>
    </div>
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
    <div style='padding: 10px; border: 1px solid #CCCCCC; margin-bottom: 10px;'>
      <table cellpadding='0' cellspacing='0'>
      <tr>
      <td>
        <a href='<?php echo $this->_tpl_vars['url']->url_create('event',@NULL,$this->_tpl_vars['events'][$this->_sections['event_loop']['index']]['event']->event_info['event_id']); ?>
'>
          <img class='photo' src='<?php echo $this->_tpl_vars['events'][$this->_sections['event_loop']['index']]['event']->event_photo("./images/nophoto.gif",'TRUE'); ?>
' border='0' width='60' height='60' />
        </a>
      </td>
      <td style='vertical-align: top; padding-left: 10px;'>
        <div style='font-weight: bold; font-size: 13px;'>
          <a href='<?php echo $this->_tpl_vars['url']->url_create('event',@NULL,$this->_tpl_vars['events'][$this->_sections['event_loop']['index']]['event']->event_info['event_id']); ?>
'>
            <?php echo $this->_tpl_vars['events'][$this->_sections['event_loop']['index']]['event']->event_info['event_title']; ?>

          </a>
        </div>
        <div style='color: #777777; font-size: 9px; margin-bottom: 2px;'>
          <?php $this->assign('event_date_start', $this->_tpl_vars['datetime']->timezone($this->_tpl_vars['events'][$this->_sections['event_loop']['index']]['event']->event_info['event_date_start'],$this->_tpl_vars['global_timezone'])); ?>
          <?php $this->assign('event_date_end', $this->_tpl_vars['datetime']->timezone($this->_tpl_vars['events'][$this->_sections['event_loop']['index']]['event']->event_info['event_date_end'],$this->_tpl_vars['global_timezone'])); ?>
          
                    <?php if (! $this->_tpl_vars['events'][$this->_sections['event_loop']['index']]['event']->event_info['event_date_end']): ?>
            <?php echo sprintf(SELanguage::_get(3000203), $this->_tpl_vars['datetime']->cdate($this->_tpl_vars['setting']['setting_dateformat'],$this->_tpl_vars['event_date_start']), $this->_tpl_vars['datetime']->cdate($this->_tpl_vars['setting']['setting_timeformat'],$this->_tpl_vars['event_date_start'])); ?>
          
                    <?php elseif ($this->_tpl_vars['datetime']->cdate("F j, Y",$this->_tpl_vars['event_date_start']) == $this->_tpl_vars['datetime']->cdate("F j, Y",$this->_tpl_vars['event_date_end'])): ?>
            <?php echo sprintf(SELanguage::_get(3000202), $this->_tpl_vars['datetime']->cdate($this->_tpl_vars['setting']['setting_dateformat'],$this->_tpl_vars['event_date_start']), $this->_tpl_vars['datetime']->cdate($this->_tpl_vars['setting']['setting_timeformat'],$this->_tpl_vars['event_date_start']), $this->_tpl_vars['datetime']->cdate($this->_tpl_vars['setting']['setting_timeformat'],$this->_tpl_vars['event_date_end'])); ?>
          
                    <?php else: ?>
            <?php echo sprintf(SELanguage::_get(3000204), $this->_tpl_vars['datetime']->cdate(($this->_tpl_vars['setting']['setting_dateformat'])." ".($this->_tpl_vars['setting']['setting_timeformat']),$this->_tpl_vars['event_date_start']), $this->_tpl_vars['datetime']->cdate(($this->_tpl_vars['setting']['setting_dateformat'])." ".($this->_tpl_vars['setting']['setting_timeformat']),$this->_tpl_vars['event_date_end'])); ?>
          <?php endif; ?>
        </div>
        <div style='color: #777777; font-size: 9px; margin-bottom: 5px;'>
          <?php $this->assign('event_dateupdated', $this->_tpl_vars['datetime']->time_since($this->_tpl_vars['events'][$this->_sections['event_loop']['index']]['event']->event_info['event_dateupdated'])); 
 ob_start(); 
 echo sprintf(SELanguage::_get($this->_tpl_vars['event_dateupdated'][0]), $this->_tpl_vars['event_dateupdated'][1]); 
 $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('updated', ob_get_contents());ob_end_clean(); ?>
          <?php echo sprintf(SELanguage::_get(3000215), $this->_tpl_vars['events'][$this->_sections['event_loop']['index']]['event']->event_info['event_totalmembers']); ?> - 
          <?php echo sprintf(SELanguage::_get(3000216), $this->_tpl_vars['events'][$this->_sections['event_loop']['index']]['event_creator']->user_displayname, $this->_tpl_vars['url']->url_create('profile',$this->_tpl_vars['events'][$this->_sections['event_loop']['index']]['event_creator']->user_info['user_username'])); ?> - 
          <?php echo sprintf(SELanguage::_get(3000217), $this->_tpl_vars['updated']); ?>
        </div>
        <div>
          <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['events'][$this->_sections['event_loop']['index']]['event']->event_info['event_desc'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 300, "...", true) : smarty_modifier_truncate($_tmp, 300, "...", true)); ?>

        </div>
      </td>
      </tr>
      </table>
    </div>
  <?php endfor; endif; ?>

    <?php if ($this->_tpl_vars['maxpage'] > 1): ?>
    <div class='event_pages_bottom'>
    <?php if ($this->_tpl_vars['p'] != 1): ?><a href='browse_events.php?s=<?php echo $this->_tpl_vars['s']; ?>
&v=<?php echo $this->_tpl_vars['v']; ?>
&eventcat_id=<?php echo $this->_tpl_vars['eventcat_id']; ?>
&p=<?php echo smarty_function_math(array('equation' => "p-1",'p' => $this->_tpl_vars['p']), $this);?>
'>&#171; <?php echo SELanguage::_get(182); ?></a><?php else: ?>&#171; <?php echo SELanguage::_get(182); 
 endif; ?>
    &nbsp;|&nbsp;&nbsp;
    <?php if ($this->_tpl_vars['p_start'] == $this->_tpl_vars['p_end']): ?>
      <b><?php echo sprintf(SELanguage::_get(184), $this->_tpl_vars['p_start'], $this->_tpl_vars['total_events']); ?></b>
    <?php else: ?>
      <b><?php echo sprintf(SELanguage::_get(185), $this->_tpl_vars['p_start'], $this->_tpl_vars['p_end'], $this->_tpl_vars['total_events']); ?></b>
    <?php endif; ?>
    &nbsp;&nbsp;|&nbsp;
    <?php if ($this->_tpl_vars['p'] != $this->_tpl_vars['maxpage']): ?><a href='browse_events.php?s=<?php echo $this->_tpl_vars['s']; ?>
&v=<?php echo $this->_tpl_vars['v']; ?>
&eventcat_id=<?php echo $this->_tpl_vars['eventcat_id']; ?>
&p=<?php echo smarty_function_math(array('equation' => "p+1",'p' => $this->_tpl_vars['p']), $this);?>
'><?php echo SELanguage::_get(183); ?> &#187;</a><?php else: 
 echo SELanguage::_get(183); ?> &#187;<?php endif; ?>
    </div>
  <?php endif; ?>

</td>
</tr>
</table>







<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>