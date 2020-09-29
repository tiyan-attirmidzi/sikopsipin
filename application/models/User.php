<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {

	const ADMIN_ROLE = 1;
    const MEMBER_ROLE = 2;
    const MALE = 0;
    const FEMALE = 1;
    private $table = 'users';
	private $id = 'id';
    
    public function __construct()
    {
        parent::__construct();
    }

    public function get() {
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function getWhere($data) {
        $query = $this->db->where($data)->get($this->table);
        return $query->result();
    }
    
    public function getMemberWithSaldo($idMember) {
        $this->db->select($this->table.'.*, savings.saldo, savings.id AS saving_id');
        $this->db->from($this->table);
        $this->db->join('savings', 'savings.id_user = '.$this->table.'.id', 'left');
        $this->db->where($this->table.'.uid', $idMember);
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
        return ($this->db->affected_rows() != 1) ? false : true;
	}

    public function update($id, $data){
        //run Query to update data
        if(isset($data[$this->id]))unset($data[$this->id]);
        $query = $this->db->where('id', $id)->update(
          $this->table, $data
        );
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function delete($data){
        $this->db->delete($this->table, $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function checkUser($username, $password) {
        $this->db->where("email = '$username' OR username = '$username'");
        $this->db->where('password', $password);
        $query = $this->db->get($this->table);
        return $query->row();
    }

    public function idMemberAvailability($idMember)
    {
        $this->db->where('uid', $idMember);
        $query = $this->db->get($this->table);
        return $query->row();
    }

}

?>
