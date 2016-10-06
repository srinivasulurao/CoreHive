<?php
/**
* CPMObjectEventHandler: IncidentHandler
* Package: RN
* Objects: Incident
* Actions: Create, Update
* Version: 1.2
* Purpose: CPM handler for incident create and update.
* 1. Update the desired service location according to the Primary contact registered for the incident
* 2. Updatethe service attribute fields
*/

// Connect API
//require_once(get_cfg_var('doc_root') . "/include/ConnectPHP/Connect_init.php");
//initConnectAPI();

use \RightNow\Connect\v1_2 as RNCPHP;
use \RightNow\CPM\v1 as RNCPM;



/**
* Handler class for CPM
*/
class IncidentHandler implements RNCPM\ObjectEventHandler
{

    /**
     * Apply CPM logic to object.
     * @param int $runMode
     * @param int $action
     * @param object $incident
     * @param int $cycle
     */
    public static function apply($run_Mode, $action, $incident, $cycle)
    {
        if ($cycle !== 0) return;
                                preg_match("/Feedback for Answer ID ([0-9]+)/", $incident->Subject, $matches);
                //            print_r($matches);
                                if(!empty($matches)){
                                $ans_id = $matches[1];
                //            echo 'value' . $value;
                $answer = RNCPHP\Answer::fetch($ans_id);
//            var_dump($answer);
                
//            var_dump($answer->CustomFields->CRMOD->owning_contact_center);
} if(!empty($answer)){
//            echo 'answer' . intval($answer->CustomFields->CRMOD->owning_contact_center);
                $incident->CustomFields->CRMOD->owning_contact_center = $answer->CustomFields->CRMOD->owning_contact_center;
//            echo 'answerid' . intval($answer->ID);
                $incident->CustomFields->c->answer_id = $answer->ID;
                $incident->save(RNCPHP\RNObject::SuppressExternalEvents);
                }
}
}
/* The Test Harness */
class IncidentHandler_TestHarness
implements RNCPM\ObjectEventHandler_TestHarness {
                static $inc_invented = NULL;
                public static function setup() {

                                $inc = RNCPHP\Incident::fetch(3222175);
                                $md = $inc::getMetadata();
                                $inc -> save(RNCPHP\RNObject::SuppressAll);
                                static::$inc_invented = $inc;
                                return;
                }

                public static function fetchObject($action, $object_type) {
                                return (static::$inc_invented);
                }

                public static function validate($action, $object) {
                                // Added one note.
                                return (true);
                }

                public static function cleanup() {
                                #static::$inc_invented->destroy() . static::$inc_invented = NULL;
                                return;
                }

}              
?>