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
<link rel="icon" href="/images/favicon.ico" type="image/x-icon" />
<link rel="stylesheet" href="/css/style.css" title="stylesheet" type="text/css" />  
<link rel="stylesheet" href="/css/autocomplete.css" title="stylesheet" type="text/css" />  
<link rel="stylesheet" href="/css/igal.css" title="stylesheet" type="text/css" />  
<link href="/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<link href="/css/flick/jquery-ui-1.8.17.custom.css" rel="stylesheet" type="text/css"/>

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
	<script type="text/javascript" src="/js/jQuery.Carousel.js"></script>
	<script type="text/javascript" src="/js/script.js?p={php}echo time();{/php}"></script>

{* ASSIGN PLUGIN MENU ITEMS AND INCLUDE NECESSARY STYLE/JAVASCRIPT FILES *}
{hook_include name=header}
{hook_foreach name=styles var=hook_stylesheet}
<link rel="stylesheet" href="{$hook_stylesheet}" title="stylesheet" type="text/css" />
{/hook_foreach}

</head>
<body>
{* GLOBAL IFRAME FOR AJAX FUNCTIONALITY *}