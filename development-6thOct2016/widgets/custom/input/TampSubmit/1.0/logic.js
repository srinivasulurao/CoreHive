RightNow.namespace('Custom.Widgets.input.TampSubmit');
Custom.Widgets.input.TampSubmit = RightNow.Widgets.FormSubmit.extend({ 
    /**
     * Place all properties that intend to
     * override those of the same name in
     * the parent inside `overrides`.
     */
    overrides: {
        /**
         * Overrides RightNow.Widgets.FormSubmit#constructor.
         */
        constructor: function() {
            // Call into parent's constructor
            this.parent();
        },

        /**
         * Overridable methods from FormSubmit:
         *
         * Call `this.parent()` inside of function bodies
         * (with expected parameters) to call the parent
         * method being overridden.
         */
         _onButtonClick: function(evt){

      
        if (evt && evt.halt) {
            evt.halt();
        }
        if (this._requestInProgress) return false;

        this._toggleClickListener(false);

        //Reset form errors
        this._errorMessageDiv.addClass("rn_Hidden").set("innerHTML", "");

        //since the form is submitted by script, deliberately tell IE to do auto completion of the form data
        if (this.Y.UA.ie && window.external && "AutoCompleteSaveForm" in window.external) {
            window.external.AutoCompleteSaveForm(document.getElementById(this._parentForm));
        }

  // new logic to ensure checkbox requirement is met
        var checkFailed = false;
        var fieldsets = document.getElementsByTagName("fieldset");
        for(var f = 0; f < fieldsets.length; f++)
        {
         //   var fieldsetID = YAHOO.util.Dom.generateId(document.getElementsByTagName("fieldset")[f], 'fieldset');
             //var fieldsetID = this.Y.guid(document.getElementsByTagName("fieldset")[f], 'fieldset');

            var fieldsetID = 'fieldset'+f;
            var fieldset = document.getElementById(fieldsetID);
            var heading = fieldset.getElementsByTagName("h2")[0];
            var inputs  = fieldset.getElementsByTagName("input");
            var checkedBoxes = 0;
            for (var i = 0; i < inputs.length; i++)
            {
                if (inputs[i].type == "checkbox" && inputs[i].checked) {
                    checkedBoxes++;
                }
            }
            if (checkedBoxes < this.data.attrs.min_checked_boxes)
            {
                checkFailed = true;
                RightNow.UI.Dialog.messageDialog("At least " + this.data.attrs.min_checked_boxes + " checkbox(es) must be checked in the " + heading.innerHTML.replace(" (check all that apply)", "") + " section", { icon : "WARN", title : heading.innerHTML.replace(" (check all that apply)", "") });               
                this.Y.one(fieldset).addClass('rn_ErrorField');            
                this.Y.one(heading).addClass('rn_ErrorLabel');
            }
            else
            {              
                this.Y.one(fieldset).removeClass('rn_ErrorField');            
                this.Y.one(heading).removeClass('rn_ErrorLabel');
            }
        }
        if(checkFailed) {
         this._toggleClickListener(true);
         return false;        // end new checkbox logic
        }else{
        this._fireSubmitRequest();
        }
    
 
},
        // _fireSubmitRequest: function()
        // _onFormValidated: function()
        // _onFormValidationFail: function()
        // _formSubmitResponse: function(type, args)
        // _onFormUpdated: function()
        // _onErrorResponse: function()
        // _displayErrorDialog: function(message)
        // _onFormTokenUpdate: function(type, args)
        // _enableFormExpirationWatch: function()
        // _toggleLoadingIndicators: function(turnOn)
        // _toggleClickListener: function(enable)

  _formSubmitResponse: function(type, args) {

        var responseObject = args[0].data,
            result;

        if (!responseObject) {
            // Didn't get any kind of a response object back; that's... unexpected.
            this._displayErrorDialog(RightNow.Interface.getMessage('ERROR_REQUEST_ACTION_COMPLETED_MSG'));
        }
        else if (responseObject.errors) {
            // Error message(s) on the response object.
            var errorMessage = "";
            this.Y.Array.each(responseObject.errors, function(error) {
                errorMessage += "<div><b>" + error + "</b></div>";
            });
            this._errorMessageDiv.append(errorMessage);
            this._onFormValidationFail();
        }
        else if (responseObject.result) {
            result = responseObject.result;

            if (result.sa) {
                // trap SmartAssistantâ„¢ case here
                if(result.newFormToken) {
                    // Check if a new form token was passed back and use it the next time the the form is submitted
                    this.data.js.f_tok = result.newFormToken;
                    RightNow.Event.fire("evt_formTokenUpdate", new RightNow.Event.EventObject(this, {data: {newToken: result.newFormToken}}));
                }
                //SmartAssistantDialog handles SmartAssistant response
                //but we still need to check if the incident shouldn't be created according to a rule (meaning the submit button should be removed)
                for(var i in result.sa)
                {
                    if(typeof result.sa[i].add_flag !== "undefined" && result.sa[i].add_flag == false)
                    {
                        this._disableClickListener();
                        document.getElementById("rn_" + this.instanceID).innerHTML = "";
                        return;
                    }
                }
            }
            else if (result.transaction || result.redirectOverride) {
                // success
                this._formSubmitFlag.set("checked", true);

                var navigateToUrl = function() {
                    var url;

                    if (result.redirectOverride) {
                        url = result.redirectOverride + result.sessionParam;
                    }
                    else if (this.data.attrs.on_success_url) {
                        var paramsToAdd = '';
                        this.Y.Object.each(result.transaction, function(details) {
                            if (details.key) {
                                paramsToAdd += '/' + details.key + '/' + details.value;
                            }
                        });

                        if (paramsToAdd) {
                            url = this.data.attrs.on_success_url + paramsToAdd + result.sessionParam;
                        }
                        else {
                            var sessionValue = result.sessionParam.substr(result.sessionParam.lastIndexOf("/") + 1);
                            if(!sessionValue && this.data.js.redirectSession)
                                sessionValue = this.data.js.redirectSession;
                            url = RightNow.Url.addParameter(this.data.attrs.on_success_url, 'session', sessionValue);
                        }
                    }
                    else {
                        url = window.location + result.sessionParam;
                    }
                    RightNow.Url.navigate(url + this.data.attrs.add_params_to_url);
                };

                if(this.data.attrs.label_confirm_dialog !== '') {
                    // either create confirmation dialog
                    RightNow.UI.Dialog.messageDialog(this.data.attrs.label_confirm_dialog, {exitCallback: {fn: navigateToUrl, scope: this}, width: '250px'});
                }
                else {
                    // or go directly to the next page
                    navigateToUrl.call(this);
                }
                return;
            }
            else {
                // Response object with a result, but not the result we expect.
                this._displayErrorDialog();
            }
        }
        else {
            // Response object didn't have a result or errors on it.
            this._displayErrorDialog();
        }

        this._toggleLoadingIndicators(false);
        this._toggleClickListener(true);

        args[0].data || (args[0].data = {});
        args[0].data.form = this._parentForm;
        RightNow.Event.fire('evt_formButtonSubmitResponse', args[0]);
    }
    },

    /**
     * Sample widget method.
     */
    methodName: function() {

    }
});