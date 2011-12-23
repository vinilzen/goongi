<?php /* Smarty version 2.6.14, created on 2011-12-23 18:06:24
         compiled from mf_gifts_send.tpl */
?><?php
SELanguage::load();
?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  <h1>подарки</h1>
    <div class="crumb">
        <a href="#">Главная</a>
        <a href="<?php echo $this->_tpl_vars['url']->url_create('profile',$this->_tpl_vars['user']->user_info['user_username']); ?>
">Профиль</a>
        <span>Подарки</span>
    </div>
    <div class="buttons">
        <div class="show"><span>Показать:</span>
            <a href="mf_gifts_user.php?gif_change=1">Мои подарки</a>
            <a href="mf_gifts_user.php?gif_change=2">Отправленные</a>
            <a href="mf_gifts_send.php">Отправить подарок</a>
                   </div>
    </div>

<form action='mf_gifts_send.php' method='POST' target="ajaxframe">
 <div class="gifts">
        <?php $_from = $this->_tpl_vars['gift_vars']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cid'] => $this->_tpl_vars['con']):
?>
            <a id = "<?php echo $this->_tpl_vars['con']['id']; ?>
" class = "add_gif">
                <img src="mf_gifts/<?php echo $this->_tpl_vars['con']['id']; ?>
_thumb.<?php echo $this->_tpl_vars['con']['filetype']; ?>
" alt="" />
             </a>
        <?php endforeach; endif; unset($_from); ?>
    </div>
</form>
</div>
  
 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

