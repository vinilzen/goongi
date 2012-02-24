{literal}
<script type="text/javascript">
function handleFiles(file){
    document.getElementById('p_img').innerHTML='';
	var data = file.get(0).files.item(0).getAsDataURL(); // Получаем содержимое файла
}

function checkparam()
{
	if (($('#name_v').val() == '') || ($('#categor').val() == '') || ($('#desc').val() == '') || ($('#fakeupload').val() == ''))
	{
		if  ($('#name_v').val() == '')  $('.error').append('Заполните поле название услуги<br/>');
		if  ($('#categor').val() == '') $('.error').append('Заполните поле категория<br/>');
		if  ($('#desc').val() == '')  $('.error').append('Заполните поле описание<br/>');
		if ($('#fakeupload').val() == '' && $('#p_img').attr('src') == 'images/6.jpg' )  $('.error').append('Загрузите изображение<br/>');
	}
    else {$('#edit_profil').submit(); }
}

function CalculateCharsInTextArea(TextElementId, CaptionElementId) {
    var textControl = $('#desc').val();
    $('#txtCharCount').html('');
    $('#txtCharCount').append(60 - textControl.length);
    if (textControl.length >= 60) {
     $('#txtCharCount').append(' (Максимум 60 символов)');
   }
}

</script>
{/literal}

