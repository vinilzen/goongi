<?php /* Smarty version 2.6.14, created on 2011-11-22 16:51:04
         compiled from unions_manager.tpl */
?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'math', 'unions_manager.tpl', 168, false),)), $this);
?><?php
SELanguage::_preload_multi(652,905,904,182,184,185,183);
SELanguage::load();
?>﻿<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<h1>Редактировать родственные связи<!-- Редактировать родственные связи --></h1>
<div class="crumb">
	<a href="/">Главная</a>
	<a href='<?php echo $this->_tpl_vars['url']->url_create('profile',$this->_tpl_vars['user']->user_info['user_username']); ?>
'><?php echo SELanguage::_get(652); ?></a>
	<span>Редактировать родственные связи<!-- Редактировать родственные связи --></span>
</div>

<div class="form edit">
	<form action="/unions_manager.php" method="post" name="edit_profil">
		<!-- <div class="input file">
			<label>Загрузи новый аватар</label>
			<div class="fakeupload">
				<input type="file" onchange="this.form.fakeupload.value = this.value;" class="realupload2" id="realupload2" size="1" name="upload2" />
				<input type="text" class="inpupload" value="" name="fakeupload" />
			</div><p>Обратите внимание, что все изображения должны быть в формате jpeg, gif, png. Размером до 1 Mb.</p>
		</div> -->
		<div class="input">
			<label>Добавить связь для:</label>
			<select name="start_user">
								<?php $_from = $this->_tpl_vars['family']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
					<?php if ($this->_tpl_vars['user']->user_info['user_id'] == $this->_tpl_vars['k']): ?>
						<option value="<?php echo $this->_tpl_vars['k']; ?>
"><?php echo $this->_tpl_vars['v']; ?>
(Это Вы)</option>
					<?php else: ?>
						<option value="<?php echo $this->_tpl_vars['k']; ?>
"><?php echo $this->_tpl_vars['v']; ?>
</option>
					<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>
			</select>
		</div>
		<div class="input">
			<label>Добавить:</label>
			<select name="unions_type">
				<option value="pf">Отца</option>
				<option value="pm">Мать</option>
				<option value="pcw">Сестру</option>
				<option value="pcm">Брата</option>
				<option value="pw">Жену</option>
			</select>
		</div>
		
		<div class="input">
			<label>Cоздать нового пользователя&nbsp;<input type="checkbox" onclick="$('#bloc_create_user').toggle(); $('#select_user').toggle();" name="add_user" value="1" /></label>
			
			<div id="select_user">
				<label>Или выбрать из списка:</label>
				
				<select name="relations_user">
										<?php $_from = $this->_tpl_vars['family']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
						<?php if ($this->_tpl_vars['user']->user_info['user_id'] != $this->_tpl_vars['k']): ?>
							<option value="<?php echo $this->_tpl_vars['k']; ?>
"><?php echo $this->_tpl_vars['v']; ?>
</option>
						<?php endif; ?>
					<?php endforeach; endif; unset($_from); ?>
				</select>
			</div>
		</div>
		<div id="bloc_create_user" style="display:none;">
			<div class="input"><label>Имя</label><input type="text" value="" name="name" /></div>
			<div class="input"><label>Фамилия</label><input type="text" value="" name="last_name" /></div>
			<div class="input"><label>Прозвище рода</label><input type="text" value="" name="nik" /></div>
			<div class="radio"><label>Пол</label><div><label><input type="radio" value="m" name="pol" /><span>Мужской</span></label><label><input type="radio" value="f" name="pol" /><span>Женский</span></label></div></div>
			<div class="input date"><label>Дата рождения</label>
				<select name="day_b" style="width:45px;"><option>01</option></select>
				<select name="month_b" style="width:83px;"><option>сентября</option></select>
				<select name="year_b" style="width:58px;"><option>1975</option></select>
			</div>
			<div class="input date" id="death"><label><input type="checkbox" value="" name="death" /><span>Дата смерти</span></label>
				<select disabled="disabled" name="day_d" style="width:45px;"><option>01</option></select>
				<select disabled="disabled" name="month_d" style="width:83px;"><option>августа</option></select>
				<select disabled="disabled" name="year_d" style="width:58px;"><option>1975</option></select>
			</div>
			<div class="clear"></div>
			<div class="input"><label>Страна рождения</label><select name="contry"><option>Беларусь</option></select></div>
			<div class="input"><label>Страна проживания</label><select name="contry"><option>Беларусь</option></select></div>
			<div class="input"><label>Семейное положение</label><select name="contry"><option>Беларусь</option></select></div>
			<div class="input"><label>Род деятельности</label><input type="text" value="" name="work" /></div>
		</div>
		<input type="hidden" name="do" value="1" />
		<input type="hidden" name="rewrite" value="0" />
		<div class="button"><span class="button2"><span class="l">&nbsp;</span><span class="c"><input type="submit" value="Сохранить изменения" name="log" /></span><span class="r">&nbsp;</span></span></div>
	</form>
