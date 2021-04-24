<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->load->model('job');
		$this->load->model('category');
		$this->load->model('subcategory');
		$this->load->model('location');
		$this->load->model('social');
		$this->lang->load('home');
		$data['categories'] = $this->category->getCategories();
		$data['subcategories'] = $this->subcategory->getSubcategories();
		$data['subcategoriesCount'] = $this->job->getCountByCatScat();
		$data['categoriesCount'] = $this->job->getCountByCat();
		$data['locations'] = $this->location->getLocations();
		$data['socials'] = $this->social->getSocials();
		$this->load->config('appconfig');
		$data['iconPath'] = base_url($this->config->item('categoryIconUploadConfig')['upload_path']);
		$data['bgPath'] = base_url($this->config->item('bgImagesUploadConfig')['upload_path']);
		$this->load->model('image');
		$data['images'] = $this->image->getImageNames();
		$data['pageN'] = 1;
		$this->load->view('index', $data);
	}

	

   public function jobs()
	{
		$this->load->view('jobs');
	}

   public function profile()
	{
		$this->load->view('profile');
	}

   public function myjobs()
	{
		$this->load->view('myjobs');
	}

   public function register()
	{
		$this->load->view('register');
	}

	public function jobdetails()
	{
		$this->load->view('jobdetails');
	}

	public function getSubcategories()
	{
      $postData = $this->input->post();
      $this->load->model('subcategory');
      $data['subcategories'] = $this->subcategory->getSubcategoriesByCategoryId($postData['categoryid']);
      $data['token']= $this->security->get_csrf_hash();
      echo json_encode($data);
	}



}
