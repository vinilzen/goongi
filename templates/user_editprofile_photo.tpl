 {include file='header.tpl'}

{* $Id: user_editprofile_photo.tpl 130 2009-03-21 23:36:57Z john $ *}

<h1>{lang_print id=769}</h1>

<div class="crumb">
	<a href="/">Главная</a>
	<a href="{$url->url_create("profile", $user->user_info.user_username)}">{lang_print id=652}<!-- Профиль --></a>
	<span>{lang_print id=769}<!-- редактировать фото --></span>
</div>
<div class="buttons">
	<span class="button2"><span class="l">&nbsp;</span><span class="c">
		<a href="/user_editprofile.php">Редактировать личную информацию</a>
	</span><span class="r">&nbsp;</span></span>
</div>
{*
{section name=cat_loop loop=$cats}
	<a href='user_editprofile.php?cat_id={$cats[cat_loop].subcat_id}'>{lang_print id=$cats[cat_loop].subcat_title}</a>
{/section}
{if $user->level_info.level_photo_allow != 0}
	<a href='user_editprofile_photo.php'>{lang_print id=762}</a>
{/if}
{if $user->level_info.level_profile_style != 0 || $user->level_info.level_profile_style_sample != 0}
	<a href='user_editprofile_style.php'>{lang_print id=763}</a>
{/if}
*}


<div>{lang_print id=713} <br /><br /><br /></div>



{* SHOW ERROR MESSAGE *}
{if $is_error != 0}
<div class='error'>{lang_print id=$is_error}</div>
{/if}


{* SHOW PHOTO ON LEFT AND UPLOAD FIELD ON RIGHT *}

	

	{* SHOW REMOVE PHOTO LINK IF NECESSARY *}

	<div class="form edit">
		<form action='user_editprofile_photo.php' method='post' enctype='multipart/form-data'>
			<div class="input file photoedit">
				<label>{lang_print id=772}</label>
				<div class="fakeupload">
					<input type="file" onchange="this.form.fakeupload.value = this.value;" class="realupload2" id="realupload2" size="1" name='photo' />
					<input type="text" class="inpupload" value="" name="fakeupload" />
				</div>
				<p>{lang_print id=715} {$user->level_info.level_photo_exts}</p>
				<div class="button"><span class="button2"><span class="l">&nbsp;</span><span class="c"><input type="submit" value="{lang_print id=714}" name="log" /></span><span class="r">&nbsp;</span></span></div>
			</div>
			<div class="input imggg">
				<label>{lang_print id=770}</label>
				<div id="brdr">
					{if $user->profile_info.profilevalue_5 == 2}
						<img id="userEditPhotoImg" border='0'  src="{$user->user_photo('./images/avatars_11.gif')}" alt="" />
					{else}
						<img id="userEditPhotoImg" border='0'  src="{$user->user_photo('./images/avatars_09.gif')}" alt="" />
					{/if}
					{if $user->user_photo() != ""}
						<div id="userEditRemovePhotoLink">[ <a href='#' onclick='userPhotoRemove(); return false;'>{lang_print id=771}</a> ]</div>
					{/if}
				</div>
				{if $user->user_photo() != ""}
					{literal}
					<script type="text/javascript">
						function userPhotoRemove() {
							$.post(
								"user_editprofile_photo.php", 
								{ task: 'remove' },
								function(data) {
									$("#brdr").addClass("preloader");
									$('#userEditPhotoImg').fadeOut();
									$('#userEditRemovePhotoLink').html('');
									setTimeout ( function() {
										$("#brdr").removeClass("preloader");
					{/literal}
										{if $user->profile_info.profilevalue_5 == 2}
											{literal}
												$('#main_photo').html('<img width="111" src="/images/avatars_11.gif" border="0" />');
												$('#brdr').html('<img width="111" src="/images/avatars_11.gif" border="0" />');
											{/literal}
										{else}
											{literal}
												$('#main_photo').html('<img width="111" src="/images/avatars_09.gif" border="0" />');
												$('#brdr').html('<img width="111" src="/images/avatars_09.gif" border="0" />');
											{/literal}
										{/if}
					{literal}					
										$('#userEditRemovePhotoLink').html(data);
									}, 2000);
								}
							);
						}
					</script>
					{/literal}
					
					
				{/if}
				
			</div>
			<input type='hidden' name='task' value='upload' />
			<input type='hidden' name='MAX_FILE_SIZE' value='5000000' />
		</form>
	</div>

{include file='footer.tpl'}