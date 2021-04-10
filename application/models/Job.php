<?php

class job extends CI_Model
{
   public function addJob($userId, $jobtype, $fullname, $phone, $email, $website, $company, $location, $address, $zip, $category, $subcategory,   
      $shorttexten, $shorttextru, $largetexten, $largetextru, $slug, $submitedrenewal, $created_at, $expiring_at, $status)
	{
		$data = array('user_id' => $userId, 'job_type' => $jobtype, 'fullname' => $fullname, 'category_id' => $category, 'subcategory_id' => $subcategory,
         'phone' => $phone, 'email' => $email, 'website' => $website, 'company' => $company, 'location_id' => $location, 'zipcode' => $zip, 'address' => $address,
         'shorttext_en' => $shorttexten, 'shorttext_ru' => $shorttextru, 'largetext_en' => $largetexten, 'largetext_ru' => $largetextru, 'slug' => $slug,
			'submitedrenewal' => $submitedrenewal, 'created_at' => $created_at, 'expiring_at' => $expiring_at, 'status' => $status);
		$this->db->insert('jobs', $data);
		return $this->db->insert_id();
	}

	public function updateImages($userId, $files)
	{
		$this->db->where('id', $userId);
		return $this->db->update('jobs', $files);
	}

	public function clearImage($jobid, $fileid)
	{
		$this->db->where('id', $jobid);
		return $this->db->update('jobs', array('imgfilename'.$fileid => null));
	}

	public function editJob($id, $jobtype, $fullname, $phone, $email, $website, $company, $location, $address, $zip, $category, $subcategory,   
		$shorttexten, $shorttextru, $largetexten, $largetextru, $slug, $submitedrenewal, $status)
	{
		$this->db->where('id', $id);
		return $this->db->update('jobs', array('job_type' => $jobtype, 'fullname' => $fullname, 'phone' => $phone, 'email' => $email, 'website' => $website, 
			'company' => $company, 'location_id' => $location, 'address' => $address, 'zipcode' => $zip, 'category_id' => $category, 'subcategory_id' => $subcategory,			
			'shorttext_en' => $shorttexten, 'shorttext_ru' => $shorttextru, 'largetext_en' => $largetexten, 'largetext_ru' => $largetextru, 
			'slug' => $slug, 'submitedrenewal' => $submitedrenewal, 'status' => $status));
	}

	public function editJobAdmin($id, $jobtype, $fullname, $phone, $email, $website, $company, $location, $address, $zip, $category, $subcategory,   
		$shorttexten, $shorttextru, $largetexten, $largetextru, $slug)
	{
		$this->db->where('id', $id);
		return $this->db->update('jobs', array('job_type' => $jobtype, 'fullname' => $fullname, 'phone' => $phone, 'email' => $email, 'website' => $website, 
			'company' => $company, 'location_id' => $location, 'address' => $address, 'zipcode' => $zip, 'category_id' => $category, 'subcategory_id' => $subcategory,			
			'shorttext_en' => $shorttexten, 'shorttext_ru' => $shorttextru, 'largetext_en' => $largetexten, 'largetext_ru' => $largetextru, 
			'slug' => $slug));
	}

