<?php

class Campus_model extends CI_Model {
	
	public function campusName($campusName) {
		$this->db->where('campusName',$campusName);
        $query = $this->db->get('campus');
		return $query->num_rows();
    }
	
	public function addCampus($campusName){
		$data = array(
            'campusName' => $campusName
        );
        $this->db->insert('campus', $data);
        return $this->db->insert_id();
	}
	
	public function viewCampus() {
        $query = $this->db->get('campus');
		return $query->result_array();
    }
	
	public function viewCam($camId) {
        $this->db->where('camId',$camId);
        $query = $this->db->get('campus');
		return $query->result_array();
    }
	
	public function updateCampus($campusName,$camId){
		$data = array(
            'campusName' => $campusName
        );
		$this->db->where('camId', $camId);
        $this->db->update('campus', $data);
	}
}