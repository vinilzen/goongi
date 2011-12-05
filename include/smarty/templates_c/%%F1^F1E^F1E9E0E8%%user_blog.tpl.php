<?php /* Smarty version 2.6.14, created on 2011-12-05 12:46:42
         compiled from user_blog.tpl */
?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'math', 'user_blog.tpl', 107, false),array('function', 'cycle', 'user_blog.tpl', 128, false),array('modifier', 'truncate', 'user_blog.tpl', 137, false),array('modifier', 'strip_tags', 'user_blog.tpl', 146, false),)), $this);
?><?php
SELanguage::_preload_multi(1500007,652,1500044,1500045,1500046,1500047,1500001,1500048,1500049,646,861,1500122,1500123,1500050,1500051,182,184,185,183,1500127,1500042,187,155,788,1500114,175,39);
SELanguage::load();
?>﻿<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<h1><?php echo SELanguage::_get(1500007); ?></h1>
<div class="crumb">
	<a href="/#">Главная</a>
	<a href="<?php echo $this->_tpl_vars['url']->url_create('profile',$this->_tpl_vars['user']->user_info['user_username']); ?>
"><?php echo SELanguage::_get(652); ?><!-- Профиль --></a>
	<span><?php echo SELanguage::_get(1500007); ?></span>
</div>
<div class="buttons">
	<div class="r_link"><a href="#" class="ico1">&nbsp;</a><a href="/user_blog_settings.php" class="ico2">&nbsp;</a></div>
	<span class="button2" id="add_event"><span class="l">&nbsp;</span><span class="c"><input type="button" value="Создать событие" name="creat" /></span><span class="r">&nbsp;</span></span>
	<span class="button3" id="save_tree"><span class="l">&nbsp;</span><span class="c"><input type="button" value="Сохранить дерево" name="creat" /></span><span class="r">&nbsp;</span></span>
</div>
<div class='page_header'><?php echo SELanguage::_get(1500044); ?></div>
<div>
  <?php echo SELanguage::_get(1500045); ?>
</div>
<br />


<div style='margin-top: 20px;'>
  <?php if ($this->_tpl_vars['user']->level_info['level_blog_create']): ?>
  <div class='button' style='float: left; padding-right: 20px;'>
    <a href='user_blog_entry.php'><img src='./images/icons/blog_newentry16.gif' border='0' class='button' /><?php echo SELanguage::_get(1500046); ?></a>
  </div>
  <?php endif; ?>
  <?php if ($this->_tpl_vars['user']->level_info['level_blog_view']): ?>
  <div class='button' style='float: left; padding-right: 20px;'>
    <a href='user_blog_subscriptions.php'><img src='./images/icons/blog_settings16.gif' border='0' class='button' /><?php echo SELanguage::_get(1500047); ?></a>
  </div>
  <div class='button' style='float: left; padding-right: 20px;'>
    <a href='user_blog_settings.php'><img src='./images/icons/blog_settings16.gif' border='0' class='button' /><?php echo SELanguage::_get(1500001); ?></a>
  </div>
  <?php endif; ?>
  <?php if ($this->_tpl_vars['user']->level_info['level_blog_create']): ?>
  <div class='button' style='float: left; padding-right: 20px;'>
    <a href="javascript:void(0);" onclick="$('blog_search').style.display = ( $('blog_search').style.display=='block' ? 'none' : 'block');"><img src='./images/icons/search16.gif' border='0' class='button' /><?php echo SELanguage::_get(1500048); ?></a>
  </div>
  <?php endif; ?>
  <div style='clear: both; height: 0px;'></div>
</div>
<br />


<div style='width: 550px;border: 1px solid #AAAAAA; background: #EEEEEE;margin-bottom:8px;<?php if ($this->_tpl_vars['search'] == ""): ?> display: none;<?php endif; ?>' id='blog_search'>
  <div style='padding: 10px;'>
    <form action='user_blog.php' name='searchform' method='post'>
    <table cellpadding='0' cellspacing='0' align='center'>
    <tr>
    <td><b><?php echo SELanguage::_get(1500049); ?></b>&nbsp;&nbsp;</td>
    <td><input type='text' name='search' maxlength='100' size='30' value='<?php echo $this->_tpl_vars['search']; ?>
' />&nbsp;</td>
    <td><?php $this->assign('langBlockTemp', SE_Language::_get(646));


  ?><input type='submit' class='button' value='<?php echo $this->_tpl_vars['langBlockTemp']; ?>
' /><?php 

  ?></td>
    </tr>
    </table>
    <input type='hidden' name='s' value='<?php echo $this->_tpl_vars['s']; ?>
' />
    <input type='hidden' name='p' value='<?php echo $this->_tpl_vars['p']; ?>
' />
    </form>
  </div>
</div>



<?php 
$javascript_lang_import_list = SELanguage::_javascript_redundancy_filter(array(861,1500122,1500123));
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
<script type="text/javascript" src="./include/js/class_blog.js"></script>
<script type="text/javascript">
  
  SocialEngine.Blog = new SocialEngineAPI.Blog();
  SocialEngine.RegisterModule(SocialEngine.Blog);
  
