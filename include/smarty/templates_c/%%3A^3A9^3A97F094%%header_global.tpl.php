<?php /* Smarty version 2.6.14, created on 2011-12-27 16:53:16
         compiled from header_global.tpl */
?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'hook_foreach', 'header_global.tpl', 109, false),)), $this);
?><?php
SELanguage::_preload_multi(642,1156);
SELanguage::load();
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title><?php echo SELanguage::_get(642); 
 if ($this->_tpl_vars['global_page_title'] != ""): ?> - <?php echo sprintf(SELanguage::_get($this->_tpl_vars['global_page_title'][0]), $this->_tpl_vars['global_page_title'][1], $this->_tpl_vars['global_page_title'][2]); 
 endif; ?></title>
<base href='<?php echo $this->_tpl_vars['url']->url_base; ?>
' />
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
<meta http-equiv="X-UA-Compatible" content="IE=7" /> 
<meta name='Description' content="<?php if ($this->_tpl_vars['global_page_description'] != ""): 
 echo sprintf(SELanguage::_get($this->_tpl_vars['global_page_description'][0]), $this->_tpl_vars['global_page_description'][1], $this->_tpl_vars['global_page_description'][2]); 
 else: 
 echo SELanguage::_get(1156); 
 endif; ?>" />

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
   	<script type="text/javascript" src="/js/jquery.js"></script>
	<script type="text/javascript" src="/js/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="/js/jquery.autocomplete-min.js"></script>
	<script type="text/javascript" src="/js/script.js"></script>



<?php if( isset($this->_tpl_hooks['header']) )
{
  foreach( $this->_tpl_hooks['header'] as $_tpl_hook_include )
  {
    $this->_smarty_include(array('smarty_include_tpl_file' => $_tpl_hook_include, 'smarty_include_vars' => array()));
  }
} 
 $this->_tag_stack[] = array('hook_foreach', array('name' => 'styles','var' => 'hook_stylesheet')); $_block_repeat=true;smarty_block_hook_foreach($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
<link rel="stylesheet" href="<?php echo $this->_tpl_vars['hook_stylesheet']; ?>
" title="stylesheet" type="text/css" />
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_hook_foreach($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>

</head>
<body>