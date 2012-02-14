{include file='header.tpl'}

{* $Id: search.tpl 8 2009-01-11 06:02:53Z john $ *}

<h1>{lang_print id=924}<!-- Поиск по сайту --></h1>
<div class="crumb seach"><a href="#">Главная</a><span>{lang_print id=646}<!-- Поиск --></span></div>
<div class="buttons">
	<form action='search.php' name='search_form' method='post'>
		
		<input type='text' size='30' class="srch_inp" name='search_text' id='search_text' value='{$search_text}' maxlength='100'></td>
		<span class="button2" style="margin:0;"><span class="l">&nbsp;</span><span class="c">
			<input type='submit' class='button' value='{lang_print id=646}'>
		</span><span class="r">&nbsp;</span></span>
		<input type='hidden' name='task' value='dosearch'>
		<input type='hidden' name='t' value='' id = "t">
                <input type='hidden' name='them' value='{$them}' id = "them">
		<a href='search_advanced.php'>{lang_print id=926}</a>
	</form>						
</div>
<div class="group_list">
	<ul>
		<li><a {if $them === "quik"} class = 'active'{/if} href="javascript:void(0);" onclick = "$('#them').val('quik');       $('.group_list ul li a').removeClass('active');   $(this).addClass('active');">Быстрый поиск</a></li>
		<li><a {if $them === "user"} class = 'active'{/if} href="javascript:void(0);" onclick = "$('#them').val('user');$('.group_list ul li a').removeClass('active');   $(this).addClass('active');">Поиск людей</a></li>
                <li><a {if $them === "action"} class = 'active'{/if} href="javascript:void(0);" onclick = "$('#them').val('action');    $('.group_list ul li a').removeClass('active');   $(this).addClass('active');">Поиск мероприятий</a></li>
		<li><a {if $them === "event"} class = 'active'{/if} href="javascript:void(0);" onclick = "$('#them').val('event');   $('.group_list ul li a').removeClass('active');   $(this).addClass('active');">Поиск событий</a></li>
		<li><a {if $them === "blog"} class = 'active'{/if} href="javascript:void(0);" onclick = "$('#them').val('blog');    $('.group_list ul li a').removeClass('active');   $(this).addClass('active');">Поиск статей</a></li>
	</ul>
</div>

{if $search_text != ""}

  {if $is_results == 0}

    <table cellpadding='0' cellspacing='0' align='center'>
    <tr>
    <td class='result'>
      {lang_sprintf id=927 1=$search_text}
    </td>
    </tr>
    </table>

  {else}


    {* SHOW DIFFERENT RESULT TOTALS *}
 <!--   <table class='tabs' cellpadding='0' cellspacing='0'>
    <tr>
    <td class='tab0'>&nbsp;</td>
      {section name=search_loop loop=$search_objects}
        <td class='tab{if $t == $search_objects[search_loop].search_type}1{else}2{/if}' NOWRAP>{if $search_objects[search_loop].search_total == 0}{lang_sprintf id=$search_objects[search_loop].search_lang 1=$search_objects[search_loop].search_total}{else}<a href='search.php?task=dosearch&search_text={$url_search}&t={$search_objects[search_loop].search_type}&t={$them}'>{lang_sprintf id=$search_objects[search_loop].search_lang 1=$search_objects[search_loop].search_total}</a>{/if}</td>
        <td class='tab'>&nbsp;</td>
      {/section}
      <td class='tab3'>&nbsp;</td>
    </tr>
    </table>-->

 {* SHOW PAGES *}
      
     
<div class='search_results'>
 {* SHOW PAGES *}
      {if $p != 1}<a href='search.php?task=dosearch&search_text={$url_search}&t={$t}&them={$them}&p={math equation='p-1' p=$p}'>&#171; {lang_print id=182}</a> &nbsp;|&nbsp;&nbsp;{/if}
        {if $p != 1 || $p != $maxpage}
        <b>{lang_sprintf id=185 1=$p_start 2=$p_end 3=$total_results}</b>
      {/if}
      {if $p != $maxpage}&nbsp;&nbsp;|&nbsp; <a href='search.php?task=dosearch&search_text={$url_search}&t={$t}&them={$them}&p={math equation='p+1' p=$p}'>{lang_print id=183} &#187;</a>{/if}

{if $them == 'blog' || $them == 'event' || $them == 'action'}
<ul class="friends_list">
      {* SHOW RESULTS *}
      {section name=result_loop loop=$results}
<li>

	<div>
		<h2><a href="{$results[result_loop].result_url}">
                        {$results[result_loop].result_name_1}
		</a></h2>
	<div class="body">{$results[result_loop].result_online|truncate:660:"...":true}</div>
        <div class='search_result_text2'>{lang_sprintf id=$results[result_loop].result_desc 1=$results[result_loop].result_desc_1 2=$results[result_loop].result_desc_2 3=$results[result_loop].result_desc_3}</div>
	    {if $results[result_loop].result_online == 1}<span>{lang_print id=929}</span>{/if}
	</div>
</li>
        {cycle name="clear_cycle" values=",<div style='clear: both; height: 0px;'></div>"}
      {/section}
{else}
<ul class="friends_list">
      {* SHOW RESULTS *}
      {section name=result_loop loop=$results}
<li>
	<a href="{$results[result_loop].result_url}"><img src='{$results[result_loop].result_icon}' class='photo' border='0'></a>
	<div>
		<!--<p><a href="#">vip</a><a href="#">название группы</a></p>-->
		<h2><a href="{$results[result_loop].result_url}">
			<!--{$results[result_loop].result_name_1|truncate:35:"...":true}-->
                        {$results[result_loop].result_name_1}
		</a></h2>
		<a href="#" title = "{$results[result_loop].result_name_1}" class="add_msg" id="add_msg">Написать сообщение</a><br />
		<!--<a href="#">Добавить в группу</a><br />-->
		<!-- <a href="#" class="del">Убрать из друзей</a> -->
	   
        <a href="{$results[result_loop].result_url}" class="title"></a>
        <div class='search_result_text2'>{lang_sprintf id=$results[result_loop].result_desc 1=$results[result_loop].result_desc_1 2=$results[result_loop].result_desc_2 3=$results[result_loop].result_desc_3}</div>
	    {if $results[result_loop].result_online == 1}<span>{lang_print id=929}</span>{/if}
	</div>
</li>
        {cycle name="clear_cycle" values=",<div style='clear: both; height: 0px;'></div>"}
      {/section}
{/if}

    {if $p != 1}<a href='search.php?task=dosearch&search_text={$url_search}&t={$t}&them={$them}&p={math equation='p-1' p=$p}'>&#171; {lang_print id=182}</a> &nbsp;|&nbsp;&nbsp;{/if}
     {if $p != 1 || $p != $maxpage}
        <b>{lang_sprintf id=185 1=$p_start 2=$p_end 3=$total_results}</b>
      {/if}
      {if $p != $maxpage}&nbsp;&nbsp;|&nbsp; <a href='search.php?task=dosearch&search_text={$url_search}&t={$t}&them={$them}&p={math equation='p+1' p=$p}'>{lang_print id=183} &#187;</a>{/if}

    </div>
  {/if}
{/if}

{include file='footer.tpl'}