<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loans extends Member_Controller {

	private $pageCurrent = 'member/loans';
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
	
	public function index() {

        $idMember = $this->session->userdata("member_id");

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
		$this->load->view('pages/member/loans', $data);
		$this->load->view('includes/footer');
		
	}

	public function show($id = null)
	{
		$show['id_loan'] = $id;
		$data = $this->loan->getWhereDetail($show);
		echo json_encode($data);
	}
    
}