</script>



<?php if ($this->_tpl_vars['user']->level_info['level_blog_create']): ?>

    <?php if (! $this->_tpl_vars['total_blogentries']): ?>

    <table cellpadding='0' cellspacing='0' align='center'>
      <tr>
        <td class='result'>
          <?php if (! empty ( $this->_tpl_vars['search'] )): ?>
            <img src='./images/icons/bulb16.gif' border='0' class='icon' />
            <?php echo SELanguage::_get(1500050); ?>
          <?php else: ?>
            <img src='./images/icons/bulb16.gif' border='0' class='icon' />
            <?php echo sprintf(SELanguage::_get(1500051), 'user_blog_entry.php'); ?>
          <?php endif; ?>
        </td>
      </tr>
    </table>


    <?php else: ?>
    
    <div style='width: 550px;'>

            <?php if ($this->_tpl_vars['maxpage'] > 1): ?>
        <div style='text-align: center; padding: 10px;'>
          <?php if ($this->_tpl_vars['p'] != 1): ?>
            <a href='user_blog.php?s=<?php echo $this->_tpl_vars['s']; ?>
&search=<?php echo $this->_tpl_vars['search']; ?>
&p=<?php echo smarty_function_math(array('equation' => "p-1",'p' => $this->_tpl_vars['p']), $this);?>
'>&#171; <?php echo SELanguage::_get(182); ?></a>
          <?php else: ?>
            <font class='disabled'>&#171; <?php echo SELanguage::_get(182); ?></font>
          <?php endif; ?>
          <?php if ($this->_tpl_vars['p_start'] == $this->_tpl_vars['p_end']): ?>
            &nbsp;|&nbsp; <?php echo sprintf(SELanguage::_get(184), $this->_tpl_vars['p_start'], $this->_tpl_vars['total_blogentries']); ?> &nbsp;|&nbsp; 
          <?php else: ?>
            &nbsp;|&nbsp; <?php echo sprintf(SELanguage::_get(185), $this->_tpl_vars['p_start'], $this->_tpl_vars['p_end'], $this->_tpl_vars['total_blogentries']); ?> &nbsp;|&nbsp; 
          <?php endif; ?>
          <?php if ($this->_tpl_vars['p'] != $this->_tpl_vars['maxpage']): ?>
            <a href='user_blog.php?s=<?php echo $this->_tpl_vars['s']; ?>
&search=<?php echo $this->_tpl_vars['search']; ?>
&p=<?php echo smarty_function_math(array('equation' => "p+1",'p' => $this->_tpl_vars['p']), $this);?>
'><?php echo SELanguage::_get(183); ?> &#187;</a>
          <?php else: ?>
            <font class='disabled'><?php echo SELanguage::_get(183); ?> &#187;</font>
          <?php endif; ?>
        </div>
      <?php endif; ?>

            <div class='blog_list'>
      <form action='user_blog.php' name='entryform' method='post'>
      <?php unset($this->_sections['blogentry_loop']);
