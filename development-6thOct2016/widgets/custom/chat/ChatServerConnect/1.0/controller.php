<?php
namespace Custom\Widgets\chat;

class ChatServerConnect extends \RightNow\Widgets\ChatServerConnect {
    function __construct($attrs) {
        parent::__construct($attrs);
    }

    function getData() {

       // return parent::getData();
    $this->data['js']['interfaceID'] = \RightNow\Api::intf_id();
        $this->data['js']['maUrl'] = \RightNow\Utils\Url::getShortEufBaseUrl(false, '/ci/documents/detail/1/' . \RightNow\Api::generic_track_encode($this->CI->session->getProfileData('contactID')) . '/6/' . TBL_CHATS);

        $this->data['chatHours'] = $this->CI->model('Chat')->getChatHours()->result;
        if(!$this->data['chatHours']['inWorkHours'] || $this->data['chatHours']['holiday'])
            $this->data['outOfChatHours'] = true;

        $profile = $this->CI->session->getProfile(true);
    
        if($profile !== null)
        {
            $contactID = $profile->contactID;
            $organizationID = $profile->orgID;

            if($contactID > 0)
            {
                $this->data['js']['contactID'] = $contactID;

                if($organizationID > 0)
                    $this->data['js']['organizationID'] = $organizationID;

                if(isset($profile->email))
                    $this->data['js']['contactEmail'] = $profile->email;

                if(isset($profile->firstName))
                    $this->data['js']['contactFirstName'] = $profile->firstName;

                if(isset($profile->lastName))
                    $this->data['js']['contactLastName'] = $profile->lastName;
            }
        }

        $this->data['js']['sessionID'] =  $this->CI->session->getSessionData('sessionID');
        $requestSource = \RightNow\Utils\Url::getParameter('request_source');

        // If 'request_source' is specified on the URL, use it. Otherwise look for 'pac' parameter. If neither are found, default to standard.
        if($requestSource)
        {
            $this->data['js']['requestSource'] = $requestSource;
        }
        else
        {
            $pac = \RightNow\Utils\Url::getParameter('pac');
            $this->data['js']['requestSource'] = $pac ? $pac : CHATS_REQUEST_SOURCE_STANDARD;
        }

        $this->data['js']['customFields'] = $this->CI->model('Chat')->getBlankCustomFields()->result;
        $this->data['js']['dateField'] = EUF_DT_DATE;
        $this->data['js']['dateTimeField'] = EUF_DT_DATETIME;
        $this->data['js']['radioField'] = EUF_DT_RADIO;

        //print_r($_POST);
        $posthandler = $_POST;

         $contactEmail = $this->CI->model('custom/Contactcustommodel')->lookupContactByLogin($posthandler['Contact_Login'], $posthandler['Contact_CustomFields_c_cr_affiliation']);

        foreach($_POST as $key => $value)
        {
            if(\RightNow\Utils\Text::beginsWith($key, 'Incident_CustomFields'))
            {
                $this->data['js']['postedCustomFields'][$key] = $value;
            }
            else if($key === 'Incident_Subject')
            {
                $this->data['js']['postedSubject'] = $value;
            }
            else if($key === 'Incident_Product')
            {
                $this->data['js']['postedProduct'] = $value;
            }
            else if($key === 'Incident_Category')
            {
                $this->data['js']['postedCategory'] = $value;
            }
            else if($key === 'chat_data')
            {
                $this->data['js']['chat_data'] = $value;
            }
            else if($key === 'referrerUrl')
            {
                $this->data['js']['referrerUrl'] = $value;
            }
            else if($profile === null) // Only use POSTed contact info if not logged in
            {
                if($key === 'Contact_Emails_PRIMARY_Address' && $contactEmail) 
                    $this->data['js']['contactEmail'] = $contactEmail;                
                else if($key === 'Contact_Emails_PRIMARY_Address')
                    $this->data['js']['contactEmail'] = $value;
                else if($key === 'Contact_Name_First')
                    $this->data['js']['contactFirstName'] = $value;
                else if($key === 'Contact_Name_Last')
                    $this->data['js']['contactLastName'] = $value;
            }
        }

    }
}