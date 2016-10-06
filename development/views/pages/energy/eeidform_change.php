<rn:meta title="Submit Energy Efficiency" template="oncor_notab.php" clickstream="incident_create"  login_required="false" />
<style type="text/css">
#rn_PageTitle h1 {
	text-align: center;
}
</style>


<div id="rn_PageTitle" class="rn_AskQuestion" initial_focus="true">
    <img src="images/logo_oncor.gif" /><h1>Instructions for Energy Efficiency Identification Notice Form for Distribution Voltage Industrial Customers Pursuant to P.U.C. Subst. R. 25.181(w)</h1>
    <p>Note:	     This form applies only to a for-profit entity engaged in an industrial process taking electric service at distribution voltage that has received a tax exemption under Tax Code §151.317.  Do not use this form if you intend to allow the facilities identified in this notice to participate in any utility-sponsored energy efficiency programs provided by Oncor Electric Delivery Company LLC (“Oncor”) for the three years following the effective date (see Instruction C).
  <p>
  <strong><font color="#FF0000">Please complete all required fields in the Energy Efficiency Identification Notice Form for Distribution Voltage Industrial Customers below and "Submit."  Prior to submission, a copy of the customer’s Texas Sales and Use Tax Exemption Certification (pursuant to Tax Code §151.317) for each meter point must be attached.  A separate form is required for each meter point (ESI ID).</font></strong>
  <p>
	    A.	The Identification Notice is limited solely to the metered point of delivery of the industrial process taking place at the consuming facilities.  A metered point of delivery is identified by an ESI ID.

	<p><p>
	B.	Eligible meter points are those metered points of delivery for a for-profit entity that is engaged in an industrial process taking electric service at distribution voltage that qualifies for a tax exemption under Tax Code §151.317.
  <p>
	C.	Identification Notices shall be submitted not later than February 1 to be effective for the following program year.  For example, the Energy Efficiency Identification Notice Form must be submitted by February 1, 2015, for the qualifying meter point to be effective for January, 2016 (i.e., the effective date).
	<p>
	D.	Identification Notices are effective for a three-year period and must be renewed every three years.
	<p>
	E.	Identification Notices will be treated as confidential material by Oncor.
	<p>
    <p>
    <br />
    <br />
	Notification of approval status will be provided by email.  For questions or additional information, please call: 1-866-728-3674.
	</p>
