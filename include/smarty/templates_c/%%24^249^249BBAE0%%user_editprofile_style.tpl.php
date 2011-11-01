<?php /* Smarty version 2.6.14, created on 2011-11-01 15:16:05
         compiled from user_editprofile_style.tpl */
?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'user_editprofile_style.tpl', 42, false),array('modifier', 'strip', 'user_editprofile_style.tpl', 49, false),array('modifier', 'nl2br', 'user_editprofile_style.tpl', 60, false),)), $this);
?><?php
SELanguage::_preload_multi(762,763,964,191,965,966,979,980,981,173);
SELanguage::load();
?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<table class='tabs' cellpadding='0' cellspacing='0'>
<tr>
<td class='tab0'>&nbsp;</td>
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
  <td class='tab2' NOWRAP><a href='user_editprofile.php?cat_id=<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcat_id']; ?>
'><?php echo SELanguage::_get($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcat_title']); ?></a></td><td class='tab'>&nbsp;</td>
<?php endfor; endif; 
 if ($this->_tpl_vars['user']->level_info['level_photo_allow'] != 0): ?><td class='tab2' NOWRAP><a href='user_editprofile_photo.php'><?php echo SELanguage::_get(762); ?></a></td><td class='tab'>&nbsp;</td><?php endif; ?>
<td class='tab1' NOWRAP><a href='user_editprofile_style.php'><?php echo SELanguage::_get(763); ?></a></td>
<td class='tab3'>&nbsp;</td>
</tr>
</table>

<img src='./images/icons/editprofile48.gif' border='0' class='icon_big'>
<div class='page_header'><?php echo SELanguage::_get(763); ?></div>
<div><?php echo SELanguage::_get(964); ?></div>
<br />

<?php if ($this->_tpl_vars['result'] != 0): ?>
  <table cellpadding='0' cellspacing='0'>
  <tr>
  <td class='success'><img src='./images/success.gif' border='0' class='icon'> <?php echo SELanguage::_get(191); ?></td>
  </tr>
  </table><br>
<?php endif; ?>

<form action='user_editprofile_style.php' method='post'>
<?php if ($this->_tpl_vars['user']->level_info['level_profile_style'] != 0): ?>
  <div><b><?php echo SELanguage::_get(965); ?></b></div>
  <div class='form_desc'><?php echo SELanguage::_get(966); ?></div>
  <textarea name='style_profile' id='style_profile' rows='17' cols='50' style='width: 100%; font-family: courier, serif;'><?php echo $this->_tpl_vars['style_info']['profilestyle_css']; ?>
</textarea>
  <br><br>
<?php endif; 
 if ($this->_tpl_vars['user']->level_info['level_profile_style_sample'] != 0 && count($this->_tpl_vars['sample_css']) != 0): ?>
  <div><b><?php echo SELanguage::_get(979); ?></b></div>
  <div class='form_desc'><?php echo SELanguage::_get(980); ?></div>

  <br>

    <div id='css_0' class='editprofile_examplecss<?php if (((is_array($_tmp=$this->_tpl_vars['style_info']['profilestyle_css'])) ? $this->_run_mod_handler('strip', true, $_tmp) : smarty_modifier_strip($_tmp)) == ""): ?>_selected<?php endif; ?>'>
    <a href='javascript:void(0)' onClick='switch_css("0");this.blur()'><img src='./images/sample_styles/original_css.gif' border='0'></a><br>
    <a href='javascript:void(0)' onClick='switch_css("0");this.blur()'>Original Layout</a>
    <div style='display:none;' id='sample_0'></div>
  </div>

    <?php unset($this->_sections['sample_loop']);
