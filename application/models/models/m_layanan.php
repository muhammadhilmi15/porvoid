<?php 
defined('BASEPATH')OR exit('No direct script access allowed');
/**
 * 
 */
 class M_layanan extends CI_Model
 {
 	
 	function __construct()
 	{
 		parent::__construct();
 	}

 	public function insertPesan($tableName, $messageData)
 	{
 		$result = $this->db->insert($tableName, $messageData);
 		return $result;
 	}
 } ?>