<?php /* Smarty version 2.6.14, created on 2011-11-01 16:55:20
         compiled from admin_viewplugins.tpl */
?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'admin_viewplugins.tpl', 10, false),array('modifier', 'default', 'admin_viewplugins.tpl', 79, false),)), $this);
?><?php
SELanguage::_preload_multi(7,1107,1108,1109,1110,1111,1112,1200,1201);
SELanguage::load();
?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin_header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<h2><?php echo SELanguage::_get(7); ?></h2>
<?php echo SELanguage::_get(1107); ?>
<br />
<br />

<?php if (count($this->_tpl_vars['plugins_ready']) == 0 & count($this->_tpl_vars['plugins_installed']) == 0): ?>
<table cellpadding='0' cellspacing='0'>
  <tr>
    <td class='result'>
      <img src='../images/icons/bulb16.gif' border='0' class='icon'>
      <b><?php echo SELanguage::_get(1108); ?></b>
    </td>
  </tr>
</table>
<br />
<?php endif; 
 echo '
<script type="text/javascript">
  
  var pluginSortable;
  
  window.addEvent(\'load\', function()
  {
    pluginSortable = new Sortables($(\'SEPluginsList\'), {
      revert: { duration: 750, transition: \'elastic:out\' },
      constrain: false,
      handle: \'table\',
      clone: true,
      opacity: 0.7,
      onStart: function()
      {
        this.clone.setStyle(\'z-index\', \'10\');
        this.clone.setStyle(\'margin-top\', \'100px\');
        this.clone.setStyle(\'margin-left\', \'200px\');
      },
      onComplete: function()
      {
        var orderedList = new Array();
        $(\'SEPluginsList\').getElements(\'li\').each(function(listElement)
        {
          var pluginType = listElement.id.replace(\'SEPluginList_\', \'\');
          orderedList.push(pluginType);
        });;
        
        var request = new Request.JSON({
          \'url\' : \'admin_viewplugins.php\',
          \'method\' : \'post\',
          \'data\' : {
            \'task\' : \'doorder\',
            \'order\' : orderedList
          },
          \'onComplete\' : function(responseJSON)
          {
            if( !responseJSON.result )
              alert(\'order failed\');
          }
        });
        
        request.send();
      }
    });
  }); 
  
</script>
'; 
 unset($this->_sections['ready_loop']);
$this->_sections['ready_loop']['name'] = 'ready_loop';
$this->_sections['ready_loop']['loop'] = is_array($_loop=$this->_tpl_vars['plugins_ready']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['ready_loop']['show'] = true;
$this->_sections['ready_loop']['max'] = $this->_sections['ready_loop']['loop'];
$this->_sections['ready_loop']['step'] = 1;
$this->_sections['ready_loop']['start'] = $this->_sections['ready_loop']['step'] > 0 ? 0 : $this->_sections['ready_loop']['loop']-1;
if ($this->_sections['ready_loop']['show']) {
    $this->_sections['ready_loop']['total'] = $this->_sections['ready_loop']['loop'];
    if ($this->_sections['ready_loop']['total'] == 0)
        $this->_sections['ready_loop']['show'] = false;
} else
    $this->_sections['ready_loop']['total'] = 0;
if ($this->_sections['ready_loop']['show']):

            for ($this->_sections['ready_loop']['index'] = $this->_sections['ready_loop']['start'], $this->_sections['ready_loop']['iteration'] = 1;
                 $this->_sections['ready_loop']['iteration'] <= $this->_sections['ready_loop']['total'];
                 $this->_sections['ready_loop']['index'] += $this->_sections['ready_loop']['step'], $this->_sections['ready_loop']['iteration']++):
$this->_sections['ready_loop']['rownum'] = $this->_sections['ready_loop']['iteration'];
$this->_sections['ready_loop']['index_prev'] = $this->_sections['ready_loop']['index'] - $this->_sections['ready_loop']['step'];
$this->_sections['ready_loop']['index_next'] = $this->_sections['ready_loop']['index'] + $this->_sections['ready_loop']['step'];
$this->_sections['ready_loop']['first']      = ($this->_sections['ready_loop']['iteration'] == 1);
$this->_sections['ready_loop']['last']       = ($this->_sections['ready_loop']['iteration'] == $this->_sections['ready_loop']['total']);
?>
<table width='100%' cellpadding='0' cellspacing='0' class='stats' style='margin-bottom: 10px;'>
  <tr>
    <td class='plugin'>
      <table cellpadding='0' cellspacing='0' width="100%">
        <tr>
          <td width="20"><img src='../images/icons/<?php echo ((is_array($_tmp=@$this->_tpl_vars['plugins_ready'][$this->_sections['ready_loop']['index']]['plugin_icon'])) ? $this->_run_mod_handler('default', true, $_tmp, "admin_plugins16.gif") : smarty_modifier_default($_tmp, "admin_plugins16.gif")); ?>
' border='0' class='icon2'></td>
          <td class='plugin_name'><?php echo $this->_tpl_vars['plugins_ready'][$this->_sections['ready_loop']['index']]['plugin_name']; ?>
 v<?php echo $this->_tpl_vars['plugins_ready'][$this->_sections['ready_loop']['index']]['plugin_version']; ?>
</td>
                  </tr>
      </table>
      <div style='margin-top: 5px;'><?php echo $this->_tpl_vars['plugins_ready'][$this->_sections['ready_loop']['index']]['plugin_desc']; ?>
</div>
      <div style='margin-top: 7px;'>
        <a href='admin_viewplugins.php?install=<?php echo $this->_tpl_vars['plugins_ready'][$this->_sections['ready_loop']['index']]['plugin_type']; ?>
'><?php echo SELanguage::_get(1109); ?></a>
      </div>
    </td>
  </tr>
</table>
<?php endfor; endif; ?>

<ul style="list-style:none; padding: 0; margin: 0;" id="SEPluginsList">

<?php unset($this->_sections['installed_loop']);
$this->_sections['installed_loop']['name'] = 'installed_loop';
$this->_sections['installed_loop']['loop'] = is_array($_loop=$this->_tpl_vars['plugins_installed']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['installed_loop']['show'] = true;
$this->_sections['installed_loop']['max'] = $this->_sections['installed_loop']['loop'];
$this->_sections['installed_loop']['step'] = 1;
$this->_sections['installed_loop']['start'] = $this->_sections['installed_loop']['step'] > 0 ? 0 : $this->_sections['installed_loop']['loop']-1;
if ($this->_sections['installed_loop']['show']) {
    $this->_sections['installed_loop']['total'] = $this->_sections['installed_loop']['loop'];
    if ($this->_sections['installed_loop']['total'] == 0)
        $this->_sections['installed_loop']['show'] = false;
} else
    $this->_sections['installed_loop']['total'] = 0;
if ($this->_sections['installed_loop']['show']):

            for ($this->_sections['installed_loop']['index'] = $this->_sections['installed_loop']['start'], $this->_sections['installed_loop']['iteration'] = 1;
                 $this->_sections['installed_loop']['iteration'] <= $this->_sections['installed_loop']['total'];
                 $this->_sections['installed_loop']['index'] += $this->_sections['installed_loop']['step'], $this->_sections['installed_loop']['iteration']++):
$this->_sections['installed_loop']['rownum'] = $this->_sections['installed_loop']['iteration'];
$this->_sections['installed_loop']['index_prev'] = $this->_sections['installed_loop']['index'] - $this->_sections['installed_loop']['step'];
$this->_sections['installed_loop']['index_next'] = $this->_sections['installed_loop']['index'] + $this->_sections['installed_loop']['step'];
$this->_sections['installed_loop']['first']      = ($this->_sections['installed_loop']['iteration'] == 1);
$this->_sections['installed_loop']['last']       = ($this->_sections['installed_loop']['iteration'] == $this->_sections['installed_loop']['total']);
?>
<li id="SEPluginList_<?php echo $this->_tpl_vars['plugins_installed'][$this->_sections['installed_loop']['index']]['plugin_type']; ?>
">
<table width='100%' cellpadding='0' cellspacing='0' class='stats' style='margin-bottom: 10px;'>
  <tr>
    <td class='plugin'>
      <table cellpadding='0' cellspacing='0' width="100%">
        <tr>
          <td width="20"><img src='../images/icons/<?php echo ((is_array($_tmp=@$this->_tpl_vars['plugins_installed'][$this->_sections['installed_loop']['index']]['plugin_icon'])) ? $this->_run_mod_handler('default', true, $_tmp, "admin_plugins16.gif") : smarty_modifier_default($_tmp, "admin_plugins16.gif")); ?>
' border='0' class='icon2'></td>
          <td class='plugin_name'><?php echo $this->_tpl_vars['plugins_installed'][$this->_sections['installed_loop']['index']]['plugin_name']; ?>
 v<?php echo $this->_tpl_vars['plugins_installed'][$this->_sections['installed_loop']['index']]['plugin_version']; ?>
</td>
                  </tr>
      </table>
      <div style='margin-top: 5px;'><?php echo $this->_tpl_vars['plugins_installed'][$this->_sections['installed_loop']['index']]['plugin_desc']; ?>
</div>
      <?php if ($this->_tpl_vars['plugins_installed'][$this->_sections['installed_loop']['index']]['plugin_version_ready'] != "" && $this->_tpl_vars['plugins_installed'][$this->_sections['installed_loop']['index']]['plugin_version_ready'] <= $this->_tpl_vars['plugins_installed'][$this->_sections['installed_loop']['index']]['plugin_version']): ?>
      <table width='100%' cellpadding='0' cellspacing='0' style='margin-top: 10px; margin-bottom: 3px;'>
        <tr>
          <td class='error'>
            <img src='../images/icons/error16.gif' border='0' class='icon'>
            <?php echo sprintf(SELanguage::_get(1110), $this->_tpl_vars['plugins_installed'][$this->_sections['installed_loop']['index']]['plugin_type']); ?>
          </td>
        </tr>
      </table>
      <?php endif; ?>
      <div style='margin-top: 7px;'>
        <?php if ($this->_tpl_vars['plugins_installed'][$this->_sections['installed_loop']['index']]['plugin_version_ready'] > $this->_tpl_vars['plugins_installed'][$this->_sections['installed_loop']['index']]['plugin_version']): ?>
          <a href='admin_viewplugins.php?install=<?php echo $this->_tpl_vars['plugins_installed'][$this->_sections['installed_loop']['index']]['plugin_type']; ?>
'><?php echo SELanguage::_get(1111); ?></a> | 
        <?php elseif ($this->_tpl_vars['plugins_installed'][$this->_sections['installed_loop']['index']]['plugin_version_avail'] > $this->_tpl_vars['plugins_installed'][$this->_sections['installed_loop']['index']]['plugin_version']): ?>
          <a href='http://www.socialengine.net/login.php' target='_blank'><?php echo SELanguage::_get(1112); ?></a> | 
        <?php endif; ?>
        <?php if ($this->_tpl_vars['plugins_installed'][$this->_sections['installed_loop']['index']]['plugin_disabled']): ?>
          <a href='admin_viewplugins.php?enable=<?php echo $this->_tpl_vars['plugins_installed'][$this->_sections['installed_loop']['index']]['plugin_type']; ?>
'><?php echo SELanguage::_get(1200); ?></a>
        <?php else: ?>
          <a href='admin_viewplugins.php?disable=<?php echo $this->_tpl_vars['plugins_installed'][$this->_sections['installed_loop']['index']]['plugin_type']; ?>
'><?php echo SELanguage::_get(1201); ?></a>
        <?php endif; ?>
      </div>
    </td>
  </tr>
</table>
</li>
<?php endfor; endif; ?>

</ul>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin_footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>