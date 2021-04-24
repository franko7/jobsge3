<?php

class rating extends CI_Model
{
	public function addRating($job_id, $ip, $stars)
	{
		// Avoid duplicate $job_id/$ip combination
		if (!$this->db->select('*')->from('ratings')->where('job_id', $job_id)->where('ip', $ip)->count_all_results()){
			if ($this->db->insert('ratings', array('job_id' => $job_id, 'ip' => $ip, 'stars' => $stars, 'rated_at' => time()))) 
				return true;
			return false;
		}else{
			return false;
		}
	}


	public function getCurrentUsersRates($job_id, $ip)
	{
		return $this->db->select('*')->from('ratings')->where('job_id', $job_id)->where('ip', $ip)->get()->row('stars');
	}

	
}
