<?php /* Smarty version 2.6.14, created on 2011-11-01 16:26:08
         compiled from admin_general.tpl */
?><?php
SELanguage::_preload_multi(12,190,191,192,193,194,195,196,197,198,199,200,201,202,203,204,205,206,207,208,209,1148,1149,1150,1151,892,893,173);
SELanguage::load();
?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin_header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<h2><?php echo SELanguage::_get(12); ?></h2>
<?php echo SELanguage::_get(190); ?>
<br />
<br />

<?php if ($this->_tpl_vars['result'] != 0): ?>
<div class='success'><img src='../images/success.gif' class='icon' border='0'> <?php echo SELanguage::_get(191); ?></div>
<?php endif; ?>

<table cellpadding='0' cellspacing='0' width='600'>
<tr><form action='admin_general.php' method='POST'>
<td class='header'><?php echo SELanguage::_get(192); ?></td>
</tr>
<tr>
<td class='setting1'>
<?php echo SELanguage::_get(193); ?>
</td>
</tr>
<tr>
<td class='setting2'>
<b><?php echo SELanguage::_get(194); ?></b><br>
<input type='radio' name='setting_permission_profile' id='permission_profile_1' value='1'<?php if ($this->_tpl_vars['setting']['setting_permission_profile'] == 1): ?> CHECKED<?php endif; ?>><label for='permission_profile_1'><?php echo SELanguage::_get(195); ?></label><br>
<input type='radio' name='setting_permission_profile' id='permission_profile_0' value='0'<?php if ($this->_tpl_vars['setting']['setting_permission_profile'] == 0): ?> CHECKED<?php endif; ?>><label for='permission_profile_0'><?php echo SELanguage::_get(196); ?></label><br>
</td>
</tr>
<tr>
<td class='setting2'>
<b><?php echo SELanguage::_get(197); ?></b><br>
<input type='radio' name='setting_permission_invite' id='permission_invite_1' value='1'<?php if ($this->_tpl_vars['setting']['setting_permission_invite'] == 1): ?> CHECKED<?php endif; ?>><label for='permission_invite_1'><?php echo SELanguage::_get(198); ?></label><br>
<input type='radio' name='setting_permission_invite' id='permission_invite_0' value='0'<?php if ($this->_tpl_vars['setting']['setting_permission_invite'] == 0): ?> CHECKED<?php endif; ?>><label for='permission_invite_0'><?php echo SELanguage::_get(199); ?></label><br>
</td>
</tr>
<tr>
<td class='setting2'>
<b><?php echo SELanguage::_get(200); ?></b><br>
<input type='radio' name='setting_permission_search' id='permission_search_1' value='1'<?php if ($this->_tpl_vars['setting']['setting_permission_search'] == 1): ?> CHECKED<?php endif; ?>><label for='permission_search_1'><?php echo SELanguage::_get(201); ?></label><br>
<input type='radio' name='setting_permission_search' id='permission_search_0' value='0'<?php if ($this->_tpl_vars['setting']['setting_permission_search'] == 0): ?> CHECKED<?php endif; ?>><label for='permission_search_0'><?php echo SELanguage::_get(202); ?></label><br>
</td>
</tr>
<tr>
<td class='setting2'>
<b><?php echo SELanguage::_get(203); ?></b><br>
<input type='radio' name='setting_permission_portal' id='permission_portal_1' value='1'<?php if ($this->_tpl_vars['setting']['setting_permission_portal'] == 1): ?> CHECKED<?php endif; ?>><label for='permission_portal_1'><?php echo SELanguage::_get(204); ?></label><br>
<input type='radio' name='setting_permission_portal' id='permission_portal_0' value='0'<?php if ($this->_tpl_vars['setting']['setting_permission_portal'] == 0): ?> CHECKED<?php endif; ?>><label for='permission_portal_0'><?php echo SELanguage::_get(205); ?></label><br>
</td>
</tr>
</table>

<br>

