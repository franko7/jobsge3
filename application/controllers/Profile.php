<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

   public $data = array();

   public function __construct() {
      parent::__construct();
      if (!$this->session->userdata('logged_in')) redirect('auth/login');
      $this->load->library('form_validation');
      $this->load->library('pagination');
      $this->load->helper("security");
      $this->load->config('appconfig');
      $this->lang->load('home');
      $this->load->model('job');
      $this->load->model('image');
      $this->data['images'] = $this->image->getImageNames();
      $this->data['uploadFolder'] = $this->config->item('uploadFolder');
      $this->data['bgPath'] = base_url($this->config->item('bgImagesUploadConfig')['upload_path']);
   }

	public function index()
	{
		return $this->myjobs();
	}

   public function myjobs()
	{
      $this->load->model('jobtype');
      $this->load->model('location');
      $this->load->model('category');
      $this->data['jobTypes'] = $this->jobtype->getJobTypes();
      $this->data['locations'] = $this->location->getLocations();
      $this->data['categories'] = $this->category->getCategories();
      
      $config = $this->config->item('profilePaginationConfig');
      $config['base_url'] = site_url('profile/myjobs');
      $config['total_rows'] =  $this->job->getMyJobsCount($this->session->userdata('user_id'));
      $this->pagination->initialize($config);
      $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
       
      $this->data['links'] = $this->pagination->create_links();
      $this->data['page'] = $page;
      $this->data['myJobs'] = $this->job->getJobsByUserId($this->session->userdata('user_id'), $config["per_page"], $page);
      // add job status and passed time from active to array
      foreach($this->data['myJobs'] as $myjob){
         $myjob->jobStatus = $this->setStatus($myjob);
         $myjob->activePassed = $this->setActivePassed(
            $myjob, 
            $this->data['jobTypes'][$myjob->job_type - 1]->initial_period, 
            $this->data['jobTypes'][$myjob->job_type - 1]->renewal_period
         );
      }      
      $this->load->view('profile/myjobs', $this->data);
	}

   public function addjob()
	{
      $this->load->model('jobtype');
      $this->load->model('location');
      $this->load->model('category');
      $this->data['jobTypes'] = $this->jobtype->getJobTypes();
      $this->data['locations'] = $this->location->getLocations();
      $this->data['categories'] = $this->category->getCategories();
      
      if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST'){            
         $this->form_validation->set_rules('fullname', 'Full name', 'trim|required|xss_clean|min_length[2]|max_length[200]');
         $this->form_validation->set_rules('category', 'Category', 'required|integer');
         $this->form_validation->set_rules('subcategory', 'Subcategory', 'required|integer|greater_than[0]');
         $this->form_validation->set_rules('jobtype', 'Job type', 'required|integer|greater_than[0]|less_than['.(count($this->data['jobTypes'])+1).']');
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
         // if application is either Gold or Silver make company field not required
         if($this->input->post('jobtype')>1)
               $this->form_validation->set_rules('company', 'Company', 'xss_clean|min_length[2]|max_length[100]');
            else
               $this->form_validation->set_rules('company', 'Company', 'required|xss_clean|min_length[2]|max_length[100]');
         // first input file element must have image 
         if (empty($_FILES['file1']['name'])){
            $this->form_validation->set_rules('file1', 'Image', 'required');
         }
         // if selected jobtype has initial_price
         $appPrice = $this->data['jobTypes'][$this->input->post('jobtype')-1]->initial_price;
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
               strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $this->input->post('shorttexten', true))),
               $appPrice > 0 && !$this->input->post('paypaltoken') ? 1 : 0,
               time(),
               time() + $this->data['jobTypes'][$this->input->post('hjobtype')-1]->initial_period,
               1 //job status needs modification for GOLD applications (paypal token validation) !!!!!!!!!!!!!!!!!!!!!!!!!!!!!
            );

            //if either card data or paypal data is present save data to database
            if($jobid && $this->data['jobTypes'][$this->input->post('hjobtype')-1]->initial_price > 0){
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
                  $this->session->set_flashdata('addJobResult', array('status' => true, 'message' => "Application added successfully"));
               }else{
                  $this->job->deleteJob($jobid);
                  foreach($newFiles as $newFile)
                     unlink($uploadFolder . $newFile);
                  $this->session->set_flashdata('addJobResult', array('status' => false, 'message' => "Error adding application"));
               }
            }else{
               $this->session->set_flashdata('addJobResult', array('status' => false, 'message' => "Error adding application"));
            }
            return redirect('profile/myjobs');
         }
      }
      $this->load->view('profile/addjob', $this->data);		
	}

   public function editjob($id)
	{
      if($id && filter_var($id, FILTER_VALIDATE_INT)){
         $this->load->model('jobtype');
         $this->load->model('location');
         $this->load->model('category');
         $this->load->model('subcategory');
         $this->data['jobTypes'] = $this->jobtype->getJobTypes();
         $this->data['locations'] = $this->location->getLocations();
         $this->data['categories'] = $this->category->getCategories();

         if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST'){
            $this->form_validation->set_rules('fullname', 'Full name', 'trim|required|xss_clean|min_length[2]|max_length[200]');
            $this->form_validation->set_rules('category', 'Category', 'required|integer');
            $this->form_validation->set_rules('subcategory', 'Subcategory', 'required|integer|greater_than[0]');
            $this->form_validation->set_rules('jobtype', 'Job type', 'required|integer|less_than['.(count($this->data['jobTypes'])+1).']');
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
            // if (empty($_FILES['file1']['name'])){
            //    $this->form_validation->set_rules('file1', 'Image', 'required');
            // }

            // if selected jobtype has initial_price
            $appPrice = $this->data['jobTypes'][$this->input->post('jobtype')-1]->initial_price;
            if($appPrice > 0){
               if($this->input->post('paypaltoken')){
                  // Validate token ?
               }
               else{
                  $year = date("Y");
                  $this->form_validation->set_rules('cardholder', 'Card holder', 'trim|required');
                  $this->form_validation->set_rules('cardnumber', 'Card number', 'trim|required|numeric');
                  $this->form_validation->set_rules('cardmonth', 'Card expiration month', 'required|integer|greater_than[0]|greater_than[0]|less_than[13]');
                  $this->form_validation->set_rules('cardyear', 'Card expiration year', 'required|integer|greater_than['.($year-1).']|less_than['.($year+11).']');
                  $this->form_validation->set_rules('cardcvv', 'Card CVV number', 'trim|required|numeric|min_length[3]|max_length[4]');
               }
            }
            
            //if validation passed save data to db
            if ($this->form_validation->run()) {
               $jobid = $this->job->editJob(
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
                  strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $this->input->post('shorttexten', true))),
                  $appPrice > 0 && !$this->input->post('paypaltoken') ? 1 : 0,
                  1
                  //job status needs modification for GOLD applications (paypal token validation) !!!!!!!!!!!!!!!!!!!!!!!!!!!!!
               );

               //if either card data or paypal data is present save data to database
               if($jobid && $appPrice > 0){
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
                  $images_count = $this->input->post('jobtype')==1 ? 1 : 5;
                  for ($i=1; $i<=$images_count; $i++){                  
                     $filename = 'JOB'.str_repeat('0', 7-strlen($id)).$id.$i;
                     $config = $this->config->item('fileUploadConfig');
                     $config['file_name'] = $filename;
                     $this->load->library('upload');
                     $this->upload->initialize($config);
                     $originalFileName = $_FILES['file'.$i]['name'];
                     $ext = pathinfo($originalFileName, PATHINFO_EXTENSION);
                     if ($this->upload->do_upload('file'.$i)) {
                        $newFiles['imgfilename'.$i] = $filename.'.'.$ext;
                        array_push($oldFiles, $originalFileName);
                     }else { 
                        array_push($notUploadedFiles, $originalFileName);
                     }
                  }
                  //if there is any new files, update file names in database
                  if (count($newFiles))
                     $this->job->updateImages($id, $newFiles);                  
                  $this->session->set_flashdata('editJobResult', array('status' => true, 'message' => "Application has been edited successfully"));
               }else{
                  $this->session->set_flashdata('editJobResult', array('status' => false, 'message' => "Error editing job"));
               }
               return redirect('profile/myjobs');
            }
         }
         $this->data['currentJob'] = $this->job->getJobById($id);
         $this->data['subcategories'] = $this->subcategory->getSubcategoriesByCategoryId($this->data['currentJob']->category_id);
         
         $this->load->view('profile/editjob', $this->data);
      }else{
         return redirect('profile');
      }	
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
         $this->data['currentJob'] = $this->job->getJobById($id);
         // Check owner of job 
         if($this->session->userdata('user_id')===$this->data['currentJob']->user_id){
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
            $this->load->view('profile/renewjob', $this->data);
         }
      }else{
         return redirect('profile');
      }     
   }


   public function subscriptions(){
      $this->load->model('subscription');
      $this->load->model('category');
      $this->data['categories'] = $this->category->getCategories();
      
      if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST'){
         $c_sc = 0;
         $this->form_validation->set_rules('category', 'Category', 'required|integer|greater_than[0]');
         if (isset($_POST['addSubcategory'])) {
            $this->form_validation->set_rules('subcategory', 'Subcategory', 'required|integer|greater_than[0]');
            $c_sc = 2;
         } else {
            $c_sc = 1;
         }
         if($this->form_validation->run()){
            $this->subscription->addSubscription(
               $this->session->userdata('user_id'),
               $this->input->post('category'),
               $c_sc==1 ? 0 : $this->input->post('subcategory'),
               $c_sc
            );
         }
         return redirect('profile/subscriptions');
      }
      $this->data['subscriptions'] = $this->subscription->getSubscriptions($this->session->userdata('user_id'));
      $this->load->view('profile/subscriptions', $this->data);
   }


   public function deletesubscription($id){
      if($id && filter_var($id, FILTER_VALIDATE_INT)){
         $this->load->model('subscription');
         // Check owner of job 
         if($this->session->userdata('user_id')===$this->subscription->getUserIdBySubscriptionId($id) || $this->session->userdata('user_role')===1){
            // Then record from DB
            $this->subscription->deleteSubscription($id);
         }
      }
      return $this->subscriptions();
   }


   public function deleteprofile(){
      $id = $this->session->userdata('user_id');
      $this->job->deleteUser($id);
      return redirect('/');     
   }


   public function changepassword()
	{
		$this->load->view('profile/changepassword', $this->data);
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
					$this->session->set_flashdata('profPwdChng', array('status' => true, 'message' => "Password updated successfully"));
				}
			}
			else{
				$this->session->set_flashdata('profPwdChng', array('status' => false, 'message' => "Invalid old password"));
			}
		}
		$this->changepassword();
	}


   public function chat(){
      $this->load->view('profile/chat', $this->data);
   }




















   public function getSubcategories()
	{
      $this->load->model('subcategory');
      $postData = $this->input->post();    
      $data['subcategories'] = $this->subcategory->getSubcategoriesByCategoryId($postData['categoryid']);//
      //$data['subcategories'] = $this->subcategory->getSubcategoriesByCategoryId($_POST['categoryid']);//$postData['categoryid']
      $data['token']= $this->security->get_csrf_hash();
      echo json_encode($data);
	}

   public function getInitialFeeByType()
	{
      // $postData = $this->input->post();
      $this->load->model('jobtype');
      $data['jobtype'] = $this->jobtype->getJobTypeById($_POST['jobtype']);//$postData['jobtype']
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


   private function checkSubscriptions($job_id, $category_id, $subcategory_id){
      $this->load->model('subscription');      
      $subscriptions = $this->subscription->getAllSubscriptions();
      foreach($subscriptions as $subsc){
         if(($category_id==$subsc->category_id && $subsc->c_sc==1) || $category_id==$subsc->category_id && $subcategory_id==$subsc->subcategory_id && $subsc->c_sc==2){
            //Send mail to this user
            $this->load->model('user');  
            $this->load->model('category');  
            $this->load->model('subcategory');
            $this->load->model('job');
            
            $this->load->library('phpmailer_lib');
            $mail = $this->phpmailer_lib->load();
            $mail->isSMTP();
            $mail->Host     = $this->config->item('emailConfig')['host'];
            $mail->SMTPAuth = $this->config->item('emailConfig')['SMTPAuth'];
            $mail->Username = $this->config->item('emailConfig')['Username'];
            $mail->Password = $this->config->item('emailConfig')['Password'];
            $mail->SMTPSecure = $this->config->item('emailConfig')['SMTPSecure'];
            $mail->Port     = $this->config->item('emailConfig')['port'];
            // sender
            $mail->setFrom($this->config->item('emailConfig')['senderEmail'], $this->config->item('emailConfig')['senderName']);
            // recipient
            $mail->addAddress($this->user->getUserdataById($subsc->user_id)->email);
            // Email subject
            $mail->Subject = 'New application';
            // Set email format to HTML
            $mail->isHTML(true);
            // Email body content
            $data['category'] = $this->category->getCategoryById($category_id)->category_en;
            $data['subcategory'] = $this->category->getSubcategoryById($subcategory_id)->subcategory_en;
            $data['wantedSubcategory'] = $subsc->c_sc==2;
            $data['username'] = $this->user->getUserdataById($subsc->user_id)->fullname;
            $data['url'] = base_url('jobs/job/'.$this->job->getJobById($job_id)->id.'/'.$this->job->getJobById($job_id)->slug);
            $mailContent = $this->load->view('emails/sendsubscriptionmail', $data, TRUE);;
            $mail->Body = $mailContent;

            // Send email
            if($mail->send())
               return true;
            else
               return false;		
         }
      }
   }

   

   
  


   
}
