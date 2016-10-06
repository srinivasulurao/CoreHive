<rn:meta title="Submit a DRG Incident" template="oncor_tampandcutseal.php" clickstream="incident_create"  login_required="false" />
<!--This form created by Mark Hensley 2/24/2015 by cloning cutseal.php, then making the apporpriate modifications-->
<div id="rn_PageTitle" class="rn_AskQuestion">
    <img src="images/logo_oncor.gif" /><h1>DRG Equipment Found</h1>
</div>
<div id="rn_PageContent" class="rn_AskQuestion">
    <div class="rn_Padding">
        <form id="rn_QuestionSubmit" method="post" action="" onsubmit="return false;">
            <div id="rn_ErrorLocation"></div>
            <div class="rn_Hidden">
            <rn:widget path="input/PremiseSubject" name="Incident.Subject" required="true" default_value="DRG Equipment - " />
            <rn:widget path="input/FormInput" name="Incident.Threads" default_value="DRG Incident Submitted" />
            </div>
              <!--  <rn:widget path="input/MtrSubject" name="incidents.subject" required="true" default_value="DRG Equipment - " />
                <rn:widget path="input/HiddenInput" name="incidents.thread" default_value="DRG Incident Submitted" />
            -->
            <rn:condition logged_in="false">          
            <div class="oncorTable">
                <h2>Contact Information</h2>            
                    <rn:widget path="input/FormInput" name="Contact.Emails.PRIMARY.Address" label_input="Email Address" required="true" initial_focus="true" />
                    <div class="oncorColumn1">                
                        <rn:widget path="input/FormInput" name="Contact.Name.First" label_input="First Name"  required="true" />
                        <rn:widget path="input/FormInput" name="Contact.Name.Last" label_input="Last Name" required="true" />              
                        <rn:widget path="input/FormInput" name="contacts.c$racf_id" required="true" />
                    </div>
                    
                    <div class="oncorColumnClear"></div>
            </div>
            </rn:condition>
           
            <div class="oncorTable">
                <h2>DRG Equipment Information</h2>
                    <div class="oncorColumnA">
                        <rn:widget path="input/PremiseNumber" name="Incident.CustomFields.c.mtr_nbr" label_input="Meter Number" required="true" always_show_mask="false"/>
                    </div>

                    <div class="oncorColumnClear"></div>
                        <rn:widget path="input/FormInput" name="Incident.CustomFields.c.street_addr" required="true" />
            </div>
            
            <div class="oncorTable">
                <fieldset>
                    <div class="oncorColumn1">
                	      <p><strong>Verified the DRG device (wind, solar, etc.) is connected to the grid?</strong></p>
                	      <p><strong>Are you working a negative kWh order (this is a tampering order)?</strong></p>
                        <p><strong>Did you speak to the Customer?</strong></p>                	      
                    </div>

           	        <div class="oncorColumn2">
               		      <rn:widget path="input/DynamicCheckInput" name="Incident.CustomFields.c.device_on_grid" label_input="(Only check if applicable)" display_as_checkbox="true" hide_hint="true" /> <br/> <br/>
               		      <rn:widget path="input/DynamicCheckInput" name="Incident.CustomFields.c.negative_kwh" label_input="(Only check if applicable)" display_as_checkbox="true" hide_hint="true"/> <br/> 
               	        <rn:widget path="input/DynamicCheckInput" name="Incident.CustomFields.c.ee_cont_phone" label_input="(if Yes, select check box and add a comment)" display_as_checkbox="true" hide_hint="true"/>
                    </div>
                    
                    <div class="oncorColumnClear"></div>
               	        <rn:widget path="input/FormInput" name="Incident.CustomFields.c.fac_process" label_input="Customer Contact Comments" />                    
   
                </fieldset>
            </div>

            <div class="oncorTable">
                <fieldset>
                    <div class="oncorColumn1">
                	      <rn:widget path="input/FormInput" name="Incident.CustomFields.c.generation_type" label_input="What type of Generation did you see?" />
                    </div>
                    
                    <div class="oncorColumnClear"></div>
               		      <rn:widget path="input/FormInput" name="Incident.CustomFields.c.comment_history" label_input="Generation Type Comments" />                 
                </fieldset>
            </div>

            <div class="oncorTable">
                <fieldset>
                    <div class="oncorColumn1 drgInc">
                        <rn:widget path="input/FormInput" name="Incident.CustomFields.c.door_tag" label_input="Did you leave a DRG door hanger?" required="true" />
                    </div>
                    
                    <div class="oncorColumnClear"></div>
               	        <rn:widget path="input/FormInput" name="Incident.CustomFields.c.usr_msg" label_input="Door Hanger Comments (REQUIRED)" required="true" />                    
                </fieldset>
            </div>            


            <div class="oncorTable">
                <h2>Attachments</h2>
                    <div class="oncorColumn1">
                        <p><strong>(minimum of 0, maximum of 10)</strong></p>
                        <rn:widget path="input/FileAttachmentUpload" label_input="" max_attachments="10" />
                    </div>

                   <div class="oncorColumnClear"></div>
            </div>      

				    <rn:widget path="input/FormSubmit" label_button="Submit" on_success_url="/app/drg/drg_confirm" error_location="rn_ErrorLocation" />
           
        </form>
    </div>
</div>
