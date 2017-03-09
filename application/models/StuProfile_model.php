<?php

class StuProfile_model extends CI_Model {
	
	public function getStuProfile($uId,$schoolName) {
		$this->db->where('uId',$uId);
		$this->db->where('schoolName',$schoolName);
        $query = $this->db->get('emergencycontactnz');
		return $query->num_rows();
    }
	
	/* Personal Details */
	
	public function getPersonalDetails($uId) {
		$this->db->where('uId',$uId);
        $query = $this->db->get('personaldetails');
		return $query->num_rows();
    }
	
	public function getPDData($uId) {//when page load view the current data
		$this->db->where('uId',$uId);
        $query = $this->db->get('personaldetails');
		return $query->result_array();
    }
	
	public function addPersonalDetails($uId,$pdPreferredName,$pdDOB,$pdGender,$pdCitizenship,$pdCountry,$pdPassportNumber,$ppIssuDate,$ppExpiryDate,$ppVisaDate,$pdInsurence,$iIssueDate,$iExpiryDate,$pdDisaDescription){
		$data = array(
            'uId' => $uId,
			'preferredName' => $pdPreferredName,
            'dob' => $pdDOB,
			'gender' => $pdGender,
			'cId' => $pdCitizenship,
			'cntId' => $pdCountry,
			'ppNumber' => $pdPassportNumber,
			'ppIssueDate' => $ppIssuDate,
			'ppExpiryDate' => $ppExpiryDate,
			'ppVisaDate' => $ppVisaDate,
			'insurence' => $pdInsurence,
			'iIssueDate' => $iIssueDate,
			'iExpiryDate' => $iExpiryDate,
			'disaDescription' => $pdDisaDescription
        );
        $this->db->insert('personaldetails', $data);
        return $this->db->insert_id();
	}
	
	public function updatePersonalDetails($uId,$pdPreferredName,$pdDOB,$pdGender,$pdCitizenship,$pdCountry,$pdPassportNumber,$ppIssuDate,$ppExpiryDate,$ppVisaDate,$pdInsurence,$iIssueDate,$iExpiryDate,$pdDisaDescription){
		$data = array(
            'uId' => $uId,
			'preferredName' => $pdPreferredName,
            'dob'=>$pdDOB,
			'gender'=>$pdGender,
			'cId'=>$pdCitizenship,
			'cntId'=>$pdCountry,
			'ppNumber'=>$pdPassportNumber,
			'ppIssueDate'=>$ppIssuDate,
			'ppExpiryDate'=>$ppExpiryDate,
			'ppVisaDate'=>$ppVisaDate,
			'insurence'=>$pdInsurence,
			'iIssueDate'=>$iIssueDate,
			'iExpiryDate'=>$iExpiryDate,
			'disaDescription'=>$pdDisaDescription
        );
		$this->db->where('uId', $uId);
        $this->db->update('personaldetails', $data);
	}
	
	/* Personal Details */
	
	/* Personal Contact Details */
	public function getPersonalContactDetails($uId) {
		$this->db->where('uId',$uId);
        $query = $this->db->get('contactdetails');
		return $query->num_rows();
    }
	
	public function getPCDData($uId) {//when page load view the current data
		$this->db->where('uId',$uId);
        $query = $this->db->get('contactdetails');
		return $query->result_array();
    }
	
	public function addPersonalContactDetails($uId,$address,$telephone,$fax,$email){
		$data = array(
			'uId' => $uId,
            'address' => $address,
            'telephone'=>$telephone,
			'fax'=>$fax,
			'email'=>$email
        );
		
        $this->db->insert('contactdetails', $data);
        return $this->db->insert_id();
	}
	
	public function updatePersonalContactDetails($uId,$address,$telephone,$fax,$email){
		$data = array(
            'address' => $address,
            'telephone'=>$telephone,
			'fax'=>$fax,
			'email'=>$email
        );
		$this->db->where('uId', $uId);
        $this->db->update('contactdetails', $data);
	}
	
	/* Personal Contact Details */
	
	/* Parents Contact Details */
	public function getParentsContactDetails($uId) {
		$this->db->where('uId',$uId);
        $query = $this->db->get('emergencycontacthome');
		return $query->num_rows();
    }
	
