<?php defined('BASEPATH')OR exit('No direct script access allowed');

/**
* 
*/
class C_event extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_kegiatan');
	}

	public function insertKegiatan()
	{
		$this->form_validation->set_rules('nama', 'Nama Kegiatan', 'required');
 		$this->form_validation->set_rules('tgl_mulai', 'Tanggal Mulai', 'required');
 		$this->form_validation->set_rules('tgl_selesai','Tanggal Selesai', 'required');
 		$this->form_validation->set_rules('tgl_mulaireg','Tanggal Mulai Registrasi','required');
 		$this->form_validation->set_rules('tgl_tutupreg','Tanggal Tutup Registrasi','required');
 		$this->form_validation->set_rules('skala','Skala','required');
 		$this->form_validation->set_rules('kategori','kategori','required');
 		$this->form_validation->set_rules('donasi','Donasi','required');
    $this->form_validation->set_rules('location','Lokasi','required');
    $this->form_validation->set_rules('desk','Deskripsi','required');
    $this->form_validation->set_rules('id_user1','ID admin','required');

 		if ($this->form_validation->run() == FALSE) {
 			$this->session->set_flashdata('pesan_gagal','<span class="glyphicon glyphicon-danger"></>'.validation_errors());
      return false;
 		}else{
 			$filename = "picture_".time();
 			$config['upload_path']='./build/images/';
 			$config['allowed_types']='jpg|png|bmp';
 			$config['max_size']='3000';
 			$config['max_width']='2000';
 			$config['max_height']='2000';
 			$config['file_name']= $filename;

 			$this->load->library('upload', $config);

 			if (!$this->upload->do_upload('userfile')) {
 				$error = $this->upload->display_errors();
 				$this->session->set_flashdata('pesan_gagal','<span class="glyphicon glyphicon-warning"></span>&nbsp'.$error);
 			}else{
 				$image = $this->upload->data();
 				$datain= array(
          "id_kegiatan" => $this->input->post('id_keg'),
          "id_admin"=>$this->input->post('id_user1'),
 					"nama_keg"=>$this->input->post('nama'),
 					"tgl_mulai"=>$this->input->post('tgl_mulai'),
 					"tgl_selesai"=>$this->input->post('tgl_selesai'),
 					"tgl_mulaireg"=>$this->input->post('tgl_mulaireg'),
 					"tgl_tutupreg"=>$this->input->post('tgl_tutupreg'),
 					"id_skala"=>$this->input->post('skala'),
 					"id_kategori"=>$this->input->post('kategori'),
 					"donasi"=>$this->input->post('donasi'),
          "lokasi"=>$this->input->post('location'),
          "latitude"=>$this->input->post('lat'),
          "longitude"=>$this->input->post('lng'),
          "deskripsi"=>$this->input->post('desk'),
          "foto"=>$image['file_name']);
 				$this->M_kegiatan->insertKegiatan('kegiatan', $datain);
 				$this->session->set_flashdata('pesan_sukses','<strong><span class="glyphicon glyphicon-ok"></span>&nbspData Berhasil disimpan<br>Selamat Datang Di layanan Kami</strong>');
 				redirect('c_register');
 			}
 		}
	}
}?>