<?php /* Smarty version 2.6.14, created on 2011-12-05 12:28:26
         compiled from profile_event.tpl */
?><?php
SELanguage::_preload_multi(3000244);
SELanguage::load();
?>

<table cellpadding='0' cellspacing='0' width='100%' style='margin-bottom: 10px;'>
  <tr>
    <td class='header'><?php echo SELanguage::_get(3000244); ?></td>
  </tr>
  <tr>
    <td class='profile'>
      <iframe name='calendarframe' id='calendarframe' src="<?php echo $this->_tpl_vars['url']->url_base; ?>
/profile_event_calendar.php?user=<?php echo $this->_tpl_vars['owner']->user_info['user_username']; ?>
" width="100%" height='100%' scrolling='no' frameborder='0' style="height:175px;"></iframe>
    </td>
  </tr>
</table>

<p id='show_events' style='display: none;'></p>
<?php echo '
<script type=\'text/javascript\'>
<!--
function se_popup(id1, height) {
  table = parent.frames[\'calendarframe\'].document.getElementById(id1);
  $(\'show_events\').innerHTML = \'<table cellspacing="0" cellpadding="0" id="profile_event_popup" class="profile_event_popup">\'+table.innerHTML+\'</table>\';
  TB_show(\'\', \'#TB_inline?height=\'+height+\'&width=560&inlineId=profile_event_popup\', \'\', \'./images/trans.gif\');
}
//-->
</script>
'; ?>
