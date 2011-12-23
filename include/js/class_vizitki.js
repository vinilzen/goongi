
/* $Id: class_vizitki.js 5 2009-01-11 06:01:16Z john $ */

SocialEngineAPI.vizitki = new Class({
  
  Base: {},
  
  
  options: {
    'ajaxURL' : 'vizitki_ajax.php'
  },
  
  
  currentConfirmDeleteID: 0,
  
  

  // Delete
  deletevizitki: function(vizitkiEntryID)
  {
    // Display
    currentConfirmDeleteID = vizitkiEntryID;
    TB_show(this.Base.Language.Translate(1500122), '#TB_inline?height=100&width=300&inlineId=confirmvizitkidelete', '', '../images/trans.gif');
  },
  
  deletevizitkiConfirm: function()
  {
    vizitkiEntryID = currentConfirmDeleteID;
    
    // Just refresh teh page instead
    //$('sevizitkiRow_'+vizitkiEntryID).destroy();
    
    // Ajax
    var bind = this;
    var request = new Request.JSON({
      'method' : 'post',
      'url' : this.options.ajaxURL,
      'data' : {
        'task' : 'deletevizitki',
        'vizitkientry_id' : vizitkiEntryID
      },
      'onComplete':function(responseObject)
      {
        if( $type(responseObject)!="object" || !responseObject.result || responseObject.result=="failure" )
        {
          alert(bind.Base.Language.Translate(1500123));
        }
        
        window.location.reload( false );
      }
    });
    
    request.send();
    
    // Reset
    currentConfirmDeleteID = 0;
  },
  
  
  
  
  
  // Preview
  previewvizitki: function()
  {
    var bind = this;
    var previewPane = $('entry_preview');
    var mainPane = $('entry_main');
    var previewElement = $('previewpane');
    var FCKInstance = FCKeditorAPI.GetInstance('vizitkientry_body');
    
    // Ajax
    var bind = this;
    var request = new Request({
      'method' : 'post',
      'url' : this.options.ajaxURL,
      'data' : {
        'task' : 'previewvizitki',
        'vizitkientry_title' : document.vizitkiform.vizitkientry_title.value,
        'vizitkientry_body' : FCKInstance.GetHTML(),
        'vizitkientry_vizitkientrycat_id' : ( document.vizitkiform.vizitkientry_vizitkientrycat_id ? document.vizitkiform.vizitkientry_vizitkientrycat_id.value : 0 )
      },
      'onComplete':function(responseText)
      {
        previewElement.empty();
        previewElement.innerHTML = responseText;
        
        var tmpHTML = previewElement.getElement('.sevizitkiEntry').innerHTML;
        previewElement.innerHTML = tmpHTML + '<br />';
        
        TB_show(bind.Base.Language.Translate(1500067), '#TB_inline?height=400&width=600&inlineId=entry_preview', '', '../images/trans.gif');
      }
    });
    
    request.send();
  },
  
  
  
  
  // Subscriptions
  subscribevizitki: function(vizitkiOwnerID)
  {
    // Ajax
    var bind = this;
    var request = new Request.JSON({
      'method' : 'post',
      'url' : this.options.ajaxURL,
      'data' : {
        'task' : 'subscribevizitki',
        'user_id' : vizitkiOwnerID
      },
      'onComplete':function(responseObject)
      {
        if( !responseObject || $type(responseObject)!="object" || responseObject.result=="failure" )
        {
          alert(bind.Base.Language.Translate(1500123));
        }
        else
        {
          // vizitki page
          if( $(document).getElement('.sevizitkiSubscribe') )
          {
            $(document).getElement('.sevizitkiSubscribe').style.display = 'none';
            $(document).getElement('.sevizitkiUnsubscribe').style.display = '';
          }
        }
      }
    });
    
    request.send();
  },
  
  unsubscribevizitki: function(vizitkiOwnerID)
  {
    // Ajax
    var bind = this;
    var request = new Request.JSON({
      'method' : 'post',
      'url' : this.options.ajaxURL,
      'data' : {
        'task' : 'unsubscribevizitki',
        'user_id' : vizitkiOwnerID
      },
      'onComplete':function(responseObject)
      {
        if( !responseObject || $type(responseObject)!="object" || responseObject.result=="failure" )
        {
          alert(bind.Base.Language.Translate(1500123));
        }
        else
        {
          // User page
          if( $('sevizitkiSubscriptionRow_'+vizitkiOwnerID) )
          {
            $('sevizitkiSubscriptionRow_'+vizitkiOwnerID).destroy();
          }
          
          // vizitki page
          if( $(document).getElement('.sevizitkiSubscribe') )
          {
            $(document).getElement('.sevizitkiSubscribe').style.display = '';
            $(document).getElement('.sevizitkiUnsubscribe').style.display = 'none';
          }
        }
      }
    });
    
    request.send();
  }

});