<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

   public function __construct() {

      parent::__construct();
      //if (!$this->session->userdata('logged_in') || $this->session->userdata('user_role') != 1) redirect('auth/login');
      $this->load->library('form_validation');
      $this->load->helper("security");
      $this->load->library('pagination');      
      $this->load->config('appconfig');      
   }

	public function index()
	{
      $this->dashboard();
	}

   public function dashboard()
	{
      $data['pageN'] = 1;
		return $this->load->view('admin/dashboard', $data);
	}

   public function users()
	{
      $data['pageN'] = 2;
      $this->load->model('user');

      $config = $this->config->item('adminPaginationConfig');
      $config['base_url'] = base_url('admin/users');
      $config['total_rows'] =  $this->user->getNonAdminUsersCount();
      $this->pagination->initialize($config);
      $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
       
      $data['links'] = $this->pagination->create_links();
      $data['page'] = $page;
      $data['users'] = $this->user->getNonAdminUsers($config["per_page"], $page);
		return $this->load->view('admin/users', $data);
	}


   public function jobs()
	{
      
      $data['pageN'] = 3;
      $this->load->model('jobtype');
      $data['jobTypes'] = $this->jobtype->getJobTypes();  
      $this->load->model('job');


      // $this->form_validation->set_data($_GET);
      // $this->form_validation->set_rules('searchText', 'Keyword', 'xss_clean|max_length[100]');      
      // if ($this->form_validation->run()) {
      //    $searchText = $this->input->get('searchText', true);
      //    $jobType = filter_var($this->input->get('jobType'), FILTER_VALIDATE_INT)?$this->input->get('jobType'):0;
      //    $jobStatus = $this->input->get('jobStatus');
      //    $subRenewal = $this->input->get('subRenewal');

      //    echo $searchText.'*'.$jobType.'*'.$jobStatus.'*'.$subRenewal;


         // $location = $this->input->get('location', true);
         // $total_rows = $this->job->getActiveJobsCountByKeywordLocationId($keyword, $location);
         // $config = $this->config->item('searchPaginationConfig');
         // $config['suffix'] =  $this->input->get('keyword')? '?'.http_build_query($_GET, '', "&") : '?keyword=&location='.$location;
         // $config["base_url"] = base_url('jobs/search');
         // $config['first_url'] = $config['base_url'].'?'.http_build_query($_GET);         
         // $config["total_rows"] = $total_rows;
         // $this->pagination->initialize($config);
         // $data['links'] = $this->pagination->create_links();
         // $page = $this->uri->segment(3) ? $this->uri->segment(3) : $page = 0;
         // $data['jobs'] = $this->job->getActiveJobsByKeywordLocation($keyword, $location, $config["per_page"], $page);
         // $data['numSearchResult'] = $total_rows;
         // $data['keyword'] = $keyword;
         // $data['location'] = $location;
         // $this->load->model('image');
		   // $data['images'] = $this->image->getImageNames();
         // $data['bgPath'] = base_url($this->config->item('bgImagesUploadConfig')['upload_path']);
         // $this->load->view('jobs', $data); 
      // }else{return redirect ('/');}



      // $config = $this->config->item('adminPaginationConfig');
      // $config['base_url'] = base_url('admin/jobs');
      // $config['total_rows'] =  $this->job->getAllJobsCount();
      // $this->pagination->initialize($config);
      // $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
      // $data['links'] = $this->pagination->create_links();
      // $data['page'] = $page;
      // $data['jobs'] = $this->job->getAllJobs($config["per_page"], $page);
      $data['jobs'] = $this->job->getAllJobs();
		return $this->load->view('admin/jobs', $data);
	}

   public function editjob($id)
	{
      $data['pageN'] = 99;
      if($id && filter_var($id, FILTER_VALIDATE_INT)){
         $this->load->model('jobtype');
         $this->load->model('location');
         $this->load->model('category');
         $this->load->model('subcategory');
         $this->load->model('job');
         $data['jobTypes'] = $this->jobtype->getJobTypes();
         $data['locations'] = $this->location->getLocations();
         $data['categories'] = $this->category->getCategories();

         if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST'){
            $this->form_validation->set_rules('fullname', 'Full name', 'trim|required|xss_clean|min_length[2]|max_length[200]');
            $this->form_validation->set_rules('jobtype', 'Job type', 'required|integer|less_than['.(count($data['jobTypes'])+1).']');
            $this->form_validation->set_rules('category', 'Category', 'required|integer');
            $this->form_validation->set_rules('subcategory', 'Subcategory', 'required|integer');
            $this->form_validation->set_rules('phone', 'Phone', 'trim|required|xss_clean');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean|min_length[5]|max_length[100]');
            $this->form_validation->set_rules('website', 'Website', 'trim|required|valid_url|xss_clean|min_length[5]|max_length[200]');
            $this->form_validation->set_rules('location', 'Location', 'required|integer');
            $this->form_validation->set_rules('zip', 'Zip code', 'alpha_dash|required|xss_clean');
            $this->form_validation->set_rules('address', 'Address', 'trim|required|xss_clean|min_length[4]|max_length[200]');
            $this->form_validation->set_rules('shorttexten', 'Short text English', 'trim|required|xss_clean|min_length[4]|max_length[250]');
            $this->form_validation->set_rules('shorttextru', 'Short text Russian', 'trim|xss_clean|max_length[250]');
            $this->form_validation->set_rules('largetexten', 'Long text English', 'trim|required|xss_clean');
            $this->form_validation->set_rules('largetextru', 'Long text Russian', 'trim|xss_clean');
            if($this->input->post('jobtype')>1)
               $this->form_validation->set_rules('company', 'Company', 'xss_clean|min_length[2]|max_length[100]');
            else
               $this->form_validation->set_rules('company', 'Company', 'required|xss_clean|min_length[2]|max_length[100]');
                       
            //if validation passed save data to db
            if ($this->form_validation->run()) {
               $jobid = $this->job->editJobAdmin(
                  $id,
                  $this->input->post('jobtype'),
                  $this->input->post('fullname', true),
                  $this->input->post('phone', true),
                  $this->input->post('email', true),
                  $this->input->post('website', true),
                  $this->input->post('company', true),
                  $this->input->post('location'),
                  $this->input->post('address', true),
                  $this->input->post('zip', true),
                  $this->input->post('category'),
                  $this->input->post('subcategory'),
                  $this->input->post('shorttexten', true),
                  $this->input->post('shorttextru', true), 
                  $this->input->post('largetexten', true),
                  $this->input->post('largetextru', true), 
                  strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $this->input->post('shorttexten', true)))
               );              
                
               //if data saved set message
               if($jobid){           
                  $this->session->set_flashdata('addJobResult', array('status' => true, 'message' => "job added successfully"));
               }else{
                  $this->session->set_flashdata('addJobResult', array('status' => false, 'message' => "error adding job"));
               }
            }
         }
         $data['currentJob'] = $this->job->getJobById($id);   
         $data['subcategories'] = $this->subcategory->getSubcategoriesByCategoryId($data['currentJob']->category_id);
         $this->load->view('admin/editjob', $data);
      }else{
         return redirect('profile');
      }
      
   }


   public function categories()
	{
      $data['pageN'] = 4;
		$this->load->model('category');
		$data['categories'] = $this->category->getCategorySubcategory();
      $this->load->view('admin/categories', $data);      
   }

   public function addcategory()
	{
      $data['pageN'] = 5;      
      if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST'){     
         $this->form_validation->set_rules('category_en', 'Category English', 'trim|required|xss_clean|min_length[2]|max_length[200]|is_unique[categories.category_en]');
         $this->form_validation->set_rules('category_ru', 'Category Russian', 'trim|required|xss_clean|min_length[2]|max_length[200]|is_unique[categories.category_ru]');
         if (empty($_FILES['icon']['name'])) $this->form_validation->set_rules('icon', 'Category image', 'required');
         //if validation passed save data to db
         if ($this->form_validation->run()) {
            $this->load->model('category');
            $catId = $this->category->addCategory(
               $this->input->post('category_en', true),
               $this->input->post('category_ru', true)
            );
            
            //if data saved try to upload image
            if($catId){
               $filename = 'icon'.'_'.$catId;
               $config = $this->config->item('categoryIconUploadConfig');
               $config['file_name'] = $filename;
               $this->load->library('upload');
               $this->upload->initialize($config);

               $originalFileName = $_FILES['icon']['name'];
               $ext = pathinfo($originalFileName, PATHINFO_EXTENSION);
               
               if ($this->upload->do_upload('icon')) {
                  $this->category->updateImage($catId, $filename.'.'.$ext);
                  $this->session->set_flashdata('flashMsg', array('status' => true, 'message' => "job added successfully"));
               }else {
                  $this->category->deleteCategory($catId);
                  $this->session->set_flashdata('flashMsg', array('status' => false, 'message' => "job added successfully"));
               }
            }else{
               $this->session->set_flashdata('flashMsg', array('status' => false, 'message' => "error adding job"));
            }
         }
      }
      $this->load->view('admin/addcategory', $data);      
   }


   public function editcategory($id=0)
	{
      $data['pageN'] = 99;
      if($id && filter_var($id, FILTER_VALIDATE_INT)){
         $this->load->model('category');
         $category = $this->category->getCategoryById($id);         
         $iconPath = base_url($this->config->item('categoryIconUploadConfig')['upload_path']); 
         
         if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST'){
            $this->form_validation->set_rules('category_en', 'Category English', 'trim|required|xss_clean|min_length[2]|max_length[200]');
            $this->form_validation->set_rules('category_ru', 'Category Russian', 'trim|required|xss_clean|min_length[2]|max_length[200]');
            //if validation passed save data to db
            if ($this->form_validation->run()) {
               $filename = 'icon'.'_'.$id;
               $config = $this->config->item('categoryIconUploadConfig');
               $config['file_name'] = $filename;
               $this->load->library('upload');
               $this->upload->initialize($config);

               if($_FILES['icon']['name']){
                  if ($this->upload->do_upload('icon')){
                     if($this->category->editCategory($id, $this->input->post('category_en', true), $this->input->post('category_ru', true))){           
                        $this->session->set_flashdata('flashMsg', array('status' => true, 'message' => "job added successfully"));
                        return redirect('admin/categories');
                     }else{
                        $this->session->set_flashdata('flashMsg', array('status' => false, 'message' => "error adding job"));
                     }
                  }else{
                     // couldnot upoad image, ie different type or larger size
                     $this->session->set_flashdata('flashMsg', array('status' => false, 'message' => "error uploading image"));
                  }
               }else{
                  if($this->category->editCategory($id, $this->input->post('category_en', true), $this->input->post('category_ru', true))){
                     $this->session->set_flashdata('flashMsg', array('status' => true, 'message' => "job added successfully"));
                     return redirect('admin/categories');
                  }else{
                     $this->session->set_flashdata('flashMsg', array('status' => false, 'message' => "error adding job"));
                  }
               }
            }
         }
         $data['category'] = $category;         
         $data['iconPath'] = $iconPath;         
         if ($data['category'])
            $this->load->view('admin/editcategory', $data);
         else
            return redirect('admin/categories');
      }else{
         return redirect('admin/categories');
      }      
   }


   public function deletecategory($id=0)
	{
      $data['pageN'] = 99;
      if($id && filter_var($id, FILTER_VALIDATE_INT)){
         $this->load->model('category');
         $category = $this->category->getCategoryById($id);
         if ($category){
            if($this->category->deleteCategory($id)){
               unlink($this->config->item('categoryIconUploadConfig')['upload_path'] . $category->filename);
               $this->session->set_flashdata('flashMsg', array('status' => true, 'message' => "job added successfully"));
            }else{
               $this->session->set_flashdata('flashMsg', array('status' => false, 'message' => "error adding job"));
            }
         }         
      }
      return redirect('admin/categories');            
   }

   
   public function addsubcategory($id=0)
	{
      $data['pageN'] = 6;
      $data['id'] = filter_var($id, FILTER_VALIDATE_INT) ? $id : 0;
      $this->load->model('category');      
      $data['categories'] = $this->category->getCategories();      
      if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST'){  
         $this->subCategoryValidation();         
         //if validation passed save data to db
         if ($this->form_validation->run()) {
            $this->load->model('subcategory');
            $subCatId = $this->subcategory->addSubcategory(
               $this->input->post('category'),
               $this->input->post('subcategory_en', true),
               $this->input->post('subcategory_ru', true)
            );
            
            if($subCatId){
               $this->session->set_flashdata('addSubcatResult', array('status' => true, 'message' => "job added successfully"));
            }else {
               $this->session->set_flashdata('addSubcatResult', array('status' => false, 'message' => "job added successfully"));
            }
         }
      }
      $this->load->view('admin/addsubcategory', $data);
   }


   public function editsubcategory($id=0)
	{
      $data['pageN'] = 99;
      if($id && filter_var($id, FILTER_VALIDATE_INT)){
         $this->load->model('category');
         $data['categories'] = $this->category->getCategories();
         $this->load->model('subcategory');
         $data['subcategory'] = $this->subcategory->getSubcategoryById($id);
         
         if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST'){
            $this->form_validation->set_rules('category', 'Category', 'required|integer');
            $this->form_validation->set_rules('subcategory_en', 'Subcategory English', 'trim|required|xss_clean|min_length[2]|max_length[200]');
            $this->form_validation->set_rules('subcategory_ru', 'Subcategory Russian', 'trim|required|xss_clean|min_length[2]|max_length[200]');
            //if validation passed save data to db
            if ($this->form_validation->run()) {
               if($this->subcategory->editSubcategory($id, $this->input->post('category'), $this->input->post('subcategory_en', true), $this->input->post('subcategory_ru', true))){           
                  $this->session->set_flashdata('flashMsg', array('status' => true, 'message' => "job added successfully"));
                  return redirect('admin/categories');
               }else{
                  $this->session->set_flashdata('flashMsg', array('status' => false, 'message' => "error adding job"));
               }                 
            }
         }       
         if ($data['subcategory'])
            $this->load->view('admin/editsubcategory', $data);
         else
            return redirect('admin/categories');
      }else{
         return redirect('admin/categories');
      }      
   }

   public function deletesubcategory($id=0)
	{
      $data['pageN'] = 99;
      if($id && filter_var($id, FILTER_VALIDATE_INT)){
         $this->load->model('subcategory');
         $subcategory = $this->subcategory->getSubcategoryById($id);
         if ($subcategory){
            if($this->subcategory->deleteSubcategory($id)){
               $this->session->set_flashdata('flashMsg', array('status' => true, 'message' => "job added successfully"));
            }else{
               $this->session->set_flashdata('flashMsg', array('status' => false, 'message' => "error adding job"));
            }
         }         
      }
      return redirect('admin/categories');            
   }


   public function locations()
	{
      $data['pageN'] = 7;      
      $this->load->model('location');
		$data['locations'] = $this->location->getLocations();
      $this->load->view('admin/locations', $data);      
   }

   public function addlocation($id=0)
	{
      $data['pageN'] = 8;
      $data['id'] = filter_var($id, FILTER_VALIDATE_INT) ? $id : 0; 
      if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST'){  
         $this->form_validation->set_rules('location', 'Location', 'trim|required|xss_clean|min_length[2]|max_length[200]|is_unique[locations.location]');        
         //if validation passed save data to db
         if ($this->form_validation->run()) {
            $this->load->model('location');            
            if($this->location->addLocation($this->input->post('location'))){
               $this->session->set_flashdata('addLocResult', array('status' => true, 'message' => "job added successfully"));
            }else {
               $this->session->set_flashdata('addLocResult', array('status' => false, 'message' => "job added successfully"));
            }
         }
      }
      $this->load->view('admin/addlocation', $data);
   }

   public function editlocation($id=0)
	{
      $data['pageN'] = 99;
      if($id && filter_var($id, FILTER_VALIDATE_INT)){
         $this->load->model('location');         
         
         if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST'){
            $this->form_validation->set_rules('location', 'Location', 'trim|required|xss_clean|min_length[2]|max_length[200]|is_unique[locations.location]');
            //if validation passed save data to db
            if ($this->form_validation->run()) {
               //if data saved set flash message
               if($this->location->updateLocation($id, $this->input->post('location', true))){           
                  $this->session->set_flashdata('flashMsg', array('status' => true, 'message' => "job added successfully"));
                  return redirect('admin/locations');
               }else{
                  $this->session->set_flashdata('flashMsg', array('status' => false, 'message' => "error adding job"));
               }
            }
         }

         $data['location'] = $this->location->getLocationById($id);
         if ($data['location'])
            $this->load->view('admin/editlocation', $data);
         else
            return redirect('admin/locations');
      }else{
         return redirect('admin/locations');
      }      
   }

   public function deletelocation($id=0)
	{
      $data['pageN'] = 99;
      if($id && filter_var($id, FILTER_VALIDATE_INT)){
         $this->load->model('location');         
         if($this->location->deleteLocation($id)){           
            $this->session->set_flashdata('flashMsg', array('status' => true, 'message' => "job added successfully"));
            return redirect('admin/locations');
         }else{
            $this->session->set_flashdata('flashMsg', array('status' => false, 'message' => "error adding job"));
         }
      }
      return redirect('admin/locations');            
   }


   public function editimages()
	{
      $data['pageN'] = 9;      
      $this->load->model('image'); 
      if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST'){         
         //set file upload config for images
         $filename = 'maincover';
         $config = $this->config->item('bgImagesUploadConfig');
         $config['file_name'] = $filename;
         $this->load->library('upload');
         $this->upload->initialize($config);
         $ext = pathinfo($_FILES['main']['name'], PATHINFO_EXTENSION);
         if($_FILES['main']['name'])
            if ($this->upload->do_upload('main'))
               $this->image->editImage(1, $filename.'.'.$ext);

         $filename = 'jobscover';
         $config = $this->config->item('bgImagesUploadConfig');
         $config['file_name'] = $filename;
         $this->load->library('upload');
         $this->upload->initialize($config);
         $ext = pathinfo($_FILES['job']['name'], PATHINFO_EXTENSION);
         if($_FILES['job']['name'])
            if ($this->upload->do_upload('job'))
               $this->image->editImage(2, $filename.'.'.$ext);

         $filename = 'logo';
         $config = $this->config->item('bgImagesUploadConfig');
         $config['file_name'] = $filename;
         $this->load->library('upload');
         $this->upload->initialize($config);
         $ext = pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION);
         if($_FILES['logo']['name'])
            if ($this->upload->do_upload('logo'))
               $this->image->editImage(3, $filename.'.'.$ext);
         
         $filename = 'favicon';
         $config = $this->config->item('bgImagesUploadConfig');
         $config['file_name'] = $filename;
         $this->load->library('upload');
         $this->upload->initialize($config);
         $ext = pathinfo($_FILES['favicon']['name'], PATHINFO_EXTENSION);
         if($_FILES['favicon']['name'])
            if ($this->upload->do_upload('favicon'))
               $this->image->editImage(4, $filename.'.'.$ext);
         
      }
      $data['bgPath'] = base_url($this->config->item('bgImagesUploadConfig')['upload_path']);
      $data['images'] = $this->image->getImageNames();
      $this->load->view('admin/editimages', $data);
   }


   
   
   private function subCategoryValidation(){
      $this->form_validation->set_rules('category', 'Category', 'required|integer');
      $this->form_validation->set_rules('subcategory_en', 'Subcategory English', 'trim|required|xss_clean|min_length[2]|max_length[200]|is_unique[subcategories.subcategory_en]');
      $this->form_validation->set_rules('subcategory_ru', 'Subcategory Russian', 'trim|required|xss_clean|min_length[2]|max_length[200]|is_unique[subcategories.subcategory_ru]');
   }

  


















































   public function myjobs()
	{
      $this->load->model('jobtype');
      $this->load->model('location');
      $this->load->model('category');
      $data['jobTypes'] = $this->jobtype->getJobTypes();
      $data['locations'] = $this->location->getLocations();
      $data['categories'] = $this->category->getCategories();
      
      $config = $this->config->item('profilePaginationConfig');
      $config['base_url'] = base_url() . 'profile/myjobs';
      $config['total_rows'] =  $this->job->getMyJobsCount($this->session->userdata('user_id'));
      $this->pagination->initialize($config);
      $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
       
      $data['links'] = $this->pagination->create_links();
      $data['page'] = $page;
      $data['myJobs'] = $this->job->getJobsByUserId($this->session->userdata('user_id'), $config["per_page"], $page);
      // add job status and passed time from active to array
      foreach($data['myJobs'] as $myjob){
         $myjob->jobStatus = $this->setStatus($myjob);
         $myjob->activePassed = $this->setActivePassed(
            $myjob, 
            $data['jobTypes'][$myjob->job_type - 1]->initial_period, 
            $data['jobTypes'][$myjob->job_type - 1]->renewal_period
         );
      }      
      $this->load->view('profile/myjobs', $data);
	}

   public function addjobX()
	{
      $this->load->model('jobtype');
      $this->load->model('location');
      $this->load->model('category');
      $data['jobTypes'] = $this->jobtype->getJobTypes();
      $data['locations'] = $this->location->getLocations();
      $data['categories'] = $this->category->getCategories();

      if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST'){            
         $this->form_validation->set_rules('fullname', 'Full name', 'trim|required|xss_clean|min_length[2]|max_length[200]');
         $this->form_validation->set_rules('category', 'Category', 'required|integer');
         $this->form_validation->set_rules('subcategory', 'Subcategory', 'required|integer');
         $this->form_validation->set_rules('jobtype', 'Job type', 'required|integer|greater_than[0]|less_than['.(count($data['jobTypes'])+1).']');
         $this->form_validation->set_rules('phone', 'Phone', 'trim|required|xss_clean');
         $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean|min_length[5]|max_length[100]');
         $this->form_validation->set_rules('website', 'Website', 'trim|required|valid_url|xss_clean|min_length[5]|max_length[200]');
         $this->form_validation->set_rules('location', 'Location', 'required|integer');
         $this->form_validation->set_rules('zip', 'Zip code', 'alpha_dash|required|xss_clean');
         $this->form_validation->set_rules('address', 'Address', 'trim|required|xss_clean|min_length[4]|max_length[200]');
         $this->form_validation->set_rules('shorttexten', 'Short text English', 'trim|required|xss_clean|min_length[4]|max_length[250]');
         $this->form_validation->set_rules('shorttextru', 'Short text Russian', 'trim|xss_clean|max_length[250]');
         $this->form_validation->set_rules('largetexten', 'Long text English', 'trim|required|xss_clean');
         $this->form_validation->set_rules('largetextru', 'Long text Russian', 'trim|xss_clean');
         // first input file element must have image 
         if (empty($_FILES['file1']['name'])){
            $this->form_validation->set_rules('file1', 'Image', 'required');
         }
         // if selected jobtype has initial_price
         $appPrice = $data['jobTypes'][$this->input->post('jobtype')-1]->initial_price;
         if($appPrice > 0){
            if($this->input->post('paypaltoken')){
               // Validate token ?
            }
            else{
               $year = date("Y");
               $this->form_validation->set_rules('cardholder', 'Card holder', 'trim|required');
               $this->form_validation->set_rules('cardnumber', 'Card number', 'trim|required|numeric');
               $this->form_validation->set_rules('cardmonth', 'Card expiration month', 'required|integer|greater_than[0]|less_than[13]');
               $this->form_validation->set_rules('cardyear', 'Card expiration year', 'required|integer|greater_than['.($year-1).']|less_than['.($year+11).']');
               $this->form_validation->set_rules('cardcvv', 'Card CVV number', 'trim|required|numeric|min_length[3]|max_length[4]');
            }
         }

         //if validation passed save data to db
         if ($this->form_validation->run()) {
            $jobid = $this->job->addJob(
               $this->session->userdata('user_id'),
               $this->input->post('hjobtype'),
               $this->input->post('fullname', true),
               $this->input->post('phone', true),
               $this->input->post('email', true),
               $this->input->post('website', true),
               $this->input->post('location'),
               $this->input->post('address', true),
               $this->input->post('zip', true),
               $this->input->post('category'),
               $this->input->post('subcategory'),
               $this->input->post('shorttexten', true),
               $this->input->post('shorttextru', true), 
               $this->input->post('largetexten', true),
               $this->input->post('largetextru', true), 
               strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $this->input->post('shorttexten', true))),
               $appPrice > 0 && !$this->input->post('paypaltoken') ? 1 : 0,
               time(),
               time() + $data['jobTypes'][$this->input->post('hjobtype')-1]->initial_period,
               1 //job status needs modification for GOLD applications (paypal token validation) !!!!!!!!!!!!!!!!!!!!!!!!!!!!!
            );

            //if either card data or paypal data is present save data to database
            if($jobid && $data['jobTypes'][$this->input->post('hjobtype')-1]->initial_price > 0){
               $this->load->model('payment');
               if($this->input->post('paypaltoken')){
                  $this->payment->addPPPayment(
                     $jobid, 
                     $this->input->post('paypaltoken'));
               }else{
                  $cardmonth = $this->input->post('cardmonth')<10?'0'.$this->input->post('cardmonth'):$this->input->post('cardmonth');
                  $this->payment->addCCPayment(
                     $jobid, 
                     $this->input->post('cardholder', true), 
                     $this->input->post('cardnumber'), 
                     $cardmonth . '/' . $this->input->post('cardyear'), 
                     $this->input->post('cardcvv', true));
               }
            }
            
            //if data saved try to upload images
            if($jobid){
               $newFiles = array();
               $oldFiles = array();
               $notUploadedFiles = array();
               $uploadFolder = $this->config->item('uploadFolder');
               //get numbers of files to be uploaded
               $images_count = $this->input->post('hjobtype')==1 ? 1 : 5;
               for ($i=1; $i<=$images_count; $i++){                  
                  $filename = 'JOB'.str_repeat('0', 7-strlen($jobid)).$jobid.$i;
                  $config = $this->config->item('fileUploadConfig');
                  $config['file_name'] = $filename;
                  $this->load->library('upload');
                  $this->upload->initialize($config);
                  $originalFileName = $_FILES['file'.$i]['name'];
                  $ext = pathinfo($originalFileName, PATHINFO_EXTENSION);
                  if($originalFileName){
                     if ($this->upload->do_upload('file'.$i)) {
                        $newFiles['imgfilename'.$i] = $filename.'.'.$ext;
                        array_push($oldFiles, $originalFileName);
                     }else { 
                        array_push($notUploadedFiles, $originalFileName);
                     }
                  }
               }
               //if there is not any unuploaded files (ie different type file) update db with filenames
               //else delete data to database and delete uploaded images
               if (!count($notUploadedFiles)){
                  $this->job->updateImages($jobid, $newFiles);
                  $this->session->set_flashdata('addJobResult', array('status' => true, 'message' => "job added successfully"));
               }else{
                  $this->job->deleteJob($jobid);
                  foreach($newFiles as $newFile)
                     unlink($uploadFolder . $newFile);
                  $this->session->set_flashdata('addJobResult', array('status' => false, 'message' => "error adding job"));
               }
            }else{
               $this->session->set_flashdata('addJobResult', array('status' => false, 'message' => "error adding job"));
            }
         }
      }
      $this->load->view('profile/addjob', $data);		
	}



   public function deletejob($id){
      if($id && filter_var($id, FILTER_VALIDATE_INT)){
         // Check owner of job 
         if($this->session->userdata('user_id')===$this->job->getUserIdByJobId($id) || $this->session->userdata('user_role')===1){
            // Delete files
            foreach($this->job->getImages($id) as $image){
               if($image){
                  unlink($this->config->item('uploadFolder') . $image);
               }
            }
            // Then record from DB
            $this->job->deleteJob($id);
         }
      }      
   }


   public function renewjob($id){
      if($id && filter_var($id, FILTER_VALIDATE_INT)){
         $data['currentJob'] = $this->job->getJobById($id);
         // Check owner of job 
         if($this->session->userdata('user_id')===$data['currentJob']->user_id){
            if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST'){
               // check is paypal or CC data submited
               if($this->input->post('paypaltoken')){
                  // Validate token ?
                  // if validated no need to submit for renewal
               }
               else{
                  $year = date("Y");
                  $this->form_validation->set_rules('cardholder', 'Card holder', 'trim|required');
                  $this->form_validation->set_rules('cardnumber', 'Card number', 'trim|required|numeric');
                  $this->form_validation->set_rules('cardmonth', 'Card expiration month', 'required|integer|greater_than[0]|less_than[13]');
                  $this->form_validation->set_rules('cardyear', 'Card expiration year', 'required|integer|greater_than['.($year-1).']|less_than['.($year+11).']');
                  $this->form_validation->set_rules('cardcvv', 'Card CVV number', 'trim|required|numeric|min_length[3]|max_length[4]');

                  if ($this->form_validation->run()) {
                     $this->load->model('payment');
                     if($this->job->submitForRenewal($id) &&
                        $this->payment->addCCPayment(
                           $id,
                           $this->input->post('cardholder', true), 
                           $this->input->post('cardnumber'), 
                           $this->input->post('cardmonth') . '/' . $this->input->post('cardyear'), 
                           $this->input->post('cardcvv', true))
                     ){
                        $this->session->set_flashdata('sentRenewalResult', array('status' => true, 'message' => "job sent for renewal successfully"));
                     }else{
                        $this->session->set_flashdata('sentRenewalResult', array('status' => false, 'message' => "error sending job for renewal"));
                     }
                  }
               }

               
            }
            
            $this->load->view('profile/renewjob', $data);
         }
      }else{
         return redirect('profile');
      }     
   }








   public function changepassword()
	{      
		$this->load->view('profile/changepassword');
	}

   public function changepassword_process()
	{
		$this->form_validation->set_rules('oldpassword', 'Old Password', 'required');
		$this->form_validation->set_rules('newpassword', 'New Password', 'required|min_length[6]|max_length[32]');
		$this->form_validation->set_rules('confpassword', 'Confirm Password', 'required|min_length[6]|max_length[32]|matches[newpassword]');

		if ($this->form_validation->run()) {
			$this->load->model('user');
			$userdata = $this->user->getUserdataById($this->session->userdata('user_id'));

			if ($userdata && password_verify($this->input->post('oldpassword'), $userdata->password)){
				if($this->user->updatePassword($this->session->userdata('user_id'), password_hash($this->input->post('newpassword'), PASSWORD_BCRYPT))){
					$this->session->set_flashdata('pwdchng', array('status' => true, 'message' => "pwdupdsucc"));
				}
			}
			else{
				$this->session->set_flashdata('pwdchng', array('status' => false, 'message' => "involdpwd"));
			}
		}
		$this->changepassword();
	}

   public function getSubcategories()
	{
      $postData = $this->input->post();
      $this->load->model('subcategory');
      $data['subcategories'] = $this->subcategory->getSubcategoriesByCategoryId($postData['categoryid']);
      $data['token']= $this->security->get_csrf_hash();
      echo json_encode($data);
	}

   public function getInitialFeeByType()
	{
      $postData = $this->input->post();
      $this->load->model('jobtype');
      $data['jobtype'] = $this->jobtype->getJobTypeById($postData['jobtype']);
      $data['token']= $this->security->get_csrf_hash();
      echo json_encode($data);
	}

   public function aa($i)
	{
      $postData = $this->input->post();
      $this->load->model('jobtype');
      $data['initialprice'] = $this->jobtype->getJobTypeById($postData['jobtype']->initial_price);
      $data['token']= $this->security->get_csrf_hash();
      echo json_encode($data);
	}




   private function setStatus($myjob){
      if ($myjob->expiring_at >= time() && $myjob->status)  // if job not expired an status is 1
         return 1;
      else if($myjob->submitedrenewal) // if job is submited to renewal
         return 2;
      else
         return 3;      
   }

   private function setActivePassed($myjob, $initialPeriod, $renewalPeriod){
      // calculates percentage of active status
      if ($myjob->expiring_at >= time()) 
      {
         // ie job is in initial phase (not renewal)
         if ($myjob->isinitial){
            return (time() - $myjob->created_at) / $initialPeriod * 100;
         }else{
            return ($renewalPeriod + time() - $myjob->expiring_at) / $renewalPeriod * 100;
         }
      }
      return null;           
   }

  

   public function test(){
      $x = 0;
      if(filter_var($x, FILTER_VALIDATE_INT) || $x==0)
         echo "int";
   }


   
}
