<?php /* Smarty version 2.6.14, created on 2011-11-18 19:08:25
         compiled from user_messages_new.tpl */
?><?php
SELanguage::_preload_multi(804,789,601,790,520,831,38);
SELanguage::load();
?>﻿<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header_global.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>



<br />
<!-- il -->

  
  <div id='success_div' style='display: none;'><br><?php echo SELanguage::_get(804); ?></div>

  <div id='form_div'>
  <div style='text-align:left; padding-left: 10px;'>
 <!--  <?php echo sprintf(SELanguage::_get(789), $this->_tpl_vars['user']->level_info['level_message_recipients']); ?> -->

    <div id='error_div' style='display: none;'>
    <br>
    <table cellpadding='0' cellspacing='0'>
    <tr><td class='error'>
      <span id='error_message'></span>
    </td></tr>
    </table>
  </div>
  </div>

<form action='' method='POST' target='ajaxframe' onSubmit='my_sender(); return false;'><!-- user_messages_new.php -->
	<div style="float:left;width:118px; margin-right:17px; overflow:hidden;">
		<a target='_blank' href="<?php echo $this->_tpl_vars['url']->url_create('profile',$this->_tpl_vars['user']->user_info['user_username']); ?>
" title="<?php echo $this->_tpl_vars['user']->user_displayname; ?>
">
			<img src="<?php echo $this->_tpl_vars['user']->user_photo("./images/nophoto.gif"); ?>
" alt="" />
		</a>
	</div>
            <!--
			<div class="input"><label>Получатель</label><input type="text" value="Введите имя или электронную почту" name="name"  /></div>
            <div class="input"><label>Тема</label><input type="text" value="" /></div>
            <div class="clear"></div>
            <div class="input">
<textarea rows="3" cols="10" name="text" onblur="if (this.value == '') ">Введите ваше сообщение</textarea></div>
            <div class="button"><span class="button2"><span class="l">&nbsp;</span><span class="c">
				<input type="submit" value="Отправить" name="send"  />
			</span><span class="r">&nbsp;</span></span></div>
			-->		
			<!-- <?php echo SELanguage::_get(601); ?> -->
 
<div class="input"><label>Получатель<!-- <?php echo SELanguage::_get(790); ?> кому --></label>
<input onfocus="if (this.value == 'Введите имя') this.value =''; if (this.value == 'Введите имя')  this.style.color='#000';"  onblur="if (this.value == '') this.value='Введите имя'; if (this.value == '')  this.style.color='#7f7f7f';" value="Введите имя" type='text' name='to_display' id='to_display' />
</div>
<input type='hidden' name='to' id='to' value='' />
<?php echo '
<script type="text/javascript">
	var options, a;
	$(function(){
	  options = { serviceUrl:\'users.php\' };
	  a = $(\'#to_display\').autocomplete(options);
	});
</script>
'; ?>

 
<div class="input"><label><?php echo SELanguage::_get(520); ?><!-- Тема --></label><input type='text' class='text' name='subject' id='subject' value='<?php echo $this->_tpl_vars['subject']; ?>
' /></div>
<div class="clear"></div>


<div class="input"><textarea onblur="if (this.value == '') this.value='<?php echo SELanguage::_get(831); ?>'; if (this.value == '') this.style.color='#7f7f7f';"  onfocus="if (this.value == '<?php echo SELanguage::_get(831); ?>') this.value =''; if (this.value == '<?php echo SELanguage::_get(831); ?>') this.style.color='#000';" rows='3' cols='10' id='message' name='message'><?php if (strlen ( $this->_tpl_vars['message'] )): 
 echo $this->_tpl_vars['message']; 
 endif; 
 if (! strlen ( $this->_tpl_vars['message'] )): 
 echo SELanguage::_get(831); 
 endif; ?></textarea></div>
<div class="button"><span class="button2"><span class="l">&nbsp;</span><span class="c"><input type='submit' class='button' value='<?php echo SELanguage::_get(38); ?>' /></span><span class="r">&nbsp;</span></span></div>
<input type='hidden' name='task' value='send' />

</form>
<?php echo '
<script type="text/javascript">
function my_sender() {
	//$.post({ \'user_messages_new.php\', { name: "John", time: "2pm" }, alert(\'ok\'), dataType: html });
	$.post(
		"user_messages_new.php", 
		{ task: \'send\' , to: $(\'#to_display\').attr(\'value\'), subject: $(\'#subject\').attr(\'value\') , message: $(\'#message\').attr(\'value\') },
		function(data) {
			//$(\'.w_t\').hide();
			$(\'#add_msg_b\').html(\'<h1>\' + data + \'</h1>\');
			setTimeout ( function() {
				$(\'#popup\').fadeOut(300);
				$(\'.window\').hide();
				e.preventDefault();
			}, 1500);
		}
	);
}
</script>
'; ?>


</div>


</body>
</html>