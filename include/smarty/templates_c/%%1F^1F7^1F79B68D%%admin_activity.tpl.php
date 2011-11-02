<?php /* Smarty version 2.6.14, created on 2011-11-01 16:56:37
         compiled from admin_activity.tpl */
?><?php
SELanguage::_preload_multi(14,547,191,548,549,550,578,1027,551,576,577,552,553,554,555,556,557,558,559,560,561,562,563,564,565,566,567,568,569,570,571,324,325,327,1065,1066,1067,572,573,574,575,173);
SELanguage::load();
?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin_header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<h2><?php echo SELanguage::_get(14); ?></h2>
<?php echo SELanguage::_get(547); ?>

<br><br>

<?php if ($this->_tpl_vars['result'] != 0): ?>
  <div class='success'><img src='../images/success.gif' class='icon' border='0'> <?php echo SELanguage::_get(191); ?></div>
<?php endif; ?>

<form action='admin_activity.php' method='post'>
<table cellpadding='0' cellspacing='0' width='650'>
  <tr>
    <td class='header'><?php echo SELanguage::_get(548); ?></td>
  </tr>
  <tr>
    <td class='setting1'><?php echo SELanguage::_get(549); ?></td>
  </tr>
  <tr>
    <td class='setting2'>
      <table cellpadding='3' cellspacing='0' width='100%'>
      <?php unset($this->_sections['actiontype_loop']);
