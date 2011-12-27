<?php /* Smarty version 2.6.14, created on 2011-12-23 18:06:18
         compiled from mf_gifts_user.tpl */
?><?php
SELanguage::_preload_multi(80000029);
SELanguage::load();
?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <h1>подарки</h1>
    <div class="crumb">
        <a href="#">Главная</a>
        <a href="<?php echo $this->_tpl_vars['url']->url_create('profile',$this->_tpl_vars['user']->user_info['user_username']); ?>
">Профиль</a>
        <span>Подарки</span></div>
    <div class="buttons">
        <div class="show"><span>Показать:</span>
            <a href="mf_gifts_user.php?gif_change=1">Мои подарки</a>
            <a href="mf_gifts_user.php?gif_change=2">Отправленные</a>
            <a href="mf_gifts_send.php">Отправить подарок</a>
                   </div>

    </div>
<?php if ($this->_tpl_vars['flag'] == 1): 
 else: ?>
<div class='page_header'>
<a href='<?php echo $this->_tpl_vars['url']->url_create('profile',$this->_tpl_vars['owner']); ?>
'><?php echo sprintf(SELanguage::_get(80000029), $this->_tpl_vars['owner']); ?></a>
</div>
<?php endif; ?>
   <ul class="gift">
  <?php $_from = $this->_tpl_vars['gifts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cid'] => $this->_tpl_vars['con']):
?>
    <li>
    <div class="inf">
         
           <a class="name" href='<?php echo $this->_tpl_vars['url']->url_create('profile',$this->_tpl_vars['con']['from']->user_info['user_username']); ?>
'>
           <?php echo $this->_tpl_vars['con']['from']->user_displayname; ?>
</a> 
          <a href="mf_gifts_send.php" class="del">Отправить подарок в ответ</a>
          <a id="add_msg" href="#" class="edit">Написать сообщение</a>
          <span><?php echo $this->_tpl_vars['datetime']->cdate(($this->_tpl_vars['setting']['setting_dateformat']),$this->_tpl_vars['datetime']->timezone(($this->_tpl_vars['con']['date']),$this->_tpl_vars['global_timezone'])); ?>
</span>
          
    </div>
        <div class="gif">
            <p><?php echo $this->_tpl_vars['con']['message']; ?>
</p><br /><div>
            <img src="mf_gifts/<?php echo $this->_tpl_vars['con']['file']; ?>
_thumb.<?php echo $this->_tpl_vars['con']['filetype']; ?>
"></div>
        </div>
    </li>
  <?php endforeach; endif; unset($_from); ?>
</ul>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>