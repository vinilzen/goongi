<?php /* Smarty version 2.6.14, created on 2011-12-07 16:35:43
         compiled from user_blog.tpl */
?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'user_blog.tpl', 57, false),array('modifier', 'strip_tags', 'user_blog.tpl', 67, false),array('function', 'math', 'user_blog.tpl', 97, false),)), $this);
?><?php
SELanguage::_preload_multi(652,1500049,646,1500114,175,39,184,185);
SELanguage::load();
?>﻿<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<h1>Статьи</h1>
<div class="crumb">
	<a href="/#">Главная</a>
	<a href="<?php echo $this->_tpl_vars['url']->url_create('profile',$this->_tpl_vars['user']->user_info['user_username']); ?>
"><?php echo SELanguage::_get(652); ?><!-- Профиль --></a>
	<span>Статьи</span>
</div>
<div class="buttons">
	<span class="button2"><span class="l">&nbsp;</span><span class="c">
        <a href='user_blog_entry.php'>
        <input type="button" value="Написать статью" name="creat" /></a></span>
        <span class="r">&nbsp;</span></span>
</div>

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




<?php if ($this->_tpl_vars['user']->level_info['level_blog_create']): ?>

    <?php if (! $this->_tpl_vars['total_blogentries']): ?>

   

    <?php else: ?>
   
            <ul class="article_list">
      <form action='user_blog.php' name='entryform' method='post'>
        <?php echo $this->_tpl_vars['i']; ?>

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
       <li id = "blog_msg<?php echo $this->_tpl_vars['blogentries'][$this->_sections['blogentry_loop']['index']]['blogentry_id']; ?>
">
            <a><img src="/uploads_user/1000/<?php echo $this->_tpl_vars['user']->user_info['user_id']; ?>
/<?php echo $this->_tpl_vars['user']->user_info['user_photo']; ?>
" alt="" /></a>
            <div>
                <a class="name"><?php echo $this->_tpl_vars['blogentries'][$this->_sections['blogentry_loop']['index']]['blogentry_author']->user_displayname; ?>
</a>
                  <big><a href='<?php echo $this->_tpl_vars['url']->url_create('blog_entry',$this->_tpl_vars['user']->user_info['user_username'],$this->_tpl_vars['blogentries'][$this->_sections['blogentry_loop']['index']]['blogentry_id']); ?>
'>
                    <?php echo ((is_array($_tmp=$this->_tpl_vars['blogentries'][$this->_sections['blogentry_loop']['index']]['blogentry_title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 80, "...", false) : smarty_modifier_truncate($_tmp, 80, "...", false)); ?>

                  </a></big>
                <a href="#" onclick="delete_blog('deleteblog',<?php echo $this->_tpl_vars['blogentries'][$this->_sections['blogentry_loop']['index']]['blogentry_id']; ?>
); return false;" class="del">Удалить</a>
                <a href='user_blog_entry.php?blogentry_id=<?php echo $this->_tpl_vars['blogentries'][$this->_sections['blogentry_loop']['index']]['blogentry_id']; ?>
' class="edit">Редактировать</a>
                <span></span>
            </div>
                 
               
                <?php if (! empty ( $this->_tpl_vars['blogentries'][$this->_sections['blogentry_loop']['index']]['blogentry_body'] )): ?>
                
                  <p><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['blogentries'][$this->_sections['blogentry_loop']['index']]['blogentry_body'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 1100) : smarty_modifier_truncate($_tmp, 1100)); ?>
</p>
                
                <?php endif; ?>
              
        </li>
       <?php endfor; endif; ?>
      </ul>
     

    
       
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
  
<?php endif; ?>


            <?php if ($this->_tpl_vars['maxpage'] > 1): ?>
        <div class="pager">
          <?php if ($this->_tpl_vars['p'] != 1): ?>
            <a  class="prev" href='user_blog.php?s=<?php echo $this->_tpl_vars['s']; ?>
&search=<?php echo $this->_tpl_vars['search']; ?>
&p=<?php echo smarty_function_math(array('equation' => "p-1",'p' => $this->_tpl_vars['p']), $this);?>
'>Сюда</a>
          <?php endif; ?>
          <?php if ($this->_tpl_vars['p_start'] == $this->_tpl_vars['p_end']): ?>
            &nbsp;|&nbsp; <?php echo sprintf(SELanguage::_get(184), $this->_tpl_vars['p_start'], $this->_tpl_vars['total_blogentries']); ?> &nbsp;|&nbsp;
          <?php else: ?>
            &nbsp;|&nbsp; <?php echo sprintf(SELanguage::_get(185), $this->_tpl_vars['p_start'], $this->_tpl_vars['p_end'], $this->_tpl_vars['total_blogentries']); ?> &nbsp;|&nbsp;
          <?php endif; ?>
          <?php if ($this->_tpl_vars['p'] != $this->_tpl_vars['maxpage']): ?>
            <a class="next" href='user_blog.php?s=<?php echo $this->_tpl_vars['s']; ?>
&search=<?php echo $this->_tpl_vars['search']; ?>
&p=<?php echo smarty_function_math(array('equation' => "p+1",'p' => $this->_tpl_vars['p']), $this);?>
'>Туда</a>
          <?php else: ?>
            <a href="#" class="next">Туда</a>
          <?php endif; ?>
     </div>
      <?php endif; ?>
           
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>