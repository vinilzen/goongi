<?php /* Smarty version 2.6.14, created on 2011-11-18 17:06:41
         compiled from admin_fields.tpl */
?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'replace', 'admin_fields.tpl', 157, false),)), $this);
?><?php
SELanguage::_preload_multi(106,107,108,109,110,111,112,113,114,989,115,116,117,118,119,120,121,122,123,124,125,990,992,991,993,994,995,1029,1030,1031,126,127,128,129,130,131,132,1099,1097,139,133,138,134,135,136,137);
SELanguage::load();
?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin_header_global.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 
 $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin_fields_js.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 
 echo '
<style type=\'text/css\'>

body {
	margin: 0px;
	padding: 10px;
	background-image: none;
}

body, td, div {
	color: #666666;
	font-family: "Trebuchet MS", arial, serif;
	font-size: 12px;
}

td {
	font-size: 11px;
}

.text {
	font-size: 12px;
	font-family: arial, verdana, serif;
}

textarea.text {
	font-family: arial, verdana, serif;
}

form {
	margin: 0px;
}

img.icon, input.checkbox {
	vertical-align: middle;
}

input.button {
	font-family: arial, verdana, serif;
	font-size: 11px;
	padding: 3px;
	color: #333333;
	font-weight: bold;
	background: #EEEEEE;
	vertical-align: middle;
	border-top: 1px solid #CCCCCC;
	border-left: 1px solid #CCCCCC;
	border-bottom: 1px solid #777777;
	border-right: 1px solid #777777;
	margin-right: 5px;
}

div.fielderror {
	font-weight: bold;
	color: #FF0000;
	text-align: left;
	padding: 7px 8px 7px 7px;
	background: #FFF3F3;
	margin-bottom: 7px;
}

</style>
'; 
 echo '
<script type="text/javascript">
<!-- 

var hideSearch = '; 
 if ($this->_tpl_vars['hideSearch'] == 1): ?>true<?php else: ?>false<?php endif; 
 echo ';
var hideDisplay = '; 
 if ($this->_tpl_vars['hideDisplay'] == 1): ?>true<?php else: ?>false<?php endif; 
 echo ';
var hideSpecial = '; 
 if ($this->_tpl_vars['hideSpecial'] == 1): ?>true<?php else: ?>false<?php endif; 
 echo ';

