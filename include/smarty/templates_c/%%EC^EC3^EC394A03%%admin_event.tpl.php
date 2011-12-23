<?php /* Smarty version 2.6.14, created on 2011-12-23 15:13:10
         compiled from admin_event.tpl */
?><?php
SELanguage::_preload_multi(3000019,3000020,191,192,3000021,3000022,3000023,3000024,3000025,3000026,104,1202,1203,100,101,140,148,102,173);
SELanguage::load();
?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin_header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<h2><?php echo SELanguage::_get(3000019); ?></h2>
<?php echo SELanguage::_get(3000020); ?>
<br />
<br />


<?php echo '
<script type="text/javascript">
<!-- 
var categories;
var cat_type = \'event\';
var showCatFields = 1;
var showSubcatFields = 0;
var subcatTab = 0;
var hideSearch = 1;
var hideDisplay = 1;
var hideSpecial = 1;

function createSortable(divId, handleClass) {
	new Sortables($(divId), {handle:handleClass, onComplete: function() { changeorder(this.serialize(), divId); }});
}

Sortables.implement({
	serialize: function(){
		var serial = [];
		this.list.getChildren().each(function(el, i){
			serial[i] = el.getProperty(\'id\');
		}, this);
		return serial;
	}
});


window.addEvent(\'domready\', function(){	createSortable(\'categories\', \'img.handle_cat\'); });

//-->
</script>
'; 
 $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin_fields_js.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 
 if ($this->_tpl_vars['result'] != 0): ?>
  <div class='success'><img src='../images/success.gif' class='icon' border='0' /> <?php echo SELanguage::_get(191); ?></div>
<?php endif; ?>




<form action='admin_event.php' method='post'>

<table cellpadding='0' cellspacing='0' width='600'>
  <tr>
    <td class='header'><?php echo SELanguage::_get(192); ?></td>
  </tr>
  <tr>
    <td class='setting1'><?php echo SELanguage::_get(3000021); ?></td>
  </tr>
  <tr>
    <td class='setting2'>
      <table cellpadding='2' cellspacing='0'>
        <tr>
          <td><input type='radio' name='setting_permission_event' id='setting_permission_event_1' value='1'<?php if ($this->_tpl_vars['setting']['setting_permission_event']): ?> checked<?php endif; ?> /></td>
          <td><label for='setting_permission_event_1'><?php echo SELanguage::_get(3000022); ?></label></td>
        </tr>
        <tr>
          <td><input type='radio' name='setting_permission_event' id='setting_permission_event_0' value='0'<?php if (! $this->_tpl_vars['setting']['setting_permission_event']): ?> checked<?php endif; ?> /></td>
          <td><label for='setting_permission_event_0'><?php echo SELanguage::_get(3000023); ?></label></td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<br />


<table cellpadding='0' cellspacing='0' width='600'>
  <tr>
    <td class='header'><?php echo SELanguage::_get(3000024); ?></td>
  </tr>
  <tr>
    <td class='setting1'><?php echo SELanguage::_get(3000025); ?></td>
  </tr>
  <tr>
    <td class='setting2'>
      
            <div style='font-weight: bold;'>
        &nbsp;
        <?php echo SELanguage::_get(3000026); ?> - <a href='javascript:addcat();'>[<?php echo SELanguage::_get(104); ?>]</a>
      </div>
      
      <div id='categories' style='padding-left: 5px; font-size: 11px;'>
        
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
        
                <div id='cat_<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['cat_id']; ?>
'>
        
                    <div style='font-weight: bold;'>
            <img src='../images/folder_open_yellow.gif' border='0' class='handle_cat' style='vertical-align: middle; margin-right: 5px; cursor: move;' />
            <span id='cat_<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['cat_id']; ?>
_span'><a href='javascript:editcat("<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['cat_id']; ?>
", "0");' id='cat_<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['cat_id']; ?>
_title'><?php echo SELanguage::_get($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['cat_title']); ?></a></span>
          </div>
          
                    <div style='padding-left: 20px; padding-top: 3px; padding-bottom: 3px;'>
            <?php echo SELanguage::_get(1202); ?> - 
            <a href='javascript:addsubcat("<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['cat_id']; ?>
");'>[<?php echo SELanguage::_get(1203); ?>]</a>
          </div>
          
                    <?php echo '
          <script type="text/javascript">
          <!-- 
          window.addEvent(\'domready\', function(){ createSortable(\'subcats_'; 
 echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['cat_id']; 
 echo '\', \'img.handle_subcat_'; 
 echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['cat_id']; 
 echo '\'); });
          //-->
          </script>
          '; ?>

          
                    <div id='subcats_<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['cat_id']; ?>
' style='padding-left: 20px;'>
            
                        <?php unset($this->_sections['subcat_loop']);
$this->_sections['subcat_loop']['name'] = 'subcat_loop';
$this->_sections['subcat_loop']['loop'] = is_array($_loop=$this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['subcat_loop']['show'] = true;
$this->_sections['subcat_loop']['max'] = $this->_sections['subcat_loop']['loop'];
$this->_sections['subcat_loop']['step'] = 1;
$this->_sections['subcat_loop']['start'] = $this->_sections['subcat_loop']['step'] > 0 ? 0 : $this->_sections['subcat_loop']['loop']-1;
if ($this->_sections['subcat_loop']['show']) {
    $this->_sections['subcat_loop']['total'] = $this->_sections['subcat_loop']['loop'];
    if ($this->_sections['subcat_loop']['total'] == 0)
        $this->_sections['subcat_loop']['show'] = false;
} else
    $this->_sections['subcat_loop']['total'] = 0;
if ($this->_sections['subcat_loop']['show']):

            for ($this->_sections['subcat_loop']['index'] = $this->_sections['subcat_loop']['start'], $this->_sections['subcat_loop']['iteration'] = 1;
                 $this->_sections['subcat_loop']['iteration'] <= $this->_sections['subcat_loop']['total'];
                 $this->_sections['subcat_loop']['index'] += $this->_sections['subcat_loop']['step'], $this->_sections['subcat_loop']['iteration']++):
$this->_sections['subcat_loop']['rownum'] = $this->_sections['subcat_loop']['iteration'];
$this->_sections['subcat_loop']['index_prev'] = $this->_sections['subcat_loop']['index'] - $this->_sections['subcat_loop']['step'];
$this->_sections['subcat_loop']['index_next'] = $this->_sections['subcat_loop']['index'] + $this->_sections['subcat_loop']['step'];
$this->_sections['subcat_loop']['first']      = ($this->_sections['subcat_loop']['iteration'] == 1);
$this->_sections['subcat_loop']['last']       = ($this->_sections['subcat_loop']['iteration'] == $this->_sections['subcat_loop']['total']);
?>
            <div id='cat_<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['subcat_id']; ?>
' style='padding-left: 15px;'>
              <div>
                <img src='../images/folder_open_green.gif' border='0' class='handle_subcat_<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['cat_id']; ?>
' style='vertical-align: middle; margin-right: 5px; cursor: move;' />
                <span id='cat_<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['subcat_id']; ?>
_span'><a href='javascript:editcat("<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['subcat_id']; ?>
", "<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['cat_id']; ?>
");' id='cat_<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['subcat_id']; ?>
_title'><?php echo SELanguage::_get($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['subcats'][$this->_sections['subcat_loop']['index']]['subcat_title']); ?></a></span>
              </div>
            </div>
            <?php endfor; endif; ?>
            
          </div>
          
                    <div style='padding-left: 20px; padding-top: 5px; padding-bottom: 3px;'>
            <?php echo SELanguage::_get(100); ?> - 
            <a href='admin_fields.php?type=event&task=addfield&cat_id=<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['cat_id']; ?>
&hideSearch=0&hideDisplay=1&hideSpecial=1&TB_iframe=true&height=450&width=450' class='smoothbox' title='<?php echo SELanguage::_get(101); ?>'>[<?php echo SELanguage::_get(101); ?>]</a>
          </div>
          
                    <?php echo '
          <script type="text/javascript">
          <!-- 
          window.addEvent(\'domready\', function(){ createSortable(\'fields_'; 
 echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['cat_id']; 
 echo '\', \'img.handle_field_'; 
 echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['cat_id']; 
 echo '\'); });
          //-->
          </script>
          '; ?>

          
                    <div id='fields_<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['cat_id']; ?>
' style='padding-left: 20px;'>
            
                        <?php unset($this->_sections['field_loop']);
$this->_sections['field_loop']['name'] = 'field_loop';
$this->_sections['field_loop']['loop'] = is_array($_loop=$this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['field_loop']['show'] = true;
$this->_sections['field_loop']['max'] = $this->_sections['field_loop']['loop'];
$this->_sections['field_loop']['step'] = 1;
$this->_sections['field_loop']['start'] = $this->_sections['field_loop']['step'] > 0 ? 0 : $this->_sections['field_loop']['loop']-1;
if ($this->_sections['field_loop']['show']) {
    $this->_sections['field_loop']['total'] = $this->_sections['field_loop']['loop'];
    if ($this->_sections['field_loop']['total'] == 0)
        $this->_sections['field_loop']['show'] = false;
} else
    $this->_sections['field_loop']['total'] = 0;
if ($this->_sections['field_loop']['show']):

            for ($this->_sections['field_loop']['index'] = $this->_sections['field_loop']['start'], $this->_sections['field_loop']['iteration'] = 1;
                 $this->_sections['field_loop']['iteration'] <= $this->_sections['field_loop']['total'];
                 $this->_sections['field_loop']['index'] += $this->_sections['field_loop']['step'], $this->_sections['field_loop']['iteration']++):
$this->_sections['field_loop']['rownum'] = $this->_sections['field_loop']['iteration'];
$this->_sections['field_loop']['index_prev'] = $this->_sections['field_loop']['index'] - $this->_sections['field_loop']['step'];
$this->_sections['field_loop']['index_next'] = $this->_sections['field_loop']['index'] + $this->_sections['field_loop']['step'];
$this->_sections['field_loop']['first']      = ($this->_sections['field_loop']['iteration'] == 1);
$this->_sections['field_loop']['last']       = ($this->_sections['field_loop']['iteration'] == $this->_sections['field_loop']['total']);
?>
            <div id='field_<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_id']; ?>
' style='padding-left: 15px; padding-bottom: 3px;'>
              <div>
                <img src='../images/item.gif' border='0' class='handle_field_<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['cat_id']; ?>
' style='vertical-align: middle; margin-right: 5px; cursor: move;' />
                <a href='admin_fields.php?type=event&task=getfield&field_id=<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_id']; ?>
&hideSearch=0&hideDisplay=1&hideSpecial=1&TB_iframe=true&height=450&width=450' class='smoothbox' title='<?php echo SELanguage::_get(140); ?>'><?php echo SELanguage::_get($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_title']); ?></a>
              </div>
              
                            <div id='dep_fields_<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_id']; ?>
' style='margin-left: 15px;'>
                
                                <?php unset($this->_sections['dep_field_loop']);
$this->_sections['dep_field_loop']['name'] = 'dep_field_loop';
$this->_sections['dep_field_loop']['loop'] = is_array($_loop=$this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['dep_field_loop']['show'] = true;
$this->_sections['dep_field_loop']['max'] = $this->_sections['dep_field_loop']['loop'];
$this->_sections['dep_field_loop']['step'] = 1;
$this->_sections['dep_field_loop']['start'] = $this->_sections['dep_field_loop']['step'] > 0 ? 0 : $this->_sections['dep_field_loop']['loop']-1;
if ($this->_sections['dep_field_loop']['show']) {
    $this->_sections['dep_field_loop']['total'] = $this->_sections['dep_field_loop']['loop'];
    if ($this->_sections['dep_field_loop']['total'] == 0)
        $this->_sections['dep_field_loop']['show'] = false;
} else
    $this->_sections['dep_field_loop']['total'] = 0;
if ($this->_sections['dep_field_loop']['show']):

            for ($this->_sections['dep_field_loop']['index'] = $this->_sections['dep_field_loop']['start'], $this->_sections['dep_field_loop']['iteration'] = 1;
                 $this->_sections['dep_field_loop']['iteration'] <= $this->_sections['dep_field_loop']['total'];
                 $this->_sections['dep_field_loop']['index'] += $this->_sections['dep_field_loop']['step'], $this->_sections['dep_field_loop']['iteration']++):
$this->_sections['dep_field_loop']['rownum'] = $this->_sections['dep_field_loop']['iteration'];
$this->_sections['dep_field_loop']['index_prev'] = $this->_sections['dep_field_loop']['index'] - $this->_sections['dep_field_loop']['step'];
$this->_sections['dep_field_loop']['index_next'] = $this->_sections['dep_field_loop']['index'] + $this->_sections['dep_field_loop']['step'];
$this->_sections['dep_field_loop']['first']      = ($this->_sections['dep_field_loop']['iteration'] == 1);
$this->_sections['dep_field_loop']['last']       = ($this->_sections['dep_field_loop']['iteration'] == $this->_sections['dep_field_loop']['total']);
?>
                <?php if ($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['dep_field_loop']['index']]['dependency'] != 0): ?>
                <div id='dep_field_<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['dep_field_loop']['index']]['dep_field_id']; ?>
' style='padding-top: 3px;'>
                  <div>
                    <img src='../images/item_dep.gif' border='0' class='icon2' />
                    <?php echo SELanguage::_get($this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['dep_field_loop']['index']]['label']); ?>
                    <a href='admin_fields.php?type=event&task=getdepfield&field_id=<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['dep_field_loop']['index']]['dep_field_id']; ?>
&hideSearch=0&hideDisplay=1&hideSpecial=1&TB_iframe=true&height=450&width=450' class='smoothbox' title='<?php echo SELanguage::_get(148); ?>' id='dep_field_title_<?php echo $this->_tpl_vars['cats'][$this->_sections['cat_loop']['index']]['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['dep_field_loop']['index']]['dep_field_id']; ?>
'><i><?php echo SELanguage::_get(102); ?></i></a>
                  </div>
                </div>
                <?php endif; ?>
                <?php endfor; endif; ?>
                
              </div>
            </div>
            <?php endfor; endif; ?>
          </div>
        </div>
      <?php endfor; endif; ?>
      
      </div>
      
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