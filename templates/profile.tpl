{include file='header.tpl'}

{* $Id: profile.tpl 255 2009-11-18 02:21:01Z steve $ *}
<!-- <div class='page_header'>{lang_sprintf id=786 1=$owner->user_displayname}</div> -->
<h1>{$owner->user_info.user_displayname}</h1>
<div class="crumb"><a href="/">Главная</a><span>{lang_print id=652}<!-- Профиль --></span></div>
<div class="buttons">
	<span class="button2">
		<span class="l">&nbsp;</span><span class="c">
			<a href="/user_editprofile.php">Редактировать информацию</a>
		</span><span class="r">&nbsp;</span>
	</span>
</div>
{if $user->user_exists != 0 && $owner->user_info.user_id !=  $user->user_info.user_id}
	{if $owner->user_info.user_id != 0}
		<div class="buttons">
			{if $is_friend_pending == 1} {* подтвердить запрос *}<span class="button2" id="preli" >{lang_print id=895}</span>{/if}
			<span class="button2">
				<span class="l">&nbsp;</span><span id="add_to_fr_li" class="c">
					<a href="#" id="add_to_fr" rev="{if $is_friend_pending == 2}cancel_do{/if}{if $is_friend_pending == 0 && $is_friend == FALSE || $is_friend_pending == 1 }add_do{/if}{if $is_friend != FALSE }remove_do{/if}" rel="{$owner->user_info.user_username}">
						{if $is_friend_pending == 2} {* отозвать запрос *}{lang_print id=917}{/if}
						{if $is_friend_pending == 0 && $is_friend == FALSE }{lang_print id=838}{/if}
						{if $is_friend_pending == 1} {* подтвердить запрос *}{lang_print id=887}{/if}
						{if $is_friend != FALSE }{* remove *}{lang_print id=889}{/if}
					</a>							
				
			</span><span class="r">&nbsp;</span>
			</span>
			<span class="button2" id="prel">&nbsp;</span>
		</div>
		
	{/if}
{/if}
<div class="my_page_info">
	{* SHOW PROFILE CATS AND FIELDS *}
	{section name=cat_loop loop=$cats}
		{section name=subcat_loop loop=$cats[cat_loop].subcats}
			<h2>{lang_print id=$cats[cat_loop].subcats[subcat_loop].subcat_title}<!-- персональная инфорвация --></h2>
			{* LOOP THROUGH FIELDS IN TAB, ONLY SHOW FIELDS THAT HAVE BEEN FILLED IN *}
			{section name=field_loop loop=$cats[cat_loop].subcats[subcat_loop].fields}
			<p>
				<span>
					{lang_print id=$cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_title}:
				</span>
				{$cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_value_formatted}
				{if $cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_special == 1 && $cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_value|substr:0:4 != "0000"} ({lang_sprintf id=852 1=$datetime->age($cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_value)}){/if}
			</p>
			{/section}
			
		{/section}
	{/section}
