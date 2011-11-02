<?php /* Smarty version 2.6.14, created on 2011-11-01 16:56:21
         compiled from admin_session.tpl */
?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'in_array', 'admin_session.tpl', 75, false),array('modifier', 'default', 'admin_session.tpl', 95, false),array('function', 'counter', 'admin_session.tpl', 138, false),)), $this);
?><?php
SELanguage::_preload_multi(1244,1299,191,1248,1300,1301,1302,1257,1258,1303,1262,1304,1305,1306,1307,1280,1281,1282,173);
SELanguage::load();
?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin_header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<h2><?php echo SELanguage::_get(1244); ?></h2>
<div><?php echo SELanguage::_get(1299); ?></div>
<br />


<?php if ($this->_tpl_vars['result']): ?>
  <div class='success'>
    <img src='../images/success.gif' class='icon' border='0' />
    <?php echo SELanguage::_get(191); ?>
  </div>
  <br>
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
  <br>
<?php endif; 
 echo '
<script type="text/javascript">
  
  function addSessionServer(type)
  {
    var typeCapitalized = type.capitalize();
    
    if( !$(\'SESession\' + type + \'ServersTemplate\') ) return;
    if( !$(\'SESession\' + type + \'ServersContainer\') ) return;
    
    var serverCount = $(\'SESession\' + type + \'ServersContainer\').getElements(\'table\').length + 1;
    var newServerTemplate = $(\'SESession\' + type + \'ServersTemplate\').clone();
    
    newServerTemplate.style.display = \'\';
    newServerTemplate.getElement(\'.SESessionMemcacheServerIndex\').innerHTML += \' &nbsp; '; 
 echo SELanguage::_get(1248); 
 echo ' \'+serverCount;
    
    newServerTemplate.inject($(\'SESession\' + type + \'ServersContainer\'));
  }
  
  function removeSessionServer(tdobj)
  {
    $(tdobj).getParent(\'table\').destroy();
  }
  
</script>
'; ?>





<form action='admin_session.php' method='post'>

<table cellpadding='0' cellspacing='0' width='600'>
  <tr>
    <td class='header'><?php echo SELanguage::_get(1300); ?></td>
  </tr>
  
  <tr>
    <td class='setting1'><?php echo SELanguage::_get(1301); ?></td>
  </tr>
  <tr>
    <td class='setting2'>
      <table cellpadding='1' cellspacing='0'>
        <tr>
          <td><input type="radio" id="setting_session_storage_none" name="setting_session_options[storage]" value="none"<?php if (empty ( $this->_tpl_vars['session_options']['storage'] ) || $this->_tpl_vars['session_options']['storage'] == 'none'): ?> checked<?php endif; ?> /></td>
          <td><label for="setting_session_storage_none"><?php echo SELanguage::_get(1302); ?></label></td>
        </tr>
        <tr>
          <td><input type="radio" id="setting_session_storage_file" name="setting_session_options[storage]" value="file"<?php if (! ((is_array($_tmp='file')) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['available_storage']) : in_array($_tmp, $this->_tpl_vars['available_storage']))): ?> disabled<?php elseif ($this->_tpl_vars['session_options']['storage'] == 'file'): ?> checked<?php endif; ?> /></td>
          <td><label for="setting_session_storage_file"><?php echo SELanguage::_get(1257); ?></label></td>
        </tr>
        <tr>
          <td><input type="radio" id="setting_session_storage_memcache" name="setting_session_options[storage]" value="memcache"<?php if (! ((is_array($_tmp='memcache')) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['available_storage']) : in_array($_tmp, $this->_tpl_vars['available_storage']))): ?> disabled<?php elseif ($this->_tpl_vars['session_options']['storage'] == 'memcache'): ?> checked<?php endif; ?> /></td>
          <td><label for="setting_session_storage_memcache"><?php echo SELanguage::_get(1258); ?></label></td>
        </tr>
        <tr>
          <td><input type="radio" id="setting_session_storage_db" name="setting_session_options[storage]" value="db"<?php if (! ((is_array($_tmp='db')) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['available_storage']) : in_array($_tmp, $this->_tpl_vars['available_storage']))): ?> disabled<?php elseif ($this->_tpl_vars['session_options']['storage'] == 'db'): ?> checked<?php endif; ?> /></td>
          <td><label for="setting_session_storage_db">Database</label></td>
        </tr>
      </table>
    </td>
  </tr>
  
  <tr>
    <td class='setting1'><?php echo SELanguage::_get(1303); ?></td>
  </tr>
  <tr>
    <td class='setting2'>
      <input type="text" class="text" size="5" maxlength="6" name="setting_session_options[expire]" value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['session_options']['expire'])) ? $this->_run_mod_handler('default', true, $_tmp, 900) : smarty_modifier_default($_tmp, 900)); ?>
" />
      <label><?php echo SELanguage::_get(1262); ?></label>
    </td>
  </tr>
  
</table>
<br />



<table cellpadding='0' cellspacing='0' width='600'>
  <tr>
    <td class='header'><?php echo SELanguage::_get(1304); ?></td>
  </tr>
  
  <tr>
    <td class='setting1'><?php echo SELanguage::_get(1305); ?></td>
  </tr>
  <tr>
    <td class='setting2'><input type="text" class="text" size="50" name="setting_session_options[root]" value="<?php echo ((is_array($_tmp=@$this->_tpl_vars['session_options']['root'])) ? $this->_run_mod_handler('default', true, $_tmp, '') : smarty_modifier_default($_tmp, '')); ?>
" /></td>
  </tr>
  
</table>
<br />



<table cellpadding='0' cellspacing='0' width='600'>
  <tr>
    <td class='header'><?php echo SELanguage::_get(1306); ?></td>
  </tr>
  
  <tr>
    <td class='setting1'><?php echo SELanguage::_get(1307); ?> <?php echo sprintf(SELanguage::_get(1280), "javascript:void(0);", "addSessionServer('Memcache');"); ?></td>
  </tr>
  <tr>
    <td class='setting2' id="SESessionMemcacheServersContainer">
      <?php if (is_array ( $this->_tpl_vars['session_options'] ) && is_array ( $this->_tpl_vars['session_options']['servers'] )): ?>
      <?php unset($this->_sections['cache_server_loop']);
$this->_sections['cache_server_loop']['name'] = 'cache_server_loop';
$this->_sections['cache_server_loop']['loop'] = is_array($_loop=$this->_tpl_vars['session_options']['servers']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['cache_server_loop']['show'] = true;
$this->_sections['cache_server_loop']['max'] = $this->_sections['cache_server_loop']['loop'];
$this->_sections['cache_server_loop']['step'] = 1;
$this->_sections['cache_server_loop']['start'] = $this->_sections['cache_server_loop']['step'] > 0 ? 0 : $this->_sections['cache_server_loop']['loop']-1;
if ($this->_sections['cache_server_loop']['show']) {
    $this->_sections['cache_server_loop']['total'] = $this->_sections['cache_server_loop']['loop'];
    if ($this->_sections['cache_server_loop']['total'] == 0)
        $this->_sections['cache_server_loop']['show'] = false;
} else
    $this->_sections['cache_server_loop']['total'] = 0;
if ($this->_sections['cache_server_loop']['show']):

            for ($this->_sections['cache_server_loop']['index'] = $this->_sections['cache_server_loop']['start'], $this->_sections['cache_server_loop']['iteration'] = 1;
                 $this->_sections['cache_server_loop']['iteration'] <= $this->_sections['cache_server_loop']['total'];
                 $this->_sections['cache_server_loop']['index'] += $this->_sections['cache_server_loop']['step'], $this->_sections['cache_server_loop']['iteration']++):
$this->_sections['cache_server_loop']['rownum'] = $this->_sections['cache_server_loop']['iteration'];
$this->_sections['cache_server_loop']['index_prev'] = $this->_sections['cache_server_loop']['index'] - $this->_sections['cache_server_loop']['step'];
$this->_sections['cache_server_loop']['index_next'] = $this->_sections['cache_server_loop']['index'] + $this->_sections['cache_server_loop']['step'];
$this->_sections['cache_server_loop']['first']      = ($this->_sections['cache_server_loop']['iteration'] == 1);
$this->_sections['cache_server_loop']['last']       = ($this->_sections['cache_server_loop']['iteration'] == $this->_sections['cache_server_loop']['total']);
?>
        <table>
          <tr>
            <td colspan="2" class="SESessionMemcacheServerIndex">
              <a href="javascript:void(0);" onclick="removeSessionServer(this);">x</a> &nbsp;
              <?php echo SELanguage::_get(1248); ?> <?php echo smarty_function_counter(array('name' => 'memcache_servers'), $this);?>

            </td>
          </tr>
          <tr>
            <td><?php echo SELanguage::_get(1281); ?></td>
            <td><input class="text" type="text" name="setting_session_options[server_hosts][]" value="<?php echo $this->_tpl_vars['session_options']['servers'][$this->_sections['cache_server_loop']['index']]['host']; ?>
" /></td>
          </tr>
          <tr>
            <td><?php echo SELanguage::_get(1282); ?></td>
            <td><input class="text" type="text" name="setting_session_options[server_ports][]" value="<?php echo $this->_tpl_vars['session_options']['servers'][$this->_sections['cache_server_loop']['index']]['port']; ?>
" /></td>
          </tr>
        </table>
      <?php endfor; endif; ?>
      <?php endif; ?>
    </td>
  </tr>
  
</table>
<br />




<input type='submit' class='button' value='<?php echo SELanguage::_get(173); ?>' />
<input type='hidden' name='task' value='dosave' />

</form>




<table id="SESessionMemcacheServersTemplate" style="display:none;">
  <tr>
    <td colspan="2" class="SESessionMemcacheServerIndex">
      <a href="javascript:void(0);" onclick="removeSessionServer(this);">x</a>
    </td>
  </tr>
  <tr>
    <td><?php echo SELanguage::_get(1281); ?></td>
    <td><input class="text" type="text" name="setting_session_options[server_hosts][]" value="localhost" /></td>
  </tr>
  <tr>
    <td><?php echo SELanguage::_get(1282); ?></td>
    <td><input class="text" type="text" name="setting_session_options[server_ports][]" value="11211" /></td>
  </tr>
</table>
  
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin_footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>