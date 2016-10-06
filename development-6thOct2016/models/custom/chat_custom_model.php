<?php
class Chat_custom_model extends Model
{
    function __construct()
    {
        parent::__construct();
        //This model would be loaded by using $this->load->model('custom/Sample_model');
    }

    function getAgentStatus($intfid)
    {
        //$sql = sql_get_int("SELECT cur_agents_avail FROM chat_agent_sessions WHERE logoff IS NULL AND interface_id =".intf_id());
        $avl_count = sql_get_int("SELECT cur_agents_avail FROM chat_queue_stats ORDER BY created DESC LIMIT 1");
        if(!$intfid)
        	$intfid = intf_id();

       $count = 0;
       if($avl_count > 0){
           $query = "SELECT COUNT(*) FROM chat_agent_intervals as a, chat_agent_sessions as b WHERE a.end_time is NULL and b.logoff is null and b.interface_id = ".$intfid." and a.acct_id = b.acct_id and a.status_id = 21 and a.status_type = 16";	
           $count = sql_get_int($query);
       }

	return $count;
    }
}
