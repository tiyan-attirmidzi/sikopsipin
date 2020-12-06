<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loans extends Admin_Controller {

	private $pageCurrent = 'admin/loans';
	private $pageContent = 'Pinjaman';

	public function __construct() {
        parent::__construct();
        $this->load->model(
            array(
                'user',
                'loan',
            )
        );
	}
	
	public function id_member_available() {

		$result = $this->user->idMemberAvailability($_POST['member_id']);
		if ($result)
		{
			return TRUE;
		} else {
			return FALSE;
		}

	}

    public function index()	{

		if ($this->input->post() != null) {

			$memberID = $this->input->post('member_id');
			
			$this->form_validation->set_rules(
				'member_id',
				'Nomor Anggota',
				'required|callback_id_member_available',
				array(
					'required' => '*) Masukkan <b>Nomor Anggota</b>'
				)
			);

			if ($this->form_validation->run() === TRUE) {
				redirect($this->pageCurrent.'/member/'.$memberID, 'refresh');
			}

		}

		$data['pageCurrent'] = $this->pageCurrent;
		$data['pageTitle'] = 'Pinjaman Anggota';
		$data['pageTitleSub'] = 'Cari Data Pinjaman Anggota';
		$data['pageContent'] = $this->pageContent;
		
		$this->load->view('includes/header');
		$this->load->view('includes/navbar');
		$this->load->view('includes/sidebar');
		$this->load->view('pages/admin/form-input', $data);
		$this->load->view('includes/footer');

	}
	
	public function member($idMember = null) {

		// check id
		if ($idMember == null) {
			redirect($this->pageCurrent, 'refresh');
		}

		$member['uid'] = $idMember;
		$data['pageCurrent'] = $this->pageCurrent;
		$data['pageTitle'] = 'Pinjaman Anggota';
		$data['pageTitleSub'] = 'Data Pinjaman Anggota';
		$data['pageContent'] = $this->pageContent;
		$data['member'] = $this->user->getWhere($member);
		$user['id_user'] = $data['member'][0]->id;
		$data['loans'] = $this->loan->getWhere($user);
		$data['debt'] = $this->loan->countDebtTotal($user['id_user']) - $this->loan->countDebtpaid($user['id_user']);
		$data['statuses'] = [
			[
				'name' => 'Belum Lunas',
				'label' => 'danger'
			],
			[
				'name' => 'Lunas',
				'label' => 'success'
			]
		];

		$this->load->view('includes/header');
		$this->load->view('includes/navbar');
		$this->load->view('includes/sidebar');
		$this->load->view('pages/admin/loans/detail', $data);
		$this->load->view('includes/footer');
		
	}

	public function show($id = null)
	{
		$show['id_loan']   = $id;
		$data = $this->loan->getWhereDetail($show);
		echo json_encode($data);
	}

	public function addMemberLoan() {
		$idUser = $this->input->post('id');
		$idMember = $this->input->post('member_id');
		$amount = preg_replace('/\D/', '', $this->input->post('amount'));
		$interest = $this->input->post('interest');

		$loan['id_user'] = $idUser;
		$loan['interest'] = $interest;
		$loan['debt'] = $amount;
		$loan['debt_interest'] = $amount * ($interest/100);
		$loan['debt_total'] = $loan['debt'] + ($amount * ($interest/100));
		$loan['status'] = Loan::STATUS_NOT_FINISH;
		$loan['time'] = date('Y-m-d H:i:s');
		$loan['amount_month'] = $this->input->post('amount_month');

		$this->loan->insert($loan);

		$this->session->set_flashdata('alertSweet', $this->alert->sweetAlert(Alert::SUCCESS, "Berhasil!", "Pinjaman Telah Ditambahkan", "false"));
		redirect($this->pageCurrent.'/member/'.$idMember, 'refresh');

	}

	public function payMemberLoan($id = null) {
		
		$dataLoan['id'] = $id;
		$idUser = $this->input->post('id');
		$idMember = $this->input->post('member_id');
		$amount = preg_replace('/\D/', '', $this->input->post('amount'));

		$resultLoanExist = $this->loan->getWhere($dataLoan);

		$loan['debt_paid'] = $amount + $resultLoanExist[0]->debt_paid;
		
		if ($loan['debt_paid'] == $resultLoanExist[0]->debt_total) {
			$loan['status'] = Loan::STATUS_FINISH;
		}

		if ($loan['debt_paid'] > $resultLoanExist[0]->debt_total) {
			$this->session->set_flashdata('alertSweet', $this->alert->sweetAlert(Alert::WARNING, "Perhatian!", "Jumlah Yang Anda Inputkan Kelebihan Dari Sisa", "false"));
			redirect($this->pageCurrent.'/member/'.$idMember, 'refresh');
		}

		$this->loan->update($dataLoan['id'], $loan);

		$loanPays['id_loan'] = $dataLoan['id'];
		$loanPays['amount'] = $amount;
		$loanPays['time'] = date('Y-m-d H:i:s');

		$this->loan->insertPays($loanPays);

		$this->session->set_flashdata('alertSweet', $this->alert->sweetAlert(Alert::SUCCESS, "Berhasil!", "Pinjaman Telah Dibayar", "false"));
		redirect($this->pageCurrent.'/member/'.$idMember, 'refresh');
	}
    
}