window.addEvent(\'domready\', function(){
    '; 
 echo $this->_tpl_vars['function']; 
 echo '
});
var categories = {'; 
 unset($this->_sections['cat_loop_js']);
$this->_sections['cat_loop_js']['name'] = 'cat_loop_js';
$this->_sections['cat_loop_js']['loop'] = is_array($_loop=$this->_tpl_vars['cats']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['cat_loop_js']['show'] = true;
$this->_sections['cat_loop_js']['max'] = $this->_sections['cat_loop_js']['loop'];
$this->_sections['cat_loop_js']['step'] = 1;
$this->_sections['cat_loop_js']['start'] = $this->_sections['cat_loop_js']['step'] > 0 ? 0 : $this->_sections['cat_loop_js']['loop']-1;
if ($this->_sections['cat_loop_js']['show']) {
    $this->_sections['cat_loop_js']['total'] = $this->_sections['cat_loop_js']['loop'];
    if ($this->_sections['cat_loop_js']['total'] == 0)
        $this->_sections['cat_loop_js']['show'] = false;
} else
    $this->_sections['cat_loop_js']['total'] = 0;
if ($this->_sections['cat_loop_js']['show']):

            for ($this->_sections['cat_loop_js']['index'] = $this->_sections['cat_loop_js']['start'], $this->_sections['cat_loop_js']['iteration'] = 1;
                 $this->_sections['cat_loop_js']['iteration'] <= $this->_sections['cat_loop_js']['total'];
                 $this->_sections['cat_loop_js']['index'] += $this->_sections['cat_loop_js']['step'], $this->_sections['cat_loop_js']['iteration']++):
$this->_sections['cat_loop_js']['rownum'] = $this->_sections['cat_loop_js']['iteration'];
$this->_sections['cat_loop_js']['index_prev'] = $this->_sections['cat_loop_js']['index'] - $this->_sections['cat_loop_js']['step'];
$this->_sections['cat_loop_js']['index_next'] = $this->_sections['cat_loop_js']['index'] + $this->_sections['cat_loop_js']['step'];
$this->_sections['cat_loop_js']['first']      = ($this->_sections['cat_loop_js']['iteration'] == 1);
$this->_sections['cat_loop_js']['last']       = ($this->_sections['cat_loop_js']['iteration'] == $this->_sections['cat_loop_js']['total']);
?>'<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop_js']['index']]['cat_id']; ?>
':<?php echo '{\'title\':\''; 
 echo SELanguage::_get($this->_tpl_vars['cats'][$this->_sections['cat_loop_js']['index']]['cat_title']); 
 echo '\', \'subcats\': {'; 
 unset($this->_sections['subcat_loop_js']);
$this->_sections['subcat_loop_js']['name'] = 'subcat_loop_js';
$this->_sections['subcat_loop_js']['loop'] = is_array($_loop=$this->_tpl_vars['cats'][$this->_sections['cat_loop_js']['index']]['subcats']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['subcat_loop_js']['show'] = true;
$this->_sections['subcat_loop_js']['max'] = $this->_sections['subcat_loop_js']['loop'];
$this->_sections['subcat_loop_js']['step'] = 1;
$this->_sections['subcat_loop_js']['start'] = $this->_sections['subcat_loop_js']['step'] > 0 ? 0 : $this->_sections['subcat_loop_js']['loop']-1;
if ($this->_sections['subcat_loop_js']['show']) {
    $this->_sections['subcat_loop_js']['total'] = $this->_sections['subcat_loop_js']['loop'];
    if ($this->_sections['subcat_loop_js']['total'] == 0)
        $this->_sections['subcat_loop_js']['show'] = false;
} else
    $this->_sections['subcat_loop_js']['total'] = 0;
if ($this->_sections['subcat_loop_js']['show']):

            for ($this->_sections['subcat_loop_js']['index'] = $this->_sections['subcat_loop_js']['start'], $this->_sections['subcat_loop_js']['iteration'] = 1;
                 $this->_sections['subcat_loop_js']['iteration'] <= $this->_sections['subcat_loop_js']['total'];
                 $this->_sections['subcat_loop_js']['index'] += $this->_sections['subcat_loop_js']['step'], $this->_sections['subcat_loop_js']['iteration']++):
$this->_sections['subcat_loop_js']['rownum'] = $this->_sections['subcat_loop_js']['iteration'];
$this->_sections['subcat_loop_js']['index_prev'] = $this->_sections['subcat_loop_js']['index'] - $this->_sections['subcat_loop_js']['step'];
$this->_sections['subcat_loop_js']['index_next'] = $this->_sections['subcat_loop_js']['index'] + $this->_sections['subcat_loop_js']['step'];
$this->_sections['subcat_loop_js']['first']      = ($this->_sections['subcat_loop_js']['iteration'] == 1);
$this->_sections['subcat_loop_js']['last']       = ($this->_sections['subcat_loop_js']['iteration'] == $this->_sections['subcat_loop_js']['total']);
?>'<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop_js']['index']]['subcats'][$this->_sections['subcat_loop_js']['index']]['subcat_id']; ?>
':'<?php echo SELanguage::_get($this->_tpl_vars['cats'][$this->_sections['cat_loop_js']['index']]['subcats'][$this->_sections['subcat_loop_js']['index']]['subcat_title']); ?>'<?php if ($this->_sections['subcat_loop_js']['last'] != TRUE): ?>,<?php endif; 
 endfor; endif; 
 echo '}}'; 
 if ($this->_sections['cat_loop_js']['last'] != TRUE): ?>,<?php endif; 
 endfor; endif; 
 echo '};
var cat_type = \''; 
 echo $this->_tpl_vars['cat_type']; 
 echo '\';
//-->
</script>
'; ?>


<div id='fielderror'></div>

<form action='admin_fields.php' id='fieldForm' method='POST' target='ajaxframe'>
<div style='margin-bottom: 3px;' id='field_title_div'>
<?php echo SELanguage::_get(106); ?><br>
<input type='text' class='text' name='field_title' id='field_title' autocomplete='off' size='30' maxlength='100'>
</div>

<div style='margin-bottom: 3px;' id='field_cat_id_div'>
<?php echo SELanguage::_get(107); ?><br>
<select name='field_cat_id' id='field_cat_id' class='text' onChange='changefieldcat(this.options[this.selectedIndex].value);'>
</select>
</div>

