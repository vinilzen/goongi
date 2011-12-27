<?php /* Smarty version 2.6.14, created on 2011-12-26 12:30:36
         compiled from admin_viewadmins.tpl */
?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'admin_viewadmins.tpl', 21, false),array('modifier', 'truncate', 'admin_viewadmins.tpl', 23, false),)), $this);
?><?php
SELanguage::_preload_multi(5,257,87,28,258,89,259,153,260,261,187,155,262,263,270,264,175,39,265,269,46,47);
SELanguage::load();
?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin_header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<h2><?php echo SELanguage::_get(5); ?></h2>
<?php echo SELanguage::_get(257); ?>
<br />
<br />

<table cellpadding='0' cellspacing='0' class='list'>
<tr>
<td class='header' width='10'><?php echo SELanguage::_get(87); ?></td>
<td class='header'><?php echo SELanguage::_get(28); ?></td>
<td class='header'><?php echo SELanguage::_get(258); ?></td>
<td class='header'><?php echo SELanguage::_get(89); ?></td>
<td class='header'><?php echo SELanguage::_get(259); ?></td>
<td class='header'><?php echo SELanguage::_get(153); ?></td>
</tr>
<!-- LOOP THROUGH ADMINS -->
<?php unset($this->_sections['admin_loop']);
$this->_sections['admin_loop']['name'] = 'admin_loop';
$this->_sections['admin_loop']['loop'] = is_array($_loop=$this->_tpl_vars['admins']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['admin_loop']['show'] = true;
$this->_sections['admin_loop']['max'] = $this->_sections['admin_loop']['loop'];
$this->_sections['admin_loop']['step'] = 1;
$this->_sections['admin_loop']['start'] = $this->_sections['admin_loop']['step'] > 0 ? 0 : $this->_sections['admin_loop']['loop']-1;
if ($this->_sections['admin_loop']['show']) {
    $this->_sections['admin_loop']['total'] = $this->_sections['admin_loop']['loop'];
    if ($this->_sections['admin_loop']['total'] == 0)
        $this->_sections['admin_loop']['show'] = false;
} else
    $this->_sections['admin_loop']['total'] = 0;
if ($this->_sections['admin_loop']['show']):

            for ($this->_sections['admin_loop']['index'] = $this->_sections['admin_loop']['start'], $this->_sections['admin_loop']['iteration'] = 1;
                 $this->_sections['admin_loop']['iteration'] <= $this->_sections['admin_loop']['total'];
                 $this->_sections['admin_loop']['index'] += $this->_sections['admin_loop']['step'], $this->_sections['admin_loop']['iteration']++):
$this->_sections['admin_loop']['rownum'] = $this->_sections['admin_loop']['iteration'];
$this->_sections['admin_loop']['index_prev'] = $this->_sections['admin_loop']['index'] - $this->_sections['admin_loop']['step'];
$this->_sections['admin_loop']['index_next'] = $this->_sections['admin_loop']['index'] + $this->_sections['admin_loop']['step'];
$this->_sections['admin_loop']['first']      = ($this->_sections['admin_loop']['iteration'] == 1);
$this->_sections['admin_loop']['last']       = ($this->_sections['admin_loop']['iteration'] == $this->_sections['admin_loop']['total']);
?>
  <tr class='<?php echo smarty_function_cycle(array('values' => "background1,background2"), $this);?>
'>
  <td class='item'><?php echo $this->_tpl_vars['admins'][$this->_sections['admin_loop']['index']]['admin_id']; ?>
</td>
  <td class='item'><?php echo ((is_array($_tmp=$this->_tpl_vars['admins'][$this->_sections['admin_loop']['index']]['admin_username'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 27, "...", true) : smarty_modifier_truncate($_tmp, 27, "...", true)); ?>
</td>
  <td class='item'><?php echo $this->_tpl_vars['admins'][$this->_sections['admin_loop']['index']]['admin_name']; ?>
</td>
  <td class='item'><a href='mailto:<?php echo $this->_tpl_vars['admins'][$this->_sections['admin_loop']['index']]['admin_email']; ?>
'><?php echo ((is_array($_tmp=$this->_tpl_vars['admins'][$this->_sections['admin_loop']['index']]['admin_email'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 27, "...", true) : smarty_modifier_truncate($_tmp, 27, "...", true)); ?>
</a></td>
  <td class='item'><?php if ($this->_tpl_vars['admins'][$this->_sections['admin_loop']['index']]['admin_status'] == '0'): 
 echo SELanguage::_get(260); 
 else: 
 echo SELanguage::_get(261); 
 endif; ?></td>
  <td class='item'><a href="javascript:editAdmin('<?php echo $this->_tpl_vars['admins'][$this->_sections['admin_loop']['index']]['admin_id']; ?>
', '<?php echo $this->_tpl_vars['admins'][$this->_sections['admin_loop']['index']]['admin_name']; ?>
', '<?php echo $this->_tpl_vars['admins'][$this->_sections['admin_loop']['index']]['admin_username']; ?>
', '<?php echo $this->_tpl_vars['admins'][$this->_sections['admin_loop']['index']]['admin_email']; ?>
');"><?php echo SELanguage::_get(187); ?></a><?php if ($this->_tpl_vars['admins'][$this->_sections['admin_loop']['index']]['admin_status'] != '0'): ?> | <a href="javascript:confirmDelete('<?php echo $this->_tpl_vars['admins'][$this->_sections['admin_loop']['index']]['admin_id']; ?>
');"><?php echo SELanguage::_get(155); ?></a><?php endif; ?></td>
  </tr>
<?php endfor; endif; ?>
</table>

<br>

<input type='button' class='button' value='<?php echo SELanguage::_get(262); ?>' onclick='createAdmin();'>


<?php echo '
<script type="text/javascript">
<!-- 
var admin_id = 0;
function confirmDelete(id) {
  admin_id = id;
  TB_show(\''; 
 echo SELanguage::_get(263); 
 echo '\', \'#TB_inline?height=100&width=300&inlineId=confirmdelete\', \'\', \'../images/trans.gif\');
  document.getElementById(\'deletebutton\').focus();
}

function deleteAdmin() {
  window.location = \'admin_viewadmins.php?task=delete&admin_id=\'+admin_id;
}

function createAdmin() {
  document.getElementById(\'createbutton\').value = \''; 
 echo SELanguage::_get(262); 
 echo '\';
  document.getElementById(\'error\').innerHTML = \'\';  
  document.getElementById(\'old_password\').style.display = \'none\';  
  document.getElementById(\'task\').value = \'create\';  
  document.getElementById(\'admin_id\').value = \'0\';  
  document.getElementById(\'admin_username\').defaultValue = \'\';  
  document.getElementById(\'admin_username\').value = \'\';  
  document.getElementById(\'admin_name\').defaultValue = \'\';  
  document.getElementById(\'admin_name\').value = \'\';  
  document.getElementById(\'admin_email\').defaultValue = \'\';  
  document.getElementById(\'admin_email\').value = \'\';  
  TB_show(\''; 
 echo SELanguage::_get(262); 
 echo '\', \'#TB_inline?height=350&width=300&inlineId=createadmin\', \'\', \'../images/trans.gif\');
}

function editAdmin(id, name, username, email) {
  document.getElementById(\'createbutton\').value = \''; 
 echo SELanguage::_get(270); 
 echo '\';
  document.getElementById(\'error\').innerHTML = \'\';  
  document.getElementById(\'old_password\').style.display = \'\';  
  document.getElementById(\'task\').value = \'edit\';  
  document.getElementById(\'admin_id\').value = id;  
  document.getElementById(\'admin_username\').defaultValue = username;  
  document.getElementById(\'admin_username\').value = username;  
  document.getElementById(\'admin_name\').defaultValue = name;  
  document.getElementById(\'admin_name\').value = name;  
  document.getElementById(\'admin_email\').defaultValue = email;  
  document.getElementById(\'admin_email\').value = email;  
  TB_show(\''; 
 echo SELanguage::_get(270); 
 echo '\', \'#TB_inline?height=350&width=350&inlineId=createadmin\', \'\', \'../images/trans.gif\');
}
//-->
</script>
'; ?>


<div style='display: none;' id='confirmdelete'>
  <div style='margin-top: 10px;'>
    <?php echo SELanguage::_get(264); ?>
  </div>
  <br>
  <input type='button' class='button' value='<?php echo SELanguage::_get(175); ?>' id='deletebutton' onClick='parent.TB_remove();parent.deleteAdmin();'> <input type='button' class='button' value='<?php echo SELanguage::_get(39); ?>' onClick='parent.TB_remove();'>
</div>



<div style='display: none;' id='createadmin'>
  <form action='admin_viewadmins.php' method='post' target='ajaxframe'>
  <div style='margin-top: 10px;'><?php echo SELanguage::_get(265); ?></div>
  <div id='error' style='width: 100%;'>test</div>
  <br>
  <table cellpadding='0' cellspacing='0'>
  <tr>
  <td align='right'><?php echo SELanguage::_get(28); ?>:&nbsp;</td>
  <td><input type='text' class='text' name='admin_username' id='admin_username' maxlength='50'></td>
  </tr>
  <tr id='old_password'>
  <td align='right'><?php echo SELanguage::_get(269); ?>:&nbsp;</td>
  <td><input type='password' class='text' name='admin_old_password' id='admin_old_password' maxlength='50'></td>
  </tr>
  <tr>
  <td align='right'><?php echo SELanguage::_get(46); ?>:&nbsp;</td>
  <td><input type='password' class='text' name='admin_password' id='admin_password' maxlength='50'></td>
  </tr>
  <tr>
  <td align='right'><?php echo SELanguage::_get(47); ?>:&nbsp;</td>
  <td><input type='password' class='text' name='admin_password_confirm' id='admin_password_confirm' maxlength='50'></td>
  </tr>
  <tr>
  <td align='right'><?php echo SELanguage::_get(258); ?>:&nbsp;</td>
  <td><input type='text' class='text' name='admin_name' id='admin_name' maxlength='50'></td>
  </tr>
  <tr>
  <td align='right'><?php echo SELanguage::_get(89); ?>:&nbsp;</td>
  <td><input type='text' class='text' name='admin_email' id='admin_email' maxlength='50'></td>
  </tr>
  </table>

  <br>
  <input type='submit' class='button' id='createbutton' value='<?php echo SELanguage::_get(262); ?>'> <input type='button' class='button' value='<?php echo SELanguage::_get(39); ?>' onClick='parent.TB_remove();'>
  <input type='hidden' name='task' value='create' id='task'>
  <input type='hidden' name='admin_id' id='admin_id' value='0'>
  </form>

    <?php echo '
  <script type="text/javascript">
  <!-- 
  function createResult(is_error, error_message) {
    if(is_error != 0) {
      $("TB_window").getElements(\'div[id=error]\').each(function(el) { el.innerHTML = "<br><table cellpadding=\'0\' cellspacing=\'0\' width=\'100%\'><tr><td class=\'error\'>"+error_message+"</td></tr></table>" });
    } else {
      parent.window.location = \'admin_viewadmins.php\';
    }
  }
  //-->
  </script>
  '; ?>


</div>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin_footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>