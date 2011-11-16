{include file='header.tpl'}

{* $Id: home.tpl 288 2010-01-11 20:17:09Z steve $ *}


{* BEGIN MIDDLE COLUMN *}
<div class="all">
	<div class="center">
		<div class="block2">
			<div class="c">
				<div class="bg_l">
					<div class="bg_r">
						<div class="first_time">
							<p>Если вы хотите найти и поделиться с родными и близкими историей вашего рода &mdash; 
							наш проект Goongi то что вам нужно.</p>
							<p>{lang_print id=850009}</p>
						</div><br>
						
						<h1>{lang_print id=643}<!-- Поиск: -->Поиск людей на сайте</h1>
						<div class="search">
							<form action='search.php' method='post'>
								<span class="button2">
									<span class="l">&nbsp;</span>
									<span class="c">
										<input type="submit" name="log" value="{lang_print id=644}" /> <!-- Искать -->
									</span>
									<span class="r">&nbsp;</span>
								</span>
								<input type='hidden' name='task' value='dosearch' />
								<input type='hidden' name='t' value='0' />
								<input type="text" class="srch" name="search_text" onblur="if (this.value == '') {this.value='Введите сюда фамилию';this.style.color='#999999';}" onfocus="if (this.value == 'Введите сюда фамилию') {this.value ='';this.style.color='#000000';}" value="Введите сюда фамилию" />
							</form>
							<a href='search_advan	ced.php'>{lang_print id=926}<!-- Расширенный поиск --></a>
						</div>
						<ul class="index_ul">
							<li>Вы сможете составить генеалогическое древо своей семьи.</li>
							<li>Искать родню во всем мире и общаться с ними.</li>
							<li>Встроенный календарь напомнит вам дни рождения родных.</li>
							<li>Вы сможете увековечить память предков всего несколькими кликами.</li>
							<li>К выпуску готовится семейный фотоальбом, в котором вы запечатлите все важные события!</li>
						</ul>
						<ul class="steps">
							<li><a href="#"><img alt="" src="images/st1.gif"></a><div>Найди родных</div></li>
							<li><a href="#"><img alt="" src="images/st2.gif"></a><div>Найди друзей</div></li>
							<li style="margin-right: 0pt; padding-right: 0pt; background: none repeat scroll 0% 0% transparent;"><a href="#"><img alt="" src="images/st3.gif"></a><div>Построй дерево</div></li>
						</ul>
					  {if $news|@count > 0 && 0}
						  <div class='page_header'>{lang_print id=664}</div>
						  <ul>
						  {section name=news_loop loop=$news max=3}
							<li>
								<img src='./images/icons/news16.gif' border='0' class='icon' alt='' />
								<b>{$news[news_loop].announcement_subject}</b> - {$news[news_loop].announcement_date}
								{$news[news_loop].announcement_body}
							</li>
						  {/section}
						  </ul>
					  {/if}
						{* SHOW PUBLIC VERSION OF ACTIVITY LIST *}  
						  {if $actions|@count > 0 && 0} {* nax ACTIVITY LIST *}
							<div class='page_header'>{lang_print id=737}</div>
							<div class='portal_whatsnew'>
							  {* RECENT ACTIVITY ADVERTISEMENT BANNERS *}
							  {if $ads->ad_feed != ""}
								<div class='portal_action' style='display: block; visibility: visible; padding-bottom: 10px;'>{$ads->ad_feed}</div>
							  {/if}
							  {* SHOW ACTIONS *}
							  {section name=actions_loop loop=$actions max=10}
								<div id='action_{$actions[actions_loop].action_id}' class='portal_action{if $smarty.section.actions_loop.first}_top{/if}'>
								  <table cellpadding='0' cellspacing='0'>  <tr>
								  <td valign='top'><img src='./images/icons/{$actions[actions_loop].action_icon}' border='0' class='icon' alt='' /></td>
								  <td valign='top' width='100%'>
									{assign var='action_date' value=$datetime->time_since($actions[actions_loop].action_date)}
									<div class='portal_action_date'>{lang_sprintf id=$action_date[0] 1=$action_date[1]}</div>
									{assign var='action_media' value=''}
									{if $actions[actions_loop].action_media !== FALSE}{capture assign='action_media'}{section name=action_media_loop loop=$actions[actions_loop].action_media}<a href='{$actions[actions_loop].action_media[action_media_loop].actionmedia_link}'><img src='{$actions[actions_loop].action_media[action_media_loop].actionmedia_path}' border='0' width='{$actions[actions_loop].action_media[action_media_loop].actionmedia_width}' class='recentaction_media' alt='' /></a>{/section}{/capture}{/if}
									{lang_sprintf assign=action_text id=$actions[actions_loop].action_text args=$actions[actions_loop].action_vars}
									{$action_text|replace:"[media]":$action_media|choptext:50:"<br>"}
										</td>
								  </tr> </table>
								</div>
							  {/section}
							</div>
						  {/if}
					</div>
				</div>
			</div>
			<div class="b"></div>
		</div>
	</div>
