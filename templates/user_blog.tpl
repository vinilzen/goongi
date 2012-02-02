{include file='header.tpl'}

{* $Id: user_blog.tpl 241 2009-11-14 02:48:21Z phil $ *}
<h1>Статьи</h1>
<div class="crumb">
	<a href="/#">Главная</a>
	<a href="{$url->url_create("profile", $user->user_info.user_username)}">{lang_print id=652}<!-- Профиль --></a>
	<span>Статьи</span>
</div>
<div class="buttons">
	<span class="button2"><span class="l">&nbsp;</span><span class="c">
        <a href='user_blog_entry.php'>Написать статью</a>
		</span><span class="r">&nbsp;</span></span>
</div>

{* SEARCH FIELD *}
<div style='width: 550px;border: 1px solid #AAAAAA; background: #EEEEEE;margin-bottom:8px;{if $search == ""} display: none;{/if}' id='blog_search'>
  <div style='padding: 10px;'>
    <form action='user_blog.php' name='searchform' method='post'>
    <table cellpadding='0' cellspacing='0' align='center'>
    <tr>
    <td><b>{lang_print id=1500049}</b>&nbsp;&nbsp;</td>
    <td><input type='text' name='search' maxlength='100' size='30' value='{$search}' />&nbsp;</td>
    <td>{lang_block id=646 var=langBlockTemp}<input type='submit' class='button' value='{$langBlockTemp}' />{/lang_block}</td>
    </tr>
    </table>
    <input type='hidden' name='s' value='{$s}' />
    <input type='hidden' name='p' value='{$p}' />
    </form>
  </div>
</div>




{if $user->level_info.level_blog_create}

  {* DISPLAY MESSAGE IF NO BLOG ENTRIES *}
  {if !$total_blogentries}

   

  {* DISPLAY ENTRIES *}
  {else}
   
      {* LIST BLOG ENTRIES *}
      <ul class="article_list">
      <form action='user_blog.php' name='entryform' method='post'>
        {assign var=i value=0}
      {section name=blogentry_loop loop=$blogentries}
        {assign var=i value=$i+1}
       <li id = "blog_msg{$blogentries[blogentry_loop].blogentry_id}">
            <a><img src="{$user->user_photo('./images/no_photo.gif')}" alt="" /></a>
            <div>
                <a class="name">{$blogentries[blogentry_loop].blogentry_author->user_displayname}</a>
                  <big><a href='{$url->url_create("blog_entry", $user->user_info.user_username, $blogentries[blogentry_loop].blogentry_id)}'>
                    {$blogentries[blogentry_loop].blogentry_title|truncate:80:"...":false}
                  </a></big>
                <a href="#" onclick="delete_blog('deleteblog',{$blogentries[blogentry_loop].blogentry_id}); return false;" class="del">Удалить</a>
                <a href='user_blog_entry.php?blogentry_id={$blogentries[blogentry_loop].blogentry_id}' class="edit">Редактировать</a>
                <span>{$data_rus[$i]}</span>
            </div>
                 
               
                {if !empty($blogentries[blogentry_loop].blogentry_body)}
                
                  <p>{$blogentries[blogentry_loop].blogentry_body|strip_tags|truncate:1100}</p>
                
                {/if}
              
        </li>
       {/section}
      </ul>
     

    
       
    {* HIDDEN DIV TO DISPLAY DELETE CONFIRMATION MESSAGE *}
    <div style='display: none;' id='confirmblogdelete'>
      <div style='margin-top: 10px;'>
        {lang_print id=1500114}
      </div>
      <br />
      {lang_block id=175 var=langBlockTemp}<input type='button' class='button' value='{$langBlockTemp}' onClick='parent.TB_remove();parent.SocialEngine.Blog.deleteBlogConfirm();' />{/lang_block}
      {lang_block id=39 var=langBlockTemp}<input type='button' class='button' value='{$langBlockTemp}' onClick='parent.TB_remove();' />{/lang_block}
    </div>
    
  {/if}
  
{/if}


      {* DISPLAY PAGINATION MENU IF APPLICABLE *}
      {if $maxpage > 1}
        <div class="pager">
          {if $p != 1}
            <a  class="prev" href='user_blog.php?s={$s}&search={$search}&p={math equation="p-1" p=$p}'>Сюда</a>
          {/if}
          {if $p_start == $p_end}
            &nbsp;|&nbsp; {lang_sprintf id=184 1=$p_start 2=$total_blogentries} &nbsp;|&nbsp;
          {else}
            &nbsp;|&nbsp; {lang_sprintf id=185 1=$p_start 2=$p_end 3=$total_blogentries} &nbsp;|&nbsp;
          {/if}
          {if $p != $maxpage}
            <a class="next" href='user_blog.php?s={$s}&search={$search}&p={math equation="p+1" p=$p}'>Туда</a>
          {else}
            <a href="#" class="next">Туда</a>
          {/if}
     </div>
      {/if}
           
{include file='footer.tpl'}