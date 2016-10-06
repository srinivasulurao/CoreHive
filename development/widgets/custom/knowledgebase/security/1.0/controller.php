<?php
namespace Custom\Widgets\knowledgebase;

class security extends \RightNow\Libraries\Widget\Base {
    
    function __construct($attrs) {
        parent::__construct($attrs);
    }

    function getData() {
        $ci=get_instance();
        $answer_id=getUrlParm('a_id');
        $answer=$ci->model('custom/SecurityCustomModel')->getAnswerById($answer_id);
        $this->data['banner_enabled']=$answer->CustomFields->Security->ShowBannerPermission;
        $this->data['security_enabled']=$answer->CustomFields->Security->CopyPermission;
        $this->data['banner_message']="RightNow, Oracle Service Cloud !";
        return parent::getData();

    }
}