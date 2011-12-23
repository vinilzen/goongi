<?php /* Smarty version 2.6.14, created on 2011-12-23 20:29:44
         compiled from user_event_edit.tpl */
?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'default', 'user_event_edit.tpl', 102, false),array('modifier', 'replace', 'user_event_edit.tpl', 183, false),array('modifier', 'count', 'user_event_edit.tpl', 185, false),)), $this);
?><?php
SELanguage::_preload_multi(3000136,3000086,3000137,3000138,3000001,3000139,191,861,3000080,3000081,3000082,3000083,3000084,3000085,3000093,3000097,3000153,3000154,3000219,3000286,3000287,3000288,3000289,3000290,3000094,175,39,3000110,3000111,3000114,3000113,3000115,3000116,173,3000169);
SELanguage::load();
?>﻿<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<h1><?php echo SELanguage::_get(3000136); ?></h1>
<div class="crumb">
	<a href="/">Главная</a>
	<a href='user_event.php'><?php echo SELanguage::_get(3000086); ?></a>
	<a href='event/<?php echo $this->_tpl_vars['event']->event_info['event_id']; ?>
/'><?php echo $this->_tpl_vars['event']->event_info['event_title']; ?>
</a>
	<span><?php echo SELanguage::_get(3000137); ?></span>
</div>


<ul class="vk">
	<li class="active"><a href='user_event_edit.php?event_id=<?php echo $this->_tpl_vars['event']->event_info['event_id']; ?>
'><?php echo SELanguage::_get(3000137); ?></a></li>
	<li><a href='user_event_edit_members.php?event_id=<?php echo $this->_tpl_vars['event']->event_info['event_id']; ?>
'><?php echo SELanguage::_get(3000138); ?></a></li>
	<li><a href='user_event_edit_settings.php?event_id=<?php echo $this->_tpl_vars['event']->event_info['event_id']; ?>
'><?php echo SELanguage::_get(3000001); ?></a></li>
</ul>

<?php if ($this->_tpl_vars['justadded']): ?>
  <table cellpadding='0' cellspacing='0'>
    <tr>
      <td class='result'>
        <img src='./images/success.gif' border='0' class='icon' />
        <?php echo SELanguage::_get(3000139); ?>
      </td>
    </tr>
  </table>
  <br />
<?php endif; 
 if ($this->_tpl_vars['result']): ?>
  <table cellpadding='0' cellspacing='0'>
    <tr>
      <td class='result'>
      <img src='./images/success.gif' border='0' class='icon' />
      <?php echo SELanguage::_get(191); ?>
      </td>
    </tr>
  </table>
  <br />
<?php endif; 
 if ($this->_tpl_vars['is_error']): ?>
  <table cellpadding='0' cellspacing='0'>
    <tr>
      <td class='result'>
        <img src='./images/error.gif' class='icon' border='0' />
        <?php echo SELanguage::_get($this->_tpl_vars['is_error']); ?>
      </td>
    </tr>
  </table>
  <br />
<?php endif; 
 
