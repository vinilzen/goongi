<?php /* Smarty version 2.6.14, created on 2011-11-15 17:53:15
         compiled from home.tpl */
?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'home.tpl', 47, false),array('modifier', 'replace', 'home.tpl', 78, false),array('modifier', 'choptext', 'home.tpl', 78, false),array('modifier', 'regex_replace', 'home.tpl', 160, false),array('modifier', 'truncate', 'home.tpl', 160, false),array('function', 'math', 'home.tpl', 136, false),array('function', 'cycle', 'home.tpl', 157, false),)), $this);
?><?php
SELanguage::_preload_multi(850009,643,644,926,664,737,509,510,26,1115,511,665,977,976,671,672,6000142,28,675,29,660,30,6000143,666,667,668,669,670);
SELanguage::load();
?>﻿<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>



<div class="all">
	<div class="center">
		<div class="block2">
			<div class="c">
				<div class="bg_l">
					<div class="bg_r">
						<div class="first_time">
							<p>Если вы хотите найти и поделиться с родными и близкими историей вашего рода &mdash; 
							наш проект Goongi то что вам нужно.</p>
							<p><?php echo SELanguage::_get(850009); ?></p>
						</div><br>
						
						<h1><?php echo SELanguage::_get(643); ?><!-- Поиск: -->Поиск людей на сайте</h1>
						<div class="search">
							<form action='search.php' method='post'>
								<span class="button2">
									<span class="l">&nbsp;</span>
									<span class="c">
										<input type="submit" name="log" value="<?php echo SELanguage::_get(644); ?>" /> <!-- Искать -->
									</span>
									<span class="r">&nbsp;</span>
								</span>
								<input type='hidden' name='task' value='dosearch' />
								<input type='hidden' name='t' value='0' />
								<input type="text" class="srch" name="search_text" onblur="if (this.value == '') " onfocus="if (this.value == 'Введите сюда фамилию') " value="Введите сюда фамилию" />
							</form>
							<a href='search_advan	ced.php'><?php echo SELanguage::_get(926); ?><!-- Расширенный поиск --></a>
						</div>
						<ul class="index_ul">
							<li>Вы сможете составить генеалогическое древо своей семьи.</li>
							<li>Искать родню во всем мире и общаться с ними.</li>
							<li>Встроенный календарь напомнит вам дни рождения родных.</li>
							<li>Вы сможете увековечить память предков всего несколькими кликами.</li>
							<li>К выпуску готовится семейный фотоальбом, в котором вы запечатлите все важные события!</li>
						</ul>
						<ul class="steps">
							<li><a href="#"><img alt="" src="images/st1.gif"></a><div>Найди родных</div></li>
							<li><a href="#"><img alt="" src="images/st2.gif"></a><div>Найди друзей</div></li>
							<li style="margin-right: 0pt; padding-right: 0pt; background: none repeat scroll 0% 0% transparent;"><a href="#"><img alt="" src="images/st3.gif"></a><div>Построй дерево</div></li>
						</ul>
					  <?php if (count($this->_tpl_vars['news']) > 0 && 0): ?>
						  <div class='page_header'><?php echo SELanguage::_get(664); ?></div>
						  <ul>
						  <?php unset($this->_sections['news_loop']);
