<?php

class Country_model extends CI_Model {
	
	public function countryName($description) {
		$this->db->where('countryName',$description);
        $query = $this->db->get('country');
		return $query->num_rows();
    }
	
	public function addCountry($description){
		$data = array(
            'countryName' => $description
        );
        $this->db->insert('country', $data);
        return $this->db->insert_id();
	}
	
	public function viewCountry() {
        $query = $this->db->get('country');
		return $query->result_array();
    }
	
	public function viewCoun($cntId) {
        $this->db->where('cntId',$cntId);
        $query = $this->db->get('country');
		return $query->result_array();
    }
	
	public function updateCountry($countryName,$cntId){
		$data = array(
            'countryName' => $countryName
        );
		$this->db->where('cntId', $cntId);
        $this->db->update('country', $data);
	}
}