$this->_sections['actiontype_loop']['name'] = 'actiontype_loop';
$this->_sections['actiontype_loop']['loop'] = is_array($_loop=$this->_tpl_vars['actiontypes']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['actiontype_loop']['show'] = true;
$this->_sections['actiontype_loop']['max'] = $this->_sections['actiontype_loop']['loop'];
$this->_sections['actiontype_loop']['step'] = 1;
$this->_sections['actiontype_loop']['start'] = $this->_sections['actiontype_loop']['step'] > 0 ? 0 : $this->_sections['actiontype_loop']['loop']-1;
if ($this->_sections['actiontype_loop']['show']) {
    $this->_sections['actiontype_loop']['total'] = $this->_sections['actiontype_loop']['loop'];
    if ($this->_sections['actiontype_loop']['total'] == 0)
        $this->_sections['actiontype_loop']['show'] = false;
} else
    $this->_sections['actiontype_loop']['total'] = 0;
if ($this->_sections['actiontype_loop']['show']):

            for ($this->_sections['actiontype_loop']['index'] = $this->_sections['actiontype_loop']['start'], $this->_sections['actiontype_loop']['iteration'] = 1;
                 $this->_sections['actiontype_loop']['iteration'] <= $this->_sections['actiontype_loop']['total'];
                 $this->_sections['actiontype_loop']['index'] += $this->_sections['actiontype_loop']['step'], $this->_sections['actiontype_loop']['iteration']++):
$this->_sections['actiontype_loop']['rownum'] = $this->_sections['actiontype_loop']['iteration'];
$this->_sections['actiontype_loop']['index_prev'] = $this->_sections['actiontype_loop']['index'] - $this->_sections['actiontype_loop']['step'];
$this->_sections['actiontype_loop']['index_next'] = $this->_sections['actiontype_loop']['index'] + $this->_sections['actiontype_loop']['step'];
$this->_sections['actiontype_loop']['first']      = ($this->_sections['actiontype_loop']['iteration'] == 1);
$this->_sections['actiontype_loop']['last']       = ($this->_sections['actiontype_loop']['iteration'] == $this->_sections['actiontype_loop']['total']);
?>
        <tr>
        <td valign='top'>
          <b><?php echo SELanguage::_get(550); ?></b> - <?php echo SELanguage::_get(578); ?> <?php echo $this->_tpl_vars['actiontypes'][$this->_sections['actiontype_loop']['index']]['actiontype_vars']; ?>
<br />
          <textarea name='actiontype_text[<?php echo $this->_tpl_vars['actiontypes'][$this->_sections['actiontype_loop']['index']]['actiontype_id']; ?>
]' rows='3' style='width: 100%;' class='text'><?php echo vsprintf(SELanguage::_get($this->_tpl_vars['actiontypes'][$this->_sections['actiontype_loop']['index']]['actiontype_text']), $this->_tpl_vars['actiontypes'][$this->_sections['actiontype_loop']['index']]['actiontype_vars_array']);; ?></textarea>
          <?php if ($this->_tpl_vars['actiontypes'][$this->_sections['actiontype_loop']['index']]['actiontype_media'] == 1): ?><br /><?php echo SELanguage::_get(1027); 
 endif; ?>
        </td>
        <td valign='top' width='1' style='padding-left: 7px;'>
          <b><?php echo SELanguage::_get(551); ?></b><br />
          <?php echo $this->_tpl_vars['actiontypes'][$this->_sections['actiontype_loop']['index']]['actiontype_name']; ?>

        </td>
        </tr>
        <tr>
        <td colspan='2'<?php if ($this->_sections['actiontype_loop']['last'] != true): ?> style='padding-bottom: 50px;'<?php endif; ?>>
          <input name='actiontype_enabled[<?php echo $this->_tpl_vars['actiontypes'][$this->_sections['actiontype_loop']['index']]['actiontype_id']; ?>
]' id='actiontype_enabled<?php echo $this->_tpl_vars['actiontypes'][$this->_sections['actiontype_loop']['index']]['actiontype_id']; ?>
' type='checkbox' value='1' <?php if ($this->_tpl_vars['actiontypes'][$this->_sections['actiontype_loop']['index']]['actiontype_enabled'] == 1): ?> checked='checked'<?php endif; ?>> <label for='actiontype_enabled<?php echo $this->_tpl_vars['actiontypes'][$this->_sections['actiontype_loop']['index']]['actiontype_id']; ?>
'><?php echo SELanguage::_get(576); ?></label><br>
          <input name='actiontype_setting[<?php echo $this->_tpl_vars['actiontypes'][$this->_sections['actiontype_loop']['index']]['actiontype_id']; ?>
]' id='actiontype_setting<?php echo $this->_tpl_vars['actiontypes'][$this->_sections['actiontype_loop']['index']]['actiontype_id']; ?>
' type='checkbox' value='1' <?php if ($this->_tpl_vars['actiontypes'][$this->_sections['actiontype_loop']['index']]['actiontype_setting'] == 1): ?> checked='checked'<?php endif; ?>> <label for='actiontype_setting<?php echo $this->_tpl_vars['actiontypes'][$this->_sections['actiontype_loop']['index']]['actiontype_id']; ?>
'><?php echo SELanguage::_get(577); ?></label><br>
        </td>
        </tr>
      <?php endfor; endif; ?>
      </table>
    </td>
  </tr>
</table>
<br />


<table cellpadding='0' cellspacing='0' width='600'>
<tr>
<td class='header'><?php echo SELanguage::_get(552); ?></td>
</tr>
<td class='setting1'>
  <?php echo SELanguage::_get(553); ?>