$this->_sections['news_loop']['name'] = 'news_loop';
$this->_sections['news_loop']['loop'] = is_array($_loop=$this->_tpl_vars['news']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['news_loop']['max'] = (int)3;
$this->_sections['news_loop']['show'] = true;
if ($this->_sections['news_loop']['max'] < 0)
    $this->_sections['news_loop']['max'] = $this->_sections['news_loop']['loop'];
$this->_sections['news_loop']['step'] = 1;
$this->_sections['news_loop']['start'] = $this->_sections['news_loop']['step'] > 0 ? 0 : $this->_sections['news_loop']['loop']-1;
if ($this->_sections['news_loop']['show']) {
    $this->_sections['news_loop']['total'] = min(ceil(($this->_sections['news_loop']['step'] > 0 ? $this->_sections['news_loop']['loop'] - $this->_sections['news_loop']['start'] : $this->_sections['news_loop']['start']+1)/abs($this->_sections['news_loop']['step'])), $this->_sections['news_loop']['max']);
    if ($this->_sections['news_loop']['total'] == 0)
        $this->_sections['news_loop']['show'] = false;
} else
    $this->_sections['news_loop']['total'] = 0;
if ($this->_sections['news_loop']['show']):

            for ($this->_sections['news_loop']['index'] = $this->_sections['news_loop']['start'], $this->_sections['news_loop']['iteration'] = 1;
                 $this->_sections['news_loop']['iteration'] <= $this->_sections['news_loop']['total'];
                 $this->_sections['news_loop']['index'] += $this->_sections['news_loop']['step'], $this->_sections['news_loop']['iteration']++):
$this->_sections['news_loop']['rownum'] = $this->_sections['news_loop']['iteration'];
$this->_sections['news_loop']['index_prev'] = $this->_sections['news_loop']['index'] - $this->_sections['news_loop']['step'];
$this->_sections['news_loop']['index_next'] = $this->_sections['news_loop']['index'] + $this->_sections['news_loop']['step'];
$this->_sections['news_loop']['first']      = ($this->_sections['news_loop']['iteration'] == 1);
$this->_sections['news_loop']['last']       = ($this->_sections['news_loop']['iteration'] == $this->_sections['news_loop']['total']);
?>
							<li>
								<img src='./images/icons/news16.gif' border='0' class='icon' alt='' />
								<b><?php echo $this->_tpl_vars['news'][$this->_sections['news_loop']['index']]['announcement_subject']; ?>
</b> - <?php echo $this->_tpl_vars['news'][$this->_sections['news_loop']['index']]['announcement_date']; ?>

								<?php echo $this->_tpl_vars['news'][$this->_sections['news_loop']['index']]['announcement_body']; ?>

							</li>
						  <?php endfor; endif; ?>
						  </ul>
					  <?php endif; ?>
						  
						  <?php if (count($this->_tpl_vars['actions']) > 0 && 0): ?> 							<div class='page_header'><?php echo SELanguage::_get(737); ?></div>
							<div class='portal_whatsnew'>
							  							  <?php if ($this->_tpl_vars['ads']->ad_feed != ""): ?>
								<div class='portal_action' style='display: block; visibility: visible; padding-bottom: 10px;'><?php echo $this->_tpl_vars['ads']->ad_feed; ?>
</div>
							  <?php endif; ?>
							  							  <?php unset($this->_sections['actions_loop']);
$this->_sections['actions_loop']['name'] = 'actions_loop';
$this->_sections['actions_loop']['loop'] = is_array($_loop=$this->_tpl_vars['actions']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['actions_loop']['max'] = (int)10;
$this->_sections['actions_loop']['show'] = true;
if ($this->_sections['actions_loop']['max'] < 0)
    $this->_sections['actions_loop']['max'] = $this->_sections['actions_loop']['loop'];
$this->_sections['actions_loop']['step'] = 1;
$this->_sections['actions_loop']['start'] = $this->_sections['actions_loop']['step'] > 0 ? 0 : $this->_sections['actions_loop']['loop']-1;
if ($this->_sections['actions_loop']['show']) {
    $this->_sections['actions_loop']['total'] = min(ceil(($this->_sections['actions_loop']['step'] > 0 ? $this->_sections['actions_loop']['loop'] - $this->_sections['actions_loop']['start'] : $this->_sections['actions_loop']['start']+1)/abs($this->_sections['actions_loop']['step'])), $this->_sections['actions_loop']['max']);
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
' class='portal_action<?php if ($this->_sections['actions_loop']['first']): ?>_top<?php endif; ?>'>
								  <table cellpadding='0' cellspacing='0'>  <tr>
								  <td valign='top'><img src='./images/icons/<?php echo $this->_tpl_vars['actions'][$this->_sections['actions_loop']['index']]['action_icon']; ?>
' border='0' class='icon' alt='' /></td>
								  <td valign='top' width='100%'>
									<?php $this->assign('action_date', $this->_tpl_vars['datetime']->time_since($this->_tpl_vars['actions'][$this->_sections['actions_loop']['index']]['action_date'])); ?>
									<div class='portal_action_date'><?php echo sprintf(SELanguage::_get($this->_tpl_vars['action_date'][0]), $this->_tpl_vars['action_date'][1]); ?></div>
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
' class='recentaction_media' alt='' /></a><?php endfor; endif; 
 $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('action_media', ob_get_contents());ob_end_clean(); 
 endif; ?>
									<?php $this->_tpl_vars['action_text'] = vsprintf(SELanguage::_get($this->_tpl_vars['actions'][$this->_sections['actions_loop']['index']]['action_text']), $this->_tpl_vars['actions'][$this->_sections['actions_loop']['index']]['action_vars']);; ?>
									<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['action_text'])) ? $this->_run_mod_handler('replace', true, $_tmp, "[media]", $this->_tpl_vars['action_media']) : smarty_modifier_replace($_tmp, "[media]", $this->_tpl_vars['action_media'])))) ? $this->_run_mod_handler('choptext', true, $_tmp, 50, "<br>") : smarty_modifier_choptext($_tmp, 50, "<br>")); ?>

										</td>
								  </tr> </table>
								</div>
							  <?php endfor; endif; ?>
							</div>
						  <?php endif; ?>
					</div>
				</div>
			</div>
			<div class="b"></div>
		</div>
	</div>