</div>
<?php echo '
<script type="text/javascript">
function createGroup() {

	$(\'#msg_gr\').html(\'<img src="/images/96.gif" border="0" />\');
	var go = 1;
	if (go == 1) {
		go = 0;
		$.post(
			"user_add_group.php", 	
			{ task: \'add\' , gn: $(\'#group_name\').attr(\'value\') },
			function(data) {
				if ( data.success == \'0\') {
					$(\'#msg_gr\').html(data.msg);
					go = 1;
				}
				if (data.success == \'1\') {
					$(\'#msg_gr\').html(data.msg);
					setTimeout ( function() {
						$(\'#popup\').fadeOut(300);
						$(\'.window\').hide();
						e.preventDefault();
					}, 1500);
					
					update_group_list();
				}
			}
			, "json" 
		);
	}
}
function update_group_list() {

	$.post(
			"user_add_group.php", 
			{ task: \'update\' },
			function(data) {
				if ( data.success == \'0\') {
					alert(data.msg);
					go = 1;
				}
				if (data.success == \'1\') {
					$(\'#user_groups\').html(data.msg);
				}
			}
			, "json" 
		);
	
}
function show_user() {
	alert(\'filtr\');
}

</script>
'; 
 if ($this->_tpl_vars['total_friends'] == 0): ?>

    <?php if ($this->_tpl_vars['search'] != ""): ?>
    <table cellpadding='0' cellspacing='0' align='center'>
    <tr><td class='result'>
      <img src='./images/icons/bulb16.gif' border='0' class='icon'><?php echo SELanguage::_get(905); ?>
    </td></tr>
    </table>
    <?php else: ?>
    <table cellpadding='0' cellspacing='0' align='center'>
    <tr><td class='result'>
      <img src='./images/icons/bulb16.gif' border='0' class='icon'><?php echo SELanguage::_get(904); ?>
    </td></tr>
    </table>
  <?php endif; 
 else: ?>


    <?php if ($this->_tpl_vars['maxpage'] > 1): ?>
    <div class='center' style='margin-top: 10px;'>
      <?php if ($this->_tpl_vars['p'] != 1): ?><a href='user_friends.php?s=<?php echo $this->_tpl_vars['s']; ?>
&search=<?php echo $this->_tpl_vars['search']; ?>
&p=<?php echo smarty_function_math(array('equation' => 'p-1','p' => $this->_tpl_vars['p']), $this);?>
'>&#171; <?php echo SELanguage::_get(182); ?></a><?php else: ?><font class='disabled'>&#171; <?php echo SELanguage::_get(182); ?></font><?php endif; ?>
      <?php if ($this->_tpl_vars['p_start'] == $this->_tpl_vars['p_end']): ?>
        &nbsp;|&nbsp; <?php echo sprintf(SELanguage::_get(184), $this->_tpl_vars['p_start'], $this->_tpl_vars['total_friends']); ?> &nbsp;|&nbsp; 
      <?php else: ?>
        &nbsp;|&nbsp; <?php echo sprintf(SELanguage::_get(185), $this->_tpl_vars['p_start'], $this->_tpl_vars['p_end'], $this->_tpl_vars['total_friends']); ?> &nbsp;|&nbsp; 
      <?php endif; ?>
      <?php if ($this->_tpl_vars['p'] != $this->_tpl_vars['maxpage']): ?><a href='user_friends.php?s=<?php echo $this->_tpl_vars['s']; ?>
&search=<?php echo $this->_tpl_vars['search']; ?>
&p=<?php echo smarty_function_math(array('equation' => 'p+1','p' => $this->_tpl_vars['p']), $this);?>
'><?php echo SELanguage::_get(183); ?> &#187;</a><?php else: ?><font class='disabled'><?php echo SELanguage::_get(183); ?> &#187;</font><?php endif; ?>
    </div>
  <?php endif; ?>

  <div style='margin-left: auto; margin-right: auto; width: 850px;'>

  </div>

    <?php if ($this->_tpl_vars['maxpage'] > 1): ?>
    <div clas	s='center' style='margin-top: 10px;'>
      <?php if ($this->_tpl_vars['p'] != 1): ?><a href='user_friends.php?s=<?php echo $this->_tpl_vars['s']; ?>
&search=<?php echo $this->_tpl_vars['search']; ?>
&p=<?php echo smarty_function_math(array('equation' => 'p-1','p' => $this->_tpl_vars['p']), $this);?>
'>&#171; <?php echo SELanguage::_get(182); ?></a><?php else: ?><font class='disabled'>&#171; <?php echo SELanguage::_get(182); ?></font><?php endif; ?>
      <?php if ($this->_tpl_vars['p_start'] == $this->_tpl_vars['p_end']): ?>
        &nbsp;|&nbsp; <?php echo sprintf(SELanguage::_get(184), $this->_tpl_vars['p_start'], $this->_tpl_vars['total_friends']); ?> &nbsp;|&nbsp; 
      <?php else: ?>
        &nbsp;|&nbsp; <?php echo sprintf(SELanguage::_get(185), $this->_tpl_vars['p_start'], $this->_tpl_vars['p_end'], $this->_tpl_vars['total_friends']); ?> &nbsp;|&nbsp; 
      <?php endif; ?>
      <?php if ($this->_tpl_vars['p'] != $this->_tpl_vars['maxpage']): ?><a href='user_friends.php?s=<?php echo $this->_tpl_vars['s']; ?>
&search=<?php echo $this->_tpl_vars['search']; ?>
&p=<?php echo smarty_function_math(array('equation' => 'p+1','p' => $this->_tpl_vars['p']), $this);?>
'><?php echo SELanguage::_get(183); ?> &#187;</a><?php else: ?><font class='disabled'><?php echo SELanguage::_get(183); ?> &#187;</font><?php endif; ?>
    </div>
  <?php endif; 
 endif; 
 $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>