RightNow.namespace('Custom.Widgets.input.CustomSelectionInput');
Custom.Widgets.input.CustomSelectionInput = RightNow.Widgets.SelectionInput.extend({ 
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
        },

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

        displayError: function(errors, errorLocation) {
        var commonErrorDiv = this.Y.one("#" + errorLocation);
        if(commonErrorDiv) {
            for(var id = ((this.input instanceof this.Y.NodeList) ? this.input.item(0).get("id") : this.input.get("id")),
                    i = 0, message; i < errors.length; i++) {
                message = errors[i];
                var inputLabel = this.data.attrs.label_error || this.data.attrs.label_input;
                message = (message.indexOf("%s") > -1) ? RightNow.Text.sprintf(message, inputLabel ) : inputLabel  + " " + message;
                commonErrorDiv.append("<div data-field=\"" + this._fieldName + "\"><b><a href='javascript:void(0);' onclick='document.getElementById(\"" + id +
                                "\").focus(); return false;'>" + message + "</a></b></div>");
            }
        }
        this.toggleErrorIndicator(true);
    }
    },

    /**
     * Sample widget method.
     */
    methodName: function() {

    }
});