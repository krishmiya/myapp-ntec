<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Department extends CI_Controller {
	
	public function add_department(){
		$this->load->model('Department_model');
		
		$departmentName = $this->input->post('departmentName');
		
		if($this->Department_model->departmentName($departmentName) > 0){
			$this->session->set_userdata('err_msg', "This Department Already Exits.");
		}
		else
		{
			$mcId = $this->Department_model->adddepartment($departmentName);
			if($mcId != 0){
				$this->session->set_userdata('succ_msg', "Department Successfully Created.");
			}
			else{
				$this->session->set_userdata('err_msg', "Can not create the Department.");
			}
		}
		
		$this->load->view('dash/header');
		$this->load->view('dash/message');
		$this->load->view('dash/footer');
	}
	
	public function view_department(){
		$this->load->model('Department_model');
		$data['departmentData'] = $this->Department_model->viewDepartment();
		$this->load->view('dash/header');
		$this->load->view('course/viewDepart',$data);
		$this->load->view('dash/footer');
	}
	
	public function view(){
		$mcId = $this->uri->segment(3);
		$this->load->model('Department_model');
		
		$data['departmentData'] = $this->Department_model->viewDepart($mcId);
		
		$this->load->view('dash/header');
		$this->load->view('course/editDepart',$data);
		$this->load->view('dash/footer');
	}
	
	public function edit(){
		$this->load->model('Department_model');
		$mcId = $this->input->post('mcId');
		$departmentName = $this->input->post('departmentName');
		
		if($this->Department_model->departmentName($departmentName) > 0){
			$this->session->set_userdata('err_msg', "This Department Already Exits.");
		}
		else
		{
			$this->Department_model->updateDepartment($departmentName,$mcId);
			$this->session->set_userdata('succ_msg', "Department Successfully Updated.");
		}
		
		$this->load->view('dash/header');
		$this->load->view('dash/message');
		$this->load->view('dash/footer');
	}
}