</div>

{* BEGIN LEFT COLUMN *}
<div class="left">
	<div class="left_c">
		<div class="block1">
			<div class="bg">
				<div class="c">
					{* SHOW LOGIN FORM IF USER IS NOT LOGGED IN *}
					{if !$user->user_exists}
					<div class="first_time">
						<p>Вы здесь впервые?</p>
						<p><a href="/signup.php">Создайте своё древо</a> бесплатно. Это займет всего пару минут.</p>
					</div>
					{* SHOW HELLO MESSAGE IF USER IS LOGGED IN *}
					{else}
					<div class='portal_login'>
					  <div style='padding-bottom: 5px;'><a href='{$url->url_create("profile",$user->user_info.user_username)}'><img src='{$user->user_photo("./images/nophoto.gif")}' width='{$misc->photo_size($user->user_photo("./images/nophoto.gif"),"90","90","w")}' border='0' class='photo' alt="{lang_sprintf id=509 1=$user->user_info.user_username}" /></a></div>
					  <div>{lang_sprintf id=510 1=$user->user_displayname_short}</div>
					  <div>[ <form method="POST" id="user_logout" action="user_logout.php" style="display:inline;margin:0;"><a href='user_logout.php?token={$token}' class='top_menu_item' onclick="$('user_logout').submit(); return false;">{lang_print id=26}</a></form> ]</div>
					</div>
					<div class='portal_spacer'></div>
					{/if}

					  {* SHOW JOIN US TODAY BUTTON IF USER IS NOT LOGGED-IN *}
					  {if !$user->user_exists}
						<div class='portal_signup_container1'>
						  <div class='portal_signup'>
							<a href='signup.php' class='portal_signup'><span style='font-size: 15px;'><img src='./images/portal_join.gif' border='0' style='margin-right: 3px; vertical-align: middle;' alt='' /></span>{lang_print id=1115}</a>
						  </div>
						</div>
						<div class='portal_spacer'></div>
					  {/if}

					  {* SHOW NETWORK STATISTICS *}
					  {if !empty($site_statistics) && 0} {* poka chto nax statistiku *}
						<div class='header'>{lang_print id=511}</div>
						<div class='portal_content'>
						  {foreach from=$site_statistics key=stat_name item=stat_array}
							&#149; {lang_sprintf id=$stat_array.title 1=$stat_array.stat}<br />
						  {/foreach}
						</div>
						<div class='portal_spacer'></div>
					  {/if}
					  {* SHOW ONLINE USERS IF MORE THAN ZERO *}
					  {math assign='total_online_users' equation="x+y" x=$online_users[0]|@count y=$online_users[1]}
					  {if $total_online_users > 0 && 0} {* poka chto nax user_online *}
						<div class='header'>{lang_print id=665} ({$total_online_users})</div>
						<div class='portal_content'>
						  {if $online_users[0]|@count == 0}
							{lang_sprintf id=977 1=$online_users[1]}
						  {else}
							{capture assign='online_users_registered'}{section name=online_loop loop=$online_users[0]}{if $smarty.section.online_loop.rownum != 1}, {/if}<a href='{$url->url_create("profile", $online_users[0][online_loop]->user_info.user_username)}'>{$online_users[0][online_loop]->user_displayname}</a>{/section}{/capture}
							{lang_sprintf id=976 1=$online_users_registered 2=$online_users[1]}
						  {/if}
						</div>
						<div class='portal_spacer'></div>
					  {/if}

					{* SHOW LAST LOGINS *}
					{if 0} {* poka chto nax LAST LOGINS *}
					<div class='header'>{lang_print id=671}</div>
					<div class='portal_content'>
					{if !empty($logins)}
					<table cellpadding='0' cellspacing='0' align='center'>
					  {section name=login_loop loop=$logins max=4}
					  {cycle name="startrow3" values="<tr>,"}
					  <td class='portal_member' valign="bottom"{if (~$smarty.section.login_loop.index & 1) && $smarty.section.login_loop.last} colspan="2" style="width:100%;"{else} style="width:50%;"{/if}>
						{if !empty($logins[login_loop])}
						<a href='{$url->url_create("profile",$logins[login_loop]->user_info.user_username)}'>{$logins[login_loop]->user_displayname|regex_replace:"/&#039;/":"'"|truncate:15:"...":true}</a><br />
						<a href='{$url->url_create("profile",$logins[login_loop]->user_info.user_username)}'><img src='{$logins[login_loop]->user_photo("./images/nophoto.gif", TRUE)}' class='photo' width='60' height='60' border='0' alt='' /></a>
						{/if}
					  </td>
					  {cycle name="endrow3" values=",</tr>"}
					  {if (~$smarty.section.login_loop.index & 1) && $smarty.section.login_loop.last}</tr>{/if}
					  {/section}
					  </table>
					{else}
					  {lang_print id=672}
					{/if}
					</div>
					<div class='portal_spacer'></div>
					{/if}

				</div>
			</div>
			<div class="b"></div>
		</div>
	</div>
