﻿{include file='header.tpl'}

{* $Id: user_event_edit.tpl 22 2009-01-16 05:50:49Z john $ *}
<h1>{lang_print id=3000136}</h1>
<div class="crumb">
	<a href="/">Главная</a>
	<a href='user_event.php'>{lang_print id=3000086}</a>
	<a href='event/{$event->event_info.event_id}/'>{$event->event_info.event_title}</a>
	<span>{lang_print id=3000137}</span>
</div>


<ul class="vk">
	<li class="active"><a href='user_event_edit.php?event_id={$event->event_info.event_id}'>{lang_print id=3000137}</a></li>
	<li><a href='user_event_edit_members.php?event_id={$event->event_info.event_id}'>{lang_print id=3000138}</a></li>
	<li><a href='user_event_edit_settings.php?event_id={$event->event_info.event_id}'>{lang_print id=3000001}</a></li>
</ul>

<table cellpadding='0' cellspacing='0' width='100%'>
  <tr>
    <td valign='top'>
      <div class='page_header'>{lang_sprintf id=3000135 1="event.php?event_id=`$event->event_info.event_id`" 2=$event->event_info.event_title}</div>
   
    </td>
    <td valign='top' align='right'>
      
      <table cellpadding='0' cellspacing='0'>
        <tr>
          <td class='button' nowrap='nowrap'>
            <a href='user_event.php'><img src='./images/icons/back16.gif' border='0' class='button' />{lang_print id=3000109}</a>
          </td>
        </tr>
      </table>
      
    </td>
  </tr>
</table>
<br />


{* IF EVENT WAS JUST CREATED, SHOW SUCCESS MESSAGE *}
{if $justadded}
  <table cellpadding='0' cellspacing='0'>
    <tr>
      <td class='result'>
        <img src='./images/success.gif' border='0' class='icon' />
        {lang_print id=3000139}
      </td>
    </tr>
  </table>
  <br />
{/if}


{* SHOW SUCCESS MESSAGE *}
{if $result}
  <table cellpadding='0' cellspacing='0'>
    <tr>
      <td class='result'>
      <img src='./images/success.gif' border='0' class='icon' />
      {lang_print id=191}
      </td>
    </tr>
  </table>
  <br />
{/if}


{* SHOW ERROR MESSAGE *}
{if $is_error}
  <table cellpadding='0' cellspacing='0'>
    <tr>
      <td class='result'>
        <img src='./images/error.gif' class='icon' border='0' />
        {lang_print id=$is_error}
      </td>
    </tr>
  </table>
  <br />
{/if}


