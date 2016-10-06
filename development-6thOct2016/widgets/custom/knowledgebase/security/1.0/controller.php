<?php
namespace Custom\Widgets\knowledgebase;

class security extends \RightNow\Libraries\Widget\Base {
    private $securityAccessValue=3;
    private $bannerAccessValue=3;
    function __construct($attrs) {
        parent::__construct($attrs);
    }

    function getData() {
        $CI=get_instance();
        $this->data['security_enabled']=$CI->model('custom/SecurityCustomModel')->accessEnabled($this->securityAccessValue);
        $this->data['banner_enabled']=$CI->model('custom/SecurityCustomModel')->accessEnabled($this->bannerAccessValue);
        $this->data['banner_message']="RightNow, Oracle Service Cloud !";
        return parent::getData();

    }
}