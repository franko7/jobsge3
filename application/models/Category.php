<?php

class category extends CI_Model
{

   public function getCategories()
	{
		return $this->db->select('*')->from('categories')->get()->result();
	}

	public function getCategoryById($id)
	{
		return $this->db->select('*')->from('categories')->where('id', $id)->get()->row();
	}

	public function addCategory($category_en, $category_ru)
	{
		$data = array('category_en' => $category_en, 'category_ru' => $category_ru);
		$this->db->insert('categories', $data);
		return $this->db->insert_id();
	}

	public function editCategory($id, $category_en, $category_ru)
	{
		$this->db->where('id', $id);
		return $this->db->update('categories', array('category_en' => $category_en, 'category_ru' => $category_ru));
	}

	public function deleteCategory($id){
		return $this->db->where('id', $id)->delete('categories');
	}

	public function updateImage($id, $filename)
	{
		$this->db->where('id', $id);
		return $this->db->update('categories', array('filename' => $filename));
	}

	public function getCategorySubcategory()
	{
		$categories = $this->db->get('categories')->result_array();
		foreach($categories as $i=>$category) {
			$this->db->where('category_id', $category['id']);
			$subcategories = $this->db->get('subcategories')->result_array();
			$categories[$i]['subcategories'] = $subcategories;
		}
		return $categories;
	}




}
