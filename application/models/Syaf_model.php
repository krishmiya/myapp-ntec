<?php

class Syaf_model extends CI_Model {
	
	public function addSyaf($uId,$course,$app_date){
		$data = array(
            'uId' => $uId,
            'crsId'=>$course,
			'sign_date'=>$app_date
        );
        $this->db->insert('secondyearapp', $data);
        return $this->db->insert_id();
	}
	
	public function addRefNSyaf($syaId,$refNumber){
		$data = array(
            'refNumber' => $refNumber
        );
		$this->db->where('syaId', $syaId);
        $this->db->update('secondyearapp', $data);
	}
	
	public function addAcc($syaId){
		$data = array(
            'refNumber' => $refNumber
        );
		$this->db->where('syaId', $syaId);
        $this->db->update('secondyearapp', $data);
	}
	
	public function pendingSecondYear($camId,$mcId,$usrType){
		$this->db->join('users', 'users.uId = secondyearapp.uId');
		$this->db->join('personaldetails', 'personaldetails.uId = users.uId');
		$this->db->join('contactdetails', 'contactdetails.uId = users.uId');
		$this->db->join('course', 'course.crsId = secondyearapp.crsId');
		$this->db->join('school', 'school.sId = course.sId');
		$this->db->join('campus', 'campus.camId = school.camId');
		if($camId != 0 && $mcId == 0 && $usrType == 4){
			$where = "secondyearapp.status = 1 AND users.camId =".$camId;
		}else{
		//if($camId != 0 && $mcId == 0 && $usrType == 3){
			$where = "secondyearapp.status = 0 AND users.camId =".$camId;
		}
		$this->db->where($where);
		$this->db->order_by('secondyearapp.syaId', 'ASC');
        $query = $this->db->get('secondyearapp');
		return $query->result_array();
		//echo $this->db->last_query();
	}
	
	public function viewStuDetails($syaId){
		$this->db->join('users', 'users.uId = secondyearapp.uId');//
		$this->db->join('personaldetails', 'personaldetails.uId = users.uId');//
		$this->db->join('contactdetails', 'contactdetails.uId = users.uId');//
		$this->db->join('course', 'course.crsId = secondyearapp.crsId');//
		$this->db->join('school', 'school.sId = course.sId');//
		$this->db->join('campus', 'campus.camId = school.camId');//
		$this->db->where('secondyearapp.syaId',$syaId);
		$this->db->order_by('secondyearapp.syaId', 'ASC');
        $query = $this->db->get('secondyearapp');
		return $query->result_array();
		//echo $this->db->last_query();
	}
	
	public function viewAppCspRC($syaId){
		$this->db->join('course', 'course.crsId = secondyearapp.crsId');		
		$this->db->join('school', 'school.sId = course.sId');		
		$this->db->join('campus', 'campus.camId = school.camId');
		$this->db->where('secondyearapp.syaId',$syaId);
        $query = $this->db->get('secondyearapp');
		return $query->result_array();
	}
	
	public function checkStatus($usrType,$syaId){

		//if($usrType == 2){
//			$where = "status = 2 AND syaId = ".$syaId;
//		}
		if($usrType == 3 || $usrType == 6){
			$where = "status = 0 AND syaId = ".$syaId;
		}
		if($usrType == 4){
			$where = "status = 1 AND syaId = ".$syaId;//status = 0
		}
		
		$this->db->where($where);
        $query = $this->db->get('secondyearapp');
		return $query->result_array();
		//echo $this->db->last_query();
	}
	
	public function addAccount($syaId,$proposedStartDate,$proposedFinishDate,$avgMarks,$attendance,$ieltsDate,$schlrShip,$discount,$criterion,$fee,$resourseFee,$insuranceFee){
		$data = array(
            'proposedStartDate'=>$proposedStartDate,
			'proposedFinishDate'=>$proposedFinishDate,
			'avgMarks'=>$avgMarks,
			'attendance'=>$attendance,
			'ieltsDate'=>$ieltsDate,
			'schlrShip'=>$schlrShip,
			'discount'=>$discount,
			'criterion'=>$criterion,
			'fee'=>$fee,
			'resourseFee'=>$resourseFee,
			'insuranceFee'=>$insuranceFee
        );
		$this->db->where('syaId', $syaId);
        $this->db->update('secondyearapp', $data);
	}
	public function upStatus($syaId,$status){
		$data = array(
            'status'=> $status
        );
		$this->db->where('syaId', $syaId);
        $this->db->update('secondyearapp', $data);
	}
	
	public function add_fac_cws($syaId,$office_comment,$status){
		$data = array(
			'office_comment'=>$office_comment,
			'status'=>$status
        );
		$this->db->where('syaId', $syaId);
        $this->db->update('secondyearapp', $data);
	}
	
	public function viewAppStatusSya($syaId){
		$where = "status = 1 AND status = 2 AND syaId = ".$syaId;
		$this->db->where($where);
        $query = $this->db->get('secondyearapp');
		return $query->result_array();
	}
	
