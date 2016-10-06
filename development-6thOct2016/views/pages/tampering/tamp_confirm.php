<rn:meta title="Tampering Incident" template="oncor_tampandcutseal.php" clickstream="incident_confirm"/>

<div id="rn_PageTitle" class="rn_AskQuestion">
    <h1>Tampering Incident Submitted</h1>
</div>

<div id="rn_PageContent" class="rn_AskQuestion">
    <div class="rn_Padding">
        <p>
            Tampering Incident Reference<b>#<rn:field name="incidents.ref_no" />#rn:url_param_value:refno#</b>
        </p>
        <p>
            #rn:msg:SUPPORT_TEAM_SOON_MSG#
        </p>
        <rn:condition logged_in="true">
        <p>
            #rn:msg:UPD_QUEST_CLICK_ACCT_TAB_SEL_QUEST_MSG#
        </p>
        <rn:condition_else/>
        <p>
            #rn:msg:UPD_QUEST_ACCT_LG_CLICK_ACCT_TAB_MSG#
        </p>
        <p>
            #rn:msg:DONT_ACCT_ACCOUNT_ASST_ENTER_EMAIL_MSG#
            <a href="/app/utils/account_assistance#rn:session#">#rn:msg:ACCOUNT_ASSISTANCE_LBL#</a>
        </p>
        </rn:condition>
    </div>
</div>

