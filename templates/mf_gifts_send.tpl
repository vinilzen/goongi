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
  {* DISPLAY PAGINATION MENU IF APPLICABLE *}
 {* DISPLAY PAGINATION MENU IF APPLICABLE *}
  {if $maxpage > 1}
    <div align='center'>
      {if $p != 1}<a href='mf_gifts_send.php?p={math equation='p-1' p=$p}{$tl}{$to}'>&#171; {lang_print id=182}</a>{else}<font class='disabled'>&#171; {lang_print id=182}</font>{/if}
      {if $p_start == $p_end}
        &nbsp;|&nbsp; {lang_sprintf id=184 1=$p_start 2=$total_vars} &nbsp;|&nbsp;
      {else}
        &nbsp;|&nbsp; {lang_sprintf id=185 1=$p_start 2=$p_end 3=$total_vars} &nbsp;|&nbsp;
      {/if}
      {if $p != $maxpage}<a href='mf_gifts_send.php?p={math equation='p+1' p=$p}{$tl}{$to}'>{lang_print id=183} &#187;</a>{else}<font class='disabled'>{lang_print id=183} &#187;</font>{/if}
      </div>
  {/if}
 {include file='footer.tpl'}


