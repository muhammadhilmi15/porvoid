<?php defined('BASEPATH')OR exit('no direct script access allowed');
/**
 * 
 */
 class M_login extends CI_Model
 {
 	
 	function __construct()
 	{
 		parent::__construct();
 	}

 	public function getInformationNews()
 	{
 		$query = $this->db->query("SELECT * FROM kegiatan ORDER by tgl_mulai ASC");
 		return $query->result_array();
 	}
 	public function login($email, $password)
 	{
 		$query = $this->db->query("SELECT * FROM user WHERE email='".$email."' OR password ='".$password."'");

 		return $query->result_array();
 	}

 	public function getAllData($parameter = "")
 	{
 		$data = $this->db->query("SELECT * FROM user ".$parameter);
 		return $data->result_array();
 	}

 	public function loginAdmin($email, $password)
 	{
 		$query = $this->db->query("SELECT * FROM penyelenggara WHERE email='".$email."' OR password='".$password."'");
 		return $query->result_array();
 	}
 } ?>