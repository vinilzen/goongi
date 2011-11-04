<?php /* Smarty version 2.6.14, created on 2011-11-04 12:27:17
         compiled from admin_levels_usersettings.tpl */
?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'math', 'admin_levels_usersettings.tpl', 11, false),array('modifier', 'count', 'admin_levels_usersettings.tpl', 11, false),array('modifier', 'in_array', 'admin_levels_usersettings.tpl', 57, false),)), $this);
?><?php
SELanguage::_preload_multi(288,282,286,289,191,292,293,294,295,296,297,298,299,300,301,302,303,304,305,306,307,308,309,310,311,312,313,314,315,316,317,318,978,982,983,319,320,321,322,1047,1048,1051,1052,1049,1050,1053,1054,820,821,822,823,824,825,826,827,173,285,287);
SELanguage::load();
?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin_header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<h2><?php echo sprintf(SELanguage::_get(288), $this->_tpl_vars['level_info']['level_name']); ?></h2>
<?php echo SELanguage::_get(282); ?>

<table cellspacing='0' cellpadding='0' width='100%' style='margin-top: 20px;'>
<tr>
<td class='vert_tab0'>&nbsp;</td>
<td valign='top' class='pagecell' rowspan='<?php echo smarty_function_math(array('equation' => "x+5",'x' => count($this->_tpl_vars['level_menu'])), $this);?>
'>
  <h2><?php echo SELanguage::_get(286); ?></h2>
  <?php echo SELanguage::_get(289); ?>
  <br />
  <br />

  <?php if ($this->_tpl_vars['result'] != 0): ?>
    <div class='success'><img src='../images/success.gif' class='icon' border='0'> <?php echo SELanguage::_get(191); ?></div>
  <?php endif; ?>

  <?php if ($this->_tpl_vars['is_error'] != 0): ?>
    <div class='error'><img src='../images/error.gif' class='icon' border='0'> <?php echo SELanguage::_get($this->_tpl_vars['is_error']); ?></div> 
  <?php endif; ?>

  <form action='admin_levels_usersettings.php' method='post' id='info' name='info'>
  <table cellpadding='0' cellspacing='0' width='100%'>
  <tr><td class='header'><?php echo SELanguage::_get(292); ?></td></tr>
  <tr><td class='setting1'>
  <?php echo SELanguage::_get(293); ?>
  </td></tr><tr><td class='setting2'>
    <table cellpadding='0' cellspacing='0'>
    <tr><td><input type='radio' name='level_profile_block' id='profile_block_1' value='1'<?php if ($this->_tpl_vars['level_info']['level_profile_block'] == 1): ?> CHECKED<?php endif; ?>>&nbsp;</td><td><label for='profile_block_1'><?php echo SELanguage::_get(294); ?></label></td></tr>
    <tr><td><input type='radio' name='level_profile_block' id='profile_block_0' value='0'<?php if ($this->_tpl_vars['level_info']['level_profile_block'] == 0): ?> CHECKED<?php endif; ?>>&nbsp;</td><td><label for='profile_block_0'><?php echo SELanguage::_get(295); ?></label></td></tr>
    </table>
  </td></tr></table>

  <br>

  <table cellpadding='0' cellspacing='0' width='100%'>
  <tr><td class='header'><?php echo SELanguage::_get(296); ?></td></tr>
  <tr><td class='setting1'>
  <b><?php echo SELanguage::_get(297); ?></b><br>
  <?php echo SELanguage::_get(298); ?>
  </td></tr><tr><td class='setting2'>
    <table cellpadding='0' cellspacing='0'>
      <tr><td><input type='radio' name='level_profile_search' id='profile_search1' value='1' <?php if ($this->_tpl_vars['level_info']['level_profile_search'] == 1): ?> CHECKED<?php endif; ?>></td><td><label for='profile_search1'><?php echo SELanguage::_get(299); ?></label>&nbsp;&nbsp;</td></tr>
      <tr><td><input type='radio' name='level_profile_search' id='profile_search0' value='0' <?php if ($this->_tpl_vars['level_info']['level_profile_search'] == 0): ?> CHECKED<?php endif; ?>></td><td><label for='profile_search0'><?php echo SELanguage::_get(300); ?></label>&nbsp;&nbsp;</td></tr>
    </table>
  </td></tr>
  <tr><td class='setting1'>
  <b><?php echo SELanguage::_get(301); ?></b><br>
  <?php echo SELanguage::_get(302); ?> 
  </td></tr>
  <tr><td class='setting2'>
    <table cellpadding='0' cellspacing='0'>
    <?php $_from = $this->_tpl_vars['profile_privacy']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
      <tr><td><input type='checkbox' name='level_profile_privacy[]' id='privacy_<?php echo $this->_tpl_vars['k']; ?>
