<?php /* Smarty version 2.6.14, created on 2011-12-21 17:33:32
         compiled from user_blog_entry.tpl */
?><?php
SELanguage::_preload_multi(1500067,1500122,1500123,1500056,1500065,39);
SELanguage::load();
?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<script type="text/javascript" src="./include/js/class_blog.js"></script>
<script type="text/javascript" src="./include/fckeditor/fckeditor.js"></script>

<h1><?php if (! empty ( $this->_tpl_vars['blogentry_info']['blogentry_id'] )): ?>Редактировать статью<?php else: ?>Написать статью<?php endif; ?></h1>
<div class="crumb">
	<a href="/">Главная</a>
	<a href="/user_blog.php">Статьи</a>
	<span><?php if (! empty ( $this->_tpl_vars['blogentry_info']['blogentry_id'] )): ?>Редактировать статью<?php else: ?>Написать статью<?php endif; ?></span>
</div>
            <div class="clear"></div>
            <div class="editor_block">

<?php 
$javascript_lang_import_list = SELanguage::_javascript_redundancy_filter(array(1500067,1500122,1500123));
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
 
 echo '
<script type=\'text/javascript\'> 
<!--
  
  SocialEngine.Blog = new SocialEngineAPI.Blog();
  SocialEngine.RegisterModule(SocialEngine.Blog);
  
// -->
</script>
'; ?>



<div id="entry_main">
<br>
  <form action='user_blog_entry.php' method='post' name='blogform' id="blogform">
	<div class="edit_blog">
		<div class="input">
			<label><?php echo SELanguage::_get(1500056); ?></label>
			<input type='text' class="text" name='blogentry_title' size='50' maxlength='100'<?php if (! empty ( $this->_tpl_vars['blogentry_info']['blogentry_title'] )): ?> value='<?php echo $this->_tpl_vars['blogentry_info']['blogentry_title']; ?>
'<?php endif; ?> />
		</div>
    </div>

<script type="text/javascript">
  <!--
  var sToolbar;
  var oFCKeditor = new FCKeditor('blogentry_body');
  oFCKeditor.BasePath = "./include/fckeditor/";
  oFCKeditor.Config["ProcessHTMLEntities"] = false;
  oFCKeditor.Config["CustomConfigurationsPath"] = "../../js/blog_fckconfig.js";
  oFCKeditor.Height = "500";
//  oFCKeditor.Weidth = "660";
  oFCKeditor.ToolbarSet = "se_blog";
  oFCKeditor.Value = '<?php if (! empty ( $this->_tpl_vars['blogentry_info']['blogentry_body'] )): 
 echo $this->_tpl_vars['blogentry_info']['blogentry_body']; 
 endif; ?>';
  oFCKeditor.Config["SocialEngineUploadCustom"] = <?php if (! empty ( $this->_tpl_vars['global_plugins']['album'] ) && $this->_tpl_vars['user']->level_info['level_album_allow']): ?>true<?php else: ?>false<?php endif; ?>;
  oFCKeditor.Create() ;
  //-->
</script>
  
  

    
  
 
  
    <?php if (! empty ( $this->_tpl_vars['blogentry_info']['blogentry_id'] )): ?>
    <input type='hidden' name='blogentry_id' value='<?php echo $this->_tpl_vars['blogentry_info']['blogentry_id']; ?>
' />
  <?php endif; ?>

  </div></div>
  <div class="buttons_edit_blog">
        <?php $this->assign('langBlockTemp', SE_Language::_get(1500065));


  ?>
        <span class="button2"><span class="l">&nbsp;</span><span class="c">
        <input type="submit" style="padding:1px 0px 0px 0px;"  value="Сохранить" name="save" />
        </span><span class="r">&nbsp;</span></span><?php 

  ?>
        <input type='hidden' name='task' value='dosave'>
        </form>
      
        <form action='user_blog.php' method='post'>
        <?php $this->assign('langBlockTemp', SE_Language::_get(39));


  ?>
        <span class="button2"><span class="l">&nbsp;</span><span class="c">
        <input type="submit" style="padding:1px 0px 0px 0px;"  value="Отмена" name="save" />
        </span><span class="r">&nbsp;</span></span>
        <?php 

  ?>
        </form>
    </div>
      
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>