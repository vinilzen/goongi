<?php /* Smarty version 2.6.14, created on 2011-12-27 17:14:43
         compiled from admin_ads.tpl */
?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'admin_ads.tpl', 17, false),array('function', 'cycle', 'admin_ads.tpl', 50, false),)), $this);
?><?php
SELanguage::_preload_multi(10,394,385,395,87,258,259,396,397,398,153,402,404,405,403,187,399,400,155,401,406,407,175,39);
SELanguage::load();
?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin_header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<h2><?php echo SELanguage::_get(10); ?></h2>
<?php echo SELanguage::_get(394); ?>
<br />
<br />

<table cellpadding='0' cellspacing='0' width='100%'>
<tr>
<td>
  <form action='admin_ads_modify.php' method='get'>
  <input type='submit' class='button' value='<?php echo SELanguage::_get(385); ?>'>&nbsp;
  </form>
</td>
<?php if (count($this->_tpl_vars['ads']) > 0): ?>
  <td align='right'>
    <form action='admin_ads.php' method='get'>
    <input type='submit' class='button' value='<?php echo SELanguage::_get(395); ?>'>
    </form>
  </td>
<?php endif; ?>
</tr>
</table>

<br>

<table cellpadding='0' cellspacing='0' class='list' width='100%'>
<tr>
<td class='header' width='10'><a class='header' href='admin_ads.php?s=<?php echo $this->_tpl_vars['i']; ?>
'><?php echo SELanguage::_get(87); ?></a>&nbsp;</td>
<td class='header' width='100%'><a class='header' href='admin_ads.php?s=<?php echo $this->_tpl_vars['n']; ?>
'><?php echo SELanguage::_get(258); ?></a>&nbsp;</td>
<td class='header' align='center'><?php echo SELanguage::_get(259); ?>&nbsp;</td>
<td class='header' align='center' align='center'><a class='header' href='admin_ads.php?s=<?php echo $this->_tpl_vars['v']; ?>
'><?php echo SELanguage::_get(396); ?></a>&nbsp;</td>
<td class='header' align='center' align='center'><a class='header' href='admin_ads.php?s=<?php echo $this->_tpl_vars['c']; ?>
'><?php echo SELanguage::_get(397); ?></a>&nbsp;</td>
<td class='header' align='center' align='center'><?php echo SELanguage::_get(398); ?>&nbsp;</td>
<td class='header' nowrap='nowrap' width='10'><?php echo SELanguage::_get(153); ?></td>
</tr>
  <?php unset($this->_sections['ad_loop']);
