{include file='header.tpl'}

{* $Id: user_history.tpl 241 2009-11-14 02:48:21Z phil $ *}
<h1>История рода{if $owner->user_info.user_id != 0 && $owner->user_info.user_id != $user->user_info.user_id } {$owner->user_displayname_short}{/if}</h1>
<div class="crumb">
	<a href="/#">Главная</a>
	{if $owner->user_info.user_id != 0 && $owner->user_info.user_id != $user->user_info.user_id }
		<a href="{$url->url_create("profile", $owner->user_info.user_username)}">{lang_print id=652} {$owner->user_displayname_short}</a>
	{else}
		<a href="{$url->url_create("profile", $user->user_info.user_username)}">{lang_print id=652} {$user->user_displayname_short}</a>
	{/if}
	<span>История рода</span>
</div>



{if $user->level_info.level_history_create}
  {* DISPLAY MESSAGE IF NO history ENTRIES *}
  {if !$total_historyentries}
	{if $owner->user_info.user_id == 0}
    <div class="buttons">
	<span class="button2"><span class="l">&nbsp;</span><span class="c">
        <a href='user_history_entry.php'>Написать историю</a></span>
        <span class="r">&nbsp;</span></span>
    </div>
<p style="text-align:center; text:bold; ">Вы не написали еще свою историю</p>
    {/if}


  {* DISPLAY ENTRIES *}
  {else}
    
   
     
      {* LIST history ENTRIES *}
      <form action='user_history.php' name='entryform' method='post'>
      {section name=historyentry_loop loop=$historyentries}
			{if $owner->user_info.user_id == 0 && $show_edit == 1 }
				<div class="buttons">
					<span class="button2"><span class="l">&nbsp;</span><span class="c">
						<a onclick = "check_history({$historyentries[historyentry_loop].historyentry_id});">Редактировать</a>
					</span><span class="r">&nbsp;</span></span>
					{*  <span class="button3"><span class="l">&nbsp;</span><span class="c">
						<a href="user_history.php?historyentry_id={$historyentry_id}&del=1">
						<input type="button"  value="Удалить" name="creat" /></a>
					</span><span class="r">&nbsp;</span></span>*}
				</div>
			{/if}
        <h1>{$historyentries[historyentry_loop].historyentry_title}</h1>
		{if !empty($historyentries[historyentry_loop].historyentry_body)}
			{$historyentries[historyentry_loop].historyentry_body}
		{/if}
      {/section}
     
      
        </form>
    {/if}
  
{/if}
{include file='footer.tpl'}