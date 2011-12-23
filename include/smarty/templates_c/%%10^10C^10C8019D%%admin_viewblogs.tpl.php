<?php /* Smarty version 2.6.14, created on 2011-12-23 13:35:53
         compiled from admin_viewblogs.tpl */
?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'admin_viewblogs.tpl', 112, false),)), $this);
?><?php
SELanguage::_preload_multi(1500002,1500131,1500111,1500080,1002,1500112,1500113,1005,87,396,88,153,1500115,1500114,155,788);
SELanguage::load();
?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin_header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<h2><?php echo SELanguage::_get(1500002); ?></h2>
<?php echo SELanguage::_get(1500131); ?>
<br />
<br />


<form action='admin_viewblogs.php' method='post'>
<table cellpadding='0' cellspacing='0' width='400' align='center'>
  <tr>
    <td align='center'>
      <div class='box'>
        <table cellpadding='0' cellspacing='0' align='center'>
          <tr>
            <td>
              <?php echo SELanguage::_get(1500111); ?><br />
              <input type='text' class='text' name='f_title' value='<?php echo $this->_tpl_vars['f_title']; ?>
' size='15' maxlength='100' />
            </td>
            <td style="padding-left: 3px;">
              <?php echo SELanguage::_get(1500080); ?><br />
              <input type='text' class='text' name='f_owner' value='<?php echo $this->_tpl_vars['f_owner']; ?>
' size='15' maxlength='50' />
            </td>
            <td style="padding-left: 3px;">
              <?php $this->assign('langBlockTemp', SE_Language::_get(1002));


  ?><input type='submit' class='button' value='<?php echo $this->_tpl_vars['langBlockTemp']; ?>
' /><?php 

  ?>
            </td>
          </tr>
        </table>
      </div>
    </td>
  </tr>
</table>
<input type='hidden' name='s' value='<?php echo $this->_tpl_vars['s']; ?>
' />
</form>
<br />


<?php if ($this->_tpl_vars['total_blogentries'] == 0): ?>

  <table cellpadding='0' cellspacing='0' width='400' align='center'>
    <tr>
      <td align='center'>
        <div class='box' style='width: 300px;'><b><?php echo SELanguage::_get(1500112); ?></b></div>
      </td>
    </tr>
  </table>
  <br>


<?php else: ?>

    <?php echo '
  <script language=\'JavaScript\'> 
  <!---
  var checkboxcount = 1;
  function doCheckAll() {
    if(checkboxcount == 0) {
      with (document.items) {
      for (var i=0; i < elements.length; i++) {
      if (elements[i].type == \'checkbox\') {
      elements[i].checked = false;
      }}
      checkboxcount = checkboxcount + 1;
      }
    } else
      with (document.items) {
      for (var i=0; i < elements.length; i++) {
      if (elements[i].type == \'checkbox\') {
      elements[i].checked = true;
      }}
      checkboxcount = checkboxcount - 1;
      }
  }
  // -->
  </script>
  '; ?>


  <div class='pages'>
    <?php echo sprintf(SELanguage::_get(1500113), $this->_tpl_vars['total_blogentries']); ?>
    &nbsp;|&nbsp;
    <?php echo SELanguage::_get(1005); ?>
    <?php unset($this->_sections['page_loop']);