	public function getPACDData($uId) {//when page load view the current data
		$this->db->where('uId',$uId);
        $query = $this->db->get('emergencycontacthome');
		return $query->result_array();
    }
	public function addParentsContactDetails($uId,$name,$relationship,$address,$telephone,$email){
		$data = array(
			'uId' => $uId,
            'name' => $name,
            'relationship'=>$relationship,
			'address'=>$address,
			'telephone'=>$telephone,
			'email'=>$email
        );
		
        $this->db->insert('emergencycontacthome', $data);
        return $this->db->insert_id();
	}
	
	public function updateParentsContactDetails($uId,$name,$relationship,$address,$telephone,$email){
		$data = array(
            'name' => $name,
            'relationship'=>$relationship,
			'address'=>$address,
			'telephone'=>$telephone,
			'email'=>$email
        );
		$this->db->where('uId', $uId);
        $this->db->update('emergencycontacthome', $data);
	}
	
	/* Parents Contact Details */
	
	/* Emergency Contact Nz */	
	public function getEmergencyContactNz($uId) {
		$this->db->where('uId',$uId);
        $query = $this->db->get('emergencycontactnz');
		return $query->num_rows();
    }
	
	public function getECDDataNz($uId) {//when page load view the current data
		$this->db->where('uId',$uId);
        $query = $this->db->get('emergencycontactnz');
		return $query->result_array();
	}
	
	public function addEmergencyContactNz($uId,$name,$relationship,$address,$telephone,$email){
		$data = array(
			'uId' => $uId,
            'name' => $name,
            'relationship'=>$relationship,
			'address'=>$address,
			'telephone'=>$telephone,
			'email'=>$email
        );
        $this->db->insert('emergencycontactnz', $data);
        return $this->db->insert_id();
	}
	
	public function updateEmergencyContactNz($uId,$name,$relationship,$address,$telephone,$email){
		$data = array(
            'name' => $name,
            'relationship'=>$relationship,
			'address'=>$address,
			'telephone'=>$telephone,
			'email'=>$email
        );
		$this->db->where('uId', $uId);
        $this->db->update('emergencycontactnz', $data);
	}
	
	/* Emergency Contact Nz */	
	
	/* Agent Contact */
	public function getAgentContact($uId) {
		$this->db->where('uId',$uId);
        $query = $this->db->get('agentcontact');
		return $query->num_rows();
    }
	
	public function getACData($uId) {//when page load view the current data
		$this->db->where('uId',$uId);
        $query = $this->db->get('agentcontact');
		return $query->result_array();
	}
	
	public function addAgentContact($uId,$name,$address,$telephone,$fax,$email){
		$data = array(
			'uId' => $uId,
            'agentName' => $name,
            'address'=>$address,
			'telephone'=>$telephone,
			'fax'=>$fax,
			'email'=>$email
        );
        $this->db->insert('agentcontact', $data);
        return $this->db->insert_id();
	}
	
	public function updateAgentContact($uId,$name,$address,$telephone,$fax,$email){
		$data = array(
            'agentName' => $name,
            'address'=>$address,
			'telephone'=>$telephone,
			'fax'=>$fax,
			'email'=>$email
        );
		$this->db->where('uId', $uId);
        $this->db->update('agentcontact', $data);
	}
	
	/* Agent Contact */
	
	/* Current Course Details*/
	public function getCurrentCourseDetails($uId) {
		$this->db->where('uId',$uId);
        $query = $this->db->get('currentprogramme');
		return $query->num_rows();
    }
	
	public function getCCData($uId) {//when page load view the current data
		$this->db->where('uId',$uId);
        $query = $this->db->get('currentprogramme');
		return $query->result_array();
	}
	
	public function addCurrentCourseDetails($uId,$course,$startDate,$finishDate){
		$data = array(
			'uId' => $uId,
            'crsId' => $course,
            'proposedStartDate'=>$startDate,
			'proposedFinishDate'=>$finishDate
        );
        $this->db->insert('currentprogramme', $data);
        return $this->db->insert_id();
	}
	
	public function updateCurrentCourseDetails($uId,$course,$startDate,$finishDate){
		$data = array(
            'crsId' => $course,
            'proposedStartDate'=>$startDate,
			'proposedFinishDate'=>$finishDate
        );
		$this->db->where('uId', $uId);
        $this->db->update('currentprogramme', $data);
	}
	
	/* Current Course Details*/
	
	/* Secondary Studies */
	public function getSecondaryStudies($uId) {
		$this->db->where('uId',$uId);
        $query = $this->db->get('secondarystudies');
		return $query->num_rows();
    }
	
	public function getSSData($uId) {//when page load view the current data
		$this->db->where('uId',$uId);
        $query = $this->db->get('secondarystudies');
		return $query->result_array();
	}
	
