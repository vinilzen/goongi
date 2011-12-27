<?php /* Smarty version 2.6.14, created on 2011-12-27 17:17:28
         compiled from user_editprofile_photo.tpl */
?><?php
SELanguage::_preload_multi(769,652,713,772,715,770,771,714);
SELanguage::load();
?>﻿<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<h1><?php echo SELanguage::_get(769); ?></h1>

<div class="crumb">
	<a href="/">Главная</a>
	<a href="<?php echo $this->_tpl_vars['url']->url_create('profile',$this->_tpl_vars['user']->user_info['user_username']); ?>
"><?php echo SELanguage::_get(652); ?><!-- Профиль --></a>
	<span><?php echo SELanguage::_get(769); ?><!-- редактировать фото --></span>
</div>
<div class="buttons">
	<span class="button2"><span class="l">&nbsp;</span><span class="c">
		<a href="/user_editprofile.php">Редактировать личную информацию</a>
	</span><span class="r">&nbsp;</span></span>
</div>


<div><?php echo SELanguage::_get(713); ?> <br /><br /><br /></div>



<?php if ($this->_tpl_vars['is_error'] != 0): ?>
<div class='error'><?php echo SELanguage::_get($this->_tpl_vars['is_error']); ?></div>
<?php endif; ?>



	

	
	<div class="form edit">
		<form action='user_editprofile_photo.php' method='post' enctype='multipart/form-data'>
			<div class="input file photoedit">
				<label><?php echo SELanguage::_get(772); ?></label>
				<div class="fakeupload">
					<input type="file" onchange="this.form.fakeupload.value = this.value;" class="realupload2" id="realupload2" size="1" name='photo' />
					<input type="text" class="inpupload" value="" name="fakeupload" />
				</div>
				<p><?php echo SELanguage::_get(715); ?> <?php echo $this->_tpl_vars['user']->level_info['level_photo_exts']; ?>
</p>
			</div>
			<div class="input imggg">
				<label><?php echo SELanguage::_get(770); ?></label>
				<div id="brdr">
					<img id="userEditPhotoImg" src='<?php echo $this->_tpl_vars['user']->user_photo("./images/nophoto.gif"); ?>
' border='0' />
				</div>
				<?php if ($this->_tpl_vars['user']->user_photo() != ""): ?>
					<div id="userEditRemovePhotoLink">[ <a href='#' onclick='userPhotoRemove(); return false;'><?php echo SELanguage::_get(771); ?></a> ]</div>
					<?php echo '
					<script type="text/javascript">
						function userPhotoRemove() {
							$.post(
								"user_editprofile_photo.php", 
								{ task: \'remove\' },
								function(data) {
									$("#brdr").addClass("preloader");
									$(\'#userEditPhotoImg\').fadeOut();
									$(\'#userEditRemovePhotoLink\').html(\'\');
									setTimeout ( function() {
										$("#brdr").removeClass("preloader");
										$(\'#main_photo\').html(\'<img width="111" src="/images/nophoto.gif" border="0" />\');
										$(\'#brdr\').html(\'<img width="111" src="/images/nophoto.gif" border="0" />\');
										$(\'#userEditRemovePhotoLink\').html(data);
									}, 2000);
								}
							);
						}
					</script>
					'; ?>

					
					
				<?php endif; ?>
				
			</div>
			<div class="button"><span class="button2"><span class="l">&nbsp;</span><span class="c"><input type="submit" value="<?php echo SELanguage::_get(714); ?>" name="log" /></span><span class="r">&nbsp;</span></span></div>
			<input type='hidden' name='task' value='upload' />
			<input type='hidden' name='MAX_FILE_SIZE' value='5000000' />
		</form>
	</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>