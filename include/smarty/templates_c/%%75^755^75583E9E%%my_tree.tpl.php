<?php /* Smarty version 2.6.14, created on 2011-12-09 19:08:58
         compiled from my_tree.tpl */
?><?php
SELanguage::load();
?>﻿<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header_global.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id="content">
    <!--HEAD-->
    <div class="head">
        <div class="fix">
            <div class="logo"><a href="#"><img src="images/logo.png" alt="" /></a></div>
            <ul class="menu">
                <li><a href="#">Поиск</a></li>
                <li><a href="#">Пригласить</a></li>
                <li><a href="#">Подарки</a></li>
                <li><a href="#"><span>Язык</span></a></li>
                <li><a href="#">войти</a></li>
            </ul>
        </div>
	</div>
  <!--END HEAD-->

<iframe id="tree" src="/tree.php" frameborder="0" scrolling="no" width="100%"></iframe>
<?php echo '
<script type="text/javascript">
$(function() {
	function resize() {
		$(\'#tree\').height( $(window).height() - $(\'#content\').children(\'.head\').height() )
	};
	resize();
	$(window).resize(resize);
})
</script>
'; ?>

</body>
</html>