</td></tr><tr><td class='setting2'>
  <select class='text' name='setting_actions_actionsonprofile'>
  <option<?php if ($this->_tpl_vars['setting']['setting_actions_actionsonprofile'] == '0'): ?> selected='selected'<?php endif; ?>>0</option>
  <option<?php if ($this->_tpl_vars['setting']['setting_actions_actionsonprofile'] == '1'): ?> selected='selected'<?php endif; ?>>1</option>
  <option<?php if ($this->_tpl_vars['setting']['setting_actions_actionsonprofile'] == '2'): ?> selected='selected'<?php endif; ?>>2</option>
  <option<?php if ($this->_tpl_vars['setting']['setting_actions_actionsonprofile'] == '3'): ?> selected='selected'<?php endif; ?>>3</option>
  <option<?php if ($this->_tpl_vars['setting']['setting_actions_actionsonprofile'] == '4'): ?> selected='selected'<?php endif; ?>>4</option>
  <option<?php if ($this->_tpl_vars['setting']['setting_actions_actionsonprofile'] == '5'): ?> selected='selected'<?php endif; ?>>5</option>
  <option<?php if ($this->_tpl_vars['setting']['setting_actions_actionsonprofile'] == '6'): ?> selected='selected'<?php endif; ?>>6</option>
  <option<?php if ($this->_tpl_vars['setting']['setting_actions_actionsonprofile'] == '7'): ?> selected='selected'<?php endif; ?>>7</option>
  <option<?php if ($this->_tpl_vars['setting']['setting_actions_actionsonprofile'] == '8'): ?> selected='selected'<?php endif; ?>>8</option>
  <option<?php if ($this->_tpl_vars['setting']['setting_actions_actionsonprofile'] == '9'): ?> selected='selected'<?php endif; ?>>9</option>
  <option<?php if ($this->_tpl_vars['setting']['setting_actions_actionsonprofile'] == '10'): ?> selected='selected'<?php endif; ?>>10</option>
  </select> <b><?php echo SELanguage::_get(554); ?></b>
</td></tr></table>

<br>

<table cellpadding='0' cellspacing='0' width='600'>
<tr>
<td class='header'><?php echo SELanguage::_get(555); ?></td>
</tr>
<tr>
<td class='setting1'>
  <?php echo SELanguage::_get(556); ?>
</td></tr><tr><td class='setting2'>
  <select class='text' name='setting_actions_actionsinlist'>
  <option<?php if ($this->_tpl_vars['setting']['setting_actions_actionsinlist'] == '0'): ?> selected='selected'<?php endif; ?>>0</option>
  <option<?php if ($this->_tpl_vars['setting']['setting_actions_actionsinlist'] == '1'): ?> selected='selected'<?php endif; ?>>1</option>
  <option<?php if ($this->_tpl_vars['setting']['setting_actions_actionsinlist'] == '2'): ?> selected='selected'<?php endif; ?>>2</option>
  <option<?php if ($this->_tpl_vars['setting']['setting_actions_actionsinlist'] == '3'): ?> selected='selected'<?php endif; ?>>3</option>
  <option<?php if ($this->_tpl_vars['setting']['setting_actions_actionsinlist'] == '4'): ?> selected='selected'<?php endif; ?>>4</option>
  <option<?php if ($this->_tpl_vars['setting']['setting_actions_actionsinlist'] == '5'): ?> selected='selected'<?php endif; ?>>5</option>
  <option<?php if ($this->_tpl_vars['setting']['setting_actions_actionsinlist'] == '6'): ?> selected='selected'<?php endif; ?>>6</option>
  <option<?php if ($this->_tpl_vars['setting']['setting_actions_actionsinlist'] == '7'): ?> selected='selected'<?php endif; ?>>7</option>
  <option<?php if ($this->_tpl_vars['setting']['setting_actions_actionsinlist'] == '8'): ?> selected='selected'<?php endif; ?>>8</option>
  <option<?php if ($this->_tpl_vars['setting']['setting_actions_actionsinlist'] == '9'): ?> selected='selected'<?php endif; ?>>9</option>
  <option<?php if ($this->_tpl_vars['setting']['setting_actions_actionsinlist'] == '10'): ?> selected='selected'<?php endif; ?>>10</option>
  <option<?php if ($this->_tpl_vars['setting']['setting_actions_actionsinlist'] == '15'): ?> selected='selected'<?php endif; ?>>15</option>
  <option<?php if ($this->_tpl_vars['setting']['setting_actions_actionsinlist'] == '20'): ?> selected='selected'<?php endif; ?>>20</option>
  <option<?php if ($this->_tpl_vars['setting']['setting_actions_actionsinlist'] == '25'): ?> selected='selected'<?php endif; ?>>25</option>
  <option<?php if ($this->_tpl_vars['setting']['setting_actions_actionsinlist'] == '30'): ?> selected='selected'<?php endif; ?>>30</option>
  <option<?php if ($this->_tpl_vars['setting']['setting_actions_actionsinlist'] == '35'): ?> selected='selected'<?php endif; ?>>35</option>
  <option<?php if ($this->_tpl_vars['setting']['setting_actions_actionsinlist'] == '40'): ?> selected='selected'<?php endif; ?>>40</option>
  <option<?php if ($this->_tpl_vars['setting']['setting_actions_actionsinlist'] == '45'): ?> selected='selected'<?php endif; ?>>45</option>
  <option<?php if ($this->_tpl_vars['setting']['setting_actions_actionsinlist'] == '50'): ?> selected='selected'<?php endif; ?>>50</option>
  </select> <b><?php echo SELanguage::_get(557); ?></b>
