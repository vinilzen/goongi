<?php /* Smarty version 2.6.14, created on 2011-12-27 17:40:43
         compiled from user_history_entry.tpl */
?><?php
SELanguage::_preload_multi(1600056,1600065,39);
SELanguage::load();
?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<script type="text/javascript" src="./include/fckeditor/fckeditor.js"></script>

<h1><?php if (! empty ( $this->_tpl_vars['historyentry_info']['historyentry_id'] )): ?>Редактировать историю рода<?php else: ?>Написать историю рода<?php endif; ?></h1>
<div class="crumb">
    <a href="#">Главная</a>
    <a href="/user_history.php">История рода</a>
    <span><?php if (! empty ( $this->_tpl_vars['historyentry_info']['historyentry_id'] )): ?>Редактировать историю рода<?php else: ?>Написать историю рода<?php endif; ?></span>
</div>
<div class="clear"></div>

<div id="entry_main">

<form action='user_history_entry.php' method='post' name='historyform' >
 
	<div class="edit_blog">
		<div class="input">
			<label><?php echo SELanguage::_get(1600056); ?></label>
			<input type='text' class="text" name='historyentry_title' size='50' maxlength='100' value='<?php echo $this->_tpl_vars['historyentry_info']['historyentry_title']; ?>
' />
		</div>
    </div>

<script type="text/javascript">
  <!--
  var sToolbar;
  var oFCKeditor = new FCKeditor('historyentry_body');
  oFCKeditor.BasePath = "./include/fckeditor/";
  oFCKeditor.Config["ProcessHTMLEntities"] = false;
  oFCKeditor.Config["CustomConfigurationsPath"] = "../../js/history_fckconfig.js";
  oFCKeditor.Height = "500";
  oFCKeditor.ToolbarSet = "se_history";
  oFCKeditor.Value = '<?php if (! empty ( $this->_tpl_vars['historyentry_info']['historyentry_body'] )): 
 echo $this->_tpl_vars['historyentry_info']['historyentry_body']; 
 endif; ?>';
  oFCKeditor.Config["SocialEngineUploadCustom"] = <?php if (! empty ( $this->_tpl_vars['global_plugins']['album'] ) && $this->_tpl_vars['user']->level_info['level_album_allow']): ?>true<?php else: ?>false<?php endif; ?>;
  oFCKeditor.Create() ;
  //-->
</script>
  
  
    <?php if (! empty ( $this->_tpl_vars['historyentry_info']['historyentry_id'] )): ?>
    <input type='hidden' name='historyentry_id' value='<?php echo $this->_tpl_vars['historyentry_info']['historyentry_id']; ?>
' />
  <?php endif; ?>
   </div>
 <?php if (( $this->_tpl_vars['status_user'] == 0 ) || ( $this->_tpl_vars['status_user'] == '' )): ?>
<div class="buttons_edit_blog">
	<?php $this->assign('langBlockTemp', SE_Language::_get(1600065));


  ?>
	<span class="button2"><span class="l">&nbsp;</span><span class="c">
	<input type="submit" value="Сохранить"  style="padding:1px 0px 0px 0px;" name="save" />
	</span><span class="r">&nbsp;</span></span><?php 

  ?>
	<input type='hidden' name='task' value='dosave'>
	</form>

	<form action='user_history.php' method='post'>
            <?php $this->assign('langBlockTemp', SE_Language::_get(39));


  ?>
            <span class="button2"><span class="l">&nbsp;</span><span class="c">
            <input type="submit" style="padding:1px 0px 0px 0px;"  value="Отмена" onclick="dateupdatenull(<?php echo $this->_tpl_vars['historyentry_info']['historyentry_id']; ?>
);" name="save" />
            </span><span class="r">&nbsp;</span></span>
            <?php 

  ?>
	</form>
</div>
<?php else: 
 $this->assign('langBlockTemp', SE_Language::_get(1600065));


  ?>
	История была изменена. Просмотреть измененную историю <a href="user_history.php" target="_blank"> можно на следующей странице </a>
<div class="buttons_edit_blog">
	<?php $this->assign('langBlockTemp', SE_Language::_get(1600065));


  ?>
	<span class="button2"><span class="l">&nbsp;</span><span class="c">
	<input type="submit" value="Перезаписать"  style="padding:1px 0px 0px 0px;" name="save" />
	</span><span class="r">&nbsp;</span></span><?php 

  ?>
	<input type='hidden' name='task' value='dosave'>
        <input type='hidden' name='status_user' value='0'>
	</form>
	<form action='user_history.php' method='post'>
            <?php $this->assign('langBlockTemp', SE_Language::_get(39));


  ?>
            <span class="button2"><span class="l">&nbsp;</span><span class="c">
            <input type="submit" style="padding:1px 0px 0px 0px;"  value="Отмена" onclick="dateupdatenull(<?php echo $this->_tpl_vars['historyentry_info']['historyentry_id']; ?>
);" name="save" />
            </span><span class="r">&nbsp;</span></span>
            <?php 

  ?>
	</form>
</div>
<?php endif; 
 $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>