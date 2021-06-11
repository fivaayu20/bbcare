<?php
class User extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('User_Model');
	}

	function index(){
		$x['data']=$this->User_Model->Get_Pengasuh();
		$this->load->view('User/daftarpekerja',$x);
	}
}