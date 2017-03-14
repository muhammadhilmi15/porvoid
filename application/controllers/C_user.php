<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_user extends CI_Controller {

	function __construct()
	{
		parent::__construct();
    $this->load->model('m_user');
	}

	public function index()
	{
		$where = $this->session->userdata('id_user');
    	$data['user'] = $this->m_user->getUser($where);
		$this->load->view('detail_user',$data);
	}

	public function addPeserta() 
	{
		$this->form_validation->set_rules('id_peserta', 'ID Peserta', 'required');
 		$this->form_validation->set_rules('id_kegiatan', 'ID Kegiatan', 'required');
 		$this->form_validation->set_rules('id_user', 'ID User', 'required');
 		$this->form_validation->set_rules('status','Status', 'required');
 		$this->form_validation->set_rules('nama_instansi','Nama Instansi', 'required');

 		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('pesan_gagal','<span class="glyphicon glyphicon-warning"></span>'.validation_errors());
		}else{
		$namafile = "lampran".time();
		$config['upload_path'] = './build/lampiran/';
        $config['allowed_types'] = 'zip|rar';
        $config['file_name']= $namafile;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {
        	$error = $this->upload->display_errors();
        	$this->session->set_flashdata('pesan_gagal','<span class="glyphicon glyphicon-warning"></span>'.$error);
        }else{
              $lampiran = $this->upload->data(); 
              $data_in = array(
                    "id_peserta"=> $this->input->post('id_peserta'),
                    "id_kegiatan"=> $this->input->post('id_kegiatan'),
                    "id_user"=> $this->input->post('id_userlog'),
                    "status"=> $this->input->post('status'),
                    "instansi"=> $this->input->post('nama_instansi'),
                    "lampiran"=>$lampiran['file_name']);
                    $this->m_user->addPeserta('peserta',$data_in);
                    $this->session->set_flashdata('pesan_sukses', '<strong><span class="glyphicon glyphicon-ok"></span>&nbsp;Data Berhasil Disimpan<br/>Silahkan gunakan email dan password untuk mengakses sistem</strong>');
                    redirect('c_kegiatan');
            }
		}
	}
}
