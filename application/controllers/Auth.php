<?php
defined('BASEPATH') or exit('No direct script access allowed');
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;
class Auth extends CI_Controller
{
	public $data = array();

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper("security");
		$this->load->model('user');
		$this->load->config('appconfig');
		$this->lang->load('home');
		$this->load->model('image');
		$this->load->model('social');
      $this->data['images'] = $this->image->getImageNames();
      $this->data['socials'] = $this->social->getSocials();
      $this->data['uploadFolder'] = $this->config->item('uploadFolder');
      $this->data['bgPath'] = base_url($this->config->item('bgImagesUploadConfig')['upload_path']);
	}

	
	public function register()
	{
		if ($this->session->userdata('logged_in')) redirect('/profile');
		$this->load->view('register', $this->data);
	}
	

	public function register_process()
	{
		$this->form_validation->set_rules('fullname', 'Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[32]');
		$this->form_validation->set_rules('cpassword', 'Password Confirmation', 'required|min_length[6]|max_length[32]|matches[password]');
		$this->form_validation->set_rules('terms', 'Terms and conditions', 'callback_terms');

		if ($this->form_validation->run()) {
			if($this->user->addUser($this->input->post('fullname'), $this->input->post('email'), password_hash($this->input->post('password'), PASSWORD_BCRYPT))){
				$this->session->set_flashdata('registerResult', array('status' => true, 'message' => "You have successfully registered, please log in."));
				return redirect('auth/login');
			}else{
				$this->session->set_flashdata('registerResult', array('status' => false, 'message' => "Database error"));
				$this->register();
			}
		} else {
			$this->register();
		}
	}


	public function login()
	{
		if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST'){
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean|min_length[5]|max_length[100]');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if ($this->form_validation->run()) {
				$userdata = $this->user->getUserdataByEmail($this->input->post('email'));

				if ($userdata && password_verify($this->input->post('password'), $userdata->password)) {
					$sessiondata = array(
						'user_id'  		=> $userdata->id,
						'full_name' 	=> $userdata->fullname,
						'user_role'		=> $userdata->role,
						'user_email'	=> $userdata->email,
						'logged_in' 	=> TRUE
					);	
					$this->session->set_userdata($sessiondata);
					if ($this->session->userdata('user_role') == 2) redirect('/profile');
					if ($this->session->userdata('user_role') == 1) redirect('/admin');
					// if($this->session->has_userdata('redirectURL')){
					// 	$redirectURL = $this->session->userdata('redirectURL');
					// 	$this->session->unset_userdata('redirectURL');
					// 	redirect($redirectURL);
					// }else{
					// 	if ($this->session->userdata('user_role' != 1)) redirect('/profile');
					// 	else redirect ('/admin');
					// }
				} else {
					//invalid username or password
					$this->session->set_flashdata('loginResult', array('status' => false, 'message' => 'Invalid username or password'));
					return redirect('/auth/login');
				}
			} else {
				//validation not passed
				$this->session->set_flashdata('loginResult', array('status' => false, 'message' => 'Invalid username or password'));
				return redirect('/auth/login');
			}
		}
		if ($this->session->userdata('logged_in')) redirect('/profile');
		$this->load->view('login', $this->data);
	}


	public function sendrecovery()
	{
		if ($this->session->userdata('logged_in')) redirect('/profile');
		$this->load->view('sendrecovery', $this->data);
	}


	public function sendrecovery_process()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email|callback_existingemail',
			array('xss_clean' => $this->lang->line("xss_clean"), 'existingemail' => "User with this email address does not exist")
		);				
		if ($this->form_validation->run()) {
			//genaerare random string
			$random_string = "";
			$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
			for ($i = 0; $i <= 127; $i++)
				$random_string .= $chars[mt_rand(0, strlen($chars) - 1)];
			//update recoverystring field with the string generated
			$email = $this->input->post('email', true);
			
			$this->user->setRecoveryString($email, $random_string);
			//get user id
			$userdata = $this->user->getUserdataByEmail($email);
			$userid = $userdata->id;
			$username = $userdata->fullname;
			//Send mail in following format: baseurl()/auth/recover/userid/randomstring
			if ($this->sendRecoveryMail2($email, $userid, $username, $random_string)){
				$this->session->set_flashdata('sendRecoveryResult', array('status' => true, 'message' => "Email has been sent"));
				return redirect('auth/sendrecovery');
			}else{
				$this->session->set_flashdata('sendRecoveryResult', array('status' => false, 'message' => "Could not send email"));
				return redirect('auth/sendrecovery');
			}
		} else {
			$this->sendrecovery();
		}
	}


	public function recover($user_id=0, $recoverystring='')
	{
		if ($this->user->hasRecoveryString($user_id, $recoverystring)){
			$this->data['user_id'] = $user_id;
			$this->data['recstr'] = $recoverystring;
			$this->load->view('reset', $this->data);
		}else{
			$this->sendrecovery();
		}
			
	}


	public function reset_process()
	{
		$this->form_validation->set_rules('userid', 'Userid', 'integer');
		$this->form_validation->set_rules('recstr', 'recstr', 'required|alpha_numeric');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[32]');
		$this->form_validation->set_rules('confirmPassword', 'Password Confirmation', 'required|min_length[6]|max_length[32]|matches[password]');

		if ($this->form_validation->run()) {
			if($this->user->resetPassword($this->input->post('userid'), $this->input->post('recstr'), password_hash($this->input->post('password'), PASSWORD_BCRYPT))){
				$this->session->set_flashdata('resetResult', array('status' => true, 'message' => "Password has been set successfully"));
				return redirect('auth/login');
			}else{
				$this->session->set_flashdata('resetResult', array('status' => false, 'message' => "Database error"));
				$this->recover($this->input->post('userid'), $this->input->post('recstr'));
				return redirect('auth/sendrecovery');
			}
		} else {
			$this->recover($this->input->post('userid'), $this->input->post('recstr'));
		}
	}


	public function logout()
	{
		$array_items = array('user_id', 'full_name', 'user_role', 'user_email', 'logged_in');
		$this->session->unset_userdata($array_items);
		redirect('/');
	}

	
	function existingemail($str)
	{
		if ($this->user->validate_email($str))
			return true;
		return false;
	}


	function terms() {
		if (isset($_POST['terms'])) return true;
		$this->form_validation->set_message('terms', 'Please read and accept our terms and conditions.');
		return false;
  }


	function sendRecoveryMail($recipient, $userid, $username, $recoveryString){
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
		$mail->addAddress($recipient);
		// Email subject
		$mail->Subject = 'Recover password';
		// Set email format to HTML
		$mail->isHTML(true);
		// Email body content
		$data['recoveryString'] = $recoveryString;
		$data['userid'] = $userid;
		$data['username'] = $username;
		$mailContent = $this->load->view('emails/sendrecoverymail', $data, TRUE);
		$mail->Body = $mailContent;
		// Send email
		if($mail->send())
			return true;
		else
			return false;		
	}

	function sendRecoveryMail2($recipient, $userid, $username, $recoveryString){
		$this->load->library('email');
		$config = array (
			'mailtype' => 'html',
			'charset'  => 'utf-8',
			'priority' => '1'
			 );
		$this->email->initialize($config);
		$this->email->from('no-reply@afishnik.com', 'Afishnik.com');
		$this->email->to($recipient);	
		$this->email->subject('Recover password');
		$data['recoveryString'] = $recoveryString;
		$data['userid'] = $userid;
		$data['username'] = $username;
		$mailContent = $this->load->view('emails/sendrecoverymail', $data, TRUE);
		$this->email->message($mailContent);
		if($this->email->send())
			return true;
		else
			return false;
	}
}
