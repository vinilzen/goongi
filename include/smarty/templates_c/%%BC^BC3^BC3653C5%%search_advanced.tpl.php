<?php /* Smarty version 2.6.14, created on 2011-11-02 11:48:35
         compiled from search_advanced.tpl */
?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'search_advanced.tpl', 39, false),array('modifier', 'date_format', 'search_advanced.tpl', 125, false),array('modifier', 'in_array', 'search_advanced.tpl', 165, false),array('modifier', 'truncate', 'search_advanced.tpl', 239, false),array('function', 'math', 'search_advanced.tpl', 125, false),array('function', 'cycle', 'search_advanced.tpl', 242, false),)), $this);
?><?php
SELanguage::_preload_multi(1087,1088,1083,1084,1114,1089,736,1116,1117,1091,1092,1093,1094,1095,1096,1122,1121,1090,1085,182,184,185,183,509,1086);
SELanguage::load();
?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 
 if ($this->_tpl_vars['showfields'] == 1): ?>
  <img src='./images/icons/search48.gif' border='0' class='icon_big'>
  <div class='page_header'><?php echo SELanguage::_get(1087); ?></div>
  <div><?php echo SELanguage::_get(1088); ?></div>
<?php elseif ($this->_tpl_vars['showfields'] == 0): ?>
  <img src='./images/icons/search48.gif' border='0' class='icon_big'>
  <div class='page_header'><?php echo sprintf(SELanguage::_get(1083), ($this->_tpl_vars['linked_field_title']).": ".($this->_tpl_vars['linked_field_value'])); ?></div>
  <div><?php echo sprintf(SELanguage::_get(1084), $this->_tpl_vars['total_users'], ($this->_tpl_vars['linked_field_title']).": ".($this->_tpl_vars['linked_field_value'])); ?></div>
<?php endif; ?>

<br><br>

<table cellpadding='0' cellspacing='0' width='100%'>
<tr>
<td style='width: 200px; vertical-align: top;'>

<?php if ($this->_tpl_vars['showfields'] == 1): ?>

    <?php if ($this->_tpl_vars['cats_menu'] == NULL): ?>
    <br>
    <table cellpadding='0' cellspacing='0' align='center'>
    <tr><td class='result'><img src='./images/icons/bulb22.gif' border='0' class='icon'> <?php echo SELanguage::_get(1114); ?></td></tr>
    </table>

  <?php else: ?>

    <form action='search_advanced.php' method='post'>
    <div class='header'><?php echo SELanguage::_get(1089); ?></div>
    <div class='browse_fields'>

            <?php if (count($this->_tpl_vars['cats_menu']) > 0): ?>
	<div style='padding-top: 5px;'>
          <select name='categories' class='text' onChange="location.href='search_advanced.php?cat_selected='+this.options[this.selectedIndex].value;">
          <?php unset($this->_sections['cat_menu_loop']);
