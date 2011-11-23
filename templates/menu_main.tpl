  {* SHOW PHOTOS OF THIS PERSON *}
  {if $total_photo_tags != 0 && 0}
   <a href='profile_photos.php?user={$owner->user_info.user_username}'>{lang_sprintf id=1204 1=$owner->user_displayname_short 2=$total_photo_tags}</a>
    {assign var='showmenu' value='1'}
  {/if}


{* START USER MENU *}  <!-- START USER MENU -->
{if $user->user_exists != 0}	
<div class="block0">
	<div class="bg">
		<div class="c">
			<div class="pro">
				<div id="main_photo"><img src="{$user->user_photo("./images/nophoto.gif")}" alt="" /></div>
					<ul>
						{* SHOW WHATS NEW MENU ITEM *}
						<!-- <li><a href='user_home.php'>{lang_print id=1161}</a></li>
						<!-- <li><a href='network.php'>{lang_print id=1162}</a></li> -->
    
					{* SHOW PROFILE MENU ITEM *}
					<li><a href='{$url->url_create("profile", $user->user_info.user_username)}'>{lang_print id=652}</a></li>					</a>
					<li><a href='user_editprofile.php'>{lang_print id=1163}</a></li>
					<li><a href='user_editprofile_photo.php'>{lang_print id=1164}</a></li>
					  {if $user->level_info.level_profile_style != 0 || $user->level_info.level_profile_style_sample != 0}
						<li><a href='user_editprofile_style.php'>{lang_print id=1165}</a></li>
					  {/if}

					{* SHOW APPS MENU ITEM IF ENABLED *}
					{if $global_plugins.plugin_controls.show_menu_user}
						<li><a href="javascript:showMenu('menu_dropdown_apps');" onMouseUp="this.blur()">{lang_print id=1166}</a></li>
						{* SHOW ANY PLUGIN MENU ITEMS *}
						{hook_foreach name=menu_user_apps var=user_apps_args}
							<li><a href='{$user_apps_args.file}'>{lang_print id=$user_apps_args.title}</a></li>
						{/hook_foreach}
					{/if}

					{* SHOW MESSAGES MENU ITEM IF ENABLED *}
					{if $user->level_info.level_message_allow != 0}
						<!--<li><a href='user_messages.php'>{lang_print id=654}{if $user_unread_pms != 0} ({$user_unread_pms}){/if}</a></li> -->
						<li><a href="javascript:TB_show('{lang_print id=784}', 'user_messages_new.php?TB_iframe=true&height=400&width=450', '', './images/trans.gif');">{lang_print id=1167}</a></li>
						<li  id="add_msg_l"><a href="#" >->{lang_print id=1167}</a></li>
						<li><a href='user_messages.php'>{lang_print id=1168}</a></li>
						<li><a href='user_messages_outbox.php'>{lang_print id=1169}</a></li>
					{/if}
    
					{* SHOW FRIENDS MENU ITEM IF ENABLED *}
					{if $setting.setting_connection_allow != 0}
						<!--<li><a href='user_friends.php'>{lang_print id=653}</a></li> -->
						<li><a href='user_friends.php'>{lang_print id=1170}</a></li>
						<li><a href='user_friends_requests.php'>{lang_print id=1171}</a></li>
						<li><a href='user_friends_requests_outgoing.php'>{lang_print id=1172}</a></li>
					{/if}
    
					{* SHOW SETTINGS MENU ITEM *}
					<!--<li><a href='user_account.php'>{lang_print id=655}</a></li> --><!-- настройки -->
					<li><a href='user_account.php'>{lang_print id=1173}</a></li>
					<li><a href='user_account_privacy.php'>{lang_print id=1174}</a></li>
				<ul>
			</div>
		</div>
	</div>
	 <div class="b"></div>
