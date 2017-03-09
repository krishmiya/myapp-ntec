<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class StuProfile extends CI_Controller {
	
	public function personalDetails(){
		$this->load->model('StuProfile_model');
		$this->load->library('form_validation');
		$this->load->model('Campus_model');
		$this->load->model('Country_model');
		$this->load->model('Citizenship_model');
		
		$data['campusData'] = $this->Campus_model->viewCampus();
		$data['countryData'] = $this->Country_model->viewCountry();
		$data['citizenshipData'] = $this->Citizenship_model->viewCitizenship();
		
		$uId = $this->session->userdata('uId');
		$password = $this->session->userdata('password');
			
		$uId = $this->session->userdata('uId');
		$pdPreferredName = $this->input->post('preferredName');
		$pdDOB = $this->input->post('dOB');
		$pdGender = $this->input->post('pdGender');
		$pdCitizenship = $this->input->post('pdCitizenship');
		$pdCountry = $this->input->post('pdCountry');
		$pdPassportNumber = $this->input->post('pdPassportNumber');
		$ppIssuDate = $this->input->post('ppIssuDate');
		$ppExpiryDate = $this->input->post('ppExpiryDate');
		$ppVisaDate = $this->input->post('ppVisaDate');
		$pdInsurence = $this->input->post('pdInsurence');
		$iIssueDate = $this->input->post('iIssueDate');
		$iExpiryDate = $this->input->post('iExpiryDate');
		$pdDisaDescription = $this->input->post('pdDisaDescription');
		if($pdDisaDescription == ""){
			$pdDisaDescription = "NA";
		}
		$pdPassword = $this->input->post('PersonalDetailspwd');
		
		$this->form_validation->set_error_delimiters("<div class='alert alert-danger'><button type='button' class='close close-alert' data-dismiss='alert' aria-hidden='true'>x</button>", "</div>");
		$this->form_validation->set_rules('preferredName', 'Preferred Name', 'required');
		$this->form_validation->set_rules('dOB', 'Date of Birth', 'required');
		$this->form_validation->set_rules('pdPassportNumber', 'Passport Number', 'required');
		$this->form_validation->set_rules('ppIssuDate', 'Passport Issue Date', 'required');
		$this->form_validation->set_rules('ppExpiryDate', 'Passport Expiry Date', 'required');
		$this->form_validation->set_rules('ppVisaDate', 'Visa Expiry Date', 'required');
		$this->form_validation->set_rules('pdInsurence', 'Insurance', 'required');
		$this->form_validation->set_rules('iIssueDate', 'Insurance Issue Date', 'required');
		$this->form_validation->set_rules('iExpiryDate', 'Insurance ExpiryDate', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_userdata('war_msg','Error');
        } else {
			if($password == md5($pdPassword)){
				if($this->StuProfile_model->getPersonalDetails($uId) == 0){
					$pdId = $this->StuProfile_model->addPersonalDetails($uId,$pdPreferredName,$pdDOB,$pdGender,$pdCitizenship,$pdCountry,$pdPassportNumber,$ppIssuDate,$ppExpiryDate,$ppVisaDate,$pdInsurence,$iIssueDate,$iExpiryDate,$pdDisaDescription);
				
					if($pdId != 0){
						$this->session->set_userdata('succ_msg', "Personal Details Successfully Created.");
					}
					else{
						$this->session->set_userdata('err_msg', "Can not create the Personal Details.");
					}
				}else{
					$this->StuProfile_model->updatePersonalDetails($uId,$pdPreferredName,$pdDOB,$pdGender,$pdCitizenship,$pdCountry,$pdPassportNumber,$ppIssuDate,$ppExpiryDate,$ppVisaDate,$pdInsurence,$iIssueDate,$iExpiryDate,$pdDisaDescription);
					$this->session->set_userdata('succ_msg', "Personal Details Successfully Updated.");
				}
			}else{
				$this->session->set_userdata('war_msg', "Password missmatch.");
			}
		}
		
			$this->load->view('dash/header');
			$this->load->view('profile/userProfile',$data);
			$this->load->view('dash/footer');
	}
	
	public function personalContactDetails(){
		$this->load->model('StuProfile_model');
		$this->load->library('form_validation');
		$this->load->model('Campus_model');
		$this->load->model('Country_model');
		$this->load->model('Citizenship_model');
		
		$data['campusData'] = $this->Campus_model->viewCampus();
		$data['countryData'] = $this->Country_model->viewCountry();
		$data['citizenshipData'] = $this->Citizenship_model->viewCitizenship();
		
		$uId = $this->session->userdata('uId');
		$password = $this->session->userdata('password');
		
		$address = $this->input->post('address');
		$telephone = $this->input->post('telephone');
		$fax = $this->input->post('fax');
		$email = $this->input->post('email');
		$pcdPasword = $this->input->post('PersonalContactDetailspwd');

		$this->form_validation->set_error_delimiters("<div class='alert alert-danger'><button type='button' class='close close-alert' data-dismiss='alert' aria-hidden='true'>x</button>", "</div>");
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('telephone', 'Telephone', 'required');
		$this->form_validation->set_rules('PersonalContactDetailspwd', 'Password', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_userdata('war_msg','Can not insert data');
        } else {
			if($password == md5($pcdPasword)){
				if($this->StuProfile_model->getPersonalContactDetails($uId) == 0){
					$cdId = $this->StuProfile_model->addPersonalContactDetails($uId,$address,$telephone,$fax,$email);
			
					if($cdId != 0){
						$this->session->set_userdata('succ_msg', "Personal Contact Details Successfully Created.");
					}
					else{
						$this->session->set_userdata('err_msg', "Can not create the Personal Contact Details.");
					}
				}else{
					$this->StuProfile_model->updatePersonalContactDetails($uId,$address,$telephone,$fax,$email);
					$this->session->set_userdata('succ_msg', "Personal Contact Details Successfully Updated.");
				}
			}else{
				$this->session->set_userdata('war_msg', "Password missmatch.");
			}
		}
		
		$this->load->view('dash/header');
		$this->load->view('profile/userProfile',$data);
		$this->load->view('dash/footer');
	}
	
	public function parentsContactDetails(){
		$this->load->model('StuProfile_model');
		$this->load->library('form_validation');
		$this->load->model('Campus_model');
		$this->load->model('Country_model');
		$this->load->model('Citizenship_model');
		
		$data['campusData'] = $this->Campus_model->viewCampus();
		$data['countryData'] = $this->Country_model->viewCountry();
		$data['citizenshipData'] = $this->Citizenship_model->viewCitizenship();
		
		$uId = $this->session->userdata('uId');
		$password = $this->session->userdata('password');
		
		$name = $this->input->post('name');
		$relationship = $this->input->post('relationship');
		$address = $this->input->post('address');
		$telephone = $this->input->post('telephone');
		$email = $this->input->post('email');
		$Parentpwd = $this->input->post('ParentsContactDetailspwd');

		$this->form_validation->set_error_delimiters("<div class='alert alert-danger'><button type='button' class='close close-alert' data-dismiss='alert' aria-hidden='true'>x</button>", "</div>");
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('relationship', 'Relationship', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('telephone', 'Telephone', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_userdata('war_msg','Error');
        } else {
			if($password == md5($Parentpwd)){
				if($this->StuProfile_model->getParentsContactDetails($uId) == 0){
					$echId = $this->StuProfile_model->addParentsContactDetails($uId,$name,$relationship,$address,$telephone,$email);
		
					if($echId != 0){
						$this->session->set_userdata('succ_msg', "Parents Contact Details Successfully Created.");
					}
					else{
						$this->session->set_userdata('err_msg', "Can not create the Parents Contact Details.");
					}
				}else{
					$this->StuProfile_model->updateParentsContactDetails($uId,$name,$relationship,$address,$telephone,$email);
					$this->session->set_userdata('succ_msg', "Parents Contact Details Successfully Updated.");
				}
			}else{
				$this->session->set_userdata('war_msg', "Password missmatch.");
			}
		}
		
		$this->load->view('dash/header');
		$this->load->view('profile/userProfile',$data);
		$this->load->view('dash/footer');
	}
	
	public function emergencyContactNz(){
		$this->load->model('StuProfile_model');
		$this->load->library('form_validation');
		$this->load->model('Campus_model');
		$this->load->model('Country_model');
		$this->load->model('Citizenship_model');
		
		$data['campusData'] = $this->Campus_model->viewCampus();
		$data['countryData'] = $this->Country_model->viewCountry();
		$data['citizenshipData'] = $this->Citizenship_model->viewCitizenship();
		
		$uId = $this->session->userdata('uId');
		$password = $this->session->userdata('password');
		
		$name = $this->input->post('name');
		$relationship = $this->input->post('relationship');
		$address = $this->input->post('address');
		$telephone = $this->input->post('telephone');
		$email = $this->input->post('email');
		$Emergencypwd = $this->input->post('emergencyContactNzpwd');
		
		$this->form_validation->set_error_delimiters("<div class='alert alert-danger'><button type='button' class='close close-alert' data-dismiss='alert' aria-hidden='true'>x</button>", "</div>");
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('relationship', 'Relationship', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('telephone', 'Telephone', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_userdata('war_msg','Error');
        } else {
			if($password == md5($Emergencypwd)){
				if($this->StuProfile_model->getEmergencyContactNz($uId) == 0){
					$ecnzId = $this->StuProfile_model->addEmergencyContactNz($uId,$name,$relationship,$address,$telephone,$email);
		
					if($ecnzId != 0){
						$this->session->set_userdata('succ_msg', "Emergency Contact Nz Successfully Created.");
					}
					else{
						$this->session->set_userdata('err_msg', "Can not create the EmergencyContact Nz.");
					}
				}else{
					$this->StuProfile_model->updateEmergencyContactNz($uId,$name,$relationship,$address,$telephone,$email);
					$this->session->set_userdata('succ_msg', "Emergency Contact Details Successfully Updated.");
				}
			}else{
				$this->session->set_userdata('war_msg', "Password missmatch.");
			}
		}
		
		$this->load->view('dash/header');
		$this->load->view('profile/userProfile',$data);
		$this->load->view('dash/footer');
	}
	
	public function agentContact(){
		$this->load->model('StuProfile_model');
		$this->load->library('form_validation');
		$this->load->model('Campus_model');
		$this->load->model('Country_model');
		$this->load->model('Citizenship_model');
		
		$data['campusData'] = $this->Campus_model->viewCampus();
		$data['countryData'] = $this->Country_model->viewCountry();
		$data['citizenshipData'] = $this->Citizenship_model->viewCitizenship();
		
		$uId = $this->session->userdata('uId');
		$password = $this->session->userdata('password');
		
		$name = $this->input->post('name');
		$address = $this->input->post('address');
		$telephone = $this->input->post('telephone');
		$fax = $this->input->post('fax');
		$email = $this->input->post('email');
		$Agentpwd = $this->input->post('agentContactNzpwd');
		
		$this->form_validation->set_error_delimiters("<div class='alert alert-danger'><button type='button' class='close close-alert' data-dismiss='alert' aria-hidden='true'>x</button>", "</div>");
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('telephone', 'Telephone', 'required');
		$this->form_validation->set_rules('fax', 'Fax', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_userdata('war_msg','Error');
        } else {
			if($password == md5($Agentpwd)){
				if($this->StuProfile_model->getAgentContact($uId) == 0){
					$acId = $this->StuProfile_model->addAgentContact($uId,$name,$address,$telephone,$fax,$email);
		
					if($acId != 0){
						$this->session->set_userdata('succ_msg', "Agent Contact Successfully Created.");
					}
					else{
						$this->session->set_userdata('err_msg', "Can not create the Agent Contact.");
					}
				}else{
					$this->StuProfile_model->updateAgentContact($uId,$name,$address,$telephone,$fax,$email);
					$this->session->set_userdata('succ_msg', "Agent Contact Details Successfully Updated.");
				}
			}else{
				$this->session->set_userdata('war_msg', "Password missmatch.");
			}
		}
		
		$this->load->view('dash/header');
		$this->load->view('profile/userProfile',$data);
		$this->load->view('dash/footer');
	}
	
	/*public function currentCourseDetails(){
		$this->load->model('StuProfile_model');
		
		$uId = $this->session->userdata('uId');
		
		$data = array(
            'uId' => $uId,
			'crsId' => $this->input->post('cCDCourse'),
            'proposedStartDate' => $this->input->post('cCDStartDate'),
            'proposedFinishDate' => $this->input->post('cCDFinishDate')
        );
		$this->StuProfile_model->addCurrentCourseDetails($data);
	}*/
	
	public function currentCourseDetails(){
		$this->load->model('StuProfile_model');
		$this->load->library('form_validation');
		$this->load->model('Campus_model');
		$this->load->model('Country_model');
		$this->load->model('Citizenship_model');
		
		$data['campusData'] = $this->Campus_model->viewCampus();
		$data['countryData'] = $this->Country_model->viewCountry();
		$data['citizenshipData'] = $this->Citizenship_model->viewCitizenship();
		
		$uId = $this->session->userdata('uId');
		$password = $this->session->userdata('password');
		
		$course = $this->input->post('course');
		$startDate = $this->input->post('startDate');
		$finishDate = $this->input->post('finishDate');
		$CCDpwd = $this->input->post('currentCDpwd');
		
		$this->form_validation->set_error_delimiters("<div class='alert alert-danger'><button type='button' class='close close-alert' data-dismiss='alert' aria-hidden='true'>x</button>", "</div>");
		$this->form_validation->set_rules('course', 'Course', 'required');
		$this->form_validation->set_rules('startDate', 'Start Date', 'required');
		$this->form_validation->set_rules('finishDate', 'Finish Date', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_userdata('war_msg','Error');
        } else {
			if($password == md5($CCDpwd)){
				if($this->StuProfile_model->getCurrentCourseDetails($uId) == 0){
					$cpId = $this->StuProfile_model->addCurrentCourseDetails($uId,$course,$startDate,$finishDate);
		
					if($cpId != 0){
						$this->session->set_userdata('succ_msg', "Current Course Details Successfully Created.");
					}
					else{
						$this->session->set_userdata('err_msg', "Can not create the Current Course Details.");
					}
				}else{
					$this->StuProfile_model->updateCurrentCourseDetails($uId,$course,$startDate,$finishDate);
					$this->session->set_userdata('succ_msg', "Current Course Details Successfully Updated.");
				}
			}else{
				$this->session->set_userdata('war_msg', "Password missmatch.");
			}
		}
		
		$this->load->view('dash/header');
		$this->load->view('profile/userProfile',$data);
		$this->load->view('dash/footer');
	}
	
	public function secondaryStudies(){
		$this->load->model('StuProfile_model');
		$this->load->library('form_validation');
		$this->load->model('Campus_model');
		$this->load->model('Country_model');
		$this->load->model('Citizenship_model');
		
		$data['campusData'] = $this->Campus_model->viewCampus();
		$data['countryData'] = $this->Country_model->viewCountry();
		$data['citizenshipData'] = $this->Citizenship_model->viewCitizenship();
		
		$uId = $this->session->userdata('uId');
		$password = $this->session->userdata('password');
		
		$qualification = $this->input->post('SShqg');
		$institution = $this->input->post('SSi');
		$cntId = $this->input->post('SSCountry');
		$dateCompleted = $this->input->post('SSdc');
		$secondaryStudies = $this->input->post('secondaryStudies');
		
		$this->form_validation->set_error_delimiters("<div class='alert alert-danger'><button type='button' class='close close-alert' data-dismiss='alert' aria-hidden='true'>x</button>", "</div>");
		$this->form_validation->set_rules('SShqg', 'Highest qualification gained', 'required');
		$this->form_validation->set_rules('SSi', 'Institute', 'required');
		$this->form_validation->set_rules('SSCountry', 'Country', 'required');
		$this->form_validation->set_rules('SSdc', 'Date Completed', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_userdata('war_msg','Error');
        } else {
			if($password == md5($secondaryStudies)){
					$cpId = $this->StuProfile_model->addSecondaryStudies($uId,$cntId,$qualification,$institution,$dateCompleted);
		
					if($cpId != 0){
						$this->session->set_userdata('succ_msg', "Secondary Studies Details Successfully Created.");
					}
					else{
						$this->session->set_userdata('err_msg', "Can not create the Secondary Studies Details.");
					}
			}else{
				$this->session->set_userdata('war_msg', "Password missmatch.");
			}
		}
		
		$this->load->view('dash/header');
		$this->load->view('profile/userProfile',$data);
		$this->load->view('dash/footer');
	}
	
	public function tertiaryStudies(){
		$this->load->model('StuProfile_model');
		$this->load->library('form_validation');
		$this->load->model('Campus_model');
		$this->load->model('Country_model');
		$this->load->model('Citizenship_model');
		
		$data['campusData'] = $this->Campus_model->viewCampus();
		$data['countryData'] = $this->Country_model->viewCountry();
		$data['citizenshipData'] = $this->Citizenship_model->viewCitizenship();
		
		$uId = $this->session->userdata('uId');
		$password = $this->session->userdata('password');
		
		$cntId = $this->input->post('TSCountry');
		$qualification = $this->input->post('TShqg');
		$institution = $this->input->post('TSi');
		$dateCompleted = $this->input->post('TScd');
		$tertiaryStudies = $this->input->post('tertiaryStudiespwd');
		
		$this->form_validation->set_error_delimiters("<div class='alert alert-danger'><button type='button' class='close close-alert' data-dismiss='alert' aria-hidden='true'>x</button>", "</div>");
		$this->form_validation->set_rules('TShqg', 'Highest qualification gained', 'required');
		$this->form_validation->set_rules('TSi', 'Institute', 'required');
		$this->form_validation->set_rules('TSCountry', 'Country', 'required');
		$this->form_validation->set_rules('TScd', 'Date Completed', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_userdata('war_msg','Error');
        } else {
			if($password == md5($tertiaryStudies)){
					$cpId = $this->StuProfile_model->addTertiaryStudies($uId,$cntId,$qualification,$institution,$dateCompleted);
		
					if($cpId != 0){
						$this->session->set_userdata('succ_msg', "Tertiary Studies Details Successfully Created.");
					}
					else{
						$this->session->set_userdata('err_msg', "Can not create the Tertiary Studies Details.");
					}
			}else{
				$this->session->set_userdata('war_msg', "Password missmatch.");
			}
		}
		
		$this->load->view('dash/header');
		$this->load->view('profile/userProfile',$data);
		$this->load->view('dash/footer');
	}
	
	public function view_scndry_studies(){
		$ssId = $this->uri->segment(3);
		$this->load->model('StuProfile_model');
		$this->load->model('Country_model');
		$data['countryData'] = $this->Country_model->viewCountry();
		
		$data['secondaryStudies'] = $this->StuProfile_model->viewScndryStudies($ssId);
		
		$this->load->view('dash/header');
		$this->load->view('profile/editSecondaryStudies',$data);
		$this->load->view('dash/footer');
	}
	
	public function update_secondary_studies(){
		$this->load->model('StuProfile_model');
		
		$ssId = $this->input->post('ssId');
		$qualification = $this->input->post('SShqg');
		$institution = $this->input->post('SSi');
		$cntId = $this->input->post('SSCountry');
		$dateCompleted = $this->input->post('SSdc');
		
		$this->StuProfile_model->updateScndryStudies($ssId,$cntId,$qualification,$institution,$dateCompleted);
		$this->session->set_userdata('succ_msg', "Secondary Studies Successfully Updated.");
		
		$this->load->view('dash/header');
		$this->load->view('dash/message');
		$this->load->view('dash/footer');
	}
	
	public function delete_scndry_studies(){
		$ssId = $this->uri->segment(3);
		$this->load->model('StuProfile_model');
		$this->load->model('Country_model');
		$data['countryData'] = $this->Country_model->viewCountry();
		
		$this->StuProfile_model->deleteScndryStudies($ssId);
		$this->session->set_userdata('succ_msg', "Secondary Studies Details Successfully Deleted.");
		
		$data['secondarystudies'] = $this->StuProfile_model->viewSecondaryStudies($uId);
		
		$this->load->view('dash/header');
		$this->load->view('profile/secondaryStudies',$data);
		$this->load->view('dash/footer');
	}
	
	public function view_trtiary_studies(){
		$tsId = $this->uri->segment(3);
		$this->load->model('StuProfile_model');
		$this->load->model('Country_model');
		$data['countryData'] = $this->Country_model->viewCountry();
		
		$data['tertiaryStudies'] = $this->StuProfile_model->viewTrtiaryStudies($tsId);
		
		$this->load->view('dash/header');
		$this->load->view('profile/editTertiaryStudies',$data);
		$this->load->view('dash/footer');
	}
	
	public function update_tertiary_studies(){
		$this->load->model('StuProfile_model');
		
		$tsId = $this->input->post('tsId');
		$qualification = $this->input->post('TShqg');
		$institution = $this->input->post('TSi');
		$cntId = $this->input->post('TSCountry');
		$dateCompleted = $this->input->post('TSdc');
		
		$this->StuProfile_model->updateTrtiaryStudies($tsId,$cntId,$qualification,$institution,$dateCompleted);
		$this->session->set_userdata('succ_msg', "Tertiary Studies Successfully Updated.");
		
		$this->load->view('dash/header');
		$this->load->view('dash/message');
		$this->load->view('dash/footer');
	}
	
	public function delete_trtiary_studies(){
		$ssId = $this->uri->segment(3);
		$this->load->model('StuProfile_model');
		$this->load->model('Country_model');
		$data['countryData'] = $this->Country_model->viewCountry();
		
		$this->StuProfile_model->deleteTrtiaryStudies($ssId);
		$this->session->set_userdata('succ_msg', "Tertiary Studies Details Successfully Deleted.");
		
		$data['secondarystudies'] = $this->StuProfile_model->viewTertiaryStudies($uId);
		
		$this->load->view('dash/header');
		$this->load->view('profile/secondaryStudies',$data);
		$this->load->view('dash/footer');
	}
}