</div>
<div id="rn_PageContent" class="rn_AskQuestion">
    <div class="rn_Padding">
        <form id="rn_QuestionSubmit" method="post" action="" onsubmit="return false;">
            <div id="rn_ErrorLocation"></div>
             <div class="rn_Hidden">
	      <rn:widget path="input/PremiseSubject" name="Incident.Subject" required="true" default_value="Energy Efficiency - " />
	      <rn:widget path="input/FormInput" name="Incident.Threads" default_value="Energy Efficiency Form Submitted" />
	    </div>

            <rn:condition logged_in="false">
	            <div class="oncorTable">
	            	<h1>CONFIDENTIAL MATERIAL</h1>
					<h1>Energy Efficiency Identification Notice Form for Distribution Voltage Industrial Customers</h1>
                  	<p>
                    <font color="#FF0000">*</font> Required
                    <p>
	                <h2>Facility Information</h2>
	                <rn:widget path="input/FormInput" name="incidents.c$org_name" required="true" />
					<rn:widget path="input/FormInput" name="incidents.c$fac_name" required="true" label_input="Facility Name or Description" />
	                <div class="oncorColumn1">
	                    <rn:widget path="input/FormInput" name="incidents.c$fac_street1" required="true" label_input="Facility Service Address (Line 1)" />
						<rn:widget path="input/FormInput" name="incidents.c$fac_street2" required="false" label_input="Facility Service Address (Line 2)" />
						<rn:widget path="input/ESIInput" name="incidents.c$esi_id" required="true" label_input="Meter Point ESIID" string_length="17" string_start="1044372000,1017699000" always_show_mask="false" hide_hint="true" always_show_mask="false"/>
	                </div>
	                <div class="oncorColumn2">
	                    <rn:widget path="input/FormInput" name="incidents.c$fac_city" required="true" label_input="Facility Service Address City" />
	                    <rn:widget path="input/FormInput" name="incidents.c$fac_postal_code" required="true" label_input="Facility Service Address Zip Code" />
	                </div>
					<rn:widget path="input/FormInput" name="incidents.c$fac_process" required="true" label_input="Description of the Industrial Process at the Site" />
	                <div class="oncorColumnClear"></div>
	            </div>
            </rn:condition>

            <div class="oncorTable2">
                <h2>Primary Contact Information</h2>
				<rn:widget path="input/FormInput" name="contacts.first_name" label_input="First Name" required="true" />
				<rn:widget path="input/FormInput" name="contacts.last_name" label_input="Last Name" required="true" />
				<rn:widget path="input/FormInput" name="contacts.ph_office" label_input="Work Phone" required="true" />
                 <rn:widget path="input/FormInput" name="contacts.email" required="true" validate_on_blur="true" label_input="#rn:msg:EMAIL_ADDR_LBL#" require_validation="true" label_validation="Confirm #rn:msg:EMAIL_ADDR_LBL#" />
				<div class="oncorColumnClear"></div>
            </div>

            <div class="oncorTable2">
                <h2>Submitter Contact Information</h2>
				<div class="oncorColumn1">
                    <rn:widget path="input/FormInput" name="incidents.c$chat_fname" label_input="First Name" required="true" />
					<rn:widget path="input/FormInput" name="incidents.c$chat_lname" label_input="Last Name" required="true" />
					<rn:widget path="input/FormInput" name="incidents.c$customer_email" required="true" validate_on_blur="true" label_input="#rn:msg:EMAIL_ADDR_LBL#" require_validation="true" label_validation="Confirm #rn:msg:EMAIL_ADDR_LBL#" hide_hint="true" />
                    </div>

                	<div class="oncorColumn2">
                    <rn:widget path="input/FormInput" name="incidents.c$title" label_input="Title" required="true" />
					<rn:widget path="input/FormInput" name="incidents.c$contact_phone" label_input="Phone" required="true" always_show_mask="false"/>
					
                </div>
            </div>

            <div id="affirm" class="oncorTable">
                <fieldset>
                	<rn:widget path="input/CustomSelectionInput" display_as_checkbox="true" name="incidents.c$certify" required="true" label_input="By checking here, I certify that I am an authorized representative of the Company above and that the information presented in this Energy Efficiency Identification Notice Form is correct and the ESI ID submitted meets the qualifications of a for-profit entity engaged in an industrial process taking electric service at distribution voltage that has received a tax exemption under Tax Code §151.317.  I understand that the facility identified in this notice will be unable to participate in any energy efficiency programs provided by Oncor Electric Delivery Company LLC for the three years following the effective date of this Energy Efficiency Identification Notice Form as provided in Instruction(C)." label_error="Authorized representative" />
                </fieldset>
            </div>
            <div class="oncorTable">
                <div class="oncorColumn1">
                    <p><strong>Please attach Texas Sales and Use Tax Exemption Certification pursuant to Tax Code §151.317 to this form.<font color="#FF0000"> *</font></strong></p>
                    
                    <rn:widget path="input/FileAttachmentUpload" min_required_attachments="1" max_attachments="1" label_input="Attach Document" fattach_max_size="2097152" label_min_required="You have not reached the minimum number of files that must be uploaded." />
                </div>
            </div>
            <div style="clear:both">
				<rn:widget path="input/FormSubmit" label_button="Submit" on_success_url="/app/energy/eeidform_confirm" error_location="rn_ErrorLocation" />
            </div>
        </form>
    </div>
</div>
