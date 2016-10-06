<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('muser');
	}
	public function login(){
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required|callback_validLogin');

		if(!$this->form_validation->run()){
			$this->load->view('default/login');
		}
		else{
			if($this->session->userdata('permission') == 2){
				redirect(base_url('doctor/home'));
			}
			else if($this->session->userdata('permission') == 3){
				redirect(base_url('member/home'));
			}
		}
	}
	public function validLogin(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$result = $this->muser->validLogin($username,$password);
		if($result != false){
			$array = array(
					'permission' => $result['permission'],
					'userId' => $result['id_user'],
					'username' => $result['username']
				);
			$this->session->set_userdata($array);
			return TRUE;
		}
		else{
			$this->form_validation->set_message('validLogin','Username or Password is invalid!');
			return FALSE;
		}
	}
	public function register(){
		$this->load->view('default/register');	
	}
}
