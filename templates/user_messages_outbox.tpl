{include file='header.tpl'}

{* $Id: user_messages_outbox.tpl 8 2009-01-11 06:02:53Z john $ *}
<div class="all">
	<div class="center_all">
		<div class="block4">
			<div class="c">
				<div class="bg_l">
					<div class="bg_r">
						<h1>мои сообщения</h1>
						<div class="crumb"><a href="#">Главная</a><a href="#">Профиль</a><span>Mои сообщения</span></div>
						<ul class="vk">
							<li><a href="/user_messages.php">{lang_print id=780}<!-- Полученные --><font>{if $user_unread_pms>0}({$user_unread_pms}){/if}</font></a></li>
							<li class="active"><a href="/user_messages_outbox.php">{lang_print id=781}<!-- Отправленные --></a></li>
							<li><a href="#">Спам  <font>(8)</font></a></li>
							<li id="add_msg"><a href="javascript:TB_show('{lang_print id=784}', 'user_messages_new.php?TB_iframe=true&height=400&width=450', '', './images/trans.gif');">{lang_print id=784}<!-- Написать сообщение --></a></li>
						</ul>
						<div class="message">
{* JAVASCRIPT FOR CHECK ALL MESSAGES FEATURE *}
{literal}
  <script language='JavaScript'> 
  <!---
  var checkboxcount = 1;
  function doCheckAll() {
    if(checkboxcount == 0) {
      with (document.messageform) {
      for (var i=0; i < elements.length; i++) {
      if (elements[i].type == 'checkbox') {
      elements[i].checked = false;
      }}
      checkboxcount = checkboxcount + 1;
      }
    } else
      with (document.messageform) {
      for (var i=0; i < elements.length; i++) {
      if (elements[i].type == 'checkbox') {
      elements[i].checked = true;
      }}
      checkboxcount = checkboxcount - 1;
      }
  }
  // -->
  </script>
{/literal}


{* DISPLAY PAGINATION MENU IF APPLICABLE *}
{if $maxpage > 1}
  <div class='center'>
  {if $p != 1}<a href='user_messages_outbox.php?p={math equation='p-1' p=$p}'>&#171; {lang_print id=182}</a>{else}<font class='disabled'>&#171; {lang_print id=182}</font>{/if}
  {if $p_start == $p_end}
    &nbsp;|&nbsp; {lang_sprintf id=184 1=$p_start 2=$total_pms} &nbsp;|&nbsp; 
  {else}
    &nbsp;|&nbsp; {lang_sprintf id=185 1=$p_start 2=$p_end 3=$total_pms} &nbsp;|&nbsp; 
  {/if}
  {if $p != $maxpage}<a href='user_messages_outbox.php?p={math equation='p+1' p=$p}'>{lang_print id=183} &#187;</a>{else}<font class='disabled'>{lang_print id=183} &#187;</font>{/if}
  </div>
<br>
{/if}


{* CHECK IF THERE ARE NO MESSAGES IN OUTBOX *}
{if $total_pms == 0}

  <div class='center'>
    <table cellpadding='0' cellspacing='0'><tr>
    <td class='result'><img src='./images/icons/bulb16.gif' border='0' class='icon'>{lang_print id=799}</td>
    </tr></table>
  </div>


{* DISPLAY MESSAGES *}
{else}

<ul class="comment_list">
  {* LIST SENT MESSAGES *}
  {section name=pm_loop loop=$pms}
	<li>
	<!-- <input type='checkbox' name='delete_convos[]' value='{$pms[pm_loop].pmconvo_id}'> -->
	<a href='user_messages_view.php?b=1&pmconvo_id={$pms[pm_loop].pmconvo_id}&task=delete' class="del">{lang_print id=155}</a>
	<a href="{$url->url_create('profile', $pms[pm_loop].pm_user->user_info.user_username)}">
		<img src="{$pms[pm_loop].pm_user->user_photo('./images/nophoto.gif', TRUE)}" alt="{lang_sprintf id=786 1=$pms[pm_loop].pm_user->user_displayname_short}" />
	</a>
	<a href="{$url->url_create('profile', $pms[pm_loop].pm_user->user_info.user_username)}" class="name">{$pms[pm_loop].author->user_displayname|truncate:20:"...":true}</a>
	<span>{$datetime->cdate("`$setting.setting_timeformat` `$setting.setting_dateformat`", $datetime->timezone($pms[pm_loop].pm_date, $global_timezone))}</span>
	
	
	<a href='user_messages_view.php?pmconvo_id={$pms[pm_loop].pmconvo_id}#bottom'>
		{$pms[pm_loop].pmconvo_subject|truncate:50}
	</a>
		
	<p>{$pms[pm_loop].pm_body|truncate:150|choptext:75:"<br>"}</p>
	{if $smarty.section.pm_loop.last}<a name='bottom'></a>{/if}
	</li>
 {/section}
</ul>
  
  <br>

  <input type='submit' class='button' value='{lang_print id=788}'>
  <input type='hidden' name='task' value='deleteselected'>
  <input type='hidden' name='p' value='{$p}'>
  </form>

{/if}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
{include file='footer.tpl'}