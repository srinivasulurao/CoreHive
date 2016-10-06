RightNow.namespace('Custom.Widgets.input.PremiseSubject');
Custom.Widgets.input.PremiseSubject = RightNow.Widgets.TextInput.extend({ 
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
            RightNow.Event.subscribe("ps_evt_formFieldValuePass", this._setValue, this);
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
     * Sample widget method.
     */
      _setValue: function(type, args)
    {
       // alert(JSON.stringify(args));
       if(args[0].data.widget == "PremiseNumber"){
        if(args[0].data.table == "incidents" && args[0].data.name == "Incident.CustomFields.c.premise")
        {
           this.input.set('value', this.data.attrs.default_value + args[0].data.value);
        }
       if(args[0].data.table == "incidents" && args[0].data.name == "Incident.CustomFields.c.mtr_nbr")
        {
           
           this.input.set('value', this.data.attrs.default_value + args[0].data.value);

        }
        if(args[0].data.table == "incidents" && args[0].data.name == "Incident.CustomFields.c.city")
        {
           
           this.input.set('value', this.data.attrs.default_value + args[0].data.value);

        }
      }
    }
});