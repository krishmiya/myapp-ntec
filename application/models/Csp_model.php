<?php

class Csp_model extends CI_Model {
	
	public function viewPersonalDetails($uId){
		$this->db->join('users', 'users.uId = personaldetails.uId');
		$this->db->join('contactdetails', 'contactdetails.uId = personaldetails.uId');
		$this->db->join('currentprogramme', 'currentprogramme.uId = personaldetails.uId');
		$this->db->join('course', 'course.crsId = currentprogramme.crsId');
		$this->db->join('school', 'school.sId = course.sId');
		$this->db->join('campus', 'campus.camId = school.camId');
		$this->db->where('personaldetails.uId',$uId);
        $query = $this->db->get('personaldetails');
		return $query->result_array();
	}
	
	public function getCountPDAll($uId){
		$this->db->where('personaldetails.uId',$uId);
        $query = $this->db->get('personaldetails');
		return $query->num_rows();
	}
	
	public function getCountCAll($uId){
		$this->db->where('contactdetails.uId',$uId);
        $query = $this->db->get('contactdetails');
		return $query->num_rows();
	}
	
	public function getCountEHAll($uId){
		$this->db->where('emergencycontacthome.uId',$uId);
        $query = $this->db->get('emergencycontacthome');
		return $query->num_rows();
	}
	
	public function getCountCPAll($uId){
		$this->db->where('currentprogramme.uId',$uId);
        $query = $this->db->get('currentprogramme');
		return $query->num_rows();
	}
	
	public function getCountSSAll($uId){
		$this->db->where('secondarystudies.uId',$uId);
        $query = $this->db->get('secondarystudies');
		return $query->num_rows();
	}
	
	public function getCountTSAll($uId){
		$this->db->where('tertiarystudies.uId',$uId);
        $query = $this->db->get('tertiarystudies');
		return $query->num_rows();
	}
	
	public function getCountSAll($uId){
		$this->db->where('uId',$uId);
        $query = $this->db->get('signature');
		return $query->num_rows();
	}
	
	
	public function addCsp($uId,$course,$comment,$invoiceNumber,$sign_date){
		$data = array(
            'uId' => $uId,
            'crsId'=>$course,
			'csp_comments'=>$comment,
			'invoiceNo'=>$invoiceNumber,
			'sign_date'=>$sign_date
        );
        $this->db->insert('csp', $data);
        return $this->db->insert_id();
	}
	
	public function addRefNCsp($cspId,$refNumber){
		$data = array(
            'refNumber' => $refNumber
        );
		$this->db->where('cspId', $cspId);
        $this->db->update('csp', $data);
	}
	
	public function viewPendingCsp($camId,$mcId,$usrType){
		$this->db->join('users', 'users.uId = csp.uId');
		$this->db->join('personaldetails', 'personaldetails.uId = users.uId');
		$this->db->join('contactdetails', 'contactdetails.uId = users.uId');
		$this->db->join('course', 'course.crsId = csp.crsId');
		$this->db->join('school', 'school.sId = course.sId');
		$this->db->join('campus', 'campus.camId = school.camId');
		//88 decline
		if($camId != 0 && $mcId == 0){
			$where = "csp.status = 1 AND users.camId =".$camId;//Faculty Admin in Charge or Consultation with student
		}
		if($camId != 0 && $mcId != 0){
			$where = "csp.fac = 1 AND csp.inCharge_consult = 1 AND csp.status != 6 AND csp.days_commencement > 10";//HOD's
		}
		if($camId == 0 && $mcId == 0){
			$where = "csp.status = 2 AND csp.icd = 0 AND csp.days_commencement <= 10";//International Counsellor
		}
		if($camId != 0 && $mcId == 0 && $usrType == 2){
			$where = "csp.status = 0 AND users.camId =".$camId;//Account Clarke
		}
		
		$this->db->where($where);
		$this->db->order_by('csp.cspId', 'ASC');
        $query = $this->db->get('csp');
		return $query->result_array();
		//echo $this->db->last_query();
	}
	
	public function viewAppCsp($cspId,$usrType){
		$this->db->join('users', 'users.uId = csp.uId');
		$this->db->join('personaldetails', 'personaldetails.uId = users.uId');
		$this->db->join('contactdetails', 'contactdetails.uId = users.uId');
		$this->db->join('course', 'course.crsId = csp.crsId');
		$this->db->join('school', 'school.sId = course.sId');
		$this->db->join('campus', 'campus.camId = school.camId');
		$this->db->join('currentprogramme', 'currentprogramme.uId = users.uId');
		//
		if($usrType == 3){
			$where = "csp.days_commencement = 0 AND csp.cspId =".$cspId;
		}else{
			$where = "csp.cspId =".$cspId;
		}
		//
		//$this->db->where('csp.cspId',$cspId);
		$this->db->where($where);
		$this->db->order_by('csp.cspId', 'ASC');
        $query = $this->db->get('csp');
		return $query->result_array();
	}
	
