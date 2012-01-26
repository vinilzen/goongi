{include file='admin_header.tpl'}

{* $Id: admin_vizitki.tpl 5 2009-01-11 06:01:16Z john $ *}

<h2>{lang_print id=1700003}</h2>
{lang_print id=1700084}
<br />
<br />

{if $result}<div class='success'><img src='../images/success.gif' class='icon' border='0'> {lang_print id=191}</div>{/if}

<form action='admin_vizitki.php' method='POST' name='info' >

  {* JAVASCRIPT FOR ADDING vizitki CATEGORIES *}
  {literal}
  <script type="text/javascript">
  <!--
  function createNewcountry()
  {
    // Display
    $('newcountryInput').value = '';
    $('newcountryContainer').style.display = '';
    $('newcountryLink').style.display = 'none';
  }

  function editNewcountry()
  {
    var newcountryTitle = $('newcountryInput').value;

    // Display
    $('newcountryInput').value = '';
    $('newcountryContainer').style.display = 'none';
    $('newcountryLink').style.display = '';

    // Ajax
    var request = new Request.JSON({
      'method' : 'post',
      'url' : 'admin_vizitki.php',
      'data' : {
        'task' : 'createcountry',
        'vizitkientrycat_title' : newcountryTitle
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

          var innerHTML = '';

          //innerHTML += '<td>';
          innerHTML += '<span class="oldcountryContainer">';
          innerHTML += '<a href="javascript:void(0);" onclick="switchOldcountry(' + vizitkientrycat_id + ');">';
          innerHTML += newcountryTitle;
          innerHTML += '</a>';
          innerHTML += '</span>';
          innerHTML += '<span class="oldcountryInput" style="display:none;">';
          innerHTML += "<input type='text' class='text' size='30' maxlength='50' onblur='editOldcountry(" + vizitkientrycat_id + ");' value='" + newcountryTitle + "' />";
          innerHTML += '</span>';
          innerHTML += '<span class="oldcountryLangVar">';
       //   innerHTML += '&nbsp;(Language Variable #<a href="admin_language_edit.php?language_id=1&phrase_id=' + vizitkientrycat_languagevar_id + '">';
         // innerHTML += vizitkientrycat_languagevar_id;
          innerHTML += '</a>';
          innerHTML += '</span>';
          //innerHTML += '</td>';

          //alert(innerHTML);

          var newcountryRow = new Element('tr', {'id' : 'vizitkiEntrycountryRow_' + vizitkientrycat_id});
          var newcountryData = new Element('td', {'html' : innerHTML});

          newcountryRow.inject($('newcountryRow'), 'before');
          newcountryData.inject(newcountryRow);
        }
      }
    });

    request.send();
  }

  function switchOldcountry(vizitkientrycat_id)
  {
    var countryRow = $('vizitkiEntrycountryRow_' + vizitkientrycat_id);
    countryRow.getElement('.oldcountryContainer').style.display = 'none';
    countryRow.getElement('.oldcountryInput').style.display = '';
    countryRow.getElement('input').focus();
  }

  function unswitchOldcountry(vizitkientrycat_id)
  {
    var countryRow = $('vizitkiEntrycountryRow_' + vizitkientrycat_id);
    countryRow.getElement('.oldcountryContainer').style.display = '';
    countryRow.getElement('.oldcountryInput').style.display = 'none';
  }

  function editOldcountry(vizitkientrycat_id)
  {
    var countryRow = $('vizitkiEntrycountryRow_' + vizitkientrycat_id);
    var newcountryTitle = countryRow.getElement('input').value;

    // DELETE
    if( newcountryTitle.trim()=='' )
    {
      deletecountry(vizitkientrycat_id);
      return;
    }

    countryRow.getElement('.oldcountryContainer').getElement('a').innerHTML = newcountryTitle;
    unswitchOldcountry(vizitkientrycat_id);

    // Ajax
    var request = new Request.JSON({
      'method' : 'post',
      'url' : 'admin_vizitki.php',
      'data' : {
        'task' : 'editcountry',
        'vizitkientrycat_id' : vizitkientrycat_id,
        'vizitkientrycat_title' : newcountryTitle
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

  function deletecountry(vizitkientrycat_id)
  {
    var countryRow = $('vizitkiEntrycountryRow_' + vizitkientrycat_id);

    countryRow.destroy();

    // Ajax
    var request = new Request.JSON({
      'method' : 'post',
      'url' : 'admin_vizitki.php',
      'data' : {
        'task' : 'deletcountry',
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

//==cyti==================================================
function createNewcity()
  {
    // Display
    $('newcityInput').value = '';
    $('newcitySelect').value = '';
    $('newcityContainer').style.display = '';
    $('newcityContainerSel').style.display = '';

    $('newcityLink').style.display = 'none';
  }

  function editNewcity()
  {
    var newcityTitle = $('newcityInput').value;
    var country = $('newcitySelect').value;

    // Display
    $('newcityInput').value = '';
    $('newcitySelect').value = '';
    $('newcityContainer').style.display = 'none';
    $('newcityContainerSel').style.display = 'none';
    $('newcityLink').style.display = '';

    // Ajax
    var request = new Request.JSON({
      'method' : 'post',
      'url' : 'admin_vizitki.php',
      'data' : {
        'task' : 'createcity',
        'vizitkientrycat_title' : newcityTitle,
        'countr' : country
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

          var newcityRow = new Element('tr', {'id' : 'vizitkiEntrycityRow_' + vizitkientrycat_id});
          var newcityData = new Element('td', {'html' : innerHTML});

          newcityRow.inject($('newcityRow'), 'before');
          newcityData.inject(newcityRow);
        }
      }
    });

    request.send();
  }

  function switchOldcity(vizitkientrycat_id)
  {
    var cityRow = $('vizitkiEntrycityRow_' + vizitkientrycat_id);
    cityRow.getElement('.oldcityContainer').style.display = 'none';
    cityRow.getElement('.oldcityInput').style.display = '';
    cityRow.getElement('.oldcitySelect').style.display = '';
    cityRow.getElement('input').focus();
  }

  function unswitchOldcity(vizitkientrycat_id)
  {
    var cityRow = $('vizitkiEntrycityRow_' + vizitkientrycat_id);
    cityRow.getElement('.oldcityContainer').style.display = '';
    cityRow.getElement('.oldcityInput').style.display = 'none';
    cityRow.getElement('.oldcitySelect').style.display = 'none';
  }

  function editOldcity(vizitkientrycat_id)
  {
    var cityRow = $('vizitkiEntrycityRow_' + vizitkientrycat_id);
    var newcityTitle = cityRow.getElement('input').value;
    var country = cityRow.getElement('select').value;

    // DELETE
    if( newcityTitle.trim()=='' )
    {
      deletecity(vizitkientrycat_id);
      return;
    }

    cityRow.getElement('.oldcityContainer').getElement('a').innerHTML = newcityTitle;
    unswitchOldcity(vizitkientrycat_id);

    // Ajax
    var request = new Request.JSON({
      'method' : 'post',
      'url' : 'admin_vizitki.php',
      'data' : {
        'task' : 'editcity',
        'vizitkientrycat_id' : vizitkientrycat_id,
        'vizitkientrycat_title' : newcityTitle,
        'countr' : country
      },
      'onComplete':function(responseObject)
      {
        if(responseObject.result=="failure" )
        {
          alert('ERR');
        }
      }
    });

    request.send();
  }

  function deletecity(vizitkientrycat_id)
  {
    var cityRow = $('vizitkiEntrycityRow_' + vizitkientrycat_id);

    cityRow.destroy();

    // Ajax
    var request = new Request.JSON({
      'method' : 'post',
      'url' : 'admin_vizitki.php',
      'data' : {
        'task' : 'deletcity',
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
    categoryRow.getElement('.oldcountryContainer').style.display = 'none';
    categoryRow.getElement('.oldcountryInput').style.display = '';
    categoryRow.getElement('input').focus();
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
          <tr id="vizitkiEntrycountryRow_{$country[nation].vizitkisetting_id}">
            <td>
              <span class="oldcountryContainer"><a href="javascript:void(0);" onclick="switchOldcountry({$country[nation].vizitkisetting_id});">{$country[nation].vizitkisetting_country}</a></span>
              <span class="oldcountryInput" style="display:none;"><input type='text' class='text' size='30' maxlength='50' onblur="editOldcountry({$country[nation].vizitkisetting_id});" value="{$country[nation].vizitkisetting_country}" /></span>

            </td>
          </tr>
          {/section}
          <tr id="newcountryRow">
            <td style="padding-top: 5px;">
              <span id="newcountryContainer" style="display:none;"><input type='text' id='newcountryInput' class='text' size='30' maxlength='50' onblur="editNewcountry();" /></span>
              <span id="newcountryLink"><a href="javascript:void(0);" onclick="createNewcountry();">Добавить страну</a></span>
            </td>
          </tr>

<tr>

            <tr>
            <td><b>{$admin_vizitki15}</b></td>
          </tr>
        <td><label>Регионы трансляции (Города) </label></td>
          {section name=nation loop=$city}
          <tr id="vizitkiEntrycityRow_{$city[nation].vizitkisetting_id}">
            <td>
             {section name=loop loop=$country}
                {if $city[nation].vizitki_country_id  == $country[loop].vizitkisetting_id}
                    {assign var=art value=$country[loop].vizitkisetting_country}
                {/if}
             {/section}
             <span class="oldcityContainer"><a href="javascript:void(0);" onclick="switchOldcity({$city[nation].vizitkisetting_id});">{$city[nation].vizitki_city} {$art}</a></span>
              <span class="oldcityInput" style="display:none;"><input type='text' class='text' size='30' maxlength='50' OnChange="editOldcity({$city[nation].vizitkisetting_id}); document.info.submit();" value="{$city[nation].vizitki_city}" /></span>
              <span class="oldcitySelect" style="display:none;">
                        <select name="contry" id = "oldcountry">
                         {section name=loop loop=$country}
                           <option value = "{$country[loop].vizitkisetting_id}" {if $city[nation].vizitki_country_id  == $country[loop].vizitkisetting_id} SELECTED{/if}>{$country[loop].vizitkisetting_country}</option>
                         {/section}
                        </select></span>
            </td>
          </tr>
          {/section}
          <tr id="newcityRow">
            <td style="padding-top: 5px;">
              <span id="newcityContainer" style="display:none;"><input type='text' id='newcityInput' class='text' size='30' maxlength='50' OnChange="editNewcity(); document.info.submit();" /></span>
              <span id="newcityContainerSel" style="display:none;">
                        <select name="contry" id='newcitySelect' >
                         {section name=loop loop=$country}
                           <option value = "{$country[loop].vizitkisetting_id}" {if $city[nation].vizitkisetting_id == $country[loop].vizitkisetting_id} SELECTED{/if}>{$country[loop].vizitkisetting_country}</option>
                         {/section}
                        </select></span>

              <span id="newcityLink"><a href="javascript:void(0);" onclick="createNewcity(); ">Добавить город</a></span>
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