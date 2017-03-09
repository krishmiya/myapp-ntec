<?php

class Signature_model extends CI_Model {
	public function userSign($uId) {
		$this->db->where('uId',$uId);
        $query = $this->db->get('signature');
		return $query->num_rows();
    }
	
	public function addSign($uId,$signName){
		$data = array(
		'uId' => $uId,
		'signName' => $signName
        );
        $this->db->insert('signature', $data);
        return $this->db->insert_id();
	}
}