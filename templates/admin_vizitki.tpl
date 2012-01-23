{include file='admin_header.tpl'}

{* $Id: admin_vizitki.tpl 5 2009-01-11 06:01:16Z john $ *}

<h2>{lang_print id=1700003}</h2>
{lang_print id=1700084}
<br />
<br />

{if $result}<div class='success'><img src='../images/success.gif' class='icon' border='0'> {lang_print id=191}</div>{/if}

<form action='admin_vizitki.php' method='POST' name='info'>

  {* JAVASCRIPT FOR ADDING vizitki CATEGORIES *}
  {literal}
  <script type="text/javascript">
  <!--
  function createNewСountry()
  {
    // Display
    $('newСountryInput').value = '';
    $('newСountryContainer').style.display = '';
    $('newСountryLink').style.display = 'none';
  }

  function editNewСountry()
  {
    var newСountryTitle = $('newСountryInput').value;

    // Display
    $('newСountryInput').value = '';
    $('newСountryContainer').style.display = 'none';
    $('newСountryLink').style.display = '';

    // Ajax
    var request = new Request.JSON({
      'method' : 'post',
      'url' : 'admin_vizitki.php',
      'data' : {
        'task' : 'createСountry',
        'vizitkientrycat_title' : newСountryTitle
      },
      'onComplete':function(responseObject)
      {
        if( $type(responseObject)!="object" || !responseObject.result || responseObject.result=="failure" )
        {
          alert('ERR');
        }

        else
        {
          var vizitkientrycat_id = responseObject.vizitkientrycat_id;
          var vizitkientrycat_languagevar_id = responseObject.vizitkientrycat_languagevar_id;
          var innerHTML = '';

          //innerHTML += '<td>';
          innerHTML += '<span class="oldСountryContainer">';
          innerHTML += '<a href="javascript:void(0);" onclick="switchOldСountry(' + vizitkientrycat_id + ');">';
          innerHTML += newСountryTitle;
          innerHTML += '</a>';
          innerHTML += '</span>';
          innerHTML += '<span class="oldСountryInput" style="display:none;">';
          innerHTML += "<input type='text' class='text' size='30' maxlength='50' onblur='editOldСountry(" + vizitkientrycat_id + ");' value='" + newСountryTitle + "' />";
          innerHTML += '</span>';
          innerHTML += '<span class="oldСountryLangVar">';
          innerHTML += '&nbsp;(Language Variable #<a href="admin_language_edit.php?language_id=1&phrase_id=' + vizitkientrycat_languagevar_id + '">';
          innerHTML += vizitkientrycat_languagevar_id;
          innerHTML += '</a>)';
          innerHTML += '</span>';
          //innerHTML += '</td>';

          //alert(innerHTML);

          var newСountryRow = new Element('tr', {'id' : 'vizitkiEntryCatRow_' + vizitkientrycat_id});
          var newСountryData = new Element('td', {'html' : innerHTML});

          newСountryRow.inject($('newСountryRow'), 'before');
          newСountryData.inject(newСountryRow);
        }
      }
    });

    request.send();
  }

  function switchOldСountry(vizitkientrycat_id)
  {
    var СountryRow = $('vizitkiEntryCatRow_' + vizitkientrycat_id);
    СountryRow.getElement('.oldСountryContainer').style.display = 'none';
    СountryRow.getElement('.oldСountryInput').style.display = '';
    СountryRow.getElement('input').focus();
  }

  function unswitchOldСountry(vizitkientrycat_id)
  {
    var СountryRow = $('vizitkiEntryCatRow_' + vizitkientrycat_id);
    СountryRow.getElement('.oldСountryContainer').style.display = '';
    СountryRow.getElement('.oldСountryInput').style.display = 'none';
  }

  function editOldСountry(vizitkientrycat_id)
  {
    var СountryRow = $('vizitkiEntryCatRow_' + vizitkientrycat_id);
    var newСountryTitle = СountryRow.getElement('input').value;

    // DELETE
    if( newСountryTitle.trim()=='' )
    {
      deleteСountry(vizitkientrycat_id);
      return;
    }

    СountryRow.getElement('.oldСountryContainer').getElement('a').innerHTML = newСountryTitle;
    unswitchOldСountry(vizitkientrycat_id);

    // Ajax
    var request = new Request.JSON({
      'method' : 'post',
      'url' : 'admin_vizitki.php',
      'data' : {
        'task' : 'editСountry',
        'vizitkientrycat_id' : vizitkientrycat_id,
        'vizitkientrycat_title' : newСountryTitle
      },
      'onComplete':function(responseObject)
      {
        if( $type(responseObject)!="object" || !responseObject.result || responseObject.result=="failure" )
        {
          alert('ERR');
        }
      }
    });

    request.send();
  }

  function deleteСountry(vizitkientrycat_id)
  {
    var СountryRow = $('vizitkiEntryCatRow_' + vizitkientrycat_id);

    СountryRow.destroy();

    // Ajax
    var request = new Request.JSON({
      'method' : 'post',
      'url' : 'admin_vizitki.php',
      'data' : {
        'task' : 'deleteСountry',
        'vizitkientrycat_id' : vizitkientrycat_id
      },
      'onComplete':function(responseObject)
      {
        if( $type(responseObject)!="object" || !responseObject.result || responseObject.result=="failure" )
        {
          alert('ERR');
        }
      }
    });

    request.send();
  }

