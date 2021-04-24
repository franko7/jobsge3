<?php

class social extends CI_Model
{

   public function getSocials()
	{
		return $this->db->select('*')->from('socials')->get()->row();
	}

   public function updateSocials($facebook, $instagram, $linkedin, $google, $twitter)
	{
		$this->db->where('id', 1);
		return $this->db->update('socials', array('facebook' => $facebook, 'instagram' => $instagram, 'linkedin' => $linkedin, 'google' => $google, 'twitter' => $twitter));
	}

}