<table cellpadding='0' cellspacing='0' width='600'>
<tr>
<td class='header'><?php echo SELanguage::_get(206); ?></td>
</tr>
<tr>
<td class='setting1'>
<?php echo SELanguage::_get(207); ?>
</td>
</tr>
<tr>
<td class='setting2'>
<select name='setting_timezone' class='text'>
<option value='-8'<?php if ($this->_tpl_vars['setting']['setting_timezone'] == "-8"): ?> SELECTED<?php endif; ?>>Pacific Time (US & Canada)</option>
<option value='-7'<?php if ($this->_tpl_vars['setting']['setting_timezone'] == "-7"): ?> SELECTED<?php endif; ?>>Mountain Time (US & Canada)</option>
<option value='-6'<?php if ($this->_tpl_vars['setting']['setting_timezone'] == "-6"): ?> SELECTED<?php endif; ?>>Central Time (US & Canada)</option>
<option value='-5'<?php if ($this->_tpl_vars['setting']['setting_timezone'] == "-5"): ?> SELECTED<?php endif; ?>>Eastern Time (US & Canada)</option>
<option value='-4'<?php if ($this->_tpl_vars['setting']['setting_timezone'] == "-4"): ?> SELECTED<?php endif; ?>>Atlantic Time (Canada)</option>
<option value='-9'<?php if ($this->_tpl_vars['setting']['setting_timezone'] == "-9"): ?> SELECTED<?php endif; ?>>Alaska (US & Canada)</option>
<option value='-10'<?php if ($this->_tpl_vars['setting']['setting_timezone'] == "-10"): ?> SELECTED<?php endif; ?>>Hawaii (US)</option>
<option value='-11'<?php if ($this->_tpl_vars['setting']['setting_timezone'] == "-11"): ?> SELECTED<?php endif; ?>>Midway Island, Samoa</option>
<option value='-12'<?php if ($this->_tpl_vars['setting']['setting_timezone'] == "-12"): ?> SELECTED<?php endif; ?>>Eniwetok, Kwajalein</option>
<option value='-3.3'<?php if ($this->_tpl_vars['setting']['setting_timezone'] == "-3.3"): ?> SELECTED<?php endif; ?>>Newfoundland</option>
<option value='-3'<?php if ($this->_tpl_vars['setting']['setting_timezone'] == "-3"): ?> SELECTED<?php endif; ?>>Brasilia, Buenos Aires, Georgetown</option>
<option value='-2'<?php if ($this->_tpl_vars['setting']['setting_timezone'] == "-2"): ?> SELECTED<?php endif; ?>>Mid-Atlantic</option>
<option value='-1'<?php if ($this->_tpl_vars['setting']['setting_timezone'] == "-1"): ?> SELECTED<?php endif; ?>>Azores, Cape Verde Is.</option>
<option value='0'<?php if ($this->_tpl_vars['setting']['setting_timezone'] == '0'): ?> SELECTED<?php endif; ?>>Greenwich Mean Time (Lisbon, London)</option>
<option value='1'<?php if ($this->_tpl_vars['setting']['setting_timezone'] == '1'): ?> SELECTED<?php endif; ?>>Amsterdam, Berlin, Paris, Rome, Madrid</option>
<option value='2'<?php if ($this->_tpl_vars['setting']['setting_timezone'] == '2'): ?> SELECTED<?php endif; ?>>Athens, Helsinki, Istanbul, Cairo, E. Europe</option>
<option value='3'<?php if ($this->_tpl_vars['setting']['setting_timezone'] == '3'): ?> SELECTED<?php endif; ?>>Baghdad, Kuwait, Nairobi, Moscow</option>
<option value='3.3'<?php if ($this->_tpl_vars['setting']['setting_timezone'] == "3.3"): ?> SELECTED<?php endif; ?>>Tehran</option>
<option value='4'<?php if ($this->_tpl_vars['setting']['setting_timezone'] == '4'): ?> SELECTED<?php endif; ?>>Abu Dhabi, Kazan, Muscat</option>
<option value='4.3'<?php if ($this->_tpl_vars['setting']['setting_timezone'] == "4.3"): ?> SELECTED<?php endif; ?>>Kabul</option>
<option value='5'<?php if ($this->_tpl_vars['setting']['setting_timezone'] == '5'): ?> SELECTED<?php endif; ?>>Islamabad, Karachi, Tashkent</option>
<option value='5.5'<?php if ($this->_tpl_vars['setting']['setting_timezone'] == "5.5"): ?> SELECTED<?php endif; ?>>Bombay, Calcutta, New Delhi</option>
<option value='6'<?php if ($this->_tpl_vars['setting']['setting_timezone'] == '6'): ?> SELECTED<?php endif; ?>>Almaty, Dhaka</option>
<option value='7'<?php if ($this->_tpl_vars['setting']['setting_timezone'] == '7'): ?> SELECTED<?php endif; ?>>Bangkok, Jakarta, Hanoi</option>
<option value='8'<?php if ($this->_tpl_vars['setting']['setting_timezone'] == '8'): ?> SELECTED<?php endif; ?>>Beijing, Hong Kong, Singapore, Taipei</option>
<option value='9'<?php if ($this->_tpl_vars['setting']['setting_timezone'] == '9'): ?> SELECTED<?php endif; ?>>Tokyo, Osaka, Sapporto, Seoul, Yakutsk</option>
<option value='9.3'<?php if ($this->_tpl_vars['setting']['setting_timezone'] == "9.3"): ?> SELECTED<?php endif; ?>>Adelaide, Darwin</option>
<option value='10'<?php if ($this->_tpl_vars['setting']['setting_timezone'] == '10'): ?> SELECTED<?php endif; ?>>Brisbane, Melbourne, Sydney, Guam</option>
<option value='11'<?php if ($this->_tpl_vars['setting']['setting_timezone'] == '11'): ?> SELECTED<?php endif; ?>>Magadan, Soloman Is., New Caledonia</option>
<option value='12'<?php if ($this->_tpl_vars['setting']['setting_timezone'] == '12'): ?> SELECTED<?php endif; ?>>Fiji, Kamchatka, Marshall Is., Wellington</option>
</select>
</td>
</tr>
</table>

