<?php

class user extends CI_Model
{
	public function addUser($fullname, $email, $password)
	{
		$data = array('fullname' => $fullname, 'email' => $email, 'password' => $password);
		if ($this->db->insert('users', $data)) 
			return true;
		return false;
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

	public function getNonAdminUsersCount()
	{
		return $this->db->select('*')->from('users')->where('role !=', 1)->count_all_results();
	}
	public function getNonAdminUsers($limit, $start)
	{
		return $this->db->select('*')->from('users')->where('role !=', 1)->limit($limit, $start)->get()->result();
	}

	public function updatePassword($id, $password)
	{
		$this->db->where('id', $id);
		return $this->db->update('users', array('password' => $password));
	}

	public function deleteUser($id){
		return $this->db->where('id', $id)->delete('users');
	}

}
