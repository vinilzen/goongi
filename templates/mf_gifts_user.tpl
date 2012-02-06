{include file='header.tpl'}
    <h1>подарки</h1>
    <div class="crumb">
        <a href="#">Главная</a>
        <a href="{$url->url_create("profile", $user->user_info.user_username)}">Профиль</a>
        <span>Подарки</span></div>
    <div class="buttons">
        <div class="show"><span>Показать:</span>
            <a href="mf_gifts_user.php?gif_change=1">Мои подарки</a>
            <a href="mf_gifts_user.php?gif_change=2">Отправленные</a>
            <a href="mf_gifts_send.php">Отправить подарок</a>
           {* <a id="add_gif" href="#">Отправить подарок</a>*}
        </div>

    </div>
{if $flag == 1}

{else}
<div class='page_header'>
<a href='{$url->url_create('profile', $owner)}'>{lang_sprintf id=80000029 1=$owner}</a>
</div>
{/if}
   <ul class="gift">
  {foreach key=cid item=con from=$gifts}
    <li>
    <div class="inf">
        
           <a class="name" href='{$url->url_create('profile', $con.from->user_info.user_username)}'>
           {$con.from->user_displayname}</a> 
          <a href="mf_gifts_send.php?displayname={$con.from->user_displayname}" class="del">Отправить подарок в ответ</a>
          <a id="add_msg" href="#" class="edit">Написать сообщение</a>
          <span>{$datetime->cdate("`$setting.setting_dateformat`", $datetime->timezone("`$con.date`", $global_timezone))}</span>
          
    </div>
        <div class="gif">
            <p>{$con.message}</p><br /><div>
            <img src="mf_gifts/{$con.file}_thumb.{$con.filetype}"></div>
        </div>
    </li>
  {/foreach}
</ul>


{include file='footer.tpl'}