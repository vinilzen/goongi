<?php /* Smarty version 2.6.14, created on 2011-12-23 17:24:15
         compiled from profile_gifts_tab.tpl */
?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'profile_gifts_tab.tpl', 7, false),)), $this);
?><?php
SELanguage::_preload_multi(80000007,1021,8000025);
SELanguage::load();
?><div class='profile_headline'> <?php echo SELanguage::_get(80000007); ?> (<?php echo $this->_tpl_vars['total_gifts']; ?>
) </div>
<?php if ($this->_tpl_vars['total_gifts'] > 10): ?>&nbsp;[ <a href='<?php echo $this->_tpl_vars['url']->url_create('mf_gifts_user',$this->_tpl_vars['owner']->user_info['user_username']); ?>
'><?php echo SELanguage::_get(1021); ?></a> ]<?php endif; ?>
<table cellpadding='0' cellspacing='0' class='list' width='350' border="0">
<tr>
  <table align="center" border="0" cellpadding="5">
    <?php $_from = $this->_tpl_vars['gifts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cid'] => $this->_tpl_vars['con']):
?>
    <?php echo smarty_function_cycle(array('name' => 'startrow3','values' => "
    <tr align=center>,,,,"), $this);?>

      <td width="100"><a href="javascript:TB_show('<?php echo SELanguage::_get(8000025); ?> <?php echo $this->_tpl_vars['owner']->user_displayname; ?>
', 'mf_gift_view.php?view=<?php echo $this->_tpl_vars['con']['gift_id']; ?>
&user=<?php echo $this->_tpl_vars['owner']->user_info['user_id']; ?>
&TB_iframe=true&height=420&width=450', '', './images/trans.gif');"><img src="mf_gifts/<?php echo $this->_tpl_vars['con']['file']; ?>
_thumb.<?php echo $this->_tpl_vars['con']['filetype']; ?>
" border="0"></a><br>
        <a href="javascript:TB_show('<?php echo SELanguage::_get(8000025); ?> <?php echo $this->_tpl_vars['owner']->user_displayname; ?>
', 'mf_gift_view.php?view=<?php echo $this->_tpl_vars['con']['gift_id']; ?>
&user=<?php echo $this->_tpl_vars['owner']->user_info['user_id']; ?>
&TB_iframe=true&height=420&width=450', '', './images/trans.gif');"><?php echo SELanguage::_get($this->_tpl_vars['con']['lang']); ?></a><br />
      </td>
      <?php echo smarty_function_cycle(array('name' => 'endrow3','values' => ",,,,</tr>
    "), $this);?>

    <?php endforeach; endif; unset($_from); ?>
  </table>