' value='<?php echo $this->_tpl_vars['k']; ?>
'<?php if (((is_array($_tmp=$this->_tpl_vars['k'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['level_profile_privacy']) : in_array($_tmp, $this->_tpl_vars['level_profile_privacy']))): ?> CHECKED<?php endif; ?>></td><td><label for='privacy_<?php echo $this->_tpl_vars['k']; ?>
'><?php echo SELanguage::_get($this->_tpl_vars['v']); ?></label>&nbsp;&nbsp;</td></tr>
    <?php endforeach; endif; unset($_from); ?>
    </table>
  </td></tr>
  <tr><td class='setting1'>
  <b><?php echo SELanguage::_get(303); ?></b><br>
  <?php echo SELanguage::_get(304); ?>
  </td></tr>
  <tr><td class='setting2'>
    <table cellpadding='0' cellspacing='0'>
    <?php $_from = $this->_tpl_vars['profile_comments']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
      <tr><td><input type='checkbox' name='level_profile_comments[]' id='comments_<?php echo $this->_tpl_vars['k']; ?>
' value='<?php echo $this->_tpl_vars['k']; ?>
'<?php if (((is_array($_tmp=$this->_tpl_vars['k'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['level_profile_comments']) : in_array($_tmp, $this->_tpl_vars['level_profile_comments']))): ?> CHECKED<?php endif; ?>></td><td><label for='comments_<?php echo $this->_tpl_vars['k']; ?>
'><?php echo SELanguage::_get($this->_tpl_vars['v']); ?></label>&nbsp;&nbsp;</td></tr>
    <?php endforeach; endif; unset($_from); ?>
    </table>
  </td></tr>
  </table>
  
  <br>

  <table cellpadding='0' cellspacing='0' width='100%'>
  <tr><td class='header'><?php echo SELanguage::_get(305); ?></td></tr>
  <tr><td class='setting1'>
  <?php echo SELanguage::_get(306); ?>
  </td></tr>
  <tr><td class='setting2'>
    <table cellpadding='0' cellspacing='0'>
    <tr><td><input type='radio' name='level_photo_allow' id='photo_allow_1' value='1'<?php if ($this->_tpl_vars['level_info']['level_photo_allow'] == 1): ?> CHECKED<?php endif; ?>>&nbsp;</td><td><label for='photo_allow_1'><?php echo SELanguage::_get(307); ?></label></td></tr>
    <tr><td><input type='radio' name='level_photo_allow' id='photo_allow_0' value='0'<?php if ($this->_tpl_vars['level_info']['level_photo_allow'] == 0): ?> CHECKED<?php endif; ?>>&nbsp;</td><td><label for='photo_allow_0'><?php echo SELanguage::_get(308); ?></label></td></tr>
    </table>
  </td></tr>
  <tr><td class='setting1'>
  <?php echo SELanguage::_get(309); ?>
  </td></tr>
  <tr><td class='setting2'>
    <table cellpadding='0' cellspacing='0'>
    <tr>
    <td><?php echo SELanguage::_get(310); ?> &nbsp;</td>
    <td><input type='text' class='text' name='level_photo_width' value='<?php echo $this->_tpl_vars['level_info']['level_photo_width']; ?>
' maxlength='3' size='3'> &nbsp;</td>
    <td><?php echo SELanguage::_get(311); ?></td>
    </tr>
    <tr>
    <td><?php echo SELanguage::_get(312); ?> &nbsp;</td>
    <td><input type='text' class='text' name='level_photo_height' value='<?php echo $this->_tpl_vars['level_info']['level_photo_height']; ?>
