<?php /* Smarty version 2.6.14, created on 2011-11-01 17:11:44
         compiled from user_account_delete.tpl */
?><?php
SELanguage::_preload_multi(655,1055,756,757,759,760,761,39,1146,175);
SELanguage::load();
?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<table class='tabs' cellpadding='0' cellspacing='0'>
  <tr>
    <td class='tab0'>&nbsp;</td>
    <td class='tab2' NOWRAP><a href='user_account.php'><?php echo SELanguage::_get(655); ?></a></td>
    <td class='tab'>&nbsp;</td>
    <td class='tab2' NOWRAP><a href='user_account_privacy.php'><?php echo SELanguage::_get(1055); ?></a></td>
    <td class='tab'>&nbsp;</td>
    <td class='tab2' NOWRAP><a href='user_account_pass.php'><?php echo SELanguage::_get(756); ?></a></td>
    <td class='tab'>&nbsp;</td>
    <td class='tab1' NOWRAP><a href='user_account_delete.php'><?php echo SELanguage::_get(757); ?></a></td>
    <td class='tab3'>&nbsp;</td>
  </tr>
</table>

<img src='./images/icons/delete48.gif' border='0' class='icon_big' />
<div class='page_header'><?php echo SELanguage::_get(759); ?></div>
<div><?php echo SELanguage::_get(760); ?></div>
<br />

<table cellpadding='0' cellspacing='0'>
<tr>
<td>
  <input type='submit' class='button' value='<?php echo SELanguage::_get(761); ?>' onClick='SocialEngine.Viewer.userDelete();' />&nbsp;
</td>
<td>
  <form action='user_account.php' method='post'>
  <input type='submit' class='button' value='<?php echo SELanguage::_get(39); ?>' />
  </form>
</td>
</tr>
</table>


<?php 
$javascript_lang_import_list = SELanguage::_javascript_redundancy_filter(array(759));
$javascript_lang_import_first = TRUE;
if( is_array($javascript_lang_import_list) && !empty($javascript_lang_import_list) )
{
  echo "\n<script type='text/javascript'>\n<!--\n";
  echo "SocialEngine.Language.Import({\n";
  foreach( $javascript_lang_import_list as $javascript_import_id )
  {
    if( !$javascript_lang_import_first ) echo ",\n";
    echo "  ".$javascript_import_id." : '".addslashes(SE_Language::_get($javascript_import_id))."'";
    $javascript_lang_import_first = FALSE;
  }
  echo "\n});\n//-->\n</script>\n";
}
 ?>
<div style='display: none;' id='confirmdelete'>
  <div style='margin-top: 10px;'>
    <?php echo SELanguage::_get(1146); ?>
  </div>
  <br>
  <input type='button' class='button' value='<?php echo SELanguage::_get(175); ?>' onClick='parent.TB_remove();parent.SocialEngine.Viewer.userDeleteConfirm("<?php echo $this->_tpl_vars['delete_token']; ?>
");' />
  <input type='button' class='button' value='<?php echo SELanguage::_get(39); ?>' onClick='parent.TB_remove();' />
</div>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>