<?php /* Smarty version 2.6.14, created on 2011-12-23 14:08:17
         compiled from admin_blog.tpl */
?><?php
SELanguage::_preload_multi(1500003,1500084,191,1500085,1500086,1500087,1500088,1500089,1500090,1500091,173);
SELanguage::load();
?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin_header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<h2><?php echo SELanguage::_get(1500003); ?></h2>
<?php echo SELanguage::_get(1500084); ?>
<br />
<br />

<?php if ($this->_tpl_vars['result']): ?><div class='success'><img src='../images/success.gif' class='icon' border='0'> <?php echo SELanguage::_get(191); ?></div><?php endif; ?>

<form action='admin_blog.php' method='POST' name='info'>

    <?php echo '
  <script type="text/javascript">
  <!--
  
  function createNewCategory()
  {
    // Display
    $(\'newCategoryInput\').value = \'\';
    $(\'newCategoryContainer\').style.display = \'\';
    $(\'newCategoryLink\').style.display = \'none\';
  }
  
  function editNewCategory()
  {
    var newCategoryTitle = $(\'newCategoryInput\').value;
    
    // Display
    $(\'newCategoryInput\').value = \'\';
    $(\'newCategoryContainer\').style.display = \'none\';
    $(\'newCategoryLink\').style.display = \'\';
    
    // Ajax
    var request = new Request.JSON({
      \'method\' : \'post\',
      \'url\' : \'admin_blog.php\',
      \'data\' : {
        \'task\' : \'createblogentrycat\',
        \'blogentrycat_title\' : newCategoryTitle
      },
      \'onComplete\':function(responseObject)
      {
        if( $type(responseObject)!="object" || !responseObject.result || responseObject.result=="failure" )
        {
          alert(\'ERR\');
        }
        
        else
        {
          var blogentrycat_id = responseObject.blogentrycat_id;
          var blogentrycat_languagevar_id = responseObject.blogentrycat_languagevar_id;
          var innerHTML = \'\';
          
          //innerHTML += \'<td>\';
          innerHTML += \'<span class="oldCategoryContainer">\';
          innerHTML += \'<a href="javascript:void(0);" onclick="switchOldCategory(\' + blogentrycat_id + \');">\';
          innerHTML += newCategoryTitle;
          innerHTML += \'</a>\';
          innerHTML += \'</span>\';
          innerHTML += \'<span class="oldCategoryInput" style="display:none;">\';
          innerHTML += "<input type=\'text\' class=\'text\' size=\'30\' maxlength=\'50\' onblur=\'editOldCategory(" + blogentrycat_id + ");\' value=\'" + newCategoryTitle + "\' />";
          innerHTML += \'</span>\';
          innerHTML += \'<span class="oldCategoryLangVar">\';
          innerHTML += \'&nbsp;(Language Variable #<a href="admin_language_edit.php?language_id=1&phrase_id=\' + blogentrycat_languagevar_id + \'">\';
          innerHTML += blogentrycat_languagevar_id;
          innerHTML += \'</a>)\';
          innerHTML += \'</span>\';
          //innerHTML += \'</td>\';
          
          //alert(innerHTML);
          
          var newCategoryRow = new Element(\'tr\', {\'id\' : \'blogEntryCatRow_\' + blogentrycat_id});
          var newCategoryData = new Element(\'td\', {\'html\' : innerHTML});
          
          newCategoryRow.inject($(\'newCategoryRow\'), \'before\');
          newCategoryData.inject(newCategoryRow);
        }
      }
    });
    
    request.send();
  }
  
  function switchOldCategory(blogentrycat_id)
  {
    var categoryRow = $(\'blogEntryCatRow_\' + blogentrycat_id);
    categoryRow.getElement(\'.oldCategoryContainer\').style.display = \'none\';
    categoryRow.getElement(\'.oldCategoryInput\').style.display = \'\';
    categoryRow.getElement(\'input\').focus();
  }
  
  function unswitchOldCategory(blogentrycat_id)
  {
    var categoryRow = $(\'blogEntryCatRow_\' + blogentrycat_id);
    categoryRow.getElement(\'.oldCategoryContainer\').style.display = \'\';
    categoryRow.getElement(\'.oldCategoryInput\').style.display = \'none\';
  }
  
  function editOldCategory(blogentrycat_id)
  {
    var categoryRow = $(\'blogEntryCatRow_\' + blogentrycat_id);
    var newCategoryTitle = categoryRow.getElement(\'input\').value;
    
    // DELETE
    if( newCategoryTitle.trim()==\'\' )
    {
      deleteCategory(blogentrycat_id);
      return;
    }
    
    categoryRow.getElement(\'.oldCategoryContainer\').getElement(\'a\').innerHTML = newCategoryTitle;
    unswitchOldCategory(blogentrycat_id);
    
    // Ajax
    var request = new Request.JSON({
      \'method\' : \'post\',
      \'url\' : \'admin_blog.php\',
      \'data\' : {
        \'task\' : \'editblogentrycat\',
        \'blogentrycat_id\' : blogentrycat_id,
        \'blogentrycat_title\' : newCategoryTitle
      },
      \'onComplete\':function(responseObject)
      {
        if( $type(responseObject)!="object" || !responseObject.result || responseObject.result=="failure" )
        {
          alert(\'ERR\');
        }
      }
    });
    
    request.send();
  }
  
  function deleteCategory(blogentrycat_id)
  {
    var categoryRow = $(\'blogEntryCatRow_\' + blogentrycat_id);
    
    categoryRow.destroy();
    
    // Ajax
    var request = new Request.JSON({
      \'method\' : \'post\',
      \'url\' : \'admin_blog.php\',
      \'data\' : {
        \'task\' : \'deleteblogentrycat\',
        \'blogentrycat_id\' : blogentrycat_id
      },
      \'onComplete\':function(responseObject)
      {
        if( $type(responseObject)!="object" || !responseObject.result || responseObject.result=="failure" )
        {
          alert(\'ERR\');
        }
      }
    });
    
    request.send();
  }
  // -->
  </script>
  '; ?>



<table cellpadding='0' cellspacing='0' width='600'>
  <tr>
    <td class='header'><?php echo SELanguage::_get(1500085); ?></td>
  </tr>
    <td class='setting1'>
      <?php echo SELanguage::_get(1500086); ?>
    </td>
  </tr>
  <tr>
    <td class='setting2'>
      <table cellpadding='2' cellspacing='0'>
        <tr>
          <td><input type='radio' name='setting_permission_blog' id='permission_blog_1' value='1'<?php if ($this->_tpl_vars['setting']['setting_permission_blog']): ?> checked<?php endif; ?>></td>
          <td><label for='permission_blog_1'><?php echo SELanguage::_get(1500087); ?></label></td>
        </tr>
        <tr>
          <td><input type='radio' name='setting_permission_blog' id='permission_blog_0' value='0'<?php if (! $this->_tpl_vars['setting']['setting_permission_blog']): ?> checked<?php endif; ?>></td>
          <td><label for='permission_blog_0'><?php echo SELanguage::_get(1500088); ?></label></td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<br />


<table cellpadding='0' cellspacing='0' width='600'>
  <tr>
    <td class='header'><?php echo SELanguage::_get(1500089); ?></td>
  </tr>
  <tr>
    <td class='setting1'><?php echo SELanguage::_get(1500090); ?></td>
  </tr>
  <tr>
    <td class='setting2'>
      <table cellpadding='2' cellspacing='0'>
        <tbody>
          <tr>
            <td><b><?php echo $this->_tpl_vars['admin_blog15']; ?>
</b></td>
          </tr>
          <?php unset($this->_sections['blogentrycats_loop']);
$this->_sections['blogentrycats_loop']['name'] = 'blogentrycats_loop';
$this->_sections['blogentrycats_loop']['loop'] = is_array($_loop=$this->_tpl_vars['blogentrycats']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['blogentrycats_loop']['show'] = true;
$this->_sections['blogentrycats_loop']['max'] = $this->_sections['blogentrycats_loop']['loop'];
$this->_sections['blogentrycats_loop']['step'] = 1;
$this->_sections['blogentrycats_loop']['start'] = $this->_sections['blogentrycats_loop']['step'] > 0 ? 0 : $this->_sections['blogentrycats_loop']['loop']-1;
if ($this->_sections['blogentrycats_loop']['show']) {
    $this->_sections['blogentrycats_loop']['total'] = $this->_sections['blogentrycats_loop']['loop'];
    if ($this->_sections['blogentrycats_loop']['total'] == 0)
        $this->_sections['blogentrycats_loop']['show'] = false;
} else
    $this->_sections['blogentrycats_loop']['total'] = 0;
if ($this->_sections['blogentrycats_loop']['show']):

            for ($this->_sections['blogentrycats_loop']['index'] = $this->_sections['blogentrycats_loop']['start'], $this->_sections['blogentrycats_loop']['iteration'] = 1;
                 $this->_sections['blogentrycats_loop']['iteration'] <= $this->_sections['blogentrycats_loop']['total'];
                 $this->_sections['blogentrycats_loop']['index'] += $this->_sections['blogentrycats_loop']['step'], $this->_sections['blogentrycats_loop']['iteration']++):
$this->_sections['blogentrycats_loop']['rownum'] = $this->_sections['blogentrycats_loop']['iteration'];
$this->_sections['blogentrycats_loop']['index_prev'] = $this->_sections['blogentrycats_loop']['index'] - $this->_sections['blogentrycats_loop']['step'];
$this->_sections['blogentrycats_loop']['index_next'] = $this->_sections['blogentrycats_loop']['index'] + $this->_sections['blogentrycats_loop']['step'];
$this->_sections['blogentrycats_loop']['first']      = ($this->_sections['blogentrycats_loop']['iteration'] == 1);
$this->_sections['blogentrycats_loop']['last']       = ($this->_sections['blogentrycats_loop']['iteration'] == $this->_sections['blogentrycats_loop']['total']);
?>
          <tr id="blogEntryCatRow_<?php echo $this->_tpl_vars['blogentrycats'][$this->_sections['blogentrycats_loop']['index']]['blogentrycat_id']; ?>
">
            <td>
              <span class="oldCategoryContainer"><a href="javascript:void(0);" onclick="switchOldCategory(<?php echo $this->_tpl_vars['blogentrycats'][$this->_sections['blogentrycats_loop']['index']]['blogentrycat_id']; ?>
);"><?php echo $this->_tpl_vars['blogentrycats'][$this->_sections['blogentrycats_loop']['index']]['blogentrycat_title']; ?>
</a></span>
              <span class="oldCategoryInput" style="display:none;"><input type='text' class='text' size='30' maxlength='50' onblur="editOldCategory(<?php echo $this->_tpl_vars['blogentrycats'][$this->_sections['blogentrycats_loop']['index']]['blogentrycat_id']; ?>
);" value="<?php echo $this->_tpl_vars['blogentrycats'][$this->_sections['blogentrycats_loop']['index']]['blogentrycat_title']; ?>
" /></span>
              <span class="oldCategoryLangVar">&nbsp;(Language Variable #<a href="admin_language_edit.php?language_id=1&phrase_id=<?php echo $this->_tpl_vars['blogentrycats'][$this->_sections['blogentrycats_loop']['index']]['blogentrycat_languagevar_id']; ?>
"><?php echo $this->_tpl_vars['blogentrycats'][$this->_sections['blogentrycats_loop']['index']]['blogentrycat_languagevar_id']; ?>
</a>)</span>
            </td>
          </tr>
          <?php endfor; endif; ?>
          <tr id="newCategoryRow">
            <td style="padding-top: 5px;">
              <span id="newCategoryContainer" style="display:none;"><input type='text' id='newCategoryInput' class='text' size='30' maxlength='50' onblur="editNewCategory();" /></span>
              <span id="newCategoryLink"><a href="javascript:void(0);" onclick="createNewCategory();"><?php echo SELanguage::_get(1500091); ?></a></span>
            </td>
          </tr>
        </tbody>
      </table>
      <input type='hidden' name='num_blogcategories' value='<?php echo $this->_tpl_vars['num_cats']; ?>
' />
    </td>
  </tr>
</table>
<br />

<?php $this->assign('langBlockTemp', SE_Language::_get(173));


  ?><input type='submit' class='button' value='<?php echo $this->_tpl_vars['langBlockTemp']; ?>
' /><?php 

  ?>
<input type='hidden' name='task' value='dosave' />
</form>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin_footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>