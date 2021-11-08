<?php

class category extends CI_Model
{

   public function getCategories()
	{
		return $this->db->select('*')
		->from('categories')
		->order_by('sort', 'DESC')
		->order_by('id', 'ASC')
		->get()
		->result();
	}

	public function getCategoryById($id)
	{
		return $this->db->select('*')
		->from('categories')
		->where('id', $id)
		->get()
		->row();
	}

	public function addCategory($category_en, $category_ru, $sort)
	{
		$data = array('category_en' => $category_en, 'category_ru' => $category_ru, 'sort' => $sort);
		$this->db->insert('categories', $data);
		return $this->db->insert_id();
	}

	public function editCategory($id, $category_en, $category_ru, $sort)
	{
		$this->db->where('id', $id);
		return $this->db->update('categories', array('category_en' => $category_en, 'category_ru' => $category_ru, 'sort' => $sort));
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
		// $categories = $this->db->select('*')->from('categories')->order_by('sort', 'ASC')->get()->result_array();
		// foreach($categories as $i=>$category) {
		// 	$this->db->where('category_id', $category['id'])->order_by('sort', 'ASC');
		// 	$subcategories = $this->db->get('subcategories')->result_array();
		// 	$categories[$i]['subcategories'] = $subcategories;
		// }
		// return $categories;

		$categories = $this->db->select('*')->from('categories')->order_by('sort', 'ASC')->get()->result_array();
		$subcategories = $this->db->order_by('sort', 'ASC')->get('subcategories')->result_array();
		$c = array();
		// Set categories array index to id
		foreach($categories as $ct){
			$c[$ct['id']] = $ct;
		}
		// Append subcategories to categories
		foreach($subcategories as $sc){
			$c[$sc['category_id']]['subcategories'][] = $sc;
		}
		// Sort array by 'sort' key
		usort($c, function($a, $b){
			return $a['sort'] <=> $b['sort'];
		});
		return $c;
	}

}
