<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobs extends CI_Controller {

   public $data = array();   

   public function __construct(){
      parent::__construct();
      $this->load->model('job');
      $this->load->library('pagination');
      $this->load->config('appconfig');
      $this->lang->load('home');
      $this->load->model('image');
      $this->load->model('social');
      $this->data['images'] = $this->image->getImageNames();
      $this->data['socials'] = $this->social->getSocials();
      $this->data['uploadFolder'] = $this->config->item('uploadFolder');
      $this->data['bgPath'] = base_url($this->config->item('bgImagesUploadConfig')['upload_path']);
      $this->data['pageN'] = 1;
   }

   public function category($id, $slug='')
	{
      $this->load->model('location');
		$this->data['locations'] = $this->location->getLocations();
      if($id && filter_var($id, FILTER_VALIDATE_INT)){
         $total_rows = $this->job->getActiveJobsCountByCategoryId($id);
         $config = $this->config->item('jobsPaginationConfig');
         $config['base_url'] = base_url() . 'jobs/category/'.$id.'/'.$slug;
         $config["total_rows"] = $total_rows;
         $this->pagination->initialize($config);
         $page = ($this->uri->segment(6)) ? $this->uri->segment(6) : 0; // Needs to be changed to 5 on production
         $this->data['page'] = $page;
         $this->data['jobs'] = $this->job->getActiveJobsByCategoryId($id, $config["per_page"], $page);
         $this->data['links'] = $this->pagination->create_links();
         $this->data['numSearchResult'] = $total_rows;
         $this->load->view('jobs', $this->data);
      }else{return redirect ('/');}
   }

   public function subcategory($id, $slug='')
	{
      $this->load->model('location');
		$this->data['locations'] = $this->location->getLocations();
      if($id && filter_var($id, FILTER_VALIDATE_INT)){
         $total_rows = $this->job->getActiveJobsCountBySubcategoryId($id);
         $config = $this->config->item('jobsPaginationConfig');
         $config['base_url'] = base_url() . 'jobs/subcategory/'.$id.'/'.$slug;
         $config["total_rows"] = $total_rows;
         $this->pagination->initialize($config);
         $page = ($this->uri->segment(6)) ? $this->uri->segment(6) : 0; // Needs to be changed to 5 on production
         $this->data['page'] = $page;
         $this->data['jobs'] = $this->job->getActiveJobsBySubcategoryId($id, $config["per_page"], $page);
         $this->data['links'] = $this->pagination->create_links();
         $this->data['numSearchResult'] = $total_rows;
         $this->load->view('jobs', $this->data);
      }else{return redirect ('/');}
   }

   public function location($id, $slug='')
	{
      $this->load->model('location');
		$this->data['locations'] = $this->location->getLocations();
      if($id && filter_var($id, FILTER_VALIDATE_INT)){
         $total_rows = $this->job->getActiveJobsCountByLocationId($id);
         $config = $this->config->item('jobsPaginationConfig');
         $config['base_url'] = base_url() . 'jobs/location/'.$id.'/'.$slug;
         $config["total_rows"] = $total_rows;
         $this->pagination->initialize($config);
         $page = ($this->uri->segment(6)) ? $this->uri->segment(6) : 0; // Needs to be changed to 5 on production
         $this->data['page'] = $page;
         $this->data['jobs'] = $this->job->getActiveJobsByLocationId($id, $config["per_page"], $page);
         $this->data['links'] = $this->pagination->create_links();
         $this->data['numSearchResult'] = $total_rows;         
         $this->load->view('jobs', $this->data);
      }else{return redirect ('/');}
   }

	public function index()
	{      
		$this->load->model('job');
		$this->load->model('category');
		$this->load->model('subcategory');
		$this->load->model('location');
		$this->data['categories'] = $this->category->getCategories();
		$this->data['subcategories'] = $this->subcategory->getSubcategories();
		$this->data['subcategoriesCount'] = $this->job->getCountByCatScat();
		$this->data['categoriesCount'] = $this->job->getCountByCat();
		$this->data['locations'] = $this->location->getLocations();
		$this->load->config('appconfig');
		$this->data['iconPath'] = base_url($this->config->item('categoryIconUploadConfig')['upload_path']);
		$this->load->view('index', $this->data);
	}

   public function search(){
      $this->load->model('location');
		$this->data['locations'] = $this->location->getLocations();
      $this->load->library('form_validation');
      $this->load->helper("security");
      $this->form_validation->set_data($_GET);
      $this->form_validation->set_rules('keyword', 'Keyword', 'xss_clean|max_length[100]');
      $this->form_validation->set_rules('location', 'Location', 'required|integer');
      if ($this->form_validation->run()) {
         $keyword = $this->input->get('keyword', true);
         $location = $this->input->get('location', true);
         $total_rows = $this->job->getActiveJobsCountByKeywordLocationId($keyword, $location);
         $config = $this->config->item('searchPaginationConfig');
         $config['suffix'] =  $this->input->get('keyword')? '?'.http_build_query($_GET, '', "&") : '?keyword=&location='.$location;
         $config["base_url"] = base_url('jobs/search');
         $config['first_url'] = $config['base_url'].'?'.http_build_query($_GET);         
         $config["total_rows"] = $total_rows;
         $this->pagination->initialize($config);
         $data['links'] = $this->pagination->create_links();
         $page = $this->uri->segment(3) ? $this->uri->segment(3) : $page = 0;
         $this->data['jobs'] = $this->job->getActiveJobsByKeywordLocation($keyword, $location, $config["per_page"], $page);
         $this->data['numSearchResult'] = $total_rows;
         $this->data['keyword'] = $keyword;
         $this->data['location'] = $location;
         $this->load->view('jobs', $this->data); 
      }else{return redirect ('/');}
   }

   public function job($id, $slug){
      if($id && filter_var($id, FILTER_VALIDATE_INT)){
         $this->data['jobDetails'] = $this->job->getJobById($id);
         if($this->data['jobDetails']){
            $this->trackViews($id);
            $this->load->model('rating');
            $this->data['usersRate'] = $this->rating->getCurrentUsersRates($id, $this->getUserIP());            
            $this->load->view('jobdetails', $this->data);
         }else{return redirect ('/');}         
      }else{return redirect ('/');}
   }
      

   public function trackRating()
	{
      //$postData = $this->input->post();
      // $stars = $postData['star'];
      // $jobId = $postData['jobId'];
      $stars = $_POST['star'];
      $jobId = $_POST['jobId'];
      $this->load->model('rating');
      $this->rating->addRating($jobId, $this->getUserIP(), $stars);
      echo json_encode(null);
	}


   private function getUserIP() {
      $ipaddress = '';
      if (isset($_SERVER['HTTP_CLIENT_IP']))
         $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
      else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
         $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
      else if(isset($_SERVER['HTTP_X_FORWARDED']))
         $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
      else if(isset($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']))
         $ipaddress = $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
      else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
         $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
      else if(isset($_SERVER['HTTP_FORWARDED']))
         $ipaddress = $_SERVER['HTTP_FORWARDED'];
      else if(isset($_SERVER['REMOTE_ADDR']))
         $ipaddress = $_SERVER['REMOTE_ADDR'];
      else
         $ipaddress = 'UNKNOWN';
      return $ipaddress;
   }


   private function trackViews($jobid){
      $this->load->model('pageview');
      // if visists at specific job from specific ip in allowed period is less then allowed count
      if ($this->pageview->countLastViews($jobid, $this->getUserIP(), $this->config->item('lastVisitsPeriod')) < $this->config->item('lastPeriodAllowedVisitCount'))
         $this->pageview->addPageView($jobid, $this->getUserIP());
   }

   public function test()
	{
      $this->load->model('category');
      var_dump($this->category->test());
      
	}
   public function testtest()
	{
      $this->load->model('job');
      var_dump($this->job->getActiveJobsByKeywordLocation('', 0, 1000, 0));
      
	}
}


