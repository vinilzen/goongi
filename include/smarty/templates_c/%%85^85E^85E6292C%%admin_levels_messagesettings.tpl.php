<?php /* Smarty version 2.6.14, created on 2011-11-04 12:31:12
         compiled from admin_levels_messagesettings.tpl */
?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'math', 'admin_levels_messagesettings.tpl', 11, false),array('modifier', 'count', 'admin_levels_messagesettings.tpl', 11, false),)), $this);
?><?php
SELanguage::_preload_multi(288,282,287,330,191,331,332,333,334,335,336,337,338,339,792,793,794,173,285,286);
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

  <h2><?php echo SELanguage::_get(287); ?></h2>
  <?php echo SELanguage::_get(330); ?>

  <br><br>

  <?php if ($this->_tpl_vars['result'] != 0): ?>
  <div class='success'><img src='../images/success.gif' class='icon' border='0'> <?php echo SELanguage::_get(191); ?></div>
  <?php endif; ?>

  <form action='admin_levels_messagesettings.php' method='POST'>
  <table cellpadding='0' cellspacing='0' width='100%'>
  <tr><td class='header'><?php echo SELanguage::_get(331); ?></td></tr>
  <tr><td class='setting1'>
  <?php echo SELanguage::_get(332); ?>
  </td></tr><tr><td class='setting2'>
    <table cellpadding='0' cellspacing='0'>
    <tr><td><input type='radio' name='level_message_allow' id='message_allow_0' value='0'<?php if ($this->_tpl_vars['level_info']['level_message_allow'] == 0): ?> CHECKED<?php endif; ?>>&nbsp;</td><td><label for='message_allow_0'><?php echo SELanguage::_get(333); ?></label></td></tr>
    <tr><td><input type='radio' name='level_message_allow' id='message_allow_1' value='1'<?php if ($this->_tpl_vars['level_info']['level_message_allow'] == 1): ?> CHECKED<?php endif; ?>>&nbsp;</td><td><label for='message_allow_1'><?php echo SELanguage::_get(334); ?></label></td></tr>
    <tr><td><input type='radio' name='level_message_allow' id='message_allow_2' value='2'<?php if ($this->_tpl_vars['level_info']['level_message_allow'] == 2): ?> CHECKED<?php endif; ?>>&nbsp;</td><td><label for='message_allow_2'><?php echo SELanguage::_get(335); ?></label></td></tr>
    </table>
  </td></tr></table>

  <br>

  <table cellpadding='0' cellspacing='0' width='100%'>
  <tr><td class='header'><?php echo SELanguage::_get(336); ?></td></tr>
  <tr><td class='setting1'>
  <?php echo SELanguage::_get(337); ?>
  </td></tr><tr><td class='setting2'>
    <table cellpadding='0' cellspacing='0'>
    <tr>
    <td>
    <select name='level_message_inbox' class='text'>
    <option value='5'<?php if ($this->_tpl_vars['level_info']['level_message_inbox'] == 5): ?> SELECTED<?php endif; ?>>5</option>
    <option value='10'<?php if ($this->_tpl_vars['level_info']['level_message_inbox'] == 10): ?> SELECTED<?php endif; ?>>10</option>
    <option value='20'<?php if ($this->_tpl_vars['level_info']['level_message_inbox'] == 20): ?> SELECTED<?php endif; ?>>20</option>
    <option value='30'<?php if ($this->_tpl_vars['level_info']['level_message_inbox'] == 30): ?> SELECTED<?php endif; ?>>30</option>
    <option value='40'<?php if ($this->_tpl_vars['level_info']['level_message_inbox'] == 40): ?> SELECTED<?php endif; ?>>40</option>
    <option value='50'<?php if ($this->_tpl_vars['level_info']['level_message_inbox'] == 50): ?> SELECTED<?php endif; ?>>50</option>
    <option value='100'<?php if ($this->_tpl_vars['level_info']['level_message_inbox'] == 100): ?> SELECTED<?php endif; ?>>100</option>
    <option value='200'<?php if ($this->_tpl_vars['level_info']['level_message_inbox'] == 200): ?> SELECTED<?php endif; ?>>200</option>
    <option value='500'<?php if ($this->_tpl_vars['level_info']['level_message_inbox'] == 500): ?> SELECTED<?php endif; ?>>500</option>
    </select>
    </td>
    <td>&nbsp; <?php echo SELanguage::_get(338); ?></td>
    </tr>
    <tr>
    <td>
    <select name='level_message_outbox' class='text'>
    <option value='5'<?php if ($this->_tpl_vars['level_info']['level_message_outbox'] == 5): ?> SELECTED<?php endif; ?>>5</option>
    <option value='10'<?php if ($this->_tpl_vars['level_info']['level_message_outbox'] == 10): ?> SELECTED<?php endif; ?>>10</option>
    <option value='20'<?php if ($this->_tpl_vars['level_info']['level_message_outbox'] == 20): ?> SELECTED<?php endif; ?>>20</option>
    <option value='30'<?php if ($this->_tpl_vars['level_info']['level_message_outbox'] == 30): ?> SELECTED<?php endif; ?>>30</option>
    <option value='40'<?php if ($this->_tpl_vars['level_info']['level_message_outbox'] == 40): ?> SELECTED<?php endif; ?>>40</option>
    <option value='50'<?php if ($this->_tpl_vars['level_info']['level_message_outbox'] == 50): ?> SELECTED<?php endif; ?>>50</option>
    <option value='100'<?php if ($this->_tpl_vars['level_info']['level_message_outbox'] == 100): ?> SELECTED<?php endif; ?>>100</option>
    <option value='200'<?php if ($this->_tpl_vars['level_info']['level_message_outbox'] == 200): ?> SELECTED<?php endif; ?>>200</option>
    <option value='500'<?php if ($this->_tpl_vars['level_info']['level_message_outbox'] == 500): ?> SELECTED<?php endif; ?>>500</option>
    </select>
    </td>
    <td>&nbsp; <?php echo SELanguage::_get(339); ?></td>
    </tr>
    </table>
  </td></tr></table>

  <br>

  <table cellpadding='0' cellspacing='0' width='100%'>
  <tr><td class='header'><?php echo SELanguage::_get(792); ?></td></tr>
  <tr><td class='setting1'>
  <?php echo SELanguage::_get(793); ?>
  </td></tr><tr><td class='setting2'>
    <select name='level_message_recipients' class='text'>
    <option value='1'<?php if ($this->_tpl_vars['level_info']['level_message_recipients'] == 1): ?> SELECTED<?php endif; ?>>1</option>
    <option value='5'<?php if ($this->_tpl_vars['level_info']['level_message_recipients'] == 5): ?> SELECTED<?php endif; ?>>5</option>
    <option value='10'<?php if ($this->_tpl_vars['level_info']['level_message_recipients'] == 10): ?> SELECTED<?php endif; ?>>10</option>
    <option value='20'<?php if ($this->_tpl_vars['level_info']['level_message_recipients'] == 20): ?> SELECTED<?php endif; ?>>20</option>
    </select>
    &nbsp;<?php echo SELanguage::_get(794); ?>
  </td></tr></table>
  
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
<tr><td width='100' nowrap='nowrap' class='vert_tab' style='border-top: none;'><div style='width: 100px;'><a href='admin_levels_usersettings.php?level_id=<?php echo $this->_tpl_vars['level_info']['level_id']; ?>
'><?php echo SELanguage::_get(286); ?></a></div></td></tr>
<tr><td width='100' nowrap='nowrap' class='vert_tab' style='border-right: none; border-top: none;'><div style='width: 100px;'><a href='admin_levels_messagesettings.php?level_id=<?php echo $this->_tpl_vars['level_info']['level_id']; ?>
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
  <div style='height: 350px;'>&nbsp;</div>
</td>
</tr>
</table>





<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin_footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>