	public function rptSecondYear($mcId,$Id){
		if($mcId != 0){
			$this->db->join('users', 'users.uId = secondyearapp.uId');//same
			$this->db->join('course', 'course.crsId = secondyearapp.crsId');
			$this->db->join('school', 'school.sId = course.sId');
			$this->db->join('campus', 'campus.camId = school.camId');
			$this->db->where('secondyearapp.uId',$Id);
		}if($mcId == 0){
			$this->db->join('users', 'users.uId = secondyearapp.uId'); //same
			$this->db->join('currentprogramme', 'currentprogramme.uId = secondyearapp.uId');
			$this->db->join('course', 'course.crsId = currentprogramme.crsId');
			$this->db->join('school', 'school.sId = course.sId');
			$this->db->join('campus', 'campus.camId = school.camId');
			$this->db->where('campus.camId',$Id);
		}
		
        $query = $this->db->get('secondyearapp');
		return $query->result_array();
		//echo $this->db->last_query();
	}
	
	public function checkAgent($syaId){
		$this->db->select('agentcontact.agentName,agentcontact.address AS ageAdd,agentcontact.telephone AS ageTele,agentcontact.fax AS ageFax,agentcontact.email AS ageEmail');
		$this->db->join('users', 'users.uId = secondyearapp.uId');
		$this->db->join('agentcontact', 'agentcontact.uId = secondyearapp.uId');
		$this->db->where('secondyearapp.syaId', $syaId);
        $query = $this->db->get('secondyearapp');
		return $query->result_array();
	}
	
	public function createPdf($syaId){
		//$this->db->select('users.*,secondyearapp.*,personaldetails.*,contactdetails.address AS cdAdd,contactdetails.telephone AS cdTel,contactdetails.fax AS cdFax,contactdetails.email AS cdEmail,course.*,signature.*,agentcontact.agentName,agentcontact.address AS ageAdd,agentcontact.telephone AS ageTele,agentcontact.fax AS ageFax,agentcontact.email AS ageEmail,emergencycontacthome.name AS echName,emergencycontacthome.relationship AS echRelationship,emergencycontacthome.address AS echAdd,emergencycontacthome.telephone AS echTele,emergencycontacthome.email AS echEmail,emergencycontactnz.name AS ecnzName,emergencycontactnz.relationship AS ecnzRelationship,emergencycontactnz.address AS ecnzAdd,emergencycontactnz.telephone AS ecnzTele,emergencycontactnz.email AS ecnzEmail');
		$this->db->select('users.*,secondyearapp.*,personaldetails.*,contactdetails.address AS cdAdd,contactdetails.telephone AS cdTel,contactdetails.fax AS cdFax,contactdetails.email AS cdEmail,course.*,signature.*,emergencycontacthome.name AS echName,emergencycontacthome.relationship AS echRelationship,emergencycontacthome.address AS echAdd,emergencycontacthome.telephone AS echTele,emergencycontacthome.email AS echEmail,emergencycontactnz.name AS ecnzName,emergencycontactnz.relationship AS ecnzRelationship,emergencycontactnz.address AS ecnzAdd,emergencycontactnz.telephone AS ecnzTele,emergencycontactnz.email AS ecnzEmail');
		$this->db->join('users', 'users.uId = secondyearapp.uId');
		$this->db->join('personaldetails', 'personaldetails.uId = secondyearapp.uId');
		$this->db->join('contactdetails', 'contactdetails.uId = secondyearapp.uId');
		//$this->db->join('agentcontact', 'agentcontact.uId = secondyearapp.uId');
		$this->db->join('emergencycontacthome', 'emergencycontacthome.uId = secondyearapp.uId');
		$this->db->join('emergencycontactnz', 'emergencycontactnz.uId = secondyearapp.uId');
		$this->db->join('course', 'course.crsId = secondyearapp.crsId');
		$this->db->join('signature', 'signature.uId = secondyearapp.uId');
		$this->db->where('secondyearapp.syaId', $syaId);
        $query = $this->db->get('secondyearapp');
		return $query->result_array();
		//echo $this->db->last_query();
	}
	
	public function createPdfCitiz($cId){
		$this->db->where('citizenship.cId', $cId);
        $query = $this->db->get('citizenship');
		return $query->result_array();
	}
	
	public function createPdfCont($cntId){
		$this->db->where('country.cntId', $cntId);
        $query = $this->db->get('country');
		return $query->result_array();
	}
	
	public function createPdfSS($uId){
		$this->db->join('country', 'country.cntId = secondarystudies.cntId');
		$this->db->where('secondarystudies.uId', $uId);
        $query = $this->db->get('secondarystudies');
		return $query->result_array();
	}
	
	public function createPdfTS($uId){
		$this->db->join('country', 'country.cntId = tertiarystudies.cntId');
		$this->db->where('tertiarystudies.uId', $uId);
        $query = $this->db->get('tertiarystudies');
		return $query->result_array();
	}
	
	public function createPdfCP($uId){
		$this->db->join('course', 'course.crsId = currentprogramme.crsId');
		$this->db->join('school', 'school.sId = course.sId');
		$this->db->join('campus', 'campus.camId = school.camId');
		$this->db->where('currentprogramme.uId', $uId);
        $query = $this->db->get('currentprogramme');
		return $query->result_array();
	}
}