{include file='header.tpl'}
{literal}
<script type="text/javascript">
	  document.onkeydown = function(e) {
	    e = e || window.event;
	    if (e.keyCode == 13) {
	      $('#seach_f').submit();
	    }
	    return true;
	  }
	</script>
{/literal}
{* $Id: search_advanced.tpl 217 2009-08-11 23:20:02Z phil $ *}
<h1>{lang_print id=1087}</h1><!--Расширенный поиск пользователей-->
<div class="crumb seach"><a href="#">Главная</a><a href="search.php">{lang_print id=646}<!-- Поиск --></a><span>{lang_print id=1087}</span></div>
<!--({lang_print id=1088})--><!--Поиск пользователей по ключевым словам и критериям.-->
{* SHOW PAGE TITLE *}
{if $showfields == 1}
  <!--<div class='page_header'>{lang_print id=1087}</div>-->
  <div></div>
{elseif $showfields == 0}
  <div class='page_header'>{lang_sprintf id=1083 1="`$linked_field_title`: `$linked_field_value`"}</div>
  <div>{lang_sprintf id=1084 1=$total_users 2="`$linked_field_title`: `$linked_field_value`"}</div>
{/if}

<table cellpadding='0' cellspacing='0' width='100%'>
<tr>
<td style='width: 200px; vertical-align: top;'>

{* SHOW FIELDS IF USER IS DOING A MANUAL SEARCH *}
{if $showfields == 1}

  {* SHOW ERROR IF NO FIELDS *}
  {if $cats_menu == NULL}
    <br>
    <table cellpadding='0' cellspacing='0' align='center'>
    <tr><td class='result'>{lang_print id=1114}</td></tr>
    </table>

  {else}

    <form action='search_advanced.php' method='post' id = "seach_f">
<div class="form seach">
    <h2>{lang_print id=1089}</h2>
      {* START BY SHOWING PROFILE CATEGORIES *}

      {* LOOP THROUGH FIELDS *}
      {section name=cat_loop loop=$cats}
      {section name=subcat_loop loop=$cats[cat_loop].subcats}
      {section name=field_loop loop=$cats[cat_loop].subcats[subcat_loop].fields}
  <!--    {if $cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_title != '500376' }<label>{lang_print id=$cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_title}</label>
    {else}<label>{lang_print id=736}<label>{/if}-->

          {* TEXT FIELD/TEXTAREA *}
          {if $cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_type == 1 || $cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_type == 2}
	    {* RANGED SEARCH *}
	    {if $cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_search == 2}
	      <input type='text' class='text' size='5' name='field_{$cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_id}_min' value='{$cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_value_min}' maxlength='100'>
	      - 
	      <input type='text' class='text' size='5' name='field_{$cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_id}_max' value='{$cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_value_max}' maxlength='100'>	  
	    {* EXACT VALUE SEARCH *}
	    {else}
            
                 <div class="input">
                    <label >{lang_print id=$cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_title}</label>
                   <input type='text' class='text' size='15' name='field_{$cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_id}' value='{$cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_value}' maxlength='100'>
                 </div>
                
	    {/if}

		  {* RADIO BUTTONS *}
		  {elseif $cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_type == 4}
              {section name=option_loop loop=$cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_options}
			  <input type="radio" name="field_{$cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_id}"
			    id="radio_{$cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_id}_{$cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_options[option_loop].value}"
				value='{$cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_options[option_loop].value}'
				{if $cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_options[option_loop].value == $cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_value}
					checked="true"{/if}
				>
			  <label for="radio_{$cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_id}_{$cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_options[option_loop].value}">
               {lang_print id=$cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_options[option_loop].label}
			  </label><br>
              {/section}


          {* SELECT BOX/RADIO BUTTONS *}
          {elseif $cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_type == 3}

	    {* RANGED SEARCH *}
	    {if $cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_search == 2}
              <select name='field_{$cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_id}_min'>
              <option value='-1'></option>
              {section name=option_loop loop=$cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_options}
                <option value='{$cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_options[option_loop].value}'{if $cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_options[option_loop].value == $cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_value_min} SELECTED{/if}>{lang_print id=$cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_options[option_loop].label}</option>
              {/section}
              </select>
	      - 
              <select name='field_{$cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_id}_max'>
              <option value='-1'>
               {if $cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_id == 4} любой{/if}
               {if $cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_id == 5 || $cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_id == 6 || $cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_id == 7} любая{/if}
               {if $cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_id == 8} любое{/if}
              </option>
              {section name=option_loop loop=$cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_options}
                <option value='{$cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_options[option_loop].value}'{if $cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_options[option_loop].value == $cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_value_max} SELECTED{/if}>{lang_print id=$cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_options[option_loop].label}</option>
              {/section}
              </select>
	    {* EXACT VALUE SEARCH *}
	    {else}
            <div class="input">

            <label>{lang_print id=$cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_title}</label>
   {if $cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_id == 7  }
                <div><select name='field_{$cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_id}' id='dhtmlgoodies_country' onchange="getCityList(this.value);">
                  <option id='op' value='-1'>любая</option>
                                      {$country}</select>
                  </div>
{elseif  $cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_id == 8}
     <div id = "countydiv">
                <select name='field_{$cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_id}' id='dhtmlgoodies_city'>
                  <option id='op' value='-1'>
                     любой
                </option>
                                      {$city}</select>
                  </div>
            {else}
              <select name='field_{$cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_id}'>
              <option value='-1'>
               {if $cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_id == 5} любой{/if}
               {if $cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_id == 6 || $cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_id == 7 || $cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_id == 8} любая{/if}
               {if $cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_id == 15} любое{/if}
               </option>
              {section name=option_loop loop=$cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_options}
                <option value='{$cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_options[option_loop].value}'{if $cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_options[option_loop].value == $cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_value} SELECTED{/if}>{lang_print id=$cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_options[option_loop].label}</option>
              {/section}
              </select>
            </div>
	    {/if}
{/if}

          {* DATE FIELD *}
          {elseif $cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_type == 5}

	    {* BIRTHDAYS *}
	    {if $cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_special == 1}
