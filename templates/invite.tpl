{include file='header.tpl'}
{* $Id: invite.tpl 8 2009-01-11 06:02:53Z john $ *}


  <div id="form_auth" {*style='display: none'*}>
    <form action='' method='POST' onSubmit='my_invite(); return false;' target='ajaxframe'>

            <div class="input">
                 <label>Получатель</label>
                        <input type = "text" name="invite_emails" id="invite_emails" rows='2' cols='45'  onfocus="if (this.value == 'Введите электронную почту') this.value ='';this.style.color='#7f7f7f';" onblur="if (this.value == '') this.value='Введите электронную почту';this.style.color='#7f7f7f';"  value = "Введите электронную почту" color='#7f7f7f';>
              </div>

            <div class="input">
               <textarea rows="3" cols="10" name="invite_message" id="invite_message" onfocus="if (this.value == 'Введите ваше сообщение') this.value ='';this.style.color='#7f7f7f';" onblur="if (this.value == '') this.value='Введите ваше сообщение';this.style.color='#7f7f7f';" >Введите ваше сообщение</textarea>
            </div>

                <div class="button"><span class="button2"><span class="l">&nbsp;</span><span class="c">
				<input type="submit" value="{lang_print id=728}" name="send"  />
			</span><span class="r">&nbsp;</span></span>
                </div>
              
               <input type='hidden' name='task' value='doinvite'>
          </form>

{literal}
<script type="text/javascript">
function my_invite() {
	$.post(
		"invite.php",
		{ invite_emails: $('#invite_emails').attr('value') , invite_message: $('#invite_message').attr('value'),task:'doinvite' },
		function(data) {
		$('#invite_show_b').html('<h1>' + data + '</h1>');
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
</div>
