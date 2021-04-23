<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class M_log extends CI_Model {

	private $_table = "tabel_log";
 
    public function save_log($param)
    {
        $sql        = $this->db->insert_string('tabel_log',$param);
        $ex         = $this->db->query($sql);
        return $this->db->affected_rows($sql);
	}
	
	public function getAll()
	{
	
		$this->db->select('*');
		$this->db->from("$this->_table");
		$this->db->order_by('log_time', 'DESC');
		$query = $this->db->get();
		return $query->result();
//		return $this->db->get("$this->_table")->result();
	}

	public function hapusLog($log_id)
    {
        $this->db->where('log_id', $log_id);
        if (
            $this->db->delete('tabel_log')
        ) {
            return true;
        } else {
            return false;
        }
    }
}