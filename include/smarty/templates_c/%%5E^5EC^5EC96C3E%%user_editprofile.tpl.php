<?php /* Smarty version 2.6.14, created on 2011-12-27 17:17:13
         compiled from user_editprofile.tpl */
?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'user_editprofile.tpl', 106, false),array('modifier', 'in_array', 'user_editprofile.tpl', 253, false),)), $this);
?><?php
SELanguage::_preload_multi(652,1000069,769,763,764,765,191,767,766,173);
SELanguage::load();
?>﻿<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<h1>РЕДАКТИРОВАТЬ ЛИЧНУЮ ИНФОРМАЦИЮ</h1>

<div class="crumb">
	<a href="/">Главная</a>
	<a href="<?php echo $this->_tpl_vars['url']->url_create('profile',$this->_tpl_vars['user']->user_info['user_username']); ?>
"><?php echo SELanguage::_get(652); ?><!-- Профиль --></a>
	<span><?php echo SELanguage::_get(1000069); ?><!-- редактировать --></span>
</div>

<div class="buttons" >
	<span class="button2"><span class="l">&nbsp;</span><span class="c">
		<a href="/user_editprofile_photo.php"><?php echo SELanguage::_get(769); ?></a>
	</span><span class="r">&nbsp;</span></span>
</div>


<?php if ($this->_tpl_vars['user']->level_info['level_profile_style'] != 0 || $this->_tpl_vars['user']->level_info['level_profile_style_sample'] != 0): ?>
	<a href='user_editprofile_style.php'><?php echo SELanguage::_get(763); ?></a>
<?php endif; ?>

<!-- <div class='page_header'><?php echo sprintf(SELanguage::_get(764), $this->_tpl_vars['pagename']); ?></div>
<div><?php echo SELanguage::_get(765); ?></div> --> 

<?php if ($this->_tpl_vars['result'] == 2): ?>
  <br>
  <?php ob_start(); 
 echo SELanguage::_get($this->_tpl_vars['old_subnet_name']); 
 $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('old_subnet_name', ob_get_contents());ob_end_clean(); ?>
  <?php ob_start(); 
 echo SELanguage::_get($this->_tpl_vars['new_subnet_name']); 
 $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('new_subnet_name', ob_get_contents());ob_end_clean(); ?>
  <div class='success'><img src='./images/success.gif' border='0' class='icon'> <?php echo SELanguage::_get(191); ?><br><?php echo sprintf(SELanguage::_get(767), $this->_tpl_vars['old_subnet_name'], $this->_tpl_vars['new_subnet_name']); ?></div>
  <br>
<?php elseif ($this->_tpl_vars['result'] == 1): ?>
  <br>
    <div class='success'><img src='./images/success.gif' border='0' class='icon'> <?php echo SELanguage::_get(191); ?></div>
  <br>
<?php endif; 
 if ($this->_tpl_vars['is_error'] != 0): ?>
  <div class='error'><img src='./images/error.gif' border='0' class='icon'> <?php echo SELanguage::_get($this->_tpl_vars['is_error']); ?></div>
<?php endif; 
 echo '
