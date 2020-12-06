<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Savings extends Member_Controller {

	private $pageCurrent = 'member/savings';
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
	
	public function index() {

		$idMember = $this->session->userdata("member_id");

		$data['pageCurrent'] = $this->pageCurrent;
		$data['pageTitle'] = 'Simpanan Saya';
		$data['pageTitleSub'] = 'Data Simpanan';
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
		$data['kinds'] = [
			[
				'name' => 'Pokok',
				'label' => 'warning'
			],
			[
				'name' => 'Sukarela',
				'label' => 'success'
			],
			[
				'name' => 'Wajib',
				'label' => 'default'
			]
		];
        
		$this->load->view('includes/header');
		$this->load->view('includes/navbar');
		$this->load->view('includes/sidebar');
		$this->load->view('pages/member/savings', $data);
		$this->load->view('includes/footer');
		
	}
    
}