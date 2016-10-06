RightNow.namespace('Custom.Widgets.input.ESIInput');
Custom.Widgets.input.ESIInput = RightNow.Widgets.TextInput.extend({
	/**
	 * Place all properties that intend to
	 * override those of the same name in
	 * the parent inside `overrides`.
	 */
	overrides : {
		/**
		 * Overrides RightNow.Widgets.TextInput#constructor.
		 */
		constructor : function() {
			// Call into parent's constructor
			this.parent();
		},

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

		onValidate : function(type, args) {
			var eventObject = this.createEventObject(),
			    errors = [];

			this.toggleErrorIndicator(false);
			this.lastErrorLocation = args[0].data.error_location;
			if (this._checkStringStart(this.lastErrorLocation) && this._checkAllDigits(this.lastErrorLocation) && this._checkLength(this.lastErrorLocation)) {
			//let the form submit
			} else {
				RightNow.UI.Form.formError = true;
				RightNow.Event.fire("evt_formFieldValidateFailure", eventObject);
				return false;
			}
			if (!this.validate(errors) || (this.data.attrs.require_validation && !this._validateVerifyField(errors)) || !this._compareInputToMask(true)) {

				this._displayError(errors, this.lastErrorLocation);
				// this._displayError(errors);
				RightNow.Event.fire("evt_formFieldValidateFailure", eventObject);
				return false;
			}

			RightNow.Event.fire("evt_formFieldValidatePass", eventObject);
			return eventObject;
		}
	},

	/**
	 * Checks that the value entered doesn't exceed its expected bounds
	 */
	_checkStringStart : function(errorLoc) {
		var val = this.input.get('value');
		err = [];
		if ( typeof (this.data.attrs.string_start) != "undefined" && this.data.attrs.string_start !== "") {
			var checks = this.data.attrs.string_start.split(",");
			for (i in checks) {
				if (this.input.get('value').indexOf(checks[i]) == 0) {
					return true;
				}
			}
			//if(window.console)console.log("Did not match string checks.");
			err.push("- This is a non-Oncor ESIID.  Please try again.");
			this._displayError(err, errorLoc);
		}

		return false;
	},
	/**
	 * Checks that the value entered doesn't exceed its expected bounds
	 */
	_checkAllDigits : function(errorLoc) {
		var val = this.input.get('value');
		err = [];
		if (this.input.get('value').match(/\D/)) {
			//if(window.console)console.log("String has extra characters.");

			err.push("must only contain numbers.");
			this._displayError(err, errorLoc);
			return false;
		}

		return true;
	},

	/**
	 * Checks that the value entered doesn't exceed its expected bounds
	 */
	_checkLength : function(errorLoc) {
		var val = this.input.get('value');
		err = [];

		if (this.input.get('value').length != this.data.attrs.string_length) {
			//if(window.console)console.log("Not "+this.data.attrs.string_length+" characters.");

			err.push("must be exactly " + this.data.attrs.string_length + " characters.");
			this._displayError(err, errorLoc);
			return false;
		}

		return true;
	}
}); 