	public function viewAppCspRC($crsId){
		$this->db->join('school', 'school.sId = course.sId');		
		$this->db->join('campus', 'campus.camId = school.camId');
		$this->db->where('course.crsId',$crsId);
		$this->db->order_by('course.crsId', 'ASC');
        $query = $this->db->get('course');
		return $query->result_array();
	}
	
	public function viewAppCspCC($cspId){
		$this->db->join('users', 'users.uId = csp.uId');
		$this->db->join('currentprogramme', 'currentprogramme.uId = csp.uId');
		$this->db->join('course', 'course.crsId = currentprogramme.crsId');
		$this->db->join('school', 'school.sId = course.sId');
		$this->db->join('campus', 'campus.camId = school.camId');
		$this->db->where('csp.cspId',$cspId);
        $query = $this->db->get('csp');
		return $query->result_array();
		//echo $this->db->last_query();
	}
	
	public function getCrsId($cspId){
		$this->db->where('cspId',$cspId);
        $query = $this->db->get('csp');
		return $query->result_array();
	}
	
	public function add_fac_cws($cspId,$date_commencement,$office_comment,$status){
		$data = array(
            'days_commencement'=>$date_commencement,
			'fac'=>1,
			'inCharge_consult'=>1,
			'office_comment'=>$office_comment,
			'status'=>$status
        );
		$this->db->where('cspId', $cspId);
        $this->db->update('csp', $data);
	}
	
	public function addAppStatus($uId,$cspId,$currentDate){
		$data = array(
            'uId' => $uId,
            'cspId'=>$cspId,
			'currentDate'=>$currentDate,
			'status'=>1
        );
        $this->db->insert('appstatus', $data);
        return $this->db->insert_id();
	}
	
	/*public function viewAppStatusCsp($cspId,$usrType){
		if($usrType == 3){
			$this->db->join('users', 'users.uId = appstatus.uId');
			$where = "appstatus.cspId = ".$cspId." AND users.usrType = 3";
		}else{
			$where = "appstatus.cspId = ".$cspId;
		}
		$this->db->where($where);
        $query = $this->db->get('appstatus');
		return $query->result_array();
	}*/
	
	public function checkStatus($usrType,$cspId){
		
		if($usrType == 3 || $usrType == 6){
			$where = "fac = 1 AND inCharge_consult = 1 AND cspId = ".$cspId;
		}
		if($usrType == 9){
			$where = "days_commencement <= 10 AND status = 2 AND cspId = ".$cspId;
		}
		if($usrType == 1){
			$where = "days_commencement > 10 AND status = 2 AND cspId = ".$cspId;
		}
		if($usrType == 2){
			$where = "status = 1 AND cspId = ".$cspId;
		}
		
		$this->db->where($where);
        $query = $this->db->get('csp');
		return $query->result_array();
	}
	
	public function viewAppStatusCsp($cspId,$usrType){
		$where = "fac = 1 AND inCharge_consult = 1 AND cspId = ".$cspId;
		$this->db->where($where);
        $query = $this->db->get('csp');
		return $query->result_array();
	}
	
	public function viewAppStatusCspAc($cspId,$usrType){
		$where = "status != 0 AND cspId = ".$cspId;
		$this->db->where($where);
        $query = $this->db->get('csp');
		return $query->result_array();
	}
	
	public function viewAppStatusCspO($cspId,$uId){
		$where = "cspId = ".$cspId." AND uId=".$uId;
		$this->db->where($where);
        $query = $this->db->get('appstatus');
		return $query->result_array();
		//echo $this->db->last_query();
	}
	
	public function upCSP($cspId,$app_date,$status){
		$data = array(
            'icd'=>1,
			'icdSignDate'=>$app_date,
			'status'=>$status
        );
		$this->db->where('cspId', $cspId);
        $this->db->update('csp', $data);
	}
	
	public function checkCSPCN($cspId){
		$this->db->where('cspId', $cspId);
        $query = $this->db->get('csp');
		return $query->result_array();
	}
	
	public function upCSPCH($cspId,$app_date,$status){
		$data = array(
            'hodCurrent'=>1,
			'hodCurrentSignDate'=>$app_date,
			'status'=>$status
        );
		$this->db->where('cspId', $cspId);
        $this->db->update('csp', $data);
	}
	
	public function upCSPNH($cspId,$app_date,$status){
		$data = array(
            'hodNew'=>1,
			'hodNewSignDate'=>$app_date,
			'status'=>$status
        );
		$this->db->where('cspId', $cspId);
        $this->db->update('csp', $data);
	}
	
