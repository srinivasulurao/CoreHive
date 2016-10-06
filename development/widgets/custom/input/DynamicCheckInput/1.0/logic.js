RightNow.namespace('Custom.Widgets.input.DynamicCheckInput');
Custom.Widgets.input.DynamicCheckInput = RightNow.Widgets.SelectionInput.extend({ 
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
             this._inputField = document.getElementById("rn_" + this.instanceID + "_" + this.data.js.name);
            //this.Y.Event.attach("click",this.input,this._toggleDynamicFields, null, this);
            this.input.on("change", this._toggleDynamicFields, this);

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

    /**
     * Toggles dynamic fields
     */
    _toggleDynamicFields: function(type, args)
    {
       if(this.data.attrs.toggle_target){
        if( this._inputField.checked)
            this.Y.one(this.data.attrs.toggle_target).removeClass("rn_Hidden");
        else
            this.Y.one(this.data.attrs.toggle_target).addClass("rn_Hidden");
       }
    },
});