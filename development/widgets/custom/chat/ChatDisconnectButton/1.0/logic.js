RightNow.namespace('Custom.Widgets.chat.ChatDisconnectButton');
Custom.Widgets.chat.ChatDisconnectButton = RightNow.Widgets.ChatDisconnectButton.extend({ 
    /**
     * Place all properties that intend to
     * override those of the same name in
     * the parent inside `overrides`.
     */
    overrides: {
        /**
         * Overrides RightNow.Widgets.ChatDisconnectButton#constructor.
         */
        constructor: function() {
            // Call into parent's constructor
            this.parent();
        },

        /**
         * Overridable methods from ChatDisconnectButton:
         *
         * Call `this.parent()` inside of function bodies
         * (with expected parameters) to call the parent
         * method being overridden.
         */
        // _onButtonClick : function(type, args)
        // _onChatStateChangeResponse : function(type, args)
        _onButtonClick : function(type, args){
         this.parent();
         var newwindow = window.open('http://new.qualtrics.com/SE/?SID=SV_7P5hq5BucFfCa4A','Survey | Qualtrics Survey Software','status=1,toolbar=0,menubar=0,location=0,resizable=1,scrollbars=1,height=1040px,width=1025px');
         }
    },

    /**
     * Sample widget method.
     */
    methodName: function() {

    }
});