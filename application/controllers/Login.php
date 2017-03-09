<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function create_account(){
		$this->load->model('Login_model');
		$this->load->library('email');
		$this->email->set_mailtype('html');
		
		$stuId = $this->input->post('sId');
		$camId = $this->input->post('campus');
		$mcId = $this->input->post('department');
		$firstName = $this->input->post('firstName');
		$lastName = $this->input->post('lastName');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$token = round(microtime(true) * 1000)."108808".date('Ymd');
		
		if($stuId != "" || $camId != "" || $mcId != "" || $firstName != "" || $lastName != "" || $email != "" || $password != "" || $token != ""){
		
			if($this->Login_model->checkUsr($email) < 1){
				$uId = $this->Login_model->createAccount($stuId,$camId,$mcId,$firstName,$lastName,$email,md5($password),md5($token));
				$bs_url = base_url(). "Login/verify_password/". $uId . "/" . md5($token) ."/". md5($password);
				
				$html = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta name="viewport" content="width=device-width, initial-scale=1.0" /><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><title>Confirm Account</title></head><body style="width: 100% !important; height: 100%; margin: 0; line-height: 1.4; background-color: #F2F4F6; color: #74787E;-webkit-text-size-adjust: none; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;"><table style="width: 100%; margin: 0; padding: 0; background-color: #F2F4F6;" width="100%" cellpadding="0" cellspacing="0"><tr><td align="center"><table style="width: 100%; margin: 0; padding: 0;" width="100%" cellpadding="0" cellspacing="0"><!-- Logo --><tr><td class="email-masthead" style="padding: 25px 0; text-align: center;"><a class="email-masthead_name" style="font-size: 16px; font-weight: bold; color: #bbbfc3; text-decoration: none; text-shadow: 0 1px 0 white;">Ntec | Digital Receptionist</a></td></tr><!-- Email Body --><tr><td class="email-body" width="100%" style="width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;"><table class="email-body_inner" style="width: 570px; margin: 0 auto; padding: 0;" align="center" width="570" cellpadding="0" cellspacing="0"><!-- Body content --><tr><td class="content-cell" style="padding: 35px;">
<h1 style="margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: left;">Hi, Welcome to Ntec Digital Receptionist!</h1><p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em; text-align: left;">Click below to confirm your email address and get started.</p><!-- Action --><table class="body-action" style="width: 100%; margin: 30px auto; padding: 0; text-align: center;" align="center" width="100%" cellpadding="0" cellspacing="0"><tr><td align="center" style=""><div style=""><a style="display: inline-block; width: 200px; background-color: #3869D4; border-radius: 3px; color: #ffffff; font-size: 15px; line-height: 45px; text-align: center; text-decoration: none; -webkit-text-size-adjust: none; mso-hide: all; background-color: #22BC66;" href="'.$bs_url.'" class="button button--green">ACTIVATE YOUR ACCOUNT</a></div></td></tr></table><p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em; text-align: left;">Thanks,<br>Ntec | Digital Receptionist Team</p><p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em; text-align: left;"><strong>**THIS IS AN AUTOMATED EMAIL - PLEASE DO NOT REPLY**</strong></p><!-- Sub copy --><table class="body-sub" style="margin-top: 25px; padding-top: 25px; border-top: 1px solid #EDEFF2;"><tr><td><p class="sub" style="font-size: 12px;">If the above button does not work, copy and paste the following URL in a new browser window:</p><p class="sub" style="font-size: 12px;"><a href="'.$bs_url.'">'.$bs_url.'</a></p></td></tr></table></td></tr></table></td></tr><tr><td><table class="email-footer" style="width: 570px; margin: 0 auto; padding: 0; text-align: center;" align="center" width="570" cellpadding="0" cellspacing="0"><tr><td class="content-cell" style="padding: 35px;"><p class="sub center" style="font-size: 12px; text-align: center;">&copy; 2016 Ntec | Digital Receptionist. All rights reserved.</p><p class="sub center" style="font-size: 12px; text-align: center;">Ntec | Digital Receptionist</p></td></tr></table></td></tr></table></td></tr></table></body></html>';
				
				if($uId){
					$this->email->from('info@myapp-ntec.com', 'Setup | Ntec');
					$this->email->to($email);
					$this->email->subject('Ntec Student Account Verification');
					$this->email->message($html);
					
					if($this->email->send()){
						$this->session->set_userdata('user_email', $email);
						$this->load->view('login/login_confirm');
					}
					else{
						$this->load->view('login/send_email_error');
					}
				}
				else{
					$this->load->view('login/registraction_failed');
				}
			}else{ 
				$this->load->view('login/email_exist');
			}
		}else{
			redirect('welcome');
		}
	}
	
	public function verify_password(){
		$this->load->model('Login_model');
		
		$uId = $this->uri->segment(3);
		$token = $this->uri->segment(4);
		$password = $this->uri->segment(5);

		if($this->Login_model->viewVerify($uId) > 0){
			$this->Login_model->verifyPassword($uId,$token,$password);
			$this->load->view('login/email_confirm');
		}	
	}
	
	public function log_in(){
		$this->load->model('Login_model');
		
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		
		if($this->Login_model->checkVerifyPassword($email) > 0){
			$data = $this->Login_model->logIn($email,md5($password));
			if(count($data) > 0){
				$k = 0;
				while ($k < count($data)) {
					$this->session->set_userdata('uId', $data[$k]['uId']);
					$this->session->set_userdata('stuId', $data[$k]['stuId']);
					$this->session->set_userdata('cmId', $data[$k]['camId']);
					$this->session->set_userdata('mcId', $data[$k]['mcId']);
					$this->session->set_userdata('usrType', $data[$k]['usrType']);
					$this->session->set_userdata('password', $data[$k]['password']);
					$this->session->set_userdata('usrEmail', $data[$k]['email']);
					$this->session->set_userdata('frstName', $data[$k]['firstName']);
					$this->session->set_userdata('lstName', $data[$k]['lastName']);
					$k++;
				}
				if($this->session->userdata('uId')){
					$this->load->view('dash/header');
					$this->load->view('dash/body');
					$this->load->view('dash/footer');
				}
				else{
					$this->login();
				}
			}
			else{
				$this->load->view('login/incorrect_credentials');
			}
		}
		else{
			$this->session->set_userdata('user_email', $email);
			$this->load->view('login/no_email');
		}
	}
	
	public function lost_password(){
		$this->load->view('login/lostPassword');
	}
	
	/*public function reset_password(){
		$this->load->model('Login_model');
		$this->load->library('email');
		
		$email = $this->session->userdata('usrEmail');
		$password = $this->generateRandomString(10);
		
		if($this->Login_model->checkUser($email) > 0){
			
			$this->email->from('info@myapp-ntec.com', 'Setup | Ntec');
			$this->email->to($email);
			$this->email->subject('Ntec Student Account Re-set Password');
			$this->email->message('Password : ' . $password);
			
			if($this->email->send()){
				$this->Login_model->resetPassword($email,md5($password));
				$this->load->view('login/user_pw_Reset_sucess');
			}
			else{
				$this->load->view('login/user_pw_Reset_fail');
			}
		}
	}*/
	
	public function reset_password(){
		$this->load->model('Login_model');
		$this->load->library('email');
		$this->email->set_mailtype('html');
		
		$email = $this->session->userdata('usrEmail');
		$oPwd = $this->input->post('oPwd');
		$nwPwd = $this->input->post('nwPwd');
		
		if($this->Login_model->chckUsr($email,md5($oPwd)) > 0){
						
			$this->email->from('info@myapp-ntec.com', 'Setup | Ntec');
			$this->email->to($email);
			$this->email->subject('Ntec Student Account Re-set Password');
			$this->email->message('Password : ' . $nwPwd);
			
			if($this->email->send()){
				$this->Login_model->resetPassword($email,md5($nwPwd));
				$this->load->view('login/user_pw_Reset_sucess');
			}
			else{
				$this->load->view('login/user_pw_Reset_fail');
			}
		}
	}
	
	public function reset_pwd(){
		$this->load->model('Login_model');
		$this->load->library('email');
		$this->email->set_mailtype('html');
		
		$email = $this->input->post('email');
		$password = $this->generateRandomString(10);
		
		if($this->Login_model->checkUser($email) > 0){
			
			$html = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta name="viewport" content="width=device-width, initial-scale=1.0" /><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><title>Recovery Password</title></head><body style="width: 100% !important; height: 100%; margin: 0; line-height: 1.4; background-color: #F2F4F6; color: #74787E;-webkit-text-size-adjust: none; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;"><table style="width: 100%; margin: 0; padding: 0; background-color: #F2F4F6;" width="100%" cellpadding="0" cellspacing="0"><tr><td align="center"><table style="width: 100%; margin: 0; padding: 0;" width="100%" cellpadding="0" cellspacing="0"><!-- Logo --><tr><td class="email-masthead" style="padding: 25px 0; text-align: center;"><a class="email-masthead_name" style="font-size: 16px; font-weight: bold; color: #bbbfc3; text-decoration: none; text-shadow: 0 1px 0 white;">Ntec | Digital Receptionist</a></td></tr><!-- Email Body --><tr><td class="email-body" width="100%" style="width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;"><table class="email-body_inner" style="width: 570px; margin: 0 auto; padding: 0;" align="center" width="570" cellpadding="0" cellspacing="0"><!-- Body content --><tr><td class="content-cell" style="padding: 35px;"> <h1 style="margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: left;">Hi,</h1><p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em; text-align: left;">You recently requested to recover your password for your Ntec Digital Receptionist account.</p>   <!-- Action --><table class="body-action" style="width: 100%; margin: 30px auto; padding: 0; text-align: center;" align="center" width="100%" cellpadding="0" cellspacing="0"><tr><td align="center"><p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em; text-align: left;">Your New Account Password is '.$password.' . Do not share this Account Password outside the Ntec-Digital Receptionist domain.</p></td></tr></table><p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em; text-align: left;">If you did not request a password recovery, please ignore this email or reply to let us know.</p><p class="sub"><a href="{{action_url}}">support@myapp-ntec.com</a></p><p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em; text-align: left;">Thanks,<br>Ntec | Digital Receptionist Team</p><p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em; text-align: left;"><strong>**THIS IS AN AUTOMATED EMAIL - PLEASE DO NOT REPLY**</strong></p><!-- Sub copy --><table class="body-sub" style="margin-top: 25px; padding-top: 25px; border-top: 1px solid #EDEFF2;"><tr><td><p class="sub" style="font-size: 12px;">If you’re having trouble clicking the password reset button, copy and paste the URL below into your web browser.</p><p class="sub" style="font-size: 12px;"><a href="{{action_url}}">{{action_url}}</a></p></td></tr></table></td></tr></table></td></tr><tr><td><table class="email-footer" style="width: 570px; margin: 0 auto; padding: 0; text-align: center;" align="center" width="570" cellpadding="0" cellspacing="0"><tr><td class="content-cell" style="padding: 35px;"> <p class="sub center" style="font-size: 12px; text-align: center;">&copy; 2016 Ntec | Digital Receptionist. All rights reserved.</p><p class="sub center" style="font-size: 12px; text-align: center;">Ntec | Digital Receptionist</p></td></tr></table></td></tr></table></td></tr></table></body></html>';
			
			$this->email->from('info@myapp-ntec.com', 'Setup | Ntec');
			$this->email->to($email);
			$this->email->subject('Ntec Student Account Re-set Password');
			$this->email->message('Password : ' . $password);
			
			if($this->email->send()){
				$this->Login_model->resetPassword($email,md5($password));
				$this->load->view('login/user_pw_Reset_sucess');
			}
			else{
				$this->load->view('login/user_pw_Reset_fail');
			}
		}else{
			$this->load->view('login/fake_pwd_request');
		}
	}
	
	function generateRandomString($length) {
	    $characters = '#K!c@R#h%I^a&S*m(H)i_A-d+N=i[T{l}H]s?N/h\I|i.M,k`E~aSlHaBkUmDaDlIiK0A1D8A0W8A8T9A1G9O8L9L1A@';
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, strlen($characters) - 1)];
	    }
	    return $randomString;
	}
	
	public function change_password(){
		$this->load->view('dash/header');
		$this->load->view('login/changePassword');
		$this->load->view('dash/footer');
	}
	
	public function add_users(){
		$this->load->model('Login_model');
		$this->load->library('email');
		$this->email->set_mailtype('html');
		
		$userType = $this->input->post('userType');
		$campus = $this->input->post('campus');
		if($userType == 9){
			$campus = 0;
		}
		$department = $this->input->post('department');
		if($department == "" || $department == 0){
			$department = 0;
		}
		$firstName = $this->input->post('firstName');
		$lastName = $this->input->post('lastName');
		$email = $this->input->post('email');
		$token = round(microtime(true) * 1000)."108808".date('Ymd');
		$password = $this->generateRandomString(10);
		
		$stuId = 0;
		
		if($this->Login_model->checkUsr($email) < 1){
			if($userType == 1 || $userType == 2 || $userType == 3 || $userType == 4 || $userType == 6 || $userType == 9){
				$uId = $this->Login_model->addUsers($stuId,$campus,$department,$firstName,$lastName,$email,md5($password),$userType,md5($token));
				//echo base_url(). "login/verify_password/" . $uId . "/" . md5($token) ."/". md5($password);
				
				$bs_url = base_url(). "Login/verify_password/". $uId . "/" . md5($token) ."/". md5($password);
				/* Mail Body */
				$html = "<!DOCTYPE html><html><head></head><body><table width='100%' border='1'><tr><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td><p>   Please Confirm<br> <strong>Your E-mail:</strong><br><a class='blue' href='".$bs_url."'>aaa</a><br> to Complete Your Registration</p></td></tr></table></body></html>";	
				/* Mail Body */
				
				if($uId){
					$this->email->from('info@myapp-ntec.com', 'Setup | Ntec');
					$this->email->to($email);
					$this->email->subject('Ntec New Account | Staff');
					$this->email->message($html);
					
					if($this->email->send()){
						$this->session->set_userdata('succ_msg', "Successfully Created.");
					}
					else{
						$this->session->set_userdata('err_msg', "An Error Occurred while sending Mail.");
					}
				}
				else{
					$this->session->set_userdata('err_msg', "Error Encountered While Registering.");
				}
			}else{
				$this->session->set_userdata('err_msg', "Please try again.you can't create this type of user.");
			}
		}else{
			$this->session->set_userdata('succ_msg', "Username or email already registered.");
		}
		$this->load->view('dash/header');
		$this->load->view('dash/message');
		$this->load->view('dash/footer');
	}
	
	public function log_out(){
		$this->load->view('login/logout');
	}
}