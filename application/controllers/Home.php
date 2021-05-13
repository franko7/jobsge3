<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->load->model(['job', 'category', 'subcategory', 'location', 'social']);
		$this->lang->load('home');
		$categories = $this->category->getCategories();
		$subcategories = $this->subcategory->getSubcategories();
		$categoriesCount = $this->job->getCountByCat();
		$datasubcategoriesCount = $this->job->getCountByCatScat();		
		$cat = array();
		foreach($categories as $c){
			$cat[$c->id] = array('id'=>$c->id, 'category_en'=>$c->category_en, 'category_ru'=>$c->category_ru , 'filename'=>$c->filename, 'c_count'=>0);
			// $cat[$c->id]['id'] = $c->id;
			// $cat[$c->id]['category_en'] = $c->category_en;
			// $cat[$c->id]['category_ru'] = $c->category_ru;
			// $cat[$c->id]['filename'] = $c->filename;
			// $cat[$c->id]['c_count'] = 0;
		}
		foreach($subcategories as $sc){
			$cat[$sc->category_id]['subcategories'][$sc->id] = array('sc_id'=>$sc->id, 'sc_en'=>$sc->subcategory_en, 'sc_ru'=>$sc->subcategory_ru, 'sc_count'=>0);
		}
		foreach ($categoriesCount as $cc){
			$cat[$cc['category']]['c_count'] = $cc['num_jobs'];
		}
		foreach ($datasubcategoriesCount as $scc){
			$cat[$scc['category']]['subcategories'][$scc['subcategory']]['sc_count'] = $scc['num_jobs'];
		}
		
		$data['categories'] = $cat;
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

	

	// public function getSubcategories()
	// {
   //    $postData = $this->input->post();
   //    $this->load->model('subcategory');
   //    $data['subcategories'] = $this->subcategory->getSubcategoriesByCategoryId($postData['categoryid']);
   //    $data['token']= $this->security->get_csrf_hash();
   //    echo json_encode($data);
	// }



}