<script type="text/javascript">
<!-- 
  function ShowHideDeps(field_id, field_value, field_type) {
    if(field_type == 6) {
      if($(\'field_\'+field_id+\'_option\'+field_value)) {
        if($(\'field_\'+field_id+\'_option\'+field_value).style.display == "block") {
	  $(\'field_\'+field_id+\'_option\'+field_value).style.display = "none";
	} else {
	  $(\'field_\'+field_id+\'_option\'+field_value).style.display = "block";
	}
      }
    } else {
      var divIdStart = "field_"+field_id+"_option";
      for(var x=0;x<$(\'field_options_\'+field_id).childNodes.length;x++) {
        if($(\'field_options_\'+field_id).childNodes[x].nodeName == "DIV" && $(\'field_options_\'+field_id).childNodes[x].id.substr(0, divIdStart.length) == divIdStart) {
          if($(\'field_options_\'+field_id).childNodes[x].id == \'field_\'+field_id+\'_option\'+field_value) {
            $(\'field_options_\'+field_id).childNodes[x].style.display = "block";
          } else {
            $(\'field_options_\'+field_id).childNodes[x].style.display = "none";
          }
        }
      }
    }
  }
//-->
</script>
'; ?>

<div class="form edit">
<form action='user_editprofile.php' method='POST'>
	<?php if ($this->_tpl_vars['user']->level_info['level_photo_allow'] != 0): ?>
		<div class="input file">
			<label><a href='user_editprofile_photo.php'>Загрузи новый аватар </a></label>
			<div class="brdr"><img src="<?php echo $this->_tpl_vars['user']->user_photo("./images/nophoto.gif"); ?>
" alt="" /></div>
			<p>Обратите внимание, что все изображения должны быть в формате jpeg, gif, png. Размером до 1 Mb.</p>
		</div>
	<?php endif; ?>
	
<?php unset($this->_sections['field_loop']);
$this->_sections['field_loop']['name'] = 'field_loop';
$this->_sections['field_loop']['loop'] = is_array($_loop=$this->_tpl_vars['fields']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
	

        <?php if ($this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_type'] == 1): ?>
	<div class="input">
		<label><?php echo SELanguage::_get($this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_title']); 
 if ($this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_required'] != 0): ?>*<?php endif; ?></label>
		<input type='text' class='text' name='field_<?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_id']; ?>
' id='field_<?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_id']; ?>
' value='<?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_value']; ?>
' style='<?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_style']; ?>
' maxlength='<?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_maxlength']; ?>
'>
	</div>

            <?php if ($this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options'] != "" && count($this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options']) != 0): ?>
      <?php echo '
      <script type="text/javascript">
      <!-- 
      window.addEvent(\'domready\', function(){
	var options = {
		script:"misc_js.php?task=suggest_field&limit=5&'; 
 unset($this->_sections['option_loop']);
$this->_sections['option_loop']['name'] = 'option_loop';
$this->_sections['option_loop']['loop'] = is_array($_loop=$this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['option_loop']['show'] = true;
$this->_sections['option_loop']['max'] = $this->_sections['option_loop']['loop'];
$this->_sections['option_loop']['step'] = 1;
$this->_sections['option_loop']['start'] = $this->_sections['option_loop']['step'] > 0 ? 0 : $this->_sections['option_loop']['loop']-1;
if ($this->_sections['option_loop']['show']) {
    $this->_sections['option_loop']['total'] = $this->_sections['option_loop']['loop'];
    if ($this->_sections['option_loop']['total'] == 0)
        $this->_sections['option_loop']['show'] = false;
} else
    $this->_sections['option_loop']['total'] = 0;
if ($this->_sections['option_loop']['show']):

            for ($this->_sections['option_loop']['index'] = $this->_sections['option_loop']['start'], $this->_sections['option_loop']['iteration'] = 1;
                 $this->_sections['option_loop']['iteration'] <= $this->_sections['option_loop']['total'];
                 $this->_sections['option_loop']['index'] += $this->_sections['option_loop']['step'], $this->_sections['option_loop']['iteration']++):
$this->_sections['option_loop']['rownum'] = $this->_sections['option_loop']['iteration'];
$this->_sections['option_loop']['index_prev'] = $this->_sections['option_loop']['index'] - $this->_sections['option_loop']['step'];
$this->_sections['option_loop']['index_next'] = $this->_sections['option_loop']['index'] + $this->_sections['option_loop']['step'];
$this->_sections['option_loop']['first']      = ($this->_sections['option_loop']['iteration'] == 1);
$this->_sections['option_loop']['last']       = ($this->_sections['option_loop']['iteration'] == $this->_sections['option_loop']['total']);
?>options[]=<?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['label']; ?>
&<?php endfor; endif; 
 echo '",
		varname:"input",
		json:true,
		shownoresults:false,
		maxresults:5,
		multisuggest:false,
		callback: function (obj) {  }
	};
	var as_json'; 
 echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_id']; 
 echo ' = new bsn.AutoSuggest(\'field_'; 
 echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_id']; 
 echo '\', options);
      });
      //-->
      </script>
      '; ?>

      <?php endif; ?>


        <?php elseif ($this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_type'] == 2): ?>
    <div class="input">
		<label><?php echo SELanguage::_get($this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_title']); 
 if ($this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_required'] != 0): ?>*<?php endif; ?></label>
		<textarea rows='6' cols='50' name='field_<?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_id']; ?>
' style='<?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_style']; ?>
'><?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_value']; ?>
</textarea></div>
	</div>


        <?php elseif ($this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_type'] == 3): ?>
    <div class="input">
		<label><?php echo SELanguage::_get($this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_title']); 
 if ($this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_required'] != 0): ?>*<?php endif; ?></label>
		<!-- @ --><select name='field_<?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_id']; ?>
' id='field_<?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_id']; ?>
' onchange="ShowHideDeps('<?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_id']; ?>
', this.value);" style='<?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_style']; ?>
'>
			<option value='-1'></option>
						<?php unset($this->_sections['option_loop']);
$this->_sections['option_loop']['name'] = 'option_loop';
$this->_sections['option_loop']['loop'] = is_array($_loop=$this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['option_loop']['show'] = true;
$this->_sections['option_loop']['max'] = $this->_sections['option_loop']['loop'];
$this->_sections['option_loop']['step'] = 1;
$this->_sections['option_loop']['start'] = $this->_sections['option_loop']['step'] > 0 ? 0 : $this->_sections['option_loop']['loop']-1;
if ($this->_sections['option_loop']['show']) {
    $this->_sections['option_loop']['total'] = $this->_sections['option_loop']['loop'];
    if ($this->_sections['option_loop']['total'] == 0)
        $this->_sections['option_loop']['show'] = false;
} else
    $this->_sections['option_loop']['total'] = 0;
if ($this->_sections['option_loop']['show']):

            for ($this->_sections['option_loop']['index'] = $this->_sections['option_loop']['start'], $this->_sections['option_loop']['iteration'] = 1;
                 $this->_sections['option_loop']['iteration'] <= $this->_sections['option_loop']['total'];
                 $this->_sections['option_loop']['index'] += $this->_sections['option_loop']['step'], $this->_sections['option_loop']['iteration']++):
$this->_sections['option_loop']['rownum'] = $this->_sections['option_loop']['iteration'];
$this->_sections['option_loop']['index_prev'] = $this->_sections['option_loop']['index'] - $this->_sections['option_loop']['step'];
$this->_sections['option_loop']['index_next'] = $this->_sections['option_loop']['index'] + $this->_sections['option_loop']['step'];
$this->_sections['option_loop']['first']      = ($this->_sections['option_loop']['iteration'] == 1);
$this->_sections['option_loop']['last']       = ($this->_sections['option_loop']['iteration'] == $this->_sections['option_loop']['total']);
?>
			<option id='op' value='<?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['value']; ?>
'<?php if ($this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['value'] == $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_value']): ?> SELECTED<?php endif; ?>><?php echo SELanguage::_get($this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['label']); ?></option>
			<?php endfor; endif; ?>
		</select>
    </div>
            <div id='field_options_<?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_id']; ?>
'>
      <?php unset($this->_sections['option_loop']);
$this->_sections['option_loop']['name'] = 'option_loop';
$this->_sections['option_loop']['loop'] = is_array($_loop=$this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['option_loop']['show'] = true;
$this->_sections['option_loop']['max'] = $this->_sections['option_loop']['loop'];
$this->_sections['option_loop']['step'] = 1;
$this->_sections['option_loop']['start'] = $this->_sections['option_loop']['step'] > 0 ? 0 : $this->_sections['option_loop']['loop']-1;
if ($this->_sections['option_loop']['show']) {
    $this->_sections['option_loop']['total'] = $this->_sections['option_loop']['loop'];
    if ($this->_sections['option_loop']['total'] == 0)
        $this->_sections['option_loop']['show'] = false;
} else
    $this->_sections['option_loop']['total'] = 0;
if ($this->_sections['option_loop']['show']):

            for ($this->_sections['option_loop']['index'] = $this->_sections['option_loop']['start'], $this->_sections['option_loop']['iteration'] = 1;
                 $this->_sections['option_loop']['iteration'] <= $this->_sections['option_loop']['total'];
                 $this->_sections['option_loop']['index'] += $this->_sections['option_loop']['step'], $this->_sections['option_loop']['iteration']++):
$this->_sections['option_loop']['rownum'] = $this->_sections['option_loop']['iteration'];
$this->_sections['option_loop']['index_prev'] = $this->_sections['option_loop']['index'] - $this->_sections['option_loop']['step'];
$this->_sections['option_loop']['index_next'] = $this->_sections['option_loop']['index'] + $this->_sections['option_loop']['step'];
$this->_sections['option_loop']['first']      = ($this->_sections['option_loop']['iteration'] == 1);
$this->_sections['option_loop']['last']       = ($this->_sections['option_loop']['iteration'] == $this->_sections['option_loop']['total']);
?>
        <?php if ($this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dependency'] == 1): ?>

		  		  <?php if ($this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_type'] == 3): ?>
				<div id='field_<?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_id']; ?>
_option<?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['value']; ?>
' style='margin: 5px 5px 10px 5px;<?php if ($this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['value'] != $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_value']): ?> display: none;<?php endif; ?>'>
				<?php echo SELanguage::_get($this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_title']); 
 if ($this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_required'] != 0): ?>*<?php endif; ?>
				<select name='field_<?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_id']; ?>
'>
					<option value='-1'></option>
										<?php unset($this->_sections['option2_loop']);
$this->_sections['option2_loop']['name'] = 'option2_loop';
$this->_sections['option2_loop']['loop'] = is_array($_loop=$this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_options']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['option2_loop']['show'] = true;
$this->_sections['option2_loop']['max'] = $this->_sections['option2_loop']['loop'];
$this->_sections['option2_loop']['step'] = 1;
$this->_sections['option2_loop']['start'] = $this->_sections['option2_loop']['step'] > 0 ? 0 : $this->_sections['option2_loop']['loop']-1;
if ($this->_sections['option2_loop']['show']) {
    $this->_sections['option2_loop']['total'] = $this->_sections['option2_loop']['loop'];
    if ($this->_sections['option2_loop']['total'] == 0)
        $this->_sections['option2_loop']['show'] = false;
} else
    $this->_sections['option2_loop']['total'] = 0;
if ($this->_sections['option2_loop']['show']):

            for ($this->_sections['option2_loop']['index'] = $this->_sections['option2_loop']['start'], $this->_sections['option2_loop']['iteration'] = 1;
                 $this->_sections['option2_loop']['iteration'] <= $this->_sections['option2_loop']['total'];
                 $this->_sections['option2_loop']['index'] += $this->_sections['option2_loop']['step'], $this->_sections['option2_loop']['iteration']++):
$this->_sections['option2_loop']['rownum'] = $this->_sections['option2_loop']['iteration'];
$this->_sections['option2_loop']['index_prev'] = $this->_sections['option2_loop']['index'] - $this->_sections['option2_loop']['step'];
$this->_sections['option2_loop']['index_next'] = $this->_sections['option2_loop']['index'] + $this->_sections['option2_loop']['step'];
$this->_sections['option2_loop']['first']      = ($this->_sections['option2_loop']['iteration'] == 1);
$this->_sections['option2_loop']['last']       = ($this->_sections['option2_loop']['iteration'] == $this->_sections['option2_loop']['total']);
?>
						<option id='op' value='<?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_options'][$this->_sections['option2_loop']['index']]['value']; ?>
'<?php if ($this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_options'][$this->_sections['option2_loop']['index']]['value'] == $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_value']): ?> SELECTED<?php endif; ?>><?php echo SELanguage::_get($this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_options'][$this->_sections['option2_loop']['index']]['label']); ?></option>
					<?php endfor; endif; ?>
				</select>
				</div>	  

		  		  <?php else: ?>
				<div id='field_<?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_id']; ?>
_option<?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['value']; ?>
' style='margin: 5px 5px 10px 5px;<?php if ($this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['value'] != $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_value']): ?> display: none;<?php endif; ?>'>
				<?php echo SELanguage::_get($this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_title']); 
 if ($this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_required'] != 0): ?>*<?php endif; ?>
				<input type='text' class='text' name='field_<?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_id']; ?>
' value='<?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_value']; ?>
' style='<?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_style']; ?>
' maxlength='<?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_maxlength']; ?>
'>
				</div>
		  <?php endif; ?>

        <?php endif; ?>
      <?php endfor; endif; ?>
      </div>
  


        <?php elseif ($this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_type'] == 4): ?>
    
            <div id='field_options_<?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_id']; ?>
'>
      <?php unset($this->_sections['option_loop']);
$this->_sections['option_loop']['name'] = 'option_loop';
$this->_sections['option_loop']['loop'] = is_array($_loop=$this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['option_loop']['show'] = true;
$this->_sections['option_loop']['max'] = $this->_sections['option_loop']['loop'];
$this->_sections['option_loop']['step'] = 1;
$this->_sections['option_loop']['start'] = $this->_sections['option_loop']['step'] > 0 ? 0 : $this->_sections['option_loop']['loop']-1;
if ($this->_sections['option_loop']['show']) {
    $this->_sections['option_loop']['total'] = $this->_sections['option_loop']['loop'];
    if ($this->_sections['option_loop']['total'] == 0)
        $this->_sections['option_loop']['show'] = false;
} else
    $this->_sections['option_loop']['total'] = 0;
if ($this->_sections['option_loop']['show']):

            for ($this->_sections['option_loop']['index'] = $this->_sections['option_loop']['start'], $this->_sections['option_loop']['iteration'] = 1;
                 $this->_sections['option_loop']['iteration'] <= $this->_sections['option_loop']['total'];
                 $this->_sections['option_loop']['index'] += $this->_sections['option_loop']['step'], $this->_sections['option_loop']['iteration']++):
$this->_sections['option_loop']['rownum'] = $this->_sections['option_loop']['iteration'];
$this->_sections['option_loop']['index_prev'] = $this->_sections['option_loop']['index'] - $this->_sections['option_loop']['step'];
$this->_sections['option_loop']['index_next'] = $this->_sections['option_loop']['index'] + $this->_sections['option_loop']['step'];
$this->_sections['option_loop']['first']      = ($this->_sections['option_loop']['iteration'] == 1);
$this->_sections['option_loop']['last']       = ($this->_sections['option_loop']['iteration'] == $this->_sections['option_loop']['total']);
?>
        <div>
        <input type='radio' class='radio' onclick="ShowHideDeps('<?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_id']; ?>
', '<?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['value']; ?>
');" style='<?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_style']; ?>
' name='field_<?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_id']; ?>
' id='label_<?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_id']; ?>
_<?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['value']; ?>
' value='<?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['value']; ?>
'<?php if ($this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['value'] == $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_value']): ?> CHECKED<?php endif; ?>>
        <label for='label_<?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_id']; ?>
_<?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['value']; ?>
'><?php echo SELanguage::_get($this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['label']); ?></label>
        </div>

                <?php if ($this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dependency'] == 1): ?>

	  	  <?php if ($this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_type'] == 3): ?>
        <div id='field_<?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_id']; ?>
_option<?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['value']; ?>
' <?php if ($this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['value'] != $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_value']): ?> display: none;<?php endif; ?>'>
			<?php echo SELanguage::_get($this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_title']); 
 if ($this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_required'] != 0): ?>*<?php endif; ?>
            <select name='field_<?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_id']; ?>
'>
			  <option value='-1'></option>
			  			  <?php unset($this->_sections['option2_loop']);
$this->_sections['option2_loop']['name'] = 'option2_loop';
$this->_sections['option2_loop']['loop'] = is_array($_loop=$this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_options']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['option2_loop']['show'] = true;
$this->_sections['option2_loop']['max'] = $this->_sections['option2_loop']['loop'];
$this->_sections['option2_loop']['step'] = 1;
$this->_sections['option2_loop']['start'] = $this->_sections['option2_loop']['step'] > 0 ? 0 : $this->_sections['option2_loop']['loop']-1;
if ($this->_sections['option2_loop']['show']) {
    $this->_sections['option2_loop']['total'] = $this->_sections['option2_loop']['loop'];
    if ($this->_sections['option2_loop']['total'] == 0)
        $this->_sections['option2_loop']['show'] = false;
} else
    $this->_sections['option2_loop']['total'] = 0;
if ($this->_sections['option2_loop']['show']):

            for ($this->_sections['option2_loop']['index'] = $this->_sections['option2_loop']['start'], $this->_sections['option2_loop']['iteration'] = 1;
                 $this->_sections['option2_loop']['iteration'] <= $this->_sections['option2_loop']['total'];
                 $this->_sections['option2_loop']['index'] += $this->_sections['option2_loop']['step'], $this->_sections['option2_loop']['iteration']++):
$this->_sections['option2_loop']['rownum'] = $this->_sections['option2_loop']['iteration'];
$this->_sections['option2_loop']['index_prev'] = $this->_sections['option2_loop']['index'] - $this->_sections['option2_loop']['step'];
$this->_sections['option2_loop']['index_next'] = $this->_sections['option2_loop']['index'] + $this->_sections['option2_loop']['step'];
$this->_sections['option2_loop']['first']      = ($this->_sections['option2_loop']['iteration'] == 1);
$this->_sections['option2_loop']['last']       = ($this->_sections['option2_loop']['iteration'] == $this->_sections['option2_loop']['total']);
?>
				<option id='op' value='<?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_options'][$this->_sections['option2_loop']['index']]['value']; ?>
'<?php if ($this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_options'][$this->_sections['option2_loop']['index']]['value'] == $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_value']): ?> SELECTED<?php endif; ?>><?php echo SELanguage::_get($this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_options'][$this->_sections['option2_loop']['index']]['label']); ?></option>
			  <?php endfor; endif; ?>
			</select>
        </div>	  

	  	  <?php else: ?>
            <div id='field_<?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_id']; ?>
_option<?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['value']; ?>
' style='margin: 0px 5px 10px 23px;<?php if ($this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['value'] != $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_value']): ?> display: none;<?php endif; ?>'>
            <?php echo SELanguage::_get($this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_title']); 
 if ($this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_required'] != 0): ?>*<?php endif; ?>
            <input type='text' class='text' name='field_<?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_id']; ?>
' value='<?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_value']; ?>
' style='<?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_style']; ?>
' maxlength='<?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_maxlength']; ?>
'>
            </div>
	  <?php endif; ?>

        <?php endif; ?>

      <?php endfor; endif; ?>
      </div>


        <?php elseif ($this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_type'] == 5): ?>
    <div class="input date">
		<label><?php echo SELanguage::_get($this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_title']); 
 if ($this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_required'] != 0): ?>*<?php endif; ?></label>
		
		<select  style="width:45px;" name='field_<?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_id']; ?>
_1' style='<?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_style']; ?>
'>
			<?php unset($this->_sections['date1']);
$this->_sections['date1']['name'] = 'date1';
$this->_sections['date1']['loop'] = is_array($_loop=$this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['date_array1']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['date1']['show'] = true;
$this->_sections['date1']['max'] = $this->_sections['date1']['loop'];
$this->_sections['date1']['step'] = 1;
$this->_sections['date1']['start'] = $this->_sections['date1']['step'] > 0 ? 0 : $this->_sections['date1']['loop']-1;
if ($this->_sections['date1']['show']) {
    $this->_sections['date1']['total'] = $this->_sections['date1']['loop'];
    if ($this->_sections['date1']['total'] == 0)
        $this->_sections['date1']['show'] = false;
} else
    $this->_sections['date1']['total'] = 0;
if ($this->_sections['date1']['show']):

            for ($this->_sections['date1']['index'] = $this->_sections['date1']['start'], $this->_sections['date1']['iteration'] = 1;
                 $this->_sections['date1']['iteration'] <= $this->_sections['date1']['total'];
                 $this->_sections['date1']['index'] += $this->_sections['date1']['step'], $this->_sections['date1']['iteration']++):
$this->_sections['date1']['rownum'] = $this->_sections['date1']['iteration'];
$this->_sections['date1']['index_prev'] = $this->_sections['date1']['index'] - $this->_sections['date1']['step'];
$this->_sections['date1']['index_next'] = $this->_sections['date1']['index'] + $this->_sections['date1']['step'];
$this->_sections['date1']['first']      = ($this->_sections['date1']['iteration'] == 1);
$this->_sections['date1']['last']       = ($this->_sections['date1']['iteration'] == $this->_sections['date1']['total']);
?>
				<option value='<?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['date_array1'][$this->_sections['date1']['index']]['value']; ?>
'<?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['date_array1'][$this->_sections['date1']['index']]['selected']; ?>
><?php if ($this->_sections['date1']['first']): ?>[ <?php echo SELanguage::_get($this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['date_array1'][$this->_sections['date1']['index']]['name']); ?> ]<?php else: 
 echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['date_array1'][$this->_sections['date1']['index']]['name']; 
 endif; ?></option>
			<?php endfor; endif; ?>
		</select>

		<select  style="width:83px;" name='field_<?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_id']; ?>
_2' style='<?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_style']; ?>
'>
			<?php unset($this->_sections['date2']);
$this->_sections['date2']['name'] = 'date2';
$this->_sections['date2']['loop'] = is_array($_loop=$this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['date_array2']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['date2']['show'] = true;
$this->_sections['date2']['max'] = $this->_sections['date2']['loop'];
$this->_sections['date2']['step'] = 1;
$this->_sections['date2']['start'] = $this->_sections['date2']['step'] > 0 ? 0 : $this->_sections['date2']['loop']-1;
if ($this->_sections['date2']['show']) {
    $this->_sections['date2']['total'] = $this->_sections['date2']['loop'];
    if ($this->_sections['date2']['total'] == 0)
        $this->_sections['date2']['show'] = false;
} else
    $this->_sections['date2']['total'] = 0;
if ($this->_sections['date2']['show']):

            for ($this->_sections['date2']['index'] = $this->_sections['date2']['start'], $this->_sections['date2']['iteration'] = 1;
                 $this->_sections['date2']['iteration'] <= $this->_sections['date2']['total'];
                 $this->_sections['date2']['index'] += $this->_sections['date2']['step'], $this->_sections['date2']['iteration']++):
$this->_sections['date2']['rownum'] = $this->_sections['date2']['iteration'];
$this->_sections['date2']['index_prev'] = $this->_sections['date2']['index'] - $this->_sections['date2']['step'];
$this->_sections['date2']['index_next'] = $this->_sections['date2']['index'] + $this->_sections['date2']['step'];
$this->_sections['date2']['first']      = ($this->_sections['date2']['iteration'] == 1);
$this->_sections['date2']['last']       = ($this->_sections['date2']['iteration'] == $this->_sections['date2']['total']);
?>
				<option value='<?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['date_array2'][$this->_sections['date2']['index']]['value']; ?>
'<?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['date_array2'][$this->_sections['date2']['index']]['selected']; ?>
><?php if ($this->_sections['date2']['first']): ?>[ <?php echo SELanguage::_get($this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['date_array2'][$this->_sections['date2']['index']]['name']); ?> ]<?php else: 
 echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['date_array2'][$this->_sections['date2']['index']]['name']; 
 endif; ?></option>
			<?php endfor; endif; ?>
		</select>

		<select  style="width:58px;" name='field_<?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_id']; ?>
_3' style='<?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_style']; ?>
'>
			<?php unset($this->_sections['date3']);
$this->_sections['date3']['name'] = 'date3';
$this->_sections['date3']['loop'] = is_array($_loop=$this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['date_array3']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['date3']['show'] = true;
$this->_sections['date3']['max'] = $this->_sections['date3']['loop'];
$this->_sections['date3']['step'] = 1;
$this->_sections['date3']['start'] = $this->_sections['date3']['step'] > 0 ? 0 : $this->_sections['date3']['loop']-1;
if ($this->_sections['date3']['show']) {
    $this->_sections['date3']['total'] = $this->_sections['date3']['loop'];
    if ($this->_sections['date3']['total'] == 0)
        $this->_sections['date3']['show'] = false;
} else
    $this->_sections['date3']['total'] = 0;
if ($this->_sections['date3']['show']):

            for ($this->_sections['date3']['index'] = $this->_sections['date3']['start'], $this->_sections['date3']['iteration'] = 1;
                 $this->_sections['date3']['iteration'] <= $this->_sections['date3']['total'];
                 $this->_sections['date3']['index'] += $this->_sections['date3']['step'], $this->_sections['date3']['iteration']++):
$this->_sections['date3']['rownum'] = $this->_sections['date3']['iteration'];
$this->_sections['date3']['index_prev'] = $this->_sections['date3']['index'] - $this->_sections['date3']['step'];
$this->_sections['date3']['index_next'] = $this->_sections['date3']['index'] + $this->_sections['date3']['step'];
$this->_sections['date3']['first']      = ($this->_sections['date3']['iteration'] == 1);
$this->_sections['date3']['last']       = ($this->_sections['date3']['iteration'] == $this->_sections['date3']['total']);
?>
				<option value='<?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['date_array3'][$this->_sections['date3']['index']]['value']; ?>
'<?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['date_array3'][$this->_sections['date3']['index']]['selected']; ?>
><?php if ($this->_sections['date3']['first']): ?>[ <?php echo SELanguage::_get($this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['date_array3'][$this->_sections['date3']['index']]['name']); ?> ]<?php else: 
 echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['date_array3'][$this->_sections['date3']['index']]['name']; 
 endif; ?></option>
			<?php endfor; endif; ?>
		</select>
    </div>
	<div class="clear"></div>

            <?php elseif ($this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_type'] == 6): ?>
    
                <div id='field_options_<?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_id']; ?>
'>
        <?php unset($this->_sections['option_loop']);
$this->_sections['option_loop']['name'] = 'option_loop';
$this->_sections['option_loop']['loop'] = is_array($_loop=$this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['option_loop']['show'] = true;
$this->_sections['option_loop']['max'] = $this->_sections['option_loop']['loop'];
$this->_sections['option_loop']['step'] = 1;
$this->_sections['option_loop']['start'] = $this->_sections['option_loop']['step'] > 0 ? 0 : $this->_sections['option_loop']['loop']-1;
if ($this->_sections['option_loop']['show']) {
    $this->_sections['option_loop']['total'] = $this->_sections['option_loop']['loop'];
    if ($this->_sections['option_loop']['total'] == 0)
        $this->_sections['option_loop']['show'] = false;
} else
    $this->_sections['option_loop']['total'] = 0;
if ($this->_sections['option_loop']['show']):

            for ($this->_sections['option_loop']['index'] = $this->_sections['option_loop']['start'], $this->_sections['option_loop']['iteration'] = 1;
                 $this->_sections['option_loop']['iteration'] <= $this->_sections['option_loop']['total'];
                 $this->_sections['option_loop']['index'] += $this->_sections['option_loop']['step'], $this->_sections['option_loop']['iteration']++):
$this->_sections['option_loop']['rownum'] = $this->_sections['option_loop']['iteration'];
$this->_sections['option_loop']['index_prev'] = $this->_sections['option_loop']['index'] - $this->_sections['option_loop']['step'];
$this->_sections['option_loop']['index_next'] = $this->_sections['option_loop']['index'] + $this->_sections['option_loop']['step'];
$this->_sections['option_loop']['first']      = ($this->_sections['option_loop']['iteration'] == 1);
$this->_sections['option_loop']['last']       = ($this->_sections['option_loop']['iteration'] == $this->_sections['option_loop']['total']);
?>
          <div>
			<input type='checkbox' onclick="ShowHideDeps('<?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_id']; ?>
', '<?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['value']; ?>
', '<?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_type']; ?>
');" style='<?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_style']; ?>
' name='field_<?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_id']; ?>
[]' id='label_<?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_id']; ?>
_<?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['value']; ?>
' value='<?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['value']; ?>
'<?php if (((is_array($_tmp=$this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['value'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_value']) : in_array($_tmp, $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_value']))): ?> CHECKED<?php endif; ?>>
			<label for='label_<?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_id']; ?>
_<?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['value']; ?>
'><?php echo SELanguage::_get($this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['label']); ?></label>
          </div>

                    <?php if ($this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dependency'] == 1): ?>

	    	    <?php if ($this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_type'] == 3): ?>
              <div id='field_<?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_id']; ?>
_option<?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['value']; ?>
' style='margin: 5px 5px 10px 5px;<?php if ($this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['value'] != $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_value']): ?> display: none;<?php endif; ?>'>
              <?php echo SELanguage::_get($this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_title']); 
 if ($this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_required'] != 0): ?>*<?php endif; ?>
				<select name='field_<?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_id']; ?>
'>
					<option value='-1'></option>
										<?php unset($this->_sections['option2_loop']);
$this->_sections['option2_loop']['name'] = 'option2_loop';
$this->_sections['option2_loop']['loop'] = is_array($_loop=$this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_options']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['option2_loop']['show'] = true;
$this->_sections['option2_loop']['max'] = $this->_sections['option2_loop']['loop'];
$this->_sections['option2_loop']['step'] = 1;
$this->_sections['option2_loop']['start'] = $this->_sections['option2_loop']['step'] > 0 ? 0 : $this->_sections['option2_loop']['loop']-1;
if ($this->_sections['option2_loop']['show']) {
    $this->_sections['option2_loop']['total'] = $this->_sections['option2_loop']['loop'];
    if ($this->_sections['option2_loop']['total'] == 0)
        $this->_sections['option2_loop']['show'] = false;
} else
    $this->_sections['option2_loop']['total'] = 0;
if ($this->_sections['option2_loop']['show']):

            for ($this->_sections['option2_loop']['index'] = $this->_sections['option2_loop']['start'], $this->_sections['option2_loop']['iteration'] = 1;
                 $this->_sections['option2_loop']['iteration'] <= $this->_sections['option2_loop']['total'];
                 $this->_sections['option2_loop']['index'] += $this->_sections['option2_loop']['step'], $this->_sections['option2_loop']['iteration']++):
$this->_sections['option2_loop']['rownum'] = $this->_sections['option2_loop']['iteration'];
$this->_sections['option2_loop']['index_prev'] = $this->_sections['option2_loop']['index'] - $this->_sections['option2_loop']['step'];
$this->_sections['option2_loop']['index_next'] = $this->_sections['option2_loop']['index'] + $this->_sections['option2_loop']['step'];
$this->_sections['option2_loop']['first']      = ($this->_sections['option2_loop']['iteration'] == 1);
$this->_sections['option2_loop']['last']       = ($this->_sections['option2_loop']['iteration'] == $this->_sections['option2_loop']['total']);
?>
						<option id='op' value='<?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_options'][$this->_sections['option2_loop']['index']]['value']; ?>
'<?php if ($this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_options'][$this->_sections['option2_loop']['index']]['value'] == $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_value']): ?> SELECTED<?php endif; ?>><?php echo SELanguage::_get($this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_options'][$this->_sections['option2_loop']['index']]['label']); ?></option>
					<?php endfor; endif; ?>
				</select>
              </div>	  

	    	    <?php else: ?>
              <div id='field_<?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_id']; ?>
_option<?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['value']; ?>
' style='margin: 0px 5px 10px 23px;<?php if (((is_array($_tmp=$this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['value'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_value']) : in_array($_tmp, $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_value'])) == FALSE): ?> display: none;<?php endif; ?>'>
              <?php echo SELanguage::_get($this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_title']); 
 if ($this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_required'] != 0): ?>*<?php endif; ?>
              <input type='text' class='text' name='field_<?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_id']; ?>
' value='<?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_value']; ?>
' style='<?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_style']; ?>
' maxlength='<?php echo $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_options'][$this->_sections['option_loop']['index']]['dep_field_maxlength']; ?>
'>
              </div>
	    <?php endif; ?>

          <?php endif; ?>

        <?php endfor; endif; ?>
        </div>


    <?php endif; ?>

    <!-- <div class='form_desc'><?php echo SELanguage::_get($this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_desc']); ?></div> -->

    <?php ob_start(); 
 echo SELanguage::_get($this->_tpl_vars['user']->subnet_info['subnet_name']); 
 $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('current_subnet', ob_get_contents());ob_end_clean(); ?>
    <?php if ($this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_id'] == $this->_tpl_vars['setting']['setting_subnet_field1_id'] || $this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_id'] == $this->_tpl_vars['setting']['setting_subnet_field2_id']): 
 echo sprintf(SELanguage::_get(766), $this->_tpl_vars['current_subnet']); 
 endif; ?>

    <?php ob_start(); 
 echo SELanguage::_get($this->_tpl_vars['fields'][$this->_sections['field_loop']['index']]['field_error']); 
 $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('field_error', ob_get_contents());ob_end_clean(); ?>
    <?php if ($this->_tpl_vars['field_error'] != ""): ?><div class='form_error'><img src='./images/icons/error16.gif' border='0' class='icon'> <?php echo $this->_tpl_vars['field_error']; ?>
</div><?php endif; ?>
  <?php endfor; endif; ?>
	<div class="button"><span class="button2"><span class="l">&nbsp;</span><span class="c">
		<input type="submit" value="<?php echo SELanguage::_get(173); ?>" name="log" />
	</span><span class="r">&nbsp;</span></span></div>
	<input type='hidden' name='task' value='dosave'>
	<input type='hidden' name='cat_id' value='<?php echo $this->_tpl_vars['cat_id']; ?>
'>

</form>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>