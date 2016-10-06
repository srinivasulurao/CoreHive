<?php
namespace Custom\Models;
require_once (get_cfg_var("doc_root") . "/include/ConnectPHP/Connect_init.phph");
use RightNow\Connect\v1_2 as RNCPHP;
initConnectAPI();

class SecurityCustomModel extends \RightNow\Models\Base
{
    function __construct()
    {
        parent::__construct();
    }
    ///$CI->model('custom/Sample')->sampleFunction();
    function accessEnabled($accessValue){
    $ci=get_instance();
    $answer_id=getUrlParm('a_id');
    $answer=$answer = RNCPHP\Answer::fetch($answer_id);
    foreach($answer->AccessLevels as $key):
    if($key->ID > $accessValue)
    return 1;
    endforeach;
    return 0;
    }

    function getAnswerById($answer_id){
        $answer=RNCPHP\Answer::fetch($answer_id);
        return $answer;

    }
    

    function d($obj){
    echo "<pre style='color:red'>";
    print_r($obj);
    echo "</pre>";
    }
    
    function experiment(){
    }
}