{* JAVASCRIPT *}
{lang_javascript ids=861,3000080,3000081,3000082,3000083,3000084,3000085,3000093,3000097,3000153,3000154,3000219}
<script type="text/javascript" src="./include/js/class_event.js"></script>
<script type="text/javascript" src="include/js/calendar.compat.js"></script>
<link rel="stylesheet" type="text/css" href="templates/styles_event_calendar.css" />
<script type="text/javascript">
  
  SocialEngine.Event = new SocialEngineAPI.Event({$event->event_generate_javascript_structure()});
  SocialEngine.RegisterModule(SocialEngine.Event);
  
  // Delete redirect function
  function redirectOnDelete()
  {ldelim}
    window.location.href = SocialEngine.URL.url_base + 'user_event.php';
  {rdelim}
  
  {literal}
  var myCal1, myCal2;
  window.addEvent('domready', function()
  {
    myCal1 = new Calendar({ event_date_start: '{/literal}{$compatible_input_dateformat|default:'m/d/Y'}{literal}' }, {
      classes: ['se_event_calendar'],
      {/literal}{if !$user->level_info.level_event_backdate}direction: 1,{/if}{literal}
      tweak: {x: 6, y: 0},
      months: [{/literal}
        '{$month_names.1}',
        '{$month_names.2}',
        '{$month_names.3}',
        '{$month_names.4}',
        '{$month_names.5}',
        '{$month_names.6}',
        '{$month_names.7}',
        '{$month_names.8}',
        '{$month_names.9}',
        '{$month_names.10}',
        '{$month_names.11}',
        '{$month_names.12}'
      {literal}],
      days: [{/literal}
        '{$day_names.1}',
        '{$day_names.2}',
        '{$day_names.3}',
        '{$day_names.4}',
        '{$day_names.5}',
        '{$day_names.6}',
        '{$day_names.7}'
      {literal}],
      day_suffixes: [{/literal}
        '{lang_print id=3000286}',
        '{lang_print id=3000287}',
        '{lang_print id=3000288}',
        '{lang_print id=3000289}'
      {literal}],
      year_suffix:{/literal}'{lang_print id=3000290}'{literal}
    });
    myCal2 = new Calendar({ event_date_end: '{/literal}{$compatible_input_dateformat|default:'m/d/Y'}{literal}' }, {
      classes: ['se_event_calendar'],
      {/literal}{if !$user->level_info.level_event_backdate}direction: 1,{/if}{literal}
      tweak: {x: 6, y: 0},
      months: [{/literal}
        '{$month_names.1}',
        '{$month_names.2}',
        '{$month_names.3}',
        '{$month_names.4}',
        '{$month_names.5}',
        '{$month_names.6}',
        '{$month_names.7}',
        '{$month_names.8}',
        '{$month_names.9}',
        '{$month_names.10}',
        '{$month_names.11}',
        '{$month_names.12}'
      {literal}],
      days: [{/literal}
        '{$day_names.1}',
        '{$day_names.2}',
        '{$day_names.3}',
        '{$day_names.4}',
        '{$day_names.5}',
        '{$day_names.6}',
        '{$day_names.7}'
      {literal}],
      day_suffixes: [{/literal}
        '{lang_print id=3000286}',
        '{lang_print id=3000287}',
        '{lang_print id=3000288}',
        '{lang_print id=3000289}'
      {literal}],
      year_suffix:{/literal}'{lang_print id=3000290}'{literal}
    });
  });
  {/literal}
  
</script>


{* JAVASCRIPT FOR CATEGORIES/FIELDS *}
{literal}
<script type='text/javascript'>
<!--

  var cats = {0:{'title':'','subcats':{}}{/literal}{section name=cat_loop loop=$cats}, {$cats[cat_loop].cat_id}{literal}:{'title':'{/literal}{capture assign='cat_title'}{lang_print id=$cats[cat_loop].cat_title}{/capture}{$cat_title|replace:"&#039;":"\'"}{literal}', 'subcats':{{/literal}{section name=subcat_loop loop=$cats[cat_loop].subcats}{if !$smarty.section.subcat_loop.first}, {/if}{$cats[cat_loop].subcats[subcat_loop].subcat_id}:'{capture assign='subcat_title'}{lang_print id=$cats[cat_loop].subcats[subcat_loop].subcat_title}{/capture}{$subcat_title|replace:"&#039;":"\'"}'{/section}{literal}}}{/literal}{/section}{literal}};

  {/literal}{if $cats|@count>0}{literal}
  window.addEvent('domready', function(){
    for(c in cats) {
      var optn = document.createElement("option");
      optn.text = cats[c].title;
      optn.value = c;
      if(c == {/literal}{$event->event_info.event_eventcat_id}{literal}) { optn.selected = true; }
      $('event_eventcat_id').options.add(optn);
    }
    populateSubcats({/literal}{$event->event_info.event_eventcat_id}{literal});
  });
  {/literal}{/if}{literal}

  function populateSubcats(event_eventcat_id) {
    var subcats = cats[event_eventcat_id].subcats;
    var subcatHash = new Hash(subcats);
    $$('tr[id^=all_fields_]').each(function(el) { if(el.id == 'all_fields_'+event_eventcat_id) { el.style.display = ''; } else { el.style.display = 'none'; }});
    if(event_eventcat_id == 0 || subcatHash.getValues().length == 0) {
      $('event_eventsubcat_id').options.length = 1;
      $('event_eventsubcat_id').style.display = 'none';
    } else {
      $('event_eventsubcat_id').options.length = 1;
      $('event_eventsubcat_id').style.display = '';
      for(s in subcats) {
        var optn = document.createElement("option");
        optn.text = subcats[s];
        optn.value = s;
        if(s == {/literal}{$event->event_info.event_eventsubcat_id}{literal}) { optn.selected = true; }
        $('event_eventsubcat_id').options.add(optn);
      }
    }
  }

  function ShowHideDeps(field_id, field_value, field_type) {
    if(field_type == 6) {
      if($('field_'+field_id+'_option'+field_value)) {
        if($('field_'+field_id+'_option'+field_value).style.display == "block") {
	  $('field_'+field_id+'_option'+field_value).style.display = "none";
	} else {
	  $('field_'+field_id+'_option'+field_value).style.display = "block";
	}
      }
    } else {
      var divIdStart = "field_"+field_id+"_option";
      for(var x=0;x<$('field_options_'+field_id).childNodes.length;x++) {
        if($('field_options_'+field_id).childNodes[x].nodeName == "DIV" && $('field_options_'+field_id).childNodes[x].id.substr(0, divIdStart.length) == divIdStart) {
          if($('field_options_'+field_id).childNodes[x].id == 'field_'+field_id+'_option'+field_value) {
            $('field_options_'+field_id).childNodes[x].style.display = "block";
          } else {
            $('field_options_'+field_id).childNodes[x].style.display = "none";
          }
        }
      }
    }
  }