$this->_sections['page_loop']['name'] = 'page_loop';
$this->_sections['page_loop']['loop'] = is_array($_loop=$this->_tpl_vars['pages']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['page_loop']['show'] = true;
$this->_sections['page_loop']['max'] = $this->_sections['page_loop']['loop'];
$this->_sections['page_loop']['step'] = 1;
$this->_sections['page_loop']['start'] = $this->_sections['page_loop']['step'] > 0 ? 0 : $this->_sections['page_loop']['loop']-1;
if ($this->_sections['page_loop']['show']) {
    $this->_sections['page_loop']['total'] = $this->_sections['page_loop']['loop'];
    if ($this->_sections['page_loop']['total'] == 0)
        $this->_sections['page_loop']['show'] = false;
} else
    $this->_sections['page_loop']['total'] = 0;
if ($this->_sections['page_loop']['show']):

            for ($this->_sections['page_loop']['index'] = $this->_sections['page_loop']['start'], $this->_sections['page_loop']['iteration'] = 1;
                 $this->_sections['page_loop']['iteration'] <= $this->_sections['page_loop']['total'];
                 $this->_sections['page_loop']['index'] += $this->_sections['page_loop']['step'], $this->_sections['page_loop']['iteration']++):
$this->_sections['page_loop']['rownum'] = $this->_sections['page_loop']['iteration'];
$this->_sections['page_loop']['index_prev'] = $this->_sections['page_loop']['index'] - $this->_sections['page_loop']['step'];
$this->_sections['page_loop']['index_next'] = $this->_sections['page_loop']['index'] + $this->_sections['page_loop']['step'];
$this->_sections['page_loop']['first']      = ($this->_sections['page_loop']['iteration'] == 1);
$this->_sections['page_loop']['last']       = ($this->_sections['page_loop']['iteration'] == $this->_sections['page_loop']['total']);
?>
      <?php if ($this->_tpl_vars['pages'][$this->_sections['page_loop']['index']]['link']): ?>
        <?php echo $this->_tpl_vars['pages'][$this->_sections['page_loop']['index']]['page']; ?>

      <?php else: ?>
        <a href='admin_viewblogs.php?s=<?php echo $this->_tpl_vars['s']; ?>
&p=<?php echo $this->_tpl_vars['pages'][$this->_sections['page_loop']['index']]['page']; ?>
&f_title=<?php echo $this->_tpl_vars['f_title']; ?>
&f_owner=<?php echo $this->_tpl_vars['f_owner']; ?>
'><?php echo $this->_tpl_vars['pages'][$this->_sections['page_loop']['index']]['page']; ?>
</a>
      <?php endif; ?>
    <?php endfor; endif; ?>
  </div>
  
  <form action='admin_viewblogs.php' method='post' name='items'>
  <table cellpadding='0' cellspacing='0' class='list'>
    <tr>
      <td class='header' width='10'><input type='checkbox' name='select_all' onClick='javascript:doCheckAll()'></td>
      <td class='header' width='10' style='padding-left: 0px;'><a class='header' href='admin_viewblogs.php?s=<?php echo $this->_tpl_vars['i']; ?>
&p=<?php echo $this->_tpl_vars['p']; ?>
&f_title=<?php echo $this->_tpl_vars['f_title']; ?>
&f_owner=<?php echo $this->_tpl_vars['f_owner']; ?>
'><?php echo SELanguage::_get(87); ?></a></td>
      <td class='header'><a class='header' href='admin_viewblogs.php?s=<?php echo $this->_tpl_vars['t']; ?>
&p=<?php echo $this->_tpl_vars['p']; ?>
&f_title=<?php echo $this->_tpl_vars['f_title']; ?>
&f_owner=<?php echo $this->_tpl_vars['f_owner']; ?>
'><?php echo SELanguage::_get(1500111); ?></a></td>
      <td class='header'><a class='header' href='admin_viewblogs.php?s=<?php echo $this->_tpl_vars['o']; ?>
&p=<?php echo $this->_tpl_vars['p']; ?>
&f_title=<?php echo $this->_tpl_vars['f_title']; ?>
&f_owner=<?php echo $this->_tpl_vars['f_owner']; ?>
'><?php echo SELanguage::_get(1500080); ?></a></td>
      <td class='header' align='center'><a class='header' href='admin_viewblogs.php?s=<?php echo $this->_tpl_vars['v']; ?>
&p=<?php echo $this->_tpl_vars['p']; ?>
&f_title=<?php echo $this->_tpl_vars['f_title']; ?>
&f_owner=<?php echo $this->_tpl_vars['f_owner']; ?>
'><?php echo SELanguage::_get(396); ?></a></td>
      <td class='header' width='100'><a class='header' href='admin_viewblogs.php?s=<?php echo $this->_tpl_vars['d']; ?>
&p=<?php echo $this->_tpl_vars['p']; ?>
&f_title=<?php echo $this->_tpl_vars['f_title']; ?>
&f_owner=<?php echo $this->_tpl_vars['f_owner']; ?>
'><?php echo SELanguage::_get(88); ?></a></td>
      <td class='header' width='100'><?php echo SELanguage::_get(153); ?></td>
    </tr>
    
    <?php unset($this->_sections['blog_loop']);
$this->_sections['blog_loop']['name'] = 'blog_loop';
$this->_sections['blog_loop']['loop'] = is_array($_loop=$this->_tpl_vars['entries']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['blog_loop']['show'] = true;
$this->_sections['blog_loop']['max'] = $this->_sections['blog_loop']['loop'];
$this->_sections['blog_loop']['step'] = 1;
$this->_sections['blog_loop']['start'] = $this->_sections['blog_loop']['step'] > 0 ? 0 : $this->_sections['blog_loop']['loop']-1;
if ($this->_sections['blog_loop']['show']) {
    $this->_sections['blog_loop']['total'] = $this->_sections['blog_loop']['loop'];
    if ($this->_sections['blog_loop']['total'] == 0)
        $this->_sections['blog_loop']['show'] = false;
} else
    $this->_sections['blog_loop']['total'] = 0;
if ($this->_sections['blog_loop']['show']):

            for ($this->_sections['blog_loop']['index'] = $this->_sections['blog_loop']['start'], $this->_sections['blog_loop']['iteration'] = 1;
                 $this->_sections['blog_loop']['iteration'] <= $this->_sections['blog_loop']['total'];
                 $this->_sections['blog_loop']['index'] += $this->_sections['blog_loop']['step'], $this->_sections['blog_loop']['iteration']++):
$this->_sections['blog_loop']['rownum'] = $this->_sections['blog_loop']['iteration'];
$this->_sections['blog_loop']['index_prev'] = $this->_sections['blog_loop']['index'] - $this->_sections['blog_loop']['step'];
$this->_sections['blog_loop']['index_next'] = $this->_sections['blog_loop']['index'] + $this->_sections['blog_loop']['step'];
$this->_sections['blog_loop']['first']      = ($this->_sections['blog_loop']['iteration'] == 1);
$this->_sections['blog_loop']['last']       = ($this->_sections['blog_loop']['iteration'] == $this->_sections['blog_loop']['total']);
?>
    <?php $this->assign('blogentry_url', $this->_tpl_vars['url']->url_create('blog_entry',$this->_tpl_vars['entries'][$this->_sections['blog_loop']['index']]['blogentry_author']->user_info['user_username'],$this->_tpl_vars['entries'][$this->_sections['blog_loop']['index']]['blogentry_id'])); ?>
    
        <tr class='<?php echo smarty_function_cycle(array('values' => "background1,background2"), $this);?>
'>
      <td class='item' style='padding-right: 0px;'><input type='checkbox' name='delete_blogentries[]' value='<?php echo $this->_tpl_vars['entries'][$this->_sections['blog_loop']['index']]['blogentry_id']; ?>
' /></td>
      <td class='item' style='padding-left: 0px;'><?php echo $this->_tpl_vars['entries'][$this->_sections['blog_loop']['index']]['blogentry_id']; ?>
</td>
      <td class='item'><?php echo $this->_tpl_vars['entries'][$this->_sections['blog_loop']['index']]['blogentry_title']; ?>
</td>
      <td class='item'><a href='<?php echo $this->_tpl_vars['url']->url_create('profile',$this->_tpl_vars['entries'][$this->_sections['blog_loop']['index']]['blogentry_author']->user_info['user_username']); ?>
' target='_blank'><?php echo $this->_tpl_vars['entries'][$this->_sections['blog_loop']['index']]['blogentry_author']->user_info['user_username']; ?>
</a></td>
      <td class='item' align='center'><?php echo $this->_tpl_vars['entries'][$this->_sections['blog_loop']['index']]['blogentry_views']; ?>
</td>
      <td class='item'><?php echo $this->_tpl_vars['datetime']->cdate($this->_tpl_vars['setting']['setting_dateformat'],$this->_tpl_vars['datetime']->timezone($this->_tpl_vars['entries'][$this->_sections['blog_loop']['index']]['blogentry_date'],$this->_tpl_vars['setting']['setting_timezone'])); ?>
</td>
      <td class='item'>
        [ <a href='admin_loginasuser.php?user_id=<?php echo $this->_tpl_vars['entries'][$this->_sections['blog_loop']['index']]['blogentry_author']->user_info['user_id']; ?>
&return_url=<?php echo $this->_tpl_vars['blogentry_url']; ?>
' target='_blank'><?php echo SELanguage::_get(1500115); ?></a> ]
        [ <a href="javascript:if(confirm('<?php echo SELanguage::_get(1500114); ?>')) <?php echo '{'; ?>
 location.href = 'admin_viewblogs.php?task=deleteentries&delete_blogentries[]=<?php echo $this->_tpl_vars['entries'][$this->_sections['blog_loop']['index']]['blogentry_id']; ?>
&s=<?php echo $this->_tpl_vars['s']; ?>
&p=<?php echo $this->_tpl_vars['p']; ?>
&f_title=<?php echo $this->_tpl_vars['f_title']; ?>
&f_owner=<?php echo $this->_tpl_vars['f_owner']; ?>
'; <?php echo '}'; ?>
"><?php echo SELanguage::_get(155); ?></a> ]
      </td>
    </tr>
    <?php endfor; endif; ?>
  </table>
  <br />
  
  
  <table cellpadding='0' cellspacing='0' width='100%'>
    <tr>
      <td>
        <?php $this->assign('langBlockTemp', SE_Language::_get(788));


  ?><input type='submit' class='button' value='<?php echo $this->_tpl_vars['langBlockTemp']; ?>
' /><?php 

  ?>
        <input type='hidden' name='task' value='deleteentries' />
        <input type='hidden' name='p' value='<?php echo $this->_tpl_vars['p']; ?>
' />
        <input type='hidden' name='s' value='<?php echo $this->_tpl_vars['s']; ?>
' />
        <input type='hidden' name='f_title' value='<?php echo $this->_tpl_vars['f_title']; ?>
' />
        <input type='hidden' name='f_owner' value='<?php echo $this->_tpl_vars['f_owner']; ?>
' />
        </form>
      </td>
      <td align='right' valign='top'>
        <div class='pages2'>
          <?php echo sprintf(SELanguage::_get(1500113), $this->_tpl_vars['total_blogentries']); ?>
          &nbsp;|&nbsp;
          <?php echo SELanguage::_get(1005); ?>
          <?php unset($this->_sections['page_loop']);
$this->_sections['page_loop']['name'] = 'page_loop';
$this->_sections['page_loop']['loop'] = is_array($_loop=$this->_tpl_vars['pages']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['page_loop']['show'] = true;
$this->_sections['page_loop']['max'] = $this->_sections['page_loop']['loop'];
$this->_sections['page_loop']['step'] = 1;
$this->_sections['page_loop']['start'] = $this->_sections['page_loop']['step'] > 0 ? 0 : $this->_sections['page_loop']['loop']-1;
if ($this->_sections['page_loop']['show']) {
    $this->_sections['page_loop']['total'] = $this->_sections['page_loop']['loop'];
    if ($this->_sections['page_loop']['total'] == 0)
        $this->_sections['page_loop']['show'] = false;
} else
    $this->_sections['page_loop']['total'] = 0;
if ($this->_sections['page_loop']['show']):

            for ($this->_sections['page_loop']['index'] = $this->_sections['page_loop']['start'], $this->_sections['page_loop']['iteration'] = 1;
                 $this->_sections['page_loop']['iteration'] <= $this->_sections['page_loop']['total'];
                 $this->_sections['page_loop']['index'] += $this->_sections['page_loop']['step'], $this->_sections['page_loop']['iteration']++):
$this->_sections['page_loop']['rownum'] = $this->_sections['page_loop']['iteration'];
$this->_sections['page_loop']['index_prev'] = $this->_sections['page_loop']['index'] - $this->_sections['page_loop']['step'];
$this->_sections['page_loop']['index_next'] = $this->_sections['page_loop']['index'] + $this->_sections['page_loop']['step'];
$this->_sections['page_loop']['first']      = ($this->_sections['page_loop']['iteration'] == 1);
$this->_sections['page_loop']['last']       = ($this->_sections['page_loop']['iteration'] == $this->_sections['page_loop']['total']);
?>
            <?php if ($this->_tpl_vars['pages'][$this->_sections['page_loop']['index']]['link']): ?>
              <?php echo $this->_tpl_vars['pages'][$this->_sections['page_loop']['index']]['page']; ?>

            <?php else: ?>
              <a href='admin_viewblogs.php?s=<?php echo $this->_tpl_vars['s']; ?>
&p=<?php echo $this->_tpl_vars['pages'][$this->_sections['page_loop']['index']]['page']; ?>
&f_title=<?php echo $this->_tpl_vars['f_title']; ?>
&f_owner=<?php echo $this->_tpl_vars['f_owner']; ?>
'><?php echo $this->_tpl_vars['pages'][$this->_sections['page_loop']['index']]['page']; ?>
</a>
            <?php endif; ?>
          <?php endfor; endif; ?>
        </div>
      </td>
    </tr>
  </table>

<?php endif; 
 $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin_footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>