<?php
namespace Custom\Widgets\utils;

class PrintHeadCSS extends \RightNow\Libraries\Widget\Base {
    private $accessValue=3;
    function __construct($attrs) {
        parent::__construct($attrs);
    }

    function getData() {
    $CI=get_instance();
    
    $this->data['printHeadCss']=$CI->model('custom/SecurityCustomModel')->accessEnabled($this->accessValue); // Some Answer Access Value.
    
    return parent::getData();

    }

}