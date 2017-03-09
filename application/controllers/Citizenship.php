<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Citizenship extends CI_Controller {
	
	public function add_citizenship(){
		$this->load->model('Citizenship_model');
		
		$citizenshipName = $this->input->post('citizenshipName');
		
		if($this->Citizenship_model->citizenshipName($citizenshipName) > 0){
			$this->session->set_userdata('err_msg', "This Citizenship Already Exits.");
		}
		else
		{
			$cId = $this->Citizenship_model->addCitizenship($citizenshipName);
			if($cId != 0){
				$this->session->set_userdata('succ_msg', "Citizenship Successfully Created.");
			}
			else{
				$this->session->set_userdata('err_msg', "Can not create the Citizenship.");
			}
		}
		
		$this->load->view('dash/header');
		$this->load->view('dash/message');
		$this->load->view('dash/footer');
	}
	
	public function view_citizenship(){
		$this->load->model('Citizenship_model');
		$data['citizenshipData'] = $this->Citizenship_model->viewCitizenship();
		$this->load->view('dash/header');
		$this->load->view('citizenship/viewCitizenship',$data);
		$this->load->view('dash/footer');
	}
	
	public function view(){
		$cId = $this->uri->segment(3);
		$this->load->model('Citizenship_model');
		
		$data['citizenshipData'] = $this->Citizenship_model->viewCiti($cId);
		
		$this->load->view('dash/header');
		$this->load->view('citizenship/editCitizenship',$data);
		$this->load->view('dash/footer');
	}
	
	public function edit(){
		$this->load->model('Citizenship_model');
		$cId = $this->input->post('cId');
		$citizenshipName = $this->input->post('citizenshipName');
		
		if($this->Citizenship_model->citizenshipName($citizenshipName) > 0){
			$this->session->set_userdata('err_msg', "This Citizenship Already Exits.");
		}
		else
		{
			$this->Citizenship_model->updateCitizenship($citizenshipName,$cId);
			$this->session->set_userdata('succ_msg', "Citizenship Successfully Updated.");
		}
		
		$this->load->view('dash/header');
		$this->load->view('dash/message');
		$this->load->view('dash/footer');
	}
}