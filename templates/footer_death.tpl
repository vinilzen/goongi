{* $Id: footer.tpl 62 2009-02-18 02:59:27Z john $ *}
</div></div></div>

{* SHOW RIGHT-SIDE ADVERTISEMENT BANNER *}
            <div class="left_small">
            	<div class="left_c">
					<!-- start USER MENU -->
					{include file='menu_main.tpl'}
					<!-- end USER MENU -->
        </div>
    </div>
 
{* COPYRIGHT FOOTER *}
<div id="footer">
	<div class="foot_l">
    	<div class="foot_r">
            <div class="dis">Разработка сайта  – <a href="http://www.nineseven.ru" target="_blank">Nineseven</a></div>

            <div class="copy"><span>© 2008–2011 Goongi.com</span></div>
        </div>
    </div>
</div>

{*SVECHA*}
<div id="popup"></div>
<div class="window" id="svecha_list">
	<div class="close"></div>
    <h1>Свечу памяти зажгло {$info_candle|@count} человек</h1>
	<div class="w_c">
		<ul class="friend_list_w">
            {section name=count loop=$info_candle}
                     <li>
                        <a href="{$url->url_create('profile',$info_candle[count].user_candle_name)}">
                        <img src="/uploads_user/1000/{$info_candle[count].user_candle_id}/{$info_candle[count].user_candle_photo}.jpg" alt="" /></a>
                        <a href="{$url->url_create('profile',$info_candle[count].user_candle_name)}">{$info_candle[count].user_candle_name}</a>
                    </li>
            {/section}
        </ul>
        <div class="pager">
            <a href="#" class="prev">Сюда</a><a href="#" class="active">1</a><a href="#">2</a><a href="#">3</a><a href="#">4</a><a href="#">5</a><a href="#">6</a> ... <a href="#">99</a><a href="#" class="next">Туда</a>

        </div>
        <br />
    </div>
</div>
{*SVECHA*}

</body>
</html>