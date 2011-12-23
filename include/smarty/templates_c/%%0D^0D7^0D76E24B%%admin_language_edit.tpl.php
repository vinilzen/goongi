<?php /* Smarty version 2.6.14, created on 2011-12-23 14:13:30
         compiled from admin_language_edit.tpl */
?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'math', 'admin_language_edit.tpl', 37, false),array('modifier', 'count', 'admin_language_edit.tpl', 144, false),)), $this);
?><?php
SELanguage::_preload_multi(49,178,179,1018,349,180,181,182,184,185,183,87,186,1159,1160,187,582,188,189,39);
SELanguage::load();
?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin_header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<h2><a href='admin_language.php'><?php echo SELanguage::_get(49); ?></a>: <?php echo $this->_tpl_vars['language']['language_name']; ?>
</h2>
<?php echo SELanguage::_get(178); ?>

<br><br>

<?php if ($this->_tpl_vars['total_vars'] == 0 && $this->_tpl_vars['phrase'] == "" && $this->_tpl_vars['phrase_id'] == ""): 
 echo SELanguage::_get(179); 
 else: ?>

    <table cellpadding='0' cellspacing='0' align='center'><tr><td align='center'>
  <div class='box'>
  <form action='admin_language_edit.php' method='get'>
  <div style='float: left; text-align: left; padding-right: 5px;'><?php echo SELanguage::_get(1018); ?><br><input type='text' class='text' name='phrase_id' value='<?php echo $this->_tpl_vars['phrase_id']; ?>
' size='5'></div>
  <div style='float: left; text-align: center; padding-right: 5px; padding-top: 17px; font-weight: bold;'><?php echo SELanguage::_get(349); ?></div>
  <div style='float: left; text-align: left; padding-right: 5px;'><?php echo SELanguage::_get(180); ?><br><input type='text' class='text' name='phrase' value='<?php echo $this->_tpl_vars['phrase']; ?>
' size='35'></div>
  <div style='float: left; padding-top: 5px;'><input type='submit' class='button' value='<?php echo SELanguage::_get(181); ?>'></div>
  <input type='hidden' name='language_id' value='<?php echo $this->_tpl_vars['language']['language_id']; ?>
'>
  </form>
  <div style='clear: both;'></div>
  </div>
  </td></tr></table>

  <br>

    <?php if ($this->_tpl_vars['maxpage'] > 1): ?>
    <div align='center'>
      <?php if ($this->_tpl_vars['p'] != 1): ?><a href='admin_language_edit.php?language_id=<?php echo $this->_tpl_vars['language']['language_id']; ?>
&phrase=<?php echo $this->_tpl_vars['phrase']; ?>
&p=<?php echo smarty_function_math(array('equation' => 'p-1','p' => $this->_tpl_vars['p']), $this);?>
'>&#171; <?php echo SELanguage::_get(182); ?></a><?php else: ?><font class='disabled'>&#171; <?php echo SELanguage::_get(182); ?></font><?php endif; ?>
      <?php if ($this->_tpl_vars['p_start'] == $this->_tpl_vars['p_end']): ?>
        &nbsp;|&nbsp; <?php echo sprintf(SELanguage::_get(184), $this->_tpl_vars['p_start'], $this->_tpl_vars['total_vars']); ?> &nbsp;|&nbsp; 
      <?php else: ?>
        &nbsp;|&nbsp; <?php echo sprintf(SELanguage::_get(185), $this->_tpl_vars['p_start'], $this->_tpl_vars['p_end'], $this->_tpl_vars['total_vars']); ?> &nbsp;|&nbsp; 
      <?php endif; ?>
      <?php if ($this->_tpl_vars['p'] != $this->_tpl_vars['maxpage']): ?><a href='admin_language_edit.php?language_id=<?php echo $this->_tpl_vars['language']['language_id']; ?>