<div class="input">
<div class = "date">
        <label>{lang_print id=736}</label>
         <input onChange ="" type="text" id = "min_p" value="{if $cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_value_min != ''}{$cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_value_min}{else}От{/if}" onfocus="if (this.value == 'От') this.value =''; this.style.color='#7f7f7f';" onblur="if (this.value == '') this.value='От'; this.style.color='#7f7f7f';"  name='field_{$cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_id}_3_min'/>
             -
         <input type="text" onChange ="$('#max').val({$cats[cat_loop].subcats[subcat_loop].fields[field_loop].date_array3[this.value].value})" value="{if $cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_value_max !=''}{$cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_value_max}{else}До{/if}" onfocus="if (this.value == 'До') this.value =''; this.style.color='#7f7f7f';" onblur="if (this.value == '') this.value='До'; this.style.color='#7f7f7f';"  name='field_{$cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_id}_3_max'/>

        <!--    <select name='field_{$cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_id}_3_min'>
              {section name=date3_min loop=$cats[cat_loop].subcats[subcat_loop].fields[field_loop].date_array3}
                <option value='{$cats[cat_loop].subcats[subcat_loop].fields[field_loop].date_array3[date3_min].value}'{if $cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_value_min == $cats[cat_loop].subcats[subcat_loop].fields[field_loop].date_array3[date3_min].value} SELECTED{/if}>{if $smarty.section.date3_min.first}[ {lang_print id=1116} ]{else}{math equation='x-y' x=$smarty.now|date_format:"%Y" y=$cats[cat_loop].subcats[subcat_loop].fields[field_loop].date_array3[date3_min].name}{/if}</option>
              {/section}
              </select>
	   
             <select name='field_{$cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_id}_3_max'>
              {section name=date3_max loop=$cats[cat_loop].subcats[subcat_loop].fields[field_loop].date_array3}
                <option value='{$cats[cat_loop].subcats[subcat_loop].fields[field_loop].date_array3[date3_max].value}'{if $cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_value_max == $cats[cat_loop].subcats[subcat_loop].fields[field_loop].date_array3[date3_max].value} SELECTED{/if}>{if $smarty.section.date3_max.first}[ {lang_print id=1117} ]{else}{math equation='x-y' x=$smarty.now|date_format:"%Y" y=$cats[cat_loop].subcats[subcat_loop].fields[field_loop].date_array3[date3_max].name}{/if}</option>
              {/section}
              </select>
