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










	

	public function getJoinedUserData($userid)
	{
		$this->db->select("users.id, users.username, users.name, users.email, users.phone, users.avatar_url, 
		companies.id AS cid, companies.user_id AS u_id, companies.name AS cname, companies.email AS cemail, companies.phone AS cphone")
			->from('users')
			->where('users.id', $userid)
			->join('companies', 'users.id = companies.user_id', 'left');
		return $this->db->get()->row();
	}

	

	public function setRecoveryString($email, $recstr)
	{
		return $this->db->update('users', array('recoverystring' => $recstr), array('email' => $email));
	}

	public function hasRecoveryString($userid, $recstr)
	{
		return $this->db->select('*')->from('users')->where('id', $userid)->where('recoverystring', $recstr)->count_all_results();
	}

	public function resetPassword($userid, $recstr, $hpwd)
	{
		return $this->db->update(
			'users',
			array('recoverystring' => '', 'password' => $hpwd), //set
			array('id' => $userid, 'recoverystring' => $recstr) //where
		);
	}

	public function updateUserData($userid, $username, $name, $email, $phone)
	{
		$this->db->where('id', $userid);
		return $this->db->update('users', array('username' => $username, 'name' => $name, 'email' => $email, 'phone' => $phone));
	}

	public function updateUserLogoData($userid, $filename)
	{
		$this->db->where('id', $userid);
		return $this->db->update('users', array('avatar_url' => $filename));
	}

	public function updatePassword($userid, $password)
	{
		$this->db->set('password', $password);
		$this->db->where('id', $userid);
		return $this->db->update('users');
	}
}
