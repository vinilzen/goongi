{include file='header.tpl'}

{* $Id: user_blog_entry.tpl 161 2009-04-28 21:14:59Z john $ *}

<script type="text/javascript" src="./include/js/class_blog.js"></script>
<script type="text/javascript" src="./include/fckeditor/fckeditor.js"></script>

        <h1>{if !empty($blogentry_info.blogentry_id)}Редактировать статью{else}Написать статью{/if}</h1>
            <div class="crumb">
            <a href="/">Главная</a>
            <a href="/user_blog.php">Статьи</a>
            <span>{if !empty($blogentry_info.blogentry_id)}Редактировать статью{else}Написать статью{/if}</span></div>
            <div class="clear"></div>
            <div class="editor_block">

{* JAVASCRIPT *}
{lang_javascript ids=1500067,1500122,1500123}
{literal}
<script type='text/javascript'> 
<!--
  
  SocialEngine.Blog = new SocialEngineAPI.Blog();
  SocialEngine.RegisterModule(SocialEngine.Blog);
  
// -->
</script>
{/literal}


{* BLOG ENTRY INPUT *}
<div id="entry_main">
<br>
  <form action='user_blog_entry.php' method='post' name='blogform' id="blogform">
	<div class="edit_blog">
		<div class="input">
			<label>{lang_print id=1500056  }</label>
			<input type='text' class="text" name='blogentry_title' size='50' maxlength='100'{if !empty($blogentry_info.blogentry_title)} value='{$blogentry_info.blogentry_title}'{/if} />
		</div>
    </div>

<script type="text/javascript">
  <!--
  var sToolbar;
  var oFCKeditor = new FCKeditor('blogentry_body');
  oFCKeditor.BasePath = "./include/fckeditor/";
  oFCKeditor.Config["ProcessHTMLEntities"] = false;
  oFCKeditor.Config["CustomConfigurationsPath"] = "../../js/blog_fckconfig.js";
  oFCKeditor.Height = "500";
//  oFCKeditor.Weidth = "660";
  oFCKeditor.ToolbarSet = "se_blog";
  oFCKeditor.Value = '{if !empty($blogentry_info.blogentry_body)}{$blogentry_info.blogentry_body}{/if}';
  oFCKeditor.Config["SocialEngineUploadCustom"] = {if !empty($global_plugins.album) && $user->level_info.level_album_allow}true{else}false{/if};
  oFCKeditor.Create() ;
  //-->
</script>
  
  

    
  
 
  
  {* SEND ID FOR EDITING *}
  {if !empty($blogentry_info.blogentry_id)}
    <input type='hidden' name='blogentry_id' value='{$blogentry_info.blogentry_id}' />
  {/if}

  </div></div>
  <div class="buttons_edit_blog">
        {lang_block id=1500065 var=langBlockTemp}
        <span class="button2"><span class="l">&nbsp;</span><span class="c">
        <input type="submit" value="Сохранить" name="save" />
        </span><span class="r">&nbsp;</span></span>{/lang_block}
        <input type='hidden' name='task' value='dosave'>
        </form>
      
        <form action='user_blog.php' method='post'>
        {lang_block id=39 var=langBlockTemp}
        <span class="button2"><span class="l">&nbsp;</span><span class="c">
        <input type="submit" value="Отмена" name="save" />
        </span><span class="r">&nbsp;</span></span>
        {/lang_block}
        </form>
    </div>
      
  







{include file='footer.tpl'}