</div>

<div class="left">
	<div class="left_c">
		<div class="block1">
			<div class="bg">
				<div class="c">
										<?php if (! $this->_tpl_vars['user']->user_exists): ?>
					<div class="first_time">
						<p>Вы здесь впервые?</p>
						<p><a href="/signup.php">Создайте своё древо</a> бесплатно. Это займет всего пару минут.</p>
					</div>
										<?php else: ?>
					<div class='portal_login'>
					  <div style='padding-bottom: 5px;'><a href='<?php echo $this->_tpl_vars['url']->url_create('profile',$this->_tpl_vars['user']->user_info['user_username']); ?>
'><img src='<?php echo $this->_tpl_vars['user']->user_photo("./images/nophoto.gif"); ?>
' width='<?php echo $this->_tpl_vars['misc']->photo_size($this->_tpl_vars['user']->user_photo("./images/nophoto.gif"),'90','90','w'); ?>
' border='0' class='photo' alt="<?php echo sprintf(SELanguage::_get(509), $this->_tpl_vars['user']->user_info['user_username']); ?>" /></a></div>
					  <div><?php echo sprintf(SELanguage::_get(510), $this->_tpl_vars['user']->user_displayname_short); ?></div>
					  <div>[ <form method="POST" id="user_logout" action="user_logout.php" style="display:inline;margin:0;"><a href='user_logout.php?token=<?php echo $this->_tpl_vars['token']; ?>
' class='top_menu_item' onclick="$('user_logout').submit(); return false;"><?php echo SELanguage::_get(26); ?></a></form> ]</div>
					</div>
					<div class='portal_spacer'></div>
					<?php endif; ?>

					  					  <?php if (! $this->_tpl_vars['user']->user_exists): ?>
						<div class='portal_signup_container1'>
						  <div class='portal_signup'>
							<a href='signup.php' class='portal_signup'><span style='font-size: 15px;'><img src='./images/portal_join.gif' border='0' style='margin-right: 3px; vertical-align: middle;' alt='' /></span><?php echo SELanguage::_get(1115); ?></a>
						  </div>
						</div>
						<div class='portal_spacer'></div>
					  <?php endif; ?>

					  					  <?php if (! empty ( $this->_tpl_vars['site_statistics'] ) && 0): ?> 						<div class='header'><?php echo SELanguage::_get(511); ?></div>
						<div class='portal_content'>
						  <?php $_from = $this->_tpl_vars['site_statistics']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['stat_name'] => $this->_tpl_vars['stat_array']):
?>
							&#149; <?php echo sprintf(SELanguage::_get($this->_tpl_vars['stat_array']['title']), $this->_tpl_vars['stat_array']['stat']); ?><br />
						  <?php endforeach; endif; unset($_from); ?>
						</div>
						<div class='portal_spacer'></div>
					  <?php endif; ?>
					  					  <?php echo smarty_function_math(array('assign' => 'total_online_users','equation' => "x+y",'x' => count($this->_tpl_vars['online_users'][0]),'y' => $this->_tpl_vars['online_users'][1]), $this);?>

					  <?php if ($this->_tpl_vars['total_online_users'] > 0 && 0): ?> 						<div class='header'><?php echo SELanguage::_get(665); ?> (<?php echo $this->_tpl_vars['total_online_users']; ?>
)</div>
						<div class='portal_content'>
						  <?php if (count($this->_tpl_vars['online_users'][0]) == 0): ?>
							<?php echo sprintf(SELanguage::_get(977), $this->_tpl_vars['online_users'][1]); ?>
						  <?php else: ?>
							<?php ob_start(); 
 unset($this->_sections['online_loop']);