//-->
</script>
{/literal}


{* HIDDEN DIV TO DISPLAY DELETE CONFIRMATION MESSAGE *}
<div style='display: none;' id='confirmeventdelete'>
  <div style='margin-top: 10px;'>
    {lang_print id=3000094}
  </div>
  <br />
  {lang_block id=175 var=langBlockTemp}<input type='button' class='button' value='{$langBlockTemp}' onClick='parent.SocialEngine.Event.deleteConfirm();' />{/lang_block}
  {lang_block id=39 var=langBlockTemp}<input type='button' class='button' value='{$langBlockTemp}' onClick='parent.TB_remove();' />{/lang_block}
</div>


<table cellpadding='0' cellspacing='0' width='100%'>
  <tr>
    <td class='event_header'>{lang_print id=3000252}</td>
  </tr>
  <tr>
    <td class='event_box'>
      
      {* SHOW PHOTO ON LEFT AND UPLOAD FIELD ON RIGHT *}
      <table cellpadding='0' cellspacing='0'>
        <tr>
          <td class='editprofile_photoleft'>
            {lang_print id=770}
            <br />
            <table cellpadding='0' cellspacing='0' width='202'>
              <tr>
                <td class='editprofile_photo'><img src='{$event->event_photo("./images/nophoto.gif")}' border='0'></td>
              </tr>
            </table>
            {if $event->event_photo()}
              <br />
              [ <a href='user_event_edit.php?event_id={$event->event_info.event_id}&task=remove'>{lang_print id=771}</a> ]
            {/if}
          </td>
          <td class='editprofile_photoright'>
            <form action='user_event_edit.php' method='POST' enctype='multipart/form-data'>
            {lang_print id=772}
            <br />
            <input type='file' class='text' name='photo' size='30' />
            <input type='submit' class='button' value='{lang_print id=772}' />
            <input type='hidden' name='task' value='upload' />
            <input type='hidden' name='MAX_FILE_SIZE' value='5000000' />
            <input type='hidden' name='event_id' value='{$event->event_info.event_id}' />
            </form>
            <br />
            {lang_sprintf id=3000140 1='5 MB' 2=$event->eventowner_level_info.level_event_photo_exts}
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<br />


<form action='user_event_edit.php?event_id={$event->event_info.event_id}' method='post'>

