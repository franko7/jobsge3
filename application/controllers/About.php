<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

	public function index()
	{
		$this->lang->load('home');
      $this->load->config('appconfig');
		$data['iconPath'] = base_url($this->config->item('categoryIconUploadConfig')['upload_path']);
		$data['bgPath'] = base_url($this->config->item('bgImagesUploadConfig')['upload_path']);
		$this->load->model('image');
		$this->load->model('aboutus');      
		$this->load->model('social');      
		$data['images'] = $this->image->getImageNames();
		$data['pageN'] = 2;
      $data['aboutUs'] = $this->aboutus->getAboutus();
		$data['socials'] = $this->social->getSocials();
		$this->load->view('about', $data);
	}

}
