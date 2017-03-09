<?php

class Department_model extends CI_Model {
	
	public function departmentName($departmentName) {
		$this->db->where('mainDescription',$departmentName);
        $query = $this->db->get('maincourse');
		return $query->num_rows();
    }
	
	public function adddepartment($departmentName){
		$data = array(
            'mainDescription' => $departmentName
        );
        $this->db->insert('maincourse', $data);
        return $this->db->insert_id();
	}
	
	public function viewDepartment() {
        $query = $this->db->get('maincourse');
		return $query->result_array();
    }
	
	public function viewDepart($mcId) {
        $this->db->where('mcId',$mcId);
        $query = $this->db->get('maincourse');
		return $query->result_array();
    }
	
	public function updateDepartment($departmentName,$mcId){
		$data = array(
            'mainDescription' => $departmentName
        );
		$this->db->where('mcId', $mcId);
        $this->db->update('maincourse', $data);
	}
}