<table cellpadding='0' cellspacing='0' width='100%'>
  <tr>
    <td class='event_header'>{lang_print id=3000137}</td>
  </tr>
  <tr>
    <td class='event_box'>
    
      <table cellpadding='0' cellspacing='0'>
        <tr>
          <td class='form1'>{lang_print id=3000110}*</td>
          <td class='form2'><input type='text' class='text' name='event_title' value='{$event->event_info.event_title}' maxlength='100' size='30'></td>
        </tr>
        <tr>
          <td class='form1'>{lang_print id=3000111}</td>
          <td class='form2'><textarea rows='6' cols='50' name='event_desc'>{$event->event_info.event_desc}</textarea></td>
        </tr>
        
        <tr>
          <td class='form1'>{lang_print id=3000111}</td>
          <td class='form2'>
            
            <div class="se_event_calendar_container">
              <input class="se_event_calendar" type="text" name="event_date_start" id="event_date_start" value="{$datetime->cdate($compatible_input_dateformat, $event_date_start_tz)}" />
            </div>
            
            <div>
              <input style="width: 149px;margin-right: 6px;"  type="text" name="event_time_start" id="event_time_start" value="{$datetime->cdate($compatible_input_timeformat, $event_date_start_tz)}" />
              <label for="event_date_start">{lang_print id=3000114}</label>
            </div>
            
          </td>
        </tr>
        
        <tr>
          <td class='form1'>{lang_print id=3000113}</td>
          <td class='form2'>
            
            <div class="se_event_calendar_container">
              <input class="se_event_calendar" type="text" name="event_date_end" id="event_date_end" value="{$datetime->cdate($compatible_input_dateformat, $event_date_end_tz)}" />
            </div>
            
            <div>
              <input style="width: 149px;margin-right: 6px;" type="text" name="event_time_end" id="event_time_end" value="{$datetime->cdate($compatible_input_timeformat, $event_date_end_tz)}" />
              <label for="event_time_end">{lang_print id=3000114}</label>
            </div>
          </td>
        </tr>
        
        <tr>
          <td class='form1'>{lang_print id=3000115}</td>
          <td class='form2'><input type='text' class='text' name='event_host' value='{$event->event_info.event_host}' maxlength='250' size='30'></td>
        </tr>
        
        <tr>
          <td class='form1'>{lang_print id=3000116}</td>
          <td class='form2'><textarea rows='6' cols='50' name='event_location'>{$event->event_info.event_location}</textarea></td>
        </tr>
      
        {if $cats|@count>0}
        <tr>
          <td class='form1'></td>
          <td class='form2' nowrap='nowrap'>
           <input type="hidden" name="event_eventcat_id" value="1" />
          </td>
        </tr>
        {section name=cat_loop loop=$cats}
          {section name=field_loop loop=$cats[cat_loop].fields}
            <tr id='all_fields_{$cats[cat_loop].cat_id}'>
            <td class='form1'>{lang_print id=$cats[cat_loop].fields[field_loop].field_title}{if $cats[cat_loop].fields[field_loop].field_required != 0}*{/if}</td>
            <td class='form2'>

            {* TEXT FIELD *}
            {if $cats[cat_loop].fields[field_loop].field_type == 1}
              <div><input type='text' class='text' name='field_{$cats[cat_loop].fields[field_loop].field_id}' id='field_{$cats[cat_loop].fields[field_loop].field_id}' value='{$cats[cat_loop].fields[field_loop].field_value}' style='{$cats[cat_loop].fields[field_loop].field_style}' maxlength='{$cats[cat_loop].fields[field_loop].field_maxlength}'></div>

              {* JAVASCRIPT FOR CREATING SUGGESTION BOX *}
              {if $cats[cat_loop].fields[field_loop].field_options != "" && $cats[cat_loop].fields[field_loop].field_options|@count != 0}
              {literal}
              <script type="text/javascript">
              <!-- 
              window.addEvent('domready', function(){
          var options = {
          script:"misc_js.php?task=suggest_field&limit=5&{/literal}{section name=option_loop loop=$cats[cat_loop].fields[field_loop].field_options}options[]={$cats[cat_loop].fields[field_loop].field_options[option_loop].label}&{/section}{literal}",
          varname:"input",
          json:true,
          shownoresults:false,
          maxresults:5,
          multisuggest:false,
          callback: function (obj) {  }
          };
          var as_json{/literal}{$cats[cat_loop].fields[field_loop].field_id}{literal} = new bsn.AutoSuggest('field_{/literal}{$cats[cat_loop].fields[field_loop].field_id}{literal}', options);
              });
              //-->
              </script>
              {/literal}
              {/if}


            {* TEXTAREA *}
            {elseif $cats[cat_loop].fields[field_loop].field_type == 2}
              <div><textarea rows='6' cols='50' name='field_{$cats[cat_loop].fields[field_loop].field_id}' style='{$cats[cat_loop].fields[field_loop].field_style}'>{$cats[cat_loop].fields[field_loop].field_value}</textarea></div>



            {* SELECT BOX *}
            {elseif $cats[cat_loop].fields[field_loop].field_type == 3}
              <div><select name='field_{$cats[cat_loop].fields[field_loop].field_id}' id='field_{$cats[cat_loop].fields[field_loop].field_id}' onchange="ShowHideDeps('{$cats[cat_loop].fields[field_loop].field_id}', this.value);" style='{$cats[cat_loop].fields[field_loop].field_style}'>
              <option value='-1'></option>
              {* LOOP THROUGH FIELD OPTIONS *}
              {section name=option_loop loop=$cats[cat_loop].fields[field_loop].field_options}
                <option id='op' value='{$cats[cat_loop].fields[field_loop].field_options[option_loop].value}'{if $cats[cat_loop].fields[field_loop].field_options[option_loop].value == $cats[cat_loop].fields[field_loop].field_value} SELECTED{/if}>{lang_print id=$cats[cat_loop].fields[field_loop].field_options[option_loop].label}</option>
              {/section}
              </select>
              </div>
              {* LOOP THROUGH DEPENDENT FIELDS *}
              <div id='field_options_{$cats[cat_loop].fields[field_loop].field_id}'>
              {section name=option_loop loop=$cats[cat_loop].fields[field_loop].field_options}
                {if $cats[cat_loop].fields[field_loop].field_options[option_loop].dependency == 1}

            {* SELECT BOX *}
            {if $cats[cat_loop].fields[field_loop].field_options[option_loop].dep_field_type == 3}
                    <div id='field_{$cats[cat_loop].fields[field_loop].field_id}_option{$cats[cat_loop].fields[field_loop].field_options[option_loop].value}' style='margin: 5px 5px 10px 5px;{if $cats[cat_loop].fields[field_loop].field_options[option_loop].value != $cats[cat_loop].fields[field_loop].field_value} display: none;{/if}'>
                    {lang_print id=$cats[cat_loop].fields[field_loop].field_options[option_loop].dep_field_title}{if $cats[cat_loop].fields[field_loop].field_options[option_loop].dep_field_required != 0}*{/if}
                    <select name='field_{$cats[cat_loop].fields[field_loop].field_options[option_loop].dep_field_id}'>
                <option value='-1'></option>
                {* LOOP THROUGH DEP FIELD OPTIONS *}
                {section name=option2_loop loop=$cats[cat_loop].fields[field_loop].field_options[option_loop].dep_field_options}
                  <option id='op' value='{$cats[cat_loop].fields[field_loop].field_options[option_loop].dep_field_options[option2_loop].value}'{if $cats[cat_loop].fields[field_loop].field_options[option_loop].dep_field_options[option2_loop].value == $cats[cat_loop].fields[field_loop].field_options[option_loop].dep_field_value} SELECTED{/if}>{lang_print id=$cats[cat_loop].fields[field_loop].field_options[option_loop].dep_field_options[option2_loop].label}</option>
                {/section}
              </select>
                    </div>	  

            {* TEXT FIELD *}
            {else}
                    <div id='field_{$cats[cat_loop].fields[field_loop].field_id}_option{$cats[cat_loop].fields[field_loop].field_options[option_loop].value}' style='margin: 5px 5px 10px 5px;{if $cats[cat_loop].fields[field_loop].field_options[option_loop].value != $cats[cat_loop].fields[field_loop].field_value} display: none;{/if}'>
                    {lang_print id=$cats[cat_loop].fields[field_loop].field_options[option_loop].dep_field_title}{if $cats[cat_loop].fields[field_loop].field_options[option_loop].dep_field_required != 0}*{/if}
                   <input type='text' class='text' name='field_{$cats[cat_loop].fields[field_loop].field_options[option_loop].dep_field_id}' value='{$cats[cat_loop].fields[field_loop].field_options[option_loop].dep_field_value}' style='{$cats[cat_loop].fields[field_loop].field_options[option_loop].dep_field_style}' maxlength='{$cats[cat_loop].fields[field_loop].field_options[option_loop].dep_field_maxlength}'>
                    </div>
            {/if}

                {/if}
              {/section}
              </div>
          


            {* RADIO BUTTONS *}
            {elseif $cats[cat_loop].fields[field_loop].field_type == 4}
          
              {* LOOP THROUGH FIELD OPTIONS *}
              <div id='field_options_{$cats[cat_loop].fields[field_loop].field_id}'>
              {section name=option_loop loop=$cats[cat_loop].fields[field_loop].field_options}
                <div>
                <input type='radio' class='radio' onclick="ShowHideDeps('{$cats[cat_loop].fields[field_loop].field_id}', '{$cats[cat_loop].fields[field_loop].field_options[option_loop].value}');" style='{$cats[cat_loop].fields[field_loop].field_style}' name='field_{$cats[cat_loop].fields[field_loop].field_id}' id='label_{$cats[cat_loop].fields[field_loop].field_id}_{$cats[cat_loop].fields[field_loop].field_options[option_loop].value}' value='{$cats[cat_loop].fields[field_loop].field_options[option_loop].value}'{if $cats[cat_loop].fields[field_loop].field_options[option_loop].value == $cats[cat_loop].fields[field_loop].field_value} CHECKED{/if}>
                <label for='label_{$cats[cat_loop].fields[field_loop].field_id}_{$cats[cat_loop].fields[field_loop].field_options[option_loop].value}'>{lang_print id=$cats[cat_loop].fields[field_loop].field_options[option_loop].label}</label>
                </div>

                {* DISPLAY DEPENDENT FIELDS *}
                {if $cats[cat_loop].fields[field_loop].field_options[option_loop].dependency == 1}

            {* SELECT BOX *}
            {if $cats[cat_loop].fields[field_loop].field_options[option_loop].dep_field_type == 3}
                    <div id='field_{$cats[cat_loop].fields[field_loop].field_id}_option{$cats[cat_loop].fields[field_loop].field_options[option_loop].value}' style='margin: 0px 5px 10px 23px;{if $cats[cat_loop].fields[field_loop].field_options[option_loop].value != $cats[cat_loop].fields[field_loop].field_value} display: none;{/if}'>
                    {lang_print id=$cats[cat_loop].fields[field_loop].field_options[option_loop].dep_field_title}{if $cats[cat_loop].fields[field_loop].field_options[option_loop].dep_field_required != 0}*{/if}
                    <select name='field_{$cats[cat_loop].fields[field_loop].field_options[option_loop].dep_field_id}'>
                <option value='-1'></option>
                {* LOOP THROUGH DEP FIELD OPTIONS *}
                {section name=option2_loop loop=$cats[cat_loop].fields[field_loop].field_options[option_loop].dep_field_options}
                  <option id='op' value='{$cats[cat_loop].fields[field_loop].field_options[option_loop].dep_field_options[option2_loop].value}'{if $cats[cat_loop].fields[field_loop].field_options[option_loop].dep_field_options[option2_loop].value == $cats[cat_loop].fields[field_loop].field_options[option_loop].dep_field_value} SELECTED{/if}>{lang_print id=$cats[cat_loop].fields[field_loop].field_options[option_loop].dep_field_options[option2_loop].label}</option>
                {/section}
              </select>
                    </div>	  

            {* TEXT FIELD *}
            {else}
                    <div id='field_{$cats[cat_loop].fields[field_loop].field_id}_option{$cats[cat_loop].fields[field_loop].field_options[option_loop].value}' style='margin: 0px 5px 10px 23px;{if $cats[cat_loop].fields[field_loop].field_options[option_loop].value != $cats[cat_loop].fields[field_loop].field_value} display: none;{/if}'>
                    {lang_print id=$cats[cat_loop].fields[field_loop].field_options[option_loop].dep_field_title}{if $cats[cat_loop].fields[field_loop].field_options[option_loop].dep_field_required != 0}*{/if}
                   <input type='text' class='text' name='field_{$cats[cat_loop].fields[field_loop].field_options[option_loop].dep_field_id}' value='{$cats[cat_loop].fields[field_loop].field_options[option_loop].dep_field_value}' style='{$cats[cat_loop].fields[field_loop].field_options[option_loop].dep_field_style}' maxlength='{$cats[cat_loop].fields[field_loop].field_options[option_loop].dep_field_maxlength}'>
                    </div>
            {/if}

                {/if}

              {/section}
              </div>
              
            {* DATE FIELD *}
            {elseif $cats[cat_loop].fields[field_loop].field_type == 5}
              <div>
              <select name='field_{$cats[cat_loop].fields[field_loop].field_id}_1' style='{$cats[cat_loop].fields[field_loop].field_style}'>
              {section name=date1 loop=$cats[cat_loop].fields[field_loop].date_array1}
                <option value='{$cats[cat_loop].fields[field_loop].date_array1[date1].value}'{$cats[cat_loop].fields[field_loop].date_array1[date1].selected}>{if $smarty.section.date1.first}[ {lang_print id=$cats[cat_loop].fields[field_loop].date_array1[date1].name} ]{else}{$cats[cat_loop].fields[field_loop].date_array1[date1].name}{/if}</option>
              {/section}
              </select>
              
              <select name='field_{$cats[cat_loop].fields[field_loop].field_id}_2' style='{$cats[cat_loop].fields[field_loop].field_style}'>
              {section name=date2 loop=$cats[cat_loop].fields[field_loop].date_array2}
                <option value='{$cats[cat_loop].fields[field_loop].date_array2[date2].value}'{$cats[cat_loop].fields[field_loop].date_array2[date2].selected}>{if $smarty.section.date2.first}[ {lang_print id=$cats[cat_loop].fields[field_loop].date_array2[date2].name} ]{else}{$cats[cat_loop].fields[field_loop].date_array2[date2].name}{/if}</option>
              {/section}
              </select>
              
              <select name='field_{$cats[cat_loop].fields[field_loop].field_id}_3' style='{$cats[cat_loop].fields[field_loop].field_style}'>
              {section name=date3 loop=$cats[cat_loop].fields[field_loop].date_array3}
                <option value='{$cats[cat_loop].fields[field_loop].date_array3[date3].value}'{$cats[cat_loop].fields[field_loop].date_array3[date3].selected}>{if $smarty.section.date3.first}[ {lang_print id=$cats[cat_loop].fields[field_loop].date_array3[date3].name} ]{else}{$cats[cat_loop].fields[field_loop].date_array3[date3].name}{/if}</option>
              {/section}
              </select>
              </div>
              
              
              
            {* CHECKBOXES *}
            {elseif $cats[cat_loop].fields[field_loop].field_type == 6}
          
              {* LOOP THROUGH FIELD OPTIONS *}
              <div id='field_options_{$cats[cat_loop].fields[field_loop].field_id}'>
              {section name=option_loop loop=$cats[cat_loop].fields[field_loop].field_options}
                <div>
                <input type='checkbox' onclick="ShowHideDeps('{$cats[cat_loop].fields[field_loop].field_id}', '{$cats[cat_loop].fields[field_loop].field_options[option_loop].value}', '{$cats[cat_loop].fields[field_loop].field_type}');" style='{$cats[cat_loop].fields[field_loop].field_style}' name='field_{$cats[cat_loop].fields[field_loop].field_id}[]' id='label_{$cats[cat_loop].fields[field_loop].field_id}_{$cats[cat_loop].fields[field_loop].field_options[option_loop].value}' value='{$cats[cat_loop].fields[field_loop].field_options[option_loop].value}'{if $cats[cat_loop].fields[field_loop].field_options[option_loop].value|in_array:$cats[cat_loop].fields[field_loop].field_value} CHECKED{/if}>
                <label for='label_{$cats[cat_loop].fields[field_loop].field_id}_{$cats[cat_loop].fields[field_loop].field_options[option_loop].value}'>{lang_print id=$cats[cat_loop].fields[field_loop].field_options[option_loop].label}</label>
                </div>
                
                {* DISPLAY DEPENDENT FIELDS *}
                {if $cats[cat_loop].fields[field_loop].field_options[option_loop].dependency == 1}
            {* SELECT BOX *}
            {if $cats[cat_loop].fields[field_loop].field_options[option_loop].dep_field_type == 3}
                    <div id='field_{$cats[cat_loop].fields[field_loop].field_id}_option{$cats[cat_loop].fields[field_loop].field_options[option_loop].value}' style='margin: 0px 5px 10px 23px;{if $cats[cat_loop].fields[field_loop].field_options[option_loop].value != $cats[cat_loop].fields[field_loop].field_value} display: none;{/if}'>
                    {lang_print id=$cats[cat_loop].fields[field_loop].field_options[option_loop].dep_field_title}{if $cats[cat_loop].fields[field_loop].field_options[option_loop].dep_field_required != 0}*{/if}
                    <select name='field_{$cats[cat_loop].fields[field_loop].field_options[option_loop].dep_field_id}'>
                <option value='-1'></option>
                {* LOOP THROUGH DEP FIELD OPTIONS *}
                {section name=option2_loop loop=$cats[cat_loop].fields[field_loop].field_options[option_loop].dep_field_options}
                  <option id='op' value='{$cats[cat_loop].fields[field_loop].field_options[option_loop].dep_field_options[option2_loop].value}'{if $cats[cat_loop].fields[field_loop].field_options[option_loop].dep_field_options[option2_loop].value == $cats[cat_loop].fields[field_loop].field_options[option_loop].dep_field_value} SELECTED{/if}>{lang_print id=$cats[cat_loop].fields[field_loop].field_options[option_loop].dep_field_options[option2_loop].label}</option>
                {/section}
              </select>
                    </div>	  
                    
            {* TEXT FIELD *}
            {else}
                    <div id='field_{$cats[cat_loop].fields[field_loop].field_id}_option{$cats[cat_loop].fields[field_loop].field_options[option_loop].value}' style='margin: 0px 5px 10px 23px;{if $cats[cat_loop].fields[field_loop].field_options[option_loop].value != $cats[cat_loop].fields[field_loop].field_value} display: none;{/if}'>
                    {lang_print id=$cats[cat_loop].fields[field_loop].field_options[option_loop].dep_field_title}{if $cats[cat_loop].fields[field_loop].field_options[option_loop].dep_field_required != 0}*{/if}
                   <input type='text' class='text' name='field_{$cats[cat_loop].fields[field_loop].field_options[option_loop].dep_field_id}' value='{$cats[cat_loop].fields[field_loop].field_options[option_loop].dep_field_value}' style='{$cats[cat_loop].fields[field_loop].field_options[option_loop].dep_field_style}' maxlength='{$cats[cat_loop].fields[field_loop].field_options[option_loop].dep_field_maxlength}'>
                    </div>
            {/if}
                {/if}
                
              {/section}
              </div>
              
            {/if}
            
            <div class='form_desc'>{lang_print id=$cats[cat_loop].fields[field_loop].field_desc}</div>
            {capture assign='field_error'}{lang_print id=$cats[cat_loop].fields[field_loop].field_error}{/capture}
            {if $field_error != ""}<div class='form_error'><img src='./images/icons/error16.gif' border='0' class='icon'> {$field_error}</div>{/if}
            </td>
            </tr>
            
          {/section}
        {/section}
        
        {/if}
      
      
      </table>
      
    </td>
  </tr>
</table>
<br />


{* SHOW SUBMIT BUTTONS *}
<table cellpadding='0' cellspacing='0'>
  <tr>
    <td>
      {lang_block id=173 var=langBlockTemp}<input type='submit' class='button' value='{$langBlockTemp}' />&nbsp;{/lang_block}
      <input type='hidden' name='task' value='dosave' />
      </form>
    </td>
    <td>
      <form action='user_event.php' method='GET'>
      {lang_block id=39 var=langBlockTemp}<input type='submit' class='button' value='{$langBlockTemp}' />{/lang_block}
      </form>
    </td>
    {if $event->user_rank >= 2}
    <td style='padding-left: 10px;'>
      <a href='javascript:void(0);' onclick="SocialEngine.Event.deleteShow();">
        <img src='./images/icons/event_delete16.gif' border='0' class='button' />
        {lang_print id=3000169}
      </a>
    </td>
    {/if}
  </tr>
</table>
<br />

{include file='footer.tpl'}