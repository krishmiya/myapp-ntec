<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class School extends CI_Controller {
	
	public function add_school(){
		$this->load->model('School_model');
		
		$camId = $this->input->post('campus');
		$schoolName = $this->input->post('schoolName');
		
		if($this->School_model->schoolName($camId,$schoolName) > 0){
			$this->session->set_userdata('err_msg', "This School Already Exits.");
		}
		else
		{
			$sId = $this->School_model->addSchool($camId,$schoolName);
			if($sId != 0){
				$this->session->set_userdata('succ_msg', "School Successfully Created.");
			}
			else{
				$this->session->set_userdata('err_msg', "Can not create the School.");
			}
		}
		
		$this->load->view('dash/header');
		$this->load->view('dash/message');
		$this->load->view('dash/footer');
	}
	
	public function view_school(){
		$this->load->model('School_model');
		
		$cmId = $this->session->userdata('cmId');
		if($cmId == 0){
			$data['schoolData'] = $this->School_model->viewSchool($cmId);
		}else{
			$data['schoolData'] = $this->School_model->viewSchool($cmId);
		}
		$this->load->view('dash/header');
		$this->load->view('school/viewSchool',$data);
		$this->load->view('dash/footer');
	}
	
	public function view(){
		$sId = $this->uri->segment(3);
		$this->load->model('School_model');
		$this->load->model('Campus_model');
		$data['campusData'] = $this->Campus_model->viewCampus();
		$data['schoolData'] = $this->School_model->viewSchl($sId);
		
		$this->load->view('dash/header');
		$this->load->view('school/editSchool',$data);
		$this->load->view('dash/footer');
	}
	
	public function edit(){
		$this->load->model('School_model');
		$camId = $this->input->post('campus');
		$sId = $this->input->post('sId');
		$schoolName = $this->input->post('schoolName');
		
		if($this->School_model->schoolName($camId,$schoolName) > 0){
			$this->session->set_userdata('err_msg', "This School Already Exits.");
		}
		else
		{
			$this->School_model->updateSchool($camId,$schoolName,$sId);
			$this->session->set_userdata('succ_msg', "School Successfully Updated.");
		}
		
		$this->load->view('dash/header');
		$this->load->view('dash/message');
		$this->load->view('dash/footer');
	}
	
	public function get_school(){
		$this->load->model('School_model');
		$camId = array('camId'=>$this->input->post('camID'));
		$data['schoolData'] = $this->School_model->getSchool($camId);
		$this->load->view('profile/schoolSelectBox',$data);
	}
}