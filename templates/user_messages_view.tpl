 {include file='header_history.tpl'}

{* $Id: user_messages_view.tpl 194 2009-07-15 21:44:24Z john $ *}
<h1>мои сообщения</h1>
<div class="crumb"><a href="#">Главная</a><a href="#">Профиль</a><a href="user_messages.php">Mои сообщения</a><span>Переписка</span></div>


{* LOOP THROUGH MESSAGES IN THREAD *}
<ul class="message_list">
{section name=pm_loop loop=$pms}
<li>
	
      <!--  <a href='user_messages_view.php?pmconvo_id={$pms[pm_loop].pm_pmconvo_id }&task=delete' class="del">{lang_print id=1181}</a>-->
	<a href="{$url->url_create("profile",$pms[pm_loop].author->user_info.user_username)}">
		<img src="{$pms[pm_loop].author->user_photo("./images/no_photo_thumb.gif", TRUE)}" alt="" />
	</a>
	<a href="{$url->url_create("profile",$pms[pm_loop].author->user_info.user_username)}" class="name">{$pms[pm_loop].author->user_displayname}</a>
	<span>{$datetime->cdate("`$setting.setting_dateformat` в `$setting.setting_timeformat`", $datetime->timezone($pms[pm_loop].pm_date, $global_timezone))}</span>
	<p>{$pms[pm_loop].pm_body|choptext:75:"<br>"}</p>
	{if $smarty.section.pm_loop.last}<a name='bottom'></a>{/if}
</li>
{/section}
<br></br>

{* JAVASCRIPT FOR AUTOGROWING TEXTAREA *}
{literal}
<script type="text/javascript">
<!--
  window.addEvent('domready', function() { textarea_autogrow('reply_body'); });
//-->
</script>
{/literal}

  <a name='reply'></a>
  <div id='reply_error' style='display: none;'>{lang_print id=796}</div>
  {if $blockerror}<div id='reply_error2' style='display: {$blockerror};'>{lang_print id=1321}</div>{/if}

  <div class = "form add_com comments wall">
      <form action='user_messages_view.php#bottom' method='POST' onSubmit="{literal}if(this.reply.value.replace(/ /g, '') == '') { $('reply_error').style.display='block'; return false; } else { return true; }{/literal}">
    <div class = "input">
      {if $collaborators|@count == 1}<label>{lang_print id=802}</label>{else}<label>{lang_print id=803}</label>{/if}
      <textarea name='reply' id='reply_body' rows='3' cols='60'></textarea>
    </div>
        <span class="button2">
        <span class="l">&nbsp;</span>
        <span class="c">
        <input type="submit" class='button' value='{lang_print id=38}'>
        </span>
        <span class="r">&nbsp;</span>
        </span>
          {* SHOW BACK TO INBOX *}
          {if $b == 0}
            <span class="button2">
            <span class="l">&nbsp;</span>
            <span class="c">
            <input type="button" class='button' value='{lang_print id=805}' onClick="window.location.href='user_messages.php';">
            </span>
            <span class="r">&nbsp;</span>
            </span>
   
          {* SHOW BACK TO OUTBOX *}
          {else}
        <span class="button2">
            <span class="l">&nbsp;</span>
            <span class="c">
            <input type="button" class='button' value='{lang_print id=806}' onClick="window.location.href='user_messages_outbox.php';">
            </span>
            <span class="r">&nbsp;</span>
            </span>
          {/if}

  <input type='hidden' name='task' value='reply'>
  <input type='hidden' name='pmconvo_id' value='{$pmconvo_info.pmconvo_id}'>
  </form>
</div>

{* DISPLAY REPLY TO ALL BOX *}

</ul>

{include file='footer.tpl'}