{* INCLUDE HEADER CODE *}
{include file="header.tpl"}
  <h1>подарки</h1>
    <div class="crumb">
        <a href="#">Главная</a>
        <a href="{$url->url_create("profile", $user->user_info.user_username)}">Профиль</a>
        <span>Подарки</span>
    </div>
    <div class="buttons">
        <div class="show"><span>Показать:</span>
            <a href="mf_gifts_user.php?gif_change=1">Мои подарки</a>
            <a href="mf_gifts_user.php?gif_change=2">Отправленные</a>
            <a href="mf_gifts_send.php">Отправить подарок</a>
           {* <a id="add_gif" href="#">Отправить подарок</a>*}
        </div>
    </div>

<form action='mf_gifts_send.php' method='POST' target="ajaxframe">
 <div class="gifts">
        {foreach key=cid item=con from=$gift_vars}
            <a id = "{$con.id}" class = "add_gif">
                <img src="mf_gifts/{$con.id}.{$con.filetype}" alt="" />
             </a>
        {/foreach}
    </div>
</form>
</div>
  
 {include file='footer.tpl'}


