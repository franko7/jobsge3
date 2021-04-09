<?php

class pageview extends CI_Model
{

   public function countLastViews($jobid, $ip, $time)
	{
		return $this->db->select('*')->from('pageviews')->where('job_id', $jobid)->where('ip', $ip)->where('viewed_at >', time()-$time)->count_all_results();
	}

   public function addPageView ($jobid, $ip){
      return $this->db->insert('pageviews', array('job_id' => $jobid, 'ip' => $ip, 'viewed_at' => time()));
   }


}
