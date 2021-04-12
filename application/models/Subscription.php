<?php

class subscription extends CI_Model
{

   public function getSubscriptions($id)
	{
		$this->db->select('SU.id, SU.user_id, SU.category_id, SU.subcategory_id, SU.c_sc, CT.category_en, CT.category_ru, SC.subcategory_en, SC.subcategory_ru');
      $this->db->from('subscriptions AS SU');
      $this->db->where('SU.user_id', $id);
      $this->db->join('categories AS CT', 'CT.id = SU.category_id', 'left');
      $this->db->join('subcategories AS SC', 'SU.subcategory_id = SC.id', 'left');
      return $this->db->get()->result(); 
      // $sql = "SELECT SU.id, SU.user_id, SU.category_id, SU.subcategory_id, SU.c_sc, CT.category_en, CT.category_ru, SC.subcategory_en, SC.subcategory_ru
      // FROM subscriptions AS SU LEFT JOIN categories AS CT ON CT.id = SU.category_id LEFT JOIN subcategories AS SC ON SU.subcategory_id = SC.id";
      // return $this->db->query($sql)->result();
	}

	public function getAllSubscriptions()
	{
		return $this->db->select('*')->from('subscriptions')->get()->result(); 
	}

	public function addSubscription($user_id, $category_id, $subcategory_id, $c_sc)
	{
      if(!$this->db->select('*')->from('subscriptions')->where(array('user_id'=>$user_id, 'category_id'=>$category_id, 'subcategory_id'=>$subcategory_id, 'c_sc'=>$c_sc))->count_all_results()){
         $this->db->insert('subscriptions', array('user_id' => $user_id, 'category_id' => $category_id, 'subcategory_id' => $subcategory_id, 'c_sc' => $c_sc));
         return $this->db->insert_id();
      }else{
         return 'false';
      }		
	}

   public function deleteSubscription($id){
		return $this->db->where('id', $id)->delete('subscriptions');
	}

   public function getUserIdBySubscriptionId($id){
      return $this->db->select('*')->from('subscriptions')->where('id', $id)->get()->row('user_id');
        
   }






	

}
