<?php
namespace Custom\Models;
use \RightNow\Connect\v1_2 as RNCPHP;
require_once (get_cfg_var("doc_root") . "/ConnectPHP/Connect_init.php");
initConnectAPI();

class Chatcustommodel extends \RightNow\Models\Base
{
    function __construct()
    {
        parent::__construct();
        //This model would be loaded by using $this->load->model('custom/Sample_model');
    }

    function getAgentStatus($intfid)
    {
                //$avl_count = sql_get_int("SELECT cur_agents_avail FROM chat_queue_stats ORDER BY created DESC LIMIT 1");
	        $reportId1 = "106750"; // Report to check for the current agents available
		$fetchedReport1 = RNCPHP\AnalyticsReport::fetch($reportId1);
		$result1 = $fetchedReport1 -> run();
		$nrows = $result1 -> count();
		$row = $result1 -> next();
		//print_r($row);
		$avl_count = $row['Number of Current Agents Available'];
               
		$count = 0;
		if ($avl_count > 0) {
		//	$query = "SELECT COUNT(*) FROM chat_agent_intervals as a, chat_agent_sessions as b WHERE a.end_time is NULL and b.logoff is null and b.interface_id = " . $intfid . " and a.acct_id = b.acct_id and a.status_id = 21 and a.status_type = 16";
		//	$count = sql_get_int($query);
		 $reportId2 = "106751"; // Report to get the number of chat agents intervals and sessions.
		$fetchedReport2 = RNCPHP\AnalyticsReport::fetch($reportId2);
		$result2 = $fetchedReport2 -> run();
		$count = $result2 -> count();		
	
		}

				
		
		return $count;
    }
}
