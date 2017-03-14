<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_register extends CI_Controller {

	function __Construct()
	{
		parent::__Construct();
		$this->load->model('m_register');
            $this->load->model('m_layanan');
	}

	public function index()
	{
		$this->load->view('register');
	}

      public function sendMessage()
      {

            $this->form_validation->set_rules('name', 'Nama anda', 'required');
            $this->form_validation->set_rules('email','Email anda', 'required');
            $this->form_validation->set_rules('comments','Isi Pesan anda', 'required');
            if ($this->form_validation->run() == FALSE) {
                  $this->session->set_flashdata('pesan_gagal','<span class="glyphicon glyphicon-warning"></span>'.validation_errors());
            }else{
            $dataPesan = array(
                  'id_pesan'=>$this->input->post('id_pesan'),
                  'nama'=>$this->input->post('name'),
                  'email'=>$this->input->post('email'),
                  'pesan'=>$this->input->post('comments'));

            $operasi = $this->m_layanan->insertPesan('pesan', $dataPesan);

            if ($operasi>0) {
                  $this->session->set_flashdata('pesan_sukses', '<strong><span class="glyphicon glyphicon-ok"></span>&nbsp;Pesan anda sudah kami terima<br/>Terima kasih telah menggunakan layanan kami.</strong>');
                  redirect('C_login');
            }else{
                  redirect('C_login');
          }
      }

  }

	public function addRegister()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('nama_lembaga', 'Nama Lembaga', 'required');
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal berdiri', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat Lembaga', 'required');
		$this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('pesan_gagal','<span class="glyphicon glyphicon-warning"></span>'.validation_errors());
		}else{
		$namafile = "file".time();
		$config['upload_path'] = './build/images/';
            $config['allowed_types'] = 'jpg|png|bmp';
            $config['max_size'] = '3000';
            $config['max_width'] = '2000';
            $config['max_height'] = '2000';
            $config['file_name']= $namafile;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('userfile')) {
            	$error = $this->upload->display_errors();
            	$this->session->set_flashdata('pesan_gagal','<span class="glyphicon glyphicon-warning"></span>'.$error);
            }else{
                  $image = $this->upload->data(); 
                  $data_in = array(
                        "id_user"=> $this->input->post('id_user'),
                        "nama_user"=> $this->input->post('nama'),
                        "nama_lembaga" => $this->input->post('nama_lembaga'),
                        "alamat"=> $this->input->post('alamat'),
                        "email"=>$this->input->post('email'),
                        "no_telp"=>$this->input->post('no_telp'),
                        "foto" => $image['file_name'],
                        "poin" => 0,
                        "password"=>$this->input->post('password'),
                        "level"=> $this->input->post('level'));
                        $this->m_register->insertRegister('user',$data_in);
                        $this->session->set_flashdata('pesan_sukses', '<strong><span class="glyphicon glyphicon-ok"></span>&nbsp;Data Berhasil Disimpan<br/>Silahkan gunakan email dan password untuk mengakses sistem</strong>');
                        redirect('C_register');
            }
		}
	}
}
?>
