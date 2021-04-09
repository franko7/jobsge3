<?php

class image extends CI_Model
{
	public function editImage($id, $filename)
	{
		$this->db->where('id', $id);
		return $this->db->update('images', array('filename' => $filename));
	}

   public function getImageNames(){
      return $this->db->select('*')->from('images')->get()->result();
   }
}
