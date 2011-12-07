<?php /* Smarty version 2.6.14, created on 2011-12-07 22:17:30
         compiled from user_event_add.tpl */
?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'user_event_add.tpl', 25, false),array('modifier', 'replace', 'user_event_add.tpl', 106, false),array('modifier', 'count', 'user_event_add.tpl', 108, false),array('modifier', 'in_array', 'user_event_add.tpl', 390, false),)), $this);
?><?php
SELanguage::_preload_multi(3000086,3000088,3000108,3000109,3000286,3000287,3000288,3000289,3000290,3000110,3000111,3000112,3000114,3000113,3000115,3000116,3000134,3000117,3000118,3000119,3000120,3000121,3000122,3000123,3000124,3000267,3000268,3000265,3000266,3000125,3000126,3000127,3000128,3000129,3000130,3000131,3000132,3000133,39);
SELanguage::load();
?>﻿<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<h1><?php echo SELanguage::_get(3000086); ?></h1>
<div class="crumb">
	<a href="/">Главная</a>
	<a href="/user_event.php"><?php echo SELanguage::_get(3000086); ?></a>
	<span><?php echo SELanguage::_get(3000088); ?></span>
</div>


<div style="width: 500px;"><?php echo SELanguage::_get(3000108); ?></div>
<a href='user_event.php'><img src='./images/icons/back16.gif' border='0' class='button' /><?php echo SELanguage::_get(3000109); ?></a>