</div>
{/if}
{* END USER MENU *}<!-- END USER MENU -->



  {* SHOW BUTTONS IF LOGGED IN AND VIEWING SOMEONE ELSE *}
  {if $owner->user_info.user_id != $user->user_info.user_id}
 
    {* SHOW ADD OR REMOVE FRIEND MENU ITEM *}
    {if $friendship_allowed != 0 && $user->user_exists != 0}
        {* JAVASCRIPT FOR CHANGING FRIEND MENU OPTION *}
        {literal}
        <script type="text/javascript">
        <!-- 
        function friend_update(status, id) {
          if(status == 'pending') {
            if($('addfriend_'+id))
              $('addfriend_'+id).style.display = 'none';
            if($('confirmfriend_'+id))
              $('confirmfriend_'+id).style.display = 'none';
            if($('pendingfriend_'+id))
              $('pendingfriend_'+id).style.display = 'block';
            if($('removefriend_'+id))
              $('removefriend_'+id).style.display = 'none';
          } else if(status == 'remove') {
            if($('addfriend_'+id))
              $('addfriend_'+id).style.display = 'none';
            if($('confirmfriend_'+id))
              $('confirmfriend_'+id).style.display = 'none';
            if($('pendingfriend_'+id))
              $('pendingfriend_'+id).style.display = 'none';
            if($('removefriend_'+id))
              $('removefriend_'+id).style.display = 'block';
          } else if(status == 'add') {
            if($('addfriend_'+id))
              $('addfriend_'+id).style.display = 'block';
            if($('confirmfriend_'+id))
              $('confirmfriend_'+id).style.display = 'none';
            if($('pendingfriend_'+id))
              $('pendingfriend_'+id).style.display = 'none';
            if($('removefriend_'+id))
              $('removefriend_'+id).style.display = 'none';
          }
        }
        //-->
        </script>
        {/literal}
        <div id='addfriend_{$owner->user_info.user_id}'{if $is_friend == TRUE || $is_friend_pending != 0} style='display: none;'{/if}><a href="/user_friends_manage.php?user={$owner->user_info.user_username}"><!-- {lang_print id=876} --><img src='./images/icons/addfriend16.gif' class='icon' border='0'>{lang_print id=838}</a></div>
        <div id='confirmfriend_{$owner->user_info.user_id}'{if $is_friend_pending != 1} style='display: none;'{/if}><a href="javascript:TB_show('{lang_print id=887}', 'user_friends_manage.php?user={$owner->user_info.user_username}&TB_iframe=true&height=300&width=450', '', './images/trans.gif');"><img src='./images/icons/addfriend16.gif' class='icon' border='0'>{lang_print id=885}</a></div>
        <div id='pendingfriend_{$owner->user_info.user_id}'{if $is_friend_pending != 2} style='display: none;'{/if} class='nolink'><img src='./images/icons/addfriend16.gif' class='icon' border='0'>{lang_print id=875}</div>
       <!--  <div id='removefriend_{$owner->user_info.user_id}'{if $is_friend == FALSE || $is_friend_pending != 0} style='display: none;'{/if}><a href="javascript:TB_show('{lang_print id=837}', 'user_friends_manage.php?task=remove&user={$owner->user_info.user_username}&TB_iframe=true&height=300&width=450', '', './images/trans.gif');"><img src='./images/icons/remove_friend16.gif' class='icon' border='0'>{lang_print id=837}</a></div> -->
      {assign var='showmenu' value='1'}
    {/if}
    
    {* SHOW SEND MESSAGE MENU ITEM *}
    {if 0 && ($user->level_info.level_message_allow == 2 || ($user->level_info.level_message_allow == 1 && $is_friend)) && $owner->level_info.level_message_allow != 0}
      <a href="javascript:TB_show('{lang_print id=784}', 'user_messages_new.php?to_user={$owner->user_displayname|escape:url}&to_id={$owner->user_info.user_username}&TB_iframe=true&height=400&width=450', '', './images/trans.gif');"><img src='./images/icons/sendmessage16.gif' class='icon' border='0'>{lang_print id=839}</a>
      {assign var='showmenu' value='1'}
    {/if}
    
    {* SHOW REPORT THIS PERSON MENU ITEM *}
    {if $user->user_exists != 0 && 0}
      <a href="javascript:TB_show('{lang_print id=857}', 'user_report.php?return_url={$url->url_current()|escape:url}&TB_iframe=true&height=300&width=450', '', './images/trans.gif');"><img src='./images/icons/report16.gif' class='icon' border='0'>{lang_print id=840}</a>
      {assign var='showmenu' value='1'}
    {/if}
    
    {* SHOW BLOCK OR UNBLOCK THIS PERSON MENU ITEM *}
    {if $user->level_info.level_profile_block != 0}
        <div id='unblock'{if $user->user_blocked($owner->user_info.user_id) == FALSE} style='display: none;'{/if}><a href="javascript:TB_show('{lang_print id=869}', 'user_friends_block.php?task=unblock&user={$owner->user_info.user_username}&TB_iframe=true&height=300&width=450', '', './images/trans.gif');"><img src='./images/icons/unblock16.gif' class='icon' border='0'>{lang_print id=841}</a></div>
        <div id='block'{if $user->user_blocked($owner->user_info.user_id) == TRUE} style='display: none;'{/if}><a href="javascript:TB_show('{lang_print id=868}', 'user_friends_block.php?task=block&user={$owner->user_info.user_username}&TB_iframe=true&height=300&width=450', '', './images/trans.gif');"><img src='./images/icons/block16.gif' class='icon' border='0'>{lang_print id=842}</a></div>
      {assign var='showmenu' value='1'}
    {/if}

  {/if}


  {* PLUGIN RELATED PROFILE MENU ITEMS *}
  {hook_foreach name=profile_menu var=profile_menu_args}
    {assign var='showmenu' value='1'}

        <a href='{$profile_menu_args.file}'>
          {lang_sprintf id=$profile_menu_args.title 1=$profile_menu_args.title_1 2=$profile_menu_args.title_2}
        </a>

  {/hook_foreach}
  
    {* BEGIN STATUS *} <!-- status -->
	{if 0}
    {if ($owner->level_info.level_profile_status != 0 && ($owner->user_info.user_status != "" || $owner->user_info.user_id == $user->user_info.user_id)) || $is_online == 1}
      <table cellpadding='0' cellspacing='0' width='100%' style='margin-bottom: 10px;'>
      <tr>
      <td class='header'>{lang_print id=768}</td>
      <tr>
      <td class='profile'>
        {if $is_online == 1}
          <table cellpadding='0' cellspacing='0'>
          <tr>
          <td valign='top'><img src='./images/icons/online16.gif' border='0' class='icon'></td>
          <td>{lang_sprintf id=845 1=$owner->user_displayname_short}</td>
          </tr>
          </table>
        {/if}
        
        {if $owner->level_info.level_profile_status != 0 && ($owner->user_info.user_status != "" || $owner->user_info.user_id == $user->user_info.user_id)}
          <table cellpadding='0' cellspacing='0'{if $is_online == 1} style='margin-top: 5px;'{/if}>
          <tr>
          <td valign='top'><img src='./images/icons/status16.gif' border='0' class='icon'></td>
          <td>
            {if $owner->user_info.user_id == $user->user_info.user_id}
              {* JAVASCRIPT FOR CHANGING STATUS - THIS IS ONLY SHOWN WHEN OWNER IS VIEWING OWN PROFILE, SO WE CAN USE VIEWER OBJECT *}
              {lang_javascript ids=773,1113 range=743-747}
              {literal}
              <script type="text/javascript">
              <!-- 
              SocialEngine.Viewer.user_status = '{/literal}{$user->user_info.user_status}{literal}';
              //-->
              </script>
              {/literal}
              
              <div id='ajax_status'>
              {if $owner->user_info.user_status != ""}
                {assign var='status_date' value=$datetime->time_since($user->user_info.user_status_date)}
                {$user->user_displayname_short} <span id='ajax_currentstatus_value'>{$user->user_info.user_status}</span>
                <div style='padding-top: 5px;'>
                  <div style='float: left; padding-right: 5px;'>[ <a href="javascript:void(0);" onClick="SocialEngine.Viewer.userStatusChange(); return false;">{lang_print id=745}</a> ]</div>
                  <div class='home_updated'>
                    {lang_print id=1113}
                    <span id='ajax_currentstatus_date'>{lang_sprintf id=$status_date[0] 1=$status_date[1]}</span>
                  </div>
                  <div style='clear: both; height: 0px;'></div>
                </div>
              {else}
                <a href="javascript:void(0);" onClick="SocialEngine.Viewer.userStatusChange(); return false;">{lang_print id=743}</a>
              {/if}
              </div>
            {else}
              {assign var='status_date' value=$datetime->time_since($owner->user_info.user_status_date)}
              {$owner->user_displayname_short} {$owner->user_info.user_status}
              <br>{lang_print id=1113} <span id='ajax_currentstatus_date'>{lang_sprintf id=$status_date[0] 1=$status_date[1]}</span>
            {/if}
          </td>
          </tr>
          </table>
        {/if}
      </td>
      </tr>
      </table>
    {/if}
    {/if}
    {* END STATUS *}
    
    {* BEGIN STATS *}<!-- stats -->
	{if 0}
    <table cellpadding='0' cellspacing='0' width='100%' style='margin-bottom: 10px;'>
    <tr><td class='header'>{lang_print id=24}</td></tr>
    <tr>
    <td class='profile'>
      <table cellpadding='0' cellspacing='0'>
      <tr><td width='80' valign='top'>{lang_print id=1120}</td><td><a href='search_advanced.php?cat_selected={$owner->profilecat_info.profilecat_id}'>{lang_print id=$owner->profilecat_info.profilecat_title}</a></td></tr>
      <tr><td valign='top'>{lang_print id=1119}</td><td>{lang_print id=$owner->subnet_info.subnet_name}</td></tr>
      <tr><td>{lang_print id=846}</td><td>{lang_sprintf id=740 1=$profile_views}</td></tr>
      {if $setting.setting_connection_allow != 0}<tr><td>{lang_print id=847}</td><td>{lang_sprintf id=848 1=$total_friends}</td></tr>{/if}
      {if $owner->user_info.user_dateupdated != ""}<tr><td>{lang_print id=1113}</td><td>{assign var='last_updated' value=$datetime->time_since($owner->user_info.user_dateupdated)}{lang_sprintf id=$last_updated[0] 1=$last_updated[1]}</td></tr>{/if}
      {if $owner->user_info.user_signupdate != ""}<tr><td>{lang_print id=850}</td><td>{$datetime->cdate("`$setting.setting_dateformat`", $datetime->timezone("`$owner->user_info.user_signupdate`", $global_timezone))}</td></tr>{/if}
      </table>
    </td>
    </tr>
    </table>
	{/if}
    {* END STATS *}