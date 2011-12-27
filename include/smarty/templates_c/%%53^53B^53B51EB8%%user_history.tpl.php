<?php /* Smarty version 2.6.14, created on 2011-12-23 18:46:13
         compiled from user_history.tpl */
?><?php
SELanguage::_preload_multi(652);
SELanguage::load();
?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<h1>История рода</h1>
<div class="crumb">
	<a href="/#">Главная</a>
	<a href="<?php echo $this->_tpl_vars['url']->url_create('profile',$this->_tpl_vars['user']->user_info['user_username']); ?>
"><?php echo SELanguage::_get(652); ?></a>
	<span>История рода</span>
</div>



<?php if ($this->_tpl_vars['user']->level_info['level_history_create']): ?>
    <?php if (! $this->_tpl_vars['total_historyentries']): ?>

    <div class="buttons">
	<span class="button2"><span class="l">&nbsp;</span><span class="c">
        <a href='user_history_entry.php'>Написать историю</a></span>
        <span class="r">&nbsp;</span></span>
    </div>
    


    <?php else: ?>
    
   
     
            <form action='user_history.php' name='entryform' method='post'>
      <?php unset($this->_sections['historyentry_loop']);
$this->_sections['historyentry_loop']['name'] = 'historyentry_loop';
$this->_sections['historyentry_loop']['loop'] = is_array($_loop=$this->_tpl_vars['historyentries']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['historyentry_loop']['show'] = true;
$this->_sections['historyentry_loop']['max'] = $this->_sections['historyentry_loop']['loop'];
$this->_sections['historyentry_loop']['step'] = 1;
$this->_sections['historyentry_loop']['start'] = $this->_sections['historyentry_loop']['step'] > 0 ? 0 : $this->_sections['historyentry_loop']['loop']-1;
if ($this->_sections['historyentry_loop']['show']) {
    $this->_sections['historyentry_loop']['total'] = $this->_sections['historyentry_loop']['loop'];
    if ($this->_sections['historyentry_loop']['total'] == 0)
        $this->_sections['historyentry_loop']['show'] = false;
} else
    $this->_sections['historyentry_loop']['total'] = 0;
if ($this->_sections['historyentry_loop']['show']):

            for ($this->_sections['historyentry_loop']['index'] = $this->_sections['historyentry_loop']['start'], $this->_sections['historyentry_loop']['iteration'] = 1;
                 $this->_sections['historyentry_loop']['iteration'] <= $this->_sections['historyentry_loop']['total'];
                 $this->_sections['historyentry_loop']['index'] += $this->_sections['historyentry_loop']['step'], $this->_sections['historyentry_loop']['iteration']++):
$this->_sections['historyentry_loop']['rownum'] = $this->_sections['historyentry_loop']['iteration'];
$this->_sections['historyentry_loop']['index_prev'] = $this->_sections['historyentry_loop']['index'] - $this->_sections['historyentry_loop']['step'];
$this->_sections['historyentry_loop']['index_next'] = $this->_sections['historyentry_loop']['index'] + $this->_sections['historyentry_loop']['step'];
$this->_sections['historyentry_loop']['first']      = ($this->_sections['historyentry_loop']['iteration'] == 1);
$this->_sections['historyentry_loop']['last']       = ($this->_sections['historyentry_loop']['iteration'] == $this->_sections['historyentry_loop']['total']);
?>
		<div class="buttons">
                    <span class="button2"><span class="l">&nbsp;</span><span class="c">
				<a onclick = "check_history(<?php echo $this->_tpl_vars['historyentries'][$this->_sections['historyentry_loop']['index']]['historyentry_id']; ?>
);">Редактировать</a>
			</span><span class="r">&nbsp;</span></span>
					</div>
             <h1> <?php echo $this->_tpl_vars['historyentries'][$this->_sections['historyentry_loop']['index']]['historyentry_title']; ?>
</h1>
              
                <?php if (! empty ( $this->_tpl_vars['historyentries'][$this->_sections['historyentry_loop']['index']]['historyentry_body'] )): ?>
                    <?php echo $this->_tpl_vars['historyentries'][$this->_sections['historyentry_loop']['index']]['historyentry_body']; ?>

                <?php endif; ?>
      <?php endfor; endif; ?>
     
      
        </form>
    <?php endif; ?>
  
<?php endif; 
 $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>