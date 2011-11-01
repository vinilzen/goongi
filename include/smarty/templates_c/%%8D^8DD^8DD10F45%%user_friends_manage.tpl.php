<?php /* Smarty version 2.6.14, created on 2011-11-01 16:12:43
         compiled from user_friends_manage.tpl */
?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'user_friends_manage.tpl', 170, false),)), $this);
?><?php
SELanguage::_preload_multi(918,919,39,912,913,877,889,888,887,921,882,863,883,922,880,881,884);
SELanguage::load();
?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header_global.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 
 if ($this->_tpl_vars['result'] != 0): ?>

    <?php echo '
  <script type="text/javascript">
  <!-- 
  setTimeout("window.parent.TB_remove();", "1000");
  if(window.parent.friend_update) { setTimeout("window.parent.friend_update(\''; 
 echo $this->_tpl_vars['status']; 
 echo '\', \''; 
 echo $this->_tpl_vars['owner']->user_info['user_id']; 
 echo '\');", "800"); }
  //-->
  </script>
  '; ?>


  <br />
  <div><?php echo SELanguage::_get($this->_tpl_vars['result']); ?></div>


<?php elseif ($this->_tpl_vars['subpage'] == 'cancel'): ?>

  <div style='text-align:left; padding-left: 10px; padding-top: 10px;'>
    <?php echo sprintf(SELanguage::_get(918), $this->_tpl_vars['owner']->user_displayname); ?>

    <br />
    <br />

    <form action='user_friends_manage.php' method='POST'>

    <table cellpadding='0' cellspacing='0'>
    <tr><td colspan='2'>&nbsp;</td></tr>
    <tr>
    <td colspan='2'>
      <table cellpadding='0' cellspacing='0'>
      <tr>
      <td>
      <input type='submit' class='button' value='<?php echo SELanguage::_get(919); ?>' />&nbsp;
      <input type='hidden' name='task' value='cancel_do' />
      <input type='hidden' name='user' value='<?php echo $this->_tpl_vars['owner']->user_info['user_username']; ?>
' />
      </form>
      </td>
      <td>
        <input type='button' class='button' value='<?php echo SELanguage::_get(39); ?>' onClick='window.parent.TB_remove();' />
      </td>
      </tr>
      </table>
    </td>
    </tr>
    </table>
  </div>


<?php elseif ($this->_tpl_vars['subpage'] == 'reject'): ?>

  <div style='text-align:left; padding-left: 10px; padding-top: 10px;'>
    <?php echo sprintf(SELanguage::_get(912), $this->_tpl_vars['owner']->user_displayname); ?>
    <br />
    <br />
    
    <form action='user_friends_manage.php' method='POST'>
    
    <table cellpadding='0' cellspacing='0'>
    <tr><td colspan='2'>&nbsp;</td></tr>
    <tr>
    <td colspan='2'>
       <table cellpadding='0' cellspacing='0'>
       <tr>
       <td>
       <input type='submit' class='button' value='<?php echo SELanguage::_get(913); ?>' />&nbsp;
       <input type='hidden' name='task' value='reject_do' />
       <input type='hidden' name='user' value='<?php echo $this->_tpl_vars['owner']->user_info['user_username']; ?>
' />
       </form>
       </td>
       <td>
         <input type='button' class='button' value='<?php echo SELanguage::_get(39); ?>' onClick='window.parent.TB_remove();' />
       </td>
       </tr>
       </table>
    </td>
    </tr>
    </table>

  </div>


<?php elseif ($this->_tpl_vars['subpage'] == 'remove'): ?>

  <div style='text-align:left; padding-left: 10px; padding-top: 10px;'>
    <?php echo sprintf(SELanguage::_get(877), $this->_tpl_vars['owner']->user_displayname); ?>
    <br />
    
    <form action='user_friends_manage.php' method='POST'>
    
    <table cellpadding='0' cellspacing='0'>
    <tr><td colspan='2'>&nbsp;</td></tr>
    <tr>
    <td colspan='2'>
      <table cellpadding='0' cellspacing='0'>
      <tr>
      <td>
      <input type='submit' class='button' value='<?php echo SELanguage::_get(889); ?>' />&nbsp;
      <input type='hidden' name='task' value='remove_do' />
      <input type='hidden' name='user' value='<?php echo $this->_tpl_vars['owner']->user_info['user_username']; ?>
' />
      </form>
      </td>
      <td>
        <input type='button' class='button' value='<?php echo SELanguage::_get(39); ?>' onClick='window.parent.TB_remove();' />
      </td>
      </tr>
      </table>
    </td>
    </tr>
    </table>
  </div>



<?php elseif ($this->_tpl_vars['subpage'] == 'confirm'): ?>

  <div style='text-align:left; padding-left: 10px; padding-top: 10px;'>
    <?php echo sprintf(SELanguage::_get(888), $this->_tpl_vars['owner']->user_displayname); ?>
    <br />
    <br />
    
    <form action='user_friends_manage.php' method='POST'>
    
    <table cellpadding='0' cellspacing='0'>
    <tr><td colspan='2'>&nbsp;</td></tr>
    <tr>
    <td colspan='2'>
      <table cellpadding='0' cellspacing='0'>
      <tr>
      <td>
      <input type='submit' class='button' value='<?php echo SELanguage::_get(887); ?>' />&nbsp;
      <input type='hidden' name='task' value='add_do' />
      <input type='hidden' name='user' value='<?php echo $this->_tpl_vars['owner']->user_info['user_username']; ?>
' />
      </form>
      </td>
      <td>
        <input type='button' class='button' value='<?php echo SELanguage::_get(39); ?>' onClick='window.parent.TB_remove();' />
      </td>
      </tr>
      </table>
    </td>
    </tr>
    </table>
  </div>

<?php elseif ($this->_tpl_vars['subpage'] == 'edit'): ?>

  <div style='text-align:left; padding-left: 10px; padding-top: 10px;'>
    <?php echo sprintf(SELanguage::_get(921), $this->_tpl_vars['owner']->user_displayname); ?>
    <br />
    <br />
    
    <form action='user_friends_manage.php' method='post'>
    
        <table cellpadding='0' cellspacing='0'>
    <?php if (count($this->_tpl_vars['connection_types']) != 0): ?>
      <tr>
      <td class='form1'><?php echo SELanguage::_get(882); ?></td>
      <td class='form2'>
      <select name='friend_type' onChange="<?php echo 'if(this.options[this.selectedIndex].value == \'other_friendtype\') { $(\'other\').style.display = \'block\'; } else { $(\'other\').style.display = \'none\'; }'; ?>
">
      <option></option>
      <?php unset($this->_sections['type_loop']);
$this->_sections['type_loop']['name'] = 'type_loop';
$this->_sections['type_loop']['loop'] = is_array($_loop=$this->_tpl_vars['connection_types']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['type_loop']['show'] = true;
$this->_sections['type_loop']['max'] = $this->_sections['type_loop']['loop'];
$this->_sections['type_loop']['step'] = 1;
$this->_sections['type_loop']['start'] = $this->_sections['type_loop']['step'] > 0 ? 0 : $this->_sections['type_loop']['loop']-1;
if ($this->_sections['type_loop']['show']) {
    $this->_sections['type_loop']['total'] = $this->_sections['type_loop']['loop'];
    if ($this->_sections['type_loop']['total'] == 0)
        $this->_sections['type_loop']['show'] = false;
} else
    $this->_sections['type_loop']['total'] = 0;
if ($this->_sections['type_loop']['show']):

            for ($this->_sections['type_loop']['index'] = $this->_sections['type_loop']['start'], $this->_sections['type_loop']['iteration'] = 1;
                 $this->_sections['type_loop']['iteration'] <= $this->_sections['type_loop']['total'];
                 $this->_sections['type_loop']['index'] += $this->_sections['type_loop']['step'], $this->_sections['type_loop']['iteration']++):
$this->_sections['type_loop']['rownum'] = $this->_sections['type_loop']['iteration'];
$this->_sections['type_loop']['index_prev'] = $this->_sections['type_loop']['index'] - $this->_sections['type_loop']['step'];
$this->_sections['type_loop']['index_next'] = $this->_sections['type_loop']['index'] + $this->_sections['type_loop']['step'];
$this->_sections['type_loop']['first']      = ($this->_sections['type_loop']['iteration'] == 1);
$this->_sections['type_loop']['last']       = ($this->_sections['type_loop']['iteration'] == $this->_sections['type_loop']['total']);
?>
        <option value='<?php echo $this->_tpl_vars['connection_types'][$this->_sections['type_loop']['index']]; ?>
'<?php if ($this->_tpl_vars['friend_type'] == $this->_tpl_vars['connection_types'][$this->_sections['type_loop']['index']]): ?> SELECTED<?php endif; ?>><?php echo $this->_tpl_vars['connection_types'][$this->_sections['type_loop']['index']]; ?>
</option>
      <?php endfor; endif; ?>
      <?php if ($this->_tpl_vars['setting']['setting_connection_other'] != 0): ?><option value='other_friendtype'<?php if ($this->_tpl_vars['friend_type_other'] != ""): ?> SELECTED<?php endif; ?>><?php echo SELanguage::_get(863); ?>:</option><?php endif; ?>
      </select>
      </td>
      <?php if ($this->_tpl_vars['setting']['setting_connection_other'] != 0): ?>
        <td class='form2' style='display: <?php if ($this->_tpl_vars['friend_type_other'] != ""): ?>block<?php else: ?>none<?php endif; ?>;' id='other'>&nbsp;<input type='text' class='text' name='friend_type_other' value='<?php echo $this->_tpl_vars['friend_type_other']; ?>
' maxlength='50'></td>
      <?php endif; ?>
      </tr>
    <?php else: ?>
      <?php if ($this->_tpl_vars['setting']['setting_connection_other'] != 0): ?>
        <tr>
        <td class='form1'><?php echo SELanguage::_get(882); ?></td>
        <td class='form2'><input type='text' name='friend_type_other' value='<?php echo $this->_tpl_vars['friend_type_other']; ?>
' maxlength='50' /></td>
        </tr>
      <?php endif; ?>
    <?php endif; ?>

    </table>
    <br>

        <?php if ($this->_tpl_vars['setting']['setting_connection_explain'] != 0): ?>
      <div>
        <b><?php echo SELanguage::_get(883); ?></b><br>
        <textarea name='friend_explain' rows='5' cols='60'><?php echo $this->_tpl_vars['friend_explain']; ?>
</textarea>
      </div>
    <?php endif; ?>  

    <br>

    <table cellpadding='0' cellspacing='0'>
    <tr>
    <td>
      <input type='submit' class='button' value='<?php echo SELanguage::_get(922); ?>' />&nbsp;
      <input type='hidden' name='task' value='edit_do' />
      <input type='hidden' name='user' value='<?php echo $this->_tpl_vars['owner']->user_info['user_username']; ?>
' />
      </form>
    </td>
    <td>
      <input type='button' class='button' value='<?php echo SELanguage::_get(39); ?>' onClick='window.parent.TB_remove();' />
    </td>
    </tr>
    </table>

  </div>

<?php elseif ($this->_tpl_vars['subpage'] == 'add'): ?>

  <div style='text-align: left; padding-left: 10px; padding-top: 10px;'>
    <?php echo sprintf(SELanguage::_get(880), $this->_tpl_vars['owner']->user_displayname); ?>
    <br><br>
    <form action='user_friends_manage.php' method='POST'>

        <?php if (count($this->_tpl_vars['connection_types']) != 0 || $this->_tpl_vars['setting']['setting_connection_other'] != 0 || $this->_tpl_vars['setting']['setting_connection_explain'] != 0): ?>

      <?php echo sprintf(SELanguage::_get(881), $this->_tpl_vars['owner']->user_displayname); ?>
      <br />

      <table cellpadding='0' cellspacing='0'>

            <?php if (count($this->_tpl_vars['connection_types']) != 0): ?>
        <tr>
        <td class='form1'><?php echo SELanguage::_get(882); ?></td>
        <td class='form2'>
        <select name='friend_type' onChange="<?php echo 'if(this.options[this.selectedIndex].value == \'other_friendtype\') { $(\'other\').style.display = \'block\'; } else { $(\'other\').style.display = \'none\'; }'; ?>
">
        <option></option>
        <?php unset($this->_sections['type_loop']);
$this->_sections['type_loop']['name'] = 'type_loop';
$this->_sections['type_loop']['loop'] = is_array($_loop=$this->_tpl_vars['connection_types']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['type_loop']['show'] = true;
$this->_sections['type_loop']['max'] = $this->_sections['type_loop']['loop'];
$this->_sections['type_loop']['step'] = 1;
$this->_sections['type_loop']['start'] = $this->_sections['type_loop']['step'] > 0 ? 0 : $this->_sections['type_loop']['loop']-1;
if ($this->_sections['type_loop']['show']) {
    $this->_sections['type_loop']['total'] = $this->_sections['type_loop']['loop'];
    if ($this->_sections['type_loop']['total'] == 0)
        $this->_sections['type_loop']['show'] = false;
} else
    $this->_sections['type_loop']['total'] = 0;
if ($this->_sections['type_loop']['show']):

            for ($this->_sections['type_loop']['index'] = $this->_sections['type_loop']['start'], $this->_sections['type_loop']['iteration'] = 1;
                 $this->_sections['type_loop']['iteration'] <= $this->_sections['type_loop']['total'];
                 $this->_sections['type_loop']['index'] += $this->_sections['type_loop']['step'], $this->_sections['type_loop']['iteration']++):
$this->_sections['type_loop']['rownum'] = $this->_sections['type_loop']['iteration'];
$this->_sections['type_loop']['index_prev'] = $this->_sections['type_loop']['index'] - $this->_sections['type_loop']['step'];
$this->_sections['type_loop']['index_next'] = $this->_sections['type_loop']['index'] + $this->_sections['type_loop']['step'];
$this->_sections['type_loop']['first']      = ($this->_sections['type_loop']['iteration'] == 1);
$this->_sections['type_loop']['last']       = ($this->_sections['type_loop']['iteration'] == $this->_sections['type_loop']['total']);
?>
          <option value='<?php echo $this->_tpl_vars['connection_types'][$this->_sections['type_loop']['index']]; ?>
'><?php echo $this->_tpl_vars['connection_types'][$this->_sections['type_loop']['index']]; ?>
</option>
        <?php endfor; endif; ?>
        <?php if ($this->_tpl_vars['setting']['setting_connection_other'] != 0): ?><option value='other_friendtype'><?php echo SELanguage::_get(863); ?>:</option><?php endif; ?>
        </select>
        </td>
        <?php if ($this->_tpl_vars['setting']['setting_connection_other'] != 0): ?>
          <td class='form2' style='display: none;' id='other'>&nbsp;<input type='text' class='text' name='friend_type_other' maxlength='50' /></td>
        <?php endif; ?>
        </tr>
      <?php else: ?>
        <?php if ($this->_tpl_vars['setting']['setting_connection_other'] != 0): ?>
          <tr>
          <td class='form1'><?php echo SELanguage::_get(882); ?></td>
          <td class='form2'><input type='text' name='friend_type_other' maxlength='50' /></td>
          </tr>
        <?php endif; ?>
      <?php endif; ?>

      </table>
      <br>

            <?php if ($this->_tpl_vars['setting']['setting_connection_explain'] != 0): ?>
        <div>
          <b><?php echo SELanguage::_get(883); ?></b><br>
          <textarea name='friend_explain' rows='5' cols='60'></textarea>
        </div>
     <?php endif; ?>  

  <?php endif; ?>

  <table cellpadding='0' cellspacing='0'>
  <tr><td colspan='2'>&nbsp;</td></tr>
  <tr>
  <td colspan='2'>
     <table cellpadding='0' cellspacing='0'>
     <tr>
     <td>
     <input type='submit' class='button' value='<?php echo SELanguage::_get(884); ?>' />&nbsp;
     <input type='hidden' name='task' value='add_do' />
     <input type='hidden' name='user' value='<?php echo $this->_tpl_vars['owner']->user_info['user_username']; ?>
' />
     </form>
     </td>
     <td>
       <input type='button' class='button' value='<?php echo SELanguage::_get(39); ?>' onClick='window.parent.TB_remove();' />
     </td>
     </tr>
     </table>
  </td>
  </tr>
  </table>

  </div>

<?php endif; ?>



</body>
</html>