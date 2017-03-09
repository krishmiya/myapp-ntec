<?php

class Login_model extends CI_Model {
	
	public function allCampus() {
        $query = $this->db->get('campus');
        return $query->result_array();
    }
	
	public function allDepartment() {
        $query = $this->db->get('maincourse');
        return $query->result_array();
    }
	
	public function checkUsr($email){
		$this->db->where('email',$email);
		$query = $this->db->get('users');
		return $query->num_rows();
	}
	
	public function createAccount($stuId,$camId,$mcId,$firstName,$lastName,$email,$password,$token){
		$data = array(
            'stuId' => $stuId,
			'camId' => $camId,
			'mcId' => $mcId,
            'firstName' => $firstName,
            'lastName' => $lastName,
			'email' => $email,
			'password' => $password,
			'token'=> $token
        );
        $this->db->insert('users', $data);
        return $this->db->insert_id();
	}
	
	public function viewVerify($uId) {
		$this->db->where('uId', $uId);
        $query = $this->db->get('users');
        return $query->num_rows();
    }
	
	public function verifyPassword($uId,$token,$password){
		$data = array(
            'passConfirm' => 1);
        $this->db->where('uId', $uId);
		$this->db->where('token', $token);
		$this->db->where('password', $password);
        $this->db->update('users', $data);

	}
	
	public function checkVerifyPassword($email){
		$this->db->where('email',$email);
		$this->db->where('passConfirm',1);
		$query = $this->db->get('users');
		return $query->num_rows();
	}
	
	public function logIn($email,$password){
		$this->db->where('email',$email);
		$this->db->where('password',$password);
		$query = $this->db->get('users');
		return $query->result_array();
	}
	
	public function checkUser($email){
		$this->db->where('email',$email);
		$this->db->where('passConfirm',1);
		$query = $this->db->get('users');
		return $query->num_rows();
	}
	
	public function chckUsr($email,$password){
		$this->db->where('email',$email);
		$this->db->where('password',$password);
		$this->db->where('passConfirm',1);
		$query = $this->db->get('users');
		return $query->num_rows();
	}
	
	public function resetPassword($email,$password){
		$data = array(
            'password' => $password);
        $this->db->where('email',$email);
		$this->db->where('passConfirm',1);
        $this->db->update('users', $data);
	}
	
	public function addUsers($stuId,$camId,$mcId,$firstName,$lastName,$email,$password,$userType,$token){
		$data = array(
            'stuId' => $stuId,
			'camId' => $camId,
			'mcId' => $mcId,
            'firstName' => $firstName,
            'lastName' => $lastName,
			'email' => $email,
			'password' => $password,
			'usrType' => $userType,
			'token'=> $token
        );
        $this->db->insert('users', $data);
        return $this->db->insert_id();
	}
}