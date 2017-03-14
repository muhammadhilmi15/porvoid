<?php defined('BASEPATH')OR exit('No direct script access allowed');
/**
 *
 */
 class C_penyelenggara extends CI_Controller
 {

 	function __construct()
 	{
 		parent::__construct();
    $this->load->model('M_kegiatan');
 		$this->load->model('M_penyelenggara');
 	}

 	public function index()
 	{

 	}

 	public function addPenyelenggara()
 	{
    $this->form_validation->set_rules('nama_lembaga_pny', 'Nama Lembaga', 'required');
 		$this->form_validation->set_rules('tgl_berdiri', 'Tanggal Berdiri', 'required');
 		$this->form_validation->set_rules('alamat_pny', 'Alamat Lengkap', 'required');
 		$this->form_validation->set_rules('no_telp_pny','Nomor telepon', 'required');
 		$this->form_validation->set_rules('deskripsi_pny', 'Deskripsi lembaga', 'required');
 		$this->form_validation->set_rules('no_rek_pny', 'Nomor rekening donatur', 'required');
 		$this->form_validation->set_rules('email_pny', 'Email Penyelenggara', 'required');
 		$this->form_validation->set_rules('password_pny', 'Password penyelenggara', 'required');

 		if ($this->form_validation->run() == FALSE) {
 			$this->session->set_flashdata('pesan_gagal','<span class="glyphicon glyphicon-warning"></span>'.validation_errors());
 		}else{
 			$dataInput = array(
 				'id_penyelenggara' =>$this->input->post('id_admin'),
 				'nama_lembaga'=>$this->input->post('nama_lembaga_pny'),
 				'tgl_berdiri'=>$this->input->post('tgl_berdiri'),
 				'alamat'=> $this->input->post('alamat_pny'),
 				'no_telp'=>$this->input->post('no_telp_pny'),
 				'deskripsi'=> $this->input->post('deskripsi_pny'),
 				'email' => $this->input->post('email_pny'),
 				'password' => $this->input->post('password_pny'),
 				'rekening' => $this->input->post('no_rek_pny'),
 				'alias' => $this->input->post('alias_pny'));

 			$result = $this->M_penyelenggara->insertPenyelenggara('penyelenggara', $dataInput);
 			if ($result > 0) {
 				$this->session->set_flashdata('pesan_sukses','<span class="glyphicon glyphicon-ok"></span>&nbsp;Data Berhasil ditambahkan<br/>Selamat bergabung dengan ProvoId<br/>Gunakan akun anda untuk akses sistem');
 				redirect('C_login');
 			}else{
 				$this->session->set_flashdata('pesan_gagal','<span class="glyphicon glyphicon-warning"></span>&nbsp; terjadi kesalahan');
 				redirect('C_register');
 			}
 		}
 	}

  public function inputKegiatanPage() {
    $data['skala'] = $this->M_kegiatan->getSkala();
    $data['kategori'] = $this->M_kegiatan->getKategori();
    $this->load->view('input_kegiatan',$data);
  }
 } ?>