$this->_sections['online_loop']['name'] = 'online_loop';
$this->_sections['online_loop']['loop'] = is_array($_loop=$this->_tpl_vars['online_users'][0]) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['online_loop']['show'] = true;
$this->_sections['online_loop']['max'] = $this->_sections['online_loop']['loop'];
$this->_sections['online_loop']['step'] = 1;
$this->_sections['online_loop']['start'] = $this->_sections['online_loop']['step'] > 0 ? 0 : $this->_sections['online_loop']['loop']-1;
if ($this->_sections['online_loop']['show']) {
    $this->_sections['online_loop']['total'] = $this->_sections['online_loop']['loop'];
    if ($this->_sections['online_loop']['total'] == 0)
        $this->_sections['online_loop']['show'] = false;
} else
    $this->_sections['online_loop']['total'] = 0;
if ($this->_sections['online_loop']['show']):

            for ($this->_sections['online_loop']['index'] = $this->_sections['online_loop']['start'], $this->_sections['online_loop']['iteration'] = 1;
                 $this->_sections['online_loop']['iteration'] <= $this->_sections['online_loop']['total'];
                 $this->_sections['online_loop']['index'] += $this->_sections['online_loop']['step'], $this->_sections['online_loop']['iteration']++):
$this->_sections['online_loop']['rownum'] = $this->_sections['online_loop']['iteration'];
$this->_sections['online_loop']['index_prev'] = $this->_sections['online_loop']['index'] - $this->_sections['online_loop']['step'];
$this->_sections['online_loop']['index_next'] = $this->_sections['online_loop']['index'] + $this->_sections['online_loop']['step'];
$this->_sections['online_loop']['first']      = ($this->_sections['online_loop']['iteration'] == 1);
$this->_sections['online_loop']['last']       = ($this->_sections['online_loop']['iteration'] == $this->_sections['online_loop']['total']);

 if ($this->_sections['online_loop']['rownum'] != 1): ?>, <?php endif; ?><a href='<?php echo $this->_tpl_vars['url']->url_create('profile',$this->_tpl_vars['online_users'][0][$this->_sections['online_loop']['index']]->user_info['user_username']); ?>
'><?php echo $this->_tpl_vars['online_users'][0][$this->_sections['online_loop']['index']]->user_displayname; ?>
</a><?php endfor; endif; 
 $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('online_users_registered', ob_get_contents());ob_end_clean(); ?>
							<?php echo sprintf(SELanguage::_get(976), $this->_tpl_vars['online_users_registered'], $this->_tpl_vars['online_users'][1]); ?>
						  <?php endif; ?>
						</div>
						<div class='portal_spacer'></div>
					  <?php endif; ?>

										<?php if (0): ?> 					<div class='header'><?php echo SELanguage::_get(671); ?></div>
					<div class='portal_content'>
					<?php if (! empty ( $this->_tpl_vars['logins'] )): ?>
					<table cellpadding='0' cellspacing='0' align='center'>
					  <?php unset($this->_sections['login_loop']);
