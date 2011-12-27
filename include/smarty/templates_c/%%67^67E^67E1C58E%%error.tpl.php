<?php /* Smarty version 2.6.14, created on 2011-12-27 17:36:18
         compiled from error.tpl */
?><?php
SELanguage::load();
?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header_global.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<div id="content" class="page404">
	<div class="fix">
		<div class="page_404">
			<div class="w_c">
				<h1>упс! ОШИБКА 404</h1>
				<p><?php echo SELanguage::_get($this->_tpl_vars['error_message']); ?></p>
				<p>Если вы уверены, что эта страница тут была, <a href="mailto:<?php echo $this->_tpl_vars['email_admin']; ?>
">напишите нам</a>, указав адрес страницы.</p>
				<p><a href="/">Вернуться главную страницу</a></p>
			</div>
		</div>
	</div>
	<div id="clearfooter"></div>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer_only.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

