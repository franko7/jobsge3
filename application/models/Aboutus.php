<?php

class Aboutus extends CI_Model
{
	public function editAboutus($title_en, $title_ru, $subtitle_en, $subtitle_ru, $aboutus_en, $aboutus_ru)
	{
		$this->db->where('id', 1);
		return $this->db->update('aboutus', array(
			'title_en'=>$title_en, 'title_ru'=>$title_ru, 'subtitle_en'=>$subtitle_en, 'subtitle_ru'=>$subtitle_ru, 'aboutus_en' => $aboutus_en, 'aboutus_ru' => $aboutus_ru
		));
	}

   public function getAboutus(){
      return $this->db->select('*')->from('aboutus')->where('id', 1)->get()->row();
   }
}
