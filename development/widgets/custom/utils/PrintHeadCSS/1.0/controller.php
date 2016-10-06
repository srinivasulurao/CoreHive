<?php
namespace Custom\Widgets\utils;

class PrintHeadCSS extends \RightNow\Libraries\Widget\Base {
    private $accessValue=3;
    function __construct($attrs) {
        parent::__construct($attrs);
    }

    function getData() {
    $ci=get_instance();
    $answer_id=getUrlParm('a_id');
    $answer=$ci->model('custom/SecurityCustomModel')->getAnswerById($answer_id);
    $this->data['printHeadCss']=$answer->CustomFields->Security->PrintPermission; // Some Answer Access Value.
    
    return parent::getData();

    }

}