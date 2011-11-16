{include file='header.tpl'}

{* $Id: search.tpl 8 2009-01-11 06:02:53Z john $ *}

<div class="all">
	<div class="center_all">
		<div class="block4">
			<div class="c">
				<div class="bg_l">
					<div class="bg_r">
						<h1>{lang_print id=924}<!-- Поиск по сайту --></h1>
						<div class="crumb"><a href="#">Главная</a><span>{lang_print id=646}<!-- Поиск --></span></div>
						<div class="buttons">
							<form action='search.php' name='search_form' method='post'>
								
								<input type='text' size='30' class="srch_inp" name='search_text' id='search_text' value='{$search_text}' maxlength='100'></td>
								<span class="button2" style="margin:0;"><span class="l">&nbsp;</span><span class="c">
									<input type='submit' class='button' value='{lang_print id=646}'>
								</span><span class="r">&nbsp;</span></span>
								<input type='hidden' name='task' value='dosearch'>
								<input type='hidden' name='t' value='0'>
								<a href='search_advanced.php'>{lang_print id=926}</a>
							</form>						
						</div>
						<div class="group_list">
							<ul>
								<li><a href="#">Быстрый поиск</a></li>
								<li><a href="#">Поиск людей</a></li>
								<li><a href="#">Поиск мероприятий</a></li>
								<li><a href="#">Поиск событий</a></li>
								<li><a href="#">Поиск статей</a></li>
							</ul>
						</div>

{if $search_text != ""}

  {if $is_results == 0}

    <table cellpadding='0' cellspacing='0' align='center'>
    <tr>
    <td class='result'>
      <img src='./images/icons/bulb16.gif' class='icon'>
      {lang_sprintf id=927 1=$search_text}
    </td>
    </tr>
    </table>

  {else}


    {* SHOW DIFFERENT RESULT TOTALS *}
    <table class='tabs' cellpadding='0' cellspacing='0'>
    <tr>
    <td class='tab0'>&nbsp;</td>
      {section name=search_loop loop=$search_objects}
        <td class='tab{if $t == $search_objects[search_loop].search_type}1{else}2{/if}' NOWRAP>{if $search_objects[search_loop].search_total == 0}{lang_sprintf id=$search_objects[search_loop].search_lang 1=$search_objects[search_loop].search_total}{else}<a href='search.php?task=dosearch&search_text={$url_search}&t={$search_objects[search_loop].search_type}'>{lang_sprintf id=$search_objects[search_loop].search_lang 1=$search_objects[search_loop].search_total}</a>{/if}</td>
        <td class='tab'>&nbsp;</td>
      {/section}
      <td class='tab3'>&nbsp;</td>
    </tr>
    </table>

    <div class='search_results'>

      {* SHOW PAGES *}
      {if $p != 1}<a href='search.php?task=dosearch&search_text={$url_search}&t={$t}&p={math equation='p-1' p=$p}'>&#171; {lang_print id=182}</a> &nbsp;|&nbsp;&nbsp;{/if}
      {if $p_start == $p_end}
        <b>{lang_sprintf id=184 1=$p_start 2=$total_results}</b> ({lang_sprintf id=928 1=$search_time}) 
      {else}
        <b>{lang_sprintf id=185 1=$p_start 2=$p_end 3=$total_results}</b> ({lang_sprintf id=928 1=$search_time}) 
      {/if}
      {if $p != $maxpage}&nbsp;&nbsp;|&nbsp; <a href='search.php?task=dosearch&search_text={$url_search}&t={$t}&p={math equation='p+1' p=$p}'>{lang_print id=183} &#187;</a>{/if}

      <br><br>
<ul class="friends_list">
      {* SHOW RESULTS *}
      {section name=result_loop loop=$results}
<li>
	<a href="{$results[result_loop].result_url}"><img src='{$results[result_loop].result_icon}' class='photo' border='0'></a>
	<div>
		<p><a href="#">vip</a><a href="#">название группы</a></p>
		<h2><a href="{$results[result_loop].result_url}">
			{$results[result_loop].result_name_1|truncate:30:"...":true}
		</a></h2>
		<a href="#" class="add_msg">Написать сообщение</a><br />
		<a href="#">Добавить в группу</a><br />
		<!-- <a href="#" class="del">Убрать из друзей</a> -->
	   
        <a href="{$results[result_loop].result_url}" class="title"></a>
        <div class='search_result_text2'>{lang_sprintf id=$results[result_loop].result_desc 1=$results[result_loop].result_desc_1 2=$results[result_loop].result_desc_2 3=$results[result_loop].result_desc_3}</div>
	    {if $results[result_loop].result_online == 1}<span>{lang_print id=929}</span>{/if}
	</div>
</li>
        {cycle name="clear_cycle" values=",<div style='clear: both; height: 0px;'></div>"}
      {/section}

      {* SHOW PAGES *}
      {if $p != 1}<a href='search.php?task=dosearch&search_text={$url_search}&t={$t}&p={math equation='p-1' p=$p}'>&#171; {lang_print id=182}</a> &nbsp;|&nbsp;&nbsp;{/if}
      {if $p_start == $p_end}
        <b>{lang_sprintf id=184 1=$p_start 2=$total_results}</b> ({lang_sprintf id=928 1=$search_time}) 
      {else}
        <b>{lang_sprintf id=185 1=$p_start 2=$p_end 3=$total_results}</b> ({lang_sprintf id=928 1=$search_time}) 
      {/if}
      {if $p != $maxpage}&nbsp;&nbsp;|&nbsp; <a href='search.php?task=dosearch&search_text={$url_search}&t={$t}&p={math equation='p+1' p=$p}'>{lang_print id=183} &#187;</a>{/if}


    </div>
  {/if}
{/if}


{* JAVASCRIPT TO AUTOFOCUS ON SEARCH FIELD *}
{literal}
<script type="text/javascript">
<!-- 
  window.addEvent('load', function(){ $('search_text').focus(); });
//-->
</script>
{/literal}

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
{include file='footer.tpl'}