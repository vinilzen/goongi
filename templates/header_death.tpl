<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
{* $Id: header_global.tpl 146 2009-03-27 02:48:07Z john $ *}
<head>
<title>{lang_print id=642}{if $global_page_title != ""} - {lang_sprintf id=$global_page_title[0] 1=$global_page_title[1] 2=$global_page_title[2]}{/if}</title>
<base href='{$url->url_base}' />
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<meta name='Description' content="{if $global_page_description != ""}{lang_sprintf id=$global_page_description[0] 1=$global_page_description[1] 2=$global_page_description[2]}{else}{lang_print id=1156}{/if}" />

{* INLUCDE MAIN STYLESHEET *}
{*
<link rel="stylesheet" href="/templates/styles_global.css" title="stylesheet" type="text/css" />
<link rel="stylesheet" href="/templates/styles.css" title="stylesheet" type="text/css" />
*}
<link rel="stylesheet" href="/css/style.css" title="stylesheet" type="text/css" />
<link rel="stylesheet" href="/css/autocomplete.css" title="stylesheet" type="text/css" />
<!--[if IE]>
	<link rel="stylesheet" href="/css/ie.css" type="text/css" media="screen" />
<![endif]-->
<!--[if IE 7]>
	<link rel="stylesheet" href="/css/ie7.css" type="text/css" media="screen" />
<![endif]-->
<!--[if lte IE 6]>
    <meta http-equiv="refresh" content="0; url=/ie6/ie6.html" />
<![endif]-->
{* JQUERY my js code *}
   	<script type="text/javascript" src="/js/jquery.js"></script>
	<script type="text/javascript" src="/js/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="/js/jquery.autocomplete-min.js"></script>
	<script type="text/javascript" src="/js/script.js"></script>


{* CODE FOR VARIOUS JAVASCRIPT-BASED FEATURES, DO NOT REMOVE *}
{*
<script type="text/javascript" src="./include/js/mootools12-min.js"></script>

<script type="text/javascript" src="./include/js/mootools12.js"></script>
<script type="text/javascript" src="./include/js/mootools12-more.js"></script>


<script type="text/javascript" src="./include/js/core-min.js"></script>*}
{*
<script type="text/javascript" src="./include/js/autogrow.js"></script>
<script type="text/javascript" src="./include/js/smoothbox.js"></script>
<script type="text/javascript" src="./include/js/autosuggest.js"></script>
<script type="text/javascript" src="./include/js/sprintf.js"></script>
<script type="text/javascript" src="./include/js/class_base.js"></script>
<script type="text/javascript" src="./include/js/class_core.js"></script>
<script type="text/javascript" src="./include/js/class_language.js"></script>
<script type="text/javascript" src="./include/js/class_url.js"></script>
<script type="text/javascript" src="./include/js/class_comments.js"></script>
<script type="text/javascript" src="./include/js/class_tags.js"></script>
<script type="text/javascript" src="./include/js/class_user.js"></script>
*}

{* INSTALIZE API *}
{*
<script type="text/javascript">
<!--
  var SocialEngine = new SocialEngineAPI.Base();

  // Core
  SocialEngine.Core = new SocialEngineAPI.Core();
  SocialEngine.Core.ImportSettings({$se_javascript->generateSettings($setting)});
  SocialEngine.Core.ImportPlugins({$se_javascript->generatePlugins($global_plugins)});
  SocialEngine.RegisterModule(SocialEngine.Core);

  // URL
  SocialEngine.URL = new SocialEngineAPI.URL();
  SocialEngine.URL.ImportURLBase({$se_javascript->generateURLBase($url)});
  SocialEngine.URL.ImportURLInfo({$se_javascript->generateURLInfo($url)});
  SocialEngine.RegisterModule(SocialEngine.URL);

  // Language
  SocialEngine.Language = new SocialEngineAPI.Language();
  SocialEngine.RegisterModule(SocialEngine.Language);

  // User - Viewer
  SocialEngine.Viewer = new SocialEngineAPI.User();
  SocialEngine.Viewer.ImportUserInfo({$se_javascript->generateUserInfo($user)});
  SocialEngine.RegisterModule(SocialEngine.Viewer);

  // User - Owner
  SocialEngine.Owner = new SocialEngineAPI.User();
  SocialEngine.Owner.ImportUserInfo({$se_javascript->generateUserInfo($owner)});
  SocialEngine.RegisterModule(SocialEngine.Owner);

  // Back
  SELanguage = SocialEngine.Language;
//-->
</script>


{literal}
<script type="text/javascript">
<!--
  // ADD TIP FUNCTION
  window.addEvent('load', function()  {
    var Tips1 = new Tips($$('.Tips1'));
  });
//-->
</script>
{/literal}
*}
{* ASSIGN PLUGIN MENU ITEMS AND INCLUDE NECESSARY STYLE/JAVASCRIPT FILES *}
{hook_include name=header}
{hook_foreach name=styles var=hook_stylesheet}
<link rel="stylesheet" href="{$hook_stylesheet}" title="stylesheet" type="text/css" />
{/hook_foreach}
{*
	{hook_foreach name=scripts var=hook_script}
	<script type="text/javascript" src="{$hook_script}"></script>
	{/hook_foreach}
*}

</head>
<body class="death_page">
{* GLOBAL IFRAME FOR AJAX FUNCTIONALITY *}

{* $Id: header.tpl 287 2010-01-07 23:46:33Z steve $ *}
{* INCLUDE HEADER CODE *}


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
                <li id = "invite"><a href="/invite.php">{lang_print id=647}<!-- Пригласить --></a></li>
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
<div class="all">
	{if $login || $lostpass || $signup || $invite}
		<div class="center_one"><div class="block3">
	{elseif $home && $user->user_exists == 0}
		<div class="center"><div class="block2">
	{else}
		<div class="center_all"><div class="block4">
	{/if}
</div>
<div class="d_content">

			