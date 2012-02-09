{literal}
    <script type="text/javascript">
    function change(pad)
    {
       document.getElementById('pag_com').value = pad;
    }
    </script>
{/literal}

{if $death == '1'}
{include file='header_death.tpl'}
 {else}
 {include file='header.tpl'}
{/if}
{* $Id: profile.tpl 255 2009-11-18 02:21:01Z steve $ *}
    
<!-- <div class='page_header'>{lang_sprintf id=786 1=$owner->user_displayname}</div> -->
<h1>{$owner->user_info.user_displayname}</h1>
<div class="crumb">
	<a href="/">Главная</a>
	<span>{lang_print id=652}<!-- Профиль --></span>
</div>

{if $owner->user_info.user_id == $user->user_info.user_id && $death != 1}

<div class="buttons">
	<span class="button2">
		<span class="l">&nbsp;</span><span class="c">
			<a href="/user_editprofile.php">Редактировать информацию</a>
		</span><span class="r">&nbsp;</span>
	</span>
</div>
{/if}
{if $user->user_exists != 0 && $owner->user_info.user_id !=  $user->user_info.user_id && $death != 1}
	{if $owner->user_info.user_id != 0}
		<div class="buttons" style="overflow:visible;">
			<div class="profil_mn"><a href="#" class="p_link"><span>профиль</span></a>
				<div class="p_mn">
					<div class="p_mn_t"></div>
					<div class="p_mn_c">
						<div class="p_mn_b">
							<a href="/tree.php?user={$owner->user_info.user_username}">Древо</a>
							<a href="/friends.php?user={$owner->user_info.user_username}">Друзья</a>
							<a href="javascript:void(0);">История рода</a>
							<a href="/blog.php?user={$owner->user_info.user_username}">Статьи</a>
							<a href="javascript:void(0);">Медали</a>
							<a href="javascript:void(0);">Визитки</a>
							<a href="/user_history.php?user={$owner->user_info.user_username}">История рода</a>
							
							<!-- <a href="">Медали</a> -->
						</div>
					</div>
				</div>
			</div>
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
			<div class="clear"></div>
		</div>
	{/if}
{/if}
{ if $death != 1}
<div class="my_page_inf">
	<div class="my_page_img">
	{if $owner->user_info.user_id == $user->user_info.user_id}
		{if $user->profile_info.profilevalue_5 == 2}
			<img {if $user->user_info.user_photo == ''} src="./images/avatars_05.gif" {else} src="{$user->user_photomain('./images/avatars_05.gif')}{/if}">
		{else}
			<img {if $user->user_info.user_photo == ''} src="./images/avatars_03.gif" {else} src="{$user->user_photomain('./images/avatars_03.gif')}{/if}">
		{/if}
	{else}
		{if $owner->profile_info.profilevalue_5 == 2}
			<img {if $owner->user_info.user_photo == ''} src="./images/avatars_05.gif" {else} src="{$owner->user_photomain('./images/avatars_05.gif')}{/if}">
		{else}
			<img {if $owner->user_info.user_photo == ''} src="./images/avatars_03.gif" {else} src="{$owner->user_photomain('./images/avatars_03.gif')}{/if}">
		{/if}
	{/if}
    </div>
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
					{if $cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_special == 1 && $cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_value|substr:0:4 != "0000"} <!--({lang_sprintf id=852 1=$datetime->age($cats[cat_loop].subcats[subcat_loop].fields[field_loop].field_value)}) -->{/if}
				</p>
				{/section}
			{/section}
		{/section}
	</div>
</div>
{else}
<div class="d_inf">
<div class="sv"></div>
    <div class="golosa">
            <span class="button3"><span class="l">&nbsp;</span><span class="c">
            <input type="submit" onclick="candle_post( '{$user->user_info.user_id}' , '{$user->user_info.user_username}', '{$owner->user_info.user_id}', '{$user->user_info.user_photo}'); return false;" value="Зажечь свечу" name="creat" />
            </span><span class="r">&nbsp;</span></span>
            <label><a  onClick="Show_piple({$owner->user_info.user_id})" href="javascript:void(0);">Зажгли свечу</a> : <span id = "count_candle">{$count_candle}</span></label>
    </div>
    <div class="img">
        <img alt=""  {if $owner->user_info.user_photo == ''} src="./images/nophoto.gif" {else} src="{$owner->user_photomain('./images/nophoto.gif')}{/if}">
        <p><a href="javascript:void(0);">Показать подробную информацию</a></p>
    </div>
 {assign var=foo value="-"|explode:$owner->profile_info.profilevalue_4}
{assign var=birth value= "$foo[2].$foo[1].$foo[0]"}

 {assign var=foo value="-"|explode:$owner->profile_info.profilevalue_12}
{assign var=deat value= "$foo[2].$foo[1]"."$foo[0]"}
<div class="g_inf_text"><p>{if $owner->profile_info.profilevalue_4 == '0000-00-00'}Дата рождения не известна{else}{$birth}{/if} - {if $owner->profile_info.profilevalue_12 == '0000-00-00' && $owner->profile_info.profilevalue_16 == '1'}Дата смерти не известна{else}{$deat}{/if}<span></span></p></div>

