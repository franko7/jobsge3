<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

   public function __construct() {

      parent::__construct();
      if (!$this->session->userdata('logged_in') || $this->session->userdata('user_role') != 1) redirect('/');
      $this->load->library('form_validation');
      $this->load->helper("security");
      $this->load->library('pagination');      
      $this->load->config('appconfig');      
   }

	public function index()
	{
      $this->users();
	}

   
   // public function dashboard()
	// {
   //    $data['pageN'] = 1;
	// 	return $this->load->view('admin/dashboard', $data);
	// }


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
                  $this->session->set_flashdata('editJobResult', array('status' => true, 'message' => "Job updated successfully"));
               }else{
                  $this->session->set_flashdata('editJobResult', array('status' => false, 'message' => "Could not update job"));
               }
            }
         }
         $data['currentJob'] = $this->job->getJobById($id);
         $data['subcategories'] = $this->subcategory->getSubcategoriesByCategoryId($data['currentJob']->category_id);
         $data['bgPath'] = base_url($this->config->item('fileUploadConfig')['upload_path']);
         $this->load->view('admin/editjob', $data);
      }else{
         return redirect('admin/jobs');
      }      
   }


   public function deleteimage($jobid, $imageid){
      if($jobid && filter_var($jobid, FILTER_VALIDATE_INT) && $imageid && filter_var($imageid, FILTER_VALIDATE_INT) && $imageid<6){
         $this->load->model('job');
         $currentJob = $this->job->getJobById($jobid);
         if($this->job->clearImage($jobid, $imageid)){
            $uploadFolder = $this->config->item('uploadFolder');
            $filename = $currentJob->{'imgfilename'.$imageid};
            //echo $uploadFolder . $filename;exit;
            unlink(base_url($uploadFolder . $filename));
            $this->session->set_flashdata('fileDelete', array('status' => true, 'message' => "File deleted successfully"));
            return redirect('admin/editjob/'.$jobid);
         }else{
            $this->session->set_flashdata('fileDelete', array('status' => false, 'message' => "Could not delete file"));
         }

      }else{
         return redirect('admin/jobs');
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
         $filename = 'favicon';
         $config = $this->config->item('bgImagesUploadConfig');
         $config['file_name'] = $filename;
         $this->load->library('upload');
         $this->upload->initialize($config);
         $ext = pathinfo($_FILES['favicon']['name'], PATHINFO_EXTENSION);
         if($_FILES['favicon']['name'])
            if ($this->upload->do_upload('favicon'))
               $this->image->editImage(3, $filename.'.'.$ext);

         $filename = 'logo_en';
         $config = $this->config->item('bgImagesUploadConfig');
         $config['file_name'] = $filename;
         $this->load->library('upload');
         $this->upload->initialize($config);
         $ext = pathinfo($_FILES['logo_en']['name'], PATHINFO_EXTENSION);
         if($_FILES['logo_en']['name'])
            if ($this->upload->do_upload('logo_en'))
               $this->image->editImage(4, $filename.'.'.$ext);

         $filename = 'logo_ru';
         $config = $this->config->item('bgImagesUploadConfig');
         $config['file_name'] = $filename;
         $this->load->library('upload');
         $this->upload->initialize($config);
         $ext = pathinfo($_FILES['logo_ru']['name'], PATHINFO_EXTENSION);
         if($_FILES['logo_ru']['name'])
            if ($this->upload->do_upload('logo_ru'))
               $this->image->editImage(5, $filename.'.'.$ext);
               

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

         $this->image->editImage(6, $this->input->post('jobListBanner'));
         $this->image->editImage(7, $this->input->post('detailListBanner'));
         return redirect('admin/editimages');
      }
      $data['bgPath'] = base_url($this->config->item('bgImagesUploadConfig')['upload_path']);
      $data['images'] = $this->image->getImageNames();
      $this->load->view('admin/editimages', $data);
   }


   public function socials()
	{
      $data['pageN'] = 10;
      $this->load->model('social');
      if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST'){
         $this->form_validation->set_rules('facebook', 'Facebook lin', 'trim|max_length[200]|valid_url');
         $this->form_validation->set_rules('instagram', 'Instagram link', 'trim|max_length[200]|valid_url');
         $this->form_validation->set_rules('linkedin', 'Location', 'trim|max_length[200]|valid_url');
         $this->form_validation->set_rules('google', 'Location', 'trim|max_length[200]|valid_url');
         $this->form_validation->set_rules('twitter', 'Location', 'trim|max_length[200]|valid_url');
         //if validation passed save data to db
         if ($this->form_validation->run()) {
            //if data saved set flash message
            if($this->social->updateSocials(
               strlen($this->input->post('facebook', true))?(substr($this->input->post('facebook',true),0,4)==="http"? $this->input->post('facebook', true):'https://'.$this->input->post('facebook', true)):null,
               strlen($this->input->post('instagram', true))?(substr($this->input->post('instagram',true),0,4)==="http"? $this->input->post('instagram', true):'https://'.$this->input->post('instagram', true)):null,
               strlen($this->input->post('linkedin', true))?(substr($this->input->post('linkedin',true),0,4)==="http"? $this->input->post('linkedin', true):'https://'.$this->input->post('linkedin', true)):null,
               strlen($this->input->post('google', true))?(substr($this->input->post('google', true),0,4)==="http"? $this->input->post('google', true):'https://'.$this->input->post('google', true)):null,
               strlen($this->input->post('twitter', true))?(substr($this->input->post('twitter', true),0,4)==="http"? $this->input->post('twitter', true):'https://'.$this->input->post('twitter', true)):null)){
                  $this->session->set_flashdata('socialResult', array('status' => true, 'message' => "Social links updated successfully"));
                  return redirect('admin/socials');
            }else{
               $this->session->set_flashdata('socialResult', array('status' => false, 'message' => "Error updating social links"));
            }
         }
      }
      $data['socials'] = $this->social->getSocials();
      $this->load->view('admin/socials', $data);    
   }


   public function jobtypes()
	{
      $data['pageN'] = 11;
      $this->load->model('jobtype');
      if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST'){
         $this->form_validation->set_rules('stInitPeriod', 'Standart Application Initial Period', 'integer|greater_than[0]');
         $this->form_validation->set_rules('stInitPrice', 'Standart Application Initial Price', 'integer|greater_than_equal_to[0]');
         $this->form_validation->set_rules('stRenPeriod', 'Standart Application Renewal Period', 'integer|greater_than[0]');
         $this->form_validation->set_rules('stRenPrice', 'Standart Application Renewal Price', 'integer|greater_than_equal_to[0]');

         $this->form_validation->set_rules('silInitPeriod', 'Silver Application Initial Period', 'integer|greater_than[0]');
         $this->form_validation->set_rules('silInitPrice', 'Silver Application Initial Price', 'integer|greater_than_equal_to[0]');
         $this->form_validation->set_rules('silRenPeriod', 'Silver Application Renewal Period', 'integer|greater_than[0]');
         $this->form_validation->set_rules('silRenPrice', 'Silver Application Renewal Price', 'integer|greater_than_equal_to[0]');

         $this->form_validation->set_rules('golInitPeriod', 'Gold Application Initial Period', 'integer|greater_than[0]');
         $this->form_validation->set_rules('golInitPrice', 'Gold Application Initial Price', 'integer|greater_than_equal_to[0]');
         $this->form_validation->set_rules('golRenPeriod', 'Gold Application Renewal Period', 'integer|greater_than[0]');
         $this->form_validation->set_rules('golRenPrice', 'Gold Application Renewal Price', 'integer|greater_than_equal_to[0]');

         //if validation passed save data to db
         if ($this->form_validation->run()) {
            //if data saved set flash message
            if(
               $this->jobtype->updateJobTypes(
                  1, $this->input->post('stInitPeriod')*86400, $this->input->post('stInitPrice'), $this->input->post('stRenPeriod')*86400, $this->input->post('stRenPrice')) &&
               $this->jobtype->updateJobTypes(
                  2, $this->input->post('silInitPeriod')*86400, $this->input->post('silInitPrice'), $this->input->post('silRenPeriod')*86400, $this->input->post('silRenPrice')) &&
               $this->jobtype->updateJobTypes(
                  3, $this->input->post('golInitPeriod')*86400, $this->input->post('golInitPrice'), $this->input->post('golRenPeriod')*86400, $this->input->post('golRenPrice'))
            ){
               $this->session->set_flashdata('jobTypesResult', array('status' => true, 'message' => "Job type data updated successfully"));
               return redirect('admin/jobtypes');
            }else{
               $this->session->set_flashdata('jobTypesResult', array('status' => false, 'message' => "Error updating job type data"));
            }
         }
      }
      $data['jobTypes'] = $this->jobtype->getJobTypes();
      $this->load->view('admin/jobtypes', $data);
   }


   public function aboutus(){
      $data['pageN'] = 12;
      $this->load->model('aboutus');
      if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST'){
         $this->form_validation->set_rules('title_en', 'Title English', 'required');
         $this->form_validation->set_rules('title_ru', 'Title Russian', 'required');
         $this->form_validation->set_rules('subtitle_en', 'Subtitle English', 'required');
         $this->form_validation->set_rules('subtitle_ru', 'Subtitle Russian', 'required');
         $this->form_validation->set_rules('aboutus_en', 'About us English', 'required');
         $this->form_validation->set_rules('aboutus_ru', 'About us Russian', 'required');
         if ($this->form_validation->run()) {
            //if data saved set flash message
            if($this->aboutus->editAboutus(
                  $this->input->post('title_en', true), 
                  $this->input->post('title_ru', true),
                  $this->input->post('subtitle_en', true),
                  $this->input->post('subtitle_ru', true),
                  $this->input->post('aboutus_en'),
                  $this->input->post('aboutus_ru')
               )){
               $this->session->set_flashdata('aboutusResult', array('status' => true, 'message' => "About us updated successfully"));
               return redirect('admin/aboutus');
            }else{
               $this->session->set_flashdata('aboutusResult', array('status' => false, 'message' => "Error updating About us"));
            }
         }
      }
      $data['aboutUs'] = $this->aboutus->getAboutus();
      $this->load->view('admin/aboutus', $data);
   }


   public function changepassword()
	{
      $data['pageN'] = 20;
		$this->load->view('admin/changepassword', $data);
	}


   public function changepassword_process()
	{
		$this->form_validation->set_rules('oldPassword', 'Old Password', 'required');
		$this->form_validation->set_rules('newPassword', 'New Password', 'required|min_length[6]|max_length[32]');
		$this->form_validation->set_rules('confPassword', 'Confirm Password', 'required|min_length[6]|max_length[32]|matches[newPassword]');

		if ($this->form_validation->run()) {
			$this->load->model('user');
			$userdata = $this->user->getUserdataById($this->session->userdata('user_id'));
         
			if ($userdata && password_verify($this->input->post('oldPassword'), $userdata->password)){
				if($this->user->updatePassword($this->session->userdata('user_id'), password_hash($this->input->post('newPassword'), PASSWORD_BCRYPT))){
					$this->session->set_flashdata('pwdChng', array('status' => true, 'message' => "Password updated successfully"));
               return redirect('admin/changepassword');
				}else{
				   $this->session->set_flashdata('pwdChng', array('status' => false, 'message' => "Could not update password"));
            }
			}else{
            $this->session->set_flashdata('pwdChng', array('status' => false, 'message' => "Invalid old password."));
			}
		}
      return redirect('admin/changepassword');
	}


      
   private function subCategoryValidation(){
      $this->form_validation->set_rules('category', 'Category', 'required|integer');
      $this->form_validation->set_rules('subcategory_en', 'Subcategory English', 'trim|required|xss_clean|min_length[2]|max_length[200]|is_unique[subcategories.subcategory_en]');
      $this->form_validation->set_rules('subcategory_ru', 'Subcategory Russian', 'trim|required|xss_clean|min_length[2]|max_length[200]|is_unique[subcategories.subcategory_ru]');
   }

  








   
}
