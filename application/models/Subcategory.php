<?php

class subcategory extends CI_Model
{
   public function getSubcategoriesByCategoryId($id)
	{
		return $this->db->select('*')->from('subcategories')->where('category_id', $id)->get()->result();
	}

	public function getSubcategoryById($id)
	{
		return $this->db->select('*')->from('subcategories')->where('id', $id)->get()->row();
	}

	public function getSubcategories()
	{
		return $this->db->select('*')->from('subcategories')->get()->result();
	}

	public function addSubcategory($category_id, $subcategory_en, $subcategory_ru)
	{
		$data = array('category_id' => $category_id, 'subcategory_en' => $subcategory_en, 'subcategory_ru' => $subcategory_ru);
		$this->db->insert('subcategories', $data);
		return $this->db->insert_id();
	}

	public function editSubcategory($id, $category_id, $subcategory_en, $subcategory_ru)
	{
		$this->db->where('id', $id);
		return $this->db->update('subcategories', array('category_id' => $category_id, 'subcategory_en' => $subcategory_en, 'subcategory_ru' => $subcategory_ru));
	}

	public function deleteSubcategory($id){
		return $this->db->where('id', $id)->delete('subcategories');
	}
}