</td></tr>
<tr>
<td class='setting1'>
  <?php echo SELanguage::_get(558); ?>
</td></tr><tr><td class='setting2'>
  <select class='text' name='setting_actions_showlength'>
  <option value='60'<?php if ($this->_tpl_vars['setting']['setting_actions_showlength'] == '60'): ?> selected='selected'<?php endif; ?>>1 <?php echo SELanguage::_get(559); ?></option>
  <option value='300'<?php if ($this->_tpl_vars['setting']['setting_actions_showlength'] == '300'): ?> selected='selected'<?php endif; ?>>5 <?php echo SELanguage::_get(559); ?></option>
  <option value='600'<?php if ($this->_tpl_vars['setting']['setting_actions_showlength'] == '600'): ?> selected='selected'<?php endif; ?>>10 <?php echo SELanguage::_get(559); ?></option>
  <option value='1200'<?php if ($this->_tpl_vars['setting']['setting_actions_showlength'] == '1200'): ?> selected='selected'<?php endif; ?>>20 <?php echo SELanguage::_get(559); ?></option>
  <option value='1800'<?php if ($this->_tpl_vars['setting']['setting_actions_showlength'] == '1800'): ?> selected='selected'<?php endif; ?>>30 <?php echo SELanguage::_get(559); ?></option>
  <option value='3600'<?php if ($this->_tpl_vars['setting']['setting_actions_showlength'] == '3600'): ?> selected='selected'<?php endif; ?>>1 <?php echo SELanguage::_get(560); ?></option>
  <option value='10800'<?php if ($this->_tpl_vars['setting']['setting_actions_showlength'] == '10800'): ?> selected='selected'<?php endif; ?>>3 <?php echo SELanguage::_get(560); ?></option>
  <option value='21600'<?php if ($this->_tpl_vars['setting']['setting_actions_showlength'] == '21600'): ?> selected='selected'<?php endif; ?>>6 <?php echo SELanguage::_get(560); ?></option>
  <option value='43200'<?php if ($this->_tpl_vars['setting']['setting_actions_showlength'] == '43200'): ?> selected='selected'<?php endif; ?>>12 <?php echo SELanguage::_get(560); ?></option>
  <option value='86400'<?php if ($this->_tpl_vars['setting']['setting_actions_showlength'] == '86400'): ?> selected='selected'<?php endif; ?>>1 <?php echo SELanguage::_get(561); ?></option>
  <option value='172800'<?php if ($this->_tpl_vars['setting']['setting_actions_showlength'] == '172800'): ?> selected='selected'<?php endif; ?>>2 <?php echo SELanguage::_get(561); ?></option>
  <option value='259200'<?php if ($this->_tpl_vars['setting']['setting_actions_showlength'] == '259200'): ?> selected='selected'<?php endif; ?>>3 <?php echo SELanguage::_get(561); ?></option>
  <option value='604800'<?php if ($this->_tpl_vars['setting']['setting_actions_showlength'] == '604800'): ?> selected='selected'<?php endif; ?>>1 <?php echo SELanguage::_get(562); ?></option>
  <option value='1209600'<?php if ($this->_tpl_vars['setting']['setting_actions_showlength'] == '1209600'): ?> selected='selected'<?php endif; ?>>2 <?php echo SELanguage::_get(562); ?></option>
  <option value='2629743'<?php if ($this->_tpl_vars['setting']['setting_actions_showlength'] == '2629743'): ?> selected='selected'<?php endif; ?>>1 <?php echo SELanguage::_get(563); ?></option>
  </select>
