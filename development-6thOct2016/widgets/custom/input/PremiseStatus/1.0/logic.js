RightNow.namespace('Custom.Widgets.input.PremiseStatus');
Custom.Widgets.input.PremiseStatus = RightNow.Widgets.SelectionInput.extend({ 
    /**
     * Place all properties that intend to
     * override those of the same name in
     * the parent inside `overrides`.
     */
    overrides: {
        /**
         * Overrides RightNow.Widgets.SelectionInput#constructor.
         */
        constructor: function() {
            // Call into parent's constructor
            this.parent();
         this.input.on("change", this._valueChanged, this);
        }

        /**
         * Overridable methods from SelectionInput:
         *
         * Call `this.parent()` inside of function bodies
         * (with expected parameters) to call the parent
         * method being overridden.
         */
        // swapLabel: function(container, requiredness, label, template)
        // constraintChange: function(evt, constraint)
        // onValidate: function(type, args)
        // displayError: function(errors, errorLocation)
        // toggleErrorIndicator: function(showOrHide)
        // blurValidate: function()
        // countryChanged: function()
        // successHandler: function(response)
        // onProvinceResponse: function(type, args)
    },

     _valueChanged: function(type, args)
    {
        var value = this.input.get("value");
        if(value  !== this.data.attrs.default_value && value  !== "")
            RightNow.UI.Dialog.messageDialog("No incident is required for inactive premises. DO NOT CONTINUE.", { icon : "BLOCK", title : "Inactive Premise" });
    }
});