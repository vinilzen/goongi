{include file='header.tpl'}

{* $Id: user_history_entry.tpl 161 2009-04-28 21:14:59Z john $ *}
<script type="text/javascript" src="./include/fckeditor/fckeditor.js"></script>

<h1>{if !empty($historyentry_info.historyentry_id)}Редактировать историю рода{else}Написать историю рода{/if}</h1>
<div class="crumb">
    <a href="#">Главная</a>
    <a href="/user_history.php">История рода</a>
    <span>{if !empty($historyentry_info.historyentry_id)}Редактировать историю рода{else}Написать историю рода{/if}</span>
</div>
<div class="clear"></div>

{* history ENTRY INPUT *}
<div id="entry_main">

<form action='user_history_entry.php' method='post' name='historyform' >
 
	<div class="edit_blog">
		<div class="input">
			<label>{lang_print id=1600056}</label>
			<input type='text' class="text" name='historyentry_title' size='50' maxlength='100' value='{$historyentry_info.historyentry_title}' />
		</div>
    </div>

<script type="text/javascript">
  <!--
  var sToolbar;
  var oFCKeditor = new FCKeditor('historyentry_body');
  oFCKeditor.BasePath = "./include/fckeditor/";
  oFCKeditor.Config["ProcessHTMLEntities"] = false;
  oFCKeditor.Config["CustomConfigurationsPath"] = "../../js/history_fckconfig.js";
  oFCKeditor.Height = "500";
  oFCKeditor.ToolbarSet = "se_history";
  oFCKeditor.Value = '{if !empty($historyentry_info.historyentry_body)}{$historyentry_info.historyentry_body}{/if}';
  oFCKeditor.Config["SocialEngineUploadCustom"] = {if !empty($global_plugins.album) && $user->level_info.level_album_allow}true{else}false{/if};
  oFCKeditor.Create() ;
  //-->
</script>
  
  
  {* SEND ID FOR EDITING *}
  {if !empty($historyentry_info.historyentry_id)}
    <input type='hidden' name='historyentry_id' value='{$historyentry_info.historyentry_id}' />
  {/if}
   </div>
{echo $status_user}
 {if ($status_user  == 0) || ($status_user  == '')}
<div class="buttons_edit_blog">
	{lang_block id=1600065 var=langBlockTemp}
	<span class="button2"><span class="l">&nbsp;</span><span class="c">
	<input type="submit" value="Сохранить"  style="padding:1px 0px 0px 0px;" name="save" />
	</span><span class="r">&nbsp;</span></span>{/lang_block}
	<input type='hidden' name='task' value='dosave'>
	</form>

	<form action='user_history.php' method='post'>
            {lang_block id=39 var=langBlockTemp}
            <span class="button2"><span class="l">&nbsp;</span><span class="c">
            <input type="submit" style="padding:1px 0px 0px 0px;"  value="Отмена" onclick="dateupdatenull({$historyentry_info.historyentry_id});" name="save" />
            </span><span class="r">&nbsp;</span></span>
            {/lang_block}
	</form>
</div>
{else}
{lang_block id=1600065 var=langBlockTemp}
	История была изменена. Просмотреть измененную историю <a href="user_history.php" target="_blank"> можно на следующей странице </a>
<div class="buttons_edit_blog">
	{lang_block id=1600065 var=langBlockTemp}
	<span class="button2"><span class="l">&nbsp;</span><span class="c">
	<input type="submit" value="Перезаписать"  style="padding:1px 0px 0px 0px;" name="save" />
	</span><span class="r">&nbsp;</span></span>{/lang_block}
	<input type='hidden' name='task' value='dosave'>
        <input type='hidden' name='status_user' value='0'>
	</form>
	<form action='user_history.php' method='post'>
            {lang_block id=39 var=langBlockTemp}
            <span class="button2"><span class="l">&nbsp;</span><span class="c">
            <input type="submit" style="padding:1px 0px 0px 0px;"  value="Отмена" onclick="dateupdatenull({$historyentry_info.historyentry_id});" name="save" />
            </span><span class="r">&nbsp;</span></span>
            {/lang_block}
	</form>
</div>
{/if}


{include file='footer.tpl'}