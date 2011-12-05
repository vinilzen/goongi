<?php /* Smarty version 2.6.14, created on 2011-12-05 11:48:09
         compiled from user_blog_subscriptions.tpl */
?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'math', 'user_blog_subscriptions.tpl', 45, false),)), $this);
?><?php
SELanguage::_preload_multi(1500077,1500078,1500055,182,184,185,183,1500079,1500083,1500129,1500081);
SELanguage::load();
?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>



<script type="text/javascript" src="./include/js/class_blog.js"></script>
<script type="text/javascript">
  
  SocialEngine.Blog = new SocialEngineAPI.Blog();
  SocialEngine.RegisterModule(SocialEngine.Blog);
  
</script>



<table cellpadding='0' cellspacing='0' width='100%'>
  <tr>
    <td valign='top'>
      
      <img src='./images/icons/blog_blog48.gif' border='0' class='icon_big' style="margin-bottom: 15px;">
      <div class='page_header'><?php echo SELanguage::_get(1500077); ?></div>
      <div>
        <?php echo SELanguage::_get(1500078); ?>
      </div>
      <br />
      
    </td>
    <td valign='top' align='right'>
      
      <table cellpadding='0' cellspacing='0' width='130'>
      <tr><td class='button' nowrap='nowrap'><a href='user_blog.php'><img src='./images/icons/back16.gif' border='0' class='button'><?php echo SELanguage::_get(1500055); ?></a></td></tr>
      </table>
      
    </td>
  </tr>
</table>
<br />


<?php if ($this->_tpl_vars['maxpage'] > 1): ?>
  <div class='center'>
    <?php if ($this->_tpl_vars['p'] != 1): ?>
      <a href='user_blog_subscriptions.php?s=<?php echo $this->_tpl_vars['s']; ?>
&p=<?php echo smarty_function_math(array('equation' => "p-1",'p' => $this->_tpl_vars['p']), $this);?>
'>&#171; <?php echo SELanguage::_get(182); ?></a>
    <?php else: ?>
      <font class='disabled'>&#171; <?php echo SELanguage::_get(182); ?></font>
    <?php endif; ?>
    <?php if ($this->_tpl_vars['p_start'] == $this->_tpl_vars['p_end']): ?>
      &nbsp;|&nbsp; <?php echo sprintf(SELanguage::_get(184), $this->_tpl_vars['p_start'], $this->_tpl_vars['blog_subscriptions_total']); ?> &nbsp;|&nbsp; 
    <?php else: ?>
      &nbsp;|&nbsp; <?php echo sprintf(SELanguage::_get(185), $this->_tpl_vars['p_start'], $this->_tpl_vars['p_end'], $this->_tpl_vars['blog_subscriptions_total']); ?> &nbsp;|&nbsp; 
    <?php endif; ?>
    <?php if ($this->_tpl_vars['p'] != $this->_tpl_vars['maxpage']): ?>
      <a href='user_blog_subscriptions.php?s=<?php echo $this->_tpl_vars['s']; ?>
&p=<?php echo smarty_function_math(array('equation' => "p+1",'p' => $this->_tpl_vars['p']), $this);?>
'><?php echo SELanguage::_get(183); ?> &#187;</a>
    <?php else: ?>
      <font class='disabled'><?php echo SELanguage::_get(183); ?> &#187;</font>
    <?php endif; ?>
  </div>
  <br />
<?php endif; 
 if (! $this->_tpl_vars['blog_subscriptions_total']): ?>

  <table cellpadding='0' cellspacing='0' align='center'>
    <tr>
      <td class='result'>
        <img src='./images/icons/bulb16.gif' border='0' class='icon'>
        <?php echo SELanguage::_get(1500079); ?>
      </td>
    </tr>
  </table>


<?php else: ?>

  <?php unset($this->_sections['blog_subscriptions_loop']);
