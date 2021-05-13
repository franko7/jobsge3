<?php

class Term extends CI_Model
{
	public function editTerms($terms_en, $terms_ru)
	{
		$this->db->where('id', 1);
		return $this->db->update('terms', array('terms_en'=>$terms_en, 'terms_ru'=>$terms_ru));
	}

   public function getTerms(){
      return $this->db->select('*')->from('terms')->where('id', 1)->get()->row();
   }
}
