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
</div>


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
                                	<p><strong>Разработка сайтов</strong><br /><span>веб-дизайн</span></p>
                                    <div><img src="images/2.jpg" alt="" /></div>
                                    <p><font>Отличные сайты любой сложности<br /><strong>от 20.000 руб.</strong></font></p>
									<p><font>+375 (29) 571-33-72<br /><a href="http://nineseven.ru" target="_blank">http://nineseven.ru</a></font></p>
                                </div>
                            </div>
                        </div>
                        <div class="b1"><a href="#">Создать себе визитку</a></div>
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
<div class="window rezina" id="add_msg_w">
	<div class="close"></div>
	<div class="w_t">
    	<h1>Написать сообщение</h1>
    </div>
	<div class="w_c">
    	<div class="form add_w" id="add_msg_b">
        	
        </div>
    </div>
	<div class="w_b"></div>
</div>
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
</body>
</html>