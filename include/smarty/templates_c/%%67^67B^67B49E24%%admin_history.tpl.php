<?php /* Smarty version 2.6.14, created on 2011-12-26 12:05:55
         compiled from admin_history.tpl */
?><?php
SELanguage::_preload_multi(1600003,1600084,191,1600085,1600086,1600087,1600088,1600089,1600090,1600091,173);
SELanguage::load();
?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin_header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<h2><?php echo SELanguage::_get(1600003); ?></h2>
<?php echo SELanguage::_get(1600084); ?>
<br />
<br />

<?php if ($this->_tpl_vars['result']): ?><div class='success'><img src='../images/success.gif' class='icon' border='0'> <?php echo SELanguage::_get(191); ?></div><?php endif; ?>

<form action='admin_history.php' method='POST' name='info'>

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
      \'url\' : \'admin_history.php\',
      \'data\' : {
        \'task\' : \'createhistoryentrycat\',
        \'historyentrycat_title\' : newCategoryTitle
      },
      \'onComplete\':function(responseObject)
      {
        if( $type(responseObject)!="object" || !responseObject.result || responseObject.result=="failure" )
        {
          alert(\'ERR\');
        }
        
        else
        {
          var historyentrycat_id = responseObject.historyentrycat_id;
          var historyentrycat_languagevar_id = responseObject.historyentrycat_languagevar_id;
          var innerHTML = \'\';
          
          //innerHTML += \'<td>\';
          innerHTML += \'<span class="oldCategoryContainer">\';
          innerHTML += \'<a href="javascript:void(0);" onclick="switchOldCategory(\' + historyentrycat_id + \');">\';
          innerHTML += newCategoryTitle;
          innerHTML += \'</a>\';
          innerHTML += \'</span>\';
          innerHTML += \'<span class="oldCategoryInput" style="display:none;">\';
          innerHTML += "<input type=\'text\' class=\'text\' size=\'30\' maxlength=\'50\' onblur=\'editOldCategory(" + historyentrycat_id + ");\' value=\'" + newCategoryTitle + "\' />";
          innerHTML += \'</span>\';
          innerHTML += \'<span class="oldCategoryLangVar">\';
          innerHTML += \'&nbsp;(Language Variable #<a href="admin_language_edit.php?language_id=1&phrase_id=\' + historyentrycat_languagevar_id + \'">\';
          innerHTML += historyentrycat_languagevar_id;
          innerHTML += \'</a>)\';
          innerHTML += \'</span>\';
          //innerHTML += \'</td>\';
          
          //alert(innerHTML);
          
          var newCategoryRow = new Element(\'tr\', {\'id\' : \'historyEntryCatRow_\' + historyentrycat_id});
          var newCategoryData = new Element(\'td\', {\'html\' : innerHTML});
          
          newCategoryRow.inject($(\'newCategoryRow\'), \'before\');
          newCategoryData.inject(newCategoryRow);
        }
      }
    });
    
    request.send();
  }
  
  function switchOldCategory(historyentrycat_id)
  {
    var categoryRow = $(\'historyEntryCatRow_\' + historyentrycat_id);
    categoryRow.getElement(\'.oldCategoryContainer\').style.display = \'none\';
    categoryRow.getElement(\'.oldCategoryInput\').style.display = \'\';
    categoryRow.getElement(\'input\').focus();
  }
  
  function unswitchOldCategory(historyentrycat_id)
  {
    var categoryRow = $(\'historyEntryCatRow_\' + historyentrycat_id);
    categoryRow.getElement(\'.oldCategoryContainer\').style.display = \'\';
    categoryRow.getElement(\'.oldCategoryInput\').style.display = \'none\';
  }
  
  function editOldCategory(historyentrycat_id)
  {
    var categoryRow = $(\'historyEntryCatRow_\' + historyentrycat_id);
    var newCategoryTitle = categoryRow.getElement(\'input\').value;
    
    // DELETE
    if( newCategoryTitle.trim()==\'\' )
    {
      deleteCategory(historyentrycat_id);
      return;
    }
    
    categoryRow.getElement(\'.oldCategoryContainer\').getElement(\'a\').innerHTML = newCategoryTitle;
    unswitchOldCategory(historyentrycat_id);
    
    // Ajax
    var request = new Request.JSON({
      \'method\' : \'post\',
      \'url\' : \'admin_history.php\',
      \'data\' : {
        \'task\' : \'edithistoryentrycat\',
        \'historyentrycat_id\' : historyentrycat_id,
        \'historyentrycat_title\' : newCategoryTitle
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
  
  function deleteCategory(historyentrycat_id)
  {
    var categoryRow = $(\'historyEntryCatRow_\' + historyentrycat_id);
    
    categoryRow.destroy();
    
    // Ajax
    var request = new Request.JSON({
      \'method\' : \'post\',
      \'url\' : \'admin_history.php\',
      \'data\' : {
        \'task\' : \'deletehistoryentrycat\',
        \'historyentrycat_id\' : historyentrycat_id
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
    <td class='header'><?php echo SELanguage::_get(1600085); ?></td>
  </tr>
    <td class='setting1'>
      <?php echo SELanguage::_get(1600086); ?>
    </td>
  </tr>
  <tr>
    <td class='setting2'>
      <table cellpadding='2' cellspacing='0'>
        <tr>
          <td><input type='radio' name='setting_permission_history' id='permission_history_1' value='1'<?php if ($this->_tpl_vars['setting']['setting_permission_history']): ?> checked<?php endif; ?>></td>
          <td><label for='permission_history_1'><?php echo SELanguage::_get(1600087); ?></label></td>
        </tr>
        <tr>
          <td><input type='radio' name='setting_permission_history' id='permission_history_0' value='0'<?php if (! $this->_tpl_vars['setting']['setting_permission_history']): ?> checked<?php endif; ?>></td>
          <td><label for='permission_history_0'><?php echo SELanguage::_get(1600088); ?></label></td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<br />


<table cellpadding='0' cellspacing='0' width='600'>
  <tr>
    <td class='header'><?php echo SELanguage::_get(1600089); ?></td>
  </tr>
  <tr>
    <td class='setting1'><?php echo SELanguage::_get(1600090); ?></td>
  </tr>
  <tr>
    <td class='setting2'>
      <table cellpadding='2' cellspacing='0'>
        <tbody>
          <tr>
            <td><b><?php echo $this->_tpl_vars['admin_history15']; ?>
</b></td>
          </tr>
          <?php unset($this->_sections['historyentrycats_loop']);
$this->_sections['historyentrycats_loop']['name'] = 'historyentrycats_loop';
$this->_sections['historyentrycats_loop']['loop'] = is_array($_loop=$this->_tpl_vars['historyentrycats']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['historyentrycats_loop']['show'] = true;
$this->_sections['historyentrycats_loop']['max'] = $this->_sections['historyentrycats_loop']['loop'];
$this->_sections['historyentrycats_loop']['step'] = 1;
$this->_sections['historyentrycats_loop']['start'] = $this->_sections['historyentrycats_loop']['step'] > 0 ? 0 : $this->_sections['historyentrycats_loop']['loop']-1;
if ($this->_sections['historyentrycats_loop']['show']) {
    $this->_sections['historyentrycats_loop']['total'] = $this->_sections['historyentrycats_loop']['loop'];
    if ($this->_sections['historyentrycats_loop']['total'] == 0)
        $this->_sections['historyentrycats_loop']['show'] = false;
} else
    $this->_sections['historyentrycats_loop']['total'] = 0;
if ($this->_sections['historyentrycats_loop']['show']):

            for ($this->_sections['historyentrycats_loop']['index'] = $this->_sections['historyentrycats_loop']['start'], $this->_sections['historyentrycats_loop']['iteration'] = 1;
                 $this->_sections['historyentrycats_loop']['iteration'] <= $this->_sections['historyentrycats_loop']['total'];
                 $this->_sections['historyentrycats_loop']['index'] += $this->_sections['historyentrycats_loop']['step'], $this->_sections['historyentrycats_loop']['iteration']++):
$this->_sections['historyentrycats_loop']['rownum'] = $this->_sections['historyentrycats_loop']['iteration'];
$this->_sections['historyentrycats_loop']['index_prev'] = $this->_sections['historyentrycats_loop']['index'] - $this->_sections['historyentrycats_loop']['step'];
$this->_sections['historyentrycats_loop']['index_next'] = $this->_sections['historyentrycats_loop']['index'] + $this->_sections['historyentrycats_loop']['step'];
$this->_sections['historyentrycats_loop']['first']      = ($this->_sections['historyentrycats_loop']['iteration'] == 1);
$this->_sections['historyentrycats_loop']['last']       = ($this->_sections['historyentrycats_loop']['iteration'] == $this->_sections['historyentrycats_loop']['total']);
?>
          <tr id="historyEntryCatRow_<?php echo $this->_tpl_vars['historyentrycats'][$this->_sections['historyentrycats_loop']['index']]['historyentrycat_id']; ?>
">
            <td>
              <span class="oldCategoryContainer"><a href="javascript:void(0);" onclick="switchOldCategory(<?php echo $this->_tpl_vars['historyentrycats'][$this->_sections['historyentrycats_loop']['index']]['historyentrycat_id']; ?>
);"><?php echo $this->_tpl_vars['historyentrycats'][$this->_sections['historyentrycats_loop']['index']]['historyentrycat_title']; ?>
</a></span>
              <span class="oldCategoryInput" style="display:none;"><input type='text' class='text' size='30' maxlength='50' onblur="editOldCategory(<?php echo $this->_tpl_vars['historyentrycats'][$this->_sections['historyentrycats_loop']['index']]['historyentrycat_id']; ?>
);" value="<?php echo $this->_tpl_vars['historyentrycats'][$this->_sections['historyentrycats_loop']['index']]['historyentrycat_title']; ?>
" /></span>
              <span class="oldCategoryLangVar">&nbsp;(Language Variable #<a href="admin_language_edit.php?language_id=1&phrase_id=<?php echo $this->_tpl_vars['historyentrycats'][$this->_sections['historyentrycats_loop']['index']]['historyentrycat_languagevar_id']; ?>
"><?php echo $this->_tpl_vars['historyentrycats'][$this->_sections['historyentrycats_loop']['index']]['historyentrycat_languagevar_id']; ?>
</a>)</span>
            </td>
          </tr>
          <?php endfor; endif; ?>
          <tr id="newCategoryRow">
            <td style="padding-top: 5px;">
              <span id="newCategoryContainer" style="display:none;"><input type='text' id='newCategoryInput' class='text' size='30' maxlength='50' onblur="editNewCategory();" /></span>
              <span id="newCategoryLink"><a href="javascript:void(0);" onclick="createNewCategory();"><?php echo SELanguage::_get(1600091); ?></a></span>
            </td>
          </tr>
        </tbody>
      </table>
      <input type='hidden' name='num_historycategories' value='<?php echo $this->_tpl_vars['num_cats']; ?>
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