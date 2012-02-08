{include file="header_global.tpl"}
<div id="content">
    <!--HEAD-->
   <!-- <div class="head">-->
    <!--    <div class="fix">-->
    <!--        <div class="logo"><a href="/"><img src="/images/logo.png" alt="" /></a></div>-->
    <!--        <ul class="menu">-->
     <!--           <li><a href="/search.php">{lang_print id=200}</a></li>--> <!-- Поиск -->
     <!--           <li><a href="/invite.php">{lang_print id=647}</a></li>--> <!-- Пригласить -->
      <!--          <li><a href="#">{lang_print id=6000144}</a></li>--> <!-- Подарки -->
      <!--          <li><a href="#"><span>{lang_print id=687}</span></a></li>--><!-- Язык -->
     <!--           <li>-->
	<!--			{if $user->user_exists != 0}-->
	<!--				<form method="POST" id="user_logout" action="user_logout.php" style="display:inline;margin:0;">-->
	<!--					<input type="hidden" name="token" value="{$token}" />-->
	<!--					<a href="#" onclick="$('#user_logout').submit(); return false;">{lang_print id=6000147}</a>--><!-- выйти -->
	<!--				</form>-->
	<!--			{else}-->
	<!--				<a href="/login.php">{lang_print id=6000145}</a>--><!-- войти -->
	<!--			{/if}-->
	<!--			</li>-->
      <!--      </ul>-->
     <!--   </div>-->
<!--	</div>-->
    <!--END HEAD-->

<iframe id="tree" src="/tree.php{$owner_link}" frameborder="0" scrolling="no" width="100%"></iframe>
{literal}
<script type="text/javascript">
$(function() {
	function resize() {
		$('#tree').height( $(window).height() - $('#content').children('.head').height() )
	};
	resize();
	$(window).resize(resize);
	$(".foo2").carousel({ 
			autoSlide: false,
			animSpeed: 500,
			loop: true, 
			pagination: false,
			autoSlideInterval: 1000
	});
	$('#print_tree_w').hide();
})


</script>
{/literal}

<div id="popup"></div>

<div class="window rezina" id="print_tree_w">
	<div class="close"></div>
	<div class="w_t" id = "w_t"></div>
