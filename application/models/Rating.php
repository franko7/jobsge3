<?php

class rating extends CI_Model
{
	public function addRating($job_id, $ip, $stars)
	{
		// $this->db->where(array('job_id' => $job_id, 'ip' => $ip))->update('ratings', array('stars' => $stars, 'rated_at' => time()));
		// $res =  $this->db->affected_rows();
		// if (!$res){
			if ($this->db->insert('ratings', array('job_id' => $job_id, 'ip' => $ip, 'stars' => $stars, 'rated_at' => time()))) 
				return true;
			return false;
		// }
		// return true;
	}



	
}
