<?php /* Smarty version 2.6.14, created on 2011-12-05 11:43:23
         compiled from user_blog_entry.tpl */
?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'user_blog_entry.tpl', 49, false),array('modifier', 'truncate', 'user_blog_entry.tpl', 65, false),)), $this);
?><?php
SELanguage::_preload_multi(1500130,1500053,1500054,1500055,1500067,1500122,1500123,1500056,1500057,1500128,1500017,1500058,1500059,1500060,1500061,1500062,1500063,1500132,1500133,1500064,1500126,1500065,1500066,39,1500068);
SELanguage::load();
?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<script type="text/javascript" src="./include/js/class_blog.js"></script>
<script type="text/javascript" src="./include/fckeditor/fckeditor.js"></script>

<table cellpadding='0' cellspacing='0' width='100%'>
  <tr>
  <td valign='top'>     
    <img src='./images/icons/blog_blog48.gif' border='0' class='icon_big' style="margin-bottom: 15px;">
    <div class='page_header'><?php if (! empty ( $this->_tpl_vars['blogentry_info']['blogentry_id'] )): 
 echo SELanguage::_get(1500130); 
 else: 
 echo SELanguage::_get(1500053); 
 endif; ?></div>
    <div><?php echo SELanguage::_get(1500054); ?></div>
  </td>
  <td valign='top' align='right'>
    <table cellpadding='0' cellspacing='0' width='130'>
    <tr><td class='button' nowrap='nowrap'><a href='user_blog.php'><img src='./images/icons/back16.gif' border='0' class='button'><?php echo SELanguage::_get(1500055); ?></a></td></tr>
    </table>
  </td>
  </tr>
</table>

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

  <form action='user_blog_entry.php' method='post' name='blogform' id="blogform">
  <table cellpadding='0' cellspacing='0'>
  
    <tr>
      <td class='form1'><?php echo SELanguage::_get(1500056); ?></td>
      <td class='form2'><input type='text' name='blogentry_title' class='text' size='50' maxlength='100'<?php if (! empty ( $this->_tpl_vars['blogentry_info']['blogentry_title'] )): ?> value='<?php echo $this->_tpl_vars['blogentry_info']['blogentry_title']; ?>
'<?php endif; ?> /></td>
    </tr>
    
        <?php if ($this->_tpl_vars['user']->level_info['level_blog_category_create'] || count($this->_tpl_vars['blogentrycats']) > 0): ?>
    <tr>
      <td class='form1'><?php echo SELanguage::_get(1500057); ?></td>
      <td class='form2'>
        <table cellpadding='0' cellspacing='0'>
          <tr>
            <td>
              <select name='blogentry_blogentrycat_id' onchange="$('new_blogentrycat_title').style.display = ( this.value==-1 ? '' : 'none' );">
                <option value='0'></option>
                <?php unset($this->_sections['blogentrycat_loop']);
