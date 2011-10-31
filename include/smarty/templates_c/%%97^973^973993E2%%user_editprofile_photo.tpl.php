<?php /* Smarty version 2.6.14, created on 2011-10-04 17:00:36
         compiled from user_editprofile_photo.tpl */
?><?php
SELanguage::_preload_multi(762,763,769,713,770,771,772,714,715);
SELanguage::load();
?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<table class='tabs' cellpadding='0' cellspacing='0'>
<tr>
<td class='tab0'>&nbsp;</td>
<?php unset($this->_sections['cat_loop']);
$this->_sections['cat_loop']['name'] = 'cat_loop';
$this->_sections['cat_loop']['loop'] = is_array($_loop=$this->_tpl_vars['cats']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['cat_loop']['show'] = true;
$this->_sections['cat_loop']['max'] = $this->_sections['cat_loop']['loop'];
$this->_sections['cat_loop']['step'] = 1;
$this->_sections['cat_loop']['start'] = $this->_sections['cat_loop']['step'] > 0 ? 0 : $this->_sections['cat_loop']['loop']-1;
if ($this->_sections['cat_loop']['show']) {
    $this->_sections['cat_loop']['total'] = $this->_sections['cat_loop']['loop'];
    if ($this->_sections['cat_loop']['total'] == 0)
        $this->_sections['cat_loop']['show'] = false;
} else
    $this->_sections['cat_loop']['total'] = 0;
if ($this->_sections['cat_loop']['show']):

            for ($this->_sections['cat_loop']['index'] = $this->_sections['cat_loop']['start'], $this->_sections['cat_loop']['iteration'] = 1;
                 $this->_sections['cat_loop']['iteration'] <= $this->_sections['cat_loop']['total'];
                 $this->_sections['cat_loop']['index'] += $this->_sections['cat_loop']['step'], $this->_sections['cat_loop']['iteration']++):
$this->_sections['cat_loop']['rownum'] = $this->_sections['cat_loop']['iteration'];
$this->_sections['cat_loop']['index_prev'] = $this->_sections['cat_loop']['index'] - $this->_sections['cat_loop']['step'];
$this->_sections['cat_loop']['index_next'] = $this->_sections['cat_loop']['index'] + $this->_sections['cat_loop']['step'];
$this->_sections['cat_loop']['first']      = ($this->_sections['cat_loop']['iteration'] == 1);
$this->_sections['cat_loop']['last']       = ($this->_sections['cat_loop']['iteration'] == $this->_sections['cat_loop']['total']);
?>
  <td class='tab2' NOWRAP><a href='user_editprofile.php?cat_id=<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcat_id']; ?>
'><?php echo SELanguage::_get($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcat_title']); ?></a></td><td class='tab'>&nbsp;</td>
<?php endfor; endif; 
 if ($this->_tpl_vars['user']->level_info['level_photo_allow'] != 0): ?><td class='tab1' NOWRAP><a href='user_editprofile_photo.php'><?php echo SELanguage::_get(762); ?></a></td><td class='tab'>&nbsp;</td><?php endif; 
 if ($this->_tpl_vars['user']->level_info['level_profile_style'] != 0 || $this->_tpl_vars['user']->level_info['level_profile_style_sample'] != 0): ?><td class='tab2' NOWRAP><a href='user_editprofile_style.php'><?php echo SELanguage::_get(763); ?></a></td><?php endif; ?>
<td class='tab3'>&nbsp;</td>
</tr>
</table>

<img src='./images/icons/editprofile48.gif' border='0' class='icon_big' />
<div class='page_header'><?php echo SELanguage::_get(769); ?></div>
<div><?php echo SELanguage::_get(713); ?></div>
<br />
<br />


<?php if ($this->_tpl_vars['is_error'] != 0): ?>
  <div class='center'>
    <table cellpadding='0' cellspacing='0'>
      <tr>
        <td class='result'>
          <div class='error'>
            <img src='./images/error.gif' class='icon' border='0' />
            <?php echo SELanguage::_get($this->_tpl_vars['is_error']); ?>
          </div>
        </td>
      </tr>
    </table>
  </div>
  <br />
<?php endif; ?>


<table cellpadding='0' cellspacing='0'>
  <tr>
    <td class='editprofile_photoleft'>
      <?php echo SELanguage::_get(770); ?><br />
      <table cellpadding='0' cellspacing='0' width='202'>
        <tr>
          <td class='editprofile_photo'><img id="userEditPhotoImg" src='<?php echo $this->_tpl_vars['user']->user_photo("./images/nophoto.gif"); ?>
' border='0' />
        </td>
      </tr>
      </table>
            <?php if ($this->_tpl_vars['user']->user_photo() != ""): ?>
      <div id="userEditRemovePhotoLink">[ <a href='javascript:void(0);' onclick='SocialEngine.Viewer.userPhotoRemove(); return false;'><?php echo SELanguage::_get(771); ?></a> ]</div>
      <?php endif; ?>
    </td>
    <td class='editprofile_photoright'>
      <form action='user_editprofile_photo.php' method='post' enctype='multipart/form-data'>
      <?php echo SELanguage::_get(772); ?><br />
      <input type='file' class='text' name='photo' size='30' />
      <input type='submit' class='button' value='<?php echo SELanguage::_get(714); ?>' />
      <input type='hidden' name='task' value='upload' />
      <input type='hidden' name='MAX_FILE_SIZE' value='5000000' />
      </form>
      <div><?php echo SELanguage::_get(715); ?> <?php echo $this->_tpl_vars['user']->level_info['level_photo_exts']; ?>
</div>
    </td>
  </tr>
</table>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>