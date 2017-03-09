<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Country extends CI_Controller {
	
	public function add_country(){
		$this->load->model('Country_model');
		
		$countryName = $this->input->post('countryName');
		
		if($this->Country_model->countryName($countryName) > 0){
			$this->session->set_userdata('err_msg', "This Country Already Exits.");
		}
		else
		{
			$cntId = $this->Country_model->addCountry($countryName);
			if($cntId != 0){
				$this->session->set_userdata('succ_msg', "Country Successfully Created.");
			}
			else{
				$this->session->set_userdata('err_msg', "Can not create the Country.");
			}
		}
		
		$this->load->view('dash/header');
		$this->load->view('dash/message');
		$this->load->view('dash/footer');
	}
	
	public function view_country(){
		$this->load->model('Country_model');
		$data['countryData'] = $this->Country_model->viewCountry();
		$this->load->view('dash/header');
		$this->load->view('country/viewCountry',$data);
		$this->load->view('dash/footer');
	}
	
	public function view(){
		$cntId = $this->uri->segment(3);
		$this->load->model('Country_model');
		
		$data['countryData'] = $this->Country_model->viewCoun($cntId);
		
		$this->load->view('dash/header');
		$this->load->view('country/editCountry',$data);
		$this->load->view('dash/footer');
	}
	
	public function edit(){
		$this->load->model('Country_model');
		$cntId = $this->input->post('cntId');
		$countryName = $this->input->post('countryName');
		
		if($this->Country_model->countryName($countryName) > 0){
			$this->session->set_userdata('err_msg', "This Country Already Exits.");
		}
		else
		{
			$this->Country_model->updateCountry($countryName,$cntId);
			$this->session->set_userdata('succ_msg', "Country Successfully Updated.");
		}
		
		$this->load->view('dash/header');
		$this->load->view('dash/message');
		$this->load->view('dash/footer');
	}
}