	public function addSecondaryStudies($uId,$cntId,$qualification,$institution,$dateCompleted){
		$data = array(
            'uId' => $uId,
            'cntId'=>$cntId,
			'qualification'=>$qualification,
			'institution'=>$institution,
			'dateCompleted'=>$dateCompleted
        );
        $this->db->insert('secondarystudies', $data);
        return $this->db->insert_id();
	}
	
	public function updateSecondaryStudies($uId,$cntId,$qualification,$institution,$dateCompleted){
		$data = array(
            'cntId'=>$cntId,
			'qualification'=>$qualification,
			'institution'=>$institution,
			'dateCompleted'=>$dateCompleted
        );
		$this->db->where('uId', $uId);
        $this->db->update('secondarystudies', $data);
	}
	
	/* Secondary Studies */
	
	/* Tertiary Studies */
	public function getTertiaryStudies($uId) {
		$this->db->where('uId',$uId);
        $query = $this->db->get('tertiarystudies');
		return $query->num_rows();
    }
	
	public function getTSData($uId) {//when page load view the current data
		$this->db->where('uId',$uId);
        $query = $this->db->get('tertiarystudies');
		return $query->result_array();
	}
	
	public function addTertiaryStudies($uId,$cntId,$qualification,$institution,$dateCompleted){
		$data = array(
            'uId' => $uId,
            'cntId'=>$cntId,
			'qualification'=>$qualification,
			'institution'=>$institution,
			'dateCompleted'=>$dateCompleted
        );
        $this->db->insert('tertiarystudies', $data);
        return $this->db->insert_id();
	}
	
	public function updateTertiaryStudies($uId,$cntId,$qualification,$institution,$dateCompleted){
		$data = array(
            'cntId'=>$cntId,
			'qualification'=>$qualification,
			'institution'=>$institution,
			'dateCompleted'=>$dateCompleted
        );
		$this->db->where('uId', $uId);
        $this->db->update('tertiarystudies', $data);
	}
	
	/* Tertiary Studies */
	
	public function viewSchl($sId) {
        $this->db->join('campus', 'campus.camId = school.camId');
		$this->db->where('sId',$sId);
        $query = $this->db->get('school');
		return $query->result_array();
    }
	
	public function viewSecondaryStudies($uId) {
		$this->db->join('country', 'country.cntId = secondarystudies.cntId');
		$this->db->where('secondarystudies.uId',$uId);
        $query = $this->db->get('secondarystudies');
		return $query->result_array();
    }
	
	public function viewScndryStudies($ssId) {
		$this->db->join('country', 'country.cntId = secondarystudies.cntId');
		$this->db->where('secondarystudies.ssId',$ssId);
        $query = $this->db->get('secondarystudies');
		return $query->result_array();
    }
	
	public function updateScndryStudies($ssId,$cntId,$qualification,$institution,$dateCompleted){
		$data = array(
            'cntId'=>$cntId,
			'qualification'=>$qualification,
			'institution'=>$institution,
			'dateCompleted'=>$dateCompleted
        );
		$this->db->where('ssId', $ssId);
        $this->db->update('secondarystudies', $data);
	}
	
	public function deleteScndryStudies($ssId){
		$this->db->where('ssId', $ssId);
		$this->db->delete('secondarystudies'); 
	}
	
	public function viewTertiaryStudies($uId) {
		$this->db->join('country', 'country.cntId = tertiarystudies.cntId');
		$this->db->where('tertiarystudies.uId',$uId);
        $query = $this->db->get('tertiarystudies');
		return $query->result_array();
    }
	
	public function viewTrtiaryStudies($tsId) {
		$this->db->join('country', 'country.cntId = tertiarystudies.cntId');
		$this->db->where('tertiarystudies.tsId',$tsId);
        $query = $this->db->get('tertiarystudies');
		return $query->result_array();
    }
	
	public function updateTrtiaryStudies($tsId,$cntId,$qualification,$institution,$dateCompleted){
		$data = array(
            'cntId'=>$cntId,
			'qualification'=>$qualification,
			'institution'=>$institution,
			'dateCompleted'=>$dateCompleted
        );
		$this->db->where('tsId', $tsId);
        $this->db->update('tertiarystudies', $data);
	}
	
	public function deleteTrtiaryStudies($tsId){
		$this->db->where('tsId', $tsId);
		$this->db->delete('tertiarystudies'); 
	}
}