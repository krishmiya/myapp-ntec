<?php

class Course_model extends CI_Model {
	
	/*public function loadCampus($term) {
        $this->db->like('campusName', $term, 'after');
        $this->db->order_by('camId', 'ASC');
        $query = $this->db->get('campus');
        return $query->result_array();
    }*/
	
	public function courseName($school,$department,$courseName) {
		$this->db->where('sId',$school);
		$this->db->where('mcId',$department);
		$this->db->where('courseName',$courseName);
        $query = $this->db->get('course');
		return $query->num_rows();
    }
	
	public function addCourse($school,$department,$courseName){
		$data = array(
            'sId' => $school,
			'mcId' => $department,
			'courseName' => $courseName
        );
        $this->db->insert('course', $data);
        return $this->db->insert_id();
	}
	
	public function viewCourse($cmId) {		
		$this->db->select('c.*, s.*,ca.*,mc.*');
		$this->db->from('course c');
		$this->db->join('school s', 's.sId = c.sId');
		$this->db->join('campus ca', 'ca.camId = s.camId');
		$this->db->join('maincourse mc', 'mc.mcId = c.mcId');
		if($cmId != 0){
			$this->db->where('ca.camId', $cmId);
		}
		$this->db->order_by('c.crsId', 'ASC');
		$query = $this->db->get();
		return $query->result_array();
    }
	
	public function viewCou($crsId) {
		$this->db->select('c.*, s.*,ca.*,mc.*');
		$this->db->from('course c');
		$this->db->join('school s', 's.sId = c.sId');
		$this->db->join('campus ca', 'ca.camId = s.camId');
		$this->db->join('maincourse mc', 'mc.mcId = c.mcId');
		$this->db->where('crsId', $crsId);
		$this->db->order_by('c.crsId', 'ASC');
		$query = $this->db->get();
		return $query->result_array();
    }
	
	public function getCrs($camId) {
		$this->db->select('*');
		$this->db->from('course c');
		$this->db->join('school s', 'c.sId = s.sId');
		$this->db->join('campus ca', 'ca.camId = s.camId');
		$this->db->where('ca.camId', $camId);
		$this->db->order_by('c.crsId', 'ASC');
		$query = $this->db->get();
		return $query->result_array();
    }
	
	public function updateCourse($sId,$mcId,$courseName,$crsId){
		$data = array(
            'sId' => $sId,
			'mcId'=> $mcId,
			'courseName' => $courseName
        );
		$this->db->where('crsId', $crsId);
        $this->db->update('course', $data);
	}
	
	public function getCourse($sId){
		$query = $this->db->get_where('course', $sId);
		return $query->result_array();
	}
}