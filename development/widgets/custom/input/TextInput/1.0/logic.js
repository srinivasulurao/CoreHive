RightNow.namespace('Custom.Widgets.input.TextInput');
Custom.Widgets.input.TextInput = RightNow.Widgets.TextInput.extend({ 
    /**
     * Place all properties that intend to
     * override those of the same name in
     * the parent inside `overrides`.
     */
    overrides: {
        /**
         * Overrides RightNow.Widgets.TextInput#constructor.
         */
        constructor: function() {
            // Call into parent's constructor
            this.parent();
      
          if(this.data.attrs.disabled_bool)
          this.Y.one(this._inputSelector).set('disabled', true);

          if(this._fieldName === "Incident.CustomFields.c.chat_fname" || this._fieldName === "Incident.CustomFields.c.chat_lname" || this._fieldName === "Incident.CustomFields.c.chat_email" || this._fieldName === "Incident.CustomFields.c.phone_number") {
          RightNow.Event.subscribe("evt_onDataSubmit",this._setCookie, this);
           RightNow.Event.subscribe("evt_formFieldValidatePass",this._fireDataSubmit, this);
          }
          //  YAHOO.util.Event.addListener(this._inputField, "blur", this._passValue, null, this);
 
            this.Y.Event.attach("blur",this._passValue,this.input,this);

        }

        /**
         * Overridable methods from TextInput:
         *
         * Call `this.parent()` inside of function bodies
         * (with expected parameters) to call the parent
         * method being overridden.
         */
        // swapLabel: function(container, requiredness, label, template)
        // constraintChange: function(evt, constraint)
        // getVerificationValue: function()
        // onValidate: function(type, args)
        // _displayError: function(errors, errorLocation)
        // toggleErrorIndicator: function(showOrHide, fieldToHighlight, labelToHighlight)
        // _toggleFormSubmittingFlag: function(event)
        // _blurValidate: function(event, validateVerifyField)
        // _validateVerifyField: function(errors)
        // _checkExistingAccount: function()
        // _massageValueForModificationCheck: function(value)
        // _onAccountExistsResponse: function(response, originalEventObject)
        // onProvinceChange: function(type, args)
        // _initializeMask: function()
        // _createMaskArray: function(mask)
        // _getSimpleMaskString: function()
        // _compareInputToMask: function(submitting)
        // _showMaskMessage: function(error)
        // _setMaskMessage: function(message)
        // _showMask: function()
        // _hideMaskMessage: function()
        // _onValidateFailure: function()
    },

  /**
     * Passes the value of this input field for other widgets to interact with
     */
    _passValue: function()
    {
       

      var val = this.input.get('value');
       var eventObject = new RightNow.Event.EventObject(this, {data: {value: val ,name:this._fieldName,table:"incidents",required:(this.data.attrs.required ? true : false),prev:this.data.js.previousValue,form:this.parentForm()}});
    
    
        RightNow.Event.fire("ps_evt_formFieldValuePass", eventObject );
    },

 
    /*Function to set cookie*/
    _setCookie: function(type, args){
          //  alert("onDataSubmit fired");
            var tvar =  this.input.get('value');
            var exdays = 1;
            var exdate=new Date();
            exdate.setDate(exdate.getDate() + exdays);
            var c_value=escape(tvar) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString())+ ";path=/";
            var cookie_name= this._fieldName.replace(/\./g, '_');
           
            document.cookie = cookie_name + "=" + c_value;
    },
 /*Function to fire data submit*/
     _fireDataSubmit: function(type, args){
                 RightNow.Event.fire("evt_onDataSubmit");
      }
});