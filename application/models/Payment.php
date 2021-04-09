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



}