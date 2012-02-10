{* $Id: footer.tpl 62 2009-02-18 02:59:27Z john $ *}
						
					</div>
				</div>
			</div>
			<div class="b"></div>
		</div>
	</div>
</div>

  {* SHOW PAGE BOTTOM ADVERTISEMENT BANNER *}
  {if $ads->ad_bottom != "" && 0}
    <div class='ad_bottom' style='display: block; visibility: visible;'>
      {$ads->ad_bottom}
    </div>
  {/if}

{* END CONTENT CONTAINER *}


{* END BODY CONTAINER *}
{* SHOW RIGHT-SIDE ADVERTISEMENT BANNER *}
{if $ads->ad_right != "" && 0}
  <div class='ad_right' width='1' style='display: table-cell; visibility: visible;'>{$ads->ad_right}</div>
{/if}
            <div class="left_small">
            	<div class="left_c">
					<!-- start USER MENU -->
					{include file='menu_main.tpl'}
					<!-- end USER MENU -->
                	<div class="block0">
                    	<div class="bg">
                        	<div class="c">
                            	<div class="rec">
                                	<p><strong>{$ads->ad_title}</strong><br /><span>{$ads->vizitkientry_category}</span></p>
                                    <div>{$ads->ad_html}</div>
                                    <p><font>{$ads->vizitkientry_body}<br /><strong>{$ads->vizitkientry_price} </strong></font></p>
									<p><font>{$ads->vizitkientry_telephon}<br /><a href="{$ads->vizitkientry_site}" target="_blank">{$ads->vizitkientry_site}</a></font></p>
                                </div>
                            </div>
                        </div>
                        <div class="b1"><a href="/user_vizitki.php">Создать себе визитку</a></div>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <div id="clearfooter"></div>	
</div>


{* END CENTERED TABLE *}
</div>

{* COPYRIGHT FOOTER *}
<!--Footer-->
<div id="footer">
	<div class="foot_l">
    	<div class="foot_r">
            <div class="dis">{lang_print id=6000146} – <a href="http://www.nineseven.ru" target="_blank">Nineseven</a></div>
            <div class="copy"><span>© 2008–2011 Goongi.com</span></div>
        </div>
    </div>
</div>
<!--/Footer-->


{* INCLUDE ANY FOOTER TEMPLATES NECESSARY *}
{hook_include name=footer}
<div id="popup"></div>
<div class="window rezina" id="add_msg_w_g">
	<div class="close"></div>
            <div class="w_t">
            <h1>Отправить подарок</h1>
             </div>
                <div class="w_c">
                <div class="form add_w_g" id="add_msg_b_g">
                </div>
                </div>
                <div class="w_b"></div>
        </div>

<div id="popup"></div>
<div id="popup2"></div>
<div class="window" id="add_group">
	<div class="close"></div>
	<div class="w_c">
    	<h1>Создать группу</h1>
        <div class="form" id="add_group_bl">
        	<div class="input">
				<label>Название группы</label>
				<input type="text" id="group_name" value="" name="" />
				<span class="button2" id="add_group1"><span class="l">&nbsp;</span><span class="c">
					<input type="submit" onclick="createGroup(); return false;" value="Создать" name="creat" />
				</span><span class="r">&nbsp;</span></span>
				<p id="msg_gr"></p>
			</div>
        </div>
    </div>
</div>

<div class="window rezina" id="add_meropriatie_w">
	<div class="close"></div>
	<div class="w_t">
    	<h1>Создать мероприятие</h1>
    </div>
	<div class="w_c">
    	<div class="form add_w">
            <div class="input"><label>Название</label>
				<input type="text" value="Введите название мероприятия" onfocus="if (this.value == 'Введите название мероприятия') this.value ='';" onblur="if (this.value == '') this.value='Введите название мероприятия';"  name="event_title" id="event_title"  />
			</div>
            <div class="input"><label>Начало</label>
				<table cellpadding="0" cellspacing="0"><tr><td>
					<span>{lang_print id=88}</span>
					<input type="text" name="event_date_start" id="event_date_start" value="" />
				</td><td>
					<span>Время</span>
					<input type="text" name="event_time_start" id="event_time_start" value="чч:мм" />
				</td></tr></table>
			</div>
			
			<div class="input"><label>Конец</label>
				<table cellpadding="0" cellspacing="0"><tr><td>
					<span>{lang_print id=88}</span>
					<input type="text" name="event_date_end" id="event_date_end" value="" />
				</td><td>
					<span>Время</span>
					<input type="text" name="event_time_end" id="event_time_end" value="чч:мм" />
				</td></tr></table>
            </div>
            <div class="input"><label>Описание</label>
				<textarea rows="3" cols="10" id="event_desc" name="event_desc" onfocus="if (this.value == 'Введите небольшое описание о мероприятии') this.value ='';" onblur="if (this.value == '') this.value='Введите небольшое описание о мероприятии';">Введите небольшое описание о мероприятии</textarea>
			</div>
			
            <div class="input"><label>{lang_print id=3000115}</label>
				<input type="text" value="" name="event_host" id="event_host"  />
			</div>
			
            <div class="radio" style="display:none;"><label>
				<input type="radio" value="1" name="rad" /><span>Повторять ежегодно<br /><small>Все пользователи могут участвовать и приглашать друзей.</small></span></label>
			</div>
            
			<div id="only_mer" style="display:none;">
				<div class="radio"><label><input type="radio" value="2" name="rad" /><span>Закрытое мероприятие<br /><small>Доступ только по приглашениям администраторов.</small></span></label></div>
				<div class="link_mer"><a href="#">Пригласить на мероприятие</a>  /  <a href="#">Удалить приглашенных</a></div>
			</div>
			
			<input type="hidden" name="event_invite" id="event_invite_1" value="1" />
			<input type="hidden" name="event_inviteonly" id="event_inviteonly_0" value="0" />
			<input type="hidden" name="event_search" id="event_search_1" value="1" />
			<input type="hidden" name="event_privacy" id="privacy_127" value="127" />
			<input type="hidden" name="event_comments" id="event_comment_127" value="127" />
			<input type="hidden" name="event_eventcat_id" id="event_eventcat_id" value="" />
			
			<div class="button">
			
            	<span class="button2"><span class="l">&nbsp;</span><span class="c">
					<input type="submit" value="Сохранить" name="save" id="add_event_submit"  />
				</span><span class="r">&nbsp;</span></span>
					
                <span class="button3"><span class="l">&nbsp;</span><span class="c">
					<input type="submit" value="Отменить" name="cancel" id="cancel" />
				</span><span class="r">&nbsp;</span></span>
					
            </div>
        </div>
    </div>
	<div class="w_b"></div>
</div>

</body>
</html>