<?php /* Smarty version 2.6.14, created on 2011-11-01 16:56:08
         compiled from admin_url.tpl */
?><?php
SELanguage::_preload_multi(19,456,191,457,458,459,460,461,462,463,173,464,465,466);
SELanguage::load();
?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin_header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<h2><?php echo SELanguage::_get(19); ?></h2>
<?php echo SELanguage::_get(456); ?>
<br />
<br />

<?php if ($this->_tpl_vars['result'] != 0): ?>
<div class='success'><img src='../images/success.gif' class='icon' border='0'> <?php echo SELanguage::_get(191); ?></div>
<?php endif; ?>

<form action='admin_url.php' method='POST'>
<table cellpadding='0' cellspacing='0' width='600'>
<tr><td class='header'><?php echo SELanguage::_get(457); ?></td></tr>
<tr>
<td class='setting1'>
<?php echo SELanguage::_get(458); ?>
<br><br>
<?php echo SELanguage::_get(459); ?>
<br>
<?php unset($this->_sections['url_loop']);
$this->_sections['url_loop']['name'] = 'url_loop';
$this->_sections['url_loop']['loop'] = is_array($_loop=$this->_tpl_vars['urls']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['url_loop']['show'] = true;
$this->_sections['url_loop']['max'] = $this->_sections['url_loop']['loop'];
$this->_sections['url_loop']['step'] = 1;
$this->_sections['url_loop']['start'] = $this->_sections['url_loop']['step'] > 0 ? 0 : $this->_sections['url_loop']['loop']-1;
if ($this->_sections['url_loop']['show']) {
    $this->_sections['url_loop']['total'] = $this->_sections['url_loop']['loop'];
    if ($this->_sections['url_loop']['total'] == 0)
        $this->_sections['url_loop']['show'] = false;
} else
    $this->_sections['url_loop']['total'] = 0;
if ($this->_sections['url_loop']['show']):

            for ($this->_sections['url_loop']['index'] = $this->_sections['url_loop']['start'], $this->_sections['url_loop']['iteration'] = 1;
                 $this->_sections['url_loop']['iteration'] <= $this->_sections['url_loop']['total'];
                 $this->_sections['url_loop']['index'] += $this->_sections['url_loop']['step'], $this->_sections['url_loop']['iteration']++):
$this->_sections['url_loop']['rownum'] = $this->_sections['url_loop']['iteration'];
$this->_sections['url_loop']['index_prev'] = $this->_sections['url_loop']['index'] - $this->_sections['url_loop']['step'];
$this->_sections['url_loop']['index_next'] = $this->_sections['url_loop']['index'] + $this->_sections['url_loop']['step'];
$this->_sections['url_loop']['first']      = ($this->_sections['url_loop']['iteration'] == 1);
$this->_sections['url_loop']['last']       = ($this->_sections['url_loop']['iteration'] == $this->_sections['url_loop']['total']);

 echo $this->_tpl_vars['urls'][$this->_sections['url_loop']['index']]['url_title']; ?>
: <?php echo $this->_tpl_vars['urls'][$this->_sections['url_loop']['index']]['url_regular']; ?>
<br>
<?php endfor; endif; ?>
<br>
<?php echo SELanguage::_get(460); ?>
<br>
<?php unset($this->_sections['url_loop']);
$this->_sections['url_loop']['name'] = 'url_loop';
$this->_sections['url_loop']['loop'] = is_array($_loop=$this->_tpl_vars['urls']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['url_loop']['show'] = true;
$this->_sections['url_loop']['max'] = $this->_sections['url_loop']['loop'];
$this->_sections['url_loop']['step'] = 1;
$this->_sections['url_loop']['start'] = $this->_sections['url_loop']['step'] > 0 ? 0 : $this->_sections['url_loop']['loop']-1;
if ($this->_sections['url_loop']['show']) {
    $this->_sections['url_loop']['total'] = $this->_sections['url_loop']['loop'];
    if ($this->_sections['url_loop']['total'] == 0)
        $this->_sections['url_loop']['show'] = false;
} else
    $this->_sections['url_loop']['total'] = 0;
if ($this->_sections['url_loop']['show']):

            for ($this->_sections['url_loop']['index'] = $this->_sections['url_loop']['start'], $this->_sections['url_loop']['iteration'] = 1;
                 $this->_sections['url_loop']['iteration'] <= $this->_sections['url_loop']['total'];
                 $this->_sections['url_loop']['index'] += $this->_sections['url_loop']['step'], $this->_sections['url_loop']['iteration']++):
$this->_sections['url_loop']['rownum'] = $this->_sections['url_loop']['iteration'];
$this->_sections['url_loop']['index_prev'] = $this->_sections['url_loop']['index'] - $this->_sections['url_loop']['step'];
$this->_sections['url_loop']['index_next'] = $this->_sections['url_loop']['index'] + $this->_sections['url_loop']['step'];
$this->_sections['url_loop']['first']      = ($this->_sections['url_loop']['iteration'] == 1);
$this->_sections['url_loop']['last']       = ($this->_sections['url_loop']['iteration'] == $this->_sections['url_loop']['total']);

 echo $this->_tpl_vars['urls'][$this->_sections['url_loop']['index']]['url_title']; ?>
: <?php echo $this->_tpl_vars['urls'][$this->_sections['url_loop']['index']]['url_subdirectory']; ?>
<br>
<?php endfor; endif; ?>
</td></tr><tr><td class='setting2'>
  <table cellpadding='0' cellspacing='0'>
  <tr><td><input type='radio' name='setting_url' id='setting_url_0' value='0'<?php if ($this->_tpl_vars['setting']['setting_url'] == 0): ?> CHECKED<?php endif; ?>>&nbsp;</td><td><label for='setting_url_0'><?php echo SELanguage::_get(461); ?></label></td></tr>
  <tr><td><input type='radio' name='setting_url' id='setting_url_1' value='1'<?php if ($this->_tpl_vars['setting']['setting_url'] == 1): ?> CHECKED<?php endif; ?>>&nbsp;</td><td><label for='setting_url_1'><?php echo SELanguage::_get(462); ?></label><?php if ($this->_tpl_vars['setting']['setting_url'] == 1): 
 echo SELanguage::_get(463); 
 endif; ?></td></tr>
  </table>
</td></tr></table>
<br>

<input type='submit' class='button' value='<?php echo SELanguage::_get(173); ?>'>
<input type='hidden' name='task' value='dosave'>
</form>


<?php echo '
<script type="text/javascript">
<!-- 
function urlhelp() {
  TB_show(\''; 
 echo SELanguage::_get(464); 
 echo '\', \'#TB_inline?height=550&width=600&inlineId=urlhelp\', \'\', \'../images/trans.gif\');
}

'; 
 if ($this->_tpl_vars['result'] != 0 && $this->_tpl_vars['setting']['setting_url'] == 1): 
 echo '
window.addEvent(\'domready\', function(){
  urlhelp();
});
'; 
 endif; 
 echo '

//-->
</script>
'; ?>


<div style='display: none;' id='urlhelp'>
  <div style='margin-top: 10px; margin-bottom: 10px;'><?php echo SELanguage::_get(465); ?></div>
  <textarea wrap='off' rows='20' cols='60' style='font-family: "Courier New", verdana, arial; width: 95%;'><?php echo $this->_tpl_vars['htaccess']; ?>
</textarea>
  <br><br>
  <input type='button' class='button' value='<?php echo SELanguage::_get(466); ?>' onClick='parent.TB_remove();'>
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin_footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>