//====================================================

  function createNewCategory()
  {
    // Display
    $('newCategoryInput').value = '';
    $('newCategoryContainer').style.display = '';
    $('newCategoryLink').style.display = 'none';
  }



 function switchOldCategory(vizitkientrycat_id)
  {
    var categoryRow = $('vizitkiEntryCatRow_' + vizitkientrycat_id);
    СountryRow.getElement('.oldСountryContainer').style.display = 'none';
    СountryRow.getElement('.oldСountryInput').style.display = '';
    СountryRow.getElement('input').focus();
  }

  
  function editNewCategory()
  {
    var newCategoryTitle = $('newCategoryInput').value;
    
    // Display
    $('newCategoryInput').value = '';
    $('newCategoryContainer').style.display = 'none';
    $('newCategoryLink').style.display = '';
    
    // Ajax
    var request = new Request.JSON({
      'method' : 'post',
      'url' : 'admin_vizitki.php',
      'data' : {
        'task' : 'createvizitkientrycat',
        'vizitkientrycat_title' : newCategoryTitle
      },
      'onComplete':function(responseObject)
      {
        if( $type(responseObject)!="object" || !responseObject.result || responseObject.result=="failure" )
        {
          alert('ERR');
        }
        
        else
        {
          var vizitkientrycat_id = responseObject.vizitkientrycat_id;
          var vizitkientrycat_languagevar_id = responseObject.vizitkientrycat_languagevar_id;
          var innerHTML = '';
          
          //innerHTML += '<td>';
          innerHTML += '<span class="oldCategoryContainer">';
          innerHTML += '<a href="javascript:void(0);" onclick="switchOldCategory(' + vizitkientrycat_id + ');">';
          innerHTML += newCategoryTitle;
          innerHTML += '</a>';
          innerHTML += '</span>';
          innerHTML += '<span class="oldCategoryInput" style="display:none;">';
          innerHTML += "<input type='text' class='text' size='30' maxlength='50' onblur='editOldCategory(" + vizitkientrycat_id + ");' value='" + newCategoryTitle + "' />";
          innerHTML += '</span>';
          innerHTML += '<span class="oldCategoryLangVar">';
          innerHTML += '&nbsp;(Language Variable #<a href="admin_language_edit.php?language_id=1&phrase_id=' + vizitkientrycat_languagevar_id + '">';
          innerHTML += vizitkientrycat_languagevar_id;
          innerHTML += '</a>)';
          innerHTML += '</span>';
          //innerHTML += '</td>';
          
          //alert(innerHTML);
          
          var newCategoryRow = new Element('tr', {'id' : 'vizitkiEntryCatRow_' + vizitkientrycat_id});
          var newCategoryData = new Element('td', {'html' : innerHTML});
          
          newCategoryRow.inject($('newCategoryRow'), 'before');
          newCategoryData.inject(newCategoryRow);
        }
      }
    });
    
    request.send();
  }
  
  function switchOldCategory(vizitkientrycat_id)
  {
    var categoryRow = $('vizitkiEntryCatRow_' + vizitkientrycat_id);
    categoryRow.getElement('.oldCategoryContainer').style.display = 'none';
    categoryRow.getElement('.oldCategoryInput').style.display = '';
    categoryRow.getElement('input').focus();
  }
  
  function unswitchOldCategory(vizitkientrycat_id)
  {
    var categoryRow = $('vizitkiEntryCatRow_' + vizitkientrycat_id);
    categoryRow.getElement('.oldCategoryContainer').style.display = '';
    categoryRow.getElement('.oldCategoryInput').style.display = 'none';
  }
  
  function editOldCategory(vizitkientrycat_id)
  {
    var categoryRow = $('vizitkiEntryCatRow_' + vizitkientrycat_id);
    var newCategoryTitle = categoryRow.getElement('input').value;
    
    // DELETE
    if( newCategoryTitle.trim()=='' )
    {
      deleteCategory(vizitkientrycat_id);
      return;
    }
    
    categoryRow.getElement('.oldCategoryContainer').getElement('a').innerHTML = newCategoryTitle;
    unswitchOldCategory(vizitkientrycat_id);
    
    // Ajax
    var request = new Request.JSON({
      'method' : 'post',
      'url' : 'admin_vizitki.php',
      'data' : {
        'task' : 'editvizitkientrycat',
        'vizitkientrycat_id' : vizitkientrycat_id,
        'vizitkientrycat_title' : newCategoryTitle
      },
      'onComplete':function(responseObject)
      {
        if( $type(responseObject)!="object" || !responseObject.result || responseObject.result=="failure" )
        {
          alert('ERR');
        }
      }
    });
    
    request.send();
  }
  
  function deleteCategory(vizitkientrycat_id)
  {
    var categoryRow = $('vizitkiEntryCatRow_' + vizitkientrycat_id);
    
    categoryRow.destroy();
    
    // Ajax
    var request = new Request.JSON({
      'method' : 'post',
      'url' : 'admin_vizitki.php',
      'data' : {
        'task' : 'deletevizitkientrycat',
        'vizitkientrycat_id' : vizitkientrycat_id
      },
      'onComplete':function(responseObject)
      {
        if( $type(responseObject)!="object" || !responseObject.result || responseObject.result=="failure" )
        {
          alert('ERR');
        }
      }
    });
    
    request.send();
  }
  // -->
  </script>
  {/literal}