$this->_sections['blogentry_loop']['name'] = 'blogentry_loop';
$this->_sections['blogentry_loop']['loop'] = is_array($_loop=$this->_tpl_vars['blogentries']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['blogentry_loop']['show'] = true;
$this->_sections['blogentry_loop']['max'] = $this->_sections['blogentry_loop']['loop'];
$this->_sections['blogentry_loop']['step'] = 1;
$this->_sections['blogentry_loop']['start'] = $this->_sections['blogentry_loop']['step'] > 0 ? 0 : $this->_sections['blogentry_loop']['loop']-1;
if ($this->_sections['blogentry_loop']['show']) {
    $this->_sections['blogentry_loop']['total'] = $this->_sections['blogentry_loop']['loop'];
    if ($this->_sections['blogentry_loop']['total'] == 0)
        $this->_sections['blogentry_loop']['show'] = false;
} else
    $this->_sections['blogentry_loop']['total'] = 0;
if ($this->_sections['blogentry_loop']['show']):

            for ($this->_sections['blogentry_loop']['index'] = $this->_sections['blogentry_loop']['start'], $this->_sections['blogentry_loop']['iteration'] = 1;
                 $this->_sections['blogentry_loop']['iteration'] <= $this->_sections['blogentry_loop']['total'];
                 $this->_sections['blogentry_loop']['index'] += $this->_sections['blogentry_loop']['step'], $this->_sections['blogentry_loop']['iteration']++):
$this->_sections['blogentry_loop']['rownum'] = $this->_sections['blogentry_loop']['iteration'];
$this->_sections['blogentry_loop']['index_prev'] = $this->_sections['blogentry_loop']['index'] - $this->_sections['blogentry_loop']['step'];
$this->_sections['blogentry_loop']['index_next'] = $this->_sections['blogentry_loop']['index'] + $this->_sections['blogentry_loop']['step'];
$this->_sections['blogentry_loop']['first']      = ($this->_sections['blogentry_loop']['iteration'] == 1);
$this->_sections['blogentry_loop']['last']       = ($this->_sections['blogentry_loop']['iteration'] == $this->_sections['blogentry_loop']['total']);
?>
        <div id="seBlogRow_<?php echo $this->_tpl_vars['blogentries'][$this->_sections['blogentry_loop']['index']]['blogentry_id']; ?>
" class='<?php echo smarty_function_cycle(array('values' => "blog_list1,blog_list2"), $this);?>
'>
          <table cellpadding='0' cellspacing='0' width='100%'>
            <tr>
              <td style='padding-top: 2px; vertical-align: top;' width='1'>
                <input type='checkbox' name='delete_blogentries[]' value='<?php echo $this->_tpl_vars['blogentries'][$this->_sections['blogentry_loop']['index']]['blogentry_id']; ?>
' />
              </td>
              <td style='padding-left: 5px;'>
                <div style='font-size: 13px; font-weight: bold;'>
                  <a href='<?php echo $this->_tpl_vars['url']->url_create('blog_entry',$this->_tpl_vars['user']->user_info['user_username'],$this->_tpl_vars['blogentries'][$this->_sections['blogentry_loop']['index']]['blogentry_id']); ?>
'>
                    <?php echo ((is_array($_tmp=$this->_tpl_vars['blogentries'][$this->_sections['blogentry_loop']['index']]['blogentry_title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 50, "...", false) : smarty_modifier_truncate($_tmp, 50, "...", false)); ?>

                  </a>
                </div>
                <div style='font-size: 9px; color: #777777;'>
                  <?php echo sprintf(SELanguage::_get(1500127), $this->_tpl_vars['datetime']->cdate(($this->_tpl_vars['setting']['setting_dateformat']),$this->_tpl_vars['datetime']->timezone($this->_tpl_vars['blogentries'][$this->_sections['blogentry_loop']['index']]['blogentry_date'],$this->_tpl_vars['global_timezone']))); ?>
                  - <?php echo sprintf(SELanguage::_get(1500042), $this->_tpl_vars['blogentries'][$this->_sections['blogentry_loop']['index']]['blogentry_totalcomments']); ?>
                </div>
                <?php if (! empty ( $this->_tpl_vars['blogentries'][$this->_sections['blogentry_loop']['index']]['blogentry_body'] )): ?>
                <div style='font-size: 9px; color: #777777;padding-top: 6px; width: 420px;'>
                  <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['blogentries'][$this->_sections['blogentry_loop']['index']]['blogentry_body'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 200) : smarty_modifier_truncate($_tmp, 200)); ?>

                </div>
                <?php endif; ?>
              </td>
              <td style='vertical-align: top; text-align: right; padding-left: 10px;'>
                <a href='user_blog_entry.php?blogentry_id=<?php echo $this->_tpl_vars['blogentries'][$this->_sections['blogentry_loop']['index']]['blogentry_id']; ?>
'><?php echo SELanguage::_get(187); ?></a>
                | 
                <a href='javascript:void(0);' onclick='SocialEngine.Blog.deleteBlog(<?php echo $this->_tpl_vars['blogentries'][$this->_sections['blogentry_loop']['index']]['blogentry_id']; ?>
);'><?php echo SELanguage::_get(155); ?></a>
              </td>
            </tr>
          </table>
        </div>
      <?php endfor; endif; ?>
      </div>
      
      <div style='margin-top: 10px;'>
        <?php $this->assign('langBlockTemp', SE_Language::_get(788));


  ?><input type='submit' class='button' value='<?php echo $this->_tpl_vars['langBlockTemp']; ?>
' /><?php 

  ?>
        <input type='hidden' name='task' value='delete' />
        <input type='hidden' name='s' value='<?php echo $this->_tpl_vars['s']; ?>
' />
        <input type='hidden' name='p' value='<?php echo $this->_tpl_vars['p']; ?>
' />
        </form>
      </div>
      
    </div>
    
    <br />
    <br />
    <br />
    
    
        <div style='display: none;' id='confirmblogdelete'>
      <div style='margin-top: 10px;'>
        <?php echo SELanguage::_get(1500114); ?>
      </div>
      <br />
      <?php $this->assign('langBlockTemp', SE_Language::_get(175));


  ?><input type='button' class='button' value='<?php echo $this->_tpl_vars['langBlockTemp']; ?>
' onClick='parent.TB_remove();parent.SocialEngine.Blog.deleteBlogConfirm();' /><?php 

  ?>
      <?php $this->assign('langBlockTemp', SE_Language::_get(39));


  ?><input type='button' class='button' value='<?php echo $this->_tpl_vars['langBlockTemp']; ?>
' onClick='parent.TB_remove();' /><?php 

  ?>
    </div>
    
  <?php endif; ?>
  
<?php endif; 
 $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>