<?php

class location extends CI_Model
{

   public function getLocations()
	{
		return $this->db->select('*')->from('locations')->order_by('location', 'ASC')->get()->result();
	}

	public function getLocationById($id)
	{
		return $this->db->select('*')->from('locations')->where('id', $id)->get()->row();
	}

	public function addLocation($location)
	{	
		$this->db->insert('locations', array('location' => $location));
		return $this->db->insert_id();
	}

	public function updateLocation($id, $location)
	{
		$this->db->where('id', $id);
		return $this->db->update('locations', array('location' => $location));
	}

	public function deleteLocation($id){
		return $this->db->where('id', $id)->delete('locations');
	}
	
}