<?php echo '
<link rel="stylesheet" type="text/css" href="templates/styles_event_calendar.css" />
<script type="text/javascript" src="include/js/calendar.compat.js"></script>
<script type="text/javascript">
  
  var myCal1, myCal2;
  window.addEvent(\'domready\', function()
  {
    myCal1 = new Calendar({ event_date_start: \''; 
 echo ((is_array($_tmp=@$this->_tpl_vars['compatible_input_dateformat'])) ? $this->_run_mod_handler('default', true, $_tmp, 'm/d/Y') : smarty_modifier_default($_tmp, 'm/d/Y')); 
 echo '\' }, {
      classes: [\'se_event_calendar\'],
      direction: 1,
      tweak: {x: 6, y: 0},
      months: ['; ?>

        '<?php echo $this->_tpl_vars['month_names']['1']; ?>
',
        '<?php echo $this->_tpl_vars['month_names']['2']; ?>
',
        '<?php echo $this->_tpl_vars['month_names']['3']; ?>
',
        '<?php echo $this->_tpl_vars['month_names']['4']; ?>
',
        '<?php echo $this->_tpl_vars['month_names']['5']; ?>
',
        '<?php echo $this->_tpl_vars['month_names']['6']; ?>
',
        '<?php echo $this->_tpl_vars['month_names']['7']; ?>
',
        '<?php echo $this->_tpl_vars['month_names']['8']; ?>
',
        '<?php echo $this->_tpl_vars['month_names']['9']; ?>
',
        '<?php echo $this->_tpl_vars['month_names']['10']; ?>
',
        '<?php echo $this->_tpl_vars['month_names']['11']; ?>
',
        '<?php echo $this->_tpl_vars['month_names']['12']; ?>
'
      <?php echo '],
      days: ['; ?>

        '<?php echo $this->_tpl_vars['day_names']['1']; ?>
',
        '<?php echo $this->_tpl_vars['day_names']['2']; ?>
',
        '<?php echo $this->_tpl_vars['day_names']['3']; ?>
',
        '<?php echo $this->_tpl_vars['day_names']['4']; ?>
',
        '<?php echo $this->_tpl_vars['day_names']['5']; ?>
',
        '<?php echo $this->_tpl_vars['day_names']['6']; ?>
',
        '<?php echo $this->_tpl_vars['day_names']['7']; ?>
'
      <?php echo '],
      day_suffixes: ['; ?>

        '<?php echo SELanguage::_get(3000286); ?>',
        '<?php echo SELanguage::_get(3000287); ?>',
        '<?php echo SELanguage::_get(3000288); ?>',
        '<?php echo SELanguage::_get(3000289); ?>'
      <?php echo '],
      year_suffix:'; ?>
'<?php echo SELanguage::_get(3000290); ?>'<?php echo '
    });
    myCal2 = new Calendar({ event_date_end: \''; 
 echo ((is_array($_tmp=@$this->_tpl_vars['compatible_input_dateformat'])) ? $this->_run_mod_handler('default', true, $_tmp, 'm/d/Y') : smarty_modifier_default($_tmp, 'm/d/Y')); 
 echo '\' }, {
      classes: [\'se_event_calendar\'],
      direction: 1,
      tweak: {x: 6, y: 0},
      months: ['; ?>

        '<?php echo $this->_tpl_vars['month_names']['1']; ?>
',
        '<?php echo $this->_tpl_vars['month_names']['2']; ?>
',
        '<?php echo $this->_tpl_vars['month_names']['3']; ?>
',
        '<?php echo $this->_tpl_vars['month_names']['4']; ?>
',
        '<?php echo $this->_tpl_vars['month_names']['5']; ?>
',
        '<?php echo $this->_tpl_vars['month_names']['6']; ?>
',
        '<?php echo $this->_tpl_vars['month_names']['7']; ?>
',
        '<?php echo $this->_tpl_vars['month_names']['8']; ?>
',
        '<?php echo $this->_tpl_vars['month_names']['9']; ?>
',
        '<?php echo $this->_tpl_vars['month_names']['10']; ?>
',
        '<?php echo $this->_tpl_vars['month_names']['11']; ?>
',
        '<?php echo $this->_tpl_vars['month_names']['12']; ?>
'
      <?php echo '],
      days: ['; ?>

        '<?php echo $this->_tpl_vars['day_names']['1']; ?>
',
        '<?php echo $this->_tpl_vars['day_names']['2']; ?>
',
        '<?php echo $this->_tpl_vars['day_names']['3']; ?>
',
        '<?php echo $this->_tpl_vars['day_names']['4']; ?>
',
        '<?php echo $this->_tpl_vars['day_names']['5']; ?>
',
        '<?php echo $this->_tpl_vars['day_names']['6']; ?>
',
        '<?php echo $this->_tpl_vars['day_names']['7']; ?>
'
      <?php echo '],
      day_suffixes: ['; ?>

        '<?php echo SELanguage::_get(3000286); ?>',
        '<?php echo SELanguage::_get(3000287); ?>',
        '<?php echo SELanguage::_get(3000288); ?>',
        '<?php echo SELanguage::_get(3000289); ?>'
      <?php echo '],
      year_suffix:'; ?>
'<?php echo SELanguage::_get(3000290); ?>'<?php echo '
    });
  });
  
</script>
'; 
 echo '
<script type=\'text/javascript\'>
<!--

  var cats = {0:{\'title\':\'\',\'subcats\':{}}'; 
 unset($this->_sections['cat_loop']);
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
?>, <?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['cat_id']; 
 echo ':{\'title\':\''; 
 ob_start(); 
 echo SELanguage::_get($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['cat_title']); 
 $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('cat_title', ob_get_contents());ob_end_clean(); 
 echo ((is_array($_tmp=$this->_tpl_vars['cat_title'])) ? $this->_run_mod_handler('replace', true, $_tmp, "&#039;", "\'") : smarty_modifier_replace($_tmp, "&#039;", "\'")); 
 echo '\', \'subcats\':{'; 
 unset($this->_sections['subcat_loop']);
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

 if (! $this->_sections['subcat_loop']['first']): ?>, <?php endif; 
 echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['subcat_id']; ?>
:'<?php ob_start(); 
 echo SELanguage::_get($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['subcat_title']); 
 $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('subcat_title', ob_get_contents());ob_end_clean(); 
 echo ((is_array($_tmp=$this->_tpl_vars['subcat_title'])) ? $this->_run_mod_handler('replace', true, $_tmp, "&#039;", "\'") : smarty_modifier_replace($_tmp, "&#039;", "\'")); ?>
'<?php endfor; endif; 
 echo '}}'; 
 endfor; endif; 
 echo '};

  '; 
 if (count($this->_tpl_vars['cats']) > 0): 
 echo '
  window.addEvent(\'domready\', function(){
    for(c in cats) {
      var optn = document.createElement("option");
      optn.text = cats[c].title;
      optn.value = c;
      if(c == '; 
 echo ((is_array($_tmp=@$this->_tpl_vars['event']->event_info['event_eventcat_id'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); 
 echo ') { optn.selected = true; }
      $(\'event_eventcat_id\').options.add(optn);
    }
    populateSubcats('; 
 echo ((is_array($_tmp=@$this->_tpl_vars['event']->event_info['event_eventcat_id'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); 
 echo ');
  });
  '; 
 endif; 
 echo '

  function populateSubcats(event_eventcat_id)
  {
    var subcats = cats[event_eventcat_id].subcats;
    var subcatHash = new Hash(subcats);
    $$(\'tr[id^=all_fields_]\').each(function(el) { if(el.id == \'all_fields_\'+event_eventcat_id) { el.style.display = \'\'; } else { el.style.display = \'none\'; }});
    if(event_eventcat_id == 0 || subcatHash.getValues().length == 0) {
      $(\'event_eventsubcat_id\').options.length = 1;
      $(\'event_eventsubcat_id\').style.display = \'none\';
    } else {
      $(\'event_eventsubcat_id\').options.length = 1;
      $(\'event_eventsubcat_id\').style.display = \'\';
      for(s in subcats) {
        var optn = document.createElement("option");
        optn.text = subcats[s];
        optn.value = s;
        if(s == '; 
 echo $this->_tpl_vars['event']->event_info['event_eventsubcat_id']; 
 echo ') { optn.selected = true; }
        $(\'event_eventsubcat_id\').options.add(optn);
      }
    }
  }

  function ShowHideDeps(field_id, field_value, field_type) {
    if(field_type == 6) {
      if($(\'field_\'+field_id+\'_option\'+field_value)) {
        if($(\'field_\'+field_id+\'_option\'+field_value).style.display == "block") {
	  $(\'field_\'+field_id+\'_option\'+field_value).style.display = "none";
	} else {
	  $(\'field_\'+field_id+\'_option\'+field_value).style.display = "block";
	}
      }
    } else {
      var divIdStart = "field_"+field_id+"_option";
      for(var x=0;x<$(\'field_options_\'+field_id).childNodes.length;x++) {
        if($(\'field_options_\'+field_id).childNodes[x].nodeName == "DIV" && $(\'field_options_\'+field_id).childNodes[x].id.substr(0, divIdStart.length) == divIdStart) {
          if($(\'field_options_\'+field_id).childNodes[x].id == \'field_\'+field_id+\'_option\'+field_value) {
            $(\'field_options_\'+field_id).childNodes[x].style.display = "block";
          } else {
            $(\'field_options_\'+field_id).childNodes[x].style.display = "none";
          }
        }
      }
    }
  }
//-->
</script>
'; 
 if ($this->_tpl_vars['is_error']): 
 echo SELanguage::_get($this->_tpl_vars['is_error']); 
 endif; ?>



<form action='user_event_add.php' method='post'>


<table cellpadding='0' cellspacing='0'>
  <tr>
    <td class='form1'><?php echo SELanguage::_get(3000110); ?>*</td>
    <td class='form2'><input type='text' class='text' name='event_title' value='<?php echo $this->_tpl_vars['event']->event_info['event_title']; ?>
' maxlength='100' size='30'></td>
  </tr>
  <tr>
    <td class='form1'><?php echo SELanguage::_get(3000111); ?></td>
    <td class='form2'><textarea rows='6' cols='50' name='event_desc'><?php echo $this->_tpl_vars['event']->event_info['event_desc']; ?>
</textarea></td>
  </tr>
  
  <tr>
    <td class='form1'><?php echo SELanguage::_get(3000112); ?>*</td>
    <td class='form2'>
      
      <div class="se_event_calendar_container">
        <input class="se_event_calendar" type="text" name="event_date_start" id="event_date_start" value="<?php echo $this->_tpl_vars['datetime']->cdate($this->_tpl_vars['compatible_input_dateformat'],$this->_tpl_vars['event_date_start_tz']); ?>
" />
      </div>
      
      <div>
        <input style="width: 149px;margin-right: 6px;"  type="text" name="event_time_start" id="event_time_start" value="<?php echo $this->_tpl_vars['datetime']->cdate($this->_tpl_vars['compatible_input_timeformat'],$this->_tpl_vars['event_date_start_tz']); ?>
" />
        <label for="event_date_start"><?php echo SELanguage::_get(3000114); ?></label>
      </div>
      
    </td>
  </tr>
  
  <tr>
    <td class='form1'><?php echo SELanguage::_get(3000113); ?></td>
    <td class='form2'>
      
      <div class="se_event_calendar_container">
        <input class="se_event_calendar" type="text" name="event_date_end" id="event_date_end" value="<?php echo $this->_tpl_vars['datetime']->cdate($this->_tpl_vars['compatible_input_dateformat'],$this->_tpl_vars['event_date_end_tz']); ?>
" />
      </div>
      
      <div>
        <input style="width: 149px;margin-right: 6px;" type="text" name="event_time_end" id="event_time_end" value="<?php echo $this->_tpl_vars['datetime']->cdate($this->_tpl_vars['compatible_input_timeformat'],$this->_tpl_vars['event_date_end_tz']); ?>
" />
        <label for="event_time_end"><?php echo SELanguage::_get(3000114); ?></label>
      </div>
    </td>
  </tr>
  
  <tr>
    <td class='form1'><?php echo SELanguage::_get(3000115); ?></td>
    <td class='form2'><input type='text' class='text' name='event_host' value='<?php echo $this->_tpl_vars['event']->event_info['event_host']; ?>
' maxlength='250' size='30'></td>
  </tr>
  
  <tr>
    <td class='form1'><?php echo SELanguage::_get(3000116); ?></td>
    <td class='form2'><textarea rows='6' cols='50' name='event_location'><?php echo $this->_tpl_vars['event']->event_info['event_location']; ?>
</textarea></td>
  </tr>
  
  
  <?php if (count($this->_tpl_vars['cats']) > 0): ?>
  <tr>
    <td class='form1'><?php echo SELanguage::_get(3000134); ?>*</td>
	
    <td class='form2' nowrap='nowrap' style="display:none;">
		<input type="hidden" name="event_eventcat_id" value="1" />
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
      <tr id='all_fields_<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['cat_id']; ?>
'>
      <td class='form1'><?php echo SELanguage::_get($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_title']); 
 if ($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_required'] != 0): ?>*<?php endif; ?></td>
      <td class='form2'>

            <?php if ($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_type'] == 1): ?>
        <div><input type='text' class='text' name='field_<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_id']; ?>
' id='field_<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_id']; ?>
' value='<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_value']; ?>
' style='<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_style']; ?>
' maxlength='<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_maxlength']; ?>
'></div>

                <?php if ($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'] != "" && count($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options']) != 0): ?>
        <?php echo '
        <script type="text/javascript">
        <!-- 
        window.addEvent(\'domready\', function(){
    var options = {
    script:"misc_js.php?task=suggest_field&limit=5&'; 
 unset($this->_sections['option_loop']);
$this->_sections['option_loop']['name'] = 'option_loop';
$this->_sections['option_loop']['loop'] = is_array($_loop=$this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['option_loop']['show'] = true;
$this->_sections['option_loop']['max'] = $this->_sections['option_loop']['loop'];
$this->_sections['option_loop']['step'] = 1;
$this->_sections['option_loop']['start'] = $this->_sections['option_loop']['step'] > 0 ? 0 : $this->_sections['option_loop']['loop']-1;
if ($this->_sections['option_loop']['show']) {
    $this->_sections['option_loop']['total'] = $this->_sections['option_loop']['loop'];
    if ($this->_sections['option_loop']['total'] == 0)
        $this->_sections['option_loop']['show'] = false;
} else
    $this->_sections['option_loop']['total'] = 0;
if ($this->_sections['option_loop']['show']):

            for ($this->_sections['option_loop']['index'] = $this->_sections['option_loop']['start'], $this->_sections['option_loop']['iteration'] = 1;
                 $this->_sections['option_loop']['iteration'] <= $this->_sections['option_loop']['total'];
                 $this->_sections['option_loop']['index'] += $this->_sections['option_loop']['step'], $this->_sections['option_loop']['iteration']++):
$this->_sections['option_loop']['rownum'] = $this->_sections['option_loop']['iteration'];
$this->_sections['option_loop']['index_prev'] = $this->_sections['option_loop']['index'] - $this->_sections['option_loop']['step'];
$this->_sections['option_loop']['index_next'] = $this->_sections['option_loop']['index'] + $this->_sections['option_loop']['step'];
$this->_sections['option_loop']['first']      = ($this->_sections['option_loop']['iteration'] == 1);
$this->_sections['option_loop']['last']       = ($this->_sections['option_loop']['iteration'] == $this->_sections['option_loop']['total']);
?>options[]=<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['label']; ?>
&<?php endfor; endif; 
 echo '",
    varname:"input",
    json:true,
    shownoresults:false,
    maxresults:5,
    multisuggest:false,
    callback: function (obj) {  }
    };
    var as_json'; 
 echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_id']; 
 echo ' = new bsn.AutoSuggest(\'field_'; 
 echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_id']; 
 echo '\', options);
        });
        //-->
        </script>
        '; ?>

        <?php endif; ?>


            <?php elseif ($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_type'] == 2): ?>
        <div><textarea rows='6' cols='50' name='field_<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_id']; ?>
' style='<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_style']; ?>
'><?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_value']; ?>
</textarea></div>



            <?php elseif ($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_type'] == 3): ?>
        <div><select name='field_<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_id']; ?>
' id='field_<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_id']; ?>
' onchange="ShowHideDeps('<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_id']; ?>
', this.value);" style='<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_style']; ?>
'>
        <option value='-1'></option>
                <?php unset($this->_sections['option_loop']);
$this->_sections['option_loop']['name'] = 'option_loop';
$this->_sections['option_loop']['loop'] = is_array($_loop=$this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['option_loop']['show'] = true;
$this->_sections['option_loop']['max'] = $this->_sections['option_loop']['loop'];
$this->_sections['option_loop']['step'] = 1;
$this->_sections['option_loop']['start'] = $this->_sections['option_loop']['step'] > 0 ? 0 : $this->_sections['option_loop']['loop']-1;
if ($this->_sections['option_loop']['show']) {
    $this->_sections['option_loop']['total'] = $this->_sections['option_loop']['loop'];
    if ($this->_sections['option_loop']['total'] == 0)
        $this->_sections['option_loop']['show'] = false;
} else
    $this->_sections['option_loop']['total'] = 0;
if ($this->_sections['option_loop']['show']):

            for ($this->_sections['option_loop']['index'] = $this->_sections['option_loop']['start'], $this->_sections['option_loop']['iteration'] = 1;
                 $this->_sections['option_loop']['iteration'] <= $this->_sections['option_loop']['total'];
                 $this->_sections['option_loop']['index'] += $this->_sections['option_loop']['step'], $this->_sections['option_loop']['iteration']++):
$this->_sections['option_loop']['rownum'] = $this->_sections['option_loop']['iteration'];
$this->_sections['option_loop']['index_prev'] = $this->_sections['option_loop']['index'] - $this->_sections['option_loop']['step'];
$this->_sections['option_loop']['index_next'] = $this->_sections['option_loop']['index'] + $this->_sections['option_loop']['step'];
$this->_sections['option_loop']['first']      = ($this->_sections['option_loop']['iteration'] == 1);
$this->_sections['option_loop']['last']       = ($this->_sections['option_loop']['iteration'] == $this->_sections['option_loop']['total']);
?>
          <option id='op' value='<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['value']; ?>
'<?php if ($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['value'] == $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_value']): ?> SELECTED<?php endif; ?>><?php echo SELanguage::_get($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['label']); ?></option>
        <?php endfor; endif; ?>
        </select>
        </div>
                <div id='field_options_<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_id']; ?>
'>
        <?php unset($this->_sections['option_loop']);
$this->_sections['option_loop']['name'] = 'option_loop';
$this->_sections['option_loop']['loop'] = is_array($_loop=$this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['option_loop']['show'] = true;
$this->_sections['option_loop']['max'] = $this->_sections['option_loop']['loop'];
$this->_sections['option_loop']['step'] = 1;
$this->_sections['option_loop']['start'] = $this->_sections['option_loop']['step'] > 0 ? 0 : $this->_sections['option_loop']['loop']-1;
if ($this->_sections['option_loop']['show']) {
    $this->_sections['option_loop']['total'] = $this->_sections['option_loop']['loop'];
    if ($this->_sections['option_loop']['total'] == 0)
        $this->_sections['option_loop']['show'] = false;
} else
    $this->_sections['option_loop']['total'] = 0;
if ($this->_sections['option_loop']['show']):

            for ($this->_sections['option_loop']['index'] = $this->_sections['option_loop']['start'], $this->_sections['option_loop']['iteration'] = 1;
                 $this->_sections['option_loop']['iteration'] <= $this->_sections['option_loop']['total'];
                 $this->_sections['option_loop']['index'] += $this->_sections['option_loop']['step'], $this->_sections['option_loop']['iteration']++):
$this->_sections['option_loop']['rownum'] = $this->_sections['option_loop']['iteration'];
$this->_sections['option_loop']['index_prev'] = $this->_sections['option_loop']['index'] - $this->_sections['option_loop']['step'];
$this->_sections['option_loop']['index_next'] = $this->_sections['option_loop']['index'] + $this->_sections['option_loop']['step'];
$this->_sections['option_loop']['first']      = ($this->_sections['option_loop']['iteration'] == 1);
$this->_sections['option_loop']['last']       = ($this->_sections['option_loop']['iteration'] == $this->_sections['option_loop']['total']);
?>
          <?php if ($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dependency'] == 1): ?>

            <?php if ($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_type'] == 3): ?>
              <div id='field_<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_id']; ?>
_option<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['value']; ?>
' style='margin: 5px 5px 10px 5px;<?php if ($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['value'] != $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_value']): ?> display: none;<?php endif; ?>'>
              <?php echo SELanguage::_get($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_title']); 
 if ($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_required'] != 0): ?>*<?php endif; ?>
              <select name='field_<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_id']; ?>
'>
          <option value='-1'></option>
                    <?php unset($this->_sections['option2_loop']);
$this->_sections['option2_loop']['name'] = 'option2_loop';
$this->_sections['option2_loop']['loop'] = is_array($_loop=$this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_options']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['option2_loop']['show'] = true;
$this->_sections['option2_loop']['max'] = $this->_sections['option2_loop']['loop'];
$this->_sections['option2_loop']['step'] = 1;
$this->_sections['option2_loop']['start'] = $this->_sections['option2_loop']['step'] > 0 ? 0 : $this->_sections['option2_loop']['loop']-1;
if ($this->_sections['option2_loop']['show']) {
    $this->_sections['option2_loop']['total'] = $this->_sections['option2_loop']['loop'];
    if ($this->_sections['option2_loop']['total'] == 0)
        $this->_sections['option2_loop']['show'] = false;
} else
    $this->_sections['option2_loop']['total'] = 0;
if ($this->_sections['option2_loop']['show']):

            for ($this->_sections['option2_loop']['index'] = $this->_sections['option2_loop']['start'], $this->_sections['option2_loop']['iteration'] = 1;
                 $this->_sections['option2_loop']['iteration'] <= $this->_sections['option2_loop']['total'];
                 $this->_sections['option2_loop']['index'] += $this->_sections['option2_loop']['step'], $this->_sections['option2_loop']['iteration']++):
$this->_sections['option2_loop']['rownum'] = $this->_sections['option2_loop']['iteration'];
$this->_sections['option2_loop']['index_prev'] = $this->_sections['option2_loop']['index'] - $this->_sections['option2_loop']['step'];
$this->_sections['option2_loop']['index_next'] = $this->_sections['option2_loop']['index'] + $this->_sections['option2_loop']['step'];
$this->_sections['option2_loop']['first']      = ($this->_sections['option2_loop']['iteration'] == 1);
$this->_sections['option2_loop']['last']       = ($this->_sections['option2_loop']['iteration'] == $this->_sections['option2_loop']['total']);
?>
            <option id='op' value='<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_options'][$this->_sections['option2_loop']['index']]['value']; ?>
'<?php if ($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_options'][$this->_sections['option2_loop']['index']]['value'] == $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_value']): ?> SELECTED<?php endif; ?>><?php echo SELanguage::_get($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_options'][$this->_sections['option2_loop']['index']]['label']); ?></option>
          <?php endfor; endif; ?>
        </select>
              </div>	  

            <?php else: ?>
              <div id='field_<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_id']; ?>
_option<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['value']; ?>
' style='margin: 5px 5px 10px 5px;<?php if ($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['value'] != $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_value']): ?> display: none;<?php endif; ?>'>
              <?php echo SELanguage::_get($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_title']); 
 if ($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_required'] != 0): ?>*<?php endif; ?>
             <input type='text' class='text' name='field_<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_id']; ?>
' value='<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_value']; ?>
' style='<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_style']; ?>
' maxlength='<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_maxlength']; ?>
'>
              </div>
      <?php endif; ?>

          <?php endif; ?>
        <?php endfor; endif; ?>
        </div>
    


            <?php elseif ($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_type'] == 4): ?>
    
                <div id='field_options_<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_id']; ?>
'>
        <?php unset($this->_sections['option_loop']);
$this->_sections['option_loop']['name'] = 'option_loop';
$this->_sections['option_loop']['loop'] = is_array($_loop=$this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['option_loop']['show'] = true;
$this->_sections['option_loop']['max'] = $this->_sections['option_loop']['loop'];
$this->_sections['option_loop']['step'] = 1;
$this->_sections['option_loop']['start'] = $this->_sections['option_loop']['step'] > 0 ? 0 : $this->_sections['option_loop']['loop']-1;
if ($this->_sections['option_loop']['show']) {
    $this->_sections['option_loop']['total'] = $this->_sections['option_loop']['loop'];
    if ($this->_sections['option_loop']['total'] == 0)
        $this->_sections['option_loop']['show'] = false;
} else
    $this->_sections['option_loop']['total'] = 0;
if ($this->_sections['option_loop']['show']):

            for ($this->_sections['option_loop']['index'] = $this->_sections['option_loop']['start'], $this->_sections['option_loop']['iteration'] = 1;
                 $this->_sections['option_loop']['iteration'] <= $this->_sections['option_loop']['total'];
                 $this->_sections['option_loop']['index'] += $this->_sections['option_loop']['step'], $this->_sections['option_loop']['iteration']++):
$this->_sections['option_loop']['rownum'] = $this->_sections['option_loop']['iteration'];
$this->_sections['option_loop']['index_prev'] = $this->_sections['option_loop']['index'] - $this->_sections['option_loop']['step'];
$this->_sections['option_loop']['index_next'] = $this->_sections['option_loop']['index'] + $this->_sections['option_loop']['step'];
$this->_sections['option_loop']['first']      = ($this->_sections['option_loop']['iteration'] == 1);
$this->_sections['option_loop']['last']       = ($this->_sections['option_loop']['iteration'] == $this->_sections['option_loop']['total']);
?>
          <div>
          <input type='radio' class='radio' onclick="ShowHideDeps('<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_id']; ?>
', '<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['value']; ?>
');" style='<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_style']; ?>
' name='field_<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_id']; ?>
' id='label_<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_id']; ?>
_<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['value']; ?>
' value='<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['value']; ?>
'<?php if ($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['value'] == $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_value']): ?> CHECKED<?php endif; ?>>
          <label for='label_<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_id']; ?>
_<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['value']; ?>
'><?php echo SELanguage::_get($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['label']); ?></label>
          </div>

                    <?php if ($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dependency'] == 1): ?>

            <?php if ($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_type'] == 3): ?>
              <div id='field_<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_id']; ?>
_option<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['value']; ?>
' style='margin: 0px 5px 10px 23px;<?php if ($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['value'] != $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_value']): ?> display: none;<?php endif; ?>'>
              <?php echo SELanguage::_get($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_title']); 
 if ($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_required'] != 0): ?>*<?php endif; ?>
              <select name='field_<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_id']; ?>
'>
          <option value='-1'></option>
                    <?php unset($this->_sections['option2_loop']);
$this->_sections['option2_loop']['name'] = 'option2_loop';
$this->_sections['option2_loop']['loop'] = is_array($_loop=$this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_options']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['option2_loop']['show'] = true;
$this->_sections['option2_loop']['max'] = $this->_sections['option2_loop']['loop'];
$this->_sections['option2_loop']['step'] = 1;
$this->_sections['option2_loop']['start'] = $this->_sections['option2_loop']['step'] > 0 ? 0 : $this->_sections['option2_loop']['loop']-1;
if ($this->_sections['option2_loop']['show']) {
    $this->_sections['option2_loop']['total'] = $this->_sections['option2_loop']['loop'];
    if ($this->_sections['option2_loop']['total'] == 0)
        $this->_sections['option2_loop']['show'] = false;
} else
    $this->_sections['option2_loop']['total'] = 0;
if ($this->_sections['option2_loop']['show']):

            for ($this->_sections['option2_loop']['index'] = $this->_sections['option2_loop']['start'], $this->_sections['option2_loop']['iteration'] = 1;
                 $this->_sections['option2_loop']['iteration'] <= $this->_sections['option2_loop']['total'];
                 $this->_sections['option2_loop']['index'] += $this->_sections['option2_loop']['step'], $this->_sections['option2_loop']['iteration']++):
$this->_sections['option2_loop']['rownum'] = $this->_sections['option2_loop']['iteration'];
$this->_sections['option2_loop']['index_prev'] = $this->_sections['option2_loop']['index'] - $this->_sections['option2_loop']['step'];
$this->_sections['option2_loop']['index_next'] = $this->_sections['option2_loop']['index'] + $this->_sections['option2_loop']['step'];
$this->_sections['option2_loop']['first']      = ($this->_sections['option2_loop']['iteration'] == 1);
$this->_sections['option2_loop']['last']       = ($this->_sections['option2_loop']['iteration'] == $this->_sections['option2_loop']['total']);
?>
            <option id='op' value='<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_options'][$this->_sections['option2_loop']['index']]['value']; ?>
'<?php if ($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_options'][$this->_sections['option2_loop']['index']]['value'] == $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_value']): ?> SELECTED<?php endif; ?>><?php echo SELanguage::_get($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_options'][$this->_sections['option2_loop']['index']]['label']); ?></option>
          <?php endfor; endif; ?>
        </select>
              </div>	  

            <?php else: ?>
              <div id='field_<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_id']; ?>
_option<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['value']; ?>
' style='margin: 0px 5px 10px 23px;<?php if ($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['value'] != $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_value']): ?> display: none;<?php endif; ?>'>
              <?php echo SELanguage::_get($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_title']); 
 if ($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_required'] != 0): ?>*<?php endif; ?>
             <input type='text' class='text' name='field_<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_id']; ?>
' value='<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_value']; ?>
' style='<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_style']; ?>
' maxlength='<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_maxlength']; ?>
'>
              </div>
      <?php endif; ?>

          <?php endif; ?>

        <?php endfor; endif; ?>
        </div>
        
            <?php elseif ($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_type'] == 5): ?>
        <div>
        <select name='field_<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_id']; ?>
_1' style='<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_style']; ?>
'>
        <?php unset($this->_sections['date1']);
$this->_sections['date1']['name'] = 'date1';
$this->_sections['date1']['loop'] = is_array($_loop=$this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['date_array1']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['date1']['show'] = true;
$this->_sections['date1']['max'] = $this->_sections['date1']['loop'];
$this->_sections['date1']['step'] = 1;
$this->_sections['date1']['start'] = $this->_sections['date1']['step'] > 0 ? 0 : $this->_sections['date1']['loop']-1;
if ($this->_sections['date1']['show']) {
    $this->_sections['date1']['total'] = $this->_sections['date1']['loop'];
    if ($this->_sections['date1']['total'] == 0)
        $this->_sections['date1']['show'] = false;
} else
    $this->_sections['date1']['total'] = 0;
if ($this->_sections['date1']['show']):

            for ($this->_sections['date1']['index'] = $this->_sections['date1']['start'], $this->_sections['date1']['iteration'] = 1;
                 $this->_sections['date1']['iteration'] <= $this->_sections['date1']['total'];
                 $this->_sections['date1']['index'] += $this->_sections['date1']['step'], $this->_sections['date1']['iteration']++):
$this->_sections['date1']['rownum'] = $this->_sections['date1']['iteration'];
$this->_sections['date1']['index_prev'] = $this->_sections['date1']['index'] - $this->_sections['date1']['step'];
$this->_sections['date1']['index_next'] = $this->_sections['date1']['index'] + $this->_sections['date1']['step'];
$this->_sections['date1']['first']      = ($this->_sections['date1']['iteration'] == 1);
$this->_sections['date1']['last']       = ($this->_sections['date1']['iteration'] == $this->_sections['date1']['total']);
?>
          <option value='<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['date_array1'][$this->_sections['date1']['index']]['value']; ?>
'<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['date_array1'][$this->_sections['date1']['index']]['selected']; ?>
><?php if ($this->_sections['date1']['first']): ?>[ <?php echo SELanguage::_get($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['date_array1'][$this->_sections['date1']['index']]['name']); ?> ]<?php else: 
 echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['date_array1'][$this->_sections['date1']['index']]['name']; 
 endif; ?></option>
        <?php endfor; endif; ?>
        </select>
        
        <select name='field_<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_id']; ?>
_2' style='<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_style']; ?>
'>
        <?php unset($this->_sections['date2']);
$this->_sections['date2']['name'] = 'date2';
$this->_sections['date2']['loop'] = is_array($_loop=$this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['date_array2']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['date2']['show'] = true;
$this->_sections['date2']['max'] = $this->_sections['date2']['loop'];
$this->_sections['date2']['step'] = 1;
$this->_sections['date2']['start'] = $this->_sections['date2']['step'] > 0 ? 0 : $this->_sections['date2']['loop']-1;
if ($this->_sections['date2']['show']) {
    $this->_sections['date2']['total'] = $this->_sections['date2']['loop'];
    if ($this->_sections['date2']['total'] == 0)
        $this->_sections['date2']['show'] = false;
} else
    $this->_sections['date2']['total'] = 0;
if ($this->_sections['date2']['show']):

            for ($this->_sections['date2']['index'] = $this->_sections['date2']['start'], $this->_sections['date2']['iteration'] = 1;
                 $this->_sections['date2']['iteration'] <= $this->_sections['date2']['total'];
                 $this->_sections['date2']['index'] += $this->_sections['date2']['step'], $this->_sections['date2']['iteration']++):
$this->_sections['date2']['rownum'] = $this->_sections['date2']['iteration'];
$this->_sections['date2']['index_prev'] = $this->_sections['date2']['index'] - $this->_sections['date2']['step'];
$this->_sections['date2']['index_next'] = $this->_sections['date2']['index'] + $this->_sections['date2']['step'];
$this->_sections['date2']['first']      = ($this->_sections['date2']['iteration'] == 1);
$this->_sections['date2']['last']       = ($this->_sections['date2']['iteration'] == $this->_sections['date2']['total']);
?>
          <option value='<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['date_array2'][$this->_sections['date2']['index']]['value']; ?>
'<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['date_array2'][$this->_sections['date2']['index']]['selected']; ?>
><?php if ($this->_sections['date2']['first']): ?>[ <?php echo SELanguage::_get($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['date_array2'][$this->_sections['date2']['index']]['name']); ?> ]<?php else: 
 echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['date_array2'][$this->_sections['date2']['index']]['name']; 
 endif; ?></option>
        <?php endfor; endif; ?>
        </select>
        
        <select name='field_<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_id']; ?>
_3' style='<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_style']; ?>
'>
        <?php unset($this->_sections['date3']);
$this->_sections['date3']['name'] = 'date3';
$this->_sections['date3']['loop'] = is_array($_loop=$this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['date_array3']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['date3']['show'] = true;
$this->_sections['date3']['max'] = $this->_sections['date3']['loop'];
$this->_sections['date3']['step'] = 1;
$this->_sections['date3']['start'] = $this->_sections['date3']['step'] > 0 ? 0 : $this->_sections['date3']['loop']-1;
if ($this->_sections['date3']['show']) {
    $this->_sections['date3']['total'] = $this->_sections['date3']['loop'];
    if ($this->_sections['date3']['total'] == 0)
        $this->_sections['date3']['show'] = false;
} else
    $this->_sections['date3']['total'] = 0;
if ($this->_sections['date3']['show']):

            for ($this->_sections['date3']['index'] = $this->_sections['date3']['start'], $this->_sections['date3']['iteration'] = 1;
                 $this->_sections['date3']['iteration'] <= $this->_sections['date3']['total'];
                 $this->_sections['date3']['index'] += $this->_sections['date3']['step'], $this->_sections['date3']['iteration']++):
$this->_sections['date3']['rownum'] = $this->_sections['date3']['iteration'];
$this->_sections['date3']['index_prev'] = $this->_sections['date3']['index'] - $this->_sections['date3']['step'];
$this->_sections['date3']['index_next'] = $this->_sections['date3']['index'] + $this->_sections['date3']['step'];
$this->_sections['date3']['first']      = ($this->_sections['date3']['iteration'] == 1);
$this->_sections['date3']['last']       = ($this->_sections['date3']['iteration'] == $this->_sections['date3']['total']);
?>
          <option value='<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['date_array3'][$this->_sections['date3']['index']]['value']; ?>
'<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['date_array3'][$this->_sections['date3']['index']]['selected']; ?>
><?php if ($this->_sections['date3']['first']): ?>[ <?php echo SELanguage::_get($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['date_array3'][$this->_sections['date3']['index']]['name']); ?> ]<?php else: 
 echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['date_array3'][$this->_sections['date3']['index']]['name']; 
 endif; ?></option>
        <?php endfor; endif; ?>
        </select>
        </div>
        
        
        
            <?php elseif ($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_type'] == 6): ?>
    
                <div id='field_options_<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_id']; ?>
'>
        <?php unset($this->_sections['option_loop']);
$this->_sections['option_loop']['name'] = 'option_loop';
$this->_sections['option_loop']['loop'] = is_array($_loop=$this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['option_loop']['show'] = true;
$this->_sections['option_loop']['max'] = $this->_sections['option_loop']['loop'];
$this->_sections['option_loop']['step'] = 1;
$this->_sections['option_loop']['start'] = $this->_sections['option_loop']['step'] > 0 ? 0 : $this->_sections['option_loop']['loop']-1;
if ($this->_sections['option_loop']['show']) {
    $this->_sections['option_loop']['total'] = $this->_sections['option_loop']['loop'];
    if ($this->_sections['option_loop']['total'] == 0)
        $this->_sections['option_loop']['show'] = false;
} else
    $this->_sections['option_loop']['total'] = 0;
if ($this->_sections['option_loop']['show']):

            for ($this->_sections['option_loop']['index'] = $this->_sections['option_loop']['start'], $this->_sections['option_loop']['iteration'] = 1;
                 $this->_sections['option_loop']['iteration'] <= $this->_sections['option_loop']['total'];
                 $this->_sections['option_loop']['index'] += $this->_sections['option_loop']['step'], $this->_sections['option_loop']['iteration']++):
$this->_sections['option_loop']['rownum'] = $this->_sections['option_loop']['iteration'];
$this->_sections['option_loop']['index_prev'] = $this->_sections['option_loop']['index'] - $this->_sections['option_loop']['step'];
$this->_sections['option_loop']['index_next'] = $this->_sections['option_loop']['index'] + $this->_sections['option_loop']['step'];
$this->_sections['option_loop']['first']      = ($this->_sections['option_loop']['iteration'] == 1);
$this->_sections['option_loop']['last']       = ($this->_sections['option_loop']['iteration'] == $this->_sections['option_loop']['total']);
?>
          <div>
          <input type='checkbox' onclick="ShowHideDeps('<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_id']; ?>
', '<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['value']; ?>
', '<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_type']; ?>
');" style='<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_style']; ?>
' name='field_<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_id']; ?>
[]' id='label_<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_id']; ?>
_<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['value']; ?>
' value='<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['value']; ?>
'<?php if (((is_array($_tmp=$this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['value'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_value']) : in_array($_tmp, $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_value']))): ?> CHECKED<?php endif; ?>>
          <label for='label_<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_id']; ?>
_<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['value']; ?>
'><?php echo SELanguage::_get($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['label']); ?></label>
          </div>
          
                    <?php if ($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dependency'] == 1): ?>
            <?php if ($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_type'] == 3): ?>
              <div id='field_<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_id']; ?>
_option<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['value']; ?>
' style='margin: 0px 5px 10px 23px;<?php if ($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['value'] != $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_value']): ?> display: none;<?php endif; ?>'>
              <?php echo SELanguage::_get($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_title']); 
 if ($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_required'] != 0): ?>*<?php endif; ?>
              <select name='field_<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_id']; ?>
'>
          <option value='-1'></option>
                    <?php unset($this->_sections['option2_loop']);
$this->_sections['option2_loop']['name'] = 'option2_loop';
$this->_sections['option2_loop']['loop'] = is_array($_loop=$this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_options']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['option2_loop']['show'] = true;
$this->_sections['option2_loop']['max'] = $this->_sections['option2_loop']['loop'];
$this->_sections['option2_loop']['step'] = 1;
$this->_sections['option2_loop']['start'] = $this->_sections['option2_loop']['step'] > 0 ? 0 : $this->_sections['option2_loop']['loop']-1;
if ($this->_sections['option2_loop']['show']) {
    $this->_sections['option2_loop']['total'] = $this->_sections['option2_loop']['loop'];
    if ($this->_sections['option2_loop']['total'] == 0)
        $this->_sections['option2_loop']['show'] = false;
} else
    $this->_sections['option2_loop']['total'] = 0;
if ($this->_sections['option2_loop']['show']):

            for ($this->_sections['option2_loop']['index'] = $this->_sections['option2_loop']['start'], $this->_sections['option2_loop']['iteration'] = 1;
                 $this->_sections['option2_loop']['iteration'] <= $this->_sections['option2_loop']['total'];
                 $this->_sections['option2_loop']['index'] += $this->_sections['option2_loop']['step'], $this->_sections['option2_loop']['iteration']++):
$this->_sections['option2_loop']['rownum'] = $this->_sections['option2_loop']['iteration'];
$this->_sections['option2_loop']['index_prev'] = $this->_sections['option2_loop']['index'] - $this->_sections['option2_loop']['step'];
$this->_sections['option2_loop']['index_next'] = $this->_sections['option2_loop']['index'] + $this->_sections['option2_loop']['step'];
$this->_sections['option2_loop']['first']      = ($this->_sections['option2_loop']['iteration'] == 1);
$this->_sections['option2_loop']['last']       = ($this->_sections['option2_loop']['iteration'] == $this->_sections['option2_loop']['total']);
?>
            <option id='op' value='<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_options'][$this->_sections['option2_loop']['index']]['value']; ?>
'<?php if ($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_options'][$this->_sections['option2_loop']['index']]['value'] == $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_value']): ?> SELECTED<?php endif; ?>><?php echo SELanguage::_get($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_options'][$this->_sections['option2_loop']['index']]['label']); ?></option>
          <?php endfor; endif; ?>
        </select>
              </div>	  
              
            <?php else: ?>
              <div id='field_<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_id']; ?>
_option<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['value']; ?>
' style='margin: 0px 5px 10px 23px;<?php if ($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['value'] != $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_value']): ?> display: none;<?php endif; ?>'>
              <?php echo SELanguage::_get($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_title']); 
 if ($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_required'] != 0): ?>*<?php endif; ?>
             <input type='text' class='text' name='field_<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_id']; ?>
' value='<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_value']; ?>
' style='<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_style']; ?>
' maxlength='<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_maxlength']; ?>
'>
              </div>
      <?php endif; ?>
          <?php endif; ?>
          
        <?php endfor; endif; ?>
        </div>
        
      <?php endif; ?>
      
      <div class='form_desc'><?php echo SELanguage::_get($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_desc']); ?></div>
      <?php ob_start(); 
 echo SELanguage::_get($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_error']); 
 $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('field_error', ob_get_contents());ob_end_clean(); ?>
      <?php if ($this->_tpl_vars['field_error'] != ""): ?><div class='form_error'><img src='./images/icons/error16.gif' border='0' class='icon'> <?php echo $this->_tpl_vars['field_error']; ?>
</div><?php endif; ?>
      </td>
      </tr>
      
    <?php endfor; endif; ?>
  <?php endfor; endif; ?>
  
  <?php endif; ?>
  
  
  
  
    
    <?php if ($this->_tpl_vars['user']->level_info['level_event_inviteonly']): ?>
    <tr>
      <td class='form1' width='120'><?php echo SELanguage::_get(3000117); ?></td>
      <td class='form2'>
        <div class='event_form_desc'><?php echo SELanguage::_get(3000118); ?></div>
        <table cellpadding='0' cellspacing='0'>
          <tr>
            <td><input type='radio' name='event_inviteonly' id='event_inviteonly_0' value='0'<?php if (! $this->_tpl_vars['event']->event_info['event_inviteonly']): ?> checked<?php endif; ?> /></td>
            <td><label for='event_inviteonly_0'><?php echo SELanguage::_get(3000119); ?></label></td>
          </tr>
          <tr>
            <td><input type='radio' name='event_inviteonly' id='event_inviteonly_1' value='1'<?php if ($this->_tpl_vars['event']->event_info['event_inviteonly']): ?> checked<?php endif; ?> /></td>
            <td><label for='event_inviteonly_1'><?php echo SELanguage::_get(3000120); ?></label></td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td colspan='2'>&nbsp;</td>
    </tr>
  <?php endif; ?>
  
    <?php if ($this->_tpl_vars['user']->level_info['level_event_search']): ?>
    <tr>
      <td class='form1' width='120'><?php echo SELanguage::_get(3000121); ?></td>
      <td class='form2'>
        <div class='event_form_desc'><?php echo SELanguage::_get(3000122); ?></div>
        <table cellpadding='0' cellspacing='0'>
          <tr>
            <td><input type='radio' name='event_search' id='event_search_1' value='1'<?php if ($this->_tpl_vars['event']->event_info['event_search']): ?> checked<?php endif; ?> /></td>
            <td><label for='event_search_1'><?php echo SELanguage::_get(3000123); ?></label></td>
          </tr>
          <tr>
            <td><input type='radio' name='event_search' id='event_search_0' value='0'<?php if (! $this->_tpl_vars['event']->event_info['event_search']): ?> checked<?php endif; ?> /></td>
            <td><label for='event_search_0'><?php echo SELanguage::_get(3000124); ?></label></td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td colspan='2'>&nbsp;</td>
    </tr>
  <?php endif; ?>
  
        <tr>
      <td class='form1' width='120'><?php echo SELanguage::_get(3000267); ?></td>
      <td class='form2'>
        <div class='event_form_desc'><?php echo SELanguage::_get(3000268); ?></div>
        <table cellpadding='0' cellspacing='0'>
          <tr>
            <td><input type='radio' name='event_invite' id='event_invite_1' value='1'<?php if ($this->_tpl_vars['event']->event_info['event_invite']): ?> checked<?php endif; ?> /></td>
            <td><label for='event_invite_1'><?php echo SELanguage::_get(3000265); ?></label></td>
          </tr>
          <tr>
            <td><input type='radio' name='event_invite' id='event_invite_0' value='0'<?php if (! $this->_tpl_vars['event']->event_info['event_invite']): ?> checked<?php endif; ?> /></td>
            <td><label for='event_invite_0'><?php echo SELanguage::_get(3000266); ?></label></td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td colspan='2'>&nbsp;</td>
    </tr>
    
    <?php if (count($this->_tpl_vars['privacy_options']) > 1): ?>
    <tr>
      <td class='form1' width='120'><?php echo SELanguage::_get(3000125); ?></td>
      <td class='form2'>
        <div class='event_form_desc'><?php echo SELanguage::_get(3000126); ?></div>
        <table cellpadding='0' cellspacing='0'>
        <?php $_from = $this->_tpl_vars['privacy_options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['privacy_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['privacy_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
        $this->_foreach['privacy_loop']['iteration']++;
?>
          <tr>
            <td><input type='radio' name='event_privacy' id='privacy_<?php echo $this->_tpl_vars['k']; ?>
' value='<?php echo $this->_tpl_vars['k']; ?>
'<?php if ($this->_tpl_vars['event']->event_info['event_privacy'] == $this->_tpl_vars['k']): ?> checked<?php endif; ?> /></td>
            <td><label for='privacy_<?php echo $this->_tpl_vars['k']; ?>
'><?php echo SELanguage::_get($this->_tpl_vars['v']); ?></label></td>
          </tr>
        <?php endforeach; endif; unset($_from); ?>
        </table>
      </td>
    </tr>
  <?php endif; ?>
  
  
    <?php if (count($this->_tpl_vars['comment_options']) > 1): ?>
    <tr>
      <td class='form1' width='120'><?php echo SELanguage::_get(3000127); ?></td>
      <td class='form2'>
        <div class='event_form_desc'><?php echo SELanguage::_get(3000128); ?></div>
        <table cellpadding='0' cellspacing='0'>
        <?php $_from = $this->_tpl_vars['comment_options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['comment_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['comment_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
        $this->_foreach['comment_loop']['iteration']++;
?>
          <tr>
            <td><input type='radio' name='event_comments' id='event_comment_<?php echo $this->_tpl_vars['k']; ?>
' value='<?php echo $this->_tpl_vars['k']; ?>
'<?php if ($this->_tpl_vars['event']->event_info['event_comments'] == $this->_tpl_vars['k']): ?> checked<?php endif; ?> /></td>
            <td><label for='event_comment_<?php echo $this->_tpl_vars['k']; ?>
'><?php echo SELanguage::_get($this->_tpl_vars['v']); ?></label></td>
          </tr>
        <?php endforeach; endif; unset($_from); ?>
        </table>
      </td>
    </tr>
  <?php endif; ?>
  
  
    <?php if (count($this->_tpl_vars['upload_options']) > 1): ?>
    <tr>
      <td class='form1' width='120'><?php echo SELanguage::_get(3000129); ?></td>
      <td class='form2'>
        <div class='event_form_desc'><?php echo SELanguage::_get(3000130); ?></div>
        <table cellpadding='0' cellspacing='0'>
        <?php $_from = $this->_tpl_vars['upload_options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['upload_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['upload_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
        $this->_foreach['upload_loop']['iteration']++;
?>
          <tr>
            <td><input type='radio' name='event_upload' id='event_upload_<?php echo $this->_tpl_vars['k']; ?>
' value='<?php echo $this->_tpl_vars['k']; ?>
'<?php if ($this->_tpl_vars['event']->event_info['event_upload'] == $this->_tpl_vars['k']): ?> checked<?php endif; ?> /></td>
            <td><label for='event_upload_<?php echo $this->_tpl_vars['k']; ?>
'><?php echo SELanguage::_get($this->_tpl_vars['v']); ?></label></td>
          </tr>
        <?php endforeach; endif; unset($_from); ?>
        </table>
      </td>
    </tr>
  <?php endif; ?>
  
  
    <?php if (count($this->_tpl_vars['tag_options']) > 1): ?>
    <tr>
      <td class='form1' width='120'><?php echo SELanguage::_get(3000131); ?></td>
      <td class='form2'>
        <div class='event_form_desc'><?php echo SELanguage::_get(3000132); ?></div>
        <table cellpadding='0' cellspacing='0'>
        <?php $_from = $this->_tpl_vars['tag_options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['tag_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['tag_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
        $this->_foreach['tag_loop']['iteration']++;
?>
          <tr>
            <td><input type='radio' name='event_tag' id='event_tag_<?php echo $this->_tpl_vars['k']; ?>
' value='<?php echo $this->_tpl_vars['k']; ?>
'<?php if ($this->_tpl_vars['event']->event_info['event_tag'] == $this->_tpl_vars['k']): ?> checked<?php endif; ?> /></td>
            <td><label for='event_tag_<?php echo $this->_tpl_vars['k']; ?>
'><?php echo SELanguage::_get($this->_tpl_vars['v']); ?></label></td>
          </tr>
        <?php endforeach; endif; unset($_from); ?>
        </table>
      </td>
    </tr>
  <?php endif; ?>
  
</table>



<table cellpadding='0' cellspacing='0' style='margin-top: 10px;'>
  <tr>
    <td>
      <?php $this->assign('langBlockTemp', SE_Language::_get(3000133));


  ?><input type='submit' class='button' value='<?php echo $this->_tpl_vars['langBlockTemp']; ?>
' />&nbsp;<?php 

  ?>
      <input type='hidden' name='task' value='doadd'>
      </form>
    </td>
    <td>
      <form action='user_event.php' method='GET'>
      <?php $this->assign('langBlockTemp', SE_Language::_get(39));


  ?><input type='submit' class='button' value='<?php echo $this->_tpl_vars['langBlockTemp']; ?>
' /><?php 

  ?>
      </form>
    </td>
  </tr>
</table>
<br />
<br />

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>