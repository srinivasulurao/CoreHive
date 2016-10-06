<?php
namespace Custom\Widgets\input;

class AnchorDisplay extends \RightNow\Libraries\Widget\Base {
    function __construct($attrs) {
        parent::__construct($attrs);
    }

    function getData() {
            
            $this->data['interfaceid'] = intf_id();
	    $this->CI->load->model('custom/Chatcustommodel');
	    $this->data['agentstatus'] = $this->CI->Chatcustommodel->getAgentStatus(3);
	    $this->data['url_str'] = getUrlparm('p_li');
	    $this->data['a_id'] = getUrlparm('a_id');
	    if($this->data['interfaceid']==1 && $this->data['a_id'])
	    	 $this->data['a_id'] = 45;
        return parent::getData();

    }
}

 