$this->_sections['ad_loop']['name'] = 'ad_loop';
$this->_sections['ad_loop']['loop'] = is_array($_loop=$this->_tpl_vars['ads']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['ad_loop']['show'] = true;
$this->_sections['ad_loop']['max'] = $this->_sections['ad_loop']['loop'];
$this->_sections['ad_loop']['step'] = 1;
$this->_sections['ad_loop']['start'] = $this->_sections['ad_loop']['step'] > 0 ? 0 : $this->_sections['ad_loop']['loop']-1;
if ($this->_sections['ad_loop']['show']) {
    $this->_sections['ad_loop']['total'] = $this->_sections['ad_loop']['loop'];
    if ($this->_sections['ad_loop']['total'] == 0)
        $this->_sections['ad_loop']['show'] = false;
} else
    $this->_sections['ad_loop']['total'] = 0;
if ($this->_sections['ad_loop']['show']):

            for ($this->_sections['ad_loop']['index'] = $this->_sections['ad_loop']['start'], $this->_sections['ad_loop']['iteration'] = 1;
                 $this->_sections['ad_loop']['iteration'] <= $this->_sections['ad_loop']['total'];
                 $this->_sections['ad_loop']['index'] += $this->_sections['ad_loop']['step'], $this->_sections['ad_loop']['iteration']++):
$this->_sections['ad_loop']['rownum'] = $this->_sections['ad_loop']['iteration'];
$this->_sections['ad_loop']['index_prev'] = $this->_sections['ad_loop']['index'] - $this->_sections['ad_loop']['step'];
$this->_sections['ad_loop']['index_next'] = $this->_sections['ad_loop']['index'] + $this->_sections['ad_loop']['step'];
$this->_sections['ad_loop']['first']      = ($this->_sections['ad_loop']['iteration'] == 1);
$this->_sections['ad_loop']['last']       = ($this->_sections['ad_loop']['iteration'] == $this->_sections['ad_loop']['total']);
?>
    <?php if ($this->_tpl_vars['ads'][$this->_sections['ad_loop']['index']]['ad_total_views'] == 0): ?>
      <?php $this->assign('ad_views', "<font style='color: #AAAAAA;'>---</font>"); ?>
    <?php else: ?>
      <?php $this->assign('ad_views', $this->_tpl_vars['ads'][$this->_sections['ad_loop']['index']]['ad_total_views']); ?>
    <?php endif; ?>
    <?php if ($this->_tpl_vars['ads'][$this->_sections['ad_loop']['index']]['ad_total_clicks'] == 0): ?>
      <?php $this->assign('ad_clicks', "<font style='color: #AAAAAA;'>---</font>"); ?>
    <?php else: ?>
      <?php $this->assign('ad_clicks', $this->_tpl_vars['ads'][$this->_sections['ad_loop']['index']]['ad_total_clicks']); ?>
    <?php endif; ?>
    <tr class='<?php echo smarty_function_cycle(array('values' => "background1,background2"), $this);?>
'>
    <td class='item'><?php echo $this->_tpl_vars['ads'][$this->_sections['ad_loop']['index']]['ad_id']; ?>
&nbsp;</td>
    <td class='item'><?php echo $this->_tpl_vars['ads'][$this->_sections['ad_loop']['index']]['ad_name']; ?>
&nbsp;</td>
    <td class='item' nowrap='nowrap' align='center'><?php if ($this->_tpl_vars['ads'][$this->_sections['ad_loop']['index']]['ad_paused'] == 1): 
 echo SELanguage::_get(402); 
 elseif ($this->_tpl_vars['ads'][$this->_sections['ad_loop']['index']]['ad_date_start'] > $this->_tpl_vars['nowdate']): 
 echo SELanguage::_get(404); 
 elseif ($this->_tpl_vars['ads'][$this->_sections['ad_loop']['index']]['ad_date_end'] < $this->_tpl_vars['nowdate'] && $this->_tpl_vars['ads'][$this->_sections['ad_loop']['index']]['ad_date_end'] != 0): 
 echo SELanguage::_get(405); 
 else: 
 echo SELanguage::_get(403); 
 endif; ?>&nbsp;</td>
    <td class='item' align='center'><?php echo $this->_tpl_vars['ad_views']; ?>
&nbsp;</td>
    <td class='item' align='center'><?php echo $this->_tpl_vars['ad_clicks']; ?>
&nbsp;</td>
    <td class='item' align='center'><?php echo $this->_tpl_vars['ads'][$this->_sections['ad_loop']['index']]['ad_ctr']; ?>
&nbsp;</td>
    <td class='item' nowrap='nowrap'>
      [ <a href='admin_ads_modify.php?ad_id=<?php echo $this->_tpl_vars['ads'][$this->_sections['ad_loop']['index']]['ad_id']; ?>
'><?php echo SELanguage::_get(187); ?></a> ] 
      <?php if ($this->_tpl_vars['ads'][$this->_sections['ad_loop']['index']]['ad_paused'] == 0): ?>
        [ <a href='admin_ads.php?task=pause&ad_id=<?php echo $this->_tpl_vars['ads'][$this->_sections['ad_loop']['index']]['ad_id']; ?>
'><?php echo SELanguage::_get(399); ?></a> ] 
      <?php elseif ($this->_tpl_vars['ads'][$this->_sections['ad_loop']['index']]['ad_paused'] == 1): ?>
        [ <a href='admin_ads.php?task=unpause&ad_id=<?php echo $this->_tpl_vars['ads'][$this->_sections['ad_loop']['index']]['ad_id']; ?>
'><?php echo SELanguage::_get(400); ?></a> ] 
      <?php endif; ?>
      [ <a href="javascript:confirmDelete('<?php echo $this->_tpl_vars['ads'][$this->_sections['ad_loop']['index']]['ad_id']; ?>
');"><?php echo SELanguage::_get(155); ?></a> ]
    </td>
  <?php endfor; else: ?>
    <tr>
    <td colspan='6' class='stat2' align='center'>
      <?php echo SELanguage::_get(401); ?>
    </td>
    </tr>
  <?php endif; ?>
</table>

</td>
</tr>
</table>


<?php echo '
<script type="text/javascript">
<!-- 
var ad_id = 0;
function confirmDelete(id) {
  ad_id = id;
  TB_show(\''; 
 echo SELanguage::_get(406); 
 echo '\', \'#TB_inline?height=150&width=300&inlineId=confirmdelete\', \'\', \'../images/trans.gif\');

}

function deleteAd() {
  window.location = \'admin_ads.php?task=delete&ad_id=\'+ad_id;
}


//-->
</script>
'; ?>



<div style='display: none;' id='confirmdelete'>
  <div style='margin-top: 10px;'>
    <?php echo SELanguage::_get(407); ?>
  </div>
  <br>
  <input type='button' class='button' value='<?php echo SELanguage::_get(175); ?>' onClick='parent.TB_remove();parent.deleteAd();'> <input type='button' class='button' value='<?php echo SELanguage::_get(39); ?>' onClick='parent.TB_remove();'>
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'admin_footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>