' maxlength='3' size='3'> &nbsp;</td>
    <td><?php echo SELanguage::_get(311); ?></td>
    </tr>
    </table>
  </td></tr>
  <tr><td class='setting1'>
  <?php echo SELanguage::_get(313); ?>
  </td></tr>
  <tr><td class='setting2'>
    <table cellpadding='0' cellspacing='0'>
    <tr>
    <td><?php echo SELanguage::_get(314); ?> &nbsp;</td>
    <td><input type='text' class='text' name='level_photo_exts' value='<?php echo $this->_tpl_vars['level_info']['level_photo_exts']; ?>
' size='40' maxlength='50'></td>
    </tr>
    </table>
  </td></tr>
  </table>
  
  <br>

  <table cellpadding='0' cellspacing='0' width='100%'>
  <tr>
  <td class='header'><?php echo SELanguage::_get(315); ?></td>
  </tr>
  <tr><td class='setting1'>
  <?php echo SELanguage::_get(316); ?>
  </td></tr>
  <tr><td class='setting2'>
    <table cellpadding='0' cellspacing='0'>
    <tr><td><input type='radio' name='level_profile_style' id='profile_style_1' value='1'<?php if ($this->_tpl_vars['level_info']['level_profile_style'] == 1): ?> CHECKED<?php endif; ?>>&nbsp;</td><td><label for='profile_style_1'><?php echo SELanguage::_get(317); ?></label></td></tr>
    <tr><td><input type='radio' name='level_profile_style' id='profile_style_0' value='0'<?php if ($this->_tpl_vars['level_info']['level_profile_style'] == 0): ?> CHECKED<?php endif; ?>>&nbsp;</td><td><label for='profile_style_0'><?php echo SELanguage::_get(318); ?></label></td></tr>
    </table>
  </td></tr>
  <tr><td class='setting1'>
  <?php echo SELanguage::_get(978); ?>
  </td></tr>
  <tr><td class='setting2'>
    <table cellpadding='0' cellspacing='0'>
    <tr><td><input type='radio' name='level_profile_style_sample' id='profile_style_sample_1' value='1'<?php if ($this->_tpl_vars['level_info']['level_profile_style_sample'] == 1): ?> CHECKED<?php endif; ?>>&nbsp;</td><td><label for='profile_style_sample_1'><?php echo SELanguage::_get(982); ?></label></td></tr>
    <tr><td><input type='radio' name='level_profile_style_sample' id='profile_style_sample_0' value='0'<?php if ($this->_tpl_vars['level_info']['level_profile_style_sample'] == 0): ?> CHECKED<?php endif; ?>>&nbsp;</td><td><label for='profile_style_sample_0'><?php echo SELanguage::_get(983); ?></label></td></tr>
    </table>
  </td></tr>
  </table>
  
  <br>
  
  <table cellpadding='0' cellspacing='0' width='100%'>
  <tr>
  <td class='header'><?php echo SELanguage::_get(319); ?></td>
  </tr>
  <tr><td class='setting1'>
  <?php echo SELanguage::_get(320); ?>
  </td></tr>
  <tr><td class='setting2'>
    <table cellpadding='0' cellspacing='0'>
    <tr><td><input type='radio' name='level_profile_status' id='profile_status_1' value='1'<?php if ($this->_tpl_vars['level_info']['level_profile_status'] == 1): ?> CHECKED<?php endif; ?>>&nbsp;</td><td><label for='profile_status_1'><?php echo SELanguage::_get(321); ?></label></td></tr>
    <tr><td><input type='radio' name='level_profile_status' id='profile_status_0' value='0'<?php if ($this->_tpl_vars['level_info']['level_profile_status'] == 0): ?> CHECKED<?php endif; ?>>&nbsp;</td><td><label for='profile_status_0'><?php echo SELanguage::_get(322); ?></label></td></tr>
    </table>
  </td></tr>
  </table>
  
  <br>
  
  <table cellpadding='0' cellspacing='0' width='100%'>
  <tr>
  <td class='header'><?php echo SELanguage::_get(1047); ?></td>
  </tr>
  <tr><td class='setting1'>
  <?php echo SELanguage::_get(1048); ?>
  </td></tr>
  <tr><td class='setting2'>
    <table cellpadding='0' cellspacing='0'>
    <tr><td><input type='radio' name='level_profile_invisible' id='profile_invisible_1' value='1'<?php if ($this->_tpl_vars['level_info']['level_profile_invisible'] == 1): ?> CHECKED<?php endif; ?>>&nbsp;</td><td><label for='profile_invisible_1'><?php echo SELanguage::_get(1051); ?></label></td></tr>
    <tr><td><input type='radio' name='level_profile_invisible' id='profile_invisible_0' value='0'<?php if ($this->_tpl_vars['level_info']['level_profile_invisible'] == 0): ?> CHECKED<?php endif; ?>>&nbsp;</td><td><label for='profile_invisible_0'><?php echo SELanguage::_get(1052); ?></label></td></tr>
    </table>
  </td></tr>
  </table>
  
  <br>
  
  <table cellpadding='0' cellspacing='0' width='100%'>
  <tr>
  <td class='header'><?php echo SELanguage::_get(1049); ?></td>
  </tr>
  <tr><td class='setting1'>
  <?php echo SELanguage::_get(1050); ?>
  </td></tr>
  <tr><td class='setting2'>
    <table cellpadding='0' cellspacing='0'>
    <tr><td><input type='radio' name='level_profile_views' id='profile_views_1' value='1'<?php if ($this->_tpl_vars['level_info']['level_profile_views'] == 1): ?> CHECKED<?php endif; ?>>&nbsp;</td><td><label for='profile_views_1'><?php echo SELanguage::_get(1053); ?></label></td></tr>
    <tr><td><input type='radio' name='level_profile_views' id='profile_views_0' value='0'<?php if ($this->_tpl_vars['level_info']['level_profile_views'] == 0): ?> CHECKED<?php endif; ?>>&nbsp;</td><td><label for='profile_views_0'><?php echo SELanguage::_get(1054); ?></label></td></tr>
    </table>
  </td></tr>
  </table>
  
  <br>
  
  <table cellpadding='0' cellspacing='0' width='100%'>
  <tr>
  <td class='header'><?php echo SELanguage::_get(820); ?></td>
  </tr>
  <tr><td class='setting1'>
  <?php echo SELanguage::_get(821); ?>
  </td></tr>
  <tr><td class='setting2'>
    <table cellpadding='0' cellspacing='0'>
    <tr><td><input type='radio' name='level_profile_change' id='profile_change_1' value='1'<?php if ($this->_tpl_vars['level_info']['level_profile_change'] == 1): ?> CHECKED<?php endif; ?>>&nbsp;</td><td><label for='profile_change_1'><?php echo SELanguage::_get(822); ?></label></td></tr>
    <tr><td><input type='radio' name='level_profile_change' id='profile_change_0' value='0'<?php if ($this->_tpl_vars['level_info']['level_profile_change'] == 0): ?> CHECKED<?php endif; ?>>&nbsp;</td><td><label for='profile_change_0'><?php echo SELanguage::_get(823); ?></label></td></tr>
    </table>
  </td></tr>
  </table>
  
  <br>
  
  <table cellpadding='0' cellspacing='0' width='100%'>
  <tr>
  <td class='header'><?php echo SELanguage::_get(824); ?></td>
  </tr>
  <tr><td class='setting1'>
  <?php echo SELanguage::_get(825); ?>
  </td></tr>
  <tr><td class='setting2'>
    <table cellpadding='0' cellspacing='0'>
    <tr><td><input type='radio' name='level_profile_delete' id='profile_delete_1' value='1'<?php if ($this->_tpl_vars['level_info']['level_profile_delete'] == 1): ?> CHECKED<?php endif; ?>>&nbsp;</td><td><label for='profile_delete_1'><?php echo SELanguage::_get(826); ?></label></td></tr>
    <tr><td><input type='radio' name='level_profile_delete' id='profile_delete_0' value='0'<?php if ($this->_tpl_vars['level_info']['level_profile_delete'] == 0): ?> CHECKED<?php endif; ?>>&nbsp;</td><td><label for='profile_delete_0'><?php echo SELanguage::_get(827); ?></label></td></tr>
    </table>
  </td></tr>
  </table>
  
  <br>

  <input type='submit' class='button' value='<?php echo SELanguage::_get(173); ?>'>
  <input type='hidden' name='task' value='dosave'>
  <input type='hidden' name='level_id' value='<?php echo $this->_tpl_vars['level_info']['level_id']; ?>