$this->_sections['cat_menu_loop']['name'] = 'cat_menu_loop';
$this->_sections['cat_menu_loop']['loop'] = is_array($_loop=$this->_tpl_vars['cats_menu']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['cat_menu_loop']['show'] = true;
$this->_sections['cat_menu_loop']['max'] = $this->_sections['cat_menu_loop']['loop'];
$this->_sections['cat_menu_loop']['step'] = 1;
$this->_sections['cat_menu_loop']['start'] = $this->_sections['cat_menu_loop']['step'] > 0 ? 0 : $this->_sections['cat_menu_loop']['loop']-1;
if ($this->_sections['cat_menu_loop']['show']) {
    $this->_sections['cat_menu_loop']['total'] = $this->_sections['cat_menu_loop']['loop'];
    if ($this->_sections['cat_menu_loop']['total'] == 0)
        $this->_sections['cat_menu_loop']['show'] = false;
} else
    $this->_sections['cat_menu_loop']['total'] = 0;
if ($this->_sections['cat_menu_loop']['show']):

            for ($this->_sections['cat_menu_loop']['index'] = $this->_sections['cat_menu_loop']['start'], $this->_sections['cat_menu_loop']['iteration'] = 1;
                 $this->_sections['cat_menu_loop']['iteration'] <= $this->_sections['cat_menu_loop']['total'];
                 $this->_sections['cat_menu_loop']['index'] += $this->_sections['cat_menu_loop']['step'], $this->_sections['cat_menu_loop']['iteration']++):
$this->_sections['cat_menu_loop']['rownum'] = $this->_sections['cat_menu_loop']['iteration'];
$this->_sections['cat_menu_loop']['index_prev'] = $this->_sections['cat_menu_loop']['index'] - $this->_sections['cat_menu_loop']['step'];
$this->_sections['cat_menu_loop']['index_next'] = $this->_sections['cat_menu_loop']['index'] + $this->_sections['cat_menu_loop']['step'];
$this->_sections['cat_menu_loop']['first']      = ($this->_sections['cat_menu_loop']['iteration'] == 1);
$this->_sections['cat_menu_loop']['last']       = ($this->_sections['cat_menu_loop']['iteration'] == $this->_sections['cat_menu_loop']['total']);
?>
            <option value='<?php echo $this->_tpl_vars['cats_menu'][$this->_sections['cat_menu_loop']['index']]['cat_id']; ?>
'<?php if ($this->_tpl_vars['cats_menu'][$this->_sections['cat_menu_loop']['index']]['cat_id'] == $this->_tpl_vars['cat_selected']): ?> selected='selected'<?php endif; ?>><?php echo SELanguage::_get($this->_tpl_vars['cats_menu'][$this->_sections['cat_menu_loop']['index']]['cat_title']); ?></option>
          <?php endfor; endif; ?>
          </select>
	</div>
      <?php endif; ?>

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
      <?php unset($this->_sections['field_loop']);
$this->_sections['field_loop']['name'] = 'field_loop';
$this->_sections['field_loop']['loop'] = is_array($_loop=$this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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

        <div>

          <div style='font-weight: bold; margin-top: 5px;'><?php echo SELanguage::_get($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_title']); 
 if ($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_special'] == 1): ?> <?php echo SELanguage::_get(736); 
 endif; ?></div>

                    <?php if ($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_type'] == 1 || $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_type'] == 2): ?>

	    	    <?php if ($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_search'] == 2): ?>
	      <input type='text' class='text' size='5' name='field_<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_id']; ?>
_min' value='<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_value_min']; ?>
' maxlength='100'>
	      - 
	      <input type='text' class='text' size='5' name='field_<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_id']; ?>
_max' value='<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_value_max']; ?>
' maxlength='100'>	  

	    	    <?php else: ?>
              <input type='text' class='text' size='15' name='field_<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_id']; ?>
' value='<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_value']; ?>
' maxlength='100'>
	    <?php endif; ?>

		  		  <?php elseif ($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_type'] == 4): ?>
              <?php unset($this->_sections['option_loop']);
$this->_sections['option_loop']['name'] = 'option_loop';
$this->_sections['option_loop']['loop'] = is_array($_loop=$this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
			  <input type="radio" name="field_<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_id']; ?>
"
			    id="radio_<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_id']; ?>
_<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['value']; ?>
"
				value='<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['value']; ?>
'
				<?php if ($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['value'] == $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_value']): ?>
					checked="true"<?php endif; ?>
				>
			  <label for="radio_<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_id']; ?>
_<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['value']; ?>
">
               <?php echo SELanguage::_get($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['label']); ?>
			  </label><br>
              <?php endfor; endif; ?>


                    <?php elseif ($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_type'] == 3): ?>

	    	    <?php if ($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_search'] == 2): ?>
              <select name='field_<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_id']; ?>
_min'>
              <option value='-1'></option>
              <?php unset($this->_sections['option_loop']);
$this->_sections['option_loop']['name'] = 'option_loop';
$this->_sections['option_loop']['loop'] = is_array($_loop=$this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                <option value='<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['value']; ?>
'<?php if ($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['value'] == $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_value_min']): ?> SELECTED<?php endif; ?>><?php echo SELanguage::_get($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['label']); ?></option>
              <?php endfor; endif; ?>
              </select>
	      - 
              <select name='field_<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_id']; ?>
_max'>
              <option value='-1'></option>
              <?php unset($this->_sections['option_loop']);
$this->_sections['option_loop']['name'] = 'option_loop';
$this->_sections['option_loop']['loop'] = is_array($_loop=$this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                <option value='<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['value']; ?>
'<?php if ($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['value'] == $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_value_max']): ?> SELECTED<?php endif; ?>><?php echo SELanguage::_get($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['label']); ?></option>
              <?php endfor; endif; ?>
              </select>

	    	    <?php else: ?>
              <select name='field_<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_id']; ?>
'>
              <option value='-1'></option>
              <?php unset($this->_sections['option_loop']);
$this->_sections['option_loop']['name'] = 'option_loop';
$this->_sections['option_loop']['loop'] = is_array($_loop=$this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                <option value='<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['value']; ?>
'<?php if ($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['value'] == $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_value']): ?> SELECTED<?php endif; ?>><?php echo SELanguage::_get($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['label']); ?></option>
              <?php endfor; endif; ?>
              </select>
	    <?php endif; ?>


                    <?php elseif ($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_type'] == 5): ?>


	    	    <?php if ($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_special'] == 1): ?>
              <select name='field_<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_id']; ?>
_3_min'>
              <?php unset($this->_sections['date3_min']);
$this->_sections['date3_min']['name'] = 'date3_min';
$this->_sections['date3_min']['loop'] = is_array($_loop=$this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['date_array3']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['date3_min']['show'] = true;
$this->_sections['date3_min']['max'] = $this->_sections['date3_min']['loop'];
$this->_sections['date3_min']['step'] = 1;
$this->_sections['date3_min']['start'] = $this->_sections['date3_min']['step'] > 0 ? 0 : $this->_sections['date3_min']['loop']-1;
if ($this->_sections['date3_min']['show']) {
    $this->_sections['date3_min']['total'] = $this->_sections['date3_min']['loop'];
    if ($this->_sections['date3_min']['total'] == 0)
        $this->_sections['date3_min']['show'] = false;
} else
    $this->_sections['date3_min']['total'] = 0;
if ($this->_sections['date3_min']['show']):

            for ($this->_sections['date3_min']['index'] = $this->_sections['date3_min']['start'], $this->_sections['date3_min']['iteration'] = 1;
                 $this->_sections['date3_min']['iteration'] <= $this->_sections['date3_min']['total'];
                 $this->_sections['date3_min']['index'] += $this->_sections['date3_min']['step'], $this->_sections['date3_min']['iteration']++):
$this->_sections['date3_min']['rownum'] = $this->_sections['date3_min']['iteration'];
$this->_sections['date3_min']['index_prev'] = $this->_sections['date3_min']['index'] - $this->_sections['date3_min']['step'];
$this->_sections['date3_min']['index_next'] = $this->_sections['date3_min']['index'] + $this->_sections['date3_min']['step'];
$this->_sections['date3_min']['first']      = ($this->_sections['date3_min']['iteration'] == 1);
$this->_sections['date3_min']['last']       = ($this->_sections['date3_min']['iteration'] == $this->_sections['date3_min']['total']);
?>
                <option value='<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['date_array3'][$this->_sections['date3_min']['index']]['value']; ?>
'<?php if ($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_value_min'] == $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['date_array3'][$this->_sections['date3_min']['index']]['value']): ?> SELECTED<?php endif; ?>><?php if ($this->_sections['date3_min']['first']): ?>[ <?php echo SELanguage::_get(1116); ?> ]<?php else: 
 echo smarty_function_math(array('equation' => 'x-y','x' => ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y") : smarty_modifier_date_format($_tmp, "%Y")),'y' => $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['date_array3'][$this->_sections['date3_min']['index']]['name']), $this);
 endif; ?></option>
              <?php endfor; endif; ?>
              </select>
	      -
              <select name='field_<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_id']; ?>
_3_max'>
              <?php unset($this->_sections['date3_max']);
$this->_sections['date3_max']['name'] = 'date3_max';
$this->_sections['date3_max']['loop'] = is_array($_loop=$this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['date_array3']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['date3_max']['show'] = true;
$this->_sections['date3_max']['max'] = $this->_sections['date3_max']['loop'];
$this->_sections['date3_max']['step'] = 1;
$this->_sections['date3_max']['start'] = $this->_sections['date3_max']['step'] > 0 ? 0 : $this->_sections['date3_max']['loop']-1;
if ($this->_sections['date3_max']['show']) {
    $this->_sections['date3_max']['total'] = $this->_sections['date3_max']['loop'];
    if ($this->_sections['date3_max']['total'] == 0)
        $this->_sections['date3_max']['show'] = false;
} else
    $this->_sections['date3_max']['total'] = 0;
if ($this->_sections['date3_max']['show']):

            for ($this->_sections['date3_max']['index'] = $this->_sections['date3_max']['start'], $this->_sections['date3_max']['iteration'] = 1;
                 $this->_sections['date3_max']['iteration'] <= $this->_sections['date3_max']['total'];
                 $this->_sections['date3_max']['index'] += $this->_sections['date3_max']['step'], $this->_sections['date3_max']['iteration']++):
$this->_sections['date3_max']['rownum'] = $this->_sections['date3_max']['iteration'];
$this->_sections['date3_max']['index_prev'] = $this->_sections['date3_max']['index'] - $this->_sections['date3_max']['step'];
$this->_sections['date3_max']['index_next'] = $this->_sections['date3_max']['index'] + $this->_sections['date3_max']['step'];
$this->_sections['date3_max']['first']      = ($this->_sections['date3_max']['iteration'] == 1);
$this->_sections['date3_max']['last']       = ($this->_sections['date3_max']['iteration'] == $this->_sections['date3_max']['total']);
?>
                <option value='<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['date_array3'][$this->_sections['date3_max']['index']]['value']; ?>
'<?php if ($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_value_max'] == $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['date_array3'][$this->_sections['date3_max']['index']]['value']): ?> SELECTED<?php endif; ?>><?php if ($this->_sections['date3_max']['first']): ?>[ <?php echo SELanguage::_get(1117); ?> ]<?php else: 
 echo smarty_function_math(array('equation' => 'x-y','x' => ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y") : smarty_modifier_date_format($_tmp, "%Y")),'y' => $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['date_array3'][$this->_sections['date3_max']['index']]['name']), $this);
 endif; ?></option>
              <?php endfor; endif; ?>
              </select>


	    	    <?php else: ?>
              <select name='field_<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_id']; ?>
_1'>
              <?php unset($this->_sections['date1']);
$this->_sections['date1']['name'] = 'date1';
$this->_sections['date1']['loop'] = is_array($_loop=$this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['date_array1']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                <option value='<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['date_array1'][$this->_sections['date1']['index']]['value']; ?>
'<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['date_array1'][$this->_sections['date1']['index']]['selected']; ?>
><?php if ($this->_sections['date1']['first']): 
 echo SELanguage::_get($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['date_array1'][$this->_sections['date1']['index']]['name']); 
 else: 
 echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['date_array1'][$this->_sections['date1']['index']]['name']; 
 endif; ?></option>
              <?php endfor; endif; ?>
              </select>

              <select name='field_<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_id']; ?>
_2'>
              <?php unset($this->_sections['date2']);
$this->_sections['date2']['name'] = 'date2';
$this->_sections['date2']['loop'] = is_array($_loop=$this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['date_array2']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                <option value='<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['date_array2'][$this->_sections['date2']['index']]['value']; ?>
'<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['date_array2'][$this->_sections['date2']['index']]['selected']; ?>
><?php if ($this->_sections['date2']['first']): 
 echo SELanguage::_get($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['date_array2'][$this->_sections['date2']['index']]['name']); 
 else: 
 echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['date_array2'][$this->_sections['date2']['index']]['name']; 
 endif; ?></option>
              <?php endfor; endif; ?>
              </select>

              <select name='field_<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_id']; ?>
_3'>
              <?php unset($this->_sections['date3']);
$this->_sections['date3']['name'] = 'date3';
$this->_sections['date3']['loop'] = is_array($_loop=$this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['date_array3']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                <option value='<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['date_array3'][$this->_sections['date3']['index']]['value']; ?>
'<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['date_array3'][$this->_sections['date3']['index']]['selected']; ?>
><?php if ($this->_sections['date3']['first']): 
 echo SELanguage::_get($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['date_array3'][$this->_sections['date3']['index']]['name']); 
 else: 
 echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['date_array3'][$this->_sections['date3']['index']]['name']; 
 endif; ?></option>
              <?php endfor; endif; ?>
              </select>
	    <?php endif; ?>


                    <?php elseif ($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_type'] == 6): ?>
    
                        <?php unset($this->_sections['option_loop']);
$this->_sections['option_loop']['name'] = 'option_loop';
$this->_sections['option_loop']['loop'] = is_array($_loop=$this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
              <table cellpadding='0' cellspacing='0'>
	      <tr>
	      <td><input type='checkbox' name='field_<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_id']; ?>
[]' id='label_<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_id']; ?>
_<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['value']; ?>
' value='<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['value']; ?>
'<?php if (((is_array($_tmp=$this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['value'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_value']) : in_array($_tmp, $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_value']))): ?> checked='checked'<?php endif; ?> style='vertical-align: middle;'></td>
	      <td><label for='label_<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_id']; ?>
_<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['value']; ?>
'><?php echo SELanguage::_get($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['label']); ?></label></td>
	      </tr>
	      </table>
            <?php endfor; endif; ?>

          <?php endif; ?>

      </div>
      <?php endfor; endif; ?>
      <?php endfor; endif; ?>
      <?php endfor; endif; ?>

            <div>
	<div style='padding-top: 5px;'>
	  <b><?php echo SELanguage::_get(1091); ?></b><br>
          <select name='sort' class='small'>
          <option value='user_dateupdated DESC'<?php if ($this->_tpl_vars['sort'] == 'user_dateupdated DESC'): ?> SELECTED<?php endif; ?>><?php echo SELanguage::_get(1092); ?> <?php echo SELanguage::_get(1093); ?></option>
          <option value='user_dateupdated ASC'<?php if ($this->_tpl_vars['sort'] == 'user_dateupdated ASC'): ?> SELECTED<?php endif; ?>><?php echo SELanguage::_get(1092); ?> <?php echo SELanguage::_get(1094); ?></option>
          <option value='user_lastlogindate DESC'<?php if ($this->_tpl_vars['sort'] == 'user_lastlogindate DESC'): ?> SELECTED<?php endif; ?>><?php echo SELanguage::_get(1095); ?> <?php echo SELanguage::_get(1093); ?></option>
          <option value='user_lastlogindate ASC'<?php if ($this->_tpl_vars['sort'] == 'user_lastlogindate ASC'): ?> SELECTED<?php endif; ?>><?php echo SELanguage::_get(1095); ?> <?php echo SELanguage::_get(1094); ?></option>
          <option value='user_signupdate DESC'<?php if ($this->_tpl_vars['sort'] == 'user_signupdate DESC'): ?> SELECTED<?php endif; ?>><?php echo SELanguage::_get(1096); ?> <?php echo SELanguage::_get(1093); ?></option>
          <option value='user_signupdate ASC'<?php if ($this->_tpl_vars['sort'] == 'user_signupdate ASC'): ?> SELECTED<?php endif; ?>><?php echo SELanguage::_get(1096); ?> <?php echo SELanguage::_get(1094); ?></option>
          </select>
	  <table cellpadding='0' cellspacing='0' style='padding-top: 5px;'>
	  <tr><td><input type='checkbox' name='user_withphoto' id='user_withphoto' value='1'<?php if ($this->_tpl_vars['user_withphoto'] == 1): ?> checked='checked'<?php endif; ?>></td><td><label for='user_withphoto'><?php echo SELanguage::_get(1122); ?></label></td></tr>
	  <tr><td><input type='checkbox' name='user_online' id='user_online' value='1'<?php if ($this->_tpl_vars['user_online'] == 1): ?> checked='checked'<?php endif; ?>></td><td><label for='user_online'><?php echo SELanguage::_get(1121); ?></label></td></tr>
	  </table>
	</div>
        <div style='padding-top: 10px; padding-bottom: 5px;'>
          <input type='submit' class='button' value='<?php echo SELanguage::_get(1090); ?>'>&nbsp;&nbsp;
          <input type='hidden' name='task' value='dosearch'>
          <input type='hidden' name='cat_selected' value='<?php echo $this->_tpl_vars['cat_selected']; ?>
'>
	</div>
      </div>
      </form>
  <?php endif; 
 endif; ?>



</td>
<td style='padding-left: 10px;' valign='top'>



<?php if ($this->_tpl_vars['total_users'] == 0 && ( $this->_tpl_vars['showfields'] == 0 || $this->_tpl_vars['cats_menu'] != NULL )): ?>
  <br>
  <table cellpadding='0' cellspacing='0' align='center'>
  <tr><td class='result'><img src='./images/icons/bulb22.gif' border='0' class='icon'> <?php echo SELanguage::_get(1085); ?></td></tr>
  </table>


<?php elseif ($this->_tpl_vars['total_users'] != 0): ?>

    <?php if ($this->_tpl_vars['maxpage'] > 1): ?>
    <div class='browse_pages'>
      <?php if ($this->_tpl_vars['p'] != 1): ?><a href='search_advanced.php?<?php echo $this->_tpl_vars['url_string']; ?>
cat_selected=<?php echo $this->_tpl_vars['cat_selected']; ?>
&task=<?php echo $this->_tpl_vars['task']; ?>
&sort=<?php echo $this->_tpl_vars['sort']; ?>
&user_online=<?php echo $this->_tpl_vars['user_online']; ?>
&user_withphoto=<?php echo $this->_tpl_vars['user_withphoto']; ?>
&p=<?php echo smarty_function_math(array('equation' => 'p-1','p' => $this->_tpl_vars['p']), $this);?>
'>&#171; <?php echo SELanguage::_get(182); ?></a><?php else: ?><font class='disabled'>&#171; <?php echo SELanguage::_get(182); ?></font><?php endif; ?>
      <?php if ($this->_tpl_vars['p_start'] == $this->_tpl_vars['p_end']): ?>
        &nbsp;|&nbsp; <?php echo sprintf(SELanguage::_get(184), $this->_tpl_vars['p_start'], $this->_tpl_vars['total_users']); ?> &nbsp;|&nbsp; 
      <?php else: ?>
        &nbsp;|&nbsp; <?php echo sprintf(SELanguage::_get(185), $this->_tpl_vars['p_start'], $this->_tpl_vars['p_end'], $this->_tpl_vars['total_users']); ?> &nbsp;|&nbsp; 
      <?php endif; ?>
      <?php if ($this->_tpl_vars['p'] != $this->_tpl_vars['maxpage']): ?><a href='search_advanced.php?<?php echo $this->_tpl_vars['url_string']; ?>
cat_selected=<?php echo $this->_tpl_vars['cat_selected']; ?>
&task=<?php echo $this->_tpl_vars['task']; ?>
&sort=<?php echo $this->_tpl_vars['sort']; ?>
&user_online=<?php echo $this->_tpl_vars['user_online']; ?>
&user_withphoto=<?php echo $this->_tpl_vars['user_withphoto']; ?>
&p=<?php echo smarty_function_math(array('equation' => 'p+1','p' => $this->_tpl_vars['p']), $this);?>
'><?php echo SELanguage::_get(183); ?> &#187;</a><?php else: ?><font class='disabled'><?php echo SELanguage::_get(183); ?> &#187;</font><?php endif; ?>
    </div>
  <?php endif; ?>

    <?php unset($this->_sections['user_loop']);
$this->_sections['user_loop']['name'] = 'user_loop';
$this->_sections['user_loop']['loop'] = is_array($_loop=$this->_tpl_vars['users']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['user_loop']['show'] = true;
$this->_sections['user_loop']['max'] = $this->_sections['user_loop']['loop'];
$this->_sections['user_loop']['step'] = 1;
$this->_sections['user_loop']['start'] = $this->_sections['user_loop']['step'] > 0 ? 0 : $this->_sections['user_loop']['loop']-1;
if ($this->_sections['user_loop']['show']) {
    $this->_sections['user_loop']['total'] = $this->_sections['user_loop']['loop'];
    if ($this->_sections['user_loop']['total'] == 0)
        $this->_sections['user_loop']['show'] = false;
} else
    $this->_sections['user_loop']['total'] = 0;
if ($this->_sections['user_loop']['show']):

            for ($this->_sections['user_loop']['index'] = $this->_sections['user_loop']['start'], $this->_sections['user_loop']['iteration'] = 1;
                 $this->_sections['user_loop']['iteration'] <= $this->_sections['user_loop']['total'];
                 $this->_sections['user_loop']['index'] += $this->_sections['user_loop']['step'], $this->_sections['user_loop']['iteration']++):
$this->_sections['user_loop']['rownum'] = $this->_sections['user_loop']['iteration'];
$this->_sections['user_loop']['index_prev'] = $this->_sections['user_loop']['index'] - $this->_sections['user_loop']['step'];
$this->_sections['user_loop']['index_next'] = $this->_sections['user_loop']['index'] + $this->_sections['user_loop']['step'];
$this->_sections['user_loop']['first']      = ($this->_sections['user_loop']['iteration'] == 1);
$this->_sections['user_loop']['last']       = ($this->_sections['user_loop']['iteration'] == $this->_sections['user_loop']['total']);
?>
    <div class='browse_result' style='float: left; padding: 5px; width: 100px; height: 100px; text-align: center;'>
      <a href='<?php echo $this->_tpl_vars['url']->url_create('profile',$this->_tpl_vars['users'][$this->_sections['user_loop']['index']]->user_info['user_username']); ?>
'><img src='<?php echo $this->_tpl_vars['users'][$this->_sections['user_loop']['index']]->user_photo('./images/nophoto.gif','TRUE'); ?>
' class='photo' style='display: block; margin-left: auto; margin-right: auto;' width='60' height='60' border='0' alt="<?php echo sprintf(SELanguage::_get(509), $this->_tpl_vars['users'][$this->_sections['user_loop']['index']]->user_displayname_short); ?>"><?php echo ((is_array($_tmp=$this->_tpl_vars['users'][$this->_sections['user_loop']['index']]->user_displayname)) ? $this->_run_mod_handler('truncate', true, $_tmp, 20, "...", true) : smarty_modifier_truncate($_tmp, 20, "...", true)); ?>
</a>
      <?php if ($this->_tpl_vars['users'][$this->_sections['user_loop']['index']]->is_online == 1): ?><div style='margin-top: 3px;'><img src='./images/icons/online16.gif' border='0' class='icon2'><?php echo SELanguage::_get(1086); ?></div><?php endif; ?>
    </div>
    <?php echo smarty_function_cycle(array('name' => 'newrow','values' => ",,,,,<div style='clear: both; margin-top: 10px;'>&nbsp;</div>"), $this);?>

  <?php endfor; endif; ?>
  <div style='clear: both;'></div>

    <?php if ($this->_tpl_vars['maxpage'] > 1): ?>
    <div class='browse_pages'>
      <?php if ($this->_tpl_vars['p'] != 1): ?><a href='search_advanced.php?<?php echo $this->_tpl_vars['url_string']; ?>
cat_selected=<?php echo $this->_tpl_vars['cat_selected']; ?>
&task=<?php echo $this->_tpl_vars['task']; ?>
&sort=<?php echo $this->_tpl_vars['sort']; ?>
&user_online=<?php echo $this->_tpl_vars['user_online']; ?>
&user_withphoto=<?php echo $this->_tpl_vars['user_withphoto']; ?>
&p=<?php echo smarty_function_math(array('equation' => 'p-1','p' => $this->_tpl_vars['p']), $this);?>
'>&#171; <?php echo SELanguage::_get(182); ?></a><?php else: ?><font class='disabled'>&#171; <?php echo SELanguage::_get(182); ?></font><?php endif; ?>
      <?php if ($this->_tpl_vars['p_start'] == $this->_tpl_vars['p_end']): ?>
        &nbsp;|&nbsp; <?php echo sprintf(SELanguage::_get(184), $this->_tpl_vars['p_start'], $this->_tpl_vars['total_users']); ?> &nbsp;|&nbsp; 
      <?php else: ?>
        &nbsp;|&nbsp; <?php echo sprintf(SELanguage::_get(185), $this->_tpl_vars['p_start'], $this->_tpl_vars['p_end'], $this->_tpl_vars['total_users']); ?> &nbsp;|&nbsp; 
      <?php endif; ?>
      <?php if ($this->_tpl_vars['p'] != $this->_tpl_vars['maxpage']): ?><a href='search_advanced.php?<?php echo $this->_tpl_vars['url_string']; ?>
cat_selected=<?php echo $this->_tpl_vars['cat_selected']; ?>
&task=<?php echo $this->_tpl_vars['task']; ?>
&sort=<?php echo $this->_tpl_vars['sort']; ?>
&user_online=<?php echo $this->_tpl_vars['user_online']; ?>
&user_withphoto=<?php echo $this->_tpl_vars['user_withphoto']; ?>
&p=<?php echo smarty_function_math(array('equation' => 'p+1','p' => $this->_tpl_vars['p']), $this);?>
'><?php echo SELanguage::_get(183); ?> &#187;</a><?php else: ?><font class='disabled'><?php echo SELanguage::_get(183); ?> &#187;</font><?php endif; ?>
    </div>
  <?php endif; 
 endif; ?>

</td>
</tr>
</table>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>