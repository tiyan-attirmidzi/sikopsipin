<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loan extends CI_Model {

	const STATUS_NOT_FINISH = 0;
    const STATUS_FINISH = 1;
    private $table = 'loans';
    private $tablePays = 'loan_pays';
	private $id = 'id';
    
    public function __construct()
    {
        parent::__construct();
    }

    public function countLoans() {
        $this->db->select_sum('debt');
        $query = $this->db->get($this->table)->row();
        return $query->debt;
    }
    
    public function countPaid() {
        $this->db->select_sum('debt_paid');
        $query = $this->db->get($this->table)->row();
        return $query->debt_paid;
    }
    
    public function countLoanById($id) {
        $this->db->select_sum('debt');
        $this->db->where('id_user', $id);
        $query = $this->db->get($this->table)->row();
        return $query->debt;
    }

    public function countPaidById($id) {
        $this->db->select_sum('debt_paid');
        $this->db->where('id_user', $id);
        $query = $this->db->get($this->table)->row();
        return $query->debt_paid;
    }

    public function countDebtTotal($idUser) {
        $this->db->select_sum('debt_total');
        $this->db->where('id_user', $idUser);
        $query = $this->db->get($this->table)->row();
        return $query->debt_total;
    }

    public function countDebtpaid($idUser) {
        $this->db->select_sum('debt_paid');
        $this->db->where('id_user', $idUser);
        $query = $this->db->get($this->table)->row();
        return $query->debt_paid;
    }

    public function getWhere($data) {
        $query = $this->db->where($data)->get($this->table);
        return $query->result();
    }

    public function getWhereDetail($data) {
        $query = $this->db->where($data)->get($this->tablePays);
        return $query->result();
    }
	
	public function insert($data) {
        $this->db->insert($this->table, $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }
    
	public function insertPays($data) {
        $this->db->insert($this->tablePays, $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }
    
    public function update($id, $data){
        if(isset($data[$this->id]))unset($data[$this->id]);
        $query = $this->db->where('id', $id)->update(
          $this->table, $data
        );
        return ($this->db->affected_rows() != 1) ? false : true;
    }

}

?>
