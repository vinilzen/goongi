<?php /* Smarty version 2.6.14, created on 2011-11-01 17:00:19
         compiled from user_messages_new.tpl */
?><?php
SELanguage::_preload_multi(804,789,601,790,520,521,791,39);
SELanguage::load();
?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header_global.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>



<br />

    <?php echo '
  <script type="text/javascript">
  <!-- 
  var tos = new Array();
  window.addEvent(\'domready\', function(){
	var options = {
		script:"misc_js.php?task=suggest_friend&limit=5&",
		varname:"input",
		json:true,
		shownoresults:false,
		maxresults:5,
		blurtrigger:true,
		callback: function (obj) {
		  '; 
 if ($this->_tpl_vars['setting']['setting_username']): ?>obj.id = obj.value;<?php endif; 
 echo '
		  if(obj.id != \'\' && tos.indexOf(obj.id) == -1 && tos.length < '; 
 echo $this->_tpl_vars['user']->level_info['level_message_recipients']; 
 echo ') { checkUser(obj); } else { $(\'to_display\').value = \'\'; }
		}
	};
	var as_json = new bsn.AutoSuggest(\'to_display\', options);

	'; 
 if ($this->_tpl_vars['to_user'] != ""): 
 echo '
	  tos.splice(tos.length, 0, \''; 
 echo $this->_tpl_vars['to_id']; 
 echo '\');
	  var newDiv = document.createElement(\'div\');
	  newDiv.id = \'to_'; 
 echo $this->_tpl_vars['to_id']; 
 echo '\';
	  newDiv.innerHTML = "'; 
 echo $this->_tpl_vars['to_user']; 
 echo '<img src=\'./images/icons/action_delete2.gif\' class=\'icon\' style=\'cursor:pointer;\' onClick=\'removeTo(\\"'; 
 echo $this->_tpl_vars['to_id']; 
 echo '\\")\' border=\'0\'>";
	  $(\'tos\').insertBefore(newDiv, $(\'to_display\'));
	'; 
 endif; 
 echo '
  });
  window.addEvent(\'load\', function(){
	setTimeout("'; 
 if ($this->_tpl_vars['to_user'] == ""): ?>$('to_display').focus();<?php else: ?>$('subject').focus();<?php endif; 
 echo '", "300");
  });
  function addTo(obj) {
    tos.splice(tos.length, 0, obj.id);
    var newDiv = document.createElement(\'div\');
    newDiv.id = \'to_\'+obj.id;
    newDiv.innerHTML = obj.value+"<img src=\'./images/icons/action_delete2.gif\' class=\'icon\' style=\'cursor:pointer;\' onClick=\'removeTo(\\""+obj.id+"\\")\' border=\'0\'>";
    $(\'tos\').insertBefore(newDiv, $(\'to_display\'));
    $(\'to_display\').value = \'\';
  }
  function removeTo(id) {
    tos.splice(tos.indexOf(id), 1);
    $(\'tos\').removeChild($(\'to_\'+id));
  }
  function fillToIds() {
    $(\'to\').value = tos.join(\';\');
  }
  function checkUser(obj) {
    var url = \'misc_js.php?task='; 
 if ($this->_tpl_vars['user']->level_info['level_message_allow'] == 1): ?>check_friend<?php else: ?>check_user<?php endif; 
 echo '&input=\'+obj.id;
    var request = new Request.JSON({secure: false, url: url,
		onComplete: function(jsonObj) {
			if(jsonObj.user_exists == 1) {
			  addTo(obj);
			} else {
			  $(\'to_display\').value = \'\';
			}
		}
    }).send();
  }

  // THIS FUNCTION PREVENTS THE ENTER KEY FROM SUBMITTING THE FORM
  function noenter(e) { 
	if (window.event) keycode = window.event.keyCode;
	else if (e) keycode = e.which;
	if(keycode == 13) {
	  return false;
	}
  }

  // THIS FUNCTION SHOWS THE ERROR OR SUCCESS MESSAGE
  function messageSent(is_error, error_message) {
    if(is_error != 0) {
      $(\'error_div\').style.display = \'block\';
      $(\'error_message\').innerHTML = error_message;
    } else {
      $(\'form_div\').style.display = \'none\';
      $(\'success_div\').style.display = \'block\';
      setTimeout("window.parent.TB_remove();", "1000");
    }
  }
  //-->
  </script>
  '; ?>



  <div id='success_div' style='display: none;'><br><?php echo SELanguage::_get(804); ?></div>

  <div id='form_div'>
  <div style='text-align:left; padding-left: 10px;'>
  <?php echo sprintf(SELanguage::_get(789), $this->_tpl_vars['user']->level_info['level_message_recipients']); ?>

    <div id='error_div' style='display: none;'>
    <br>
    <table cellpadding='0' cellspacing='0'>
    <tr><td class='error'>
      <img src='./images/error.gif' border='0' class='icon'> <span id='error_message'></span>
    </td></tr>
    </table>
  </div>
  </div>

  <form action='user_messages_new.php' method='POST' target='ajaxframe' onSubmit='fillToIds()'>
  <table cellpadding='0' cellspacing='0'>
  <tr>
  <td class='form1'><?php echo SELanguage::_get(601); ?></td>
  <td class='form2' valign='bottom' align='left'><b><a href='<?php echo $this->_tpl_vars['url']->url_create('profile',$this->_tpl_vars['user']->user_info['user_username']); ?>
' target='_parent'><?php echo $this->_tpl_vars['user']->user_displayname; ?>
</a></b></td>
  </tr>
  <tr>
  <td class='form1' valign='top'><?php echo SELanguage::_get(790); ?></td>
  <td class='form2' valign='top' align='left' style='position: relative;'>
    <div id='tos' style='border: 1px solid #AAAAAA;font-family: arial, verdana, serif;font-size: 12px;color: #333333;vertical-align: middle;padding-left: 2px;width:178px;'>
      <input type='text' style='border: none; width: 175px;' name='to_display' id='to_display' value='' size='25'>
    </div>
    <input type='hidden' name='to' id='to' value=''>
  </td>
  </tr>
  <tr>
  <td class='form1'><?php echo SELanguage::_get(520); ?></td>
  <td class='form2' align='left'><input type='text' class='text' name='subject' id='subject' value='<?php echo $this->_tpl_vars['subject']; ?>
' size='30' maxlength='100'></td>
  </tr>
  <tr>
  <td class='form1'><?php echo SELanguage::_get(521); ?></td>
  <td class='form2' align='left'><textarea rows='10' cols='50' style='width:350px;' name='message'><?php echo $this->_tpl_vars['message']; ?>
</textarea></td>
  </tr>
  <tr>
  <td class='form1'>&nbsp;</td>
  <td class='form2' align='left'>
    <table cellpadding='0' cellspacing='0'>
    <tr>
    <td><input type='submit' class='button' value='<?php echo SELanguage::_get(791); ?>'>&nbsp;</td>
    <input type='hidden' name='task' value='send'>
    <td><input type='button' class='button' value='<?php echo SELanguage::_get(39); ?>' onClick='parent.TB_remove();'></td>
    </tr>
    </table>
  </td>
  </tr>
  </table>
  </form>
  </div>


</body>
</html>