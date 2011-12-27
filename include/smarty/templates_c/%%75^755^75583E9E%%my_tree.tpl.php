<?php /* Smarty version 2.6.14, created on 2011-12-27 17:15:22
         compiled from my_tree.tpl */
?><?php
SELanguage::_preload_multi(200,647,6000144,687,6000147,6000145);
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
            <div class="logo"><a href="/"><img src="/images/logo.png" alt="" /></a></div>
            <ul class="menu">
                <li><a href="/search.php"><?php echo SELanguage::_get(200); ?><!-- Поиск --></a></li>
                <li><a href="/invite.php"><?php echo SELanguage::_get(647); ?><!-- Пригласить --></a></li>
                <li><a href="#"><?php echo SELanguage::_get(6000144); ?><!-- Подарки --></a></li>
                <li><a href="#"><span><?php echo SELanguage::_get(687); ?><!-- Язык --></span></a></li>
                <li>
				<?php if ($this->_tpl_vars['user']->user_exists != 0): ?>
					<form method="POST" id="user_logout" action="user_logout.php" style="display:inline;margin:0;">
						<input type="hidden" name="token" value="<?php echo $this->_tpl_vars['token']; ?>
" />
						<a href="#" onclick="$('#user_logout').submit(); return false;"><?php echo SELanguage::_get(6000147); ?><!-- выйти --></a>
					</form>
				<?php else: ?>
					<a href="/login.php"><?php echo SELanguage::_get(6000145); ?><!-- войти --></a>
				<?php endif; ?>
				</li>
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