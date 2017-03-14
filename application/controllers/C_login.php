<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_login');
	}

	public function index()
	{
		$data = $this->m_login->getInformationNews();
		$this->load->view('index', array('berita'=>$data));
	}

	public function logged_in()
	{
		$iduser="";
		$nama= "";
		$password="";
		$level="";
		$email="";

		$inemail = mysql_real_escape_string($this->input->post('email'));
		$inpassword = mysql_real_escape_string($this->input->post('password'));
		$inlevel = $this->input->post('level');

		if ($inlevel=='volunteer') {
			$data = $this->m_login->login($inemail, $inpassword);

			foreach ($data as $duser) {
				$iduser = $duser['id_user'];
				$password = $duser['password'];
				$email = $duser['email'];
				$level = $duser['level'];
				$nama = $duser['nama_user'];

				if ($email==$inemail && $password == $inpassword) {
					$this->session->set_userdata('namauser', $nama);
					$this->session->set_userdata('email', $email);
					$this->session->set_userdata('id_user', $iduser);
					redirect('C_user');
				}else if($email != $inemail && $password == $inpassword){
					$this->session->set_flashdata('pesan_gagal','<span class="glyphicon glyphicon-warning"></span>&nbsp;Email anda tidak valid');
					redirect('C_login');
				}else if($email == $inemail && $password != $inpassword){
					$this->session->set_flashdata('pesan_gagal','<span class="glyphicon glyphicon-warning"></span>&nbsp;Password anda kurang tepat');
					redirect('C_login');
				}else if($email != $inemail && $password != $inpassword){
					$this->session->set_flashdata('pesan_gagal','<span class="glyphicon glyphicon-warning"></span>&nbsp;Anda belum tedaftar dalam sistem');
					redirect('C_login');
				}
			}
		}else if($inlevel=='donatur'){
			$dataa = $this->m_login->loginAdmin($inemail, $inpassword);

			foreach ($dataa as $dAdmin) {
				$iduser = $dAdmin['id_penyelenggara'];
				$password = $dAdmin['password'];
				$email = $dAdmin['email'];
				$level = $dAdmin['level'];
				$nama = $dAdmin['nama_lembaga'];	

				if ($email==$inemail && $password == $inpassword) {
					$this->session->set_userdata('namauser', $nama);
					$this->session->set_userdata('email', $email);
					$this->session->set_userdata('id_user', $iduser);
					redirect('C_dashboard');
				}else if($email != $inemail && $password == $inpassword){
					$this->session->set_flashdata('pesan_gagal','<span class="glyphicon glyphicon-warning"></span>&nbsp;Email anda tidak valid');
					redirect('C_login');
				}else if($email == $inemail && $password != $inpassword){
					$this->session->set_flashdata('pesan_gagal','<span class="glyphicon glyphicon-warning"></span>&nbsp;Password anda kurang tepat');
					redirect('C_login');
				}else if($email != $inemail && $password != $inpassword){
					$this->session->set_flashdata('pesan_gagal','<span class="glyphicon glyphicon-warning"></span>&nbsp;Anda belum tedaftar dalam sistem');
					redirect('C_login');
				}		
			}
		}

	}

	public function logged_in2()
	{
		$iduser="";
		$nama= "";
		$password="";
		$level="";
		$email="";

		$inemail = mysql_real_escape_string($this->input->post('emailU'));
		$inpassword = mysql_real_escape_string($this->input->post('passwordU'));
		$inlevel = $this->input->post('levelU');

		if ($inlevel=='volunteer') {
			$data = $this->m_login->login($inemail, $inpassword);

			foreach ($data as $duser) {
				$iduser = $duser['id_user'];
				$password = $duser['password'];
				$email = $duser['email'];
				$level = $duser['level'];
				$nama = $duser['nama_user'];

				if ($email==$inemail && $password == $inpassword) {
					$this->session->set_userdata('namauser', $nama);
					$this->session->set_userdata('email', $email);
					$this->session->set_userdata('id_user', $iduser);
					redirect('C_register');
				}else if($email != $inemail && $password == $inpassword){
					$this->session->set_flashdata('pesan_gagal','<span class="glyphicon glyphicon-warning"></span>&nbsp;Email anda tidak valid');
					redirect('C_login');
				}else if($email == $inemail && $password != $inpassword){
					$this->session->set_flashdata('pesan_gagal','<span class="glyphicon glyphicon-warning"></span>&nbsp;Password anda kurang tepat');
					redirect('C_login');
				}else if($email != $inemail && $password != $inpassword){
					$this->session->set_flashdata('pesan_gagal','<span class="glyphicon glyphicon-warning"></span>&nbsp;Anda belum tedaftar dalam sistem');
					redirect('C_login');
				}
			}
		}else if($inlevel=='donatur'){
			$dataa = $this->m_login->loginAdmin($inemail, $inpassword);

			foreach ($dataa as $dAdmin) {
				$iduser = $dAdmin['id_penyelenggara'];
				$password = $dAdmin['password'];
				$email = $dAdmin['email'];
				$level = $dAdmin['level'];
				$nama = $dAdmin['nama_lembaga'];	

				if ($email==$inemail && $password == $inpassword) {
					$this->session->set_userdata('namauser', $nama);
					$this->session->set_userdata('email', $email);
					$this->session->set_userdata('id_user', $iduser);
					redirect('C_dashboard');
				}else if($email != $inemail && $password == $inpassword){
					$this->session->set_flashdata('pesan_gagal','<span class="glyphicon glyphicon-warning"></span>&nbsp;Email anda tidak valid');
					redirect('C_login');
				}else if($email == $inemail && $password != $inpassword){
					$this->session->set_flashdata('pesan_gagal','<span class="glyphicon glyphicon-warning"></span>&nbsp;Password anda kurang tepat');
					redirect('C_login');
				}else if($email != $inemail && $password != $inpassword){
					$this->session->set_flashdata('pesan_gagal','<span class="glyphicon glyphicon-warning"></span>&nbsp;Anda belum tedaftar dalam sistem');
					redirect('C_login');
				}		
			}
		}

	}

	public function admin_page()
	{
		if ($this->session->userdata('namauser')) {
			$this->load->view('index2');
		}else{
			redirect('C_login');
		}
	}

	public function logged_out()
	{
		$this->session->sess_destroy();
		redirect('C_login');
	}

}
