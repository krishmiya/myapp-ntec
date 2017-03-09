<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Csp extends CI_Controller {
	public function add_csp(){
		$this->load->model('Csp_model');
		$this->load->model('Campus_model');
		
		$uId = $this->session->userdata('uId');
		$camId = $this->session->userdata('cmId');
		$frstName = $this->session->userdata('frstName');
		
		$data['pdData'] = $this->Csp_model->viewPersonalDetails($uId);
		$data['campusData'] = $this->Campus_model->viewCampus();
		$uId = $this->session->userdata('uId');
		$course = $this->input->post('course');
		$sign_date = $this->input->post('sign_date');
		$dys = $this->input->post('dys');
		$comment = $this->input->post('comment');
		$invoiceNumber = $this->input->post('invoiceNumber');
		$agree = $this->input->post('agree');
		
		if($agree == 1){
			$cspId = $this->Csp_model->addCsp($uId,$course,$comment,$invoiceNumber,$sign_date);
			if($cspId != 0){
				$refNumber = $camId.date('m').date('d').$uId.$cspId;
				
				$this->Csp_model->addRefNCsp($cspId,$refNumber);
				//send email to account clerk
				$this->load->library('email');
				$this->email->set_mailtype('html');
				
				$officerData = $this->Csp_model->emailCsp($camId,2);
				$firstName = $officerData[0]['firstName'];
				$email = $officerData[0]['email'];
				$token = $officerData[0]['token'];
				
				$nw_cspId = $this->encrypt_url($cspId);
				$nw_email = $this->encrypt_url($email);
				
				$bs_url = base_url(). "Csp/email_csp/". $nw_cspId . "/" . $nw_email ."/". $token;
				//echo '</br>'.$bs_url;
				$html = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><title>NEW APPLICATION</title></head><body style="width: 100% !important; height: 100%; margin: 0; line-height: 1.4; background-color: #F2F4F6; color: #74787E;-webkit-text-size-adjust: none; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;"><table style="width: 100%; margin: 0; padding: 0; background-color: #F2F4F6;" width="100%" cellpadding="0" cellspacing="0"><tr><td align="center"><table align="center" style="width: 100%; margin: 0; padding: 0;" width="100%" cellpadding="0" cellspacing="0"><!-- Logo --><tr><td class="email-masthead" style="padding: 25px 0; text-align: center;"><a class="email-masthead_name" style="font-size: 16px; font-weight: bold; color: #bbbfc3; text-decoration: none; text-shadow: 0 1px 0 white;">Ntec | My-App</a></td></tr><!-- Email Body --><tr><td class="email-body" width="100%" style="width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;"><table class="email-body_inner" style="width:100%; margin: 0 auto; padding: 0;" align="center" cellpadding="0" cellspacing="0"><!-- Body content --><tr><td class="content-cell" style="padding: 35px;"><h1 style="margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: center;">Hi '.$firstName.',</h1><p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em; text-align: center;">You have received a new application for Ntec - My-App. </br>Please Click the link below to log in and approve the application, remember to press the submit button when it is complete.</p><!-- Sub copy --><table align="center" class="body-sub" style="margin-bottom: 25px; padding-bottom: 25px; border-bottom: 1px solid #EDEFF2; width:100%;"><tr><td><p class="sub" style="font-size: 11px; text-align: center;"><a href='.$bs_url.'>'.$bs_url.'</a></p></td></tr><tr><td><p class="sub" style="font-size: 12px; text-align: center;">You may have already approved this application online. If so you can ignore this email.</p></td></tr></table><p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em; text-align: center;">Thanks,<br>Ntec | My-App Team</p><p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em; text-align: center;"><strong>**THIS IS AN AUTOMATED EMAIL - PLEASE DO NOT REPLY**</strong></p></td></tr></table></td></tr><tr><td><table class="email-footer" style="100%; margin: 0 auto; padding: 0; text-align: center;" align="center" cellpadding="0" cellspacing="0"><tr><td class="content-cell" style="padding: 35px;"><p class="sub center" style="font-size: 12px; text-align: center;">&copy; 2016 Ntec | My-App. All rights reserved.</p><p class="sub center" style="font-size: 12px; text-align: center;"> Ntec | My-App </p></td></tr></table></td></tr></table></td></tr></table></body></html>';
				
					$this->email->from('info@myapp-ntec.com', 'CSP | Ntec');
					$this->email->to($email);
					$this->email->subject('Ntec Student - Change of campus,programme or school');
					$this->email->message($html);
					
					if($this->email->send()){
						$html = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta name="viewport" content="width=device-width, initial-scale=1.0" /><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><title>AFTER submitting csp</title></head><body style="width: 100% !important; height: 100%; margin: 0; line-height: 1.4; background-color: #F2F4F6; color: #74787E;-webkit-text-size-adjust: none; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;"><table style="width: 100%; margin: 0; padding: 0; background-color: #F2F4F6;" width="100%" cellpadding="0" cellspacing="0"><tr><td align="center"><table style="width: 100%; margin: 0; padding: 0;" width="100%" cellpadding="0" cellspacing="0"><!-- Logo --><tr><td class="email-masthead" style="padding: 25px 0; text-align: center;"><a class="email-masthead_name" style="font-size: 16px; font-weight: bold; color: #bbbfc3; text-decoration: none; text-shadow: 0 1px 0 white;">Ntec | My-App</a></td></tr><!-- Email Body --><tr><td class="email-body" width="100%" style="width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;"><table class="email-body_inner" style="width: 570px; margin: 0 auto; padding: 0;" align="center" width="570" cellpadding="0" cellspacing="0"><!-- Body content --><tr><td class="content-cell" style="padding: 35px;"><h1 style="margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: left;">Dear '.$frstName.',</h1><p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em; text-align: left;">Your application for the Change Campus/Collage/Programme has been received. We are presently in the process of reviewing your application. </br>We anticipate that we will be back in touch with you within the next week to inform you of the results of this process. We appreciate your patience.</p><p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em; text-align: left;">Thanks,<br>Ntec | My-App Team</p><p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em; text-align: left;"><strong>**THIS IS AN AUTOMATED EMAIL - PLEASE DO NOT REPLY**</strong></p><!-- Sub copy --></td></tr></table></td></tr><tr><td><table class="email-footer" style="width: 570px; margin: 0 auto; padding: 0; text-align: center;" align="center" width="570" cellpadding="0" cellspacing="0"><tr><td class="content-cell" style="padding: 35px;"><p class="sub center" style="font-size: 12px; text-align: center;">&copy; 2016 Ntec | My-App. All rights reserved.</p><p class="sub center" style="font-size: 12px; text-align: center;">Ntec | My-App</p></td></tr></table></td></tr></table></td></tr></table></body></html>';
				
						$usrEmail = $this->session->userdata('usrEmail');
						$this->email->from('info@myapp-ntec.com', 'Setup | Ntec');
						$this->email->to($usrEmail);
						$this->email->subject('Application Submit Confirm');
						$this->email->message($html);
						
						if($this->email->send()){
							$this->session->set_userdata('succ_msg', "Application Successfully Submited.");
						}
					}
				//send email to account clerk
				//$this->session->set_userdata('succ_msg', "Application Successfully Created."); old msg
			}
			else{
				$this->session->set_userdata('err_msg', "Can not create the Application.");
			}
		}else{
			$this->session->set_userdata('war_msg', "You must agree to terms and conditions.");
		}
		$this->load->view('dash/header');
		$this->load->view('forms/csp',$data);
		$this->load->view('dash/footer');
	}
	
	public function app_csp(){
		$this->load->model('Csp_model');
		
		$cspId = $this->uri->segment(3);
		$uId = $this->session->userdata('uId');
		$usrType = $this->session->userdata('usrType');
		$camId = $this->session->userdata('cmId');
		$mcId = $this->session->userdata('mcId');

		$dt = $this->Csp_model->getCrsId($cspId);

		$data['pdData'] = $this->Csp_model->viewAppCsp($cspId,$usrType);
		$data['ccData'] = $this->Csp_model->viewAppCspCC($cspId);
		$data['rcData'] = $this->Csp_model->viewAppCspRC($dt[0]['crsId']);
		$data['csData'] = $this->Csp_model->checkStatus($usrType,$cspId);
		$data['asData'] = $this->Csp_model->viewAppStatusCsp($cspId,$usrType); 
		$data['acData'] = $this->Csp_model->viewAppStatusCspAc($cspId,$usrType); 
		$data['asoData'] = $this->Csp_model->viewAppStatusCspO($cspId,$uId); 

		$this->load->view('dash/header');
		$this->load->view('forms/csp',$data);
		$this->load->view('dash/footer');
	}
	
	public function fac_cws(){
		$this->load->model('Csp_model');
		
		$uId = $this->session->userdata('uId');
		$cspId = $this->session->userdata('cspId');
		$faic = $this->input->post('faic');
		$cws = $this->input->post('cws');
		$message = $this->input->post('message');
		$date_commencement = $this->input->post('date_commencement');
		$currentDate = $this->input->post('currentDate');
		if($message == ""){
			$message = "NA";
		}

		if($faic == 1 && $cws == 1){
			$this->Csp_model->add_fac_cws($cspId,$date_commencement,$message,2);
			//$this->Csp_model->upCSP($cspId,1);
			/* send emails */
			$this->load->library('email');
			$this->email->set_mailtype('html');
							
			$newHod = 0;
			$currentHod = 0;
							
			if($date_commencement <= 10){
				$officerData = $this->Csp_model->emailCspIc();
				$firstName = $officerData[0]['firstName'];
				$email = $officerData[0]['email'];
				$token = $officerData[0]['token'];
								
				$nw_cspId = $this->encrypt_url($cspId);
				$nw_email = $this->encrypt_url($email);
								
				$bs_url = base_url(). "Csp/email_csp/". $nw_cspId . "/" . $nw_email ."/". $token;
						
				$html = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><title>NEW APPLICATION</title></head><body style="width: 100% !important; height: 100%; margin: 0; line-height: 1.4; background-color: #F2F4F6; color: #74787E;-webkit-text-size-adjust: none; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;"><table style="width: 100%; margin: 0; padding: 0; background-color: #F2F4F6;" width="100%" cellpadding="0" cellspacing="0"><tr><td align="center"><table align="center" style="width: 100%; margin: 0; padding: 0;" width="100%" cellpadding="0" cellspacing="0"><!-- Logo --><tr><td class="email-masthead" style="padding: 25px 0; text-align: center;"><a class="email-masthead_name" style="font-size: 16px; font-weight: bold; color: #bbbfc3; text-decoration: none; text-shadow: 0 1px 0 white;">Ntec | My-App</a></td></tr><!-- Email Body --><tr><td class="email-body" width="100%" style="width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;"><table class="email-body_inner" style="width:100%; margin: 0 auto; padding: 0;" align="center" cellpadding="0" cellspacing="0"><!-- Body content --><tr><td class="content-cell" style="padding: 35px;"><h1 style="margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: center;">Hi '.$firstName.',</h1><p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em; text-align: center;">You have received a new application for Ntec - My-App. </br>Please Click the link below to log in and approve the application, remember to press the submit button when it is complete.</p><!-- Sub copy --><table align="center" class="body-sub" style="margin-bottom: 25px; padding-bottom: 25px; border-bottom: 1px solid #EDEFF2; width:100%;"><tr><td><p class="sub" style="font-size: 11px; text-align: center;"><a href='.$bs_url.'>'.$bs_url.'</a></p></td></tr><tr><td><p class="sub" style="font-size: 12px; text-align: center;">You may have already approved this application online. If so you can ignore this email.</p></td></tr></table><p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em; text-align: center;">Thanks,<br>Ntec | My-App Team</p><p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em; text-align: center;"><strong>**THIS IS AN AUTOMATED EMAIL - PLEASE DO NOT REPLY**</strong></p></td></tr></table></td></tr><tr><td><table class="email-footer" style="100%; margin: 0 auto; padding: 0; text-align: center;" align="center" cellpadding="0" cellspacing="0"><tr><td class="content-cell" style="padding: 35px;"><p class="sub center" style="font-size: 12px; text-align: center;">&copy; 2016 Ntec | Digital Receptionist. All rights reserved.</p><p class="sub center" style="font-size: 12px; text-align: center;"> Ntec | My-App </p></td></tr></table></td></tr></table></td></tr></table></body></html>';
							
				$this->email->from('info@myapp-ntec.com', 'CSP | Ntec');
				$this->email->to($email);
				$this->email->subject('Ntec Student - Change of campus,programme or school');
				$this->email->message($html);
							
				if($this->email->send()){
					$this->session->set_userdata('succ_msg', "Application Successfully Submited.");
				}
			}else{
					$officerData = $this->Csp_model->currentHod($cspId);
					$firstName = $officerData[0]['firstName'];
					$email = $officerData[0]['email'];
					$token = $officerData[0]['token'];
								
					$nw_cspId = $this->encrypt_url($cspId);
					$nw_email = $this->encrypt_url($email);
								
					$bs_url = base_url(). "Csp/email_csp/". $nw_cspId . "/" . $nw_email ."/". $token;
						
					$html = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><title>NEW APPLICATION</title></head><body style="width: 100% !important; height: 100%; margin: 0; line-height: 1.4; background-color: #F2F4F6; color: #74787E;-webkit-text-size-adjust: none; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;"><table style="width: 100%; margin: 0; padding: 0; background-color: #F2F4F6;" width="100%" cellpadding="0" cellspacing="0"><tr><td align="center"><table align="center" style="width: 100%; margin: 0; padding: 0;" width="100%" cellpadding="0" cellspacing="0"><!-- Logo --><tr><td class="email-masthead" style="padding: 25px 0; text-align: center;"><a class="email-masthead_name" style="font-size: 16px; font-weight: bold; color: #bbbfc3; text-decoration: none; text-shadow: 0 1px 0 white;">Ntec | My-App</a></td></tr><!-- Email Body --><tr><td class="email-body" width="100%" style="width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;"><table class="email-body_inner" style="width:100%; margin: 0 auto; padding: 0;" align="center" cellpadding="0" cellspacing="0"><!-- Body content --><tr><td class="content-cell" style="padding: 35px;"><h1 style="margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: center;">Hi '.$firstName.',</h1><p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em; text-align: center;">You have received a new application for Ntec-myapp. </br>Please Click the link below to log in and approve the application, remember to press the submit button when it is complete.</p><!-- Sub copy --><table align="center" class="body-sub" style="margin-bottom: 25px; padding-bottom: 25px; border-bottom: 1px solid #EDEFF2; width:100%;"><tr><td><p class="sub" style="font-size: 11px; text-align: center;"><a href='.$bs_url.'>'.$bs_url.'</a></p></td></tr><tr><td><p class="sub" style="font-size: 12px; text-align: center;">You may have already approved this application online. If so you can ignore this email.</p></td></tr></table><p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em; text-align: center;">Thanks,<br>Ntec | My-App Team</p><p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em; text-align: center;"><strong>**THIS IS AN AUTOMATED EMAIL - PLEASE DO NOT REPLY**</strong></p></td></tr></table></td></tr><tr><td><table class="email-footer" style="100%; margin: 0 auto; padding: 0; text-align: center;" align="center" cellpadding="0" cellspacing="0"><tr><td class="content-cell" style="padding: 35px;"><p class="sub center" style="font-size: 12px; text-align: center;">&copy; 2016 Ntec | My-App. All rights reserved.</p><p class="sub center" style="font-size: 12px; text-align: center;"> Ntec | My-App </p></td></tr></table></td></tr></table></td></tr></table></body></html>';
				
		$this->email->from('info@myapp-ntec.com', 'CSP | Ntec');
		$this->email->to($email);
		$this->email->subject('Ntec Student - Change of campus,programme or school');
		$this->email->message($html);
					
			
		if($this->email->send()){
			$currentHod = 1;
		}
			
		$officerData = $this->Csp_model->newHod($cspId);
		$firstName = $officerData[0]['firstName'];
		$email = $officerData[0]['email'];
		$token = $officerData[0]['token'];
						
		$nw_cspId = $this->encrypt_url($cspId);
		$nw_email = $this->encrypt_url($email);
						
		$bs_url = base_url(). "Csp/email_csp/". $nw_cspId . "/" . $nw_email ."/". $token;
				
		$html = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><title>NEW APPLICATION</title></head><body style="width: 100% !important; height: 100%; margin: 0; line-height: 1.4; background-color: #F2F4F6; color: #74787E;-webkit-text-size-adjust: none; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;"><table style="width: 100%; margin: 0; padding: 0; background-color: #F2F4F6;" width="100%" cellpadding="0" cellspacing="0"><tr><td align="center"><table align="center" style="width: 100%; margin: 0; padding: 0;" width="100%" cellpadding="0" cellspacing="0"><!-- Logo --><tr><td class="email-masthead" style="padding: 25px 0; text-align: center;"><a class="email-masthead_name" style="font-size: 16px; font-weight: bold; color: #bbbfc3; text-decoration: none; text-shadow: 0 1px 0 white;">Ntec | My-App</a></td>     </tr><!-- Email Body --><tr><td class="email-body" width="100%" style="width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;"><table class="email-body_inner" style="width:100%; margin: 0 auto; padding: 0;" align="center" cellpadding="0" cellspacing="0"><!-- Body content --><tr><td class="content-cell" style="padding: 35px;"><h1 style="margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: center;">Hi '.$firstName.',</h1><p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em; text-align: center;">You have received a new application for Ntec - My-App. </br>Please Click the link below to log in and approve the application, remember to press the submit button when it is complete.</p><!-- Sub copy --><table align="center" class="body-sub" style="margin-bottom: 25px; padding-bottom: 25px; border-bottom: 1px solid #EDEFF2; width:100%;"><tr><td><p class="sub" style="font-size: 11px; text-align: center;"><a href='.$bs_url.'>'.$bs_url.'</a></p></td></tr><tr><td><p class="sub" style="font-size: 12px; text-align: center;">You may have already approved this application online. If so you can ignore this email.</p></td></tr></table><p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em; text-align: center;">Thanks,<br>Ntec | My-App Team</p><p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em; text-align: center;"><strong>**THIS IS AN AUTOMATED EMAIL - PLEASE DO NOT REPLY**</strong></p></td></tr></table></td></tr><tr><td><table class="email-footer" style="100%; margin: 0 auto; padding: 0; text-align: center;" align="center" cellpadding="0" cellspacing="0"><tr><td class="content-cell" style="padding: 35px;"><p class="sub center" style="font-size: 12px; text-align: center;">&copy; 2016 Ntec | My-App. All rights reserved.</p><p class="sub center" style="font-size: 12px; text-align: center;"> Ntec | My-App </p></td></tr></table></td></tr></table></td></tr></table></body></html>';
				
		$this->email->from('info@myapp-ntec.com', 'CSP | Ntec');
		$this->email->to($email);
		$this->email->subject('Ntec Student - Change of campus,programme or school');
		$this->email->message($html);
						
	
		if($this->email->send()){
			$newHod = 1;
	}
}
			/* send emails */
			if($currentHod == 1 && $newHod == 1){
				$this->session->set_userdata('succ_msg', "Successfully Approved for the application.");
			}
			
		}else if($faic == 88 || $cws == 88){
			$this->Csp_model->add_fac_cws($cspId,$date_commencement,$message,88);
			//$this->Csp_model->upCSP($cspId,1);
			$this->session->set_userdata('succ_msg', "Successfully Decline the application.");
		}else{
			$this->session->set_userdata('war_msg', "Please select the both field.");
		}
				
		$this->load->view('dash/header');
		$this->load->view('dash/message');
		$this->load->view('dash/footer');
	}
	
	public function ac(){
		$this->load->model('Csp_model');
		
		$uId = $this->session->userdata('uId');
		$camId = $this->session->userdata('cmId');
		$cspId = $this->session->userdata('cspId');
		$ac = $this->input->post('ac');
		$invoiceAmount = $this->input->post('invoiceAmount');
		
		if($ac == 1){
			$this->Csp_model->upAc($cspId,$invoiceAmount,1);//send email to account clerk
				$this->load->library('email');
				$this->email->set_mailtype('html');
				
				$officerData = $this->Csp_model->emailCsp($camId,6);
				$firstName = $officerData[0]['firstName'];
				$email = $officerData[0]['email'];
				$token = $officerData[0]['token'];
				
				$nw_cspId = $this->encrypt_url($cspId);
				$nw_email = $this->encrypt_url($email);
				
				$bs_url = base_url(). "Csp/email_csp/". $nw_cspId . "/" . $nw_email ."/". $token;
				//echo '</br>'.$bs_url;
				$html = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><title>NEW APPLICATION</title></head><body style="width: 100% !important; height: 100%; margin: 0; line-height: 1.4; background-color: #F2F4F6; color: #74787E;-webkit-text-size-adjust: none; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;"><table style="width: 100%; margin: 0; padding: 0; background-color: #F2F4F6;" width="100%" cellpadding="0" cellspacing="0"><tr><td align="center"><table align="center" style="width: 100%; margin: 0; padding: 0;" width="100%" cellpadding="0" cellspacing="0"><!-- Logo --><tr><td class="email-masthead" style="padding: 25px 0; text-align: center;"><a class="email-masthead_name" style="font-size: 16px; font-weight: bold; color: #bbbfc3; text-decoration: none; text-shadow: 0 1px 0 white;">Ntec | My-App</a></td>     </tr><!-- Email Body --><tr><td class="email-body" width="100%" style="width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;"><table class="email-body_inner" style="width:100%; margin: 0 auto; padding: 0;" align="center" cellpadding="0" cellspacing="0"><!-- Body content --><tr><td class="content-cell" style="padding: 35px;"><h1 style="margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: center;">Hi '.$firstName.',</h1><p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em; text-align: center;">You have received a new application for Ntec-myapp. </br>Please Click the link below to log in and approve the application, remember to press the submit button when it is complete.</p><!-- Sub copy --><table align="center" class="body-sub" style="margin-bottom: 25px; padding-bottom: 25px; border-bottom: 1px solid #EDEFF2; width:100%;"><tr><td><p class="sub" style="font-size: 11px; text-align: center;"><a href='.$bs_url.'>'.$bs_url.'</a></p></td></tr><tr><td><p class="sub" style="font-size: 12px; text-align: center;">You may have already approved this application online. If so you can ignore this email.</p></td></tr></table><p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em; text-align: center;">Thanks,<br>Ntec | My-App Team</p><p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em; text-align: center;"><strong>**THIS IS AN AUTOMATED EMAIL - PLEASE DO NOT REPLY**</strong></p></td></tr></table></td></tr><tr><td><table class="email-footer" style="100%; margin: 0 auto; padding: 0; text-align: center;" align="center" cellpadding="0" cellspacing="0"><tr><td class="content-cell" style="padding: 35px;"><p class="sub center" style="font-size: 12px; text-align: center;">&copy; 2016 Ntec | My-App. All rights reserved.</p><p class="sub center" style="font-size: 12px; text-align: center;"> Ntec | My-App </p></td></tr></table></td></tr></table></td></tr></table></body></html>';
				
					$this->email->from('info@myapp-ntec.com', 'CSP | Ntec');
					$this->email->to($email);
					$this->email->subject('Ntec Faculty Admin in Charge - Change of campus,programme or school');
					$this->email->message($html);
					
					if($this->email->send()){
						$this->session->set_userdata('succ_msg', "Approved the application.");
					}
				//send email to facalty admin
		}else if($ac == 88){
			$this->Csp_model->upAc($cspId,$invoiceAmount,88);
			$this->session->set_userdata('succ_msg', "Decline the application.");
		}else{
			$this->session->set_userdata('war_msg', "Please select one.");
		}
		$this->load->view('dash/header');
		$this->load->view('dash/message');
		$this->load->view('dash/footer');
	}
	
	public function icd(){
		$this->load->model('Csp_model');
		$this->load->library('email');
		$this->email->set_mailtype('html');
		$icd = $this->input->post('icd');
		$uId = $this->session->userdata('uId');
		$cspId = $this->session->userdata('cspId');
		$app_date = $this->input->post('app_date');
		
		if($icd == 1){
			$this->Csp_model->upCSP($cspId,$app_date,6);
			/* send email to student and faculty admin */
			//get student data and send email
			$stu = 0;
			$stuData = $this->Csp_model->getStu($cspId);
			$refNumber = $stuData[0]['refNumber'];
			
			//get student data and send email
			//get faculty admin data and send email
			$fac = 0;
			$facData = $this->Csp_model->getFac($stuData[0]['camId']);
			$facEmail = $facData[0]['email'];
			$facFirstName = $facData[0]['firstName'];
			
			$html = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><title>Finish Application</title></head><body style="width: 100% !important; height: 100%; margin: 0; line-height: 1.4; background-color: #F2F4F6; color: #74787E;-webkit-text-size-adjust: none; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;"><table style="width: 100%; margin: 0; padding: 0; background-color: #003366;" width="100%" cellpadding="0" cellspacing="0"><tr><td align="center"><table align="center" style="width: 100%; margin: 0; padding: 0;" width="100%" cellpadding="0" cellspacing="0"><!-- Logo --><tr><td class="email-masthead" style="padding: 25px 0; text-align: center;"><a class="email-masthead_name" style="font-size: 18px; font-weight: bold; color: #ffffff; text-decoration: none;;">Ntec - My-App</a></td></tr><!-- Email Body --><tr><td class="email-body" width="100%" style="width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;"><table class="email-body_inner" style="width:100%; margin: 0 auto; padding: 0;" align="center" cellpadding="0" cellspacing="0"><!-- Body content --><tr><td class="content-cell" style="padding: 35px;"><h1 style="margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: center;">Hi '.$facFirstName.',</h1><p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em; text-align: center;">You have received a new application form Ntec - My-App. </br>The application reference no '.$refNumber.'.</br></p><!-- Sub copy --><table align="center" class="body-sub" style="margin-bottom: 25px; padding-bottom: 25px; border-bottom: 1px solid #EDEFF2; width:100%;"><tr><td><p class="sub" style="font-size: 12px; text-align: center;"> You may have already seen this application online. If so you can ignore this email.</p></td></tr></table><p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em; text-align: center;">Thanks,<br>Ntec - My-App Support</p><p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em; text-align: center;"><strong>**THIS IS AN AUTOMATED EMAIL - PLEASE DO NOT REPLY**</strong></p></td></tr></table></td></tr><tr><td><table class="email-footer" style="100%; margin: 0 auto; padding: 0; text-align: center;" align="center" cellpadding="0" cellspacing="0"><tr><td class="content-cell" style="padding: 35px;"><p class="sub center" style="font-size: 12px; color:#fff; text-align: center;">&copy; 2016 Ntec - My-App. All rights reserved.</p><p class="sub center" style="font-size: 12px; text-align: center; color:#fff;"> Ntec - My-App Team. </p></td></tr></table></td></tr></table></td></tr></table></body></html>';
				
			$this->email->from('info@myapp-ntec.com', 'CSP | Ntec');
			$this->email->to($facEmail);
			$this->email->subject('Ntec - Change of campus,programme or school');
			$this->email->message($html);
						
	
			if($this->email->send()){
				$fac = 1;
			}
			//get faculty admin data and send email
			if($fac == 1){
				$this->session->set_userdata('succ_msg', "Approved the application.");
			}
			/* send email to student and faculty admin */
		}else if($icd == 88){
			$this->Csp_model->upCSP($cspId,$app_date,88);
			/* send email to student and faculty admin */
			//get student data and send email
			$stu = 0;
			$stuData = $this->Csp_model->getStu($cspId);
			$stuEmail = $stuData[0]['email'];
			$refNumber = $stuData[0]['refNumber'];
			
			//get student data and send email
			//get faculty admin data and send email
			$fac = 0;
			$facData = $this->Csp_model->getFac($stuData[0]['camId']);
			$facEmail = $facData[0]['email'];
			$facFirstName = $facData[0]['firstName'];
			
			$html = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><title>Finish Application</title></head><body style="width: 100% !important; height: 100%; margin: 0; line-height: 1.4; background-color: #F2F4F6; color: #74787E;-webkit-text-size-adjust: none; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;"><table style="width: 100%; margin: 0; padding: 0; background-color: #003366;" width="100%" cellpadding="0" cellspacing="0"><tr><td align="center"><table align="center" style="width: 100%; margin: 0; padding: 0;" width="100%" cellpadding="0" cellspacing="0"><!-- Logo --><tr><td class="email-masthead" style="padding: 25px 0; text-align: center;"><a class="email-masthead_name" style="font-size: 18px; font-weight: bold; color: #ffffff; text-decoration: none;;">Ntec - My-App</a></td></tr><!-- Email Body --><tr><td class="email-body" width="100%" style="width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;"><table class="email-body_inner" style="width:100%; margin: 0 auto; padding: 0;" align="center" cellpadding="0" cellspacing="0"><!-- Body content --><tr><td class="content-cell" style="padding: 35px;"><h1 style="margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: center;">Hi '.$facFirstName.',</h1><p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em; text-align: center;">You have received a new application form Ntec - My-App. </br>The application reference no '.$refNumber.'.</br></p><!-- Sub copy --><table align="center" class="body-sub" style="margin-bottom: 25px; padding-bottom: 25px; border-bottom: 1px solid #EDEFF2; width:100%;"><tr><td><p class="sub" style="font-size: 12px; text-align: center;"> You may have already seen this application online. If so you can ignore this email.</p></td></tr></table><p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em; text-align: center;">Thanks,<br>Ntec - My-App Support</p><p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em; text-align: center;"><strong>**THIS IS AN AUTOMATED EMAIL - PLEASE DO NOT REPLY**</strong></p></td></tr></table></td></tr><tr><td><table class="email-footer" style="100%; margin: 0 auto; padding: 0; text-align: center;" align="center" cellpadding="0" cellspacing="0"><tr><td class="content-cell" style="padding: 35px;"><p class="sub center" style="font-size: 12px; color:#fff; text-align: center;">&copy; 2016 Ntec - My-App. All rights reserved.</p><p class="sub center" style="font-size: 12px; text-align: center; color:#fff;"> Ntec - My-App Team. </p></td></tr></table></td></tr></table></td></tr></table></body></html>';
				
			$this->email->from('info@myapp-ntec.com', 'CSP | Ntec');
			$this->email->to($facEmail);
			$this->email->subject('Ntec - Change of campus,programme or school');
			$this->email->message($html);
						
	
			if($this->email->send()){
				$fac = 1;
			}
			//get faculty admin data and send email
			if($fac == 1){
				$this->session->set_userdata('succ_msg', "Decline the application.");
			}
			/* send email to student and faculty admin */
		}

		$this->load->view('dash/header');
		$this->load->view('dash/message');
		$this->load->view('dash/footer');
	}
	
	public function ccHOD(){
		$this->load->model('Csp_model');
		$hod_cp = $this->input->post('hod_cp');
		$uId = $this->session->userdata('uId');
		$cspId = $this->session->userdata('cspId');
		$app_date = $this->input->post('app_date');
		
		$this->load->library('email');
		$this->email->set_mailtype('html');
		
		$data = $this->Csp_model->checkCSPCN($cspId);
		if($data[0]['hodNew'] == 1){
			if($hod_cp == 88){
				$this->Csp_model->upCSPCH($cspId,$app_date,88);
				$this->Csp_model->addAppStatus($uId,$cspId,$app_date);
				/* send email to student and faculty admin */
				//get student data and send email
				$stu = 0;
				$stuData = $this->Csp_model->getStu($cspId);
				$stuEmail = $stuData[0]['email'];
				$refNumber = $stuData[0]['refNumber'];
				
				//get student data and send email
				//get faculty admin data and send email
				$fac = 0;
				$facData = $this->Csp_model->getFac($stuData[0]['camId']);
				$facEmail = $facData[0]['email'];
				$facFirstName = $facData[0]['firstName'];
			
			$html = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><title>Finish Application</title></head><body style="width: 100% !important; height: 100%; margin: 0; line-height: 1.4; background-color: #F2F4F6; color: #74787E;-webkit-text-size-adjust: none; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;"><table style="width: 100%; margin: 0; padding: 0; background-color: #003366;" width="100%" cellpadding="0" cellspacing="0"><tr><td align="center"><table align="center" style="width: 100%; margin: 0; padding: 0;" width="100%" cellpadding="0" cellspacing="0"><!-- Logo --><tr><td class="email-masthead" style="padding: 25px 0; text-align: center;"><a class="email-masthead_name" style="font-size: 18px; font-weight: bold; color: #ffffff; text-decoration: none;;">Ntec - My-App</a></td></tr><!-- Email Body --><tr><td class="email-body" width="100%" style="width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;"><table class="email-body_inner" style="width:100%; margin: 0 auto; padding: 0;" align="center" cellpadding="0" cellspacing="0"><!-- Body content --><tr><td class="content-cell" style="padding: 35px;"><h1 style="margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: center;">Hi '.$facFirstName.',</h1><p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em; text-align: center;">You have received a new application form Ntec - My-App. </br>The application reference no '.$refNumber.'.</br></p><!-- Sub copy --><table align="center" class="body-sub" style="margin-bottom: 25px; padding-bottom: 25px; border-bottom: 1px solid #EDEFF2; width:100%;"><tr><td><p class="sub" style="font-size: 12px; text-align: center;"> You may have already seen this application online. If so you can ignore this email.</p></td></tr></table><p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em; text-align: center;">Thanks,<br>Ntec - My-App Support</p><p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em; text-align: center;"><strong>**THIS IS AN AUTOMATED EMAIL - PLEASE DO NOT REPLY**</strong></p></td></tr></table></td></tr><tr><td><table class="email-footer" style="100%; margin: 0 auto; padding: 0; text-align: center;" align="center" cellpadding="0" cellspacing="0"><tr><td class="content-cell" style="padding: 35px;"><p class="sub center" style="font-size: 12px; color:#fff; text-align: center;">&copy; 2016 Ntec - My-App. All rights reserved.</p><p class="sub center" style="font-size: 12px; text-align: center; color:#fff;"> Ntec - My-App Team. </p></td></tr></table></td></tr></table></td></tr></table></body></html>';
					
				$this->email->from('info@myapp-ntec.com', 'CSP | Ntec');
				$this->email->to($facEmail);
				$this->email->subject('Ntec - Change of campus,programme or school');
				$this->email->message($html);
							
		
				if($this->email->send()){
					$fac = 1;
				}
				//get faculty admin data and send email
				if($fac == 1){
					$this->session->set_userdata('succ_msg', "Decline the application.");
				}
				/* send email to student and faculty admin */
				
			}else{
				$this->Csp_model->upCSPCH($cspId,$app_date,6);
				$this->Csp_model->addAppStatus($uId,$cspId,$app_date);
				/* send email to student and faculty admin */
				//get student data and send email
				$stu = 0;
				$stuData = $this->Csp_model->getStu($cspId);
				$stuEmail = $stuData[0]['email'];
				$refNumber = $stuData[0]['refNumber'];
				
				//get student data and send email
				//get faculty admin data and send email
				$fac = 0;
				$facData = $this->Csp_model->getFac($stuData[0]['camId']);
				$facEmail = $facData[0]['email'];
				$facFirstName = $facData[0]['firstName'];
			
			$html = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><title>Finish Application</title></head><body style="width: 100% !important; height: 100%; margin: 0; line-height: 1.4; background-color: #F2F4F6; color: #74787E;-webkit-text-size-adjust: none; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;"><table style="width: 100%; margin: 0; padding: 0; background-color: #003366;" width="100%" cellpadding="0" cellspacing="0"><tr><td align="center"><table align="center" style="width: 100%; margin: 0; padding: 0;" width="100%" cellpadding="0" cellspacing="0"><!-- Logo --><tr><td class="email-masthead" style="padding: 25px 0; text-align: center;"><a class="email-masthead_name" style="font-size: 18px; font-weight: bold; color: #ffffff; text-decoration: none;;">Ntec - My-App</a></td></tr><!-- Email Body --><tr><td class="email-body" width="100%" style="width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;"><table class="email-body_inner" style="width:100%; margin: 0 auto; padding: 0;" align="center" cellpadding="0" cellspacing="0"><!-- Body content --><tr><td class="content-cell" style="padding: 35px;"><h1 style="margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: center;">Hi '.$facFirstName.',</h1><p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em; text-align: center;">You have received a new application form Ntec - My-App. </br>The application reference no '.$refNumber.'.</br></p><!-- Sub copy --><table align="center" class="body-sub" style="margin-bottom: 25px; padding-bottom: 25px; border-bottom: 1px solid #EDEFF2; width:100%;"><tr><td><p class="sub" style="font-size: 12px; text-align: center;"> You may have already seen this application online. If so you can ignore this email.</p></td></tr></table><p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em; text-align: center;">Thanks,<br>Ntec - My-App Support</p><p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em; text-align: center;"><strong>**THIS IS AN AUTOMATED EMAIL - PLEASE DO NOT REPLY**</strong></p></td></tr></table></td></tr><tr><td><table class="email-footer" style="100%; margin: 0 auto; padding: 0; text-align: center;" align="center" cellpadding="0" cellspacing="0"><tr><td class="content-cell" style="padding: 35px;"><p class="sub center" style="font-size: 12px; color:#fff; text-align: center;">&copy; 2016 Ntec - My-App. All rights reserved.</p><p class="sub center" style="font-size: 12px; text-align: center; color:#fff;"> Ntec - My-App Team. </p></td></tr></table></td></tr></table></td></tr></table></body></html>';
					
				$this->email->from('info@myapp-ntec.com', 'CSP | Ntec');
				$this->email->to($facEmail);
				$this->email->subject('Ntec - Change of campus,programme or school');
				$this->email->message($html);
							
		
				if($this->email->send()){
					$fac = 1;
				}
				//get faculty admin data and send email
				if($fac == 1){
					$this->session->set_userdata('succ_msg', "Approved the application.");
				}
				/* send email to student and faculty admin */
				
			}
		}else{
			if($hod_cp == 88){
				$this->Csp_model->upCSPCH($cspId,88);
				$this->Csp_model->addAppStatus($uId,$cspId,$app_date);
				/* send email to student and faculty admin */
				//get student data and send email
				$stu = 0;
				$stuData = $this->Csp_model->getStu($cspId);
				$stuEmail = $stuData[0]['email'];
				$refNumber = $stuData[0]['refNumber'];
				
				//get student data and send email
				//get faculty admin data and send email
				$fac = 0;
				$facData = $this->Csp_model->getFac($stuData[0]['camId']);
				$facEmail = $facData[0]['email'];
				$facFirstName = $facData[0]['firstName'];
			
			$html = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><title>Finish Application</title></head><body style="width: 100% !important; height: 100%; margin: 0; line-height: 1.4; background-color: #F2F4F6; color: #74787E;-webkit-text-size-adjust: none; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;"><table style="width: 100%; margin: 0; padding: 0; background-color: #003366;" width="100%" cellpadding="0" cellspacing="0"><tr><td align="center"><table align="center" style="width: 100%; margin: 0; padding: 0;" width="100%" cellpadding="0" cellspacing="0"><!-- Logo --><tr><td class="email-masthead" style="padding: 25px 0; text-align: center;"><a class="email-masthead_name" style="font-size: 18px; font-weight: bold; color: #ffffff; text-decoration: none;;">Ntec - My-App</a></td></tr><!-- Email Body --><tr><td class="email-body" width="100%" style="width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;"><table class="email-body_inner" style="width:100%; margin: 0 auto; padding: 0;" align="center" cellpadding="0" cellspacing="0"><!-- Body content --><tr><td class="content-cell" style="padding: 35px;"><h1 style="margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: center;">Hi '.$facFirstName.',</h1><p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em; text-align: center;">You have received a new application form Ntec - My-App. </br>The application reference no '.$refNumber.'.</br></p><!-- Sub copy --><table align="center" class="body-sub" style="margin-bottom: 25px; padding-bottom: 25px; border-bottom: 1px solid #EDEFF2; width:100%;"><tr><td><p class="sub" style="font-size: 12px; text-align: center;"> You may have already seen this application online. If so you can ignore this email.</p></td></tr></table><p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em; text-align: center;">Thanks,<br>Ntec - My-App Support</p><p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em; text-align: center;"><strong>**THIS IS AN AUTOMATED EMAIL - PLEASE DO NOT REPLY**</strong></p></td></tr></table></td></tr><tr><td><table class="email-footer" style="100%; margin: 0 auto; padding: 0; text-align: center;" align="center" cellpadding="0" cellspacing="0"><tr><td class="content-cell" style="padding: 35px;"><p class="sub center" style="font-size: 12px; color:#fff; text-align: center;">&copy; 2016 Ntec - My-App. All rights reserved.</p><p class="sub center" style="font-size: 12px; text-align: center; color:#fff;"> Ntec - My-App Team. </p></td></tr></table></td></tr></table></td></tr></table></body></html>';
					
				$this->email->from('info@myapp-ntec.com', 'CSP | Ntec');
				$this->email->to($facEmail);
				$this->email->subject('Ntec - Change of campus,programme or school');
				$this->email->message($html);
							
		
				if($this->email->send()){
					$fac = 1;
				}
				//get faculty admin data and send email
				if($fac == 1){
					$this->session->set_userdata('succ_msg', "Decline the application.");
				}
				/* send email to student and faculty admin */
			}else{
				$this->Csp_model->upCSPCH($cspId,$app_date,3);
				$this->Csp_model->addAppStatus($uId,$cspId,$app_date);
				/* send email to student and faculty admin */
				//get student data and send email
				$stu = 0;
				$stuData = $this->Csp_model->getStu($cspId);
				$stuEmail = $stuData[0]['email'];
				$refNumber = $stuData[0]['refNumber'];
				
				//get student data and send email
				//get faculty admin data and send email
				$fac = 0;
				$facData = $this->Csp_model->getFac($stuData[0]['camId']);
				$facEmail = $facData[0]['email'];
				
				$this->session->set_userdata('succ_msg', "Approved the application.");
				/* send email to student and faculty admin */
				
			}
		}
		
		$this->load->view('dash/header');
		$this->load->view('dash/message');
		$this->load->view('dash/footer');
	}
	
	public function ncHOD(){
		$this->load->model('Csp_model');
		$hod_np = $this->input->post('hod_np');
		$uId = $this->session->userdata('uId');
		$cspId = $this->session->userdata('cspId');
		$app_date = $this->input->post('app_date');
		
		$data = $this->Csp_model->checkCSPCN($cspId);
		if($data[0]['hodCurrent'] == 1){
			if($hod_np == 88){
				$this->Csp_model->upCSPNH($cspId,$app_date,88);
				$this->Csp_model->addAppStatus($uId,$cspId,$app_date);
				/* send email to student and faculty admin */
				//get student data and send email
				$stu = 0;
				$stuData = $this->Csp_model->getStu($cspId);
				$stuEmail = $stuData[0]['email'];
				$refNumber = $stuData[0]['refNumber'];

				//get student data and send email
				//get faculty admin data and send email
				$fac = 0;
				$facData = $this->Csp_model->getFac($stuData[0]['camId']);
				$facEmail = $facData[0]['email'];
				$facFirstName = $facData[0]['firstName'];
			
			$html = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><title>Finish Application</title></head><body style="width: 100% !important; height: 100%; margin: 0; line-height: 1.4; background-color: #F2F4F6; color: #74787E;-webkit-text-size-adjust: none; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;"><table style="width: 100%; margin: 0; padding: 0; background-color: #003366;" width="100%" cellpadding="0" cellspacing="0"><tr><td align="center"><table align="center" style="width: 100%; margin: 0; padding: 0;" width="100%" cellpadding="0" cellspacing="0"><!-- Logo --><tr><td class="email-masthead" style="padding: 25px 0; text-align: center;"><a class="email-masthead_name" style="font-size: 18px; font-weight: bold; color: #ffffff; text-decoration: none;;">Ntec - My-App</a></td></tr><!-- Email Body --><tr><td class="email-body" width="100%" style="width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;"><table class="email-body_inner" style="width:100%; margin: 0 auto; padding: 0;" align="center" cellpadding="0" cellspacing="0"><!-- Body content --><tr><td class="content-cell" style="padding: 35px;"><h1 style="margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: center;">Hi '.$facFirstName.',</h1><p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em; text-align: center;">You have received a new application form Ntec - My-App. </br>The application reference no '.$refNumber.'.</br></p><!-- Sub copy --><table align="center" class="body-sub" style="margin-bottom: 25px; padding-bottom: 25px; border-bottom: 1px solid #EDEFF2; width:100%;"><tr><td><p class="sub" style="font-size: 12px; text-align: center;"> You may have already seen this application online. If so you can ignore this email.</p></td></tr></table><p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em; text-align: center;">Thanks,<br>Ntec - My-App Support</p><p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em; text-align: center;"><strong>**THIS IS AN AUTOMATED EMAIL - PLEASE DO NOT REPLY**</strong></p></td></tr></table></td></tr><tr><td><table class="email-footer" style="100%; margin: 0 auto; padding: 0; text-align: center;" align="center" cellpadding="0" cellspacing="0"><tr><td class="content-cell" style="padding: 35px;"><p class="sub center" style="font-size: 12px; color:#fff; text-align: center;">&copy; 2016 Ntec - My-App. All rights reserved.</p><p class="sub center" style="font-size: 12px; text-align: center; color:#fff;"> Ntec - My-App Team. </p></td></tr></table></td></tr></table></td></tr></table></body></html>';
					
				$this->email->from('info@myapp-ntec.com', 'CSP | Ntec');
				$this->email->to($facEmail);
				$this->email->subject('Ntec - Change of campus,programme or school');
				$this->email->message($html);
							
		
				if($this->email->send()){
					$fac = 1;
				}
				//get faculty admin data and send email
				if($fac == 1){
					$this->session->set_userdata('succ_msg', "Decline the application.");
				}
				/* send email to student and faculty admin */
			}else{
				$this->Csp_model->upCSPNH($cspId,$app_date,6);
				$this->Csp_model->addAppStatus($uId,$cspId,$app_date);
				/* send email to student and faculty admin */
				//get student data and send email
				$stu = 0;
				$stuData = $this->Csp_model->getStu($cspId);
				$stuEmail = $stuData[0]['email'];
				$refNumber = $stuData[0]['refNumber'];

				//get student data and send email
				//get faculty admin data and send email
				$fac = 0;
				$facData = $this->Csp_model->getFac($stuData[0]['camId']);
				$facEmail = $facData[0]['email'];
				$facFirstName = $facData[0]['firstName'];
			
			$html = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><title>Finish Application</title></head><body style="width: 100% !important; height: 100%; margin: 0; line-height: 1.4; background-color: #F2F4F6; color: #74787E;-webkit-text-size-adjust: none; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;"><table style="width: 100%; margin: 0; padding: 0; background-color: #003366;" width="100%" cellpadding="0" cellspacing="0"><tr><td align="center"><table align="center" style="width: 100%; margin: 0; padding: 0;" width="100%" cellpadding="0" cellspacing="0"><!-- Logo --><tr><td class="email-masthead" style="padding: 25px 0; text-align: center;"><a class="email-masthead_name" style="font-size: 18px; font-weight: bold; color: #ffffff; text-decoration: none;;">Ntec - My-App</a></td></tr><!-- Email Body --><tr><td class="email-body" width="100%" style="width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;"><table class="email-body_inner" style="width:100%; margin: 0 auto; padding: 0;" align="center" cellpadding="0" cellspacing="0"><!-- Body content --><tr><td class="content-cell" style="padding: 35px;"><h1 style="margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: center;">Hi '.$facFirstName.',</h1><p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em; text-align: center;">You have received a new application form Ntec - My-App. </br>The application reference no '.$refNumber.'.</br></p><!-- Sub copy --><table align="center" class="body-sub" style="margin-bottom: 25px; padding-bottom: 25px; border-bottom: 1px solid #EDEFF2; width:100%;"><tr><td><p class="sub" style="font-size: 12px; text-align: center;"> You may have already seen this application online. If so you can ignore this email.</p></td></tr></table><p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em; text-align: center;">Thanks,<br>Ntec - My-App Support</p><p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em; text-align: center;"><strong>**THIS IS AN AUTOMATED EMAIL - PLEASE DO NOT REPLY**</strong></p></td></tr></table></td></tr><tr><td><table class="email-footer" style="100%; margin: 0 auto; padding: 0; text-align: center;" align="center" cellpadding="0" cellspacing="0"><tr><td class="content-cell" style="padding: 35px;"><p class="sub center" style="font-size: 12px; color:#fff; text-align: center;">&copy; 2016 Ntec - My-App. All rights reserved.</p><p class="sub center" style="font-size: 12px; text-align: center; color:#fff;"> Ntec - My-App Team. </p></td></tr></table></td></tr></table></td></tr></table></body></html>';
					
				$this->email->from('info@myapp-ntec.com', 'CSP | Ntec');
				$this->email->to($facEmail);
				$this->email->subject('Ntec - Change of campus,programme or school');
				$this->email->message($html);
							
		
				if($this->email->send()){
					$fac = 1;
				}
				//get faculty admin data and send email
				if($fac == 1){
					$this->session->set_userdata('succ_msg', "Approved the application.");
				}
				/* send email to student and faculty admin */
				
			}
		}else{
			if($hod_np == 88){
				$this->Csp_model->upCSPNH($cspId,88);
				$this->Csp_model->addAppStatus($uId,$cspId,$app_date);
				/* send email to student and faculty admin */
				//get student data and send email
				$stu = 0;
				$stuData = $this->Csp_model->getStu($cspId);
				$stuEmail = $stuData[0]['email'];
				$refNumber = $stuData[0]['refNumber'];
				
				//get student data and send email
				//get faculty admin data and send email
				$fac = 0;
				$facData = $this->Csp_model->getFac($stuData[0]['camId']);
				$facEmail = $facData[0]['email'];
				
				//get faculty admin data and send email
				$this->session->set_userdata('succ_msg', "Decline the application.");
				/* send email to student and faculty admin */
			}else{
				$this->Csp_model->upCSPNH($cspId,$app_date,3);
				$this->Csp_model->addAppStatus($uId,$cspId,$app_date);
				/* send email to student and faculty admin */
				//get student data and send email
				$stu = 0;
				$stuData = $this->Csp_model->getStu($cspId);
				$stuEmail = $stuData[0]['email'];
				$refNumber = $stuData[0]['refNumber'];
				
				//get student data and send email
				//get faculty admin data and send email
				$fac = 0;
				$facData = $this->Csp_model->getFac($stuData[0]['camId']);
				$facEmail = $facData[0]['email'];
				
				//get faculty admin data and send email
				$this->session->set_userdata('succ_msg', "Approved the application.");
				/* send email to student and faculty admin */
				
			}
		}

		$this->load->view('dash/header');
		$this->load->view('dash/message');
		$this->load->view('dash/footer');
	}
	
	public function nc_cc_HOD(){
		$this->load->model('Csp_model');
		$hod_cc_np = $this->input->post('hod_cc_np');
		$uId = $this->session->userdata('uId');
		$cspId = $this->session->userdata('cspId');
		$app_date = $this->input->post('app_date');
		
		if($hod_cc_np == 88){
				$this->Csp_model->upCCNCNH($cspId,$app_date,88);
				$this->Csp_model->addAppStatus($uId,$cspId,$app_date);
				/* send email to student and faculty admin */
				//get student data and send email
				$stu = 0;
				$stuData = $this->Csp_model->getStu($cspId);
				$stuEmail = $stuData[0]['email'];
				$refNumber = $stuData[0]['refNumber'];
				
				//get student data and send email
				//get faculty admin data and send email
				$fac = 0;
				$facData = $this->Csp_model->getFac($stuData[0]['camId']);
				$facEmail = $facData[0]['email'];
				$facFirstName = $facData[0]['firstName'];
			
			$html = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><title>Finish Application</title></head><body style="width: 100% !important; height: 100%; margin: 0; line-height: 1.4; background-color: #F2F4F6; color: #74787E;-webkit-text-size-adjust: none; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;"><table style="width: 100%; margin: 0; padding: 0; background-color: #003366;" width="100%" cellpadding="0" cellspacing="0"><tr><td align="center"><table align="center" style="width: 100%; margin: 0; padding: 0;" width="100%" cellpadding="0" cellspacing="0"><!-- Logo --><tr><td class="email-masthead" style="padding: 25px 0; text-align: center;"><a class="email-masthead_name" style="font-size: 18px; font-weight: bold; color: #ffffff; text-decoration: none;;">Ntec - My-App</a></td></tr><!-- Email Body --><tr><td class="email-body" width="100%" style="width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;"><table class="email-body_inner" style="width:100%; margin: 0 auto; padding: 0;" align="center" cellpadding="0" cellspacing="0"><!-- Body content --><tr><td class="content-cell" style="padding: 35px;"><h1 style="margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: center;">Hi '.$facFirstName.',</h1><p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em; text-align: center;">You have received a new application form Ntec - My-App. </br>The application reference no '.$refNumber.'.</br></p><!-- Sub copy --><table align="center" class="body-sub" style="margin-bottom: 25px; padding-bottom: 25px; border-bottom: 1px solid #EDEFF2; width:100%;"><tr><td><p class="sub" style="font-size: 12px; text-align: center;"> You may have already seen this application online. If so you can ignore this email.</p></td></tr></table><p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em; text-align: center;">Thanks,<br>Ntec - My-App Support</p><p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em; text-align: center;"><strong>**THIS IS AN AUTOMATED EMAIL - PLEASE DO NOT REPLY**</strong></p></td></tr></table></td></tr><tr><td><table class="email-footer" style="100%; margin: 0 auto; padding: 0; text-align: center;" align="center" cellpadding="0" cellspacing="0"><tr><td class="content-cell" style="padding: 35px;"><p class="sub center" style="font-size: 12px; color:#fff; text-align: center;">&copy; 2016 Ntec - My-App. All rights reserved.</p><p class="sub center" style="font-size: 12px; text-align: center; color:#fff;"> Ntec - My-App Team. </p></td></tr></table></td></tr></table></td></tr></table></body></html>';
					
				$this->email->from('info@myapp-ntec.com', 'CSP | Ntec');
				$this->email->to($facEmail);
				$this->email->subject('Ntec - Change of campus,programme or school');
				$this->email->message($html);
							
		
				if($this->email->send()){
					$fac = 1;
				}
				//get faculty admin data and send email
				if($fac == 1){
					$this->session->set_userdata('succ_msg', "Decline the application.");
				}
				/* send email to student and faculty admin */
			}else{
				$this->Csp_model->upCSPNH($cspId,$app_date,6);
				$this->Csp_model->addAppStatus($uId,$cspId,$app_date);
				/* send email to student and faculty admin */
				//get student data and send email
				$stu = 0;
				$stuData = $this->Csp_model->getStu($cspId);
				$stuEmail = $stuData[0]['email'];
				$refNumber = $stuData[0]['refNumber'];
				
				//get student data and send email
				//get faculty admin data and send email
				$fac = 0;
				$facData = $this->Csp_model->getFac($stuData[0]['camId']);
				$facEmail = $facData[0]['email'];
				$facFirstName = $facData[0]['firstName'];
			
			$html = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><title>Finish Application</title></head><body style="width: 100% !important; height: 100%; margin: 0; line-height: 1.4; background-color: #F2F4F6; color: #74787E;-webkit-text-size-adjust: none; font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;"><table style="width: 100%; margin: 0; padding: 0; background-color: #003366;" width="100%" cellpadding="0" cellspacing="0"><tr><td align="center"><table align="center" style="width: 100%; margin: 0; padding: 0;" width="100%" cellpadding="0" cellspacing="0"><!-- Logo --><tr><td class="email-masthead" style="padding: 25px 0; text-align: center;"><a class="email-masthead_name" style="font-size: 18px; font-weight: bold; color: #ffffff; text-decoration: none;;">Ntec - My-App</a></td></tr><!-- Email Body --><tr><td class="email-body" width="100%" style="width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;"><table class="email-body_inner" style="width:100%; margin: 0 auto; padding: 0;" align="center" cellpadding="0" cellspacing="0"><!-- Body content --><tr><td class="content-cell" style="padding: 35px;"><h1 style="margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: center;">Hi '.$facFirstName.',</h1><p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em; text-align: center;">You have received a new application form Ntec - My-App. </br>The application reference no '.$refNumber.'.</br></p><!-- Sub copy --><table align="center" class="body-sub" style="margin-bottom: 25px; padding-bottom: 25px; border-bottom: 1px solid #EDEFF2; width:100%;"><tr><td><p class="sub" style="font-size: 12px; text-align: center;"> You may have already seen this application online. If so you can ignore this email.</p></td></tr></table><p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em; text-align: center;">Thanks,<br>Ntec - My-App Support</p><p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em; text-align: center;"><strong>**THIS IS AN AUTOMATED EMAIL - PLEASE DO NOT REPLY**</strong></p></td></tr></table></td></tr><tr><td><table class="email-footer" style="100%; margin: 0 auto; padding: 0; text-align: center;" align="center" cellpadding="0" cellspacing="0"><tr><td class="content-cell" style="padding: 35px;"><p class="sub center" style="font-size: 12px; color:#fff; text-align: center;">&copy; 2016 Ntec - My-App. All rights reserved.</p><p class="sub center" style="font-size: 12px; text-align: center; color:#fff;"> Ntec - My-App Team. </p></td></tr></table></td></tr></table></td></tr></table></body></html>';
					
				$this->email->from('info@myapp-ntec.com', 'CSP | Ntec');
				$this->email->to($facEmail);
				$this->email->subject('Ntec - Change of campus,programme or school');
				$this->email->message($html);
							
		
				if($this->email->send()){
					$fac = 1;
				}
				//get faculty admin data and send email
				if($fac == 1){
					$this->session->set_userdata('succ_msg', "Approved the application.");
				}
				/* send email to student and faculty admin */
				
			}
	}
	
	public function email_csp(){
		$this->load->model('Csp_model');
		$cspId = $this->uri->segment(3);
		$email = $this->uri->segment(4);
		$token = $this->uri->segment(5);
		
		$data = $this->Csp_model->logInEmail($this->decrypt_url($email),$token);
			if(count($data) > 0){
				$this->session->set_userdata('uId', $data[0]['uId']);
				$this->session->set_userdata('stuId', $data[0]['stuId']);
				$this->session->set_userdata('cmId', $data[0]['camId']);
				$this->session->set_userdata('mcId', $data[0]['mcId']);
				$this->session->set_userdata('usrType', $data[0]['usrType']);
				$this->session->set_userdata('password', $data[0]['password']);
				$this->session->set_userdata('usrEmail', $data[0]['email']);
				$this->session->set_userdata('frstName', $data[0]['firstName']);
				$this->session->set_userdata('lstName', $data[0]['lastName']);
				
				$uId = $this->session->userdata('uId');
				$usrType = $this->session->userdata('usrType');
				$camId = $this->session->userdata('cmId');
				$mcId = $this->session->userdata('mcId');
				
				$nw_cspId = $this->decrypt_url($cspId);
				
				$dt = $this->Csp_model->getCrsId($nw_cspId);

				$data['pdData'] = $this->Csp_model->viewAppCsp($nw_cspId,$usrType);
				$data['ccData'] = $this->Csp_model->viewAppCspCC($nw_cspId);
				$data['rcData'] = $this->Csp_model->viewAppCspRC($dt[0]['crsId']);
				$data['csData'] = $this->Csp_model->checkStatus($usrType,$nw_cspId);
				$data['asData'] = $this->Csp_model->viewAppStatusCsp($nw_cspId,$usrType); 
				$data['acData'] = $this->Csp_model->viewAppStatusCspAc($nw_cspId,$usrType); 
				$data['asoData'] = $this->Csp_model->viewAppStatusCspO($nw_cspId,$uId); 
		
				$this->load->view('dash/header');
				$this->load->view('forms/csp',$data);
				$this->load->view('dash/footer');
			}
	}
	
	public function encrypt_url($string) {
	  $key = "#KcRhIaSmHiAdNiTlHsNhIiMkEaSlHaBkUmDaDlIiK0A1D8A0W8A8T9A1G9O8L9L1A@"; //key to encrypt and decrypts.
	  $result = '';
	  $test = "";
	   for($i=0; $i<strlen($string); $i++) {
		 $char = substr($string, $i, 1);
		 $keychar = substr($key, ($i % strlen($key))-1, 1);
		 $char = chr(ord($char)+ord($keychar));
	
		 $test[$char]= ord($char)+ord($keychar);
		 $result.=$char;
	   }
	
	   return urlencode(base64_encode($result));
	}

	public function decrypt_url($string) {
		$key = "#KcRhIaSmHiAdNiTlHsNhIiMkEaSlHaBkUmDaDlIiK0A1D8A0W8A8T9A1G9O8L9L1A@"; //key to encrypt and decrypts.
		$result = '';
		$string = base64_decode(urldecode($string));
	   for($i=0; $i<strlen($string); $i++) {
		 $char = substr($string, $i, 1);
		 $keychar = substr($key, ($i % strlen($key))-1, 1);
		 $char = chr(ord($char)-ord($keychar));
		 $result.=$char;
	   }
	   return $result;
	}
	
	public function view_profile() {
		$this->load->model('Csp_model');
		$cspId = $this->uri->segment(3);
		
		$data['viewProfile'] = $this->Csp_model->viewProfile($cspId);
		$data['viewProfileAgent'] = $this->Csp_model->viewProfileAgent($cspId);
		$data['viewProfileSecondaryStudies'] = $this->Csp_model->viewProfileSecondaryStudies($cspId);
		$data['viewProfileTertiaryStudies'] = $this->Csp_model->viewProfileTertiaryStudies($cspId);
		
		$this->load->view('dash/header');
		$this->load->view('forms/viewProfile',$data);
		$this->load->view('dash/footer');
	}
}