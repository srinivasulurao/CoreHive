RightNow.namespace('Custom.Widgets.knowledgebase.security');
Custom.Widgets.knowledgebase.security = RightNow.Widgets.extend({ 
    /**
     * Widget constructor.
     */
    constructor: function() {
    var banner_enabled=document.getElementById('banner_enabled').value;
    var security_enabled=document.getElementById('security_enabled').value;
    
       if(parseInt(banner_enabled)){
         var banner_message=document.getElementById('banner_message').value;
         document.getElementById('rn_MainContent').innerHTML=banner_message;
         document.getElementById('rn_MainContent').className="rn_MainContent";
       }

       if(parseInt(security_enabled)){
         document.onselectstart=new Function ("return false")
         if (window.sidebar){
         document.onmousedown=disableselect;
         document.onclick=reEnable;
         }
       }
    },

    /**
     * Sample widget method.
     */
    methodName: function() {

    }
});

function disableselect(e){
return false;
}

function reEnable(){
return true;
}