</td></tr>
<tr>
<td class='setting1'>
  <?php echo SELanguage::_get(564); ?>
</td></tr><tr><td class='setting2'>
  <select class='text' name='setting_actions_actionsperuser'>
  <option<?php if ($this->_tpl_vars['setting']['setting_actions_actionsperuser'] == '0'): ?> selected='selected'<?php endif; ?>>0</option>
  <option<?php if ($this->_tpl_vars['setting']['setting_actions_actionsperuser'] == '1'): ?> selected='selected'<?php endif; ?>>1</option>
  <option<?php if ($this->_tpl_vars['setting']['setting_actions_actionsperuser'] == '2'): ?> selected='selected'<?php endif; ?>>2</option>
  <option<?php if ($this->_tpl_vars['setting']['setting_actions_actionsperuser'] == '3'): ?> selected='selected'<?php endif; ?>>3</option>
  <option<?php if ($this->_tpl_vars['setting']['setting_actions_actionsperuser'] == '4'): ?> selected='selected'<?php endif; ?>>4</option>
  <option<?php if ($this->_tpl_vars['setting']['setting_actions_actionsperuser'] == '5'): ?> selected='selected'<?php endif; ?>>5</option>
  <option<?php if ($this->_tpl_vars['setting']['setting_actions_actionsperuser'] == '6'): ?> selected='selected'<?php endif; ?>>6</option>
  <option<?php if ($this->_tpl_vars['setting']['setting_actions_actionsperuser'] == '7'): ?> selected='selected'<?php endif; ?>>7</option>
  <option<?php if ($this->_tpl_vars['setting']['setting_actions_actionsperuser'] == '8'): ?> selected='selected'<?php endif; ?>>8</option>
  <option<?php if ($this->_tpl_vars['setting']['setting_actions_actionsperuser'] == '9'): ?> selected='selected'<?php endif; ?>>9</option>
  <option<?php if ($this->_tpl_vars['setting']['setting_actions_actionsperuser'] == '10'): ?> selected='selected'<?php endif; ?>>10</option>
  </select> <b><?php echo SELanguage::_get(565); ?></b>
</td></tr></table>

<br>

<table cellpadding='0' cellspacing='0' width='600'>
<tr>
<td class='header'><?php echo SELanguage::_get(566); ?></td>
</tr>
<td class='setting1'>
  <?php echo SELanguage::_get(567); ?>
</td></tr><tr><td class='setting2'>
  <table cellpadding='0' cellspacing='0'>
  <tr><td><input type='radio' name='setting_actions_selfdelete' id='actions_selfdelete_1' value='1'<?php if ($this->_tpl_vars['setting']['setting_actions_selfdelete'] == 1): ?> CHECKED<?php endif; ?>>&nbsp;</td><td><label for='actions_selfdelete_1'><?php echo SELanguage::_get(568); ?></label></td></tr>
  <tr><td><input type='radio' name='setting_actions_selfdelete' id='actions_selfdelete_0' value='0'<?php if ($this->_tpl_vars['setting']['setting_actions_selfdelete'] == 0): ?> CHECKED<?php endif; ?>>&nbsp;</td><td><label for='actions_selfdelete_0'><?php echo SELanguage::_get(569); ?></label></td></tr>
  </table>
