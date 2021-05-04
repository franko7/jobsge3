<?php

class Contactus extends CI_Model
{
	public function editContact($addr_en, $addr_ru, $email, $phone, $location)
	{
		$this->db->where('id', 1);
		return $this->db->update('contact', array(
			'addr_en'=>$addr_en, 'addr_ru'=>$addr_ru, 'email'=>$email, 'phone'=>$phone, 'location' => $location
		));
	}

   public function getContacts(){
      return $this->db->select('*')->from('contact')->where('id', 1)->get()->row();
   }
}