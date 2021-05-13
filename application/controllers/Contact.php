<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

	public function index()
	{
		$this->lang->load('home');
		$this->load->config('appconfig');
		$data['iconPath'] = base_url($this->config->item('categoryIconUploadConfig')['upload_path']);
		$data['bgPath'] = base_url($this->config->item('bgImagesUploadConfig')['upload_path']);
		$this->load->model('image');
		$this->load->model('social');
		$this->load->model('contactus');
		$data['images'] = $this->image->getImageNames();
		$data['socials'] = $this->social->getSocials();
		$data['contacts'] = $this->contactus->getContacts();
		$data['pageN'] = 3;
		$this->load->library('form_validation');
		$this->load->helper('security');
		if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST'){
			$this->form_validation->set_rules('guestName', 'Name', 'trim|required|xss_clean|min_length[5]|max_length[100]');
			$this->form_validation->set_rules('guestEmail', 'Email', 'required|valid_email|xss_clean|min_length[5]|max_length[100]');
			$this->form_validation->set_rules('guestMessage', 'Message', 'required|xss_clean|min_length[5]|max_length[2000]');

			if ($this->form_validation->run()) {
				$this->load->library('email');
				$config = array ('mailtype'=>'text', 'charset' =>'utf-8', 'priority'=>'1');
				$this->email->initialize($config);
				$this->email->from('guest@afishnik.com', 'Mail from Guest');
				$this->email->to('admin@afishnik.com');
				$this->email->subject('Guest Email');
				$this->email->message(
					$this->input->post('guestName', TRUE) . ' (' . $this->input->post('guestEmail', TRUE) . ') wrote: ' . $this->input->post('guestMessage', TRUE) 
				);
				
				if($this->email->send()){
					$this->session->set_flashdata('sendGuestMail', array('status' => true, 'message' => lang('messageSent')));
					return redirect ('/contact');
				}else{
					$this->session->set_flashdata('sendGuestMail', array('status' => false, 'message' => lang('messageNotSent')));
					return redirect ('/contact');
				}
			}
		}
		$this->load->view('contact', $data);
	}
}