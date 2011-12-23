<?php /* Smarty version 2.6.14, created on 2011-12-23 17:29:09
         compiled from user_vizitki.tpl */
?><?php
SELanguage::load();
?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<h1>мои визитки</h1>
        <div class="crumb">
            <a href="#">Главная</a>
            <a href="#">Профиль</a>
            <span>Мои визитки</span>
        </div>

  <form method = "post" action ="user_vizitki_entry.php">
        <div class="buttons">
            <span class="button2"><span class="l">&nbsp;</span><span class="c">
            <input type="submit" value="Создать визитку" name="creat" /></a>
            </span><span class="r">&nbsp;</span></span>
    </div>
 </form>

 <ul class="visitka_list">
<?php unset($this->_sections['vizitkientry_loop']);
$this->_sections['vizitkientry_loop']['name'] = 'vizitkientry_loop';
$this->_sections['vizitkientry_loop']['loop'] = is_array($_loop=$this->_tpl_vars['vizitkientries']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['vizitkientry_loop']['show'] = true;
$this->_sections['vizitkientry_loop']['max'] = $this->_sections['vizitkientry_loop']['loop'];
$this->_sections['vizitkientry_loop']['step'] = 1;
$this->_sections['vizitkientry_loop']['start'] = $this->_sections['vizitkientry_loop']['step'] > 0 ? 0 : $this->_sections['vizitkientry_loop']['loop']-1;
if ($this->_sections['vizitkientry_loop']['show']) {
    $this->_sections['vizitkientry_loop']['total'] = $this->_sections['vizitkientry_loop']['loop'];
    if ($this->_sections['vizitkientry_loop']['total'] == 0)
        $this->_sections['vizitkientry_loop']['show'] = false;
} else
    $this->_sections['vizitkientry_loop']['total'] = 0;
if ($this->_sections['vizitkientry_loop']['show']):

            for ($this->_sections['vizitkientry_loop']['index'] = $this->_sections['vizitkientry_loop']['start'], $this->_sections['vizitkientry_loop']['iteration'] = 1;
                 $this->_sections['vizitkientry_loop']['iteration'] <= $this->_sections['vizitkientry_loop']['total'];
                 $this->_sections['vizitkientry_loop']['index'] += $this->_sections['vizitkientry_loop']['step'], $this->_sections['vizitkientry_loop']['iteration']++):
$this->_sections['vizitkientry_loop']['rownum'] = $this->_sections['vizitkientry_loop']['iteration'];
$this->_sections['vizitkientry_loop']['index_prev'] = $this->_sections['vizitkientry_loop']['index'] - $this->_sections['vizitkientry_loop']['step'];
$this->_sections['vizitkientry_loop']['index_next'] = $this->_sections['vizitkientry_loop']['index'] + $this->_sections['vizitkientry_loop']['step'];
$this->_sections['vizitkientry_loop']['first']      = ($this->_sections['vizitkientry_loop']['iteration'] == 1);
$this->_sections['vizitkientry_loop']['last']       = ($this->_sections['vizitkientry_loop']['iteration'] == $this->_sections['vizitkientry_loop']['total']);
?>
    <li id = "vizitka_<?php echo $this->_tpl_vars['vizitkientries'][$this->_sections['vizitkientry_loop']['index']]['vizitkientry_id']; ?>
">
    <strong><?php echo $this->_tpl_vars['vizitkientries'][$this->_sections['vizitkientry_loop']['index']]['vizitkientry_title']; ?>
</strong><span><?php echo $this->_tpl_vars['vizitkientries'][$this->_sections['vizitkientry_loop']['index']]['vizitkientry_category']; ?>
</span>
    <p><img src="uploads_vizitki/<?php echo $this->_tpl_vars['vizitkientries'][$this->_sections['vizitkientry_loop']['index']]['vizitkientry_id']; ?>
vizitki_thumb.jpg" alt="" /></p>
    <p><?php echo $this->_tpl_vars['vizitkientries'][$this->_sections['vizitkientry_loop']['index']]['vizitkientry_body']; ?>
<br /><strong>от <?php echo $this->_tpl_vars['vizitkientries'][$this->_sections['vizitkientry_loop']['index']]['vizitkientry_price']; ?>
 руб.</strong></p>
    <p><?php echo $this->_tpl_vars['vizitkientries'][$this->_sections['vizitkientry_loop']['index']]['vizitkientry_telephon']; ?>
<br />
    <?php echo $this->_tpl_vars['vizitkientries'][$this->_sections['vizitkientry_loop']['index']]['vizitkientry_email']; ?>
<br />
    <a href="#"><?php echo $this->_tpl_vars['vizitkientries'][$this->_sections['vizitkientry_loop']['index']]['vizitkientry_site']; ?>
</a></p>
    <p><a href = "user_vizitki_entry.php?vizitkientry_id=<?php echo $this->_tpl_vars['vizitkientries'][$this->_sections['vizitkientry_loop']['index']]['vizitkientry_id']; ?>
">редактировать</a>
     <a href="#" onclick="delete_vizitka('deletevizitka',<?php echo $this->_tpl_vars['vizitkientries'][$this->_sections['vizitkientry_loop']['index']]['vizitkientry_id']; ?>
); return false;" class="del">удалить</a></p>
</li>
<?php endfor; endif; ?>
</ul>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>