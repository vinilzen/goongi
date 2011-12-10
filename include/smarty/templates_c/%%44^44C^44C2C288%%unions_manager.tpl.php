<?php /* Smarty version 2.6.14, created on 2011-12-10 17:19:23
         compiled from unions_manager.tpl */
?><?php
SELanguage::_preload_multi(652);
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
			<label>msg-<?php echo $this->_tpl_vars['msg']; ?>
</label>
			<label>success-<?php echo $this->_tpl_vars['success']; ?>
</label>
		</div>
		<div class="input">
			<label>Добавить связь для:</label>
			<select name="start_user">
								<?php $_from = $this->_tpl_vars['users']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
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
				<option value="pcf">Отца</option>
				<option value="pcm">Мать</option>
				<option value="pcc">Сестру/Брата</option>
				<option value="pm">Жену</option>
				<option value="pf">Мужа</option>
				<option value="pc">Ребенка</option>
			</select>
		</div>
		
		<div class="input">
			<label>Cоздать нового пользователя&nbsp;<input type="checkbox" onclick="$('#bloc_create_user').toggle(); $('#select_user').toggle();" name="add_user" value="1" /></label>
			
			<div id="select_user">
				<label>Или выбрать из списка:</label>
				
				<select name="relations_user">
										<?php $_from = $this->_tpl_vars['users']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
						<option value="<?php echo $this->_tpl_vars['k']; ?>
