<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {

	const ADMIN_ROLE = 1;
	const MEMBER_ROLE = 2;
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
	
	public function insert($data) {
        $this->db->insert($this->table, $data);
        return ($this->db->affected_rows() != 1) ? false : true;
	}

    public function edit($id, $data){
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

    public function get_total() {
        return $this->db->count_all($this->table);
    }	
    
    public function checkUser($username, $password) {
        $this->db->where("email = '$username' OR username = '$username'");
        $this->db->where('password', $password);
        $query = $this->db->get($this->table);
        return $query->row();
    }

}

?>