$this->_sections['login_loop']['name'] = 'login_loop';
$this->_sections['login_loop']['loop'] = is_array($_loop=$this->_tpl_vars['logins']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['login_loop']['max'] = (int)4;
$this->_sections['login_loop']['show'] = true;
if ($this->_sections['login_loop']['max'] < 0)
    $this->_sections['login_loop']['max'] = $this->_sections['login_loop']['loop'];
$this->_sections['login_loop']['step'] = 1;
$this->_sections['login_loop']['start'] = $this->_sections['login_loop']['step'] > 0 ? 0 : $this->_sections['login_loop']['loop']-1;
if ($this->_sections['login_loop']['show']) {
    $this->_sections['login_loop']['total'] = min(ceil(($this->_sections['login_loop']['step'] > 0 ? $this->_sections['login_loop']['loop'] - $this->_sections['login_loop']['start'] : $this->_sections['login_loop']['start']+1)/abs($this->_sections['login_loop']['step'])), $this->_sections['login_loop']['max']);
    if ($this->_sections['login_loop']['total'] == 0)
        $this->_sections['login_loop']['show'] = false;
} else
    $this->_sections['login_loop']['total'] = 0;
if ($this->_sections['login_loop']['show']):

            for ($this->_sections['login_loop']['index'] = $this->_sections['login_loop']['start'], $this->_sections['login_loop']['iteration'] = 1;
                 $this->_sections['login_loop']['iteration'] <= $this->_sections['login_loop']['total'];
                 $this->_sections['login_loop']['index'] += $this->_sections['login_loop']['step'], $this->_sections['login_loop']['iteration']++):
$this->_sections['login_loop']['rownum'] = $this->_sections['login_loop']['iteration'];
$this->_sections['login_loop']['index_prev'] = $this->_sections['login_loop']['index'] - $this->_sections['login_loop']['step'];
$this->_sections['login_loop']['index_next'] = $this->_sections['login_loop']['index'] + $this->_sections['login_loop']['step'];
$this->_sections['login_loop']['first']      = ($this->_sections['login_loop']['iteration'] == 1);
$this->_sections['login_loop']['last']       = ($this->_sections['login_loop']['iteration'] == $this->_sections['login_loop']['total']);
?>
					  <?php echo smarty_function_cycle(array('name' => 'startrow3','values' => "<tr>,"), $this);?>

					  <td class='portal_member' valign="bottom"<?php if (( ~ $this->_sections['login_loop']['index'] & 1 ) && $this->_sections['login_loop']['last']): ?> colspan="2" style="width:100%;"<?php else: ?> style="width:50%;"<?php endif; ?>>
						<?php if (! empty ( $this->_tpl_vars['logins'][$this->_sections['login_loop']['index']] )): ?>
						<a href='<?php echo $this->_tpl_vars['url']->url_create('profile',$this->_tpl_vars['logins'][$this->_sections['login_loop']['index']]->user_info['user_username']); ?>
'><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['logins'][$this->_sections['login_loop']['index']]->user_displayname)) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/&#039;/", "'") : smarty_modifier_regex_replace($_tmp, "/&#039;/", "'")))) ? $this->_run_mod_handler('truncate', true, $_tmp, 15, "...", true) : smarty_modifier_truncate($_tmp, 15, "...", true)); ?>
</a><br />
						<a href='<?php echo $this->_tpl_vars['url']->url_create('profile',$this->_tpl_vars['logins'][$this->_sections['login_loop']['index']]->user_info['user_username']); ?>
'><img src='<?php echo $this->_tpl_vars['logins'][$this->_sections['login_loop']['index']]->user_photo("./images/nophoto.gif",'TRUE'); ?>
' class='photo' width='60' height='60' border='0' alt='' /></a>
						<?php endif; ?>
					  </td>
					  <?php echo smarty_function_cycle(array('name' => 'endrow3','values' => ",</tr>"), $this);?>

					  <?php if (( ~ $this->_sections['login_loop']['index'] & 1 ) && $this->_sections['login_loop']['last']): ?></tr><?php endif; ?>
					  <?php endfor; endif; ?>
					  </table>
					<?php else: ?>
					  <?php echo SELanguage::_get(672); ?>
					<?php endif; ?>
					</div>
					<div class='portal_spacer'></div>
					<?php endif; ?>

				</div>
			</div>
			<div class="b"></div>
		</div>
	</div>
</div>

<?php if (! $this->_tpl_vars['user']->user_exists): ?>
<div class="right">
	<div class="block1">
		<div class="bg">
			<div class="c">
				<div class="form_login">
					<h1><?php echo SELanguage::_get(6000142); ?><!-- Войти на сайт --></h1>
					<form action='login.php' name="login" method='post'>
						<div class="input"><label><?php echo SELanguage::_get(28); ?><!-- Логин --></label><input type="text" value='<?php echo $this->_tpl_vars['prev_email']; ?>
' name="email"  size='25' maxlength='100' /></div>
						
						<div class="input"><label><a href="#"><?php echo SELanguage::_get(675); ?><!-- Забыли пароль? --></a><?php echo SELanguage::_get(29); ?><!-- Пароль --></label><input type="password" value="" name='password' size='25' maxlength='100' /></div>
						
						<div class="check"><label><input type='checkbox' class='checkbox' name='persistent' value='1' id='rememberme' /><span><?php echo SELanguage::_get(660); ?><!-- Запомнить меня --></span></label></div>
						
						<span class="button1"><span class="l">&nbsp;</span><span class="c"><input type="submit" value='<?php echo SELanguage::_get(30); ?>' /></span><span class="r">&nbsp;</span></span>
						<input type="hidden" name="task" value="dologin">
					</form>
					<a href="#" class="reg"><?php echo SELanguage::_get(6000143); ?><!-- Зарегистрироваться --></a>
				</div>
			</div>
		</div>
		<div class="b"></div>
	</div>
</div>
	
<?php if (0): ?>  
  <div class='header'><?php echo SELanguage::_get(666); ?></div>
  <div class='portal_content'>
    <?php if (! empty ( $this->_tpl_vars['signups'] )): ?>
    <table cellpadding='0' cellspacing='0' align='center'>
      <?php unset($this->_sections['signups_loop']);
$this->_sections['signups_loop']['name'] = 'signups_loop';
$this->_sections['signups_loop']['loop'] = is_array($_loop=$this->_tpl_vars['signups']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['signups_loop']['max'] = (int)4;
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
      <?php echo smarty_function_cycle(array('name' => 'startrow','values' => "<tr>,"), $this);?>

      <td class='portal_member' valign="bottom"<?php if (( ~ $this->_sections['signups_loop']['index'] & 1 ) && $this->_sections['signups_loop']['last']): ?> colspan="2" style="width:100%;"<?php else: ?> style="width:50%;"<?php endif; ?>>
        <?php if (! empty ( $this->_tpl_vars['signups'][$this->_sections['signups_loop']['index']] )): ?>
          <a href='<?php echo $this->_tpl_vars['url']->url_create('profile',$this->_tpl_vars['signups'][$this->_sections['signups_loop']['index']]->user_info['user_username']); ?>
'><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['signups'][$this->_sections['signups_loop']['index']]->user_displayname)) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/&#039;/", "'") : smarty_modifier_regex_replace($_tmp, "/&#039;/", "'")))) ? $this->_run_mod_handler('truncate', true, $_tmp, 15, "...", true) : smarty_modifier_truncate($_tmp, 15, "...", true)); ?>
</a><br />
          <a href='<?php echo $this->_tpl_vars['url']->url_create('profile',$this->_tpl_vars['signups'][$this->_sections['signups_loop']['index']]->user_info['user_username']); ?>
'><img src='<?php echo $this->_tpl_vars['signups'][$this->_sections['signups_loop']['index']]->user_photo("./images/nophoto.gif",'TRUE'); ?>
' class='photo' width='60' height='60' border='0' alt='' /></a>
        <?php endif; ?>
      </td>
      <?php echo smarty_function_cycle(array('name' => 'endrow','values' => ",</tr>"), $this);?>

      <?php endfor; endif; ?>
      </table>
    <?php else: ?>
      <?php echo SELanguage::_get(667); ?>
    <?php endif; ?>
  </div>
  <div class='portal_spacer'></div>

    <?php if ($this->_tpl_vars['setting']['setting_connection_allow'] != 0): ?>
    <div class='header'><?php echo SELanguage::_get(668); ?></div>
    <div class='portal_content'>
    <?php if (! empty ( $this->_tpl_vars['friends'] )): ?>
    <table cellpadding='0' cellspacing='0' align='center'>
      <?php unset($this->_sections['friends_loop']);
$this->_sections['friends_loop']['name'] = 'friends_loop';
$this->_sections['friends_loop']['loop'] = is_array($_loop=$this->_tpl_vars['friends']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['friends_loop']['max'] = (int)4;
$this->_sections['friends_loop']['show'] = true;
if ($this->_sections['friends_loop']['max'] < 0)
    $this->_sections['friends_loop']['max'] = $this->_sections['friends_loop']['loop'];
$this->_sections['friends_loop']['step'] = 1;
$this->_sections['friends_loop']['start'] = $this->_sections['friends_loop']['step'] > 0 ? 0 : $this->_sections['friends_loop']['loop']-1;
if ($this->_sections['friends_loop']['show']) {
    $this->_sections['friends_loop']['total'] = min(ceil(($this->_sections['friends_loop']['step'] > 0 ? $this->_sections['friends_loop']['loop'] - $this->_sections['friends_loop']['start'] : $this->_sections['friends_loop']['start']+1)/abs($this->_sections['friends_loop']['step'])), $this->_sections['friends_loop']['max']);
    if ($this->_sections['friends_loop']['total'] == 0)
        $this->_sections['friends_loop']['show'] = false;
} else
    $this->_sections['friends_loop']['total'] = 0;
if ($this->_sections['friends_loop']['show']):

            for ($this->_sections['friends_loop']['index'] = $this->_sections['friends_loop']['start'], $this->_sections['friends_loop']['iteration'] = 1;
                 $this->_sections['friends_loop']['iteration'] <= $this->_sections['friends_loop']['total'];
                 $this->_sections['friends_loop']['index'] += $this->_sections['friends_loop']['step'], $this->_sections['friends_loop']['iteration']++):
$this->_sections['friends_loop']['rownum'] = $this->_sections['friends_loop']['iteration'];
$this->_sections['friends_loop']['index_prev'] = $this->_sections['friends_loop']['index'] - $this->_sections['friends_loop']['step'];
$this->_sections['friends_loop']['index_next'] = $this->_sections['friends_loop']['index'] + $this->_sections['friends_loop']['step'];
$this->_sections['friends_loop']['first']      = ($this->_sections['friends_loop']['iteration'] == 1);
$this->_sections['friends_loop']['last']       = ($this->_sections['friends_loop']['iteration'] == $this->_sections['friends_loop']['total']);
?>
      <?php echo smarty_function_cycle(array('name' => 'startrow2','values' => "<tr>,"), $this);?>

      <td class='portal_member' valign="bottom"<?php if (( ~ $this->_sections['friends_loop']['index'] & 1 ) && $this->_sections['friends_loop']['last']): ?> colspan="2" style="width:100%;"<?php else: ?> style="width:50%;"<?php endif; ?>>
        <?php if (! empty ( $this->_tpl_vars['friends'][$this->_sections['friends_loop']['index']] )): ?>
        <a href='<?php echo $this->_tpl_vars['url']->url_create('profile',$this->_tpl_vars['friends'][$this->_sections['friends_loop']['index']]['friend']->user_info['user_username']); ?>
'><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['friends'][$this->_sections['friends_loop']['index']]['friend']->user_displayname)) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/&#039;/", "'") : smarty_modifier_regex_replace($_tmp, "/&#039;/", "'")))) ? $this->_run_mod_handler('truncate', true, $_tmp, 15, "...", true) : smarty_modifier_truncate($_tmp, 15, "...", true)); ?>
</a><br />
        <a href='<?php echo $this->_tpl_vars['url']->url_create('profile',$this->_tpl_vars['friends'][$this->_sections['friends_loop']['index']]['friend']->user_info['user_username']); ?>
'><img src='<?php echo $this->_tpl_vars['friends'][$this->_sections['friends_loop']['index']]['friend']->user_photo("./images/nophoto.gif",'TRUE'); ?>
' class='photo' width='60' height='60' border='0' alt='' /></a><br />
        <?php echo sprintf(SELanguage::_get(669), $this->_tpl_vars['friends'][$this->_sections['friends_loop']['index']]['total_friends']); ?>
        <?php endif; ?>
      </td>
      <?php echo smarty_function_cycle(array('name' => 'endrow2','values' => ",</tr>"), $this);?>

      <?php endfor; endif; ?>
      </table>
    <?php else: ?>
      <?php echo SELanguage::_get(670); ?>
    <?php endif; ?>
    </div>
    <div class='portal_spacer'></div>
  <?php endif; 
 endif; ?>
</div>
<?php endif; ?>
			<div class="clear"></div>
        </div>
    </div>
	<div id="clearfooter"></div>	
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer_without_left_menu.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>