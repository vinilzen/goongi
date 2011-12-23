{include file='header.tpl'}

{* $Id: albums.tpl 2 2009-01-10 20:53:09Z john $ *}

<div class='page_header'>
  {lang_sprintf id=1000138 1=$url->url_create('profile', $owner->user_info.user_username) 2=$owner->user_displayname}
</div>

{* SHOW NO ALBUMS NOTICE *}
{if $total_albums == 0}
  <table cellpadding='0' cellspacing='0'>
  <tr><td class='result'>
    <img src='./images/icons/bulb22.gif' border='0' class='icon'>
    {lang_sprintf id=1000139 1=$owner->user_displayname}
  </td></tr>
  </table>
{/if}

{* LOOP THROUGH ALBUMS *}
{section name=album_loop loop=$albums}

  {* SET ALBUM COVER *}
  {if $albums[album_loop].album_cover_id == 0}
    {assign var='album_cover_src' value='./images/icons/folder_big.gif'}
  {else}
    {* IF IMAGE, GET THUMBNAIL *}
    {if $albums[album_loop].album_cover_ext == "jpeg" || $albums[album_loop].album_cover_ext == "jpg" || $albums[album_loop].album_cover_ext == "gif" || $albums[album_loop].album_cover_ext == "png" || $albums[album_loop].album_cover_ext == "bmp"}
      {assign var='album_cover_dir' value=$url->url_userdir($owner->user_info.user_id)}
      {assign var='album_cover_src' value="`$album_cover_dir``$albums[album_loop].album_cover_id`_thumb.jpg"}
    {* SET THUMB PATH FOR AUDIO *}
    {elseif $albums[album_loop].album_cover_ext == "mp3" || $albums[album_loop].album_cover_ext == "mp4" || $albums[album_loop].album_cover_ext == "wav"}
      {assign var='album_cover_src' value='./images/icons/audio_big.gif'}
    {* SET THUMB PATH FOR VIDEO *}
    {elseif $albums[album_loop].album_cover_ext == "mpeg" || $albums[album_loop].album_cover_ext == "mpg" || $albums[album_loop].album_cover_ext == "mpa" || $albums[album_loop].album_cover_ext == "avi" || $albums[album_loop].album_cover_ext == "swf" || $albums[album_loop].album_cover_ext == "mov" || $albums[album_loop].album_cover_ext == "ram" || $albums[album_loop].album_cover_ext == "rm"}
      {assign var='album_cover_src' value='./images/icons/video_big.gif'}
    {* SET THUMB PATH FOR UNKNOWN *}
    {else}
      {assign var='album_cover_src' value='./images/icons/file_big.gif'}
    {/if}
  {/if}


  <div class='album' style='width: 500px;'>
    <table cellpadding='0' cellspacing='0' width='100%'>
    <tr>
    <td class='album_left' width='1'>
      <div class='album_photo' style='width: 140px; height: 140px;'>
        <a href='{$url->url_create('album', $owner->user_info.user_username, $albums[album_loop].album_id)}'><img src='{$album_cover_src}' border='0' width='{$misc->photo_size($album_cover_src,'140','140','w')}'></a></div>
      </div>
    </td>
    <td class='album_right'>
      <div class='album_title'>
        <a href='{$url->url_create('album', $owner->user_info.user_username, $albums[album_loop].album_id)}'>{$albums[album_loop].album_title|truncate:30:"...":true}</a>
        {if $albums[album_loop].album_dateupdated != 0}
          <div class='album_stats'>
	   {assign var="album_dateupdated" value=$datetime->time_since($albums[album_loop].album_dateupdated)}
	   {capture assign="dateupdated"}{lang_sprintf id=$album_dateupdated[0] 1=$album_dateupdated[1]}{/capture}
	   {lang_sprintf id=1000140 1=$dateupdated}
          </div>
        {/if}

      </div>
      <div style='margin-bottom: 8px;'>
        {$albums[album_loop].album_desc}
      </div>
    </td>
    </tr>
    </table>
  </div>

{/section}

{include file='footer.tpl'}