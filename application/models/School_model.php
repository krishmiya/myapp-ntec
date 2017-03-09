<?php

class School_model extends CI_Model {
	
	public function schoolName($camId,$schoolName) {
		$this->db->where('camId',$camId);
		$this->db->where('schoolName',$schoolName);
        $query = $this->db->get('school');
		return $query->num_rows();
    }
	
	public function addSchool($camId,$schoolName){
		$data = array(
            'camId' => $camId,
			'schoolName' => $schoolName
        );
        $this->db->insert('school', $data);
        return $this->db->insert_id();
	}
	
	public function viewSchool($cmId) {
		$this->db->join('campus', 'campus.camId = school.camId');
		if($cmId != 0){
			$this->db->where('campus.camId', $cmId);
		}
        $query = $this->db->get('school');
		return $query->result_array();
    }
	
	public function updateSchool($camId,$schoolName,$sId){
		$data = array(
            'camId' => $camId,
			'schoolName' => $schoolName
        );
		$this->db->where('sId', $sId);
        $this->db->update('school', $data);
	}
	
	public function getSchool($camId){
		$query = $this->db->get_where('school', $camId);
		return $query->result_array();
	}
	
	public function viewSchl($sId) {
		$this->db->join('campus', 'campus.camId = school.camId');
		$this->db->where('sId', $sId);
        $query = $this->db->get('school');
		return $query->result_array();
    }
}