<rn:meta title="#rn:msg:ASK_QUESTION_HDG#" template="standard.php" clickstream="incident_create"  login_required="false"/>

<div id="rn_PageTitle" class="rn_AskQuestion">
    <h1>#rn:msg:SUBMIT_QUESTION_OUR_SUPPORT_TEAM_CMD#</h1>
</div>
<div id="rn_PageContent" class="rn_AskQuestion">
    <div class="rn_Padding">
        <form id="rn_QuestionSubmit" method="post" action="" onsubmit="return false;">
            <div id="rn_ErrorLocation"></div>
            <rn:condition logged_in="false">
                <rn:widget path="input/FormInput" name="contacts.email" required="true" initial_focus="true"/>
                <? /* uncomment to show contact first and last name fields
                <rn:widget path="input/FormInput" name="contacts.first_name" required="true" />
                <rn:widget path="input/FormInput" name="contacts.last_name" required="true" />
                */ ?>
                <rn:widget path="input/FormInput" name="incidents.subject" required="true" />
            </rn:condition>
            <rn:condition logged_in="true">
                <rn:widget path="input/FormInput" name="incidents.subject" required="true" initial_focus="true"/>
            </rn:condition>
                <rn:widget path="input/FormInput" name="incidents.thread" required="true" label_input="#rn:msg:QUESTION_LBL#"/>
                <? /* add in required level from config*/ ?>
                <rn:widget path="input/ProductCategoryInput" table="incidents" required_lvl="#rn:php:getConfig(DE_REQD_PROD_LVL, 'RNW_UI')#" />
                <rn:widget path="input/ProductCategoryInput" table="incidents" required_lvl="#rn:php:getConfig(DE_REQD_CAT_LVL,  'RNW_UI')#" data_type="categories" label_input="#rn:msg:CATEGORY_LBL#" label_nothing_selected="#rn:msg:SELECT_A_CATEGORY_LBL#"/>
                <rn:widget path="input/CustomAllInput" table="incidents" always_show_mask="true"/>
                <? /* moving FileAttachmentUpload2 widget down here since this is how it is in classic*/ ?>
                <rn:widget path="input/FileAttachmentUpload2"/>
                <rn:widget path="input/FormSubmit" label_button="#rn:msg:CONTINUE_ELLIPSIS_CMD#" on_success_url="/app/ask_confirm" error_location="rn_ErrorLocation" />
        </form>
        <rn:condition answers_viewed="2" searches_done="1">
        <rn:condition_else/>
            <rn:widget path="input/SmartAssistantDialog"/>
        </rn:condition>
    </div>
</div>