<div style='margin-bottom: 3px;' id='field_subcat_id_div'>
<?php echo SELanguage::_get(108); ?><br>
<select name='field_subcat_id' id='field_subcat_id' class='text'>
</select>
</div>

<div style='margin-bottom: 3px;' id='field_type_div'>
<?php echo SELanguage::_get(109); ?><br>
<select name='field_type' id='field_type' class='text' onChange='changefieldtype();'>
<option value=''></option>
<option value='1'><?php echo SELanguage::_get(110); ?></option>
<option value='2'><?php echo SELanguage::_get(111); ?></option>
<option value='3'><?php echo SELanguage::_get(112); ?></option>
<option value='4'><?php echo SELanguage::_get(113); ?></option>
<option value='5'><?php echo SELanguage::_get(114); ?></option>
<option value='6'><?php echo SELanguage::_get(989); ?></option>
</select>
</div>

<div style='margin-bottom: 3px;' id='field_style_div'>
<?php echo SELanguage::_get(115); ?><br>
<input type='text' class='text' name='field_style' id='field_style' size='30' maxlength='200'>
</div>

<div style='margin-bottom: 3px;' id='field_desc_div'>
<?php echo SELanguage::_get(116); ?><br>
<textarea name='field_desc' id='field_desc' rows='4' cols='40' class='text'></textarea>
</div>

<div style='margin-bottom: 3px;' id='field_error_div'>
<?php echo SELanguage::_get(117); ?><br>
<input type='text' class='text' name='field_error' id='field_error' size='30' maxlength='250'>
</div>

<div style='margin-bottom: 3px;' id='field_required_div'>
<?php echo SELanguage::_get(118); ?><br>
<select name='field_required' id='field_required' class='text'>
<option value='0'><?php echo SELanguage::_get(119); ?></option>
<option value='1'><?php echo SELanguage::_get(120); ?></option>
</select>
</div>

<div style='margin-bottom: 3px;' id='field_search_div'>
<?php echo SELanguage::_get(121); ?><br>
<select name='field_search' id='field_search' class='text'>
<option value='0'><?php echo SELanguage::_get(122); ?></option>
<option value='1'><?php echo SELanguage::_get(123); ?></option>
<option value='2'><?php echo SELanguage::_get(124); ?></option>
</select>
<?php ob_start(); 
 echo SELanguage::_get(125); 
 $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('tip', ob_get_contents());ob_end_clean(); ?>
<img src='../images/icons/tip.gif' border='0' class='Tips1' title='<?php echo ((is_array($_tmp=$this->_tpl_vars['tip'])) ? $this->_run_mod_handler('replace', true, $_tmp, "'", "&#039;") : smarty_modifier_replace($_tmp, "'", "&#039;")); ?>
'>
</div>

<div style='margin-bottom: 3px;' id='field_display_div'>
<?php echo SELanguage::_get(990); ?><br>
<select name='field_display' id='field_display' class='text'>
<option value='1'><?php echo SELanguage::_get(992); ?></option>
<option value='2'><?php echo SELanguage::_get(991); ?></option>
<option value='0'><?php echo SELanguage::_get(993); ?></option>
</select>
</div>

<div style='margin-bottom: 3px;' id='field_special_div'>
<?php echo SELanguage::_get(994); ?><br>
<select name='field_special' id='field_special' class='text'>
<option value='0'></option>
<option value='1'><?php echo SELanguage::_get(995); ?></option>
<option value='2'><?php echo SELanguage::_get(1029); ?></option>
<option value='3'><?php echo SELanguage::_get(1030); ?></option>
</select>
<?php ob_start(); 
 echo SELanguage::_get(1031); 
 $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('tip', ob_get_contents());ob_end_clean(); ?>
<img src='../images/icons/tip.gif' border='0' class='Tips1' title='<?php echo ((is_array($_tmp=$this->_tpl_vars['tip'])) ? $this->_run_mod_handler('replace', true, $_tmp, "'", "&#039;") : smarty_modifier_replace($_tmp, "'", "&#039;")); ?>
'>
</div>

<div style='margin-bottom: 3px;' id='field_html_div'>
<?php echo SELanguage::_get(126); ?><br>
<input type='text' name='field_html' id='field_html' maxlength='200' size='30' class='text'>
<?php ob_start(); 
 echo SELanguage::_get(127); 
 $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('tip', ob_get_contents());ob_end_clean(); ?>
