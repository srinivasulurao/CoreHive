<?php
namespace Custom\Widgets\chat;

class ChatCustomIframe extends \RightNow\Libraries\Widget\Base {
    function __construct($attrs) {
        parent::__construct($attrs);
    }

    function getData() {

       // return parent::getData();

    	$this->data['url_str'] = getUrlparm('p_li');
    	
    	if(getUrlparm('tmpl') == 'postans')
    	{
		$this->data['js']['furl'] = '/app/chat/new_chat_launch/p_li/'.$this->data['url_str'];
    		$this->data['params']['type'] = 'postans';
    	}
    	else
    	{				
			$answerID = $this->data['attrs']['a_id'];
			
			//$this->CI->load->model('standard/Chat_model');
	        $this->data['chatHours'] = $this->CI->model('Chat')->getChatHours();//$this->CI->Chat_model->getChatHours();
	       
	      //  $this->CI->load->model('standard/Answer_model');

	        $ansDetails = $this->CI->model('Answer')->get($answerID);//$this->CI->Answer_model->get($answerID);
	       // echo "Status ".$ansDetails->Solution;
	       // $this->CI->load->model('custom/Chatcustommodel');
             //   $this->CI->Chatcustommodel->getAgentStatus(intf_id());
	        $this->data['agentstatus'] = $this->CI->model('custom/Chatcustommodel')->getAgentStatus(intf_id());
	        
	      if( $ansDetails->StatusWithType->Status->ID == 4)//$ansDetails[2]==4 //(Answers with Status - Public) // Don't need this extra condition - && $this->data['chatHours']['inWorkHours']) Go to alternate page if it's public even if off hours.
	        	$this->data['js']['furl'] = '/app/answers/detail_chat/tmpl/postans/a_id/'.$answerID.'/p_li/'.$this->data['url_str'];
	       else
	        	$this->data['js']['furl'] = '/app/chat/new_chat_launch/p_li/'.$this->data['url_str'];
    	}
	}

    
}