<br>

<table cellpadding='0' cellspacing='0' width='600'>
<tr>
<td class='header'><?php echo SELanguage::_get(208); ?></td>
</tr>
<tr>
<td class='setting1'>
<?php echo SELanguage::_get(209); ?>
</td>
</tr>
<tr>
<td class='setting2'>
<select name='setting_dateformat' class='text'>
<option value='n/j/Y'<?php if ($this->_tpl_vars['setting']['setting_dateformat'] == "n/j/Y"): ?> SELECTED<?php endif; ?>>7/17/2006</option>
<option value='n.j.Y'<?php if ($this->_tpl_vars['setting']['setting_dateformat'] == "n.j.Y"): ?> SELECTED<?php endif; ?>>7.17.2006</option>
<option value='n-j-Y'<?php if ($this->_tpl_vars['setting']['setting_dateformat'] == "n-j-Y"): ?> SELECTED<?php endif; ?>>7-17-2006</option>
<option value='Y/n/j'<?php if ($this->_tpl_vars['setting']['setting_dateformat'] == "Y/n/j"): ?> SELECTED<?php endif; ?>>2006/7/17</option>
<option value='Y-n-j'<?php if ($this->_tpl_vars['setting']['setting_dateformat'] == "Y-n-j"): ?> SELECTED<?php endif; ?>>2006-7-17</option>
<option value='Y-m-d'<?php if ($this->_tpl_vars['setting']['setting_dateformat'] == "Y-m-d"): ?> SELECTED<?php endif; ?>>2006-07-17</option>
<option value='Ynj'<?php if ($this->_tpl_vars['setting']['setting_dateformat'] == 'Ynj'): ?> SELECTED<?php endif; ?>>2006717</option>
<option value='j/n/Y'<?php if ($this->_tpl_vars['setting']['setting_dateformat'] == "j/n/Y"): ?> SELECTED<?php endif; ?>>17/7/2006</option>
<option value='j.n.Y'<?php if ($this->_tpl_vars['setting']['setting_dateformat'] == "j.n.Y"): ?> SELECTED<?php endif; ?>>17.7.2006</option>
<option value='M. j, Y'<?php if ($this->_tpl_vars['setting']['setting_dateformat'] == "M. j, Y"): ?> SELECTED<?php endif; ?>>Jul. 17, 2006</option>
<option value='F j, Y'<?php if ($this->_tpl_vars['setting']['setting_dateformat'] == "F j, Y"): ?> SELECTED<?php endif; ?>>July 17, 2006</option>
<option value='j F Y'<?php if ($this->_tpl_vars['setting']['setting_dateformat'] == 'j F Y'): ?> SELECTED<?php endif; ?>>17 July 2006</option>
<option value='l, F j, Y'<?php if ($this->_tpl_vars['setting']['setting_dateformat'] == "l, F j, Y"): ?> SELECTED<?php endif; ?>>Monday, July 17, 2006</option>
<option value='D-j-M-Y'<?php if ($this->_tpl_vars['setting']['setting_dateformat'] == "D-j-M-Y"): ?> SELECTED<?php endif; ?>>Mon-17-Jul-2006</option>
<option value='D j M Y'<?php if ($this->_tpl_vars['setting']['setting_dateformat'] == 'D j M Y'): ?> SELECTED<?php endif; ?>>Mon 17 Jul 2006</option>
<option value='D j F Y'<?php if ($this->_tpl_vars['setting']['setting_dateformat'] == 'D j F Y'): ?> SELECTED<?php endif; ?>>Mon 17 July 2006</option>
<option value='l j F Y'<?php if ($this->_tpl_vars['setting']['setting_dateformat'] == 'l j F Y'): ?> SELECTED<?php endif; ?>>Monday 17 July 2006</option>
<option value='Y-M-j'<?php if ($this->_tpl_vars['setting']['setting_dateformat'] == "Y-M-j"): ?> SELECTED<?php endif; ?>>2006-Jul-17</option>
<option value='j-M-Y'<?php if ($this->_tpl_vars['setting']['setting_dateformat'] == "j-M-Y"): ?> SELECTED<?php endif; ?>>17-Jul-2006</option>
</select>
<select name='setting_timeformat' class='text'>
<option value='g:i A'<?php if ($this->_tpl_vars['setting']['setting_timeformat'] == "g:i A"): ?> SELECTED<?php endif; ?>>9:30 PM</option>
<option value='h:i A'<?php if ($this->_tpl_vars['setting']['setting_timeformat'] == "h:i A"): ?> SELECTED<?php endif; ?>>09:30 PM</option>
<option value='g:i'<?php if ($this->_tpl_vars['setting']['setting_timeformat'] == "g:i"): ?> SELECTED<?php endif; ?>>9:30</option>
<option value='h:i'<?php if ($this->_tpl_vars['setting']['setting_timeformat'] == "h:i"): ?> SELECTED<?php endif; ?>>09:30</option>
<option value='H:i'<?php if ($this->_tpl_vars['setting']['setting_timeformat'] == "H:i"): ?> SELECTED<?php endif; ?>>21:30</option>
<option value='H\hi'<?php if ($this->_tpl_vars['setting']['setting_timeformat'] == "H\hi"): ?> SELECTED<?php endif; ?>>21h30</option>
</select>
</td>
</tr>
</table>

