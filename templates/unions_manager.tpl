{include file='header.tpl'}

{* $Id: user_friends.tpl 8 2009-01-11 06:02:53Z john $ *}
<h1>Редактировать родственные связи<!-- Редактировать родственные связи --></h1>
<div class="crumb">
	<a href="/">Главная</a>
	<a href='{$url->url_create("profile", $user->user_info.user_username)}'>{lang_print id=652}</a>
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
				{* users in your family *}
				{foreach from=$family key=k item=v}
					{if $user->user_info.user_id == $k}
						<option value="{$k}">{$v}(Это Вы)</option>
					{else}
						<option value="{$k}">{$v}</option>
					{/if}
				{/foreach}
			</select>
		</div>
		<div class="input">
			<label>Добавить:</label>
			<select name="unions_type">
				<option value="pf">Отца</option>
				<option value="pm">Мать</option>
				<option value="pc">Сестру</option>
				<option value="pc">Брата</option>
				<option value="pw">Жену</option>
			</select>
		</div>
		
		<div class="input">
			<label>Cоздать нового пользователя&nbsp;<input type="checkbox" onclick="$('#bloc_create_user').toggle(); $('#select_user').toggle();" name="add_user" value="1" /></label>
			
			<div id="select_user">
				<label>Или выбрать из списка:</label>
				
				<select name="relations_user">
					{* other users in your family *}
					{foreach from=$family key=k item=v}
						{if $user->user_info.user_id != $k}
							<option value="{$k}">{$v}</option>
						{/if}
					{/foreach}
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
{literal}
<script type="text/javascript">
function createGroup() {

	$('#msg_gr').html('<img src="/images/96.gif" border="0" />');
	var go = 1;
	if (go == 1) {
		go = 0;
		$.post(
			"user_add_group.php", 	
			{ task: 'add' , gn: $('#group_name').attr('value') },
			function(data) {
				if ( data.success == '0') {
					$('#msg_gr').html(data.msg);
					go = 1;
				}
				if (data.success == '1') {
					$('#msg_gr').html(data.msg);
					setTimeout ( function() {
						$('#popup').fadeOut(300);
						$('.window').hide();
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
			{ task: 'update' },
			function(data) {
				if ( data.success == '0') {
					alert(data.msg);
					go = 1;
				}
				if (data.success == '1') {
					$('#user_groups').html(data.msg);
				}
			}
			, "json" 
		);
	
}
function show_user() {
	alert('filtr');
}

</script>
{/literal}

{* DISPLAY MESSAGE IF NO FRIENDS *}
{if $total_friends == 0}

  {* DISPLAY MESSAGE IF NO SEARCHED FRIENDS *}
  {if $search != ""}
    <table cellpadding='0' cellspacing='0' align='center'>
    <tr><td class='result'>
      <img src='./images/icons/bulb16.gif' border='0' class='icon'>{lang_print id=905}
    </td></tr>
    </table>
  {* DISPLAY MESSAGE IF NO FRIENDS ON LIST *}
  {else}
    <table cellpadding='0' cellspacing='0' align='center'>
    <tr><td class='result'>
      <img src='./images/icons/bulb16.gif' border='0' class='icon'>{lang_print id=904}
    </td></tr>
    </table>
  {/if}

{* DISPLAY FRIENDS *}
{else}


  {* DISPLAY PAGINATION MENU IF APPLICABLE *}
  {if $maxpage > 1}
    <div class='center' style='margin-top: 10px;'>
      {if $p != 1}<a href='user_friends.php?s={$s}&search={$search}&p={math equation='p-1' p=$p}'>&#171; {lang_print id=182}</a>{else}<font class='disabled'>&#171; {lang_print id=182}</font>{/if}
      {if $p_start == $p_end}
        &nbsp;|&nbsp; {lang_sprintf id=184 1=$p_start 2=$total_friends} &nbsp;|&nbsp; 
      {else}
        &nbsp;|&nbsp; {lang_sprintf id=185 1=$p_start 2=$p_end 3=$total_friends} &nbsp;|&nbsp; 
      {/if}
      {if $p != $maxpage}<a href='user_friends.php?s={$s}&search={$search}&p={math equation='p+1' p=$p}'>{lang_print id=183} &#187;</a>{else}<font class='disabled'>{lang_print id=183} &#187;</font>{/if}
    </div>
  {/if}

  <div style='margin-left: auto; margin-right: auto; width: 850px;'>

  </div>

  {* DISPLAY PAGINATION MENU IF APPLICABLE *}
  {if $maxpage > 1}
    <div clas	s='center' style='margin-top: 10px;'>
      {if $p != 1}<a href='user_friends.php?s={$s}&search={$search}&p={math equation='p-1' p=$p}'>&#171; {lang_print id=182}</a>{else}<font class='disabled'>&#171; {lang_print id=182}</font>{/if}
      {if $p_start == $p_end}
        &nbsp;|&nbsp; {lang_sprintf id=184 1=$p_start 2=$total_friends} &nbsp;|&nbsp; 
      {else}
        &nbsp;|&nbsp; {lang_sprintf id=185 1=$p_start 2=$p_end 3=$total_friends} &nbsp;|&nbsp; 
      {/if}
      {if $p != $maxpage}<a href='user_friends.php?s={$s}&search={$search}&p={math equation='p+1' p=$p}'>{lang_print id=183} &#187;</a>{else}<font class='disabled'>{lang_print id=183} &#187;</font>{/if}
    </div>
  {/if}
{/if}
{include file='footer.tpl'}