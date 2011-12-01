<?php /* Smarty version 2.6.14, created on 2011-12-01 15:55:26
         compiled from header.tpl */
?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'hook_foreach', 'header.tpl', 61, false),)), $this);
?><?php
SELanguage::_preload_multi(200,647,6000144,687,6000147,6000145,645,1316,1019,649,26,650,30,1198,1199);
SELanguage::load();
?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header_global.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 
 if (@SE_DEBUG && $this->_tpl_vars['admin']->admin_exists && 0): 
 $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header_debug.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 
 endif; ?>

<!-- <div id="smoothbox_container"></div> -->
<iframe id='ajaxframe' name='ajaxframe' style='display: none;'  src='javascript:false;'></iframe> <!-- style='display: none;' -->


<!-- BEGIN CENTERING TABLE/ mycontainer -->
<div id="content">



    <!--HEAD-->
    <div class="head">
        <div class="fix">
            <div class="logo"><a href="/"><img src="/images/logo.png" alt="" /></a></div>
            <ul class="menu">
                <li><a href="/search.php"><?php echo SELanguage::_get(200); ?><!-- Поиск --></a></li>
                <li><a href="/invite.php"><?php echo SELanguage::_get(647); ?><!-- Пригласить --></a></li>
                <li><a href="#"><?php echo SELanguage::_get(6000144); ?><!-- Подарки --></a></li>
                <li><a href="#"><span><?php echo SELanguage::_get(687); ?><!-- Язык --></span></a></li>
                <li>
				<?php if ($this->_tpl_vars['user']->user_exists != 0): ?>
					<form method="POST" id="user_logout" action="user_logout.php" style="display:inline;margin:0;">
						<input type="hidden" name="token" value="<?php echo $this->_tpl_vars['token']; ?>
" />
						<a href="#" onclick="$('#user_logout').submit(); return false;"><?php echo SELanguage::_get(6000147); ?><!-- выйти --></a>
					</form>
				<?php else: ?>
					<a href="/login.php"><?php echo SELanguage::_get(6000145); ?><!-- войти --></a>
				<?php endif; ?>
				</li>
            </ul>
        </div>
	</div>
    <!--END HEAD-->






