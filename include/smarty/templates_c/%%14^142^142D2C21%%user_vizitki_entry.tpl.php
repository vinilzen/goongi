<?php /* Smarty version 2.6.14, created on 2011-12-23 18:17:57
         compiled from user_vizitki_entry.tpl */
?><?php
SELanguage::load();
?><?php echo '
<script type="text/javascript">
function handleFiles(file){
         document.getElementById(\'p_img\').innerHTML=\'\';
 var data = file.get(0).files.item(0).getAsDataURL(); // Получаем содержимое файла
alert(data);
        // for(var i=0;i<files.length;i++){
       //          var f = files[i];

        //          if(f.type.indexOf(\'p_img\')==0){
        //                         var img = document.createElement(\'img\');
        ///                         img.src = f.getAsDataURL();
	//				img.style.width=\'300px\';
         //                        document.getElementById(\'p_img\').appendChild(img);
       //          }
       //  }
}
</script>
'; 
 $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<h1>Создать визитку</h1>
            <div class="crumb">
                <a href="#">Главная</a>
                <a href="#">Профиль</a>
                <span> <?php if (! empty ( $this->_tpl_vars['vizitkientry_info']['vizitkientry_id'] )): ?>Редактировать визитку<?php else: ?>Создать визитку<?php endif; ?></span>
            </div>
            <div class="form edit">
            <div class="pred">

                <h2>Предпросмотр</h2>
                <strong id = "p_name"><?php if (! ( empty ( $this->_tpl_vars['vizitkientry_info']['vizitkientry_title'] ) )): 
 echo $this->_tpl_vars['vizitkientry_info']['vizitkientry_title']; 
 endif; ?></strong>
                <span id = "p_categor"><?php if (! empty ( $this->_tpl_vars['vizitkientry_info']['vizitkientry_category'] )): 
 echo $this->_tpl_vars['vizitkientry_info']['vizitkientry_category']; 
 endif; ?></span>
                <p ><img  id = "p_img" src="<?php if (! empty ( $this->_tpl_vars['vizitkientry_info']['vizitkientry_price'] )): ?>uploads_vizitki/<?php echo $this->_tpl_vars['vizitkientry_info']['vizitkientry_id']; ?>
vizitki_thumb.jpg<?php else: ?>images/6.jpg<?php endif; ?>" alt="" /></p>
                <p id = "p_body"><?php if (! empty ( $this->_tpl_vars['vizitkientry_info']['vizitkientry_body'] )): 
 echo $this->_tpl_vars['vizitkientry_info']['vizitkientry_body']; 
 endif; ?><br />
                <strong id = "p_price"><?php if (! empty ( $this->_tpl_vars['vizitkientry_info']['vizitkientry_price'] )): 
 echo $this->_tpl_vars['vizitkientry_info']['vizitkientry_price']; 
 endif; ?></strong></p>
                <p id = "p_email"><?php if (! empty ( $this->_tpl_vars['vizitkientry_info']['vizitkientry_email'] )): 
 echo $this->_tpl_vars['vizitkientry_info']['vizitkientry_email']; 
 endif; ?><br /></p>
                <p id = "p_telephon"><?php if (! empty ( $this->_tpl_vars['vizitkientry_info']['vizitkientry_telephon'] )): 
 echo $this->_tpl_vars['vizitkientry_info']['vizitkientry_telephon']; 
 endif; ?><br /></p>
                <a href="#"><p id = "p_site"><?php if (! empty ( $this->_tpl_vars['vizitkientry_info']['vizitkientry_site'] )): 
 echo $this->_tpl_vars['vizitkientry_info']['vizitkientry_site']; 
 endif; ?><br /></a></p>

            </div>
            <h2>Создание объявления</h2>
            <form action="user_vizitki_entry.php" method="post" name="edit_profil" enctype="multipart/form-data">

            <?php if (! empty ( $this->_tpl_vars['vizitkientry_info']['vizitkientry_id'] )): ?>
                <input type='hidden' name='vizitkientry_id' value='<?php echo $this->_tpl_vars['vizitkientry_info']['vizitkientry_id']; ?>
' />
            <?php endif; ?>
                <div class="input"><label>Название услуги</label>
                <input type="text" OnChange = "$('#name_v').attr('value',this.value); $('#p_name').text(this.value); " value="<?php if (! empty ( $this->_tpl_vars['vizitkientry_info']['vizitkientry_title'] )): 
 echo $this->_tpl_vars['vizitkientry_info']['vizitkientry_title']; 
 endif; ?>" id = "name_v" name="name" /></div>
                <div class="input"><label>Категория</label>
                <select  OnChange = "$('#p_categor').text(this.options[this.selectedIndex].value);" name="categor">
                    <?php unset($this->_sections['s']);
$this->_sections['s']['name'] = 's';
$this->_sections['s']['loop'] = is_array($_loop=$this->_tpl_vars['sett']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['s']['show'] = true;
$this->_sections['s']['max'] = $this->_sections['s']['loop'];
$this->_sections['s']['step'] = 1;
$this->_sections['s']['start'] = $this->_sections['s']['step'] > 0 ? 0 : $this->_sections['s']['loop']-1;
if ($this->_sections['s']['show']) {
    $this->_sections['s']['total'] = $this->_sections['s']['loop'];
    if ($this->_sections['s']['total'] == 0)
        $this->_sections['s']['show'] = false;
} else
    $this->_sections['s']['total'] = 0;
if ($this->_sections['s']['show']):

            for ($this->_sections['s']['index'] = $this->_sections['s']['start'], $this->_sections['s']['iteration'] = 1;
                 $this->_sections['s']['iteration'] <= $this->_sections['s']['total'];
                 $this->_sections['s']['index'] += $this->_sections['s']['step'], $this->_sections['s']['iteration']++):
$this->_sections['s']['rownum'] = $this->_sections['s']['iteration'];
$this->_sections['s']['index_prev'] = $this->_sections['s']['index'] - $this->_sections['s']['step'];
$this->_sections['s']['index_next'] = $this->_sections['s']['index'] + $this->_sections['s']['step'];
$this->_sections['s']['first']      = ($this->_sections['s']['iteration'] == 1);
$this->_sections['s']['last']       = ($this->_sections['s']['iteration'] == $this->_sections['s']['total']);
?>
                             <option value = "<?php echo $this->_tpl_vars['sett'][$this->_sections['s']['index']]['vizitkisetting_category']; ?>
" <?php if ($this->_tpl_vars['vizitkientry_info']['vizitkientry_category'] == $this->_tpl_vars['sett'][$this->_sections['s']['index']]['vizitkisetting_category']): ?> SELECTED<?php endif; ?>><?php echo $this->_tpl_vars['sett'][$this->_sections['s']['index']]['vizitkisetting_category']; ?>
</option>
                    <?php endfor; endif; ?>
                </select>
                </div>
                <div class="input file_v">
                <label>Изображение</label>
                <div class="fakeupload">
                <input type="file" onchange="this.form.fakeupload.value = this.value; " class="realupload2" id="realupload2" size="1" name="upload2" />
                <input type="text" class="inpupload" value="" name="fakeupload" /></div>
                    <p>Обратите внимание, что все изображения должны соответствовать <a href="#">Правилам размещения</a> рекламных объявлений. </p>
                </div>
                <div class="input"><label>Описание</label>
                <textarea OnChange = "$('#p_body').text(this.value);" rows="3" cols="10" name="desc"><?php if (! empty ( $this->_tpl_vars['vizitkientry_info']['vizitkientry_body'] )): 
 echo $this->_tpl_vars['vizitkientry_info']['vizitkientry_body']; 
 endif; ?></textarea>
                <p>Осталось символов: 5</p></div>

                <div class="input"><label>Цена</label>
                <input type="text" OnChange = "$('#p_price').text(this.value);" value="<?php if (! empty ( $this->_tpl_vars['vizitkientry_info']['vizitkientry_price'] )): 
 echo $this->_tpl_vars['vizitkientry_info']['vizitkientry_price']; 
 endif; ?>" name="cena" /></div>

                <div class="input"><label>Телефон</label>
                <input type="text"  OnChange = "$('#p_telephon').text(this.value);" value="<?php if (! empty ( $this->_tpl_vars['vizitkientry_info']['vizitkientry_telephon'] )): 
 echo $this->_tpl_vars['vizitkientry_info']['vizitkientry_telephon']; 
 endif; ?>" name="phone" /></div>

                <div class="input"><label>Эл. почта</label>
                <input type="text" OnChange = "$('#p_email').text(this.value);" value="<?php if (! empty ( $this->_tpl_vars['vizitkientry_info']['vizitkientry_email'] )): 
 echo $this->_tpl_vars['vizitkientry_info']['vizitkientry_email']; 
 endif; ?>" name="mail" /></div>

                <div class="input"><label>Ссылка на сайт</label>
                <input type="text"  OnChange = "$('#p_site').text(this.value);" value="<?php if (! empty ( $this->_tpl_vars['vizitkientry_info']['vizitkientry_site'] )): 
 echo $this->_tpl_vars['vizitkientry_info']['vizitkientry_site']; 
 endif; ?>" name="link" /></div>

                <h2>Выбор региона трансляции</h2>
                <div class="input"><label>Страна</label>
                <select name="contry">
                        <?php unset($this->_sections['s']);
$this->_sections['s']['name'] = 's';
$this->_sections['s']['loop'] = is_array($_loop=$this->_tpl_vars['sett']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['s']['show'] = true;
$this->_sections['s']['max'] = $this->_sections['s']['loop'];
$this->_sections['s']['step'] = 1;
$this->_sections['s']['start'] = $this->_sections['s']['step'] > 0 ? 0 : $this->_sections['s']['loop']-1;
if ($this->_sections['s']['show']) {
    $this->_sections['s']['total'] = $this->_sections['s']['loop'];
    if ($this->_sections['s']['total'] == 0)
        $this->_sections['s']['show'] = false;
} else
    $this->_sections['s']['total'] = 0;
if ($this->_sections['s']['show']):

            for ($this->_sections['s']['index'] = $this->_sections['s']['start'], $this->_sections['s']['iteration'] = 1;
                 $this->_sections['s']['iteration'] <= $this->_sections['s']['total'];
                 $this->_sections['s']['index'] += $this->_sections['s']['step'], $this->_sections['s']['iteration']++):
$this->_sections['s']['rownum'] = $this->_sections['s']['iteration'];
$this->_sections['s']['index_prev'] = $this->_sections['s']['index'] - $this->_sections['s']['step'];
$this->_sections['s']['index_next'] = $this->_sections['s']['index'] + $this->_sections['s']['step'];
$this->_sections['s']['first']      = ($this->_sections['s']['iteration'] == 1);
$this->_sections['s']['last']       = ($this->_sections['s']['iteration'] == $this->_sections['s']['total']);
?>
                          <option <?php if ($this->_tpl_vars['vizitkientry_info']['vizitkientry_contry'] == $this->_tpl_vars['sett'][$this->_sections['s']['index']]['vizitkisetting_country']): ?> SELECTED<?php endif; ?>><?php echo $this->_tpl_vars['sett'][$this->_sections['s']['index']]['vizitkisetting_country']; ?>
</option>
                         <?php endfor; endif; ?>
                </select></div>

                <div class="input"><label>Город</label>
                <select name="city">
                    <?php unset($this->_sections['s']);
$this->_sections['s']['name'] = 's';
$this->_sections['s']['loop'] = is_array($_loop=$this->_tpl_vars['sett']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['s']['show'] = true;
$this->_sections['s']['max'] = $this->_sections['s']['loop'];
$this->_sections['s']['step'] = 1;
$this->_sections['s']['start'] = $this->_sections['s']['step'] > 0 ? 0 : $this->_sections['s']['loop']-1;
if ($this->_sections['s']['show']) {
    $this->_sections['s']['total'] = $this->_sections['s']['loop'];
    if ($this->_sections['s']['total'] == 0)
        $this->_sections['s']['show'] = false;
} else
    $this->_sections['s']['total'] = 0;
if ($this->_sections['s']['show']):

            for ($this->_sections['s']['index'] = $this->_sections['s']['start'], $this->_sections['s']['iteration'] = 1;
                 $this->_sections['s']['iteration'] <= $this->_sections['s']['total'];
                 $this->_sections['s']['index'] += $this->_sections['s']['step'], $this->_sections['s']['iteration']++):
$this->_sections['s']['rownum'] = $this->_sections['s']['iteration'];
$this->_sections['s']['index_prev'] = $this->_sections['s']['index'] - $this->_sections['s']['step'];
$this->_sections['s']['index_next'] = $this->_sections['s']['index'] + $this->_sections['s']['step'];
$this->_sections['s']['first']      = ($this->_sections['s']['iteration'] == 1);
$this->_sections['s']['last']       = ($this->_sections['s']['iteration'] == $this->_sections['s']['total']);
?>
                        <option <?php if ($this->_tpl_vars['vizitkientry_info']['vizitkientry_city'] == $this->_tpl_vars['sett'][$this->_sections['s']['index']]['vizitkisetting_city']): ?> SELECTED<?php endif; ?>><?php echo $this->_tpl_vars['sett'][$this->_sections['s']['index']]['vizitkisetting_city']; ?>
</option>
                    <?php endfor; endif; ?>
                </select>
                </div>
                <div class="button"><span class="button2"><span class="l">&nbsp;</span><span class="c"><input type="submit" value="Сохранить" name="save" /></span><span class="r">&nbsp;</span></span></div>
                <input type='hidden' name='task' value='dosave'>
            </form>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>