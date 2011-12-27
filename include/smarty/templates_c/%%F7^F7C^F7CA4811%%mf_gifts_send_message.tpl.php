<?php /* Smarty version 2.6.14, created on 2011-12-23 18:06:26
         compiled from mf_gifts_send_message.tpl */
?><?php
SELanguage::_preload_multi(804,789,601,80000033,831,38);
SELanguage::load();
?>﻿<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header_global.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>



<br />
<!-- il -->

   <div id='success_div' style='display: none;'><br><?php echo SELanguage::_get(804); ?></div>

  <div id='form_div'>
  <div style='text-align:left; padding-left: 10px;'>
 <!--  <?php echo sprintf(SELanguage::_get(789), $this->_tpl_vars['user']->level_info['level_message_recipients']); ?> -->

    <div id='error_div' style='display: none;'>
    <br>
    <table cellpadding='0' cellspacing='0'>
    <tr><td class='error'>
      <span id='error_message'></span>
    </td></tr>
    </table>
  </div>
  </div>

<form action=' method='POST' onSubmit='my_sender(); return false;' target='ajaxframe'><!-- user_messages_new.php -->
	<div style="float:left;width:118px; margin-right:17px; overflow:hidden;">
		<a target='_blank' href="<?php echo $this->_tpl_vars['url']->url_create('profile',$this->_tpl_vars['user']->user_info['user_username']); ?>
" title="<?php echo $this->_tpl_vars['user']->user_displayname; ?>
">
			<div id= "picture_gif"></div>
		</a>
	</div>
            <!--
                      
            <div class="clear"></div>
            <div class="input">
            <textarea rows="3" cols="10" name="text" onblur="if (this.value == '') ">Введите ваше сообщение</textarea></div>
            <div class="button"><span class="button2"><span class="l">&nbsp;</span><span class="c">
				<input type="submit" value="Отправить" name="send"  />
			</span><span class="r">&nbsp;</span></span></div>
			-->
			<!-- <?php echo SELanguage::_get(601); ?> -->
                
                <label>Получатель</label>
                        <select name='to_display' id='to_display'>
                                  <option value="0"><?php echo SELanguage::_get(80000033); ?></option>
                          <?php unset($this->_sections['friend_loop']);
$this->_sections['friend_loop']['name'] = 'friend_loop';
$this->_sections['friend_loop']['loop'] = is_array($_loop=$this->_tpl_vars['friends']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['friend_loop']['show'] = true;
$this->_sections['friend_loop']['max'] = $this->_sections['friend_loop']['loop'];
$this->_sections['friend_loop']['step'] = 1;
$this->_sections['friend_loop']['start'] = $this->_sections['friend_loop']['step'] > 0 ? 0 : $this->_sections['friend_loop']['loop']-1;
if ($this->_sections['friend_loop']['show']) {
    $this->_sections['friend_loop']['total'] = $this->_sections['friend_loop']['loop'];
    if ($this->_sections['friend_loop']['total'] == 0)
        $this->_sections['friend_loop']['show'] = false;
} else
    $this->_sections['friend_loop']['total'] = 0;
if ($this->_sections['friend_loop']['show']):

            for ($this->_sections['friend_loop']['index'] = $this->_sections['friend_loop']['start'], $this->_sections['friend_loop']['iteration'] = 1;
                 $this->_sections['friend_loop']['iteration'] <= $this->_sections['friend_loop']['total'];
                 $this->_sections['friend_loop']['index'] += $this->_sections['friend_loop']['step'], $this->_sections['friend_loop']['iteration']++):
$this->_sections['friend_loop']['rownum'] = $this->_sections['friend_loop']['iteration'];
$this->_sections['friend_loop']['index_prev'] = $this->_sections['friend_loop']['index'] - $this->_sections['friend_loop']['step'];
$this->_sections['friend_loop']['index_next'] = $this->_sections['friend_loop']['index'] + $this->_sections['friend_loop']['step'];
$this->_sections['friend_loop']['first']      = ($this->_sections['friend_loop']['iteration'] == 1);
$this->_sections['friend_loop']['last']       = ($this->_sections['friend_loop']['iteration'] == $this->_sections['friend_loop']['total']);
?>
                                  <option value="<?php echo $this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->user_info['user_id']; ?>
"><?php echo $this->_tpl_vars['friends'][$this->_sections['friend_loop']['index']]->user_displayname; ?>
</option>
                           <?php endfor; endif; ?>
                        </select>
               
<input type='hidden' name='to' id='to' value='' />
<?php echo '
<script type="text/javascript">
	var options, a;
	$(function(){
	  options = { serviceUrl:\'users.php\' };
	  a = $(\'#to_display\').autocomplete(options);
	});
</script>
'; ?>



<div class="clear"></div>


<div class="input"><textarea onblur="if (this.value == '') this.value='<?php echo SELanguage::_get(831); ?>'; if (this.value == '') this.style.color='#7f7f7f';"  onfocus="if (this.value == '<?php echo SELanguage::_get(831); ?>') this.value =''; if (this.value == '<?php echo SELanguage::_get(831); ?>') this.style.color='#000';" rows='3' cols='10' id='message' name='message'><?php if (strlen ( $this->_tpl_vars['message'] )): 
 echo $this->_tpl_vars['message']; 
 endif; 
 if (! strlen ( $this->_tpl_vars['message'] )): 
 echo SELanguage::_get(831); 
 endif; ?></textarea></div>
<div class="button"><span class="button2"><span class="l">&nbsp;</span><span class="c"><input type='submit' class='button' value='<?php echo SELanguage::_get(38); ?>' /></span><span class="r">&nbsp;</span></span></div>
<input type='hidden' name='task' value='send' />

</form>
<?php echo '
<script type="text/javascript">
function my_sender() {
	$.post(
		"mf_gifts_send_message.php",
		{ gift_id: $(\'#id_g\').attr(\'value\'), to: $(\'#to_display\').attr(\'value\'), subject: $(\'#subject\').attr(\'value\') , message: $(\'#message\').attr(\'value\'),task:\'send\',private:\'0\' },
		function(data) {
		$(\'#add_msg_b_g\').html(\'<h1>\' + data + \'</h1>\');
			setTimeout ( function() {
				$(\'#popup\').fadeOut(300);
				$(\'.window\').hide();
				e.preventDefault();
			}, 1500);
		}
	);
}
</script>
'; ?>


</div>


</body>
</html>