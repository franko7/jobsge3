<?php

class chat extends CI_Model
{
   public function sendMessage($from, $to, $message)
	{
		$data = array('from_id' => $from, 'to_id' => $to, 'message' => $message, 'sent_at' => time());
		$this->db->insert('chats', $data);
		return $this->db->insert_id();
	}

	public function getChatByUserId($id)
	{
		$this->db->select('id, from_id AS from, to_id AS to, message, sent_at, new');
		$this->db->from('chats');
		$this->db->where('from_id', $id)->or_where('to_id', $id);
		$this->db->order_by('sent_at','asc'); 
		return  $this->db->get()->result();
	}

	public function markRead($from_id, $to_id){
		$this->db->where('from_id', $from_id)->where('to_id', $to_id);
		return $this->db->update('chats', array('new' => 0));
	}

	public function getNewChatCount($id){
		$this->db->distinct();
		$this->db->select('from_id');
		$this->db->where('to_id', $id)->where('new', 1);
		return count($this->db->get('chats')->result());
	}





}