</div>
      <!-- <div class='page_header'></div> -->
  
    
    {* PLUGIN RELATED PROFILE SIDEBAR *}
    {hook_foreach name=profile_side var=profile_side_args}
      {include file=$profile_side_args.file}
    {/hook_foreach}

  {* END LEFT COLUMN *}

  {* BEGIN RIGHT COLUMN *}

    {* JAVASCRIPT FOR SWITCHING TABS *}
    {literal}
    <script type='text/javascript'>
    <!--
      var visible_tab = '{/literal}{$v}{literal}';
      function loadProfileTab(tabId){
        if(tabId == visible_tab){
          return false;
        }
        if($('profile_'+tabId)){
          $('profile_tabs_'+tabId).className='profile_tab2';
          $('profile_'+tabId).style.display = "block";
          if($('profile_tabs_'+visible_tab)){
            $('profile_tabs_'+visible_tab).className='profile_tab';
            $('profile_'+visible_tab).style.display = "none";
          }
          visible_tab = tabId;
        }
      }
    //-->
    </script>
    {/literal}
   
    {* SHOW PROFILE TAB BUTTONS *}<!-- SHOW PROFILE TAB BUTTONS start -->
    <table cellpadding='0' cellspacing='0'> <tr>
    <td valign='bottom'><table cellpadding='0' cellspacing='0'><tr><td class='profile_tab{if $v == 'profile'}2{/if}' id='profile_tabs_profile' onMouseUp="this.blur()"><a href='javascript:void(0);' onMouseDown="loadProfileTab('profile')" onMouseUp="this.blur()">{lang_print id=652}</a></td></tr></table></td>
    {if $total_friends_all != 0}<td valign='bottom'><table cellpadding='0' cellspacing='0'><td class='profile_tab{if $v == 'friends'}2{/if}' id='profile_tabs_friends' onMouseUp="this.blur()"><a href='javascript:void(0);' onMouseDown="loadProfileTab('friends');" onMouseUp="this.blur()">{lang_print id=653}</a></td></tr></table></td>{/if}
    {if $allowed_to_comment != 0 || $total_comments != 0}<td valign='bottom'><table cellpadding='0' cellspacing='0'><td class='profile_tab{if $v == 'comments'}2{/if}' id='profile_tabs_comments' onMouseUp="this.blur()"><a href='javascript:void(0);' onMouseDown="loadProfileTab('comments');SocialEngine.ProfileComments.getComments(1)" onMouseUp="this.blur()">{lang_print id=854}</a></td></tr></table></td>{/if}
    
    {* PLUGIN RELATED PROFILE TABS *}
    {hook_foreach name=profile_tab var=profile_tab_args max=8 complete=profile_tab_complete}
      <td valign='bottom'>
        <table cellpadding='0' cellspacing='0' style='float: left;'>
          <tr>
            <td class='profile_tab{if $v == $profile_tab_args.name}2{/if}' id='profile_tabs_{$profile_tab_args.name}' onMouseUp="this.blur();">
              <a href='javascript:void(0);' onMouseDown="loadProfileTab('{$profile_tab_args.name}')" onMouseUp="this.blur();">
                {lang_print id=$profile_tab_args.title}
              </a>
            </td>
          </tr>
        </table>
      </td>
    {/hook_foreach}
    
    {if !$profile_tab_complete}
      <td valign='bottom'>
        <table cellpadding='0' cellspacing='0' style='float: left;'>
          <tr>
            <td class='profile_tab' onMouseUp="this.blur();" nowrap="nowrap">
              <a href="javascript:void(0);" onclick="$('profile_tab_dropdown').style.display = ( $('profile_tab_dropdown').style.display=='none' ? 'inline' : 'none' ); this.blur(); return false;" nowrap="nowrap">
                {lang_print id=1317}
              </a>
            </td>
          </tr>
        </table>
        <div class='menu_profile_dropdown' id='profile_tab_dropdown' style='display: none;'>
          <div>
            {* SHOW ANY PLUGIN MENU ITEMS *}
            {hook_foreach name=profile_tab var=profile_tab_args start=8}
            <div class='menu_profile_item_dropdown'>
              <div  id='profile_tabs_{$profile_tab_args.name}' onMouseUp="this.blur();">
              <a href='javascript:void(0);' onMouseDown="loadProfileTab('{$profile_tab_args.name}')" onMouseUp="this.blur();" class='menu_profile_item' style="text-align: left;">
                {lang_print id=$profile_tab_args.title}
              </a>
            </div></div>
            {/hook_foreach}
          </div>
        </div>
      </td>
    {/if}
    
    <td width='100%' class='profile_tab_end'>&nbsp;</td>
    </tr>
    </table>
    <!-- SHOW PROFILE TAB BUTTONS end -->
    
    
    
    <div class='profile_content'>
    
    {* PROFILE TAB *}
    <div id='profile_profile'{if $v != 'profile'} style='display: none;'{/if}>
      

      {* END PROFILE TABS AND FIELDS *}
      
      {* SHOW RECENT ACTIVITY *}
      {if $actions|@count > 0}
        {literal}
        <script language="JavaScript">
        <!-- 
          Rollimage0 = new Image(10,12);
          Rollimage0.src = "./images/icons/action_delete1.gif";
          Rollimage1 = new Image(10,12);
          Rollimage1.src = "./images/icons/action_delete2.gif";
        //-->
        </script>
        {/literal}
        
        {* SHOW RECENT ACTIONS *}
        <div style='padding-bottom: 10px;' id='actions'>
          <div class='profile_headline2'><b>{lang_print id=851}</b></div>
          {section name=actions_loop loop=$actions}
            <div id='action_{$actions[actions_loop].action_id}' class='profile_action'>
              <table cellpadding='0' cellspacing='0'>
              <tr>
              <td valign='top'><img src='./images/icons/{$actions[actions_loop].action_icon}' border='0' class='icon'></td>
              <td valign='top' width='100%'>
                <div class='profile_action_date'>
                  {assign var='action_date' value=$datetime->time_since($actions[actions_loop].action_date)}
                  {lang_sprintf id=$action_date[0] 1=$action_date[1]}
                  {* DISPLAY DELETE LINK IF NECESSARY *}
                  {if $setting.setting_actions_selfdelete == 1 && $actions[actions_loop].action_user_id == $user->user_info.user_id}
                    <img src='./images/icons/action_delete1.gif' style='vertical-align: middle; margin-left: 3px; cursor: pointer; cursor: hand;' border='0' onmouseover="this.src=Rollimage1.src;" onmouseout="this.src=Rollimage0.src;" onClick="SocialEngine.Viewer.userActionDelete({$actions[actions_loop].action_id});" />
                  {/if}
                </div>
                {assign var='action_media' value=''}
                {if $actions[actions_loop].action_media !== FALSE}{capture assign='action_media'}{section name=action_media_loop loop=$actions[actions_loop].action_media}<a href='{$actions[actions_loop].action_media[action_media_loop].actionmedia_link}'><img src='{$actions[actions_loop].action_media[action_media_loop].actionmedia_path}' border='0' width='{$actions[actions_loop].action_media[action_media_loop].actionmedia_width}' class='recentaction_media'></a>{/section}{/capture}{/if}
                {lang_sprintf assign=action_text id=$actions[actions_loop].action_text args=$actions[actions_loop].action_vars}
                {$action_text|replace:"[media]":$action_media|choptext:50:"<br>"}
              </td>
              </tr>
              </table>
            </div>
          {/section}
        </div>
      {/if}
      {* END RECENT ACTIVITY *}
      
    </div>
    {* END PROFILE TAB *}
    
    
    
    
    
    {* FRIENDS TAB *}
    {if $total_friends_all != 0}
      <div id='profile_friends'{if $v != 'friends'} style='display: none;'{/if}>
        <div>
          <div style='float: left; width: 50%;'>
            <div class='profile_headline'>
              {if $m == 1}
                {lang_sprintf id=1024 1=$owner->user_displayname_short}
              {else}
                {lang_sprintf id=930 1=$owner->user_displayname_short}
              {/if} ({$total_friends})
            </div>
          </div>
          <div style='float: right; width: 50%; text-align: right;'>
            {if $search == ""}
              <div id='profile_friends_searchbox_link'>
                <a href='javascript:void(0);' onClick="$('profile_friends_searchbox_link').style.display='none';$('profile_friends_searchbox').style.display='block';$('profile_friends_searchbox_input').focus();">{lang_print id=1197}</a>
              </div>
            {/if}
            <div id='profile_friends_searchbox' style='text-align: right;{if $search == ""} display: none;{/if}'>
              <form action='profile.php' method='post'>
              <input type='text' maxlength='100' size='30' class='text' name='search' value='{$search}' id='profile_friends_searchbox_input'>
              <input type='submit' class='button' value='{lang_print id=646}'>
              <input type='hidden' name='p' value='{$p}'>
              <input type='hidden' name='v' value='friends'>
              <input type='hidden' name='user' value='{$owner->user_info.user_username}'>
              </form>
            </div>
          </div>
          <div style='clear: both;'></div>
        </div>
        
        {* IF MUTUAL FRIENDS EXIST, SHOW OPTION TO VIEW THEM *}
        {if $owner->user_info.user_id != $user->user_info.user_id && $total_friends_mut != 0}
          <div style='margin-bottom: 10px;'>
            {if $m != 1}
              {lang_print id=1022}
            {else}
              <a href='profile.php?user={$owner->user_info.user_username}&v=friends'>{lang_print id=1022}</a>
            {/if}
            &nbsp;|&nbsp; 
            {if $m == 1}
              {lang_print id=1020}
            {else}
              <a href='profile.php?user={$owner->user_info.user_username}&v=friends&m=1'>{lang_print id=1020}</a>
            {/if}
          </div>
        {/if}
        
        {* DISPLAY NO RESULTS MESSAGE *}
        {if $search != "" && $total_friends == 0}
          <br>
          <table cellpadding='0' cellspacing='0'>
          <tr><td class='result'>
            {lang_sprintf id=934 1=$owner->user_displayname_short}
          </td></tr>
          </table>
        {elseif $m == 1 && $total_friends == 0}
          <br>
          <table cellpadding='0' cellspacing='0'>
          <tr><td class='result'>
            {lang_sprintf id=1023 1=$owner->user_displayname_short}
          </td></tr>
          </table>
        {/if}
        
        
        {* DISPLAY PAGINATION MENU IF APPLICABLE *}
        {if $maxpage_friends > 1}
          <div style='text-align: center;'>
            {if $p_friends != 1}<a href='profile.php?user={$owner->user_info.user_username}&v=friends&search={$search}&m={$m}&p={math equation='p-1' p=$p_friends}'>&#171; {lang_print id=182}</a>{else}<font class='disabled'>&#171; {lang_print id=182}</font>{/if}
            {if $p_start_friends == $p_end_friends}
              &nbsp;|&nbsp; {lang_sprintf id=184 1=$p_start_friends 2=$total_friends} &nbsp;|&nbsp; 
            {else}
              &nbsp;|&nbsp; {lang_sprintf id=185 1=$p_start_friends 2=$p_end_friends 3=$total_friends} &nbsp;|&nbsp; 
            {/if}
            {if $p_friends != $maxpage_friends}<a href='profile.php?user={$owner->user_info.user_username}&v=friends&search={$search}&m={$m}&p={math equation='p+1' p=$p_friends}'>{lang_print id=183} &#187;</a>{else}<font class='disabled'>{lang_print id=183} &#187;</font>{/if}
          </div>
        {/if}
        <ul class="friends_list">
        {* LOOP THROUGH FRIENDS *}
        {section name=friend_loop loop=$friends}
			<li>
				<a href='{$url->url_create("profile",$friends[friend_loop]->user_info.user_username)}'>
					<img src='{$friends[friend_loop]->user_photo("./images/nophoto.gif")}' width='{$misc->photo_size($friends[friend_loop]->user_photo("./images/nophoto.gif"),"90","90","w")}' border='0' alt="{lang_sprintf id=509 1=$friends[friend_loop]->user_displayname_short}">
				</a>
				<div>
					<p><a href="#">vip</a><a href="#">название группы</a></p>	
					<h2>
						<a href='{$url->url_create('profile',$friends[friend_loop]->user_info.user_username)}'>{$friends[friend_loop]->user_displayname}</a>
					</h2>
					{if $friends[friend_loop]->user_info.user_dateupdated != 0}<div>{lang_print id=849} {assign var='last_updated' value=$datetime->time_since($friends[friend_loop]->user_info.user_dateupdated)}{lang_sprintf id=$last_updated[0] 1=$last_updated[1]}</div>{/if}
					{if $show_details != 0}
					  {if $friends[friend_loop]->friend_type != ""}<div>{lang_print id=882} {$friends[friend_loop]->friend_type}</div>{/if}
					  {if $friends[friend_loop]->friend_explain != ""}<div>{lang_print id=907} {$friends[friend_loop]->friend_explain}</div>{/if}
					{/if}
					
				  {if !$friends[friend_loop]->is_viewers_friend && !$friends[friend_loop]->is_viewers_blocklisted && $friends[friend_loop]->user_info.user_id != $user->user_info.user_id && $user->user_exists != 0}<div id='addfriend_{$friends[friend_loop]->user_info.user_id}'><a href="javascript:TB_show('{lang_print id=876}', 'user_friends_manage.php?user={$friends[friend_loop]->user_info.user_username}&TB_iframe=true&height=300&width=450', '', './images/trans.gif');">{lang_print id=922}</a></div>{/if}
				  {if !$members[member_loop].member->is_viewer_blocklisted && ($user->level_info.level_message_allow == 2 || ($user->level_info.level_message_allow == 1 && $friends[friend_loop]->is_viewers_friend == 2)) && $friends[friend_loop]->user_info.user_id != $user->user_info.user_id}<a href="javascript:TB_show('{lang_print id=784}', 'user_messages_new.php?to_user={$friends[friend_loop]->user_displayname}&to_id={$friends[friend_loop]->user_info.user_username}&TB_iframe=true&height=400&width=450', '', './images/trans.gif');">{lang_print id=839}</a>{/if}
				</div>
          </li>
        {/section}
        </ul>
        
        {* DISPLAY PAGINATION MENU IF APPLICABLE *}
        {if $maxpage_friends > 1}
          <div style='text-align: center;'>
            {if $p_friends != 1}<a href='profile.php?user={$owner->user_info.user_username}&v=friends&search={$search}&m={$m}&p={math equation='p-1' p=$p_friends}'>&#171; {lang_print id=182}</a>{else}<font class='disabled'>&#171; {lang_print id=182}</font>{/if}
            {if $p_start_friends == $p_end_friends}
              &nbsp;|&nbsp; {lang_sprintf id=184 1=$p_start_friends 2=$total_friends} &nbsp;|&nbsp; 
            {else}
              &nbsp;|&nbsp; {lang_sprintf id=185 1=$p_start_friends 2=$p_end_friends 3=$total_friends} &nbsp;|&nbsp; 
            {/if}
            {if $p_friends != $maxpage_friends}<a href='profile.php?user={$owner->user_info.user_username}&v=friends&search={$search}&m={$m}&p={math equation='p+1' p=$p_friends}'>{lang_print id=183} &#187;</a>{else}<font class='disabled'>{lang_print id=183} &#187;</font>{/if}
          </div>
        {/if}
        
        
      </div>
    {/if}
    {* END FRIENDS TAB *}
    
    
    
    
    
    
    
    {* BEGIN COMMENTS TAB *}
    {if $allowed_to_comment != 0 || $total_comments != 0}
      
      {* SHOW COMMENT TAB *}
      <div id='profile_comments'{if $v != 'comments'} style='display: none;'{/if}>
        
        {* COMMENTS *}
        <div id="profile_{$owner->user_info.user_id}_postcomment"></div>
		<h2>Записи на стене</h2>
		<ul class="comments wall">
			<li><div id="profile_{$owner->user_info.user_id}_comments" style='margin-left: auto; margin-right: auto;'></div></li>
        
       {*
	   {lang_javascript ids=39,155,175,182,183,184,185,187,784,787,829,830,831,832,833,834,835,854,856,891,1025,1026,1032,1034,1071}
		*}
        {literal}
        <style type='text/css'>
          div.comment_headline {font-size: 13px;margin-bottom: 7px;font-weight: bold;padding: 0px; border: none;background: none;color: #555555;}
        </style>
        {/literal}
		
        {*
        <script type="text/javascript">
        
          SocialEngine.ProfileComments = new SocialEngineAPI.Comments({ldelim}
            'canComment' : {if $allowed_to_comment}true{else}false{/if},
            'commentHTML' : '{$setting.setting_comment_html|replace:",":", "}',
            'commentCode' : {if $setting.setting_comment_code}true{else}false{/if},
            
            'type' : 'profile',
            'typeIdentifier' : 'user_id',
            'typeID' : {$owner->user_info.user_id},
            
            'typeTab' : 'users',
            'typeCol' : 'user',
            
            'initialTotal' : {$total_comments|default:0},
            
            'paginate' : true,
            'cpp' : 10,
            
            'commentLinks' : {literal}{'reply' : true, 'walltowall' : true}{/literal}
          {rdelim});
        
          SocialEngine.RegisterModule(SocialEngine.ProfileComments);
       
          // Backwards
          function addComment(is_error, comment_body, comment_date)
          {ldelim}
            SocialEngine.ProfileComments.addComment(is_error, comment_body, comment_date);
          {rdelim}
        
          function getComments(direction)
          {ldelim}
            SocialEngine.ProfileComments.getComments(direction);
          {rdelim}

        </script>
        *}
        
      </div>
      
      
    {/if}
    {* END COMMENTS *}
    
    
    
    {* PLUGIN RELATED PROFILE TABS *}
    {hook_foreach name=profile_tab var=profile_tab_args}
      <div id='profile_{$profile_tab_args.name}'{if $v != $profile_tab_args.name} style='display: none;'{/if}>
        {include file=$profile_tab_args.file}
      </div>
    {/hook_foreach}
    
    

  {* END PRIVACY IF STATEMENT *}

{* END RIGHT COLUMN *}
{include file='footer.tpl'}