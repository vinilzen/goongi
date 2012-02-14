{include file='header.tpl'}

{* $Id: user_event_edit_members.tpl 9 2009-01-11 06:03:21Z john $ *}
<h1>{lang_print id=80001031} - {$event->event_info.event_title}</h1>
<div class="crumb">
	<a href="/">Главная</a>
	<a href='user_event.php'>{lang_print id=80001031}</a>
	<a href='event/{$event->event_info.event_id}/'>{$event->event_info.event_title}</a>
	<span>{lang_print id=3000138}</span>
</div>
<ul class="vk">
	<li><a href='user_event_edit.php?event_id={$event->event_info.event_id}' id="edit_event" rel="{$event->event_info.event_id}">{lang_print id=80001032}</a>
	</li>
	<li class="active"><a href='user_event_edit_members.php?event_id={$event->event_info.event_id}'>{lang_print id=3000138}</a></li>
	<li><a href='user_event_edit_settings.php?event_id={$event->event_info.event_id}'>{lang_print id=80001033}</a></li>
</ul>

{lang_print id=3000142}
<br />


{* JAVASCRIPT *}
{*
{lang_javascript ids=3000080,3000081,3000082,3000083,3000084,3000085,3000093,3000097,3000153,3000154,3000170,3000219,3000223,3000225,3000229}
*}

{* HIDDEN DIV TO DISPLAY MEMBER DELETE CONFIRMATION MESSAGE *}
<div style='display: none;' id='confirmeventmemberdelete'>
  <div style='margin-top: 10px;'>
    {lang_print id=3000155}
  </div>
  <br />
  {lang_block id=175 var=langBlockTemp}<input type='button' class='button' value='{$langBlockTemp}' onClick='parent.SocialEngine.Event.memberDeleteConfirm();' />{/lang_block}
  {lang_block id=39 var=langBlockTemp}<input type='button' class='button' value='{$langBlockTemp}' onClick='parent.TB_remove();' />{/lang_block}
</div>


{* HIDDEN DIV TO DISPLAY MEMBER CANCEL CONFIRMATION MESSAGE *}
<div style='display: none;' id='confirmeventmembercancel'>
  <div style='margin-top: 10px;'>
    {lang_print id=3000224}
  </div>
  <br />
  {lang_block id=175 var=langBlockTemp}<input type='button' class='button' value='{$langBlockTemp}' onClick='parent.SocialEngine.Event.memberCancelConfirm();' />{/lang_block}
  {lang_block id=39 var=langBlockTemp}<input type='button' class='button' value='{$langBlockTemp}' onClick='parent.TB_remove();' />{/lang_block}
</div>


{* HIDDEN DIV TO DISPLAY MEMBER INVITE *}
<div style='display: none;' id='eventmemberinvite'>
  {* NO FRIENDS MESSAGE *}
  <div style='text-align:center;margin:10px;font-weight:bold;border: 1px dashed #CCCCCC;background: #FFFFFF;padding: 7px 8px 7px 7px;' id='noFriends'>
    <img src='./images/icons/bulb16.gif' class='icon'>
    {lang_print id=3000227}
    <br />
    <br />
    {lang_block id=39 var=langBlockTemp}<input type='button' class='button' value='{$langBlockTemp}' onClick='parent.TB_remove();' />{/lang_block}
  </div>
  
  {* INVITE DIALOG *}
  <div style='display:none;text-align:left;padding:10px;' id='inviteForm'>
    <div>{lang_print id=3000226}</div>
    <br />
    
    <div><a href='javascript:void(0);' id="eventMemberInviteSelectAll" onClick="var checkboxes = document.getElementsByTagName('input'); for( var i=0, l=checkboxes.length; i<l; i++ ) if( checkboxes[i].type=='checkbox' && parseInt(checkboxes[i].value)>0 ) {ldelim} checkboxes[i].checked = true; parent.SocialEngine.Event.memberInviteUpdate(checkboxes[i].value, true); {rdelim}">{lang_print id=3000228}</a></div>
    <div id='invite_friendlist' class='invite_friendlist'></div>
    
    <div style='margin-top: 20px;'>
      {lang_block id=3000225 var=langBlockTemp}<input type='button' class='button' value='{$langBlockTemp}' onClick='parent.SocialEngine.Event.memberInviteSend();' />{/lang_block}
      {lang_block id=39 var=langBlockTemp}<input type='button' class='button' value='{$langBlockTemp}' onClick='parent.TB_remove();' />{/lang_block}
    </div>
  </div>
  
  {* RESULT DIALOG *}
  <div style='display:none;text-align:left;padding:10px;' id='inviteResults'></div>
</div>


