<?php /* Smarty version 2.6.14, created on 2011-11-21 14:49:57
         compiled from network.tpl */
?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'replace', 'network.tpl', 32, false),array('modifier', 'choptext', 'network.tpl', 32, false),array('function', 'cycle', 'network.tpl', 50, false),)), $this);
?><?php
SELanguage::_preload_multi(1155,738,666,1179,1177,1178);
SELanguage::load();
?>﻿<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>



<table cellpadding='0' cellspacing='0' width='100%'>
<tr>
<td valign='top'>

  <div class='page_header' style='margin-bottom: 7px;'><?php ob_start(); 
 echo SELanguage::_get($this->_tpl_vars['network']['subnet_name']); 
 $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('subnet_name', ob_get_contents());ob_end_clean(); 
 echo sprintf(SELanguage::_get(1155), $this->_tpl_vars['subnet_name']); ?></div>

    <div class='home_whatsnew'>

        <?php if ($this->_tpl_vars['ads']->ad_feed != ""): ?>
      <div class='home_action' style='display: block; visibility: visible; padding-bottom: 10px;'><?php echo $this->_tpl_vars['ads']->ad_feed; ?>
</div>
    <?php endif; ?>

    <?php unset($this->_sections['actions_loop']);
$this->_sections['actions_loop']['name'] = 'actions_loop';
$this->_sections['actions_loop']['loop'] = is_array($_loop=$this->_tpl_vars['actions']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['actions_loop']['show'] = true;
$this->_sections['actions_loop']['max'] = $this->_sections['actions_loop']['loop'];
$this->_sections['actions_loop']['step'] = 1;
$this->_sections['actions_loop']['start'] = $this->_sections['actions_loop']['step'] > 0 ? 0 : $this->_sections['actions_loop']['loop']-1;
if ($this->_sections['actions_loop']['show']) {
    $this->_sections['actions_loop']['total'] = $this->_sections['actions_loop']['loop'];
    if ($this->_sections['actions_loop']['total'] == 0)
        $this->_sections['actions_loop']['show'] = false;
} else
    $this->_sections['actions_loop']['total'] = 0;
if ($this->_sections['actions_loop']['show']):

            for ($this->_sections['actions_loop']['index'] = $this->_sections['actions_loop']['start'], $this->_sections['actions_loop']['iteration'] = 1;
                 $this->_sections['actions_loop']['iteration'] <= $this->_sections['actions_loop']['total'];
                 $this->_sections['actions_loop']['index'] += $this->_sections['actions_loop']['step'], $this->_sections['actions_loop']['iteration']++):
$this->_sections['actions_loop']['rownum'] = $this->_sections['actions_loop']['iteration'];
$this->_sections['actions_loop']['index_prev'] = $this->_sections['actions_loop']['index'] - $this->_sections['actions_loop']['step'];
$this->_sections['actions_loop']['index_next'] = $this->_sections['actions_loop']['index'] + $this->_sections['actions_loop']['step'];
$this->_sections['actions_loop']['first']      = ($this->_sections['actions_loop']['iteration'] == 1);
$this->_sections['actions_loop']['last']       = ($this->_sections['actions_loop']['iteration'] == $this->_sections['actions_loop']['total']);
?>
            <div id='action_<?php echo $this->_tpl_vars['actions'][$this->_sections['actions_loop']['index']]['action_id']; ?>
' class='home_action<?php if ($this->_sections['actions_loop']['first']): ?>_top<?php endif; ?>'>
        <table cellpadding='0' cellspacing='0'>
          <tr>
            <td valign='top'><img src='./images/icons/<?php echo $this->_tpl_vars['actions'][$this->_sections['actions_loop']['index']]['action_icon']; ?>
' border='0' class='icon'></td>
            <td valign='top' width='100%'>
              <?php $this->assign('action_date', $this->_tpl_vars['datetime']->time_since($this->_tpl_vars['actions'][$this->_sections['actions_loop']['index']]['action_date'])); ?>
              <div class='home_action_date'><?php echo sprintf(SELanguage::_get($this->_tpl_vars['action_date'][0]), $this->_tpl_vars['action_date'][1]); ?></div>
              <?php $this->assign('action_media', ''); ?>
              <?php if ($this->_tpl_vars['actions'][$this->_sections['actions_loop']['index']]['action_media'] !== FALSE): 
 ob_start(); 
 unset($this->_sections['action_media_loop']);
$this->_sections['action_media_loop']['name'] = 'action_media_loop';
$this->_sections['action_media_loop']['loop'] = is_array($_loop=$this->_tpl_vars['actions'][$this->_sections['actions_loop']['index']]['action_media']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['action_media_loop']['show'] = true;
$this->_sections['action_media_loop']['max'] = $this->_sections['action_media_loop']['loop'];
$this->_sections['action_media_loop']['step'] = 1;
$this->_sections['action_media_loop']['start'] = $this->_sections['action_media_loop']['step'] > 0 ? 0 : $this->_sections['action_media_loop']['loop']-1;
if ($this->_sections['action_media_loop']['show']) {
    $this->_sections['action_media_loop']['total'] = $this->_sections['action_media_loop']['loop'];
    if ($this->_sections['action_media_loop']['total'] == 0)
        $this->_sections['action_media_loop']['show'] = false;
} else
    $this->_sections['action_media_loop']['total'] = 0;
if ($this->_sections['action_media_loop']['show']):

            for ($this->_sections['action_media_loop']['index'] = $this->_sections['action_media_loop']['start'], $this->_sections['action_media_loop']['iteration'] = 1;
                 $this->_sections['action_media_loop']['iteration'] <= $this->_sections['action_media_loop']['total'];
                 $this->_sections['action_media_loop']['index'] += $this->_sections['action_media_loop']['step'], $this->_sections['action_media_loop']['iteration']++):
$this->_sections['action_media_loop']['rownum'] = $this->_sections['action_media_loop']['iteration'];
$this->_sections['action_media_loop']['index_prev'] = $this->_sections['action_media_loop']['index'] - $this->_sections['action_media_loop']['step'];
$this->_sections['action_media_loop']['index_next'] = $this->_sections['action_media_loop']['index'] + $this->_sections['action_media_loop']['step'];
$this->_sections['action_media_loop']['first']      = ($this->_sections['action_media_loop']['iteration'] == 1);
$this->_sections['action_media_loop']['last']       = ($this->_sections['action_media_loop']['iteration'] == $this->_sections['action_media_loop']['total']);
?><a href='<?php echo $this->_tpl_vars['actions'][$this->_sections['actions_loop']['index']]['action_media'][$this->_sections['action_media_loop']['index']]['actionmedia_link']; ?>
'><img src='<?php echo $this->_tpl_vars['actions'][$this->_sections['actions_loop']['index']]['action_media'][$this->_sections['action_media_loop']['index']]['actionmedia_path']; ?>
' border='0' width='<?php echo $this->_tpl_vars['actions'][$this->_sections['actions_loop']['index']]['action_media'][$this->_sections['action_media_loop']['index']]['actionmedia_width']; ?>
' class='recentaction_media'></a><?php endfor; endif; 
 $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('action_media', ob_get_contents());ob_end_clean(); 
 endif; ?>
              <?php $this->_tpl_vars['action_text'] = vsprintf(SELanguage::_get($this->_tpl_vars['actions'][$this->_sections['actions_loop']['index']]['action_text']), $this->_tpl_vars['actions'][$this->_sections['actions_loop']['index']]['action_vars']);; ?>
              <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['action_text'])) ? $this->_run_mod_handler('replace', true, $_tmp, "[media]", $this->_tpl_vars['action_media']) : smarty_modifier_replace($_tmp, "[media]", $this->_tpl_vars['action_media'])))) ? $this->_run_mod_handler('choptext', true, $_tmp, 50, "<br>") : smarty_modifier_choptext($_tmp, 50, "<br>")); ?>

            </td>
          </tr>
        </table>
      </div>
    <?php endfor; else: ?>
      <?php echo SELanguage::_get(738); ?>
    <?php endif; ?>
  </div>