<img src='../images/icons/tip.gif' border='0' class='Tips1' title='<?php echo ((is_array($_tmp=$this->_tpl_vars['tip'])) ? $this->_run_mod_handler('replace', true, $_tmp, "'", "&#039;") : smarty_modifier_replace($_tmp, "'", "&#039;")); ?>
'>
</div>

<div style='margin-bottom: 3px;' id='field_maxlength_div'>
<?php echo SELanguage::_get(128); ?><br>
<select name='field_maxlength' id='field_maxlength' class='text'>
<option value='30'>30</option>
<option value='50'>50</option>
<option value='100'>100</option>
<option value='150'>150</option>
<option value='200'>200</option>
<option value='250'>250</option>
</select>
</div>

<div style='margin-bottom: 3px;' id='field_link_div'>
<?php echo SELanguage::_get(129); ?><br>
<input type='text' class='text' name='field_link' id='field_link' size='30' maxlength='250'>
<?php ob_start(); 
 echo SELanguage::_get(130); 
 $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('tip', ob_get_contents());ob_end_clean(); ?>
<img src='../images/icons/tip.gif' border='0' class='Tips1' title='<?php echo ((is_array($_tmp=$this->_tpl_vars['tip'])) ? $this->_run_mod_handler('replace', true, $_tmp, "'", "&#039;") : smarty_modifier_replace($_tmp, "'", "&#039;")); ?>
'>
</div>

<div style='margin-bottom: 3px;' id='field_regex_div'>
<?php echo SELanguage::_get(131); ?><br>
<input type='text' class='text' name='field_regex' id='field_regex' size='30' maxlength='250'>
<?php ob_start(); 
 echo SELanguage::_get(132); 
 $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('tip', ob_get_contents());ob_end_clean(); ?>
<img src='../images/icons/tip.gif' border='0' class='Tips1' title='<?php echo ((is_array($_tmp=$this->_tpl_vars['tip'])) ? $this->_run_mod_handler('replace', true, $_tmp, "'", "&#039;") : smarty_modifier_replace($_tmp, "'", "&#039;")); ?>
'>
</div>

<div style='margin-bottom: 3px;' id='field_suggestions_div'>
<?php ob_start(); 
 echo SELanguage::_get(1099); 
 $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('tip', ob_get_contents());ob_end_clean(); 
 echo SELanguage::_get(1097); ?> <img src='../images/icons/tip.gif' border='0' class='Tips1' title='<?php echo ((is_array($_tmp=$this->_tpl_vars['tip'])) ? $this->_run_mod_handler('replace', true, $_tmp, "'", "&#039;") : smarty_modifier_replace($_tmp, "'", "&#039;")); ?>
'><br>
<textarea name='field_suggestions' id='field_suggestions' rows='4' cols='40' class='text'></textarea>
</div>

<div style='margin-bottom: 3px;' id='field_options_div'>
<?php ob_start(); 
 echo SELanguage::_get(139); 
 $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('tip', ob_get_contents());ob_end_clean(); 
 echo SELanguage::_get(133); ?> <img src='../images/icons/tip.gif' border='0' class='Tips1' title='<?php echo ((is_array($_tmp=$this->_tpl_vars['tip'])) ? $this->_run_mod_handler('replace', true, $_tmp, "'", "&#039;") : smarty_modifier_replace($_tmp, "'", "&#039;")); ?>
'><br>
<table cellpadding='0' cellspacing='0'>
<tr>
<td style='width: 47px;'><?php echo SELanguage::_get(138); ?></td>
<td style='width: 135px;'><?php echo SELanguage::_get(134); ?></td>
<td style='width: 137px;' id='field_dependency_div'><?php echo SELanguage::_get(135); ?></td>
<td style='width: 150px;' id='field_dependent_label_div'><?php echo SELanguage::_get(136); ?></td>
</tr>
</table>
<p id='field_options' style='margin: 0px;'></p>
<div style='font-size: 11px;'><a href="javascript:addOptions('', '', '0', '', '')"><?php echo SELanguage::_get(137); ?></a></div>
</div>

<br>

<div style='margin-bottom: 3px;' id='submitButtons'></div>

<input type='hidden' name='task' id='task' value=''>
<input type='hidden' name='field_id' id='field_id' value=''>
<input type='hidden' name='type' value='<?php echo $this->_tpl_vars['cat_type']; ?>
'>
</form>



</body>
</html>