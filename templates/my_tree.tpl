﻿{include file="header_global.tpl"}
<div id="content">
    <!--HEAD-->
    <div class="head">
        <div class="fix">
            <div class="logo"><a href="/"><img src="/images/logo.png" alt="" /></a></div>
            <ul class="menu">
                <li><a href="/search.php">{lang_print id=200}<!-- Поиск --></a></li>
                <li><a href="/invite.php">{lang_print id=647}<!-- Пригласить --></a></li>
                <li><a href="#">{lang_print id=6000144}<!-- Подарки --></a></li>
                <li><a href="#"><span>{lang_print id=687}<!-- Язык --></span></a></li>
                <li>
				{if $user->user_exists != 0}
					<form method="POST" id="user_logout" action="user_logout.php" style="display:inline;margin:0;">
						<input type="hidden" name="token" value="{$token}" />
						<a href="#" onclick="$('#user_logout').submit(); return false;">{lang_print id=6000147}<!-- выйти --></a>
					</form>
				{else}
					<a href="/login.php">{lang_print id=6000145}<!-- войти --></a>
				{/if}
				</li>
            </ul>
        </div>
	</div>
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
})
</script>
{/literal}
</body>
</html>