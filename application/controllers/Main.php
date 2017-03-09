<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
	
	public function index() {
        if (!$this->session->userdata('uId')) {
            redirect('welcome');
        }
    }
	
	public function Digital_Receptionist(){
		$this->load->view('dash/header');
		$this->load->view('dash/body');
		$this->load->view('dash/footer');
	}
	
	public function change_csp(){
		$this->index();
		$uId = $this->session->userdata('uId');
		$this->load->model('Campus_model');
		$this->load->model('Csp_model');
		
		$pd = $this->Csp_model->getCountPDAll($uId);
		$c = $this->Csp_model->getCountCAll($uId);
		$eh = $this->Csp_model->getCountEHAll($uId);
		$cp = $this->Csp_model->getCountCPAll($uId);
		$ss = $this->Csp_model->getCountSSAll($uId);
		$ts = $this->Csp_model->getCountTSAll($uId);
		$s = $this->Csp_model->getCountSAll($uId);

		if($s > 0){
			if($pd > 0 && $c > 0 && $eh > 0 && $cp > 0 && $ss > 0 && $ts > 0){
				$data['pdData'] = $this->Csp_model->viewPersonalDetails($uId);
				$data['campusData'] = $this->Campus_model->viewCampus();
				
				$this->load->view('dash/header');
				$this->load->view('forms/csp',$data);
				$this->load->view('dash/footer');
			}else{
				$this->show_profile();
			}
		}else{
			$this->session->set_userdata('err_msg', " Without your signature can't submit the application.First submit your signature");
			$this->load->view('dash/header');
			$this->load->view('dash/message');
			$this->load->view('dash/footer');
		}
	}
	
	public function show_profile(){
		$this->index();
		$uId = $this->session->userdata('uId');
		
		$this->load->model('StuProfile_model');//when page load view the current data
		$this->load->model('Campus_model');
		$this->load->model('Country_model');
		$this->load->model('Citizenship_model');
		
		$data['campusData'] = $this->Campus_model->viewCampus();
		$data['countryData'] = $this->Country_model->viewCountry();
		$data['citizenshipData'] = $this->Citizenship_model->viewCitizenship();
		$data['pdData'] = $this->StuProfile_model->getPDData($uId);//when page load view the current data
		
		$this->load->view('dash/header');
		$this->load->view('profile/userProfile',$data);
		$this->load->view('dash/footer');
	}
	
	public function second_year(){
		$this->index();
		$uId = $this->session->userdata('uId');
		$cmId = $this->session->userdata('cmId');
		
		$this->load->model('Course_model');
		$this->load->model('Csp_model');
		
		$pd = $this->Csp_model->getCountPDAll($uId);
		$c = $this->Csp_model->getCountCAll($uId);
		$eh = $this->Csp_model->getCountEHAll($uId);
		$cp = $this->Csp_model->getCountCPAll($uId);
		$ss = $this->Csp_model->getCountSSAll($uId);
		$ts = $this->Csp_model->getCountTSAll($uId);
		
		if($pd > 0 && $c > 0 && $eh > 0 && $cp > 0 && $ss > 0 && $ts > 0){
			$data['pdData'] = $this->Csp_model->viewPersonalDetails($uId);
			$data['courseData'] = $this->Course_model->getCrs($cmId);
			
			$this->load->view('dash/header');
			$this->load->view('forms/syaf',$data);
			$this->load->view('dash/footer');
		}else{
			$this->show_profile();
		}
		
	}
	
	public function secondary_studies(){
		$this->index();
		$uId = $this->session->userdata('uId');
		
		$this->load->model('StuProfile_model');
		$data['secondarystudies'] = $this->StuProfile_model->viewSecondaryStudies($uId);
		
		$this->load->view('dash/header');
		$this->load->view('profile/secondaryStudies',$data);
		$this->load->view('dash/footer');
	}
	
	public function tertiary_tudies(){
		$this->index();
		$uId = $this->session->userdata('uId');
		
		$this->load->model('StuProfile_model');
		$data['tertiarystudies'] = $this->StuProfile_model->viewTertiaryStudies($uId);
		
		$this->load->view('dash/header');
		$this->load->view('profile/tertiaryStudies',$data);
		$this->load->view('dash/footer');
	}
	
	public function add_campus(){
		$this->index();
		$this->load->view('dash/header');
		$this->load->view('campus/newCampus');
		$this->load->view('dash/footer');
	}
	
	public function add_citizenship(){
		$this->index();
		$this->load->view('dash/header');
		$this->load->view('citizenship/newCitizenship');
		$this->load->view('dash/footer');
	}
	
	public function add_department(){
		$this->index();
		$this->load->view('dash/header');
		$this->load->view('course/newDepart');
		$this->load->view('dash/footer');
	}
	
	public function add_course(){
		$this->index();
		$this->load->model('Campus_model');
		$this->load->model('Department_model');
		$this->load->model('School_model');
		
		$cmId = $this->session->userdata('cmId');
		
		$data['campusData'] = $this->Campus_model->viewCampus();
		$data['departmentData'] = $this->Department_model->viewDepartment();
		if($cmId != 0){
			$data['schoolData'] = $this->School_model->viewSchool($cmId);
		}
		
		$this->load->view('dash/header');
		$this->load->view('course/newCourse',$data);
		$this->load->view('dash/footer');
	}
	
	public function add_country(){
		$this->index();
		$this->load->view('dash/header');
		$this->load->view('country/newCountry');
		$this->load->view('dash/footer');
	}
	
	public function add_school(){
		$this->index();
		$this->load->model('Campus_model');
		$data['campusData'] = $this->Campus_model->viewCampus();
		$this->load->view('dash/header');
		$this->load->view('school/newSchool',$data);
		$this->load->view('dash/footer');
	}
	
	public function pending_csp(){
		$this->index();
		$uId = $this->session->userdata('uId');
		$camId = $this->session->userdata('cmId');
		$stuId = $this->session->userdata('stuId');
		$mcId = $this->session->userdata('mcId');
		$usrType = $this->session->userdata('usrType');
		
		$this->load->model('Csp_model');
		$sign = $this->Csp_model->getCountSAll($uId);
		
		
			if($camId == 0 && $stuId == 0 && $mcId == 0 && $usrType == 9 && $sign > 0){
				$camId = 0;
				$mcId = 0;
				$data['pcData'] = $this->Csp_model->viewPendingCsp($camId,$mcId,$usrType);//International Counsellor
				//echo "International Counsellor";
				$this->load->view('dash/header');
				$this->load->view('process/pending/pending_csp',$data);
				$this->load->view('dash/footer');
			}else if($camId != 0 && $stuId == 0 && $usrType == 1 && $mcId != 0 && $sign > 0){//on going HOD's
			//have to write a new query for this part and want to identify what the change by student 
				$data['pcData'] = $this->Csp_model->viewPendingCsp($camId,$mcId,$usrType);//HOD's
				//echo "HOD's";
				$this->load->view('dash/header');
				$this->load->view('process/pending/pending_csp',$data);
				$this->load->view('dash/footer');
			}else if($camId != 0 && $mcId == 0 && $sign > 0 && $usrType == 6 || $usrType == 3){
				$mcId = 0;
				$data['pcData'] = $this->Csp_model->viewPendingCsp($camId,$mcId,$usrType);//Faculty Admin in Charge or Consultation with student
				//echo "Faculty Admin in Charge or Consultation with student";
				$this->load->view('dash/header');
				$this->load->view('process/pending/pending_csp',$data);
				$this->load->view('dash/footer');
			}else if($camId != 0 && $mcId == 0 && $usrType == 2){
				$mcId = 0;
				$data['pcData'] = $this->Csp_model->viewPendingCsp($camId,$mcId,$usrType);//Account Clarke
				//echo "Account Clarke";
				
				$this->load->view('dash/header');
				$this->load->view('process/pending/pending_csp',$data);
				$this->load->view('dash/footer');
			}else{
				$this->upload_signature();
			}
	}
	
	public function pending_second_year(){
		$this->index();
		$camId = $this->session->userdata('cmId');
		$stuId = $this->session->userdata('stuId');
		$mcId = $this->session->userdata('mcId');
		$usrType = $this->session->userdata('usrType');
		
		$this->load->model('Syaf_model');
		
		if($camId != 0){
			$data['pcData'] = $this->Syaf_model->pendingSecondYear($camId,$mcId,$usrType);
		}
		$this->load->view('dash/header');
		$this->load->view('process/pending/pending_second_year',$data);
		$this->load->view('dash/footer');
	}
	
	public function add_users(){
		$this->load->model('login_model');
		$data['campus'] = $this->login_model->allCampus();		
		$data['department'] = $this->login_model->allDepartment();
		
		$this->load->view('dash/header');
		$this->load->view('login/addUsers',$data);
		$this->load->view('dash/footer');
	}
	
	public function rpt_csp(){
		$this->index();
		$this->load->model('Csp_model');
		
		$uId = $this->session->userdata('uId');
		$camId = $this->session->userdata('cmId');
		$stuId = $this->session->userdata('stuId');
		$mcId = $this->session->userdata('mcId');
		$usrType = $this->session->userdata('usrType');
		
		if($mcId != 0){
			$data['cspData'] = $this->Csp_model->rptCsp($mcId,$uId);
		}
		if($mcId == 0){
			$data['cspData'] = $this->Csp_model->rptCsp($mcId,$camId);
		}
		$this->load->view('dash/header');
		$this->load->view('reports/rptCsp',$data);
		$this->load->view('dash/footer');
	}
	
	public function rpt_second_year(){
		$this->index();
		$this->load->model('Syaf_model');
		
		$uId = $this->session->userdata('uId');
		$camId = $this->session->userdata('cmId');
		$stuId = $this->session->userdata('stuId');
		$mcId = $this->session->userdata('mcId');
		$usrType = $this->session->userdata('usrType');
		
		if($mcId != 0){
			$data['syafData'] = $this->Syaf_model->rptSecondYear($mcId,$uId);
		}
		if($mcId == 0){
			$data['syafData'] = $this->Syaf_model->rptSecondYear($mcId,$camId);
		}
		$this->load->view('dash/header');
		$this->load->view('reports/rptSecondYear',$data);
		$this->load->view('dash/footer');
	}
	
	public function upload_signature(){
		$this->index();
		$this->load->view('dash/header');
		$this->load->view('sign/signature');
		$this->load->view('dash/footer');
	}
	
}