<div class="clear"><img src="images/x.gif" alt="" /></div>
</div>
            <div class="clear"><img src="images/x.gif" alt="" /></div>

{/if}

 
      <!-- <div class='page_header'></div> -->
  
    {if 0}
    {* PLUGIN RELATED PROFILE SIDEBAR *}
    {hook_foreach name=profile_side var=profile_side_args}
      {include file=$profile_side_args.file}
    {/hook_foreach}
	{/if}
  {* END LEFT COLUMN *}

  {* BEGIN RIGHT COLUMN *}

	<h2>Написать сообщение</h2>
	<div class="form add_com napisat_so">
		<div class="input">
			<textarea id="comment_msg" rows="3" cols="10" name="text"></textarea>
		</div>
		<span class="button2"><span class="l">&nbsp;</span><span class="c">
			<input type="submit"  style="padding:1px 8px 0px 8px;"  onclick="comment_post('{$owner->user_info.user_username}',{$owner->user_info.user_id}, {$user->user_info.user_id}, 'profile', 'user_id', 'users' , 'user'); return false;" value="Отправить" name="creat" />
		</span><span class="r">&nbsp;</span></span>
	</div>

      {* SHOW COMMENTS *}
	  <h2>Записи на стене</h2>
		<ul class="comments wall" id="comments_list"><img src="/images/142.gif" border="0"></ul>
                <input type="hidden" id = "pag_com" name="pag_com" value="{$pag_com}">
		
    {literal}
	<script type="text/javascript">
		comment_get('{/literal}{$owner->user_info.user_username}{literal}',{/literal}{$owner->user_info.user_id}{literal}, {/literal}{$user->user_info.user_id}{literal},'profile','user_id', 'users' , 'user',{/literal}{$pag_com}{literal});
	</script>
    {/literal}
    
    
    
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
                <a onClick="$('profile_friends_searchbox_link').style.display='none';$('profile_friends_searchbox').style.display='block';$('profile_friends_searchbox_input').focus();">{lang_print id=1197}</a>
              </div>
            {/if}
            <div id='profile_friends_searchbox' style='text-align: right;{if $search == ""} display: none;{/if}'>
              <form action='profile.php' method='post'>
              <input type='text' maxlength='100' size='30' class='text' name='search' value='{$search}' id='profile_friends_searchbox_input'>
              <input type='submit' class='button' value='{lang_print id=646}'>
              <input type='hidden' name='p' value='{$p}'>
              <input type='hidden' name='v' value='friends'>
              <input type='hidden' name='user' id='user' value='{$owner->user_info.user_username}'>
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
            {lang_sprintf id=934 1=$owner->user_displayname_short}
        {elseif $m == 1 && $total_friends == 0}
          <br>
            {lang_sprintf id=1023 1=$owner->user_displayname_short}
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
						{if $friends[friend_loop]->friend_type != ""}
							<div>{lang_print id=882} {$friends[friend_loop]->friend_type}</div>
						{/if}
						{if $friends[friend_loop]->friend_explain != ""}
							<div>{lang_print id=907} {$friends[friend_loop]->friend_explain}</div>
						{/if}
					{/if}
					
					{if !$friends[friend_loop]->is_viewers_friend && !$friends[friend_loop]->is_viewers_blocklisted && $friends[friend_loop]->user_info.user_id != $user->user_info.user_id && $user->user_exists != 0}
						<div id='addfriend_{$friends[friend_loop]->user_info.user_id}'><a href="javascript:TB_show('{lang_print id=876}', 'user_friends_manage.php?user={$friends[friend_loop]->user_info.user_username}&TB_iframe=true&height=300&width=450', '', './images/trans.gif');">{lang_print id=922}</a></div>
					{/if}
					
					{if !$members[member_loop].member->is_viewer_blocklisted && ($user->level_info.level_message_allow == 2 || ($user->level_info.level_message_allow == 1 && $friends[friend_loop]->is_viewers_friend == 2)) && $friends[friend_loop]->user_info.user_id != $user->user_info.user_id}
						<a href="javascript:TB_show('{lang_print id=784}', 'user_messages_new.php?to_user={$friends[friend_loop]->user_displayname}&to_id={$friends[friend_loop]->user_info.user_username}&TB_iframe=true&height=400&width=450', '', './images/trans.gif');">{lang_print id=839}</a>
					{/if}
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
        
		</ul>
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

{if $death == 1}
{include file='footer_death.tpl'}
 {else}
 {include file='footer.tpl'}
{/if}
{* END RIGHT COLUMN *}
