<?php defined('BASEPATH')OR exit('No direct script access allowed');
/**
 *
 */
 class M_user extends CI_Model
 {

 	function __construct()
 	{
 		parent::__construct();
 	}

 	public function getUser($iduser)
 	{
    $query = "SELECT * FROM user WHERE id_user='" . $iduser . "'";
    $hasil = $this->db->query($query);
    if ($hasil->num_rows() > 0) {
        return $hasil->result();
    } else {
        return array();
    }
 	} 

 	public function addPeserta($tabelname, $data)
 	{
 		$result = $this->db->insert($tabelname, $data);
 		return $result;
 	}

 } ?>
