<?php /* Smarty version 2.6.14, created on 2011-12-05 11:48:35
         compiled from blog.tpl */
?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'blog.tpl', 25, false),array('function', 'math', 'blog.tpl', 287, false),array('modifier', 'truncate', 'blog.tpl', 60, false),array('modifier', 'choptext', 'blog.tpl', 65, false),array('modifier', 'escape', 'blog.tpl', 100, false),array('modifier', 'default', 'blog.tpl', 136, false),)), $this);
?><?php
SELanguage::_preload_multi(861,1500015,1500016,1500019,1500021,1500020,1500022,1500023,1500024,39,155,175,182,183,184,185,187,784,787,829,830,831,832,833,834,835,854,856,891,1025,1026,1032,1034,1071,1500025,1500026,1500121,1500027,1500028,1500055,1500170,1500029,1500030);
SELanguage::load();
?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 
 
$javascript_lang_import_list = SELanguage::_javascript_redundancy_filter(array(861));
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




<table cellpadding='0' cellspacing='0' class="seBlogTable">
<tr>
<td class="seBlogColumnLeft" valign="top">


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
    <div class="seBlogEntry seBlogEntry<?php echo smarty_function_cycle(array('values' => '1,2'), $this);?>
">
    
            <?php if ($this->_tpl_vars['entries'][$this->_sections['entries_loop']['index']]['blogentry_title'] != ""): ?>
        <?php $this->assign('blogentry_title', $this->_tpl_vars['entries'][$this->_sections['entries_loop']['index']]['blogentry_title']); ?>
      <?php else: ?>
        <?php $this->assign('blogentry_title', SE_Language::_get(1500015));


  
 

  ?>
      <?php endif; ?>
      
      <table cellpadding='0' cellspacing='0' class="seBlogEntryTable">
        <tr>
          <td valign='top'>
            <div class='seBlogEntryTitle'>
              <a href='<?php echo $this->_tpl_vars['url']->url_create('blog_entry',$this->_tpl_vars['owner']->user_info['user_username'],$this->_tpl_vars['entries'][$this->_sections['entries_loop']['index']]['blogentry_id']); ?>
'><?php echo $this->_tpl_vars['blogentry_title']; ?>
</a>
            </div>
            <div class='seBlogEntryDate'>
              <?php echo SELanguage::_get(1500016); ?>
              <?php echo $this->_tpl_vars['datetime']->cdate(($this->_tpl_vars['setting']['setting_dateformat']),$this->_tpl_vars['datetime']->timezone(($this->_tpl_vars['entries'][$this->_sections['entries_loop']['index']]['blogentry_date']),$this->_tpl_vars['global_timezone'])); ?>

              -
              <a href='<?php echo $this->_tpl_vars['url']->url_create('blog_entry',$this->_tpl_vars['owner']->user_info['user_username'],$this->_tpl_vars['entries'][$this->_sections['entries_loop']['index']]['blogentry_id']); ?>
