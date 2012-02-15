{* INCLUDE HEADER CODE *}
{include file="header_global.tpl"}

{* $Id: user_messages_new.tpl 235 2009-11-13 04:30:39Z phil $ *}


<br />
<!-- il -->

  {* JAVASCRIPT FOR CREATING SUGGESTION BOX *}
{*
  {literal}
  <script type="text/javascript">
  <!-- 
  var tos = new Array();
  window.addEvent('domready', function(){
	var options = {
		script:"misc_js.php?task=suggest_friend&limit=5&",
		varname:"input",
		json:true,
		shownoresults:false,
		maxresults:5,
		blurtrigger:true,
		callback: function (obj) {
		  {/literal}{if $setting.setting_username}obj.id = obj.value;{/if}{literal}
		  if(obj.id != '' && tos.indexOf(obj.id) == -1 && tos.length < {/literal}{$user->level_info.level_message_recipients}{literal}) { checkUser(obj); } else { $('to_display').value = ''; }
		}
	};
	var as_json = new bsn.AutoSuggest('to_display', options);

	{/literal}{if $to_user != ""}{literal}
	  tos.splice(tos.length, 0, '{/literal}{$to_id}{literal}');
	  var newDiv = document.createElement('div');
	  newDiv.id = 'to_{/literal}{$to_id}{literal}';
	  newDiv.innerHTML = "{/literal}{$to_user}{literal}<img src='./images/icons/action_delete2.gif' class='icon' style='cursor:pointer;' onClick='removeTo(\"{/literal}{$to_id}{literal}\")' border='0'>";
	  $('tos').insertBefore(newDiv, $('to_display'));
	{/literal}{/if}{literal}
  });
  window.addEvent('load', function(){
	setTimeout("{/literal}{if $to_user == ""}$('to_display').focus();{else}$('subject').focus();{/if}{literal}", "300");
  });
  function addTo(obj) {
    tos.splice(tos.length, 0, obj.id);
    var newDiv = document.createElement('div');
    newDiv.id = 'to_'+obj.id;
    newDiv.innerHTML = obj.value+"<img src='./images/icons/action_delete2.gif' class='icon' style='cursor:pointer;' onClick='removeTo(\""+obj.id+"\")' border='0'>";
    $('tos').insertBefore(newDiv, $('to_display'));
    $('to_display').value = '';
  }
  function removeTo(id) {
    tos.splice(tos.indexOf(id), 1);
    $('tos').removeChild($('to_'+id));
  }
  function fillToIds() {
    $('to').value = tos.join(';');
  }
  function checkUser(obj) {
    var url = 'misc_js.php?task={/literal}{if $user->level_info.level_message_allow == 1}check_friend{else}check_user{/if}{literal}&input='+obj.id;
    var request = new Request.JSON({secure: false, url: url,
		onComplete: function(jsonObj) {
			if(jsonObj.user_exists == 1) {
			  addTo(obj);
			} else {
			  $('to_display').value = '';
			}
		}
    }).send();
  }

  // THIS FUNCTION PREVENTS THE ENTER KEY FROM SUBMITTING THE FORM
  function noenter(e) { 
	if (window.event) keycode = window.event.keyCode;
	else if (e) keycode = e.which;
	if(keycode == 13) {
	  return false;
	}
  }

  // THIS FUNCTION SHOWS THE ERROR OR SUCCESS MESSAGE
  function messageSent(is_error, error_message) {
    if(is_error != 0) {
      $('error_div').style.display = 'block';
      $('error_message').innerHTML = error_message;
    } else {
      $('form_div').style.display = 'none';
      $('success_div').style.display = 'block';
      setTimeout("window.parent.TB_remove();", "1000");
    }
  }
  //-->
  </script>
  {/literal}
*}

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

<form action='' method='POST' target='ajaxframe' onSubmit='my_sender(); return false;'><!-- user_messages_new.php -->
	<div style="float:left;width:118px; margin-right:17px; overflow:hidden;">
		<a target='_blank' href="{$url->url_create('profile',$user->user_info.user_username)}" title="{$user->user_displayname}">

<!--			<img src="{$user->user_photo("./images/no_photo.gif")}" alt="" />-->
		</a>
	</div>
            <!--
			<div class="input"><label>Получатель</label><input type="text" value="Введите имя или электронную почту" name="name"  /></div>
            <div class="input"><label>Тема</label><input type="text" value="" /></div>
            <div class="clear"></div>
            <div class="input">
<textarea rows="3" cols="10" name="text" onblur="if (this.value == '') {this.value='Введите ваше сообщение';this.style.color='#7f7f7f';}">Введите ваше сообщение</textarea></div>
            <div class="button"><span class="button2"><span class="l">&nbsp;</span><span class="c">
				<input type="submit" value="Отправить" name="send"  />
			</span><span class="r">&nbsp;</span></span></div>
			-->		
			<!-- {lang_print id=601} -->
 
<div class="input"><label>Получатель<!-- {lang_print id=790} кому --></label>
<input onfocus="if (this.value == 'Введите имя') this.value =''; if (this.value == 'Введите имя')  this.style.color='#000';"  onblur="if (this.value == '') this.value='Введите имя'; if (this.value == '')  this.style.color='#7f7f7f';" value="Введите имя" type='text' name='to_display' id='to_display' />
</div>
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
 
<div class="input"><label>{lang_print id=520}<!-- Тема --></label><input type='text' class='text' name='subject' id='subject' value='{$subject}' /></div>
<div class="clear"></div>


<div class="input"><textarea onblur="if (this.value == '') this.value='{lang_print id=831}'; if (this.value == '') this.style.color='#7f7f7f';"  onfocus="if (this.value == '{lang_print id=831}') this.value =''; if (this.value == '{lang_print id=831}') this.style.color='#000';" rows='3' cols='10' id='message' name='message'>{if strlen($message)}{$message}{/if}{if !strlen($message)}{lang_print id=831}{/if}</textarea></div>
<div class="button"><span class="button2"><span class="l">&nbsp;</span><span class="c"><input type='submit' class='button' value='{lang_print id=38}' /></span><span class="r">&nbsp;</span></span></div>
<input type='hidden' name='task' value='send' />

</form>
{literal}
<script type="text/javascript">
function my_sender() {
	//$.post({ 'user_messages_new.php', { name: "John", time: "2pm" }, alert('ok'), dataType: html });
	$.post(
		"user_messages_new.php", 
		{ task: 'send' , to: $('#to_display').attr('value'), subject: $('#subject').attr('value') , message: $('#message').attr('value') },
		function(data) {
			//$('.w_t').hide();
			$('#add_msg_b').html('<h1>' + data + '</h1>');
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