{include file='header.tpl'}
 {literal}
    <script type="text/javascript">
    function change(pad)
    {
       document.getElementById('pag_com').value = pad;
    }
    </script>
    {/literal}
{* BLOG ENTRIE(S) *}

  {section name=entries_loop loop=$entries}
   
      {* MAKE SURE TITLE IS NOT BLANK *}
      {if $entries[entries_loop].blogentry_title != ""}
        {assign var='blogentry_title' value=$entries[entries_loop].blogentry_title}
      {else}
        {lang_block id=1500015 var=blogentry_title}{/lang_block}
      {/if}
            <h1>{$blogentry_title}</h1>
            <div class="crumb">
                    <a href="/">Главная</a>
                    <a href="{$url->url_create("profile", $user->user_info.user_username)}">{lang_print id=652}<!-- Профиль --></a>
                    <a href="/user_blog.php">Статьи</a>
                    <span>{$blogentry_title}</span>
            </div>
                     
            <div class="buttons">
                <span class="button2"><span class="l">&nbsp;</span><span class="c">
                    <a href="user_blog_entry.php?blogentry_id={$blogentry_id}">
                    <input type="button" value="Редактировать" name="creat" />
                    </a>
                </span><span class="r">&nbsp;</span></span>
                <span class="button3"><span class="l">&nbsp;</span><span class="c">
                    <a href="user_blog.php?blogentry_id={$blogentry_id}&del=1" onclick="return delete_blog_link();">
                    <input type="button"  value="Удалить" name="creat" /></a>
                </span><span class="r">&nbsp;</span></span>
            </div>
        

            
             
            {* SHOW ENTRY CATEGORY *}
            {if !empty($entries[entries_loop].blogentry_blogentrycat_id)}
                 Category:
                {if !$entries[entries_loop].blogentrycat_user_id}<a href='browse_blogs.php?c={$entries[entries_loop].blogentry_blogentrycat_id}'>{/if}
                {if !empty($entries[entries_loop].blogentrycat_languagevar_id)}
                  {capture assign=blogentrycat_title}{lang_print id=$entries[entries_loop].blogentrycat_languagevar_id}{/capture}
                {else}
                  {assign var=blogentrycat_title value=$entries[entries_loop].blogentrycat_title}
                {/if}
                {$blogentrycat_title|truncate:97}
                {if !$entries[entries_loop].blogentrycat_user_id}</a>{/if}
              </div>
            {/if}
            <div class="press_desc">
              {$entries[entries_loop].blogentry_body|choptext:75:"<br>"}
            </div>
            <div class="autor">
				<a href="#">
					{if $user->profile_info.profilevalue_5 == 2}
						<img src="{$user->user_photo('./images/avatars_17.gif',true)}" alt="" />
					{else}
						<img src="{$user->user_photo('./images/avatars_15.gif',true)}" alt="" />
					{/if}
				</a>
				<span>Автор:</span>
				<a href="#">{$entries[entries_loop].blogentry_author->user_displayname}</a>
			</div>
      {/section}
  
  
  {* STUFF TO SHOW IF ONLY ONE BLOG ENTRY *}
  {if $blogentry_id && $total_blogentries==1}
      {* RETURN AND REPORT LINKS AND SOCIAL BOOKMARKING *}
       <div class='button' style='float: left; padding-left: 20px;'>
           
     
      
      {* COMMENTS *}
       <h2>Комментарии (<span id = "comments_count"></span>)</h2>
         <input type="hidden" id = "pag_com" name="pag_com" value="{$pag_com}">
    {literal}
	<script type="text/javascript">
		comment_get('{/literal}{$owner->user_info.user_username}{literal}',{/literal}{$entries[0].blogentry_id}{literal}, {/literal}{$user->user_info.user_id}{literal},'blog','blogentry_id', 'blogentries', 'blogentry',{/literal}{$pag_com}{literal});
	</script>
    {/literal}
        <ul class="comments" id="comments_list"></ul>
      

        <h2>Написать комментарий</h2>
        <div class="form add_com">
            <div class="input"><label>Текст комметария</label><textarea rows="3" cols="10" id="comment_msg" name="text"></textarea></div>
            <span class="button2"><span class="l">&nbsp;</span><span class="c">
            <input type="submit"  onclick="comment_post('{$owner->user_info.user_username}', {$entries[0].blogentry_id}, {$user->user_info.user_id},'blog','blogentry_id', 'blogentries', 'blogentry'); return false;" value="Отправить" name="creat" />
            </span><span class="r">&nbsp;</span></span>
        </div>

      
      {* TRACKBACKS *}
      {if !empty($trackback_list)}
      <h2>{lang_print id=1500025}</h2>
      <ul class="seBlogTrackbackList">
      {section name=trackback_loop loop=$trackback_list}
        <li style="margin-top: 10px; margin-bottom: 20px;">
          <div style="overflow: hidden;">
            <div class="profile_comment_author">
              <a href="{$trackback_list[trackback_loop].blogtrackback_url}">
                <b>{$trackback_list[trackback_loop].blogtrackback_name}</b>
              </a>
              <a href="{$trackback_list[trackback_loop].blogtrackback_url}">
                {$trackback_list[trackback_loop].blogtrackback_title}
              </a>
            </div>
            <div class="profile_comment_date">
              {$datetime->cdate("`$setting.setting_dateformat`", $datetime->timezone("`$trackback_list[trackback_loop].blogtrackback_date`", $global_timezone))}
            </div>
            <div class="profile_comment_body" id="profile_comment_body_{$trackback_list[trackback_loop].blogtrackback_id}">
              {$trackback_list[trackback_loop].blogtrackback_excerpt}
            </div>
            <div class="profile_comment_links">
              <a class="commentDeleteLink" href="javascript:void(0);">
                {lang_print id=155}
              </a>
              &nbsp;|&nbsp;
              <a class="commentReportLink" href="javascript:void(0);" onclick="javascript:TB_show(SocialEngine.Language.Translate(861), 'user_report.php?return_url={$url->url_current()}&TB_iframe=true&height=300&width=450', '', './images/trans.gif');">
                {lang_print id=1500026}
              </a>
            </div>
          </div>
        </li>
        
      {/section}
      </ul>
      {/if}
    </div>
  {/if}

{* DISPLAY PAGINATION MENU IF APPLICABLE *}
{if $maxpage > 1}
   <div class='center'>
    {if $p != 1}
      <a href='{$url->url_create("blog", $owner->user_info.user_username)}&p={math equation="p-1" p=$p}'>&#171; {lang_print id=182}</a>
    {else}
      <font class='disabled'>&#171; {lang_print id=182}</font>
    {/if}
    {if $p_start == $p_end}
      &nbsp;|&nbsp; {lang_sprintf id=184 1=$p_start 2=$total_blogentries} &nbsp;|&nbsp; 
    {else}
      &nbsp;|&nbsp; {lang_sprintf id=185 1=$p_start 2=$p_end 3=$total_blogentries} &nbsp;|&nbsp; 
    {/if}
    {if $p != $maxpage}
      <a href='{$url->url_create("blog", $owner->user_info.user_username)}&p={math equation="p+1" p=$p}'>{lang_print id=183} &#187;</a>
    {else}
      <font class='disabled'>{lang_print id=183} &#187;</font>
    {/if}
  </div>
{/if}


{include file='footer.tpl'}