$this->_sections['blogentrycat_loop']['name'] = 'blogentrycat_loop';
$this->_sections['blogentrycat_loop']['loop'] = is_array($_loop=$this->_tpl_vars['blogentrycats']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['blogentrycat_loop']['show'] = true;
$this->_sections['blogentrycat_loop']['max'] = $this->_sections['blogentrycat_loop']['loop'];
$this->_sections['blogentrycat_loop']['step'] = 1;
$this->_sections['blogentrycat_loop']['start'] = $this->_sections['blogentrycat_loop']['step'] > 0 ? 0 : $this->_sections['blogentrycat_loop']['loop']-1;
if ($this->_sections['blogentrycat_loop']['show']) {
    $this->_sections['blogentrycat_loop']['total'] = $this->_sections['blogentrycat_loop']['loop'];
    if ($this->_sections['blogentrycat_loop']['total'] == 0)
        $this->_sections['blogentrycat_loop']['show'] = false;
} else
    $this->_sections['blogentrycat_loop']['total'] = 0;
if ($this->_sections['blogentrycat_loop']['show']):

            for ($this->_sections['blogentrycat_loop']['index'] = $this->_sections['blogentrycat_loop']['start'], $this->_sections['blogentrycat_loop']['iteration'] = 1;
                 $this->_sections['blogentrycat_loop']['iteration'] <= $this->_sections['blogentrycat_loop']['total'];
                 $this->_sections['blogentrycat_loop']['index'] += $this->_sections['blogentrycat_loop']['step'], $this->_sections['blogentrycat_loop']['iteration']++):
$this->_sections['blogentrycat_loop']['rownum'] = $this->_sections['blogentrycat_loop']['iteration'];
$this->_sections['blogentrycat_loop']['index_prev'] = $this->_sections['blogentrycat_loop']['index'] - $this->_sections['blogentrycat_loop']['step'];
$this->_sections['blogentrycat_loop']['index_next'] = $this->_sections['blogentrycat_loop']['index'] + $this->_sections['blogentrycat_loop']['step'];
$this->_sections['blogentrycat_loop']['first']      = ($this->_sections['blogentrycat_loop']['iteration'] == 1);
$this->_sections['blogentrycat_loop']['last']       = ($this->_sections['blogentrycat_loop']['iteration'] == $this->_sections['blogentrycat_loop']['total']);
?>
                <option value='<?php echo $this->_tpl_vars['blogentrycats'][$this->_sections['blogentrycat_loop']['index']]['blogentrycat_id']; ?>
'<?php if (! empty ( $this->_tpl_vars['blogentry_info']['blogentry_blogentrycat_id'] ) && $this->_tpl_vars['blogentry_info']['blogentry_blogentrycat_id'] == $this->_tpl_vars['blogentrycats'][$this->_sections['blogentrycat_loop']['index']]['blogentrycat_id']): ?> SELECTED<?php endif; ?>>
                  <?php if (! empty ( $this->_tpl_vars['blogentrycats'][$this->_sections['blogentrycat_loop']['index']]['blogentrycat_languagevar_id'] )): ?>
                    <?php ob_start(); 
 echo SELanguage::_get($this->_tpl_vars['blogentrycats'][$this->_sections['blogentrycat_loop']['index']]['blogentrycat_languagevar_id']); 
 $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('blogentrycat_title', ob_get_contents());ob_end_clean(); ?>
                  <?php else: ?>
                    <?php $this->assign('blogentrycat_title', $this->_tpl_vars['blogentrycats'][$this->_sections['blogentrycat_loop']['index']]['blogentrycat_title']); ?>
                  <?php endif; ?>
                  <?php echo ((is_array($_tmp=$this->_tpl_vars['blogentrycat_title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 61) : smarty_modifier_truncate($_tmp, 61)); ?>

                </option>
                <?php endfor; endif; ?>
                <?php if ($this->_tpl_vars['user']->level_info['level_blog_category_create']): ?><option value='-1'><?php echo SELanguage::_get(1500128); ?></option><?php endif; ?>
              </select>
            </td>
            <td>
              &nbsp;&nbsp;<input type="text" id="new_blogentrycat_title" name="new_blogentrycat_title" style="display:none;" />
            </td>
          </tr>
        </table>
      </td>
    </tr>
    <?php endif; ?>
    
        <?php if (! empty ( $this->_tpl_vars['comments_total'] )): ?>
      <tr>
        <td class='form1'>
          <?php echo SELanguage::_get(1500017); ?>
        </td>
        <td class='form2'>
          <?php echo sprintf(SELanguage::_get(1500058), $this->_tpl_vars['comments_total'], $this->_tpl_vars['url']->url_create('blog_entry',$this->_tpl_vars['user']->user_info['user_username'],$this->_tpl_vars['blogentry_info']['blogentry_id'])); ?>
        </td>
      </tr>
    <?php endif; ?>
    
  </table>
  <br />


  <script type="text/javascript">
  <!--
  var sToolbar;
  var oFCKeditor = new FCKeditor('blogentry_body');
  oFCKeditor.BasePath = "./include/fckeditor/";
  oFCKeditor.Config["ProcessHTMLEntities"] = false;
  oFCKeditor.Config["CustomConfigurationsPath"] = "../../js/blog_fckconfig.js";
  oFCKeditor.Height = "300";
  oFCKeditor.ToolbarSet = "se_blog";
  oFCKeditor.Value = '<?php if (! empty ( $this->_tpl_vars['blogentry_info']['blogentry_body'] )): 
 echo $this->_tpl_vars['blogentry_info']['blogentry_body']; 
 endif; ?>';
  oFCKeditor.Config["SocialEngineUploadCustom"] = <?php if (! empty ( $this->_tpl_vars['global_plugins']['album'] ) && $this->_tpl_vars['user']->level_info['level_album_allow']): ?>true<?php else: ?>false<?php endif; ?>;
  oFCKeditor.Create() ;
  //-->
  </script>
  
  
  
    <table cellpadding='0' cellspacing='0' width='100%'>
    <tr>
      <td class='blog_options'>
        <div id='settings_privacy_show'>
          <a href="javascript:void(0);" onclick="$('settings_privacy').style.display='block';$('settings_privacy_hide').style.display='block';$('settings_privacy_show').style.display='none';"><?php echo SELanguage::_get(1500059); ?></a>
        </div>
        <div id='settings_privacy_hide' style='display: none;'>
          <a href="javascript:void(0);" onclick="$('settings_privacy').style.display='none';$('settings_privacy_hide').style.display='none';$('settings_privacy_show').style.display='block';"><?php echo SELanguage::_get(1500060); ?></a>
        </div>
      </td>
    </tr>
  </table>
  
  
  <div id='settings_privacy' class='blog_settings' style='display: none;'>
  
        <?php if ($this->_tpl_vars['user']->level_info['level_blog_search'] == 1): ?>
      <b><?php echo SELanguage::_get(1500061); ?></b>
      <table cellpadding='0' cellspacing='0'>
        <tr>
          <td><input type='radio' name='blogentry_search' id='blogentry_search_1' value='1' <?php if (! isset ( $this->_tpl_vars['blogentry_info']['blogentry_search'] ) || $this->_tpl_vars['blogentry_info']['blogentry_search']): ?>checked='checked'<?php endif; ?> /></td>
          <td><label for='blogentry_search_1'><?php echo SELanguage::_get(1500062); ?></label></td>
        </tr>
        <tr>
          <td><input type='radio' name='blogentry_search' id='blogentry_search_0' value='0' <?php if (isset ( $this->_tpl_vars['blogentry_info']['blogentry_search'] ) && ! $this->_tpl_vars['blogentry_info']['blogentry_search']): ?>checked='checked'<?php endif; ?> /></td>
          <td><label for='blogentry_search_0'><?php echo SELanguage::_get(1500063); ?></label></td>
        </tr>
      </table>
      <br>
    <?php endif; ?>

        <?php if (count($this->_tpl_vars['privacy_options']) > 1): ?>
      <b><?php echo SELanguage::_get(1500132); ?></b>
      <table cellpadding='0' cellspacing='0'>
      <?php $_from = $this->_tpl_vars['privacy_options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['privacy_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['privacy_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
        $this->_foreach['privacy_loop']['iteration']++;
?>
        <tr>
        <td><input type='radio' name='blogentry_privacy' id='privacy_<?php echo $this->_tpl_vars['k']; ?>
' value='<?php echo $this->_tpl_vars['k']; ?>
'<?php if (( isset ( $this->_tpl_vars['blogentry_info']['blogentry_privacy'] ) && $this->_tpl_vars['k'] == $this->_tpl_vars['blogentry_info']['blogentry_privacy'] ) || ( ! isset ( $this->_tpl_vars['blogentry_info']['blogentry_privacy'] ) && ($this->_foreach['privacy_loop']['iteration'] <= 1) )): ?> checked='checked'<?php endif; ?> /></td>
        <td><label for='privacy_<?php echo $this->_tpl_vars['k']; ?>
'><?php echo SELanguage::_get($this->_tpl_vars['v']); ?></label></td>
        </tr>
      <?php endforeach; endif; unset($_from); ?>
      </table>
      <br />
    <?php endif; ?>

        <?php if (count($this->_tpl_vars['comment_options']) > 1): ?>
      <b><?php echo SELanguage::_get(1500133); ?></b>
      <table cellpadding='0' cellspacing='0'>
      <?php $_from = $this->_tpl_vars['comment_options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['comment_loop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['comment_loop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
        $this->_foreach['comment_loop']['iteration']++;
?>
        <tr>
        <td><input type='radio' name='blogentry_comments' id='comments_<?php echo $this->_tpl_vars['k']; ?>
' value='<?php echo $this->_tpl_vars['k']; ?>
'<?php if (( isset ( $this->_tpl_vars['blogentry_info']['blogentry_comments'] ) && $this->_tpl_vars['k'] == $this->_tpl_vars['blogentry_info']['blogentry_comments'] ) || ( ! isset ( $this->_tpl_vars['blogentry_info']['blogentry_comments'] ) && ($this->_foreach['comment_loop']['iteration'] <= 1) )): ?> checked='checked'<?php endif; ?> /></td>
        <td><label for='comments_<?php echo $this->_tpl_vars['k']; ?>
'><?php echo SELanguage::_get($this->_tpl_vars['v']); ?></label></td>
        </tr>
      <?php endforeach; endif; unset($_from); ?>
      </table>
      <br />
    <?php endif; ?>
    
        <b><?php echo SELanguage::_get(1500064); ?></b>
    <div><?php echo SELanguage::_get(1500126); ?></div>
    <table cellpadding='0' cellspacing='0'>
      <tr>
        <td>
          <textarea name="blogentry_trackbacks" style="width: 400px;"><?php if (! empty ( $this->_tpl_vars['blogentry_info']['blogentry_trackbacks'] )): 
 echo $this->_tpl_vars['blogentry_info']['blogentry_trackbacks']; 
 endif; ?></textarea>
        </td>
      </tr>
    </table>

  </div>
  <br />
  
  
  
    <?php if (! empty ( $this->_tpl_vars['blogentry_info']['blogentry_id'] )): ?>
    <input type='hidden' name='blogentry_id' value='<?php echo $this->_tpl_vars['blogentry_info']['blogentry_id']; ?>
' />
  <?php endif; ?>
  
  
  
  <table cellpadding='3' cellspacing='0'>
    <tr>
      <td>
        <?php $this->assign('langBlockTemp', SE_Language::_get(1500065));


  ?><input type='submit' class='button' value='<?php echo $this->_tpl_vars['langBlockTemp']; ?>
'><?php 

  ?>
        <input type='hidden' name='task' value='dosave'>
        </form>
      </td>
      <td>
        <?php $this->assign('langBlockTemp', SE_Language::_get(1500066));


  ?><input type='button' class='button' value='<?php echo $this->_tpl_vars['langBlockTemp']; ?>
' onClick="SocialEngine.Blog.previewBlog(); return false;"><?php 

  ?>
      </td>
      <td>
        <form action='user_blog.php' method='post'>
        <?php $this->assign('langBlockTemp', SE_Language::_get(39));


  ?><input type='submit' class='button' value='<?php echo $this->_tpl_vars['langBlockTemp']; ?>
'><?php 

  ?>
        </form>
      </td>
    </tr>
  </table>
  
</div>




<div id="entry_preview" style='display: none;'>
  <h2><?php echo SELanguage::_get(1500067); ?> (<a href="javascript:void(0)" onClick="parent.TB_remove();"><?php echo SELanguage::_get(1500068); ?></a>)</h2>
  <div id='previewpane' style='padding:0px;border:1px dashed #AAAAAA;'></div>
</div>



<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>