{include file='header.tpl'}
<h1>Создать визитку</h1>
            <div class="crumb">
                <a href="#">Главная</a>
                <a href="#">Профиль</a>
                <span> {if !empty($vizitkientry_info.ad_id)}Редактировать визитку{else}Создать визитку{/if}</span>
            </div>
            <div class="form edit">
            <div class="pred">

                <h2>Предпросмотр</h2>
                <strong id = "p_name">{if !(empty($vizitkientry_info.vizitkientry_title))}{$vizitkientry_info.vizitkientry_title}{/if}</strong>
                <span id = "p_categor">{if !empty($vizitkientry_info.vizitkientry_category)}{$vizitkientry_info.vizitkientry_category}{/if}</span>
                <p ><img  id = "p_img" src="{if !empty($vizitkientry_info.ad_filename)}../uploads_admin/ads/{$vizitkientry_info.ad_filename}{else}images/6.jpg{/if}" width = "105" height = "105" alt="" /></p>
                <p id = "p_body">{if !empty($vizitkientry_info.vizitkientry_body)}{$vizitkientry_info.vizitkientry_body}{/if}<br />
                {assign var=foo value="-"|explode:$vizitkientry_info.vizitkientry_price}</p>
                <p><strong id = "p_price">{if !empty($vizitkientry_info.vizitkientry_price)}{$foo[0]} <span class = "p_m">{$foo[1]}</span>{/if}</strong></p>
                <p id = "p_email">{if !empty($vizitkientry_info.vizitkientry_email)}{$vizitkientry_info.vizitkientry_email}{/if}<br /></p>
                <p id = "p_telephon">{if !empty($vizitkientry_info.vizitkientry_telephon)}{$vizitkientry_info.vizitkientry_telephon}{/if}<br /></p>
                <a href="#"><p id = "p_site">{if !empty($vizitkientry_info.vizitkientry_site)}{$vizitkientry_info.vizitkientry_site}{/if}<br /></a></p>

            </div>
            <h2>Создание объявления</h2>
            <div class = "error"></div>
            <form action="user_vizitki_entry.php" method="post" id ="edit_profil"  name="edit_profil" enctype="multipart/form-data">

            {if !empty($vizitkientry_info.ad_id)}
                <input type='hidden' name='vizitkientry_id' value='{$vizitkientry_info.ad_id}' />
            {/if}
                <div class="input"><label>Название услуги</label>
                <input type="text" OnChange = "$('#name_v').attr('value',this.value); $('#p_name').text(this.value); " value="{if !empty($vizitkientry_info.ad_name)}{$vizitkientry_info.ad_name}{/if}" id = "name_v" name="name" /></div>
                <div class="input"><label>Категория</label>
                <select  OnChange = "$('#p_categor').text(this.options[this.selectedIndex].value);" name="categor" id ="categor" >
                    {section name=s loop=$settcat}
                             <option value = "{$settcat[s].vizitkientrycat_title}" {if $vizitkientry_info.vizitkientry_category == $settcat[s].vizitkientrycat_title} SELECTED{/if}>{$settcat[s].vizitkientrycat_title}</option>
                    {/section}
                </select>
                </div>
                <div class="input file_v">
                <label>Изображение</label>
                <div class="fakeupload">
                <input type="file" onchange="this.form.fakeupload.value = this.value; " class="realupload2" id="realupload2"  name="upload2" />
                <input type="text" class="inpupload" value="{if !empty($vizitkientry_info.ad_filename)}{$vizitkientry_info.ad_filename}{/if}" name="fakeupload" id = "fakeupload"/>
                </div>
                    <p>Обратите внимание, что все изображения должны соответствовать размеру 105x105 пикселей.</p>
                </div>

                <div class="input"><label>Описание</label>
                   <textarea  maxlength="60" OnChange = "$('#p_body').text(this.value);" onblur="CalculateCharsInTextArea('desc', 'txtCharCount');" oninput="CalculateCharsInTextArea('desc', 'txtCharCount');" onpaste="CalculateCharsInTextArea('desc', 'txtCharCount');"  onKeyPress ="CalculateCharsInTextArea('desc', 'txtCharCount');" rows="3" cols="10" id ='desc'  name="desc">{if !empty($vizitkientry_info.vizitkientry_body)}{$vizitkientry_info.vizitkientry_body}{/if}</textarea>
                <p>Осталось символов: <span id="txtCharCount"></span> </p></div>

                <div class="input">
                <label>Цена</label>
                <div class="input_price">
                    {assign var=foo value="-"|explode:$vizitkientry_info.vizitkientry_price}
                    <input type="text" OnChange = "$('#p_price').text(this.value);" value="{if !empty($vizitkientry_info.vizitkientry_price)}{$foo[0]}{/if}" name="cena" />
                <select name="money" OnChange = "$('.p_m').text(this.options[this.selectedIndex].value);">
                        {section name=s loop=$money}
                          <option value = "{$money[s].vizitki_many}" {if $foo[1] == $money[s].vizitki_many} SELECTED{/if}>{$money[s].vizitki_many}</option>
                         {/section}
                </select>
                </div> </div>

                <div class="input"><label>Телефон</label>
                <input type="text"  OnChange = "$('#p_telephon').text(this.value);" value="{if !empty($vizitkientry_info.vizitkientry_telephon)}{$vizitkientry_info.vizitkientry_telephon}{/if}" name="phone" /></div>

                <div class="input"><label>Эл. почта</label>
                <input type="text" OnChange = "$('#p_email').text(this.value);" value="{if !empty($vizitkientry_info.vizitkientry_email)}{$vizitkientry_info.vizitkientry_email}{/if}" name="mail" /></div>

                <div class="input"><label>Ссылка на сайт</label>
                <input type="text"  OnChange = "$('#p_site').text(this.value);" value="{if !empty($vizitkientry_info.vizitkientry_site)}{$vizitkientry_info.vizitkientry_site}{/if}" name="link" /></div>

                <h2>Выбор региона трансляции</h2>
                <div class="input">
					<label>Страна</label>
					<select name='dhtmlgoodies_country' id='dhtmlgoodies_country' onchange="getCityList(this.value, 'cou');">
					  <option id='op' value='-1'></option>
					  {$country}
					</select>
				</div>
				
                <div class="input">
					<label>Регион</label>
					<div id="region">
						<select name='dhtmlgoodies_region' id='dhtmlgoodies_region' onchange="getCityList(this.value, 'reg');">
						  <option id='op' value='-1'></option>
						  {$region}
						</select>
					</div>
				</div>

                <div class="input">
					<label>Город</label>
					<div id="countydiv">
						<select name='dhtmlgoodies_city' id='dhtmlgoodies_city'>
							<option id='op' value='-1'></option>
							{$city}
						</select>
					</div>
                </div>
<div class="button">
                <span class="button2"><span class="l">&nbsp;</span><span class="c"><input type="button" value="Сохранить" onClick = "checkparam()" name="save" /></span><span class="r">&nbsp;</span></span>
</div>
                <input type='hidden' name='task' value='dosave'>
            </form>
</div>
{include file='footer.tpl'}