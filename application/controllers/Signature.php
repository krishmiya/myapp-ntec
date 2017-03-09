<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signature extends CI_Controller {
	
	public function add_sign(){
		$this->load->model('Signature_model');
		
		$uId = $this->session->userdata('uId');
		
		$data = $this->Signature_model->userSign($uId);
		if($data == 0){
			$this->load->library('upload');
			
			$files = $_FILES;
			$extension=explode(".", $files['userfile']['name']);
			//$itemName = 'kss-powerd_' . $this->randomName() . '-ntec-'.$uId.'-sign-' . date('YMd') . $files['userfile']['name'];
			$itemName = 'kss-powerd_' . $this->randomName() . '-ntec-'.$uId.'-sign-' . date('YMd') . "." . $extension[1];
			$_FILES['userfile']['name'] = $itemName;
			$_FILES['userfile']['type'] = $files['userfile']['type'];
			$_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name'];
			$_FILES['userfile']['error'] = $files['userfile']['error'];
			$_FILES['userfile']['size'] = $files['userfile']['size'];
			$files['userfile']['name'] . "<br>";
			$this->upload->initialize($this->set_upload_options());
		
			if($this->upload->do_upload()){
			
				//$iId = $this->Signature_model->addSign($uId,$_FILES['userfile']['name']);
				$iId = $this->Signature_model->addSign($uId,$itemName);
				if($iId){
					$this->session->set_userdata('succ_msg', "Signature Successfully Created.");
				}
				else{
					$this->session->set_userdata('err_msg', "Can not create the Signature.");
				}
			}
			else{
				$error = array("err_msg"=>$this->upload->display_errors());
				$this->session->set_userdata('err_msg', " Problem with uploading the Signature.");
			}
		}else{
			$this->session->set_userdata('err_msg', "You already uploaded the Signature.");
		}
		
		$this->load->view('dash/header');
		$this->load->view('dash/message');
		$this->load->view('dash/footer');
	}
	
	private function randomName($length = 8){     
		$chars = '1K0c0R8h8I8a9S1m1H4i0A4d9N8i9T1lHsNhIiMkEaSlHaBkUmDaDlIiK0A1D8A0W8A8T9A1G9O8L9L1A';
		$result = Null;
	   
		for ($p = 0; $p < $length; $p++)
		{
			$result .= ($p%2) ? $chars[mt_rand(19, 23)] : $chars[mt_rand(0, 18)];
		}
	   
		return $result;
	}
	
	private function set_upload_options() {
        /* upload an image options */
        $config = array();
        $config['upload_path'] = './ntec_uploads/signature/';
        $config['allowed_types'] = 'png';
        $config['max_size'] = '2500';
        $config['overwrite'] = TRUE;
        return $config;
    }
}