	public function upAc($cspId,$invoiceAmount,$status){
		$data = array(
			'invoiceAmount'=>$invoiceAmount,
			'status'=>$status
        );
		$this->db->where('cspId', $cspId);
        $this->db->update('csp', $data);
	}
	
	public function rptCsp($mcId,$Id){
		if($mcId != 0){
			$this->db->join('users', 'users.uId = csp.uId');
			$this->db->join('course', 'course.crsId = csp.crsId');
			$this->db->join('school', 'school.sId = course.sId');
			$this->db->join('campus', 'campus.camId = school.camId');
			$this->db->where('csp.uId',$Id);
		}if($mcId == 0){
			$this->db->join('users', 'users.uId = csp.uId');
			$this->db->join('currentprogramme', 'currentprogramme.uId = csp.uId');
			$this->db->join('course', 'course.crsId = currentprogramme.crsId');
			$this->db->join('school', 'school.sId = course.sId');
			$this->db->join('campus', 'campus.camId = school.camId');
			$this->db->where('campus.camId',$Id);
		}
		
        $query = $this->db->get('csp');
		return $query->result_array();
		//echo $this->db->last_query();
	}
	
	public function createPdf($cspId){
		$this->db->select('users.*,csp.*,personaldetails.*,contactdetails.address AS cdAdd,contactdetails.telephone AS cdTel,contactdetails.fax AS cdFax,contactdetails.email AS cdEmail,course.*,signature.*,emergencycontacthome.name AS echName,emergencycontacthome.relationship AS echRelationship,emergencycontacthome.address AS echAdd,emergencycontacthome.telephone AS echTele,emergencycontacthome.email AS echEmail,emergencycontactnz.name AS ecnzName,emergencycontactnz.relationship AS ecnzRelationship,emergencycontactnz.address AS ecnzAdd,emergencycontactnz.telephone AS ecnzTele,emergencycontactnz.email AS ecnzEmail,course.courseName AS cName,school.schoolName AS sName,campus.campusName AS camName');
		$this->db->join('users', 'users.uId = csp.uId');
		$this->db->join('personaldetails', 'personaldetails.uId = csp.uId');
		$this->db->join('contactdetails', 'contactdetails.uId = csp.uId');
		$this->db->join('emergencycontacthome', 'emergencycontacthome.uId = csp.uId');
		$this->db->join('emergencycontactnz', 'emergencycontactnz.uId = csp.uId');
		$this->db->join('course', 'course.crsId = csp.crsId');
		$this->db->join('school', 'school.sId = course.sId');
		$this->db->join('campus', 'campus.camId = school.camId');
		$this->db->join('signature', 'signature.uId = csp.uId');
		$this->db->where('cspId', $cspId);
        $query = $this->db->get('csp');
		return $query->result_array();
		//echo $this->db->last_query();
	}
	
	public function createPdfCP($uId){
		$this->db->join('course', 'course.crsId = currentprogramme.crsId');
		$this->db->join('school', 'school.sId = course.sId');
		$this->db->join('campus', 'campus.camId = school.camId');
		$this->db->where('currentprogramme.uId', $uId);
        $query = $this->db->get('currentprogramme');
		return $query->result_array();
	}
	
	public function createPdfFAIC($cspId){
		$this->db->join('course', 'course.crsId = csp.crsId');
		$this->db->join('school', 'school.sId = course.sId');
		$this->db->join('campus', 'campus.camId = school.camId');
		$this->db->join('users', 'users.camId = campus.camId');
		$this->db->join('signature', 'signature.uId = users.uId');
		$where = "csp.cspId = " . $cspId . " AND users.usrType = 6";
		$this->db->where($where);
        $query = $this->db->get('csp');
		return $query->result_array();
		//echo $this->db->last_query();
	}
	
	public function createPdfIC($cspId){
		$this->db->join('signature', 'signature.uId = users.uId');
		$where = "users.usrType = 9";
		$this->db->where($where);
        $query = $this->db->get('users');
		return $query->result_array();
	}
	
	public function createPdfHODC($cspId){
		$this->db->join('currentprogramme', 'currentprogramme.uId = csp.uId');
		$this->db->join('course', 'course.crsId = currentprogramme.crsId');
		$this->db->join('school', 'school.sId = course.sId');
		$this->db->join('users', 'users.camId = school.camId');
		$this->db->join('signature', 'signature.uId = users.uId');
		$where = "csp.cspId = " . $cspId . " AND users.usrType = 1 AND users.mcId = course.mcId";
		$this->db->where($where);
        $query = $this->db->get('csp');
		return $query->result_array();
		//echo $this->db->last_query();
	}
	
