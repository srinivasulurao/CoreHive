<rn:meta title="Oncor Issue Tracking Form" template="oncor_notab_track.php" clickstream="incident_create"  login_required="false" />
<!--This form created by Mark Hensley 11/13/2015 by cloning inspections.php, then making the apporpriate modifications | NOTE: template= "oncor_notab_insp.php" <- this needs to be changed-->
<div id="rn_PageTitle" class="rn_AskQuestion">
    <img src="images/logo_oncor.gif" /><h1>Oncor Issue Tracking</h1>
</div>
<div id="rn_PageContent" class="rn_AskQuestion">
    <div class="rn_Padding">
        <form id="rn_QuestionSubmit" method="post" action="" onsubmit="return false;">
            <div id="rn_ErrorLocation"></div>
           <div class="rn_Hidden">               
              <rn:widget path="input/FormInput" name="Incident.Threads" default_value="Issue Tracking Incident Submitted" />
	      </div>
            <rn:condition logged_in="false">          
              <div class="oncorTable">
                <h2>Submitter Info</h2>            
                      <rn:widget path="input/FormInput" name="contacts.email" label_input="Submitter Email Address" required="true" initial_focus="true" />
                    <div class="oncorColumn1">                
                        <rn:widget path="input/FormInput" name="contacts.first_name" required="true" label_input="First Name" />
                        <rn:widget path="input/FormInput" name="incidents.c$cr_affiliation" label_input="Department" required="true" />              
                    </div>
                    
                    <div class="oncorColumn2">                
                        <rn:widget path="input/FormInput" name="contacts.last_name" required="true" label_input="Last Name"/>              
                    </div>
                                        
                    <div class="oncorColumnClear"></div>

              </div>
            </rn:condition>
           
            <div class="oncorTable">
                <h2>Issue Details</h2>
                       <rn:widget path="input/FormInput" name="incidents.subject" label_input="Subject (Issue Title)" required="true" />
               <!--    <rn:widget path="input/ProductCategoryInput" table="incidents" data_type="categories" label_input="#rn:msg:CATEGORY_LBL#" label_nothing_selected="#rn:msg:SELECT_A_CATEGORY_LBL#" /> -->
               	       <rn:widget path="input/FormInput" name="incidents.c$article_number" label_input="Issue Description (High Level)" /> 
               	       <rn:widget path="input/FormInput" name="incidents.c$description" label_input="Detailed Description" /> 
                       <div id="rn_Tracking" class="rn_Tampering">
                       <rn:widget path="input/DynamicCheckInput" name="incidents.c$ee_light" label_input="Initial resolution taken?" toggle_target="#ResolvedDynamicFields" display_as_checkbox="true"/>
                        </div>
                       <br />
                         <div id="ResolvedDynamicFields" class="rn_Hidden">
               	            <rn:widget path="input/FormInput" name="incidents.c$resolution_activity" label_input="Resolution Activity" />
                         </div>
                       <rn:widget path="input/FormInput" name="incidents.c$issue_severity" label_input="Severity Level" /> 

            </div>      
           	        	
            <div class="oncorTable">
                <h2>Attachments</h2>
                    <div class="oncorColumn1">
                        <p><strong>(minimum of 0, maximum of 10)</strong></p>
                        <rn:widget path="input/FileAttachmentUpload" label_input="" min_required_attachments="0" max_attachments="10" />
                    </div>

                   <div class="oncorColumnClear"></div>
            </div>      

				    <rn:widget path="input/FormSubmit" label_button="Submit" on_success_url="/app/tracking/tracking_confirm" error_location="rn_ErrorLocation" />
           
        </form>
    </div>
</div>
