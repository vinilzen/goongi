<?php /* Smarty version 2.6.14, created on 2011-12-05 12:28:28
         compiled from profile_event_calendar.tpl */
?><?php
SELanguage::load();
?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header_global.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<table width="100%"><tr><td align="center">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'event_calendar.tpl', 'smarty_include_vars' => array('calendar_view' => 'month_small')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</td></tr></table>

</body>
</html>