-->
</div>
</div>
	    {* NORMAL DATES *}
	    {else}

              <select name='field_{$cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_id}_1'>
              {section name=date1 loop=$cats[cat_loop].subcats[subcat_loop].fields[field_loop].date_array1}
                <option value='{$cats[cat_loop].subcats[subcat_loop].fields[field_loop].date_array1[date1].value}'{$cats[cat_loop].subcats[subcat_loop].fields[field_loop].date_array1[date1].selected}>{if $smarty.section.date1.first}{lang_print id=$cats[cat_loop].subcats[subcat_loop].fields[field_loop].date_array1[date1].name}{else}{$cats[cat_loop].subcats[subcat_loop].fields[field_loop].date_array1[date1].name}{/if}</option>
              {/section}
              </select>

              <select name='field_{$cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_id}_2'>
              {section name=date2 loop=$cats[cat_loop].subcats[subcat_loop].fields[field_loop].date_array2}
                <option value='{$cats[cat_loop].subcats[subcat_loop].fields[field_loop].date_array2[date2].value}'{$cats[cat_loop].subcats[subcat_loop].fields[field_loop].date_array2[date2].selected}>{if $smarty.section.date2.first}{lang_print id=$cats[cat_loop].subcats[subcat_loop].fields[field_loop].date_array2[date2].name}{else}{$cats[cat_loop].subcats[subcat_loop].fields[field_loop].date_array2[date2].name}{/if}</option>
              {/section}
              </select>

              <select name='field_{$cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_id}_3'>
              {section name=date3 loop=$cats[cat_loop].subcats[subcat_loop].fields[field_loop].date_array3}
                <option value='{$cats[cat_loop].subcats[subcat_loop].fields[field_loop].date_array3[date3].value}'{$cats[cat_loop].subcats[subcat_loop].fields[field_loop].date_array3[date3].selected}>{if $smarty.section.date3.first}{lang_print id=$cats[cat_loop].subcats[subcat_loop].fields[field_loop].date_array3[date3].name}{else}{$cats[cat_loop].subcats[subcat_loop].fields[field_loop].date_array3[date3].name}{/if}</option>
              {/section}
              </select>

	    {/if}


          {* CHECKBOXES *}
          {elseif $cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_type == 6}
    
            {* LOOP THROUGH FIELD OPTIONS *}
            {section name=option_loop loop=$cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_options}
              <table cellpadding='0' cellspacing='0'>
	      <tr>
	      <td><input type='checkbox' name='field_{$cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_id}[]' id='label_{$cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_id}_{$cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_options[option_loop].value}' value='{$cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_options[option_loop].value}'{if $cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_options[option_loop].value|in_array:$cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_value} checked='checked'{/if} style='vertical-align: middle;'></td>
	      <td><label for='label_{$cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_id}_{$cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_options[option_loop].value}'>{lang_print id=$cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_options[option_loop].label}</label></td>
	      </tr>
	      </table>
            {/section}

          {/if}

      {/section}
      {/section}
      {/section}

      {* SHOW SUBMIT BUTTON *}
      <div class = "input">
	  <label>{lang_print id=1091}</label>
          <select name='sort' class='small'>
          <option value='user_dateupdated DESC'{if $sort == "user_dateupdated DESC"} SELECTED{/if}>{lang_print id=1092} {lang_print id=1093}</option>
          <option value='user_dateupdated ASC'{if $sort == "user_dateupdated ASC"} SELECTED{/if}>{lang_print id=1092} {lang_print id=1094}</option>
          <option value='user_lastlogindate DESC'{if $sort == "user_lastlogindate DESC"} SELECTED{/if}>{lang_print id=1095} {lang_print id=1093}</option>
          <option value='user_lastlogindate ASC'{if $sort == "user_lastlogindate ASC"} SELECTED{/if}>{lang_print id=1095} {lang_print id=1094}</option>
          <option value='user_signupdate DESC'{if $sort == "user_signupdate DESC"} SELECTED{/if}>{lang_print id=1096} {lang_print id=1093}</option>
          <option value='user_signupdate ASC'{if $sort == "user_signupdate ASC"} SELECTED{/if}>{lang_print id=1096} {lang_print id=1094}</option>
          </select>
	  <table cellpadding='0' cellspacing='0' style='padding-top: 5px;'>
	  <tr><td><input type='checkbox' name='user_withphoto' id='user_withphoto' value='1'{if $user_withphoto == 1} checked='checked'{/if}></td><td><label for='user_withphoto'>{lang_print id=1122}</label></td></tr>
	  <tr><td><input type='checkbox' name='user_online' id='user_online' value='1'{if $user_online == 1} checked='checked'{/if}></td><td><label for='user_online'>{lang_print id=1121}</label></td></tr>
	  </table>
	</div>
        <div style='padding-top: 10px; padding-bottom: 5px;'>
       
        <span class="button2">
        <span class="l">&nbsp;</span>
        <span class="c">
        <a onclick = "document.getElementById('seach_f').submit()">{lang_print id=1090}</a>
        </span>
        <span class="r">&nbsp;</span>
        </span>
          <input type='hidden' name='task' value='dosearch'>
          <input type='hidden' name='cat_selected' value='{$cat_selected}'>
	</div>
      </div>
      </form>
</div>
  {/if}
{/if}



</td>
<td style='padding-left: 25px;' valign='top'>



