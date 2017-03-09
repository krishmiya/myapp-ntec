<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Campus extends CI_Controller {
	
	public function add_campus(){
		$this->load->model('Campus_model');
		
		$campusName = $this->input->post('campusName');
		
		if($this->Campus_model->campusName($campusName) > 0){
			$this->session->set_userdata('err_msg', "This Campus Already Exits.");
		}
		else
		{
			$camId = $this->Campus_model->addCampus($campusName);
			if($camId != 0){
				$this->session->set_userdata('succ_msg', "Campus Successfully Created.");
			}
			else{
				$this->session->set_userdata('err_msg', "Can not create the Campus.");
			}
		}
		
		$this->load->view('dash/header');
		$this->load->view('dash/message');
		$this->load->view('dash/footer');
	}
	
	public function view_campus(){
		$this->load->model('Campus_model');
		$data['campusData'] = $this->Campus_model->viewCampus();
		$this->load->view('dash/header');
		$this->load->view('campus/viewCampus',$data);
		$this->load->view('dash/footer');
	}
	
	public function view(){
		$camId = $this->uri->segment(3);
		$this->load->model('Campus_model');
		
		$data['campusData'] = $this->Campus_model->viewCam($camId);
		
		$this->load->view('dash/header');
		$this->load->view('campus/editCampus',$data);
		$this->load->view('dash/footer');
	}
	
	public function edit(){
		$this->load->model('Campus_model');
		$camId = $this->input->post('camId');
		$campusName = $this->input->post('campusName');
		
		if($this->Campus_model->campusName($campusName) > 0){
			$this->session->set_userdata('err_msg', "This Campus Already Exits.");
		}
		else
		{
			$this->Campus_model->updateCampus($campusName,$camId);
			$this->session->set_userdata('succ_msg', "Campus Successfully Updated.");
		}
		
		$this->load->view('dash/header');
		$this->load->view('dash/message');
		$this->load->view('dash/footer');
	}
}