<?php defined('BASEPATH')OR exit('no direct access script allowed');
/**
 * 
 */
 class M_register extends CI_Model
 {
 	
 	function __construct()
 	{
 		parent::__construct();
 	}
 	public function getData()
 	{
 		$query = $this->db->query("SELECT * FROM user");
 		return $query->result_array();
 	}

 	public function getPersonilId($param)
 	{
 		$query = $this->db->query("SELECT * FROM user WHERE id_user".$param);
 		return $query->result_array();
 	}

 	public function insertRegister($tabelname, $data)
 	{
 		$result = $this->db->insert($tabelname, $data);
 		return $result;
 	}

 	public function updateRegister($tabel, $data, $parameter)
 	{
 		$this->db->where('id_user', $parameter);
 		$this->db->update($tabel, $data);

 		if ($this->db->affected_rows()>0) {
 			return true;
 		}else{
 			return false;
 		}
 	}

 	public function deleteRegister($param)
 	{
		$this->db->where('id_user', $param);
		$this->db->delete('user');

		if ($this->db->affected_rows()>0) {
			return true;
		}else{
			return false;
		}
 	}
 } ?>