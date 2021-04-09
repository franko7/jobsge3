<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class test extends CI_Model {

	public function getTests(){
      return $this->db->select('*')->from('test')->get()->result();
   }
}
