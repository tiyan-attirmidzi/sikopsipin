<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Members extends Admin_Controller {

	private $pageCurrent = 'admin/member';
    private $pageTitle = 'Manajemen Data Anggota';
	private $pageTitleSub = 'Data Anggota';
	private $pageContent = 'Anggota';

	public function __construct() {
        parent::__construct();
        $this->load->model(
            array(
                'user',
            )
        );
    }

	public function index()
	{
		$member['role'] = User::MEMBER_ROLE;
		$data['pageCurrent'] = $this->pageCurrent;
		$data['pageTitle'] = $this->pageTitle;
		$data['pageTitleSub'] = $this->pageTitleSub;
		$data['pageContent'] = $this->pageContent;
		$data['members'] = $this->user->getWhere($member);
		$data['genders'] = [
			[
				'name' => 'Laki-laki',
				'label' => 'warning'
			],
			[
				'name' => 'Perempuan',
				'label' => 'primary'
			]
		];
		
		$this->load->view('includes/header');
		$this->load->view('includes/navbar');
		$this->load->view('includes/sidebar');
		$this->load->view('pages/admin/member', $data);
		$this->load->view('includes/footer');
	}
}
