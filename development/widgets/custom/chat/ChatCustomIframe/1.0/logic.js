RightNow.namespace('Custom.Widgets.chat.ChatCustomIframe');
Custom.Widgets.chat.ChatCustomIframe = RightNow.Widgets.extend({ 
    /**
     * Widget constructor.
     */
    constructor: function() {
     //   this.data = data;
    //this.instanceID = instanceID;
    this._formButton = document.getElementById("rn_" + this.instanceID + "_anchor");
    this.chatWindowName = 'Chat_launch';

    //this._isProactiveChat = RightNow.Url.getParameter('pac') !== null;
  //  YAHOO.util.Event.addListener(this._formButton, "click", this._onButtonClick, null, this);

      this.Y.Event.attach("click",this._onButtonClick,this._formButton,this);
	
//Y.on("click", helloWorld, "#demo");
    },

    _onButtonClick: function(type, args)
	{
		var leftPos = (screen.width / 2) - 265;
		//var topPos = (screen.height / 2) - 390;
		this._disableClickListener();
		window.open(this.data.js.furl, this.chatWindowName, 'status=0,toolbar=0,menubar=0,location=0,resizable=1,width=530,height=780,left=' + leftPos);
		//window.open(this.data.js.furl ,"Search", "width=1000,height=600,left=150,top=200,toolbar=no,status=no,resizable=yes,scrollbars=yes");
	},

	_disableClickListener: function()
	{
		this._formButton.disabled = true;
		//YAHOO.util.Event.removeListener(this._formButton, "click", this._onButtonClick);
                 this.Y.Event.detach("click",this._onButtonClick,this._formButton,this);
	}
});