'>
  </form>


</td>
</tr>

<tr><td width='100' nowrap='nowrap' class='vert_tab'><div style='width: 100px;'><a href='admin_levels_edit.php?level_id=<?php echo $this->_tpl_vars['level_info']['level_id']; ?>
'><?php echo SELanguage::_get(285); ?></a></div></td></tr>
<tr><td width='100' nowrap='nowrap' class='vert_tab' style='border-right: none; border-top: none;'><div style='width: 100px;'><a href='admin_levels_usersettings.php?level_id=<?php echo $this->_tpl_vars['level_info']['level_id']; ?>
'><?php echo SELanguage::_get(286); ?></a></div></td></tr>
<tr><td width='100' nowrap='nowrap' class='vert_tab' style='border-top: none;'><div style='width: 100px;'><a href='admin_levels_messagesettings.php?level_id=<?php echo $this->_tpl_vars['level_info']['level_id']; ?>
'><?php echo SELanguage::_get(287); ?></a></div></td></tr>
<?php $_from = $this->_tpl_vars['global_plugins']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['plugin_k'] => $this->_tpl_vars['plugin_v']):

 unset($this->_sections['level_page_loop']);
$this->_sections['level_page_loop']['name'] = 'level_page_loop';
$this->_sections['level_page_loop']['loop'] = is_array($_loop=$this->_tpl_vars['plugin_v']['plugin_pages_level']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['level_page_loop']['show'] = true;
$this->_sections['level_page_loop']['max'] = $this->_sections['level_page_loop']['loop'];
$this->_sections['level_page_loop']['step'] = 1;
$this->_sections['level_page_loop']['start'] = $this->_sections['level_page_loop']['step'] > 0 ? 0 : $this->_sections['level_page_loop']['loop']-1;
if ($this->_sections['level_page_loop']['show']) {
    $this->_sections['level_page_loop']['total'] = $this->_sections['level_page_loop']['loop'];
    if ($this->_sections['level_page_loop']['total'] == 0)
        $this->_sections['level_page_loop']['show'] = false;
} else
    $this->_sections['level_page_loop']['total'] = 0;
if ($this->_sections['level_page_loop']['show']):

            for ($this->_sections['level_page_loop']['index'] = $this->_sections['level_page_loop']['start'], $this->_sections['level_page_loop']['iteration'] = 1;
                 $this->_sections['level_page_loop']['iteration'] <= $this->_sections['level_page_loop']['total'];
                 $this->_sections['level_page_loop']['index'] += $this->_sections['level_page_loop']['step'], $this->_sections['level_page_loop']['iteration']++):
$this->_sections['level_page_loop']['rownum'] = $this->_sections['level_page_loop']['iteration'];
$this->_sections['level_page_loop']['index_prev'] = $this->_sections['level_page_loop']['index'] - $this->_sections['level_page_loop']['step'];
$this->_sections['level_page_loop']['index_next'] = $this->_sections['level_page_loop']['index'] + $this->_sections['level_page_loop']['step'];
$this->_sections['level_page_loop']['first']      = ($this->_sections['level_page_loop']['iteration'] == 1);
$this->_sections['level_page_loop']['last']       = ($this->_sections['level_page_loop']['iteration'] == $this->_sections['level_page_loop']['total']);
?>
  <tr><td width='100' nowrap='nowrap' class='vert_tab' style='border-top: none;<?php if ($this->_tpl_vars['plugin_v']['plugin_pages_level'][$this->_sections['level_page_loop']['index']]['page'] == $this->_tpl_vars['page']): ?> border-right: none;<?php endif; ?>'><div style='width: 100px;'><a href='<?php echo $this->_tpl_vars['plugin_v']['plugin_pages_level'][$this->_sections['level_page_loop']['index']]['link']; ?>
?level_id=<?php echo $this->_tpl_vars['level_info']['level_id']; ?>
'><?php echo SELanguage::_get($this->_tpl_vars['plugin_v']['plugin_pages_level'][$this->_sections['level_page_loop']['index']]['title']); ?></a></div></td></tr>
<?php endfor; endif; 
 endforeach; endif; unset($_from); ?>

<tr>
<td class='vert_tab0'>
  <div style='height: 1800px;'>&nbsp;</div>
</td>
</tr>
</table>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin_footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>