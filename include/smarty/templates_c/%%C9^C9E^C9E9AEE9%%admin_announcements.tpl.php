<?php /* Smarty version 2.6.14, created on 2011-11-01 16:55:08
         compiled from admin_announcements.tpl */
?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'admin_announcements.tpl', 17, false),array('modifier', 'truncate', 'admin_announcements.tpl', 28, false),array('function', 'cycle', 'admin_announcements.tpl', 25, false),)), $this);
?><?php
SELanguage::_preload_multi(23,583,584,585,586,587,87,588,153,589,590,187,591,155,598,597,592,608,610,599,175,39,593,88,594,520,595,596,606,607,600,601,602,603,604,8,9,382,383,605,609,611,466);
SELanguage::load();
?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin_header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<h2><?php echo SELanguage::_get(23); ?></h2>
<?php echo SELanguage::_get(583); ?>
<br><br>
<b><a href='javascript: composeEmail();'><?php echo SELanguage::_get(584); ?></a></b>
<br><?php echo SELanguage::_get(585); ?>
<br><br>
<b><a href='javascript: postNews();'><?php echo SELanguage::_get(586); ?></a></b>
<br><?php echo SELanguage::_get(587); ?>

<br><br>

<?php if (count($this->_tpl_vars['news']) > 0): ?>
  <table cellpadding='0' cellspacing='0' class='list'>
  <tr>
  <td class='header' width='10'><?php echo SELanguage::_get(87); ?></td>
  <td class='header' width='80%'><?php echo SELanguage::_get(588); ?></td>
  <td class='header' width='50'><?php echo SELanguage::_get(153); ?></td>
  </tr>
  <?php unset($this->_sections['news_loop']);