<table cellpadding='0' cellspacing='0' width='600'>
  <tr>
    <td class='header'>{lang_print id=1700085}</td>
  </tr>
    <td class='setting1'>
      {lang_print id=1700086}
    </td>
  </tr>
  <tr>
    <td class='setting2'>
      <table cellpadding='2' cellspacing='0'>
        <tr>
          <td><input type='radio' name='setting_permission_vizitki' id='permission_vizitki_1' value='1'{if  $setting.setting_permission_vizitki} checked{/if}></td>
          <td><label for='permission_vizitki_1'>{lang_print id=1700087}</label></td>
        </tr>
        <tr>
          <td><input type='radio' name='setting_permission_vizitki' id='permission_vizitki_0' value='0'{if !$setting.setting_permission_vizitki} checked{/if}></td>
          <td><label for='permission_vizitki_0'>{lang_print id=1700088}</label></td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<br />


<table cellpadding='0' cellspacing='0' width='600'>
  <tr>
    <td class='header'>{lang_print id=1700089}</td>
  </tr>
  <tr>
    <td class='setting1'>{lang_print id=1700090}</td>
  </tr>
  <tr>
    <td class='setting2'>
      <table cellpadding='2' cellspacing='0'>
        <tbody>

          <tr>
            <td><b>{$admin_vizitki15}</b></td>
          </tr>
            <label>Категории </label>
          {section name=vizitkientrycats_loop loop=$vizitkientrycats}
          <tr id="vizitkiEntryCatRow_{$vizitkientrycats[vizitkientrycats_loop].vizitkientrycat_id}">
            <td>
              <span class="oldCategoryContainer"><a href="javascript:void(0);" onclick="switchOldCategory({$vizitkientrycats[vizitkientrycats_loop].vizitkientrycat_id});">{$vizitkientrycats[vizitkientrycats_loop].vizitkientrycat_title}</a></span>
              <span class="oldCategoryInput" style="display:none;"><input type='text' class='text' size='30' maxlength='50' onblur="editOldCategory({$vizitkientrycats[vizitkientrycats_loop].vizitkientrycat_id});" value="{$vizitkientrycats[vizitkientrycats_loop].vizitkientrycat_title}" /></span>
              <span class="oldCategoryLangVar">&nbsp;(Language Variable #<a href="admin_language_edit.php?language_id=1&phrase_id={$vizitkientrycats[vizitkientrycats_loop].vizitkientrycat_languagevar_id}">{$vizitkientrycats[vizitkientrycats_loop].vizitkientrycat_languagevar_id}</a>)</span>
            </td>
          </tr>
          {/section}
          <tr id="newCategoryRow">
            <td style="padding-top: 5px;">
              <span id="newCategoryContainer" style="display:none;"><input type='text' id='newCategoryInput' class='text' size='30' maxlength='50' onblur="editNewCategory();" /></span>
              <span id="newCategoryLink"><a href="javascript:void(0);" onclick="createNewCategory();">{lang_print id=1700091}</a></span>
            </td>
          </tr>

<tr>
            <td><b>{$admin_vizitki15}</b></td>
          </tr>
          <td><label>Регионы трансляции (Страна) </label></td>
          {section name=nation loop=$country}
          <tr id="countryRow_{$country[nation].vizitkisetting_id}">
            <td>
              <span class="oldСountryContainer"><a href="javascript:void(0);" onclick="switchOldСountry({$country[nation].vizitkisetting_id});">{$country[nation].vizitkisetting_country}</a></span>
              <span class="oldСountryInput" style="display:none;">
                <input type='text' class='text' size='30' maxlength='50' onblur="editOldСountry({$country[nation].vizitkisetting_id});" value="{$country[nation].vizitkisetting_country}" /></span>
            </td>
          </tr>
          {/section}
          <tr id="newСountryRow">
            <td style="padding-top: 5px;">
              <span id="newСountryContainer" style="display:none;"><input type='text' id='newСountryInput' class='text' size='30' maxlength='50' onblur="editNewСountry();" /></span>
              <span id="newСountryLink"><a href="javascript:void(0);" onclick="createNewСountry();">{lang_print id=1700091}</a></span>
            </td>
          </tr>

            <tr>
            <td><b>{$admin_vizitki15}</b></td>
          </tr>
        <td><label>Регионы трансляции (Города) </label></td>
          {section name=nation loop=$city}
          <tr id="vizitkiEntryCatRow_{$vizitkientrycats[vizitkientrycats_loop].vizitkientrycat_id}">
            <td>
              <span class="oldCategoryContainer"><a href="javascript:void(0);" onclick="switchOldCategory({$vizitkientrycats[vizitkientrycats_loop].vizitkientrycat_id});">{$country[nation].vizitkisetting_country}</a></span>
              <span class="oldCategoryInput" style="display:none;"><input type='text' class='text' size='30' maxlength='50' onblur="editOldCategory({$vizitkientrycats[vizitkientrycats_loop].vizitkientrycat_id});" value="{$vizitkientrycats[vizitkientrycats_loop].vizitkientrycat_title}" /></span>
              <span class="oldCategoryLangVar">&nbsp;(Language Variable #<a href="admin_language_edit.php?language_id=1&phrase_id={$vizitkientrycats[vizitkientrycats_loop].vizitkientrycat_languagevar_id}">{$vizitkientrycats[vizitkientrycats_loop].vizitkientrycat_languagevar_id}</a>)</span>
            </td>
          </tr>
          {/section}
          <tr id="newCategoryRow">
            <td style="padding-top: 5px;">
              <span id="newCategoryContainer" style="display:none;"><input type='text' id='newCategoryInput' class='text' size='30' maxlength='50' onblur="editNewCategory();" /></span>
              <span id="newCategoryLink"><a href="javascript:void(0);" onclick="createNewCategory();">{lang_print id=1700091}</a></span>
            </td>
          </tr>

        </tbody>
      </table>
      <input type='hidden' name='num_vizitkicategories' value='{$num_cats}' />
    </td>
  </tr>
</table>
<br />

{lang_block id=173 var=langBlockTemp}<input type='submit' class='button' value='{$langBlockTemp}' />{/lang_block}
<input type='hidden' name='task' value='dosave' />
</form>


{include file='admin_footer.tpl'}