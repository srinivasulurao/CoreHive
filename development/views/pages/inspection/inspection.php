<rn:meta title="Oncor City Inspection Portal" template="oncor_notab_insp.php" clickstream="incident_create"  login_required="false" />
<!--This form created by Mark Hensley 9/17/2015 by cloning drg.php, then making the apporpriate modifications | NOTE: template= "oncor_notab.php" -->
<div id="rn_PageTitle" class="rn_AskQuestion">
    <img src="images/logo_oncor.gif" /><h1>City Inspection Portal</h1>
</div>
<div id="rn_PageContent" class="rn_AskQuestion">
    <div class="rn_Padding">
        <form id="rn_QuestionSubmit" method="post" action="" onsubmit="return false;">
            <div id="rn_ErrorLocation"></div>
             <div class="rn_Hidden">
	         <rn:widget path="input/PremiseSubject" name="Incident.Subject" required="true" default_value="City Inspection - " />
	         <rn:widget path="input/FormInput" name="Incident.Threads" default_value="City Inspection Incident Submitted" />
	        </div>
            <rn:condition logged_in="false">          
            <div class="oncorTable">
                <h2>Submitter's Contact Information (City Employee/Inspector)</h2>            
                      <rn:widget path="input/FormInput" name="contacts.email" label_input="Email Address (A city email domain is required.)" required="true" initial_focus="true" />
                    <div class="oncorColumn1">                
                        <rn:widget path="input/FormInput" name="contacts.first_name" label_input="First Name" required="true" />
                     <!--   <rn:widget path="input/FormInput" name="contacts.c$racf_id" required="true" /> -->
                    </div>

                    <div class="oncorColumn2"> 
                        <rn:widget path="input/FormInput" name="contacts.last_name" label_input="Last Name" required="true" /> 
                    </div>                    

                    <div class="oncorColumn1">                
                        <rn:widget path="input/FormInput" name="incidents.c$phone_number" label_input="Phone Number"/>                        	                                    	             
                    </div>
                    
                    <div class="oncorColumnClear"></div>
                      <!-- <rn:widget path="input/FormInput" name="incidents.c$customer_email" label_input="CC: (email address of someone you may want to receive a copy of this request.)" />
                      -->
            </div>
            </rn:condition>
           
            <div class="oncorTable" id="rn_Inspection">
                <h2>Inspection Information</h2>
                
                        <rn:widget path="input/DynamicCheckInput" name="incidents.c$ee_mult_esi" label_input="Is more than one premise being submitted?  Obtain form using link below." display_as_checkbox="true" hide_hint="true" />
               	            <p>(If you are inputting more than one address, please enter "Multiple Addresses" as the street address.)</p> 

                <br />
                    <div class="oncorColumn1">
                        <rn:widget path="input/FormInput" name="incidents.c$inspection_type" label_input="Inspection Type"/>                        	
                    </div>
                
                    <div class="oncorColumn2"> 
                        <rn:widget path="input/FormInput" name="incidents.c$premise_type" label_input="Residential or Commercial" />
                    </div>                    
                
                <div class="oncorColumnClear"></div>
            </div>      
                        <rn:widget path="input/FormInput" name="incidents.c$street_addr" required="true" />
                        	
                    <div class="oncorColumn1">
                        <rn:widget path="input/PremiseNumber" name="incidents.c$city" label_input="City" required="true"/>
                    </div>
               
                    <div class="oncorColumn2">
                        <rn:widget path="input/FormInput" name="incidents.c$permit_number" label_input="Permit Number (optional)"/>
                    </div>               
               
                <div class="oncorColumnClear"></div>    	

               	        <rn:widget path="input/FormInput" name="incidents.c$fac_process" label_input="Inspection Comments" /> 
               	        	
            <div class="oncorTable">
                <h2>Attachments</h2>
<!--                    <div class="oncorColumn1"> -->
                        <p><strong>If submitting more than one address on this request, please list the addresses on the Oncor City Inspections form and attach it to this request. <a rel="nofollow" target="_self" href="http://www.oncor.com/EN/Documents/Your Oncor/REPs/Inspection_Release_Form.xls"> Please click here to access the Oncor City Inspection form.</a> You may attach other documents if necessary. (maximum of 10 attachments)</strong></p>
                        <rn:widget path="input/FileAttachmentUpload" label_input="" min_required_attachments="0" max_attachments="10" />
 <!--                   </div>

                   <div class="oncorColumnClear"></div> -->
            </div>      

				    <rn:widget path="input/FormSubmit" label_button="Submit" on_success_url="/app/inspection/inspection_confirm" error_location="rn_ErrorLocation" />
           
        </form>
    </div>
</div>