$this->_sections['sample_loop']['name'] = 'sample_loop';
$this->_sections['sample_loop']['loop'] = is_array($_loop=$this->_tpl_vars['sample_css']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['sample_loop']['show'] = true;
$this->_sections['sample_loop']['max'] = $this->_sections['sample_loop']['loop'];
$this->_sections['sample_loop']['step'] = 1;
$this->_sections['sample_loop']['start'] = $this->_sections['sample_loop']['step'] > 0 ? 0 : $this->_sections['sample_loop']['loop']-1;
if ($this->_sections['sample_loop']['show']) {
    $this->_sections['sample_loop']['total'] = $this->_sections['sample_loop']['loop'];
    if ($this->_sections['sample_loop']['total'] == 0)
        $this->_sections['sample_loop']['show'] = false;
} else
    $this->_sections['sample_loop']['total'] = 0;
if ($this->_sections['sample_loop']['show']):

            for ($this->_sections['sample_loop']['index'] = $this->_sections['sample_loop']['start'], $this->_sections['sample_loop']['iteration'] = 1;
                 $this->_sections['sample_loop']['iteration'] <= $this->_sections['sample_loop']['total'];
                 $this->_sections['sample_loop']['index'] += $this->_sections['sample_loop']['step'], $this->_sections['sample_loop']['iteration']++):
$this->_sections['sample_loop']['rownum'] = $this->_sections['sample_loop']['iteration'];
$this->_sections['sample_loop']['index_prev'] = $this->_sections['sample_loop']['index'] - $this->_sections['sample_loop']['step'];
$this->_sections['sample_loop']['index_next'] = $this->_sections['sample_loop']['index'] + $this->_sections['sample_loop']['step'];
$this->_sections['sample_loop']['first']      = ($this->_sections['sample_loop']['iteration'] == 1);
$this->_sections['sample_loop']['last']       = ($this->_sections['sample_loop']['iteration'] == $this->_sections['sample_loop']['total']);
?>
    <div id='css_<?php echo $this->_tpl_vars['sample_css'][$this->_sections['sample_loop']['index']]['stylesample_id']; ?>
' class='editprofile_examplecss<?php if ($this->_tpl_vars['style_info']['profilestyle_stylesample_id'] == $this->_tpl_vars['sample_css'][$this->_sections['sample_loop']['index']]['stylesample_id']): ?>_selected<?php endif; ?>'>
      <a href='javascript:void(0)' onClick='switch_css("<?php echo $this->_tpl_vars['sample_css'][$this->_sections['sample_loop']['index']]['stylesample_id']; ?>
");this.blur()'><img src='./images/sample_styles/<?php echo $this->_tpl_vars['sample_css'][$this->_sections['sample_loop']['index']]['stylesample_thumb']; ?>
' border='0'></a><br>
      <a href='javascript:void(0)' onClick='switch_css("<?php echo $this->_tpl_vars['sample_css'][$this->_sections['sample_loop']['index']]['stylesample_id']; ?>
");this.blur()'><?php echo $this->_tpl_vars['sample_css'][$this->_sections['sample_loop']['index']]['stylesample_name']; ?>
</a>
      <div style='display:none;' id='sample_<?php echo $this->_tpl_vars['sample_css'][$this->_sections['sample_loop']['index']]['stylesample_id']; ?>
'><?php echo ((is_array($_tmp=$this->_tpl_vars['sample_css'][$this->_sections['sample_loop']['index']]['stylesample_css'])) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</div>
    </div>
  <?php endfor; endif; ?>

  <div style='clear: both'></div>
  <input type='hidden' name='style_profile_sample' id='style_profile_sample' value='<?php echo $this->_tpl_vars['style_info']['profilestyle_stylesample_id']; ?>
'>

    <?php echo '
  <script type=\'text/javascript\'>
  <!--
  '; ?>

  <?php if ($this->_tpl_vars['user']->level_info['level_profile_style'] == 0): ?> 
  var selected = <?php echo $this->_tpl_vars['style_info']['profilestyle_stylesample_id']; ?>
;
  <?php echo ' 
  function switch_css(id) {
    if(id == selected) { id = 0; }
    if($(\'css_\'+selected)) { $(\'css_\'+selected).className = \'editprofile_examplecss\'; }
    if($(\'css_\'+id)) { $(\'css_\'+id).className = \'editprofile_examplecss_selected\'; }
    $(\'style_profile_sample\').value = id;
    selected = id;
  }
  '; ?>

  <?php else: ?>
  <?php echo ' 
  function switch_css(id) {
    if(confirm("'; 
 echo SELanguage::_get(981); 
 echo '")) {
      var new_css = $(\'sample_\'+id).innerHTML.replace(/\\n/g, \'\').replace(/<br>/ig, \'\\n\');
      $(\'style_profile\').value=new_css;
    }
  }
  '; 
 endif; 
 echo '

  //-->
  </script>
  '; ?>

  <br>
<?php endif; ?>


<input type='submit' class='button' value='<?php echo SELanguage::_get(173); ?>' />
<input type='hidden' name='task' value='dosave' />
</form>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>