</td></tr></table>

<br>

<table cellpadding='0' cellspacing='0' width='600'>
<tr>
<td class='header'><?php echo SELanguage::_get(570); ?></td>
</tr>
<td class='setting1'>
  <?php echo SELanguage::_get(571); ?>
</td></tr><tr><td class='setting2'>
  <table cellpadding='0' cellspacing='0'>
  <tr><td style='padding-bottom: 3px;'><input type='radio' name='setting_actions_visibility' id='actions_visibility1' value='1'<?php if ($this->_tpl_vars['setting']['setting_actions_visibility'] == 1): ?> checked='checked'<?php endif; ?>></td><td><label for='actions_visibility1'><?php echo SELanguage::_get(324); ?></label>&nbsp;&nbsp;</td></tr>
  <tr><td style='padding-bottom: 3px;'><input type='radio' name='setting_actions_visibility' id='actions_visibility2' value='2'<?php if ($this->_tpl_vars['setting']['setting_actions_visibility'] == 2): ?> checked='checked'<?php endif; ?>></td><td><label for='actions_visibility2'><?php echo SELanguage::_get(325); ?></label>&nbsp;&nbsp;</td></tr>
  <tr><td style='padding-bottom: 3px;'><input type='radio' name='setting_actions_visibility' id='actions_visibility4' value='4'<?php if ($this->_tpl_vars['setting']['setting_actions_visibility'] == 4): ?> checked='checked'<?php endif; ?>></td><td><label for='actions_visibility4'><?php echo SELanguage::_get(327); ?></label>&nbsp;&nbsp;</td></tr>
  </table>
</td></tr>
<td class='setting1'>
  <?php echo SELanguage::_get(1065); ?>
</td></tr><tr><td class='setting2'>
  <table cellpadding='0' cellspacing='0'>
  <tr><td style='padding-bottom: 3px;'><input type='radio' name='setting_actions_preference' id='actions_preference1' value='1'<?php if ($this->_tpl_vars['setting']['setting_actions_preference'] == 1): ?> checked='checked'<?php endif; ?>></td><td><label for='actions_preference1'><?php echo SELanguage::_get(1066); ?></label>&nbsp;&nbsp;</td></tr>
  <tr><td style='padding-bottom: 3px;'><input type='radio' name='setting_actions_preference' id='actions_preference0' value='0'<?php if ($this->_tpl_vars['setting']['setting_actions_preference'] == 0): ?> checked='checked'<?php endif; ?>></td><td><label for='actions_preference0'><?php echo SELanguage::_get(1067); ?></label>&nbsp;&nbsp;</td></tr>
  </table>
</td></tr>
</table>

<br>

<table cellpadding='0' cellspacing='0' width='600'>
<tr><td class='header'><?php echo SELanguage::_get(572); ?></td></tr>
<td class='setting1'>
  <?php echo SELanguage::_get(573); ?>
</td></tr><tr><td class='setting2'>
  <table cellpadding='0' cellspacing='0'>
  <tr><td><input type='radio' name='setting_actions_privacy' id='actions_privacy_1' value='1'<?php if ($this->_tpl_vars['setting']['setting_actions_privacy'] == 1): ?> CHECKED<?php endif; ?>>&nbsp;</td><td><label for='actions_privacy_1'><?php echo SELanguage::_get(574); ?></label></td></tr>
  <tr><td><input type='radio' name='setting_actions_privacy' id='actions_privacy_0' value='0'<?php if ($this->_tpl_vars['setting']['setting_actions_privacy'] == 0): ?> CHECKED<?php endif; ?>>&nbsp;</td><td><label for='actions_privacy_0'><?php echo SELanguage::_get(575); ?></label></td></tr>
  </table>
</td></tr>
</table>

<br>

<input type='hidden' name='task' value='dosave'>
<input type='submit' class='button' value='<?php echo SELanguage::_get(173); ?>'>
</form>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin_footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>