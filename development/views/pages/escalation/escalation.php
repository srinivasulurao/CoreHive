<rn:meta title="Oncor Escalation Form" template="oncor_notab_escalation.php" clickstream="incident_create"  login_required="false" />
<!--This form created by Mark Hensley 04/21/2016 by cloning tracking.php, then making the apporpriate modifications | NOTE: template= "oncor_notab_insp.php" <- this needs to be changed-->
<div id="rn_PageTitle" class="rn_AskQuestion">
    <img src="images/logo_oncor.gif" /><h1>Oncor Contact Center Escalation</h1>
</div>
<div id="rn_PageContent" class="rn_AskQuestion">
    <div class="rn_Padding">
        <form id="rn_QuestionSubmit" method="post" action="" onsubmit="return false;">
            <div id="rn_ErrorLocation"></div>
           <div class="rn_Hidden">  
              <rn:widget path="input/FormInput" name="Incident.Threads" default_value="Contact Center Escalation Incident Submitted" />
	      </div>
            <rn:condition logged_in="false">          
              <div class="oncorTable">
                <h2>Oncor Contact Center Submitter Info</h2>            
                      <rn:widget path="input/FormInput" name="contacts.email" label_input="Your Email Address" required="true" initial_focus="true" />
                    <div class="oncorColumn1">                
                        <rn:widget path="input/FormInput" name="contacts.first_name" required="true" label_input="Your First Name" />
                    </div>
                    
                    <div class="oncorColumn2">                
                        <rn:widget path="input/FormInput" name="contacts.last_name" required="true" label_input="Your Last Name"/>              
                    </div>

                    <div class="oncorColumnClear"></div>

              </div>
            </rn:condition>
           
            <div class="oncorTable">
				<h2>Escalation Information</h2>
					<rn:widget path="input/FormInput" name="Incident.CustomFields.c.cust_f_nme" label_input="Customer/Caller's First Name" required="true" />
					<rn:widget path="input/FormInput" name="Incident.CustomFields.c.cust_l_nme" label_input="Customer/Caller's Last Name" required="true" />
					<rn:widget path="input/FormInput" name="Incident.CustomFields.c.contact_phone" label_input="Customer/Caller's Phone Number {enter as: (###) ###-####}" numeric_only="true" always_show_mask="false" required="true" />
					<rn:widget path="input/PremiseNumber" name="Incident.CustomFields.c.premise" label_input="Premise {if no Premise Number is available, use: 0000000}" numeric_only="true" always_show_mask="false" required="false" />
					<rn:widget path="input/FormInput" name="Incident.CustomFields.c.street_addr" required="true" />
					<rn:widget path="input/FormInput" name="Incident.CustomFields.c.city" required="true" />
<!-- Add new custom fields here. -->

                            <rn:widget path="input/FormInput" name="Incident.CustomFields.c.escalation_type" required="true" />
               	            <rn:widget path="input/FormInput" name="Incident.CustomFields.c.trouble_type" required="true" />
					        <rn:widget path="input/FormInput" name="Incident.CustomFields.c.trouble_reason" required="true" />
            </div>      
               		<rn:widget path="input/FormInput" name="Incident.CustomFields.c.comments" />           	        	
<!--					
            <div class="oncorTable">
                <h2>Attachments</h2>
                    <div class="oncorColumn1">
                        <p>Add attachments here <strong>(not required, maximum of 10)</strong></p>
                        <rn:widget path="input/FileAttachmentUpload" label_input="" min_required_attachments="0" max_attachments="10" />
                    </div>

                   <div class="oncorColumnClear"></div>
            </div>      
-->
				    <rn:widget path="input/FormSubmit" label_button="Submit" on_success_url="/app/tracking/tracking_confirm" error_location="rn_ErrorLocation" />
           
        </form>
    </div>
</div>
