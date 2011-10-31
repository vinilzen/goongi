<?php /* Smarty version 2.6.14, created on 2011-10-04 16:57:22
         compiled from admin_language_import.tpl */
?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'admin_language_import.tpl', 16, false),)), $this);
?><?php
SELanguage::_preload_multi(1285,1286,191,1287,1288,1289,1290,1291,1292,1293,1294,1295,1296,1297,1298,39);
SELanguage::load();
?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin_header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<h2><?php echo SELanguage::_get(1285); ?></h2>
<div><?php echo SELanguage::_get(1286); ?></div>
<br />


<?php if ($this->_tpl_vars['result']): ?>
  <div class='success'>
    <img src='../images/success.gif' class='icon' border='0' />
    <?php echo SELanguage::_get(191); ?>
    <?php if (! empty ( $this->_tpl_vars['import_results'] )): ?>
    <br />
    <?php echo SELanguage::_get(1287); ?> <?php echo count($this->_tpl_vars['import_results']['updated']); ?>
<br />
    <?php echo SELanguage::_get(1288); ?> <?php echo count($this->_tpl_vars['import_results']['created']); ?>
<br />
    <?php echo SELanguage::_get(1289); ?> <?php echo count($this->_tpl_vars['import_results']['skipped']); ?>
<br />
    <?php echo SELanguage::_get(1290); ?> <?php echo count($this->_tpl_vars['import_results']['failed']); ?>

    <?php endif; ?>
  </div>
<?php endif; 
 if ($this->_tpl_vars['is_error']): ?>
  <div class='error'>
    <img src='../images/error.gif' border='0' class='icon' />
    <?php if (is_numeric ( $this->_tpl_vars['is_error'] )): 
 echo SELanguage::_get($this->_tpl_vars['is_error']); 
 else: 
 echo $this->_tpl_vars['is_error']; 
 endif; ?>
  </div>
<?php endif; ?>



<form action='admin_language_import.php' method='post' enctype='multipart/form-data'>

<table cellpadding='0' cellspacing='0' width='600'>
  <tr>
    <td class="header"><?php echo SELanguage::_get(1291); ?></td>
  </tr>
  
  <tr>
    <td class="setting1"><?php echo SELanguage::_get(1292); ?></td>
  </tr>
  
  <tr>
    <td class="setting2">
      <select name="language_id" class="text">
        <option value="-1">[<?php echo SELanguage::_get(1293); ?>]</option>
        <?php if (count($this->_tpl_vars['lang_packlist']) != 0): ?>
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
          <option value='<?php echo $this->_tpl_vars['lang_packlist'][$this->_sections['lang_loop']['index']]['language_id']; ?>
'><?php echo $this->_tpl_vars['lang_packlist'][$this->_sections['lang_loop']['index']]['language_name']; ?>
</option>
        <?php endfor; endif; ?>
        <?php endif; ?>
      </select>
    </td>
  </tr>
  
  <tr>
    <td class="setting1"><?php echo SELanguage::_get(1294); ?></td>
  </tr>
  
  <tr>
    <td class="setting2">
      <table cellpadding='2' cellspacing='0'>
        <tr>
          <td><input type="radio" name="language_import_mode" id="language_import_mode_replace" value="replace" checked /></td>
          <td><label for="language_import_mode_replace"><?php echo SELanguage::_get(1295); ?></label></td>
        </tr>
        <tr>
          <td><input type="radio" name="language_import_mode" id="language_import_mode_ignore" value="ignore" /></td>
          <td><label for="language_import_mode_ignore"><?php echo SELanguage::_get(1296); ?></label></td>
        </tr>
      </table>
    </td>
  </tr>
  
  <tr>
    <td class="setting1"><?php echo SELanguage::_get(1297); ?></td>
  </tr>
  
  <tr>
    <td class="setting2">
      <input type='file' name='language_import_file' size='60' class='text'>
    </td>
  </tr>
  
</table>
<br />

<table cellpadding='0' cellspacing='0'>
  <tr>
    <td>
      <input type='submit' class='button' value='<?php echo SELanguage::_get(1298); ?>' />
      <input type='hidden' name='task' value='doimport' />&nbsp;
      </form>
    </td>
    <td>
      <form action="admin_language.php">
      <input type='submit' class='button' value='<?php echo SELanguage::_get(39); ?>' />
      </form>
    </td>
  </tr>
</table>

</form>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin_footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>