$this->_sections['news_loop']['name'] = 'news_loop';
$this->_sections['news_loop']['loop'] = is_array($_loop=$this->_tpl_vars['news']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['news_loop']['show'] = true;
$this->_sections['news_loop']['max'] = $this->_sections['news_loop']['loop'];
$this->_sections['news_loop']['step'] = 1;
$this->_sections['news_loop']['start'] = $this->_sections['news_loop']['step'] > 0 ? 0 : $this->_sections['news_loop']['loop']-1;
if ($this->_sections['news_loop']['show']) {
    $this->_sections['news_loop']['total'] = $this->_sections['news_loop']['loop'];
    if ($this->_sections['news_loop']['total'] == 0)
        $this->_sections['news_loop']['show'] = false;
} else
    $this->_sections['news_loop']['total'] = 0;
if ($this->_sections['news_loop']['show']):

            for ($this->_sections['news_loop']['index'] = $this->_sections['news_loop']['start'], $this->_sections['news_loop']['iteration'] = 1;
                 $this->_sections['news_loop']['iteration'] <= $this->_sections['news_loop']['total'];
                 $this->_sections['news_loop']['index'] += $this->_sections['news_loop']['step'], $this->_sections['news_loop']['iteration']++):
$this->_sections['news_loop']['rownum'] = $this->_sections['news_loop']['iteration'];
$this->_sections['news_loop']['index_prev'] = $this->_sections['news_loop']['index'] - $this->_sections['news_loop']['step'];
$this->_sections['news_loop']['index_next'] = $this->_sections['news_loop']['index'] + $this->_sections['news_loop']['step'];
$this->_sections['news_loop']['first']      = ($this->_sections['news_loop']['iteration'] == 1);
$this->_sections['news_loop']['last']       = ($this->_sections['news_loop']['iteration'] == $this->_sections['news_loop']['total']);
?>
    <tr class='<?php echo smarty_function_cycle(array('values' => "background1,background2"), $this);?>
'>
    <td class='item' valign='top'><?php echo $this->_tpl_vars['news'][$this->_sections['news_loop']['index']]['announcement_id']; ?>
</td>
    <td class='item'>
      <div><b><?php if ($this->_tpl_vars['news'][$this->_sections['news_loop']['index']]['announcement_subject'] != ""): 
 echo ((is_array($_tmp=$this->_tpl_vars['news'][$this->_sections['news_loop']['index']]['announcement_subject'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 50, "...", true) : smarty_modifier_truncate($_tmp, 50, "...", true)); 
 else: ?><i><?php echo SELanguage::_get(589); ?></i><?php endif; ?></b></div>
      <div><?php if ($this->_tpl_vars['news'][$this->_sections['news_loop']['index']]['announcement_date'] != ""): 
 echo $this->_tpl_vars['news'][$this->_sections['news_loop']['index']]['announcement_date']; 
 else: ?><i><?php echo SELanguage::_get(590); ?></i><?php endif; ?></div>
      <br><div><?php echo ((is_array($_tmp=$this->_tpl_vars['news'][$this->_sections['news_loop']['index']]['announcement_body'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 300, "...", true) : smarty_modifier_truncate($_tmp, 300, "...", true)); ?>
</div>
    </td>
    <td class='item' valign='top' nowrap='nowrap' align='right'>
      [ <a href="javascript:editNews('<?php echo $this->_tpl_vars['news'][$this->_sections['news_loop']['index']]['announcement_id']; ?>
');"><?php echo SELanguage::_get(187); ?></a> ]<br>
      <?php if ($this->_sections['news_loop']['last'] != true): ?>[ <a href='admin_announcements.php?task=moveup&announcement_id=<?php echo $this->_tpl_vars['news'][$this->_sections['news_loop']['index']]['announcement_id']; ?>
'><?php echo SELanguage::_get(591); ?></a> ]<br><?php endif; ?>
      [ <a href="javascript:confirmDelete('<?php echo $this->_tpl_vars['news'][$this->_sections['news_loop']['index']]['announcement_id']; ?>
');"><?php echo SELanguage::_get(155); ?></a> ]
    </td>
    </tr>
  <?php endfor; endif; ?>
  </table>
<?php endif; 
 echo '
<script type="text/javascript">
<!-- 
var announcement_id = 0;
function confirmDelete(id) {
  announcement_id = id;
  TB_show(\''; 
 echo SELanguage::_get(598); 
 echo '\', \'#TB_inline?height=150&width=300&inlineId=confirmdelete\', \'\', \'../images/trans.gif\');

}

function deleteNews() {
  window.location = \'admin_announcements.php?task=deletenews&announcement_id=\'+announcement_id;
}

function editNews(id) {
  $(\'announcement_id\').value = id;
  var url = \'admin_announcements.php?task=getnews&announcement_id=\'+id;
  var request = new Request.JSON({secure: false, url: url,
	onComplete: function(jsonObj) {
		edit(jsonObj);
	}
  }).send();
}

function edit(announcement) {
  $(\'announcement_date\').value = announcement.date;
  $(\'announcement_date\').defaultValue = announcement.date;
  $(\'announcement_subject\').value = announcement.subject;
  $(\'announcement_subject\').defaultValue = announcement.subject;
  $(\'announcement_body\').innerHTML = announcement.body;
  TB_show(\''; 
 echo SELanguage::_get(597); 
 echo '\', \'#TB_inline?height=400&width=600&inlineId=postnews\', \'\', \'../images/trans.gif\');
}

function postNews() {
  $(\'announcement_date\').value = \'\';
  $(\'announcement_date\').defaultValue = \'\';
  $(\'announcement_subject\').value = \'\';
  $(\'announcement_subject\').defaultValue = \'\';
  $(\'announcement_body\').innerHTML = \'\';
  TB_show(\''; 
 echo SELanguage::_get(592); 
 echo '\', \'#TB_inline?height=400&width=500&inlineId=postnews\', \'\', \'../images/trans.gif\');
}


function composeEmail() {
  TB_show(\''; 
 echo SELanguage::_get(584); 
 echo '\', \'#TB_inline?height=450&width=600&inlineId=composeemail\', \'\', \'../images/trans.gif\');
}

function sendEmail(start, total_users) {
  start = parseInt(start);
  total_users = parseInt(total_users);

  if(start == 0) {
    TB_show(\''; 
 echo SELanguage::_get(608); 
 echo '\', \'#TB_inline?height=150&width=300&inlineId=sendemail\', \'\', \'../images/trans.gif\', 1);
    setTimeout("ajaxframe.document.emailform.submit();", 3000);
  } else if(start >= total_users) {
    TB_show(\''; 
 echo SELanguage::_get(610); 
 echo '\', \'#TB_inline?height=150&width=300&inlineId=emailcomplete\', \'\', \'../images/trans.gif\');
  } else {
    setTimeout("ajaxframe.document.emailform.submit();", 3000);
  }
}

//-->
</script>
'; ?>


<div style='display: none;' id='confirmdelete'>
  <div style='margin-top: 10px;'>
    <?php echo SELanguage::_get(599); ?>
  </div>
  <br>
  <input type='button' class='button' value='<?php echo SELanguage::_get(175); ?>' onClick='parent.TB_remove();parent.deleteNews();'> <input type='button' class='button' value='<?php echo SELanguage::_get(39); ?>' onClick='parent.TB_remove();'>
</div>


<div style='display: none;' id='postnews'>
  <form action='admin_announcements.php' method='post' target='_parent'>
  <div style='margin-top: 10px;'><?php echo SELanguage::_get(593); ?></div>
  <br>
  <b><?php echo SELanguage::_get(88); ?></b>
  <br><input type='text' name='date' id='announcement_date' size='50' class='text' maxlength='200'>
  <br><?php echo SELanguage::_get(594); ?>
  <br><br>
  <b><?php echo SELanguage::_get(520); ?></b>
  <br><input type='text' name='subject' id='announcement_subject' size='50' class='text' maxlength='200'>
  <br><br>
  <b><?php echo SELanguage::_get(588); ?></b> <?php echo SELanguage::_get(595); ?>
  <br><textarea name='body' id='announcement_body' class='text' rows='7' cols='80'></textarea>
  <br><br>
  <input type='submit' class='button' value='<?php echo SELanguage::_get(596); ?>'>&nbsp;<input type='button' class='button' value='<?php echo SELanguage::_get(39); ?>' onClick='parent.TB_remove();'>
  <input type='hidden' name='task' value='postnews'>
  <input type='hidden' name='announcement_id' id='announcement_id' value='0'>
  </form>
</div>


<div style='display: none;' id='composeemail'>
  <form action='admin_announcements.php' method='post' target='ajaxframe' onSubmit="<?php echo 'if(this.message.value == \'\'){ alert(\''; 
 echo SELanguage::_get(606); 
 echo '\'); return false;}else if($(this).getElement(\'select[id=levels]\').value == \'\' && $(this).getElement(\'select[id=subnets]\').value == \'\') {alert(\''; 
 echo SELanguage::_get(607); 
 echo '\'); return false; }else{ return true; }'; ?>
">
  <div style='margin-top: 10px;'><?php echo SELanguage::_get(600); ?></div>
  <br>
  <b><?php echo SELanguage::_get(601); ?></b>
  <br><input type='text' name='from' size='50' class='text' maxlength='200' value='<?php echo $this->_tpl_vars['admin']->admin_info['admin_name']; ?>
 <<?php echo $this->_tpl_vars['admin']->admin_info['admin_email']; ?>
>'>
  <br><br>
  <b><?php echo SELanguage::_get(520); ?></b>
  <br><input type='text' name='subject' size='50' class='text' maxlength='200'>
  <br><br>
  <b><?php echo SELanguage::_get(588); ?></b>
  <br><textarea name='message' class='text' rows='7' cols='80'></textarea>
  <br><br>
  <b><?php echo SELanguage::_get(602); ?></b>
  <br><select class='text' name='emails_at_a_time'>
  <option value='1'>1</option>
  <option value='2'>2</option>
  <option value='3'>3</option>
  <option value='4'>4</option>
  <option value='5'>5</option>
  </select>
  <br><br>

    <?php if (count($this->_tpl_vars['levels']) > 10 || count($this->_tpl_vars['subnets']) + 1 > 10): ?>
    <?php $this->assign('options_to_show', '10'); ?>
  <?php elseif (count($this->_tpl_vars['levels']) > count($this->_tpl_vars['subnets']) + 1): ?>
    <?php $this->assign('options_to_show', count($this->_tpl_vars['levels'])); ?>
  <?php elseif (count($this->_tpl_vars['levels']) < count($this->_tpl_vars['subnets']) + 1): ?>
    <?php $this->assign('options_to_show', ($this->_tpl_vars['subnets'])."|@count+1"); ?>
  <?php elseif (count($this->_tpl_vars['levels']) == count($this->_tpl_vars['subnets']) + 1): ?>
    <?php $this->assign('options_to_show', count($this->_tpl_vars['levels'])); ?>
  <?php endif; ?>
  <b><?php echo SELanguage::_get(603); ?></b><br><?php echo SELanguage::_get(604); ?>
  <br><br>
    <table cellpadding='0' cellspacing='0'>
    <tr>
    <td><b><?php echo SELanguage::_get(8); ?></b></td>
    <td style='padding-left: 10px;'><b><?php echo SELanguage::_get(9); ?></b></td>
    </tr>
    <tr>
    <td>
      <select size='<?php echo $this->_tpl_vars['options_to_show']; ?>
' class='text' name='levels[]' id='levels' multiple='multiple' style='width: 250px;'>
      <?php unset($this->_sections['level_loop']);
$this->_sections['level_loop']['name'] = 'level_loop';
$this->_sections['level_loop']['loop'] = is_array($_loop=$this->_tpl_vars['levels']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['level_loop']['show'] = true;
$this->_sections['level_loop']['max'] = $this->_sections['level_loop']['loop'];
$this->_sections['level_loop']['step'] = 1;
$this->_sections['level_loop']['start'] = $this->_sections['level_loop']['step'] > 0 ? 0 : $this->_sections['level_loop']['loop']-1;
if ($this->_sections['level_loop']['show']) {
    $this->_sections['level_loop']['total'] = $this->_sections['level_loop']['loop'];
    if ($this->_sections['level_loop']['total'] == 0)
        $this->_sections['level_loop']['show'] = false;
} else
    $this->_sections['level_loop']['total'] = 0;
if ($this->_sections['level_loop']['show']):

            for ($this->_sections['level_loop']['index'] = $this->_sections['level_loop']['start'], $this->_sections['level_loop']['iteration'] = 1;
                 $this->_sections['level_loop']['iteration'] <= $this->_sections['level_loop']['total'];
                 $this->_sections['level_loop']['index'] += $this->_sections['level_loop']['step'], $this->_sections['level_loop']['iteration']++):
$this->_sections['level_loop']['rownum'] = $this->_sections['level_loop']['iteration'];
$this->_sections['level_loop']['index_prev'] = $this->_sections['level_loop']['index'] - $this->_sections['level_loop']['step'];
$this->_sections['level_loop']['index_next'] = $this->_sections['level_loop']['index'] + $this->_sections['level_loop']['step'];
$this->_sections['level_loop']['first']      = ($this->_sections['level_loop']['iteration'] == 1);
$this->_sections['level_loop']['last']       = ($this->_sections['level_loop']['iteration'] == $this->_sections['level_loop']['total']);
?>
        <option value='<?php echo $this->_tpl_vars['levels'][$this->_sections['level_loop']['index']]['level_id']; ?>
' selected='selected'><?php echo ((is_array($_tmp=$this->_tpl_vars['levels'][$this->_sections['level_loop']['index']]['level_name'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 75, "...", true) : smarty_modifier_truncate($_tmp, 75, "...", true)); 
 if ($this->_tpl_vars['levels'][$this->_sections['level_loop']['index']]['level_default'] == 1): ?> <?php echo SELanguage::_get(382); 
 endif; ?></option>
      <?php endfor; endif; ?>
      </select>
    </td>
    <td style='padding-left: 10px;'>
      <select size='<?php echo $this->_tpl_vars['options_to_show']; ?>
' class='text' name='subnets[]' id='subnets' multiple='multiple' style='width: 250px;'>
      <option value='0' selected='selected'><?php echo SELanguage::_get(383); ?></option>
      <?php unset($this->_sections['subnet_loop']);
$this->_sections['subnet_loop']['name'] = 'subnet_loop';
$this->_sections['subnet_loop']['loop'] = is_array($_loop=$this->_tpl_vars['subnets']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['subnet_loop']['show'] = true;
$this->_sections['subnet_loop']['max'] = $this->_sections['subnet_loop']['loop'];
$this->_sections['subnet_loop']['step'] = 1;
$this->_sections['subnet_loop']['start'] = $this->_sections['subnet_loop']['step'] > 0 ? 0 : $this->_sections['subnet_loop']['loop']-1;
if ($this->_sections['subnet_loop']['show']) {
    $this->_sections['subnet_loop']['total'] = $this->_sections['subnet_loop']['loop'];
    if ($this->_sections['subnet_loop']['total'] == 0)
        $this->_sections['subnet_loop']['show'] = false;
} else
    $this->_sections['subnet_loop']['total'] = 0;
if ($this->_sections['subnet_loop']['show']):

            for ($this->_sections['subnet_loop']['index'] = $this->_sections['subnet_loop']['start'], $this->_sections['subnet_loop']['iteration'] = 1;
                 $this->_sections['subnet_loop']['iteration'] <= $this->_sections['subnet_loop']['total'];
                 $this->_sections['subnet_loop']['index'] += $this->_sections['subnet_loop']['step'], $this->_sections['subnet_loop']['iteration']++):
$this->_sections['subnet_loop']['rownum'] = $this->_sections['subnet_loop']['iteration'];
$this->_sections['subnet_loop']['index_prev'] = $this->_sections['subnet_loop']['index'] - $this->_sections['subnet_loop']['step'];
$this->_sections['subnet_loop']['index_next'] = $this->_sections['subnet_loop']['index'] + $this->_sections['subnet_loop']['step'];
$this->_sections['subnet_loop']['first']      = ($this->_sections['subnet_loop']['iteration'] == 1);
$this->_sections['subnet_loop']['last']       = ($this->_sections['subnet_loop']['iteration'] == $this->_sections['subnet_loop']['total']);
?>
        <option value='<?php echo $this->_tpl_vars['subnets'][$this->_sections['subnet_loop']['index']]['subnet_id']; ?>
' selected='selected'><?php echo SELanguage::_get($this->_tpl_vars['subnets'][$this->_sections['subnet_loop']['index']]['subnet_name']); ?></option>
      <?php endfor; endif; ?>
      </select>
    </td>
    </tr>
    </table>
  <br><br>
  <input type='submit' class='button' value='<?php echo SELanguage::_get(605); ?>'>&nbsp;<input type='button' class='button' value='<?php echo SELanguage::_get(39); ?>' onClick='parent.TB_remove();'>
  <input type='hidden' name='task' value='sendemail'>
  <input type='hidden' name='start' value='0'>
  </form>
  <br><br>
</div>


<div style='display: none;' id='sendemail'>
  <div style='margin-top: 10px;'>
    <?php echo SELanguage::_get(609); ?>
  </div>
  <img src='../images/icons/loading2.gif' border='0' style='border: none; margin-left: auto; margin-right: auto;'>
</div>

<div style='display: none;' id='emailcomplete'>
  <div style='margin-top: 10px;'>
    <?php echo SELanguage::_get(611); ?>
  </div>
  <br />
  <input type='button' class='button' value='<?php echo SELanguage::_get(466); ?>' onClick='parent.TB_remove();'>
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin_footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>