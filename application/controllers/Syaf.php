<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Syaf extends CI_Controller {
	public function add_syaf(){
		$this->load->model('Course_model');
		$this->load->model('Csp_model');
		$this->load->model('Syaf_model');
		
		$cmId = $this->session->userdata('cmId');
		$uId = $this->session->userdata('uId');
		$course = $this->input->post('course');
		$agree = $this->input->post('agree');
		$app_date = $this->input->post('app_date');
		
		$data['courseData'] = $this->Course_model->getCrs($cmId);
		$data['pdData'] = $this->Csp_model->viewPersonalDetails($uId);
		
		if($agree == 1){
			$syaId = $this->Syaf_model->addSyaf($uId,$course,$app_date);
			if($syaId != 0){
				$refNumber = $cmId.date('m').$uId.date('d').$syaId;
				
				$this->Syaf_model->addRefNSyaf($syaId,$refNumber);
				$this->session->set_userdata('succ_msg', "Application Successfully Created.");
			}
			else{
				$this->session->set_userdata('err_msg', "Can not create the Application.");
			}
		}else{
			$this->session->set_userdata('war_msg', "You must agree to terms and conditions.");
		}
		
		$this->load->view('dash/header');
		$this->load->view('forms/syaf',$data);
		$this->load->view('dash/footer');
	}
	
	public function app_syaf(){
		$this->load->model('Syaf_model');
		
		$syaId = $this->uri->segment(3);
		$uId = $this->session->userdata('uId');
		$usrType = $this->session->userdata('usrType');
		$camId = $this->session->userdata('cmId');
		$mcId = $this->session->userdata('mcId'); 
		
		if($syaId != 0 && $usrType == 2 || $usrType == 3 || $usrType == 4 || $usrType == 6 && $mcId == 0){
			$data['pdData'] = $this->Syaf_model->viewStuDetails($syaId);
			$data['rcData'] = $this->Syaf_model->viewAppCspRC($syaId);
			$data['csData'] = $this->Syaf_model->checkStatus($usrType,$syaId);
			//$data['asData'] = $this->Syaf_model->viewAppStatusSya($syaId); 
		}

		$this->load->view('dash/header');
		$this->load->view('forms/syaf',$data);
		$this->load->view('dash/footer');
	}
	
	public function add_acc(){
		$this->load->model('Syaf_model');
			
		$syaId = $this->session->userdata('syaId');
		$proposedStartDate = $this->input->post('csDate');
		$proposedFinishDate = $this->input->post('ccDate');
		$avgMarks = $this->input->post('avgMarks');
		$attendance = $this->input->post('attendance');
		$ielts = $this->input->post('ielts');
		if($ielts != 1){
			$ieltsDate = 0000-00-00;
		}else{
			$ieltsDate = $this->input->post('ieltsDate');
		}
		$scholarship = $this->input->post('scholarship');
		$discount = $this->input->post('discount');
		if($scholarship != "" && $discount != ""){
			$this->session->set_userdata('war_msg', "You can't enter the both of scholarship and discount fields.");
		}
		$criterion = 0;
		$cone = $this->input->post('cone');
		$ctwo = $this->input->post('ctwo');
		if($cone != "" && $ctwo != ""){
			$this->session->set_userdata('war_msg', "You can't enter the both of Criterion 1 and Criterion 2 fields.");
		}else if($cone == ""){
			$criterion = $cone;
		}else if($ctwo == ""){
			$criterion = $ctwo;
		}else if($cone != "" && $ctwo == ""){
			$criterion = $cone;
		}else if($cone == "" && $ctwo != ""){
			$criterion = $ctwo;
		}
		$fee = $this->input->post('otf');
		$ntf = $this->input->post('ntf');
		$resourseFee = $this->input->post('rf');
		$insuranceFee = $this->input->post('if');
		$message = $this->input->post('message');
		if($message == ""){
			$message = "NA";
		}
		
		$this->Syaf_model->addAccount($syaId,$proposedStartDate,$proposedFinishDate,$avgMarks,$attendance,$ieltsDate,$scholarship,$discount,$criterion,$fee,$resourseFee,$insuranceFee);
		$this->Syaf_model->upStatus($syaId,6);
		$this->session->set_userdata('succ_msg', "Application Successfully Created.");
		
		$this->load->view('dash/header');
		$this->load->view('dash/message');
		$this->load->view('dash/footer');
	}
	
	public function fac_cws(){
		$this->load->model('Syaf_model');
			
		$syaId = $this->session->userdata('syaId');
		$faic = $this->input->post('faic');
		$office_comment = $this->input->post('message');
		if($office_comment == ""){
			$office_comment = "NA";
		}
		if($faic == 1){
			$this->Syaf_model->add_fac_cws($syaId,$office_comment,1);
			$this->session->set_userdata('succ_msg', "Approved for the application.");
		}
		if($faic == 2){
			$this->Syaf_model->add_fac_cws($syaId,$office_comment,88);
			$this->session->set_userdata('succ_msg', "Decline for the application.");
		}

		$this->load->view('dash/header');
		$this->load->view('dash/message');
		$this->load->view('dash/footer');
	}
}