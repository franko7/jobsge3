<?php

class payment extends CI_Model
{
	public function addPayment($trans_id, $user_id, $jobId, $title, $amount, $time)
	{
		$data = array('transaction_id' => $trans_id, 'user_id' => $user_id, 'job_id' => $jobId, 'title' => $title, 'amount' => $amount, 'date' => $time);
		if ($this->db->insert('payments', $data)) 
			return true;
		return false;
	}
	

	public function getCountByTransactionID($tr_id){
		return $this->db->select('*')->from('payments')->where('transaction_id', $tr_id)->count_all_results();
	}


}