<div class="w_m" id = "w_m"></div>
	<div class="w_c" id = "w_c">
    	<h1>печать семейного холста</h1>
        <div class="crumb"><a href="#">Главная</a><a href="my_tree.php">Дерево</a><span>Печать</span></div>
      <!--  <div class="r_link"><a href="#" class="ico2">&nbsp;</a></div>-->
        <ul class="vk">
            <li class="active"><a href="#">Новый холст</a></li>
        </ul>
        <ul class="step">
        	<li class="st">
            	<div class="num">1</div>
                <div class="plans">
                	<div class="plan_big">
                    	<div class="plan_c" id="p1">
                        	<img src="images/tb1.jpg" alt="" /><p>График "Бабочка" отображает исходную персону в центре возле супруга(-и), их предков по сторонам и их детей внизу. Он прекрасно подходит для того, чтобы повесить его на стену, благодаря его размерам и симметричному отображению.</p>
                        </div>
                    	<div class="plan_c" id="p2">
                        	<img src="images/tb2.jpg" alt="" /><p>График "Бабочка" отображает исходную персону в центре возле супруга(-и), их предков по сторонам и их детей внизу. Он прекрасно подходит для того, чтобы повесить его на стену, благодаря его размерам и симметричному отображению.</p>
                        </div>
                    	<div class="plan_c" id="p3">
                        	<img src="images/tb3.jpg" alt="" /><p>График "Бабочка" отображает исходную персону в центре возле супруга(-и), их предков по сторонам и их детей внизу. Он прекрасно подходит для того, чтобы повесить его на стену, благодаря его размерам и симметричному отображению.</p>
                        </div>
                    </div>
                    <div class="plan_sm">
                    	<a href="#" class="active" id="sm1"><span>&nbsp;</span><img src="images/ts1.jpg" alt="" /></a>
                    	<a href="#" id="sm2"><span>&nbsp;</span><img src="images/ts2.jpg" alt="" /></a>
                    	<a href="#" id="sm3"><span>&nbsp;</span><img src="images/ts3.jpg" alt="" /></a>
                    </div>
                </div>
            	<h2>Тип графика</h2>
                <div class="radio">
                    <label><input type="radio" value="Бабочка" name="type" /><span>Бабочка</span></label>
                    <label><input type="radio" value="Близкие родственники" name="type" /><span>Близкие родственники</span></label>
                    <label><input type="radio" value="Предки" name="type" /><span>Предки</span></label>
                    <label><input type="radio" value="Потомки" name="type" /><span>Потомки</span></label>
                    <label><input type="radio" value="Песочные часы" name="type" /><span>Песочные часы</span></label>
                </div>
            
            </li>
            <li class="st">
            	<div class="num">2</div>
            	<h2>Стиль графика</h2>
                <div class="foo2">
                    <ul>
                        <li><a onclick = "($('#stil').val($(this).attr('title')))" title = "images/t1.jpg" ><img src="images/t1.jpg" alt="" /></a></li>
                        <li><a onclick = "($('#stil').val($(this).attr('title')))" title = "images/t2.jpg" ><img src="images/t2.jpg" alt="" /></a></li>
                        <li><a onclick = "($('#stil').val($(this).attr('title')))" title = "images/t3.jpg"><img src="images/t3.jpg" alt="" /></a></li>
                        <li><a onclick = "($('#stil').val($(this).attr('title')))" title = "images/t1.jpg"><img src="images/t1.jpg" alt="" /></a></li>
                        <li><a onclick = "($('#stil').val($(this).attr('title')))" title = "images/t2.jpg"><img src="images/t2.jpg" alt="" /></a></li>
                        <li><a onclick = "($('#stil').val($(this).attr('title')))" title = "images/t3.jpg"><img src="images/t3.jpg" alt="" /></a></li>
                        <input type = "hidden" value = "" id = "stil">
                   </ul>
                </div>
            </li>
            <li class="st">
            	<div class="num">3</div>
            	<h2>Настройки</h2>
                <div class="form add_w">
                    <div class="input"><label>Исходное лицо</label><input type="text" value="" name="name"  id ="name" /></div>
                    <div class="input"><label>Заголовок</label><input type="text" value="" name="title" id="title" /></div>
                    <div class="input"><label>Личная инфориация</label><input type="text" value="" name="inf" id="inf" /></div>
                    <div class="radio"><label>Поколения</label>
                        <label><input type="radio" value="1" name="po" /><span>Показывать все поколения</span></label>
                        <label style="float:left;"><input type="radio" value="" name="po" id = "po"/><span>Ограничить количество поколений до</span></label>
                        <select name="kol" onChange = "$('#po').val(this.value)">
                                    <option value = "Ограничить количество поколений до 1">1</option>
                                    <option value = "Ограничить количество поколений до 2">2</option>
                                    <option value = "Ограничить количество поколений до 3">3</option>
                                    <option value = "Ограничить количество поколений до 4">4</option>
                                    <option value = "Ограничить количество поколений до 5">5</option>
                        </select>
                    </div>
                    <div class="radio"><label>Способ печати</label>
                        <label><input type="radio" value="Показывать все поколения" name="print" /><span>Показывать все поколения</span></label>
                        <label><input type="radio" value="Одна страница - для печати большого плаката" name="print" /><span>Одна страница - для печати большого плаката</span></label>
                    </div>
                    <span class="button2">
                    <span class="l">&nbsp;</span><span class="c">
                    <input type="button" value="Создать дерево" name="creat" onClick = "print_tree({$user->user_info.user_id})" />
                    </span><span class="r">&nbsp;</span></span>
                    <button type="reset" class="reset" name="reset">Очистить настройки</button>
                </div>
            </li>
        </ul>
    </div>
	<div class="w_b"></div>
</div>

</body>
</html>