'><?php echo sprintf(SELanguage::_get(1500019), $this->_tpl_vars['entries'][$this->_sections['entries_loop']['index']]['blogentry_totalcomments']); ?></a>
              [ <a href='<?php echo $this->_tpl_vars['url']->url_create('blog_entry',$this->_tpl_vars['owner']->user_info['user_username'],$this->_tpl_vars['entries'][$this->_sections['entries_loop']['index']]['blogentry_id']); ?>
'><?php echo SELanguage::_get(1500021); ?></a> ]
              -
              <a href='<?php echo $this->_tpl_vars['url']->url_create('blog_entry',$this->_tpl_vars['owner']->user_info['user_username'],$this->_tpl_vars['entries'][$this->_sections['entries_loop']['index']]['blogentry_id']); ?>
'><?php echo sprintf(SELanguage::_get(1500020), $this->_tpl_vars['entries'][$this->_sections['entries_loop']['index']]['blogentry_totaltrackbacks']); ?></a>
              [ <a href='<?php echo $this->_tpl_vars['url']->url_create('blog_trackback',$this->_tpl_vars['owner']->user_info['user_username'],$this->_tpl_vars['entries'][$this->_sections['entries_loop']['index']]['blogentry_id']); ?>
'><?php echo SELanguage::_get(1500022); ?></a> ]
            </div>
                        <?php if (! empty ( $this->_tpl_vars['entries'][$this->_sections['entries_loop']['index']]['blogentry_blogentrycat_id'] )): ?>
              <div class='seBlogEntryCategory'>
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
            <div class='seBlogEntryBody' style="overflow: auto;">
              <?php echo ((is_array($_tmp=$this->_tpl_vars['entries'][$this->_sections['entries_loop']['index']]['blogentry_body'])) ? $this->_run_mod_handler('choptext', true, $_tmp, 75, "<br>") : smarty_modifier_choptext($_tmp, 75, "<br>")); ?>

            </div>
          </td>
        </tr>
      </table>
      
    </div>
    
  <?php endfor; else: ?>
  
    <table cellpadding='0' cellspacing='0' style="width:100%;">
      <tr>
        <td class='result' style="text-align:left;">
          <img src='./images/icons/bulb22.gif' border='0' class='icon' />
          <?php echo sprintf(SELanguage::_get(1500023), $this->_tpl_vars['owner']->user_displayname, $this->_tpl_vars['url']->url_create('profile',$this->_tpl_vars['owner']->user_info['user_username'])); ?>
        </td>
      </tr>
    </table>
    
  <?php endif; ?>
  
  
    <?php if ($this->_tpl_vars['blogentry_id'] && $this->_tpl_vars['total_blogentries'] == 1): ?>
    
    <div class='seBlogComments'>
      
            <table cellpadding='0' cellspacing='0' border="0" width="100%"><tr><td valign="top">
        
        <div style='margin-bottom: 20px;'>
          <div class='button' style='float: left;'>
            <a href='<?php echo $this->_tpl_vars['url']->url_create('blog',$this->_tpl_vars['owner']->user_info['user_username']); ?>
'><img src='./images/icons/back16.gif' border='0' class='button'><?php echo sprintf(SELanguage::_get(1500024), $this->_tpl_vars['owner']->user_displayname); ?></a>
          </div>
          <div class='button' style='float: left; padding-left: 20px;'>
            <a href="javascript:TB_show(SocialEngine.Language.Translate(861), 'user_report.php?return_url=<?php echo ((is_array($_tmp=$this->_tpl_vars['url']->url_current())) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
&TB_iframe=true&height=300&width=450', '', './images/trans.gif');"><img src='./images/icons/report16.gif' border='0' class='button'><?php echo SELanguage::_get(861); ?></a>
          </div>
          <div style='clear: both; height: 0px;'></div>
        </div>
        
      </td><td align="right" valign="top">
        
        <div>
          <a rel="nofollow" target="_blank" href="http://delicious.com/save?v=5&noui&jump=close&url=<?php echo ((is_array($_tmp=$this->_tpl_vars['url']->url_create('blog_entry',$this->_tpl_vars['owner']->user_info['user_username'],$this->_tpl_vars['blogentry_info']['blogentry_id']))) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
&title=<?php echo ((is_array($_tmp=$this->_tpl_vars['blogentry_info']['blogentry_title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
"><img src="./images/icons/socialbookmarking_delicious16.gif" border="0" alt="Delicious" /></a>
          <a rel="nofollow" target="_blank" href="http://digg.com/submit?phase=2&media=news&url=<?php echo ((is_array($_tmp=$this->_tpl_vars['url']->url_create('blog_entry',$this->_tpl_vars['owner']->user_info['user_username'],$this->_tpl_vars['blogentry_info']['blogentry_id']))) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
&title=<?php echo ((is_array($_tmp=$this->_tpl_vars['blogentry_info']['blogentry_title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
"><img src="./images/icons/socialbookmarking_digg16.gif" border="0" alt="Digg" /></a>
          <a rel="nofollow" target="_blank" href="http://www.facebook.com/share.php?u=<?php echo ((is_array($_tmp=$this->_tpl_vars['url']->url_create('blog_entry',$this->_tpl_vars['owner']->user_info['user_username'],$this->_tpl_vars['blogentry_info']['blogentry_id']))) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
&t=<?php echo ((is_array($_tmp=$this->_tpl_vars['blogentry_info']['blogentry_title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
"><img src="./images/icons/socialbookmarking_facebook16.gif" border="0" alt="Facebook" /></a>
          <a rel="nofollow" target="_blank" href="http://cgi.fark.com/cgi/fark/farkit.pl?u=<?php echo ((is_array($_tmp=$this->_tpl_vars['url']->url_create('blog_entry',$this->_tpl_vars['owner']->user_info['user_username'],$this->_tpl_vars['blogentry_info']['blogentry_id']))) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
&h=<?php echo ((is_array($_tmp=$this->_tpl_vars['blogentry_info']['blogentry_title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
"><img src="./images/icons/socialbookmarking_fark16.gif" border="0" alt="Fark" /></a>
          <a rel="nofollow" target="_blank" href="http://www.myspace.com/Modules/PostTo/Pages/?u=<?php echo ((is_array($_tmp=$this->_tpl_vars['url']->url_create('blog_entry',$this->_tpl_vars['owner']->user_info['user_username'],$this->_tpl_vars['blogentry_info']['blogentry_id']))) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
&t=<?php echo ((is_array($_tmp=$this->_tpl_vars['blogentry_info']['blogentry_title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url')); ?>
"><img src="./images/icons/socialbookmarking_myspace16.gif" border="0" alt="MySpace" /></a>
        </div>
        
      </td></tr></table>
      
            <div id="blog_<?php echo $this->_tpl_vars['blogentry_id']; ?>
_postcomment"></div>
      <div id="blog_<?php echo $this->_tpl_vars['blogentry_id']; ?>
_comments" style='margin-left: auto; margin-right: auto;'></div>
      
      <?php 
$javascript_lang_import_list = SELanguage::_javascript_redundancy_filter(array(39,155,175,182,183,184,185,187,784,787,829,830,831,832,833,834,835,854,856,891,1025,1026,1032,1034,1071));
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
      
      <script type="text/javascript">
        
        SocialEngine.BlogComments = new SocialEngineAPI.Comments({
          'canComment' : <?php if ($this->_tpl_vars['allowed_to_comment']): ?>true<?php else: ?>false<?php endif; ?>,
          'commentHTML' : '<?php echo $this->_tpl_vars['setting']['setting_comment_html']; ?>
',
          'commentCode' : <?php if ($this->_tpl_vars['setting']['setting_comment_code']): ?>true<?php else: ?>false<?php endif; ?>,
          
          'type' : 'blog',
          'typeIdentifier' : 'blogentry_id',
          'typeID' : <?php echo $this->_tpl_vars['blogentry_id']; ?>
,
          'typeTab' : 'blogentries',
          'typeCol' : 'blogentry',
          
          'initialTotal' : <?php echo ((is_array($_tmp=@$this->_tpl_vars['blogentry_info']['blogentry_totalcomments'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
,
          'paginate' : false,
          'cpp' : 5
        });
        
        SocialEngine.RegisterModule(SocialEngine.BlogComments);
        
        // Backwards
        function addComment(is_error, comment_body, comment_date)
        {
          SocialEngine.BlogComments.addComment(is_error, comment_body, comment_date);
        }
        
        function getComments(direction)
        {
          SocialEngine.BlogComments.getComments(direction);
        }
        
      </script>
      
      
      
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
    
  <?php endif; ?>


</td>
<td class="seBlogColumnRight" valign="top">

  <div class="seBlogColumnRightPadding">

    <div>
            <div style="display:block;width:100%;text-align:center;">
        <a href="<?php echo $this->_tpl_vars['url']->url_create('profile',$this->_tpl_vars['owner']->user_info['user_username']); ?>
"><img class='photo' src='<?php echo $this->_tpl_vars['owner']->user_photo("./images/nophoto.gif"); ?>
' border='0' width="<?php echo $this->_tpl_vars['misc']->photo_size($this->_tpl_vars['owner']->user_photo('./images/nophoto.gif'),'240','240','w'); ?>
" /></a>
      </div>
      <div style="display:block;text-align:center;width:100%;font-weight: bold;margin-top:3px;">
        <a href="<?php echo $this->_tpl_vars['url']->url_create('profile',$this->_tpl_vars['owner']->user_info['user_username']); ?>
"><?php echo $this->_tpl_vars['owner']->user_displayname; ?>
</a>
      </div>
    
            <div style='margin: 10px 0px 10px 0px;'>
        <div><a href="<?php echo $this->_tpl_vars['url']->url_create('blog',$this->_tpl_vars['owner']->user_info['user_username']); ?>
"><?php echo SELanguage::_get(1500121); ?></a></div>
        <?php if ($this->_tpl_vars['user']->user_exists && $this->_tpl_vars['user']->user_info['user_id'] != $this->_tpl_vars['owner']->user_info['user_id']): ?>
          <div class="seBlogSubscribe" <?php if ($this->_tpl_vars['is_subscribed']): ?> style="display:none;"<?php endif; ?>><a href="javascript:void(0);" onclick="SocialEngine.Blog.subscribeBlog(SocialEngine.Owner.user_info.user_id);"><?php echo SELanguage::_get(1500027); ?></a></div>
          <div class="seBlogUnsubscribe"<?php if (! $this->_tpl_vars['is_subscribed']): ?> style="display:none;"<?php endif; ?>><a href="javascript:void(0);" onclick="SocialEngine.Blog.unsubscribeBlog(SocialEngine.Owner.user_info.user_id);"><?php echo SELanguage::_get(1500028); ?></a></div>
        <?php endif; ?>
        <?php if ($this->_tpl_vars['user']->user_info['user_id'] == $this->_tpl_vars['owner']->user_info['user_id']): ?>
          <div><a href="user_blog.php"><?php echo SELanguage::_get(1500055); ?></a></div>
          <?php if ($this->_tpl_vars['blogentry_id'] && $this->_tpl_vars['total_blogentries'] == 1): ?>
            <div><a href="user_blog_entry.php?blogentry_id=<?php echo $this->_tpl_vars['blogentry_id']; ?>
"><?php echo SELanguage::_get(1500170); ?></a></div>
          <?php endif; ?>
        <?php endif; ?>
      </div>
    
            <div style='margin-bottom: 10px;'>
        <form method="post" action="<?php echo $this->_tpl_vars['url']->url_create('blog',$this->_tpl_vars['owner']->user_info['user_username']); ?>
">
        <table cellpadding='0' cellspacing='0'><tr><td>
          <input type="text" name="blog_search" value="<?php echo $this->_tpl_vars['blog_search']; ?>
" />
        </td><td>
          <input class="button" type="submit" value="Search" />
        </td></tr></table>
        </form>
      </div>
    
            <?php if (! empty ( $this->_tpl_vars['archive_list'] )): ?>
      <div class='blog_archive'><?php echo SELanguage::_get(1500029); ?></div>
      <ul class="seBlogArchiveList">
        <?php $_from = $this->_tpl_vars['archive_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['archive']):
?>
          <li>
            <a href="<?php echo $this->_tpl_vars['url']->url_create('blog',$this->_tpl_vars['owner']->user_info['user_username']); ?>
&date_start=<?php echo $this->_tpl_vars['archive']['date_start']; ?>
&date_end=<?php echo $this->_tpl_vars['archive']['date_end']; ?>
">
              <?php echo $this->_tpl_vars['archive']['label']; ?>

            </a>
            (<?php echo $this->_tpl_vars['archive']['count']; ?>
)
          </li>
        <?php endforeach; endif; unset($_from); ?>
      </ul>
      <?php endif; ?>
      
            <?php if (! empty ( $this->_tpl_vars['category_list'] )): ?>
      <div class='blog_archive'><?php echo SELanguage::_get(1500030); ?></div>
      <ul class="seBlogCategoryList">
        <?php $_from = $this->_tpl_vars['category_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['category']):
?>
          <li>
            <a href="<?php echo $this->_tpl_vars['url']->url_create('blog',$this->_tpl_vars['owner']->user_info['user_username']); ?>
&category_id=<?php echo $this->_tpl_vars['category']['blogentrycat_id']; ?>
">
              <?php if (! empty ( $this->_tpl_vars['category']['blogentrycat_languagevar_id'] )): 
 ob_start(); 
 echo SELanguage::_get($this->_tpl_vars['category']['blogentrycat_languagevar_id']); 
 $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('blogentrycat_title', ob_get_contents());ob_end_clean(); 
 else: 
 $this->assign('blogentrycat_title', $this->_tpl_vars['category']['blogentrycat_title']); 
 endif; ?>
              <?php echo ((is_array($_tmp=$this->_tpl_vars['blogentrycat_title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 25) : smarty_modifier_truncate($_tmp, 25)); ?>

            </a>
            (<?php echo $this->_tpl_vars['category']['blogentry_count']; ?>
)
          </li>
        <?php endforeach; endif; unset($_from); ?>
      </ul>
      <?php endif; ?>
    </div>

  </div>

</td>
</tr>
</table>

<br />

<?php if ($this->_tpl_vars['maxpage'] > 1): ?>
  
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