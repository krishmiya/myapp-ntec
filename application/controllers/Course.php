<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Course extends CI_Controller {
	
	/*public function load_campus() {
        $term = $this->input->get('term');
        $this->load->model('Course_model');
        $info = $this->Course_model->loadCampus($term);
        echo json_encode($info);
    }*/
	
	public function add_course(){
		$this->load->model('Course_model');
		
		$school = $this->input->post('school');
		$courseName = $this->input->post('courseName');
		$department = $this->input->post('department');
		
		if($this->Course_model->courseName($school,$department,$courseName) > 0){
			$this->session->set_userdata('err_msg', "This Course Already Exits.");
		}
		else
		{
			$crsId = $this->Course_model->addCourse($school,$department,$courseName);
			if($crsId != 0){
				$this->session->set_userdata('succ_msg', "Course Successfully Created.");
			}
			else{
				$this->session->set_userdata('err_msg', "Can not create the Course.");
			}
		}
		
		$this->load->view('dash/header');
		$this->load->view('dash/message');
		$this->load->view('dash/footer');
	}
	
	public function view_course(){
		$this->load->model('Course_model');
		
		$cmId = $this->session->userdata('cmId');
		
		if($cmId == 0){
			$data['courseData'] = $this->Course_model->viewCourse($cmId);
		}else{
			$data['courseData'] = $this->Course_model->viewCourse($cmId);
		}
		
		$this->load->view('dash/header');
		$this->load->view('course/viewCourse',$data);
		$this->load->view('dash/footer');
	}
	
	public function view(){
		$this->load->model('Course_model');
		$this->load->model('Campus_model');
		$this->load->model('Department_model');
		$this->load->model('School_model');
		
		$cmId = $this->session->userdata('cmId');
		$crsId = $this->uri->segment(3);
		
		$data['campusData'] = $this->Campus_model->viewCampus();
		$data['departmentData'] = $this->Department_model->viewDepartment();
		$data['commData'] = $this->Course_model->viewCou($crsId);
		
		if($cmId == 0){
			$data['schoolData'] = $this->School_model->viewSchool($cmId);
		}else{
			$data['schoolData'] = $this->School_model->viewSchool($cmId);
		}
		
		$this->load->view('dash/header');
		$this->load->view('course/editCourse',$data);
		$this->load->view('dash/footer');
	}
	
	public function edit(){
		$this->load->model('Course_model');
		$crsId = $this->input->post('crsId');
		$sId = $this->input->post('school');
		$mcId = $this->input->post('department');
		$courseName = $this->input->post('courseName');
		
		if($this->Course_model->courseName($sId,$mcId,$courseName) > 0){
			$this->session->set_userdata('err_msg', "This Course Already Exits.");
		}
		else
		{
			$this->Course_model->updateCourse($sId,$mcId,$courseName,$crsId);
			$this->session->set_userdata('succ_msg', "Course Successfully Updated.");
		}
		
		$this->load->view('dash/header');
		$this->load->view('dash/message');
		$this->load->view('dash/footer');
	}
	
	public function get_course(){
		$this->load->model('Course_model');
		$sId = array('sId'=>$this->input->post('sID'));
		$data['courseData'] = $this->Course_model->getCourse($sId);
		$this->load->view('profile/courseSelectBox',$data);
	}
}