$this->_sections['blog_subscriptions_loop']['name'] = 'blog_subscriptions_loop';
$this->_sections['blog_subscriptions_loop']['loop'] = is_array($_loop=$this->_tpl_vars['blog_subscriptions_list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['blog_subscriptions_loop']['show'] = true;
$this->_sections['blog_subscriptions_loop']['max'] = $this->_sections['blog_subscriptions_loop']['loop'];
$this->_sections['blog_subscriptions_loop']['step'] = 1;
$this->_sections['blog_subscriptions_loop']['start'] = $this->_sections['blog_subscriptions_loop']['step'] > 0 ? 0 : $this->_sections['blog_subscriptions_loop']['loop']-1;
if ($this->_sections['blog_subscriptions_loop']['show']) {
    $this->_sections['blog_subscriptions_loop']['total'] = $this->_sections['blog_subscriptions_loop']['loop'];
    if ($this->_sections['blog_subscriptions_loop']['total'] == 0)
        $this->_sections['blog_subscriptions_loop']['show'] = false;
} else
    $this->_sections['blog_subscriptions_loop']['total'] = 0;
if ($this->_sections['blog_subscriptions_loop']['show']):

            for ($this->_sections['blog_subscriptions_loop']['index'] = $this->_sections['blog_subscriptions_loop']['start'], $this->_sections['blog_subscriptions_loop']['iteration'] = 1;
                 $this->_sections['blog_subscriptions_loop']['iteration'] <= $this->_sections['blog_subscriptions_loop']['total'];
                 $this->_sections['blog_subscriptions_loop']['index'] += $this->_sections['blog_subscriptions_loop']['step'], $this->_sections['blog_subscriptions_loop']['iteration']++):
$this->_sections['blog_subscriptions_loop']['rownum'] = $this->_sections['blog_subscriptions_loop']['iteration'];
$this->_sections['blog_subscriptions_loop']['index_prev'] = $this->_sections['blog_subscriptions_loop']['index'] - $this->_sections['blog_subscriptions_loop']['step'];
$this->_sections['blog_subscriptions_loop']['index_next'] = $this->_sections['blog_subscriptions_loop']['index'] + $this->_sections['blog_subscriptions_loop']['step'];
$this->_sections['blog_subscriptions_loop']['first']      = ($this->_sections['blog_subscriptions_loop']['iteration'] == 1);
$this->_sections['blog_subscriptions_loop']['last']       = ($this->_sections['blog_subscriptions_loop']['iteration'] == $this->_sections['blog_subscriptions_loop']['total']);
?>
    <div style='width: 500px;' id="seBlogSubscriptionRow_<?php echo $this->_tpl_vars['blog_subscriptions_list'][$this->_sections['blog_subscriptions_loop']['index']]['blog_author']->user_info['user_id']; ?>
" class="blog_subscription">
      <table cellpadding='0' cellspacing='0' width='100%'>
      <tr>
      <td style='font-size: 12px; font-weight: bold;'>
        <a href="<?php echo $this->_tpl_vars['url']->url_create('profile',$this->_tpl_vars['blog_subscriptions_list'][$this->_sections['blog_subscriptions_loop']['index']]['blog_author']->user_info['user_username']); ?>
"><?php echo $this->_tpl_vars['blog_subscriptions_list'][$this->_sections['blog_subscriptions_loop']['index']]['blog_author']->user_displayname; ?>
</a>
      </td>
      <td align='right'>
        <a href="<?php echo $this->_tpl_vars['url']->url_create('blog',$this->_tpl_vars['blog_subscriptions_list'][$this->_sections['blog_subscriptions_loop']['index']]['blog_author']->user_info['user_username']); ?>
"><?php echo SELanguage::_get(1500083); ?></a>
        |
        <a href="javascript:void(0);" onclick="SocialEngine.Blog.unsubscribeBlog(<?php echo $this->_tpl_vars['blog_subscriptions_list'][$this->_sections['blog_subscriptions_loop']['index']]['blog_author']->user_info['user_id']; ?>
);"><?php echo SELanguage::_get(1500129); ?></a>
      </td>
      </tr>
      </table>
      <?php if (! empty ( $this->_tpl_vars['blog_subscriptions_list'][$this->_sections['blog_subscriptions_loop']['index']]['blogentry_id'] )): ?>
        <div class='seBlogEntryDate'><?php echo SELanguage::_get(1500081); ?> <?php echo $this->_tpl_vars['datetime']->cdate(($this->_tpl_vars['setting']['setting_dateformat']),$this->_tpl_vars['datetime']->timezone($this->_tpl_vars['blog_subscriptions_list'][$this->_sections['blog_subscriptions_loop']['index']]['blogentry_date'],$this->_tpl_vars['global_timezone'])); ?>
</div>
        <div><a href="<?php echo $this->_tpl_vars['url']->url_create('blog_entry',$this->_tpl_vars['blog_subscriptions_list'][$this->_sections['blog_subscriptions_loop']['index']]['blog_author']->user_info['user_username'],$this->_tpl_vars['blog_subscriptions_list'][$this->_sections['blog_subscriptions_loop']['index']]['blogentry_id']); ?>
"><?php echo $this->_tpl_vars['blog_subscriptions_list'][$this->_sections['blog_subscriptions_loop']['index']]['blogentry_title']; ?>
</a></div>
      <?php endif; ?>
    </div>
  <?php endfor; endif; 
 endif; 
 $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>