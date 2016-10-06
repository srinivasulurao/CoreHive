<rn:meta title="Submit a Cut Seal Incident" template="oncor_tampandcutseal.php" clickstream="incident_create"  login_required="false" />
<!--Brian Smith Comments: template was "oncor.php" -->
<div id="rn_PageTitle" class="rn_AskQuestion">
    <img src="images/logo_oncor.gif" /><h1>Meter Base Found Unsecured</h1>
</div>
<div id="rn_PageContent" class="rn_AskQuestion">
    <div class="rn_Padding">
        <form id="rn_QuestionSubmit" method="post" action="" onsubmit="return false;">
            <div id="rn_ErrorLocation"></div>
            <div class="rn_Hidden">
            <rn:widget path="input/PremiseSubject" name="Incident.Subject" required="true" default_value="Cut Seal - " />
            <rn:widget path="input/FormInput" name="Incident.Threads" default_value="Cut Seal Incident Submitted" />
            </div>
            <rn:condition logged_in="false">          
            <div class="oncorTable">
                <h2>Contact Information</h2>            
                <rn:widget path="input/FormInput" name="Contact.Emails.PRIMARY.Address" label_input="Email Address" required="true" initial_focus="true" />
                <div class="oncorColumn1">                
                    <rn:widget path="input/FormInput" name="Contact.Name.First" label_input="First Name" required="true" />
                    <rn:widget path="input/FormInput" name="Contact.Name.Last" label_input="Last Name" required="true" />              
                    <rn:widget path="input/FormInput" name="Contact.CustomFields.c.racf_id" required="true" />
                </div>
                <div class="oncorColumnClear"></div>
            </div>
            </rn:condition>
            <br />
            <h2>Meter Information</h2>
              <div class="oncorTable2">
                <div class="oncorColumnA">
                  <rn:widget path="input/PremiseNumber" name="Incident.CustomFields.c.mtr_nbr" label_input="Meter Number" required="true" always_show_mask="false"/>
                </div>
                <div class="oncorColumnB">
                  <rn:widget path="input/FormInput" name="Incident.CustomFields.c.street_addr" required="true" />
                </div>
                <div class="oncorColumnC">
                <rn:widget path="input/FormInput" name="Incident.CustomFields.c.seal_nbr" label_input="Installed Seal" required="false"/>
        		</div>
                <div class="oncorColumnClear"></div>
                <rn:widget path="input/FormInput" name="Incident.CustomFields.c.comment_history" label_input="Cut Seal Comments" required="false"/>
            </div>
                 
                  <div class="oncorTable">
            			<div class="oncorColumn1">
                	<h4>Was a locking device correctly installed upon arrival?</h4>
                    	</div>
           	 			<div class="oncorColumn2 cutseal">    
               			 <rn:widget path="input/DynamicCheckInput" name="Incident.CustomFields.c.locking_bar_installed" label_input="(Only check if you found a locking device correctly installed)" toggle_target="#LawEnforcementDynamicFields" display_as_checkbox="true"/>
                    	</div>
                    <p>
                    <br />
                         
               			 <div id="LawEnforcementDynamicFields" class="rn_Hidden">
                    		<div class="oncorColumn2">
                       			<h3>Only Provide Meter Number & Street Address<h3>
                    		</div>
               			 </div>
            		</div>
           
           <p>
           <br />
            <div class="oncorTable">
                <h2>Attachments</h2>
                <div class="oncorColumn1">
                    <p><strong>(minimum of 0, maximum of 10)</strong></p>
                    <rn:widget path="input/FileAttachmentUpload" label_input="" max_attachments="10" />
                    <?/*<rn:widget path="input/FormInput" name="Incident.CustomFields.c.photo_rmk" label_input="Photo Remarks" />*/?>
                </div>
                <div class="oncorColumnClear"></div>
            </div>

        

            <rn:widget path="input/FormSubmit" label_button="Submit" on_success_url="/app/cutseal/cutseal_confirm" error_location="rn_ErrorLocation"  />
        </form>
    </div>
</div>
