<?php
class error404 extends CI_Controller
{
   public function __construct()
   {
	   parent::__construct();
   }
   public function index()
   {
      $this->lang->load('home');
      $this->load->config('appconfig');
      $data['iconPath'] = base_url($this->config->item('categoryIconUploadConfig')['upload_path']);
      $data['bgPath'] = base_url($this->config->item('bgImagesUploadConfig')['upload_path']);
      $this->load->model('image');
      $this->load->model('social');
      $data['images'] = $this->image->getImageNames();
      $data['socials'] = $this->social->getSocials();
      $data['pageN'] = 5;
      $this->output->set_status_header('404');
      $this->load->view('404', $data);    
	}
}
