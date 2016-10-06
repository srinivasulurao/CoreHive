RightNow.namespace('Custom.Widgets.chat.PostChatSurveyURL');
Custom.Widgets.chat.PostChatSurveyURL = RightNow.Widgets.extend({ 
    /**
     * Widget constructor.
     */
    constructor: function() {
          //alert("One");
          RightNow.Event.subscribe("evt_chatEngagementConcludedResponse", this._onChatEngagementConcludedResponse, this);

    },

    /**
     * Sample widget method.
     */
    methodName: function() {

    },


    /**
    * Event received when the engagement has been concluded. Adds note to transcript.
    * @param type string Event name
    * @param args object Event arguments
    */
    _onChatEngagementConcludedResponse: function(type, args)
    {
        //alert("Two");
        var survey_url = this.data.attrs.survey_url;

        //Open the survey URL in Popup
        if (this.data.attrs.survey_url) {
			window.open(RightNow.Url.addParameter(this.data.attrs.survey_url, "session", RightNow.Url.getSession()), "", "resizable,   scrollbars, width=710, height=730, top=0, left=0");
	} else {
        	this._showDialog();
	}
        
    },
});