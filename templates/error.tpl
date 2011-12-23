{include file='header_global.tpl'}

{* $Id: error.tpl 8 2009-01-11 06:02:53Z john $ *}

<div id="content" class="page404">
	<div class="fix">
		<div class="page_404">
			<div class="w_c">
				<h1>упс! ОШИБКА 404</h1>
				<p>{lang_print id=$error_message}</p>
				<p>Если вы уверены, что эта страница тут была, <a href="mailto:{$email_admin}">напишите нам</a>, указав адрес страницы.</p>
				<p><a href="/">Вернуться главную страницу</a></p>
			</div>
		</div>
	</div>
	<div id="clearfooter"></div>
</div>
{include file='footer_only.tpl'}


