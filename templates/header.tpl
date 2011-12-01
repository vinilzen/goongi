{* $Id: header.tpl 287 2010-01-07 23:46:33Z steve $ *}
{* INCLUDE HEADER CODE *}
{include file="header_global.tpl"}

{if $smarty.const.SE_DEBUG && $admin->admin_exists && 0}{include file="header_debug.tpl"}{/if}

<!-- <div id="smoothbox_container"></div> -->
<iframe id='ajaxframe' name='ajaxframe' style='display: none;'  src='javascript:false;'></iframe> <!-- style='display: none;' -->


{* BEGIN CENTERING TABLE *}<!-- BEGIN CENTERING TABLE/ mycontainer -->
<div id="content">



{* START TOPBAR *}
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
{* END TOP BAR *}






{* START TOP MENU *}
{if 0}
<table cellpadding='0' cellspacing='0' style='width: 100%;' align='center'>
<tr>
<td nowrap='nowrap' class='top_menu'>
  <div class='top_menu_link_container'>
    <div class='top_menu_link'><a href='home.php' class='top_menu_item'>{lang_print id=645}</a></div>
  </div>
  
  <div class='top_menu_link_container'>
    <div class='top_menu_link'><a href='invite.php' class='top_menu_item'>{lang_print id=647}</a></div>
  </div>

  {* SHOW ANY PLUGIN MENU ITEMS *}
  {hook_foreach name=menu_main var=menu_main_args complete=menu_main_complete max=7}
    <div class='top_menu_link_container'>
      <div class='top_menu_link'>
        <a href='{$menu_main_args.file}' class='top_menu_item'>{lang_print id=$menu_main_args.title}</a>
      </div>
    </div>
  {/hook_foreach}
  
  {if !$menu_main_complete}
    <div class='top_menu_link_container top_menu_main_link_container'>
      <div class='top_menu_link top_menu_main_link'>
        <a href="javascript:void(0);" onclick="$('menu_main_dropdown').style.display = ( $('menu_main_dropdown').style.display=='none' ? 'inline' : 'none' ); this.blur(); return false;" class='top_menu_item'>
          {lang_print id=1316}
        </a>
      </div>
      <div class='menu_main_dropdown' id='menu_main_dropdown' style='display: none;'>
        <div>
          {* SHOW ANY PLUGIN MENU ITEMS *}
          {hook_foreach name=menu_main var=menu_main_args start=7}
          <div class='menu_main_item_dropdown'>
            <a href='{$menu_main_args.file}' class='menu_main_item' style="text-align: left;">
              {lang_print id=$menu_main_args.title}
            </a>
          </div>
          {/hook_foreach}
        </div>
      </div>
    </div>
  {/if}
  
  <div class='top_menu_link_container_end'>
    <div class='top_menu_link'>
      &nbsp;
    </div>
  </div>

</td>
<td nowrap='nowrap' align='right' class='top_menu2'>

  {* IF USER IS LOGGED IN, SHOW APPROPRIATE TOP MENU ITEMS *}
  {if $user->user_exists != 0}
    <div class='top_menu_link_loggedin' style='padding-right: 10px;'>
      
      {* SHOW MY NOTIFICATIONS POPUP *}
      <div class='newupdates' id='newupdates' style='display: none;'>
        <div class='newupdates_content'>
            <a href='javascript:void(0);' class='newupdates' onClick="SocialEngine.Viewer.userNotifyPopup(); return false;">
            {assign var="notify_total" value=$notifys.total_grouped}
            {lang_sprintf id=1019 1="<span id='notify_total'>`$notify_total`</span>"}
            </a>
            &nbsp;&nbsp; 
            <a href='javascript:void(0);' class='newupdates' onClick="SocialEngine.Viewer.userNotifyHide(); return false;">X</a>
          </div>
      </div>
      
      {lang_sprintf id=649 1="<a href='user_home.php' class='top_menu_item'>`$user->user_displayname_short`</a>"}
      &nbsp;&nbsp;
      <form method="POST" id="user_logout" action="user_logout.php" style="display:inline;margin:0;"><a href='user_logout.php?token={$token}' class='top_menu_item' onclick="$('user_logout').submit(); return false;">{lang_print id=26}</a></form>
    </div>

  {* IF USER IS NOT LOGGED IN, SHOW APPROPRIATE TOP MENU ITEMS *}
  {else}
    <div class='top_menu_link_container_end' style='float: right;'><div class='top_menu_link'><a href='signup.php' class='top_menu_item'>{lang_print id=650}</a></div></div>
    <div class='top_menu_link_container' style='float: right;'><div class='top_menu_link'><a href='login.php' class='top_menu_item'>{lang_print id=30}</a></div></div>
  {/if}

</td>
</tr>
</table>
{/if}
{* END TOP MENU *}



{* USER NOTIFICATIONS *}
{if $user->user_exists && 0}
{lang_javascript ids=1198,1199}
<script type='text/javascript'>
<!--
var notify_update_interval;
window.addEvent('domready', function() {ldelim}
  SocialEngine.Viewer.userNotifyGenerate({$se_javascript->generateNotifys($notifys)});
  SocialEngine.Viewer.userNotifyShow();
  notify_update_interval = (function() {ldelim}
    if( notify_update_interval ) SocialEngine.Viewer.userNotifyUpdate();
  {rdelim}).periodical(60 * 1000);
{rdelim});
//-->
</script>
<div style='display: none;' id='newupdates_popup'></div>
{/if}
 




{* SHOW LEFT-SIDE ADVERTISEMENT BANNER *}
{if $ads->ad_left != ""}
  <div class='ad_left' style='display: block; visibility: visible;'>{$ads->ad_left}</div>
{/if}



{* START MAIN LAYOUT *}
	<div class="fix">
    	<div class="width">

  {* SHOW BELOW-MENU ADVERTISEMENT BANNER *}
  {if $ads->ad_belowmenu != ""}<div class='ad_belowmenu' style='display: block; visibility: visible;'>{$ads->ad_belowmenu}</div>{/if}
<div class="all">
	{if $login || $lostpass || $signup || $invite}
		<div class="center_one"><div class="block3">
	{elseif $home && $user->user_exists == 0}
		<div class="center"><div class="block2">
	{else}	
		<div class="center_all"><div class="block4">
	{/if}	
			<div class="c">
				<div class="bg_l">
					<div class="bg_r">