	public function createPdfHODN($cspId){
		$this->db->join('course', 'course.crsId = csp.crsId');
		$this->db->join('school', 'school.sId = course.sId');
		$this->db->join('users', 'users.camId = school.camId');
		$this->db->join('signature', 'signature.uId = users.uId');
		$where = "csp.cspId = " . $cspId . " AND users.usrType = 1 AND users.mcId = course.mcId";
		$this->db->where($where);
        $query = $this->db->get('csp');
		return $query->result_array();
		//echo $this->db->last_query();
	}
	
	public function checkAgent($cspId){
		$this->db->select('agentcontact.agentName,agentcontact.address AS ageAdd,agentcontact.telephone AS ageTele,agentcontact.fax AS ageFax,agentcontact.email AS ageEmail');
		$this->db->join('users', 'users.uId = csp.uId');
		$this->db->join('agentcontact', 'agentcontact.uId = csp.uId');
		$this->db->where('csp.cspId', $cspId);
        $query = $this->db->get('csp');
		return $query->result_array();
	}
	
	public function emailCsp($camId,$usrType){
		$where = "camId = ".$camId." AND usrType = ".$usrType;
		$this->db->where($where);
        $query = $this->db->get('users');
		return $query->result_array();
	}
	
	public function logInEmail($email,$token){
		$this->db->where('email',$email);
		$this->db->where('token',$token);
		$query = $this->db->get('users');
		return $query->result_array();
	}
	
	public function viewProfile($cspId){
		$this->db->join('users', 'users.uId = csp.uId');
		$this->db->join('personaldetails', 'personaldetails.uId = csp.uId');
		$this->db->join('country', 'country.cntId = personaldetails.cntId');
		$this->db->join('citizenship', 'citizenship.cId = personaldetails.cId');
		$this->db->join('contactdetails', 'contactdetails.uId = csp.uId');
		$this->db->join('emergencycontacthome', 'emergencycontacthome.uId = csp.uId');
		$this->db->join('emergencycontactnz', 'emergencycontactnz.uId = csp.uId');
		$this->db->where('csp.cspId', $cspId);
		$query = $this->db->get('csp');
		return $query->result_array();
	}
	
	public function viewProfileAgent($cspId){
		$this->db->join('agentcontact', 'agentcontact.uId = csp.uId');
		$this->db->where('csp.cspId', $cspId);
		$query = $this->db->get('csp');
		return $query->result_array();
	}
	
	public function viewProfileSecondaryStudies($cspId){
		$this->db->join('secondarystudies', 'secondarystudies.uId = csp.uId');
		$this->db->where('csp.cspId', $cspId);
		$query = $this->db->get('csp');
		return $query->result_array();
	}
	
	public function viewProfileTertiaryStudies($cspId){
		$this->db->join('tertiarystudies', 'tertiarystudies.uId = csp.uId');
		$this->db->where('csp.cspId', $cspId);
		$query = $this->db->get('csp');
		return $query->result_array();
	}
	
	public function emailCspIc(){
		$where = "usrType = 9";
		$this->db->where($where);
        $query = $this->db->get('users');
		return $query->result_array();
	}
	
	public function currentHod($cspId){
		$this->db->join('currentprogramme', 'currentprogramme.uId = csp.uId');
		$this->db->join('course', 'course.crsId = currentprogramme.crsId');
		$this->db->join('users', 'users.mcId = course.mcId');
		$where = "csp.cspId = " . $cspId . " AND users.usrType = 1";
		$this->db->where($where);
		$query = $this->db->get('csp');
		return $query->result_array();
	}
	
	public function newHod($cspId){
		$this->db->join('course', 'course.crsId = csp.crsId');
		$this->db->join('users', 'users.mcId = course.mcId');
		$where = "csp.cspId = " . $cspId . " AND users.usrType = 1";
		$this->db->where($where);
		$query = $this->db->get('csp');
		return $query->result_array();
	}
	
	public function getStu($cspId){
		$this->db->join('users', 'users.uId = csp.uId');
		$this->db->where('cspId',$cspId);
        $query = $this->db->get('csp');
		return $query->result_array();
	}
	
	public function getFac($camId){
		$where = "camId = " . $camId . " AND usrType = 6";
		$this->db->where($where);
        $query = $this->db->get('users');
		return $query->result_array();
	}
	
	public function upCCNCNH($cspId,$app_date,$status){
		$data = array(
            'hodCurrent'=>1,
			'hodNew'=>1,
			'hodCurrentSignDate'=>$app_date,
			'hodNewSignDate'=>$app_date,
			'status'=>$status
        );
		$this->db->where('cspId', $cspId);
        $this->db->update('csp', $data);
	}
}