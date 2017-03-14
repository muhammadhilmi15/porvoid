<?php defined('BASEPATH')OR exit('No direct script access allowed');
/**
 *
 */
 class M_penyelenggara extends CI_Model
 {

 	function __construct()
 	{
 		parent::__construct();
 	}

 	public function getPenyelenggara()
 	{
 		$query = $this->db->query("SELECT * FROM user WHERE level=donatur");
 	}

 	public function insertPenyelenggara($tabel, $data)
 	{
 		$result = $this->db->insert($tabel, $data);
 		return $result;
 	}

 	public function updatePenyelenggara($tabelname, $data, $parameter)
 	{
 		$this->db->where('id_user', $parameter);
 		$this->db->update('user', $data);
 		if ($this->db->affected_rows()>0) {
 			return true;
 		}else{
 			return false;
 		}
 	}

 	public function delete($id)
 	{
 		$this->db->where('id_user', $id);
 		$this->db->delete('user');
 		if ($this->db->affected_rows()>0) {
 			return true;
 		}else{
 			return false;
 		}
 	}
 } ?>
