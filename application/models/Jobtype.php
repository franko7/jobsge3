<?php

class jobtype extends CI_Model
{

   public function getJobTypes()
	{
		return $this->db->select('*')->from('jobtypes')->get()->result();
	}

	public function getJobTypeById($id)
	{
		return $this->db->select('*')->from('jobtypes')->where('id', $id)->get()->row();
	}

	public function updateJobTypes($id, $initPeriod, $initPrice, $renewPeriod, $renewPrice)
	{
		$this->db->where('id', $id);
		return $this->db->update('jobtypes', array('initial_price' => $initPrice, 'initial_period' => $initPeriod, 'renewal_price' => $renewPrice, 'renewal_period' => $renewPeriod));
	}



}