&phrase=<?php echo $this->_tpl_vars['phrase']; ?>
&p=<?php echo smarty_function_math(array('equation' => 'p+1','p' => $this->_tpl_vars['p']), $this);?>
'><?php echo SELanguage::_get(183); ?> &#187;</a><?php else: ?><font class='disabled'><?php echo SELanguage::_get(183); ?> &#187;</font><?php endif; ?>
      </div>
    </div>
  <?php endif; ?>

  <table cellpadding='0' cellspacing='0' class='list'>
  <tr>
  <td class='header' width='20'><?php echo SELanguage::_get(87); ?></td>
  <td class='header' width='20'>&nbsp;</td>
  <td class='header'><?php echo SELanguage::_get(186); ?></td>
  <td class='header' width='100' align='center'><?php echo SELanguage::_get(1159); ?></td>
  <td class='header' width='150' align='right'><?php echo SELanguage::_get(1160); ?></td>
  </tr>
  <?php unset($this->_sections['var_loop']);
$this->_sections['var_loop']['name'] = 'var_loop';
$this->_sections['var_loop']['loop'] = is_array($_loop=$this->_tpl_vars['langvars']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['var_loop']['show'] = true;
$this->_sections['var_loop']['max'] = $this->_sections['var_loop']['loop'];
$this->_sections['var_loop']['step'] = 1;
$this->_sections['var_loop']['start'] = $this->_sections['var_loop']['step'] > 0 ? 0 : $this->_sections['var_loop']['loop']-1;
if ($this->_sections['var_loop']['show']) {
    $this->_sections['var_loop']['total'] = $this->_sections['var_loop']['loop'];
    if ($this->_sections['var_loop']['total'] == 0)
        $this->_sections['var_loop']['show'] = false;
} else
    $this->_sections['var_loop']['total'] = 0;
if ($this->_sections['var_loop']['show']):

            for ($this->_sections['var_loop']['index'] = $this->_sections['var_loop']['start'], $this->_sections['var_loop']['iteration'] = 1;
                 $this->_sections['var_loop']['iteration'] <= $this->_sections['var_loop']['total'];
                 $this->_sections['var_loop']['index'] += $this->_sections['var_loop']['step'], $this->_sections['var_loop']['iteration']++):
$this->_sections['var_loop']['rownum'] = $this->_sections['var_loop']['iteration'];
$this->_sections['var_loop']['index_prev'] = $this->_sections['var_loop']['index'] - $this->_sections['var_loop']['step'];
$this->_sections['var_loop']['index_next'] = $this->_sections['var_loop']['index'] + $this->_sections['var_loop']['step'];
$this->_sections['var_loop']['first']      = ($this->_sections['var_loop']['iteration'] == 1);
$this->_sections['var_loop']['last']       = ($this->_sections['var_loop']['iteration'] == $this->_sections['var_loop']['total']);
?>
    <tr class='background1' id='tr_<?php echo $this->_tpl_vars['langvars'][$this->_sections['var_loop']['index']]['languagevar_id']; ?>
'>
    <td class='item' valign='top' nowrap='nowrap'><?php echo $this->_tpl_vars['langvars'][$this->_sections['var_loop']['index']]['languagevar_id']; ?>
</td>
    <td class='item' valign='top' nowrap='nowrap'>[ <a href="javascript:void(0);" onclick="editPhrase('<?php echo $this->_tpl_vars['langvars'][$this->_sections['var_loop']['index']]['languagevar_id']; ?>
', <?php echo $this->_sections['var_loop']['index']+1; ?>
);" onFocus="toggleRow('tr_<?php echo $this->_tpl_vars['langvars'][$this->_sections['var_loop']['index']]['languagevar_id']; ?>
');" onBlur="toggleRow('tr_<?php echo $this->_tpl_vars['langvars'][$this->_sections['var_loop']['index']]['languagevar_id']; ?>
');" tabindex='<?php echo $this->_sections['var_loop']['index']+1; ?>
' id='link_<?php echo $this->_sections['var_loop']['index']+1; ?>
'><?php echo SELanguage::_get(187); ?></a> ]</td>
    <td class='item'><span id='span_<?php echo $this->_tpl_vars['langvars'][$this->_sections['var_loop']['index']]['languagevar_id']; ?>
'><?php echo $this->_tpl_vars['langvars'][$this->_sections['var_loop']['index']]['languagevar_value']; ?>
</span></td>
    <td class='item' align='center'><?php echo $this->_tpl_vars['langvars'][$this->_sections['var_loop']['index']]['languagevar_category']; ?>
</td>
    <td class='item' align='right'><?php echo $this->_tpl_vars['langvars'][$this->_sections['var_loop']['index']]['languagevar_default']; ?>
</td>
    </tr>
  <?php endfor; else: ?>
    <tr class='background1'>
    <td colspan='6' class='item' align='center'>
      <?php echo SELanguage::_get(582); ?>
    </td>
    </tr>
  <?php endif; ?>
  </table>

    <?php echo '
  <script type="text/javascript">
  <!--
  function toggleRow(id1) {
    if($(id1).className == "background2") {
      $(id1).className = "background1"; 
    } else if($(id1).className == "background1") {
      $(id1).className = "background2";
    }
  }
  //-->
  </script>
  '; ?>

  
    <?php if ($this->_tpl_vars['maxpage'] > 1): ?>
    <div align='center'>
      <?php if ($this->_tpl_vars['p'] != 1): ?><a href='admin_language_edit.php?language_id=<?php echo $this->_tpl_vars['language']['language_id']; ?>
&phrase=<?php echo $this->_tpl_vars['phrase']; ?>
&p=<?php echo smarty_function_math(array('equation' => 'p-1','p' => $this->_tpl_vars['p']), $this);?>
'>&#171; <?php echo SELanguage::_get(182); ?></a><?php else: ?><font class='disabled'>&#171; <?php echo SELanguage::_get(182); ?></font><?php endif; ?>
      <?php if ($this->_tpl_vars['p_start'] == $this->_tpl_vars['p_end']): ?>
        &nbsp;|&nbsp; <?php echo sprintf(SELanguage::_get(184), $this->_tpl_vars['p_start'], $this->_tpl_vars['total_vars']); ?> &nbsp;|&nbsp; 
      <?php else: ?>
        &nbsp;|&nbsp; <?php echo sprintf(SELanguage::_get(185), $this->_tpl_vars['p_start'], $this->_tpl_vars['p_end'], $this->_tpl_vars['total_vars']); ?> &nbsp;|&nbsp; 
      <?php endif; ?>
      <?php if ($this->_tpl_vars['p'] != $this->_tpl_vars['maxpage']): ?><a href='admin_language_edit.php?language_id=<?php echo $this->_tpl_vars['language']['language_id']; ?>
&phrase=<?php echo $this->_tpl_vars['phrase']; ?>
&p=<?php echo smarty_function_math(array('equation' => 'p+1','p' => $this->_tpl_vars['p']), $this);?>
'><?php echo SELanguage::_get(183); ?> &#187;</a><?php else: ?><font class='disabled'><?php echo SELanguage::_get(183); ?> &#187;</font><?php endif; ?>
      </div>
    </div>
  <?php endif; ?>


    <?php echo '
  <script type="text/javascript">
  <!-- 
  var current_tabindex = 1;
  function editPhrase(id, tabindex) {
    current_tabindex = tabindex+1;
    $(\'languagevar_id\').value = id;
    var request = new Request.JSON({secure: false, url: \'admin_language_edit.php?task=getphrase&languagevar_id=\'+id,
		onComplete: function(jsonObj) { 
			edit(jsonObj.phrases);
		}
    }).send();
  }
  function edit(phrases) {
    phrases.each(function(phrase) {
      for(var x in phrase) {
        $(\'var_\'+x).innerHTML = phrase[x];
      }
    });

    TB_show(\''; 
 echo SELanguage::_get(188); 
 echo '\', \'#TB_inline?height=400&width=600&inlineId=editphrase\', \'\', \'../images/trans.gif\');
    setTimeout("$(\'TB_window\').getElementById(\'var_'; 
 echo $this->_tpl_vars['language']['language_id']; 
 echo '\').focus();$(\'TB_window\').getElementById(\'var_'; 
 echo $this->_tpl_vars['language']['language_id']; 
 echo '\').select();", "300");
  }
  function edit_result(id, phrase_value) {
    $(\'span_\'+id).innerHTML = phrase_value.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;");
    changefocus();
  }
  function changefocus() {
    if($(\'link_\'+current_tabindex)) $(\'link_\'+current_tabindex).focus();
  }
  //-->
  </script>
  '; ?>


    <div style='display: none;' id='editphrase'>
  <form action='admin_language_edit.php' method='post' name='editform' target='ajaxframe' onSubmit='parent.TB_remove();'>
  <?php echo SELanguage::_get(189); ?><br><br>
  <?php unset($this->_sections['lang_loop']);
$this->_sections['lang_loop']['name'] = 'lang_loop';
$this->_sections['lang_loop']['loop'] = is_array($_loop=$this->_tpl_vars['lang_packlist']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['lang_loop']['show'] = true;
$this->_sections['lang_loop']['max'] = $this->_sections['lang_loop']['loop'];
$this->_sections['lang_loop']['step'] = 1;
$this->_sections['lang_loop']['start'] = $this->_sections['lang_loop']['step'] > 0 ? 0 : $this->_sections['lang_loop']['loop']-1;
if ($this->_sections['lang_loop']['show']) {
    $this->_sections['lang_loop']['total'] = $this->_sections['lang_loop']['loop'];
    if ($this->_sections['lang_loop']['total'] == 0)
        $this->_sections['lang_loop']['show'] = false;
} else
    $this->_sections['lang_loop']['total'] = 0;
if ($this->_sections['lang_loop']['show']):

            for ($this->_sections['lang_loop']['index'] = $this->_sections['lang_loop']['start'], $this->_sections['lang_loop']['iteration'] = 1;
                 $this->_sections['lang_loop']['iteration'] <= $this->_sections['lang_loop']['total'];
                 $this->_sections['lang_loop']['index'] += $this->_sections['lang_loop']['step'], $this->_sections['lang_loop']['iteration']++):
$this->_sections['lang_loop']['rownum'] = $this->_sections['lang_loop']['iteration'];
$this->_sections['lang_loop']['index_prev'] = $this->_sections['lang_loop']['index'] - $this->_sections['lang_loop']['step'];
$this->_sections['lang_loop']['index_next'] = $this->_sections['lang_loop']['index'] + $this->_sections['lang_loop']['step'];
$this->_sections['lang_loop']['first']      = ($this->_sections['lang_loop']['iteration'] == 1);
$this->_sections['lang_loop']['last']       = ($this->_sections['lang_loop']['iteration'] == $this->_sections['lang_loop']['total']);
?>
    <?php echo $this->_tpl_vars['lang_packlist'][$this->_sections['lang_loop']['index']]['language_name']; ?>
<br>
    <textarea name='languagevar_value[<?php echo $this->_tpl_vars['lang_packlist'][$this->_sections['lang_loop']['index']]['language_id']; ?>
]' id='var_<?php echo $this->_tpl_vars['lang_packlist'][$this->_sections['lang_loop']['index']]['language_id']; ?>
' cols='25' rows='7' onFocus='this.select();' tabindex='<?php echo smarty_function_math(array('equation' => 'x+y+1','x' => count($this->_tpl_vars['langvars']),'y' => $this->_sections['lang_loop']['index']), $this);?>
' class='text' style='width: 100%; font-size: 12px;'></textarea>
    <br><br>
  <?php endfor; endif; ?>
  <input type='submit' class='button' value='<?php echo SELanguage::_get(188); ?>' tabindex='<?php echo smarty_function_math(array('equation' => 'x+y+1','x' => count($this->_tpl_vars['langvars']),'y' => count($this->_tpl_vars['lang_packlist'])), $this);?>
'> <input type='button' class='button' value='<?php echo SELanguage::_get(39); ?>' onClick='parent.TB_remove();parent.changefocus();' tabindex='<?php echo smarty_function_math(array('equation' => 'x+y+1','x' => count($this->_tpl_vars['langvars']),'y' => count($this->_tpl_vars['lang_packlist'])), $this);?>
'>
  <input type='hidden' name='task' value='edit'>
  <input type='hidden' name='languagevar_id' id='languagevar_id' value=''>
  <input type='hidden' name='language_id' value='<?php echo $this->_tpl_vars['language']['language_id']; ?>
'>
  <input type='hidden' name='p' value='<?php echo $this->_tpl_vars['p']; ?>
'>
  <input type='hidden' name='phrase' value='<?php echo $this->_tpl_vars['phrase']; ?>
'>
  </form>
  </div>

<?php endif; 
 $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin_footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>