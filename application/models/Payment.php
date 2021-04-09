<?php

class payment extends CI_Model
{
	public function addCCPayment($job_id, $cardholder, $cardnumber, $month_year, $cvv)
	{
		$data = array('job_id' => $job_id, 'cardholder' => $cardholder, 'cardnumber' => $cardnumber, 'month_year' => $month_year, 'cvv' => $cvv);
		if ($this->db->insert('payments', $data)) 
			return true;
		return false;
	}

   public function addPPPayment($job_id, $pptransid)
	{
		$data = array('job_id' => $job_id, 'pptransid' => $pptransid);
		if ($this->db->insert('payments', $data)) 
			return true;
		return false;
	}

   public function editCCPayment($job_id, $cardholder, $cardnumber, $month_year, $cvv)
	{
      $this->db->where('job_id', $job_id);
		return $this->db->update('payments', array('cardholder' => $cardholder, 'cardnumber' => $cardnumber, 'month_year' => $month_year, 'cvv' => $cvv));		
	}

   












	public function getUserdataById($id)
	{
		return $this->db->select('*')->from('users')->where('id', $id)->get()->row();
	}

	public function getUserdataByEmail($email)
	{
		return $this->db->select('*')->from('users')->where('email', $email)->get()->row();
	}
   
	public function validate_email($email)
	{
		return $this->db->select('*')->from('users')->where('email', $email)->count_all_results();
	}
}