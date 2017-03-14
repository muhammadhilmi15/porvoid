<?php defined('BASEPATH')OR exit('No direct script access allowed');
/**
 *
 */
 class M_kegiatan extends CI_Model
 {

 	function __construct()
 	{
 		parent::__construct();
 	}

  public function getAllKegiatan()
  {
    $data = $this->db->query("SELECT * FROM kegiatan");
    return $data->result_array();
  }

 	public function getSkala()
 	{
    $query = $this->db->get("skala");
    if($query->num_rows() > 0)
    {
      return $query->result();
    }
    return array();
 	}

 	public function getKategori()
  {
    $query = $this->db->get("kategori");
    if($query->num_rows() > 0)
    {
      return $query->result();
    }
    return array();
  }

  public function insertKegiatan($tablename, $data)
  {
    $result = $this->db->insert($tablename, $data);
    return $result;
  }
 } ?>