	public function getJobsByUserId($user_id, $limit, $start)
	{
		$this->db->select('J.id, J.user_id, J.job_type, J.fullname, J.phone, J.email, J.website, J.location_id, J.address, J.zipcode, J.category_id, J.subcategory_id,
		J.slug, J.shorttext_en, J.shorttext_ru, J.largetext_en, J.largetext_ru, J.imgfilename1, J.imgfilename2, J.imgfilename3, J.imgfilename4, J.imgfilename5, 
		J.submitedrenewal, J.created_at, J.expiring_at, J.isinitial, J.status, C.category_en, C.category_ru, SC.subcategory_en, SC.subcategory_ru, U.fullname');
		$this->db->from('jobs AS J, categories AS C, subcategories AS SC, users as U');
		$this->db->where('J.user_id', $user_id);
		$this->db->where('J.category_id = C.id');
		$this->db->where('J.subcategory_id = SC.id');
		$this->db->where('J.user_id = U.id');
		$this->db->limit($limit, $start);
		return $this->db->get()->result();
	}

	public function getMyJobsCount($user_id)
	{
		return $this->db->select('*')->from('jobs')->where('user_id', $user_id)->count_all_results();
	}

	public function getUserIdByJobId($id){
		return $this->db->select('*')->from('jobs')->where('id', $id)->get()->row('user_id');
	}

	public function deleteJob($id){
		return $this->db->where('id', $id)->delete('jobs');
	}

	public function getImages($id){
		return $this->db->select('imgfilename1, imgfilename2, imgfilename3, imgfilename4, imgfilename5')->from('jobs')->where('id', $id)->get()->row();
	}

	public function getJobById($id)
	{
		$this->db->select('J.id, J.user_id, J.job_type, J.fullname, J.phone, J.email, J.website, J.company, J.location_id, J.address, J.zipcode, J.category_id, 
		J.subcategory_id, J.slug, J.shorttext_en, J.shorttext_ru, J.largetext_en, J.largetext_ru, J.imgfilename1, J.imgfilename2, J.imgfilename3, J.imgfilename4, 
		J.imgfilename5, J.submitedrenewal, J.created_at, J.expiring_at, J.isinitial, J.status, C.category_en, C.category_ru, SC.subcategory_en, SC.subcategory_ru, 
		L.location, JT.job_type_en, JT.job_type_ru, AVG(R.stars) AS averageRate, COUNT(R.stars) AS rateCount, COUNT(PV.id) AS viewCount');
		$this->db->from('jobs AS J');
		$this->db->where('J.id', $id);
		$this->db->join('categories AS C', 'J.category_id = C.id');
		$this->db->join('subcategories AS SC', 'J.subcategory_id = SC.id');
		$this->db->join('locations AS L', 'J.location_id = L.id');
		$this->db->join('jobtypes AS JT', 'J.job_type = JT.id');
		$this->db->join('ratings AS R', 'J.id = R.job_id', 'left outer');
		$this->db->join('pageviews AS PV', 'J.id = PV.job_id', 'left outer');
		return $this->db->get()->row();
	}

	public function getCountByCatScat()
	{
		$this->db->select('category_id AS category, subcategory_id AS subcategory, COUNT(id) AS num_jobs');
		$this->db->where('expiring_at >', time());
		$this->db->where('status', 1);
		$this->db->order_by('category','asc'); 
		$this->db->group_by('category, subcategory'); 
		return  $this->db->get('jobs')->result_array();	
	}

	public function getCountByCat()
	{
		$this->db->select('category_id AS category, COUNT(id) AS num_jobs');
		$this->db->where('expiring_at >', time());
		$this->db->where('status', 1);
		$this->db->order_by('category','asc'); 
		$this->db->group_by('category'); 
		return  $this->db->get('jobs')->result_array();	
	}

	public function submitForRenewal($id){
		$this->db->where('id', $id);
		return $this->db->update('jobs', array('submitedrenewal' => 1));
	}

	
	public function getActiveJobsCountByCategoryId($id){
		return $this->db->select('*')->from('jobs')->where('category_id', $id)->where('status', 1)->where('expiring_at >', time())->count_all_results();
	}
	public function getActiveJobsByCategoryId($categoryid, $limit, $start)
	{
		$this->db->select('J.id, J.user_id, J.job_type, J.fullname, J.phone, J.email, J.website, J.location_id, J.address, J.zipcode, J.category_id, J.subcategory_id,
		J.slug, J.shorttext_en, J.shorttext_ru, J.largetext_en, J.largetext_ru, J.imgfilename1, J.imgfilename2, J.imgfilename3, J.imgfilename4, J.imgfilename5, 
		J.submitedrenewal, J.created_at, J.expiring_at, J.isinitial, J.status, C.category_en, C.category_ru, SC.subcategory_en, SC.subcategory_ru, L.location,
		AVG(R.stars) AS averageRate, COUNT(R.stars) AS rateCount');
		$this->db->from('jobs AS J');
		$this->db->where('J.category_id', $categoryid);
		$this->db->where('J.status', 1);
		$this->db->where('J.expiring_at >', time());
		$this->db->join('categories AS C', 'J.category_id = C.id');
		$this->db->join('subcategories AS SC', 'J.subcategory_id = SC.id');
		$this->db->join('locations AS L', 'J.location_id = L.id');
		$this->db->join('ratings AS R', 'J.id = R.job_id', 'left outer');
		$this->db->group_by('J.id');
		$this->db->order_by('job_type', 'DESC');
		$this->db->limit($limit, $start);
		return $this->db->get()->result();
	}

	public function getActiveJobsCountBysubcategoryId($id){
		return $this->db->select('*')->from('jobs')->where('subcategory_id', $id)->where('status', 1)->where('expiring_at >', time())->count_all_results();
	}
	public function getActiveJobsBySubcategoryId($subcategoryid, $limit, $start)
	{
		$this->db->select('J.id, J.user_id, J.job_type, J.fullname, J.phone, J.email, J.website, J.location_id, J.address, J.zipcode, J.category_id, J.subcategory_id,
		J.slug, J.shorttext_en, J.shorttext_ru, J.largetext_en, J.largetext_ru, J.imgfilename1, J.imgfilename2, J.imgfilename3, J.imgfilename4, J.imgfilename5, 
		J.submitedrenewal, J.created_at, J.expiring_at, J.isinitial, J.status, C.category_en, C.category_ru, SC.subcategory_en, SC.subcategory_ru, L.location, 
		AVG(R.stars) AS averageRate, COUNT(R.stars) AS rateCount');
		$this->db->from('jobs AS J');
		$this->db->where('J.subcategory_id', $subcategoryid);
		$this->db->where('J.status', 1);
		$this->db->where('J.expiring_at >', time());
		$this->db->join('categories AS C', 'J.category_id = C.id');
		$this->db->join('subcategories AS SC', 'J.subcategory_id = SC.id');
		$this->db->join('locations AS L', 'J.location_id = L.id');
		$this->db->join('ratings AS R', 'J.id = R.job_id', 'left outer');	
		$this->db->group_by('J.id');
		$this->db->order_by('job_type', 'DESC');
		$this->db->limit($limit, $start);
		return $this->db->get()->result();
	}

	public function getActiveJobsCountByLocationId($id){
		return $this->db->select('*')->from('jobs')->where('location_id', $id)->where('status', 1)->where('expiring_at >', time())->count_all_results();
	}
	public function getActiveJobsByLocationId($locationid, $limit, $start)
	{
		$this->db->select('J.id, J.user_id, J.job_type, J.fullname, J.phone, J.email, J.website, J.location_id, J.address, J.zipcode, J.category_id, J.subcategory_id,
		J.slug, J.shorttext_en, J.shorttext_ru, J.largetext_en, J.largetext_ru, J.imgfilename1, J.imgfilename2, J.imgfilename3, J.imgfilename4, J.imgfilename5, 
		J.submitedrenewal, J.created_at, J.expiring_at, J.isinitial, J.status, C.category_en, C.category_ru, SC.subcategory_en, SC.subcategory_ru, L.location,
		AVG(R.stars) AS averageRate, COUNT(R.stars) AS rateCount');
		$this->db->from('jobs AS J');
		$this->db->where('J.location_id', $locationid);
		$this->db->where('J.status', 1);
		$this->db->where('J.expiring_at >', time());
		$this->db->join('categories AS C', 'J.category_id = C.id');
		$this->db->join('subcategories AS SC', 'J.subcategory_id = SC.id');
		$this->db->join('locations AS L', 'J.location_id = L.id');
		$this->db->join('ratings AS R', 'J.id = R.job_id', 'left outer');	
		$this->db->group_by('J.id');
		$this->db->order_by('job_type', 'DESC');
		$this->db->limit($limit, $start);
		return $this->db->get()->result();
	}

	public function getActiveJobsCountByKeywordLocationId($keyword, $locationid){
		$this->db->select('*')->from('jobs');
		$this->db->group_start();
			$locationid==0 ? $this->db->where('location_id >', $locationid) : $this->db->where('location_id', $locationid);
			$this->db->where('status', 1);
			$this->db->where('expiring_at >', time());
			$this->db->group_start();
				$this->db->like('shorttext_en', $keyword)->or_like('shorttext_ru', $keyword)->or_like('largetext_en', $keyword)->or_like('largetext_ru', $keyword);
			$this->db->group_end();
		$this->db->group_end();		
		return $this->db->count_all_results();
	}
	public function getActiveJobsByKeywordLocation($keyword, $locationid, $limit, $start)
	{
		$this->db->select('J.id, J.user_id, J.job_type, J.fullname, J.phone, J.email, J.website, J.location_id, J.address, J.zipcode, J.category_id, J.subcategory_id,
		J.slug, J.shorttext_en, J.shorttext_ru, J.largetext_en, J.largetext_ru, J.imgfilename1, J.imgfilename2, J.imgfilename3, J.imgfilename4, J.imgfilename5, 
		J.submitedrenewal, J.created_at, J.expiring_at, J.isinitial, J.status, C.category_en, C.category_ru, SC.subcategory_en, SC.subcategory_ru, L.location, 
		AVG(R.stars) AS averageRate, COUNT(R.stars) AS rateCount');
		$this->db->from('jobs AS J');
		$this->db->group_start();
			$locationid==0 ? $this->db->where('J.location_id >', $locationid) : $this->db->where('J.location_id', $locationid);
			$this->db->where('J.status', 1);
			$this->db->where('J.expiring_at >', time());
			$this->db->group_start();
				$this->db->like('J.shorttext_en', $keyword)->or_like('J.shorttext_ru', $keyword)->or_like('J.largetext_en', $keyword)->or_like('J.largetext_ru', $keyword);
			$this->db->group_end();
		$this->db->group_end();
		$this->db->join('categories AS C', 'J.category_id = C.id');
		$this->db->join('subcategories AS SC', 'J.subcategory_id = SC.id');
		$this->db->join('locations AS L', 'J.location_id = L.id');	
		$this->db->join('ratings AS R', 'J.id = R.job_id', 'left outer');	
		$this->db->group_by('J.id');
		$this->db->order_by('job_type', 'DESC');
		$this->db->limit($limit, $start);
		return $this->db->get()->result();
	}

	public function getAllJobsCount(){
		return $this->db->select('*')->from('jobs')->count_all_results();
	}

	public function getAllJobs(){//$limit, $start  //for admin panel, used datatable
		$this->db->select('J.id, J.user_id, J.job_type, J.fullname, J.phone, J.email, J.website, J.location_id, J.address, J.zipcode, J.category_id, J.subcategory_id,
		J.slug, J.shorttext_en, J.shorttext_ru, J.largetext_en, J.largetext_ru, J.imgfilename1, J.imgfilename2, J.imgfilename3, J.imgfilename4, J.imgfilename5, 
		J.submitedrenewal, J.created_at, J.expiring_at, J.isinitial, J.status, C.category_en, C.category_ru, SC.subcategory_en, SC.subcategory_ru, L.location, 
		JT.job_type_en, U.fullname AS user_fullname, U.email AS user_email');
		$this->db->from('jobs AS J');
		$this->db->join('categories AS C', 'J.category_id = C.id');
		$this->db->join('subcategories AS SC', 'J.subcategory_id = SC.id');
		$this->db->join('locations AS L', 'J.location_id = L.id');
		$this->db->join('jobtypes AS JT', 'J.job_type = JT.id');
		$this->db->join('users AS U', 'J.user_id = U.id');
		//$this->db->limit($limit, $start);
		return $this->db->get()->result();
	}








}
