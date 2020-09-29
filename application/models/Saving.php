<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Saving extends CI_Model {

	const TYPE_ADD = 0;
    const TYPE_TAKE = 1;
    private $table = 'savings';
    private $tableDetail = 'saving_details';
	private $id = 'id';
    
    public function __construct()
    {
        parent::__construct();
    }

    public function countSavings() {
        $this->db->select_sum('saldo');
        $query = $this->db->get($this->table)->row();
        return $query->saldo;
    }

    public function countSavingById($id) {
        $this->db->select_sum('saldo');
        $this->db->where('id_user', $id);
        $query = $this->db->get($this->table)->row();
        return $query->saldo;
    }

    public function getByIdMember($data) {
        $query = $this->db->where($data)->get($this->table);
        return $query->result();
    }
    
    public function getSavingsOfMembers($id) {
        $this->db->from($this->table);
        $this->db->join($this->tableDetail, $this->tableDetail.'.id_saving = '.$this->table.'.id', 'left');
        $this->db->where($this->table.'.id_user', $id);
        $this->db->order_by($this->tableDetail.'.time', "asc");
        $query = $this->db->get();
        if($query->num_rows() != 0)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }
	
	public function insert($data) {
        $this->db->insert($this->table, $data);
        $id = $this->db->insert_id();
        return $id;
    }
    
	public function insertDetail($data) {
        $this->db->insert($this->tableDetail, $data);
        $id = $this->db->insert_id();
        return $id;
	}

    public function update($id, $data){
        //run Query to update data
        if(isset($data[$this->id]))unset($data[$this->id]);
        $query = $this->db->where('id', $id)->update(
          $this->table, $data
        );
        return ($this->db->affected_rows() != 1) ? false : true;
    }

}

?>
