{literal}
<script type="text/javascript">
function handleFiles(file){
         document.getElementById('p_img').innerHTML='';
 var data = file.get(0).files.item(0).getAsDataURL(); // Получаем содержимое файла
//alert(data);
        // for(var i=0;i<files.length;i++){
       //          var f = files[i];

        //          if(f.type.indexOf('p_img')==0){
        //                         var img = document.createElement('img');
        ///                         img.src = f.getAsDataURL();
	//				img.style.width='300px';
         //                        document.getElementById('p_img').appendChild(img);
       //          }
       //  }
}

function checkparam()
{
if (($('#name_v').val() == '') || ($('#categor').val() == '') || ($('#desc').val() == '') || ($('#fakeupload').val() == ''))
{
    if  ($('#name_v').val() == '')  $('.error').append('Заполните поле название услуги<br/>');
    if  ($('#categor').val() == '') $('.error').append('Заполните поле категория<br/>');
    if  ($('#desc').val() == '')  $('.error').append('Заполните поле описание<br/>');
    if ($('#fakeupload').val() == '')  $('.error').append('Загрузите изображение<br/>');
}
    else {$('#edit_profil').submit(); }
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
                <strong id = "p_price">{if !empty($vizitkientry_info.vizitkientry_price)}{$vizitkientry_info.vizitkientry_price}{/if}</strong></p>
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
                <input type="file" onchange="this.form.fakeupload.value = this.value; " class="realupload2" id="realupload2" size="1" name="upload2" />
                <input type="text" class="inpupload" value="" name="fakeupload" id = "fakeupload"/></div>
                    <p>Обратите внимание, что все изображения должны соответствовать размеру 105x105 пикселей.</p>
                </div>
                <div class="input"><label>Описание</label>
                <textarea OnChange = "$('#p_body').text(this.value);" rows="3" cols="10" id ="desc"  name="desc">{if !empty($vizitkientry_info.vizitkientry_body)}{$vizitkientry_info.vizitkientry_body}{/if}</textarea>
                <p>Осталось символов: 5</p></div>

                <div class="input">
                <label>Цена</label>
                <div class="input_price">
                    <input type="text" OnChange = "$('#p_price').text(this.value);" value="{if !empty($vizitkientry_info.vizitkientry_price)}{$vizitkientry_info.vizitkientry_price}{/if}" name="cena" />
                <select name="money">
                        {section name=s loop=$money}
                          <option value = "{$money[s].vizitki_many}" {if $vizitkientry_info.vizitkientry_contry == $money[s].vizitkisetting_id} SELECTED{/if}>{$money[s].vizitki_many}</option>
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
                <div class="input"><label>Страна</label>
                <select name="contry" onChange = "Show_city(this.value)">
                        {section name=s loop=$country}
                          <option value = "{$country[s].vizitkisetting_id}" {if $vizitkientry_info.vizitkientry_contry == $country[s].vizitkisetting_id} SELECTED{/if}>{$country[s].vizitkisetting_country}</option>
                         {/section}
                </select></div>

                <div class="input"><label>Город</label>
                <div id="countydiv"></div>
                <select name="city" id = "city_show">
                    {section name=s loop=$city}
                        <option {if $vizitkientry_info.vizitkientry_city == $city[s]} SELECTED{/if}>{$city[s]}</option>
                    {/section}
                </select>
                </div>
                <span class="button2"><span class="l">&nbsp;</span><span class="c"><input type="button" value="Сохранить" onClick = "checkparam()" name="save" /></span><span class="r">&nbsp;</span></span>
                <input type='hidden' name='task' value='dosave'>
            </form>
</div>
{include file='footer.tpl'}