{* SHOW MESSAGE IF NO RESULTS FOUND *}
{if $total_users == 0 && ($showfields == 0 || $cats_menu != NULL)}
 
 {lang_print id=1085}<!--Ни один человек не найден, который соответствовал бы данным критериям поиска.-->



{* SHOW RESULTS *}
{elseif $total_users != 0}

  {* DISPLAY PAGINATION MENU IF APPLICABLE *}
  {if $maxpage > 1}
    <div class='browse_pages'>
      {if $p != 1}<a href='search_advanced.php?{$url_string}cat_selected={$cat_selected}&task={$task}&sort={$sort}&user_online={$user_online}&user_withphoto={$user_withphoto}&p={math equation='p-1' p=$p}'>&#171; {lang_print id=182}</a>{else}<font class='disabled'>&#171; {lang_print id=182}</font>{/if}
      {if $p_start == $p_end}
        &nbsp;|&nbsp; {lang_sprintf id=184 1=$p_start 2=$total_users} &nbsp;|&nbsp; 
      {else}
        &nbsp;|&nbsp; {lang_sprintf id=185 1=$p_start 2=$p_end 3=$total_users} &nbsp;|&nbsp; 
      {/if}
      {if $p != $maxpage}<a href='search_advanced.php?{$url_string}cat_selected={$cat_selected}&task={$task}&sort={$sort}&user_online={$user_online}&user_withphoto={$user_withphoto}&p={math equation='p+1' p=$p}'>{lang_print id=183} &#187;</a>{else}<font class='disabled'>{lang_print id=183} &#187;</font>{/if}
    </div>
  {/if}

  {* DISPLAY BROWSE RESULTS IN THUMBNAIL FORM *}
  {section name=user_loop loop=$users}
    <div class='browse_result' style='float: left; padding: 5px; width: 90px; height: 110px; text-align: center;'>
      <a href='{$url->url_create('profile',$users[user_loop]->user_info.user_username)}'>
      {if $users[user_loop]->user_info.profilevalue_5 == 2}
						<img src="{$users[user_loop]->user_photo('./images/avatars_17.gif', TRUE)}" class='photo' style='display: block; margin-left: auto; margin-right: auto;' width='60' height='60' border='0' alt="{lang_sprintf id=509 1=$users[user_loop]->user_displayname_short}">
					{else}
						<img src="{$users[user_loop]->user_photo('./images/avatars_15.gif', TRUE)}" class='photo' style='display: block; margin-left: auto; margin-right: auto;' width='60' height='60' border='0' alt="{lang_sprintf id=509 1=$users[user_loop]->user_displayname_short}">
					{/if}
<!--<img src='{$users[user_loop]->user_photo('./images/no_photo_thumb.gif', TRUE)}' class='photo' style='display: block; margin-left: auto; margin-right: auto;' width='60' height='60' border='0' alt="{lang_sprintf id=509 1=$users[user_loop]->user_displayname_short}">-->
      {$users[user_loop]->user_displayname|truncate:20:"...":true}</a>
      {if $users[user_loop]->is_online == 1}<div style='margin-top: 3px;font: normal normal normal 11px/normal arial;color:#7F7F7F;'>{lang_print id=1086}</div>{/if}
    </div>
    {cycle name="newrow" values=",,,,,"}
  {/section}
  <div style='clear: both;'></div>

  {* DISPLAY PAGINATION MENU IF APPLICABLE *}
  
{/if}
{if $maxpage > 1}
    <div class='browse_pages'>
      {if $p != 1}<a href='search_advanced.php?{$url_string}cat_selected={$cat_selected}&task={$task}&sort={$sort}&user_online={$user_online}&user_withphoto={$user_withphoto}&p={math equation='p-1' p=$p}'>&#171; {lang_print id=182}</a>{else}<font class='disabled'>&#171; {lang_print id=182}</font>{/if}
      {if $p_start == $p_end}
        &nbsp;|&nbsp; {lang_sprintf id=184 1=$p_start 2=$total_users} &nbsp;|&nbsp;
      {else}
        &nbsp;|&nbsp; {lang_sprintf id=185 1=$p_start 2=$p_end 3=$total_users} &nbsp;|&nbsp;
      {/if}
      {if $p != $maxpage}<a href='search_advanced.php?{$url_string}cat_selected={$cat_selected}&task={$task}&sort={$sort}&user_online={$user_online}&user_withphoto={$user_withphoto}&p={math equation='p+1' p=$p}'>{lang_print id=183} &#187;</a>{else}<font class='disabled'>{lang_print id=183} &#187;</font>{/if}
    </div>
  {/if}
		</td>

	</tr>


</table>

{include file='footer.tpl'}