$javascript_lang_import_list = SELanguage::_javascript_redundancy_filter(array(861,3000080,3000081,3000082,3000083,3000084,3000085,3000093,3000097,3000153,3000154,3000219));
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
<script type="text/javascript" src="include/js/calendar.compat.js"></script>
<link rel="stylesheet" type="text/css" href="templates/styles_event_calendar.css" />
<script type="text/javascript">
  
  SocialEngine.Event = new SocialEngineAPI.Event(<?php echo $this->_tpl_vars['event']->event_generate_javascript_structure(); ?>
);
  SocialEngine.RegisterModule(SocialEngine.Event);
  
  // Delete redirect function
  function redirectOnDelete()
  {
    window.location.href = SocialEngine.URL.url_base + 'user_event.php';
  }
  
  <?php echo '
  var myCal1, myCal2;
  window.addEvent(\'domready\', function()
  {
    myCal1 = new Calendar({ event_date_start: \''; 
 echo ((is_array($_tmp=@$this->_tpl_vars['compatible_input_dateformat'])) ? $this->_run_mod_handler('default', true, $_tmp, 'm/d/Y') : smarty_modifier_default($_tmp, 'm/d/Y')); 
 echo '\' }, {
      classes: [\'se_event_calendar\'],
      '; 
 if (! $this->_tpl_vars['user']->level_info['level_event_backdate']): ?>direction: 1,<?php endif; 
 echo '
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
      '; 
 if (! $this->_tpl_vars['user']->level_info['level_event_backdate']): ?>direction: 1,<?php endif; 
 echo '
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
  '; ?>

  
</script>


<?php echo '
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
 echo $this->_tpl_vars['event']->event_info['event_eventcat_id']; 
 echo ') { optn.selected = true; }
      $(\'event_eventcat_id\').options.add(optn);
    }
    populateSubcats('; 
 echo $this->_tpl_vars['event']->event_info['event_eventcat_id']; 
 echo ');
  });
  '; 
 endif; 
 echo '

  function populateSubcats(event_eventcat_id) {
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
'; ?>



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

<div class="form">
<form action='user_event_edit.php?event_id=<?php echo $this->_tpl_vars['event']->event_info['event_id']; ?>
' method='post'>
	<div class="input">
		<label><?php echo SELanguage::_get(3000110); ?>*</label>
		<input type='text' class='text' name='event_title' value='<?php echo $this->_tpl_vars['event']->event_info['event_title']; ?>
' maxlength='100' size='30'></td>
	</div>
	
	<div class="input">	
		<label><?php echo SELanguage::_get(3000111); ?></label>
		<textarea rows='6' cols='50' name='event_desc'><?php echo $this->_tpl_vars['event']->event_info['event_desc']; ?>
</textarea></td>
	</div>
        
    <div class="input">	
		<label><?php echo SELanguage::_get(3000111); ?></label>
		<div class="se_event_calendar_container">
		  <input class="se_event_calendar" type="text" name="event_date_start" id="event_date_start" value="<?php echo $this->_tpl_vars['datetime']->cdate($this->_tpl_vars['compatible_input_dateformat'],$this->_tpl_vars['event_date_start_tz']); ?>
" />
		</div>
    </div>       
    <div class="input">	
	  <input style="width: 149px;margin-right: 6px;"  type="text" name="event_time_start" id="event_time_start" value="<?php echo $this->_tpl_vars['datetime']->cdate($this->_tpl_vars['compatible_input_timeformat'],$this->_tpl_vars['event_date_start_tz']); ?>
" />
	  <label for="event_date_start"><?php echo SELanguage::_get(3000114); ?></label>
	</div>
            
    <div class="input">	
	  <label><?php echo SELanguage::_get(3000113); ?></label>
		
		<div class="se_event_calendar_container">
		  <input class="se_event_calendar" type="text" name="event_date_end" id="event_date_end" value="<?php echo $this->_tpl_vars['datetime']->cdate($this->_tpl_vars['compatible_input_dateformat'],$this->_tpl_vars['event_date_end_tz']); ?>
" />
		</div>        
    </div>
	<div class="input">	
	  <input style="width: 149px;margin-right: 6px;" type="text" name="event_time_end" id="event_time_end" value="<?php echo $this->_tpl_vars['datetime']->cdate($this->_tpl_vars['compatible_input_timeformat'],$this->_tpl_vars['event_date_end_tz']); ?>
" />
	  <label for="event_time_end"><?php echo SELanguage::_get(3000114); ?></label>
	</div>

        
	<div class="input">	
		<label><?php echo SELanguage::_get(3000115); ?></label>
		<input type='text' class='text' name='event_host' value='<?php echo $this->_tpl_vars['event']->event_info['event_host']; ?>
' maxlength='250' size='30'></td>
	</div>
 <!-- <label><?php echo SELanguage::_get(3000116); ?></label><textarea rows='6' cols='50' name='event_location'><?php echo $this->_tpl_vars['event']->event_info['event_location']; ?>
</textarea> -->
	<div class="input">	
		<select name="event_eventcat_id" >
			<option value="1">События</option>
			<option value="2">Мероприятия</option>
		</select>
	</div>
	

<?php $this->assign('langBlockTemp', SE_Language::_get(173));


  ?>
<div class="button"><span class="button2"><span class="l">&nbsp;</span><span class="c">
	<input type='submit' class='button' value='<?php echo $this->_tpl_vars['langBlockTemp']; ?>
' /><input type='hidden' name='task' value='dosave' />
</span><span class="r">&nbsp;</span></span></div>
<?php 

  ?>
      
</form>
<br />
<form action='user_event.php' method='GET'>
	<?php $this->assign('langBlockTemp', SE_Language::_get(39));


  ?>
<div class="button"><span class="button2"><span class="l">&nbsp;</span><span class="c">
	<input type='submit' class='button' value='<?php echo $this->_tpl_vars['langBlockTemp']; ?>
' />
</span><span class="r">&nbsp;</span></span></div>
	<?php 

  ?>
</form>
<br />
<?php if ($this->_tpl_vars['event']->user_rank >= 2): ?>
  <a href='#' rel="<?php echo $this->_tpl_vars['event']->event_info['event_id']; ?>
" id="event_del">
	<?php echo SELanguage::_get(3000169); ?>
  </a>
<?php endif; ?>
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>