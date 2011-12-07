<?php /* Smarty version 2.6.14, created on 2011-12-07 18:33:53
         compiled from blog.tpl */
?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'blog.tpl', 45, false),array('modifier', 'choptext', 'blog.tpl', 50, false),array('function', 'math', 'blog.tpl', 127, false),)), $this);
?><?php
SELanguage::_preload_multi(1500015,652,1500025,155,1500026,182,184,185,183);
SELanguage::load();
?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


  <?php unset($this->_sections['entries_loop']);
$this->_sections['entries_loop']['name'] = 'entries_loop';
$this->_sections['entries_loop']['loop'] = is_array($_loop=$this->_tpl_vars['entries']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['entries_loop']['show'] = true;
$this->_sections['entries_loop']['max'] = $this->_sections['entries_loop']['loop'];
$this->_sections['entries_loop']['step'] = 1;
$this->_sections['entries_loop']['start'] = $this->_sections['entries_loop']['step'] > 0 ? 0 : $this->_sections['entries_loop']['loop']-1;
if ($this->_sections['entries_loop']['show']) {
    $this->_sections['entries_loop']['total'] = $this->_sections['entries_loop']['loop'];
    if ($this->_sections['entries_loop']['total'] == 0)
        $this->_sections['entries_loop']['show'] = false;
} else
    $this->_sections['entries_loop']['total'] = 0;
if ($this->_sections['entries_loop']['show']):

            for ($this->_sections['entries_loop']['index'] = $this->_sections['entries_loop']['start'], $this->_sections['entries_loop']['iteration'] = 1;
                 $this->_sections['entries_loop']['iteration'] <= $this->_sections['entries_loop']['total'];
                 $this->_sections['entries_loop']['index'] += $this->_sections['entries_loop']['step'], $this->_sections['entries_loop']['iteration']++):
$this->_sections['entries_loop']['rownum'] = $this->_sections['entries_loop']['iteration'];
$this->_sections['entries_loop']['index_prev'] = $this->_sections['entries_loop']['index'] - $this->_sections['entries_loop']['step'];
$this->_sections['entries_loop']['index_next'] = $this->_sections['entries_loop']['index'] + $this->_sections['entries_loop']['step'];
$this->_sections['entries_loop']['first']      = ($this->_sections['entries_loop']['iteration'] == 1);
$this->_sections['entries_loop']['last']       = ($this->_sections['entries_loop']['iteration'] == $this->_sections['entries_loop']['total']);
?>
   
            <?php if ($this->_tpl_vars['entries'][$this->_sections['entries_loop']['index']]['blogentry_title'] != ""): ?>
        <?php $this->assign('blogentry_title', $this->_tpl_vars['entries'][$this->_sections['entries_loop']['index']]['blogentry_title']); ?>
      <?php else: ?>
        <?php $this->assign('blogentry_title', SE_Language::_get(1500015));


  
 

  ?>
      <?php endif; ?>
            <h1><?php echo $this->_tpl_vars['blogentry_title']; ?>
</h1>
            <div class="crumb">
                    <a href="/">Главная</a>
                    <a href="<?php echo $this->_tpl_vars['url']->url_create('profile',$this->_tpl_vars['user']->user_info['user_username']); ?>
"><?php echo SELanguage::_get(652); ?><!-- Профиль --></a>
                    <a href="/user_blog.php">Статьи</a>
                    <span><?php echo $this->_tpl_vars['blogentry_title']; ?>
</span>
            </div>
                     
            <div class="buttons">
                <span class="button2"><span class="l">&nbsp;</span><span class="c">
                    <a href="user_blog_entry.php?blogentry_id=<?php echo $this->_tpl_vars['blogentry_id']; ?>
">
                    <input type="button" value="Редактировать" name="creat" />
                    </a>
                </span><span class="r">&nbsp;</span></span>
                <span class="button3"><span class="l">&nbsp;</span><span class="c">
                    <a href="user_blog.php?blogentry_id=<?php echo $this->_tpl_vars['blogentry_id']; ?>
&del=1" onclick="return delete_blog_link();">
                    <input type="button"  value="Удалить" name="creat" /></a>
                </span><span class="r">&nbsp;</span></span>
            </div>
        

            
             
                        <?php if (! empty ( $this->_tpl_vars['entries'][$this->_sections['entries_loop']['index']]['blogentry_blogentrycat_id'] )): ?>
                 Category:
                <?php if (! $this->_tpl_vars['entries'][$this->_sections['entries_loop']['index']]['blogentrycat_user_id']): ?><a href='browse_blogs.php?c=<?php echo $this->_tpl_vars['entries'][$this->_sections['entries_loop']['index']]['blogentry_blogentrycat_id']; ?>
'><?php endif; ?>
                <?php if (! empty ( $this->_tpl_vars['entries'][$this->_sections['entries_loop']['index']]['blogentrycat_languagevar_id'] )): ?>
                  <?php ob_start(); 
 echo SELanguage::_get($this->_tpl_vars['entries'][$this->_sections['entries_loop']['index']]['blogentrycat_languagevar_id']); 
 $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('blogentrycat_title', ob_get_contents());ob_end_clean(); ?>
                <?php else: ?>
                  <?php $this->assign('blogentrycat_title', $this->_tpl_vars['entries'][$this->_sections['entries_loop']['index']]['blogentrycat_title']); ?>
                <?php endif; ?>
                <?php echo ((is_array($_tmp=$this->_tpl_vars['blogentrycat_title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 97) : smarty_modifier_truncate($_tmp, 97)); ?>

                <?php if (! $this->_tpl_vars['entries'][$this->_sections['entries_loop']['index']]['blogentrycat_user_id']): ?></a><?php endif; ?>
              </div>
            <?php endif; ?>
            <div class="press_desc">
              <?php echo ((is_array($_tmp=$this->_tpl_vars['entries'][$this->_sections['entries_loop']['index']]['blogentry_body'])) ? $this->_run_mod_handler('choptext', true, $_tmp, 75, "<br>") : smarty_modifier_choptext($_tmp, 75, "<br>")); ?>

            </div>
            <div class="autor"><a href="#"><img src="/uploads_user/1000/<?php echo $this->_tpl_vars['owner']->user_info['user_id']; ?>
/<?php echo $this->_tpl_vars['owner']->user_info['user_photo']; ?>
" alt="" /></a><span>Автор:</span>
            <a href="#"><?php echo $this->_tpl_vars['entries'][$this->_sections['entries_loop']['index']]['blogentry_author']->user_displayname; ?>
</a></div>
      <?php endfor; endif; ?>
  
  
    <?php if ($this->_tpl_vars['blogentry_id'] && $this->_tpl_vars['total_blogentries'] == 1): ?>
             <div class='button' style='float: left; padding-left: 20px;'>
           
     
      
             <h2>Комментарии (<span id = "comments_count"></span>)</h2>
       
    <?php echo '
	<script type="text/javascript">
		comment_get(\''; 
 echo $this->_tpl_vars['owner']->user_info['user_username']; 
 echo '\','; 
 echo $this->_tpl_vars['entries'][0]['blogentry_id']; 
 echo ', '; 
 echo $this->_tpl_vars['user']->user_info['user_id']; 
 echo ',\'blog\',\'blogentry_id\', \'blogentries\', \'blogentry\');
	</script>
    '; ?>

        <ul class="comments" id="comments_list"></ul>
      

        <h2>Написать комментарий</h2>
        <div class="form add_com">
            <div class="input"><label>Текст комметария</label><textarea rows="3" cols="10" id="comment_msg" name="text"></textarea></div>
            <span class="button2"><span class="l">&nbsp;</span><span class="c">
            <input type="submit"  onclick="comment_post('<?php echo $this->_tpl_vars['owner']->user_info['user_username']; ?>
', <?php echo $this->_tpl_vars['entries'][0]['blogentry_id']; ?>
, <?php echo $this->_tpl_vars['user']->user_info['user_id']; ?>
,'blog','blogentry_id', 'blogentries', 'blogentry'); return false;" value="Отправить" name="creat" />
            </span><span class="r">&nbsp;</span></span>
        </div>

      
            <?php if (! empty ( $this->_tpl_vars['trackback_list'] )): ?>
      <h2><?php echo SELanguage::_get(1500025); ?></h2>
      <ul class="seBlogTrackbackList">
      <?php unset($this->_sections['trackback_loop']);
$this->_sections['trackback_loop']['name'] = 'trackback_loop';
$this->_sections['trackback_loop']['loop'] = is_array($_loop=$this->_tpl_vars['trackback_list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['trackback_loop']['show'] = true;
$this->_sections['trackback_loop']['max'] = $this->_sections['trackback_loop']['loop'];
$this->_sections['trackback_loop']['step'] = 1;
$this->_sections['trackback_loop']['start'] = $this->_sections['trackback_loop']['step'] > 0 ? 0 : $this->_sections['trackback_loop']['loop']-1;
if ($this->_sections['trackback_loop']['show']) {
    $this->_sections['trackback_loop']['total'] = $this->_sections['trackback_loop']['loop'];
    if ($this->_sections['trackback_loop']['total'] == 0)
        $this->_sections['trackback_loop']['show'] = false;
} else
    $this->_sections['trackback_loop']['total'] = 0;
if ($this->_sections['trackback_loop']['show']):

            for ($this->_sections['trackback_loop']['index'] = $this->_sections['trackback_loop']['start'], $this->_sections['trackback_loop']['iteration'] = 1;
                 $this->_sections['trackback_loop']['iteration'] <= $this->_sections['trackback_loop']['total'];
                 $this->_sections['trackback_loop']['index'] += $this->_sections['trackback_loop']['step'], $this->_sections['trackback_loop']['iteration']++):
$this->_sections['trackback_loop']['rownum'] = $this->_sections['trackback_loop']['iteration'];
$this->_sections['trackback_loop']['index_prev'] = $this->_sections['trackback_loop']['index'] - $this->_sections['trackback_loop']['step'];
$this->_sections['trackback_loop']['index_next'] = $this->_sections['trackback_loop']['index'] + $this->_sections['trackback_loop']['step'];
$this->_sections['trackback_loop']['first']      = ($this->_sections['trackback_loop']['iteration'] == 1);
$this->_sections['trackback_loop']['last']       = ($this->_sections['trackback_loop']['iteration'] == $this->_sections['trackback_loop']['total']);
?>
        <li style="margin-top: 10px; margin-bottom: 20px;">
          <div style="overflow: hidden;">
            <div class="profile_comment_author">
              <a href="<?php echo $this->_tpl_vars['trackback_list'][$this->_sections['trackback_loop']['index']]['blogtrackback_url']; ?>
">
                <b><?php echo $this->_tpl_vars['trackback_list'][$this->_sections['trackback_loop']['index']]['blogtrackback_name']; ?>
</b>
              </a>
              <a href="<?php echo $this->_tpl_vars['trackback_list'][$this->_sections['trackback_loop']['index']]['blogtrackback_url']; ?>
">
                <?php echo $this->_tpl_vars['trackback_list'][$this->_sections['trackback_loop']['index']]['blogtrackback_title']; ?>

              </a>
            </div>
            <div class="profile_comment_date">
              <?php echo $this->_tpl_vars['datetime']->cdate(($this->_tpl_vars['setting']['setting_dateformat']),$this->_tpl_vars['datetime']->timezone(($this->_tpl_vars['trackback_list'][$this->_sections['trackback_loop']['index']]['blogtrackback_date']),$this->_tpl_vars['global_timezone'])); ?>

            </div>
            <div class="profile_comment_body" id="profile_comment_body_<?php echo $this->_tpl_vars['trackback_list'][$this->_sections['trackback_loop']['index']]['blogtrackback_id']; ?>
">
              <?php echo $this->_tpl_vars['trackback_list'][$this->_sections['trackback_loop']['index']]['blogtrackback_excerpt']; ?>

            </div>
            <div class="profile_comment_links">
              <a class="commentDeleteLink" href="javascript:void(0);">
                <?php echo SELanguage::_get(155); ?>
              </a>
              &nbsp;|&nbsp;
              <a class="commentReportLink" href="javascript:void(0);" onclick="javascript:TB_show(SocialEngine.Language.Translate(861), 'user_report.php?return_url=<?php echo $this->_tpl_vars['url']->url_current(); ?>
&TB_iframe=true&height=300&width=450', '', './images/trans.gif');">
                <?php echo SELanguage::_get(1500026); ?>
              </a>
            </div>
          </div>
        </li>
        
      <?php endfor; endif; ?>
      </ul>
      <?php endif; ?>
    </div>
  <?php endif; 
 if ($this->_tpl_vars['maxpage'] > 1): ?>
   <div class='center'>
    <?php if ($this->_tpl_vars['p'] != 1): ?>
      <a href='<?php echo $this->_tpl_vars['url']->url_create('blog',$this->_tpl_vars['owner']->user_info['user_username']); ?>
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
      <a href='<?php echo $this->_tpl_vars['url']->url_create('blog',$this->_tpl_vars['owner']->user_info['user_username']); ?>
&p=<?php echo smarty_function_math(array('equation' => "p+1",'p' => $this->_tpl_vars['p']), $this);?>
'><?php echo SELanguage::_get(183); ?> &#187;</a>
    <?php else: ?>
      <font class='disabled'><?php echo SELanguage::_get(183); ?> &#187;</font>
    <?php endif; ?>
  </div>
<?php endif; 
 $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>