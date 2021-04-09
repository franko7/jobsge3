<?php

class jobtype extends CI_Model
{

   public function getJobTypes()
	{
		return $this->db->select('*')->from('jobtypes')->get()->result();
	}

	public function getJobTypeById($id)
	{
		return $this->db->select('*')->from('jobtypes')->where('id', $id)->get()->result();
	}



}
