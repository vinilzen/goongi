{include file='header.tpl'}
<h1>мои визитки</h1>
        <div class="crumb">
            <a href="#">Главная</a>
            <a href="#">Профиль</a>
            <span>Мои визитки</span>
        </div>

  <form method = "post" action ="user_vizitki_entry.php">
        <div class="buttons">
            <span class="button2"><span class="l">&nbsp;</span><span class="c">
            <input type="submit" value="Создать визитку" name="creat" /></a>
            </span><span class="r">&nbsp;</span></span>
    </div>
 </form>
{if !$vizitkientries}<p style="text-align:center; text:bold; ">Вы не создали еще ни одной визитки</p>{/if}
 <ul class="visitka_list">
{section name=vizitkientry_loop loop=$vizitkientries}
    <li id = "vizitka_{$vizitkientries[vizitkientry_loop].ad_id}">
    <strong>{$vizitkientries[vizitkientry_loop].ad_name}</strong><span>{$vizitkientries[vizitkientry_loop].vizitkientry_category}</span>
    <p><img src="../uploads_admin/ads/{$vizitkientries[vizitkientry_loop].ad_filename}"  alt="" width="105" height ="105"/></p>
    {assign var=foo value="-"|explode:$vizitkientries[vizitkientry_loop].vizitkientry_price}
    <p>{$vizitkientries[vizitkientry_loop].vizitkientry_body}<br /><strong>от  {$foo[0]} {$foo[1]}</strong></p>
    <p>{$vizitkientries[vizitkientry_loop].vizitkientry_telephon}<br />
    {$vizitkientries[vizitkientry_loop].vizitkientry_email}<br />
    <a href="#">{$vizitkientries[vizitkientry_loop].vizitkientry_site}</a></p>
    <p><a href = "user_vizitki_entry.php?vizitkientry_id={$vizitkientries[vizitkientry_loop].ad_id}">редактировать</a>
     <a href="#" onclick="delete_vizitka('deletevizitka',{$vizitkientries[vizitkientry_loop].ad_id}); return false;" class="del">удалить</a></p>
</li>
{/section}
</ul>
{include file='footer.tpl'}