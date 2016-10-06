<rn:meta title="#rn:msg:ACCOUNT_SETTINGS_LBL#" template="oncor.php" login_required="true" />

<div id="rn_PageTitle" class="rn_Account">
    <h1>#rn:msg:ACCOUNT_SETTINGS_LBL#</h1>
</div>
<div id="rn_PageContent" class="rn_Profile">
    <div class="rn_Padding">
        <h2 class="rn_Required">#rn:url_param_value:msg#</h2>
        <form id="rn_CreateAccount" method="post" action="" onsubmit="return false;">
            <div id="rn_ErrorLocation"></div>
            <h2>#rn:msg:ACCT_HDG#</h2>
            <fieldset>
                <legend>#rn:msg:ACCT_HDG#</legend>
                <rn:widget path="input/FormInput" name="contacts.login" required="true" validate_on_blur="true" initial_focus="true"/>
                <a href="/app/account/change_password#rn:session#">#rn:msg:CHG_YOUR_PASSWORD_CMD#</a>
            </fieldset>
 				<div class="oncorTable">
					<h2>Contact Information</h2>
					<rn:widget path="input/FormInput" label_input="Email Address" name="Contact.Emails.PRIMARY.Address" required="true" initial_focus="true" />
					<rn:widget path="input/FormInput" name="Contact.Name.First" label_input="First Name" required="true" />
					<rn:widget path="input/FormInput" name="Contact.Name.Last" label_input="Last Name" required="true" />
                    <rn:widget path="input/FormInput" name="contacts.street" />
                    <rn:widget path="input/FormInput" name="contacts.city" />
                    <rn:widget path="input/FormInput" name="contacts.country_id" />
                    <rn:widget path="input/FormInput" name="contacts.prov_id" />
                    <rn:widget path="input/FormInput" name="contacts.postal_code" />
                <!-- <rn:widget path="input/FormInput" name="Contact.Phones.HOME.Number" label_input="Home Phone" /> -->
                    <rn:widget path="input/FormInput" name="Contact.Phones.OFFICE.Number" label_input="Office Phone" />
                    <rn:widget path="input/FormInput" name="Contact.Phones.MOBILE.Number" label_input="Mobile Phone"  />
					
				</div>
          <rn:widget path="input/FormSubmit" label_button="#rn:msg:SAVE_CHANGE_CMD#" on_success_url="/app/utils/submit/profile_updated" error_location="rn_ErrorLocation"/>
        </form>
    </div>
</div>
