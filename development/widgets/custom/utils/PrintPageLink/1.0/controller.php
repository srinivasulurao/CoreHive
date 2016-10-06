<?php
namespace Custom\Widgets\utils;

class PrintPageLink extends \RightNow\Libraries\Widget\Base {
    private $accessValue=3;
    function __construct($attrs) {
        parent::__construct($attrs);
    }

    function getData() {
        $ci=get_instance();
        $answer_id=getUrlParm('a_id');
        $answer=$ci->model('custom/SecurityCustomModel')->getAnswerById($answer_id);
        $this->data['printPageLink']=$answer->CustomFields->Security->PrintButtonPermission; // Value Recieved from ROQL.
        return parent::getData();

    }
}