<br>

<table cellpadding='0' cellspacing='0' width='600'>
<tr>
<td class='header'><?php echo SELanguage::_get(1148); ?></td>
</tr>
<tr>
<td class='setting1'>
<?php echo SELanguage::_get(1149); ?>
</td>
</tr>
<tr>
<td class='setting2'>
  <table cellpadding='0' cellspacing='0'>
  <tr><td><input type='radio' name='setting_username' id='username_1' value='1'<?php if ($this->_tpl_vars['setting']['setting_username'] == 1): ?> CHECKED<?php endif; ?>>&nbsp;</td><td><label for='username_1'><?php echo SELanguage::_get(1150); ?></label></td></tr>
  <tr><td><input type='radio' name='setting_username' id='username_0' value='0'<?php if ($this->_tpl_vars['setting']['setting_username'] == 0): ?> CHECKED<?php endif; ?>>&nbsp;</td><td><label for='username_0'><?php echo SELanguage::_get(1151); ?></label></td></tr>
  </table>
</td>
</tr>
</table>

<br>

<table cellpadding='0' cellspacing='0' width='600'>
<tr>
<td class='header'><?php echo SELanguage::_get(892); ?></td>
</tr>
<tr>
<td class='setting1'>
<?php echo SELanguage::_get(893); ?>
</td>
</tr>
<tr>
<td class='setting2'>
<input type='text' class='text' name='setting_comment_html' value='<?php echo $this->_tpl_vars['setting']['setting_comment_html']; ?>
' maxlength='250' size='60'>
</td>
</tr>
</table>

<br>

<input type='submit' class='button' value='<?php echo SELanguage::_get(173); ?>'>
<input type='hidden' name='task' value='dosave'>
</form>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin_footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>