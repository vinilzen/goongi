{* INCLUDE HEADER CODE *}
{include file="header_global.tpl"}

{* $Id: user_messages_new.tpl 235 2009-11-13 04:30:39Z phil $ *}


<br />
<!-- il -->

   <div id='success_div' style='display: none;'><br>{lang_print id=804}</div>

  <div id='form_div'>
  <div style='text-align:left; padding-left: 10px;'>
 <!--  {lang_sprintf id=789 1=$user->level_info.level_message_recipients} -->

  {* SHOW ERRORS *}
  <div id='error_div' style='display: none;'>
    <br>
    <table cellpadding='0' cellspacing='0'>
    <tr><td class='error'>
      <span id='error_message'></span>
    </td></tr>
    </table>
  </div>
  </div>

<form action=' method='POST' onSubmit='my_sender(); return false;' target='ajaxframe'><!-- user_messages_new.php -->
	<div style="float:left;width:118px; margin-right:17px; overflow:hidden;">
		<a target='_blank' href="{$url->url_create('profile',$user->user_info.user_username)}" title="{$user->user_displayname}">
			<div id= "picture_gif"></div>
		</a>
	</div>
            <!--
           {* <div class="input"><label>Получатель</label><input type="text" value="Введите имя или электронную почту" name="name"  /></div>*}
           
            <div class="clear"></div>
            <div class="input">
            <textarea rows="3" cols="10" name="text" onblur="if (this.value == '') {this.value='Введите ваше сообщение';this.style.color='#7f7f7f';}">Введите ваше сообщение</textarea></div>
            <div class="button"><span class="button2"><span class="l">&nbsp;</span><span class="c">
				<input type="submit" value="Отправить" name="send"  />
			</span><span class="r">&nbsp;</span></span></div>
			-->
			<!-- {lang_print id=601} -->
                
                <label>Получатель</label>
                        <select name='to_display' id='to_display'>
                                  <option value="0">{lang_print id=80000033}</option>
                          {section name=friend_loop loop=$friends}
                                  <option value="{$friends[friend_loop]->user_info.user_id}">{$friends[friend_loop]->user_displayname}</option>
                           {/section}
                        </select>
               
{*<div class="input"><label>Получатель<!-- {lang_print id=790} кому --></label>
<input onfocus="if (this.value == 'Введите имя') this.value =''; if (this.value == 'Введите имя')  this.style.color='#000';"  onblur="if (this.value == '') this.value='Введите имя'; if (this.value == '')  this.style.color='#7f7f7f';" value="Введите имя" type='text' name='to_display' id='to_display' />
</div>*}
<input type='hidden' name='to' id='to' value='' />
{literal}
<script type="text/javascript">
	var options, a;
	$(function(){
	  options = { serviceUrl:'users.php' };
	  a = $('#to_display').autocomplete(options);
	});
</script>
{/literal}


<div class="clear"></div>


<div class="input"><textarea onblur="if (this.value == '') this.value='{lang_print id=831}'; if (this.value == '') this.style.color='#7f7f7f';"  onfocus="if (this.value == '{lang_print id=831}') this.value =''; if (this.value == '{lang_print id=831}') this.style.color='#000';" rows='3' cols='10' id='message' name='message'>{if strlen($message)}{$message}{/if}{if !strlen($message)}{lang_print id=831}{/if}</textarea></div>
<div class="button"><span class="button2"><span class="l">&nbsp;</span><span class="c"><input type='submit' class='button' value='{lang_print id=38}' /></span><span class="r">&nbsp;</span></span></div>
<input type='hidden' name='task' value='send' />

</form>
{literal}
<script type="text/javascript">
function my_sender() {
	$.post(
		"mf_gifts_send_message.php",
		{ gift_id: $('#id_g').attr('value'), to: $('#to_display').attr('value'), subject: $('#subject').attr('value') , message: $('#message').attr('value'),task:'send',private:'0' },
		function(data) {
		$('#add_msg_b_g').html('<h1>' + data + '</h1>');
			setTimeout ( function() {
				$('#popup').fadeOut(300);
				$('.window').hide();
				e.preventDefault();
			}, 1500);
		}
	);
}
</script>
{/literal}

</div>


</body>
</html>