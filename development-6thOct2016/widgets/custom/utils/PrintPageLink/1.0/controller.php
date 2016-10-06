<?php
namespace Custom\Widgets\utils;

class PrintPageLink extends \RightNow\Libraries\Widget\Base {
    private $accessValue=3;
    function __construct($attrs) {
        parent::__construct($attrs);
    }

    function getData() {
        $CI=get_instance();
        $this->data['printPageLink']=$CI->model('custom/SecurityCustomModel')->accessEnabled($this->accessValue); // Value Recieved from ROQL.
        return parent::getData();

    }
}