<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Savings extends Admin_Controller {

	private $pageCurrent = 'admin/savings';
	private $pageContent = 'Simpanan';

	public function __construct() {
        parent::__construct();
        $this->load->model(
            array(
                'user',
                'saving',
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
		$data['pageTitle'] = 'Simpanan Anggota';
		$data['pageTitleSub'] = 'Cari Data Simpanan Anggota';
		$data['pageContent'] = $this->pageContent;
		
		$this->load->view('includes/header');
		$this->load->view('includes/navbar');
		$this->load->view('includes/sidebar');
		$this->load->view('pages/admin/savings/content', $data);
		$this->load->view('includes/footer');

	}
	
	public function member($idMember = null) {

		// check id
		if ($idMember == null) {
			redirect($this->pageCurrent, 'refresh');
		}

		$data['pageCurrent'] = $this->pageCurrent;
		$data['pageTitle'] = 'Simpanan Anggota';
		$data['pageTitleSub'] = 'Data Simpanan Anggota';
		$data['pageContent'] = $this->pageContent;
		$data['member'] = $this->user->getMemberWithSaldo($idMember);
		$data['savings'] = $this->saving->getSavingsOfMembers($data['member'][0]->id);
		$data['types'] = [
			[
				'name' => 'Setor',
				'label' => 'primary'
			],
			[
				'name' => 'Tarik',
				'label' => 'danger'
			]
		];

		$this->load->view('includes/header');
		$this->load->view('includes/navbar');
		$this->load->view('includes/sidebar');
		$this->load->view('pages/admin/savings/detail', $data);
		$this->load->view('includes/footer');
		
	}

	public function addMemberSaving() {
		$member['id_user'] = $this->input->post('id');
		$check = $this->saving->getByIdMember($member);
		if ($check) {

			$saving_id = $this->input->post('saving_id');
			$saving['id_user'] = $member['id_user'];
			$saving['saldo'] = $check[0]->saldo + $this->input->post('amount');

			$this->saving->update($saving_id, $saving);
			
			$savingDetail['id_saving'] = $saving_id;
			$savingDetail['amount'] = $this->input->post('amount');
			$savingDetail['type'] = Saving::TYPE_ADD;
			$savingDetail['time'] = date('Y-m-d H:i:s');

			$this->saving->insertDetail($savingDetail);

			$this->session->set_flashdata('alertSweet', $this->alert->sweetAlert(Alert::SUCCESS, "Berhasil!", "Simpanan Telah Ditambahkan", "false"));
			redirect($this->pageCurrent.'/member/'.$this->input->post('member_id'), 'refresh');

		} else {
			$saving['id_user'] = $member['id_user'];
			$saving['saldo'] = $this->input->post('amount');

			$insertSaving = $this->saving->insert($saving);
			
			$savingDetail['id_saving'] = $insertSaving;
			$savingDetail['amount'] = $saving['saldo'];
			$savingDetail['type'] = Saving::TYPE_ADD;
			$savingDetail['time'] = date('Y-m-d H:i:s');

			$this->saving->insertDetail($savingDetail);

			$this->session->set_flashdata('alertSweet', $this->alert->sweetAlert(Alert::SUCCESS, "Berhasil!", "Simpanan Telah Ditambahkan", "false"));
			redirect($this->pageCurrent.'/member/'.$this->input->post('member_id'), 'refresh');
		}
	}

	public function takeMemberSaving() {
		$member['id_user'] = $this->input->post('id');
		$amout = $this->input->post('amount');
		$check = $this->saving->getByIdMember($member);

		if ($check[0]->saldo < $amout) {
			$this->session->set_flashdata('alertSweet', $this->alert->sweetAlert(Alert::WARNING, "Perhatian!", "Saldo Tidak Memenuhi Permintaan", "false"));
			redirect($this->pageCurrent.'/member/'.$this->input->post('member_id'), 'refresh');
		}

		$saving_id = $this->input->post('saving_id');
		$saving['id_user'] = $member['id_user'];
		$saving['saldo'] = $check[0]->saldo - $this->input->post('amount');

		$this->saving->update($saving_id, $saving);
		
		$savingDetail['id_saving'] = $saving_id;
		$savingDetail['amount'] = $this->input->post('amount');
		$savingDetail['type'] = Saving::TYPE_TAKE;
		$savingDetail['time'] = date('Y-m-d H:i:s');

		$this->saving->insertDetail($savingDetail);

		$this->session->set_flashdata('alertSweet', $this->alert->sweetAlert(Alert::SUCCESS, "Berhasil!", "Simpanan Telah Ditambahkan", "false"));
		redirect($this->pageCurrent.'/member/'.$this->input->post('member_id'), 'refresh');

	}
    
}