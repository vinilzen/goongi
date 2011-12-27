<?php /* Smarty version 2.6.14, created on 2011-12-23 17:30:17
         compiled from footer_death.tpl */
?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'footer_death.tpl', 28, false),)), $this);
?><?php
SELanguage::load();
?></div></div></div>

            <div class="left_small">
            	<div class="left_c">
					<!-- start USER MENU -->
					<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'menu_main.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
					<!-- end USER MENU -->
        </div>
    </div>
 
<div id="footer">
	<div class="foot_l">
    	<div class="foot_r">
            <div class="dis">Разработка сайта  – <a href="http://www.nineseven.ru" target="_blank">Nineseven</a></div>

            <div class="copy"><span>© 2008–2011 Goongi.com</span></div>
        </div>
    </div>
</div>

<div id="popup"></div>
<div class="window" id="svecha_list">
	<div class="close"></div>
    <h1>Свечу памяти зажгло <?php echo count($this->_tpl_vars['info_candle']); ?>
 человек</h1>
	<div class="w_c">
		<ul class="friend_list_w">
            <?php unset($this->_sections['count']);
$this->_sections['count']['name'] = 'count';
$this->_sections['count']['loop'] = is_array($_loop=$this->_tpl_vars['info_candle']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['count']['show'] = true;
$this->_sections['count']['max'] = $this->_sections['count']['loop'];
$this->_sections['count']['step'] = 1;
$this->_sections['count']['start'] = $this->_sections['count']['step'] > 0 ? 0 : $this->_sections['count']['loop']-1;
if ($this->_sections['count']['show']) {
    $this->_sections['count']['total'] = $this->_sections['count']['loop'];
    if ($this->_sections['count']['total'] == 0)
        $this->_sections['count']['show'] = false;
} else
    $this->_sections['count']['total'] = 0;
if ($this->_sections['count']['show']):

            for ($this->_sections['count']['index'] = $this->_sections['count']['start'], $this->_sections['count']['iteration'] = 1;
                 $this->_sections['count']['iteration'] <= $this->_sections['count']['total'];
                 $this->_sections['count']['index'] += $this->_sections['count']['step'], $this->_sections['count']['iteration']++):
$this->_sections['count']['rownum'] = $this->_sections['count']['iteration'];
$this->_sections['count']['index_prev'] = $this->_sections['count']['index'] - $this->_sections['count']['step'];
$this->_sections['count']['index_next'] = $this->_sections['count']['index'] + $this->_sections['count']['step'];
$this->_sections['count']['first']      = ($this->_sections['count']['iteration'] == 1);
$this->_sections['count']['last']       = ($this->_sections['count']['iteration'] == $this->_sections['count']['total']);
?>
                     <li>
                        <a href="<?php echo $this->_tpl_vars['url']->url_create('profile',$this->_tpl_vars['info_candle'][$this->_sections['count']['index']]['user_candle_name']); ?>
">
                        <img src="/uploads_user/1000/<?php echo $this->_tpl_vars['info_candle'][$this->_sections['count']['index']]['user_candle_id']; ?>
/<?php echo $this->_tpl_vars['info_candle'][$this->_sections['count']['index']]['user_candle_photo']; ?>
.jpg" alt="" /></a>
                        <a href="<?php echo $this->_tpl_vars['url']->url_create('profile',$this->_tpl_vars['info_candle'][$this->_sections['count']['index']]['user_candle_name']); ?>
"><?php echo $this->_tpl_vars['info_candle'][$this->_sections['count']['index']]['user_candle_name']; ?>
</a>
                    </li>
            <?php endfor; endif; ?>
        </ul>
        <div class="pager">
            <a href="#" class="prev">Сюда</a><a href="#" class="active">1</a><a href="#">2</a><a href="#">3</a><a href="#">4</a><a href="#">5</a><a href="#">6</a> ... <a href="#">99</a><a href="#" class="next">Туда</a>

        </div>
        <br />
    </div>
</div>

</body>
</html>