{include file='header.tpl'}
{* $Id: user_event_edit.tpl 22 2009-01-16 05:50:49Z john $ *}
<link href="/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<link href="/css/flick/jquery-ui-1.8.17.custom.css" rel="stylesheet" type="text/css"/>
<script src="/js/jquery-ui.min.js"></script>
<h1>{lang_print id=3000136}</h1>
<div class="crumb">
	<a href="/">Главная</a>
	<a href='user_event.php'>{if $event->event_info.event_eventcat_id == 1}{lang_print id=3000086}{else}{lang_print id=80001031}{/if}</a>
	<a href='event/{$event->event_info.event_id}/'>{$event->event_info.event_title}</a>
	<span>{lang_print id=3000137}</span>
</div>
{if $event->event_info.event_eventcat_id == 2}
<ul class="vk">
	<li class="active"><a href='user_event_edit.php?event_id={$event->event_info.event_id}'>
		{if $event->event_info.event_eventcat_id == 1}{lang_print id=3000137}{else}{lang_print id=80001032}{/if}</a></li>
		<li><a href='user_event_edit_members.php?event_id={$event->event_info.event_id}'>{lang_print id=3000138}</a></li>
		<li><a href='user_event_edit_settings.php?event_id={$event->event_info.event_id}'>
			{if $event->event_info.event_eventcat_id == 1}{lang_print id=3000001}{else}{lang_print id=80001033}{/if}</a></li>
</ul>
{/if}
{*
    <div class='page_header'>{lang_sprintf id=3000135 1="event.php?event_id=`$event->event_info.event_id`" 2=$event->event_info.event_title}</div>
    <a href='user_event.php'><img src='./images/icons/back16.gif' border='0' class='button' />{lang_print id=3000109}</a>
*}

{* IF EVENT WAS JUST CREATED, SHOW SUCCESS MESSAGE *}
{if $justadded}{lang_print id=3000139}{/if}

{* SHOW SUCCESS MESSAGE *}
{if $result}{lang_print id=191}{/if}


{* SHOW ERROR MESSAGE *}
{if $is_error}{lang_print id=$is_error}{/if}

<div class="form">
<form action='user_event_edit.php?event_id={$event->event_info.event_id}' method='post'>
	<div class="input">
		<label>{lang_print id=149}*</label>
		<input type='text' class='text' name='event_title' value='{$event->event_info.event_title}' maxlength='100' size='30'></td>
	</div>
	
	<div class="input">	
		<label>{lang_print id=277}</label>
		<textarea rows='6' cols='50' name='event_desc'>{$event->event_info.event_desc}</textarea></td>
	</div>
    <table><tr><td>
		<div class="input">	
			<label>{if $event->event_info.event_eventcat_id == 2}{lang_print id=368}{else}{lang_print id=88}{/if}</label>
			<div class="se_event_calendar_container">
			<input class="se_event_calendar" type="text" name="event_date_start" id="event_date_start1" value="{$event_date_start_format}" />
			{literal}
				<script type="text/javascript">
				 $(document).ready(function(){
					$(function() {
						$( "#event_date_start1" ).datepicker();
						$( "#event_date_start1" ).datepicker( "option", "dateFormat", 'dd.m.yy' );
						$( "#event_date_start1" ).datepicker( "option", "dayNamesMin", ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'] );
						$( "#event_date_start1" ).datepicker( "option", "dayNames", ['Воскресенье', 'Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота'] );
						$( "#event_date_start1" ).datepicker( "option", "monthNames", ['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь']);
						$( "#event_date_start1" ).datepicker( "setDate" , '{/literal}{$event_date_start_format}{literal}' );
					});
				});
				</script>
			{/literal}
			</div>
		</div>
	</td><td>
		<div class="input" {if $event->event_info.event_eventcat_id == 1}style="display:none"{/if}>
			<label>Время</label>
			<div class="se_event_calendar_container">
				<input style="width: 149px;margin-right: 6px;" onfocus="if (this.value == 'чч:мм') this.value ='';" onblur="if (this.value == '') this.value='чч:мм';"  type="text" name="event_time_start" id="event_time_start" value="{$event_time_start_format}" />
			</div>
		</div>
	</td></tr></table>
	
    {if $event->event_info.event_eventcat_id == 2}
		<table><tr><td>
			<div class="input">	
				<label>{lang_print id=3000113}</label>
				<div class="se_event_calendar_container">
					<input class="se_event_calendar" type="text" name="event_date_end" id="event_date_end1" value="{$event_date_end_format}" />
			{literal}
				<script type="text/javascript">
				 $(document).ready(function(){
					$(function() {
						$( "#event_date_end1" ).datepicker();
						$( "#event_date_end1" ).datepicker( "option", "dateFormat", 'dd.m.yy' );
						$( "#event_date_end1" ).datepicker( "option", "dayNamesMin", ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'] );
						$( "#event_date_end1" ).datepicker( "option", "dayNames", ['Воскресенье', 'Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота'] );
						$( "#event_date_end1" ).datepicker( "option", "monthNames", ['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь']);
						$( "#event_date_end1" ).datepicker( "setDate" , '{/literal}{$event_date_end_format}{literal}' );
					});
				});
				</script>
			{/literal}
				</div>        
			</div>
		</td><td>
			<div class="input">	
				<label>Время</label>
				<div class="se_event_calendar_container">
					<input style="width: 149px;margin-right: 6px;" onfocus="if (this.value == 'чч:мм') this.value ='';" onblur="if (this.value == '') this.value='чч:мм';" type="text" name="event_time_end" id="event_time_end" value="{$event_time_end_format}" />
				</div>
			</div>
		</td></tr></table>
		<div class="input">	
			<label>{lang_print id=3000115}</label>
			<input type='text' class='text' name='event_host' value='{$event->event_info.event_host}' maxlength='250' size='30'></td>
		</div>
	{/if}
 <!-- <label>{lang_print id=3000116}</label><textarea rows='6' cols='50' name='event_location'>{$event->event_info.event_location}</textarea> -->
	<!-- event_eventcat_id -->
	<input type='hidden' name='event_eventcat_id' value='{$event->event_info.event_eventcat_id}' />
	
{* SHOW SUBMIT BUTTONS *}

{lang_block id=173 var=langBlockTemp}
<div class="button"><span class="button2"><span class="l">&nbsp;</span><span class="c">
	<input type='submit' class='button' value='{$langBlockTemp}' /><input type='hidden' name='task' value='dosave' />
</span><span class="r">&nbsp;</span></span></div>
{/lang_block}
      
</form>
<br />
<br />
<br />
<br />
{if $event->user_rank >= 2}<a href='#' rel="{$event->event_info.event_id}" id="event_del">{lang_print id=175} {if $event->event_info.event_eventcat_id == 2}мероприятие{else}событие{/if}</a>{/if}
</div>

{include file='footer.tpl'}