<div style="margin-top:10px;"><a href="javascript:void(0)" id="selevt_for_invite">{lang_print id=3000145}</a></div>

<table cellpadding="0" cellspacing="0" width="100%"><tr>
<td valign="top">

  {if !$total_members}
        {lang_print id=3000146}
  {else}
  
  {* MEMBER LIST *}
  {section name=member_loop loop=$members}
  {assign var=member_status value=$members[member_loop].eventmember_status}
  <div class="event_member">
    
    <table cellpadding="0" cellspacing="0">
      <tr>
        <td>
          <a href="{$url->url_create('profile', $members[member_loop].member->user_info.user_username)}">
            <img src="{$members[member_loop].member->user_photo('./images/no_photo.gif')}" class="photo" border="0" width="60" height="60" />
          </a>
        </td>
        <td style="padding-left: 7px; vertical-align: top;" width="100%">
          <div class="event_member_title">
            <h2><a href="{$url->url_create('profile', $members[member_loop].member->user_info.user_username)}">{$members[member_loop].member->user_displayname}</a></h2>
          </div>
          <div style="padding-top: 5px;">
            <div class="event_member_info">{lang_print id=3000147} {lang_print id=$event->event_rsvp_levels.$member_status}</div>
            {if $members[member_loop].member->user_info.user_dateupdated}
            {assign var="user_dateupdated" value=$datetime->time_since($members[member_loop].member->user_info.user_dateupdated)}
            <div class="event_member_info">{lang_print id=3000148} &nbsp;{lang_sprintf id=$user_dateupdated[0] 1=$user_dateupdated[1]}</div>
            {/if}
            {if $members[member_loop].member->user_info.user_lastlogindate}
            {assign var="user_lastlogindate" value=$datetime->time_since($members[member_loop].member->user_info.user_lastlogindate)}
            <div class="event_member_info">{lang_print id=906} &nbsp;{lang_sprintf id=$user_lastlogindate[0] 1=$user_lastlogindate[1]}</div>
            {/if}
          </div>
        </td>
        <td style="vertical-align: top;" nowrap="nowrap">
          <div>
            
            {* SELF *}
            {if $members[member_loop].member->user_info.user_id==$event->event_info.event_user_id}
              <div>{lang_print id=3000152}</div>
              
            {* IF MEMBER IS REQUESTING MEMBERSHIP *}
            {elseif !$members[member_loop].eventmember_approved && $members[member_loop].eventmember_status}
              <div><a href='javascript:void(0);' onclick='SocialEngine.Event.memberAccept({$members[member_loop].member->user_info.user_id});'>{lang_print id=3000149}</a></div>
              <div><a href='javascript:void(0);' onclick='SocialEngine.Event.memberReject({$members[member_loop].member->user_info.user_id});'>{lang_print id=3000150}</a></div>
              
            {* IF MEMBER WAS INVITED BY LEADER *}
            {elseif $members[member_loop].eventmember_approved && !$members[member_loop].eventmember_status}
              <div><a href='javascript:void(0);' class="memb_cancel" rel="{$members[member_loop].member->user_info.user_id}">Отозвать приглашение</a></div>
              
            {* NORMAL MEMBER *}
            {else}
              
              {* SHOW REMOVE MEMBER LINK *}
              <div><a href='javascript:void(0);' class="memb_del"  rel="{$members[member_loop].member->user_info.user_id}">{lang_print id=3000151}</a></div>

            {/if}
          </div>
        </td>
      </tr>
    </table>
  </div>
  {/section}
  
  
  
  {* PAGINATION *}
  <div class="event_pages_bottom">
    {if $p != 1}
      <a href='javascript:void(0);' onclick='document.event_members_form.p.value={math equation="p-1" p=$p};document.event_members_form.submit();'>&#171; {lang_print id=182}</a>
    {else}
      <font class='disabled'>&#171; {lang_print id=182}</font>
    {/if}
    {if $p_start == $p_end}
      &nbsp;|&nbsp; {lang_sprintf id=184 1=$p_start 2=$total_members} &nbsp;|&nbsp; 
    {else}
      &nbsp;|&nbsp; {lang_sprintf id=185 1=$p_start 2=$p_end 3=$total_members} &nbsp;|&nbsp; 
    {/if}
    {if $p != $maxpage}
      <a href='javascript:void(0);' onclick='document.event_members_form.p.value={math equation="p+1" p=$p};document.event_members_form.submit();'>{lang_print id=183} &#187;</a>
    {else}
      <font class='disabled'>{lang_print id=183} &#187;</font>
    {/if}
  </div>
  
  {/if}
  
  
  
{* END RIGHT COLUMN *}
</td></tr></table>




{include file='footer.tpl'}