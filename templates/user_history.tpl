{include file='header.tpl'}

{* $Id: user_history.tpl 241 2009-11-14 02:48:21Z phil $ *}
<h1>История рода</h1>
<div class="crumb">
	<a href="/#">Главная</a>
	<a href="{$url->url_create("profile", $user->user_info.user_username)}">{lang_print id=652}</a>
	<span>История рода</span>
</div>



{if $user->level_info.level_history_create}
  {* DISPLAY MESSAGE IF NO history ENTRIES *}
  {if !$total_historyentries}

    <div class="buttons">
	<span class="button2"><span class="l">&nbsp;</span><span class="c">
        <a href='user_history_entry.php'>
        <input type="button" value="Написать историю" name="creat" /></a></span>
        <span class="r">&nbsp;</span></span>
    </div>


  {* DISPLAY ENTRIES *}
  {else}
    
   
     
      {* LIST history ENTRIES *}
      <form action='user_history.php' name='entryform' method='post'>
      {section name=historyentry_loop loop=$historyentries}
		<div class="buttons">
			<span class="button2"><span class="l">&nbsp;</span><span class="c">
				<a href="user_history_entry.php?historyentry_id={$historyentries[historyentry_loop].historyentry_id}">
				<input type="button" value="Редактировать" name="creat" />
				</a>
			</span><span class="r">&nbsp;</span></span>
			{*  <span class="button3"><span class="l">&nbsp;</span><span class="c">
				<a href="user_history.php?historyentry_id={$historyentry_id}&del=1">
				<input type="button"  value="Удалить" name="creat" /></a>
			</span><span class="r">&nbsp;</span></span>*}
		</div>
             <h1> {$historyentries[historyentry_loop].historyentry_title}</h1>
              
                {if !empty($historyentries[historyentry_loop].historyentry_body)}
                    {$historyentries[historyentry_loop].historyentry_body}
                {/if}
      {/section}
     
      
        </form>
    {/if}
  
{/if}
{include file='footer.tpl'}