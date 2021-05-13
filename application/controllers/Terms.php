<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Terms extends CI_Controller {

	public function index()
	{
		$this->load->model(['term', 'social', 'image']);
		$this->lang->load('home');
      $this->load->config('appconfig');
		$data['terms'] = $this->term->getTerms();
      $data['iconPath'] = base_url($this->config->item('categoryIconUploadConfig')['upload_path']);
		$data['bgPath'] = base_url($this->config->item('bgImagesUploadConfig')['upload_path']);
		$data['images'] = $this->image->getImageNames();
      $data['socials'] = $this->social->getSocials();
		$this->load->view('terms', $data);
	}

}
