<?php /* Smarty version 2.6.14, created on 2011-12-05 12:49:40
         compiled from user_blog_settings.tpl */
?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'unserialize', 'user_blog_settings.tpl', 70, false),array('modifier', 'in_array', 'user_blog_settings.tpl', 71, false),array('modifier', 'count', 'user_blog_settings.tpl', 71, false),)), $this);
?><?php
SELanguage::_preload_multi(1500001,652,1500007,1500069,1500055,191,1500070,1500071,1500073,1500074,1500075,1500076,173);
SELanguage::load();
?>﻿<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<h1><?php echo SELanguage::_get(1500001); ?></h1>
<div class="crumb">
	<a href="/#">Главная</a>
	<a href="<?php echo $this->_tpl_vars['url']->url_create('profile',$this->_tpl_vars['user']->user_info['user_username']); ?>
"><?php echo SELanguage::_get(652); ?><!-- Профиль --></a>
	<a href="/user_blog.php"><?php echo SELanguage::_get(1500007); ?><!-- История рода --></a>
	<span><?php echo SELanguage::_get(1500001); ?></span>
</div>
<div class="buttons">
	<div class="r_link"><a href="#" class="ico1">&nbsp;</a><a href="/user_blog_settings.php" class="ico2">&nbsp;</a></div>
	<span class="button2" id="add_event"><span class="l">&nbsp;</span><span class="c"><input type="button" value="Создать событие" name="creat" /></span><span class="r">&nbsp;</span></span>
	<span class="button3" id="save_tree"><span class="l">&nbsp;</span><span class="c"><input type="button" value="Сохранить дерево" name="creat" /></span><span class="r">&nbsp;</span></span>
</div>


<table cellpadding='0' cellspacing='0' width='100%'>
  <tr>
    <td valign='top'>
      
      <img src='./images/icons/blog_blog48.gif' border='0' class='icon_big'>
      <div><?php echo SELanguage::_get(1500069); ?></div>
      
    </td>
    <td valign='top' align='right'>
      
      <table cellpadding='0' cellspacing='0' width='130'>
      <tr><td class='button' nowrap='nowrap'><a href='user_blog.php'><img src='./images/icons/back16.gif' border='0' class='button'><?php echo SELanguage::_get(1500055); ?></a></td></tr>
      </table>
      
    </td>
  </tr>
</table>
<br />


<?php if ($this->_tpl_vars['result'] != 0): ?>
  <table cellpadding='0' cellspacing='0'>
    <tr>
      <td class='result'>
        <div class='success'><img src='./images/success.gif' border='0' class='icon'> <?php echo SELanguage::_get(191); ?></div>
      </td>
    </tr>
  </table>
  <br />
<?php endif; ?>


<form action='user_blog_settings.php' method='POST'>

<?php if ($this->_tpl_vars['user']->level_info['level_blog_style'] && $this->_tpl_vars['user']->level_info['level_blog_create']): ?>
  <div><b><?php echo SELanguage::_get(1500070); ?></b></div>
  <div class='form_desc'><?php echo SELanguage::_get(1500071); ?></div>
  <textarea name='style_blog' rows='17' cols='50' style='width: 100%; font-family: courier, serif;'><?php echo $this->_tpl_vars['style_blog']; ?>
</textarea>
  <br />
  <br />
<?php endif; ?>




<div><b><?php echo SELanguage::_get(1500073); ?></b></div>
<br />

<?php if ($this->_tpl_vars['user']->level_info['level_blog_create']): ?>

  <?php $this->assign('comment_options', ((is_array($_tmp=$this->_tpl_vars['user']->level_info['level_blog_comments'])) ? $this->_run_mod_handler('unserialize', true, $_tmp) : unserialize($_tmp))); ?>
  <?php if (! ( ((is_array($_tmp='0')) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['comment_options']) : in_array($_tmp, $this->_tpl_vars['comment_options'])) ) || count($this->_tpl_vars['comment_options']) != 1): ?>
  <table cellpadding='0' cellspacing='0' class='editprofile_options'>
    <tr>
      <td><input type='checkbox' value='1' id='blogcomment' name='usersetting_notify_blogcomment'<?php if ($this->_tpl_vars['user']->usersetting_info['usersetting_notify_blogcomment']): ?> CHECKED<?php endif; ?>></td>
      <td><label for='blogcomment'><?php echo SELanguage::_get(1500074); ?></label></td>
    </tr>
  </table>
  <?php endif; ?>

  <table cellpadding='0' cellspacing='0' class='editprofile_options'>
    <tr>
      <td><input type='checkbox' value='1' id='blogtrackback' name='usersetting_notify_blogtrackback'<?php if ($this->_tpl_vars['user']->usersetting_info['usersetting_notify_blogtrackback']): ?> CHECKED<?php endif; ?>></td>
      <td><label for='blogtrackback'><?php echo SELanguage::_get(1500075); ?></label></td>
    </tr>
  </table>

<?php endif; 
 if ($this->_tpl_vars['user']->level_info['level_blog_view']): ?>

  <table cellpadding='0' cellspacing='0' class='editprofile_options'>
    <tr>
      <td><input type='checkbox' value='1' id='newblogsubscriptionentry' name='usersetting_notify_newblogsubscriptionentry'<?php if ($this->_tpl_vars['user']->usersetting_info['usersetting_notify_newblogsubscriptionentry']): ?> CHECKED<?php endif; ?>></td>
      <td><label for='newblogsubscriptionentry'><?php echo SELanguage::_get(1500076); ?></label></td>
    </tr>
  </table>

<?php endif; ?>

<br />


<?php $this->assign('langBlockTemp', SE_Language::_get(173));


  ?><input type='submit' class='button' value='<?php echo $this->_tpl_vars['langBlockTemp']; ?>
' /><?php 

  ?>
<input type='hidden' name='task' value='dosave' />
</form>

</td></tr></table>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>