<?php
namespace Custom\Models;
use \RightNow\Connect\v1_2 as RNCPHP;
require_once (get_cfg_var("doc_root") . "/ConnectPHP/Connect_init.php");
initConnectAPI();

class Contactcustommodel extends \RightNow\Models\Base
{
    function __construct()
    {
        parent::__construct();
        //This model would be loaded by using $this->load->model('custom/Sample_model');
    }

        /* Get Contact email ID based on login and CR Affiliation ID */
	function lookupContactByLogin($login, $cr_id)
	{
               // logMessage("In lookupContactByLogin ".$login." CR Aff Id ".$cr_id);
                // 150611-000137, fixed fatal error due to no login provided for new chat
                if (!$login) {
                    return false; 
                }
		
		try {
                    // 150611-000137, fixed fatal error due to no login provided for new chat
                    $roql = "SELECT C.Login,C.Emails.Address from Contact C WHERE C.Login ='".$login."'"; 
                    if ($cr_id === null || $cr_id === false || $cr_id === '') {                      
                        $roql .= " and C.CustomFields.c.cr_affiliation IS NULL";
                    } else {
                       $roql .= " and C.CustomFields.c.cr_affiliation = " . $cr_id;
                    }
		 
                    $roql_result = RNCPHP\ROQL::query($roql)->next();
                    $roql_res = $roql_result->next();
		   //  logMessage($roql_res);
                   // logMessage("Email Address ".$roql_res['Address']);
                }
                catch (RNCPHP\ConnectAPIError $err)
                { 
                   echo $err->getMessage();
                }
		
                return $roql_res['Address'];
	}
}