</div>

{* BEGIN RIGHT COLUMN CONTENT *}{if !$user->user_exists}
<div class="right">
	<div class="block1">
		<div class="bg">
			<div class="c">
				<div class="form_login">
					<h1>{lang_print id=6000142}<!-- Войти на сайт --></h1>
					<form action='login.php' name="login" method='post'>
						<div class="input"><label>{lang_print id=28}<!-- Логин --></label><input type="text" value='{$prev_email}' name="email"  size='25' maxlength='100' /></div>
						
						<div class="input"><label><a href="#">{lang_print id=675}<!-- Забыли пароль? --></a>{lang_print id=29}<!-- Пароль --></label><input type="password" value="" name='password' size='25' maxlength='100' /></div>
						
						<div class="check"><label><input type='checkbox' class='checkbox' name='persistent' value='1' id='rememberme' /><span>{lang_print id=660}<!-- Запомнить меня --></span></label></div>
						
						<span class="button1"><span class="l">&nbsp;</span><span class="c"><input type="submit" value='{lang_print id=30}' /></span><span class="r">&nbsp;</span></span>
						<input type="hidden" name="task" value="dologin">
					</form>
					<a href="#" class="reg">{lang_print id=6000143}<!-- Зарегистрироваться --></a>
				</div>
			</div>
		</div>
		<div class="b"></div>
	</div>
</div>
	
{if 0}{* skroem poka "poslednih dobavlenih" i "samih drugnih" *}
  {* SHOW LAST SIGNUPS *}

  <div class='header'>{lang_print id=666}</div>
  <div class='portal_content'>
    {if !empty($signups)}
    <table cellpadding='0' cellspacing='0' align='center'>
      {section name=signups_loop loop=$signups max=4}
      {cycle name="startrow" values="<tr>,"}
      <td class='portal_member' valign="bottom"{if (~$smarty.section.signups_loop.index & 1) && $smarty.section.signups_loop.last} colspan="2" style="width:100%;"{else} style="width:50%;"{/if}>
        {if !empty($signups[signups_loop])}
          <a href='{$url->url_create("profile",$signups[signups_loop]->user_info.user_username)}'>{$signups[signups_loop]->user_displayname|regex_replace:"/&#039;/":"'"|truncate:15:"...":true}</a><br />
          <a href='{$url->url_create("profile",$signups[signups_loop]->user_info.user_username)}'><img src='{$signups[signups_loop]->user_photo("./images/nophoto.gif", TRUE)}' class='photo' width='60' height='60' border='0' alt='' /></a>
        {/if}
      </td>
      {cycle name="endrow" values=",</tr>"}
      {/section}
      </table>
    {else}
      {lang_print id=667}
    {/if}
  </div>
  <div class='portal_spacer'></div>

  {* SHOW MOST POPULAR USERS (MOST FRIENDS) *}
  {if $setting.setting_connection_allow != 0}
    <div class='header'>{lang_print id=668}</div>
    <div class='portal_content'>
    {if !empty($friends)}
    <table cellpadding='0' cellspacing='0' align='center'>
      {section name=friends_loop loop=$friends max=4}
      {cycle name="startrow2" values="<tr>,"}
      <td class='portal_member' valign="bottom"{if (~$smarty.section.friends_loop.index & 1) && $smarty.section.friends_loop.last} colspan="2" style="width:100%;"{else} style="width:50%;"{/if}>
        {if !empty($friends[friends_loop])}
        <a href='{$url->url_create("profile",$friends[friends_loop].friend->user_info.user_username)}'>{$friends[friends_loop].friend->user_displayname|regex_replace:"/&#039;/":"'"|truncate:15:"...":true}</a><br />
        <a href='{$url->url_create("profile",$friends[friends_loop].friend->user_info.user_username)}'><img src='{$friends[friends_loop].friend->user_photo("./images/nophoto.gif", TRUE)}' class='photo' width='60' height='60' border='0' alt='' /></a><br />
        {lang_sprintf id=669 1=$friends[friends_loop].total_friends}
        {/if}
      </td>
      {cycle name="endrow2" values=",</tr>"}
      {/section}
      </table>
    {else}
      {lang_print id=670}
    {/if}
    </div>
    <div class='portal_spacer'></div>
  {/if}
{/if}
</div>
{/if}
			<div class="clear"></div>
        </div>
    </div>
	<div id="clearfooter"></div>	
</div>
{include file='footer_without_left_menu.tpl'}