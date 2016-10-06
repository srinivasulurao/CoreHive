<?php
namespace Custom\Models;
class PTA_model extends \RightNow\Models\Base {

	private $domain_to_orgs_array = array('oncor.com' => '185');

	function __construct() {
		parent::__construct();
	}

	/**
	 * Testcases
	 *  •   Login via PTA with a contact where an org_id is passed (No code required for this)
	 o  Verify that the Org is set properly.
	 •  Login via PTA with a contact where no org_id is passed, but an email domain mapping exists in the hook.
	 o  Verify that the Org is set properly.
	 •  Login via PTA with a contact where no org_id is passed and no email domain mapping exists in the hook.
	 o  Verify that no Org is set.
	 *
	 */

	function pre_pta_convert(&$pta) {
		logMessage('Entering pre_pta_convert hook');
		logMessage($pta);

		//check if Org ID is not set
		if (empty($pta['data']['decodedData']['p_org_id'])) {
			//Org ID not passed in; set according to email domain
			if (!empty($pta['data']['decodedData']['p_email.addr'])) {
				//get Email domain
				$parts = explode("@", $pta['data']['decodedData']['p_email.addr']);
				$email_domain = $parts[1];

				logMessage($parts);

				if (!empty($this -> domain_to_orgs_array[$email_domain])) {
					//set Org based on email domain
					$pta['data']['decodedData']['p_org_id'] = $this -> domain_to_orgs_array[$email_domain];

					logMessage("In PTA : Org set to '{$this->domain_to_orgs_array[$email_domain]}' based on email domain");
				} else {
					logMessage('In PTA : EMAIL domain does not exist in the Hook configuration');
					http_redirect(\RightNow\Utils\Url::getShortEufAppUrl() . '/error/error_id/4');
					exit();
				}
			} else {
				logMessage('In PTA : p_email.addr is empty');
			}
		} else {
			logMessage('In PTA : p_org_id EXISTS');
		}
		//return $pta; // Need to see may not be required
	}
}
