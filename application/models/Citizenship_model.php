<?php

class Citizenship_model extends CI_Model {
	
	public function citizenshipName($citizenshipName) {
		$this->db->where('citizenshipName',$citizenshipName);
        $query = $this->db->get('citizenship');
		return $query->num_rows();
    }
	
	public function addCitizenship($citizenshipName){
		$data = array(
            'citizenshipName' => $citizenshipName
        );
        $this->db->insert('citizenship', $data);
        return $this->db->insert_id();
	}
	
	public function viewCitizenship() {
        $query = $this->db->get('citizenship');
		return $query->result_array();
    }
	
	public function viewCiti($cId) {
        $this->db->where('cId',$cId);
        $query = $this->db->get('citizenship');
		return $query->result_array();
    }
	
	public function updateCitizenship($citizenshipName,$cId){
		$data = array(
            'citizenshipName' => $citizenshipName
        );
		$this->db->where('cId', $cId);
        $this->db->update('citizenship', $data);
	}
}