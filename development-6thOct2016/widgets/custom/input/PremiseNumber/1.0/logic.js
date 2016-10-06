RightNow.namespace('Custom.Widgets.input.PremiseNumber');
Custom.Widgets.input.PremiseNumber = RightNow.Widgets.TextInput.extend({ 
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
            this.input.on("blur", this._passValue, this);
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
        //var eo = new RightNow.Event.EventObject();
       /* eo.data = {"name" :this._fieldName,// this.data.js.name,
                   "value" : this.input.get('value'),
                   "table" : this.data.js.table,
                   "required" : (this.data.attrs.required ? true : false),
                   "prev" : this.data.js.previousValue,
                   "form" : this.parentForm()
                    };*/
       var val = this.input.get('value');
       var eventObject = new RightNow.Event.EventObject(this, {data: {value: val ,name:this._fieldName,table:"incidents",widget: "PremiseNumber"}});
       RightNow.Event.fire("ps_evt_formFieldValuePass", eventObject );
    }
});