<?php if (0): ?>
<table cellpadding='0' cellspacing='0' style='width: 100%;' align='center'>
<tr>
<td nowrap='nowrap' class='top_menu'>
  <div class='top_menu_link_container'>
    <div class='top_menu_link'><a href='home.php' class='top_menu_item'><?php echo SELanguage::_get(645); ?></a></div>
  </div>
  
  <div class='top_menu_link_container'>
    <div class='top_menu_link'><a href='invite.php' class='top_menu_item'><?php echo SELanguage::_get(647); ?></a></div>
  </div>

    <?php $this->_tag_stack[] = array('hook_foreach', array('name' => 'menu_main','var' => 'menu_main_args','complete' => 'menu_main_complete','max' => 7)); $_block_repeat=true;smarty_block_hook_foreach($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
    <div class='top_menu_link_container'>
      <div class='top_menu_link'>
        <a href='<?php echo $this->_tpl_vars['menu_main_args']['file']; ?>
' class='top_menu_item'><?php echo SELanguage::_get($this->_tpl_vars['menu_main_args']['title']); ?></a>
      </div>
    </div>
  <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_hook_foreach($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
  
  <?php if (! $this->_tpl_vars['menu_main_complete']): ?>
    <div class='top_menu_link_container top_menu_main_link_container'>
      <div class='top_menu_link top_menu_main_link'>
        <a href="javascript:void(0);" onclick="$('menu_main_dropdown').style.display = ( $('menu_main_dropdown').style.display=='none' ? 'inline' : 'none' ); this.blur(); return false;" class='top_menu_item'>
          <?php echo SELanguage::_get(1316); ?>
        </a>
      </div>
      <div class='menu_main_dropdown' id='menu_main_dropdown' style='display: none;'>
        <div>
                    <?php $this->_tag_stack[] = array('hook_foreach', array('name' => 'menu_main','var' => 'menu_main_args','start' => 7)); $_block_repeat=true;smarty_block_hook_foreach($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
          <div class='menu_main_item_dropdown'>
            <a href='<?php echo $this->_tpl_vars['menu_main_args']['file']; ?>
' class='menu_main_item' style="text-align: left;">
              <?php echo SELanguage::_get($this->_tpl_vars['menu_main_args']['title']); ?>
            </a>
          </div>
          <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_hook_foreach($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
        </div>
      </div>
    </div>
  <?php endif; ?>
  
  <div class='top_menu_link_container_end'>
    <div class='top_menu_link'>
      &nbsp;
    </div>
  </div>

</td>
<td nowrap='nowrap' align='right' class='top_menu2'>

    <?php if ($this->_tpl_vars['user']->user_exists != 0): ?>
    <div class='top_menu_link_loggedin' style='padding-right: 10px;'>
      
            <div class='newupdates' id='newupdates' style='display: none;'>
        <div class='newupdates_content'>
            <a href='javascript:void(0);' class='newupdates' onClick="SocialEngine.Viewer.userNotifyPopup(); return false;">
            <?php $this->assign('notify_total', $this->_tpl_vars['notifys']['total_grouped']); ?>
            <?php echo sprintf(SELanguage::_get(1019), "<span id='notify_total'>".($this->_tpl_vars['notify_total'])."</span>"); ?>
            </a>
            &nbsp;&nbsp; 
            <a href='javascript:void(0);' class='newupdates' onClick="SocialEngine.Viewer.userNotifyHide(); return false;">X</a>
          </div>
      </div>
      
      <?php echo sprintf(SELanguage::_get(649), "<a href='user_home.php' class='top_menu_item'>".($this->_tpl_vars['user']->user_displayname_short)."</a>"); ?>
      &nbsp;&nbsp;
      <form method="POST" id="user_logout" action="user_logout.php" style="display:inline;margin:0;"><a href='user_logout.php?token=<?php echo $this->_tpl_vars['token']; ?>
' class='top_menu_item' onclick="$('user_logout').submit(); return false;"><?php echo SELanguage::_get(26); ?></a></form>
    </div>

    <?php else: ?>
    <div class='top_menu_link_container_end' style='float: right;'><div class='top_menu_link'><a href='signup.php' class='top_menu_item'><?php echo SELanguage::_get(650); ?></a></div></div>
    <div class='top_menu_link_container' style='float: right;'><div class='top_menu_link'><a href='login.php' class='top_menu_item'><?php echo SELanguage::_get(30); ?></a></div></div>
  <?php endif; ?>

</td>
</tr>
</table>
<?php endif; 
 if ($this->_tpl_vars['user']->user_exists && 0): 
 
$javascript_lang_import_list = SELanguage::_javascript_redundancy_filter(array(1198,1199));
$javascript_lang_import_first = TRUE;
if( is_array($javascript_lang_import_list) && !empty($javascript_lang_import_list) )
{
  echo "\n<script type='text/javascript'>\n<!--\n";
  echo "SocialEngine.Language.Import({\n";
  foreach( $javascript_lang_import_list as $javascript_import_id )
  {
    if( !$javascript_lang_import_first ) echo ",\n";
    echo "  ".$javascript_import_id." : '".addslashes(SE_Language::_get($javascript_import_id))."'";
    $javascript_lang_import_first = FALSE;
  }
  echo "\n});\n//-->\n</script>\n";
}
 ?>
<script type='text/javascript'>
<!--
var notify_update_interval;
window.addEvent('domready', function() {
  SocialEngine.Viewer.userNotifyGenerate(<?php echo $this->_tpl_vars['se_javascript']->generateNotifys($this->_tpl_vars['notifys']); ?>
);
  SocialEngine.Viewer.userNotifyShow();
  notify_update_interval = (function() {
    if( notify_update_interval ) SocialEngine.Viewer.userNotifyUpdate();
  }).periodical(60 * 1000);
});
//-->
</script>
<div style='display: none;' id='newupdates_popup'></div>
<?php endif; ?>
 




<?php if ($this->_tpl_vars['ads']->ad_left != ""): ?>
  <div class='ad_left' style='display: block; visibility: visible;'><?php echo $this->_tpl_vars['ads']->ad_left; ?>
</div>
<?php endif; ?>



	<div class="fix">
    	<div class="width">

    <?php if ($this->_tpl_vars['ads']->ad_belowmenu != ""): ?><div class='ad_belowmenu' style='display: block; visibility: visible;'><?php echo $this->_tpl_vars['ads']->ad_belowmenu; ?>
</div><?php endif; ?>
<div class="all">
	<?php if ($this->_tpl_vars['login'] || $this->_tpl_vars['lostpass'] || $this->_tpl_vars['signup'] || $this->_tpl_vars['invite']): ?>
		<div class="center_one"><div class="block3">
	<?php elseif ($this->_tpl_vars['home'] && $this->_tpl_vars['user']->user_exists == 0): ?>
		<div class="center"><div class="block2">
	<?php else: ?>	
		<div class="center_all"><div class="block4">
	<?php endif; ?>	
			<div class="c">
				<div class="bg_l">
					<div class="bg_r">