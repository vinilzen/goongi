<?php /* Smarty version 2.6.14, created on 2011-12-27 17:36:24
         compiled from profile_history.tpl */
?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'profile_history.tpl', 22, false),array('modifier', 'strip_tags', 'profile_history.tpl', 44, false),)), $this);
?><?php
SELanguage::_preload_multi(1600043,1600016,1600121);
SELanguage::load();
?>

<?php if ($this->_tpl_vars['owner']->level_info['level_history_create'] && $this->_tpl_vars['total_historyentries']): ?>

  <div class='profile_headline'><?php echo SELanguage::_get(1600043); ?> (<?php echo $this->_tpl_vars['total_historyentries']; ?>
)</div>
  <div>
        <?php unset($this->_sections['historyentry_loop']);
$this->_sections['historyentry_loop']['name'] = 'historyentry_loop';
$this->_sections['historyentry_loop']['loop'] = is_array($_loop=$this->_tpl_vars['historyentries']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['historyentry_loop']['max'] = (int)5;
$this->_sections['historyentry_loop']['show'] = true;
if ($this->_sections['historyentry_loop']['max'] < 0)
    $this->_sections['historyentry_loop']['max'] = $this->_sections['historyentry_loop']['loop'];
$this->_sections['historyentry_loop']['step'] = 1;
$this->_sections['historyentry_loop']['start'] = $this->_sections['historyentry_loop']['step'] > 0 ? 0 : $this->_sections['historyentry_loop']['loop']-1;
if ($this->_sections['historyentry_loop']['show']) {
    $this->_sections['historyentry_loop']['total'] = min(ceil(($this->_sections['historyentry_loop']['step'] > 0 ? $this->_sections['historyentry_loop']['loop'] - $this->_sections['historyentry_loop']['start'] : $this->_sections['historyentry_loop']['start']+1)/abs($this->_sections['historyentry_loop']['step'])), $this->_sections['historyentry_loop']['max']);
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
    <div class='profile_historyentry'>
      <table cellpadding='0' cellspacing='0'>
        <tr>
          <td valign='top'>
            <a href='<?php echo $this->_tpl_vars['url']->url_create('history_entry',$this->_tpl_vars['owner']->user_info['user_username'],$this->_tpl_vars['historyentries'][$this->_sections['historyentry_loop']['index']]['historyentry_id']); ?>
'>
              <img src='./images/icons/history_history16.gif' border='0' class='icon' />
            </a>
          </td>
          <td valign='top'>
            <div class='profile_historyentry_title'>
              <a href='<?php echo $this->_tpl_vars['url']->url_create('history_entry',$this->_tpl_vars['owner']->user_info['user_username'],$this->_tpl_vars['historyentries'][$this->_sections['historyentry_loop']['index']]['historyentry_id']); ?>
'>
                <?php echo ((is_array($_tmp=$this->_tpl_vars['historyentries'][$this->_sections['historyentry_loop']['index']]['historyentry_title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 35, "...", true) : smarty_modifier_truncate($_tmp, 35, "...", true)); ?>

              </a>
            </div>
            <div class='profile_historyentry_date'>
              <?php echo SELanguage::_get(1600016); ?>
              <?php $this->assign('historyentry_date', $this->_tpl_vars['datetime']->time_since($this->_tpl_vars['historyentries'][$this->_sections['historyentry_loop']['index']]['historyentry_date'])); ?>
              <?php echo sprintf(SELanguage::_get($this->_tpl_vars['historyentry_date'][0]), $this->_tpl_vars['historyentry_date'][1]); ?>
            </div>
            <?php if (! empty ( $this->_tpl_vars['historyentries'][$this->_sections['historyentry_loop']['index']]['historyentrycat_languagevar_id'] ) || ! empty ( $this->_tpl_vars['historyentries'][$this->_sections['historyentry_loop']['index']]['historyentrycat_title'] )): ?>
            <div class='profile_historyentry_date'>
              Category:
              <a href='<?php echo $this->_tpl_vars['url']->url_create('history',$this->_tpl_vars['owner']->user_info['user_username']); ?>
&category_id=<?php echo $this->_tpl_vars['historyentries'][$this->_sections['historyentry_loop']['index']]['historyentry_historyentrycat_id']; ?>
'>
                <?php if (! empty ( $this->_tpl_vars['historyentries'][$this->_sections['historyentry_loop']['index']]['historyentrycat_languagevar_id'] )): ?>
                  <?php ob_start(); 
 echo SELanguage::_get($this->_tpl_vars['historyentries'][$this->_sections['historyentry_loop']['index']]['historyentrycat_languagevar_id']); 
 $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('historyentrycat_title', ob_get_contents());ob_end_clean(); ?>
                <?php else: ?>
                  <?php $this->assign('historyentrycat_title', $this->_tpl_vars['historyentries'][$this->_sections['historyentry_loop']['index']]['historyentrycat_title']); ?>
                <?php endif; ?>
                <?php echo ((is_array($_tmp=$this->_tpl_vars['historyentrycat_title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 97) : smarty_modifier_truncate($_tmp, 97)); ?>

              </a>
            </div>
            <?php endif; ?>
            <div class='profile_historyentry_body'>
              <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['historyentries'][$this->_sections['historyentry_loop']['index']]['historyentry_body'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 160, "...", true) : smarty_modifier_truncate($_tmp, 160, "...", true)); ?>

            </div>
          </td>
        </tr>
      </table>
    </div>
    <?php endfor; endif; ?>
        <?php if ($this->_tpl_vars['total_historyentries'] > 5): ?>
    <div style='border-top: 1px solid #DDDDDD; padding-top: 10px;'>
      <div style='float: left;'>
        <a href='<?php echo $this->_tpl_vars['url']->url_create('history',$this->_tpl_vars['owner']->user_info['user_username']); ?>
'>
          <img src='./images/icons/history_subscribe16.gif' border='0' class='button' style='float: left;' />
          <?php echo SELanguage::_get(1600121); ?>
        </a>
      </div>
      <div style='clear: both; height: 0px;'></div>
    </div>
    <?php endif; ?>
  </div>

<?php endif; ?>