</td>
<td valign='top' style='padding-left: 10px;' width='220'>

    <div class='header'><?php echo SELanguage::_get(666); ?></div>
  <div class='network_content'>
    <?php unset($this->_sections['signups_loop']);
$this->_sections['signups_loop']['name'] = 'signups_loop';
$this->_sections['signups_loop']['loop'] = is_array($_loop=$this->_tpl_vars['signups']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['signups_loop']['max'] = (int)6;
$this->_sections['signups_loop']['show'] = true;
if ($this->_sections['signups_loop']['max'] < 0)
    $this->_sections['signups_loop']['max'] = $this->_sections['signups_loop']['loop'];
$this->_sections['signups_loop']['step'] = 1;
$this->_sections['signups_loop']['start'] = $this->_sections['signups_loop']['step'] > 0 ? 0 : $this->_sections['signups_loop']['loop']-1;
if ($this->_sections['signups_loop']['show']) {
    $this->_sections['signups_loop']['total'] = min(ceil(($this->_sections['signups_loop']['step'] > 0 ? $this->_sections['signups_loop']['loop'] - $this->_sections['signups_loop']['start'] : $this->_sections['signups_loop']['start']+1)/abs($this->_sections['signups_loop']['step'])), $this->_sections['signups_loop']['max']);
    if ($this->_sections['signups_loop']['total'] == 0)
        $this->_sections['signups_loop']['show'] = false;
} else
    $this->_sections['signups_loop']['total'] = 0;
if ($this->_sections['signups_loop']['show']):

            for ($this->_sections['signups_loop']['index'] = $this->_sections['signups_loop']['start'], $this->_sections['signups_loop']['iteration'] = 1;
                 $this->_sections['signups_loop']['iteration'] <= $this->_sections['signups_loop']['total'];
                 $this->_sections['signups_loop']['index'] += $this->_sections['signups_loop']['step'], $this->_sections['signups_loop']['iteration']++):
$this->_sections['signups_loop']['rownum'] = $this->_sections['signups_loop']['iteration'];
$this->_sections['signups_loop']['index_prev'] = $this->_sections['signups_loop']['index'] - $this->_sections['signups_loop']['step'];
$this->_sections['signups_loop']['index_next'] = $this->_sections['signups_loop']['index'] + $this->_sections['signups_loop']['step'];
$this->_sections['signups_loop']['first']      = ($this->_sections['signups_loop']['iteration'] == 1);
$this->_sections['signups_loop']['last']       = ($this->_sections['signups_loop']['iteration'] == $this->_sections['signups_loop']['total']);
?>
            <?php echo smarty_function_cycle(array('name' => 'startrow','values' => "<table cellpadding='0' cellspacing='0' align='center'><tr>,"), $this);?>

      <td class='portal_member'><a href='<?php echo $this->_tpl_vars['url']->url_create('profile',$this->_tpl_vars['signups'][$this->_sections['signups_loop']['index']]->user_info['user_username']); ?>
'><?php echo $this->_tpl_vars['signups'][$this->_sections['signups_loop']['index']]->user_displayname; ?>
<br><img src='<?php echo $this->_tpl_vars['signups'][$this->_sections['signups_loop']['index']]->user_photo('./images/nophoto.gif','TRUE'); ?>
' class='photo' width='60' height='60' border='0'></a></td>
            <?php if ($this->_sections['signups_loop']['last'] == true): ?>
        </tr></table>
      <?php else: ?>
        <?php echo smarty_function_cycle(array('name' => 'endrow','values' => ",</tr></table>"), $this);?>

      <?php endif; ?>
    <?php endfor; else: ?>
      <?php echo SELanguage::_get(1179); ?>
    <?php endif; ?>
  </div>

    <div class='spacer10'></div>
  <div class='header'><?php echo SELanguage::_get(1177); ?></div>
  <div class='network_content'>
    <?php unset($this->_sections['statuses_loop']);
$this->_sections['statuses_loop']['name'] = 'statuses_loop';
$this->_sections['statuses_loop']['loop'] = is_array($_loop=$this->_tpl_vars['statuses']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['statuses_loop']['max'] = (int)5;
$this->_sections['statuses_loop']['show'] = true;
if ($this->_sections['statuses_loop']['max'] < 0)
    $this->_sections['statuses_loop']['max'] = $this->_sections['statuses_loop']['loop'];
$this->_sections['statuses_loop']['step'] = 1;
$this->_sections['statuses_loop']['start'] = $this->_sections['statuses_loop']['step'] > 0 ? 0 : $this->_sections['statuses_loop']['loop']-1;
if ($this->_sections['statuses_loop']['show']) {
    $this->_sections['statuses_loop']['total'] = min(ceil(($this->_sections['statuses_loop']['step'] > 0 ? $this->_sections['statuses_loop']['loop'] - $this->_sections['statuses_loop']['start'] : $this->_sections['statuses_loop']['start']+1)/abs($this->_sections['statuses_loop']['step'])), $this->_sections['statuses_loop']['max']);
    if ($this->_sections['statuses_loop']['total'] == 0)
        $this->_sections['statuses_loop']['show'] = false;
} else
    $this->_sections['statuses_loop']['total'] = 0;
if ($this->_sections['statuses_loop']['show']):

            for ($this->_sections['statuses_loop']['index'] = $this->_sections['statuses_loop']['start'], $this->_sections['statuses_loop']['iteration'] = 1;
                 $this->_sections['statuses_loop']['iteration'] <= $this->_sections['statuses_loop']['total'];
                 $this->_sections['statuses_loop']['index'] += $this->_sections['statuses_loop']['step'], $this->_sections['statuses_loop']['iteration']++):
$this->_sections['statuses_loop']['rownum'] = $this->_sections['statuses_loop']['iteration'];
$this->_sections['statuses_loop']['index_prev'] = $this->_sections['statuses_loop']['index'] - $this->_sections['statuses_loop']['step'];
$this->_sections['statuses_loop']['index_next'] = $this->_sections['statuses_loop']['index'] + $this->_sections['statuses_loop']['step'];
$this->_sections['statuses_loop']['first']      = ($this->_sections['statuses_loop']['iteration'] == 1);
$this->_sections['statuses_loop']['last']       = ($this->_sections['statuses_loop']['iteration'] == $this->_sections['statuses_loop']['total']);
?>
      <div<?php if (! $this->_sections['statuses_loop']['first']): ?> style='padding-top: 7px;'<?php endif; ?>>
		<a href='<?php echo $this->_tpl_vars['url']->url_create('profile',$this->_tpl_vars['statuses'][$this->_sections['statuses_loop']['index']]['status_user_username']); ?>
'>
			<?php echo $this->_tpl_vars['statuses'][$this->_sections['statuses_loop']['index']]['status_user_displayname']; ?>

		</a>
		<?php echo $this->_tpl_vars['statuses'][$this->_sections['statuses_loop']['index']]['status_user_status']; ?>

		</div>
    <?php endfor; else: ?>
      <?php echo SELanguage::_get(1178); ?>
    <?php endif; ?>
  </div>

</td>
</tr>
</table>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>