"><?php echo $this->_tpl_vars['v']; ?>
</option>
					<?php endforeach; endif; unset($_from); ?>
				</select>
			</div>
		</div>
		<div id="bloc_create_user" style="display:none;">
			<div class="input"><label>Имя</label><input type="text" value="" id="fname" name="name" /></div>
			<div class="input" >
				<label>Фамилия</label>
				<input type="text" value="" id="lname" name="last_name" />
				<div id="prldr"></div>
			</div>
			<div class="input" id="find_u">
				<label id="find_u_msg"></label>
				<select id="fuser" name="sel_user" style="display:none;"></select>
			</div>
			<div class="input">
				<label>Email</label>
				<span>Выслать приглашение</span><input type="checkbox" name="send_request" value="1" /><br />
				<input type="text" value="" id="email" name="email" />
				<div id="prldremail"></div><br />
				<a href="#" id="check_email">Проверить email</a>
			</div>
			<div class="input" id="email_check">
				<label id="email_u_msg"></label>
				<select id="fuser_email" name="sel_user" style="display:none;"></select>
			</div>
			<div class="radio"><label>Пол</label><div><label><input type="radio" value="m" name="pol" /><span>Мужской</span></label><label><input type="radio" value="f" name="pol" /><span>Женский</span></label></div></div>
			<div class="input date"><label>Дата рождения</label>
				<select name="day_b" style="width:45px;">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
					<option value="13">13</option>
					<option value="14">14</option>
					<option value="15">15</option>
					<option value="16">16</option>
					<option value="17">17</option>
					<option value="18">18</option>
					<option value="19">19</option>
					<option value="20">20</option>
					<option value="21">21</option>
					<option value="22">22</option>
					<option value="23">23</option>
					<option value="24">24</option>
					<option value="25">25</option>
					<option value="26">26</option>
					<option value="27">27</option>
					<option value="28">28</option>
					<option value="29">29</option>
					<option value="30">30</option>
					<option value="31">31</option>
				</select>
				<select name="month_b" style="width:83px;">
					<option value="1">Январь</option>
					<option value="2">Февраль</option>
					<option value="3">Март</option>
					<option value="4">Апрель</option>
					<option value="5">Май</option>
					<option value="6">Июнь</option>
					<option value="7">Июль</option>
					<option value="8">Август</option>
					<option value="9">Сентябрь</option>
					<option value="10">Октябрь</option>
					<option value="11">Ноябрь</option>
					<option value="12">Декабрь</option>
				</select>
				<select name="year_b" style="width:58px;">
					<option value="2011">2011</option>
					<option value="2010">2010</option>
					<option value="2009">2009</option>
					<option value="2008">2008</option>
					<option value="2007">2007</option>
					<option value="2006">2006</option>
					<option value="2005">2005</option>
					<option value="2004">2004</option>
					<option value="2003">2003</option>
					<option value="2002">2002</option>
					<option value="2001">2001</option>
					<option value="2000">2000</option>
					<option value="1999">1999</option>
					<option value="1998">1998</option>
					<option value="1997">1997</option>
					<option value="1996">1996</option>
					<option value="1995">1995</option>
					<option value="1994">1994</option>
					<option value="1993">1993</option>
					<option value="1992">1992</option>
					<option value="1991">1991</option>
					<option value="1990">1990</option>
					<option value="1989">1989</option>
					<option value="1988">1988</option>
					<option value="1987">1987</option>
					<option value="1986">1986</option>
					<option value="1985">1985</option>
					<option value="1984">1984</option>
					<option value="1983">1983</option>
					<option value="1982">1982</option>
					<option value="1981">1981</option>
					<option value="1980">1980</option>
					<option value="1979">1979</option>
					<option value="1978">1978</option>
					<option value="1977">1977</option>
					<option value="1976">1976</option>
					<option value="1975">1975</option>
					<option value="1974">1974</option>
					<option value="1973">1973</option>
					<option value="1972">1972</option>
					<option value="1971">1971</option>
					<option value="1970">1970</option>
					<option value="1969">1969</option>
					<option value="1968">1968</option>
					<option value="1967">1967</option>
					<option value="1966">1966</option>
					<option value="1965">1965</option>
					<option value="1964">1964</option>
					<option value="1963">1963</option>
					<option value="1962">1962</option>
					<option value="1961">1961</option>
					<option value="1960">1960</option>
					<option value="1959">1959</option>
					<option value="1958">1958</option>
					<option value="1957">1957</option>
					<option value="1956">1956</option>
					<option value="1955">1955</option>
					<option value="1954">1954</option>
					<option value="1953">1953</option>
					<option value="1952">1952</option>
					<option value="1951">1951</option>
					<option value="1950">1950</option>
					<option value="1949">1949</option>
					<option value="1948">1948</option>
					<option value="1947">1947</option>
					<option value="1946">1946</option>
					<option value="1945">1945</option>
					<option value="1944">1944</option>
					<option value="1943">1943</option>
					<option value="1942">1942</option>
					<option value="1941">1941</option>
					<option value="1940">1940</option>
					<option value="1939">1939</option>
					<option value="1938">1938</option>
					<option value="1937">1937</option>
					<option value="1936">1936</option>
					<option value="1935">1935</option>
					<option value="1934">1934</option>
					<option value="1933">1933</option>
					<option value="1932">1932</option>
					<option value="1931">1931</option>
					<option value="1930">1930</option>
					<option value="1929">1929</option>
					<option value="1928">1928</option>
					<option value="1927">1927</option>
					<option value="1926">1926</option>
					<option value="1925">1925</option>
					<option value="1924">1924</option>
					<option value="1923">1923</option>
					<option value="1922">1922</option>
					<option value="1921">1921</option>
					<option value="1920">1920</option>
				</select>
			</div>
			<!-- <div class="input date" id="death" ><label><input type="checkbox" value="" name="death" /><span>Дата смерти</span></label>
				<select disabled="disabled" name="day_d" style="width:45px;"><option>01</option></select>
				<select disabled="disabled" name="month_d" style="width:83px;"><option>августа</option></select>
				<select disabled="disabled" name="year_d" style="width:58px;"><option>1975</option></select>
			</div>
			<div class="clear"></div>
			-->
		</div>
		<input type="hidden" name="do" value="1" />
		<input type="hidden" name="rewrite" value="0" />
		<input type="hidden" name="json" value="1" />
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
 $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>